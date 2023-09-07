@extends('section.layout.admin')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Marketing Email </h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="">Marketing Email</a></li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                @if (!isset($data->id))
                    <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                        action="{{ route('admin.marketingTemplateCreate') }}">
                    @else
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            action="{{ route('admin.marketingTemplateEditPost', $data->uuid) }}">
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
                                        <label class="col-md-3 form-label">Body</label>
                                        @if (empty($data))
                                        <input type="text" name="body" value="{{ old('body') }}"
                                        class="form-control" required>
                                        @else
                                        <input type="text" name="body" required
                                            value="{{ isset($data->body) ? $data->body : '' }}"
                                            class="form-control">
                                            @endif
                                        @if ($errors->has('body'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('body') }}</p>@endif
                                    </div>

                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Type</label>
                                        <select name="type" class="form-control select2" required>
                                            <option selected disabled value="">Select</option>

                                            @if (empty($data))
                                            <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
                                            <option value="whatsapp" {{ old('type') == 'whatsapp' ? 'selected' : '' }}>Whatsapp</option>
                                            @else
                                                <option value="email" {{ $data->type == 'email' ? 'selected' : '' }}>Email
                                                </option>
                                                <option value="whatsapp" {{ $data->type == 'whatsapp' ? 'selected' : '' }}>Whatsapp
                                                </option>
                                            @endif
                                        </select>
                                        {{-- <div class="invalid-feedback">Please select a valid state.</div> --}}
                                        @if ($errors->has('type'))
                                        <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('type') }}</p>@endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Status</label>
                                        <select name="status" class="form-control select2" required>
                                            <option selected disabled value="">Select</option>
                                            @if (empty($data))
                                                <option value="active" {{ old('status') == 'ACTIVE' ? 'selected' : '' }}>Active</option>
                                            <option value="disable" {{ old('status') == 'DISABLE' ? 'selected' : '' }}>Inactive</option>
                                            @else
                                                <option value="active" {{ $data->status == 'ACTIVE' ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="disable" {{ $data->status == 'DISABLE' ? 'selected' : '' }}>Inactive
                                                </option>
                                            @endif
                                        </select>
                                        {{-- <div class="invalid-feedback">Please select a valid state.</div> --}}
                                        @if ($errors->has('status'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('status') }}</p>@endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">footer</label>
                                         @if (empty($data))
                                            <input type="text" name="footer" value="{{ old('footer') }}"
                                            class="form-control" required>
                                            @else
                                            <input type="text" name="footer" required
                                                value="{{ isset($data->footer) ? $data->footer : '' }}"
                                                class="form-control">
                                                @endif
                                        @if ($errors->has('footer'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('footer') }}</p>@endif
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="formFile" class="form-label mt-0">Asset</label>
                                        <input class="form-control" name="asset" type="file" value="{{ isset($data->asset) ? $data->asset : '' }}">
                                        @if ($errors->has('asset'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('asset') }}</p>@endif
                                    </div> --}}
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
