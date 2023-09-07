@extends('section.layout.user')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Your Pool Wins</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('user.poolWins') }}">Pool</a></li>
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
                                                <th class="border-bottom-0">Product Name</th>
                                                <th class="border-bottom-0">Product Image</th>
                                                <th class="border-bottom-0">Market Price</th>
                                                <th class="border-bottom-0">Our Price</th>
                                                <th class="border-bottom-0">Pool</th>
                                                <th class="border-bottom-0">Expiry Date</th>
                                                {{-- <th class="border-bottom-0">Quantity</th> --}}
                                                <th class="border-bottom-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $index => $value)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $value->product->name }}</td>
                                                    <td><span class="avatar bradius"
                                                            style="background-image: url('{{ asset('storage/product/' . $value->product->image) }}')"></span>
                                                    </td>
                                                    <td>₹{{ $value->product->market_price }}</td>
                                                    <td>₹{{ $value->product->our_price }}</td>
                                                    <td>{{ $value->pool->pool_name }}</td>
                                                    <td>{{ Carbon\Carbon::parse($value->countdown)->format('d-M-Y  g:i:s A') }}
                                                    </td>
                                                    {{-- <td>{{$value->quantity}}</td> --}}
                                                    <td>
                                                        {{-- <a href="{{ route('admin.productView',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View</span></button>
                                                   </a> --}}
                                                        @if ($value->referred_user_redeemed == 'YES')
                                                            <p class="text-success">Offer Redeemed</p>
                                                        @else
                                                            @if (Carbon\Carbon::now() <= $value->countdown)
                                                            <a href="{{ route('user.grand_checkout', $value->uuid) }}"
                                                                onclick="return confirm('Are you sure to place this order?')">
                                                                <button
                                                                    class="btn
                                                btn-outline-warning
                                                buttons-copy
                                                buttons-html5"
                                                                    tabindex="0" aria-controls="datatable-buttons"
                                                                    type="button"><span>Order Now</span></button>
                                                            </a>

                                                            @else
                                                            <p class="text-success">Offer Expired</p>
                                                            @endif
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
