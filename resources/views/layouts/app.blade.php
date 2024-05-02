<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/animate.css">

    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/aos.css">

    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/jquery.timepicker.css">

    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/flaticon.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/icomoon.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    
<style>
/*Header==========================================================*/
.hero-bread{
    display:none;

}

.card{
    margin-top:3rem !important;
    margin-bottom:3rem !important;
    color:black;
}

*{
    font-family: 'Poppins', sans-serif;
}
@import url('https://fonts.googleapis.com/css?family=Exo:400,700');
    

    .bg-primary{
       
       background-color:#008DE2 !important;
    padding:1rem !important;
    font-size:18px !important; }
    
    .navbar{
       background-color:black !important;
     
    }
    
    .navbar a{
       color:white !important;
       font-family: 'Poppins', sans-serif;
       font-weight:bold !important;
    }
    .navbar li:hover {
      background-color:white !important;
      cursor:pointer !important;
     
    }
    .navbar li:hover a{
    color:black !important;
     
    }
    
    
    @media (max-width: 991.98px){
    
    
    .ftco-navbar-light .navbar-nav > .nav-item.cta > a {
       color: white !important;
       background: black !important;
    }
    
    .ftco-navbar-light .navbar-nav > .nav-item.cta > a:hover .navbar-nav li {
       color: black !important;
       background:white !important;
    }
    }
    
    .ftco-navbar-light.scrolled .nav-item.cta > a {
       color: white !important;
       background: black;
    
       border: none !important;
    }
    
    #home-section{
       display:none !important;
    }
    
    
    .navbar{
        border-bottom:1.5px solid white;
    }
        div{
            font-weight:bold;
            font-family: 'Exo', sans-serif !important; 
        }
    
    
        .ftco-navbar-light.scrolled.awake {
            display:flex;
            justify-content:space-between !important;
        }
    
        @media (max-width: 991.98px){
    .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
    padding-left:.6rem;
    border-bottom:1.6px solid white;
    } 
    
        }
    
    
    
    
    .ftco-navbar-light.scrolled .navbar-toggler span{
        color:black !important;
    }
    
    /*FOOTER==========================================================*/
   
    #mailcontact:focus{
      outline:0px solid;
    border:0px solid;}
    
    #mailcontactbtn:focus{
      outline:0px solid;
    border:0px solid;}
    
    ul {
        margin: 0px;
        padding: 0px;
    }
    .footer-section {
      background: #151414;
      position: relative;
    }
    .footer-cta {
      border-bottom: 1px solid #373636;
    }
    .single-cta i {
      color: #ff5e14;
      font-size: 30px;
      float: left;
      margin-top: 8px;
    }
    .cta-text {
      padding-left: 15px;
      display: inline-block;
    }
    .cta-text h4 {
      color: #fff;
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 2px;
    }
    .cta-text span {
      color: #757575;
      font-size: 15px;
    }
    .footer-content {
      position: relative;
      z-index: 2;
    }
    .footer-pattern img {
      position: absolute;
      top: 0;
      left: 0;
      height: 330px;
      background-size: cover;
      background-position: 100% 100%;
    }
    .footer-logo {
      margin-bottom: 30px;
    }
    .footer-logo img {
        max-width: 200px;
    }
    .footer-text p {
      margin-bottom: 14px;
      font-size: 14px;
          color: #7e7e7e;
      line-height: 28px;
    }
    .footer-social-icon span {
      color: #fff;
      display: block;
      font-size: 20px;
      font-weight: 700;
      font-family: 'Poppins', sans-serif;
      margin-bottom: 20px;
    }
    .footer-social-icon a {
      color: #fff;
      font-size: 16px;
      margin-right: 15px;
    }
    .footer-social-icon i {
      height: 40px;
      width: 40px;
      text-align: center;
      line-height: 38px;
      border-radius: 50%;
    }
    .facebook-bg{
      background: #3B5998;
    }
    .twitter-bg{
      background: #55ACEE;
    }
    .google-bg{
      background: #DD4B39;
    }
    .footer-widget-heading h3 {
      color: #fff;
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 40px;
      position: relative;
    }
    .footer-widget-heading h3::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: -15px;
      height: 2px;
      width: 50px;
      background: #008DE2;
    }
    .footer-widget ul li {
      display: inline-block;
      float: left;
      width: 50%;
      margin-bottom: 12px;
    }
    .footer-widget ul li a:hover{
      color: #ff5e14;
    }
    .footer-widget ul li a {
      color: #878787;
      text-transform: capitalize;
    }
    .subscribe-form {
      position: relative;
      overflow: hidden;
    }
    .subscribe-form input {
      width: 100%;
      padding: 14px 28px;
      background: #2E2E2E;
      border: 1px solid #2E2E2E;
      color: #fff;
    }
    .subscribe-form button {
        position: absolute;
        right: 0;
        background: #ff5e14;
        padding: 13px 20px;
        border: 1px solid #ff5e14;
        top: 0;
    }
    .subscribe-form button i {
      color: #fff;
      font-size: 22px;
      transform: rotate(-6deg);
    }
    .copyright-area{
      background: #202020;
      padding: 25px 0;
    }
    .copyright-text p {
      margin: 0;
      font-size: 14px;
      color: #878787;
    }
    .copyright-text p a{
      color: #ff5e14;
    }
    .footer-menu li {
      display: inline-block;
      margin-left: 20px;
    }
    .footer-menu li:hover a{
      color: #008DE2;
    }
    .footer-menu li a {
      font-size: 14px;
      color: #878787;
    }
    
    
    
    
    /*Front Home===========================================================*/
    
    .time span{
      font-weight:bold;
      color:black !important;
      font-size:20px;
    }
    
    #ftco-section #container ul {
      padding: .5rem;
      display: flex;
      list-style: none;
      justify-content: space-around;
      flex-wrap: wrap;
    }
    #ftco-section #container li {
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
      background-color: #ffdfd9;
      color: #000;
    
     
    }
    #ftco-section #container {
      margin-top: 1.5rem;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(230px, 330px));
      grid-gap: 2rem;
      padding: 0rem;
      justify-content: center;
    
    }
    #ftco-section #container img {
       
      background-position: top;
      background-size: cover;
      width:98%;
      margin-top:.6rem;
      margin-bottom:.6rem;
    height:150px;
      cursor: pointer;
      transition: all 0.2s;
    }
    #ftco-section #container img:hover {
      box-shadow: none;
      transform: scale(.97);
      transistion:.4s;
    }
    
    
    }
    
    #item {
        padding-bottom:1rem;
        padding:.5rem;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);}
    .offers {
    padding-left:.5rem ;
    color:white;
    margin-left:1rem;
    box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
    }
    
    .offers span{
    padding-bottom:.2rem;
        color:#FF3A3A;
    }
    
    .offers p{
      padding-top:.2rem;
    height:10px;
    color:black;
    }
    


    
    /*-------------Carousel CSS------------------*/
    
    .slider-box{
      width:100%;
      background-color:#eee;
      position:relative;
      min-height:300px;
      z-index:0;
      overflow:hidden;
    }
    .slider-content, .slider-content .slider-item{
      position:absolute;
      top:0;
      width:100%;
      height:100%;
    }
    /* RESET */
    *{margin:0;padding:0;box-sizing:border-box;}
    body{
      font-family:Arial, sans-serif;
    }
    .box{
      padding:0rem;
    }
    
    
    /* Style for slider-box DONT TOUCH IT*/
    .slider-box{
      width:100%;
    
      background-color:#eee;
      position:relative;
      min-height:500px;
      z-index:0;
      overflow:hidden;
    }
    
    .slider-content, .slider-content .slider-item{
      position:absolute;
      top:0;
      width:100%;
      height:100%;
    }
    
    .slider-content .slider-item{
    /*  Offset (effet slide in/out) to off set left:0; */
      left:5%;
    }
    
    .slider-content .slider-item{
      visibility:hidden;
      opacity:0;
      transition:all 0.5s ease-in-out;
    }
    
    .slider-content .slider-item.active{
      visibility:visible;
      opacity:1;
      left:0;
    }
    
    .slider-pagin{
      position:absolute;
      bottom:0;
      left:50%;
      transform:translate(-50%, 0);
    }
    
    .slider-pagin ul{
      list-style:none;
      display:flex;
      align-items:center;
      justify-content:center;
      padding:10px 0;
    }
    
    .slider-pagin ul li{
      padding-bottom:0;
      transition:all 0.2s ease-in-out;
    }
    
    .slider-pagin ul li+li{
      margin-left:2px;
    }
    
    .slider-pagin ul li a{
      display:flex;
      align-items:center;
      justify-content:center;
      width:10px;
      height:10px;
      border-radius:50%;
      background-color:#000;
      border:2px solid #FFF;
      text-decoration:none;
      color:#FFF;
      transition:all 0.2s ease-in-out;
    }
    
    .slider-pagin ul li.active a, .slider-pagin ul li a:hover, .slider-pagin ul li a:focus{
      background-color:#FFF;
      border:2px solid #000;
    }
    
    .slider-pagin ul li.active{
      padding-bottom:5px;
    }
    
    .slider-fillbar{
      position:absolute;
      bottom:0;
      left:0;
      width:0;/* must be 0, only othe values to preview */
      height:3px;
      background-color:rgba(0,0,0,0.25);
    }
    
    .slider-background{
      position:absolute;
      top:0;
      left:0;
      width:100%;
      height:100%;
      background-size:cover;
      background-repeat:none;
      background-position:center;
      z-index:-1;
    }
    
    /* Your slider box style */
    .slider-content .slider-item{
      display:flex;
      align-items:center;
      justify-content:flex-end;
      padding:2em;
      color:#FFF;
      font-size:3rem;
    }
    
    
    /*---------------------------------------------*/
    .product{
        padding-bottom:1rem;
        padding:.5rem;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
    }
    
    .bottom-area{
        margin-top:2rem !important;
    }
    
    .bottom-area a{
       background-color:black !important;
       border-radius:0% !important;
       padding:.6rem !important;
    }


    </style>
</head>
<body>
    <div id="app">
        @include('layouts.header')
        @include('layouts.sub_header')

        <main class="">
     
             @yield('content')
        </main>
        @include('layouts.footer')
    </div>
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"  stroke-miterlimit="10" stroke="#F96D00" />
       </svg>
   </div>

    @yield('script')
    <script src="{{ url('/') }}/public/front/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/public/front/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ url('/') }}/public/front/js/popper.min.js"></script>
    <script src="{{ url('/') }}/public/front/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/public/front/js/jquery.easing.1.3.js"></script>
    <script src="{{ url('/') }}/public/front/js/jquery.waypoints.min.js"></script>
    <script src="{{ url('/') }}/public/front/js/jquery.stellar.min.js"></script>
    <script src="{{ url('/') }}/public/front/js/owl.carousel.min.js"></script>
    <script src="{{ url('/') }}/public/front/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('/') }}/public/front/js/aos.js"></script>
    <script src="{{ url('/') }}/public/front/js/jquery.animateNumber.min.js"></script>
    <script src="{{ url('/') }}/public/front/js/bootstrap-datepicker.js"></script>
    <script src="{{ url('/') }}/public/front/js/scrollax.min.js"></script>
    <script src="{{ url('/') }}/public/front/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ url('/') }}/public/front/js/google-map.js"></script>
    <script src="{{ url('/') }}/public/front/js/main.js"></script>
</body>
</html>
