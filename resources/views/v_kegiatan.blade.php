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
                        <h4 class="page-title text-uppercase font-medium font-14">Kegiatan</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="{{route('admin.kegiatan')}}">Kegiatan</a></li>
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
                    <div class="col-lg-8 col-xlg-9 col-md-12 mb-4">
                        <a href="{{route('admin.tambahkegiatan')}}"><button class="btn btn-primary">Tambah Kegiatan</button></a>
                    </div>                
                    <!-- Column -->
                    @foreach($kegiatan as $key => $data)
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="section-heading text-uppercase ">{{$data->nama_kegiatan}}</h2>
                                <img class="img-fluid w-25" src="assets/img/portfolio/01-thumbnail.jpg.png" alt="" />
                                <p class="item-intro m-0">Tempat : {{$data->tempat_kegiatan}}</p>
                                <p class="item-intro m-0">{{$data->deskripsi_kegiatan}}</p>
                                <p class="item-intro m-0">Tanggal : {{$data->tanggal_kegiatan}}</p>
                                <p class="item-intro m-0">Pukul : <?php echo $time = date("H:i", strtotime($data->waktu_kegiatan));?> WIB</p>              
                                <div class="d-flex justify-content-end">
                                <a href="{{route('admin.editkegiatan')}}?id={{$data->id_kegiatan}}"><button class="btn btn-warning mr-1">Edit Kegiatan</button></a>
                                <a href="{{route('admin.hapuskegiatan')}}?id={{$data->id_kegiatan}}"><button class="btn btn-danger">Hapus Kegiatan</button></a>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
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
