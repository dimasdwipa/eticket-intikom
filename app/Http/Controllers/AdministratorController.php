<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdministratorController extends Controller
{
    // Menampilkan halaman konfirmasi penghapusan
    public function index()
    {
        return view('admin.delete-data-years');
    }

    // Menghapus data tahun lalu
    public function deleteLastYearData()
    {
        $lastYear = Carbon::now()->subYear()->year;

        try {
            DB::beginTransaction();

            // $deletedLogs = DB::table('logs')
            //     ->whereYear('log_date', '<=', $lastYear)
            //     ->delete();

            $deletedTickets = DB::table('tickets')
            // ->whereIn('status', ['Closed','Resolved', 'Canceled'])
                ->whereYear('created_at', '<=', $lastYear)
                ->delete();

            $deletedComplains = DB::table('complains')
                ->whereNotIn('ticket_id', DB::table('tickets')->pluck('id'))
                ->whereYear('created_at', '<=', $lastYear)
                ->delete();

            $deletedFileManager = DB::table('file_managers')
                ->whereNotIn('model_id', DB::table('tickets')->pluck('id'))
                ->whereYear('created_at', '<=', $lastYear)
                ->delete();

            $deletedNotifications = DB::table('notifications')
                ->whereYear('created_at', '<=', $lastYear)
                ->delete();

            DB::commit();

            return redirect()->route('delete-data-form')->with('success', "Last year's data was successfully delete!");

        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('delete-data-form')->with('error', 'Failed to delete data: ' . $e->getMessage());
        }

        return redirect()->route('delete-data-form')->with('message', "Last year's data was successfully deleted!");
    }
}
