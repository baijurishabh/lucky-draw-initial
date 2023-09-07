@extends('section.layout.user')
@section('content')



<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <h1 class="page-title">Edit Profile</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                    </ol>
                </div>
            </div>
            <form method = "post" enctype="multipart/form-data" data-parsley-validate="" >
           @csrf
            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Name</label>
                                        <input name="name" required type="text" value="{{Auth()->user()->name}}" class="form-control" id="exampleInputname" placeholder="First Name">
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname1">Last Name</label>
                                        <input name="last_name" type="text" class="form-control" id="exampleInputname1" placeholder="Enter Last Name">
                                    </div>
                                </div> --}}
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputnumber">Contact Number</label>
                                <input name="contact_number" type="number" value="{{Auth()->user()->mobile}}" class="form-control" id="exampleInputnumber" placeholder="Contact number">
                            </div> --}}
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <div>

                                                <textarea class="form-control" id="body" placeholder="Enter the Description" name="body">{{Auth()->user()->userDetails->address_line1}}</textarea>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="form-group">
                                <label class="form-label">Profile Name</label>
                                <input type="text" name="profile_name" class="form-control">
                            </div> --}}
                            {{-- <div class="wd-200 mg-b-30">
                                <label class="form-label">Date of Birth</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                    </div><input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text">
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <div class="row">
                                    <div class="col-md-4 mb-2">
                                        <select name="gender" required class="form-control select2 form-select">
                                                <option {{Auth()->user()->userDetails->sex == 'Male' ? 'selected' : ''}} value="Male">Male</option>
                                                <option  {{Auth()->user()->userDetails->sex == 'Female' ? 'selected' : ''}} value="Female">Female</option>
                                                <option value="Other">Other</option>

                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formFile" class="form-label mt-0">Image</label>
                                <input class="form-control" name="image" type="file" value="">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-success my-1">Save</button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- ROW-1 CLOSED -->
             </form>
        </div>
        <!--CONTAINER CLOSED -->

    </div>
</div>
<script>
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
    console.error( error );
    } );
    </script>
@endsection
