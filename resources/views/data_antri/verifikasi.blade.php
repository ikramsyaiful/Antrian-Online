<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>SION</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admintoadmin/dist/assets/images/favicon.ico') }}">

        <!--Morris Chart-->
        <link rel="stylesheet" href="{{ asset('admintoadmin/dist/assets/libs/morris-js/morris.css') }}"/>

        <!--Custom box-->   
        <link href="{{ asset('admintoadmin/dist/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">

        <!-- App css -->
        <link rel="stylesheet"  href="{{ asset('admintoadmin/dist/assets/css/bootstrap.min.css') }}" type="text/css" />
       <link rel="stylesheet" href="{{ asset('admintoadmin/dist/assets/css/icons.min.css') }}"  type="text/css" />
       <link  rel="stylesheet"  href="{{ asset('admintoadmin/dist/assets/css/app.min.css') }}"type="text/css" />

    </head>
    <body>
    
    <div class="col-sm-12">
                                <div class="card-box">
                                <script src="https://rawcdn.githack.com/tobiasmuehl/instascan/4224451c49a701c04de7d0de5ef356dc1f701a93/bin/instascan.min.js"></script>
                                <center><video id="preview" class="card-box" style="width:75%;"></video> </center>
                                <center>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

				                  <label class="btn btn-primary active">

					                <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
				                  </label>
				                  <label class="btn btn-secondary">
					                <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
				                  </label>
				                </div>
                               </center>
                               </div>

    </div>
   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              

               				<script type="text/javascript">
					var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
					scanner.addListener('scan',function(content){
						console.log(content);
                        if(content!=''){
                        $.post('http://localhost:8000/api/verifikasi',{data:content},function(response){
                        if(response.info=='ok'){
                        
                            if(response.serve=={{$data->id}}){
                           
                                swal({
                                  title: response.msg.nomor_antri,
                                  text: "Berhasil Di Verifikasi",
                                  icon: "success",
                                  dangerMode: false,
                                })
                                .then((value) => {
                                       setTimeout(function() {
                                       location.reload();
                                       }, 100);
                                });

                            }else{
                                swal({
                                  title: "Anda Salah Tempat Nomor antrian",
                                  text: "Nomor Antrian Anda Akan kami Hanguskan",
                                  icon: "error",
                                  dangerMode: true,
                                })
                                .then((value) => {
                                       setTimeout(function() {
                                       location.reload();
                                       }, 100);
                                });
                            }
                          }else{
                              swal({
                                  title: "Qrcode anda tidak terdaftar",
                                  text: "tidak ada sama sekali",
                                  icon: "error",
                                  dangerMode: true,
                                })
                                .then((value) => {
                                       setTimeout(function() {
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

			</div>
 </body>
</html>
