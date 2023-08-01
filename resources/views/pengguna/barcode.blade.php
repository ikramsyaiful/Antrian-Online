<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Antrian</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/bredh/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- main css file -->
    <link href="{{ asset('public/bredh/css/main.min.css') }}" rel="stylesheet">
</head>
<body>
    <section class="padding-80-0-50 how-it-work-section position-relative">
        <div class="container">
            <h2 class="title-default-coodiv-two">Antrian Anda</h2>
            <div class="row justify-content-center mr-tp-70 how-it-work-section-row">
                <div class="col-md-6" id="qrcode">
                    <div class="how-it-works-box">
                        <div id="download">
                            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->color(38, 38, 38, 0.85)->backgroundColor(255, 255, 255, 0.82)->size(250)->generate($data->qrcode)) !!}">
                            <h5>{{$data->qrcode}}</h5>
                            <h3>No : {{$data->nomor_antri}}</h3>
                        </div>
                        <br><br>
                        <div class="col-md-12 free-trial-footer-links d-flex mx-auto flex-column">
                            <center>
                                <a class="sign-btn" id="btn-Convert-Html2Image">Download</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="previewImage" style="display: none;"></div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- html2canvas -->
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
    $(document).ready(function () {
        var element = document.getElementById("download"); // Get the DOM element
        var getCanvas; // Declare the variable for storing the canvas

        html2canvas(element).then(function (canvas) {
            $("#previewImage").append(canvas);
            getCanvas = canvas;
        });

        $("#btn-Convert-Html2Image").on('click', function () {
            var imgData = getCanvas.toDataURL("image/png");
            var randomName = "Nomor-Antrian_" + Math.floor(Math.random() * 1000) + ".png";
            var newData = imgData.replace(/^data:image\/png/, "data:application/octet-stream");
            $(this).attr("download", randomName).attr("href", newData);
        });
    });
</script>
    <script src="{{ asset('public/bredh/js/bootstrap.min.js') }}"></script>
</body>
</html>
