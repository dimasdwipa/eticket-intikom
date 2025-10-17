<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect('login');
// });


Auth::routes(['Register'=>false,'reset' => false,'confirm' => false]);

Route::get('/test/{id}', [ App\Http\Controllers\TestController::class, 'index'])->name('sa.test');
Route::get('/guest/dashboard/{id}', function () { return view('guest.dashboard'); })->name('guest.dashboard');

Route::redirect('/', 'login');

Route::group(['middleware' => ['web', 'guest']], function(){
    Route::get('login', [ App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
    Route::get('connect',  [ App\Http\Controllers\Auth\AuthController::class, 'connect'])->name('connect');
    // Route::get('msgraph/oauth',  [ App\Http\Controllers\Auth\AuthController::class, 'connect'])->name('msgraph-oauth');
});

Route::group(['middleware' => ['web', 'MsGraphAuthenticated'], 'prefix' => 'app'], function(){
    Route::get('/',  [ App\Http\Controllers\HomeController::class, 'index'])->name('app');
    Route::get('logout',  [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('log-out');
});

Route::middleware(['auth'])->group(function (){





    Route::get('/delete-data-years', [App\Http\Controllers\AdministratorController::class, 'index'])->name('delete-data-form');
    Route::post('/delete-data-years', [App\Http\Controllers\AdministratorController::class, 'deleteLastYearData'])->name('delete-data-action');



    Route::get('/home', [ App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('select/tenant', [ App\Http\Controllers\HomeController::class, 'tenant'])->name('select.tenant');
    Route::get('/homeuser/{id}', [ App\Http\Controllers\HomeController::class, 'homeuser'])->name('homeuser');
    Route::post('/notif', [ App\Http\Controllers\HomeController::class, 'notif'])->name('notif');


    Route::resource('/profile', App\Http\Controllers\ProfileController::class);
    Route::put('/permission/{profile}', [App\Http\Controllers\ProfileController::class,'permission'])->name('permission.update');



    Route::get('/user', [ App\Http\Controllers\TicketController::class, 'index'])->name('user');
    Route::resource('/ticket', App\Http\Controllers\TicketController::class);
    Route::get('/summary-report', [App\Http\Controllers\TicketController::class,'report'])->name('summary-report');
    Route::get('/api/summary-report', [App\Http\Controllers\TicketController::class, 'getSummaryReportApi'])->name('api.summary-report');

    Route::post('/ticket-close', [App\Http\Controllers\TicketController::class,'close'])->name('ticket-close');
    Route::post('/ticket-rating', [App\Http\Controllers\TicketController::class,'rating'])->name('ticket-rating');
    Route::post('/ticket-complain', [App\Http\Controllers\TicketController::class,'complain'])->name('ticket-complain');

    Route::resource('/supervisor', App\Http\Controllers\SupervisorController::class);
    Route::get('/supervisor-assignment', [App\Http\Controllers\SupervisorController::class,'assignment'])->name('supervisor.assignment');
    Route::post('/supervisor-tasking', [App\Http\Controllers\SupervisorController::class,'storetask'])->name('supervisor.storetask');
    Route::get('/summary-report-sumpervisor', [App\Http\Controllers\SupervisorController::class,'report'])->name('supervisor.summary-report-sumpervisor');
    Route::post('/summary-report-sumpervisor-update', [App\Http\Controllers\SupervisorController::class,'updatereport'])->name('supervisor.summary-report-sumpervisor-update');

    Route::get('/summary-report-sumpervisor-sla', [App\Http\Controllers\SupervisorController::class,'sla_report'])->name('supervisor.summary-report-sumpervisor-sla');
    Route::get('/summary-report-sumpervisor-sla-sa', [App\Http\Controllers\SupervisorController::class,'sla_report_sa'])->name('supervisor.summary-report-sumpervisor-sla_sa');
    Route::get('/supervisor-request-extend', [App\Http\Controllers\SupervisorController::class,'request_extend'])->name('supervisor.request-extend');
    Route::post('/supervisor-request-extend-Update', [App\Http\Controllers\SupervisorController::class,'request_extend_update'])->name('supervisor.request-extend-update');

    Route::resource('agent', App\Http\Controllers\AgentController::class);
    Route::get('/my-ticket', [App\Http\Controllers\AgentController::class,'assignment'])->name('agent.myticket');
    Route::post('/agent-response', [App\Http\Controllers\AgentController::class,'response'])->name('agent.response');
    Route::post('/agent-request', [App\Http\Controllers\AgentController::class,'request'])->name('agent.request');

    Route::get('/request-extend', [App\Http\Controllers\AgentController::class,'request_extend'])->name('agent.request-extend');
    Route::get('/agent-complain', [App\Http\Controllers\AgentController::class,'complain'])->name('agent.complain');
    Route::get('/supervisor-complain', [App\Http\Controllers\SupervisorController::class,'complain'])->name('supervisor.complain');

    Route::resource('master/location', App\Http\Controllers\LokasiController::class);
    Route::resource('master/category', App\Http\Controllers\KategoriController::class);
    Route::resource('master/sub-category', App\Http\Controllers\SubKategoriController::class);
    Route::resource('master/base-unit', App\Http\Controllers\BaseUnitController::class);
    Route::resource('master/user', App\Http\Controllers\UserController::class);

    Route::get('/import-user', [App\Http\Controllers\SupervisorController::class,'import_user'])->name('import.user.ldap');

    Route::resource('/asset-request', App\Http\Controllers\AssetRequestController::class);
    Route::resource('/asset-agent', App\Http\Controllers\AssetAgentController::class);
    Route::resource('/asset-supervisor', App\Http\Controllers\AssetSupervisorController::class);
    Route::resource('/asset-item', App\Http\Controllers\AssetController::class);
    Route::get('/asset-report', [App\Http\Controllers\AssetSupervisorController::class,'report_asset'])->name('asset_report');
    Route::get('/asset-report-movement', [App\Http\Controllers\AssetSupervisorController::class,'report_movement_asset'])->name('report_movement_asset');



    /**
     * Teamwork routes
     */
    Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
    {
        Route::get('/', [App\Http\Controllers\Teamwork\TeamController::class, 'index'])->name('teams.index');
        Route::post('request', [App\Http\Controllers\Teamwork\TeamController::class, 'requestTeam'])->name('teams.request');
        Route::post('aprove', [App\Http\Controllers\Teamwork\TeamController::class, 'aprove'])->name('teams.request.aprove');
        Route::post('reject', [App\Http\Controllers\Teamwork\TeamController::class, 'reject'])->name('teams.request.reject');
        Route::get('create', [App\Http\Controllers\Teamwork\TeamController::class, 'create'])->name('teams.create');
        Route::post('teams', [App\Http\Controllers\Teamwork\TeamController::class, 'store'])->name('teams.store');
        Route::get('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'edit'])->name('teams.edit');
        Route::put('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'update'])->name('teams.update');
        Route::delete('destroy/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'destroy'])->name('teams.destroy');
        Route::get('switch/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'switchTeam'])->name('teams.switch');

        Route::get('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'show'])->name('teams.members.show');
        Route::get('members/resend/{invite_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
        Route::post('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'invite'])->name('teams.members.invite');
        Route::delete('members/{id}/{user_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'destroy'])->name('teams.members.destroy');

        Route::get('accept/{token}', [App\Http\Controllers\Teamwork\AuthController::class, 'acceptInvite'])->name('teams.accept_invite');
    });





});

Route::group(['prefix' => 'sa','name'=>'sa.' ,'middleware' => 'auth'], function () {
    Route::get('/sales-admin', [ App\Http\Controllers\SalesTicketController::class, 'index'])->name('sa.sales.user');
    Route::resource('sales-ticket', App\Http\Controllers\SalesTicketController::class)->names('sa.sales-ticket');
    Route::post('/sales-ticket/trush/{id}', [App\Http\Controllers\SalesTicketController::class,'destroy'])->name('sa.sales-ticket.trush');
    // supervisor
    Route::resource('supervisor', App\Http\Controllers\SalesSupervisorController::class)->names('sa.supervisor');
    Route::get('/supervisor-request-extend', [App\Http\Controllers\SalesSupervisorController::class,'request_extend'])->name('sa.supervisor.request-extend');
    Route::post('/supervisor-request-extend-Update', [App\Http\Controllers\SalesSupervisorController::class,'request_extend_update'])->name('sa.supervisor.request-extend-update');
    Route::get('/supervisor-complain', [App\Http\Controllers\SalesSupervisorController::class,'complain'])->name('sa.supervisor.complain');
    Route::get('/summary-report-sumpervisor-sla-sa', [App\Http\Controllers\SalesSupervisorController::class,'sla_report_sa'])->name('sa.supervisor.summary-report-sumpervisor-sla_sa');
    Route::get('/summary-report-sumpervisor', [App\Http\Controllers\SalesSupervisorController::class,'report'])->name('sa.supervisor.summary-report-sumpervisor');
    Route::post('/summary-report-sumpervisor-update', [App\Http\Controllers\SalesSupervisorController::class,'updatereport'])->name('sa.supervisor.summary-report-sumpervisor-update');

    //agent
    Route::resource('agent', App\Http\Controllers\SalesAgentController::class)->names('sa.agent');
    Route::get('/my-ticket', [App\Http\Controllers\SalesAgentController::class,'assignment'])->name('sa.agent.myticket');
    Route::post('/agent-response', [App\Http\Controllers\SalesAgentController::class,'response'])->name('sa.agent.response');
    Route::post('/agent-request', [App\Http\Controllers\SalesAgentController::class,'request'])->name('sa.agent.request');

    Route::get('/request-extend', [App\Http\Controllers\SalesAgentController::class,'request_extend'])->name('sa.agent.request-extend');
    Route::get('/agent-complain', [App\Http\Controllers\SalesAgentController::class,'complain'])->name('sa.agent.complain');


    // user
    Route::get('/summary-report', [App\Http\Controllers\SalesTicketController::class,'report'])->name('sa.summary-report');
    Route::post('/ticket-complain', [App\Http\Controllers\SalesTicketController::class,'complain'])->name('sa.ticket-complain');
});

if (app()->isLocal()) {
    Route::get('/login-local', function () {
        $user = \App\Models\User::where('email', 'developer@local.com')->first();
        if ($user) {
            auth()->login($user);
            return redirect('/user'); // Arahkan ke halaman utama setelah login
        }
        return 'User local tidak ditemukan. Jalankan seeder terlebih dahulu.';
    });
}
