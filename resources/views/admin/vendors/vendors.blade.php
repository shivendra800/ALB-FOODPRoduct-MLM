@extends('admin.layouts.master')
@section('title', 'Vendor List')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Vendors</span> > All Vendors</div>
                       <br> <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead >
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Shop Name</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                             <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vendors as $vendor)
                                        <tr>
                                            <td>{{ $vendor->id }}</td>
                                            <td>{{ $vendor->vendor_name}}</td>
                                            <td>{{ $vendor->shop_name }}</td>
                                            <td>{{ $vendor->shop_mobile }}</td>
                                            <td>{{ $vendor->shop_city }}</td>
                                            <td class="td-actions">
                                                {{-- <a href="{{url('view-users/'.$vendor->id)}}"  class="btn btn-info" data-original-title="Edit Task">
                                                    View
                                                 </a> --}}
                                                 <a href="{{url('add-edit-vendor/'.$vendor->id)}}" class="btn btn-info" data-original-title="Edit Task">
                                                    Edit Vendor
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
