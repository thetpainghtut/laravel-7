<?php

namespace App\Http\Controllers;

use App\Ptype;
use Illuminate\Http\Request;
use App\Http\Resources\PtypeResource;

class PtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptypes = Ptype::all();
        
        return response()->json([
            'status' => 'ok',
            'totalResults' => count($ptypes),
            'ptypes' => PtypeResource::collection($ptypes)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        //validation
        $request->validate([
            'name' => 'required'
        ]);

        // if include file, upload

        // save 
        $ptype = new Ptype;
        $ptype->name = $request->name;
        $ptype->save();

        // response
        return (new PtypeResource($ptype))
                    ->response()
                    ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ptype  $ptype
     * @return \Illuminate\Http\Response
     */
    public function show(Ptype $ptype)
    {
        return new PtypeResource($ptype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ptype  $ptype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ptype $ptype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ptype  $ptype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ptype $ptype)
    {
        //
    }
}
