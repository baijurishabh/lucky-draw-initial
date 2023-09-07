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
                            <li class="breadcrumb-item active" aria-current="page"><a href="">Blog</a></li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                @if (!isset($data->id))
                    <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                        action="{{ route('admin.blogCreate') }}">
                    @else
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            action="{{ route('admin.blogUpdate', $data->uuid) }}">
                @endif
                {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

                @csrf

                <!-- CONTAINER CLOSED -->
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Blog Edit</h4>
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
                                                value="{{ isset($data->title) ? $data->title : '' }}"
                                                class="form-control">
                                                @endif
                                        @if ($errors->has('title'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('title') }}</p>@endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Color</label>
                                         @if (empty($data))
                                         <div class="container">
                                            <input id = "colorpicker" name="color" required type = "color"  />
                                            </div>
                                            @else
                                            <div class="container">
                                            <input type="color" name="color" id="colorpicker" required
                                                value="{{ isset($data->color) ? $data->color : '' }}"
                                                class="">
                                                @endif
                                            </div>
                                        @if ($errors->has('color'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('color') }}</p>@endif
                                    </div>
                                    <script>
                                        $(function () {
                                        $('#Id_name').colorpicker();
                                        });
                                        </script>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Description</label>
                                        @if (empty($data))
                                        <input type="text" name="description" value="{{ old('description') }}"
                                        class="form-control" required>
                                        @else
                                        <input type="text" name="description" required
                                            value="{{ isset($data->description) ? $data->description : '' }}"
                                            class="form-control">
                                            @endif
                                        @if ($errors->has('description'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('description') }}</p>@endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Published By</label>
                                        @if (empty($data))
                                        <input type="text" name="published_by" value="{{ old('published_by') }}"
                                        class="form-control" required>
                                        @else
                                        <input type="text" name="published_by" required
                                            value="{{ isset($data->published_by) ? $data->published_by : '' }}"
                                            class="form-control">
                                            @endif
                                        @if ($errors->has('published_by'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('published_by') }}</p>@endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Blog Type</label>
                                        <select name="blog_type" class="form-control select2" required>
                                            <option selected disabled value="">Select</option>

                                            @if (empty($data))
                                            <option value="user" {{ old('blog_type') == 'user' ? 'selected' : '' }}>User</option>
                                            <option value="admin" {{ old('blog_type') == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="news" {{ old('blog_type') == 'news' ? 'selected' : '' }}>News</option>
                                            <option value="profile" {{ old('blog_type') == 'profile' ? 'selected' : '' }}>Profile</option>
                                                <option value="YES" {{ old('blog_type') == 'YES' ? 'selected' : '' }}>YES</option>
                                            <option value="NO" {{ old('blog_type') == 'NO' ? 'selected' : '' }}>NO</option>
                                            @else
                                                <option value="user" {{ $data->blog_type == 'user' ? 'selected' : '' }}>User
                                                </option>
                                                <option value="admin" {{ $data->blog_type == 'admin' ? 'selected' : '' }}>Admin
                                                </option>
                                                <option value="news" {{ $data->blog_type == 'news' ? 'selected' : '' }}>News
                                                </option>
                                                <option value="profile" {{ $data->blog_type == 'profile' ? 'selected' : '' }}>Profile
                                                </option>
                                            @endif
                                        </select>
                                        {{-- <div class="invalid-feedback">Please select a valid state.</div> --}}
                                        @if ($errors->has('blog_type'))
                                        <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('blog_type') }}</p>@endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Status</label>
                                        <select name="status" class="form-control select2" required>
                                            <option selected disabled value="">Select</option>
                                            @if (empty($data))
                                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                            @else
                                                <option value="active" {{ $data->status == 'active' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="inactive" {{ $data->status == 'inactive' ? 'selected' : '' }}>Inactive
                                                </option>
                                            @endif
                                        </select>
                                        {{-- <div class="invalid-feedback">Please select a valid state.</div> --}}
                                        @if ($errors->has('status'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('status') }}</p>@endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Published Date</label>
                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                </div>
                                                    @if (empty($data))
                                                    <input
                                                    value="{{ old('published_date') }}"
                                                    class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                                    type="date" name="published_date" required>
                                                    @else
                                                    <input
                                                    value="{{ isset($data->published_date) ? $data->published_date : '' }}"
                                                    class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                                    type="date" name="published_date">
                                                        @endif
                                            </div>
                                        </div>
                                        @if ($errors->has('published_date'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('published_date') }}</p>@endif
                                        {{-- <div class="invalid-feedback">Please select a valid state.</div> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="formFile" class="form-label mt-0">Blog Image</label>
                                        <input class="form-control" name="image" type="file" value="{{ isset($data->image) ? $data->image : '' }}">
                                        @if ($errors->has('image'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('image') }}</p>@endif
                                    </div>
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
