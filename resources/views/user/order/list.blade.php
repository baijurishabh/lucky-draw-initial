@extends('section.layout.user')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">Orders List</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('user.orderList')}}">Order</a></li>
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
                                {{-- <h3 class="card-title">File Export</h3> --}}
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
                                            <th class="border-bottom-0">Order ID</th>
                                            <th class="border-bottom-0">Product</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Price</th>
                                            {{-- <th class="border-bottom-0">Quantity</th> --}}
                                            <th class="border-bottom-0">Quantity</th>
                                            <th class="border-bottom-0">Status</th>
                                            <th class="border-bottom-0">Invoice</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $index => $value)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                            <td>{{$value->order_id}}</td>
                                            <td>{{$value->product->name}}</td>
                                            <td><span class="avatar bradius" style="background-image: url('{{asset('storage/product/'.$value->product->image)}}')"></span></td>
                                            <td>₹{{$value->product_price}}</td>
                                            <td>{{$value->quantity}}</td>
                                            <td>{{$value->status}}</td>
                                            {{-- <td>{{$value->quantity}}</td> --}}
                                            <td>
                                                   <a href="{{route('orderInvoiceGenerate',$value->uuid)}}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>Invoice</span></button>
                                                   </a>
                                                       {{-- <a href="" >
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
@endsection
