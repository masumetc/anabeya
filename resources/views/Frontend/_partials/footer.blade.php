<!--======================= Start Footer Area ===================-->
      
      <!-- Start Footer widget Section-->
        
            <div class="row footer_backround">
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 footer_widget">
                 <center>
                     <h1>Customer Care</h1>
                  <ul class="list footer_list">
                      <li><a href="{{URL::to('/help')}}"class="text-light">Help Center</a></li>
                      <li><a href="{{route('track-order')}}"class="text-light">Track Your Order</a></li>
                      <li><a href="{{route('contuact-us')}}"class="text-light">Contact Us</a></li>
                  </ul>
                </center> 
              </div>
              <!--End widget one-->
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 footer_widget">
                 <center>
                      <h1 class="">Anabeya</h1>
                      <ul class="">
                          <li><a href="{{route('about-us')}}"class="text-light">About Anabeya</a></li>
                          <li><a href="{{URL::to('/terms-condition')}}"class="text-light">Terms & Conditions</a></li>
                          <li><a href="{{URL::to('/privacy-policy')}}"class="text-light">Privacy Policy</a></li>
                      </ul>
                </center> 
              </div>
              <!--End widget Two-->
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 footer_widget">
                 <center>
                  <h1>Anabeya's Deal</h1>
                  <ul class="list footer_list">
                      <li><a href="{{route('affiliate')}}"class="text-light">Become Affiliate</a></li>
                      <li><a href="{{route('seller-registration')}}"class="text-light">Sell On Anabeya</a></li>
                  </ul>
                </center> 
              </div>
              <!--End widget Three-->
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 footer_widget my-2">
                    <center>
                        <div class="row">
                           <?php 
                              $log= DB::table('settings')
                                    ->where('status',1)
                                    ->where('type','logo')
                                    ->get();
                           ?>
                            <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 col-12">
                              @foreach($log as $key=>$logImg)
                              @if($key == 0)
                                <a href="{{URL::to('/')}}"><img src="{{URL::to('public/images/logo_img/',$logImg->image)}}" alt="Anabeya" class="footer_logo"></a>
                              @endif
                              @endforeach  
                            </div>
                            <div class="col-lg-12 col-md-12 col-xl-12 col-sm-12 col-12">
                                <a href="https://webapp.diawi.com/install/2axp63"><img src="{{URL('public/frontend/assets/images/app_store.png')}}" class="QR rounded"/></a>
                                <a href="https://play.google.com/store/apps/details?id=com.an.anabeya&fbclid=IwAR0gnJZt_lYY2LkFljAMMO9n-z2YKFtLjS7F_3q6-PeZT3HBATsdxw-UHzM"><img src="{{URL('public/frontend/assets/images/play_store.png')}}" class="play_store rounded"/></a>
                            </div>
                        </div>
                    </center>
              </div>
              <!--End widget Four-->   
            </div>
         
        <footer>
          <div class="row footer">
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 footer_widget">
                    <center>
                        <h6>Payment Methods</h6>
                        <div class="payment_bar">
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/visa.png')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/mastercard.png')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/american-express.png')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/paypal.png')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/bitcoin.png')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/pay6.jpg')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/-wrPY64z_400x400.jpg')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/uttor.jpg')}}" class="payment_method_ico"/>    
                            </div>
                        </div>
                    </center>
                </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 footer_widget">
                    <center>
                        <h6>Courier</h6>
                        <div class="payment_bar">
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/courier_ico1.png')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/courier_ico2.jpg')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/c12.png')}}" class="payment_method_ico"/>    
                            </div>
                        </div>
                    </center>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 footer_widget">
                    <center>
                        <h6>Verify</h6>
                        <div class="payment_bar">
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/vrf1.jpg')}}" class="payment_method_ico"/>    
                            </div>
                            <div class="pay_icon">
                                <img src="{{URL('public/frontend/assets/images/vrf8.jpg')}}" class="payment_method_ico"/>    
                            </div>
                        </div>
                    </center>
              </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 footer_widget my-2">
                    <center><p class="text-dark">&copy; Anabeya 2020 ||
                    <a href="https://web.facebook.com/Anabeya-108958740646264/"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://twitter.com/anabeyacom/likes?fbclid=IwAR3nF1I0_Fu0UcGE5a28feyw0t6DyciuRdYnsk9s7LB91_n_yD7_AGBve3o"><i class="fab fa-twitter-square"></i></a>
                    <a href="https://www.youtube.com/channel/UC16igOZ00wxraf4vJjEZlwA?fbclid=IwAR1Bx4rqdIqeMN1HuOckQmDgRARG0KBhdcvbaaJbU9iQDI8sTMNYDGEnbtg"><i class="fab fa-youtube-square"></i></a>
                    <a href="https://www.instagram.com/anabeya2020/?fbclid=IwAR2jRv2XT9cNmFlfnZ-dLXBeKVAPMCDT_Bcwfsgmy2VTjbVvAnGS-sNyQag"><i class="fab fa-instagram"></i></a>
                    </p></center>
                </div>
          </div>
      </footer>
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      <script>
        jQuery(selector).bind(
                            "mouseenter mouseleave",
                            function (event) {
                                if (event.type === 'mouseenter')    { google_trans_tt.css('z-index', -1000); }
                                else                                { google_trans_tt.css('z-index',  1000); }
                            }
                        );
      </script>