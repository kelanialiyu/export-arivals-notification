<?php

namespace App\Http\Controllers;

use App\Models\IsoType;
use Illuminate\Http\Request;

class IsoTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isos = IsoType::all();
        return $isos;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IsoType  $isoType
     * @return \Illuminate\Http\Response
     */
    public function show(IsoType $isoType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IsoType  $isoType
     * @return \Illuminate\Http\Response
     */
    public function edit(IsoType $isoType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IsoType  $isoType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IsoType $isoType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IsoType  $isoType
     * @return \Illuminate\Http\Response
     */
    public function destroy(IsoType $isoType)
    {
        //
    }
}
