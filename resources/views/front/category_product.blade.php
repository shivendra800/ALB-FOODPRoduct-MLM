@extends('index')
@section('title', 'All-Category')
@section('content')

    <style>
@media only screen and (max-width: 377px) {
 #ftco-section {
   margin-left:-1.2rem;
  }
}

    </style>
    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('public/front/newimage/3.png') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span>
                        <span>Products</span></p>
                    <h1 class="mb-0 bread">Products</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
    	<div class="container">
    		 
    		<div class="row">
                @foreach ($product as $item)
    			<div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated product_data">
    				<div class="product">
    					<a href="{{url('Product-detail/'.$item['id'])}}" class="img-prod"><img class="img-fluid" src="{{asset('admin_asset/uploads/product/'.$item->image)}}" alt="Colorlib Template">
    						<!--<span class="status">30%</span>-->
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="{{url('Product-detail/'.$item['id'])}}">{{$item->name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">Rs.{{$item->original_price}}</span><span class="price-sale">Rs.{{$item->selling_price}}</span></p>
		    					</div>
	    					</div>
							<hr>
							
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
									<input type="hidden" name="quantity" value="1" class="form-control input-number qty-input"
                                    value="1" >
                                    <input type="hidden" value="{{ $item->id }}" class="prod_id">
	    							<a href="{{url('Product-detail/'.$item['id'])}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1 addTocart">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center addtoWishlist">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
                @endforeach
    		 
    		</div>
    		<div class="row mt-5">
           
        </div>
    	</div>
    </section>
@endsection