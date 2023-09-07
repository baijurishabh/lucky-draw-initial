<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Benefitshops">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Benefitshops</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.cs') }}s" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.cssv') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        {{-- <img src="../assets/images/brand/logo-white.png" class="header-brand-img m-0" alt=""> --}}
                    </div>
                </div>
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" method="post" action="">

                            <span class="login100-form-title">
									Proceed Payment
								</span>
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="text" value="{{$user->name}}" name="name" placeholder="User name">
                            </div>
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="email" value="{{$user->email}}" name="email" placeholder="Email">
                            </div>
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="mobile" value="{{$user->mobile}}" name="mobile" placeholder="Mobile">
                                <input type="hidden" name="amount" value="{{$setting->price}}" id="">
                                <input type="hidden" name="name" value="{{$user->name}}" id="">
                                <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                <input type="hidden" name="order_type" value="Plan" id="">
                                <input type="hidden" name="address" value="{{$userDetails->address_line1}},{{$userDetails->address_line2}}">
                            </div>

                            <div class="container-login100-form-btn">
                                {{-- <a href="index.html" type="submit" class="login100-form-btn btn-primary">
										Register
									</a> --}}
                                    <button type="button" id="rzp-button1" class="login100-form-btn btn-primary">Pay Now</button>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Amount to Pay<a href="" class="text-primary ms-1">₹{{$setting->price}}</a></p>
                            </div>
                            {{-- <label class="login-social-icon"><span>Register with Social</span></label>
                            <div class="d-flex justify-content-center">
                                <a href="javascript:void(0)">
                                    <div class="social-login me-4 text-center">
                                        <i class="fa fa-google"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="social-login me-4 text-center">
                                        <i class="fa fa-facebook"></i>
                                    </div>
                                </a>
                                <a href="javascript:void(0)">
                                    <div class="social-login text-center">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                </a>
                            </div> --}}
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->
    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
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
        // window.onload = function() {
        //     document.getElementById('rzp-button1').click();
        // };
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
            <input type="text" name="product_id" id="" value="{{ $response['product_id'] }}">
            <input type="text" name="category_id" id="" value="{{ $response['category_id'] }}">
        @endif

        <button type="submit" id="rzp_buttonsuccess">Submit</button>
    </form>
    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('assets/js/show-password.min.js') }}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{ asset('assets/js/generate-otp.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
