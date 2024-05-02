@extends('admin.layouts.master')
@section('title', 'Purchase Stock')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            
            <div class="row">
            <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Purchase</span> > Purchase Stock</div>
                               <br>
                               <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:98%;padding-left:.8rem;margin-bottom:2rem;margin-top:1rem; margin-left:.3rem;" />
            
                               <div class="card-body">
               <div class="col-lg-12">
                   <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Available Qty</th>
                                    <th>Original Qty</th>
                                    <th>Cost Price</th>
                                    <th>Selling Price/Unit</th>
                                    <th>Image</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-danger">{{ $item->qty}} {{ $item->unit }}</td>
                                    <td >{{ $item->original_qty}} {{ $item->unit }}</td>
                                    <td >{{ $item->cost_price}} {{ $item->unit }}</td>
                                    <td>{{ $item->selling_price }}/{{ $item->unit }}</td>
                                     
                                    <td>
                                        <img src="{{ asset('admin_asset/uploads/product/'.$item->image) }}" alt="Image here"
                                            class="cate-image" style="width: 170px">
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