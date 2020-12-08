@extends('layouts.app')

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="row" style="height:100%">
                <div class="col-12" style="height:100%">
                    <h1>Infaq <i class="fas fa-arrow-right"></i> E-Remas <i class="fas fa-arrow-right"></i> Masjid</h1>
                </div>
            </div>                
        </div>
    </header>
    <div class="container-fluid">
                
                <div class="row m-4 justify-content-center">   
                                         
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-12">
                            <div class="card">
                                <div class="card-body"> 
                                    <form action="{{route('infaqcheckout')}}">
                                        <div class="form-group column">
                                            <label for="inputEmail3" class="col-12 col-form-label d-flex justify-content-center pr-1"><span>Masjid</span></label>
                                            
                                            <div class="col-sm-12">
                                            <select class="form-control" id="masjid" name="masjid">
                                                <option disabled selected>Pilih Masjid</option>
                                                @foreach($masjid as $key=>$data)
                                                <option value="{{$data->id}}">{{$data->nama_masjid}}</option>
                                                @endforeach                                           
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group column">
                                        <label for="jumlah" class="col-12 col-form-label d-flex justify-content-center pr-1"><span>Jumlah</span></label>
                                            
                                            <div class="col-12">
                                            <input type="number" class="form-control" id="jumlah" value="" name="jumlah">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-12 d-flex justify-content-center">
                                                <input type="submit" class="form-control w-25 btn btn-primary" value="Lanjutkan Pembayaran">
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
