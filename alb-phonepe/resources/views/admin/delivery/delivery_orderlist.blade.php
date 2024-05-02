@extends('admin.layouts.master')
@section('title', 'Delivery Order list')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">


                    <div class="card-header">
                        <span style="color:#007bff">Delivery</span> > Chash Collection  </div>
                        <div class="card-header">
                            @if($gethistroycash)
                       <a href="{{ url('cash-collection-histroy/'.$gethistroycash['devilery_id']) }}" <span style="color:#007bff">Delivery</span> Chash Collection  Histroy ></a></div>
                       @endif
                      <br>
                      <div class="card-body">
                       <form action="{{ url('cash-collection/'.$getamount['id']) }}" method="post" enctype="multipart/form-data">
                           @csrf
                           <div class="row">
                               <div class="form-group col-md-4">
                                   <label class="control-label mb-1">Total Amount</label>
                                   <input  type="text" name="total_amount" value="{{ $getamount['total_cash'] }}"
                                       class="form-control" readonly>
                               </div>
    
                               <div class="form-group col-md-4">
                                   <label class="control-label mb-1">recive_amount</label>
                                   <input name="recive_amount" type="text"  required
                                   class="form-control @error('recive_amount') is-invalid @enderror">
                                   @error('recive_amount')
                                   <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                               </div>
    
                           </div>
                           <div class="text-center">
                               <button type="submit" class="btn  btn-info "> Submit </button>
                           </div>
                       </form>
                   </div>


                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Delivery</span> > Delivery Order List</div>

                               <div class="card-body">
                               <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                </div>

                
           </div>


                {{-- <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-warning">Today Cash Collection :-Rs.{{$totalDaysaleOrder}}</button>
                    </div>
                </div> --}}


                
                <div class="col-lg-12">
                   
                    <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Id</th>
                                    <th>Order Id</th>
                                    <th>Amount Received</th>
                                    
                                    <th>Payment Mode</th>
                                    <th>Payment Status</th>
                                    <th>Deliver Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deliver_orderbydelmen as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $item['orders']->tracking_no }}</td>
                                        <td>{{ $item->amount_received }}</td>
                                                                              
                                        <td>{{ $item->payment_mode }}</td>
                                        <td>{{ $item->payment_status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('MMM Do YYYY')}}</td>
                                         
                                       
                                        
                                       
                                         
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