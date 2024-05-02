@extends('admin.layouts.master')
@section('title', 'Product QTY')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                <div class="card-header">
                                 <span style="color:#007bff">Product</span> > All Products Qty Update</div>
                        
                
                <div class="col-lg-12">
                   <br>
                   <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                    <div class="table-responsive table--no-card m-b-30">
                        <form action="{{ url('stock-Update') }}"  method="post">
                            @csrf
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                    <th>Id</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                   
                                    <th>Remaining Qty</th>
                                    <th>Update Qty</th>
                               
                                   
                                   
                                   
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item['category']->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td >{{ $item->qty}} {{ $item->unit }}</td>
                                    <td>
                                        <input type="hidden" name="id[]" value="{{$item->id}}">
                                        <input type="number" name="qty[]" value="0" class="forn-control">
                                    </td>
                                 
                                     
                                    
                                  
                                 
                                    
                                 
                                    
                                 </tr>
                                  @endforeach
                            </tbody>
                        </table>
                        <div  class="text-center">
                            <button type="submit" class="btn btn-primary">Update Qty</button>
                          </div>
                          
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection