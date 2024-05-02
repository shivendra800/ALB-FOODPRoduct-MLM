@extends('admin.layouts.master')
@section('title', 'FetchAWB')


@section('content')
<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="card">
                        <div class="card-header">
                                 <span style="color:#007bff">FetchAWB No List</span> ></div>

                               <div class="card-body">
                               <input id="myInput" placeholder="Search" style="height:40px; border:.5px solid grey;width:100%;padding-left:.3rem;margin-bottom:2rem;margin-top:1rem;" />
                </div>
                
                <div class="col-lg-12">
                   
                    <div class="table-responsive table--no-card m-b-30">
                        <table  id="myTable"  class="table table-bordered">
                            <thead>
                                <tr>
                                   
                                     
                                    <th >Reference Id</th>
                                    <th class="text-center" colspan="5">AWB NO</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                            <td  >{{$data["reference_id"]}}</td> 
                            <td> {{$data["awb"][0]}}</td>
                             <td>{{$data["awb"][1]}}</td>
                            <td> {{$data["awb"][2]}}</td>
                            <td> {{$data["awb"][3]}}</td>
                             <td>{{$data["awb"][4]}}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection