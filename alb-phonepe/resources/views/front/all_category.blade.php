@extends('index')
@section('title', 'All-Category')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('https://wallpapercave.com/wp/wp1939685.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span>
                        <span>Category</span></p>
                    <h1 class="mb-0 bread">Category</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate fadeInUp ftco-animated">
                    <div class="row">
                        @foreach ($category as $item)
                        <div class="col-md-12 d-flex ftco-animate fadeInUp ftco-animated">
                            <div class="blog-entry align-self-stretch d-md-flex">
                                <a href="#" class="block-20"
                                    style="background-image:url({{ asset('admin_asset/uploads/category/'.$item->image) }});">
                                </a>
                                <div class="text d-block pl-md-4">
                                    <h3 class="heading"><a href="{{url('All-Category/'.$item->slug)}}">{{$item->name}}</a></h3>
                                    <p>{{$item->description}}</p>
                                    <p><a href="{{url('All-Category/'.$item->slug)}}" class="btn btn-primary py-2 px-3">View All</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate fadeInUp ftco-animated">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon ion-ios-search"></span>
                                <input type="text" class="form-control" placeholder="Search...">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach ($category as $item)
                            <li><a href="{{url('All-Category/'.$item->slug)}}">{{$item->name}} <span></span></a></li>
                            @endforeach
                            
                        </ul>
                    </div>

                     
                </div>

            </div>
        </div>
    </section>
@endsection
