@extends('Template.Pelayan.core')

@section('active')
                <li>
					<a href="{{route('dashboard')}}"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
				</li>
                <li>
					<a href="{{route('index')}}"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Antrian</span></div><div class="clearfix"></div></a>
				</li>
                <li>
					<a class="active" href="{{route('profile')}}"><div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">My Account</span></div><div class="clearfix"></div></a>
				</li>
@endsection

@section('isi')

				<!-- Row -->
				<div class="row">
					<div class="col-lg-4 col-xs-12">
						<div class="panel panel-default card-view  pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body  pa-0">
									<div class="profile-box">
										<div class="profile-cover-pic">
											<div class="fileupload btn btn-default">
												<span class="btn-text">edit</span>
												
								
												   <form action="{{ route('profile.bg') }}" method="post" enctype="multipart/form-data">
                                                      @csrf
													 <input class="upload" type="file" id="bg" name="bg" onchange="form.submit()" >
                                                   </form>
											</div>								
                                            <img class="profile-image-overlay" src="{{asset('')}}{{Auth::user()->bg}}" alt="user"/>
										</div>
										<div class="profile-info text-center">
											<div class="profile-img-wrap">
												<img class="inline-block mb-10" src="{{asset('')}}{{Auth::user()->pic}}" alt="user"/>
												<div class="fileupload btn btn-default">
													<span class="btn-text">edit</span>
                                                     <form action="{{ route('profile.pic') }}" method="post" enctype="multipart/form-data">
                                                      @csrf
													 <input class="upload" type="file" id="pic" name="pic" onchange="form.submit()" >
                                                     </form>
												</div>
											</div>	
											<h5 class="block mt-10 mb-5 weight-500 capitalize-font txt-primary">{{Auth::user()->name}}</h5>
											<h6 class="block capitalize-font pb-20">Comment</h6>
										</div>	
										<div class="social-info">
											<div class="row">
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span class="counter-anim"> {{ $data ?? '' }}</span></span>
													<span class="counts-text block">Jumlah Pengantri</span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span class="counter-anim">{{Auth::user()->antrijalan}}</span></span>
													<span class="counts-text block">Total Antrian Berjalan</span>
												</div>
												<div class="col-xs-4 text-center">
													<span class="counts block head-font"><span class="counter-anim">{{Auth::user()->antriandimiliki}}</span></span>
													<span class="counts-text block">Antrian Dimiliki</span>
												</div>
											</div>
											<button class="btn btn-primary btn-block btn-rounded  btn-anim mt-30" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"></i><span class="btn-text">edit profile</span></button>
											<div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title" id="myModalLabel">Edit Profile</h5>
														</div>
														<div class="modal-body">
															<!-- Row -->
															<div class="row">
																<div class="col-lg-12">
																	<div class="">
																		<div class="panel-wrapper collapse in">
																			<div class="panel-body pa-0">
																				<div class="col-sm-12 col-xs-12">
																					<div class="form-wrap">

																						<form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                              @csrf
																							<div class="form-body overflow-hide">
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputuname_1">Name</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-user"></i></div>
																										<input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama" value='{{Auth::user()->name}}'>
																									</div>
																								</div>
																								<div class="form-group">
																									<label class="control-label mb-10" for="exampleInputEmail_1">Email address</label>
																									<div class="input-group">
																										<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
						
																										<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="{{Auth::user()->email}}">
																									</div>
																								</div>
																							@if (session('error'))                                                                                                                                                                                                                  
																							<span class="invalid-feedback" role="alert">
																									<strong>{{ session('error') }}</strong>
																							</span>
																							@endif
																							</div>
																							<div class="form-actions mt-10">			
																								<button class="btn btn-primary mr-10 mb-30" data-toggle="modal" data-target="#myModal2" data-dismiss="modal" >Change password</button>
																							</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn btn-primary waves-effect">Update</button>
															<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
														</div>
													</div>
                                                    </form>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>
                                            <!--modal2-->
                                            <div id="myModal2" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
															<h5 class="modal-title" id="myModalLabel">Edit Password</h5>
														</div>
														<div class="modal-body">
															<!-- Row -->
															<div class="row">
																<div class="col-lg-12">
																	<div class="">
																		<div class="panel-wrapper collapse in">
																			<div class="panel-body pa-0">
																				<div class="col-sm-12 col-xs-12">
																					<div class="form-wrap">

																						<form method="POST" action="{{ route('user.password.update') }}">
                                                                                           @method('patch')
                                                                                            @csrf
                                                                                            <div class="form-body overflow-hide">
                                                                                                    <div class="form-group">
                                                                                                    <label class="control-label mb-10" for="exampleInputuname_1">{{ __('Current Password') }}</label>
                                                                                                        
                                                                                                        <div class="input-group">
                                                                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">

                                                                                                            @error('current_password')
                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                </span>
                                                                                                            @enderror
                                                                                                        </div>
                                                                                                    </div>
																							    	<div class="form-group">
                                                                                                    
                                                                                                        <label class="control-label mb-10" for="exampleInputuname_1">{{ __('Password') }}</label>

                                                                                                        <div class="input-group">
                                                                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                                                                            @error('password')
                                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                                    <strong>{{ $message }}</strong>
                                                                                                                </span>
                                                                                                            @enderror
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="form-group">
                                                                                                        <label class="control-label mb-10" for="exampleInputuname_1">{{ __('Confirm Password') }}</label>

                                                                                                        <div class="input-group">
                                                                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                                                                        </div>
                                                                                                    </div>
                                                                                            </div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="submit" class="btn btn-primary waves-effect">Update Password</button>
															<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
														</div>
													</div>
                                                    </form>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>




										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div  class="panel-body pb-0">
									<div  class="tab-struct custom-tab-1">
										<ul role="tablist" class="nav nav-tabs nav-tabs-responsive" id="myTabs_8">
											<li class="active" role="presentation"><a  data-toggle="tab" id="profile_8" role="tab" href="#profile_8" aria-expanded="false"><span>profile</span></a></li>
										</ul>
										<div class="tab-content" id="myTabContent_8">
											<div  id="profile_8" class="tab-pane fade active in" role="tabpanel">
												<div class="row">
													<div class="col-lg-12">
														<div class="">
															<div class="panel-wrapper collapse in">
																<div class="panel-body pa-0">
																	<div class="col-sm-12 col-xs-12">
																		<div class="form-wrap">
																			<form action="#">
																				<div class="form-body overflow-hide">
																					<div class="form-group">
																						<label class="control-label mb-10" for="exampleInputuname_01">Name</label>
																						<div class="input-group">
																							<div class="input-group-addon"><i class="icon-user"></i></div>
																							<input type="text" class="form-control" id="exampleInputuname_01" value='{{Auth::user()->name}}'disabled>
																						</div>
																					</div>
																					<div class="form-group">
																						<label class="control-label mb-10" for="exampleInputEmail_01">Email address</label>
																						<div class="input-group">
																							<div class="input-group-addon"><i class="icon-envelope-open"></i></div>
																							<input type="email" class="form-control" id="exampleInputEmail_01" value='{{Auth::user()->email}}' disabled>
																						</div>
																					</div>
																				</div>
			
																			</form>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Row -->

		
@endsection
