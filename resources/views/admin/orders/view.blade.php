@extends('section.layout.admin')
@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <h1 class="page-title">Order Details View</h1>
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="">Order Edit</a></li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->

                <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="">
                @csrf
                <!-- CONTAINER CLOSED -->
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order</h4>
                            </div>
                            <div class="card-body">
                                <div class=" card-body">
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Full Name</label>
                                        <div class="col-md-9">
                                                <input type="text" name="full_name" id="name"
                                                   required value="{{ isset($data->full_name) ? $data->full_name : '' }}"
                                                    class="form-control" disabled>
                                        </div>

                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Address</label>
                                        <div class="col-md-9">

                                                <input type="text" name="address"
                                                   required value="{{ isset($data->address) ? $data->address : '' }}"
                                                    class="form-control" disabled>

                                        </div>
                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">State</label>
                                        <div class="col-md-9">

                                                <input type="text" name="state"
                                                   required value="{{ isset($data->state) ? $data->state : '' }}"
                                                    class="form-control" disabled>
                                        </div>
                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Country</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="text" name="country"
                                                    value="{{ old('country') }}" class="form-control" required>
                                            @else
                                                <input type="text" name="country"
                                                   required value="{{ isset($data->country) ? $data->country : '' }}"
                                                    class="form-control" disabled>
                                            @endif
                                            @if ($errors->has('country'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('country') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Postal Code</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="text" name="postal_code"
                                                    value="{{ old('postal_code') }}" class="form-control" required>
                                            @else
                                                <input type="text" name="postal_code"
                                                   required value="{{ isset($data->postal_code) ? $data->postal_code : '' }}"
                                                    class="form-control" disabled>
                                            @endif
                                            @if ($errors->has('postal_code'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('postal_code') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Contact Number</label>
                                        <div class="col-md-9">

                                                <input type="number" name="contact_number"
                                                   required value="{{ isset($data->contact_number) ? $data->contact_number : '' }}"
                                                    class="form-control" disabled>

                                            @if ($errors->has('contact_number'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('contact_number') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Order ID</label>
                                        <div class="col-md-9">
                                                <input type="text" name="order_id"
                                                   required value="{{ isset($data->order_id) ? $data->order_id : '' }}"
                                                    class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">User Name</label>
                                        <div class="col-md-9">
                                                <input type="text" name="user"
                                                   required value="{{ isset($data->user->name) ? $data->user->name : '' }}"
                                                    class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Quantity</label>
                                        <div class="col-md-9">
                                                <input type="text" name="user"
                                                   required value="{{ isset($data->quantity) ? $data->quantity : '' }}"
                                                    class="form-control" disabled >
                                        </div>
                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Product Price</label>
                                        <div class="col-md-9">
                                                <input type="text" name="user"
                                                   required value="₹{{ isset($data->product_price) ? $data->product_price : '' }}"
                                                    class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Payment Status</label>
                                        <div class="col-md-9">
                                                <input type="text" name="user"
                                                   required value="{{ isset($data->payment_status) ? $data->payment_status : '' }}"
                                                    class="form-control" disabled>
                                        </div>
                                    </div>






                                    {{-- <div class=" row mb-4">
                                        <div class="form-footer mt-2">
                                            <button type="submit" class="btn btn-primary">Confirm Details</button>
                                        </div>
                                    </div> --}}
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
        {{-- <script>
    if ($("#productForm").length > 0) {
$("#productForm").validate({
rules: {
name: {
required: true,
maxlength: 50
},
email: {
required: true,
maxlength: 50,
email: true,
},
message: {
required: true,
maxlength: 300
},
},
messages: {
name: {
required: "Please enter name",
maxlength: "Your name maxlength should be 50 characters long."
},
email: {
required: "Please enter valid email",
email: "Please enter valid email",
maxlength: "The email name should less than or equal to 50 characters",
},
message: {
required: "Please enter message",
maxlength: "Your message name maxlength should be 300 characters long."
},
},
submitHandler: function(form) {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#submit').html('Please Wait...');
$("#submit"). attr("disabled", true);
$.ajax({
url: "{{url('store-data')}}",
type: "POST",
data: $('#contactUsForm').serialize(),
success: function( response ) {
$('#submit').html('Submit');
$("#submit"). attr("disabled", false);
alert('Ajax form has been submitted successfully');
document.getElementById("contactUsForm").reset();
}
});
}
})
}
</script> --}}


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    @endsection
