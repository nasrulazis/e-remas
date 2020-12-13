@extends('layouts.app')

@section('content')
    <!-- Masthead-->
        <!-- <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Forum E-Remas</div>                
            </div>
        </header>         -->
        <!-- Portfolio Grid-->
        <section class="page-section" >
            <div class="container  d-flex justify-content-between">
                <h1>Informasi Keagamaan </h1>
            </div>
            <div class="container border px-4 border-bottom-0 border-right-0 border-left-0">
                <div class="row">
                    <div class="col-12 p-2">
                        <div class="my-2">
                        <!-- this is ripidid -->
                        @foreach($informasiKeagamaan as $key =>$data)

                        <div class="card text-dark my-3 border">
                            <div class="card-header bg-light text-primary d-flex justify-content-end">
                            @if(Auth::user()->id_anggota==$data->id_anggota)
                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="fas fa-trash"></i></a>
                                <a href="" class="btn btn-primary ml-2">Edit</a>
                            @endif
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                            <p class="text-secondary">{{$data->updated_at->format('d M, Y')}}</p>
                            <h3>
                                {{$data->judul}}
                            </h3>
                            <?php
                            $nama=App\anggota::where('id_anggota',$data->id_anggota)->first();
                            ?>
                            <p>by <i>{{$nama->nama_anggota}}</i></p>
                            <p>
                                {!! $data->deskripsi !!}
                            </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                
            </div>
        </section>
               
        <!-- Modal Delete Diskusi-->
        @foreach($informasiKeagamaan as $key => $data)
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
                    <form class="text-center border border-light px-5 py-2" method="post" action="{{route('hapusinformasiKeagamaan',$data->id)}}">
                    @csrf
                    <div class="modal-body ">
                        

                            <p class="h4 mb-4">Hapus</p>

                            <!-- Name -->
                            <p>Yakin Akan Menghapus Informasi Keagamaan?</p>                            
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
        <!-- Modal Delete Diskusi-->
        @endforeach
        
@endsection

