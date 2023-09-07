@extends('section.layout.user')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Referral Details</h1>
                    <br>
                    <div>
                        <p>Referral Link:   <input type="text" style="border: none; outline:none; background-color:transparent; width:300px;" value="{{Auth()->user()->getReferralLink() }}" id="clickCopy"></p>
                        <button class="btn btn-primary" onclick="myFunction()" onmouseout="outFunc()"><i class="bi bi-clipboard"></i>
                            <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>

                         </button>
                    </div>
<br>
                    <p>Total Members: {{$users->count()}}</p>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('user.referralList') }}">Referral</a></li>
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
                                    {{-- <h3 class="card-title">File Export</h3> --}}
                                </div>
                                <div>
                                    {{-- <a href=""><button type="button" class="btn btn-primary"><i class="fe fe-plus me-2"></i></button></a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="file-datatable"
                                        class="table table-bordered text-nowrap key-buttons border-bottom">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Sl No</th>
                                                <th class="border-bottom-0">User Name</th>
                                                <th class="border-bottom-0">Email</th>
                                                <th class="border-bottom-0">Mobile</th>
                                                <th class="border-bottom-0">KYC Status</th>
                                                <th class="border-bottom-0">Plan Purchase</th>
                                                <th class="border-bottom-0">Account Disabled</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $value)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>{{ $value->mobile }}</td>
                                                    <td>{{ $value->kyc }}</td>
                                                    <td>{{ $value->plan_purchase }}</td>
                                                    <td>{{ $value->disable }}</td>

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
@endsection
