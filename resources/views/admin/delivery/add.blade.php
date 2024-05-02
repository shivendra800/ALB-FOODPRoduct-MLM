@extends('admin.layouts.master')
@section('title', 'Add-Delivery Men')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Delivery</span> > Add Delivery Men </div>
                               <br>
                               <div class="card-body">
                                <form action="{{ url('Add-Delivery-Men') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="name" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Phone</label>
                                            <input id="phone" name="phone" type="number" value="{{old('phone')}}" 
                                            onKeyDown="if(this.value.length==10 && event.keyCode>47 && event.keyCode < 58)return false;" 
                                            class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">ID Proof Type</label>
                                            <select name="id_proof" id="id_proof" class="form-control">
                                                <option value="">Select Proof Type</option>
                                                <option value="Driving License">Driving License</option>
                                                <option value="PAN Card">PAN Card</option>
                                                <option value="Aadhar Card">Aadhar Card</option>
                                                <option value="Voter ID Card">Voter ID Card</option>
                                            </select>
                                         @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">ID Proof No</label>
                                            <input id="id_proof_no" name="id_proof_no" type="number"  value="{{old('id_proof_no')}}" class="form-control @error('id_proof_no') is-invalid @enderror">
                                            @error('id_proof_no')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">ID Image</label>
                                            <input type="file" value="{{old('id_image')}}" class="form-control  @error('id_image') is-invalid @enderror" name="id_image">
                                            @error('id_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        {{-- <form action="" autocomplete="off" method="post" enctype="multipart/form-data"> --}}
                                            {{-- @csrf --}}
                                            <div class="form-group col-md-4">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label mb-1">Address Pincode</label>
                                                        <input id="allot_pinecode" name="allot_pinecode" type="number" minlength="6" maxlength="6"
                                                        onKeyDown="if(this.value.length==6 && event.keyCode>47 && event.keyCode < 58)return false;" 
                                                         value="{{old('allot_pinecode')}}" class="form-control @error('allot_pinecode') is-invalid @enderror">
                                                        @error('allot_pinecode')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                       @enderror

                                                    </div>
                                                    {{-- <div class="form-group col-md-6 mt-4">
                                                        <input type="button" class="btn" value="Get Details" onclick="get_details()"> 
                                                        
                                                    </div> --}}
                                                </div>
                                               
                                            </div>
                                            
                                            
                                        {{-- </form> --}}
                                        
                                        <hr>
                                        

                                    </div>
                                      <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">State</label>
                                            <input id="state" name="state" type="text"  value="{{old('state')}}" class="form-control @error('state') is-invalid @enderror"   placeholder="State">
                                            @error('state')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">District</label>
                                            <input id="district" name="district" type="text"  value="{{old('district')}}" class="form-control @error('district') is-invalid @enderror"   placeholder="District">
                                            @error('district')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Division</label>
                                            <input id="division" name="division" type="text"  value="{{old('division')}}" class="form-control @error('division') is-invalid @enderror"   placeholder="Division">
                                            @error('division')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        

                                    </div>
                                     <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Region</label>
                                            <input id="region" name="region" type="text"  value="{{old('region')}}" class="form-control @error('region') is-invalid @enderror"   placeholder="Region">
                                            @error('region')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Block</label>
                                            <input id="block" name="block" type="text"  value="{{old('block')}}" class="form-control @error('block') is-invalid @enderror"   placeholder="Block">
                                            @error('block')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                         
                                    </div><hr>

                                     <div class="row">
                                        <div class="form-group">
                                            <label class="control-label mb-3 mt-2" style="font-weight:bold;">&nbsp; &nbsp;&nbsp; Account Information</label>
                                        </div>
                                       
                                       
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Email</label>
                                            <input id="email" name="email" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{old('email')}}">
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
                                            <input type="file" value="{{old('image')}}" class="form-control  @error('image') is-invalid @enderror" name="image">
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>

                                    </div>

                                        
                                     
                                    


                                    <div class="text-center">
                                        <button type="submit" class="btn  btn-info "> Submit </button>
                                        <button type="submit" class="btn  btn-secondary "> Back </button>
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
