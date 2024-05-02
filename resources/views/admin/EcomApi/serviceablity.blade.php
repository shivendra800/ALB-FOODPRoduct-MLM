@extends('admin.layouts.master')
@section('title', 'SERVICEABILITY')


@section('content')

    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                    <div class="card-header">
                                 <span style="color:#007bff">Ecom</span> SERVICEABILITY</div>
                            <div class="card-body">
                
                                <div class="card-title">
                          
                                </div>
                                <hr>
                                <form action="{{url('SERVICEABILITY-view')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="username" value="ALBFOODPRODUCTS416210">
                                    <input type="hidden" name="password" value="XJKXmpOIb8">
                            
                                    </div>
                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn  btn-info "> View All SERVICEABILITY OF Ecom </button>
                                        
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
