@extends('layouts.app')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
            <div class="container">
                <h1>Masjid</h1>
            </div>
        </header>
    <div class="container-fluid">
                
                <div class="row m-4  justify-content-start">
                    
                    @foreach($masjid as $key=>$data)            
                        <!-- Column -->                        
                        @if($loop->iteration%2!=0)                    
                        <div class="col-lg-1"></div>
                        @endif
                        <div class="col-lg-5 col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <div class="left">
                                    <h3>{{$data->nama_masjid}}</h3>
                                    <p>{{$data->alamat}}</p>
                                    <a href="{{route('masjiddetail',$data->id)}}" class="btn btn-primary">Lihat Detail</a>
                                    </div>
                                    <div class="right align-items-center d-flex">
                                    @if(Auth::user()->id_masjid==$data->id&&Auth::user()->role==1)
                                    Remaja masjid
                                    @elseif(Auth::user()->id_masjid==$data->id&&Auth::user()->role==2)
                                    Takmir
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        @if($loop->iteration%2==0)                    
                        <div class="col-lg-1"></div>
                        @endif
                    @endforeach
                    
                    
                </div>                 
                    
                    
    </div>
        
        

        
@endsection
