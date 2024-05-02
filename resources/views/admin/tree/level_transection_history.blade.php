@extends('admin.layouts.master')
@section('title', 'Level Transection History')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                                 <span style="color:#007bff">All Combo-Item-User-User-Wise</span> Level Transection History</div>

                        <div class="card-body">
                            <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                           <div class="table-responsive">
                                <table  id="myTable" class="table table-striped table-bordered" id="myTable">
                                    <thead >
                                        <tr>
                                            <th>Id</th>
                                            <th>User ID</th>
                                            <th>Product Amount</th>
                                           
                                            <th>Level Position/%</th>
                                           
                                            <th>Amount Get</th>
                                            <th>Remainng Amount</th>
                                             <th>Date Of Transection</th>
                                             <th>Used By</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($levelincome as $levelincome)
                                        <tr>
                                            <td>{{ $levelincome->id }}</td>
                                            <td>{{$levelincome->introname}}--{{$levelincome->intronewid}}</td>
                                            <td>Rs.{{ $levelincome->package }}</td>
                                           
                                            <td>{{ $levelincome->position }}/{{ $levelincome->percentage }}%</td>
                                            <td>Rs.{{ $levelincome->rs }}</td>
                                            <td>Rs.{{ $levelincome->remainng_amount }}</td>
                                            <td>{{ \Carbon\Carbon::parse($levelincome->created_at)->isoFormat('MMM Do YYYY')}}</td>
                                            <td>{{ $levelincome->custnewid}}--{{$levelincome->custname}}</td>
                                        
                                           
                                                
                                             
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