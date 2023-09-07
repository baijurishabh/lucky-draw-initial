@extends('section.layout.admin')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">
        <!-- CONTAINER -->
        <div class="main-container container-fluid">
            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">Dashbaord</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.settingsList')}}">Settings</a></li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            @if(!isset($data->id))
            <form method = "post" enctype="multipart/form-data" data-parsley-validate="" action="{{route('admin.settingsCreate')}}">
            @else
             <form method = "post" enctype="multipart/form-data" data-parsley-validate="" action="{{route('admin.settingsUpdate',$data->uuid)}}">
            @endif
            {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div  class="card">
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">File Upload</h3>
                        </div>
                        <div class=" card-body">
                            <div class="form-group">
                                <label for="formFile" class="form-label mt-0">Logo Black</label>
                                <input class="form-control" name="logo_black" type="file" value="{{ isset($data->logo_black) ? $data->logo_black : '' }}">
                            </div>
                            @if ($errors->has('logo_black'))
                            <p class="" style="color: red; font-size: .8rem;">
                                {{ $errors->first('logo_black') }}</p>
                        @endif
                            <div class="form-group">
                                <label for="formFile" class="form-label mt-0">Logo White</label>
                                <input class="form-control" name="logo_white" type="file" value="{{ isset($data->logo_white) ? $data->logo_white : '' }}">
                            </div>
                            @if ($errors->has('logo_white'))
                            <p class="" style="color: red; font-size: .8rem;">
                                {{ $errors->first('logo_white') }}</p>
                        @endif
                            <div class="form-group">
                                <label for="formFile" class="form-label mt-0">Favicon</label>
                                <input class="form-control" name="favicon" type="file" value="{{ isset($data->favicon) ? $data->favicon : '' }}">
                            </div>
                            @if ($errors->has('favicon'))
                            <p class="" style="color: red; font-size: .8rem;">
                                {{ $errors->first('favicon') }}</p>
                        @endif
                            <div class="form-group">
                                <label for="formFile" class="form-label mt-0">Video</label>
                                <input class="form-control" name="video" type="file" value="{{ isset($data->video) ? $data->video : '' }}">
                            </div>
                            @if ($errors->has('video'))
                            <p class="" style="color: red; font-size: .8rem;">
                                {{ $errors->first('video') }}</p>
                        @endif
                        </div>
                    </div>
                </div>
                <!-- End Row-->
{{-- {{dd("dest")}} --}}
            </div>
            <!-- CONTAINER CLOSED -->
            <!-- Row -->
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Gerenal Settings</h4>
                        </div>
                        <div class="card-body">

                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Company Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="company_name" value="{{ isset($data->company_name) ? $data->company_name : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('company_name'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('company_name') }}</p>
                                            @endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Site Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="site_name" value="{{ isset($data->site_name) ? $data->site_name : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('site_name'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('site_name') }}</p>
                                            @endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label" for="example-email">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" id="example-email" value="{{ isset($data->email) ? $data->email : '' }}" name="email" class="form-control">
                                    </div>
                                    @if ($errors->has('email'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('email') }}</p>
                                            @endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label" for="example-email">Alternative Email</label>
                                    <div class="col-md-9">
                                        <input type="email" id="example-email2" value="{{ isset($data->email_alternative) ? $data->email_alternative : '' }}" name="email_alternative" class="form-control">
                                    </div>
                                    @if ($errors->has('email_alternative'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('email_alternative') }}</p>
                                            @endif
                                </div>
                                <div class=" row mb-4 mb-4">
                                    <label class="col-md-3 form-label">Mobile Number</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="number" value="{{ isset($data->mobile_number) ? $data->mobile_number : '' }}" name="mobile_number">
                                    </div>
                                    @if ($errors->has('mobile_number'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('mobile_number') }}</p>
                                            @endif
                                </div>
                                <div class=" row mb-4 mb-4">
                                    <label class="col-md-3 form-label">AlternativeMobile Number</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="number" value="{{ isset($data->alternativemobile_number) ? $data->alternativemobile_number : '' }}" name="alternativemobile_number">
                                    </div>
                                    @if ($errors->has('alternativemobile_number'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('alternativemobile_number') }}</p>
                                            @endif
                                </div>
                                <div class=" row mb-4 mb-4">
                                    <label class="col-md-3 form-label">What's App Number</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="number" value="{{ isset($data->whatapp_number) ? $data->whatapp_number : '' }}" name="whatapp_number">
                                    </div>
                                    @if ($errors->has('whatapp_number'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('whatapp_number') }}</p>
                                @endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Youtube Link</label>
                                    <div class="col-md-9">

                                            <input type="url" required name="youtube"
                                                value="{{ isset($data->youtube) ? $data->youtube : '' }}"
                                                class="form-control">

                                        @if ($errors->has('youtube'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('youtube') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Expiration day</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="number" value="{{ isset($data->timeout) ? $data->timeout : '' }}" name="timeout">
                                    </div>
                                    @if ($errors->has('timeout'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('timeout') }}</p>
                                @endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">URL</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="url" value="{{ isset($data->url) ? $data->url : '' }}" name="url">
                                    </div>
                                    @if ($errors->has('url'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('url') }}</p>
                                @endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Tel</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="tel" value="{{ isset($data->telephone) ? $data->telephone : '' }}" name="telephone">
                                    </div>
                                    @if ($errors->has('telephone'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('telephone') }}</p>
                                @endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Social Media Facebook</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="search" value="{{ isset($data->facebook) ? $data->facebook : '' }}" name="facebook">
                                    </div>
                                    @if ($errors->has('facebook'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('facebook') }}</p>
                                @endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Social Media Instagram</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="search" value="{{ isset($data->instagram) ? $data->instagram : '' }}" name="instagram">
                                    </div>
                                    @if ($errors->has('instagram'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('instagra') }}</p>
                                @endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Social Media Twitter</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="search" value="{{ isset($data->twitter) ? $data->twitter : '' }}" name="twitter">
                                    </div>
                                    @if ($errors->has('twitter'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('twitters') }}</p>
                                @endif
                                </div>
                                <div class=" row mb-4">
                                    <div class="form-footer mt-2">
                                        <button type="submit" class="btn btn-primary">Confirm  Details</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Address</h3>
                        </div>
                        <div class=" card-body">
                            <div class="form-row">
                                <div class="col-xl-6 mb-3">
                                    <label for="validationDefault01">Address Line1 </label>
                                    <input type="text" value="{{ isset($data->address_line1) ? $data->address_line1 : '' }}" name="address_line1" class="form-control" id="validationDefault01" required>
                                    @if ($errors->has('address_line1'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('address_line1') }}</p>
                                @endif
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="validationDefault02">Address Line2</label>
                                    <input type="text" value="{{ isset($data->address_line2) ? $data->address_line2 : '' }}" name="address_line2" class="form-control" id="validationDefault02" required>
                                    @if ($errors->has('address_line2'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('address_line2') }}</p>
                                @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-xl-6 mb-3">
                                    <label for="validationDefault03">City</label>
                                    <input name="city" value="{{ isset($data->city) ? $data->city : '' }}" type="text" class="form-control" id="validationDefault03" required>
                                    @if ($errors->has('city'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('city') }}</p>
                                @endif
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="validationDefault03">state</label>
                                    <input name="state" value="{{ isset($data->state) ? $data->state : '' }}" type="text" class="form-control" id="validationDefault04" required>
                                    @if ($errors->has('state'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('state') }}</p>
                                @endif
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="validationDefault03">County</label>
                                    <input name="country" value="{{ isset($data->country) ? $data->country : '' }}" type="text" class="form-control" id="validationDefault06" required>
                                    @if ($errors->has('country'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('country') }}</p>
                                @endif
                                </div>

                                <div class="col-xl-3 mb-3">
                                    <label for="validationDefault05">Pincode</label>
                                    <input name="pincode" value="{{ isset($data->pincode) ? $data->pincode : '' }}" type="number" class="form-control" id="validationDefault05" required>
                                    @if ($errors->has('pincode'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('pincode') }}</p>
                                @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
            <!-- Row -->
        </div>
    </div>
    <!--app-content closed-->
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


@endsection
