<!DOCTYPE html>
<html lang="en">

<head>
    <title> @yield('title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/front/css/bootstrap.min.css">
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
    <script src="{{ url('/') }}/public/front/treeview.css"></script>
  
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    

<style>
/*Header==========================================================*/

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
      color: white !important;
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
    #slider{
  margin:0 auto;
  width:98%;
  overflow:hidden;
}

.slides{
  overflow:hidden;
  animation-name:fade;
  animation-duration:1s;
  display:none;
}

#slider img{
  width:100%;
}

#dot{
  margin:0 auto;
  text-align:center;
}
.dot{
  display:inline-block;
  border-radius:50%;
  background:#d3d3d3;
  padding:8px;
  margin:10px 5px;
}

.active{
  background:black;
}

@media (max-width:567px){
  #slider{
    width:100%;

  }
}

#heading{
  display:block;
  text-align:center;
  font-size:2em;
  margin:10px 0px;

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

<body class="goto-here">
 @include('layouts.header')
 
@yield('content')

    <hr>


    @include('layouts.footer')



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

  
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   
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
   
    
    <script src="{{ url('/') }}/public/front/js/main.js"></script>
    <script src="{{ url('/') }}/public/front/treeview.js"></script>
    <script src="{{ url('/') }}/public/front/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   
    @if(session('status'))
    <script>
     swal("{{ session('status') }}");
    </script>
    @endif 
    @yield('script')
    <script>
                
       $(document).ready(function() {
        //   increment ------
           $(document).on('click', '.increment-btn', function(e) {
               e.preventDefault();
               var inc_value = $(this).closest('.product_data').find('.qty-input').val();
               var inc_value = $('.qty-input').val();
               var value = parseInt(inc_value, 10);
               value = isNaN(value) ? 0 : value;
               if (value < 10) {
                   value++;
                   $(this).closest('.product_data').find('.qty-input').val(value);
               }
           });
        //    decrement-----------
           $(document).on('click', '.decrement-btn', function(e) {
               e.preventDefault();
               var dec_value = $(this).closest('.product_data').find('.qty-input').val();
               var value = parseInt(dec_value, 10);
               value = isNaN(value) ? 0 : value;
               if (value > 1) {
                   value--;
                   $(this).closest('.product_data').find('.qty-input').val(value);
               }
           });
        //   add to cart----------
        $('.addTocart').click(function(e) {
               e.preventDefault();

               var product_id = $(this).closest('.product_data').find('.prod_id').val();
               var product_qty = $(this).closest('.product_data').find('.qty-input').val();
               var cate_id = $(this).closest('.product_data').find('.cate_id').val();
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   method: "post",
                   url: "{{ url('add_to_cart') }}",
                   data: {
                       'product_id': product_id,
                       'product_qty': product_qty,
                       'cate_id': cate_id,
                   },

                   success: function(response) {
                       swal(response.status);
                       loadcart();
                   }

               });

              
           });
        //    add to wishlist--
        $('.addtoWishlist').click(function(e) {
               e.preventDefault();

               var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var cate_id = $(this).closest('.product_data').find('.cate_id').val();

               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               $.ajax({
                   method: "post",
                   url: "{{ url('add_to_wishlist') }}",
                   data: {
                       'product_id': product_id,
                       'cate_id': cate_id,
                   },

                   success: function(response) {
                       swal(response.status);
                       loadwishlist();
                   }

               });


           });
        //  change qunantity-------------
        $(document).on('click','.changeQunatity',function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        data={
                'prod_id':prod_id,
                'prod_qty':qty,
            }
            $.ajax({
                method: "post",
                url:"{{url('/')}}/update_cart",
                data: data,
                
                success: function (response){
                    // window.location.reload();
                    $('.cartitemdiv').load(location.href +" .cartitemdiv");
                    
                }

            });
        }); 
        loadcart();
        loadwishlist();
        // delete cart------------
        $(document).on('click','.delele-cart-item',function (e) {
           
           e.preventDefault();
   
           var prod_id = $(this).closest('.product_data').find('.prod_id').val();
          
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               method: "post",
               url:"{{url('/')}}/delete_cart_item",
               data:{
                   'prod_id':prod_id,
                   },
                
               success: function (response){
                   loadcart();
                   $('.cartitemdiv').load(location.href +" .cartitemdiv");
                    swal("",response.status,"success");
               }
   
           });
          });
        //   remove wishlist-------------------
        $(document).on('click','.removeWishlistItem',function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "post",
            url:"{{url('/')}}/delete_wishlist_item",
            data:{
                'prod_id':prod_id,
                },
             
            success: function (response){
                // window.location.reload();
                loadwishlist();
                $('.wishlsititemdiv').load(location.href +" .wishlsititemdiv");
                 swal("",response.status,"success");
            }

        });
       });
       
 


       }); //end ready function
       
       function loadcart() {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               method: "get",
               url: "{{ url('/') }}/load-cart-count",
               success: function(response) {
                   $('.cart-count').html('');
                   $('.cart-count').html(response.count);
                    //   console.log(response.count);
               }

           });
       }
      

       function loadwishlist() {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
               method: "get",
               url: "{{ url('/') }}/load-wishlist-count",
               success: function(response) {
                   $('.wishlist-count').html('');
                   $('.wishlist-count').html(response.count);
                //    console.log(response.count);
               }

           });
       }
       

   
   </script>
   



   <!---------------Carousel Script------------------->
<script>
$(document).ready(function(){
  //
  var $sb = $(".slider-box");

  $sb.each(function(){

    var $this = $(this),
        $sc = $this.find(".slider-content"),
        $si = $sc.find(".slider-item"),
        $sp = $this.find(".slider-pagin"),
        $sfb = $this.find(".slider-fillbar"),
        $sbg = $this.find(".slider-background"),
        currentSlider = 0;

    //Check and return speed
    function speedo(elem){
      let s = elem.data("speed");
        if(s < 1300){
          s = 1300;
          elem.data("speed", s);
          elem.attr("data-speed", s);
        }
      return s;
    }

    //Animation for fill bar
    function animateFillBar(){
      if($sfb != null){
        $sfb.stop().animate({
            width: "0%"
        }, 0, "linear" ).animate({
            width: "100%"
        }, speedo($this), "linear" );
      }
    }
    animateFillBar();


    //Set background if exist
    function changeBackground(){
      if($sbg != null){
        let url = $si.eq(currentSlider).data("background-url");

        $sbg.fadeOut(function(){
          $sbg.css({"background-image":`url(${url})`}).fadeIn();
        });
      }
    }
    changeBackground();


    //Set slider items
    function setSlider(sid){
      animateFillBar();

      $si.removeClass("active");
      $sp.find("li").removeClass("active");

      if(sid==null){
        currentSlider++; 
      }
      else{
        currentSlider = sid;
      }

      if(currentSlider > $si.length-1){
        currentSlider = 0;
      }

      $si.eq(currentSlider).addClass("active");
      $sp.find("li").eq(currentSlider).addClass("active");

      changeBackground();
    }

    //Check if auto-slide is on and set speed animation
    var autoslide = $this.data("auto-slide"), asInterval;
    if(autoslide){
      let speed = speedo($this);
      asInterval = setInterval(setSlider, speed);
    }

    //Generate pagination
    var sii = 0, paginHTML = "";
    paginHTML+="<ul>";
    $si.each(function(){
      if($sp == null) return;
      $(this).attr(`data-id`,sii);
      paginHTML+=`<li><a href="#" data-target="${$this.attr("id")}" data-target-id="${sii}"><span></span></a></li>`;
      sii++;
    });

    paginHTML+="</ul>";
    $sp.append(paginHTML);

    $sp.find("li").eq(0).addClass("active");
    $sp.find("a").each(function(e){

      $(this).on("click",function(){
        setSlider($(this).data("target-id"));

        clearInterval(asInterval);
        let speed = speedo($this);
        asInterval = setInterval(setSlider, speed);

        e.preventDefault;
        return false;
      });
    });
  });
});



//====Carousel===================

var index = 0;
var slides = document.querySelectorAll(".slides");
var dot = document.querySelectorAll(".dot");

function changeSlide(){

  if(index<0){
    index = slides.length-1;
  }
  
  if(index>slides.length-1){
    index = 0;
  }
  
  for(let i=0;i<slides.length;i++){
    slides[i].style.display = "none";
    dot[i].classList.remove("active");
  }
  
  slides[index].style.display= "block";
  dot[index].classList.add("active");
  
  index++;
  
  setTimeout(changeSlide,2000);
  
}

changeSlide();
    </script>

</body>

</html>
