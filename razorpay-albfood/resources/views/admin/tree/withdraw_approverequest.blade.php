@extends('admin.layouts.master')
@section('title', 'Withdraw Approve Request')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                                 <span style="color:#007bff"></span> Withdraw Approve Request</div>

                        <div class="card-body">
                            <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                           <div class="table-responsive">
                            <table  id="myTable" class="table table-striped table-bordered" id="myTable">
                                <thead >
                                    <tr>
                                        <th>Id</th>
                                        <th>User ID</th>
                                        <th>Bank Details</th>
                                        <th>Account No/Name</th>
                                        <th>Withdraw Req</th>
                                        <th>Status</th>
                                        <th>Updated Date</th>
                                        <th>Transection ID</th>
                                        <th>Image</th>
                                        
                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdrawapprequest as $index=>$withdrawrequest)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{ $withdrawrequest->user_id }}</td>
                                        <td>{{$withdrawrequest->bank_name}}--{{$withdrawrequest->bank_ifsc_code}}--{{ $withdrawrequest->bank_branch }}</td>
                                        <td>{{ $withdrawrequest->account_no }}/{{ $withdrawrequest->account_holder_name }}%</td>
                                        <td>Rs.{{ $withdrawrequest->withdraw_amount_req }}</td>
                                        <td>{{ $withdrawrequest->status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($withdrawrequest->created_at)->isoFormat('MMM Do YYYY')}}</td>
                                        <td>{{ $withdrawrequest->transaction_id }}</td>
                                        <td>
                                           <a href="{{url('/')}}/admin_asset/upload_payment_slip/{{$withdrawrequest->upload_payment_slip}}" download=""><img src="{{ asset('admin_asset/upload_payment_slip/'.$withdrawrequest->upload_payment_slip) }}" alt="Image here"
                                                class="upload_payment_slip" style="width: 80px;">Download</a> 
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