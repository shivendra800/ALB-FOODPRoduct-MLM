@extends('index')
@section('title', 'My Orders')
@section('content')
<style>
    
.horizontal-timeline .items {
border-top: 2px solid #ddd;
}

.horizontal-timeline .items .items-list {
position: relative;
margin-right: 0;
}

.horizontal-timeline .items .items-list:before {
content: "";
position: absolute;
height: 8px;
width: 8px;
border-radius: 50%;
background-color: #ddd;
top: 0;
margin-top: -5px;
}

.horizontal-timeline .items .items-list {
padding-top: 15px;
}
</style>
   <!-- <div class="hero-wrap hero-bread" style="background-image: url({{ asset('public/front/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span>
                        <span>My Orders Details</span>
                    </p>
                    <h1 class="mb-0 bread">My Orders Details</h1>
                </div>
            </div>
        </div>
    </div>
-->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><span style="color:#008DE2;">Order</span> View</h4>
                        <a href="{{ url('my-order') }}" class="btn btn-warning  float-end" style="border-radius:0px;">Back</a>
                        <h4 class="text-right" style="border-radius:0px;">Payment Mode : <span class=" btn btn-primary float-end">{{ $orders->payment_mode	 }}</span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col-md-12">
                                <h4> Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tracking Number</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('admin_asset/uploads/product/' . $item->product->image) }}"
                                                        alt="" width="50px;">
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                             
                                <h4 class="px-2 text-right">Total : <span class="float-end">{{ $orders->total_price }}</span>
                                </h4>
                                <h4 class="px-2 text-right">GST % : <span class="float-end">{{ $orders->gstpercentage }}</span>
                                </h4>
                                <h4 class="px-2 text-right">GST Amount : <span class="float-end">{{ $orders->gstamt }}</span>
                                </h4>
                                <h4 class="px-2 text-right">Grand Total : <span class="float-end">{{ $orders->totalwithgst	 }}</span>
                                </h4>
                            
                               
                            </div>
                            <div class="col-md-12">
                                <h4><span style="color:#008DE2;">Order</span> Tracking</h4>
                                
                                  <div class="horizontal-timeline">

                                    <ul class="list-inline items d-flex justify-content-between">
                                    @if($orders->status == 'Pending')
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Dispatched</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Shipped</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Out For Delivery</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Delivered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      @endif
                                      @if($orders->status == 'Dispatched')
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Dispatched</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Shipped</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Out For Delivery</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Delivered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                       
                                     
                                      
                                      @endif
                                      @if($orders->status == 'Shipped')
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Dispatched</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Shipped
                                        </p>
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Out For Delivery</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Delivered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      @endif
                                      @if($orders->status == 'Out For Delivery')
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Dispatched</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Shipped
                                        </p>
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Out For Delivery</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #c5c2bf;">Delivered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      @endif
                                      @if($orders->status == 'Delivered')
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Dispatched</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Shipped
                                        </p>
                                      </li>
                                      <li class="list-inline-item items-list">
                                        <p class="py-1 px-2 rounded text-white" style="background-color: #548f0c;">Delivered</p
                                          class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                                      </li>
                                      @endif

                                    </ul>
                  
                                  </div>
                            </div>
                            <div class="col-md-12 order-details">
                                <h4> Shipping Details</h4>
                                <label for="">First Name</label>
                                <div class="border p-2">{{ $orders->fname }}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{ $orders->lname }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                                <label for="">Contact No</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                    {{ $orders->address1 }} ,<br>
                                    {{ $orders->address2 }},<br>
                                    {{ $orders->cityName }},<br>
                                    {{ $orders->stateName }}
                                    {{ $orders->country }}
                                </div>
                                <label for="">Zip code</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    

@endsection
