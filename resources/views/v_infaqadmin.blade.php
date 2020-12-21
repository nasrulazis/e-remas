@extends('layouts.appAdmin')

@section('content')
    
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Infaq</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="{{route('admin.masjid')}}">Verifikasi Infaq</a></li>
                            </ol>
                            
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
            <div class="row">    
                                  
                    <!-- Column -->
                    <div class="col-md-12">
                    
                    <div class="card">
                    <table class="table m-0">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pengirim</th>
                            <th scope="col">Masjid</th> 
                            <th scope="col">Jumlah Infaq</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($infaq as $key=>$data)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$data->nama_pengirim}}</td>
                                <?php
                                $masjid=App\masjid::where('id',$data->id_masjid)->first();

                                ?>
                                <td>{{$masjid->nama_masjid}}</td>
                                <td>{{$data->infaq}}</td>
                                <td><a href="" class="btn btn-secondary" data-toggle="modal" data-target="#modalfoto{{$loop->iteration}}">Lihat Selengkapnya</a></td>
                                <!-- <div class="col-4"><img src="images/{{$data->bukti_pembayaran}}" style="width:100%" alt=""></div> -->
                                @if($data->status==1)
                                <td class=""><a href="{{route('admin.editinfaq',$data->id)}}" class="btn btn-primary">Verifikasi</a></td>
                                @else
                                <td class=""><a href="{{route('admin.hapusinfaq',$data->id)}}" class="btn btn-danger">Batalkan Verifikasi</a></td>
                                @endif
                            </tr>
                            <!-- modal  -->
                                
                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="modalfoto{{$loop->iteration}}" id="modalfoto{{$loop->iteration}}" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                        <img src="images/{{$data->bukti_pembayaran}}" style="width:100%" alt="">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    </div>      
                    <!-- Column -->
                    
                </div>                 
                
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> Copyright E-Remas
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
@endsection
