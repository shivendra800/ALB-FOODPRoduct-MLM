@extends('admin.layouts.master')
@section('title', 'Delivery Order list')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Delivery</span> > Cash Recive Histroy</div>

                               <div class="card-body">
                               <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                </div>

                
           </div>

                
                <div class="col-lg-12">
                   
                    <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Id</th>
                                    <th>Recive Amount</th>
                                    <th>Total Amount</th>
                                    
                                    <th>After Recive Total Amt</th>
                                    <th>Created Date</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getamount as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>Rs.{{ $item->recive_amount }}</td>
                                                                              
                                        <td>Rs.{{ $item->total_amount }}</td>
                                        <td>Rs.{{ $item->after_recive_total_amt }}</td>
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