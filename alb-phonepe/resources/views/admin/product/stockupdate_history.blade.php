@extends('admin.layouts.master')
@section('title', 'Product Update Stock History ')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                <div class="card-header">
                                 <span style="color:#007bff">Product Update Stock History</span></div>
                        
                
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
                                   
                                    <th>Original Qty</th>
                                    <th>Updated Qty</th>
                                    <th>After Updated Qty</th>
                               
                                   
                                   
                                   
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stockupdate_history as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item['category']->name }}</td>
                                    <td>{{ $item['product']->name }}</td>
                                    <td>{{ $item->original_qty }}</td>
                                   
                                    <td >{{ $item->updated_qty}}</td>
                                    <td >{{ $item->total_qty}}</td>
                                   
                                 
                                     
                                    
                                  
                                 
                                    
                                 
                                    
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