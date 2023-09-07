<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('frontend/style/login/login.css') }}" />
    <title>Registration</title>
</head>
<style>
    span {
        font-size: 13px;
    }
</style>
<body>
    <div class="signin">
        <div class="first_form col-6">
            <div class="sign_form">
                <h1>Sign Up to Benefitshops</h1>
                {{-- <button id="copyBtn" data-text="Text to copy">Copy</button> --}}


                <p class="enter_deta">Please enter your details below</p>
                {{-- <button class="signin_google">
            <img src="./frontend/assets/image/login/Google__G__Logo 1.png" alt="" />
            Sign in with Google
          </button> --}}
                {{-- <div class="or">or</div> --}}
                @if ($status = Session()->get('status'))
                    <p style="text-align: center; color:red">{{ $status }}</p>
                @endif
                <form action="" enctype="multipart/form-data" method="POST">
                    @csrf



                    <div class="form-group">
                        <label class="text-left">Name <span class="text-danger ">*</span> </label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            required />
                    </div>

                    @if ($errors->has('name'))
                        <p class="" style="color: red; font-size: .8rem;">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    <br>
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            required />
                        @if ($errors->has('email'))
                            <p class="" style="color: red; font-size: .8rem;">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Password <span class="text-danger">* (Min 6 character) </span></label>
                                <input type="password" name="password" class="form-control"
                                    value="{{ old('password') }}" required />
                                @if ($errors->has('password'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-6">
                                <label>Gender <span class="text-danger">*</span></label>
                                <select name="gender" required value="{{ old('gender') }}"
                                    class="form-control select2 form-select">

                                    <option {{old('gender') == 'Male' ? 'selected' : ''}} value="Male">Male</option>
                                    <option {{old('gender') == 'Female' ? 'selected' : ''}} value="Female">Female</option>
                                    <option {{old('gender') == 'Other' ? 'selected' : ''}} value="Other">Other</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('gender') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">

                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-3">
                                <label>Age <span class="text-danger">*</span></label>
                                <input required type="number" value="{{old('age')}}" name="age" class="form-control" />
                                @if ($errors->has('age'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('age') }}
                                    </p>
                                @endif
                            </div>
                            <br>
                            <div class="col-9">
                                <label>Profile Image  <span class="text-danger">* (jpg, jpeg, png )</span> </label>
                                <input required type="file" name="image" class="form-control">

                                @if ($errors->has('image'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('image') }}
                                    </p>
                                @endif
                            </div>
                            <br>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Address Line 1 <span class="text-danger">*</span></label>
                                <input required type="text" value="{{old('address_line1')}}" name="address_line1" class="form-control" />
                                @if ($errors->has('address_line1'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('address_line1') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-6">
                                <label>Address Line 2 <span class="text-danger">*</span></label>
                                <input type="text" required value="{{old('address_line2')}}" name="address_line2" class="form-control" />
                                @if ($errors->has('address_line2'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('address_line2') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label>City <span class="text-danger">*</span></label>
                                <input type="text" required name="city" value="{{old('city')}}" class="form-control" />
                                @if ($errors->has('city'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('city') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-4">
                                <label>State <span class="text-danger">*</span></label>
                                <input type="text" required  value="{{old('state')}}" name="state" class="form-control" />
                                @if ($errors->has('state'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('state') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-4">
                                <label>Country <span class="text-danger">*</span></label>
                                <select name="country" value="{{old('country')}}" required value="{{ old('country') }}"
                                    class="form-control select2 form-select">
                                    <option value="India">India</option>
                                </select>
                                @if ($errors->has('country'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('country') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Telephone</label>
                                <input type="number" name="telephone" value="{{old('telephone')}}" class="form-control" />
                            </div>
                            <div class="col-6">
                                <label>Mobile <span class="text-danger">* (Add 91) </span></label>
                                <input type="number" required min="12" value="{{old('mobile')}}" name="mobile" class="form-control" />
                                @if ($errors->has('mobile'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('mobile') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="">ID Card type <span class="text-danger">*</span></label>
                                <select required name="id_card_type" class="form-control select2 form-select">
                                    <option {{old('id_card_type') == 'Aadhar' ? 'selected' :''}} value="Aadhar">Aadhar</option>
                                    <option {{old('id_card_type') == 'PAN' ? 'selected' :''}} value="PAN">PAN</option>
                                    <option {{old('id_card_type') == 'Driving Licence' ? 'selected' :''}} value="Driving Licence">Driving Licence</option>
                                    <option {{old('id_card_type') == 'Voter ID' ? 'selected' :''}} value="Voter ID">Voter ID</option>
                                    <option {{old('id_card_type') == 'Other' ? 'selected' :''}} value="Other">Other</option>
                                </select>
                                @if ($errors->has('id_card_type'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('id_card_type') }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-6">
                                <label>ID Card Number <span class="text-danger">*</span></label>
                                <input required type="text" name="id_card_number" value="{{old('id_card_number')}}" class="form-control">
                                @if ($errors->has('id_card_number'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('id_card_number') }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                            <label>Upload ID <span class="text-danger">* (jpg, jpeg, png )</span></label>
                            <input required type="file" name="id_card_image" class="form-control">
                            @if ($errors->has('id_card_image'))
                                <p class="" style="color: red; font-size: .8rem;">
                                    {{ $errors->first('id_card_image') }}
                                </p>
                            @endif
                    </div>
                    <br>
                    <div class="form-group ">
                        <div class="row">
                        <div class="col-sm-4">
                            <label>IFSC Code <span class="text-danger">*</span></label>
                            <input type="text" value="{{old('ifsc_code')}}" required name="ifsc_code" class="form-control">
                            @if ($errors->has('ifsc_code'))
                                <p class="" style="color: red; font-size: .8rem;">
                                    {{ $errors->first('ifsc_code') }}
                                </p>
                            @endif
                        </div>
                        <div class="col-8">
                            <label>Account Number <span class="text-danger">*</span></label>
                            <input type="number" value="{{old('account_number')}}" required name="account_number" class="form-control">
                            @if ($errors->has('account_number'))
                                <p class="" style="color: red; font-size: .8rem;">
                                    {{ $errors->first('account_number') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    </div>
                    {{-- <div class="remember_me">
                        <div class="first">
                            <input type="checkbox" />
                            <p>Remember Me</p>
                        </div>
                        <div class="second">
                            <p>Forget Password</p>
                        </div>
                    </div> --}}
                    <br>
                    <br>
                    <button class="login_btn">Register</button>
                </form>
                <div class="d-flex justify-content-center">
                    <p class="opacity_0">Already have an account?</p><a href="{{ route('userLogin') }}"><span
                            class="rose">Sign In </span></a>
                </div>

            </div>

            <div class="logo">
                <a href="{{url('/')}}">
                <img height="50px" src="{{ asset('storage/settings/' . BobFinder::bob()->value('logo_white') ) }}" alt="">
                </a>
            </div>
        </div>
        <div class="first_img col-6">
            <!-- <img
          src="./image/signin/appolinary-kalashnikova-WYGhTLym344-unsplash 1.png"
          alt=""
          srcset=""
        /> -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
