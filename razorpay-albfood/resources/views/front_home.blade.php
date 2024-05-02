@extends('index')
@section('title', 'AlbFood')
@section('content')


    <style>
@media only screen and (max-width: 377px) {
 #ftco-section {
   margin-left:-1.2rem;
  }
}

    </style>

    <div id="slider">
        <div class="slides">
            <img src="https://m.media-amazon.com/images/S/aplus-media-library-service-media/381b2deb-502a-42e0-9bf2-5c0eb171b015.__CR0,0,970,600_PT0_SX970_V1___.png"
                width="100%" />
        </div>

        <div class="slides">
            <img src="https://i.ibb.co/K9DWw8Y/bgsev.jpg" width="100%" />
        </div>

        <div class="slides">
            <img src="https://i.ibb.co/nrtm0K4/gfgf.jpg" width="100%" />
        </div>

        <div class="slides">
            <img src="https://i.ibb.co/K9DWw8Y/bgsev.jpg" width="100%" />
        </div>
        

        <div class="slides">
            <img src="https://i.ibb.co/nrtm0K4/gfgf.jpg" width="100%" />
        </div>

        <div id="dot">
            <span class="dot"></span><span class="dot"></span><span class="dot"></span><span
                class="dot"></span><span class="dot"></span></div>
    </div>



    <!-- <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <div class="slider-item" style="background-image: url({{ asset('public/front/images/bg_1.jpg') }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                        <div class="col-md-12 ftco-animate text-center">
                            <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                            <p><a href="#" class="btn btn-primary">View Details</a></p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="slider-item" style="background-image: url({{ asset('public/front/images/bg_2.jpg') }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row slider-text justify-content-center align-items-center"  data-scrollax-parent="true">
                        <div class="col-sm-12 ftco-animate text-center">
                            <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
                            <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                            <p><a href="#" class="btn btn-primary">View Details</a></p>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" >
        <div class="container" >
            <div class="row no-gutters ftco-services">
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-shipped"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Free Shipping</h3>
                            <span>On order over Rs.500</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-diet"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Always Fresh</h3>
                            <span>Product well package</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-award"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Superior Quality</h3>
                            <span>Quality Products</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services mb-md-0 mb-4">
                        <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                            <span class="flaticon-customer-service"></span>
                        </div>
                        <div class="media-body">
                            <h3 class="heading">Support</h3>
                            <span>24/7 Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    --><br><br>
    <section class="ftco-section ftco-category ftco-no-pt" id="ftco-section">

        <div class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">

            <h2 class="mb-4"><span id="head1" style=" color:#008DE2;">Our Main</span>  <span
                    id="head2">Product</span></h2>
            <!--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>-->
        </div>
        <div class="container" id="container">


            <div id="item">
                <div class="offers">
                    <img src="{{ asset('public/front/newimage/3.png') }}" alt="bike">
                    <!--<p>Product Name</p>-->
                    <!--<span>Offer: 30%</span>-->
                </div>
                <br>
            </div>
            
                        <div id="item">
                <div class="offers">
                    <img src="https://m.media-amazon.com/images/S/aplus-media-library-service-media/381b2deb-502a-42e0-9bf2-5c0eb171b015.__CR0,0,970,600_PT0_SX970_V1___.png"
                        alt="bike">
                    <!--<p>Mixture Namkeen</p>-->
                    <!--<span>Offer: 30%</span>-->
                </div>
                <br>
            </div>
            
            <div id="item">
                <div class="offers">
                    <img src="{{ asset('public/front/newimage/4.png') }}" alt="bike">
                    <!--<p>Product Name</p>-->
                    <!--<span>Offer: 30%</span>-->
                </div>
                <br>
            </div>



            <!--<div id="item">-->
            <!--    <div class="offers">-->
            <!--        <img src="https://marketech-apac.com/wp-content/uploads/2022/08/Haldirams.jpg" alt="bike">-->
            <!--        <p>Product Name</p>-->
            <!--        <span>Offer: 30%</span>-->
            <!--    </div>-->
            <!--    <br>-->
            <!--</div>-->

            <!--<div id="item">-->
            <!--    <div class="offers">-->
            <!--        <img src="https://i.ytimg.com/vi/PGQS5azFmj8/maxresdefault.jpg" alt="bike">-->
            <!--        <p>Product Name</p>-->
            <!--        <span>Offer: 30%</span>-->
            <!--    </div>-->
            <!--    <br>-->
            <!--</div>-->

            <!--<div id="item">-->
            <!--    <div class="offers">-->
            <!--        <img src="https://i.ytimg.com/vi/I7bc5SKk3lA/maxresdefault.jpg" alt="bike">-->
            <!--        <p>Product Name</p>-->
            <!--        <span>Offer: 30%</span>-->
            <!--    </div>-->
            <!--    <br>-->
            <!--</div>-->
        </div>
    </section>
    <section class="ftco-section" style="margin-top:-3em;">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">

                    <h2 class="mb-4"><span id="head1" style=" color:#008DE2;">Our</span> & <span
                            id="head2">Combo Products</span></h2>
                    <!--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>-->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                @foreach ($comboproduct as $item)
                    <div class="col-md-6 col-lg-3 ftco-animate product_data">
                        <div class="product">
                            <a href="{{ url('Product-detail/' . $item['id']) }}" class="img-prod"><img class="img-fluid"
                                    src="{{ asset('admin_asset/uploads/product/' . $item->image) }}"
                                    style="width:100%;height:260px;" alt="Colorlib Template">
                                <!--<span class="status">30%</span>-->
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ url('Product-detail/' . $item['id']) }}">{{ $item->name}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing"><span>Price</span>
                                        <p class="price">
                                            <span class="mr-2 price-dc">Rs.{{ $item->original_price }}</span><span
                                                class="price-sale">Rs.{{ $item->selling_price }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">

                                        <a href="{{ url('Product-detail/' . $item['id']) }}"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <input type="hidden" name="quantity" value="1"
                                            class="form-control input-number qty-input" value="1">
                                        <input type="hidden" value="{{ $item->id }}" class="prod_id">
                                        <input type="hidden" value="{{ $item->cate_id}}" class="cate_id">
                                        <a href="#"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1 addTocart">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#"
                                            class="heart d-flex justify-content-center align-items-center addtoWishlist">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="ftco-section" style="margin-top:-3em;">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">

                    <h2 class="mb-4"><span id="head1" style=" color:#008DE2;">Our</span> & <span
                            id="head2">Products</span></h2>
                    <!--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>-->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                @foreach ($all_product as $item)
                    <div class="col-md-6 col-lg-3 ftco-animate product_data">
                        <div class="product">
                            <a href="{{ url('Product-detail/' . $item['id']) }}" class="img-prod"><img class="img-fluid"
                                    src="{{ asset('admin_asset/uploads/product/' . $item->image) }}"
                                    style="width:100%;height:260px;" alt="Colorlib Template">
                                <!--<span class="status">30%</span>-->
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ url('Product-detail/' . $item['id']) }}">{{ $item->name}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing"><span>Price</span>
                                        <p class="price">
                                            <span class="mr-2 price-dc">Rs.{{ $item->original_price }}</span><span
                                                class="price-sale">Rs.{{ $item->selling_price }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">

                                        <a href="{{ url('Product-detail/' . $item['id']) }}"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <input type="hidden" name="quantity" value="1"
                                            class="form-control input-number qty-input" value="1">
                                        <input type="hidden" value="{{ $item->id }}" class="prod_id">
                                        <input type="hidden" value="{{ $item->cate_id}}" class="cate_id">
                                        <a href="#"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1 addTocart">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#"
                                            class="heart d-flex justify-content-center align-items-center addtoWishlist">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!--<section class="ftco-section img" style="border:2px solid black;background-image: url('https://i.ibb.co/8KH5TCp/Whats-App-Image-2023-06-26-at-14-43-01.jpg');">-->

    <!--    <div class="container">-->

    <!--        <div class="row justify-content-end">-->
    <!--            <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">-->
    <!--                <h2 class="mb-4 text-warning">Deal of the day</h2><br>-->
    <!--                <p class="text-dark">Far far away, behind the word mountains, far from the countries Vokalia and-->
    <!--                    Consonantia</p>-->
    <!--                <h3 style="color:white;"><a href="#" style=" font-weight:bold;" class="text-warning">Spinach</a></h3>-->
    <!--                <span class="price text-warning" >$10 <a href="#"-->
    <!--                        style="color:black; font-weight:bold;">now $5 only</a></span>-->
    <!--                <div id="timer" class="d-flex mt-5 text-light">-->
    <!--                    <div class="time text-warning" id="days" ></div>-->
    <!--                    <div class="time text-warning pl-3" id="hours" ></div>-->
    <!--                    <div class="time text-warning pl-3" id="minutes"   font-weight:bold;"></div>-->
    <!--                    <div class="time text-warning pl-3" id="seconds" ></div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->

@endsection
@section('script')

@endsection
