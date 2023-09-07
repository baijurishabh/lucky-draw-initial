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
                            <li class="breadcrumb-item active" aria-current="page"><a href="">FAQs</a></li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                @if (!isset($data->id))
                    <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                        action="{{ route('admin.faqCreate') }}">
                    @else
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            action="{{ route('admin.faqEditPost',$data->id) }}">
                @endif
                {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

                @csrf

                <!-- CONTAINER CLOSED -->
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">FAQs</h4>
                            </div>
                            <div class="card-body">

                                <div class=" card-body">
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Question ?</label>
                                        @if (empty($data))
                                        <textarea name="question" required class=" ckeditor form-control" id="">{{ old('question') }}</textarea>
                                        @else
                                        <textarea name="question" class=" ckeditor form-control" required id="">{{ isset($data->question) ? $data->specification : '' }}</textarea>
                                        @endif
                                        @if ($errors->has('question'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('question') }}</p>@endif
                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Reply</label>
                                        @if (empty($data))
                                            <textarea name="reply" required class=" ckeditor form-control" id="">{{ old('reply') }}</textarea>
                                            @else
                                            <textarea name="reply" class=" ckeditor form-control" required id="">{{ isset($data->reply) ? $data->specification : '' }}</textarea>
                                            @endif
                                        @if ($errors->has('reply'))
                                                                <p class="" style="color: red; font-size: .8rem;">
                                                                    {{ $errors->first('reply') }}</p>@endif
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
