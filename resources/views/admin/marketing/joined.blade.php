@extends('section.layout.admin')
@section('content')
    @can('marketing-module')
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
                                <li class="breadcrumb-item active" aria-current="page"><a href="">marketing</a></li>
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
                                        <h3 class="card-title">Product Details</h3>
                                    </div>

                                    <div>
                                        {{-- <a href=""><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a> --}}
                                        <div class="row">
                                            {{-- <div class="col">
    <form method="get" action="{{route('admin.marketing.userReferralList')}}">
        <div class="input-group">
            <select class="form-select" name="referral_filter">
                <option value="">All Referral</option>
                <option value="no_referral" {{ $data_filter == 'no_referral' ? 'selected' : '' }}>No Referral</option>
                <option value="one_referral" {{ $data_filter == 'one_referral' ? 'selected' : '' }}>One Referral</option>
                <option value="many_referral" {{ $data_filter == 'many_referral' ? 'selected' : '' }}>Many Referral</option>
                </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>
</div> --}}
                                            <div class="col-12">
                                                <form method="get" action="{{ route('admin.marketing.joinedDateList') }}">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">Start Date</label>
                                                                <br>
                                                                <input type="date" class="form-control" value="{{ request()->query('start_date')}}" name="start_date">
                                                                @if ($errors->has('start_date'))
                                                                    <p class="" style="color: red; font-size: .8rem;">
                                                                        {{ $errors->first('start_date') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">End Date</label>
                                                                <br>
                                                                <input value="{{ request()->query('end_date')}}"  type="date" class="form-control" name="end_date">
                                                                @if ($errors->has('end_date'))
                                                                    <p class="" style="color: red; font-size: .8rem;">
                                                                        {{ $errors->first('end_date') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <label for="">Sort</label>
                                                                <br>
                                                            <button type="submit" class="btn btn-primary">Filter</button>
                                                        </div>

                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-12">
                                                <form method="get" action="{{ route('admin.marketing.joinedList') }}">
                                                    <div class="input-group">
                                                        <select class="form-select" name="date_filter">
                                                            <option value="">All Dates</option>
                                                            <option value="today"
                                                                {{ $data_filter == 'today' ? 'selected' : '' }}>
                                                                Today</option>
                                                            <option value="yesterday"
                                                                {{ $data_filter == 'yesterday' ? 'selected' : '' }}>Yesterday
                                                            </option>
                                                            <option value="this_week"
                                                                {{ $data_filter == 'this_week' ? 'selected' : '' }}>This Week
                                                            </option>
                                                            <option value="last_week"
                                                                {{ $data_filter == 'last_week' ? 'selected' : '' }}>Last Week
                                                            </option>
                                                            <option value="this_month"
                                                                {{ $data_filter == 'this_month' ? 'selected' : '' }}>This Month
                                                            </option>
                                                            <option value="last_month"
                                                                {{ $data_filter == 'last_month' ? 'selected' : '' }}>Last Month
                                                            </option>
                                                            <option value="this_year"
                                                                {{ $data_filter == 'this_year' ? 'selected' : '' }}>This Year
                                                            </option>
                                                            <option value="last_year"
                                                                {{ $data_filter == 'last_year' ? 'selected' : '' }}>Last Year
                                                            </option>
                                                        </select>
                                                        <button type="submit" class="btn btn-primary">Filter</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="file-datatable"
                                            class="table table-bordered text-nowrap key-buttons border-bottom">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">Sl No</th>
                                                    <th class="border-bottom-0">Image</th>
                                                    <th class="border-bottom-0">Name</th>
                                                    <th class="border-bottom-0">Kyc</th>

                                                    <th class="border-bottom-0">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $index => $value)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->email }}</td>
                                                        <td>{{ $value->kyc }}</td>
                                                        <td>
                                                            @can('marketing-module')
                                                            <a href="{{route('admin.marketing.joinedDateListView',$value->uuid)}}">
                                                                <button
                                                                    class="btn
                                                    btn-outline-warning
                                                        buttons-copy
                                                        buttons-html5"
                                                                    tabindex="0" aria-controls="datatable-buttons"
                                                                    type="button"><span>View</span></button>
                                                            </a>
                                                            @endcan
                                                            {{-- <a href="{{ route('admin.productView',$value->uuid) }}">
                                                    <button class="btn
                                                    btn-outline-warning
                                                    buttons-copy
                                                    buttons-html5"
                                                    tabindex="0"
                                                    aria-controls="datatable-buttons"
                                                    type="button"><span>View</span></button>
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
