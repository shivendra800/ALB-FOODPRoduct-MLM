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
                                 <span style="color:#007bff">Ecom</span> FetchAWB</div>
                            <div class="card-body">
                
                                <div class="card-title">
                          
                                </div>
                                <hr>
                                <form action="{{url('FetchAWB-No-view')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="username" value="ALBFOODPRODUCTS416210">
                                    <input type="hidden" name="password" value="XJKXmpOIb8">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                           <h5> FETCH WAYBILL (pre-allocated waybill tracking ID series)</h5>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Type  <span class="text-danger">*</span></label>
                                                    <div class="controls">
                                                        <select name="type" id="type" class="form-control" required>
                                                            <option value="" selected="" disabled="">Select Type</option>
                                                            <option @if (old('type') == 'HWPPD') selected @endif  value="HWPPD">HWPPD</option>
                                                            <option @if (old('type') == 'HWCOD') selected @endif value="HWCOD">HWCOD</option>
                                                            <option @if (old('type') == 'PPD') selected @endif value="PPD">PPD</option>
                                                            <option @if (old('type') == 'COD') selected @endif value="COD">COD</option>
                                                            <option @if (old('type') == 'REV') selected @endif value="REV">REV</option>

                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
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
