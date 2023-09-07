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
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.productList')}}">Pool</a></li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->



            <div class="card">
                <div class="card-header">
                    <div class="card-title">Select Box</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="from-group mb-5 mb-lg-0">
                                <select multiple="multiple" name="favorite_fruits" id="fruit_select">
                                        <option selected="selected" disabled="disabled">HTML5</option>
                                        <option>CSS3</option>
                                        <option>PHP</option>
                                        <option>Jquery</option>
                                        <option>.Net</option>
                                        <option>Java</option>
                                        <option>Android</option>
                                        <option>AngularJS</option>
                                        <option>Photoshop</option>
                                        <option>Python</option>
                                        <option>SQL</option>
                                        <option>Java Script</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="from-group">
                                <select multiple="multiple" name="favorite_fruits" id="fruit_select1">
                                        <optgroup label="Software Side">
                                            <option>Web designer</option>
                                            <option>Web Developer</option>
                                            <option>Application Developer</option>
                                            <option>App Designer</option>
                                        </optgroup>
                                        <optgroup label="Voice Side">
                                            <option>Tell Caller</option>
                                            <option>Recruiter</option>
                                            <option>HR</option>
                                            <option>Data Entry</option>
                                            <option>Mapping</option>
                                            <option>US Recruiter</option>
                                        </optgroup>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>
</div>
@endsection
