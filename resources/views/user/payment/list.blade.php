@extends('section.layout.user')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Payments List</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('user.paymentList') }}">Payments</a></li>
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
                                    <table id="file-datatable"
                                        class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Sl No</th>
                                                <th class="border-bottom-0">Amount</th>
                                                <th class="border-bottom-0">Payment ID</th>
                                                <th class="border-bottom-0">Payment method</th>
                                                <th class="border-bottom-0">Type</th>
                                                <th class="border-bottom-0">Invoice</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $index => $value)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>₹{{ $value->amount }}</td>

                                                    <td>{{ $value->rzp_payment_id }}</td>
                                                    <td>{{ $value->payment_type }}</td>
                                                    <td>{{ Illuminate\Support\Str::headline($value->type) }}</td>
                                                    <td>
                                                        @if ($value->type == 'Plan')
                                                            <a href="{{ route('planInvoiceGenerate', $value->uuid) }}"><button
                                                                    class="btn
                                                                    btn-outline-warning
                                                                    buttons-copy
                                                                    buttons-html5">Invoice</button></a>
                                                        @else
                                                            <a href="{{ route('orderInvoiceGenerate', $value->order->uuid) }}"><button
                                                                    class="btn
                                                        btn-outline-warning
                                                        buttons-copy
                                                        buttons-html5">Invoice</button></a>
                                                        @endif
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
