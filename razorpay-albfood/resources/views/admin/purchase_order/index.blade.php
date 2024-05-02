@extends('admin.layouts.master')
@section('title', 'Purchase List')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                             <form class="" method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Vendor Name</label>
                                        <select name="vendor_id" id="vendor_id" class="form-control">
                                            <option value="">Select Vendor</option>
                                            @foreach ($vendor as $item)
                                             <option value="{{$item->id}}">{{$item->vendor_name}}</option>
                                                
                                            @endforeach
                                        </select>
                                      
                                    </div>
                                     <div class="form-group col-md-3">
                                        <label for="">Start Date</label>
                                       <input type="date" class="form-control" name="start_date" id="start_date" >
                                    </div>
                                     <div class="form-group col-md-3">
                                        <label for="">End Date</label>
                                       <input type="date" class="form-control" name="end_date"  id="end_date">
                                    </div>
                                    
                                    <div class="col-md-3 mt-2">
                                        <div class="row">
                                            <div class="form-group col-md-6 mt-4"  align="center">
                                        
                                                <button type="submit" class="  btn btn-primary mr-2"  >Search</button>
                                             
                                            </div>
                                            <div class="form-group col-md-6 mt-4"  align="center">
                                                <span  class="  btn btn-primary mr-2" onclick="exportExcelPending()" >Excel</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                </div>
                             </form>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="title-5 m-b-35">Purchase List</h3>
                </div>
               
                
                <div class="col-lg-12">
                   
                    <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                     
                                    <th>Vendor Name</th>
                                    <th>Product Name</th>
                                    <th>Product Img</th>
                                    <th>Qty</th>
                                    <th>Purchase Rate</th>
                                    <th>Tax</th>
                                    <th>Total Rate</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                   
                                
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pruchaseitem as $item)
                                <tr>
                                    <td>{{ $item->vendor->shop_name }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        <img src="{{ asset('admin_asset/uploads/product/'.$item->product->image) }}" alt="Image here"
                                            class="cate-image" style="height: 20px;">
                                    </td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->tax }}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>{{ $item->created_at }}</td>
                                   
                                    
                                    <td class="td-actions">
                                        
                                        <a href="{{url('Delete-Purchase-Order/'.$item->id)}}" class="btn btn-danger  btn-sm" data-original-title="Remove">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
                                    </td>
                                    
                                 </tr>
                                  @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
    function exportExcelPending()
    {
        
       
        var start_date=$("#start_date").val();
        var end_date=$("#end_date").val();
        var vendor_id=$("#vendor_id").val();
        
        if(start_date == null ||  start_date== "" ){
            swal("Please Select start_date ");
            return false;
        }else if(end_date == null ||  end_date== ""){
            swal("Please Select end_date");
            return false;
        }else if(vendor_id == null ||  vendor_id== ""){
            swal("Please Select vendor_id");
            return false;
        } else{
        window.open("{{ url('/') }}/Purchase-Stock-Report-Excel/"+start_date+"/"+end_date+"/"+vendor_id, '_self');
    }
    }
</script>
    
@endsection