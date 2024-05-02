@extends('index')
@section('title', 'contact')
@section('content')

<style>
  
  .responsive-map{
overflow: hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.responsive-map iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
    #submit:hover{
    background-color:#008DE2 !important;
    color:white !important;
    }

    #cards{
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;text-align:center;
        padding-top:3rem !important;
    }

    #cards2{
        box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;text-align:center;
        padding-top:3rem !important;
    }
    </style>
<!--    
<div class="hero-wrap hero-bread" style="background-image: url({{ asset('public/front/images/bg_1.jpg') }});">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}/">Home</a></span> <span>Contact
                            us</span></p>
                    <h1 class="mb-0 bread">Contact us</h1>
                </div>
            </div>
        </div>
    </div>
-->
    <section class="ftco-section contact-section bg-light">
   
        <div class="container" style="margin-top:-2rem;">
        <h2 style="font-family: 'Poppins', sans-serif;"><span style="color:#008DE2;">Contact </span>US</h2>
            <div class="row d-flex mb-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4" id="cards">
                      
                        <i class="fa fa-address-card-o" style="font-size:48px;color:#008DE2;text-align:center;width:100%;margin-bottom:.5rem;"></i>
                        <p><span>Address:</span>HOUSE NO.- 479, KUCHESAR ROAD CHOPLA, FATHAPUR
HAPUR, Hapur, Uttar Pradesh, 245201
</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4" id="cards">
                    <i class="fa fa-phone" style="font-size:48px;color:#008DE2;text-align:center;width:100%;margin-bottom:.5rem;"></i>
                        <p><span>Phone:</span> <a href="tel://1234567920">8077636670</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4" id="cards">
                       
                        <i class="fa fa-envelope" style="font-size:48px;color:#008DE2;text-align:center;width:100%;margin-bottom:.5rem;"></i>
                        <p><span>Email:</span> <br><a href="mailto:info@albfoodproducts.in">info@albfoodproducts.in</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="info bg-white p-4" id="cards">
                    <i class="fa fa-globe" style="font-size:48px;color:#008DE2;text-align:center;width:100%;margin-bottom:.5rem;"></i>
                    <p><span>Website</span> <a href="#">albfoodproducts.in</a></p>

                    </div>
                </div>
            </div>
<!--            <div class="row block-9" >-->
<!--                <div class="col-md-12 order-md-last d-flex">-->
<!--                    <form action="#" class="bg-white p-5 contact-form"  id="cards2">-->
<!--                        <div class="form-group">-->
<!--                            <input type="text" class="form-control" placeholder="Your Name">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input type="text" class="form-control" placeholder="Your Email">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input type="text" class="form-control" placeholder="Subject">-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>-->
<!--                        </div>-->
<!--                        <div class="form-group">-->
<!--                            <input id="submit" type="submit" value="Send Message" class="btn btn-primary py-3 px-5" style="border-radius:0px;background-color:black;">-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->

                
<!--                <div class="responsive-map">-->
<!--<iframe src="https://www.google.com/maps/d/viewer?mid=1HMo6q3eljWb3_tKcXuCP2TjCvnQ&hl=en&ll=55.72356899999998%2C37.65512499999999&z=17" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
<!--</div>  -->
                     
                    
                  
<!--                </div>-->
            </div>
        </div>
    </section>

@endsection
