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
                        <h4 class="page-title text-uppercase font-medium font-14">Edit Profil</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ml-auto">
                                <li><a href="#">Profil</a></li>
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
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body"> 
                                <form action="{{route('admin.updateprofil')}}" method="post">
                                @csrf
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label d-flex justify-content-between pr-1"><span>Nama</span>  <span>:</span></label>
                                        
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="nama_admin" value="{{Auth::user()->nama_admin}}" >
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
                                        <div class="col-sm-12 d-flex justify-content-end">
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
