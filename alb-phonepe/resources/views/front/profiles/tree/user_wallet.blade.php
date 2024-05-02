@extends('index')
@section('title', 'User Wallet Amount')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
           

            <div class="row">
                <div class="col-md-12 p-5">
                
                    <div class="card-header">
                                 <span style="color:#007bff">User Wallet Amount</span></div>
                                
                            

                        <div class="card-body">

                            <div class="card p-5">

                                <div class="row">
                                    @if($fromdate['order_combo_product_date'] >= $todate)
                                       @if($getcount == 0 )
                                       {{$getcount}} days left&nbsp;&nbsp; Or &nbsp;&nbsp;
                                       <span> {{ \Carbon\Carbon::parse($getdiffdate->order_combo_product_date)->diffForHumans() }}</span>
                                       <span class="text-danger">Today is last day of  your MLM account . Plz Order Combo Product   activation of your account for  MLM ! or activate via wallet if you have min balance Rs 100.</span>
                                       @else
                                       {{$getcount}} days left&nbsp;&nbsp; Or &nbsp;&nbsp;
                                       <span> {{ \Carbon\Carbon::parse($getdiffdate->order_combo_product_date)->diffForHumans() }}</span>
                                       @endif
                    
                                    @else
                                    <span>Your Acoount is deactivated on</span>&nbsp;&nbsp;
                                    <span>{{ \Carbon\Carbon::parse($getdiffdate['order_combo_product_date'])->isoFormat('MMM Do YYYY')}}</span>&nbsp;&nbsp; that is &nbsp;&nbsp;
                                    <span> {{ \Carbon\Carbon::parse($getdiffdate->order_combo_product_date)->diffForHumans() }}</span>
                                    <br>
                            

                                    <br>

                                   
   
                    
                                    @endif
                    
                                </div>
                                <br>


                            @if($getlastorderdate)
                            <div class="table-responsive">
                                @if($levelincome)
                                    <span class="  btn btn-warning">Rs:{{$levelincome->total}}</span>          
                                @else
                                    <span class="  btn btn-warning">Rs.0.00</span>
                                @endif
                            </div>

                            @else
                            <form action="{{url('/')}}/withdrwal-wallet-amount" method="post">
                                @csrf
                                               
                                <button type="submit" class="btn btn-danger">Activate Account</button>
                                <br>
                                <span>Activate Your Account Using Your Wallet Amount , And the Acctivation charges Will be onlt /Rs.100 That will deducted from your Wallet! </span>
                            </form>

                            <div class="table-responsive">
                                @if($levelincome)
                                    <span class="  btn btn-warning">Rs:{{$levelincome->total}}</span>          
                                @else
                                    <span class="  btn btn-warning">Rs.0.00</span>
                                @endif
                            </div>

                            @endif

                            
                          
                          
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>

@endsection