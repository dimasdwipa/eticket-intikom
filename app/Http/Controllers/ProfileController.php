<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        $data=Auth::user();
        return view('profile.create',compact('data'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Profile::find($request->profile);
        // $data->
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileRequest  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|confirmed|unique:users,email,'.$profile->id,
        ]);

        $profile->name = $request->name;
        $profile->last_name = $request->last_name;
        $profile->email = $request->email;
        $profile->location = $request->location;
        $profile->phone = $request->phone;
        $profile->departemen_corporate = $request->departemen_corporate;
        $profile->position_corporate = $request->position_corporate;
        $profile->update();

        return back()->with('success','Update your profile successfully');
    }
    
    public function permission(Request $request, User $profile)
    {
        $profile->permission = $request->permission;
        $profile->permission_days = $request->permission_days;
        $profile->permission_desc = $request->permission_desc;
        $profile->update();

        return back()->with('success','Update your permission successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
