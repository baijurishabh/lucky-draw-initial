@extends('section.layout.admin')
@section('content')
@can('payment-list')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">Payment Details</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.productList')}}">Payment Details</a></li>
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
                                <h3 class="card-title">Plan Puchase Details</h3>
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
                                        <th class="border-bottom-0">Amount</th>
                                        <th class="border-bottom-0">Transaction ID</th>
                                        <th class="border-bottom-0">Payment ID</th>
                                        <th class="border-bottom-0">Mode</th>
                                         <th class="border-bottom-0">Payment Type</th>
                                        <th class="border-bottom-0">Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $index => $value)
                                    <tr>
                                        <td>{{$index +1}}</td>
                                        <td>{{$value->user->name}}</td>
                                        <td><span>₹</span>{{$value->amount}}</td>
                                        <td>{{$value->transaction_id}}</td>
                                        <td>{{$value->rzp_payment_id}}</td>
                                        <td>{{$value->mode}}</td>
                                        <td>{{$value->payment_type}}</td>
                                        <td>
                                                   <a href="{{ route('planInvoiceGenerate',$value->uuid) }}" >
                                                    <button class="btn
                                                    btn-outline-warning
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
