

<section class="footer">
    <div class="footer_fir_sec">
      <div class="col-5">
        <img class="logo" src="{{ asset('storage/settings/' . BobFinder::bob()->value('logo_white') ) }}" width="250" alt="" srcset="" />
        <p class="p_first" style="font-family: p5;">
          Lowest price on internet.
        </p>
        <p class="p_email" style="font-family: p2;">email: <b>{{BobFinder::bob()->value('email')}}</b></p>
        <p class="p_phone" style="font-family: p2;">phone: <b>{{BobFinder::bob()->value('mobile')}}</b></p>
      </div>
      <div class="col-7 footer_menus">
        <div class="col-4">
          <a href=""><h3 style="font-family: p5;">About us</h3></a>
          <li style="font-family: p5;">Features</li>
         <a href="{{route('faqs')}}"> <li style="font-family: p5;">FAQ’s</li></a>
          <li style="font-family: p5;">News</li>
          <li style="font-family: p5;">Pricing</li>
        </div>
        <div class="col-4">
          <h3 style="font-family: p5;">Company</h3>
          <li style="font-family: p5;">Core values</li>
          <li style="font-family: p5;">Partner w/ us</li>
          <li style="font-family: p5;">Blog</li>
          <li style="font-family: p5;">Contact</li>
        </div>
        {{-- <div class="col-4">
          <h3 style="font-family: p5;">Support</h3>
          <li style="font-family: p5;">Support centes</li>
          <li style="font-family: p5;">Feedback</li>
          <li style="font-family: p5;">Accessibility</li>
        </div> --}}
        <div class="col-4">
            <h3 style="font-family: p5;">Policy</h3>
           <a href="{{route('refund_policy')}}"> <li style="font-family: p5;">Refund Policy</li></a>
            <a href="{{route('privacy_policy')}}"><li style="font-family: p5;">Privacy Policy</li></a>
            {{-- <li style="font-family: p5;">Accessibility</li> --}}
          </div>
      </div>
    </div>


  </section>
  <section>
    
    {{-- <div class="footer_sec_sec"> --}}
  <div class="row m-0" style="background-color: #1D1D1D">
    <div class="col-md-5 col-lg-5 col-xl-5 col-12 d-flex foot1">
  
      <a href=""><img height="40px;" src="frontend/assets/image/social_logo/facebook.png" alt=""></a>
      <a href=""><img height="40px;" src="frontend/assets/image/social_logo/instagram.png" alt=""></a>
      <a href=""><img height="40px;" src="frontend/assets/image/social_logo/twitter.png" alt=""></a>
      <a href=""><img height="40px;" src="frontend/assets/image/social_logo/whtapp.png" alt=""></a>
      <a href=""><img height="40px;" src="frontend/assets/image/social_logo/youtube.png" alt=""></a>


</div>
<div class="col-md-7 col-12 pl-5 pr-5">
  <img width="350vw" src="/frontend/assets/image/home/Image 11 1.png" alt="" />
</div>
  </div>
    {{-- </div> --}}
    </section>
  <section class="copyright">
    <p style="font-family: p5;">© Torc Infotech 2023</p>
  </section>
