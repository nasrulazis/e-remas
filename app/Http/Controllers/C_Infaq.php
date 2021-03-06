<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\masjid;
use App\infaq;
use Illuminate\Support\Facades\Validator;

class C_Infaq extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masjid=masjid::all();
        return view('v_infaq',compact('masjid'));
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
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,jpg,png',
            ]);
        if ($validator->fails()) {
            alert()->error('','File harus dalam format JPG,JPEG atau PNG');
            return back();
        }
        $infaq=New infaq;
        $infaq->nama_pengirim=$request->nama_pengirim;
        $infaq->id_masjid=$request->masjid;
        $infaq->infaq=$request->jumlah;
        $file=$request->file('image');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $location=public_path('/images');
        $file->move($location,$filename);
        $infaq->bukti_pembayaran=$filename;                                                        
        $infaq->status=1;
        $infaq->jenis=1;
        $infaq->save();
        return redirect()->route('infaq')->withSuccess('Data berhasil ditambah!');;
    }
    
    public function storeTakmir(Request $request)
    {        
        $jenis=$_GET['jenis'];
        $infaq=New infaq;
        $infaq->nama_pengirim=$request->nama_pengirim;
        $infaq->keterangan=$request->keterangan;
        $infaq->id_masjid=$request->masjid;
        $infaq->infaq=$request->infaq;                                                      
        $infaq->created_at=$request->tanggal;                                                      
        $infaq->status=2;
        $infaq->jenis=$jenis;
        $infaq->save();
        return back()->withSuccess('Data berhasil ditambah!');;
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jumlah=$_GET['jumlah'];
        $masjid=$_GET['masjid'];
        return view('v_infaqcheckout',compact('jumlah','masjid'));
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
        $infaq = infaq::find($id);
        $infaq->nama_pengirim=$request->nama_pengirim;
        $infaq->keterangan=$request->keterangan;
        $infaq->id_masjid=$request->masjid;
        $infaq->infaq=$request->infaq;                                                      
        $infaq->created_at=$request->tanggal;
        $infaq->save();
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
        $infaq = infaq::find($id);
        $infaq->delete();

        return back()->withSuccess('Data berhasil dihapus!');;
    }
}
