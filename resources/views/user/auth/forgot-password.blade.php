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
    <link rel="stylesheet" href="{{asset('frontend/style/login/login.css')}}" />
    <title>Login</title>
  </head>
  <body>
    <div class="signin">
      <div class="first_form col-6">
        <div class="sign_form">
          <h1>Forgot Password</h1>
          <p class="enter_deta">Please enter your email address</p>

          <div class="or"></div>
          @if ($status=Session()->get('status'))
          <p style="text-align: center; color:red">{{ $status }}</p>
          @endif
          <form action="" method="POST">
            @csrf
            <input class="input"  name="email" autocomplete="new-password" type="text" placeholder="E-mail" />
            @if ($errors->has('email'))
            <span class="help-block">
                <p style="color: red; font-size: .8rem; display: flex;">{{ $errors->first('email') }}</p>
            </span>
        @endif


          <div class="remember_me">
            {{-- <div class="first">
              <input type="checkbox" />
              <p>Remember Me</p>
            </div>
            <div class="second">
              <p>Forget Password</p>
            </div> --}}
          </div>
          <button class="login_btn">Submit</button>
        </form>
          <div class="d-flex justify-content-center">
            <p class="opacity_0"></p>Remember credentials?<a href="{{route('userLogin')}}"><span class="rose">Sign In </span></a>
          </div>

        </div>

        <div class="logo">
          <img src="./frontend/assets/image/login/Vector.png" alt="">
        </div>
        <br>
        <br>
        <br>


      </div>

      <div class="first_img col-6">
        <!-- <img
          src="./image/signin/appolinary-kalashnikova-WYGhTLym344-unsplash 1.png"
          alt=""
          srcset=""
        /> -->
      </div>

    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
