@extends('admin.layouts.master')
@section('title', 'Delivery')


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
                                    <th>ID Proof Type</th>
                                    <th>ID No</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($delivery_men as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->id_proof }}</td>
                                        <td>{{ $item->id_proof_no }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->password }}</td>
                                        <td>
                                            <img src="{{ asset('admin_asset/uploads/deliverymen/' . $item->image) }}" alt="Image here"
                                                class="cate-image" width="50px;" height="50px;">
                                        </td>
                                        
                                        <td class="td-actions">
                                            <a href="{{url('Edit-Delivery-Men/'.$item->id)}}" style="margin-top:.6rem; width:100%" class="btn btn-primary  btn-sm" data-original-title="Edit Task">
                                                <i class="zmdi zmdi-edit"></i>
                                             </a>
                                            <a href="{{url('Delete-Delivery-Men/'.$item->id)}}" style="margin-top:.6rem; width:100%" class="btn btn-danger  btn-sm" data-original-title="Remove">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                            <a href="{{url('Assign-pincode/'.$item->id)}}" style="margin-top:.6rem; width:100%" class="btn btn-danger  btn-sm" >
                                               Assign Pincode
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