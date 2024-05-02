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
                 <form action="{{url('/')}}/cate-store" method="post">
                    @csrf
                    <label for="">Category name</label><br>
                    <input type="text" id="cate" name="name"><br>
                    <label for="">Parent Category</label><br>
                    <select name="parent" id="parent">
                       
                        <option value="none">no any category </option>
                        @foreach ($cates as $cate)
                            <option value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit">save</button>
                </form>
            </div>




        </div>
         
    </div>

@endsection
@section('script')


@endsection
