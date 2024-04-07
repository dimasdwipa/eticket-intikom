<?php

namespace App\Http\Controllers\Teamwork;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mpociot\Teamwork\Exceptions\UserNotInTeamException;
use App\Models\User;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\TeamRequest;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teamwork.index')
            ->with('teams', auth()->user()->teams)
            ->with('allteams', Team::orderby('created_at','desc')->get())
            ->with('requestteams', TeamRequest::orderby('created_at','desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teamwork.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:teams',
            'name' => 'required|string',
        ]);

        $teamModel = config('teamwork.team_model');

        $team = $teamModel::create([
            'code' => $request->code,
            'name' => $request->name,
            'owner_id' => $request->user()->getKey(),
        ]);


        $request->user()->attachTeam($team);

        
        foreach(User::where('role','user')->get() as $user){
            $user->attachTeam($team);
        }

        return redirect(route('teams.index'));
    }

    /**
     * Switch to the given team.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function requestTeam(Request $request)
    {
        TeamRequest::updateOrCreate([
            'team_id'=>$request->teams,
            'user_id'=>Auth::user()->id
        ],
        [
            'status'=>'pending'
        ]);
   

        return redirect('teams');
    }
    public function aprove(Request $request)
    {
        TeamUser::updateOrCreate([
            'team_id'=>$request->team_id,
            'user_id'=>$request->user_id
        ]);
   
        TeamRequest::destroy($request->id);
        return redirect('teams');
    }

    public function reject(Request $request)
    {
        TeamRequest::update([
            'team_id'=>$request->team_id,
            'user_id'=>$request->user_id
        ],[
            'status'=>'reject'
        ]);

        return redirect('teams');
    }
    
    public function switchTeam($id)
    {
        $teamModel = config('teamwork.team_model');
        $team = $teamModel::findOrFail($id);
        try {
            auth()->user()->switchTeam($team);
        } catch (UserNotInTeamException $e) {
            abort(403);
        }

        return redirect(route('home'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teamModel = config('teamwork.team_model');
        $team = $teamModel::findOrFail($id);

        if (! auth()->user()->isOwnerOfTeam($team)) {
            abort(403);
        }

        return view('teamwork.edit')->withTeam($team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);

        $teamModel = config('teamwork.team_model');

        $team = $teamModel::findOrFail($id);
        $team->name = $request->name;
        $team->code = $request->code;
        $team->save();

        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teamModel = config('teamwork.team_model');

        $team = $teamModel::findOrFail($id);
        if (! auth()->user()->isOwnerOfTeam($team)) {
            abort(403);
        }

        $team->delete();

        $userModel = config('teamwork.user_model');
        $userModel::where('current_team_id', $id)
                    ->update(['current_team_id' => null]);

        return redirect(route('teams.index'));
    }
}
