<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('public/favicon.ico') }}">
    <title>Antrian</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/bredh/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- main css file -->
    <link href="{{ asset('public/bredh/css/main.min.css') }}" rel="stylesheet">



    </head>
    <body>


    
    <div class="preloader"><!-- start preloader -->
        <div class="preloader-container">
            <svg version="1.1" id="L5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <circle fill="#675cda" stroke="none" cx="6" cy="50" r="6">
                    <animateTransform attributeName="transform" dur="1s" type="translate" values="0 15 ; 0 -15; 0 15" repeatCount="indefinite" begin="0.1" />
                </circle>
                <circle fill="#675cda" stroke="none" cx="30" cy="50" r="6">
                    <animateTransform attributeName="transform" dur="1s" type="translate" values="0 10 ; 0 -10; 0 10" repeatCount="indefinite" begin="0.2" />
                </circle>
                <circle fill="#675cda" stroke="none" cx="54" cy="50" r="6">
                    <animateTransform attributeName="transform" dur="1s" type="translate" values="0 5 ; 0 -5; 0 5" repeatCount="indefinite" begin="0.3" />
                </circle>
            </svg>
            <span>loading</span>
        </div>
    </div><!-- end preloader -->

     <div id="coodiv-header" class="subpages-header-min moon-edition">
        <div class="bg_overlay_header">
		<div id="particles-bg"></div>
        
        </div>
        <!-- Fixed navbar -->
         <nav id="coodiv-navbar-header" class="navbar navbar-expand-md fixed-header-layout">
            <div class="container main-header-coodiv-s">
                <a class="navbar-brand" href="https://antrian.live/">
				<img class="w-logo" src="{{ asset('public/bredh/img/header/sion.png') }}" alt="" />
				<img class="b-logo" src="{{ asset('public/bredh/img/header/sion2.png') }}" alt="" />
        
				</a>
                <button class="navbar-toggle offcanvas-toggle menu-btn-span-bar ml-auto" data-toggle="offcanvas" data-target="#offcanvas-menu-home">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse navbar-offcanvas" id="offcanvas-menu-home">
                    <ul class="navbar-nav ml-auto">
                            @if (Route::has('login'))
                                   
                                   @auth
                                       <li>
                                           <a class="nav-link" href="{{route('admin.data.index')}}" role="button" id="header-first-drop-down" >Home</a>
                                       </li>
                                   @else
                                   @if (Route::has('register'))
                                           <li>
                                               <a class="nav-link" href="{{ route('register') }}" role="button" id="header-first-drop-down" >Register</a>
                                           </li>
                                       @endif
                                           <li>
                                               <a class="nav-link" href="{{ route('login') }}" role="button" id="header-first-drop-down" >Login</a>
                                           </li>
                                       
                                   @endauth
                              
                           @endif
                    </ul>
                </div>
                
            </div>
        </nav>
    </div>

	<section class="padding-60-0-100 position-relative">
    <div class="container">

     <div id="refresh">

  
        <div class="container">
            <div class="banner-servers-box">
                <div class="counter-placeholder"></div>
                <div class="banner-text-left">
                    <h5>{{$id->name}}<strong></strong></h5>
                    <p>{{$id->alamat}}</p>
                </div>
                <a class="benchmarks-link" href="#">Antrian</a>
            </div>

            <div class="row justify-content-left server-tabls-head">

            </div>

            
             <div class="row">
    
                           @forelse ($data as $datas)

	                       <div class="col-md-4">
	                             <div class="futures-version-2-box" >
                                 
                                      <a class="voice-plan-price">{{$datas->antri_jalan > 0 ? $datas->antri_jalan - 1 : $datas->antri_jalan}}<b>- Nomor Ke -</b></a>

	                                 <div class="row">
                                    
                                        <div class="col-xl-6">
                                       
	                                        <h5 style='white-space:nowrap; overflow: hidden;max-width: 15ch;'>{{$datas->name}}</h5>
                                              
                                        </div>
                                        <div class="col-xl-6">
                                         
                                        </div>

                                        <div class="col-md-8">

                                         <p><b><h6>Deskripsi</h6></b></p>
                                         <p style='white-space:nowrap; overflow: hidden;text-overflow: ellipsis;max-width: 30ch;'><b>{{$datas->deskripsi}}</b></p>
                                            
                                        </div>  
                                        <div class="col-md-4">

                                        </div>

                                        <div class="col-md-12">
	                                         <a class="more-btn" href="#" onClick="{{ $datas->antri_jalan == 0 ? 'return false;' : "window.open('" . route('pengguna.barcode', ['data' => $datas->random]) . "');" }}"> 
																					 {{ $datas->antri_jalan == 0 ? 'Belum Buka' : 'Ambil Antrian' }}
																					 </a>
																					 </div>

                                    </div>
	                            </div>
	                        </div>
   
                           @empty
                              <td></td>

                           @endforelse

	            </div>
                <br>
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                   {{ $data->links() }}
                  </ul>
                </nav>

              </div>  

            </div>
            



        </div>
	</div>
	</section>
    <section class="footer-section-banner">
        <div class="container">
            <div class="row free-trial-footer-banner">
                <div class="col-md-8">
                    <h5 class="free-trial-footer-banner-title"></h5>
                    <p class="free-trial-footer-banner-text"></p>
                </div>

                <div class="col-md-4 free-trial-footer-links d-flex mx-auto flex-column">
                    <div class="mb-auto"></div>
                    <div class="mb-auto">
                    </div>
                    <div class="mt-auto"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer-section">
        <div class="container">
           


            <div class="row justify-content-between final-footer-area mr-tp-40">
                <div class="final-footer-area-text">
                    © Copyright 2023 Antrian
                </div>


            </div>
        </div>
    </section>

    <!-- jquery -->
    <script src="{{ asset('public/bredh/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/bredh/js/popper.min.js') }}"></script>
    <!-- bootstrap JavaScript -->
    <script src="{{ asset('public/bredh/js/bootstrap.min.js') }}"></script>
    <!-- template JavaScript -->
    <script src="{{ asset('public/bredh/js/template-scripts.js') }}"></script>
    <!-- flickity JavaScript -->
    <script src="{{ asset('public/bredh/js/flickity.pkgd.min.js') }}"></script>
    <!-- carousel JavaScript -->
    <script src="{{ asset('public/bredh/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- parallax JavaScript -->
    <script src="{{ asset('public/bredh/js/parallax.min.js') }}"></script>
    <!-- mailchamp JavaScript -->
    <script src="{{ asset('public/bredh/js/mailchamp.js') }}"></script>
    <!-- bootstrap offcanvas -->
    <script src="{{ asset('public/bredh/js/bootstrap.offcanvas.min.js') }}"></script>
    <!-- touchSwipe JavaScript -->
    <script src="{{ asset('public/bredh/js/jquery.touchSwipe.min.js') }}"></script>
	<!-- seconde style additionel JavaScript -->
	<script src="{{ asset('public/bredh/js/particles-code.js') }}"></script>
	<script src="{{ asset('public/bredh/js/particles.js') }}"></script>
	<script src="{{ asset('public/bredh/js/smoothscroll.js') }}"></script>
	    <!-- Reload -->
	<script>
	
	</script>
	
    <script src="{{ asset('public/js/reload.js') }}"></script>
        </div>
    </body>
</html>
