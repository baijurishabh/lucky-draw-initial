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
                            <li class="breadcrumb-item active" aria-current="page"><a href="">Policy</a></li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                @if (!isset($data->id))
                    <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                        action="{{ route('admin.registration_policyCreate') }}">
                    @else
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            action="{{ route('admin.registration_policyEdit', $data->id) }}">
                @endif
                {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

                @csrf

                <!-- CONTAINER CLOSED -->
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Policy Edit</h4>
                            </div>
                            <div class="card-body">

                                <div class=" card-body">
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Title</label>
                                         @if (empty($data))
                                            <input type="text" name="title" value="{{ old('title') }}"
                                            class="form-control" required>
                                            @else
                                            <input type="text" name="title" required
                                                value="{{ isset($data->type) ? $data->type : '' }}"
                                                class="form-control">
                                                @endif
                                        @if ($errors->has('title'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('title') }}</p>@endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Heading</label>
                                         @if (empty($data))
                                            <input type="text" name="heading" value="{{ old('heading') }}"
                                            class="form-control" required>
                                            @else
                                            <input type="text" name="heading" required
                                                value="{{ isset($data->heading) ? $data->heading : '' }}"
                                                class="form-control">
                                                @endif
                                        @if ($errors->has('heading'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('heading') }}</p>@endif
                                    </div>

                                   <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Description</label>
                                    <div class="col-md-9">
                                        @if (empty($data))
                                        <textarea name="description" required class=" ckeditor form-control" id="">{{ old('description') }}</textarea>
                                        @else
                                        <textarea name="description" class=" ckeditor form-control" required id="">{{ isset($data->description) ? $data->description : '' }}</textarea>
                                        @endif
                                    </div>
                                    @if ($errors->has('description'))
                                        <p class="" style="color: red; font-size: .8rem;">
                                            {{ $errors->first('description') }}</p>
                                    @endif
                                    <div class=" row mb-4">
                                        <div class="form-footer mt-2">
                                            <button type="submit" class="btn btn-primary">Confirm Details</button>
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
