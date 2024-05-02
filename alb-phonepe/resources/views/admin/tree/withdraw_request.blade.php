@extends('admin.layouts.master')
@section('title', 'Withdraw Request')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                                 <span style="color:#007bff"></span>Withdraw Request</div>

                        <div class="card-body">
                            <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                           <div class="table-responsive">
                            <table  id="myTable" class="table table-striped table-bordered" id="myTable">
                                <thead >
                                    <tr>
                                        <th>Id</th>
                                        <th>Download PDF</th>
                                        <th>User ID</th>
                                        <th>Bank Details</th>
                                        <th>Account No/Name</th>
                                        <th>Withdraw Req</th>
                                        <th>Status</th>
                                        <th>Request Date</th>
                                        <th>Transaction ID</th>
                                        <th>Upload Slip</th>
                                        <th>Action</th>
                                         
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdrawrequest as $index=>$withdrawrequest)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>
                                            <a href="{{ url('user-account-details/'.$withdrawrequest->id) }}">Customer PDF</a>
                                        </td>
                                        <td>{{ $withdrawrequest['getuser']['member_id'] }}</td>
                                        <td>{{$withdrawrequest->bank_name}}--{{$withdrawrequest->bank_ifsc_code}}--{{ $withdrawrequest->bank_branch }}</td>
                                        <td>{{ $withdrawrequest->account_no }}/{{ $withdrawrequest->account_holder_name }}%</td>
                                        <td>Rs.{{ $withdrawrequest->withdraw_amount_req }}</td>
                                        <td>{{ $withdrawrequest->status }}</td>
                                        <td>{{ \Carbon\Carbon::parse($withdrawrequest->created_at)->isoFormat('MMM Do YYYY')}}</td>
                                         <form action="{{url('/')}}/update-withdraw-request/{{$withdrawrequest->id}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="withdraw_amount_req" value="{{$withdrawrequest->withdraw_amount_req}}">
                                            <input type="hidden" name="withdrawrequest_id" value="{{$withdrawrequest->id}}">
                                            <td><input type="text" name="transaction_id" class="form-control"></td>

                                            <td><input type="file" name="image" class="form-control"></td>
                                            <td><button type="submit">OK</button></td>
                                        
                                        </form>
                                        
                                       
                                            
                                         
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