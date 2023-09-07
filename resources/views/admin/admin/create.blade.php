@extends('section.layout.admin')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Dashboard</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('admin.admins.index') }}"></a> Admins</li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                @if (!isset($admin->id))
                    <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                        action="{{ route('admin.admins.store') }}">
                    @else
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            action="{{ route('admin.admins.update',$admin->id) }}">
                            @method('patch')
                @endif
                {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

                @csrf

                <!-- CONTAINER CLOSED -->
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Admin</h4>
                            </div>
                            <div class="card-body">

                                <div class=" card-body">
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label"> Name</label>
                                        <div class="col-md-9">
                                            @if (empty($admin))
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="text" name="name" id="name"
                                                    value="{{ isset($admin->name) ? $admin->name : '' }}" class="form-control"
                                                    required>
                                            @endif
                                        </div>
                                        @if ($errors->has('name'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label"> Email</label>
                                        <div class="col-md-9">
                                            @if (empty($admin))
                                                <input type="email" name="email" value="{{ old('email') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="email" name="email" id="name"
                                                    value="{{ isset($admin->email) ? $admin->email : '' }}" class="form-control"
                                                    required>
                                            @endif
                                        </div>
                                        @if ($errors->has('email'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('email') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label"> Mobile</label>
                                        <div class="col-md-9">
                                            @if (empty($admin))
                                                <input type="number" name="mobile" value="{{ old('mobile') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="number" name="mobile" id="name"
                                                    value="{{ isset($admin->mobile) ? $admin->mobile : '' }}" class="form-control"
                                                    required>
                                            @endif
                                        </div>
                                        @if ($errors->has('mobile'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('mobile') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label"> Password</label>
                                        <div class="col-md-9">
                                            @if (empty($admin))
                                                <input type="password" name="password"
                                                    class="form-control" required>
                                                    @else
                                                    <input type="password" name="password"
                                                    class="form-control" >
                                                    @endif
                                        </div>
                                        @if ($errors->has('password'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('password') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Role</label>

                                        <select name="roles"  class="form-control select2" required>
                                            <option value="">Select</option>
                                            @foreach ($roles as $item)
                                            @if (empty($admin))
                                            <option value="{{$item}}" {{old('roles')==$item ? 'selected' :''}}>{{$item}}</option>
                                            @else
                                            <option value="{{$item}}" {{$admin->getRoleNames()->first()==$item ? 'selected' :''}}>{{$item}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('roles'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('roles') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <div class="form-footer mt-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    @endsection
