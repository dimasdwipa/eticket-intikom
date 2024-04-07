<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=User::GetTeam()->where(function($query){
            $query->where('role','user')
            ->orwhere('role','agent')
            ->orwhere('role','agent-user');
        })
        ->when(!empty($_GET['filter_by']),function($query){
            return $query->where($_GET['filter_by'], 'like',  '%'.$_GET['keyword'].'%');
         })
        ->get();

        return view('master.agent')
        ->with('users',$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data=User::GetTeam()->where(function($query){
            $query->where('role','agent')
            ->orWhere('role','supervisor')
            ->orWhere('role','supervisor-user')
            ->orwhere('role','supervisor-agent')
            ->orwhere('role','supervisor-agent-user')
            ->orwhere('role','agent')
            ->orwhere('role','agent-user')
            ->orWhere('role','user');
        })
        ->when(!empty($_GET['filter_by']),function($query){
            return $query->where($_GET['filter_by'], 'like',  '%'.$_GET['keyword'].'%');
         })
        ->get();



        return view('master.supervisor')
        ->with('users',$data);
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
        Auth::loginUsingId($id);

        return redirect('');
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
    public function update(Request $request)
    {


        $validated = $request->validate([
            'role' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$request->id,
            'employee_id' => 'required|max:255',
            'id' => 'required|max:255',
        ]);

        $data=User::find($request->id);
        $data->email=$request->email;
        $data->role=$request->role;
        $data->employee_id=$request->employee_id;
        $data->save();
        return back()->with('success','Update successfully.');
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
