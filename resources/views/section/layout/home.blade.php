<?php
$setting = \App\Models\Setting::first();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css"
    />

    <link
      rel="stylesheet"
      href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('frontend/style/home/home.css')}}" />
    <link rel="stylesheet" href="{{asset('/assets/FAQ/faq.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/about_Us/aboutUs.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/font/font.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('style')
    <title>Home</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}}
  </head>
  <link rel="stylesheet" href="{{asset('assets/css/font.css')}}">
  <body>

@yield('home')
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"
  ></script>
  <script src="/node_modules/jquery/dist/jquery.js"></script>

  <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>

  <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
  <script>
    var owl = $(".owl-blog");
    owl.owlCarousel({
      margin: 10,
      items: 3,
      loop: true,
      autoplay:true,
      autoplayTimeout: 5000,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 3,
        },
      },
    });
  </script>
<script>
    var owl = $(".owl-testi");
    owl.owlCarousel({
      margin: 10,
      items: 3,
      loop: true,
      autoplay:true,
      autoplayTimeout: 5000,
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 1,
        },
        1000: {
          items: 3,
        },
      },
    });

  </script>
          <script>
            $(document).ready(function(){

var list = $(".product-card_first .list_products");
var numToShow = 4;
var button = $("#next");
var numInList = list.length;
list.hide();
if (numInList > numToShow) {
  button.show();
}
list.slice(0, numToShow).show();

button.click(function(){
    var showing = list.filter(':visible').length;
    list.slice(showing - 1, showing + numToShow).fadeIn();
    var nowShowing = list.filter(':visible').length;
    if (nowShowing >= numInList) {
      button.hide();
    }
});

});
        </script>

    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
                @session()->forget('info');
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.carousel-gallery').carousel();
    });
</script>

</body>
</html>
