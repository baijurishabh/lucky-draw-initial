@extends('section.layout.user')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Profile</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row" id="user-profile">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="wideget-user mb-2">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            <div class="panel profile-cover">
                                                <div class="profile-cover__action bg-img">
                                                    {{-- <img src="" alt="img"> --}}
                                                </div>
                                                <div class="profile-cover__img">
                                                    <div class="profile-img-1">
                                                        <img src="{{asset('storage/user/'.Auth()->user()->userDetails->image)}}" alt="img">
                                                    </div>
                                                    <div class="profile-img-content text-dark text-start">
                                                        <div class="text-dark">
                                                            <h3 class="h3 mb-2">{{Auth::user()->name}}</h3>
                                                            <h5 class="text-muted">{{Auth::user()->email}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-profile">
                                                   <a href="{{route('user.profileUpdate')}}"> <button class="btn btn-primary mt-1 mb-1"> <i class="fa fa-rss"></i> <span>Update</span></button></a>
                                                    {{-- <button class="btn btn-secondary mt-1 mb-1"> <i class="fa fa-envelope"></i> <span>View</span></button> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="">
                                                <div class="social social-profile-buttons mt-5 float-end">
                                                    <div class="mt-3">
                                                        {{-- <a class="social-icon text-primary" href=""><i class="fa fa-facebook"></i></a>
                                                        <a class="social-icon text-primary" href=""><i class="fa fa-twitter"></i></a>
                                                        <a class="social-icon text-primary" href=""><i class="fa fa-youtube"></i></a>
                                                        <a class="social-icon text-primary" href=""><i class="fa fa-rss"></i></a>
                                                        <a class="social-icon text-primary" href=""><i class="fa fa-linkedin"></i></a> --}}
                                                        {{-- <a class="social-icon text-primary" href=""><i class="fa fa-google-plus"></i></a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">About</div>
                                </div>
                                <div class="card-body">
                                    {{-- <div>
                                        <h5>Biography<i class="fe fe-edit-3 text-primary mx-2"></i></h5>
                                        <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.
                                            <a href="javascript:void(0)">Read more</a>
                                        </p>
                                    </div> --}}
                                    <hr>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-map-pin fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>Address: {{Auth()->user()->userDetails->address_line1}}, {{Auth()->user()->userDetails->address_line2}} </strong>
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-map-pin fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong></strong>
                                        </div>
                                    </div> --}}
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-phone fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong> Mobile: {{Auth()->user()->mobile}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>Email: {{Auth()->user()->email}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>Referral Link: {{Auth()->user()->getReferralLink()}} </strong>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong> Referred By: {{Auth()->user()->referredBy->name}}</strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>City: {{Auth()->user()->userDetails->city}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>State: {{Auth()->user()->userDetails->state}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>Country: {{Auth()->user()->userDetails->country}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>Gender: {{Auth()->user()->userDetails->sex}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>Bank Account Number: {{Auth()->user()->userDetails->account_number}}</strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>IFSC Code: {{Auth()->user()->userDetails->ifsc_code}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>Telephone: {{Auth()->user()->userDetails->telephone}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>ID Card type: {{Auth()->user()->userDetails->id_card_type}} </strong>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>ID Card number: {{Auth()->user()->userDetails->id_card_number}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>ID Card:  <img width="200" src="{{asset('storage/user/id_card/'.Auth()->user()->userDetails->id_card_image)}}" alt="img"> </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>KYC Status: {{Auth()->user()->kyc}} </strong>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3 mt-3">
                                        <div class="me-4 text-center text-primary">
                                            <span><i class="fe fe-mail fs-20"></i></span>
                                        </div>
                                        <div>
                                            <strong>Plan Purchase: {{Auth()->user()->plan_purchase}} </strong>
                                        </div>
                                    </div>

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
