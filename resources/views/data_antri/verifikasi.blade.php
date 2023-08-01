<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Antrian</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="icon" href="{{ asset('public/favicon.ico') }}">

        <!--Morris Chart-->
        <link rel="stylesheet" href="{{ asset('public/admintoadmin/dist/assets/libs/morris-js/morris.css') }}"/>

        <!--Custom box-->   
        <link href="{{ asset('public/admintoadmin/dist/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">

        <!-- App css -->
        <link rel="stylesheet"  href="{{ asset('public/admintoadmin/dist/assets/css/bootstrap.min.css') }}" type="text/css" />
       <link rel="stylesheet" href="{{ asset('public/admintoadmin/dist/assets/css/icons.min.css') }}"  type="text/css" />
       <link  rel="stylesheet"  href="{{ asset('public/admintoadmin/dist/assets/css/app.min.css') }}"type="text/css" />
<link href="{{ asset('public/admintoadmin/dist/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
	<style>
	  .custom-nih {
  overflow: hidden;
  padding: 0 12px 2px 12px;
  margin-top: 20vh;
  //transform: translateY(-50%);
  display: flex;
  flex-direction: column;
  justify-content: center;
		}
		.card-boxx {
  background: linear-gradient(to right, #ebebeb, #ffffff, #ebebeb); /* Slightly darker gradient */
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
  padding: 20px;
  color: #ffffff; /* White text */
 }
		</style>
    </head>
    <body>
    <div class="custom-nih">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        
                        <!-- end row -->

                        
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="dropdown float-right">

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <div class="row"> <div class="col-md-6">
                                            <div class="p-2">
										
											
                                                    <h3>Scan Qrcode</h3>
																									    <!--<center><div class="col-md-6 d-flex align-items-center justify-content-center" >
																										
																											<div class="mt-3" dir="ltr" >
																											
																													<input data-plugin="knob" data-width="250" data-height="250" data-linecap="round" 
																																 data-fgColor="{{ $antri->nomor_antri < $antri->antri_jalan ? '#664359' : '#435966' }}" value="{{ $antri->nomor_antri < $antri->antri_jalan ? $antri->nomor_antri : $antri->antri_jalan }}" data-skin="tron" data-angleOffset="180"
																																 data-readOnly="true" data-thickness=".1" data-min="0" data-max="{{ $antri->nomor_antri }}"/>
																													<h3 class="text-muted">{{ $antri->antri_jalan == 1 && $antri->nomor_antri == 0 ? 'Belum Ada Pengantri' : ($antri->nomor_antri < $antri->antri_jalan ? 'Belum Ada Nomor Antrian Selanjutnya' : 'Nomor Antrian Selanjutnya') }}</h3>
																											</div>
																										</div></center>-->
																										<center id="refresh2">
																										<div class="col-md-6 d-flex align-items-center justify-content-center">
																											<div class="mt-3" dir="ltr">
																											<input
																												id="knobInput"
																												data-plugin="knob"
																												data-width="250"
																												data-height="250"
																												data-linecap="round"
																												data-fgColor="{{ $antri->nomor_antri < $antri->antri_jalan ? '#664359' : '#435966' }}"
																												value="{{ $antri->nomor_antri < $antri->antri_jalan ? $antri->nomor_antri : $antri->antri_jalan }}"
																												data-skin="tron"
																												data-angleOffset="180"
																												data-readOnly="true"
																												data-thickness=".1"
																												data-min="0"
																												data-max="{{ $antri->nomor_antri }}"
																											/>
																											<h3 class="text-muted">
																												{{
																												$antri->antri_jalan == 1 && $antri->nomor_antri == 0
																													? 'Belum Ada Pengantri'
																													: ($antri->nomor_antri < $antri->antri_jalan
																													? 'Belum Ada Nomor Antrian Selanjutnya'
																													: 'Nomor Antrian Selanjutnya')
																												}}
																											</h3>
																											</div>
																										</div>
																										</center>	
																										<form action="{{ route('data_antri.verifikasiskip', $data->id) }}" method="POST" id="verifikasiskipForm">
																												@csrf
																												<input type="hidden" name="_method" value="POST">
																										<div class="text-center mt-4">
																												<button type="submit" class="btn btn-primary" style="padding: 14px 28px; font-size: 20px; border-radius: 8px; background-color: #435966; color: #ffffff; border: none; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3); transition: background-color 0.3s ease;">
																														Skip Nomor Antrian
																												</button>
																										</div>
																										</form>
                                                    <!--<div class="form-group">
                                                        <label class="control-label">Example with postfix (large)</label>
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn input-group-prepend"><button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button></span><input id="demo1" type="text" value="55" name="demo1" class="form-control"><span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span><span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button></span></div>
                                                    </div>
                                                    <div class="form-group mb-0">
                                                        <label class="control-label">With prefix </label>
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn input-group-prepend"><button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"><span class="input-group-text">$</span></span><input id="demo2" type="text" value="0" name="demo2" class="form-control"><span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button></span></div>
                                                    </div><div class="form-group mb-0">
                                                        <label class="control-label">With prefix </label>
                                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn input-group-prepend"><button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button></span><span class="input-group-addon bootstrap-touchspin-prefix input-group-prepend"><span class="input-group-text">$</span></span><input id="demo2" type="text" value="0" name="demo2" class="form-control"><span class="input-group-btn input-group-append"><button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button></span></div>
                                                    </div>-->
                                                    

                                                
                                            </div>
                                        </div><!-- end col -->
																<div class="col-sm-6">
                                <div class="card-boxx">
                                <script src="https://rawcdn.githack.com/tobiasmuehl/instascan/4224451c49a701c04de7d0de5ef356dc1f701a93/bin/instascan.min.js"></script>
                                <center><video id="preview" class="" style="width:100%;" autoplay="autoplay"></video> </center>
                                <center>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
																<label class="btn btn-primary active" style="background-color: #004D7F; color: #FFFFFF;">
																		<input type="radio" name="options" value="1" autocomplete="off" checked=""> Front Camera
																</label>
																<label class="btn btn-secondary" style="background-color: #2E4057; color: #FFFFFF;">
																		<input type="radio" name="options" value="2" autocomplete="off"> Back Camera
																</label>






				                </div>
                               </center>
                               </div>

    </div>
                                        
                                       

                                        <!-- end col -->
                                    </div><!-- end row -->
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        
                        <!-- end row -->


                        
                        <!-- end row -->


                        
                        <!-- end row -->


                        
                        <!-- end row -->
        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <!-- Footer Start -->
                
                <!-- end Footer -->

            

   </div>   
	 <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	      <!-- Vendor js -->
        <script src="{{ asset('public/admintoadmin/dist/assets/js/vendor.min.js') }}"></script>
        <!-- jquery knob -->
        <script src="{{ asset('public/admintoadmin/dist/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>				 
				<!-- App js -->
        <script src="{{ asset('public/admintoadmin/dist/assets/js/app.min.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              

               				<script type="text/javascript">
					var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
					scanner.addListener('scan',function(content){
						console.log(content);
                        if(content!=''){
                        $.post('https://antrian.live/api/verifikasi/{{$data->id}}',{ qrcode: content }, function(response) {
												if (response.info == 'ok') {
												 console.log('1');
													if (response.info2 == 'ok') {
														if (response.info3 == 'ok') {
															swal({
																title: response.msg.nomor_antri,
																text: "Berhasil Di Verifikasi",
																icon: "success",
																dangerMode: false,
															}).then((value) => {
																setTimeout(function () {
																	location.reload();
																}, 100);
															});
														} else {
															swal({
																title: "Belum Giliran",
																text: "",
																icon: "error",
																dangerMode: true,
															}).then((value) => {
																setTimeout(function () {
																	location.reload();
																}, 100);
															});
														}
													} else {
														swal({
															title: "Anda Salah Tempat antrian",
															text: "",
															icon: "error",
															dangerMode: true,
														}).then((value) => {
															setTimeout(function () {
																location.reload();
															}, 100);
														});
													}
												} else {
												 console.log('2');
													swal({
														title:"Nomor Antrian Tidak Terdaftar",
														text: "tidak ada sama sekali",
														icon: "error",
														dangerMode: true,
													}).then((value) => {
														setTimeout(function () {
															location.reload();
														}, 100);
													});
												}
                       console.log(response.msg)
                        })
                        }
					});

					Instascan.Camera.getCameras().then(function (cameras){
						if(cameras.length>0){
							scanner.start(cameras[0]);
							$('[name="options"]').on('change',function(){
								if($(this).val()==1){
									if(cameras[0]!=""){
										scanner.start(cameras[0]);
									}else{
										alert('No Front camera found!');
									}
								}else if($(this).val()==2){
									if(cameras[1]!=""){
										scanner.start(cameras[1]);
									}else{
										alert('No Back camera found!');
									}
								}
							});
						}else{
							console.error('No cameras found.');
							alert('No cameras found.');
						}
					}).catch(function(e){
						console.error(e);
						alert(e);
					});

				</script>  
@if (session('success'))
    <script>
				swal({
						title: "Berhasil",
						text: "{{ session('success') }}",
						icon: "success",
						dangerMode: false,
				});
    </script>
@endif

@if (session('error'))
    <script>
				swal({
						title: "Gagal",
						text: "{{ session('error') }}",
						icon: "error",
						dangerMode: true,
				});
    </script>
@endif

			</div>

			<script>
  setInterval(my_function, 3000);

  function my_function() {
    $.ajax({
      success: function(response) {
        var refreshedContent = $(response).find('#refresh2');
        $('#refresh2').html(refreshedContent);

        // Reinitialize the Knob plugin
        $('#knobInput').knob();
      }
    });
  }
</script>


 <script src="{{ asset('public/js/reload.js') }}"></script>
 </body>
</html>
