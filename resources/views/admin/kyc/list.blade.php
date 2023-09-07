@extends('section.layout.admin')
@section('content')
@can('user-list')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">Dashboard</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.userList')}}">User</a></li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->



            <!-- Row -->
            <div class="row row-sm">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header" style="justify-content: space-between;">
                            <div>
                                <h3 class="card-title">User Status and Kyc Details</h3>
                            </div>
                    <div>
                        {{-- <a href="{{route('admin.productCreate')}}"><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a> --}}
                    </div>
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">Sl No</th>
                                            <th class="border-bottom-0">User Name</th>
                                            <th class="border-bottom-0">Email</th>
                                            <th class="border-bottom-0">Kyc</th>
                                            <th class="border-bottom-0">Kyc Activation</th>
                                            <th class="border-bottom-0">Payment</th>
                                            <th class="border-bottom-0">Referral</th>
                                            <th class="border-bottom-0">Mobile</th>
                                            <th class="border-bottom-0">Account Status</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $index => $value)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->kyc}}</td>
                                            <td>
                                                @can('user-edit')
                                            <a href="{{ route('admin.userKycactivate', $value->uuid) }}">
                                                <input type="radio"
                                                    {{ $value->kyc == 'Completed' ? 'checked' : '' }}
                                                    value="" name="custom-switch-radio{{ $value->id }}"
                                                    class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Active</span>
                                            </a>
                                            @endcan
                                        </td>
                                            @if ($value->payment->where('type','Plan')->first())
                                            <td class="text-success">Done</td>
                                            @else
                                            <td class="text-danger">Not done</td>
                                            @endif
                                            <td>@can('user-edit')
                                                <a href="{{route('admin.referralUserList',$value->uuid)}}">
                                                <button class="btn
                                                btn-outline-success
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>Referral</span>
                                                </button>
                                               </a>
                                               @endcan
                                            </td>
                                            <td>{{$value->mobile}}</td>
                                            <td>
                                                @can('user-edit')
                                                @if ($value->disable == "YES")
                                                <a href="{{ route('admin.userAccactivate',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-danger
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>Disabled</span></button>
                                                    </a>
                                                    @elseif ($value->disable == "NO")
                                                    <a href="{{ route('admin.userAccdisable',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-success
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>Active</span></button>
                                                   </a>
                                                   @endif
                                                   @endcan
                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('admin.productEdit',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-success
                                                        buttons-copy
                                                        buttons-html5"
                                                        tabindex="0"
                                                        aria-controls="datatable-buttons"
                                                        type="button"><span>Edit</span></button>
                                                   </a> --}}
                                                   @can('user-edit')
                                                   <a href="{{ route('admin.userKycEdit',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>Kyc and Details</span></button>
                                                        </a>
                                                        @endcan
                                                        @can('user-delete')
                                                        <a href="{{ route('admin.userKycDelete',$value->uuid) }}" onclick="return confirm('Are you sure want to delete this User?')">
                                                        <button class="btn
                                                        btn-outline-danger
                                                        buttons-copy
                                                        buttons-html5"
                                                        tabindex="0"
                                                        aria-controls="datatable-buttons"
                                                        type="button"><span>Delete</span></button>
                                                        </a>
                                                        @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
@endcan
@endsection
