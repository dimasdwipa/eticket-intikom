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
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AssetSupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $data =AssetRequest::where('supervisor_id', Auth::id())->orderby('created_at', 'desc')->get();
        // dd(AssetRequest::get(),Auth::id(),$data);
        return view('asset-supervisor.index')
            ->with('agents', $agents)
            ->with('asset_request', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function report_asset(Request $request)
    {

        // Set default start and end dates
        $defaultStartDate = now()->subMonth()->startOfMonth()->format('Y-m-d');
        $defaultEndDate = now()->endOfMonth()->format('Y-m-d');

        // Get filter dates from request or use defaults
        $startDate = $request->filled('transaction_start_date') ? $request->transaction_start_date : $defaultStartDate;
        $endDate = $request->filled('transaction_end_date') ? $request->transaction_end_date : $defaultEndDate;

        // Apply start and end date filters
        $query = AssetRequest::whereDate('transaction_date', '>=', $startDate)
            ->whereDate('transaction_date', '<=', $endDate);

        // Order by created_at descending
        $asset_requests = $query->orderby('created_at', 'desc')->get();

        // Return view with filtered results
        return view('asset-supervisor.report')->with('asset_request', $asset_requests);
    }

    public function report_movement_asset(Request $request)
    {
        $query = AssetMovement::query()
            ->with(['asset', 'lokasi', 'supervisor', 'agent', 'user']);

        // Ambil data untuk filter Tag Asset / Item Name
        $assets = Asset::all();

        // Filter berdasarkan Tag Asset dan Item Name
        if ($request->filled('tag_item')) {
            $tagItem = $request->input('tag_item');
            [$tag, $itemName] = explode('|', $tagItem) + [null, null];
            $query->whereHas('asset', function ($q) use ($tag, $itemName) {
                if ($tag) {
                    $q->where('tag_asset', 'like', "%$tag%");
                }
                if ($itemName) {
                    $q->orWhere('nama_item', 'like', "%$itemName%");
                }
            });
        }

        // Filter berdasarkan Transaction Type
        if ($request->filled('transaction_type') && $request->input('transaction_type') !== 'all') {
            $query->where('transaction_type', $request->input('transaction_type'));
        }

        // Filter berdasarkan Transaction Date
        if ($request->filled('transaction_start_date') && $request->filled('transaction_end_date')) {
            $query->whereBetween('transaction_date', [
                $request->input('transaction_start_date'),
                $request->input('transaction_end_date')
            ]);
        }

        // Filter berdasarkan Penagung Jawab Asset
        if ($request->filled('asset_custodian')) {
            $query->where('asset_custodian', 'like', "%" . $request->input('asset_custodian') . "%");
        }

        $assetMovements = $query->orderby('created_at', 'desc')->get();

        return view('asset-supervisor.asset-movement', compact('assetMovements', 'assets'));
    }

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
        //
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
        $AssetRequest = AssetRequest::find($id);
        $AssetRequest->agent_id = $request->agent;
        $AssetRequest->save();

        return redirect()->back()->with('success', 'Change agent successfully.');
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
