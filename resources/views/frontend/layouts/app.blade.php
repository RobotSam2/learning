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
            <li class="active"><a href="index.html">Home</a>
              <ul>
                <li><a href="index_2.html">Home 2</a></li>
                <li><a href="index_3.html">Home 3</a></li>
                <li><a href="index_4.html">Home 4</a></li>
                <li><a href="index_mobile_app.html">Home Mobile App</a></li>
                <li><a href="index_one_page.html">Home One Page</a></li>
                <li><a href="index_slider_2.html">Slider 2</a></li>
                <li><a href="index_header_2.html#1">Header Layouts</a>
                  <ul>
                   <li><a href="index_header_2.html">Header 2</a></li>
                   <li><a href="index_header_3.html">Header 3</a></li>
                   <li><a href="index_header_4.html">Header 4</a></li>
                   <li><a href="index_header_5.html">Header 5</a></li>
                   <li><a href="index_header_fixed.html">Header Fixed</a></li>
                  </ul>
                </li>
                <li><a href="index_footer_2.html#1">Footer Layouts</a>
                  <ul>
                   <li><a href="index_footer_2.html">Footer 2</a></li>
                   <li><a href="index_footer_3.html">Footer 3</a></li>
                   <li><a href="index_footer_4.html">Footer 4</a></li>
                   <li><a href="index_footer_5.html">Footer 5</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="about.html#1">Pages</a>
              <ul>
                <li><a href="about.html">About us</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="team.html">Our Team</a></li>
                <li><a href="testimonials.html">Testimonials</a></li>
                <li><a href="process.html">Process</a></li>
                <li><a href="sidebar_right.html">Page Right Sidebar</a></li>
                <li><a href="sidebar_left.html">Page Left Sidebar</a></li>
                <li><a href="FAQ.html">FAQ</a></li>
                <li><a href="sitemap.html">Sitemap</a></li>
                <li><a href="full_width.html">Full Width</a></li>
              </ul>
            </li>
            <li><a href="shortcodes.html#2">Features</a>
              <ul>
                <li><a href="shortcodes.html">Shortcodes</a></li>
                <li><a href="icons.html">Icons</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="pricing_tables.html">Pricing Tables</a></li>
                <li><a href="under_construction.html">Under Construction</a></li>
                <li><a href="404.html">404 Page</a></li>
                <li><a href="#3">Third Level Item</a>
                  <ul>
    		        <li><a href="#3-1">Sub Item Example 1</a></li>
                    <li><a href="#3-2">Sub Item Example 2</a>
                      <ul>
    		           <li><a href="#3-1">Sub Item Example 1</a></li>
                       <li><a href="#3-2">Sub Item Example 2</a></li>
		              </ul>
                    </li>
		          </ul>
                </li>
              </ul>
            </li>
            <li><a href="portfolio_4.html#4">Portfolio</a>
              <ul>
                <li><a href="portfolio_2.html">2 Columns</a></li>
                <li><a href="portfolio_3.html">3 Columns</a></li>
                <li><a href="portfolio_4.html">4 Columns</a></li>
                <li><a href="single_project_1.html">Single Project 1</a></li>
                <li><a href="single_project_1_full.html">Single 1 without slider</a></li>
                <li><a href="single_project_2.html">Single Project 2</a></li>
                <li><a href="single_project_2_full.html">Single 2 without slider</a></li>
              </ul>
            </li>
            <li><a href="blog.html#5">Blog</a>
              <ul>
                <li><a href="blog.html">Blog 1</a></li>
                <li><a href="blog_2.html">Blog 2</a></li>
                <li><a href="blog_3.html">Blog 3</a></li>
                <li><a href="blog_3_filter.html">Blog 3 with filter</a></li>
                <li><a href="single_post.html">Single Post</a></li>
              </ul>
            </li>
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
            
             <h2 data-toptitle="20%">Invention Theme for Business Agency and Creative Portfolios</h2>
             <p data-bottomtext="39%">
             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
             standard dummy text ever since the 1500s</p>
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
            
             <h2 data-toptitle="20%">Invention Theme for Business Agency and Creative Portfolios</h2>
             <p data-bottomtext="39%">
             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
             standard dummy text ever since the 1500s</p>
             <div class="links" data-bottomlinks="20%">
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
     <div class="container clearfix">
     
       <div class="one-third column">
         <div class="item">
           <div class="circle"><a href="#"><i class="icon-resize-full"></i></a></div>
           <h3><a href="#">RESPONSIVE WEBSITES</a></h3>
           <p>We build websites that work across multiple screen sizes and device types. Our web layouts can be viewed accurately across a large number of screen sizes. Try it out by viewing this website on your mobile phone and compare</p>
         </div>
       </div><!-- End item -->
       
       <div class="one-third column">
         <div class="item">
           <div class="circle"><a href="#"><i class="icon-cogs"></i></a></div>
           <h3><a href="#">LATEST TECHNOLOGIES</a></h3>
           <p>Our team is passionate about improving our skills as well as understanding and utilizing the latest technologies in an industry that is constantly being redeveloped. With new technologies emerging daily, It is important to keep up with the pace of change. </p>
         </div>
       </div><!-- End item -->
       
       <div class="one-third column">
         <div class="item">
           <div class="circle"><a href="#"><i class="icon-th-large"></i></a></div>
           <h3><a href="#">SUPPORT TEAM</a></h3>
           <p>We support our valued customers from our Phnom Penh office, not a call center half a world away. We take all support issues seriously and provide timely responses, we will respond within 24 hours. Guaranteed! We invest in upskilling our team members on a constant basis.</p>
         </div>
       </div><!-- End item -->
       
     </div><!-- End Container -->
   </div><!-- End services -->
   <div class="services style-3 home s-2 bottom-3">
     <div class="container clearfix">
     
       <div class="eight columns bottom-3">
         <div class="item bottom-3">
           <div class="circle float-left"><a href="#"><i class="icon-leaf"></i></a></div>
           <div class="data float-right">
           <h4><a href="#">WEB DESIGN SERVICES</a></h4>
           <p><i class="icon-leaf"></i> Content management systems
           - Virtual shops and eCommerce
           - Presentation websites
           - Online catalogues</p>
           - Portal systems
           - Any other dynamic website</p>
           </div> icon-chevron-right
         </div>
       </div><!-- End item -->
       
       <div class="eight columns bottom-3">
         <div class="item bottom-3">
           <div class="circle float-left"><a href="#"><i class="icon-th-large"></i></a></div>
           <div class="data float-right">
           <h4><a href="#">GRAPHIC DESIGN SERVICES</a></h4>
           
           <p>
              <i class="icon-chevron-right"></i> Powerpoint presentation <br>
              <i class="icon-chevron-right"></i> Business Cards <br>
              <i class="icon-chevron-right"></i> Stationery Design <br>
              <i class="icon-chevron-right"></i> Print Ads / Magazine <br>
              <i class="icon-chevron-right"></i> Banners
           </p>

           </div>
         </div>
       </div><!-- End item -->
       
       <div class="eight columns bottom-3">
         <div class="item bottom-3">
           <div class="circle float-left"><a href="#"><i class="icon-inbox"></i></a></div>
           <div class="data float-right">
           <h4><a href="#">DIGITAL MARKETING</a></h4>
           <p>Lorem Ipsum is simply dummy text of Lorem the printing and typesetting industry. Lorem Ipsum is simply dummy text</p>
           </div>
         </div>
       </div><!-- End item -->
       
       <div class="eight columns bottom-3">
         <div class="item bottom-3">
           <div class="circle float-left"><a href="#"><i class="icon-resize-full"></i></a></div>
           <div class="data float-right">
           <h4><a href="#">Fully Responsive</a></h4>
           <p>Lorem Ipsum is simply dummy text of Lorem the printing and typesetting industry. Lorem Ipsum is simply dummy text</p>
           </div>
         </div>
       </div><!-- End item -->
       
      
       
     </div><!-- End Container -->
   </div><!-- End services -->
@endsection
@section('main_service')
<div class="recent-work clearfix bottom-2">
    <div class="slidewrap1" >
    
      <!-- <div class="sixteen columns"> 
       <h3 class="title bottom-2">Recent Work</h3> 
      </div> -->
      <h3 class="service">Our Service</h3>
      
      <ul class="slider" id="sliderName1">
      
      <li class="slide">
      
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-1.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-2.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-3.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-4.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-5.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-6.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        </li><!-- End slide -->
        
        <li class="slide">
      
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-1.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-2.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-3.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-4.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-5.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        <!-- item -->
        <div class="one-third column item">
          <a href="single_project_1.html">
          <img src="{{ asset ('public/frontend/images/img/portfolio/thumb-6.jpg') }}" alt="" class="pic" />
          <div class="img-caption">
          <div class="desc"><h3>Apple Creative</h3><p>Illustration, 3d</p><span>+</span></div>
          </div><!-- hover effect -->
          </a>
        </div>
        <!-- End -->
        
        </li><!-- End slide -->
        
        </ul>
      
      </div><!-- End slidewrap -->
    
     </div><!-- End recent-work -->
    
     <div class="sixteen columns"><hr class="line bottom-3"></div><!-- End line -->
     
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