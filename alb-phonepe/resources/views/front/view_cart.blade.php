@extends('index')
@section('title', 'All-Category')
@section('content')
 <!--   <div class="hero-wrap hero-bread" style="background-image: url({{ asset('public/front/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span>
                        <span>My Cart</span>
                    </p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="container my-5">
        <h2 style="font-family: 'Poppins', sans-serif;"><span style="color:#008DE2;">My </span>Cart</h2>
        <div class="card shadow cartitemdiv " style="box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;">
            
            @if($cartItem->count() > 0)
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($cartItem as $item)
                <div class="row product_data" >
                    <div class="col-md-2"  >
                        <img class="mt-5" style="width:100px;height:100px;border:2px solid #F3F3F3; border-radius:3px;" src="{{asset('admin_asset/uploads/product/'.$item->product->image)}}" alt="" height="70px" width="70px">
                    </div>
                    <div class="col-md-3 mt-5"><span>{{$item->product->name}}</span></div>
                    <div class="col-md-2 mt-5"><span>{{$item->product->selling_price}}</span></div>
                    <div class="col-md-3">
                        <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                        @if($item->product->qty >= $item->prod_qty)
                           
                            <div class="input-group text-center mb-3 mt-5" style="width: 130px;">
                                <button class="input-group-text changeQunatity decrement-btn btn-dark" style="width:40px;height:40px;text-align:center;padding-left:1rem; border-radius:0px;cursor:pointer;font-size:22px;">-</button>
                                <input type="text" name="quantity" value="{{$item->prod_qty}}" class="form-control qty-input text-center" style="height:40px !important;">
                                <button class="input-group-text changeQunatity increment-btn btn-dark"  style="width:40px;height:40px;text-align:center;padding-left:.8rem; border-radius:0px;cursor:pointer;font-size:22px;">+</button>
                            </div>
                            @php $total += $item->product->selling_price * $item->prod_qty ; @endphp
                            @else
                            <h6>Out of stock</h6>
                        @endif
                    </div>
                    <div class="col-md-2">
                         <button  class="btn btn-danger delele-cart-item mt-5" style="font-size:23px;font-weight:bold;border-radius:0px; font-size:18px;"> <i class="fa fa-trash"></i></button>
                    </div>
                </div><hr>
                
                @endforeach
               
            </div>
      
            <div class="card-footer text-right">
                <h6>Total Price : <span style="font-weight:bold;"> Rs {{ $total }} </span></h6>
                <hr>
                <a href="{{ url('checkout')}}" class="btn btn-dark float-end" style="border-radius:0px;">Proceed to Checkout</a href="{{ url('checkout')}}">
            </div>
            @else
            <div class="card-body text-center">
                <h2>Your <i class="fa fa-shopping-cart"></i>Cart is empty </h2>
                <a href="{{url('Category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
            </div>
            @endif
        </div>
    </div>
  
@endsection
@section('script')


@endsection
