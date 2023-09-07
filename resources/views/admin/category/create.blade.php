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
                                    href="{{ route('admin.categoryList') }}"></a> Category</li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                @if (!isset($data->id))
                    <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                        action="{{ route('admin.categoryCreate') }}">
                    @else
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            action="{{ route('admin.categoryUpdate', $data->uuid) }}">
                @endif
                {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

                @csrf

                <!-- CONTAINER CLOSED -->
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Category</h4>
                            </div>
                            <div class="card-body">

                                <div class=" card-body">
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Category Name</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="text" name="name" id="name"
                                                    value="{{ isset($data->name) ? $data->name : '' }}" class="form-control"
                                                    required>
                                            @endif
                                        </div>
                                        @if ($errors->has('name'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('name') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Description</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                            <input type="text" name="description" value="{{ old('description') }}"
                                            class="form-control" required>
                                            @else
                                            <input type="text" name="description" required
                                                value="{{ isset($data->description) ? $data->description : '' }}"
                                                class="form-control">
                                                @endif
                                        </div>
                                        @if ($errors->has('description'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('description') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Active</label>
                                        <select name="active" value="{{ old('active') }}" class="form-control select2" required>
                                            <?php $lists = ['YES', 'NO']; ?>
                                            <option value="">-Choose-</option>
                                            @if (empty($data))
                                                <option value="YES" {{ old('active') == 'YES' ? 'selected' : '' }}>YES</option>
                                            <option value="NO" {{ old('') == 'NO' ? 'selected' : '' }}>NO</option>
                                            @else
                                                <option value="YES" {{ $data->active == 'YES' ? 'selected' : '' }}>YES
                                                </option>
                                                <option value="NO" {{ $data->active == 'NO' ? 'selected' : '' }}>NO
                                                </option>
                                            @endif

                                        </select>
                                        @if ($errors->has('active'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('active') }}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="formFile" class="form-label mt-0">Image</label>
                                        <input class="form-control" name="image" type="file"
                                            value="{{ isset($data->image) ? $data->image : '' }}">
                                        @if ($errors->has('image'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('image') }}</p>
                                        @endif
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    @endsection
