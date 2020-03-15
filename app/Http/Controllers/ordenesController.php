<?php

namespace App\Http\Controllers;

use App\mdlOrdenes;
use Illuminate\Http\Request;

class ordenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }
    public static function idLast(){
        $u = mdlOrdenes::orderBy('id','ASC')->get()->last();
        return $u;
    }
    public static function todos(){
        $t = mdlOrdenes::orderBy('id','DESC')->get();
        return $t;
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
     * @param  \App\mdlOrdenes  $mdlOrdenes
     * @return \Illuminate\Http\Response
     */
    public function show(mdlOrdenes $mdlOrdenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mdlOrdenes  $mdlOrdenes
     * @return \Illuminate\Http\Response
     */
    public function edit(mdlOrdenes $mdlOrdenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mdlOrdenes  $mdlOrdenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mdlOrdenes $mdlOrdenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mdlOrdenes  $mdlOrdenes
     * @return \Illuminate\Http\Response
     */
    public function destroy(mdlOrdenes $mdlOrdenes)
    {
        //
    }
}
