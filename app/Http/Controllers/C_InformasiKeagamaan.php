<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\informasi_keagamaan;
use Auth;

class C_InformasiKeagamaan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasiKeagamaan=informasi_keagamaan::all();
        return view('v_informasiKeagamaan',compact('informasiKeagamaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v_tambahinformasiKeagamaan');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $informasiKeagamaan=New informasi_keagamaan;
        $informasiKeagamaan->judul=$request->judul;
        $informasiKeagamaan->deskripsi=$request->deskripsi;
        $informasiKeagamaan->id_anggota=Auth::user()->id_anggota;
        $informasiKeagamaan->save();
        return redirect()->route('informasiKeagamaan')->with(['flag'=>1]);
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $informasiKeagamaan=informasi_keagamaan::where('id',$id)->get();
        return view('v_informasiKeagamaandetail',compact('informasiKeagamaan'));
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
        $informasiKeagamaan=informasi_keagamaan::where('id',$id)->get();
        return view('v_editinformasiKeagamaan',compact('informasiKeagamaan'));
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
        $informasiKeagamaan = informasi_keagamaan::find($id);
        $informasiKeagamaan->judul=$request->judul;
        $informasiKeagamaan->deskripsi=$request->deskripsi;
        $informasiKeagamaan->save();
        return redirect()->route('informasiKeagamaan')->with(['flag'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasiKeagamaan = informasi_keagamaan::find($id);
        $informasiKeagamaan->delete();

        return redirect()->route('informasiKeagamaan')->with(['flag'=>2]);
    }
}
