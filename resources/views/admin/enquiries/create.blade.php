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
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.productList')}}">Product</a></li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            @if(!isset($data->id))
            <form method = "post" enctype="multipart/form-data" data-parsley-validate="" action="{{route('admin.productCreate')}}">
            @else
             <form method = "post" enctype="multipart/form-data" data-parsley-validate="" action="{{route('admin.productUpdate',$data->uuid)}}">
            @endif
            {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

@csrf

            <!-- CONTAINER CLOSED -->
            <!-- Row -->
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Product</h4>
                        </div>
                        <div class="card-body">

                            <div class=" card-body">
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Pool Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="pool_name" value="{{ isset($data->name) ? $data->name : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has(''))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('image') }}</p>@endif
                                </div>

                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Description</label>
                                    <div class="col-md-9">
                                        <input type="text" name="description" value="{{ isset($data->description) ? $data->description : '' }}" class="form-control">
                                    </div>
                                    @if ($errors->has(''))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('image') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label for="validationCustom04">Active</label>
                                    <select name="active" class="form-control select2"
                                        required>
                                        <option selected disabled value="">Select</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                    {{-- <div class="invalid-feedback">Please select a valid state.</div> --}}
                                    @if ($errors->has(''))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('image') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label for="validationCustom04">Starting Date</label>
                                    <div class="wd-200 mg-b-30">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div><input
                                                value="{{ isset($data->published_date) ? $data->published_date : '' }}"
                                                class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                                type="date" name="start_date">
                                        </div>
                                    </div>
                                    {{-- <div class="invalid-feedback">Please select a valid state.</div> --}}
                                    @if ($errors->has(''))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('image') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label for="validationCustom04">Ending Date</label>
                                    <div class="wd-200 mg-b-30">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div><input
                                                value="{{ isset($data->published_date) ? $data->published_date : '' }}"
                                                class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                                type="date" name="published_date">
                                        </div>
                                    </div>
                                    {{-- <div class="invalid-feedback">Please select a valid state.</div> --}}
                                    @if ($errors->has('image'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('image') }}</p>@endif
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

@endsection
