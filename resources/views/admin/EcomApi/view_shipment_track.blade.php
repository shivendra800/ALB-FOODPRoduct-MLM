<!--@extends('admin.layouts.master')-->
<!--@section('title', 'Ecom-Tack-Shipment')-->


<!--@section('content')-->

<div class="main-content">
    <div class="section__content section__content--p10">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                <div class="card-header">
                             <span style="color:#007bff">Ecom</span> Track Shipment</div>
                        <div class="card-body">
            
                            <div class="card-title">
                      
                            </div>
                            <hr>
                            
                                
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label mb-1" style="font-size: 1.25rem"> AWB No. | Order No: </label>
                                        <br>
                                        
                                      <h4 class="text-primary " style="font-size:25px;text-decoration:underline;" >{{$data["object"]["field"][0]}}|{{$data["object"]["field"][1]}}</h4>
                                       
                                       <br>
                                       <label class="control-label mb-1" style="font-size: x-large;  color: #1d1d6a;">  {{$data["object"]["field"][36]["object"][0]["field"][1]}}| {{$data["object"]["field"][3]}}, {{$data["object"]["field"][30]}} </label>
                                        
                                      
                                      
                                      
                                      <br>
                                     <label class="control-label mb-1" style=" font-size: 1.25rem;  color: green;"> <b> {{$data["object"]["field"][19]}}</b></label>
                                      
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <label class="control-label mb-1" style="font-size:1.25rem;"> Information Received</label>
                                      <br>
                                       
                                      <label class="control-label mb-1" style="font-size:1.25rem; color:black;font-weight: 500;">{{$data["object"]["field"][36]["object"][3]["field"][0]}} hrs</label> 
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                      <br>
                                       <label class="control-label mb-1" style="font-size:1.5rem"> Customer Details: </label>
                                       <br>
                                       <br>
                                        
                                        <label class="control-label mb-1" style="font-size:1.25rem;color:black">Name: </label> {{$data["object"]["field"][8]}} 
                                      
                                      <br>
                                      
                                      <label class="control-label mb-1" style="font-size:1.25rem;color:black">District:</label> {{$data["object"]["field"][4]}}| {{$data["object"]["field"][30]}}
                                        
                                    
                                      <br>
                                      <label class="control-label mb-1" style="font-size:1.25rem;color:black">Product Delivery Date: </label>{{$data["object"]["field"][22]}}
                                        
                                      <br>
                                      <label class="control-label mb-1" style="font-size:1.25rem;color:black">Product Delivery Pincde:   </label>{{$data["object"]["field"][28]}}
                                        
                                    </div>
                                    
                                    

                                    

                                </div>
                               
                              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--@endsection-->
