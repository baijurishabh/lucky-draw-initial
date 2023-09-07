@extends('section.layout.admin')
@section('content')
@can('role-list')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title">Admin Roles</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.roles.index')}}"></a> Admins Roles</li>
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
                                <h3 class="card-title">Roles Details</h3>
                            </div>
                            @can('role-create')
                    <div>
                        <a href="{{route('admin.roles.create')}}"><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a>
                    </div>
                    @endcan
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">Sl No</th>
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $index => $role)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                            {{-- <td><span class="avatar bradius" style="background-image: url('{{asset('storage/category/'.$value->image)}}')"></span></td> --}}
                                            <td>{{$role->name}}</td>
                                            <td>
                                                @can('role-edit')
                                                <a href="{{ route('admin.roles.edit',$role->id) }}">
                                                    <button class="btn
                                                    btn-outline-success
                                                        buttons-copy
                                                        buttons-html5"
                                                        tabindex="0"
                                                        aria-controls="datatable-buttons"
                                                        type="button"><span>Edit</span></button>
                                                   </a>
                                                   @endcan
                                                   {{-- <a href="{{ route('admin.categoryView',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View</span></button>
                                                   </a> --}}
                                                   @can('role-delete')
                                                   {!! Form::open(['method' => 'DELETE', 'route' => ['admin.roles.destroy', $role->id]]) !!}
                                                   {!! Form::submit('Delete', [
                                                       'onclick'=>"return confirm('Are you sure want to delete this Role?')",
                                                       'class' => 'btn btn-outline-danger buttons-copybuttons-html5',
                                                       'tabindex' => '0',
                                                       'aria-controls' => 'datatable-buttons',
                                                   ]) !!}
                                                   {!! Form::close() !!}
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
