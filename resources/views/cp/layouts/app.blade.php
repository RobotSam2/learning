@extends('cp.layouts.master')

@section ('headercss')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset ('public/cp/css/lib/font-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset ('public/cp/css/lib/bootstrap-sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset ('public/cp/css/lib/summernote/summernote.css') }}"/>
    <link rel="stylesheet" href="{{ asset ('public/cp/css/main.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Hanuman" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('public/cp/css/kh_laugauges.css') }}">
    <script type="text/javascript" src="{{ asset ('public/cp/js/lib/jquery/jquery.min.js') }}"></script>
    @yield('appheadercss')
@endsection



@section ('bodyclass')
    class="with-side-menu control-panel control-panel-compact"
@endsection

@section ('header')

<header class="site-header">
    <div class="container-fluid">
        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="{{ asset ('public/cp/img/ecs.jpg') }}" alt="">
            <img class="hidden-lg-up" src="{{ asset ('public/cp/img/ecs.jpg') }}" alt="">
        </a>
        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    
                   
                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div><!--.site-header-shown-->

                <div class="mobile-menu-right-overlay"></div>
                
            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header><!--.site-header-->
@endsection

@section ('menu')
    @php ($menu = "")
    @if(isset($_GET['menu']))
        @php( $menu = $_GET['menu'])
    @endif
    

    <div class="mobile-menu-left-overlay"></div>
    <nav class="side-menu">
        <ul class="side-menu-list">    
           
            
          
        
            <li class="red @yield('active-main-menu-applicant')">
                <a href="#">
                <span>
                    <i class="fa fa-desktop"></i>
                    <span class="lbl">ផ្ទាំងគ្រប់គ្រង</span>
                </span>
                </a>
            </li>

            <li class="red @yield('active-main-menu-alumnae')">
                <a href="{{ route('cp.alumnae.index') }}">
                <span>
                    <i class="fa fa-users"></i>
                    <span class="lbl">សិក្ខាកាម</span>
                </span>
                </a>
            </li>

            <li class="red @yield('active-main-menu-maincate')">
                <a href="{{ route('cp.maincate.index') }}">
                <span>
                    <i class="fa fa-sitemap"></i>
                    <span class="lbl">ប្រភេទ ផលិតផល ដំបូង</span>
                </span>
                </a>
            </li>

            <li class="red @yield('active-main-menu-category')">
                <a href="{{ route('cp.category.index') }}">
                <span>
                    <i class="fa fa-bars"></i>
                    <span class="lbl">ប្រភេទ ផលិតផល</span>
                </span>
                </a>
            </li>

            <li class="red @yield('active-main-menu-product')">
                <a href="{{ route('cp.product.index') }}">
                <span>
                    <i class="fa fa-cart-arrow-down"></i>
                    <span class="lbl">ផលិតផល</span>
                </span>
                </a>
            </li>

            <li class="red @yield('active-main-menu-major')">
                <a href="{{ route('cp.major.index') }}">
                <span>
                    <i class="fa fa-maxcdn"></i>
                    <span class="lbl">មុខវិជ្ជាឯកទេស</span>
                </span>
                </a>
            </li>

            <li class="red @yield('active-main-menu-province')">
                <a href="{{ route('cp.province.index') }}">
                <span>
                    <i class="fa fa-map"></i>
                    <span class="lbl">ខេត្ត</span>
                </span>
                </a>
            </li>

            <li class="red @yield('active-main-menu-year')">
                <a href="{{ route('cp.year.index') }}">
                <span>
                    <i class="fa fa-calendar"></i>
                    <span class="lbl">ឆ្នាំ</span>
                </span>
                </a>
            </li>

            <li class="red @yield('active-main-menu-school')">
                <a href="{{ route('cp.school.index') }}">
                <span>
                    <i class="fa fa-building"></i>
                    <span class="lbl">មជ្ឈមណ្ឌលគរុកោសល្យ</span>
                </span>
                </a>
            </li>

            

            <li class="red">
                <a href="{{ route('cp.auth.logout') }}">
                <span>
                    <i class="fa fa-sign-out"></i>
                    <span class="lbl">ចាកចេញ</span>
                </span>
                </a>
            </li>

         

           
        </ul>
    </nav><!--.side-menu-->

@endsection

@section ('content')
    <div class="page-content">
        
        @yield ('page-content')
        
    </div>
@endsection




@section ('bottomjs')
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        @yield ('imageuploadjs')
        <script type="text/javascript" src="{{ asset ('public/cp/js/lib/tether/tether.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset ('public/cp/js/lib/bootstrap/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset ('public/cp/js/plugins.js') }}"></script>
        <script type="text/javascript" src="{{ asset ('public/cp/js/lib/lobipanel/lobipanel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset ('public/cp/js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset ('public/cp/js/lib/bootstrap-sweetalert/sweetalert.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset ('public/cp/js/lib/blockUI/jquery.blockUI.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="{{ asset ('public/cp/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
        <script src="{{ asset ('public/cp/js/lib/select2/select2.full.min.js')}}"></script>
       <script type="text/javascript" src="{{ asset ('public/cp/js/lib/summernote/summernote.min.js') }}"></script>
        <script src="{{ asset ('public/cp/js/app.js') }}"></script>
        <script src="{{ asset ('public/cp/js/camcyber.js') }}"></script>
        @yield('appbottomjs')

        @if(Session::has('msg'))
        <script type="text/JavaScript">
            toastr.success("{!!Session::get('msg')!!}");
        </script>
        @endif
        @if(Session::has('error'))
        <script type="text/JavaScript">
            toastr.error("{!!Session::get('error')!!}");
        </script>
        @endif
@endsection