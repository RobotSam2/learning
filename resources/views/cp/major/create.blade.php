@extends ($route.'.main')
@section ('section-title', 'ការបង្កើតថ្មីរ')
@section ('section-css')
	
@endsection

@section ('imageuploadjs')
 
@endsection

@section ('section-js')
	
@endsection

@section ('section-content')
	<div class="container-fluid">
		@include('cp.layouts.error')

		@php ($name = "")
		
       	@if (Session::has('invalidData'))
            @php ($invalidData = Session::get('invalidData'))
            @php ($name = $invalidData['name'])
            
       	@endif
		<form id="form" action="{{ route($route.'.store') }}" name="form" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="name">ឈ្មោះ</label>
				<div class="col-sm-10">
					<input 	id="name"
							name="name"
						   	value = "{{$name}}"
						   	type="text"
						   	placeholder = "សូមបញ្ជូលឈ្មោះ"
						   	class="form-control"
						   	data-validation="[L>=1, L<=200]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>
			
			
			
			<div class="form-group row">
				<label class="col-sm-2 form-control-label"></label>
				<div class="col-sm-10">
					
					<button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> បង្កើត</button>
				</div>
			</div>
		</form>
	</div>

@endsection