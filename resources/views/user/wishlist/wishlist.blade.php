@extends('section.layout.user')
@section('content')

<!--app-content open-->
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Wishlist</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">E-Commerce</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row row-cards">
                <!-- COL-END -->
                <div class="col-xl-12 col-lg-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card p-0">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-6 col-md-5 col-sm-6">
                                            <div class="input-group d-flex w-100 float-start my-1">
                                                <input type="text" class="form-control" placeholder="Search ...">
                                                <button class="btn input-group-text bg-transparent text-muted">
                                                    <i class="fa fa-search fs-16" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-lg-6 col-md-7 col-sm-6">
                                            <div class="float-sm-end float-none my-1">
                                                <a href="cart.html" class="btn btn-primary me-2">Add All to Cart</a>
                                                <a href="javascript:void(0)" class="btn btn-primary">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-11">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-xl-3 alert">
                                    <div class="card">
                                        <div class="product-grid6">
                                            <div class="product-image6 p-5">
                                                <ul class="icons-wishlist">
                                                    <li><a href="javascript:void(0)" class="bg-danger text-white border-danger border" data-bs-dismiss="alert" aria-hidden="true"><i class="fe fe-heart"></i></a></li>
                                                </ul>
                                                <a href="shop-description.html" class="bg-light">
                                                    <img class="img-fluid br-7 w-100" src="{{ asset('storage/no-image/no-image.png') }}" alt="img">
                                                </a>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="product-content text-center">
                                                    <h1 class="title fw-bold fs-20"><a href="shop-description.html">Stylish Rockerz 255 Ear Pods</a></h1>
                                                    <div class="mb-2 text-warning">
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star text-warning"></i>
                                                        <i class="fa fa-star-half-o text-warning"></i>
                                                        <i class="fa fa-star-o text-warning"></i>
                                                    </div>
                                                    <div class="price mb-2">$16,599<span class="ms-4">$19,799</span></div>
                                                    <span class="text-success fs-18 fw-semibold">In Stock</span>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a href="cart.html" @disabled(true) class="btn btn-primary mx-2 mb-1"><i class="fe fe-shopping-cart me-2"></i>Buy it</a>
                                                <a href="javascript:void(0)" class="btn btn-light mx-2 mb-1"><i class="fe fe-share-2 me-2 text-dark"></i>View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <div class="float-end">
                                    <ul class="pagination mb-5">
                                        <li class="page-item page-prev disabled">
                                            <a class="page-link" href="javascript:void(0)" tabindex="-1">Prev</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                                        <li class="page-item page-next">
                                            <a class="page-link" href="javascript:void(0)">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- COL-END -->
                </div>
                <!-- ROW-1 CLOSED -->
            </div>
            <!-- ROW-1 END-->
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
<!--app-content closed-->

@endsection
