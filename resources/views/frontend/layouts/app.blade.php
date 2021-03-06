@extends('frontend.layouts.master')

@section ('headercss')
        <!-- Main Style -->
        <link rel="stylesheet" href="{{ asset ('public/frontend/css/style.css') }}">         
        <!-- Color Style -->
        <link rel="stylesheet" href="{{ asset ('public/frontend/css/skins/colors/red.css') }}" name="colors">
        
        <!-- Layout Style -->
        <link rel="stylesheet" href="{{ asset ('public/frontend/css/layout/wide.css') }}" name="layout">
    
        <!--[if lt IE 9]>
            <script src="js/html5.js"></script>
        <![endif]-->
        
        <!-- Favicons -->
        <link rel="shortcut 
        
        icon" href="{{ asset ('public/frontend/images/512x512.png') }}">
    @yield('appheadercss')
@endsection
@section ('header_menu')
<header> 
     <div class="main-header">
       <div class="container clearfix">
         <a href="#" class="down-button"><i class="icon-angle-down"></i></a><!-- this appear on small devices -->
         <div class="one-third column">
          <div class="logo">
          <a href="index.html">
            <img src="{{ asset ('public/frontend/images/Eclispe Cabodai.png') }}" alt="Invention - Creative Responsive Theme" />
          </a>
          </div>
         </div><!-- End Logo -->
         
         <div class="two-thirds column">
          <nav id="menu" class="navigation" role="navigation">
          <a href="#">Show navigation</a><!-- this appear on small devices -->
          <ul id="nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="about.html">About us</a></li>
            <li><a href="services.html">Blog</a></li>
            <li><a href="team.html">Our Team</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
         </nav>
        </div><!-- End Menu -->
       
       </div><!-- End Container -->
     </div><!-- End main-header -->
     
   </header><!-- <<< End Header >>> -->
@endsection
@section ('banner')

<div class="slider-1 clearfix">
    <div class="flex-container">
       <div class="flexslider loading">
        <ul class="slides">
          <li style="background:url({{ asset ('public/frontend/images/img/sliders/slider-1/slider-bg-1.jpg') }}) no-repeat;background-position:50% 0">
          
           <div class="container">
           <div class="sixteen columns contain">
            
             <!-- <h2 data-toptitle="20%">Invention Theme for Business Agency and Creative Portfolios</h2> -->
             <p data-bottomtext="50%">
            We propose a large range of services not only intended to private companies but also to associations and public organizations. our company has developed noteworthy activity in the outsourcing market.  Our ambition is to develop technology in Cambodia and abroad adapted to all kind of activities.</p>
             <div class="links" data-bottomlinks="20%">
               <a href="#" class="button medium normal">Read More</a>
               <a href="#" class="button medium color">Purchase Now</a>
             </div>
             
             <img src="{{ asset ('public/frontend/images/img/sliders/slider-1/slider-item-1.png') }}" class="item"  data-topimage="16%"/>
           
           </div>
         </div><!-- End Container -->
          
          </li><!-- End item -->
          
          
          <li style="background:url({{ asset ('public/frontend/images/img/sliders/slider-1/slider-bg-3.jpg') }}) no-repeat; background-position:50% 0">
          
          <div class="container">
           <div class="sixteen columns contain">
            
             <h2 data-toptitle="15%">Invention Theme for Business Agency and Creative Portfolios</h2>
             <p data-bottomtext="27%">
             We take risks. Sometimes they pay off and sometimes they don't. But what matters is that we've built an environment where any crazy idea you have can be the one that makes the company. If you're smart and hardworking, risks pay off more often than not, that's how plantwear brand started its company and now they are one of the best jewelry company.</p>
             <div class="links" data-bottomlinks="10%">
               <a href="#" class="button medium normal">Read More</a>
               <a href="#" class="button medium color">Purchase Now</a>
             </div>
             
             <img src="{{ asset ('public/frontend/images/img/sliders/slider-1/slider-item-2.png') }}" class="item" data-topimage="8%"/>
           
           </div>
         </div><!-- End Container -->          
         </li><!-- End item -->
         
         
         <li style="background:url({{ asset ('public/frontend/images/img/sliders/slider-1/slider-bg-2.jpg') }}) no-repeat; background-position:50% 0">
          
          <div class="container">
           <div class="sixteen columns contain">
            
             <h2 data-toptitle="20%">Invention Theme for Business Agency and Creative Portfolios</h2>
             <p data-bottomtext="39%">
             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
             standard dummy text ever since the 1500s</p>
             <div class="links" data-bottomlinks="20%">
               <a href="#" class="button medium normal">Read More</a>
               <a href="#" class="button medium color">Purchase Now</a>
             </div>
             
             <img src="{{ asset ('public/frontend/images/img/sliders/slider-1/slider-item-4.png') }}" class="item" data-topimage="9%"/>
           
           </div>
         </div><!-- End Container -->
          
         </li><!-- End item -->
         
         <li style="background:url({{ asset ('public/frontend/images/img/sliders/slider-1/slider-bg-3.jpg') }}) no-repeat; background-position:50% 0">
          
          <div class="container">
           <div class="sixteen columns contain">
            
             <h2 data-toptitle="20%">Invention Theme for Business Agency and Creative Portfolios</h2>
             <p data-bottomtext="39%">
             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
             standard dummy text ever since the 1500s</p>
             <div class="links" data-bottomlinks="20%">
               <a href="#" class="button medium normal">Read More</a>
               <a href="#" class="button medium color">Purchase Now</a>
             </div>
             
             <div class="item" data-topimage="23%">
             <div class="video-wrap widescreen item">
             <iframe src="http://www.youtube.com/embed/iTo-lLl7FaM?showinfo=0" frameborder="0" allowfullscreen ></iframe>
             </div><!-- End video wrap -->
             <!-- End Youtube -->
             </div><!-- End -->
           
           </div>
         </div><!-- End Container -->
          
         </li><!-- End item -->
         
         
        </ul>
       </div>
      </div>
     
   </div><!-- End slider -->
    
    <div class="services style-1 home bottom-3">     
      <center><h3>Our Service</h3></center>  
     <div class="container clearfix">        
       <div class="one-third column">
         <div class="item">           
            <a href="#">
                  <img src="{{ asset ('public/frontend/images/services/web_design.jpg') }}" class="item" data-topimage="9%"/>
            </a>
           <h3><a href="#">WEBSITES DESIGN</a></h3>           
         </div>
       </div><!-- End item -->
       
       <div class="one-third column">
         <div class="item">           
            <a href="#">
                  <img src="{{ asset ('public/frontend/images/services/mobiledesign.png') }}" class="item" data-topimage="9%"/>
            </a>
           <h3><a href="#">MOBILE DESIGN</a></h3>           
         </div>
       </div><!-- End item -->
       
       <div class="one-third column">
         <div class="item">           
            <a href="#">
                  <img src="{{ asset ('public/frontend/images/services/paymetmethod.png') }}" class="item" data-topimage="9%"/>
            </a>
           <h3><a href="#">PAYMENT METHODE</a></h3>
         </div>
       </div><!-- End item -->

       <div class="one-third column">
         <div class="item">           
            <a href="#">
                  <img src="{{ asset ('public/frontend/images/services/ecommerce.png') }}" class="item" data-topimage="9%"/>
            </a>
           <h3><a href="#">E-COMMERCE</a></h3>           
         </div>
       </div><!-- End item -->
       
       <div class="one-third column">
         <div class="item">           
            <a href="#">
                  <img src="{{ asset ('public/frontend/images/services/last_tecnology.png') }}" class="item" data-topimage="9%"/>
            </a>
           <h3><a href="#">LATEST TECHNOLOGIES</a></h3>           
         </div>
       </div><!-- End item -->
       
       <div class="one-third column">
         <div class="item">           
            <a href="#">
                  <img src="{{ asset ('public/frontend/images/services/spport_team.png') }}" class="item" data-topimage="9%"/>
            </a>
           <h3><a href="#">SUPPORT TEAM</a></h3>           
         </div>
       </div><!-- End item -->
       
     </div><!-- End Container -->
   </div><!-- End services -->
   <div class="services style-3 home s-2 bottom-3">
     <div class="container clearfix">
     
       <div class="eight columns bottom-3">
         <div class="item bottom-3">
           <div class="circle float-left">
            <a href="#">
                <img src="{{ asset ('public/frontend/images/services/responsive.png') }}" class="item" data-topimage="9%"/>  
            </a>
           </div>
           <div class="data float-right">
           <h4><a href="#">WEB DESIGN SERVICES</a></h4>
              <p>
                <i class="icon-circle-arrow-right"></i> Content management systems<br>
                <i class="icon-circle-arrow-right"></i> Virtual shops and eCommerce<br>
                <i class="icon-circle-arrow-right"></i> Presentation websites<br>
                <i class="icon-circle-arrow-right"></i> Online catalogues<br>
                <i class="icon-circle-arrow-right"></i> Portal systems<br>
                <i class="icon-circle-arrow-right"></i> Any other dynamic website
              </p>
           </div>
         </div>
       </div><!-- End item -->
       
       <div class="eight columns bottom-3">
         <div class="item bottom-3">
           <div class="circle float-left">
            <a href="#">
                <img src="{{ asset ('public/frontend/images/services/cicle_design.png') }}" class="item" data-topimage="9%"/>  
            </a>
           </div>
           <div class="data float-right">
           <h4><a href="#">GRAPHIC DESIGN SERVICES</a></h4>           
           <p>  
              <i class="icon-circle-arrow-right"></i> Logo design <br>
              <i class="icon-circle-arrow-right"></i> Flyers & Brochures <br>
              <i class="icon-circle-arrow-right"></i> Business Cards <br>
              <i class="icon-circle-arrow-right"></i> Stationery Design <br>
              <i class="icon-circle-arrow-right"></i> Powerpoint presentation<br>
              <i class="icon-circle-arrow-right"></i> Print Ads / Magazine<br>
              <i class="icon-circle-arrow-right"></i> Banners
           </p>

           </div>
         </div>
       </div><!-- End item -->
       
       <div class="eight columns bottom-3">
         <div class="item bottom-3">
           <div class="circle float-left">
            <a href="#">
                <img src="{{ asset ('public/frontend/images/services/degital_marketing.png') }}" class="item" data-topimage="9%"/>  
            </a>
           </div>
           <div class="data float-right">
           <h4><a href="#">DIGITAL MARKETING SERVICES</a></h4>
           <p>
              <i class="icon-circle-arrow-right"></i> Powerpoint presentation <br>
              <i class="icon-circle-arrow-right"></i> Business Cards <br>
              <i class="icon-circle-arrow-right"></i> Stationery Design <br>
              <i class="icon-circle-arrow-right"></i> Print Ads / Magazine <br>
              <i class="icon-circle-arrow-right"></i> Banners
           </p>
           </div>
         </div>
       </div><!-- End item -->
       
       <div class="eight columns bottom-3">
         <div class="item bottom-3">
           <div class="circle float-left">
            <a href="#">
                <img src="{{ asset ('public/frontend/images/services/mobile_design.png') }}" class="item" data-topimage="9%"/>  
            </a>
           </div>
           <div class="data float-right">
           <h4><a href="#">MOBILE PLATFORM SERVICES</a></h4>
           <p>
              <i class="icon-circle-arrow-right"></i> Powerpoint presentation <br>
              <i class="icon-circle-arrow-right"></i> Business Cards <br>
              <i class="icon-circle-arrow-right"></i> Stationery Design <br>
              <i class="icon-circle-arrow-right"></i> Print Ads / Magazine <br>
              <i class="icon-circle-arrow-right"></i> Banners
           </p>
           </div>
         </div>
       </div><!-- End item -->
       
      
       
     </div><!-- End Container -->
   </div><!-- End services -->
@endsection
@section('main_service')
<div class="recent-work clearfix bottom-2">
    
     
     <div class="featured-clients clearfix bottom-2">
     
       <div class="slidewrap4" >
    
        <div class="sixteen columns"> 
         <h3 class="title bottom-2">Featured Clients</h3> 
        </div>
        
        <ul class="slider" id="sliderName4">
        
          <li class="slide">
           <div class="four columns item"> <a href="#"><img src="{{ asset ('public/frontend/images/img/clients/client-1.jpg') }}" alt="" /></a> </div>
           <div class="four columns item"> <a href="#"><img src="{{ asset ('public/frontend/images/img/clients/client-2.jpg') }}" alt="" /></a> </div>
           <div class="four columns item"> <a href="#"><img src="{{ asset ('public/frontend/images/img/clients/client-3.jpg') }}" alt="" /></a> </div>
           <div class="four columns item"> <a href="#"><img src="{{ asset ('public/frontend/images/img/clients/client-4.jpg') }}" alt="" /></a> </div>
          </li><!-- End slide -->
          
          <li class="slide">
           <div class="four columns item"> <a href="#"><img src="{{ asset ('public/frontend/images/img/clients/client-1.jpg') }}" alt="" /></a> </div>
           <div class="four columns item"> <a href="#"><img src="{{ asset ('public/frontend/images/img/clients/client-2.jpg') }}" alt="" /></a> </div>
           <div class="four columns item"> <a href="#"><img src="{{ asset ('public/frontend/images/img/clients/client-3.jpg') }}" alt="" /></a> </div>
           <div class="four columns item"> <a href="#"><img src="{{ asset ('public/frontend/images/img/clients/client-4.jpg') }}" alt="" /></a> </div>
          </li><!-- End slide -->
        
        </ul>
      
       </div><!-- End slidewrap -->
     </div>
    </div><!-- End features-clients -->
@endsection
@section('footer')
<footer>
   
     <div class="footer-top">
      <div class="container clearfix">
        
        <div class="one-third column widget">
          <h3 class="title">Latest Tweets</h3>
          <div id="tweets-footer" class='tweet query footer'></div><!-- Tweets Code -->
        </div><!-- End Tweets Widget -->
        
        <div class="one-third column widget">
          <h3 class="title">Flickr Stream</h3>
          <ul id="footer" class="thumbs"></ul> <!-- Flickr Code -->
        </div><!-- End Flickr Widget -->
        
        <div class="one-third column widget">
          <div class="subscribe"> 
          <h3 class="title">Subscribe</h3>
          <p>Subscribe to our email newsletter to receive our news, updates and awesome free files, tuts and sources .</p>
          <form action="#">
            <input type="text" class="mail" value="your@email.com" onBlur="if(this.value == '') { this.value = 'your@email.com'; }" 
            onfocus="if(this.value == 'your@email.com') { this.value = ''; }"/>
            <input type="submit" value="Subscribe" class="submit" />
          </form>
          </div>
        </div><!-- End Subscribe Widget -->
        
      </div><!-- End container -->
     </div><!-- End footer-top -->
     
     <div class="footer-down">
      <div class="container clearfix">
        
        <div class="eight columns">
         <span class="copyright">
         © Copyright 2013 <a href="index.html">Invention</a>. All Rights Reserved. by 
         <a href="http://jozoor.com/" target="_blank">jozoor</a></span>
        </div><!-- End copyright -->
        
        <div class="eight columns">
          <div class="social">
          <a href="#"><i class="social_icon-twitter s-14"></i></a>
           <a href="#"><i class="social_icon-facebook s-18"></i></a>
           <a href="#"><i class="social_icon-dribbble s-18"></i></a>
           <a href="#"><i class="social_icon-gplus s-18"></i></a>
           <a href="#"><i class="social_icon-pinterest s-18"></i></a>
           <a href="#"><i class="social_icon-youtube s-18"></i></a>
           <a href="#"><i class="social_icon-rss s-18"></i></a>
          </div>
        </div><!-- End social icons -->
        
      </div><!-- End container -->
     </div><!-- End footer-top -->
     
   </footer><!-- <<< End Footer >>> -->
@endsection
@section('footer_js')
    <!-- Start JavaScript -->
  <script src="{{ asset ('public/frontend/js/jquery-1.9.1.min.js') }}"></script> <!-- jQuery library -->
  <script src="{{ asset ('public/frontend/js/jquery.easing.1.3.min.js') }}"></script> <!-- jQuery Easing --> 
  <script src="{{ asset ('public/frontend/js/jquery-ui/jquery.ui.core.js') }}"></script> <!-- jQuery Ui Core-->
  <script src="{{ asset ('public/frontend/js/jquery-ui/jquery.ui.widget.js') }}"></script> <!-- jQuery Ui Widget -->
  <script src="{{ asset ('public/frontend/js/jquery-ui/jquery.ui.accordion.js') }}"></script> <!-- jQuery Ui accordion--> 
  <script src="{{ asset ('public/frontend/js/jquery-cookie.js') }}"></script> <!-- jQuery cookie --> 
  <script src="{{ asset ('public/frontend/js/ddsmoothmenu.js') }}"></script> <!-- Nav Menu ddsmoothmenu -->
  <script src="{{ asset ('public/frontend/js/jquery.flexslider.js') }}"></script> <!-- Flex Slider  -->
  <script src="{{ asset ('public/frontend/js/colortip.js') }}"></script> <!-- Colortip Tooltip Plugin  -->
  <script src="{{ asset ('public/frontend/js/tytabs.js') }}"></script> <!-- jQuery Plugin tytabs  -->
  <script src="{{ asset ('public/frontend/js/jquery.ui.totop.js') }}"></script> <!-- UItoTop plugin  -->
  <script src="{{ asset ('public/frontend/js/carousel.js') }}"></script> <!-- jQuery Carousel  -->
  <script src="{{ asset ('public/frontend/js/jquery.isotope.min.js') }}"></script> <!-- Isotope Filtering  -->
  <script src="{{ asset ('public/frontend/js/twitter/jquery.tweet.js') }}"></script> <!-- jQuery Tweets -->
  <script src="{{ asset ('public/frontend/js/jflickrfeed.min.js') }}"></script> <!-- jQuery Flickr -->
  <script src="{{ asset ('public/frontend/js/social-options.js') }}"></script> <!-- social options , twitter, flickr.. -->
  <script src="{{ asset ('public/frontend/js/doubletaptogo.js') }}"></script> <!-- Touch-friendly Script  -->
  <script src="{{ asset ('public/frontend/js/fancybox/jquery.fancybox.js') }}"></script> <!-- jQuery FancyBox -->
  <script src="{{ asset ('public/frontend/js/jquery.sticky.js') }}"></script> <!-- jQuery Sticky -->
  <script src="{{ asset ('public/frontend/js/custom.js') }}"></script> <!-- Custom Js file for javascript in html -->
  <!-- End JavaScript -->
@endsection