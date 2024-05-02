@extends('admin.layouts.master')
@section('title', 'Product List With InvoiceId')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="title-5 m-b-35">Product List With InvoiceId</h3>
                </div>
                
                <div class="col-lg-12">
                   
                    <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Invoice ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    
                                    <th>Unit/Price</th>
                                    <th>QTY</th>
                                    <th>Total Price</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($view_all_product as $item)
                                <tr>
                                    <td>{{ $item->invoice_id }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>
                                        <img src="{{ asset('admin_asset/uploads/product/'.$item->product_image) }}" alt="Image here"
                                            class="cate-image" style="height: 30px;">
                                    </td>
                                    
                                    <td> <i class="icon-copy fa fa-rupee text-success" aria-hidden="true"></i>{{ $item->price}}</td>
                                    <td>{{ $item->qty}}</td>
                                    <td><i class="icon-copy fa fa-rupee text-success" aria-hidden="true"></i>{{ $item->total_price }}</td>
                                   
                                    
                                    
                                 </tr>
                                  @endforeach
                            </tbody>
                            <tfoot style="width:100%">
                                <tr >
                                    <th colspan="5" class="text-right">Total Price :    </th>
                                   <th colspan="2">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<i class="icon-copy fa fa-rupee text-success" aria-hidden="true"></i>     {{ $item->total_billing }}</th>
                                  </tr>
                               
                              
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection