@extends('admin.layouts.master')
@section('title', 'Product')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                <div class="card-header">
                                 <span style="color:#007bff">Product</span> > All Products</div>
                        
                
                <div class="col-lg-12">
                   <br>
                   <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                    <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <!--<th>Status</th>-->
                                    <!--<th>Deals</th>-->
                                    <th>Remaining Qty</th>
                                    <th>Original Qty</th>
                                    <th>Cost Price</th>
                                   
                                    <th>Original(cut/dis) Price/Unit</th>
                                    <th>Selling Price/Unit</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item['category']->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <!--<td>{{ $item->status }}</td>-->
                                    <!--<td>{{ $item->deals }}</td>-->
                                    <td class="text-danger">{{ $item->qty}} {{ $item->unit }}</td>
                                    <td >{{ $item->original_qty}} {{ $item->unit }}</td>
                                    <td >{{ $item->cost_price}}/{{ $item->unit }}</td>
                                     
                                    
                                    <td>{{ $item->original_price }}/{{ $item->unit }}</td>
                                    <td>{{ $item->selling_price }}/{{ $item->unit }}</td>
                                     
                                    <td>
                                        <img src="{{ asset('admin_asset/uploads/product/'.$item->image) }}" alt="Image here"
                                            class="cate-image">
                                    </td>
                                    
                                    <td class="td-actions">
                                        <a href="{{url('Edit-Product/'.$item->id)}}" style="margin-top:.6rem; width:100%"  class="btn btn-primary btn-sm text-light" data-original-title="Edit Task">
                                            <i class="zmdi zmdi-edit"></i>
                                         </a>
                                        <a href="{{url('Delete-Product/'.$item->id)}}" style="margin-top:.6rem; width:100%"  class="btn btn-danger btn-sm" data-original-title="Remove">
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