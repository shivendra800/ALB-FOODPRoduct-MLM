@extends('admin.layouts.master')
@section('title', 'Add-Purchase-Order')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Purchase Order</span> > Add Purchase Order </div>
                             
                               <div class="card-body">
                               
                               
                                <form action="{{ url('Add-Purchase-Order') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="input-fields product_data">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label mb-1" for="vendor_id">Select Vendor Name</label>
                                                <select class="form-select form-control @error('vendor_id') is-invalid @enderror" name="vendor_id" id="vendor_name">
                                                   <option value="">Select</option>
                                                    @foreach($vendor as $item)
                                                        @if (old('vendor_id') == $item->id)
                                                            <option value="{{ $item->id }}" selected>{{$item->shop_name}}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{$item->shop_name}}</option>
                                                        @endif
                                                    @endforeach
                                                  
                                                </select>
                                                @error('vendor_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                           
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-1" for="prod_id">Select Product</label>
                                                <select class="form-select form-control @error('prod_id') is-invalid @enderror  " name="prod_id[]" >
                                                   <option value="">Select</option>
                                                    @foreach($product as $item)
                                                        @if (old('prod_id') == $item->id)
                                                            <option value="{{ $item->id }}" selected>{{$item->name}}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{$item->name}}</option>
                                                        @endif
                                                    @endforeach
                                                  
                                                </select>
                                                @error('prod_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-1" for="unit">Select Unit</label>
                                                <select class="form-select form-control @error('unit') is-invalid @enderror  " name="unit[]" >
                                                   <option value="">Select</option>
                                                   <option value="kg" {{ (old('unit') == 'kg' ? "selected":"") }}>kg</option>
                                                   <option value="gm" {{ (old('unit') == 'gm' ? "selected":"") }}>gm</option>
                                                   <option value="ltr" {{ (old('unit') == 'ltr' ? "selected":"") }}>ltr</option>
                                                   <option value="piece" {{ (old('unit') == 'piece' ? "selected":"") }}>piece</option>
                                                   <option value="darzon" {{ (old('unit') == 'darzon' ? "selected":"") }}>darzon</option>
                                                     
                                                </select>
                                                @error('unit')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-1" for="price">Price/Unit</label>
                                                <input type="number"  value="{{old('price')}}" class="form-control  @error('price') is-invalid @enderror rate" name="price[]" onkeyup="CalculateTotal(this)">
                                                @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                           
    
                                        </div>
                                        <div class="row">
                                         
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-1" for="qty">Qty</label>
                                                <input type="number"  value="{{old('qty')}}" class="form-control  @error('qty') is-invalid @enderror quantity" name="qty[]" onkeyup="CalculateTotal(this)">
                                                @error('qty')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-1" for="tax">Tax(Other Expences)</label>
                                                <input type="number"  value="{{old('tax')}}" class="expense form-control  @error('tax') is-invalid @enderror" name="tax[]" onkeyup="CalculateTotal(this)">
                                                @error('tax')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="control-label mb-1" for="total_price">Total Price</label>
                                                <input type="number"  value="{{old('total_price')}}" class="total_price form-control  @error('total_price') is-invalid @enderror" name="total_price[]" readonly placeholder="Total">
                                                @error('total_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            
                                             
    
                                        </div>

                                    </div>
                                 
                                 
                                     
                                    <div class="row">
                                        <div class="form-group">
                                        &nbsp;&nbsp;&nbsp; <button id="add-more-field" class="btn btn-secondary btn-sm">add more</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                         
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            Previous Balance: <input type="text" 
                                            name="previous_balance" class="form-control"  placeholder="Previous Balance*" value="" id="previous_balance" readonly>
                                                <span id="payment_span" class="text-danger font-weight-bold"></span>
                                            </div>
                                            
                                            </div>
                                        <div class="col-md-4">
                                               <div class="form-group">
                                            Total Billing Amount: <input type="text" value=""
                                             id="t_billing_amount" name="total_billing" class="form-control" placeholder="Total Billing Amount *"    readonly="">  
                                             <span id="amount_span" class="text-danger font-weight-bold"></span>
                                            </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                             <div class="form-group">
                                            Total Balance: <input type="text" value=""
                                             id="grand_total" name="grand_total" class="form-control" placeholder="Grand Total Balance*"    readonly="">  
                                             <span id="amount_span" class="text-danger font-weight-bold"></span>
                                            </div>
                                            </div>
                                            
                                        <div class="col-md-4">
                                          <div class="form-group">
                                            Pay Now: <input type="text" name="paid_amount" class="form-control" onkeyup="paymentUpdate()" placeholder="Pay Now*" value="" id="paid_amount">
                                                <span id="payment_span" class="text-danger font-weight-bold"></span>
                                            </div>  
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                               Remaining  Balance: <input type="text" name="remaining_amount"  class="form-control" placeholder="Remaining  Amount *" value="" readonly="" id="remaining_amount"  />
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

    
$( document ).ready(function() {
    // Add More buuton work ----jquery here
    $(function(){
    var max_fields = 10;
    var x = 1;
    var more_fields = `
                                       
                                          <hr>
                                         <div class="row One-div product_data">
                                            
                                           <div class="form-group col-md-3">
                                                <label class="control-label mb-1" for="prod_id">Select Product</label>
                                                <select class="form-select form-control @error('prod_id') is-invalid @enderror  " name="prod_id[]" >
                                                   <option value="">Select</option>
                                                    @foreach($product as $item)
                                                        @if (old('prod_id') == $item->id)
                                                            <option value="{{ $item->id }}" selected>{{$item->name}}</option>
                                                        @else
                                                            <option value="{{ $item->id }}">{{$item->name}}</option>
                                                        @endif
                                                    @endforeach
                                                  
                                                </select>
                                                @error('prod_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-1" for="unit">Select Unit</label>
                                                <select class="form-select form-control @error('unit') is-invalid @enderror  " name="unit[]" >
                                                   <option value="">Select</option>
                                                   <option value="kg" {{ (old('unit') == 'kg' ? "selected":"") }}>kg</option>
                                                   <option value="gm" {{ (old('unit') == 'gm' ? "selected":"") }}>gm</option>
                                                   <option value="ltr" {{ (old('unit') == 'ltr' ? "selected":"") }}>ltr</option>
                                                   <option value="piece" {{ (old('unit') == 'piece' ? "selected":"") }}>piece</option>
                                                   <option value="darzon" {{ (old('unit') == 'darzon' ? "selected":"") }}>darzon</option>
                                                     
                                                </select>
                                                @error('unit')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-1" for="price">Price/Unit</label>
                                                <input type="number"  value="{{old('price')}}" class="form-control  @error('price') is-invalid @enderror rate" name="price[]" onkeyup="CalculateTotal(this)">
                                                @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-1" for="qty">Qty</label>
                                                <input type="number"  value="{{old('qty')}}" class="form-control  @error('qty') is-invalid @enderror quantity" name="qty[]" onkeyup="CalculateTotal(this)" >
                                                @error('qty')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-1" for="tax">Tax(Other Expences)</label>
                                                <input type="number"  value="{{old('tax')}}" class="expense form-control  @error('tax') is-invalid @enderror" name="tax[]" onkeyup="CalculateTotal(this)">
                                                @error('tax')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="control-label mb-1" for="total_price">Total Price</label>
                                                <input type="number"  value="{{old('total_price')}}" class=" total_price form-control  @error('total_price') is-invalid @enderror" name="total_price[]" readonly placeholder="Total">
                                                @error('total_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                               @enderror
                                            </div>
                                            <a href="#" class="delete">Delete</a>
                                        </div>
                                       
                                           
                     
                `;
    //  add more button --
    $('#add-more-field').on('click', (function (e) {
         
        e.preventDefault();
        if (x < max_fields) {
            x++;
        $(".input-fields").append(more_fields);
        }
        else {
            alert('You Reached the limits')
        }
    }));
    // delete button--
    $(".input-fields").on("click", ".delete", function(e) {
        e.preventDefault();
        $(this).parent('.One-div').remove();
        x--;
        CalculateTotal();
        paymentUpdate();
    })

  });//add more button function end -----------------------

  //venor wise previou balance get -----
  $("#vendor_name").on("change",function(){
     var vendor_id =   this.options[this.selectedIndex].value;
      
      $.ajax({
       
       url: "{{ url('/') }}/vendor_wise_previous_balance/" + vendor_id,
       dataType: "json",
        cache:false,
        success: function(data){  
            // console.log(data);
        // console.log(data.data.v_wallet);
        var previous_balance = document.getElementById("previous_balance").value = data.data.v_wallet;
         }
      });
    });
 
     

  
});//document. ready function end 
// calculate one div class->product_data toatal amount 
function CalculateTotal(ele) {
        var rate = $(ele).closest('.product_data').find('.rate').val();
        var quantity = $(ele).closest('.product_data').find('.quantity').val();
        var expense = $(ele).closest('.product_data').find('.expense').val();
        rate = rate == '' ? 0 : rate;
        quantity = quantity == '' ? 0 : quantity;
        expense = expense == '' ? 0 : expense;
        if (!isNaN(rate) && !isNaN(quantity)) {
            // calculate all three data 
            var total = parseFloat(rate) * parseFloat(quantity) +parseFloat(expense) ;
            // set data in toatal price
            $(ele).closest('.product_data').find('.total_price').val(total.toFixed(2));
        }
        Calculate()// here for auto set total billing amount 
}//end here calculate one div class->product _data total amount 

function Calculate() {
    var totalbilling = 0;
     $(".total_price").each(function () {
      //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            totalbilling += parseFloat(this.value);
          
        }       
        var sub_total_billing = document.getElementById("t_billing_amount").value=totalbilling;
        // find total balance
        var previous_balance = document.getElementById('previous_balance').value;
        var grand_total_balance = parseInt(sub_total_billing) + parseInt(previous_balance);
    
       document.getElementById('grand_total').value=grand_total_balance;
        
    });
}// end total balance

// remaining balance on click pay now input
function paymentUpdate()
{
    var u = document.getElementById('grand_total').value; 
    var v = document.getElementById('paid_amount').value;
    var w = parseInt(u) - parseInt(v);
    document.getElementById('remaining_amount').value  = w; 
    
}
   
</script>
    
@endsection
