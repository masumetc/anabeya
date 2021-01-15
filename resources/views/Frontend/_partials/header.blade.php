<style>
    .dropdown {
        position: relative;
        display: inline-block;
        z-index: 1000;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 128px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
        left:-40px;
    }

    .dropdown-content a p{
        font-size:15px !important;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }
    ul li {
        list-style: none;
    }
    div.ex1 {
        overflow-y: scroll;
    }
</style>

<script>
    //Google translate

    function googleTranslateElementInit() {

        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.FloatPosition.TOP_LEFT}, 'google_translate_element');

        // begin accessibility compliance
        $('img.goog-te-gadget-icon').attr('alt','Google Translate');
        $('div#goog-gt-tt div.logo img').attr('alt','translate');
        $('div#goog-gt-tt .original-text').css('text-align','left');
        $('.goog-te-gadget-simple .goog-te-menu-value span').css('color','#000000');
    }
    $(function() {
        $.getScript("//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit");
    });




</script>
<?php
$log= DB::table('settings')
    ->where('status',1)
    ->where('type','logo')
    ->get();

$categories = DB::table('categories')
    ->where('status','1')
    ->where('parent_id','0')
    ->where('sub_parent_id','0')
    ->get();
$categories_sub = DB::table('categories')
    ->where('status','1')
    ->where('parent_id','>','0')
    ->where('sub_parent_id','0')
    ->get();
$categories_sub_parent = DB::table('categories')
    ->where('status','1')
    ->where('parent_id','>','0')
    ->where('sub_parent_id','>','0')
    ->get();

?>
<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div class="row header_area">
        <div class="col-lg-2 col-xl-2 col-md-3 col-sm-3 col-3 logo">
            @foreach($log as $key=>$logImg)
                @if($key == 0)
                    <a href="{{url('/')}}">
                        <img src="{{URL::to('public/images/logo_img/',$logImg->image)}}" alt="Anabeya">
                    </a>
                @endif
            @endforeach
        </div>
        <div class="col-lg-6 col-xl-7 col-md-5 col-sm-9 col-9 search_box">
            <form action="{{route('product.search-product')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" aria-label="Text input with dropdown button" name="search_content">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><center><i class="fas fa-search"></i></center></button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4 col-xl-3 col-md-4 col-sm-12 col-12 top_icon">

            <div class="desk_nav_icon mob mob_topmenu_item">
                <a id="mob_menu"><center><i class="fas fa-bars"></i>
                    </center>
                    <p style="">Category</p></a>
                <a id="close"><center><i class="fas fa-close"></i>
                    </center>
                    <p style="">Category</p></a>
            </div>
            <div class="desk_nav_icon google_span mob_topmenu_item">
<center>
                <div class="dropdown">
                    <div class="cur_div"><i class="fa fa-money" aria-hidden="true"></i><i class="fa fa-sort-down cur_down" aria-hidden="true"></i></div>
                    <p></p>
                    <form action="{{route('frontend.currency')}}" method="post">
                        @csrf
                        <div class="dropdown-content currency_div">
                        <div id="flag">
                            @if(isset($country))
                            <p><img id="my_image" style="padding-right: 5px" src="{{url('public/images/flag icon/', $country->image)}}" alt="img"> {{$country->name}}</p>
                                @else
                                <p><img id="my_image" style="padding-right: 5px" src="{{url('public/images/flag icon/austria-flag-icon-16.png')}}" alt="img"> Austria</p>
                                @endif
                        </div>
                            <hr>
                       <div class="ex1">
                           <ul>
                               <li><p id="data1" data-url="{{url('flag')}}" data-id="1"><img style="padding-right: 5px" src="{{url('public/images/flag icon/austria-flag-icon-16.png')}}" alt="img"> Austria</p></li>
                               <li><p id="data2" data-url="{{url('flag')}}" data-id="2"><img style="padding-right: 5px" src="{{url('public/images/flag icon/belgium-flag-icon-16.png')}}" alt="img"> Belgium</p></li>
                               <li><p id="data3" data-url="{{url('flag')}}" data-id="3"><img style="padding-right: 5px" src="{{url('public/images/flag icon/bulgaria-flag-icon-16.png')}}" alt="img"> Bulgaria</p></li>
                               <li><p id="data4" data-url="{{url('flag')}}" data-id="4"><img style="padding-right: 5px" src="{{url('public/images/flag icon/croatia-flag-icon-16.png')}}" alt="img"> Croatia</p></li>
                               <li><p id="data5" data-url="{{url('flag')}}" data-id="5"><img style="padding-right: 5px" src="{{url('public/images/flag icon/cyprus-flag-icon-16.png')}}" alt="img"> Cyprus</p></li>
                               <li><p id="data6" data-url="{{url('flag')}}" data-id="6"><img style="padding-right: 5px" src="{{url('public/images/flag icon/czech-republic.png')}}" alt="img"> Czech republic</p></li>
                               <li><p id="data7" data-url="{{url('flag')}}" data-id="7"><img style="padding-right: 5px" src="{{url('public/images/flag icon/denmark-flag-icon-16.png')}}" alt="img"> Denmark</p></li>
                               <li><p id="data8" data-url="{{url('flag')}}" data-id="8"><img style="padding-right: 5px" src="{{url('public/images/flag icon/estonia-flag-icon-16.png')}}" alt="img"> Estonia</p></li>
                               <li><p id="data9" data-url="{{url('flag')}}" data-id="9"><img style="padding-right: 5px" src="{{url('public/images/flag icon/finland-flag-icon-16.png')}}" alt="img"> Finland</p></li>
                               <li><p id="data10" data-url="{{url('flag')}}" data-id="10"><img style="padding-right: 5px" src="{{url('public/images/flag icon/france-flag-icon-16.png')}}" alt="img"> France</p></li>

                                {{--  10 complete --}}
                               <li><p id="data11" data-url="{{url('flag')}}" data-id="11"><img style="padding-right: 5px" src="{{url('public/images/flag icon/germany-flag-icon-16.png')}}" alt="img"> Germany</p></li>
                               <li><p id="data12" data-url="{{url('flag')}}" data-id="12"><img style="padding-right: 5px" src="{{url('public/images/flag icon/greece-flag-icon-16.png')}}" alt="img"> Greece</p></li>
                               <li><p id="data13" data-url="{{url('flag')}}" data-id="13"><img style="padding-right: 5px" src="{{url('public/images/flag icon/hungary-flag-icon-16.png')}}" alt="img"> Hungary</p></li>
                               <li><p id="data14" data-url="{{url('flag')}}" data-id="14"><img style="padding-right: 5px" src="{{url('public/images/flag icon/ireland-flag-icon-16.png')}}" alt="img"> Ireland</p></li>
                               <li><p id="data15" data-url="{{url('flag')}}" data-id="15"><img style="padding-right: 5px" src="{{url('public/images/flag icon/italy-flag-icon-16.png')}}" alt="img"> Italy</p></li>
                               <li><p id="data16" data-url="{{url('flag')}}" data-id="16"><img style="padding-right: 5px" src="{{url('public/images/flag icon/latvia-flag-icon-16.png')}}" alt="img"> Latvia</p></li>
                               <li><p id="data17" data-url="{{url('flag')}}" data-id="17"><img style="padding-right: 5px" src="{{url('public/images/flag icon/lithuania-flag-icon-16.png')}}" alt="img"> Lithuania</p></li>
                               <li><p id="data18" data-url="{{url('flag')}}" data-id="18"><img style="padding-right: 5px" src="{{url('public/images/flag icon/luxembourg-flag-icon-16.png')}}" alt="img"> Luxembourg</p></li>
                               <li><p id="data19" data-url="{{url('flag')}}" data-id="19"><img style="padding-right: 5px" src="{{url('public/images/flag icon/malta-flag-icon-16.png')}}" alt="img"> Malta</p></li>
                               <li><p id="data20" data-url="{{url('flag')}}" data-id="20"><img style="padding-right: 5px" src="{{url('public/images/flag icon/netherlands-flag-icon-16.png')}}" alt="img"> Netherlands</p></li>

                               {{--  20 complete --}}
                               <li><p id="data21" data-url="{{url('flag')}}" data-id="21"><img style="padding-right: 5px" src="{{url('public/images/flag icon/poland-flag-icon-16.png')}}" alt="img"> Poland</p></li>
                               <li><p id="data22" data-url="{{url('flag')}}" data-id="22"><img style="padding-right: 5px" src="{{url('public/images/flag icon/portugal-flag-icon-16.png')}}" alt="img"> Portugal</p></li>
                               <li><p id="data23" data-url="{{url('flag')}}" data-id="23"><img style="padding-right: 5px" src="{{url('public/images/flag icon/romania-flag-icon-16.png')}}" alt="img"> Romania</p></li>
                               <li><p id="data24" data-url="{{url('flag')}}" data-id="24"><img style="padding-right: 5px" src="{{url('public/images/flag icon/slovenia-flag-icon-16.png')}}" alt="img"> Slovenia</p></li>
                               <li><p id="data25" data-url="{{url('flag')}}" data-id="25"><img style="padding-right: 5px" src="{{url('public/images/flag icon/spain-flag-icon-16.png')}}" alt="img"> Spain</p></li>
                               <li><p id="data26" data-url="{{url('flag')}}" data-id="26"><img style="padding-right: 5px" src="{{url('public/images/flag icon/sweden-flag-icon-16.png')}}" alt="img"> Sweden</p></li>
                               <li><p id="data27" data-url="{{url('flag')}}" data-id="27"><img style="padding-right: 5px" src="{{url('public/images/flag icon/united-kingdom-flag-icon-16.png')}}" alt="img"> United Kingdom</p></li>
                               <li><p id="data28" data-url="{{url('flag')}}" data-id="28"><img style="padding-right: 5px" src="{{url('public/images/flag icon/albania-flag-icon-32.png')}}" alt="img"> Albania</p></li>
                               <li><p id="data29" data-url="{{url('flag')}}" data-id="29"><img style="padding-right: 5px" src="{{url('public/images/flag icon/andorra-flag-icon-16.png')}}" alt="img"> Andorra</p></li>
                               <li><p id="data30" data-url="{{url('flag')}}" data-id="30"><img style="padding-right: 5px" src="{{url('public/images/flag icon/bosnia-and-herzegovina-flag-icon-16.png')}}" alt="img"> Bosnia</p></li>

                               {{--  30 complete --}}
                               <li><p id="data31" data-url="{{url('flag')}}" data-id="31"><img style="padding-right: 5px" src="{{url('public/images/flag icon/iceland-flag-icon-16.png')}}" alt="img"> Iceland</p></li>
                               <li><p id="data32" data-url="{{url('flag')}}" data-id="32"><img style="padding-right: 5px" src="{{url('public/images/flag icon/kosovo-flag-icon-16.png')}}" alt="img"> Kosovo</p></li>
                               <li><p id="data33" data-url="{{url('flag')}}" data-id="33"><img style="padding-right: 5px" src="{{url('public/images/flag icon/liechtenstein-flag-icon-16.png')}}" alt="img"> Liechtenstein</p></li>
                               <li><p id="data34" data-url="{{url('flag')}}" data-id="34"><img style="padding-right: 5px" src="{{url('public/images/flag icon/macedonia-flag-icon-16.png')}}" alt="img"> Macedonia</p></li>
                               <li><p id="data35" data-url="{{url('flag')}}" data-id="35"><img style="padding-right: 5px" src="{{url('public/images/flag icon/moldova-flag-icon-16.png')}}" alt="img"> Moldova</p></li>
                               <li><p id="data36" data-url="{{url('flag')}}" data-id="36"><img style="padding-right: 5px" src="{{url('public/images/flag icon/monaco-flag-icon-16.png')}}" alt="img"> Monaco</p></li>
                               <li><p id="data37" data-url="{{url('flag')}}" data-id="37"><img style="padding-right: 5px" src="{{url('public/images/flag icon/montenegro-flag-icon-16.png')}}" alt="img"> Montenegro</p></li>
                               <li><p id="data38" data-url="{{url('flag')}}" data-id="38"><img style="padding-right: 5px" src="{{url('public/images/flag icon/norway-flag-icon-16.png')}}" alt="img"> Norway</p></li>
                               <li><p id="data39" data-url="{{url('flag')}}" data-id="39"><img style="padding-right: 5px" src="{{url('public/images/flag icon/russia-flag-icon-16.png')}}" alt="img"> Russia</p></li>
                               <li><p id="data40" data-url="{{url('flag')}}" data-id="40"><img style="padding-right: 5px" src="{{url('public/images/flag icon/san-marino-flag-icon-32.png')}}" alt="img"> San Marino</p></li>

                               {{--  40 complete --}}
                               <li><p id="data41" data-url="{{url('flag')}}" data-id="41"><img style="padding-right: 5px" src="{{url('public/images/flag icon/serbia-flag-icon-16.png')}}" alt="img"> Serbia</p></li>
                               <li><p id="data42" data-url="{{url('flag')}}" data-id="42"><img style="padding-right: 5px" src="{{url('public/images/flag icon/slovakia-flag-icon-16.png')}}" alt="img"> Slovakia</p></li>
                               <li><p id="data43" data-url="{{url('flag')}}" data-id="43"><img style="padding-right: 5px" src="{{url('public/images/flag icon/switzerland-flag-icon-16.png')}}" alt="img"> Switzerland</p></li>
                               <li><p id="data44" data-url="{{url('flag')}}" data-id="44"><img style="padding-right: 5px" src="{{url('public/images/flag icon/turkey-flag-icon-16.png')}}" alt="img"> Turkey</p></li>
                               <li><p id="data45" data-url="{{url('flag')}}" data-id="45"><img style="padding-right: 5px" src="{{url('public/images/flag icon/ukraine-flag-icon-16.png')}}" alt="img"> Ukrain</p></li>
                               <li><p id="data46" data-url="{{url('flag')}}" data-id="46"><img style="padding-right: 5px" src="{{url('public/images/flag icon/vatican-city-flag-icon-16.png')}}" alt="img"> Vatican City</p></li>

                           </ul>
                       </div>
                        <br>

                        <!--<p>Language</p>-->
                        <div id="google_translate_element"></div>


                            <select name="id">
                                @foreach($currencys as $currency)
                                    <option value="{{$currency->id}}">{{$currency->currency_name}} ({{$currency->symbol}})</option>
                                @endforeach
                            </select>
                            <br>
                            <button style="margin-top:8px" class="btn btn-success" type="submit">save</button>

                    </div>
                    </form>
                </div>
                </center>

            </div>
            <!--<div class="desk_nav_icon google_span">-->
            <!--  <p>Language</p>-->
            <!--</div>-->
            <style>
                #goog-gt-tt {display:none !important;}
                .goog-te-banner-frame {display:none !important;}
                .goog-te-menu-value:hover {text-decoration:none !important;}
                .goog-text-highlight {background-color:transparent !important;box-shadow:none !important;}
                body {top:0 !important;}
                #google_translate_element2 {display:none!important;}
            </style>
            @guest
            
                <div class="desk_nav_icon mob_topmenu_item">
                    <a href="{{ route('login') }}"><center><i class="fas fa-sign-in-alt"></i>
                        </center>
                        <p style="">{{ __('Login') }}</p></a>
                </div>
            @else
            

                <div class="desk_nav_icon mob_topmenu_item">
                    <div class="dropdown">
                        <center><i class="fas fa-user" aria-hidden="true"></i></center>
                        <a href="#"><p>{{ Auth::user()->name }}</p></a>
                        <div class="dropdown-content">
                            <a href="{{route('home')}}"><p>My Order</p></a>
                            @if(Auth::user()->role == 'seller' || Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'|| Auth::user()->role == 'curier')
                            <a href="{{URL::to('/dashboard')}}"><p>Dashboard</p></a>
                            @endif
                            <a href="{{route('logout')}}"><p>Log Out</p></a>
                        </div>
                    </div>
                </div>
            @endguest
            <div class="mob_nav_bottom">
                <div class="desk_nav_icon mob_botmenu_item">
                    <a href="{{URL::to('/')}}"><center><i class="fas fa-home"></i></center>
                        <p>Home</p></a>
                </div>
            @guest
                <div class="desk_nav_icon mob_botmenu_item">
                    <a href="#"><center><i class="fas fa-cart-plus"></i>
                            <span class="">{{Cart::getTotalQuantity()}}</span></center>
                        <p>Cart</p></a>
                </div>
                
                
                <div class="desk_nav_icon mob_botmenu_item">
                    <a href="{{route('wish.index')}}"><center><i class="far fa-heart"></i>
                            <span class="">0</span></center>
                        <p>Wish</p></a>
                </div>
            @else

                <div class="desk_nav_icon mob_botmenu_item">
                    <a href="{{route('product.view-cart')}}"><center><i class="fas fa-cart-plus"></i>
                            <span class="">{{Cart::getTotalQuantity()}}</span></center>
                        <p>Cart</p></a>
                </div>
                
                  <div class="desk_nav_icon mob_botmenu_item">
                    <a href="{{route('wish.index')}}"><center><i class="far fa-heart"></i>
                            <span class="">{{$wish->count()}}</span></center>
                        <p>Wish</p></a>
                </div>
                <!--<div class="desk_nav_icon">-->
            <!-- <center><a href="{{route('home')}}"><i class="fas fa-shopping-bag"></i>-->
                <!-- <span class="">3</span></center>-->
                <!-- <p>Order</p></a>-->
                <!--</div>-->

                <!--<div class="desk_nav_icon">-->
            <!-- <center><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>-->
            <!-- <p>{{ __('Logout') }}</p></a>-->

            <!--     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">-->
                <!--         @csrf-->
                <!--     </form>-->
                <!--</div>-->
            @endguest

            </div>

        </div>

        <div class="mob mob_nav col-12">
            <nav class="border">
                <ul>
                    @foreach($categories as $c)
                        <li class=""><a href="{{route('product.category-wise-product',$c->category_id)}}">{{$c->name}}</a><i class="fa fa-sort-down" id="more_nav"></i>
                            @if(count($categories_sub) > 0)
                                <ul class="animated faster fadeInRight">
                                    @foreach($categories_sub as $sub)
                                        @if($sub->parent_id == $c->category_id)
                                            <li><a href="{{route('product.category-wise-product',$sub->category_id)}}">{{$sub->name}}</a></i>
                                                @if(count($categories_sub_parent) > 0)
                                                    <ul class="animated faster fadeInRight">
                                                        @foreach($categories_sub_parent as $sub_parent)
                                                            @if($sub_parent->sub_parent_id == $sub->category_id)
                                                                <li><a href="{{route('product.category-wise-product',$sub_parent->category_id)}}">{{$sub_parent->name}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>

    </div>
</header>
<!-- ===End Header Section===-->

<!--======================= Header Area End ===================-->