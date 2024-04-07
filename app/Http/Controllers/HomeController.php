<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\Team;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Dcblogdev\MsGraph\Facades\MsGraph;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    //    $data= MsGraph::get('me');

        // $save=User::find(Auth::id());
        // $save->username= $data->displayName;
        // $save->name= $data->displayName;
        // $save->email=$data->userPrincipalName;
        // $save->save();
       
        if(Auth::user()->role=='user'){
            if(Auth::user()->teams->isEmpty()){
                foreach(Team::all() as $item){
                    Auth::user()->teams()->attach($item->id);
                }
                return redirect()->route('teams.switch', Team::first()->id);
            }

            $value = session('tenant');

            if($value){
                if(Auth::user()->CurrentTeam->code=='SA'){

                    return redirect()->route('sa.sales.user');
                }else{
        
                    return redirect('user');
                }
            }else{
                return view('tenant');
            }
        }

        if(Auth::user()->CurrentTeam->code=='SA'){
            if(Auth::user()->role=='agent'||Auth::user()->role=='agent-user')
            return redirect()->route('sa.agent.index');
            if(Auth::user()->role=='supervisor'||Auth::user()->role=='supervisor-agent'||Auth::user()->role=='supervisor-agent-user')
                return redirect()->route('sa.supervisor.index');
            if(Auth::user()->role=='manager')
                return redirect()->route('sa.supervisor.index');
            if(Auth::user()->role=='administrator')
                return redirect('user');
            else
                return back();
        }else{
            if(Auth::user()->role=='agent'||Auth::user()->role=='agent-user')
            return redirect('agent');
            if(Auth::user()->role=='supervisor'||Auth::user()->role=='supervisor-agent'||Auth::user()->role=='supervisor-agent-user')
                return redirect('supervisor');
            if(Auth::user()->role=='manager')
                return redirect('supervisor');
            if(Auth::user()->role=='administrator')
                return redirect('user');
            else
                return back();
        }
     

    }

    public function homeuser($id){
        $user = Auth::user();
        $user->current_team_id = $id;
        $user->update();
        session(['tenant' => true]);
        if(Auth::user()->CurrentTeam->code=='SA'){

            return redirect()->route('sa.sales.user');
        }else{

            return redirect('user');
        }
    }
    
    public function tenant(){
    
        return view('ticket.tenant');
    }

    public function notif(Request $request){

        $data=Notification::where('id',$request->id)->first();
        $data->read_at=now();
        $data->save();
       
        return Redirect::to($request->url);
    }
}
