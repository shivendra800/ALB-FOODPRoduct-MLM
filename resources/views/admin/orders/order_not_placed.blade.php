@extends('admin.layouts.master')
@section('title', 'Order Not Placed')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                                 <span style="color:#007bff">Order Not Placed</div>

                        <div class="card-body">
                        <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                        <br>
                            <table  id="myTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order Date</th>
                                        <th>Tracking Number</th>
                                        <th>Grand Total</th>
                                         <th>Payment Status</th>
                                        <th>Status</th>
                                        <!--<th>Action</th>-->
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                
                                    <tr>
                                        <td>{{ date('d-m-y',strtotime($item->created_at))}}</td>
                                        <td>{{$item->tracking_no}}</td>
                                        <td>{{$item->totalwithgst}} <br>
                                           <span class="text-danger"> {{$item->payment_mode}}</span>
                                        </td>
                                         <td>
                                           <span class="text-danger"> {{$item->payment_status}}</span>
                                        </td>
                                        <td>{{$item->status}}</td>
                                        <!--<td><a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-info">View</a></td>-->
                                    </tr>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br><br>
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
        }else if(payment_status == null ||  payment_status== ""){
            swal("Please Select payment_status");
            return false;
        } else{
        window.open("{{ url('/') }}/Pending-order-Report-Excel/"+start_date+"/"+end_date+"/"+payment_status, '_self');
    }
    }
</script>
    
@endsection