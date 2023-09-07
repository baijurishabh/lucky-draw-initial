@extends('section.layout.admin')
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
                                                <div class="profile-cover__action bg-img" style="background-image: url('https://t4.ftcdn.net/jpg/01/37/98/71/360_F_137987157_upJtyLjwygTlAO0HA5nNsHrTuEg1vP0g.jpg')">
                                                    {{-- <img src="" alt="img"> --}}
                                                </div>
                                                <div class="profile-cover__img">
                                                    <div class="profile-img-1">
                                                        <img src="{{asset('storage/admin/'.Auth()->user()->image)}}" alt="img">
                                                    </div>
                                                    <div class="profile-img-content text-dark text-start">
                                                        <div class="text-dark" style="margin-top: -5px;">
                                                            <h3 class="h3 mb-2 text-white">{{Auth::user()->name}}</h3>
                                                            <h5 class="text-muted text-white">{{Auth::user()->email}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-profile">
                                                   <a href="{{route('admin.profileUpdate')}}"> <button class="btn btn-primary mt-1 mb-1"> <i class="fa fa-rss"></i> <span>Update</span></button></a>
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

                            {{-- <div class="card">
                                <div class="card-header">
                                    <div class="card-title">About</div>
                                </div>

                            </div> --}}

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
