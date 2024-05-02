@extends('index')
@section('title', 'All-Category')
@section('content')
<style>
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

.input-group button:hover{background-color:#ffc107 !important;}

.input-group button:focus{outline: 0px !important;border:0px solid !important;}

</style>

   <!-- <div class="hero-wrap hero-bread" style="background-image: url({{ asset('public/front/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span>
                        <span>Products</span>
                    </p>
                    <h1 class="mb-0 bread">Products</h1>
                </div>
            </div>
        </div>
    </div>
-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ url('/add-rating') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $product->name }}</h5>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="rate">
                            @if ($user_rating)
                            @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                <input type="radio" id="star{{ $i }}" name="rate" checked
                                    value="{{ $i }}" />
                                <label for="star{{ $i }}" title="text"></label>
                            @endfor
                            @for ($j = $user_rating->stars_rated +1 ; $j <= 5; $j++)
                            <input type="radio" id="star{{$j}}" name="rate"  value="{{$j}}" />
                            <label for="star{{$j}}" title="text"></label>
                            @endfor
                        @else
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        @endif
                        </div>
    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row product_data">
                <div class="col-lg-6 mb-5 ftco-animate fadeInUp ftco-animated">
                    <a href="#" class="image-popup"><img
                            src="{{ asset('admin_asset/uploads/product/' . $product->image) }}" class="img-fluid"
                            alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate fadeInUp ftco-animated">
                    <h3> {{ $product->name }}</h3>
                    <div class="rating d-flex">
                        <!--@php $ratenum = number_format($rating_value) @endphp-->
                       
                        <!--<p class="text-left mr-4">-->
                        <!--    @for ($i = 1; $i <= $ratenum; $i++)-->
                        <!--    <a href="#"><span class="ion-ios-star-outline checked"></span></a>-->
                        <!--    @endfor-->
                            
                        <!--</p>-->
                        
                        <!--<p class="text-left mr-4">-->
                        <!--    <a href="#" class="mr-2" style="color: #000;">-->
                        <!--        @if ($rating->count() > 0)-->
                        <!--            {{ $rating->count() }}  <span style="color: #bbb;">Rating</span>-->
                        <!--        @else-->
                        <!--            No Ratings-->
                        <!--        @endif-->
                                
                        <!--     </a>-->
                        <!--</p>-->
                        
                        
                        
                    </div>

                    <p class="text-left">
                        <strong class="mr-2" style="color: #000;"> Rs.{{ $product->selling_price }} <span
                                style="color: #bbb;">/{{ $product->unit }}</span></strong>
                    </p>
                    <p>{{ $product->description }} </p>
                    @if ($product->qty > 0)
                        <label for="" class="btn btn-success py-2 px-3" style="border-radius:0px;">In Stock</label>
                    @else
                        <label for="" class="btn btn-danger py-2 px-3"  style="border-radius:0px;">Out of stock</label>
                    @endif
                    <div class="row mt-4">


                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                             <input type="hidden" value="{{ $product['cate_id']}}" class="cate_id">
                            <span class="input-group-btn mr-2">
                                <button type="button" class="quantity-left-minus btn decrement-btn" data-type="minus"
                                    data-field="">
                                    <i class="ion-ios-remove"></i>
                                </button>
                            </span>
                            <input type="text" name="quantity" value="1" class="form-control input-number qty-input" 
                                value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn increment-btn" data-type="plus"
                                    data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><a href="#" class="btn btn-black py-3 px-5 addTocart"  style="border-radius:0px;">Add to Cart</a></p>
                        </div>
                        <div class="col-md-6">
                            <p><a href="#" class="btn btn-warning py-3 px-5 addtoWishlist"  style="border-radius:0px;">Add to wishlist</a></p>
                        </div>
                        
                       
                    </div>

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
                        Rate This Product
                    </button>
                    <a href="{{ url('add-review/' . $product->id) }}" class="btn btn-primary" style="border-radius:0px;">Write a Review</a>
                   
                </div>
                <div class="col-md-8">
                    @foreach ($review as $item)
                        
                    <div class="user-review">
                        <label for="">{{$item->user->name.' '.$item->user->lname}}</label>
                        @if($item->user_id == Auth::id())
                          <a href="{{url('edit-review/'.$product->id)}}">Edit</a>
                        @endif
                        <br>
                        @php

                         $rating = App\Models\Rating::where('prod_id',$product->id)->where('user_id',$item->user_id)->first();

                        @endphp
                        @if($rating)
                        <!--@php $user_rated = $rating->stars_rated @endphp-->
                        <!-- <div class="rating d-flex">-->
                        <!--    <p class="text-left mr-4">-->
                        <!--        @for ($i = 1; $i <= $user_rated; $i++)-->
                        <!--        <a href="#"><span class="ion-ios-star-outline checked"></span></a>-->
                        <!--        @endfor-->
                        <!--        @for ($j = $user_rated + 1; $j <= 5; $j++)-->
                        <!--        <i class="fa fa-star "></i>-->
                        <!--    @endfor-->
                        <!--    </p>-->
                        <!--  </div>-->
                        <div class="rate">
                            @if ($user_rating)
                            @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                <input type="radio" id="star{{ $i }}" name="rate" checked
                                    value="{{ $i }}" />
                                <label for="star{{ $i }}" title="text"></label>
                            @endfor
                            @for ($j = $user_rating->stars_rated +1 ; $j <= 5; $j++)
                            <input type="radio" id="star{{$j}}" name="rate"  value="{{$j}}" />
                            <label for="star{{$j}}" title="text"></label>
                            @endfor
                        @else
                            <input type="radio" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" id="star2" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        @endif
                        </div>
                        @endif
                        <small>Review on {{$item->created_at->format('d M Y')}}</small>
                        <p>
                             {{$item->user_review}}
                        </p>
                    </div>
                    
                   
                    
                    @endforeach
                    
                   
                </div>
            </div>

        </div>
    </section>


    <section class="ftco-section mt-0">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Products</span>
                    <h2 class="mb-4">Similar Products</h2>
                    <!--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>-->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($similarProduct as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate product_data">
                        <div class="product">
                            <a href="{{url('Product-detail/'.$product['id'])}}" class="img-prod"><img
                                    src="{{ asset('admin_asset/uploads/product/' . $product['image']) }}"
                                    class="img-fluid" alt="Colorlib Template">
                                <!--<span class="status">30%</span>-->
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{url('Product-detail/'.$product['id'])}}">{{ $product['name'] }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span
                                                class="mr-2 price-dc">Rs.{{ $product['original_price'] }}</span><span
                                                class="price-sale">Rs.{{ $product['selling_price'] }}</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">

                                        <a href="{{ url('Product-detail/' . $product['id']) }}"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <input type="hidden" name="quantity" value="1"
                                            class="form-control input-number qty-input" value="1">
                                        <input type="hidden" value="{{ $product['id'] }}" class="prod_id">
                                        <input type="hidden" value="{{ $product['cate_id']}}" class="cate_id">
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

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Products</span>
                    <h2 class="mb-4">Recent View Products</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($similarViewProduct as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{ url('Product-detail/' . $product['id']) }}" class="img-prod"><img
                                    src="{{ asset('admin_asset/uploads/product/' . $product['image']) }}"
                                    class="img-fluid" alt="Colorlib Template">
                                <!--<span class="status">30%</span>-->
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ url('Product-detail/' . $product['id']) }}">{{ $product['name'] }}</a>
                                </h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span
                                                class="mr-2 price-dc">Rs.{{ $product['original_price'] }}</span><span
                                                class="price-sale">Rs.{{ $product['selling_price'] }}</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="{{ url('Product-detail/' . $product['id']) }}"
                                            class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="{{ url('Product-detail/' . $product['id']) }}"
                                            class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="{{ url('Product-detail/' . $product['id']) }}"
                                            class="heart d-flex justify-content-center align-items-center ">
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
@endsection
@section('script')


@endsection
