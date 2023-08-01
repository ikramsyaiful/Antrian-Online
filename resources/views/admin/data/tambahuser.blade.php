@extends('Template.Admin.admin')
@section('viewleft')

			<!--begin::Item-->
			<li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Dashboard">
				<a href="{{route('admin.data.index')}}" class="nav-link btn btn-icon btn-icon-white btn-lg">
					<i class="flaticon2-protection icon-lg"></i>
				</a>
			</li>
			<!--end::Item-->

			<!--begin::Item-->
			<li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Users">
				<a href="{{route('admin.data.user')}}" class="nav-link btn btn-icon btn-icon-white btn-lg">
					<i class="flaticon2-analytics-2 icon-lg"></i>
				</a>
			</li>
			<!--end::Item-->

			<!--begin::Item-->
			<li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Antrian">
				<a href="{{route('admin.data.viewantrian')}}" class="nav-link btn btn-icon btn-icon-white btn-lg">
					<i class="flaticon2-calendar-6 icon-lg"></i>
				</a>
			</li>
			<!--end::Item-->

			<!--begin::Item-->
			<li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Daftar Antrian">
				<a href="{{route('admin.data.viewdaftarantrian')}}" class="nav-link btn btn-icon btn-icon-white btn-lg" >
					<i class="flaticon2-list-3 icon-lg"></i>
				</a>
			</li>
			<!--end::Item-->

@endsection
@section('title')

Tambah User

@endsection

@section('active')
						<li class="menu-item  menu-label "  aria-haspopup="true"><a  href="{{route('admin.data.index')}}" class="menu-link "><span class="menu-text">Dashboard</span></a></li>
<li class="menu-item menu-item-active  menu-item-active-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Menu</span><span class="menu-desc"></span><i class="menu-arrow"></i></a><div class="menu-submenu menu-submenu-classic menu-submenu-left" ><ul class="menu-subnav">


<li class="menu-item " aria-haspopup="true"><a href="{{route('admin.data.user')}}" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Shield-check.svg-->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"></path>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Users</span><span class="menu-label"></span></a></li>
</li>

<li class="menu-item " aria-haspopup="true"><a href="{{route('admin.data.viewantrian')}}" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Shield-check.svg-->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000"></path>
        <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3"></path>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Antrian</span><span class="menu-label"></span></a></li>
</li>

<li class="menu-item " aria-haspopup="true"><a href="{{route('admin.data.viewdaftarantrian')}}" class="menu-link "><span class="svg-icon menu-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Shield-check.svg-->
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"></path>
        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"></path>
        <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"></rect>
        <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"></rect>
        <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"></rect>
        <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"></rect>
        <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"></rect>
        <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"></rect>
    </g>
</svg><!--end::Svg Icon--></span><span class="menu-text">Daftar Antrian</span><span class="menu-label"></span></a></li>
</li>
</ul>
@endsection

@section('content')
<div class="subheader py-2 py-lg-4  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">

            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    Tambah User                          </h5>
            <!--end::Title-->

            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->

            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                                                                          </span>
                            </div>
            <!--end::Search Form-->

                    </div>
        <!--end::Details-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
                            <!--begin::Button-->
                <a onclick="window.history.go(-1); return false;" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">

                    Back                </a>
                <!--end::Button-->

                                                <!--begin::Dropdown-->
                    <!--end::Dropdown-->

                    </div>
        <!--end::Toolbar-->
    </div>
</div>

    


<div class=" container ">
<div class="card card-custom">


    <!--begin::Card body-->
    <div class="card-body px-0">

        
            <div class="tab-content">
                <!--begin::Tab-->
                <div class="tab-pane show px-7 active" id="kt_user_edit_tab_1" role="tabpanel">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7 my-2">
                            <!--begin::Row-->
                            <div class="row">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <h6 class=" text-dark font-weight-bold mb-10"></h6>
                                </div>
                            </div>
                            <!--end::Row-->
                            <form class="contact100-form validate-form" action="{{ route('admin.data.createuser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Avatar</label>
                                <div class="col-9">
                                    <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url({{ asset('metronicaadmin/dist/assets/media/users/blank.png') }})">
                                        <div class="image-input-wrapper"></div>
                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="pic" id="pic" accept=".png, .jpg, .jpeg">
                							<input type="hidden" name="pic">
                                            @error('pic')
					                        <div class="text-danger">{{ $message }}</div>
					                        @enderror
                                        </label>

                						<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>

                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->


                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Nama Lengkap</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}">
                                     @error('name')
					                 <div class="text-danger">{{ $message }}</div>
					                 @enderror
                                </div>
                            </div>
                            <!--end::Group-->

                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Email Address</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                        <input type="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" placeholder="Email"  name="email" id="email" placeholder="Masukkan Alamat" value="{{ old('email') }}">
                                         @error('email')
					                     <div class="text-danger">{{ $message }}</div>
					                     @enderror
                                    </div>
                                </div>
                            </div>
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Password</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="password" type="password" name="password" id="password" placeholder="Masukkan Nama Antrian" value="{{ old('password') }}">
                                    @error('password')
					                <div class="text-danger">{{ $message }}</div>
					                 @enderror
                                </div>
                            </div>
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Ulangi password</label>
                                <div class="col-9">
                                    <input placeholder="Ulangi Password" id="password-confirm" type="password" class="form-control form-control-lg form-control-solid" name="password_confirmation" required autocomplete="new-password">

                                </div>
                            </div>
                             <center>  <button type="submit" class="btn btn-success">Tambah</button> <center>
                             </form>
                            <!--end::Group-->
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Tab-->
            </div>
    </div>
    <!--begin::Card body-->
</div>
   @forelse ($data as $datas)

              
                          @empty
                        <td colspan="6" class="text-center"></td>
                         @endforelse
		</div>
						
             
					
 

              
@endsection
