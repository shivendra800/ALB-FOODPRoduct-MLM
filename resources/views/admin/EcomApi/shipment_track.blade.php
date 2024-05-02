@extends('admin.layouts.master')
@section('title', 'Ecom-Tack-Shipment')


@section('content')

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
                                <form action="{{url('shipment-track-view')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="username" value="ALBFOODPRODUCTS416210">
                                    <input type="hidden" name="password" value="XJKXmpOIb8">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="control-label mb-1">Enter Awb No To Get Details Of the Shippment</label>
                                            <input id="awb" name="awb" type="text" required
                                                class="form-control" value="{{old('awb')}}">
                                            
                                        </div>

                                        

                                    </div>
                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn  btn-info "> Submit </button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

                                        

    </div>
@endsection
