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
		@php ($main_id = "")
		
       	@if (Session::has('invalidData'))
            @php ($invalidData = Session::get('invalidData'))
            @php ($name = $invalidData['name'])
			@php ($main_id = $invalidData['main_id'])
            
       	@endif
		<form id="form" action="{{ route($route.'.store') }}" name="form" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="name">ឈ្មោះប្រភេទផលិតផល</label>
				<div class="col-sm-10">
					<input 	id="name"
							name="name"
						   	value = "{{$name}}"
						   	type="text"
						   	placeholder = "សូមបញ្ជូល ប្រភេទ ផលិតផល"
						   	class="form-control"
						   	data-validation="[L>=1, L<=200]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>

			<div class="form-group row">
				<label for="position_id" class="col-sm-2 form-control-label">ប្រភេទផលិតផលដំបូង</label>
				<div class="col-sm-10">
					
					<select name="main_id" class="form-control">		

					@if($main_id != 0)
						@php( $lable = DB::table('main_categoires')->find($main_id) )
						@if( sizeof($lable) == 1 )
							<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
						@endif
					@endif
					<option value="0" >ជ្រើសរើស</option>
					@foreach( $maincate as $row)
						@if($row->id != $main_id)
							<option value="{{ $row->id }}" >{{ $row->name }}</option>
						@endif
					@endforeach		

							
					</select>

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