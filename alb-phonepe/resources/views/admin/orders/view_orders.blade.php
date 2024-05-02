@extends('admin.layouts.master')
@section('title', 'Pending Orders')


@section('content')
    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-success">
                                <h4> Order View</h4>
                                <a href="{{ url()->previous() }}" class="btn btn-warning  float-right">Back</a>
                            </div>
                            <div class="card-body">
                                <br>
                                <div class="card-header bg-warning">
                                    <h4>Payment Details</h4>

                                    @if($orders['payment_mode']=="COD")
                                    Payment Mode: <h5>{{$orders->payment_mode}}</h5> 
                                    Payment Status:   <h5>{{$orders->payment_status}}</h5>
                                  

                                    @else
                                    Payment Mode: <h5>{{$orders->payment_mode}}</h5>
                                    Payment Status:  <h5>{{$orders->payment_status}}</h5> 
                                    Payment ID: <h5>{{$orders->payment_id}}</h5> 
                                  
                                    
                                    @endif
                                    
                                </div>
                                <br>
                                <div class="row">
                                   
                                    <div class="col-md-6 order-details">
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
                                        <input type="hidden" value="{{ $orders->pincode }}" id="pincode" name="pincode">
                                    </div>
                                    <div class="col-md-6">
                                        <h4> Order Details</h4>
                                        <hr>
                                        <table id="myTable" class="table table-bordered">
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
                                        @php
                                            
                                            $cgst_sgst = $orders->gstamt / 2;
                                        @endphp
                                        <h4 class="px-2"> Total : <span
                                                class="float-end">{{ $orders->total_price }}</span></h4>

                                        <h4 class="px-2">CGST 6% : <span class="float-end">{{ $cgst_sgst }}</span>
                                        </h4>
                                        <h4 class="px-2">SGST 6% : <span class="float-end">{{ $cgst_sgst }}</span>
                                        </h4>
                                        <h4 class="px-2">Total GST 12% : <span
                                                class="float-end">{{ $orders->gstamt }}</span></h4>

                                        <!--<h4 class="px-2">Total GST Amount : <span class="float-end">{{ $orders->gstamt }}</span></h4>-->
                                        <h4 class="px-2">Grand Total : <span
                                                class="float-end">{{ $orders->totalwithgst }}</span></h4>
                                        <div class="mt-5 px-2">

                                            <form action="{{ url('update-order/' . $orders->id) }}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="">Order Status</label>
                                                        @if ($orders->status == 'Pending')
                                                            <select class="form-select" name="order_status">
                                                                {{-- <option {{$orders->status == 'Pending' ? 'selected' : ''}} value="Pending">Pending</option> --}}
                                                                <option
                                                                    {{ $orders->status == 'Dispatched' ? 'selected' : '' }}
                                                                    value="Dispatched">Dispatched</option>
                                                            </select>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="">Courrier Name Link</label>
                                                                    <input type="text" name="courrier_name_link"
                                                                        class="form-control"
                                                                        placeholder="https://www.indiapost.gov.in/vas/Pages/IndiaPostHome.aspx">

                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Courrier Traking No</label>
                                                                    <input type="text" name="courrier_traking_no"
                                                                        class="form-control"
                                                                        placeholder="Enter like : RD112874233IN ">
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($orders->status == 'Dispatched')
                                                            <select class="form-select" name="order_status">
                                                                {{-- <option {{$orders->status == 'Dispatched' ? 'selected' : ''}} value="Dispatched">Dispatched</option> --}}
                                                                <option
                                                                    {{ $orders->status == 'Shipped' ? 'selected' : '' }}
                                                                    value="Shipped">Shipped</option>
                                                        @endif
                                                        @if ($orders->status == 'Shipped')
                                                            <select class="form-select" name="order_status">
                                                                {{-- <option {{$orders->status == 'Shipped' ? 'selected' : ''}} value="Shipped">Shipped</option> --}}
                                                                <option
                                                                    {{ $orders->status == 'Out For Delivery' ? 'selected' : '' }}
                                                                    value="Out For Delivery">Out For Delivery</option>
                                                        @endif
                                                        @if ($orders->status == 'Out For Delivery')
                                                            <select class="form-select" name="order_status">
                                                                {{-- <option {{$orders->status == 'Out For Delivery' ? 'selected' : ''}} value="Out For Delivery">Out For Delivery</option> --}}
                                                                <option
                                                                    {{ $orders->status == 'Delivered' ? 'selected' : '' }}
                                                                    value="Delivered">Delivered</option>
                                                                <option {{ $orders->status == 'Cancel' ? 'selected' : '' }}
                                                                    value="Cancel">Cancel</option>
                                                                <option
                                                                    {{ $orders->status == 'Undeliverable' ? 'selected' : '' }}
                                                                    value="Undeliverable">Undeliverable</option>
                                                        @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if ($orders->payment_mode == 'COD' && $orders->status == 'Out For Delivery')
                                                            <label for="">Order Status</label>
                                                            <select name="payment_status" class="form-select" required>
                                                                <option
                                                                    {{ $orders->payment_status == 'Paid' ? 'selected' : '' }}
                                                                    value="Paid">Paid</option>
                                                                <option
                                                                    {{ $orders->payment_status == 'Unpaid' ? 'selected' : '' }}
                                                                    value="Unpaid">Unpaid</option>

                                                            </select>
                                                            @else
                                                            <input type="hidden" name="payment_status" value="SUCCESS">
                                                        @endif
                                                        
                                                    </div>

                                                </div>
                                                <hr>
                                                @if ($orders->status == 'Dispatched')
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="">Assign Delivery Boy</label>
                                                            <select name="deliveryboyID" id="deliveryboyID"
                                                                class="form-control">

                                                                <option value="">Select Delivery Boy</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                @endif


                                                <button type="submit" class="btn btn-info mt-3 float-end">Update</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')

    <script>
        $(document).ready(function() {
            // alert("Page has loaded!");
            getdeliveryboywithzip();
        });

        function getdeliveryboywithzip() {
            var pincode = $("#pincode").val();
            var deliveryBoy = "{{ old('deliveryBoy') }}";
            // alert(pincode);
            $.ajax({
                url: "{{ url('/') }}/Get-delivery-boy/" + pincode,
                dataType: "json",
                success: function(data) {
                    //  console.log("data", data);
                    var option = "<option value=''>Select Delivery Boy</option>";
                    for (var i = 0; i < data.data.length; i++) {
                        if (deliveryBoy == data.data[i].id) {
                            option += "<option selected value=" + data.data[i]['deliveryboy'].id + ">" + data
                                .data[i]['deliveryboy'].name + "</option>";
                        } else {
                            option += "<option value=" + data.data[i]['deliveryboy'].id + ">" + data.data[i][
                                    'deliveryboy'
                                ]
                                .name + "</option>";
                        }
                    }
                    $("#deliveryboyID").html(option);
                }
            });
        }
    </script>

@endsection
