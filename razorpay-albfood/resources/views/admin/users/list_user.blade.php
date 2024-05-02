@extends('admin.layouts.master')
@section('title', 'User List')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                                 <span style="color:#007bff">Registered</span> Users</div>

                        <div class="card-body">
                            <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                           <div class="table-responsive">
                                <table  id="myTable" class="table table-striped table-bordered" id="myTable">
                                    <thead >
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Wallet Amt</th>
                                             <th>Action</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name .' '.$item->lname}}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            
                                            <td class="text-danger">
                                                @if(!empty($item->getuserincome->total))
                                                Rs.{{$item->getuserincome->total}}</td>
                                                @else
                                                Rs.0.00
                                                @endif
                                                
                                            <td class="td-actions">
                                                <a href="{{url('view-users/'.$item->id)}}" class="btn btn-info" data-original-title="Edit Task">
                                                    View
                                                 </a>
                                                  <a href="{{url('view-userwise-withdrawl/'.$item->id)}}" class="btn btn-info" data-original-title="Edit Task">
                                                    View Amount Withdarw List
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