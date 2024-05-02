@extends('index')
@section('title', 'My Profile')
@section('content')
  
    <div class="container my-5">
    <h2 style="font-family: 'Poppins', sans-serif;"><span style="color:#008DE2;">My </span>Profile</h2>
        <!--<h4 style="font-family: 'Poppins', sans-serif;"><span style="color:#008DE2;">Member ID:: </span>{{ Auth::user()->member_id }}</h4>-->
        <div class="card shadow wishlsititemdiv bg-dark">
            <div class="card-body">
               
                
                  <div class="row d-flex   contact-info">
                    
                    <div class="col-md-4 d-flex">
                        <div class="info   p-4 form-group">
                          
                           <a class="bg-warning p-2 text-dark">Member ID:: </span>{{ Auth::user()->member_id }}</a>
                        </div>
                    </div>
                   
                    <div class="col-md-3 d-flex">
                        <div class="info  p-4">
                            <a href="{{url('/')}}/User-Level-Transection" class="bg-warning p-2 text-dark">Level Income Transection</a>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex">
                        <div class="info   p-4">
                            <a href="{{url('/')}}/User-wallet" class="bg-warning p-2 text-dark">Wallet</a>
                        </div>
                    </div>


                    <div class="col-md-2 d-flex">
                        <div class="info   p-4">
                            <a href="{{url('/')}}/withdraw" class="bg-warning p-2 text-dark">Witdraw</a>
                        </div>
                    </div>

                    <div class="col-md-1 d-flex ">
                        <div class="info  p-4">
                            <a href="{{url('/')}}/tree-view" class="bg-warning p-2 text-dark">Customer</a>
                        </div>
                    </div>
                    
                  </div>
               
            </div>

            
             
             
            
             
        </div>

        

        
    </div>
  
@endsection
@section('script')


@endsection
