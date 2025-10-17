<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetRequest;
use App\Models\Team;
use App\Models\Asset;
use App\Models\USer;
use App\Models\AssetMovement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::orderByDesc('created_at')->get();
        return view('asset-item.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $agents = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'agent')
                    ->orwhere('role', 'agent-user');
            })

            ->orderby('name', 'asc')
            ->get();

        $supervisor = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'supervisor')
                    ->orwhere('role', 'supervisor-user');
            })
            ->orderby('name', 'asc')
            ->get();

        return view('asset-item.create')
            ->with('agents', $agents)
            ->with('supervisors', $supervisor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'tag_asset' => 'required_if:auto_generate,false|unique:assets|max:255',
            'nama_item' => 'required',
            'deskripsi' => 'nullable',
            'merek' => 'nullable',
            'model_type' => 'nullable',
            'agent_id' => 'required|integer',
            'supervisor_id' => 'required|integer',
            'image' => 'nullable|image'
        ]);
        $data = $request->all();

        if ($request->auto_generate === "on") {

            $teamCode = Auth::user()->currentTeam->code;
            $currentYear = Carbon::now()->year;
            $today = Carbon::now()->format('Y-m-d');

            // Get the last tag_asset for today
            $lastAsset = Asset::whereDate('created_at', $today)
                ->where('tag_asset', 'like', $teamCode . $currentYear . '%')
                ->orderBy('tag_asset', 'desc')
                ->first();

            // Generate the new sequence number
            if ($lastAsset) {
                $lastNumber = (int) substr($lastAsset->tag_asset, -6);
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }

            $sequenceNumber = str_pad($newNumber, 6, '0', STR_PAD_LEFT);
            $data['tag_asset'] = $teamCode . $currentYear . $sequenceNumber;
        }


        $asset = new Asset($data);
        $asset->asset_custodian = Auth::user()->currentTeam->name;
        $asset->save();

        if ($request->hasFile('image')) {
            $asset->image = $request->file('image')->store('files/assets', 'public');
        }

        $asset->save();

        return redirect()->route('asset-item.index')->with('success', 'Asset created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        return view('asset-item.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $agents = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'agent')
                    ->orwhere('role', 'agent-user');
            })

            ->orderby('name', 'asc')
            ->get();

        $supervisor = User::GetTeam()
            ->where(function ($query) {
                $query->where('role', 'supervisor-agent')
                    ->orwhere('role', 'supervisor-agent-user')
                    ->orwhere('role', 'supervisor')
                    ->orwhere('role', 'supervisor-user');
            })
            ->orderby('name', 'asc')
            ->get();

        $asset = Asset::find($id);

        return view('asset-item.edit', compact('asset'))
            ->with('agents', $agents)
            ->with('supervisors', $supervisor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_item' => 'required',
            'deskripsi' => 'nullable',
            'merek' => 'nullable',
            'model_type' => 'nullable',
            'agent_id' => 'required|integer',
            'supervisor_id' => 'required|integer',
            'image' => 'nullable|image',
        ]);

        $asset = Asset::find($id);
        $asset->tag_asset = $request->input('tag_asset');
        $asset->nama_item = $request->input('nama_item');
        $asset->deskripsi = $request->input('deskripsi');
        $asset->condition_asset = $request->input('condition_asset');
        $asset->merek = $request->input('merek');
        $asset->model_type = $request->input('model_type');
        $asset->agent_id = $request->input('agent_id');
        $asset->supervisor_id = $request->input('supervisor_id');

        if ($request->hasFile('image')) {
            if ($asset->image) {
                Storage::disk('public')->delete($asset->image);
            }
            $asset->image = $request->file('image')->store('files/assets', 'public');
        }

        $asset->update();

        return redirect()->route('asset-item.index')->with('success', 'Asset updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $asset = Asset::find($id);
        $asset->status = "Delete";
        $asset->update();

        return redirect()->route('asset-item.index')->with('success', 'Asset deleted successfully.');
    }
}
