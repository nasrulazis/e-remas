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
                <h1>Forum</h1>
                <div>
                    <a href="#" class="btn btn-outline-dark font-weight-bold" data-toggle="modal" data-target="#tambahModal">+ Diskusi</a>
                </div>
            </div>
            <div class="container border px-4 border-bottom-0 border-right-0 border-left-0">
                <!-- <div class="my-2">
                    <b>Showing :</b>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> All
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="options" id="option2" autocomplete="off"> 5
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="options" id="option3" autocomplete="off"> 10
                    </label>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-2 py-2 d-none d-lg-block d-xl-block d-xl-none">
                        <div class="my-3">
                            <b>Tags</b>
                        </div>
                        
                        <ul class="list-group mt-3">
                            @foreach($tags as $tag)
                            <?php
                            $tag_count=DB::table('forum_tag')->where('tag_id',$tag->id)->get();                            
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center  border-0 py-1 pl-0">
                                {{$tag->name}}
                                <span class="badge badge-primary badge-pill">{{count($tag_count)}}</span>
                            </li>  
                            @endforeach                          
                        </ul>
                        
                    </div>
                    
                    <div class="col-10 p-2">
                        <div class="my-2">
                        <!-- pagination -->
                        {!!$forums->links()!!}
                        <!-- <b>Showing :</b>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">                                                    
                                <label class="btn btn-primary active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> All
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="options" id="option2" autocomplete="off"> 5
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> 10
                                </label>  
                            </div>                          
                        </div> -->

                        <!-- this is ripidid -->
                        @foreach($forums as $key =>$data)
                        <?php 
                            $forum_user=\App\anggota::where('id_anggota', $data->id_anggota)->first();
                        ?>
                        <div class="card text-dark my-3 border">
                            <div class="card-header bg-light text-primary d-flex justify-content-between">
                                <div class="d-flex flex-row">
                                    <div class="image btn btn-secondary">

                                    </div>
                                    <div class="text-dark ml-2">
                                        <i>Posted By</i> {{$forum_user->nama_anggota}} 
                                        @foreach($data->tags as $tag)
                                        <span class="badge badge-primary badge-pill">{{$tag->name}}</span>
                                        @endforeach
                                    </div>                        
                                </div>
                                
                                <div>
                                    @if (Auth::user()->id_anggota==$data->id_anggota)
                                    <a href="#" class="text-danger mr-2 " data-toggle="modal" data-target="#deleteModal{{$data->id}}">Delete</a>
                                    <a href="#" class=" " data-toggle="modal" data-target="#editModal{{$data->id}}">Edit</a>
                                    @endif
                                    <span class="text-muted ml-2 font-italic">                                    
                                    <?php
                                    $now = new DateTime();
                                    $updated = $data->updated_at;
                                    $date = new DateTime($updated);
                                    // $datepost = date('m/d/Y', $updated);
                                    $day = $date->diff($now)->format("%d");
                                    $hour = $date->diff($now)->format("%h");
                                    $minutes = $date->diff($now)->format("%i");                                    

                                    if($day<=0&&$hour<=0){
                                        $selisih = $date->diff($now)->format("%i menit");
                                    }else if($day<=0&&$hour>0){
                                        $selisih = $date->diff($now)->format("%h jam");                                                                        
                                    }else{
                                        $selisih = $date->diff($now)->format("%d hari");
                                    }
                                    echo $selisih?> yang lalu
                                    
                                    </span>
                                </div>
                                
                            </div>
                            <div class="card-body d-flex justify-content-between">
                                <div class="d-flex flex-column w-75">
                                    <a href="{{route('detailforum')}}?id={{$data->id}}" class="text-dark"><h5 class="card-title">{{str_limit($data->title,50)}}</h5></a>
                                    <p class="card-text">{!!$data->deskripsi!!}</p>                    
                                </div>
                                <?php
                                    $comment_count=App\Comment::where('commentable_id',$data->id)->get();
                                ?>
                                <div class="d-flex align-items-center height:100%">
                                    <a href="{{route('detailforum')}}?id={{$data->id}}" class="btn btn-primary rounded-pill">{{count($comment_count)}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- end ripidid -->
                        {!!$forums->links()!!}
                    </div>
                    
                </div>
                
            </div>
        </section>
                
         <!-- Modal Tambah Diskusi -->
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
                    <form class="text-center border border-light px-5 py-2" method="post" action="{{route('tambahforum')}}">
                    @csrf
                    <div class="modal-body ">
                        

                            <p class="h4 mb-4">Buat Diskusi</p>

                            <!-- Name -->
                            <input type="text" name="title" class="form-control mb-4" placeholder="Title">                            
                            
                            <!-- Message -->
                            <!-- <div id="editor"></div> -->
                            <textarea name="deskripsi" id="editor"></textarea>
                            

                            <!-- Tags -->
                            <label>Tags</label>
                            <select name="tags[]" class="browser-default tags custom-select mb-4 form-control" style="width:100%;" multiple="multiple">
                                <option value="" disabled>Pilih Tag</option>
                                @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach                                                         
                            </select>

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
        <!-- Modal Tambah Diskusi-->
        
        <!-- Modal Edit Diskusi -->
        @foreach($forums as $key => $data)
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
                    <form class="text-center border border-light px-5 py-2" method="post" action="{{route('editforum',$data->id)}}">
                    @csrf
                    <div class="modal-body ">
                        

                            <p class="h4 mb-4">Edit Diskusi</p>

                            <!-- Name -->
                            <input type="text" name="title" class="form-control mb-4" placeholder="Title" value="{{$data->title}}">                            
                            
                            <!-- Message -->
                            <div class="form-group">
                                <textarea class="form-control rounded-0" id="editor2" name="deskripsi" rows="3" placeholder="Diskusi">{!!$data->deskripsi!!}</textarea>
                            </div>

                            <!-- Tags -->
                            <label>Tags</label>
                            <select name="tags[]" class="browser-default tags custom-select mb-4 form-control" style="width:100%;" multiple="multiple">
                                <option value="" disabled>Pilih Tag</option>
                                @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach                                                         
                            </select>


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
        <!-- Modal Edit Diskusi-->
        @endforeach
        <!-- Modal Delete Diskusi-->
        @foreach($forums as $key => $data)
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
                    <form class="text-center border border-light px-5 py-2" method="post" action="{{route('hapusforum',$data->id)}}">
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
        <!-- Modal Delete Diskusi-->
        @endforeach
        
@endsection
@section('js')
        <script type="text/javascript">            
            $('.tags').select2({
                placeholder: "Pilih Tag",
                maximumSelectionLength: 2,
                allowClear: true
            });        
        </script>
        <script>
                 ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                    heading: {
                        options: [
                            
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                        ]
                    }
                } )
                .catch( error => {
                     console.log( error );
                } );
        </script>
        <script>
                 ClassicEditor
                .create( document.querySelector( '#editor2' ), {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                    heading: {
                        options: [
                            
                            { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                            { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                            { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                        ]
                    }
                } )
                .catch( error => {
                     console.log( error );
                } );
        </script>
@endsection
