@extends('admin.layouts.master')
@section('title', 'Add-Edit-Vendor')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Vendors</span> > {{   $title }}</div> <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2"></h3>
                                    @if(Session::has('error_message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error:</strong> {{Session::get('error_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    @if(Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success:</strong> {{Session::get('success_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                </div>
                                <hr>
                                <form class="forms-sample" @if(empty($vendor['id'])) action="{{ url('add-edit-vendor') }}"
                                @else action="{{ url('add-edit-vendor/'.$vendor['id']) }}"   @endif
                             method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Vendor name</label>
                                            <input type="text" class="form-control" name="vendor_name" id="vendor_name"@if(!empty($vendor['vendor_name']))
                                            value="{{ $vendor['vendor_name'] }}"  @else value="{{ old('vendor_name') }}" @endif
                                            placeholder="Enter vendor Name" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Vendor Shop Name</label>
                                            <input type="text" class="form-control" name="shop_name" id="shop_name"@if(!empty($vendor['shop_name']))
                                                value="{{ $vendor['shop_name'] }}"  @else value="{{ old('shop_name') }}" @endif
                                                placeholder="Enter vendor Name" required>


                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Vendor Shop Email</label>
                                            <input type="email" class="form-control" name="shop_email" id="shop_email"@if(!empty($vendor['shop_email']))
                                            value="{{ $vendor['shop_email'] }}"  @else value="{{ old('shop_email') }}" @endif
                                            placeholder="Enter vendor Name" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Vendor Shop Mobile No</label>
                                            <input type="text" class="form-control" min="10" max="10" name="shop_mobile" id="shop_mobile"@if(!empty($vendor['shop_mobile']))
                                            value="{{ $vendor['shop_mobile'] }}"  @else value="{{ old('shop_mobile') }}" @endif
                                            placeholder="Enter vendor Name" required>
                                        </div>
                                        {{-- <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Vendor Shop Address Proof</label>
                                            <input type="text" class="form-control" name="shop_address_proof" id="shop_address_proof"@if(!empty($vendor['shop_address_proof']))
                                            value="{{ $vendor['shop_address_proof'] }}"  @else value="{{ old('shop_address_proof') }}" @endif
                                            placeholder="Enter vendor Name" required>
                                        </div> --}}
                                        {{-- <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Shop Address Proof Image</label>
                                            <input type="file" value="{{old('shop_address_proof_image')}}" class="form-control  @error('shop_address_proof_image') is-invalid @enderror" name="shop_address_proof_image">
                                            @error('shop_address_proof_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                           @if($vendor->shop_address_proof_image)
                                            <img src="{{ asset('admin_asset/uploads/vendor/' . $vendor->shop_address_proof_image) }}" alt="Image here" 
                                             >
                                            @endif
                                        </div> --}}

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Shop City</label>
                                            <input type="text" class="form-control" name="shop_city" id="shop_city"@if(!empty($vendor['shop_city']))
                                            value="{{ $vendor['shop_city'] }}"  @else value="{{ old('shop_city') }}" @endif
                                            placeholder="Enter vendor Name" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Shop State</label>
                                            <input type="text" class="form-control" name="shop_state" id="shop_state"@if(!empty($vendor['shop_state']))
                                            value="{{ $vendor['shop_state'] }}"  @else value="{{ old('shop_state') }}" @endif
                                            placeholder="Enter vendor Name" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label mb-1">shop Pincode</label>
                                            <input type="number" class="form-control"  name="shop_pincode" id="shop_pincode"@if(!empty($vendor['shop_pincode']))
                                            value="{{ $vendor['shop_pincode'] }}"  @else value="{{ old('shop_pincode') }}" @endif
                                            placeholder="Enter vendor Name" required >
                                        </div>
                                        {{-- <div class="form-group col-md-3">
                                            <label class="control-label mb-1">Shop Business License Number</label>
                                            <input type="text" class="form-control" name="shop_business_license_number" id="shop_business_license_number"@if(!empty($vendor['shop_business_license_number']))
                                            value="{{ $vendor['shop_business_license_number'] }}"  @else value="{{ old('shop_business_license_number') }}" @endif
                                            placeholder="Enter vendor Name" required>
                                        </div> --}}
                                    </div>
                                       {{-- <div class="col-md-6"> --}}
                                        <div class="form-group ">
                                            <label class="control-label mb-1">Shop PAN Number</label>
                                            <input type="text" class="form-control" name="shop_pan_number" id="shop_pan_number"@if(!empty($vendor['shop_pan_number']))
                                            value="{{ $vendor['shop_pan_number'] }}"  @else value="{{ old('shop_pan_number') }}" @endif
                                            placeholder="Enter vendor Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Shop GST</label>
                                            <input type="text" class="form-control" name="shop_gstno" id="shop_gstno"@if(!empty($vendor['shop_gstno']))
                                            value="{{ $vendor['shop_gstno'] }}"  @else value="{{ old('shop_gstno') }}" @endif
                                            placeholder="Enter vendor Name" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Shop Address</label>
                                            <textarea class="form-control" id="shop_address" name="shop_address" rows="3" required>{{$vendor->shop_address }}</textarea>
                                        </div>


                                    {{-- </div> --}}

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
