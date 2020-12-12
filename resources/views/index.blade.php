@extends('layouts.app')

@section('content')
    <!-- Masthead-->
        <div class="position-fixed button-hover d-flex align-items-end flex-column" style="bottom: 45px; right: 24px;">
        <a href="{{route('infaq')}}" class="d-flex align-items-center mb-2" id="infaq"><p class="m-0 font-weight-bold">Infaq</p><button class="ml-2 btn-lg rounded-circle btn-primary btn square shadow d-flex justify-content-center" ><i class="fas fa-donate"></i></button></a>
        <!-- <a href="{{route('infaq')}}" class="d-flex align-items-center mb-2" id="infaq"><p class="m-0 font-weight-bold">Donasi</p><button class="ml-2 btn-lg rounded-circle btn-primary btn square shadow" ><i class="fas fa-hand-holding-usd"></i></button></a> -->
        <a class=" btn-lg rounded-circle btn-primary btn d-flex align-items-center square shadow" id="button-hover" ><i class="fas fa-plus"></i></a>           
        </div>
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Cari Acara Masjid Didekatmu!</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#portfolio">Cari Sekarang!</a>
            </div>
        </header>        
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="section-heading text-uppercase">Acara disekitarmu</h2>
                    <!-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> -->
                </div>
                <div class="row">
                    @foreach($kegiatan as $key => $data)
                        <div class="col-lg-6 col-sm-6 mb-4 mt-4">
                            <div class="portfolio-item">
                                <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$data->id_kegiatan}}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content">Buka Detail</div>
                                    </div>
                                    <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg.png" alt="" />
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{$data->nama_kegiatan}}</div>
                                    <div class="portfolio-caption-subheading text-muted">{{$data->tanggal_kegiatan}}, {{$data->waktu_kegiatan}} WIB</div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach                                               
                        
                </div>
                <div class="d-flex justify-content-center">
                {{$kegiatan->links()}}
                </div>
                
            </div>
        </section>
        
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Modal 1-->
        @foreach($kegiatan as $key => $data)
        <div class="portfolio-modal modal fade " id="portfolioModal{{$data->id_kegiatan}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content col-8 m-auto">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    <h2 class="section-heading text-uppercase ">{{$data->nama_kegiatan}}</h2>
                                    <?php
                                    $masjid=App\masjid::where('id',$data->id_masjid)->first();                                   
                                    ?>
                                    <p class="item-intro text-muted">{{$masjid->nama_masjid}}</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/img-6001.jpg" alt="" />
                                    <p>{{$data->deskripsi_kegiatan}}</p>
                                    <ul class="list-inline">
                                        <li>Tanggal: {{$data->tanggal_kegiatan}}</li>
                                        <li>Pukul: {{$data->waktu_kegiatan}} WIB</li>
                                        
                                    </ul>
                                    <div style="lg-8 m-auto"><iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Jl.%20Bonang,%20Kutorejo,%20Kec.%20Tuban,%20Kabupaten%20Tuban,%20Jawa%20Timur%2062311+(My%20Business%20Name)&amp;t=&amp;z=18&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.maps.ie/route-planner.htm"></a></div>
                                    <!-- <button class="btn btn-primary" data-dismiss="modal" type="button">
                                        <i class="fas fa-times mr-1"></i>
                                        Close Project
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
@endsection
