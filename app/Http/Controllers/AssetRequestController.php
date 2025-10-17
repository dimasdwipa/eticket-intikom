<?php

namespace App\Http\Controllers;

use App\Models\AssetRequest;
use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Complain;
use App\Models\Team;
use App\Models\Asset;
use App\Models\AssetMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssetEmail;
use App\Mail\EstReturnDateUpdated;
use Illuminate\Support\Arr;

class AssetRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('asset-request.index')
            ->with('asset_request', AssetRequest::where('user_id', Auth::id())->orderby('created_at', 'desc')->AllTeams()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset-request.create')
            ->with('assets', Asset::orderby('created_at', 'desc')->AllTeams()->get())
            ->with('teams', Team::orderby('code')->get())
            ->with('lokasi', Lokasi::orderby('created_at', 'desc')->AllTeams()->get())
            ->with('category', Kategori::orderby('created_at', 'desc')->AllTeams()->get())
            ->with('subkategori', SubKategori::orderby('created_at', 'desc')->AllTeams()->get());
    }

    public function getAgentIdWithLeastTasks($currentTeamId)
    {
        $agents = User::where('current_team_id', $currentTeamId)
            ->where('role', 'like', '%agent%')
            ->get();

        $agentsWithTaskCount = $agents->map(function ($agent) {
            $taskCount = AssetRequest::where('agent_id', $agent->id)
                ->where('transaction_type', 'Request Asset')
                ->count();

            return [
                'id' => $agent->id,
                'task_count' => $taskCount,
            ];
        });

        $sortedAgents = $agentsWithTaskCount->sortBy('task_count');

        $leastTasksCount = $sortedAgents->first()['task_count'];
        $candidates = $sortedAgents->filter(function ($item) use ($leastTasksCount) {
            return $item['task_count'] == $leastTasksCount;
        })->pluck('id')->toArray();

        $randomAgentId = Arr::random($candidates);

        return $randomAgentId;
    }

    public function getSupervisorIdWithLeastTasks($currentTeamId)
    {
        // Ambil semua supervisor dengan current_team_id tertentu dan role yang mengandung kata 'supervisor'
        $supervisors = User::where('current_team_id', $currentTeamId)
            ->where('role', 'like', '%supervisor%')
            ->get();

        // Hitung jumlah tanggungan (asset_requests dengan transaction_type 'Request Asset')
        $supervisorsWithTaskCount = $supervisors->map(function ($supervisor) {
            // Hitung jumlah asset_requests untuk supervisor ini
            $taskCount = AssetRequest::where('supervisor_id', $supervisor->id)
                ->where('transaction_type', 'Request Asset')
                ->count();

            return [
                'id' => $supervisor->id,
                'task_count' => $taskCount,
            ];
        });

        // Urutkan berdasarkan task_count terendah
        $sortedSupervisors = $supervisorsWithTaskCount->sortBy('task_count');

        // Ambil supervisor dengan tanggungan tersedikit dan jika ada yang sama, pilih secara acak
        $leastTasksCount = $sortedSupervisors->first()['task_count'];
        $candidates = $sortedSupervisors->filter(function ($item) use ($leastTasksCount) {
            return $item['task_count'] == $leastTasksCount;
        })->pluck('id')->toArray();

        // Pilih ID supervisor secara acak dari kandidat
        $randomSupervisorId = Arr::random($candidates);

        // Kembalikan ID supervisor dengan tanggungan tersedikit secara acak
        return $randomSupervisorId;
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'lokasi' => 'required|exists:lokasis,id',
            'asset' => 'required|exists:assets,id',
            'type_request' => 'required|string',
            'est_return_date' => 'required_if:type_request,Non Permanent',
            'prioritas' => 'required|string',
            'description' => 'required|string',
            'files' => 'nullable|file|max:2048',
        ]);

        $team = Team::find($request->team_id);
        if ($team->year != date('Y')) {
            $team->year = date('Y');
            $team->number = 1;
            $team->save();
        } else {
            $team->number = $team->number + 1;
            $team->save();
        }

        $code = $team->code . date('Y') . sprintf('%05d', $team->number);

        $file_data = null;
        try {
            if ($request->hasFile('files')) {
                $file = $request->file('files');
                $file_path = $code . '.' . $file->extension();
                $file_data = $file_path;
            }
        } catch (\Throwable $th) {
        }

        $asset = Asset::find($request->asset);

        $agent_random_id=$this->getAgentIdWithLeastTasks($request->team_id);
        $supervisor_random_id=$this->getSupervisorIdWithLeastTasks($request->team_id);

        $assetRequest = new AssetRequest();
        $assetRequest->code = $code;
        $assetRequest->lokasi_id = $request->lokasi;
        $assetRequest->user_id = Auth::id();
        $assetRequest->agent_id = !empty($agent_random_id) ? $agent_random_id : $asset->agent_id;
        $assetRequest->supervisor_id =  !empty($supervisor_random_id) ? $supervisor_random_id : $asset->supervisor_id;
        $assetRequest->asset_id = $request->asset;
        $assetRequest->transaction_type = 'Request Asset';
        $assetRequest->transaction_date = date('Y-m-d');
        $assetRequest->type_request = $request->type_request;
        $assetRequest->est_return_date = $request->est_return_date;
        $assetRequest->priority = $request->prioritas;
        $assetRequest->team_id = $request->team_id;
        $assetRequest->description = $request->description;
        $assetRequest->files = $file_data;
        $assetRequest->asset_custodian = $asset->asasset_custodian;
        $assetRequest->save();

        if ($file_data) {
            Storage::putFileAs('public/files/assets', $request->file('files'), $file_data);
        }

        try {
            // Ambil email user, agent, dan supervisor
            $user = User::find(Auth::id());
            $agent = User::find(!empty($agent_random_id) ? $agent_random_id : $asset->agent_id);
            $supervisor = User::find(!empty($supervisor_random_id) ? $supervisor_random_id : $asset->supervisor_id);

            // Kirim email ke agent dengan CC ke user dan supervisor

            Mail::to($agent->email)
                ->cc([$user->email, $supervisor->email])
                ->send(new AssetEmail($assetRequest, $asset, $agent->name));
        } catch (\Throwable $th) {
            return redirect()->route('asset-request.index')->with('success', 'Request Asset successfully, Waning : email Not send');
        }




        return redirect()->route('asset-request.index')->with('success', 'Request Asset successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssetRequest  $assetRequest
     * @return \Illuminate\Http\Response
     */
    public function show(AssetRequest $assetRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssetRequest  $assetRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetRequest $assetRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssetRequestRequest  $request
     * @param  \App\Models\AssetRequest  $assetRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetRequest $assetRequest)
    {

        if(empty($request->est_return_date)){

            $assetRequest->transaction_type = "Request Return Asset";
            $assetRequest->request_return_date = now();
            $assetRequest->save();


            try {
                // Ambil email user, agent, dan supervisor
                $user = User::find($assetRequest->user_id);
                $agent = User::find($assetRequest->agent_id);
                $supervisor = User::find($assetRequest->supervisor_id);

                // Kirim email ke agent dengan CC ke user dan supervisor
                Mail::to($agent->email)
                    ->cc([$user->email, $supervisor->email])
                    ->send(new AssetEmail($assetRequest, $assetRequest->asset, $agent->name));
            } catch (\Throwable $th) {
                return redirect()->route('asset-request.index')->with('success', 'Request Asset successfully, Waning : email Not send');
            }

            return redirect()->route('asset-request.index')->with('success', 'Request Return Asset successfully.');
        }elseif(!empty($request->est_return_date)){



            try {
                // Ambil email user, agent, dan supervisor
                $user = User::find($assetRequest->user_id);
                $agent = User::find($assetRequest->agent_id);
                $supervisor = User::find($assetRequest->supervisor_id);

                // Kirim email ke agent dengan CC ke user dan supervisor
                Mail::to($agent->email)
                    ->cc([$user->email, $supervisor->email])
                    ->send(new EstReturnDateUpdated($assetRequest, $assetRequest->asset, $agent->name,$request->est_return_date));




            } catch (\Throwable $th) {
                return redirect()->route('asset-request.index')->with('success', 'Successfully, Waning : email Not send');
            }

            $assetRequest->est_return_date = $request->est_return_date;
            $assetRequest->save();

            return redirect()->route('asset-request.index')->with('success', 'Successfully.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssetRequest  $assetRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetRequest $assetRequest)
    {
        //
    }
}
