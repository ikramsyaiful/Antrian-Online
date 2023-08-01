<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bredh flat responsive HTML & WHMCS hosting and domains template">
    <meta name="author" content="coodiv.net (nedjai mohamed)">
    <link rel="icon" href="{{ asset('public/favicon.ico') }}">
    <title>Antrian</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/bredh/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- main css file -->
    <link href="{{ asset('public/bredh/css/main.min.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="modal fade" id="videomodal" tabindex="-1" role="dialog" aria-labelledby="videomodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" id="video"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal video -->
	
	<section class="padding-70-0-0 how-it-work-section position-relative">
    <div class="container">
		<div class="box-features-new">
		<div class="col-md-12 box-features-item">
            <div class="row justify-content-center mr-tp-70 how-it-work-section-row">
                <div class="col-md-4">
                    <div class="how-it-works-box">
                        
							  <div class="third-pricing-table">
                            <div class="plan-header">
                                <span class="plan-price second-pricing-table-price monthly">
                                @foreach($data->antri as $dataz)
								<i class="display-1">{{$dataz->antri_jalan}}</i>
                                @endforeach
                                </span>
                            </div>
                            </div>
                            <h5>Nomor Ke</h5>
                            
                             <form action="{{ route('data_antri.antrianupdate',['data' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="package-footer">
                            <button class="btn btn-block btn--md btn-success waves-effect waves-light" type="submit" id="con_submit"><span>Next</span></button>
                            </div>
                            </form>
                    </div>
                </div>
			</div>
		</div>
	</section>	
</form>
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
</body>
</html>
