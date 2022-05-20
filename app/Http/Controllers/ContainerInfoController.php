<?php

namespace App\Http\Controllers;

use App\Models\ContainerInfo;
use Illuminate\Http\Request;
use App\Http\Resources\ContainerResource;
use App\Http\Resources\ContainerCollection;

class ContainerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $containers = containerInfo::all();
        return new ContainerCollection($containers);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContainerInfo  $containerInfo
     * @return \Illuminate\Http\Response
     */
    public function show(ContainerInfo $containerInfo, $id)
    {
        $container = ContainerInfo::find($id);
        return new ContainerCollection($container);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContainerInfo  $containerInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(ContainerInfo $containerInfo)
    {
        return $containerInfo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContainerInfo  $containerInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContainerInfo $container)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContainerInfo  $containerInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContainerInfo $containerInfo)
    {
        //

    }
}
