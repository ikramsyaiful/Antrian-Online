<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Antrian</title>
	
	<link rel="icon" href="{{ asset('public/favicon.ico') }}">
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<!-- Morris Charts CSS -->
    
    <link href="{{ asset('public/goofy/vendors/bower_components/morris.js/morris.css') }}" rel="stylesheet" type="text/css"/>
	
	<!-- vector map CSS -->
	<link href="{{ asset('public/goofy/vendors/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" type="text/css"/>
	
	<!-- Calendar CSS -->
	<link href="{{ asset('public/goofy/vendors/bower_components/fullcalendar/dist/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
		
	<!-- Data table CSS-->
	<link href="{{ asset('public/goofy/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>
	 
	<!-- Custom CSS -->
	<link href="{{ asset('public/goofy/full-width-light/dist/css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>



    <!-- sweet alert -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

     
    </head> 

    <body>
    

 	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-1-active pimary-color-blue">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="https://antrian.live/">
							<img class="brand-img" src="{{ asset('public/goofy/img/sion.png') }}" alt="brand"/>
							<span class="brand-text">ANTRIAN</span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
                @yield('search')

			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li>
						<a id="open_right_sidebar" href="#">{{Auth::user()->name}}</a>
					</li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src=" {{asset('')}}{{Auth::user()->pic}}" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                        
                        <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="{{route('profile')}}"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>

							
							<li class="divider"></li>
							<li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                            </form>
								<a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
                @yield('active')
				

				
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
					
		    @include('sweet::alert')
		     @yield('isi')
			
			</div>
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2023 &copy; Antrian</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="{{ asset('public/goofy/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('public/goofy/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    
	<!-- Vector Maps JavaScript -->
    <script src="{{ asset('public/goofy/vendors/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('public/goofy/vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('public/goofy/full-width-light/dist/js/vectormap-data.js') }}"></script>
	
	<!-- Calender JavaScripts -->
	<script src="{{ asset('public/goofy/vendors/bower_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('public/goofy/vendors/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('public/goofy/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('public/goofy/full-width-light/dist/js/fullcalendar-data.js') }}"></script>
	
	<!-- Counter Animation JavaScript -->
	<script src="{{ asset('public/goofy/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('public/goofy/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}"></script>
	
	<!-- Data table JavaScript -->
	<script src="{{ asset('public/goofy/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="{{ asset('public/goofy/full-width-light/dist/js/jquery.slimscroll.js') }}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{ asset('public/goofy/full-width-light/dist/js/dropdown-bootstrap-extended.js') }}"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="{{ asset('public/goofy/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>
	
	<script src="{{ asset('public/goofy/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('public/goofy/full-width-light/dist/js/skills-counter-data.js') }}"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="{{ asset('public/goofy/vendors/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('public/goofy/vendors/bower_components/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('public/goofy/full-width-light/dist/js/morris-data.js') }}"></script>
	
	<!-- Owl JavaScript -->
	<script src="{{ asset('public/goofy/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	
	<!-- Switchery JavaScript -->
	<script src="{{ asset('public/goofy/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
	
	<!-- Data table JavaScript -->
	<script src="{{ asset('public/goofy/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
		
	<!-- Gallery JavaScript -->
	<script src="{{ asset('public/goofy/full-width-light/dist/js/isotope.js') }}"></script>
	<script src="{{ asset('public/goofy/full-width-light/dist/js/lightgallery-all.js') }}"></script>
	<script src="{{ asset('public/goofy/full-width-light/dist/js/froogaloop2.min.js') }}"></script>
	<script src="{{ asset('public/goofy/full-width-light/dist/js/gallery-data.js') }}"></script>
	
	<!-- twitter JavaScript -->
	<script src="{{ asset('public/goofy/full-width-light/dist/js/twitterFetcher.js') }}"></script>
	
	<!-- Spectragram JavaScript -->
	<script src="{{ asset('public/goofy/full-width-light/dist/js/spectragram.min.js') }}"></script>
	
	<!-- Init JavaScript -->
	<script src="{{ asset('public/goofy/full-width-light/dist/js/init.js') }}"></script>
	<script src="{{ asset('public/goofy/full-width-light/dist/js/widgets-data.js') }}"></script>


    </body>
</html>
