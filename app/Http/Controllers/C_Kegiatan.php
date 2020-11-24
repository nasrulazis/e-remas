<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kegiatan;

class C_Kegiatan extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    protected $redirectTo = "{{route('admin.kegiatan')}}";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = DB::table('kegiatan')->get();
        return view('v_kegiatan',['kegiatan' => $kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminKegiatan');
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
            'tempat_kegiatan'=> $request['tempat_kegiatan'],
            'waktu_kegiatan'=> $request['waktu_kegiatan'],
        ]);
        return redirect()->route('admin.kegiatan');
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
    public function edit()
    {
        $id=$_GET['id'];
        $kegiatan = kegiatan::where('id_kegiatan', $id)->get();
        // dd();
        return view('v_formkegiatan', ['kegiatan' => $kegiatan]);
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
            'tempat_kegiatan'=> $request['tempat_kegiatan'],
            'waktu_kegiatan'=> $request['waktu_kegiatan'],
        ]);
        return redirect()->route('admin.kegiatan');
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
        return redirect()->route('admin.kegiatan');
    }
}
