@extends('admin.layouts.master')
@section('title', 'Category')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
            <div class="card">
                            <div class="card-header">
                                 <span style="color:#007bff">Category</span> > All Category</div>
                            <div class="card-body">
                            <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                
                <div class="col-lg-12">
                   
                    <div class="table-responsive table--no-card m-b-30">
                        <table  class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                   
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Deals</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                 
                                        <td>
                                            @if($item->deals==1)
                                                <button>Deals</button>
                                            @else
                                             <button> No Deals</button>
                                            @endif
                                           
                                            </td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            <img src="{{ asset('admin_asset/uploads/category/'.$item->image) }}" width="90px"  alt="Image here"
                                                class="cate-image">
                                        </td>
                                        @if($item->name == "Combo")
                                        
                                        <td class="td-actions">
                                            <button type="button"  class="btn btn-success btn-sm" disabled> <i class="fa fa-edit"></i></button>
                                            <button type="button"  class="btn btn-danger btn-sm" disabled> <i class="zmdi zmdi-delete"></i></button>
                                            
                                        </td>
                                        @else
                                        <td class="td-actions">
                                            <a href="{{url('Edit-Category/'.$item->id)}}" style="margin-top:.6rem; width:100%"  class="btn btn-success btn-sm" data-original-title="Edit Task">
                                                <i class="fa fa-edit"></i>
                                             </a>
                                            <a href="{{url('Delete-Category/'.$item->id)}}" style="margin-top:.6rem; width:100%"  class="btn btn-danger btn-sm" data-original-title="Remove">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </td>
                                        @endif

                                            
                                         
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