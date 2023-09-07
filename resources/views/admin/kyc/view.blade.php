@extends('section.layout.admin')
@section('content')

<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">Dashboard</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.categoryList')}}"></a> Category</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
             <form method = "post" enctype="multipart/form-data" data-parsley-validate="" action="{{route('admin.userKycUpdate',$data->uuid)}}">



            @csrf

            <!-- CONTAINER CLOSED -->
            <!-- Row -->
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">KYC and Details Views</h4>
                        </div>
                        <div class="card-body">
{{-- {{dd($data->userDetails->sex)}} --}}
                            <div class=" card-body">
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="name" value="{{ isset($data->name) ? $data->name : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('name'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('name') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="email" value="{{ isset($data->email) ? $data->email : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('email'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('email') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Sex</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="sex" value="{{ isset($data->userDetails->sex) ? $data->userDetails->sex : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('sex'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('sex') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Age</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="age" value="{{ isset($data->userDetails->age) ? $data->userDetails->age : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('age'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('age') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Address Line 1</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="address_line1" value="{{ isset($data->userDetails->address_line1) ? $data->userDetails->address_line1 : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('address_line1'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('address_line1') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Address Line 2</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="address_line2" value="{{ isset($data->userDetails->address_line2) ? $data->userDetails->address_line2 : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('address_line2'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('address_line2') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">City</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="city" value="{{ isset($data->userDetails->city) ? $data->userDetails->city : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('city'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('city') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">State</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="state" value="{{ isset($data->userDetails->state) ? $data->userDetails->state : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('state'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('state') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Country</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="country" value="{{ isset($data->userDetails->country) ? $data->userDetails->country : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('country'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('country') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Mobile</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="mobile" value="{{ isset($data->mobile) ? $data->mobile : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('mobile'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('mobile') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Telephone</label>
                                    <div class="col-md-9">
                                        <input type="text"  name="telephone" value="{{ isset($data->userDetails->telephone) ? $data->userDetails->telephone : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('telephone'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('telephone') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">ID Card Type</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="id_card_type" value="{{ isset($data->userDetails->id_card_type) ? $data->userDetails->id_card_type : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('id_card_type'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('id_card_type') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">ID Card Number</label>
                                    <div class="col-md-9">
                                        <input type="text required" name="id_card_number" value="{{ isset($data->userDetails->id_card_number) ? $data->userDetails->id_card_number : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('id_card_number'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('id_card_number') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">IFSC Code</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="ifsc_code" value="{{ isset($data->userDetails->ifsc_code) ? $data->userDetails->ifsc_code : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('ifsc_code'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('ifsce_code') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Account Number</label>
                                    <div class="col-md-9">
                                        <input type="text" required name="account_number" value="{{ isset($data->userDetails->account_number) ? $data->userDetails->account_number : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has('account_number'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('account_number') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="form-label" for="validationCustom04 ">KYC Status</label>
                                    <select required name="kyc" value="{{ old('kyc') }}" class="form-control select2" required>
                                        <?php $lists = ['YES', 'NO']; ?>
                                        <option value="">-Choose-</option>
                                            <option value="Pending" {{ $data->kyc == 'Pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="Completed" {{ $data->kyc == 'Completed' ? 'selected' : '' }}>Completed
                                            </option>


                                    </select>
                                    @if ($errors->has('kyc'))
                                        <p class="" style="color: red; font-size: .8rem;">
                                            {{ $errors->first('kyc') }}</p>
                                    @endif
                                </div>
                                {{-- {{dd($data->userDetails->id_card_image)}} --}}
                                <div class="form-group">
                                    <td><span class="avatar bradius" style="background-image: url('{{asset('storage/user/'.$data->userDetails->image)}}')"></span></td>
                                    <label for="formFile" class="form-label mt-0">Image</label>
                                    <input class="form-control" name="image" type="file"
                                        value="{{ isset($data->image) ? $data->image : '' }}">
                                    @if ($errors->has('image'))
                                        <p class="" style="color: red; font-size: .8rem;">
                                            {{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <td><span class="avatar bradius" style="background-image: url('{{asset('storage/user/id_card/'.$data->userDetails->id_card_image)}}')"></span></td>
                                    <label for="formFile" class="form-label mt-0">ID Card Image</label>
                                    <input class="form-control" name="id_card_image" type="file"
                                        value="{{ isset($data->id_card_image) ? $data->id_card_image : '' }}">
                                    @if ($errors->has('id_card_image'))
                                        <p class="" style="color: red; font-size: .8rem;">
                                            {{ $errors->first('id_card_image') }}</p>
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
            </div>
        </form>
            <!-- Row -->
        </div>
    </div>
    <!--app-content closed-->
</div>

@endsection
