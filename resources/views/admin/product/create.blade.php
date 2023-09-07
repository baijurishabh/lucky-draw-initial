@extends('section.layout.admin')
@section('content')
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
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="{{ route('admin.productList') }}">Product</a></li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->

                <!-- Row -->
                @if (!isset($data->id))
                    <form method="post" enctype="multipart/form-data" id="productForm" data-parsley-validate=""
                        action="{{ route('admin.productCreate') }}">
                    @else
                        <form method="post" enctype="multipart/form-data" data-parsley-validate=""
                            action="{{ route('admin.productUpdate', $data->uuid) }}">
                @endif
                {{-- <form method="post" enctype="multipart/form-data" data-parsley-validate=""  action="{{route('admin.settingsCreatePost')}}"> --}}

                @csrf
                <!-- CONTAINER CLOSED -->
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Product</h4>
                            </div>
                            <div class="card-body">
                                <div class=" card-body">
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Product Name</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="text" name="name" id="name"
                                                   required value="{{ isset($data->name) ? $data->name : '' }}"
                                                    class="form-control">
                                            @endif
                                        </div>
                                        @if ($errors->has('name'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('name') }}</p>
                                        @endif
                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Short Description</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="text" name="short_description"
                                                    value="{{ old('short_description') }}" class="form-control" required>
                                            @else
                                                <input type="text" name="short_description"
                                                   required value="{{ isset($data->short_description) ? $data->short_description : '' }}"
                                                    class="form-control">
                                            @endif
                                            @if ($errors->has('short_description'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('short_description') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Description</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                            <textarea name="description" required class=" ckeditor form-control" id="">{{ old('description') }}</textarea>
                                            @else
                                            <textarea name="description" class=" ckeditor form-control" required id="">{{ isset($data->description) ? $data->description : '' }}</textarea>
                                            @endif
                                        </div>
                                        @if ($errors->has('description'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('description') }}</p>
                                        @endif
                                    </div>

                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Specification</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                            <textarea name="specification" required class=" ckeditor form-control" id="">{{ old('specification') }}</textarea>
                                            @else
                                            <textarea name="specification" class=" ckeditor form-control" required id="">{{ isset($data->specification) ? $data->specification : '' }}</textarea>
                                            @endif
                                        </div>
                                        @if ($errors->has('specification'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('specification') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Market Price</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="number" name="market_price" value="{{ old('market_price') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="number" required name="market_price"
                                                    value="{{ isset($data->market_price) ? $data->market_price : '' }}"
                                                    class="form-control">
                                            @endif
                                            @if ($errors->has('market_price'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('market_price') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Our Price</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="number" name="our_price" value="{{ old('our_price') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="number" required name="our_price"
                                                    value="{{ isset($data->our_price) ? $data->our_price : '' }}"
                                                    class="form-control">
                                            @endif
                                            @if ($errors->has('our_price'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('our_price') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Online Price</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="number" name="online_price" value="{{ old('online_price') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="number" required name="online_price"
                                                    value="{{ isset($data->online_price) ? $data->online_price : '' }}"
                                                    class="form-control">
                                            @endif
                                            @if ($errors->has('online_price'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('online_price') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Quantity</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="number" name="quantity" value="{{ old('quantity') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="number" required name="quantity"
                                                    value="{{ isset($data->quantity) ? $data->quantity : '' }}"
                                                    class="form-control">
                                            @endif
                                            @if ($errors->has('quantity'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('quantity') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label class="col-md-3 form-label">Youtube Emedded Link</label>
                                        <div class="col-md-9">
                                            @if (empty($data))
                                                <input type="url" name="youtube_link" value="{{ old('youtube_link') }}"
                                                    class="form-control" required>
                                            @else
                                                <input type="url" required name="youtube_link"
                                                    value="{{ isset($data->youtube_link) ? $data->youtube_link : '' }}"
                                                    class="form-control">
                                            @endif
                                            @if ($errors->has('youtube_link'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('youtube_link') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Category</label>
                                        <select required name="category_id" value="{{ old('category_id') }}" class="form-control select2" required>
                                            <option value="">-Choose-</option>
                                            @if (empty($data))
                                            @foreach (App\Models\Category::all() as $item)
                                            <option value="{{ $item->id }}" value="{{$item->id}}" {{ old('category_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                            @else
                                            <option selected disabled value="">Select</option>
                                            @foreach (App\Models\Category::all() as $item)
                                                <option value="{{ $item->id }}" {{ $data->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                            @if ($errors->has('category_id'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('category_id') }}</p>
                                            @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Active</label>
                                        <select name="active" value="{{ old('card_status') }}" class="form-control select2" required>
                                            <?php $lists = ['YES', 'NO']; ?>
                                            <option value="">-Choose-</option>
                                            @if (empty($data))
                                                <option value="YES" {{ old('active') == 'YES' ? 'selected' : '' }}>YES</option>
                                            <option value="NO" {{ old('') == 'NO' ? 'selected' : '' }}>NO</option>
                                            @else
                                                <option value="YES" {{ $data->active == 'YES' ? 'selected' : '' }}>YES
                                                </option>
                                                <option value="NO" {{ $data->active == 'NO' ? 'selected' : '' }}>NO
                                                </option>
                                            @endif
                                        </select>
                                        @if ($errors->has('active'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('active') }}</p>
                                        @endif
                                    </div>

                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Special Deal</label>
                                        <select name="special_deal" value="{{ old('special_deal') }}" class="form-control select2" required>
                                            <?php $lists = ['YES', 'NO']; ?>
                                            <option value="">-Choose-</option>
                                            @if (empty($data))
                                                <option value="YES" {{ old('special_deal') == 'YES' ? 'selected' : '' }}>YES</option>
                                            <option value="NO" {{ old('') == 'NO' ? 'selected' : '' }}>NO</option>
                                            @else
                                                <option value="YES" {{ $data->special_deal == 'YES' ? 'selected' : '' }}>YES
                                                </option>
                                                <option value="NO" {{ $data->special_deal == 'NO' ? 'selected' : '' }}>NO
                                                </option>
                                            @endif
                                        </select>
                                        @if ($errors->has('special_deal'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('special_deal') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Popular</label>
                                        <select name="popular" value="{{ old('popular') }}" class="form-control select2" required>
                                            <?php $lists = ['YES', 'NO']; ?>
                                            <option value="">-Choose-</option>
                                            @if (empty($data))
                                                <option value="YES" {{ old('popular') == 'YES' ? 'selected' : '' }}>YES</option>
                                            <option value="NO" {{ old('') == 'NO' ? 'selected' : '' }}>NO</option>
                                            @else
                                                <option value="YES" {{ $data->popular == 'YES' ? 'selected' : '' }}>YES
                                                </option>
                                                <option value="NO" {{ $data->popular == 'NO' ? 'selected' : '' }}>NO
                                                </option>
                                            @endif
                                        </select>
                                        @if ($errors->has('popular'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('popular') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Recommendation</label>
                                        <select name="recommendation" value="{{ old('recommendation') }}" class="form-control select2" required>
                                            <?php $lists = ['YES', 'NO']; ?>
                                            <option value="">-Choose-</option>
                                            @if (empty($data))
                                                <option value="YES" {{ old('recommendation') == 'YES' ? 'selected' : '' }}>YES</option>
                                            <option value="NO" {{ old('') == 'NO' ? 'selected' : '' }}>NO</option>
                                            @else
                                                <option value="YES" {{ $data->recommendation == 'YES' ? 'selected' : '' }}>YES
                                                </option>
                                                <option value="NO" {{ $data->recommendation == 'NO' ? 'selected' : '' }}>NO
                                                </option>
                                            @endif
                                        </select>
                                        @if ($errors->has('recommendation'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('recommendation') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                        <label for="validationCustom04">Best Price</label>
                                        <select name="best_price" value="{{ old('best_price') }}" class="form-control select2" required>
                                            <?php $lists = ['YES', 'NO']; ?>
                                            <option value="">-Choose-</option>
                                            @if (empty($data))
                                                <option value="YES" {{ old('best_price') == 'YES' ? 'selected' : '' }}>YES</option>
                                            <option value="NO" {{ old('') == 'NO' ? 'selected' : '' }}>NO</option>
                                            @else
                                                <option value="YES" {{ $data->best_price == 'YES' ? 'selected' : '' }}>YES
                                                </option>
                                                <option value="NO" {{ $data->best_price == 'NO' ? 'selected' : '' }}>NO
                                                </option>
                                            @endif
                                        </select>
                                        @if ($errors->has('best_price'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('best_price') }}</p>
                                        @endif
                                    </div>
                                    <div class=" row mb-4">
                                    @if (empty($data))
                                  <label for="formFile" class="form-label mt-0">Image 1(460x260)</label>
                                        <input class="form-control" name="image" type="file" value="">
                                        @if ($errors->has('image'))
                                            <p class="" style="color: red; font-size: .8rem;">
                                                {{ $errors->first('image') }}</p>
                                        @endif
                                       @else
                                       <label for="formFile" class="form-label mt-0">Image 1(460x260)</label>
                                       <input class="form-control" name="image" type="file" value="">
                                       @if ($errors->has('image'))
                                           <p class="" style="color: red; font-size: .8rem;">
                                               {{ $errors->first('image') }}</p>
                                       @endif
                                        <img height="90px" width="120px" src="{{asset('storage/product/'.$data->image)}}" alt="">
                                       @endif
                                    </div>
                                    <div class=" row mb-4">
                                        @if (empty($data))
                                      <label for="formFile" class="form-label mt-0">Image 2(460x260)</label>
                                            <input class="form-control" name="image2" type="file" value="">
                                            @if ($errors->has('image2'))
                                                <p class="" style="color: red; font-size: .8rem;">
                                                    {{ $errors->first('image2') }}</p>
                                            @endif
                                           @else
                                           <label for="formFile" class="form-label mt-0">Image 2(460x260)</label>
                                           <input class="form-control" name="image2" type="file" value="">
                                           @if ($errors->has('image2'))
                                               <p class="" style="color: red; font-size: .8rem;">
                                                   {{ $errors->first('image2') }}</p>
                                           @endif
                                           @if ($data->image2)
                                           <img height="90px" width="120px" src="{{asset('storage/product/'.$data->image2)}}" alt="">
                                           @endif

                                           @endif
                                        </div>
                                        <div class=" row mb-4">
                                            @if (empty($data))
                                          <label for="formFile" class="form-label mt-0">Image 3(460x260)</label>
                                                <input class="form-control" name="image2" type="file" value="">
                                                @if ($errors->has('image3'))
                                                    <p class="" style="color: red; font-size: .8rem;">
                                                        {{ $errors->first('image3') }}</p>
                                                @endif
                                               @else
                                               <label for="formFile" class="form-label mt-0">Image 3(460x260)</label>
                                               <input class="form-control" name="image3" type="file" value="">
                                               @if ($errors->has('image3'))
                                                   <p class="" style="color: red; font-size: .8rem;">
                                                       {{ $errors->first('image3') }}</p>
                                               @endif
                                               @if ($data->image3)
                                                <img height="90px" width="120px" src="{{asset('storage/product/'.$data->image3)}}" alt="">
                                                @endif
                                               @endif
                                            </div>
                                            <div class=" row mb-4">
                                                @if (empty($data))
                                              <label for="formFile" class="form-label mt-0">Image 4(460x260)</label>
                                                    <input class="form-control" name="image4" type="file" value="">
                                                    @if ($errors->has('image4'))
                                                        <p class="" style="color: red; font-size: .8rem;">
                                                            {{ $errors->first('image4') }}</p>
                                                    @endif
                                                   @else
                                                   <label for="formFile" class="form-label mt-0">Image 4(460x260)   </label>
                                                   <input class="form-control" name="image4" type="file" value="">
                                                   @if ($errors->has('image4'))
                                                       <p class="" style="color: red; font-size: .8rem;">
                                                           {{ $errors->first('image4') }}</p>
                                                   @endif
                                                   @if ($data->image4)
                                                    <img height="90px" width="100%" src="{{asset('storage/product/'.$data->image4)}}" alt="">
                                                    @endif
                                                   @endif
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
