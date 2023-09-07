@extends('section.layout.admin')
@section('content')
@can('faq-list')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">FAQs</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href=""></a> FAQs</li>
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
                                <h3 class="card-title">Page Details</h3>
                            </div>
                    <div>
                        @can('faq-create')
                        <a href="{{route('admin.faqCreate')}}"><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a>
                        @endcan
                    </div>

                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">Sl No</th>
                                            <th class="border-bottom-0">Question</th>
                                            <th class="border-bottom-0">Reply</th>
                                            <th class="border-bottom-0">Message</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $value)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                            <td>{!! Str::limit($value->question, 30) !!}</td>
                                            <td>{!! Str::limit($value->reply, 30) !!}</td>
                                            <td nowrap="nowrap">{{Str::limit($value->message, 30) }}</td>
                                            <td>
                                                @can('faq-edit')
                                                <a href="{{ route('admin.faqEdit',$value->id) }}">
                                                    <button class="btn
                                                    btn-outline-success
                                                        buttons-copy
                                                        buttons-html5"
                                                        tabindex="0"
                                                        aria-controls="datatable-buttons"
                                                        type="button"><span>View and reply</span></button>
                                                   </a>
                                                   @endcan
                                                   {{-- <a href="{{ route('',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View</span></button>
                                                   </a> --}}
                                                   @can('faq-delete')
                                                       <a href="{{ route('admin.faqDelete',$value->id) }}" onclick="return confirm('Are you sure want to delete this FAQ?')">
                                                        <button class="btn
                                                        btn-outline-danger
                                                        buttons-copy
                                                        buttons-html5"
                                                        tabindex="0"
                                                        aria-controls="datatable-buttons"
                                                        type="button"><span>Delete</span></button>
                                                    </a>
                                                    @endcan
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
