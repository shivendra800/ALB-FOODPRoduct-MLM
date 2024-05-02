@extends('admin.layouts.master')
@section('title', 'Delivered Orders')


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
                                     <div class="form-group col-md-4">
                                        <label for="">Start Date</label>
                                       <input type="date" class="form-control" name="start_date" id="start_date" >
                                    </div>
                                     <div class="form-group col-md-4">
                                        <label for="">End Date</label>
                                       <input type="date" class="form-control" name="end_date"  id="end_date">
                                    </div>
                                    {{-- <div class="form-group col-md-3">
                                        <label for="">Order</label>
                                       <select name="payment_status" id="" class="form-control">
                                        <option value="">Select Payment Mode</option>
                                        <option value="Paid">Paid(Online)</option>
                                        <option value="Unpaid">Unpaid(COD)</option>
                                       </select>
                                    </div> --}}
                                    <div class="col-md-3">
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
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                                 <span style="color:#007bff">Delivered</span> Orders</div>

                        <div class="card-body">
                        <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" /><br>
                            <table  id="myTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Tracking Number</th>
                                        <th>Total </th>
                                        <th>Grand Total</th>
                                          <th>Order Delivered By</th>
                                        <th>Status</th>
                                        <th>Mode</th>
                                         <th>Download Invoice</th>
                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                
                                    <tr>
                                        <td>{{ date('d-m-y',strtotime($item->created_at))}}</td>
                                        <td>{{$item->tracking_no}}</td>
                                        <td>{{$item->total_price}} <br>
                                        <td>{{$item->totalwithgst}} <br>
                                            <span class="text-danger"> {{$item->payment_status}}</span>
                                        </td>
                                           <td>{{$item->product_updated_by}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->payment_mode}}</td>
                                        <td>
                                            {{-- <a href="{{url('/')}}/invoice-bill/{{$item['id']}}"  target="_blank" download="" title="Download Invoice"><i class="bi bi-cloud-download-fill" ></i>View</a> --}}
                                            <a href="{{url('/')}}/invoice-bill/{{$item['id']}}"  target="_blank" title="View Invoice"><i class="bi bi-file-earmark-minus-fill"></i>Download</a>
                                        </td>
                                        
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            
                         
                        </div>
                          {{ $orders->links() }}
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
        var payment_status=$("#payment_status").val();
        
        if(start_date == null ||  start_date== "" ){
            swal("Please Select start_date ");
            return false;
        }else if(end_date == null ||  end_date== ""){
            swal("Please Select end_date");
            return false;
        }else{
        window.open("{{ url('/') }}/Delivered-orders-Report-Excel/"+start_date+"/"+end_date+"/"+payment_status, '_self');
    }
    }
</script>
    
@endsection