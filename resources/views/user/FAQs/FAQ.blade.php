{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/assets/FAQ/faq.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body> --}}

@extends('section.layout.home')
@section('home')
    @include('section.home.navbar')

    <div class="main-faq">
        <section class="section-1-faq">
            <div class="container">
                <div class="row faq-content">


                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 aboutUs-content-image">
                        <div class="pt-5 d-flex justify-content-center">
                            <button class="faq-content-btn2">FAQs</button>
                        </div>
                        <div class="pt-5 d-flex justify-content-center pb-5">
                            <h2 class="text-white" style="font-size:3em;  font-family: p5;">Questions people ask frequently
                            </h2>
                        </div>
                        <section>
                            <div class="accordion accordion-faq" id="accordionExample">
                                @foreach (App\Models\Faqs::all() as $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse">
                                            <b style="font-size:1.5em; font-family: p5">{!!$item->question!!}</b>
                                        </button>
                                    </h2>
                                    <div id="collapse{{$item->id}}" class="accordion-collapse collapse "
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body ">
                                            <p style="font-family: p5;">{!!$item->reply!!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center">


                            <button class="view_all" style="font-family: p4;" id="next">View More</button>
                        </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="anyquery">

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
          </section> --}}
    </div>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
    @include('section.home.footer')
@endsection
