@extends('cp/layouts.app')
@section('active-main-menu-service', 'opened')
@section('title')
	ប្រភេទ សេវាកម្ម: @yield('section-title')
@endsection

@section ('appheadercss')
	@yield('section-css')
@endsection


@section ('appbottomjs')
	@yield('section-js')
@endsection

@section ('page-content')
	<header class="page-content-header">
		<div class="container-fluid">
			<div class="tbl">
				<div class="tbl-row">
					<div class="tbl-cell">
						<h3>សេវាកម្ម <span> <i class="fa fa-long-arrow-right"></i> @yield('section-title')</span></h3> 
					</div>
					<div class="tbl-cell tbl-cell-action">
						<a href="{{ route($route.'.index') }}"  class="tabledit-delete-button btn btn-sm btn-primary" style="float: none;   @yield("display-btn-add-new") "><span class="fa fa-arrow-left"></span></a>
						<a href="{{ route($route.'.create') }}"  class="tabledit-delete-button btn btn-sm btn-primary" style="float: none;"><span class="fa fa-plus"></span></a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="container-fluid">

		<div class="box-typical box-typical-padding">
			
			@yield('section-content')
		</div>	
	</div>

@endsection