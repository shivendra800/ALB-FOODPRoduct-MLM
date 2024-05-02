@extends('index')
@section('title', 'Review')
@section('content')
   <!-- <div class="hero-wrap hero-bread" style="background-image: url({{ asset('public/front/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span> <span>Review
                            us</span></p>
                    <h1 class="mb-0 bread">Review Us</h1>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if($verified_purchases->count()>0)
                    <h5>You are writing a review for {{$product->name}}</h5>
                    <form action="{{url('add-review')}}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <textarea name="user_review"  class="form-control"  rows="5" placeholder="Write a review"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">submit review</button>
                    </form>
                    @else
                    <div class="alert alert-danger">
                        <h5>You are not eligible to review this product</h5>
                        <p>
                            For The trustworthiness of the review , only customers who purchased the product can write a review about the product.
                        </p>
                        <a href="{{url('/')}}" class="btn btn-primary" style="border-radius:0px;">Go To Home Page</a>
                    </div>
                    @endif

                </div>

            </div>

        </div>
        
    </div>
@endsection