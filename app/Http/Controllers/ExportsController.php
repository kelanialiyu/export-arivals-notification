<?php

namespace App\Http\Controllers;

use App\Models\Exports;
use App\Models\ContainerInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ExportsCollection;
use App\Http\Resources\ExportsResource;

class ExportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exports = Exports::all();
        return new ExportsCollection($exports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $export = new Exports;

        DB::transaction(function () use($request, $export) {
            $export->agent = $request->agent;
            $export->save();
            foreach ($request->containers as $contain) {
                $container = new ContainerInfo;
                $container->export_id = $export->id;
                $container->iso_id = $contain["iso"];
                $container->operator_id = $contain["operator"];
                $container->vgm = $contain["vgm"];
                $container->booking_no = $contain["bookingNo"];
                $container->container_no = $contain["containerNo"];
                $container->vessel = $contain["vessel"];
                $container->port_of_discharge = $contain["portOfDischarge"];
                $container->commodity = $contain["commodity"];
                $container->shipper = $contain["shipper"];
                $container->save();
            }
        });

        return new ExportsResource($export);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exports  $exports
     * @return \Illuminate\Http\Response
     */
    public function show(Exports $exports, $id)
    {
        $exports = Exports::find($id);
        return new  ExportsResource($exports);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exports  $exports
     * @return \Illuminate\Http\Response
     */
    public function edit(Exports $exports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exports  $exports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exports $exports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exports  $exports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exports $exports)
    {
        //
    }
}
