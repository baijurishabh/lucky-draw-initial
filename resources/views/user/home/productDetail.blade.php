@extends('section.layout.home')
@section('home')
    @include('section.home.navbar')
    <form action=""
        action="{{ route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id]) }}" method="GET">
        <section class="product_searchbar">
            <div class="search d-flex">

                <input type="text" required name="search" value="{{ request()->query('search') }}"
                    placeholder="Search Products" />
                <div class="line">&nbsp;</div>
                <select name="category_id" id="">
                    <option value="all"><span>All Categories</span></option>
                    @foreach (\App\Models\Category::all() as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <button type="submit">
                    <img src="/frontend/assets/image/product/search.png" alt="" srcset="" />
                </button>

            </div>
        </section>
    </form>

    <section class="product_navbar">
        <div class="list">
            <ul>
                <a href="{{ route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id]) }}">
                    <li @if (Request::fullUrl() == route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id])) class="active" @endif>All</li>
                </a>
                @foreach (\App\Models\Category::all() as $item)
                    <a href="{{ route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id]) }}?category_id={{ $item->id }}"
                        style="font-family: p5;">
                        <li @if (Request::fullUrl() ==
                                route('productView', [
                                    'slug' => $product->product->slug,
                                    'pool_product_id' => $product->id . '?category_id=' . "$item->id",
                                ])) class="active" @endif>{{ $item->name }}</li>
                    </a>
                @endforeach
            </ul>
        </div>
    </section>

    @if (request()->query('search') || request()->query('category_id'))
        <section id="products" class="our_products">
            <button class="related_products_btn" style="font-family: p5;">Related products</button>
            <h1 style="font-family: p5;">View all related products</h1>
            <!-- <ul class="subnav_our_product">
                        <li><a class="active">Special Deals</a></li>
                        <li><a>Populer</a></li>
                        <li><a>Recommendation</a></li>
                        <li><a>Best Price</a></li>
                      </ul> -->

            <div class="col-12 product-card_first">
                @if ($products)
                    @foreach ($products as $product)
                        <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="card">
                                @if (Illuminate\Support\Facades\Storage::exists('public/product/' . $product->product->image))
                                    <a
                                        href="{{ route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id]) }}">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/product/' . $product->product->image) }}"
                                            alt="Card image cap" /> </a>
                                @else
                                    <a
                                        href="{{ route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id]) }}">
                                        <img class="card-img-top"
                                            src="{{ asset('frontend/assets/image/other/default.png') }}"
                                            alt="Card image cap" /></a>
                                @endif
                                <div class="card-body">
                                    <div class="first">
                                        <div class="left">
                                            <a
                                                href="{{ route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id]) }}">
                                                <h5 style="font-family: p5;">{{ $product->product->name }}</h5>
                                            </a>
                                        </div>
                                        <div class="right">
                                            <img src="/frontend/assets/image/home/Star 1.png" alt=""
                                                srcset="" />
                                            <h6 style="font-family: p5;">4.3</h6>
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
                                                    <a data-toggle="modal"
                                                        data-target="#enquiryModal{{ $product->product->id }}"
                                                        href="">
                                                @endif
                                            @else
                                                <a href="{{ route('userLogin') }}">
                                            @endif <span style="font-family: p5;">I'm
                                                interested</span></a>
                                            <img src="/frontend/assets/image/home/arrow.svg" alt="" />
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
                                        <h5 class="modal-title text-dark" id="enquiryModalLabel" style="font-family: p5;">
                                            Confirm your interest for this
                                            product</h5>
                                        <button type="button" class="close btn btn-secondary" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="text-align: left" class="text-dark" style="font-family: p5;">Product name:
                                            {{ $product->product->name }}
                                        </p>
                                        <p style="text-align: left" class="text-dark" style="font-family: p5;">Market Price:
                                            ₹{{ $product->product->market_price }}</p>
                                        <p style="text-align: left" class="text-dark" style="font-family: p5;">Our Price:
                                            ₹{{ $product->product->our_price }}</p>
                                        <p style="text-align: left" class="text-dark" style="font-family: p5;">Short
                                            Description:
                                            {{ $product->product->short_description }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
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
                    <img class="card-img-top" src="/frontend/assets/image/home/pexels-jess-loiterton-4321085 (4).jpg"
                        alt="Card image cap" />
                    <div class="card-body">
                        <div class="first">
                            <div class="left">
                                <h5>Smart Watch</h5>
                            </div>
                            <div class="right">
                                <img src="/frontend/assets/image/home/Star 1.png" alt="" srcset="" />
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
                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/frontend/assets/image/home/pexels-jess-loiterton-4321085 (5).jpg"
                        alt="Card image cap" />
                    <div class="card-body">
                        <div class="first">
                            <div class="left">
                                <h5>Smart Watch</h5>
                            </div>
                            <div class="right">
                                <img src="/frontend/assets/image/home/Star 1.png" alt="" srcset="" />
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
                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/frontend/assets/image/home/pexels-jess-loiterton-4321085 (6).jpg"
                        alt="Card image cap" />
                    <div class="card-body">
                        <div class="first">
                            <div class="left">
                                <h5>Smart Watch</h5>
                            </div>
                            <div class="right">
                                <img src="/frontend/assets/image/home/Star 1.png" alt="" srcset="" />
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
                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/frontend/assets/image/home/pexels-jess-loiterton-4321085 (7).jpg"
                        alt="Card image cap" />
                    <div class="card-body">
                        <div class="first">
                            <div class="left">
                                <h5>Smart Watch</h5>
                            </div>
                            <div class="right">
                                <img src="/frontend/assets/image/home/Star 1.png" alt="" srcset="" />
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
                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

            <button class="view_all">View all</button>
        </section>
    @else
        <section class="mobiles">
            <h2 style="font-family: p5;">{{ $product->product->name }} </h2>
            <h6 style="font-family: p5;">{{ $product->product->category->name }}</h6>
        </section>




        <section class="product_images container">
            <div class="col-12 product_section d-flex">
                <div class="col-4 d-none d-md-block d-lg-flex col-sm-4  col-md-2 col-lg-2 col-xl-2 col-xxl-2 small_imgs">
                    @if (Illuminate\Support\Facades\Storage::exists('public/product/' . $product->product->image))
                        <img onclick="onClick(this)" class="small"
                            src="{{ asset('storage/product/' . $product->product->image) }}" alt="" />
                    @else
                        <img onclick="onClick(this)" class="small"
                            src="{{ asset('frontend/assets/image/other/default.png') }}" alt="">
                    @endif
                    @if (!empty($product->product->image) )
                    <img onclick="onClick(this)" class="small" src="{{ asset('storage/product/' . $product->product->image) }}"
                        alt="" />
                    @endif
                    @if (!empty($product->product->image2) )
                    <img onclick="onClick(this)" class="small" src="{{ asset('storage/product/' . $product->product->image2) }}"
                        alt="" />
                        @endif
                        @if (!empty($product->product->image3) )
                    <img onclick="onClick(this)" class="small" src="{{ asset('storage/product/' . $product->product->image3) }}"
                        alt="" />
                        @endif
                        @if (!empty($product->product->image4) )
                    <img onclick="onClick(this)" class="small" src="{{ asset('storage/product/' . $product->product->image4) }}"
                        alt="" />
                        @endif
                </div>

                <script>
                    function onClick(element) {
                        document.getElementById("myimage").src = element.src;
                        document.getElementById("modal01").style.display = "block";
                    }
                </script>

                <div class="col-8 col-sm-8  col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                    @if (Illuminate\Support\Facades\Storage::exists('public/product/' . $product->product->image))
                        <div class="image-magnifier">
                            <img class="small" id="myimage"
                                src="{{ asset('storage/product/' . $product->product->image) }}" width="100%" />
                        </div>
                    @else
                        <div class="image-magnifier">
                            <img class="active" id="myimage"
                                src="{{ asset('frontend/assets/image/other/default.png') }}" width="100%"
                                alt="">
                        </div>
                    @endif

                </div>

                {{-- <script>
                    /* Execute the magnify function: */
                    magnify("myimage", 2);
                    /* Specify the id of the image, and the strength of the magnifier glass: */
                    </script> --}}
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 details">
                    <h2 class="heading" style="font-family: p5;">{{ $product->product->name }}</h2>
                    <h2 class="heading" style="font-family: p5;">{{ $product->product->short_description }}</h2>
                    <p class="margin_bottom" style="font-family: p5;">
                        Availability: <span class="red" style="font-family: p5;">Only
                            {{ $product->product->quantity }} in Stock</span>
                    </p>
                    {{-- <p>183 ratings</p>
                <img src="/frontend/assets/image/product/rating.png" alt=""> --}}
                    <ul>
                        {!! $product->product->specification !!}
                    </ul>
                    {{-- <div class="storage">
                    <p class="active">1 TB</p>
                    <p>512 GB</p><br>
                    <p>256 GB</p>
                    <p>128 GB</p>
                </div> --}}
                    <div class="mrp">
                        <div class="">
                            <p class="small_head" style="font-family: p5;">MRP
                            <p class="price" style="font-family: p5;">₹{{ $product->product->market_price }}</p>
                            </p>
                        </div>
                        <div class="">
                            <p class="small_head" style="font-family: p5;">ONLINE PRICE
                            <p class="price">₹{{ $product->product->online_price }}</p>
                            </p>
                        </div>
                        <div class="">
                            <p class="small_head" style="font-family: p5;">OUR PRICE
                            <p class="price">₹{{ $product->product->our_price }}</p>
                            </p>
                        </div>
                    </div>
                    @if (Auth()->user())
                        @if ($product->product->quantity == 0)
                            <button class="btn btn-danger" style="font-family: p5;">Sold Out</button>
                        @else
                            <a data-toggle="modal" data-target="#enquiryModal{{ $product->product->id }}" href=""
                                style="font-family: p5;"> <button class="interested"><img
                                        src="/frontend/assets/image/product/Vector (1).png" alt=""
                                        srcset="">Interested</button> </a>
                        @endif
                    @else
                        <a href="{{ route('userLogin') }}" style="font-family: p5;"> <button class="interested"><img
                                    src="/frontend/assets/image/product/Vector (1).png" alt=""
                                    srcset="">Interested</button> </a>
                    @endif
                    <div class="modal fade" id="enquiryModal{{ $product->product->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="enquiryModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-dark" id="enquiryModalLabel">Confirm your interest for
                                        this
                                        product</h5>
                                    <button type="button" class="close btn btn-secondary" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p style="text-align: left; font-family: p5;" class="text-dark">Product name:
                                        {{ $product->product->name }}
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
                </div>
            </div>
        </section>


        <section class="product_discription container">
            <div class="nav_discription">
                <ul>
                    <li class="active">Description</li>
                    {{-- <li>Specification</li>
                <li>Reviews</li> --}}
                </ul>

            </div>
            <div class="Description">
                <p>
                    {!! $product->product->description !!} </p>


            </div>

        </section>


@if (!empty($product->product->youtube_link) )
<section>
            <div class="iframe-container pt-5">

                <div class="iframe-container-2">
                   <iframe src="{{$product->product->youtube_link}}" frameborder="0"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

             </div>
        </section>
@endif






        <section id="products" class="our_products">
            <button class="related_products_btn">Related products</button>
            <h1>View all related products</h1>
            <!-- <ul class="subnav_our_product">
                        <li><a class="active">Special Deals</a></li>
                        <li><a>Populer</a></li>
                        <li><a>Recommendation</a></li>
                        <li><a>Best Price</a></li>
                      </ul> -->

            <div class="col-12 product-card_first">
                @if ($products)
                    @foreach ($products as $product)
                        <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6 list_products">
                            <div class="card">
                                @if (Illuminate\Support\Facades\Storage::exists('public/product/' . $product->product->image))
                                    <a
                                        href="{{ route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id]) }}">
                                        <img class="card-img-top"
                                            src="{{ asset('storage/product/' . $product->product->image) }}"
                                            alt="Card image cap" /> </a>
                                @else
                                    <a
                                        href="{{ route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id]) }}">
                                        <img class="card-img-top"
                                            src="{{ asset('frontend/assets/image/other/default.png') }}"
                                            alt="Card image cap" /></a>
                                @endif
                                <div class="card-body">
                                    <div class="first">
                                        <div class="left">
                                            <a style="font-family: p5;"
                                                href="{{ route('productView', ['slug' => $product->product->slug, 'pool_product_id' => $product->id]) }}">
                                                <h5>{!! Str::limit($product->product->name, 50) !!}</h5>
                                            </a>
                                        </div>
                                        <div class="right">
                                            <img src="/frontend/assets/image/home/Star 1.png" alt=""
                                                srcset="" />
                                            <h6 style="font-family: p5;">4.3</h6>
                                        </div>
                                    </div>

                                    <div class="second">
                                        <p style="font-family: p5;">Market Price ₹{{ $product->product->market_price }}
                                        </p>
                                    </div>

                                    <div class="third">
                                        <div class="left">
                                            <h4 style="font-family: p5;">₹{{ $product->product->our_price }}</h4>
                                        </div>
                                        <div class="right">
                                            @if (Auth()->user())
                                                @if ($product->product->quantity == 0)
                                                    <p style="font-family: p5;" class="text-danger">Sold out</p>
                                                @else
                                                    <a data-toggle="modal"
                                                        data-target="#enquiryModal{{ $product->product->id }}"
                                                        href=""> <span>I'm interested</span></a>
                                                    <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                                                @endif
                                            @else
                                                <a style="font-family: p5;" href="{{ route('userLogin') }}"><span>I'm
                                                        interested</span></a>
                                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="enquiryModal{{ $product->product->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="enquiryModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="enquiryModalLabel">Confirm your interest for
                                            this
                                            product</h5>
                                        <button type="button" class="close btn btn-secondary" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="text-align: left; font-family: p5; " class="text-dark">Product name:
                                            {{-- {{ $product->product->name }} --}}
                                            {!! Str::limit($product->product->name, 20) !!}
                                        </p>
                                        <p style="text-align: left; font-family: p5;" class="text-dark">Market Price:
                                            ₹{{ $product->product->market_price }}</p>
                                        <p style="text-align: left; font-family: p5;" class="text-dark">Our Price:
                                            ₹{{ $product->product->our_price }}</p>
                                        <p style="text-align: left; font-family: p5;" class="text-dark">Short Description:
                                            {{ $product->product->short_description }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
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
                    <img class="card-img-top" src="/frontend/assets/image/home/pexels-jess-loiterton-4321085 (4).jpg"
                        alt="Card image cap" />
                    <div class="card-body">
                        <div class="first">
                            <div class="left">
                                <h5>Smart Watch</h5>
                            </div>
                            <div class="right">
                                <img src="/frontend/assets/image/home/Star 1.png" alt="" srcset="" />
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
                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/frontend/assets/image/home/pexels-jess-loiterton-4321085 (5).jpg"
                        alt="Card image cap" />
                    <div class="card-body">
                        <div class="first">
                            <div class="left">
                                <h5>Smart Watch</h5>
                            </div>
                            <div class="right">
                                <img src="/frontend/assets/image/home/Star 1.png" alt="" srcset="" />
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
                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/frontend/assets/image/home/pexels-jess-loiterton-4321085 (6).jpg"
                        alt="Card image cap" />
                    <div class="card-body">
                        <div class="first">
                            <div class="left">
                                <h5>Smart Watch</h5>
                            </div>
                            <div class="right">
                                <img src="/frontend/assets/image/home/Star 1.png" alt="" srcset="" />
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
                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="/frontend/assets/image/home/pexels-jess-loiterton-4321085 (7).jpg"
                        alt="Card image cap" />
                    <div class="card-body">
                        <div class="first">
                            <div class="left">
                                <h5>Smart Watch</h5>
                            </div>
                            <div class="right">
                                <img src="/frontend/assets/image/home/Star 1.png" alt="" srcset="" />
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
                                <img src="/frontend/assets/image/home/arrow.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

            <button class="view_all" id="next">View More</button>
        </section>
    @endif
    <section class="anyquery">

        <form action="{{ route('enquiryForm') }}" method="post">
            @csrf
            <div class="query">
                <div class="query_first col-8">
                    <h1 style="font-family: p4;">Have any query?</h1>
                    <p style="font-family: p5;">
                        Lowest price on internet.
                    </p>

                    <input type="email" name="email" required placeholder="Type your query" />
                    <button><span style="font-family: p4;">Send email</span></button>
                </div>
                <div class="query_second col-4">
                    {{-- <img src="/frontend/assets/image/home/young man in headphones sitting with laptop and waving.png"
                        alt="" /> --}}
                </div>
            </div>
        </form>
    </section>
    @include('section.home.footer')
@endsection
@push('style')
    <link rel="stylesheet" href="{{ asset('frontend/style/product/product.css') }}" />
@endpush
