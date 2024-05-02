@extends('index')
@section('title', 'My Orders')
@section('content')

<!--    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('public/front/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span>
                        <span>My Orders</span>
                    </p>
                    <h1 class="mb-0 bread">My Orders</h1>
                </div>
            </div>
        </div>
    </div>
-->
    
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4><span style="color:#008DE2;">My</span> Order</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tracking Number</th>
                                    <th>Total</th>
                                    <th>Grand Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
            
                                <tr>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->totalwithgst}}</td>
                                    <td>{{$item->status}}</td>
                                    <td><a href="{{url('view-order-details/'.$item->id)}}" class="btn btn-primary" style="border-radius:0px;background-color:#008DE2;"> View</a></td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

  
@endsection

