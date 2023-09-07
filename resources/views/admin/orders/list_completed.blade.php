@extends('section.layout.admin')
@section('content')
@can('order-list')
<div class="main-content app-content mt-0" >
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">Dashboard Order</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.orderList')}}">Order</a></li>
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
                                <h3 class="card-title">Orders in Progress</h3>
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
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Price</th>
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
                                                @can('order-edit')
                                                <div class="example">
                                                    <div class="btn-list">

                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
                                                                    <i class="fe fe-calendar me-2"></i>{{$value->status}}
                                                                </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{route('admin.orderShippingStatus',['Packed',$value->id])}}">Packed</a>
                                                                <a class="dropdown-item" href="{{route('admin.orderShippingStatus',['Shipped',$value->id])}}">Shipped</a>
                                                                <a class="dropdown-item" href="{{route('admin.orderShippingStatus',['Dispatched',$value->id])}}">Dispatched</a>
                                                                <a class="dropdown-item" href="{{route('admin.orderShippingStatus',['Out for delivery',$value->id])}}">Out for delivery</a>
                                                                <a class="dropdown-item" href="{{route('admin.orderShippingStatus',['Delivered',$value->id])}}">Delivered</a>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="dropdown">
                                                            <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown">
                                                                    Show calendar
                                                                </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                                                                <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                </div>
                                                @endcan
                                            </td>
                                            <td>₹{{$value->product_price}}</td>
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
                                                   {{-- <a href="{{ route('admin.productView',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View</span></button>
                                                   </a> --}}
                                                   <a href="{{ route('admin.orderView',$value->id) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View</span></button>
                                                   </a>
                                                   <a href="{{route('orderInvoiceGenerate',$value->uuid)}}">
                                                    <button class="btn
                                                    btn-outline-primary
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>Invoice</span></button>
                                                   </a>
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
