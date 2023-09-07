@extends('section.layout.admin')
@section('content')
@can('marketing-module')
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
                        <li class="breadcrumb-item active" aria-current="page"><a href="">marketing</a></li>
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
                                <h3 class="card-title">User Details</h3>
                            </div>

                    <div>
                        {{-- <a href=""><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a> --}}

                    </div>

                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">Sl No</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Kyc</th>

                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $value)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                          <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->kyc}}</td>
                                            <td>
                                                    @can('marketing-module')
                                                    <a href="{{route('admin.marketing.joinedDateListView',$value->uuid)}}">
                                                        <button
                                                            class="btn
                                            btn-outline-warning
                                                buttons-copy
                                                buttons-html5"
                                                            tabindex="0" aria-controls="datatable-buttons"
                                                            type="button"><span>View</span></button>
                                                    </a>
                                                    @endcan

                                                   {{-- <a href="{{ route('admin.productView',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View</span></button>
                                                   </a> --}}


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
