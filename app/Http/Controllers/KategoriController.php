<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Lokasi;
use App\Models\BaseUnit;
use App\Models\User;
use App\Models\Team;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users=User::All();

        $agents = User::GetTeam()
        ->where(function($query){
            $query->where('role','supervisor-agent')
            ->orwhere('role','supervisor-agent-user')
            ->orwhere('role','agent')
            ->orwhere('role','agent-user');
        })
            ->orderby('name', 'asc')
            ->get();

       $supervisors = User::GetTeam()
        ->where(function($query){
            $query->where('role', 'supervisor')
            ->orwhere('role', 'supervisor-agent')
            ->orwhere('role','supervisor-agent-user')
            ->orwhere('role','supervisor-user');
        })->orderby('users.name', 'asc')
            ->get();


        return view('master.katagori')
        ->with('users',$users)
        ->with('agents',$agents)
        ->with('supervisors',$supervisors)
        ->with('lokasi',Lokasi::orderby('created_at','desc')->get())
        ->with('category',Kategori::orderby('created_at','desc')->get())
        ->with('subcategory',SubKategori::orderby('created_at','desc')->get())
        ->with('baseunit',BaseUnit::orderby('created_at','desc')->get());
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
     * @param  \App\Http\Requests\StoreKategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori' => 'required|max:255',
        ]);

        $data=new Kategori();
        $data->kategori=$request->kategori;

        $email=new MailController();
        $email->notifmasterdata($data,$request,"New","category");

        $data->save();
        return back()->with('success','Create category successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriRequest  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|max:255',
            'kategori' => 'required|max:255|unique:kategoris,kategori',
        ]);
        $data=Kategori::find($request->id);

        $email=new MailController();
        $email->notifmasterdata($data,$request,"Update","category");

        $data->kategori=$request->kategori;
        $data->save();
        return back()->with('success','Update category successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
