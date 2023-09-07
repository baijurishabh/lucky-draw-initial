@extends('section.layout.admin')
@section('content')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Winner</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Winner</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Winner-Profile</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row" id="user-profile">
                <div class="col-lg-12">
                    <div class="card" id="modal3">
                        <div class="card-header border-bottom-0">
                            <div class="card-title">
                                Pool Winner
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="p-4 bg-light border border-bottom-0">
                                <div class="modal d-block pos-static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body text-center p-4 pb-5">
                                                <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                <i class="icon icon-check fs-70 text-success lh-1 my-4 d-inline-block"></i>
                                                <h4 class="text-success mb-4">Congratulations!</h4>
                                                <h6 class="text-success mb-4">{{$winner->user->name}}</h6>
                                                <p class="mb-4 mx-4">Successfully Won {{$winner->product->name}}</p>
                                                <a href="{{route('admin.poolList')}}"><button class="btn btn-success pd-x-25">Continue</button></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal-wrapper-demo -->
                            <div class="text-center py-4 bg-light border">
                                <a class="btn btn-primary" href="{{route('admin.poolList')}}">Back To Pool</a>
                            </div>
                            <!-- modal-footer-demo -->
                        </div>
                    </div>
                    {{-- <div class="card">
                        <div class="card-body">
                            <div class="wideget-user mb-2">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="panel profile-cover">
                                                <div class="profile-cover__action bg-img" style="background-image: url{{asset('storage/winbanner/win.jpg')}}')"></div>
                                                <div class="profile-cover__img">
                                                    <div class="profile-img-1">
                                                        <img src="{{asset('storage/winbanner/win.jpg')}}" alt="img">
                                                    </div>
                                                    <div class="profile-img-content text-dark text-start">
                                                        <div class="text-dark">
                                                            <h3 class="h3 mb-2">{{$winner->user->name}}</h3>
                                                            <h5 class="text-muted">congratulations</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-profile">
                                                    <button class="btn btn-secondary mt-1 mb-1"> <i class="fa fa-envelope"></i> <span>Message</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <div class="social social-profile-buttons mt-5 float-end">
                                                    <div class="mt-3">

                                                        <a class="social-icon text-primary" href=""><i class="fa fa-rss"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Product and User Details</div>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5>Product Details</h5>
                                <p>
                                    <span>{{$winner->product->name}}</span><br><br>
                                    <span>Price</span>  <span>₹ {{$winner->product->our_price}}</span><br>
                                    <span>{!! $winner->product->specification !!}</span><br>
                                    <span>{!! $winner->product->description !!}</span><br>
                                    <span>{!! $winner->product->short_description !!}</span><br>
                                    {{-- <a href="javascript:void(0)">Read more</a> --}}
                                </p>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center mb-3 mt-3">
                                <div class="me-4 text-center text-primary">
                                    <span><i class="fe fe-briefcase fs-20"></i></span>
                                </div>
                                <div>
                                    <strong>Contact Details</strong>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 mt-3">
                                <div class="me-4 text-center text-primary">
                                    <span><i class="fe fe-map-pin fs-20"></i></span>
                                </div>
                                <div>
                                    <strong>{{$winner->user->userDetails->address_line1}}</strong><br>
                                    <strong>{{$winner->user->userDetails->address_line2}}</strong><br>
                                    <strong>{{$winner->user->userDetails->city}}</strong><br>
                                    <strong>{{$winner->user->userDetails->state}}</strong><br>
                                    <strong>{{$winner->user->userDetails->country}}</strong><br>
                                    <strong></strong><br>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 mt-3">
                                <div class="me-4 text-center text-primary">
                                    <span><i class="fe fe-phone fs-20"></i></span>
                                </div>
                                <div>
                                    <strong>{{$winner->user->mobile}} </strong>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3 mt-3">
                                <div class="me-4 text-center text-primary">
                                    <span><i class="fe fe-mail fs-20"></i></span>
                                </div>
                                <div>
                                    <strong>{{$winner->user->email}}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
@endsection
