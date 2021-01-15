<!-- Start Banner Section-->
        <section class="desk">
            <div class="row banner_area">
                <div style="max-height:500px" class="col-lg-3 col-xl-3 col-md-3 left_banner">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- displayads1responsive -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-5478758078427351"
                         data-ad-slot="1296141660"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                    <!--@foreach($bannerTopleft as $task)-->
                    <!--<a href="#"><img src="{{URL::to('public/images/banner_img/'.$task->image)}}"></a>-->
                    <!--@endforeach-->
                    @foreach($bannerBottomleft as $task)
                    <a href="#"><img src="{{URL::to('public/images/banner_img/'.$task->image)}}"></a>
                    @endforeach
                </div>
                <div class="col-lg-6 col-xl-6 col-md-6 center_banner">
                    @foreach($bannerCenter as $task)
                    <a href="#"><img src="{{URL::to('public/images/banner_img/'.$task->image)}}"></a>
                    @endforeach
                </div>
                <div style="max-height:500px"  class="col-lg-3 col-xl-3 col-md-3 right_banner">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- displayads1responsive -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-5478758078427351"
                             data-ad-slot="1296141660"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                        <script>
                             (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    <!--@foreach($bannerTopright as $task)-->
                    <!--<a href="#"><img src="{{URL::to('public/images/banner_img/'.$task->image)}}"></a>-->
                    <!--@endforeach-->
                    @foreach($bannerBottomright as $task)
                    <a href="#"><img src="{{URL::to('public/images/banner_img/'.$task->image)}}"></a>
                    @endforeach
                </div>
            </div>
        </section>
        <!--=== End Bsnner Section===-->