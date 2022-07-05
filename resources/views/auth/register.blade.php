

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bredh flat responsive HTML & WHMCS hosting and domains template">
    <meta name="author" content="coodiv.net (nedjai mohamed)">
    <link rel="icon" href="{{ asset('bredh/img/header/sion.ico') }}">
    <title>SION | signup page</title>
    <style>
        img {
            width: 100px;
            margin-left: 0px;
            margin-top: 0px;
        }
    </style>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bredh/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- main css file -->
    <link href="{{ asset('bredh/css/main.min.css') }}" rel="stylesheet">

    

    </head>
    <body>
        
    
       <!-- start body -->

    <div class="preloader">
        <!-- start preloader -->
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
    </div>
    <!-- end preloader -->

    <div class="auth-wrapper">
        <div class="bg_overlay_header">
		<div id="particles-bg"><canvas class="particles-js-canvas-el" width="875" height="437" style="width: 100%; height: 100%;"></canvas></div>

        </div>
        <div class="auth-content">
        
            <div class="card">
            
                <div class="card-body text-center">
                    
                    <a class="auth-content-logo-header" href="index.html"><img src="img/header/sion.png" alt=""></a>
                    <img src="{{ asset('bredh/img/header/sion.png') }}" alt="" />
                    <h3 class="mb-4 auth-login-title">Register</h3>


                     <form method="POST" action="{{ route('register') }}">
                      @csrf

                    <div class="input-group mb-3">
                                <input placeholder="Masukkan User Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>
                    <div class="input-group mb-3">

                                <input placeholder="Masukkan Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>

                    <div class="input-group mb-3">

                                <input placeholder="Masukkan Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                    </div>

                    <div class="input-group mb-3">                          
                                <input placeholder="Ulangi Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    </div>

                    <button type="submit" class="btn btn-login-auth shadow-2 mb-4">Daftar</button>
              

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src="{{ asset('bredh/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bredh/js/popper.min.js') }}"></script>
    <!-- bootstrap JavaScript -->
    <script src="{{ asset('bredh/js/bootstrap.min.js') }}"></script>
    <!-- template JavaScript -->
    <script src="{{ asset('bredh/js/template-scripts.js') }}"></script>
    <!-- flickity JavaScript -->
    <script src="{{ asset('bredh/js/flickity.pkgd.min.js') }}"></script>
    <!-- carousel JavaScript -->
    <script src="{{ asset('bredh/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- parallax JavaScript -->
    <script src="{{ asset('bredh/js/parallax.min.js') }}"></script>
    <!-- mailchamp JavaScript -->
    <script src="{{ asset('bredh/js/mailchamp.js') }}"></script>
    <!-- bootstrap offcanvas -->
    <script src="{{ asset('bredh/js/bootstrap.offcanvas.min.js') }}"></script>
    <!-- touchSwipe JavaScript -->
    <script src="{{ asset('bredh/js/jquery.touchSwipe.min.js') }}"></script>
    	<!-- seconde style additionel JavaScript -->
	<script src="{{ asset('bredh/js/particles-code.js') }}"></script>
	<script src="{{ asset('bredh/js/particles.js') }}"></script>
	<script src="{{ asset('bredh/js/smoothscroll.js') }}"></script>
  </body>
</html>
