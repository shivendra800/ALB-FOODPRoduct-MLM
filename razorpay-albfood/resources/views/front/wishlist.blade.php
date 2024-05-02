@extends('index')
@section('title', 'Wishlist')
@section('content')
   <!-- <div class="hero-wrap hero-bread" style="background-image: url({{ asset('public/front/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span>
                        <span>My Wishlist</span>
                    </p>
                    <h1 class="mb-0 bread">My Wishlist</h1>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="container my-5">
    <h2 style="font-family: 'Poppins', sans-serif;"><span style="color:#008DE2;">My </span>Wishlist</h2>
        <div class="card shadow wishlsititemdiv">
            <div class="card-body">
                @if($wishlist->count()>0)
                <div class="card-body">
                    
                    @foreach ($wishlist as $item)
                    <div class="row product_data ">
                        <div class="col-md-2 mt-2">
                            <img class="mt-3" style="width:100px;height:100px;border:2px solid #F3F3F3; border-radius:3px;" src="{{asset('admin_asset/uploads/product/'.$item->product->image)}}" alt="" height="70px" width="70px">
                        </div>
                        <div class="col-md-2 mt-3"><span>{{$item->product->name}}</span></div>
                        <div class="col-md-2 mt-3"><span>{{$item->product->selling_price}}</span></div>
                         
                        <div class="col-md-2 mt-3">
                             <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                             <input type="hidden" value="{{$item->cate_id}}" class="cate_id">
                            @if($item->product->qty >= $item->prod_qty)
                                
                                <div class="input-group text-center mb-3 " style="width: 130px;">
                                    <button class="input-group-text changeQunatity decrement-btn btn-dark" style="width:40px;height:40px;text-align:center;padding-left:1rem; border-radius:0px;cursor:pointer;font-size:22px;" >-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input text-center"  style="height:40px !important;">
                                    <button class="input-group-text changeQunatity increment-btn btn-dark" style="width:40px;height:40px;text-align:center;padding-left:.8rem; border-radius:0px;cursor:pointer;font-size:22px;">+</button>
                                </div>
                                 
                                @else
                                <h6>Out of stock</h6>
                            @endif
                        </div>
                        <div class="col-md-2 mt-3">
                             <button class="btn btn-dark addTocart" style="border-radius:0px;"> 
🛒 Add to cart</button>
                        </div>
                        <div class="col-md-2 mt-3">
                            <button class="btn btn-danger removeWishlistItem" style="border-radius:0px; font-size:18px;"> <i class="fa fa-trash"></i></button>
                       </div>
                    </div>
                    <hr>
                    @endforeach
                   
                </div>
                 
                @else
                  <h4>There are no product im your wishlist</h4>
                @endif
            </div>
             
             
            
             
        </div>
    </div>
  
@endsection
@section('script')


@endsection
