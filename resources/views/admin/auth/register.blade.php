<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lukcy Draw">
    <meta name="author" content="Torc Infotech">
    <meta name="keywords"
        content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Benefitshops</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">


            <!--app-content open-->



            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->


                <!--Row open-->

                <!--row closed-->

                <!--row open-->
                <div class="row" style="justify-content: center; height: 100vh; align-items: center;">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header border-bottom-0">
                                <h3 class="card-title">Registration</h3>
                            </div>
                            {{-- {{dd(Cookie::get('referral'))}} --}}
                            <div class="card-body">
                                <form id="form" method="POST">
                                    @csrf
                                    <div class="list-group">
                                        <div class="list-group-item" data-acc-step>
                                            <h5 class="mb-0 d-flex" data-acc-title><span
                                                    class="form-wizard-title">Personal &amp; Details</span></h5>
                                            <div data-acc-content>
                                                <div class="my-3">
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input type="text" name="name" class="form-control" value="{{old('name')}}" required/>
                                                    </div>
                                                    @if ($errors->has('name'))
                                                        <p class="" style="color: red; font-size: .8rem;">
                                                            {{ $errors->first('name') }}
                                                        </p>
                                                    @endif
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input type="email" name="email" class="form-control" value="{{old('email')}}" required/>
                                                        @if ($errors->has('email'))
                                                            <p class="" style="color: red; font-size: .8rem;">
                                                                {{ $errors->first('email') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password:</label>
                                                        <input type="password" name="password" class="form-control" value="{{old('password')}}" required />
                                                        @if ($errors->has('password'))
                                                            <p class="" style="color: red; font-size: .8rem;">
                                                                {{ $errors->first('password') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label>Sex:</label>
                                                                <select name="sex" value="{{old('sex')}}"
                                                                    class="form-control select2 form-select">
                                                                    <option value="Other">Other</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                                @if ($errors->has('sex'))
                                                                    <p class=""
                                                                        style="color: red; font-size: .8rem;">
                                                                        {{ $errors->first('sex') }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                            <div class="col-6">
                                                                <label>Age:</label>
                                                                <input type="number" name="age"
                                                                    class="form-control" />
                                                                @if ($errors->has('age'))
                                                                    <p class=""
                                                                        style="color: red; font-size: .8rem;">
                                                                        {{ $errors->first('age') }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                            <div class="col-8">
                                                                <label>Upload ID</label>
                                                                <input type="file" name="image"
                                                                    class="form-control">
                                                                @if ($errors->has('image'))
                                                                    <p class=""
                                                                        style="color: red; font-size: .8rem;">
                                                                        {{ $errors->first('image') }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item" data-acc-step>
                                            <h5 class="mb-0 d-flex" data-acc-title><span
                                                    class="form-wizard-title">Address</span></h5>
                                            <div data-acc-content>
                                                <div class="my-3">
                                                    <div class="form-group">
                                                        <label>Address Line 1:</label>
                                                        <input type="text" name="address_line1"
                                                            class="form-control" />
                                                        @if ($errors->has('address_line2'))
                                                            <p class="" style="color: red; font-size: .8rem;">
                                                                {{ $errors->first('address_line1') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Address Line 2:</label>
                                                        <input type="text" name="address_line2"
                                                            class="form-control" />
                                                        @if ($errors->has('address_line2'))
                                                            <p class="" style="color: red; font-size: .8rem;">
                                                                {{ $errors->first('address_line2') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <label>City:</label>
                                                            <input type="text" name="city"
                                                                class="form-control" />
                                                            @if ($errors->has('city'))
                                                                <p class=""
                                                                    style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('city') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                        <div class="col-4">
                                                            <label>State:</label>
                                                            <input type="text" name="state"
                                                                class="form-control" />
                                                            @if ($errors->has('state'))
                                                                <p class=""
                                                                    style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('state') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                        <div class="col-4">
                                                            <label>Country:</label>
                                                            <input type="text" name="country"
                                                                class="form-control" />
                                                            @if ($errors->has('country'))
                                                                <p class=""
                                                                    style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('country') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item" data-acc-step>
                                            <h5 class="mb-0 d-flex" data-acc-title><span
                                                    class="form-wizard-title">Contact</span></h5>
                                            <div data-acc-content>
                                                <div class="my-3">
                                                    <div class="form-group">
                                                        <label>Telephone:</label>
                                                        <input type="number" name="telephone"
                                                            class="form-control" />

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Mobile:</label>
                                                        <input type="number" min="12" name="mobile"
                                                            class="form-control" value="91"/>
                                                        @if ($errors->has('mobile'))
                                                            <p class="" style="color: red; font-size: .8rem;">
                                                                {{ $errors->first('mobile') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list-group-item" data-acc-step>
                                            <h5 class="mb-0 d-flex" data-acc-title><span class="form-wizard-title">ID
                                                    Proof</span></h5>
                                            <div data-acc-content>
                                                <div class="my-3">
                                                    <div class="form-group">
                                                        <select name="id_card_type"
                                                            class="form-control select2 form-select">
                                                            <option value="Other">Other</option>
                                                            <option value="Aadhar">Aadhar</option>
                                                            <option value="PAN">PAN</option>
                                                        </select>
                                                        @if ($errors->has('id_card_type'))
                                                            <p class="" style="color: red; font-size: .8rem;">
                                                                {{ $errors->first('id_card_type') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group form-row">
                                                        <div class="col-sm-4">
                                                            <label>ID Card Number</label>
                                                            <input type="text" name="id_card_number"
                                                                class="form-control">
                                                            @if ($errors->has('id_card_number'))
                                                                <p class=""
                                                                    style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('id_card_number') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                        <div class="col-8">
                                                            <label>Upload ID</label>
                                                            <input type="file" name="id_card_image"
                                                                class="form-control">
                                                            @if ($errors->has('id_card_image'))
                                                                <p class=""
                                                                    style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('id_card_image') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-row">
                                                        <div class="col-sm-4">
                                                            <label>IFSC Code</label>
                                                            <input type="text" name="ifsc_code"
                                                                class="form-control">
                                                            @if ($errors->has('ifsc_code'))
                                                                <p class=""
                                                                    style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('ifsc_code') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                        <div class="col-8">
                                                            <label>Account Number</label>
                                                            <input type="number" name="account_number"
                                                                class="form-control">
                                                            @if ($errors->has('account_number'))
                                                                <p class=""
                                                                    style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('account_number') }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- /Row -->
            </div>
            <!-- CONTAINER CLOSED -->


            <!--app-content closed-->
        </div>




        <!-- Country-selector modal-->
    </div>

    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- FORM WIZARD JS-->
    <script src="{{ asset('assets/plugins/formwizard/jquery.smartWizard.js') }}"></script>
    <script src="{{ asset('assets/plugins/formwizard/fromwizard.js') }}"></script>

    <!-- INTERNAl Jquery.steps js -->
    <script src="{{ asset('assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/parsleyjs/parsley.min.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- INTERNAL Accordion-Wizard-Form js-->
    <script src="{{ asset('assets/plugins/accordion-Wizard-Form/jquery.accordion-wizard.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-wizard.js') }}"></script>

    <!-- FILE UPLOADES JS -->
    <script src="{{ asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!-- INTERNAL File-Uploads Js-->
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
