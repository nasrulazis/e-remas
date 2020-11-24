@extends('layouts.app')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
            <div class="container">
                <h1>PROFIL</h1>
            </div>
        </header>
    <div class="container-fluid">
                
                <div class="row m-4 justify-content-center">   
                                         
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-12">
                            <div class="card">
                                <div class="card-body"> 
                                    <form action="{{route('updateprofil')}}" method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label d-flex justify-content-between pr-1"><span>Nama</span>  <span>:</span></label>
                                            
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_anggota" value="{{Auth::user()->nama_anggota}}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label d-flex justify-content-between pr-1"><span>Email</span>  <span>:</span></label>
                                            <div class="col-sm-10 ">
                                            <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label d-flex justify-content-between pr-1"><span>Alamat</span>  <span>:</span></label>
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="alamat" value="{{Auth::user()->alamat}}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label d-flex justify-content-between pr-1"><span>No Hp</span>  <span>:</span></label>                                   
                                            <div class="col-sm-10">
                                            <input type="text" class="form-control" name="no_hp" value="{{Auth::user()->no_hp}}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 d-flex justify-content-center">
                                                <input type="submit" class="form-control w-25 btn btn-primary" value="Simpan">
                                            </div>
                                        </div>
                                    </form>                                                         
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>                 
                    
                    
                </div>
        
        

        
@endsection
