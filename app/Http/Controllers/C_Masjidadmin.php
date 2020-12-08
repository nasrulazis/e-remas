<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\masjid;

class C_Masjidadmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');        
    }

    public function index()
    {
        $masjid=masjid::all();
        return view('v_masjidadmin',compact('masjid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v_tambahmasjid');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masjids=New masjid;
        $masjids->nama_masjid=$request->nama_masjid;
        $masjids->alamat=$request->alamat;
        $masjids->save();
        
        
        return redirect()->route('admin.masjid');
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
        //
        // $id=$_GET['id'];
        $masjid=masjid::where('id',$id)->get();        
        return view('v_editmasjid',compact('masjid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $masjids=masjid::find($id);
        $masjids->nama_masjid=$request->nama_masjid;
        $masjids->alamat=$request->alamat;
        $masjids->save();
        
        
        return redirect()->route('admin.masjid');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $masjid = masjid::find($id);
        $masjid->delete();

        return back();
    }
}
