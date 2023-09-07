@extends('section.layout.home')
@section('home') 
    @include('section.home.navbar')
    {{-- {{Cookie::get('referral')}} --}}
    <section class="container home">
        <div class="top ">
           <div class="my-auto">
             {{-- <h1 style="font-family: p5;">{{ __('messages.home_page.introduction.heading_1') }}</h1> --}}
             <h1 style="font-family: p5; padding-top: 10px; padding-bottom: 0; font-size: 6em;">{{ __('messages.home_page.introduction.heading_1_1') }}</h1>
             <h1 style="font-family: p5; padding-top: 10px; padding-bottom: 0; font-size: 6em;">{{ __('messages.home_page.introduction.heading_1_2') }}</h1>
             <h1 style="font-family: p5; padding-top: 10px; padding-bottom: 0; font-size: 6em;">{{ __('messages.home_page.introduction.heading_1_3') }}</h1>
             <h1 style="font-family: p5; padding-top: 10px; padding-bottom: 0; font-size: 6em;">{{ __('messages.home_page.introduction.heading_1_4') }}</h1>
             {{-- <h1 style="font-family: p5;">The best community centric online marketplace</h1> --}}
             {{-- <p style="font-family: p5;">
              {{__('messages.home_page.introduction.paragraph_1')}}
             </p> --}}
             <a href="#products"> <button><span style="font-family: p4;">{{ __('messages.view_products') }}</span></button></a>
           </div>
        </div>
        <div class="bottom">
    {{-- <section id="" class="">
        <div class="three_cards col-12 owl-one owl-carousel owl-theme owl-blog">
            @foreach ($products as $item)
            <div class=" item">
                <div class="card" style="width: 18rem; background-color: #2c2c2c6b">
                    <img class="card-img-top px-1 py-1" style="width: 100% !important; height: 100px !important;" src="{{ asset('storage/product/' . $item->product->image) }}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{Str::limit($item->product->name, 20)}}</h5>
                      <p class="card-text"> Price: ₹ {{$item->product->our_price}}</p>
                      <a href="{{route('productView',['slug'=>$item->product->slug,'pool_product_id'=>$item->id])}}" class="btn btn-primary">View</a>
                    </div>
                  </div>
            </div>
            @endforeach
        </div>
    </section> --}}
        </div>
    </section>
     @if($products)
    <div class="carousel">
        <div class="card-carousel" style="left: 80px;">
            @foreach ($products as $item)
            <div class="my-card">
            <div class=" item">
                <div class="card" style=" background-color: #02010100">
                    {{-- <img class="card-img-top px-1 py-3" style="width: 100% !important; height: 100% !important;" src="{{ asset('storage/product/' . $item->product->image) }}" alt="Card image cap"> --}}
                    @if (Illuminate\Support\Facades\Storage::exists('public/product/' . $item->product->image))
                    <a href="{{route('productView',['slug'=>$item->product->slug,'pool_product_id'=>$item->id])}}"><img class="card-img-top" style="width: 100% !important; height: 100% !important;" src="{{ asset('storage/product/' . $item->product->image) }}" alt="Card image cap"></a>
                    @else
                    <a href="{{route('productView',['slug'=>$item->product->slug,'pool_product_id'=>$item->id])}}"><img class="card-img-top"  style="width: 100% !important; height: 100% !important;" src="{{ asset('frontend/assets/image/other/default.png') }}"
                            alt="Card image cap" /></a>
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{Str::limit($item->product->name, 20)}}</h5>
                      <p class="card-text"> Price: ₹ {{$item->product->our_price}}</p>
                      <a href="{{route('productView',['slug'=>$item->product->slug,'pool_product_id'=>$item->id])}}" class="btn btn-primary">View</a>
                    </div>
                  </div>
            </div>
            </div>
            @endforeach

            {{-- <div class="my-card">222</div>
            <div class="my-card">333</div>
            <div class="my-card">444</div>
            <div class="my-card">555</div>
            <div class="my-card">666</div>
            <div class="my-card">777</div>
            <div class="my-card">888</div>
            <div class="my-card">999</div> --}}
        </div>
    </div>
    @endif
    <script>
        var $num = $('.card-carousel .my-card').length;
    var $even = $num / 2;
    var $odd = ($num + 1) / 2;

    if ($num % 2 == 0) {
        $('.card-carousel .my-card:nth-child(' + $even + ')').addClass('active');
        $('.card-carousel .my-card:nth-child(' + $even + ')').prev().addClass('prev');
        $('.card-carousel .my-card:nth-child(' + $even + ')').next().addClass('next');
    } else {
        $('.card-carousel .my-card:nth-child(' + $odd + ')').addClass('active');
        $('.card-carousel .my-card:nth-child(' + $odd + ')').prev().addClass('prev');
        $('.card-carousel .my-card:nth-child(' + $odd + ')').next().addClass('next');
    }

    $('.card-carousel .my-card').on('click', function() {
        if ($('.card-carousel').is(':animated')) {
            return;
        }

        var $slide = $('.card-carousel .active').width();

        if ($(this).hasClass('next')) {
            $('.card-carousel').animate({left: '-=' + $slide});
        } else if ($(this).hasClass('prev')) {
            $('.card-carousel').animate({left: '+=' + $slide});
        }

        $(this).removeClass('prev next');
        $(this).siblings().removeClass('prev active next');

        $(this).addClass('active');
        $(this).prev().addClass('prev');
        $(this).next().addClass('next');
    });


    // Keyboard nav
    $('html body').keydown(function(e) {
        if (e.keyCode == 37) { // left
            $('.card-carousel .active').prev().trigger('click');
        }
        else if (e.keyCode == 39) { // right
            $('.card-carousel .active').next().trigger('click');
        }
    });
    </script>
        {{-- </div>
    </section> --}}


    <div class="container">
        {{-- <h3> Lorem Pixel </h3>
        <div class="carousel">
            <a class="carousel-item" href="#one!">a<img src="{{asset('http://lorempixel.com/250/250/nature/1')}}"></a>
            <a class="carousel-item" href="#two!"><img src="{{asset('http://lorempixel.com/250/250/nature/2')}}"></a>
            <a class="carousel-item" href="#three!"><img src="{{asset('http://lorempixel.com/250/250/nature/3')}}"></a>
            <a class="carousel-item" href="#four!"><img src="{{asset('http://lorempixel.com/250/250/nature/4')}}"></a>
            <a class="carousel-item" href="#five!"><img src="{{asset('http://lorempixel.com/250/250/nature/5')}}"></a>
        </div>

        <hr> --}}

        {{-- <h3> PlaceIMG </h3> --}}
        <div class="carousel" style="">
          @if ($products)
          @foreach ($products as $product)
            {{-- <a class="carousel-item" href=""><img src="{{asset('https://placeimg.com/640/480/nature')}}"></a> --}}
            @if (Illuminate\Support\Facades\Storage::exists('public/product/' . $product->product->image))
            {{-- <a class="carousel-item" href="{{route('productView',['slug'=>$product->product->slug,'pool_product_id'=>$product->id])}}"><img height="" src="{{ asset('storage/product/' . $product->product->image) }}"></a> --}}
            <section class="carousel-item" style="background-color: #cfcfcfb5;">
              <div class="container-fluid">
                <div class="row justify-content-center">
                  <div class="col-md-12 col-lg-12 col-xl-12 ">
                    <div class="card text-black ">

                      <img src="{{ asset('storage/product/' . $product->product->image) }}"
                        class="card-img-top" alt="Apple Computer" />
                      <div class="card-body my-0 py-0" style="height: 200px;">
                        <div class="text-center">
                          <h5 class="card-title" style="font-family: p5;">{{Str::limit($product->product->name, 20)}}</h5>
                          <p class="text-muted mb-4" style="font-family: p5"> Price: ₹ {{$product->product->our_price}}</p>
                        </div>
                        {{-- <div>
                          <div class="d-flex justify-content-between">
                            <span>Pro Display XDR</span><span>$5,999</span>
                          </div>
                          <div class="d-flex justify-content-between">
                            <span>Pro stand</span><span>$999</span>
                          </div>
                          <div class="d-flex justify-content-between">
                            <span>Vesa Mount Adapter</span><span>$199</span>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between total font-weight-bold mt-4">
                          <span>Total</span><span>$7,197.00</span>
                        </div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
                            @else
                            {{-- <a href="{{route('productView',['slug'=>$product->product->slug,'pool_product_id'=>$product->id])}}"> <img class="card-img-top" src="{{ asset('frontend/assets/image/other/default.png') }}"
                                    alt="Card image cap" /></a> --}}
                            @endif
            {{-- <a class="carousel-item" href=""><img src="{{asset('https://placeimg.com/640/480/animals')}}"></a>
            <a class="carousel-item" href=""><img src="{{asset('https://placeimg.com/640/480/arch')}}"></a>
            <a class="carousel-item" href=""><img src="{{asset('https://placeimg.com/640/480/tech')}}"></a>
            <a class="carousel-item" href=""><img src="{{asset('https://placeimg.com/640/480/people')}}"></a> --}}
            @endforeach
            @endif
        </div>

        <hr>

        {{-- <h3> Unsplash.it </h3>
        <div class="carousel">
            <a class="carousel-item" href="#one!"><img src="{{asset('https://unsplash.it/200/300/?random')}}"></a>
            <a class="carousel-item" href="#two!"><img src="{{asset('https://unsplash.it/200/300/?random')}}"></a>
            <a class="carousel-item" href="#three!"><img src="{{asset('https://unsplash.it/300/300/?random')}}"></a>
            <a class="carousel-item" href="#four!"><img src="{{asset('https://unsplash.it/g/200/300/?random')}}"></a>
            <a class="carousel-item" href="#five!"><img src="{{asset('https://unsplash.it/200/250/?random')}}"></a>
        </div> --}}
    </div>

    {{-- <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel();
        });
    </script> --}}



    {{-- <section class="aboutus" id="about_us">
        <div class="content">
            <div class="about_img col-12 col-sm-5 col-lg-5 col-md-5 col-xl-5 col-xxl-5">
                <img src="./frontend/assets/image/home/Rectangle 10.jpg" alt="" />
            </div>
            <div class="about_text col-12 col-sm-7 col-lg-7 col-md-7 col-xl-7 col-xxl-7">
                <a href="{{route('aboutUs')}}"><button class="small_about_btn" style="font-family: p2  ;">{{ __('messages.about_us') }}</button></a>
                <h1 style="font-family: p5;">We deliver the best experience</h1>
                <p style="font-family: p5;">
                    ItsOurWorld is the world’s first and largest online marketplace.
                    Lorem ipsum dolor sit amet, consectetur non ultrices sit amet
                    adipiscing elit.
                </p>
                <a href="{{route('aboutUs')}}">
                    <button class="large_about_btn"><span style="font-family: p4;">{{ __('messages.read_more') }}</span></button>
                </a>
            </div>
        </div>
    </section> --}}

    <section id="concept" class="how_it_works container">
        <button><span style="font-family: p2;">{{ __('messages.how_it_works') }}</span></button>
        {{-- <h1 style="font-family: p4;">Watch this video to understand how we operate</h1> --}}
        <video class="pt-5" width="100%" controls
            poster="./frontend/assets/image/home/de467fd7-4f10-42f3-b9ab-57e5a91e0f47-lucahero 1.jpg">
            <source src="{{ asset('frontend/assets/video/video.mp4') }}" type="video/mp4" />
            <source src=".mp4" type="video/ogg" />
            Your browser does not support HTML video.
        </video>
    </section>

    <section id="products" class="our_products">
        <button class="first_button"><span>Products</span></button>
        <h1 style="font-family: p5;">View our latest drops</h1>
        <ul class="subnav_our_product">
            <li><a style="font-family: p5;" href="/" @if (Request::fullUrl() == url('/')) class="active" @endif>All</a></li>
            <li><a style="font-family: p5;" href="?filter=special_deal" @if (Request::get('filter') == 'special_deal') class="active" @endif>Special Deals</a>
            </li>
            <li><a style="font-family: p5;" href="?filter=popular" @if (Request::get('filter') == 'popular') class="active" @endif>Populer</a></li>
            <li><a style="font-family: p5;" href="?filter=recommendation" @if (Request::get('filter') == 'recommendation') class="active" @endif>Recommendation</a>
            </li>
            <li><a style="font-family: p5;" href="?filter=best_price" @if (Request::get('filter') == 'best_price') class="active" @endif>Best Price</a></li>
        </ul>

        <div class="col-12 product-card_first">
            @if ($products)
                @foreach ($products as $product)
                    <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 list_products">
                        <div class="card">
                            @if (Illuminate\Support\Facades\Storage::exists('public/product/' . $product->product->image))
                            <a href="{{route('productView',['slug'=>$product->product->slug,'pool_product_id'=>$product->id])}}"> <img class="card-img-top" height="100px;" src="{{ asset('storage/product/' . $product->product->image) }}"
                                    alt="Card image cap" /> </a>
                            @else
                            <a href="{{route('productView',['slug'=>$product->product->slug,'pool_product_id'=>$product->id])}}"> <img class="card-img-top" height="100px" src="{{ asset('frontend/assets/image/other/default.png') }}"
                                    alt="Card image cap" /></a>
                            @endif
                            <div class="card-body">
                                <div class="first" style="height: 80px;">
                                    <div class="left">
                                       <a href="{{route('productView',['slug'=>$product->product->slug,'pool_product_id'=>$product->id])}}"> <h5 style="font-family: p5;">{!! Str::limit($product->product->name, 20) !!}</h5></a>
                                    </div>
                                    <div class="right">
                                        <img src="/frontend/assets/image/home/Star 1.png" alt="" srcset="" />
                                        <h6>4.3</h6>
                                    </div>
                                </div>
                                <div class="second">
                                    <p style="font-family: p5;">Market Price ₹{{ $product->product->market_price }}</p>
                                </div>
                                <div class="third">
                                    <div class="left">
                                        <h4 style="font-family: p5;">₹{{ $product->product->our_price }}</h4>
                                    </div>
                                    <div class="right">
                                        @if (Auth()->user())
                                            @if ($product->product->quantity == 0)
                                            <p class="text-danger" style="font-family: p5;">Sold out</p>
                                            @else
                                            <a data-toggle="modal" data-target="#enquiryModal{{ $product->product->id }}"
                                                href=""> <span style="font-family: p5;">I'm interested</span></a>
                                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                                            @endif

                                            @else
                                                <a href="{{ route('userLogin') }}"><span style="font-family: p5;">I'm interested</span></a>
                                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="enquiryModal{{ $product->product->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="enquiryModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="enquiryModalLabel" style="font-family: p5;">Confirm your interest for this
                                        product</h5>
                                    <button type="button" class="close btn btn-secondary" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p style="text-align: left; font-family: p5;" class="text-dark">Product name:
                                        {{Str::limit($product->product->name, 20)}}
                                    </p>
                                    <p style="text-align: left; font-family: p5;" class="text-dark">Market Price:
                                        ₹{{ $product->product->market_price }}</p>
                                        <p style="text-align: left; font-family: p5;" class="text-dark">Online Price:
                                            ₹{{ $product->product->online_price }}</p>
                                    <p style="text-align: left; font-family: p5;" class="text-dark">Our Price:
                                        ₹{{ $product->product->our_price }}</p>
                                    <p style="text-align: left; font-family: p5;" class="text-dark">Short Description:
                                        {{ $product->product->short_description }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{ route('user.userEnquiry', $product->uuid) }}"> <button type="button"
                                            class="btn btn-primary">Confirm</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>


        {{-- <div class="col-12 product-card_second">
      <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
        <div class="card">
          <img
            class="card-img-top"
            src="./frontend/assets/image/home/pexels-jess-loiterton-4321085 (4).jpg"
            alt="Card image cap"
          />
          <div class="card-body">
            <div class="first">
              <div class="left">
                <h5>Smart Watch</h5>
              </div>
              <div class="right">
                <img src="./frontend/assets/image/home/Star 1.png" alt="" srcset="" />
                <h6>4.3</h6>
              </div>
            </div>
            <div class="second">
              <p>Market Price ₹1399</p>
            </div>
            <div class="third">
              <div class="left">
                <h4>₹1699</h4>
              </div>
              <div class="right">
                <span>I'm interested</span>
                <img src="./frontend/assets/image/home/arrow.svg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
        <div class="card">
          <img
            class="card-img-top"
            src="./frontend/assets/image/home/pexels-jess-loiterton-4321085 (5).jpg"
            alt="Card image cap"
          />
          <div class="card-body">
            <div class="first">
              <div class="left">
                <h5>Smart Watch</h5>
              </div>
              <div class="right">
                <img src="./frontend/assets/image/home/Star 1.png" alt="" srcset="" />
                <h6>4.3</h6>
              </div>
            </div>
            <div class="second">
              <p>Market Price ₹1399</p>
            </div>
            <div class="third">
              <div class="left">
                <h4>₹1699</h4>
              </div>
              <div class="right">
                <span>I'm interested</span>
                <img src="./frontend/assets/image/home/arrow.svg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
        <div class="card">
          <img
            class="card-img-top"
            src="./frontend/assets/image/home/pexels-jess-loiterton-4321085 (6).jpg"
            alt="Card image cap"
          />
          <div class="card-body">
            <div class="first">
              <div class="left">
                <h5>Smart Watch</h5>
              </div>
              <div class="right">
                <img src="./frontend/assets/image/home/Star 1.png" alt="" srcset="" />
                <h6>4.3</h6>
              </div>
            </div>
            <div class="second">
              <p>Market Price ₹1399</p>
            </div>
            <div class="third">
              <div class="left">
                <h4>₹1699</h4>
              </div>
              <div class="right">
                <span>I'm interested</span>
                <img src="./frontend/assets/image/home/arrow.svg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
        <div class="card">
          <img
            class="card-img-top"
            src="./frontend/assets/image/home/pexels-jess-loiterton-4321085 (7).jpg"
            alt="Card image cap"
          />
          <div class="card-body">
            <div class="first">
              <div class="left">
                <h5>Smart Watch</h5>
              </div>
              <div class="right">
                <img src="./frontend/assets/image/home/Star 1.png" alt="" srcset="" />
                <h6>4.3</h6>
              </div>
            </div>
            <div class="second">
              <p>Market Price ₹1399</p>
            </div>
            <div class="third">
              <div class="left">
                <h4>₹1699</h4>
              </div>
              <div class="right">
                <span>I'm interested</span>
                <img src="./frontend/assets/image/home/arrow.svg" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
        <button class="view_all" style="font-family: p4;" id="next">View More</button>
    </section>

    {{-- <section class="our_associates">
        <button>Our associates</button>
        <h1 style="font-family: p5;">Our collaborators</h1>
        <div class="first col-12">
            <div class="col-3">
                <img src="./frontend/assets/image/home/Airbnb.svg" alt="" srcset="" />
            </div>
            <div class="col-3">
                <img src="./frontend/assets/image/home/Amazon Logo.png" alt="" srcset="" />
            </div>
            <div class="col-3">
                <img src="./frontend/assets/image/home/Vector (2).png" alt="" srcset="" />
            </div>
            <div class="col-3">
                <img src="./frontend/assets/image/home/Google Logo.png" alt="" srcset="" />
            </div>
        </div>
        <div class="second col-12">
            <div class="col-3">
                <img src="./frontend/assets/image/home/Microsoft Logo.png" alt="" srcset="" />
            </div>
            <div class="col-3">
                <img src="./frontend/assets/image/home/Vector (2).png" alt="" srcset="" />
            </div>
            <div class="col-3">
                <img src="./frontend/assets/image/home/Walmart Logo.png" alt="" srcset="" />
            </div>
            <div class="col-3">
                <img src="./frontend/assets/image/home/Vector (3).png" alt="" srcset="" />
            </div>
        </div>
    </section> --}}

    {{-- <section id="blogs" class="blogs ">
        <button class="first_button">{{ __('messages.blogs') }}</button>
        <h1 style="font-family: p4;">Stay updated with us</h1>
        <div class="three_cards col-12 owl-one owl-carousel owl-theme owl-blog">
            @foreach (App\Models\Blog::all() as $item)
            <div class=" item">
                <div class="box-1" style="background: {{$item->color}}">
                    <h6 style="font-family: p5;">{{$item->published_date}}</h6>
                    <img src="{{ asset('storage/blog/' . $item->image) }}" alt="" />
                </div>
                <p></p>
                <h5 style="font-family: p5;">{{$item->title}}</h5>
                <p style="font-family: p5;">
                {!! Str::limit($item->description, 20) !!}
                </p>
            </div>
            @endforeach
        </div>
        <button class="last_button">View all</button>
    </section> --}}
    {{-- <section id="testimonials" class="testimonial">
        <div class="container">
        <button><span style="font-family: p2;">{{ __('messages.testimonials') }}</span></button>
        <h1 style="font-family: p4;">Our clients love us</h1>
        <div class="">
            <div id="owl-carousel"  class="col-12 slider owl-carousel owl-theme owl-testi">
                @foreach (App\Models\Testimony::all() as $item)
                <div class="col-6 col-sm-12 item" style="width: 100%;">
                    <p style="font-family: p5;">
                        “{!! Str::limit($item->text, 20) !!}”
                    </p>
                    <div class="bottom_slide">
                        <img class="rounded-circle" src="{{ asset('storage/testimony/' . $item->image) }}" alt="" />
                        <div class="name_rating">
                            <span style="font-family: p5;">{{$item->client_name}}</span>
                            <img class="rating" src="./frontend/assets/image/home/Rating.png" alt="" />
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
    </section> --}}
    <section class="anyquery">

        <form action="{{route('enquiryForm')}}" method="post">
          @csrf
          <div class="query">
              <div class="query_first col-8">
                  <h1 style="font-family: p4;">Have any query?</h1>
                  <p style="font-family: p5;">
                    Benefitshops is the world’s first and largest online marketplace.
                  </p>

                  <input type="email" name="email" required placeholder="Type your query" />
                  <button><span style="font-family: p4;">Send email</span></button>
              </div>
              <div class="query_second col-4">
                  <img src="/frontend/assets/image/home/young man in headphones sitting with laptop and waving.png"
                      alt="" />
              </div>
          </div>
        </form>
      </section>
    @include('section.home.footer')
@endsection
