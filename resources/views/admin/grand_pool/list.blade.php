@extends('section.layout.admin')
@section('content')
    @can('pool-list')
        <div class="main-content app-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">

                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <h1 class="page-title">Grand Pool Dashboard</h1>
                        <div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a
                                        href="{{ route('admin.grandpoolList') }}">Grand Pool</a></li>
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
                                        <h3 class="card-title">Pool Details</h3>
                                    </div>
                                    @can('pool-create')
                                        <div>
                                            <a href="{{ route('admin.grandpoolCreate') }}"><button type="button"
                                                    class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a>
                                        </div>
                                    @endcan
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="file-datatable"
                                            class="table table-bordered text-nowrap key-buttons border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">Sl No</th>
                                                    <th class="border-bottom-0">Pool Name</th>
                                                    <th class="border-bottom-0">Product Addition</th>
                                                    <th class="border-bottom-0">Products List</th>
                                                    <th class="border-bottom-0">Description</th>
                                                    <th class="border-bottom-0">Start Date</th>
                                                    <th class="border-bottom-0">End Date</th>
                                                    <th class="border-bottom-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($grand_pool as $index => $value)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $value->pool_name }}</td>
                                                        <td>
                                                            @can('pool-product-create')
                                                                <a href="{{ route('admin.poolDetailsCreate', $value->id) }}">
                                                                    <button
                                                                        class="btn
                                                        btn-outline-warning
                                                        buttons-copy
                                                        buttons-html5"
                                                                        tabindex="0" aria-controls="datatable-buttons"
                                                                        type="button"><span>Add Products</span></button>
                                                                </a>
                                                            @endcan
                                                        </td>
                                                        <td> @can('pool-product-list')
                                                                <a href="{{ route('admin.poolDetailsProductsList', $value->id) }}">
                                                                    <button
                                                                        class="btn
                                                        btn-outline-secondary
                                                        buttons-copy
                                                        buttons-html5"
                                                                        tabindex="0" aria-controls="datatable-buttons"
                                                                        type="button"><span>Products List</span></button>
                                                                </a>
                                                            @endcan
                                                        </td>


                                                        <td>{{ $value->description }}</td>
                                                        <td>{{ $value->start_date }}</td>
                                                        <td>{{ $value->end_date }}</td>
                                                        <td>
                                                            @can('pool-edit')
                                                                <a href="{{ route('admin.poolEdit', $value->uuid) }}">
                                                                    <button
                                                                        class="btn
                                                    btn-outline-success
                                                        buttons-copy
                                                        buttons-html5"
                                                                        tabindex="0" aria-controls="datatable-buttons"
                                                                        type="button"><span>Edit</span></button>
                                                                </a>
                                                            @endcan
                                                            @can('pool-delete')
                                                                <a href="{{ route('admin.poolDelete', $value->uuid) }}"
                                                                    onclick="return confirm('Are you sure want to delete this proposal?')">
                                                                    <button
                                                                        class="btn
                                                        btn-outline-danger
                                                        buttons-copy
                                                        buttons-html5"
                                                                        tabindex="0" aria-controls="datatable-buttons"
                                                                        type="button"><span>Delete</span></button>
                                                                </a>
                                                            @endcan
                                                            @can('pool-conduct')
                                                                <a
                                                                    href="{{ route('admin.grandluckyDrawSpinList', $value->uuid) }}">
                                                                    <button
                                                                        class="btn
                                                        btn-outline-warning
                                                        buttons-copy
                                                        buttons-html5"
                                                                        tabindex="0" aria-controls="datatable-buttons"
                                                                        type="button"><span>Spin Pool</span></button>
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
