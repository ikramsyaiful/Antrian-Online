@extends('Template.Admin.admin')

@section('viewleft')

			<!--begin::Item-->
			<li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Dashboard">
				<a href="{{route('admin.data.index')}}" class="nnav-link btn btn-icon btn-icon-white btn-lg">
					<i class="flaticon2-protection icon-lg"></i>
				</a>
			</li>
			<!--end::Item-->

			<!--begin::Item-->
			<li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Users">
				<a href="{{route('admin.data.user')}}" class="nnav-link btn btn-icon btn-icon-white btn-lg ">
					<i class="flaticon2-analytics-2 icon-lg"></i>
				</a>
			</li>
			<!--end::Item-->

			<!--begin::Item-->
			<li class="nav-item mb-5" data-toggle="tooltip" data-placement="right" data-container="body" data-boundary="window" title="Antrian">
				<a href="{{route('admin.data.viewantrian')}}" class="nav-link btn btn-icon btn-clean btn-icon-white btn-lg active">
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

Antrian

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
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
<div class="subheader py-2 py-lg-4  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">

            <!--begin::Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                                    Antrian                            </h5>
            <!--end::Title-->

            <!--begin::Separator-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
            <!--end::Separator-->

            <!--begin::Search Form-->
            <div class="d-flex align-items-center" id="kt_subheader_search">
                <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">
                                            {{$total}} Total                            </span>
                                    <form class="ml-5"  action="/admin/data/viewantrian/cari" method="GET">
                        <div class="input-group input-group-sm input-group-solid" style="max-width: 175px">
                            <input type="text" class="form-control" id="kt_subheader_search_form" placeholder="Search..." name="cari" value="{{ old('cari') }}">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
    </g>
</svg><!--end::Svg Icon--></span>                                    <!--<i class="flaticon2-search-1 icon-sm"></i>-->
                                </span>
                            </div>
                        </div>
                    </form>
                            </div>
            <!--end::Search Form-->

                            <!--begin::Group Actions-->
                <div class="d-flex- align-items-center flex-wrap mr-2 d-none" id="kt_subheader_group_actions">
                    <div class="text-dark-50 font-weight-bold">
                        <span id="kt_subheader_group_selected_rows">23</span> Selected:
                    </div>
                    <div class="d-flex ml-6">
                        <div class="dropdown mr-2" id="kt_subheader_group_actions_status_change">
                            <button type="button" class="btn btn-light-primary font-weight-bolder btn-sm dropdown-toggle" data-toggle="dropdown">
                                Update Status
                            </button>
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-sm">
                                <ul class="navi navi-hover pt-3 pb-4">
                                    <li class="navi-header font-weight-bolder text-uppercase text-primary font-size-lg pb-0">
                                        Change status to:
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link" data-toggle="status-change" data-status="1">
                                            <span class="navi-text"><span class="label label-light-success label-inline font-weight-bold">Approved</span></span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link" data-toggle="status-change" data-status="2">
                                            <span class="navi-text"><span class="label label-light-danger label-inline font-weight-bold">Rejected</span></span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link" data-toggle="status-change" data-status="3">
                                            <span class="navi-text"><span class="label label-light-warning label-inline font-weight-bold">Pending</span></span>
                                        </a>
                                    </li>
                                    <li class="navi-item">
                                        <a href="#" class="navi-link" data-toggle="status-change" data-status="4">
                                            <span class="navi-text"><span class="label label-light-info label-inline font-weight-bold">On Hold</span></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-light-success font-weight-bolder btn-sm mr-2" id="kt_subheader_group_actions_fetch" data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">
                            Fetch Selected
                        </button>
                        <button class="btn btn-light-danger font-weight-bolder btn-sm mr-2" id="kt_subheader_group_actions_delete_all">
                            Delete All
                        </button>
                    </div>
                </div>
                <!--end::Group Actions-->
                    </div>
        <!--end::Details-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
                            <!--begin::Button-->
                <a href="#" class="">

                                    </a>
                <!--end::Button-->



                           
                    </div>
        <!--end::Toolbar-->
    </div>
</div>

<div class=" container ">
			<!--begin::Row-->
<div class="row">
    @forelse ($data as $datas)
<div class="col-xl-6">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Section-->
                <div class="d-flex align-items-center">
                    <!--begin::Pic-->

                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="d-flex flex-column mr-auto">
                        <!--begin: Title-->
                        <a href="#" class="card-title text-hover-primary font-weight-bolder font-size-h5 text-dark mb-1">
                            {{$datas->name}}
                        </a>
                        <span class="text-muted font-weight-bold">
                            
                        </span>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar mb-auto">
                        <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Menu">
                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ki ki-bold-more-hor"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Navigation-->
<ul class="navi navi-hover">
    <li class="navi-item">
        <a href="{{route('admin.data.editantrian',['data' => $datas->id])}}" class="navi-link">
            <span class="navi-icon"><i class="flaticon-edit"></i></span>
            <span class="navi-text">Edit</span>
        </a>
    </li>
    <li class="navi-item">
        <a href="{{ route('admin.data.destroyantrian',['data'=>$datas->id]) }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?" class="navi-link">
            <span class="navi-icon"><i class="flaticon-delete"></i></span>
            <span class="navi-text">Delete</span>
        </a>
    </li>
    
</ul>
<!--end::Navigation-->
                            </div>
                        </div>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Section-->
                
                <!--begin::Text-->
                <p class="mb-7 mt-3">
                </p>
                <!--end::Text-->
                <!--begin::Blog-->
                <div class="mb-7">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-dark-75 font-weight-bolder mr-2">Alamat:</span>
                                <span class="text-muted font-weight-bold">{{$datas->alamat}}</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-cente my-1">
                                <span class="text-dark-75 font-weight-bolder mr-2">Nomor Telp:</span>
                                <a href="#" class="text-muted text-hover-primary">{{$datas->nomor}}</a>
                            </div>

                </div>
                <!--end::Blog-->
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer d-flex align-items-center">
                <div class="d-flex">
                    

                </div>
      
                <button type="submit" onclick="location.href='{{ route('admin.data.daftarantrian',['data' => $datas->id]) }}';" class="btn btn-primary btn-sm text-uppercase font-weight-bolder mt-5 mt-sm-0 mr-auto mr-sm-0 ml-sm-auto">Daftar Antrian</button>
           
                </div>
            <!--end::Footer-->
        </div>
        <!--end::Card-->
    </div>
                                          @empty
                        <td colspan="6" class="text-center"></td>
                         @endforelse
    </div>
    


                 <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center">
                   {{ $data->links() }}
                  </ul>
                </nav>
		
						

					
 

              
@endsection
