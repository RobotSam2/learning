<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from themes.jozoor.com/invention-html/white/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Mar 2018 16:49:38 GMT -->
<head>

  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="description" content="Invention Theme for corporate and creative sites, responsive and clean layout, more than color skins">
  <meta name="author" content="Jozoor team">

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @yield('headercss')
  
  
</head>
<body>
  <div id="wrap" class="boxed">
        @yield('header_menu')
        @yield('banner')
        <!-- Start main content -->
        <div class="container main-content clearfix">
            @yield('main_service')
        </div><!-- <<< End Container >>> -->
        @yield('footer')
  
  </div><!-- End wrap -->
  @yield('footer_js')
   
</body>
</html>