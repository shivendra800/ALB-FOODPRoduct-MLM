@extends('admin.layouts.master')
@section('title', 'Purchase Bill Update')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Purchase</span> > Purchase Bill Update </div>
                               <br>
                               <div class="card-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table  id="myTable" class="table table-striped table-bordered">
                                    <thead >
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>GST No</th>
                                            <th>Email</th>
                                            <th>Balance</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchase_history as $vendor)
                                        <tr>
                                            <td>{{ $vendor->id }}</td>
                                            <td>{{ $vendor->vendor_name}}</td>
                                            <td>{{ $vendor->shop_mobile }}</td>
                                            <td>{{ $vendor->shop_gstno }}</td>
                                            <td>{{ $vendor->shop_email }}</td>
                                            <td>{{ $vendor->v_wallet }}</td>
                                            <td class="td-actions">
                                                <a href="{{url('Purchase-Bill-Update/'.$vendor->id)}}" class="btn btn-info" data-original-title="Edit Task">
                                                    Update Bill
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
