<!DOCTYPE html>
<html>
    <head>
            <meta charset="utf-8" />
        <title>SION</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
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

                                 @foreach($data->antri as $dataz) 
                            
                            <br>
                            <br>
                                 <center><div class="display-1">{{$dataz->antri_jalan}}</div></center>

                                 <br>
                                 <br>
                                 <br>
                            @endforeach
                             <form action="{{ route('data_antri.antrianupdate',['data' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="col-sm-12">
                            <center>  <button class="btn btn-block btn--md btn-success waves-effect waves-light" type="submit" id="con_submit"><span>SUBMIT</span></button></center>
                             



           </div>
     </div>
   
</form>
</body>
</html>
