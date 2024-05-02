<style>
.main-content{
 background-color:white !important;
}
.menu-sidebar{
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;

}



.logo{
   background-image:url('https://img.freepik.com/free-vector/modern-banner-with-abstract-low-poly-design_1048-14340.jpg?w=2000') !important;
}

.navbar-sidebar li{
    border-bottom:.3px solid grey;
}

.navbar-sidebar li:hover{
    transform:scale(.95);
    transition:.2s;
}

.header-desktop{
    box-shadow:none;
}
</style>
       
       <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner ">
                        <span class="text-center">  
                        @if(Auth::user()->role_as == '1') 
                        Admin
                        @elseif(Auth::user()->role_as == '2')
                         Delivery Boy
                        @endif
                        
                        </span>
                        
                        {{-- <a class="logo" href="{{url('/')}}//dashboard">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="CoolAdmin" />
                           
                        </a> --}}
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    {{-- admin section --}}
                    @if(Auth::user()->role_as == '1') 
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="{{ Request::is('dashboard') ? 'active':''}} has-sub">
                            <a class="js-arrow " href="{{url('/')}}/dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                             
                        </li>
                        
                          <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Ecom Express</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Ecom-Login-Data') ? 'active':''}}">
                                    <a href="{{url('/')}}/Ecom-Login-Data" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Ecom-Login-Data</a>
                                </li>
                                <li class="{{ Request::is('Create Shipment') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/shipment-activity/manifest-shipment" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Create Shipment</a>
                                </li>
                                <li class="{{ Request::is('Rate Calculator') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/technical/rate-calculator" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Rate Calculator</a>
                                </li>
                                <li class="{{ Request::is('NDR Management') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/shipment-activity/ndr-management" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>NDR Management</a>
                                </li>
                                <li class="{{ Request::is('POD Management') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/shipment-activity/pod/:pod" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>POD Management</a>
                                </li>
                                <li class="{{ Request::is('Shipment Label') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/shipment-activity/shipment-label" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Shipment Label</a>
                                </li>
                                <li class="{{ Request::is('Shipment-Track') ? 'active':''}}">
                                      <a href="{{url('/')}}/Shipment-Track"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Shipment-Track</a>
                                </li>
                                <li class="{{ Request::is('FetchAWB-No') ? 'active':''}}">
                                    <a href="{{url('/')}}/FetchAWB-No"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>FetchAWB-No</a>
                              </li>
                              {{-- <li class="{{ Request::is('SERVICEABILITY') ? 'active':''}}">
                                <a href="{{url('/')}}/SERVICEABILITY"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>SERVICEABILITY</a>
                              </li> --}}
                            <li class="{{ Request::is('Shipment-Cancellation') ? 'active':''}}">
                                <a href="{{url('/')}}/Shipment-Cancellation"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Cancel Shipment</a>
                            </li>
                           
                               
                                 
                            </ul>
                        </li>
                        
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Categories</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Category') ? 'active':''}}">
                                      <a href="{{url('/')}}/Category"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Categories</a>
                                </li>
                                <li {{ Request::is('Add-Category') ? 'active':''}}>
                                    <a href="{{url('/')}}/Add-Category"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Add Categories</a>
                                </li>
                                 
                            </ul>
                        </li>
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Product</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Product') ? 'active':''}}">
                                      <a href="{{url('/')}}/Product"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Product</a>
                                </li>
                                <li {{ Request::is('Add-Product') ? 'active':''}}>
                                    <a href="{{url('/')}}/Add-Product"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Add Product</a>
                                </li>
                                 
                            </ul>
                        </li>
                          <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Stock</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('stock') ? 'active':''}}">
                                      <a href="{{url('/')}}/stock-Update"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Update Stock</a>
                                </li>
                                
                                 <li class="{{ Request::is('stock') ? 'active':''}}">
                                    <a href="{{url('/')}}/stockUpdate-history"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>UpdateStock Record</a>
                              </li>
                                
                                 
                            </ul>
                        </li>
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Orders</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Pending-orders') ? 'active':''}}">
                                      <a href="{{url('/')}}/Pending-orders"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Pending Orders</a>
                                </li>
                                <li {{ Request::is('Dispatched-orders') ? 'active':''}}>
                                    <a href="{{url('/')}}/Dispatched-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Dispatched Orders</a>
                                </li>
                                <li {{ Request::is('Shipped-orders') ? 'active':''}}>
                                    <a href="{{url('/')}}/Shipped-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Shipped Orders</a>
                                </li>
                                <li {{ Request::is('OutForDelivery-orders') ? 'active':''}}>
                                    <a href="{{url('/')}}/OutForDelivery-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Out For Delivery</a>
                                </li>
                                <li {{ Request::is('Delivered-orders') ? 'active':''}}>
                                    <a href="{{url('/')}}/Delivered-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Delivered Orders</a>
                                </li>
                                <li class="{{ Request::is('Order-Not-Placed') ? 'active':''}}">
                                      <a href="{{url('/')}}/Order-Not-Placed"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Order Not Placed</a>
                                </li>
                                 
                            </ul>
                        </li>
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>User</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('users') ? 'active':''}}">
                                      <a href="{{url('/')}}/users"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Users</a>
                                </li>
                                
                                 
                            </ul>
                        </li>
                        <!--<li class="  has-sub ">-->
                        <!--    <a class="js-arrow" href="#">-->
                        <!--        <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Vendor</a>-->
                        <!--    <ul class="list-unstyled navbar__sub-list js-sub-list">-->
                        <!--        <li class="{{ Request::is('vendors') ? 'active':''}}">-->
                        <!--              <a href="{{url('/')}}/vendors"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>vendors</a>-->
                        <!--        </li>-->
                        <!--        <li {{ Request::is('add-edit-vendor') ? 'active':''}}>-->
                        <!--            <a href="{{url('/')}}/add-edit-vendor"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Add Vendor</a>-->
                        <!--        </li>-->

                        <!--    </ul>-->
                        <!--</li>-->
                        <!--<li class="  has-sub ">-->
                        <!--    <a class="js-arrow" href="#">-->
                        <!--        <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Purchase Order</a>-->
                        <!--    <ul class="list-unstyled navbar__sub-list js-sub-list">-->
                        <!--        <li class="{{ Request::is('Add-Purchase-Order') ? 'active':''}}">-->
                        <!--              <a href="{{url('/')}}/Add-Purchase-Order"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Purchase Order</a>-->
                        <!--        </li>-->
                        <!--        <li class="{{ Request::is('Purchase-Stock') ? 'active':''}}">-->
                        <!--            <a href="{{url('/')}}/Purchase-Stock"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Purchase Stock</a>-->
                        <!--      </li>-->
                        <!--        <li class="{{ Request::is('Purchase-Bill-Update') ? 'active':''}}">-->
                        <!--            <a href="{{url('/')}}/Purchase-Bill-Update"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Bill Update</a>-->
                        <!--        </li>-->
                        <!--        <li class="{{ Request::is('Stock') ? 'active':''}}">-->
                        <!--            <a href="{{url('/')}}/Stock"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Availabe Stock</a>-->
                        <!--        </li>-->
                        <!--        <li class="{{ Request::is('Purchase-History') ? 'active':''}}">-->
                        <!--            <a href="{{url('/')}}/Purchase-History"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Purchase History</a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Delivery Men</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Delivery-Men') ? 'active':''}}">
                                    <a href="{{url('/')}}/Delivery-Men"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Delivery Men list</a>
                                 </li>
                                <li class="{{ Request::is('Add-Delivery-Men') ? 'active':''}}">
                                      <a href="{{url('/')}}/Add-Delivery-Men"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Add Delivery Men</a>
                                </li>
                                 <li class="{{ Request::is('Delivery-MenList') ? 'active':''}}">
                                    <a href="{{url('/')}}/Delivery-MenList"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>DeliveryMen-History</a>
                                 </li>
                               
                            </ul>
                        </li>

                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Customer</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('view-tree') ? 'active':''}}">
                                      <a href="{{url('/')}}/view-tree"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>View Customer</a>
                                </li>

                                <li class="{{ Request::is('Level-Transection') ? 'active':''}}">
                                    <a href="{{url('/')}}/Level-Transection"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Level-Transection</a>
                                </li>

                                <li class="{{ Request::is('AdminAll-Transection') ? 'active':''}}">
                                    <a href="{{url('/')}}/AdminAll-Transection"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>AdminAll-Transection</a>
                                </li>
                                
                               

                            </ul>
                        </li>


                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Withdraw</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                              
                                <li class="{{ Request::is('withdraw-request') ? 'active':''}}">
                                    <a href="{{url('/')}}/withdraw-request"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Withdraw Request</a>
                                   </li>
    
                                   <li class="{{ Request::is('withdraw-Approverequest') ? 'active':''}}">
                                    <a href="{{url('/')}}/withdraw-Approverequest"><i class="zmdi zmdi-menu zmdi-hc-fw"></i> Withdraw Approverequest</a>
                                   </li>
                                   
                               
                            </ul>
                        </li>


                       
                        
                    </ul>
                    @endif
                    {{-- end admin section --}}
                     {{-- Delivery Boy section --}}
                     @if(Auth::user()->role_as == '2')
                     <ul class="list-unstyled navbar__list">
                        <li class="{{ Request::is('DeliveryBoy-Dashboard') ? 'active':''}} has-sub">
                            <a class="js-arrow " href="{{url('/')}}/DeliveryBoy-Dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li {{ Request::is('Shipped-orders') ? 'active':''}}>
                            <a href="{{url('/')}}/Shipped-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Assign Order</a>
                        </li>
                        <li {{ Request::is('OutForDelivery-orders') ? 'active':''}}>
                            <a href="{{url('/')}}/OutForDelivery-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Out For Delivery</a>
                        </li>
                        <li {{ Request::is('Delivered-orders') ? 'active':''}}>
                            <a href="{{url('/')}}/Delivered-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Delivered</a>
                        </li>
                    </ul>
                     @endif
                     {{--End  Delivery Boy section --}}
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block ">
            <div class="logo bg-info text-white">
                <span class="text-center"><i class="fas fa-user"></i> &nbsp;  @if(Auth::user()->role_as == '1') 
                        Admin
                        @elseif(Auth::user()->role_as == '2')
                         Delivery Boy
                        @endif</span>
                {{-- <a href="#">
                    <img src="{{url('/')}}/public/admin_asset/images/icon/logo.png" alt="Cool Admin" />
                </a> --}}
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    {{-- admin section --}}
                    @if(Auth::user()->role_as == '1')
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ Request::is('dashboard') ? 'active':''}} has-sub">
                            <a class="js-arrow " href="{{url('/')}}/dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                             
                        </li>
                          <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Ecom Express</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Ecom-Login-Data') ? 'active':''}}">
                                    <a href="{{url('/')}}/Ecom-Login-Data" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Ecom-Login-Data</a>
                                </li>
                                <li class="{{ Request::is('Create Shipment') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/shipment-activity/manifest-shipment" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Create Shipment</a>
                                </li>
                                <li class="{{ Request::is('Rate Calculator') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/technical/rate-calculator" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Rate Calculator</a>
                                </li>
                                <li class="{{ Request::is('NDR Management') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/shipment-activity/ndr-management" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>NDR Management</a>
                                </li>
                                <li class="{{ Request::is('POD Management') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/shipment-activity/pod/:pod" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>POD Management</a>
                                </li>
                                <li class="{{ Request::is('Shipment Label') ? 'active':''}}">
                                    <a href="https://cp.ecomexpress.in/#/shipment-activity/shipment-label" target="_blank"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Shipment Label</a>
                                </li>
                                <li class="{{ Request::is('Shipment-Track') ? 'active':''}}">
                                      <a href="{{url('/')}}/Shipment-Track"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Shipment-Track</a>
                                </li>
                                <li class="{{ Request::is('FetchAWB-No') ? 'active':''}}">
                                    <a href="{{url('/')}}/FetchAWB-No"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>FetchAWB-No</a>
                              </li>
                              {{-- <li class="{{ Request::is('SERVICEABILITY') ? 'active':''}}">
                                <a href="{{url('/')}}/SERVICEABILITY"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>SERVICEABILITY</a>
                              </li> --}}
                            <li class="{{ Request::is('Shipment-Cancellation') ? 'active':''}}">
                                <a href="{{url('/')}}/Shipment-Cancellation"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Cancel Shipment</a>
                            </li>
                           
                               
                                 
                            </ul>
                        </li>
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Categories</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Category') ? 'active':''}}">
                                      <a href="{{url('/')}}/Category"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Categories</a>
                                </li>
                                <li {{ Request::is('Add-Category') ? 'active':''}}>
                                    <a href="{{url('/')}}/Add-Category"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Add Categories</a>
                                </li>
                                 
                            </ul>
                        </li>
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Product</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Product') ? 'active':''}}">
                                      <a href="{{url('/')}}/Product"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Product</a>
                                </li>
                                <li {{ Request::is('Add-Product') ? 'active':''}}>
                                    <a href="{{url('/')}}/Add-Product"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Add Product</a>
                                </li>
                                 
                            </ul>
                        </li>
                          <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Stock</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('stock') ? 'active':''}}">
                                      <a href="{{url('/')}}/stock-Update"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Update Stock</a>
                                </li>
                                
                                 <li class="{{ Request::is('stock') ? 'active':''}}">
                                    <a href="{{url('/')}}/stockUpdate-history"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>UpdateStock Record</a>
                              </li>
                                
                                 
                            </ul>
                        </li>
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Orders</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Pending-orders') ? 'active':''}}">
                                      <a href="{{url('/')}}/Pending-orders"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Pending Orders</a>
                                </li>
                                <li {{ Request::is('Dispatched-orders') ? 'active':''}}>
                                    <a href="{{url('/')}}/Dispatched-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Dispatched Orders</a>
                                </li>
                                <li {{ Request::is('Shipped-orders') ? 'active':''}}>
                                    <a href="{{url('/')}}/Shipped-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Shipped Orders</a>
                                </li>
                                <li {{ Request::is('OutForDelivery-orders') ? 'active':''}}>
                                    <a href="{{url('/')}}/OutForDelivery-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Out For Delivery</a>
                                </li>
                                <li {{ Request::is('Delivered-orders') ? 'active':''}}>
                                    <a href="{{url('/')}}/Delivered-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Delivered Orders</a>
                                </li>
                                 <li class="{{ Request::is('Order-Not-Placed') ? 'active':''}}">
                                      <a href="{{url('/')}}/Order-Not-Placed"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Order Not Placed</a>
                                </li>
                                 
                            </ul>
                        </li>
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>User</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('users') ? 'active':''}}">
                                      <a href="{{url('/')}}/users"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Users</a>
                                </li>
                                
                                 
                            </ul>
                        </li>
                        <!--<li class="  has-sub ">-->
                        <!--    <a class="js-arrow" href="#">-->
                        <!--        <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Vendor</a>-->
                        <!--    <ul class="list-unstyled navbar__sub-list js-sub-list">-->
                        <!--        <li class="{{ Request::is('vendors') ? 'active':''}}">-->
                        <!--              <a href="{{url('/')}}/vendors"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>vendors</a>-->
                        <!--        </li>-->
                        <!--        <li {{ Request::is('add-edit-vendor') ? 'active':''}}>-->
                        <!--            <a href="{{url('/')}}/add-edit-vendor"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Add Vendor</a>-->
                        <!--        </li>-->

                        <!--    </ul>-->
                        <!--</li>-->
                        <!--<li class="  has-sub ">-->
                        <!--    <a class="js-arrow" href="#">-->
                        <!--        <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Purchase Order</a>-->
                        <!--    <ul class="list-unstyled navbar__sub-list js-sub-list">-->
                        <!--        <li class="{{ Request::is('Add-Purchase-Order') ? 'active':''}}">-->
                        <!--              <a href="{{url('/')}}/Add-Purchase-Order"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Purchase Order</a>-->
                        <!--        </li>-->
                        <!--        <li class="{{ Request::is('Purchase-Stock') ? 'active':''}}">-->
                        <!--            <a href="{{url('/')}}/Purchase-Stock"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Purchase Stock</a>-->
                        <!--      </li>-->
                        <!--        <li class="{{ Request::is('Purchase-Bill-Update') ? 'active':''}}">-->
                        <!--            <a href="{{url('/')}}/Purchase-Bill-Update"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Bill Update</a>-->
                        <!--        </li>-->
                        <!--        <li class="{{ Request::is('Stock') ? 'active':''}}">-->
                        <!--            <a href="{{url('/')}}/Stock"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Availabe Stock</a>-->
                        <!--        </li>-->
                        <!--        <li class="{{ Request::is('Purchase-History') ? 'active':''}}">-->
                        <!--            <a href="{{url('/')}}/Purchase-History"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Purchase History</a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Delivery Men</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('Delivery-Men') ? 'active':''}}">
                                    <a href="{{url('/')}}/Delivery-Men"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Delivery Men list</a>
                                 </li>
                                <li class="{{ Request::is('Add-Delivery-Men') ? 'active':''}}">
                                      <a href="{{url('/')}}/Add-Delivery-Men"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Add Delivery Men</a>
                                </li>
                                
                                 <li class="{{ Request::is('Delivery-MenList') ? 'active':''}}">
                                    <a href="{{url('/')}}/Delivery-MenList"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>DeliveryMen-History</a>
                                 </li>
                               
                            </ul>
                        </li>

                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Customer</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="{{ Request::is('view-tree') ? 'active':''}}">
                                      <a href="{{url('/')}}/view-tree"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>View Customer</a>
                                </li>

                                <li class="{{ Request::is('Level-Transection') ? 'active':''}}">
                                    <a href="{{url('/')}}/Level-Transection"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Level-Transection</a>
                              </li>
                              <li class="{{ Request::is('AdminAll-Transection') ? 'active':''}}">
                                <a href="{{url('/')}}/AdminAll-Transection"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>AdminAll-Wallet</a>
                               </li>
                              

                            </ul>
                        </li>

                        <li class="  has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="zmdi zmdi-compass zmdi-hc-fw"></i>Withdraw</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                              
                                <li class="{{ Request::is('withdraw-request') ? 'active':''}}">
                                    <a href="{{url('/')}}/withdraw-request"><i class="zmdi zmdi-menu zmdi-hc-fw"></i>Withdraw Request</a>
                                   </li>
    
                                   <li class="{{ Request::is('withdraw-Approverequest') ? 'active':''}}">
                                    <a href="{{url('/')}}/withdraw-Approverequest"><i class="zmdi zmdi-menu zmdi-hc-fw"></i> Withdraw Approverequest</a>
                                   </li>
                                   
                               
                            </ul>
                        </li>

                       
                         
                    </ul>
                    @endif
                    {{-- end admin section --}}
                    {{-- Delivery Boy section --}}
                    @if(Auth::user()->role_as == '2')
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ Request::is('DeliveryBoy-Dashboard') ? 'active':''}} has-sub">
                            <a class="js-arrow " href="{{url('/')}}/DeliveryBoy-Dashboard">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li {{ Request::is('Shipped-orders') ? 'active':''}}>
                            <a href="{{url('/')}}/Shipped-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Assign Order</a>
                        </li>
                        <li {{ Request::is('OutForDelivery-orders') ? 'active':''}}>
                            <a href="{{url('/')}}/OutForDelivery-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Out For Delivery</a>
                        </li>
                        <li {{ Request::is('Delivered-orders') ? 'active':''}}>
                            <a href="{{url('/')}}/Delivered-orders"><i class="zmdi zmdi-hospital-alt zmdi-hc-fw"></i>Delivered</a>
                        </li>
                    </ul>
                    @endif
                    {{--End  Delivery Boy section --}}
                             
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->