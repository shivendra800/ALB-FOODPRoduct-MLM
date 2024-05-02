@extends('admin.layouts.master')
@section('title', 'Purchase History Details')


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
                                    
                                    <div class="col-md-4 mt-2">
                                        <div class="row">
                                            <div class="form-group col-md-12 mt-4"  align="center">
                                        
                                                <button type="submit" class="  btn btn-primary mr-2"  >Search</button>
                                             
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
                                 <span style="color:#007bff">Purchase</span> > Purchase History Details </div>
                               <br>
                               <div class="card-body">
                       
                            <div class="table-responsive">
                                <table  id="myTable" class="table table-striped table-bordered">
                                    <thead >
                                        <tr>
                                            <th>Invoice ID</th>
                                            <th>Previous Balance</th>
                                            <th>Total Billing</th>
                                            <th>Grand Total</th>
                                            <th>Paid Amount</th>
                                            <th>Remaining Amount</th>
                                            <th>Date Of Purchase</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchase_history_details as $item)
                                        <tr>
                                            
                                            <td>{{ $item->invoice_id }}</td>
                                            <td> <i class="icon-copy fa fa-rupee text-success" aria-hidden="true"></i> {{ $item->previous_balance }}</td>
                                            <td><i class="icon-copy fa fa-rupee text-success" aria-hidden="true"></i>{{ $item->total_billing }}</td>
                                            <td><i class="icon-copy fa fa-rupee text-success" aria-hidden="true"></i>{{ $item->grand_total }}</td>
                                            <td><i class="icon-copy fa fa-rupee text-success" aria-hidden="true"></i>{{ $item->paid_amount }}</td>
                                            <td><i class="icon-copy fa fa-rupee text-success" aria-hidden="true"></i>{{ $item->remaining_amount }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td class="td-actions">
                                        
                                                <a href="{{url('view-all-product/'.$item->invoice_id)}}" class="btn btn-danger  btn-sm" data-original-title="Remove">
                                                    View List
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
    </div>
</div>

@endsection
 