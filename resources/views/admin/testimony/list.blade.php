@extends('section.layout.admin')
@section('content')
@can('testimonial-list')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">Testimony Dashboard</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Testimonials</li>
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
                                <h3 class="card-title">Testimony Details</h3>
                            </div>
                            @can('testimonial-create')
                    <div>
                        <a href="{{route('admin.testimonyCreate')}}"><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a>
                    </div>
                    @endcan
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">Sl No</th>
                                            <th class="border-bottom-0">Image</th>
                                            <th class="border-bottom-0">Client Name</th>
                                            <th class="border-bottom-0">Description</th>
                                            <th class="border-bottom-0">Date</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $value)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                            <td><span class="avatar bradius" style="background-image: url('{{asset('storage/testimony/'.$value->image)}}')"></span></td>
                                            <td>{{$value->client_name}}</td>
                                            <td>{{$value->text}}</td>
                                            <td>{{$value->date}}</td>
                                            <td>
                                                @can('testimonial-edit')
                                                <a href="{{ route('admin.testimonyEdit',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-success
                                                        buttons-copy
                                                        buttons-html5"
                                                        tabindex="0"
                                                        aria-controls="datatable-buttons"
                                                        type="button"><span>Edit</span></button>
                                                   </a>
                                                   @endcan
                                                   {{-- <a href="{{ route('admin.testimonyView',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View</span></button>
                                                   </a> --}}
                                                   @can('testimonial-delete')
                                                       <a href="{{ route('admin.testimonyDelete',$value->uuid) }}" onclick="return confirm('Are you sure want to delete this proposal?')">
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
