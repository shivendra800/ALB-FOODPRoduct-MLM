@extends('index')
@section('title', 'Withdraw Request')
@section('content')

    <div class="container my-5">
    <h2 style="font-family: 'Poppins', sans-serif;"><span style="color:#008DE2;"></span>Withdraw</h2>
    
        <div class="card shadow wishlsititemdiv">
            <div class="card-body">
              
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-warning">
                                  @if($updatewalletAmt)
                                        <h2> Rs.{{round($updatewalletAmt->total, 2)}}</h2>
                                        @else
                                         <h2>0.00</h2>
                                         @endif
                              </button>
                            

                        </div>
                        <div class="col-md-6">
                            <a href="{{url('apprvel-list')}}" class="btn btn-warning float: right;">
                                <h5 style="font-family: 'Poppins', sans-serif;"><span style="color:#008DE2; " ></span>Withdraw Approve List</h5>
                            </a>
                        </div>
                        <div class="col-md-12">
                            <form action="{{url('/')}}/withdraw-request-send" method="post" enctype="multipart/form-data">
                               @csrf
                                <h4>User Account Details</h4>
                                
                                <label for="">PAN No</label>
                                <input type="text" value="{{ Auth::user()->pan_no }}" name="pan_no" placeholder="Enter pan_no" class="form-control @error('pan_no') is-invalid @enderror">
                                @error('pan_no')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                  {{-- <label for="">PAN Card Image</label>
                                <input type="file" value="{{ Auth::user()->pan_image }}" name="pan_image" placeholder="Enter pan_image" class="form-control @error('pan_image') is-invalid @enderror">
                                @error('pan_image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}

                                <label for="">Bank Name</label>
                                <input type="text" value="{{ Auth::user()->bank_name }}" name="bank_name" placeholder="Enter Bank Name" class="form-control @error('bank_name') is-invalid @enderror">
                                @error('bank_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="">IFSC Code</label>
                                <input type="text" value="{{ Auth::user()->bank_ifsc_code }}" name="bank_ifsc_code" placeholder="Enter Bank IFSC Code" class="form-control @error('bank_ifsc_code') is-invalid @enderror">
                                @error('bank_ifsc_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="">Branch Name</label>
                                <input type="text" value="{{ Auth::user()->bank_branch }}" name="bank_branch" placeholder="Enter Bank Branch Name" class="form-control @error('bank_branch') is-invalid @enderror">
                                @error('bank_branch')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="">Account No</label>
                                <input type="text" value="{{ Auth::user()->account_no }}" name="account_no" placeholder="Enter Bank Account No." class="form-control @error('account_no') is-invalid @enderror">
                                @error('account_no')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="">Account Holder Name</label>
                                <input type="text" value="{{ Auth::user()->account_holder_name }}" name="account_holder_name" placeholder="Enter Account Holder Name" class="form-control @error('account_holder_name') is-invalid @enderror">
                                @error('account_holder_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="">Withdraw Amount</label>
                                <input type="text" value="" name="withdraw_amount_req" placeholder="Enter Withdraw Amount" class="form-control @error('withdraw_amount_req') is-invalid @enderror">
                                @error('withdraw_amount_req')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                @if(empty($checkrequest->status))
                                <button class="btn btn-danger" type="submit">Save/Update</button>
                                @else
                                <span class="btn btn-warning">Requested-Amount: Rs.{{$checkrequest->withdraw_amount_req}}</span>
                                <span class="btn btn-info">{{$checkrequest->status}}</span>
                                @endif
                              

           
        
                            </form>

                        </div>
                    </div>

                   

                </div>
                 
                
            </div>
             
             
            
             
        </div>
    </div>
  
@endsection
@section('script')


@endsection
