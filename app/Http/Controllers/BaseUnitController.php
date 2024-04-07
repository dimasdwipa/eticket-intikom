<?php

namespace App\Http\Controllers;

use App\Models\BaseUnit;
use App\Http\Requests\StoreBaseUnitRequest;
use App\Http\Requests\UpdateBaseUnitRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;



class BaseUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Http\Requests\StoreBaseUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|max:255|unique:base_units,code',
            'desc' => 'required|max:255',
            'user_id' => 'required|max:255',
        ]);

        $data=new BaseUnit();
        $data->code = $request->code;
        $data->desc = $request->desc;
        $data->su_user_id = $request->su_user_id;
        $data->user_id = $request->user_id;
        $data->save();

        $email=new MailController();
        $email->notifmasterdata($data,$request,"New","Base Unit");

        return back()->with('success','Ceeate Base Unit successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaseUnit  $baseunit
     * @return \Illuminate\Http\Response
     */
    public function show(BaseUnit $baseunit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaseUnit  $baseunit
     * @return \Illuminate\Http\Response
     */
    public function edit(BaseUnit $baseunit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBaseUnitRequest  $request
     * @param  \App\Models\BaseUnit  $baseunit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $validated = $request->validate([
            'id' => 'required|max:255',
            'code' => 'required|max:255',
            'desc' => 'required',
            'user_id' => 'required',
        ]);

        $data=BaseUnit::find($request->id);

        $email=new MailController();
        $email->notifmasterdata($data,$request,"Update","Base Unit");

        $data->code=$request->code;
        $data->desc=$request->desc;
        $data->su_user_id=$request->su_user_id;
        $data->user_id=$request->user_id;
        $data->save();


        return back()->with('success','Update Base Unit successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseUnit  $baseunit
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaseUnit $baseunit)
    {
        //
    }
}
