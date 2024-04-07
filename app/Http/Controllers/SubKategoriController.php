<?php

namespace App\Http\Controllers;

use App\Models\SubKategori;
use App\Http\Requests\StoreSubKategoriRequest;
use App\Http\Requests\UpdateSubKategoriRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSubKategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'sub_kategori' => 'required|max:255',
            'katagori_id' => 'required|max:255'
        ]);

        $data=new SubKategori();
        $data->katagori_id=$request->katagori_id;
        $data->sub_kategori=$request->sub_kategori;
        $data->agent_id=$request->agent_id;
        $data->supervisor_id=$request->supervisor_id;
        $data->extend_ticket_SLA_default=$request->extend_ticket_SLA_default;
        $data->extend_response_SLA_default=$request->extend_response_SLA_default;
        $data->send_assignment_default=$request->send_assignment_default;
        $data->save();

        $email=new MailController();
        $email->notifmasterdata($data,$request,"New","Sub Category");

        return back()->with('success','Create sub category successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function show(SubKategori $subKategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function edit(SubKategori $subKategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubKategoriRequest  $request
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validated = $request->validate([
            'sub_kategori' => 'required|max:255',
            'id' => 'required|max:255'
        ]);


        $data=SubKategori::find($request->id);

        $email=new MailController();
        $email->notifmasterdata($data,$request,"Update","Sub Category");

        $data->sub_kategori=$request->sub_kategori;
        $data->extend_ticket_SLA_default=$request->extend_ticket_SLA_default;
        $data->extend_response_SLA_default=$request->extend_response_SLA_default;
        $data->agent_id=$request->agent_id;
        $data->supervisor_id=$request->supervisor_id;
        $data->send_assignment_default=$request->send_assignment_default;
        $data->save();
        return back()->with('success','Update sub category successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubKategori $subKategori)
    {
        //
    }
}
