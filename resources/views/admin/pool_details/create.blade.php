

@extends('section.layout.admin')
@section('content')
    <!--app-content open-->
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Pool Products Addition</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Forms</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pool Product Addition</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- Row -->
                @if (!isset($data->id))
                    <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                        action="{{ route('admin.poolDetailsCreatePost') }}">
                    @else
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            action="{{ route('admin.poolUpdate', $data->uuid) }}">
                @endif
                {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

                @csrf
                <!-- Row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Pool Product Selection</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="from-group mb-5 mb-lg-0">
                                            <select multiple="multiple" required name="favorite_fruits[]" id="fruit_select">
                                                {{-- <select multiple="multiple" name="favorite_fruits" id="fruit_select"> --}}
                                                @foreach ($data as $item)
                                                    {
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    }
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has(''))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('') }}</p>@endif
                                    </div>
                                    <div class="col-md-3 form-label">
                                        <label>Description</label>
                                        <div class="col-md-9">
                                            <input type="text" name="description"
                                                value="{{ isset($data->description) ? $data->description : '' }}"
                                                class="form-control">
                                        </div>
                                        @if ($errors->has(''))
                                    <p class="" style="color: red; font-size: .8rem;">
                                        {{ $errors->first('image') }}</p>@endif
                                    </div>
                                    <div class="col-md-3 form-label">
                                        <label for="validationCustom04">Pool</label>
                                        <select name="pool_id" class="form-control select2" required>
                                            <option selected disabled value="">Select</option>
                                            @if (empty($pool_id))
                                            @foreach (App\Models\Pool::all() as $item)
                                            <option value="{{ $item->id }}" value="{{$item->id}}" {{ old('pool_id') == $item->id ? 'selected' : '' }}>{{ $item->pool_name }}</option>
                                            @endforeach
                                            @else
                                            {{-- <option selected disabled value="">Select</option> --}}
                                            @foreach (App\Models\Pool::all() as $item)
                                                <option value="{{ $item->id }}" {{ $pool_id == $item->id ? 'selected' : '' }}>{{ $item->pool_name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                            {{-- @foreach (App\Models\Pool::all() as $item)
                                                {
                                                <option value="{{ $item->id }}">{{ $item->pool_name }}</option>
                                                }
                                            @endforeach
                                        </select> --}}
                                        @if ($errors->has('pool_id'))
                                        <p class="" style="color: red; font-size: .8rem;">
                                            {{ $errors->first('pool_id') }}</p>@endif
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
                </div>
                <!-- End Row-->

                </form>
            </div>
            <!-- CONTAINER CLOSED -->

        </div>
    </div>
    <!--app-content closed-->
    {{-- @push('script')

@endpush --}}

@endsection

@push('custom-scripts')
        @once
        <script src="{{ asset('assets/plugins/multipleselect/multiple-select.js')}}"></script>
        <script src="{{ asset('assets/plugins/multipleselect/multi-select.js')}}"></script>
        <script src="{{ asset('assets/plugins/multi/multi.min.js')}}"></script>
        @endonce
    @endpush


