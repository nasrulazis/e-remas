@extends('layouts.app')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
            <div class="container">
                <h1>Detail Masjid</h1>
            </div>
        </header>
    <div class="container-fluid">                
                <div class="row m-4  justify-content-start">
                    
                    @foreach($masjid as $key=>$data)
                        <!-- Column -->                                                                  
                        <div class="col-lg-1"></div>                        
                        <div class="col-lg-10 col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="left">
                                    <h3>{{$data->nama_masjid}}</h3>
                                    <p>{{$data->alamat}}</p>
                                    </div>                                    
                                    <div class="right align-items-center d-flex">                                    
                                    </div>

                                    <h5>Laporan Keuangan</h5>
                                    @if($infaq->isNotEmpty())
                                    <table class="table m-0">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pengirim</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($infaq as $key=>$data)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$data->nama_pengirim}}</td>
                                                <td></td>
                                                <td>Rp.{{number_format(floatval($data->infaq))}}</td>
                                                <td>{{$data->created_at->format('Y-m-d')}}</td>
                                                
                                            </tr>                                        
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                        <p>Belum ada data</p>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->                                          
                        <div class="col-lg-1"></div>                        
                    @endforeach
                </div>
                
                <div class="row m-4">
                <div class="col-lg-1"></div> 
                    <div class="col-lg-10">

                    <h4>Kegiatan Masjid</h4>
                    @if(Auth::check())
                        @if(Auth::user()->id_masjid==$data->id)
                        <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahModal">+ Kegiatan</a>                    
                        @endif
                    @endif
                    @if($kegiatan->isEmpty())
                    <div class="card">
                        <div class="card-body">
                            <p class="m-0">Tidak ada kegiatan</p>
                        </div>
                    </div>
                    @endif
                    @foreach($kegiatan as $key=>$data)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$data->nama_kegiatan}}</h5>
                            <?php
                                $masjid=App\masjid::where('id',$data->id_masjid)->first();                                   
                            ?>
                            <h6 class="card-subtitle text-muted mb-2">Masjid {{$masjid->nama_masjid}}</h6>
                            <p class="card-text">{{$data->tanggal_kegiatan}}, {{$data->waktu_kegiatan}} WIB</p>
                            @if(Auth::check())
                                @if(Auth::user()->id_masjid==$masjid->id)
                                <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#editModal{{$data->id}}">Edit Kegiatan</a>                    
                                <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="fas fa-trash"></i></a>                    
                                @endif
                            @endif
                        </div>
                    </div>
                    @endforeach

                    </div>
                <div class="col-lg-1"></div> 
                </div>
    </div>

     <!-- Modal tambah Kegiatan -->
     @foreach($kegiatan as $key => $data)
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModal"
            aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header bg-light">                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!--Body-->
                    <form class="text-center border border-light px-5 py-2" method="post" action="{{route('tambahkegiatan')}}">
                    @csrf
                    <div class="modal-body ">                        
                            <p class="h4 mb-4">Tambah Kegiatan</p>
                            <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nama Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder=""
                                                class="form-control p-0 border-0" name="nama_kegiatan"> </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Deskripsi Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" class="form-control border-0" name="deskripsi_kegiatan" >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Tempat Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select class="form-control" id="masjid" name="masjid">
                                                @if(Auth::check())
                                                <?php
                                                    $masjid=App\masjid::where('id',Auth::user()->id_masjid)->get();                                   
                                                ?>
                                                @foreach($masjid as $key=>$data)
                                                <option value="{{$data->id}}" selected>{{$data->nama_masjid}}</option>
                                                @endforeach                                          
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Tanggal Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" class="form-control border-0" name="tanggal_kegiatan" >
                                            
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Waktu Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="time" class="form-control border-0" name="waktu_kegiatan">
                                        </div>
                                    </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center ">
                        <input type="submit" class="btn btn-primary" value="Kirim">                        
                        <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Batal</a>
                    </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
        @endforeach
        <!-- Modal tambah Kegiatan-->
     <!-- Modal Edit Kegiatan -->
     @foreach($kegiatan as $key => $data)
        <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal"
            aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header bg-light">                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!--Body-->
                    <form class="text-center border border-light px-5 py-2" method="post" action="{{route('updatekegiatan')}}?id={{$data->id_kegiatan}}">
                    @csrf
                    <div class="modal-body ">                        
                            <p class="h4 mb-4">Edit Kegiatan</p>
                            <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Nama Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder=""
                                                class="form-control p-0 border-0" name="nama_kegiatan" value="{{$data->nama_kegiatan}}"> </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Deskripsi Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" class="form-control border-0" name="deskripsi_kegiatan" value="{{$data->deskripsi_kegiatan}}">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Tempat Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select class="form-control" id="masjid" name="masjid">
                                                @if(Auth::check())
                                                <?php
                                                    $masjid=App\masjid::where('id',Auth::user()->id_masjid)->get();                                   
                                                ?>
                                                @foreach($masjid as $key=>$data)
                                                <option value="{{$data->id}}" selected>{{$data->nama_masjid}}</option>
                                                @endforeach                                           
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Tanggal Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" class="form-control border-0" name="tanggal_kegiatan" value="{{$data->tanggal_kegiatan}}">
                                            
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Waktu Kegiatan</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="time" class="form-control border-0" name="waktu_kegiatan" value="{{$data->waktu_kegiatan}}">
                                        </div>
                                    </div>
                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center ">
                        <input type="submit" class="btn btn-primary" value="Kirim">                        
                        <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Batal</a>
                    </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
        @endforeach
        <!-- Modal Edit Kegiatan-->
        <!-- Modal Delete Kegiatan-->
        @foreach($kegiatan as $key => $data)
        <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
            aria-hidden="true">
            <div class="modal-dialog modal-notify modal-info" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header bg-light">                
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>

                    <!--Body-->
                    <form class="text-center border border-light px-5 py-2" method="post" action="{{route('hapuskegiatan')}}?id={{$data->id_kegiatan}}">
                    @csrf
                    <div class="modal-body ">
                            <p class="h4 mb-4">Hapus</p>
                            <!-- Name -->
                            <p>Yakin Akan Menghapus Diskusi?</p>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer justify-content-center ">
                        <input type="submit" class="btn btn-danger" value="Hapus">                        
                        <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Batal</a>
                    </div>
                    </form>
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Modal Delete Kegiatan-->
        @endforeach
        
        

        
@endsection
