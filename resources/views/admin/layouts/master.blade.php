<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title')</title>


    <!-- Fontfaces CSS-->
    <link href="{{url('/')}}/public/admin_asset/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{url('/')}}/public/admin_asset/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{url('/')}}/public/admin_asset/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('/')}}/public/admin_asset/css/theme.css" rel="stylesheet" media="all">
    <link href="{{url('/')}}/public/admin_asset/css/custom.css" rel="stylesheet" media="all">
<style>
header {
    background-color:#0B60A8 !important;
    color:white !important;
}
header a{
    background-color:#0B60A8 !important;
    color:white !important;
}

.table-responsive
{
    border-radius:0px !important;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
}
table tr{
    padding-top:.4rem !important;
    background-color:#FCF6F6 !important;
}

table tr{
   border-bottom:.4px solid black;
}

.zmdi-edit{
   
   
}

.card-header{
    font-size:18px;
}

.navbar-mobile .container-fluid{
    background-color:#0B60A8;
}


.card-body {
 
   padding: .25rem; 
}

.card-body input{
    margin-left:.2rem;
    width:99% !important; 
} {
 
 padding: .25rem; 
}


.overview-item--c2 {
    background:none !important;
    border-radius:0px !important;
    background-color:#5DC501 !important;
    color:white !important;
}

.overview-item--c1 {
    background:none !important;
    border-radius:0px !important;
    background-color:#EC4A0D !important;
    color:white !important;
}
.overview-item--c5 {
    background:none !important;
    border-radius:0px !important;
    background-color:#252323 !important;
    color:white !important;
   padding-bottom:.8rem;
}

.overview-item--c5 h1 {
  
    color:white !important;
   
}
.overview-item--c3 {
    background:none !important;
    border-radius:0px !important;
    background-color:skyblue !important;
    color:white !important;
}

.overview-item--c4 {
    background:none !important;
    border-radius:0px !important;
    background-color:teal !important;
    color:white !important;
}








@media screen and (min-width: 990px) 
{
    .header-button .account-wrap{
       float:right !important;
  }
  .container-fluid .navbar-mobile__list li:hover{
    background-color:white !important;
  }
  .header-desktop {
     height: 75px; 
     text-align:right !important;
}
.header{
    margin-top:-2rem !important;
}
.header-button{
    
text-align:right !important;
}
}
    </style>
</head>

<body class="animsition" >
    <div class="page-wrapper" style="background-color:white;">
     @include('admin.layouts.sidebar')

        <!-- PAGE CONTAINER-->
        <div class="page-container" style="background-color:white;">
          @include('admin.layouts.header')

            @yield('content')
            <!-- END PAGE CONTAINER-->

          
        </div>

      
 
    </div> @include ('admin.layouts.footer')

   
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Jquery JS-->
    <script src="{{url('/')}}/public/admin_asset/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="{{url('/')}}/public/admin_asset/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="{{url('/')}}/public/admin_asset/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="{{url('/')}}/public/admin_asset/vendor/slick/slick.min.js">
    </script>
    <script src="{{url('/')}}/public/admin_asset/vendor/wow/wow.min.js"></script>
    <script src="{{url('/')}}/public/admin_asset/vendor/animsition/animsition.min.js"></script>
    <script src="{{url('/')}}/public/admin_asset/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="{{url('/')}}/public/admin_asset/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="{{url('/')}}/public/admin_asset/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="{{url('/')}}/public/admin_asset/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{url('/')}}/public/admin_asset/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{url('/')}}/public/admin_asset/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="{{url('/')}}/public/admin_asset/vendor/select2/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!--Table Search-->


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});






</script>
  

    <!-- Main JS-->
    <script src="{{url('/')}}/public/admin_asset/js/main.js"></script>
    @if(session('status'))
    <script>
     swal("{{ session('status') }}");
    </script>
    @endif 
    @yield('script')
  
</body>

</html>
<!-- end document-->
