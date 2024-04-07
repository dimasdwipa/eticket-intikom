<?php

namespace App\Http\Controllers;

use App\Models\FileManager;
use App\Http\Requests\StoreFileManagerRequest;
use App\Http\Requests\UpdateFileManagerRequest;

class FileManagerController extends Controller
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
     * @param  \App\Http\Requests\StoreFileManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileManagerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function show(FileManager $fileManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function edit(FileManager $fileManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileManagerRequest  $request
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileManagerRequest $request, FileManager $fileManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileManager  $fileManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileManager $fileManager)
    {
        //
    }
}
