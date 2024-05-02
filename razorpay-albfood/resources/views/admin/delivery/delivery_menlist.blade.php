@extends('admin.layouts.master')
@section('title', 'Delivery Men list')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Delivery</span> > Delivery Men List</div>

                               <div class="card-body">
                               <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                </div>
                
                <div class="col-lg-12">
                   
                    <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>                                  
                                    <th>Email</th>
                                    <th>Total Cash Collection</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($delivery_men as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>                                                                            
                                        <td>{{ $item->email }}</td> 
                                        <td class="btn btn-warning">Rs.{{ $item->total_cash }}</td>                                                                              
                                        <td class="td-actions">
                                            <a href="{{url('Delivery-orderList/'.$item->id)}}" style="margin-top:.6rem; width:100%" class="btn btn-primary  btn-sm" data-original-title="View all orders">
                                               View All Orders
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