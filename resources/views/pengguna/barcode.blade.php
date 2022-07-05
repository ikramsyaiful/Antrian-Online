<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bredh flat responsive HTML & WHMCS hosting and domains template">
    <meta name="author" content="coodiv.net (nedjai mohamed)">
    <link rel="icon" href="{{ asset('bredh/favicon.ico') }}">
    <title>bredh | homepage</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bredh/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- main css file -->
    <link href="{{ asset('bredh/css/main.min.css') }}" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
      
    <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js"></script> 

    </head>
    <body>
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <section class="padding-80-0-50 how-it-work-section position-relative">

        <div class="container">
            <h2 class="title-default-coodiv-two">Antrian Anda</h2>

            <div class="row justify-content-center mr-tp-70 how-it-work-section-row">
               
                <div class="col-md-6"  id="qrcode">
                  
                    <div class="how-it-works-box">
                    <div  id="download">
                         <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(250)->generate($data->qrcode)) !!} ">
                         <h5>{{$data->qrcode}}</h5>
                         <h3>No : {{$data->nomor_antri}}<h1>
                     </div>
                     <br><br>
                    <!-- <a class="log-btn" id="btn-Convert-Html2Image">Dowload</a>-->

                     <div class="col-md-12 free-trial-footer-links d-flex mx-auto flex-column">
                      <center> <a class="sign-btn" id="btn-Convert-Html2Image">Download</a></center>
                    </div>
                    


                    </div>
                </div>    
            </div>
        </div>
    </section>
    <div id="previewImage" style="display: none;"> </div>
 <center> 

    <script>
        $(document).ready(function () {
            var element = $("#download"); // global variable
            var getCanvas; // global variable

            html2canvas(element, {
                onrendered: function (canvas) {
                    $("#previewImage").append(canvas);
                    getCanvas = canvas;
                }
            });

            $("#btn-Convert-Html2Image").on('click', function () {
                var imgageData = getCanvas.toDataURL("image/png");
                // Now browser starts downloading it instead of just showing it
                var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
                $("#btn-Convert-Html2Image").attr("download", "Nomor-Antrian.png").attr("href", newData);
            });
        });
    </script>


    </center> 
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
