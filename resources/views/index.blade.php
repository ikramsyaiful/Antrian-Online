@extends('Template.Pelayan.core')



@section('search')

@endsection

@section('active')
                <li>
					<a href="{{route('dashboard')}}"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
				</li>
                <li>
					<a class="active" href="{{route('index')}}"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Antrian</span></div><div class="clearfix"></div></a>
				</li>
                <li>
					<a href="{{route('profile')}}"><div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">My Account</span></div><div class="clearfix"></div></a>
				</li>
@endsection
@section('isi')

                    <div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<button class="btn btn-primary btn-rounded-anim  btn-anim" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-plus"></i><span class="btn-text">Buat Antrian</span></button>
						</div>
					</div>
                                        <!-- /.modal -->

										<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
														<h5 class="modal-title">Buat Antrian</h5>
													</div>
													<div class="modal-body">
														<form class="contact100-form validate-form" action="{{ route('buat_antri') }}" method="POST" enctype="multipart/form-data">
                                                         @csrf
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Nama Antrian</label>
																<input class="form-control  @error('name') is-invalid @enderror" maxlength="20" type="name" name="name" id="name" placeholder="Masukkan Nama Antrian" value="{{ old('name') }}">
                                                                @error('name')
					                                            <div class="text-danger">{{ $message }}</div>
					                                            @enderror
															</div>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Alamat</label>
																<input class="form-control  @error('alamat') is-invalid @enderror" maxlength="20" type="alamat" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                                                                @error('alamat')
					                                            <div class="text-danger">{{ $message }}</div>
					                                            @enderror
															</div>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Nomor Telpon</label>
																<input class="form-control  @error('nomor') is-invalid @enderror" maxlength="20" type="nomor" name="nomor" id="nomor" placeholder="Masukkan Nama Antrian" value="{{ old('nomor') }}">
                                                                @error('nomor')
					                                            <div class="text-danger">{{ $message }}</div>
					                                            @enderror
															</div>
													</div>
													<div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Tambah</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													</div>
                                                    </form>
												</div>
											</div>
										</div>

             <div class="row">
						
                @forelse ($data as $datas)
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-primary contact-card card-view">
								 <div style="background-color: #143459;;" class="panel-heading">
									<div class="pull-left">

										<div class="pull-left user-detail-wrap">	
											<span class="block card-user-name">
                                              {{$datas->name}} 
											</span>
										</div>
									</div>
									<div class="pull-right">
										<a class="pull-left inline-block mr-15" href="{{ route('edit_antrian',['data' => $datas->id]) }}">
											<i class="zmdi zmdi-edit txt-light"></i>
										</a>
										<a class="pull-left inline-block mr-15" href="{{ route('data_antri.destroy',['data'=>$datas->id]) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
											<i class="zmdi zmdi-delete txt-light"></i>
										</a>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="panel-wrapper collapse in">

									<div class="panel-body row">
                                    <div class="user-others-details pl-15 pr-15">
                                    Alamat
                                    <div class="mb-15">
                                             <span class="inline-block txt-dark">{{$datas->alamat}}</span>
                                     </div>
                                    </div>
                                  

										<div class="user-others-details pl-15 pr-15">
											<div class="mb-15">
												<i class="zmdi zmdi-email-open inline-block mr-10"></i>
												<span class="inline-block txt-dark">{{Auth::user()->email}}</span>
											</div>
											<div class="mb-15">
												<i class="zmdi zmdi-smartphone inline-block mr-10"></i>
												<span class="inline-block txt-dark">{{$datas->nomor}}</span>
                                               
											</div>
											<div class="mb-15">
												<i class="zmdi zmdi-link inline-block mr-10"></i>
                                                <a href="{{ URL::to('detail') }}/{{ $datas->id}}" onclick="copyURI(event)">Copy Link</a>
											</div>
										</div>
										<hr class="light-grey-hr mt-20 mb-20">
										<div class="emp-detail pl-15 pr-15">
                                        	<div class="mb-5">
                                            <form action="{{ route('show',['data' => $datas->id]) }}">
                                            <button class="btn btn-tumblr btn-icon-anim btn-block btn-anim" style="background-color: #D6E7F5;"><i class="fa fa-play" ></i><span class="btn-text">Masuk</span></button>
                                            </form>
                                            </div>
										</div>
									</div>
								</div>
							</div>
						</div>

                          @empty
                        <td colspan="6" class="text-center"></td>
                         @endforelse
				</div>

                <script>
                function copyURI(evt) {
                    evt.preventDefault();
                    navigator.clipboard.writeText(evt.target.getAttribute('href')).then(() => {
                      /* clipboard successfully set */
                                swal({
                                  title: "Link Tercopy",
                                  text: "Link Telah Di Copy",
                                  icon: "success",
                                  dangerMode: false,
                                })

                    }, () => {
                      /* clipboard write failed */
                    });
                }
                </script>
@endsection
