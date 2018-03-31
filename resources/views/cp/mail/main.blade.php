@extends('cp.layouts.app')
@section('active-main-menu-mail', 'opened')


@section ('appheadercss')
	@yield('section-css')
@endsection


@section ('appbottomjs')
	@yield('section-js')
@endsection

@section ('page-content')

	<div class="container-fluid">

		<div class="box-typical box-typical-padding">
			@yield('section-content')
		</div>	
	</div>

@endsection