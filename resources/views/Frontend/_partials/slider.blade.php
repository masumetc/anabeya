
      <section>
          <div class="row slider_area">
              <div class="col-lg-3 col-xl-3 col-md-4 col-sm-4 desk category_field">
                  <nav class="border">
                      <ul>
                          <li><a href="{{URL::to('/home')}}">Home</a></li>
                        @foreach($categories as $c)
                          <li><a href="{{route('product.category-wise-product',$c->category_id)}}">{{$c->name}}<i class="fa fa-chevron-right"></i></a>
                                @if(count($categories_sub) > 0)
                                <ul class="animated faster fadeInRight">
                                     @foreach($categories_sub as $sub)
                                     @if($sub->parent_id == $c->category_id)
                                    <li><a href="{{route('product.category-wise-product',$sub->category_id)}}">{{$sub->name}}<i class="fa fa-chevron-right"></i></a>
                                        @if(count($categories_sub_parent) > 0)
                                        <ul class="animated faster fadeInRight">
                                            @foreach($categories_sub_parent as $sub_parent)
                                            @if($sub_parent->sub_parent_id == $sub->category_id)
                                                <li><a href="{{route('product.category-wise-product',$sub_parent->category_id)}}">{{$sub_parent->name}}<i class="fa fa-"></i></a></li>
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
              <div class="col-lg-9 col-xl-9 col-md-12 col-sm-12 carousel">
                  <div class="row">
                      <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 slider_area">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    
                                  </ol>
                                  <div class="carousel-inner">
                                    <?php $i=0; ?>
                                    @foreach($slider as $s)
                                    <div class="carousel-item  @if($i==0){{'active'}}@endif">
                                      <img class="d-block w-100" src="{{URL::to('public/images/slider_img/'.$s->image)}}" alt="First slide">
                                    </div>
                                    <?php $i+=1;?>
                                    @endforeach
                                    
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
      </section>
      <!--=== End Carousel Section===