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
							<button class="btn btn-primary btn-rounded-anim  btn-anim" data-toggle="modal" data-target="#responsive-modal"><i class="fa fa-plus"></i><span class="btn-text">Tambah Antrian</span></button>
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
														<form class="contact100-form validate-form" action="{{ route('tambah_antri', $id->id) }}" method="POST" enctype="multipart/form-data">
                                                         @csrf
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Nama Antrian</label>
																<input class="form-control  @error('name') is-invalid @enderror" maxlength="20" type="name" name="name" id="name" placeholder="Masukkan Nama Antrian" value="{{ old('name') }}">
                                                                @error('name')
					                                            <div class="text-danger">{{ $message }}</div>
					                                            @enderror
															</div>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Deskripsi</label>
																<input class="form-control  @error('deskripsi') is-invalid @enderror" maxlength="20" type="deskripsi" name="deskripsi" id="deskripsi" placeholder="Masukkan Alamat" value="{{ old('deskripsi') }}">
                                                                @error('deskripsi')
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
												<p style='white-space:nowrap; overflow: hidden;text-overflow: ellipsis;max-width: 35ch;'>
                                                {{$datas->name}}
                                                </p>
											</span>
											<span class="block card-user-desn">
                                                <p style='white-space:nowrap; overflow: hidden;text-overflow: ellipsis;max-width: 35ch;'>
												{{$datas->deskripsi}}
                                                </p>
											</span>
										</div>
									</div>
									<div class="pull-right">
										<div class="pull-left inline-block dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class= "glyphicon glyphicon-option-horizontal txt-light"></i></a>

											<ul class="dropdown-menu bullet dropdown-menu-right" data-dropdown-in="flipInY" data-dropdown-out="flipOutY"  role="menu">

												<li role="presentation"><a href="{{ route('data_antri.edit',['data' => $datas->id]) }}" role="menuitem"><i class="zmdi zmdi-edit" aria-hidden="true"></i>Edit</a></li>

                                                <li role="presentation"><a href="{{ route('data_antri.destroy2',['data'=>$datas->id]) }}" data-method="delete" data-token="{{csrf_token() }}" data-confirm="Are you sure?"  role="menuitem"><i class="zmdi zmdi-delete" aria-hidden="true"></i>Delete</a></li>
            
												<li role="presentation" onClick="window.open('{{ route('data_antri.antrianedit',['data' => $datas->id]) }}');"><a href="javascript:void(0)" role="menuitem"><i class="zmdi zmdi-play" aria-hidden="true"></i>Jalankan Antrian</a></li>
                                            </ul>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body row">
										<div class="user-others-details pl-15 pr-15">
											<div class="mb-15">
                                                <ul class="list-inline">
                                                <div class="col-md-6">
                                                    <li class="list-inline-item mr-4">
                                                       <center> <h4 class="mb-0">{{$datas->nomor_antri}}</h4>
                                                        <p class="text-muted">Pengantri</p></center>
                                                    </li>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <center><li class="list-inline-item">
                                                        <h4 class="mb-0">{{$datas->antri_jalan}}</h4>
                                                        <p class="text-muted">Antrian Saat ini</p></center>
                                                    </li>
                                                </div>
                                                 </ul>
											</div>
										</div>
                                         <div class="col-md-12">
										<hr class="light-grey-hr mt-20 mb-20">
										<div class="emp-detail pl-15 pr-15" style="background-color: #337ab7;">
											<div class="mb-5">
                                            <button class="btn btn-tumblr btn-icon-anim btn-block btn-anim" style="background-color: #D6E7F5;"><i class="glyphicon glyphicon-qrcode" onClick="window.open('{{ route('data_antri.verifikasi',['data' => $datas->id]) }}');"></i><span class="btn-text">Scan</span></button>
                                            </div>
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





@endsection
