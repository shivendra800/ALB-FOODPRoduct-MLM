@extends('admin.layouts.master')
@section('title', 'Shipment Cancellation')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">Shipment Cancellation Data Via Awb No</span> ></div>

                               <div class="card-body">
                               <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                </div>
                
                <div class="col-lg-12">
                   
                    <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                     
                                    <th >Reason</th>
                                    <th >Order No </th>
                                    <th >Awb No  </th>
                                    <th >Status</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                             
                            <td> {{$data[0]['reason']}}</td>
                             <td>{{$data[0]['order_number']}}</td>
                            <td> {{$data[0]['awb']}}</td>
                            <td>
                                @if($data[0]['success']==1)
                                    True
                                 {{-- {{$data[0]['success']}} --}}
                                 @else
                                 False

                                 @endif
                            
                            </td>
                             
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection