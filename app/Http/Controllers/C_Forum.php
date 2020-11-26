<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\forum;

class C_Forum extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:anggota');        
    }
    public function index()
    {
        $forums = forum::orderBy('updated_at', 'desc')->get();
        return view('v_forum',['forums' => $forums]);
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
        $forums = New forum;
        $forums->id_anggota = Auth::user()->id_anggota;
        $forums->title = $request->title;
        $forums->slug = str_slug($request->title);
        $forums->deskripsi = $request->deskripsi;
        $forums->save();

        return back();
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $forums = forum::find($id);
        $forums->id_anggota = Auth::user()->id_anggota;
        $forums->title = $request->title;
        $forums->slug = str_slug($request->title);
        $forums->deskripsi = $request->deskripsi;
        $forums->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forums = forum::find($id);
        $forums->delete();

        return back();
    }
}
