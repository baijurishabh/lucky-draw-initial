@extends('section.layout.admin')
@section('content')
    @can('marketing-module')
        <div class="main-content app-content mt-0">
            <div class="side-app">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">

                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <h1 class="page-title">Marketing Email Dashboard</h1>
                        <div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="">Marketing Email</a></li>
                            </ol>
                        </div>

                    </div>
                    <!-- PAGE-HEADER END -->



                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" style="justify-content: space-between;">
                                    <div>
                                        <h3 class="card-title">Email Details</h3>
                                    </div>
                                    {{-- @can('') --}}
                                        <div>
                                            <a href="{{ route('admin.marketingTemplateCreate') }}"><button type="button"
                                                    class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a>
                                        </div>
                                    {{-- @endcan --}}
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="file-datatable"
                                            class="table table-bordered text-nowrap key-buttons border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">Sl No</th>
                                                    <th class="border-bottom-0">Title</th>
                                                    <th class="border-bottom-0">Heading</th>
                                                    <th class="border-bottom-0">Body</th>
                                                    <th class="border-bottom-0">Active</th>
                                                    <th class="border-bottom-0">Type</th>
                                                    <th class="border-bottom-0">Footer</th>
                                                    <th class="border-bottom-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $index => $value)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $value->title }}</td>
                                                        <td>{{ $value->heading}}</td>
                                                        <td>{{ $value->body }}</td>
                                                        <td>{{ $value->status }}</td>
                                                        <td>{{ $value->type }}</td>
                                                        <td>{{ $value->footer }}</td>
                                                        <td>
                                                            @can('blog-edit')
                                                                <a href="{{ route('admin.marketingTemplateEdit', $value->uuid) }}">
                                                                    <button
                                                                        class="btn
                                                    btn-outline-success
                                                        buttons-copy
                                                        buttons-html5"
                                                                        tabindex="0" aria-controls="datatable-buttons"
                                                                        type="button"><span>Edit</span></button>
                                                                </a>
                                                            @endcan
                                                            <a href="{{ route('admin.marketingTemplateSendCampaign', $value->uuid) }}">
                                                                <button
                                                                    class="btn
                                                btn-outline-success
                                                    buttons-copy
                                                    buttons-html5"
                                                                    tabindex="0" aria-controls="datatable-buttons"
                                                                    type="button"><span>Send</span></button>
                                                            </a>
                                                            {{-- <a href="{{ route('admin.blogView',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View</span></button>
                                                   </a> --}}

                                                                <a href="{{ route('admin.marketingTemplateDelete', $value->uuid) }}"
                                                                    onclick="return confirm('Are you sure want to delete this Template?')">
                                                                    <button
                                                                        class="btn
                                                        btn-outline-danger
                                                        buttons-copy
                                                        buttons-html5"
                                                                        tabindex="0" aria-controls="datatable-buttons"
                                                                        type="button"><span>Delete</span></button>
                                                                </a>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->
                </div>
                <!-- CONTAINER CLOSED -->

            </div>
        </div>
    @endcan
@endsection
