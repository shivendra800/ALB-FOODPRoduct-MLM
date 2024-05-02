@extends('admin.layouts.master')
@section('title', 'Purchase History')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Search</span> > Vendors </div>
                               <br>
                               <div class="card-body">
                            <form class="" method="POST" action="">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                           
                                             <select name="vendor_id" id="vendor_name" class="form-control">
                                                <option value="">Select Vendor</option>
                                                @foreach ($purchase_history as $vendor)
                                                <option value="{{ $vendor->id}}" >{{ $vendor->vendor_name}}</option>
                                                @endforeach
                                             </select>
                                           
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-3  ">
                                        <button type="submit" class="  btn btn-primary mr-2"  >Search</button>
                                    </div>
                                    <div class="col-md-3"></div>
                                    
                                    
                                </div>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Purchase</span> > Purchase History </div>
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
                                                <a href="{{url('Purchase-history-details/'.$vendor->id)}}" class="btn btn-info" data-original-title="Edit Task">
                                                    View Details
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
