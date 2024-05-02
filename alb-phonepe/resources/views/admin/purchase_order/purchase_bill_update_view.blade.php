@extends('admin.layouts.master')
@section('title', 'Purchase-Bill-Update')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Purchase Order</span> >Purchase Bill Update </div>
                             
                               <div class="card-body">
                                <div class="card-title">
                                   
                                </div>
                                <hr>
                                <form action="{{ url('Purchase-Bill-Update-Save/'.$purchase_history->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                         
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1">Vendor Name</label>
                                            <input id="name" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" value="{{$purchase_history->vendor_name}}" readonly>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1">GST Number</label>
                                            <input id="shop_gstno" name="shop_gstno" type="text"  value="{{$purchase_history->shop_gstno}}" class="form-control @error('shop_gstno') is-invalid @enderror" readonly>
                                            @error('shop_gstno')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                        

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1">Phone Number</label>
                                            <input type="number"  value="{{$purchase_history->shop_mobile}}" class="form-control  @error('shop_mobile') is-invalid @enderror" name="shop_mobile" readonly>
                                            @error('shop_mobile')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                         
                                        
                                        
                                        <div class="form-group col-md-6">
                                            <label class="control-label mb-1">Total Balance:</label>
                                            <input type="number"  value="{{$purchase_history->v_wallet}}" class="form-control  @error('v_wallet') is-invalid @enderror" name="v_wallet" readonly id="v_wallet">
                                            @error('v_wallet')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                       

                                    </div>
                                    <div class="row">
                                        
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Pay Amount:</label>
                                            <input type="number"  onkeyup="paymentUpdate()" id="paid_amount"  value="{{old('paid_amount')}}" class="form-control  @error('paid_amount') is-invalid @enderror" name="paid_amount" >
                                            @error('paid_amount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                       </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Remaining Amount:</label>
                                            <input type="text" id="remaining_amount" value="{{old('remaining_amount')}}" class="form-control @error('remaining_amount') is-invalid @enderror" name="remaining_amount" readonly placeholder="Remaining Amount">
                                            @error('remaining_amount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                           @enderror
                                        </div>
                                       
                                        
                                       

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
   function paymentUpdate()
{
    var u = document.getElementById('v_wallet').value; 
    var v = document.getElementById('paid_amount').value;
    var w = parseInt(u) - parseInt(v);
    document.getElementById('remaining_amount').value  = w; 
    
}
</script>
    
@endsection
