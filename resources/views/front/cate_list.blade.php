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
            <table>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>name</td>
                        <td>ancestors</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cateslist as $index=>$item)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                @foreach ($item->ancestors as $ancestors)
                                {{$ancestors->name}}
                                @endforeach
                                 </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
   

@endsection
@section('script')


@endsection
