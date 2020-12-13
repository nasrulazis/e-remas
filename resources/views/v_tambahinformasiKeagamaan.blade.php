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
                <h1>Tambah Informasi Keagamaan </h1>
            </div>
            <div class="container border px-4 border-bottom-0 border-right-0 border-left-0">
                <div class="row">
                    <div class="col-12 p-2">
                        <div class="my-2">
                        <!-- this is ripidid -->
                        

                        <div class="card text-dark my-3 border">
                            <div class="card-header bg-light d-flex justify-content-between">
                            <form class="text-center border border-light px-5 py-2 w-100" method="post" action="{{route('tambahinformasiKeagamaan')}}">
                            @csrf
                            <div class="modal-body ">
                                    <!-- Name -->
                                    <input type="text" name="judul" class="form-control mb-4" placeholder="Judul">                            
                                    
                                    <!-- Message -->
                                    <!-- <div id="editor"></div> -->
                                    <textarea name="deskripsi"></textarea>
                                    
                                    

                            </div>

                            <!--Footer-->
                            <div class="modal-footer justify-content-start ">
                                <input type="submit" id="submit" class="btn btn-primary" value="Buat"> 
                            </div>
                            </form>
                            </div>
                            <div class="card-body d-flex justify-content-between">
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </section>
               
@endsection
@section('js')
<script>
    CKEDITOR.replace( 'deskripsi' );
</script>
@endsection
