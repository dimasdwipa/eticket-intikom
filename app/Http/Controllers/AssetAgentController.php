<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetRequest;
use App\Models\Lokasi;
use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Complain;
use App\Models\Team;
use App\Models\Asset;
use App\Models\AssetMovement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssetEmail;


class AssetAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asset-agent.index')
        ->with('assets', Asset::where('status','Available')->orderby('created_at', 'desc')->get())
        ->with('asset_request', AssetRequest::where('agent_id',Auth::id())->orderby('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asset_request =AssetRequest::find($request->id);


        if($request->resolution === "Aproved"){


            $asset_request->asset_id = $request->asset;
            $asset_request->transaction_type = "Has been given";
            $asset_request->note_agent = $request->note;
            $asset_request->resolution_date = now();
            $asset_request->asset_custodian = $asset_request->user->name;
            $asset_request->save();

            $asset_movement = new AssetMovement();
            $asset_movement->code = $asset_request->code;
            $asset_movement->lokasi_id = $asset_request->lokasi_id;
            $asset_movement->supervisor_id = $asset_request->supervisor_id;
            $asset_movement->agent_id = $asset_request->agent_id;
            $asset_movement->user_id = $asset_request->user_id;
            $asset_movement->asset_id = $asset_request->asset_id;
            $asset_movement->transaction_type = "Has been given";
            $asset_movement->transaction_date = now();
            $asset_movement->asset_custodian = $asset_request->user->name;
            $asset_movement->team_id = $asset_request->team_id;
            $asset_movement->condition_asset = $request->condition_asset;
            $asset_movement->save();

            $asset = $asset_request->asset;
            $asset->status = "Not Available";
            $asset->condition_asset = $request->condition_asset;
            $asset->asset_custodian = $asset_request->user->name;
            $asset->save();

            try {

                $user = User::find($asset_request->user_id);
                $agent = User::find($asset_request->agent_id);
                $supervisor = User::find($asset_request->supervisor_id);

                Mail::to($agent->email)
                    ->cc([$user->email, $supervisor->email])
                    ->send(new AssetEmail($asset_request, $asset,$user->name));
            } catch (\Throwable $th) {

                dd($th);
                return redirect()->route('asset-agent.index')->with('success','Request Asset successfully, Waning : email Not send');
            }

        }elseif($request->resolution === "Rejected"){

            $asset_request->transaction_type = "Rejected";
            $asset_request->note_agent = $request->note;
            $asset_request->resolution_date = now();
            $asset_request->save();

            try {

                $user = User::find($asset_request->user_id);
                $agent = User::find($asset_request->agent_id);
                $supervisor = User::find($asset_request->supervisor_id);

                Mail::to($agent->email)
                    ->cc([$user->email, $supervisor->email])
                    ->send(new AssetEmail($asset_request, $asset_request->asset,$user->name));
            } catch (\Throwable $th) {
                return redirect()->route('asset-agent.index')->with('success','transaction successfully, Waning : email Not send');
            }


        }elseif($request->resolution === "Asset Return"){

            $asset_request->transaction_type = "Received From User";
            $asset_request->note_agent = $request->note;
            $asset_request->return_date = now();
            $asset_request->asset_custodian = $asset_request->team->name;
            $asset_request->save();

            $asset_movement = new AssetMovement();
            $asset_movement->code = $asset_request->code;
            $asset_movement->lokasi_id = $asset_request->lokasi_id;
            $asset_movement->supervisor_id = $asset_request->supervisor_id;
            $asset_movement->agent_id = $asset_request->agent_id;
            $asset_movement->user_id = $asset_request->user_id;
            $asset_movement->asset_id = $asset_request->asset_id;
            $asset_movement->transaction_type = "Received From User";
            $asset_movement->transaction_date = now();
            $asset_movement->asset_custodian = $asset_request->team->name;
            $asset_movement->team_id = $asset_request->team_id;
            $asset_movement->condition_asset = $request->condition_asset;
            $asset_movement->save();

            $asset = $asset_request->asset;
            $asset->status = "Available";
            $asset->condition_asset = $request->condition_asset;
            $asset->asset_custodian = $asset_request->team->name;

            $asset->save();


            try {

                $user = User::find($asset_request->user_id);
                $agent = User::find($asset_request->agent_id);
                $supervisor = User::find($asset_request->supervisor_id);

                Mail::to($agent->email)
                    ->cc([$user->email, $supervisor->email])
                    ->send(new AssetEmail($asset_request, $asset_request->asset,$user->name));
            } catch (\Throwable $th) {
                return redirect()->route('asset-agent.index')->with('success','transaction successfully, Waning : email Not send');
            }

        }elseif($request->resolution === "Aproved Request"){

            $asset_request->transaction_type = "Received From User";
            $asset_request->note_agent = $request->note;
            $asset_request->return_date = now();
            $asset_request->asset_custodian = $asset_request->team->name;
            $asset_request->save();

            $asset_movement = new AssetMovement();
            $asset_movement->code = $asset_request->code;
            $asset_movement->lokasi_id = $asset_request->lokasi_id;
            $asset_movement->supervisor_id = $asset_request->supervisor_id;
            $asset_movement->agent_id = $asset_request->agent_id;
            $asset_movement->user_id = $asset_request->user_id;
            $asset_movement->asset_id = $asset_request->asset_id;
            $asset_movement->transaction_type = "Received From User";
            $asset_movement->transaction_date = now();
            $asset_movement->asset_custodian = $asset_request->team->name;
            $asset_movement->team_id = $asset_request->team_id;
            $asset_movement->condition_asset = $request->condition_asset;
            $asset_movement->save();

            $asset = $asset_request->asset;
            $asset->status = "Available";
            $asset->condition_asset = $request->condition_asset;
            $asset->asset_custodian = $asset_request->team->name;

            $asset->save();


            try {

                $user = User::find($asset_request->user_id);
                $agent = User::find($asset_request->agent_id);
                $supervisor = User::find($asset_request->supervisor_id);

                Mail::to($agent->email)
                    ->cc([$user->email, $supervisor->email])
                    ->send(new AssetEmail($asset_request, $asset_request->asset,$user->name));
            } catch (\Throwable $th) {
                return redirect()->route('asset-agent.index')->with('success','transaction successfully, Waning : email Not send');
            }

        }elseif($request->resolution === "Rejected Request"){
            $asset_request->transaction_type = "Has been given";
            $asset_request->note_agent = $request->note;
            $asset_request->request_return_date = null;
            $asset_request->save();

            try {

                $user = User::find($asset_request->user_id);
                $agent = User::find($asset_request->agent_id);
                $supervisor = User::find($asset_request->supervisor_id);

                Mail::to($agent->email)
                    ->cc([$user->email, $supervisor->email])
                    ->send(new AssetEmail($asset_request, $asset_request->asset,$user->name));
            } catch (\Throwable $th) {
                return redirect()->route('asset-agent.index')->with('success','transaction successfully, Waning : email Not send');
            }
        }

        return redirect()->back()->with('success','Resolution request asset successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
