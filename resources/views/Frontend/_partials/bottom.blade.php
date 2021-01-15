<!-- Will include JS files when needed only -->
    @yield('extra_js')
<!-- Will include JS files when needed only -->
<!--===Strt Script===-->
    <script src="{{URL::to('public/frontend/assets/js/jquery-3.2.1.slim.min.js')}}"></script>
    
    <script type="text/javascript" src="{{URL::to('public/frontend/assets/js/custom.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('public/frontend/assets/js/jquery.smartWizard.js')}}"></script>
    <!--Font Awsome-->
    <script src="https://kit.fontawesome.com/3e98060fc8.js" crossorigin="anonymous"></script>
    <!--Jssor-->
    <script type="text/javascript" src="{{URL::to('public/frontend/assets/js/jssor.slider-28.0.0.min.js')}}"></script>
    <!--fancybox-->
    <script type="text/javascript" src="{{URL::to('public/frontend/assets/plugin/fancy/jquery.fancybox.min.js')}}"></script>
    <!--Veno-->
    <script type="text/javascript" src="{{URL::to('public/frontend/assets/plugin/veno/venobox.min.js')}}"></script>
    <!--owl-->
    <script type="text/javascript" src="{{URL::to('public/frontend/assets/plugin/owl/owl.carousel.min.js')}}"></script>
    <!--Popper-->
    <script src="{{URL::to('public/frontend/assets/js/popper.min.js')}}"></script>
    <!--bootstrap-->
    <script src="{{URL::to('public/frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="{{URL::to('public/js/script.js')}}"></script>
    <!--Data Table JS-->
{{Html::script('public/assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}
{{Html::script('public/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}} 



      <script>
            jQuery(document).ready(function ($) {
                var options = {
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$,
                        $ChanceToShow: 2
                    }
                };
                var jssor_slider1 = new $JssorSlider$('slider1_container', options);
            });
            
            //Order Product
            $(document).ready(function () {
            $('#dtBasicExample').DataTable({
                responsive: true
            });
            $('.dataTables_length').addClass('bs-select');
            });


        </script>
        @include('sweetalert::alert')
  </body>
</html>