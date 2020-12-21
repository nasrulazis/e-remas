<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kegiatan;

class C_Kegiatan extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        kegiatan::create([
            'nama_kegiatan' => $request['nama_kegiatan'],
            'tanggal_kegiatan' => $request['tanggal_kegiatan'],
            'deskripsi_kegiatan' => $request['deskripsi_kegiatan'],
            'id_masjid'=> $request['masjid'],
            'waktu_kegiatan'=> $request['waktu_kegiatan'],
        ]);
        return back()->withSuccess('Data berhasil ditambah!');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {        
        $id=$_GET['id'];
        kegiatan::where('id_kegiatan',$id)->update([
            'nama_kegiatan' => $request['nama_kegiatan'],
            'tanggal_kegiatan' => $request['tanggal_kegiatan'],
            'deskripsi_kegiatan' => $request['deskripsi_kegiatan'],
            'id_masjid'=> $request['masjid'],
            'waktu_kegiatan'=> $request['waktu_kegiatan'],
        ]);
        return back()->withSuccess('Data berhasil diubah!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id=$_GET['id'];
        kegiatan::destroy(array($id));
        return back()->withSuccess('Data berhasil dihapus!');;
    }
}
