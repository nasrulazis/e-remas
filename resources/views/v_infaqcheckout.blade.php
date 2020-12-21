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
                                    <?php $masjid=$_GET['masjid'];?>
                                    <form action="{{route('infaqcheckout')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="col-12 h-100 px-4 pt-4">                                    
                                            <h4 class="d-flex justify-content-center">Transfer Ke</h4>
                                            <div class="row m-2">
                                                <div class="col-12">
                                                <div class="list-group d-flex flex-row" id="list-tab" role="tablist">
                                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">BNI</a>
                                                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">BRI</a>
                                                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">MANDIRI</a>
                                                    <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">BCA</a>
                                                </div>
                                                </div>                
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active text-center" id="list-home" role="tabpanel" aria-labelledby="list-home-list">a/n E-Remas<h3>5046772</h3></div>
                                                <div class="tab-pane fade text-center" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">a/n E-Remas<h3>563101017240538</h3></div>
                                                <div class="tab-pane fade text-center" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">a/n E-Remas<h3>1392307588</h3></div>                  
                                                <div class="tab-pane fade text-center" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">a/n E-Remas<h3>1300010553256</h3></div>
                                                </div>
                                            </div>
                                            <p class="text-center">Pastikan pembayaran tertuju kepada no rekening atas nama <b>E-Remas</b></p>
                                        </div>
                                        <div class="form-group d-flex flex-column align-items-center">
                                            <label for="jumlah" class="col-12 col-form-label d-flex justify-content-center border-top"><span>Jumlah</span></label>                                                                                            
                                                <div class="col-6 d-flex flex-column">
                                                    <div class="d-flex col-12 justify-content-between text-secondary" >
                                                    <span>Infaq Masjid</span><span>Rp.{{number_format(floatval($jumlah))}}</span>
                                                    </div>
                                                    <div class="d-flex col-12 justify-content-between text-secondary" >
                                                    <span>Biaya Pengelolaan</span><span>Rp.{{number_format(floatval(1000))}} <a href=""  data-toggle="modal" data-target=".bd-example-modal-sm" class="text-secondary"><i class="fas fa-info-circle"></i></a></span>
                                                    </div>
                                                    
                                                    
                                                    <!-- modal -->
                                                    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                        <p class="m-2">*Biaya operasional misi kebaikan sebesar Rp{{number_format(floatval(1000))}}.</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="d-flex col-12 justify-content-between">                                                
                                                    <h5>Total</h5><h5>Rp.{{number_format(floatval($jumlah+1000))}}</h5>
                                                    </div>

                                                    
                                                    <input type="number" class="form-control d-none" id="nama_pengirim" name="jumlah" value="{{$jumlah}}">
                                                    <input type="number" class="form-control d-none" id="id_masjid" name="masjid" value="{{$masjid}}">
                                                    
                                                    <label for="bukti" class="col-12 col-form-label d-flex justify-content-center border-top"><span>Nama Pengirim</span></label>  
                                                    <div class="d-flex col-12 justify-content-center text-secondary" >
                                                    <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim">
                                                    </div>

                                                    <label for="bukti" class="col-12 col-form-label d-flex justify-content-center border-top"><span>Upload Bukti Pembayaran</span></label>  
                                                    <div class="d-flex col-12 justify-content-center text-secondary" >
                                                    <input type="file" class="" id="image" name="image">
                                                    </div>
                                                </div>                                                                                            
                                        </div>
                                        
                                        <div class="form-group mt-4">
                                            <div class="col-sm-12 d-flex justify-content-center mt-4">
                                                <input type="submit" class="form-control w-50 btn btn-primary" value="Kirim Infaq">
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
