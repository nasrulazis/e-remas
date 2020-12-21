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
                                    @if(Auth::check())
                                        @if(Auth::user()->role==2)
                                        <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#pilihjenis">Tambah data keuangan</a>
                                        @endif
                                    @endif
                                    @if($infaq->isNotEmpty())
                                    <table class="table m-0">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Pengirim</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Tanggal</th>
                                            @if(Auth::check())
                                                @if(Auth::user()->role==2)
                                                <th scope="col"></th>
                                                @endif
                                            @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total=0;
                                        ?>
                                            @foreach($infaq as $key=>$infaqs)
                                            
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$infaqs->nama_pengirim}}</td>
                                                <td>{{$infaqs->keterangan}}</td>
                                                @if($infaqs->jenis==1)
                                                <?php $total+=$infaqs->infaq; ?>
                                                <td>Rp.{{number_format(floatval($infaqs->infaq))}}</td>
                                                @elseif($infaqs->jenis==2)
                                                <?php $total-=$infaqs->infaq; ?>
                                                <td>-Rp.{{number_format(floatval($infaqs->infaq))}}</td>
                                                @else
                                                @endif

                                                <td>{{$infaqs->created_at->format('Y-m-d')}}</td>
                                                @if(Auth::check())
                                                    @if(Auth::user()->role==2)
                                                    <td> <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalinfaq{{$data->id}}"><i class="fas fa-trash"></i></a>
                                                    <!-- data-toggle="modal" data-target="#deleteModal{{$data->id}}" -->
                                                    <a href="" class="btn btn-primary ml-2" data-toggle="modal" data-target="#editModal{{$data->id}}">Edit</a></td>
                                                    @endif
                                                @endif
                                            </tr>                                        
                                            @endforeach
                                            <tr>
                                                <td>Total</td>
                                                <td></td>
                                                <td></td>
                                                @if($total<=0)
                                                <?php $total=$total*(-1); ?>
                                                <td>-Rp.{{number_format(floatval($total))}}</td>
                                                @else
                                                <td>Rp.{{number_format(floatval($total))}}</td>
                                                @endif
                                            </tr>
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
                                                @foreach($masjid as $key=>$masjids)
                                                <option value="{{$data->id}}" selected>{{$masjids->nama_masjid}}</option>
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
    @endforeach
        <!-- Modal Delete Kegiatan-->

        <!-- Modal tambah Infaq pemasukan-->
            <div class="modal fade" id="tambahModalinfaq" tabindex="-1" role="dialog" aria-labelledby="tambahModalinfaq"
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
                        <form class="text-center border border-light px-5 py-2" method="post" action="{{route('infaqcheckouttakmir')}}?jenis=1">
                        @csrf
                        <div class="modal-body ">                        
                                <p class="h4 mb-4">Tambah pemasukan</p>
                                <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Nama</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" placeholder=""
                                                    class="form-control p-0 border-0" name="nama_pengirim"> </div>
                                        </div>
                                        
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Jumlah</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="number" class="form-control border-0" name="infaq" >
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Masjid</label>
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
                                            <label class="col-md-12 p-0">Keterangan</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" class="form-control border-0" name="keterangan" >
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Tanggal</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="date" class="form-control border-0" name="tanggal" >
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
        <!-- Modal tambah infaq pemasukan-->
        <!-- Modal tambah Infaq pengeluaran-->
            <div class="modal fade" id="tambahModalinfaqpengeluaran" tabindex="-1" role="dialog" aria-labelledby="tambahModalinfaqpengeluaran"
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
                        <form class="text-center border border-light px-5 py-2" method="post" action="{{route('infaqcheckouttakmir')}}?jenis=2">
                        @csrf
                        <div class="modal-body ">                        
                                <p class="h4 mb-4">Tambah Pengeluaran</p>
                                <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Nama</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" placeholder=""
                                                    class="form-control p-0 border-0" name="nama_pengirim"> </div>
                                        </div>
                                        
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Jumlah</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="number" class="form-control border-0" name="infaq" >
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Masjid</label>
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
                                            <label class="col-md-12 p-0">Keterangan</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" class="form-control border-0" name="keterangan" >
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Tanggal</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="date" class="form-control border-0" name="tanggal" >
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
        <!-- Modal tambah infaq pengeluaran-->

        <!-- Modal Delete infaq-->
    @foreach($infaq as $key => $data)
        <div class="modal fade" id="deleteModalinfaq{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalinfaq"
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
                    <form class="text-center border border-light px-5 py-2" method="post" action="{{route('infaqdelete')}}?id={{$data->id}}">
                    @csrf
                    <div class="modal-body ">
                            <p class="h4 mb-4">Hapus</p>
                            <!-- Name -->
                            <p>Yakin Akan Menghapus data Infaq?</p>
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
    @endforeach
        <!-- /Modal Delete Infaq-->

        <!-- Modal pilih kategori infaq-->
        <div class="modal fade" id="pilihjenis" tabindex="-1" role="dialog" aria-labelledby="pilihjenis" aria-hidden="true">
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
                    <div class="modal-body text-center">
                    <h3>Pilih data keuangan</h3>
                            <button class="btn btn-dark" data-toggle="modal" data-target="#tambahModalinfaq" data-dismiss="modal">Pemasukan</button>
                            <button class="btn btn-dark" data-toggle="modal" data-target="#tambahModalinfaqpengeluaran" data-dismiss="modal">Pengeluaran</button>
                    </div>
                    
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- /Modal pilih kategori Infaq-->

        <!-- Modal edit Infaq -->
    @foreach($infaq as $key => $data)
        <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="tambahModalinfaq"
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
                        <form class="text-center border border-light px-5 py-2" method="post" action="{{route('infaqupdate')}}?id={{$data->id}}">
                        @csrf
                        <div class="modal-body ">                        
                                <p class="h4 mb-4">Edit data keuangan</p>
                                <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Nama Pengirim</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" placeholder=""
                                                    class="form-control p-0 border-0" name="nama_pengirim" value="{{$data->nama_pengirim}}"> </div>
                                        </div>
                                        
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Jumlah</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="number" class="form-control border-0" name="infaq" value="{{$data->infaq}}" >
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Masjid</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <select class="form-control" id="masjid" name="masjid">
                                                    @if(Auth::check())
                                                    <?php
                                                        $masjid=App\masjid::where('id',Auth::user()->id_masjid)->get();                                   
                                                        ?>
                                                    @foreach($masjid as $key=>$masjid)
                                                    <option value="{{$masjid->id}}" selected>{{$masjid->nama_masjid}}</option>
                                                    @endforeach                                          
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Keterangan</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="text" class="form-control border-0" name="keterangan" value="{{$data->keterangan}}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0">Tanggal</label>
                                            <div class="col-md-12 border-bottom p-0">
                                                <input type="date" class="form-control border-0" name="tanggal" value="{{$data->created_at->format('Y-m-d')}}">
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
        <!-- Modal edit infaq-->
    @endforeach
        
@endsection
