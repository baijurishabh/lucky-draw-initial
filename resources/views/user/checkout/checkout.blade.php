@extends('section.layout.user')
@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Checkout</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <form action="{{route('user.checkoutStore',session()->get('data')->uuid)}}" method="POST">
                @csrf
                @switch((session()->get('winner')))
                @case('initial')
            <div class="row">
                <div class="col-xl-8 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Billing Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"> Name <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" required  name="full_name" value="{{Auth()->user()->name}}" placeholder="Full name">
                                    </div>
                                </div>


                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Contact Number <span class="text-red">*</span></label>
                                        <input type="text" class="form-control" required value="{{Auth()->user()->mobile}}"  placeholder="Contact Number" name="contact_number">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Address <span class="text-red">*</span></label>
                                        <input  name="address" required value="{{Auth()->user()->userDetails->address_line1}} {{Auth()->user()->userDetails->address_line2}}"  type="text" class="form-control" placeholder="Home Address">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Country <span class="text-red">*</span></label>
                                        <select name="country" required class="form-control form-select select2" data-bs-placeholder="Select">
                                                <option value="India">India</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">State <span class="text-red">*</span></label>
                                        <select name="state" required class="form-control form-select select2" data-bs-placeholder="Select">
                                                <option value="Kerala">Kerala</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">City <span class="text-red">*</span></label>
                                        <input type="text" value="{{Auth()->user()->userDetails->city}}"  required class="form-control" name="city" placeholder="City">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Postal Code <span class="text-red">*</span></label>
                                        <input type="number" required class="form-control" name="postal_code" placeholder="PIN Code">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">
                    {{-- <div class="card cart">
                        <div class="card-header">
                            <h3 class="card-title">Address</h3>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <h4 class="fw-semibold">Percy Kewshun</h4>
                                <p>{{$user->user->name}} </p>
                                <p>{{$user->user->userDetails->address}}</p>
                                <P>{{$user->user->userDetails->pincode}}</P>
                                <p class="mb-0">+91 {{$user->user->userDetails->contact_number}}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="javascript:void(0)" class="btn btn-primary">Deliver to this Address</a>
                        </div>
                    </div> --}}
                    <div class="card cart">
                        <div class="card-header">
                            <h3 class="card-title">Your Order</h3>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex">
                                    <img class="avatar-xxl br-7" src="{{ asset('storage/product/'.session()->get('data')->product->image) }}" alt="img">
                                    <div class="ms-3">
                                        <h4 class="mb-1 fw-semibold fs-14"><a href="shop-description.html">{{session()->get('data')->product->name}}</a></h4>
                                        <div class="text-warning fs-14">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p>{{session()->get('data')->product->short_description}}</p>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="fs-16 fw-semibold"> ₹{{session()->get('data')->product->our_price}}</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group border br-7 mt-5">
                                <li class="list-group-item border-0">
                                    Market Price
                                    <span class="h6 fw-bold mb-0 float-end">₹{{session()->get('data')->product->market_price}}</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Our Price
                                    <span class="h6 fw-bold mb-0 float-end">₹{{session()->get('data')->product->our_price }}</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Discount (Marcket-Our Price)
                                    <span class="h6 fw-bold mb-0 float-end">₹{{session()->get('data')->product->market_price - session()->get('data')->product->our_price}}</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Shipping
                                    <span class="h6 fw-bold mb-0 float-end">Free</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Total
                                    <span class="h4 fw-bold mb-0 float-end">₹{{session()->get('data')->product->our_price}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-end">
                            <input type='submit' class="btn btn-primary" value='Place Order' id='click-payment'>
                        </div>
                    </div>
                </div>
            </div>
            @break
            @case('confirm')
            <div class="row">
                <div class="col-xl-8 col-md-12">
                    <div class="card">
                      <div class="card cart">
                        <div class="card-header">
                            <h3 class="card-title">Billing Address</h3>
                        </div>
                        <div class="card-body">
                            <div class="">
                                {{-- {{dd(session()->get('billing'))}} --}}
                                <h4 class="fw-semibold"> Name: {{session()->get('billing.full_name')}} </h4>
                                <p>Address: {{session()->get('billing.address')}}</p>
                                <p>City: {{session()->get('billing.city')}}</p>
                                <P>State: {{session()->get('billing.state')}}</P>
                                <P>Country: {{session()->get('billing.country')}}</P>
                                <P>PIN Code: {{session()->get('billing.postal_code')}}</P>
                                <p class="mb-0">Contact Number: {{session()->get('billing.contact_number')}}</p>
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            <a href="javascript:void(0)" class="btn btn-primary">Deliver to this Address</a>
                        </div> --}}
                    </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12">
                    <div class="card cart">
                        <div class="card-header">
                            <h3 class="card-title">Your Order</h3>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex">
                                    <img class="avatar-xxl br-7" src="{{ asset('storage/product/'.session()->get('data')->product->image) }}" alt="img">
                                    <div class="ms-3">
                                        <h4 class="mb-1 fw-semibold fs-14"><a href="shop-description.html">{{session()->get('data')->product->name}}</a></h4>
                                        <div class="text-warning fs-14">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <p>{{session()->get('data')->product->short_description}}</p>
                                    </div>
                                    <div class="ms-auto">
                                        <span class="fs-16 fw-semibold">₹{{session()->get('data')->product->our_price}}</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group border br-7 mt-5">
                                <li class="list-group-item border-0">
                                    Market Price
                                    <span class="h6 fw-bold mb-0 float-end">₹{{session()->get('data')->product->market_price}}</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Our Price
                                    <span class="h6 fw-bold mb-0 float-end">₹{{session()->get('data')->product->our_price }}</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Discount (Marcket-Our Price)
                                    <span class="h6 fw-bold mb-0 float-end">₹{{session()->get('data')->product->market_price - session()->get('data')->product->our_price}}</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Shipping
                                    <span class="h6 fw-bold mb-0 float-end">Free</span>
                                </li>
                                <li class="list-group-item border-0">
                                    Total
                                    <span class="h4 fw-bold mb-0 float-end">₹{{session()->get('data')->product->our_price}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-end">
                            <input type='submit' class="btn btn-primary" value='Place Order' id="rzp-button1">
                        </div>
                    </div>
                </div>
            </div>
            @break

            @default
            @endswitch
        </form>
            <!-- ROW-1 CLOSED -->
        </div>
        <!-- CONTAINER CLOSED -->

    </div>
</div>
@if (session()->get('payment') == 'initiate')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var options = {
        "key": "{{ $response['razorpayId'] }}", // Enter the Key ID generated from the Dashboard
        "amount": "{{ $response['amount'] }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "{{ $response['currency'] }}",
        "name": "{{ $response['name'] }}",
        "description": "{{ $response['description'] }}",
        "image": "https://example.com/your_logo",
        "order_id": "{{ $response['orderId'] }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function(response) {

            document.getElementById('rzp_paymentId').value = response.razorpay_payment_id;
            document.getElementById('rzp_orderId').value = response.razorpay_order_id;
            document.getElementById('rzp_signature').value = response.razorpay_signature;
            document.getElementById('rzp_buttonsuccess').click();

        },
        "prefill": {
            "name": "{{ $response['name'] }}",
            "email": "{{ $response['email'] }}",
            "contact": "{{ $response['contactNumber'] }}"
        },
        "notes": {
            "address": "{{ $response['address'] }}"
        },
        "theme": {
            "color": "#ee82ee"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function(response) {
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
    });
    window.onload = function() {
        document.getElementById('rzp-button1').click();
    };
    document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
    }
</script>

<form action="{{ route('paymentResponse') }}" method="POST" hidden>
    @csrf
    {{-- {{dd($response)}} --}}
    @if ($response['order_type'] == 'Plan')
        <input type="text" id="rzp_paymentId" name="rzp_paymentId">
        <input type="text" id="rzp_orderId" name="rzp_orderId">
        <input type="text" id="rzp_signature" name="rzp_signature">
        <input type="text" name="email" id="" value="{{ $response['email'] }}">
        <input type="text" name="amount" id="" value="{{ $response['rate'] }}">
        <input type="text" name="user_id" id="" value="{{ $response['user_id'] }}">
        <input type="text" name="order_type" id="" value="{{ $response['order_type'] }}">
    @else
        <input type="text" id="rzp_paymentId" name="rzp_paymentId">
        <input type="text" id="rzp_orderId" name="rzp_orderId">
        <input type="text" id="rzp_signature" name="rzp_signature">
        <input type="text" name="email" id="" value="{{ $response['email'] }}">
        <input type="text" name="amount" id="" value="{{ $response['rate'] }}">
        <input type="text" name="user_id" id="" value="{{ $response['user_id'] }}">
        <input type="text" name="order_type" id="" value="{{ $response['order_type'] }}">
        {{-- <input type="text" name="grand_win" id="" value="{{ $response['grand_win'] }}"> --}}
        <input type="text" name="product_id" id="" value="{{ $response['product_id'] }}">
        <input type="text" name="category_id" id="" value="{{ $response['category_id'] }}">
    @endif

    <button type="submit" id="rzp_buttonsuccess">Submit</button>
</form>
@endif

<!--app-content closed-->

@endsection
