@extends('admin.layouts.master')
@section('title', 'Dashboard')


@section('content')


    <style>
        .headoverview {
            height: 75px !important;
            padding-left: 1rem;
            background-image: url('');

            padding: .7rem !important;
            padding-top: -1.3rem !important;
            display: flex;
            width: 100%;
            justify-content: space-between;

        }

        #row thead tr {
            background-color: grey;
        }


        #overview .col-md-3 {
            background-color: green !important;
        }
    </style>

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p10">
            <div class="container-fluid">
                
                <h2 class="title-1 text-center "> Overview</h2>
               
                <br>
                <hr>
                <span class="text-danger"><h4>Total Admin Level Income Wallet Amount</h4></span>
                <br> 
                <div class="row">
                   

                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon ">
                                        <i class="zmdi zmdi-money zmdi-hc-fw"></i>
                                    </div>
                                    <br>
                                    <div class="text">
                                        @if($levelincome)
                                        <h2>{{round($levelincome->total, 2)}}</h2>
                                        @else
                                         <h2>0.00</h2>
                                         @endif
                                        
                                        <span>Total Wallet Amt </span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>




                <div class="row m-t-25" id="overview">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <br>
                                    <div class="text">
                                        <h2>{{ $totalProducts }}</h2>
                                        <span>Total Item</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                  

                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon ">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <br>
                                    <div class="text">
                                        <h2>{{ $totalUser }}</h2>
                                        <span>Total Users</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3" style="background-color:red;">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <br>
                                    <div class="text">
                                        <h2>{{ $totalCategories }}</h2>
                                        <span>Total Category</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c4">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                    <br>
                                    <div class="text">
                                        <h2>{{ $totalsale }}</h2>
                                        <span>Total earnings</span>
                                 <a href="{{ url('AdminAll-Transection') }}" class="text-white">view</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5">
                            <label class="text-white">Total Orders</label>
                            <h1>{{ $totalOrder }}</h1>
                            {{-- <a href="{{ url('admin/orders') }}" class="text-white">view</a> --}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Today Orders</label>
                            <h1>{{ $todayOrder }}</h1>
                              <a href="{{ url('Pending-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>This Month Orders</label>
                            <h1>{{ $thisMonthOrder }}</h1>
                            {{-- <a href="{{ url('admin/orders') }}" class="text-white">view</a> --}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5  text-white mb-3">
                            <label>This Year Orders</label>
                            <h1>{{ $thisYearOrder }}</h1>
                            {{-- <a href="{{ url('admin/orders') }}" class="text-white">view</a> --}}
                        </div>
                    </div>
                    <hr>

                    <!--<div class="col-md-3">-->
                    <!--    <div class="overview-item overview-item--c5   text-white mb-3">-->
                    <!--        <label>Total Product</label>-->
                    <!--        <h1>{{ $totalProducts }}</h1>-->
                    <!--        {{-- <a href="{{ url('admin/products') }}" class="text-white">view</a> --}}-->
                    <!--    </div>-->
                    <!--</div>-->






                    <hr>
                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Total pending Order</label>
                            <h1>{{ $totalpending }}</h1>
                             <a href="{{ url('Pending-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Total pending Order Today</label>
                            <h1>{{ $totalpendingtodayOrder }}</h1>
                             <a href="{{ url('Pending-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Total pending Order Months</label>
                            <h1>{{ $totalpendingMonths }}</h1>
                             <a href="{{ url('Pending-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5  text-white mb-3">
                            <label>Total pending Order Year</label>
                            <h1>{{ $totalpendingYearOrder }}</h1>
                            <a href="{{ url('Pending-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>



                    <hr>

                   
                    <hr>




                </div>
                
                   <div class="row">
                     <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Total Delivered Order</label>
                            <h1>{{$totalorderdelivered}}</h1>
                             <a href="{{ url('Delivered-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Total Today Delivered Order</label>
                            <h1>{{$totalDayorderdelivered}}</h1>
                             <a href="{{ url('Delivered-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Total This Month Delivered Order</label>
                            <h1>{{$totalorderdeliveredMonths}}</h1>
                            <a href="{{ url('Delivered-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5  text-white mb-3">
                            <label>Total This Year Delivered</label>
                            <h1>{{$totalorderdeliveredYear}}</h1>
                            <a href="{{ url('Delivered-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>
                </div>
                
                <div class="row">
                     <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Total Sale</label>
                            <h1>{{round($totalsale, 2)}}</h1>
                             <a href="{{ url('Delivered-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Total Sale Today</label>
                            <h1>{{round($totalsale, 2)}}</h1>
                             <a href="{{ url('Delivered-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5   text-white mb-3">
                            <label>Total Sale This Month</label>
                            <h1>{{round($totalSaleMonths, 2)}}</h1>
                            <a href="{{ url('Delivered-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="overview-item overview-item--c5  text-white mb-3">
                            <label>Total Sale This Year</label>
                            <h1>{{round($totalSaleYear, 2)}}</h1>
                            <a href="{{ url('Delivered-orders') }}" class="text-white">view</a> 
                        </div>
                    </div>
                </div>



                <br>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
@section('script')
    <script type="text/javascript">
        function exportExcelPending() {

            window.open("{{ url('/') }}/Stock-Orverview-Report-Excel/", '_self');
        }
    </script>

@endsection
