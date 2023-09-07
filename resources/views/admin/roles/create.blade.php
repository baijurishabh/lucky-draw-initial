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
                @if (!isset($role->id))
                    <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                        action="{{ route('admin.roles.store') }}">
                    @else
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            action="{{ route('admin.roles.update',$role->id) }}">
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
                                <h4 class="card-title">Admin Roles</h4>
                            </div>
                            <div class="card-body">

                                <div class=" card-body">
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label"> Name</label>
                                        <div class="col-md-9">
                                            @if (empty($role))
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="text" name="name" id="name"
                                                    value="{{ isset($role->name) ? $role->name : '' }}" class="form-control"
                                                    required>
                                            @endif
                                        </div>
                                        @if ($errors->has('name'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('name') }}</p>
                                        @endif
                                        @if ($errors->has('permission'))
                                        <p class="" style="color: red; font-size: .8rem;">
                                            {{ $errors->first('permission') }}</p>
                                    @endif
                                    </div>
                                    <h4>Permissions</h4>
                                    @foreach ($permission as $item)
                                    @if (empty($role))
                                    <div class=" row mb-4">

                                        <div class="col-md-9">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" value="{{$item->id}}" name="permission[]" type="checkbox" role="switch" id="flexSwitchCheckChecked" >
                                                <label class="form-check-label" for="flexSwitchCheckChecked">{{Illuminate\Support\Str::headline($item->name)}}</label>
                                              </div>
                                        </div>
                                    </div>
                                   @else
                                   <div class=" row mb-4">
                                    <div class="col-md-9">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" value="{{$item->id}}" name="permission[]" {{in_array($item->id, $rolePermissions) ? 'checked' : ''}} type="checkbox" role="switch" id="flexSwitchCheckChecked" >
                                            <label class="form-check-label" for="flexSwitchCheckChecked">{{Illuminate\Support\Str::headline($item->name)}}</label>
                                          </div>
                                    </div>
                                </div>
                                   @endif
                                    @endforeach
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


        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script> --}}
    @endsection
