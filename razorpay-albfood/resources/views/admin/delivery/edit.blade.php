@extends('admin.layouts.master')
@section('title', 'Edit-Delivery Men')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Delivery</span> > Edit Delivery Men </div>
                               <br>
                               <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit Delivery Men</h3>
                                </div>
                                <hr>
                                <form action="{{ url('Edit-Delivery-Men/'.$delivery_men->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="name" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{$delivery_men->name}}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Phone</label>
                                            <input id="phone" name="phone" value="{{$delivery_men->phone}}" type="text" class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">ID Proof Type</label>
                                            <select name="id_proof" id="id_proof" class="form-control">
                                                <option value="">Select Proof Type</option>
                                                <option value="Driving License" {{ $delivery_men->id_proof == "Driving License" ? 'selected' : '' }}>Driving License</option>
                                                <option value="PAN Card" {{ $delivery_men->id_proof == "PAN Card" ? 'selected' : '' }}>PAN Card</option>
                                                <option value="Aadhar Card" {{ $delivery_men->id_proof == "Aadhar Card" ? 'selected' : '' }}>Aadhar Card</option>
                                                <option value="Voter ID Card" {{ $delivery_men->id_proof == "Voter ID Card" ? 'selected' : '' }}>Voter ID Card</option>
                                            </select>
                                           @error('id_proof')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">ID Proof No</label>
                                            <input id="id_proof_no" name="id_proof_no" type="number" value="{{$delivery_men->id_proof_no}}"  class="form-control @error('id_proof_no') is-invalid @enderror">
                                            @error('id_proof_no')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">ID Image</label>
                                            @if($delivery_men->id_image)
                                            <img src="{{ asset('admin_asset/uploads/deliveryProof/' . $delivery_men->id_image) }}" alt="Image here"
                                            class="cate-image" style="height: 20px;">
                                            @endif
                                            <input type="file" class="form-control @error('id_image') is-invalid @enderror" name="id_image">
                                            @error('id_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="control-label mb-1">Address Pincode</label>
                                                    <input id="allot_pinecode" name="allot_pinecode" type="number" minlength="6" maxlength="6"
                                                    onKeyDown="if(this.value.length==6 && event.keyCode>47 && event.keyCode < 58)return false;" 
                                                    value="{{$delivery_men->allot_pinecode}}" class="form-control @error('allot_pinecode') is-invalid @enderror">
                                                    @error('allot_pinecode')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                   @enderror

                                                </div>
                                                {{-- <div class="form-group col-md-6 mt-4">
                                                    <input type="button" class="btn" value="Get Details" onclick="get_details()"> 
                                                    
                                                </div> --}}
                                            </div>
                                           
                                        </div>
                                        
                                      
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">State</label>
                                            <input id="state" name="state" type="text"   value="{{$delivery_men->state}}" class="form-control @error('state') is-invalid @enderror"   placeholder="State">
                                            @error('state')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">District</label>
                                            <input id="district" name="district" type="text"   value="{{$delivery_men->district}}" class="form-control @error('district') is-invalid @enderror"   placeholder="District">
                                            @error('district')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Division</label>
                                            <input id="division" name="division" type="text"   value="{{$delivery_men->division}}" class="form-control @error('division') is-invalid @enderror"   placeholder="Division">
                                            @error('division')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Region</label>
                                            <input id="region" name="region" type="text"   value="{{$delivery_men->region}}" class="form-control @error('region') is-invalid @enderror"   placeholder="Region">
                                            @error('region')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Block</label>
                                            <input id="block" name="block" type="text"   value="{{$delivery_men->block}}" class="form-control @error('block') is-invalid @enderror"   placeholder="Block">
                                            @error('block')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                         
                                    </div>
                                     
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Account Information</label>
                                        </div>
                                       
                                       
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Email</label>
                                            <input id="email" name="email" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{$delivery_men->email}}">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Password</label>
                                            <input id="password" name="password" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{old('password')}}">
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Confirm Password</label>
                                            <input id="confirm_password" name="confirm_password" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{old('confirm_password')}}">
                                            @error('confirm_password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Image</label>
                                            @if($delivery_men->image)
                                            <img src="{{ asset('admin_asset/uploads/deliverymen/' . $delivery_men->image) }}" alt="Image here"
                                            class="cate-image">
                                            @endif
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                        

                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn  btn-info "> Submit </button>
                                        <button type="submit" class="btn  btn-info "> Back </button>
                                    </div>
                                </form>
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
   function get_details()
    {
        
        var pincode = jQuery('#allot_pinecode').val();
        // alert(pincode);
       
        if(pincode== '' || pincode== null)
        {
            alert("Enter Pincode");
            jQuery('#state').val();
            jQuery('#district').val();
            jQuery('#block').val();
            jQuery('#region').val();
            jQuery('#division').val();
        }
        else{
            $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
            jQuery.ajax({

                url: "{{ url('/') }}/get-location",
                type: 'post',
                data:'pincode='+pincode,
                success:function(data){
                    // console.log(data);
                    if(data == 'no')
                    {
                        alert("Wrong Pincode")
                        jQuery('#state').val();
                        jQuery('#district').val();
                        jQuery('#block').val();
                        jQuery('#region').val();
                        jQuery('#division').val();

                    }else{
                        var getdata = $.parseJSON(data);
                    // console.log(getdata);

                    jQuery('#state').val(getdata.State);
                    jQuery('#district').val(getdata.District);
                    jQuery('#block').val(getdata.Block);
                    jQuery('#region').val(getdata.Region);
                    jQuery('#division').val(getdata.Division);
                    }
                    
                }

            });
        }
    }
   </script>

@endsection
