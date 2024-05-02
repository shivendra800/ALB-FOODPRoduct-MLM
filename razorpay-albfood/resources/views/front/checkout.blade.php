@extends('index')
@section('title', 'Checkout')
@section('content')
   <!-- <div class="hero-wrap hero-bread" style="background-image: url({{ asset('public/front/images/bg_1.jpg') }});">
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
        <form action="{{ url('place-order') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}"
                                        name="fname" id="" placeholder="Enter First Name" required>
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control lastname" value="{{ Auth::user()->lname }}"
                                        name="lname" id="" placeholder="Enter Last Name" required>
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Phone Number</label>
                                    <input type="number" class="form-control phone" value="{{ Auth::user()->phone }}"
                                        name="phone" id="" placeholder="Enter Phone Number" required>
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control email" value="{{ Auth::user()->email }}"
                                        name="email" id="" placeholder="Enter Email" required>
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address 1</label>
                                    <input type="text" class="form-control address1" value="{{ Auth::user()->address1 }}"
                                        name="address1" id="" placeholder="Enter Address 1" required>
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Address 2</label>
                                    <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}"
                                        name="address2" id="" placeholder="Enter Address 2" required>
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <label for="">State</label>
                                    <select name="state" id="state" class="form-control state" required
                                        onchange="getcitystatewise();">
                                        <option value="">Select State</option>
                                        @foreach ($state as $item)
                                            @if ($getpreviousdata != null)
                                                @if ($item->id == $getpreviousdata->state)
                                                    <option selected value="{{ $item->id }}">
                                                        {{ $item->stateName }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->stateName }}
                                                    </option>
                                                @endif
                                            @else
                                                @if ($item->id == old('state'))
                                                    <option selected value="{{ $item->id }}">
                                                        {{ $item->stateName }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->stateName }}
                                                @endif
                                            @endif
                                            {{-- @if ($item->id == old('id'))
                                           <option value="{{$item->id}}" selected>{{$item->stateName}}</option>
                                           @else
                                           <option value="{{$item->id}}">{{$item->stateName}}</option>
                                           @endif --}}
                                        @endforeach
                                    </select>

                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">District</label>
                                    <select name="city" id="city" class="form-control city">
                                        <option value="">Select District</option>
                                    </select>

                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                  <div class="col-md-6">
                                    <label for="">City</label>
                                    <input type="text" class="form-control area" value="{{ Auth::user()->area }}"
                                        name="area" id="" placeholder="Enter City" required>
                                    <span id="area_error" class="text-danger"></span>
                                </div>


                                <div class="col-md-6">
                                    <label for="">Pin Code</label>
                                    <input type="number" class="form-control pincode"
                                        value="{{ Auth::user()->pincode }}" name="pincode" id=""
                                        placeholder="Enter Pin Code" required>
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            @if ($cartItem->count() > 0)

                                <div class="row">
                                    <div class="col-sm-4">Name</div>
                                    <div class="col-sm-4">Qty</div>
                                    <div class="col-sm-4">Price</div>
                                </div>
                                <hr>
                                @php $total = 0; @endphp
                                @foreach ($cartItem as $item)
                                    <div class="row">
                                        <div class="col-sm-4">{{ $item->product->name }}</div>
                                        <div class="col-sm-4">{{ $item->prod_qty }}</div>
                                        <div class="col-sm-4">{{ $item->product->selling_price }}</div>
                                    </div>
                                @php $total += $item->product->selling_price * $item->prod_qty ; @endphp

                                   
                                @endforeach

                                <hr>
                                @if($comboitem)
                                    @if($comboitem->cate_id = '9')
                                        @if(!empty($userdata->sponser_id))
                                          <input type="text" name="sponser_id" value="{{$userdata->sponser_id}}" readonly id="sponser_id" class=" sponser_id form-control @error('sponser_id') is-invalid @enderror" >
                                        @else
                                            <input type="text" name="sponser_id" id="sponser_id" class=" sponser_id form-control @error('sponser_id') is-invalid @enderror" >
                                            <span id="sponser_id_error" class="text-danger"></span>
                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                            </div>
                                            @error('sponser_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <p>If You Does not Hsve any Referal Id You Can use this ID- <strong style="color: red;">ALB-202023-1</strong></p>
                                        @endif
                                    @endif
                                @endif

                                <h4 class="px-2"> Total : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="float-end">{{ $total }}</span></h4>
                                @php
                                 $gstamt= ($total * 12)/100 ;
                                 $totalwithgst = $total + $gstamt;
                                 $cgst_sgst = $gstamt/2;
                                @endphp
                                <h5 class="px-2">CGST: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6%  
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>{{ $cgst_sgst }}</span></h5>
                                       <h5 class="px-2">SGST: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6%  
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>{{ $cgst_sgst }}</span></h5>
                                     <h5 class="px-2">Total GST: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span>{{ $gstamt }}</span></h5>

                                <input type="hidden" value="{{ $gstamt }}" name="gstamt" class="gstamt">
                                <input type="hidden" value="12" name="gstpercentage" class="gstpercentage">
                                <input type="hidden" value="{{$totalwithgst}}" name="totalwithgst" class="totalwithgst">
                               

                                <h4 class="px-2">Grand Total :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="float-end">{{ $totalwithgst }}</span></h4>
                                <hr>
                              
                                <input type="hidden" name="payment_mode" value="COD">
                                <button class="btn btn-success w-100" style="border-radius:0px;" type="submit">Place Order- COD</button>
                                <button class="btn btn-primary  w-100 mt-3 razorpay-btn btn-submit" style="border-radius:0px;" type="button">Pay With
                                    Razorpay</button>
                            @else
                                <h2 class="text-center">No Product is cart</h2>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
@section('script')
<script>
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $(".btn-submit").click(function(e){
       
    
        e.preventDefault();
     
        var sponser_id = $("#sponser_id").val();

        // alert(sponser_id);
        
     
        $.ajax({
           type:'POST',
           url:"{{url('/') }}/checksponser_id",
           data:{sponser_id:sponser_id },
           success:function(data){
            // console.log("sssssssssssssss",data);
            // console.log("kk",data.exists == false);
            if(data.exists == false)
            {
                alert("This Sponser Id Is Not Present At MLM Level Beacuse Have Not Order Any Combo Product! ");
                location.reload();
            }if(data.isExistsamesponser == false)
            {
                alert("You can not use Your MemebrID is as sponser id! ");
                location.reload();

            }
            if($.isEmptyObject(data.error)){
                    // alert(data.success);
                    // location.reload();
            }else{
                
                printErrorMsg(data.error);
                alert("Required Valid SponserID ! ");
                location.reload();
                
            }

                // if($.isEmptyObject(data.error)){
                //     // alert(data.success);
                //     // location.reload();
                // }else{
                //     printErrorMsg(data.exists == false);
                //     location.reload();
                // }
           }
        });
    
    });
  
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
</script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>

        $(document).ready(function() {
            // rozarpay jquery---
            $('.razorpay-btn').click(function(e) {
                e.preventDefault();


                var firstname = $('.firstname').val();

                var lastname = $('.lastname').val();
                var phone = $('.phone').val();
                var email = $('.email').val();
                var address1 = $('.address1').val();
                var address2 = $('.firstname').val();
                var city = $('.city').val();
                var state = $('.state').val();
                var sponser_id = $('.sponser_id').val();
                
                var area = $('.area').val();

                var pincode = $('.pincode').val();

                var gstamt = $('.gstamt').val();
                var gstpercentage = $('.gstpercentage').val();
                var totalwithgst = $('.totalwithgst').val();

                if (!firstname) {
                    fname_error = "First Name is required";
                    $('#fname_error').html('');
                    $('#fname_error').html(fname_error);
                } else {
                    fname_error = "";
                    $('#fname_error').html('');

                }
                if (!lastname) {
                    lname_error = "Last  Name is required";
                    $('#lname_error').html('');
                    $('#lname_error').html(lname_error);
                } else {
                    lname_error = "";
                    $('#lname_error').html('');

                }
                if (!phone) {
                    phone_error = "Phone No is required";
                    $('#phone_error').html('');
                    $('#phone_error').html(phone_error);
                } else {
                    phone_error = "";
                    $('#phone_error').html('');

                }
                if (!email) {
                    email_error = "Email  is required";
                    $('#email_error').html('');
                    $('#email_error').html(email_error);
                } else {
                    email_error = "";
                    $('#email_error').html('');

                }
                if (!address1) {
                    address1_error = "Address1  is required";
                    $('#address1_error').html('');
                    $('#address1_error').html(address1_error);
                } else {
                    address1_error = "";
                    $('#address1_error').html('');

                }
                if (!address2) {
                    address2_error = "Address2  is required";
                    $('#address2_error').html('');
                    $('#address2_error').html(address2_error);
                } else {
                    address2_error = "";
                    $('#address2_error').html('');

                }
                if (!city) {
                    city_error = "city  is required";
                    $('#city_error').html('');
                    $('#city_error').html(city_error);
                } else {
                    city_error = "";
                    $('#city_error').html('');

                }
                if (!state) {
                    state_error = "state  is required";
                    $('#state_error').html('');
                    $('#state_error').html(state_error);
                } else {
                    state_error = "";
                    $('#state_error').html('');

                }


                if (!pincode) {
                    pincode_error = "pincode  is required";
                    $('#pincode_error').html('');
                    $('#pincode_error').html(pincode_error);
                } else {
                    pincode_error = "";
                    $('#pincode_error').html('');

                }

                if (!area) {
                    area_error = "Area  is required";
                    $('#area_error').html('');
                    $('#area_error').html(area_error);
                } else {
                    area_error = "";
                    $('#area_error').html('');

                }

                if (fname_error != '' || lname_error != '' || phone_error != '' || email_error != '' ||
                    address1_error != '' || address2_error != '' || city_error != '' || state_error != '' ||
                    pincode_error != '' || area_error  != '') {
                    return false;
                } else {
                    var data = {

                        'firstname': firstname,
                        'lastname': lastname,
                        'phone': phone,
                        'email': email,
                        'address1': address1,
                        'address2': address2,
                        'city': city,
                        'state': state,
                        'pincode': pincode,
                        'sponser_id': sponser_id,
                        'area': area,

                        'gstamt': gstamt,
                        'gstpercentage': gstpercentage,
                        'totalwithgst': totalwithgst,
                    }

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({

                        method: "post",
                        url: "{{ url('/') }}/proceed-to-pay",
                        data: data,
                        success: function(response) {
                            var options = {
                                "key": "rzp_test_O65snbWQyoH5Sg", // Enter the Key ID generated from the Dashboard
                                // "amount":1*100 , // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                "amount": response.totalwithgst * 100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                "currency": "INR",
                                "name": response.firstname + ' ' + response.lastname,
                                "description": "Thank For chooseing us",
                                "image": "https://example.com/your_logo",
                                // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                                "handler": function(razorpayresponse) {
                                    // alert(razorpayresponse.razorpay_payment_id);
                                    $.ajax({

                                        method: "post",
                                        url: "{{ url('/') }}/place-order",
                                        data: {
                                            'fname': response.firstname,
                                            'lname': response.lastname,
                                            'email': response.email,
                                            'phone': response.phone,
                                            'address1': response.address1,
                                            'address2': response.address2,
                                            'city': response.city,
                                            'state': response.state,
                                            'country': response.country,
                                            'pincode': response.pincode,
                                            'payment_mode': 'Paid by Razorpay',
                                            'payment_id': razorpayresponse
                                                .razorpay_payment_id,
                                                'sponser_id' : response.sponser_id,

                                                'gstamt' : response.gstamt,
                                                'gstpercentage' : response.gstpercentage,
                                                'totalwithgst' : response.totalwithgst,
                                                
                                                 'area' : response.area,
                                        },
                                        success: function(
                                            razorpaysuccesresponse) {
                                            swal(razorpaysuccesresponse
                                                    .status)
                                                .then((value) => {
                                                    // window.location.reload();
                                                    window.location
                                                        .href =
                                                        "{{ url('/') }}/my-order";
                                                });


                                        }
                                    });
                                },
                                "prefill": {
                                    "name": response.firstname + ' ' + response.lastname,
                                    "email": response.email,
                                    "contact": response.phone
                                },

                                "theme": {
                                    "color": "#3399cc"
                                }
                            };
                            var rzp1 = new Razorpay(options);


                            rzp1.open();
                            e.preventDefault();

                            // alert(response.total_price);
                        }

                    });
                }


            }); //end razorpay---


            // this is use for on load ,load data automatic
            getcitystatewise();

        });

        function getcitystatewise() {
            var state_id = $("#state").val();
            @if ($getpreviousdata != null)
                var city = "{{$getpreviousdata['city'] }}";
                // alert(city);
            @else
                   var city = "{{ old('city') }}";
            @endif
            
            $.ajax({
                url: "{{ url('/') }}/Getcity-state-wise/" + state_id,
                dataType: "json",
                success: function(data) {
                    console.log("data", data);
                    var option = "";
                    for (var i = 0; i < data.data.length; i++) {
                        if (city == data.data[i].id) {
                            option += "<option selected value=" + data.data[i].id + ">" + data.data[
                                    i]
                                .cityName + "</option>";
                        } else {
                            option += "<option value=" + data.data[i].id + ">" + data.data[i]
                                .cityName + "</option>";
                        }
                    }
                    $("#city").html(option);
                }
            });


        }
    </script>
@endsection
