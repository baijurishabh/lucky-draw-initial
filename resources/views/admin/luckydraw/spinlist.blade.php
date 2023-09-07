@extends('section.layout.admin')
@section('content')
@can('pool-conduct')
<div class="main-content app-content mt-0">
    <div class="side-app">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">

            <!-- PAGE-HEADER -->
            <div class="page-header" >
                <h1 class="page-title"> Benefitshops Lucky Draw Details</h1>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.luckyDrawSpinList',$uuid)}}">Spin Pool</a></li>
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
                                <h3 class="card-title">Product and Candidates</h3>
                            </div>
                    <div>
                        {{-- <a href="{{route('admin.luckyDrawWinner',$pool_uuid)}}"><button type="button" class="mx-auto btn btn-primary"><i class="fe fe-arrow-left-circle me-2"></i>Conduct Pool</button></a> --}}
                    </div>
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom">
                                    <thead>
                                        <tr>
                                            <th class="border-bottom-0">Sl No</th>
                                            <th class="border-bottom-0">image</th>
                                            <th class="border-bottom-0">Product Name</th>
                                            <th class="border-bottom-0">Price</th>
                                            <th class="border-bottom-0">Product Quantity</th>
                                            <th class="border-bottom-0">Pool</th>
                                            {{-- <th class="border-bottom-0">Description</th> --}}
                                            <th class="border-bottom-0">Canidate List</th>
                                            <th class="border-bottom-0">Winners List</th>

                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $value)
                                        <tr>
                                            <td>{{$index +1}}</td>
                                            <td><span class="avatar bradius" style="background-image: url('{{asset('storage/product/'.$value->product->image)}}')"></span></td>
                                            <td>{{$value->product->name}}</td>
                                            <td>₹{{$value->product->our_price}}</td>
                                            <td>{{$value->product->quantity}}</td>
                                            <td>{{$value->pool->pool_name}}</td>
                                            {{-- <td>{{$value->description}}</td> --}}
                                            <td><a href="{{route('admin.luckyDrawCanidatesList',$value->uuid)}}">
                                                <button class="btn
                                                btn-outline-warning
                                                buttons-copy
                                                buttons-html5"
                                                tabindex="0"
                                                aria-controls="datatable-buttons"
                                                type="button"><span>View ({{$value->enquiry->where('winner','NO')->count()}} )</span></button>
                                               </a><span></span></td>

                                            <td>
                                                <a href="{{route('admin.luckyDrawWinnerList',$value->uuid)}}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View ({{$value->enquiry->where('winner','YES')->count()}} )</span></button>
                                                   </a>
                                            </td>

                                            <td>
                                                {{-- <a href="{{ route('admin.productEdit',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-success
                                                        buttons-copy
                                                        buttons-html5"
                                                        tabindex="0"
                                                        aria-controls="datatable-buttons"
                                                        type="button"><span>Edit</span></button>
                                                   </a> --}}
                                                   <a href="{{route('admin.luckyDrawWinner',$value->id)}}" onclick="return confirm('Are you sure want to conduct the pool?')">
                                                    <button class="btn
                                                    btn-outline-primary
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>Conduct Pool</span></button>
                                                   </a>
                                                       {{-- <a href="{{ route('admin.productDelete',$value->uuid) }}" onclick="return confirm('Are you sure want to delete this proposal?')">
                                                        <button class="btn
                                                        btn-outline-danger
                                                        buttons-copy
                                                        buttons-html5"
                                                        tabindex="0"
                                                        aria-controls="datatable-buttons"
                                                        type="button"><span>Delete</span></button>
                                                       </a> --}}
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
