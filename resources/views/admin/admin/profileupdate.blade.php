@extends('section.layout.admin')
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
            <form method = "post" action="{{route('admin.profileUpdatePost')}}" enctype="multipart/form-data" data-parsley-validate="" >
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
                                        <input name="name" required type="text" value="{{Auth()->user()->name}}" class="form-control" id="exampleInputname" placeholder="Name">
                                    </div>
                                </div>
                                @if ($errors->has('name'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('name') }}</p>@endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Email</label>
                                        <input name="email" required type="email" value="{{Auth()->user()->email}}" class="form-control" id="exampleInputname" placeholder="Email">
                                    </div>
                                </div>
                                @if ($errors->has('email'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('email') }}</p>@endif
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">New Password</label>
                                        <input name="password" required type="password" value="" class="form-control" id="exampleInputname" placeholder="New Password">
                                    </div>
                                </div>
                                @if ($errors->has('password'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('password') }}</p>@endif
                            </div><div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputname">Confirm Password</label>
                                        <input name="confirm_password" required type="password" value="" class="form-control" id="exampleInputname" placeholder="Confirm Password">
                                    </div>
                                </div>
                                @if ($errors->has('confirm_password'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('confirm_password') }}</p>@endif
                            </div>

                            <div class="form-group">
                                <label for="formFile" class="form-label mt-0">Image</label>
                                <input class="form-control" name="image" type="file" value="{{Auth()->user()->image}}">
                                @if ($errors->has('image'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('image') }}</p>@endif
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
