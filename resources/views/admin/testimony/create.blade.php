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
                        <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
                    </ol>
                </div>

            </div>
            <!-- PAGE-HEADER END -->

            <!-- Row -->
            @if(!isset($data->id))
            <form method = "post" enctype="multipart/form-data" data-parsley-validate="" action="{{route('admin.testimonyCreate')}}">
            @else
             <form method = "post" enctype="multipart/form-data" data-parsley-validate="" action="{{route('admin.testimonyUpdate',$data->uuid)}}">
            @endif
            {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

@csrf

            <!-- CONTAINER CLOSED -->
            <!-- Row -->
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Testimony</h4>
                        </div>
                        <div class="card-body">

                            <div class=" card-body">
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Client Name</label>
                                    <div class="col-md-9">
                                        @if (empty($data))
                                            <input type="text" name="client_name" value="{{ old('client_name') }}"
                                            class="form-control" required>
                                            @else
                                            <input type="text" name="client_name" required
                                                value="{{ isset($data->client_name) ? $data->client_name : '' }}"
                                                class="form-control">
                                                @endif
                                        </div>
                                    @if ($errors->has('client_name'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('client_name') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label class="col-md-3 form-label">Description</label>
                                    <div class="col-md-9">

                                        @if (empty($data))
                                            <input type="text" name="text" value="{{ old('text') }}"
                                            class="form-control" required>
                                            @else
                                            <input type="text" name="text" required
                                                value="{{ isset($data->text) ? $data->text : '' }}"
                                                class="form-control">
                                                @endif
                                    </div>
                                    @if ($errors->has('text'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('text') }}</p>@endif
                                </div>
                                <div class=" row mb-4">
                                    <label for="validationCustom04">Date</label>
                                    <div class="wd-200 mg-b-30">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                            @if (empty($data))
                                            <input
                                            value="{{ old('date') }}"
                                            class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                            type="date" name="date" required>
                                            @else
                                            <input
                                            value="{{ isset($data->date) ? $data->date : '' }}"
                                            class="form-control fc-datepicker" placeholder="MM/DD/YYYY"
                                            type="date" name="date">
                                                @endif
                                        </div>
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
                                    {{-- <div class="invalid-feedback">Please select a valid state.</div> --}}
                                    @if ($errors->has('date'))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('date') }}</p>@endif
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
