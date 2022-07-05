@extends('Template.Pelayan.core')
@section('active')
                <li>
					<a href="{{route('dashboard')}}" data-toggle="collapse" data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
				</li>
                <li>
					<a class="active" href="{{route('index')}}"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Antrian</span></div><div class="clearfix"></div></a>
				</li>
                <li>
					<a href="{{route('profile')}}"><div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">My Account</span></div><div class="clearfix"></div></a>
				</li>
@endsection
@section('isi')
					
					<!-- Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default card-view">

								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="row">
											<div class="col-sm-12 col-xs-12">
												<div class="form-wrap">

													<form action="{{ route('data_antri.update',['data' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                                                    @method('PATCH')
                                                    @csrf
														<div class="form-body">
															<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-edit mr-10"></i>Edit</h6>
															<hr class="light-grey-hr"/>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<label class="control-label mb-10">Nama Antrian</label>
																		<input  id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $data->name }}" placeholder="Masukkan Nama Antrian">
                                                                        @error('name')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                         @enderror
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<label class="control-label mb-10">Alamat</label>
																		<input  id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('name') ?? $data->deskripsi }}" placeholder="Masukkan Alamat">
                                                                         @error('deskripsi')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                         @enderror
																	</div>
																</div>
															</div>
															 @foreach($data->antri as $dataz)
															<div class="row">
														
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Pengantri</label>
																		<input type="text" class="form-control @error('nomor_antri') is-invalid @enderror" id="nomor_antri" name="nomor_antri" value="{{ old('nomor_antri') ?? $dataz->nomor_antri }}" placeholder="Pengantri">
                                                                         @error('nomor_antri')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                         @enderror
																	</div>
																</div>
															
														
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label mb-10">Antri Jalan</label>
																		<input type="text" class="form-control @error('antri_jalan') is-invalid @enderror" id="antri_jalan" name="antri_jalan" value="{{ old('antri_jalan') ?? $dataz->antri_jalan }}" placeholder="Antri Jalan">
                                                                         @error('antri_jalan')
                                                                        <div class="text-danger">{{ $message }}</div>
                                                                         @enderror
																	</div>
																</div>
														
															</div>
															@endforeach
															
															<div class="seprator-block"></div>
														</div>
														<div class="form-actions mt-10">
															<button type="submit" class="btn btn-success  mr-10"> Update</button>
                                                            </form>
															<button type="button" class="btn btn-default" onclick="window.history.go(-1); return false;">Cancel</button>
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
