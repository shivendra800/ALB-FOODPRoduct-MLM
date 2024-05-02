@extends('index')
@section('title', 'Review')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url(https://wallpapercave.com/wp/wp1939685.jpg );">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span> <span>Edit Review
                            us</span></p>
                    <h1 class="mb-0 bread">Edit Review Us</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <h5>You are writing a review for {{$review->product->name}}</h5>
                    <form action="{{url('update-review')}}" method="post">
                        @csrf
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <textarea name="user_review"  class="form-control"  rows="5" placeholder="Write a review">{{$review->user_review}}</textarea>
                        <button type="submit" class="btn btn-primary">update review</button>
                    </form>
                     
                    

                </div>

            </div>

        </div>
        
    </div>
@endsection