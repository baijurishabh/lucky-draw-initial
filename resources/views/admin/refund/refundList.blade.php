@extends('section.layout.admin')
@section('content')
@can('refund-list')
<div class="main-content app-content mt-0" >
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">Dashboard Refund</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.refund.pendingList')}}">Pending Refund</a></li>
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
                                <h3 class="card-title">Refund in Progress</h3>
                            </div>
                    <div>
                        {{-- <a href="{{route('admin.productCreate')}}"><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a> --}}
                    </div>
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table style="height: 100vh;" id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">Sl No</th>
                                            <th class="border-bottom-0">Order ID</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Product Name</th>
                                            <th class="border-bottom-0">Customer Name</th>
                                            <th class="border-bottom-0">Refund Status</th>
                                            <th class="border-bottom-0">Refund Amount</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $value)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                            <td>{{$value->order_id}}</td>
                                            <td><span class="avatar bradius" style="background-image: url('{{asset('storage/product/'.$value->product->image)}}')"></span></td>
                                            <td>{{$value->product->name}}</td>
                                            <td>{{$value->user->name}}</td>
                                            <td>
                                                {{$value->payment->refund}}
                                            </td>
                                            <td>₹{{$value->product_price}}</td>
                                            <td>
                                                @can('refund-edit')
                                                   </a>
                                                       <a href="{{ route('admin.refund.refundStatus',$value->payment->uuid) }}" onclick="return confirm('Are you sure amount has been Transfered?')">
                                                        <button class="btn
                                                        btn-outline-danger
                                                        buttons-copy
                                                        buttons-html5"
                                                        tabindex="0"
                                                        aria-controls="datatable-buttons"
                                                        type="button"><span>Refunted</span></button>
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
