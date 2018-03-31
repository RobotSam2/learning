@extends($route.'.main')
@section ('section-title', $data->name)
@section ('section-css')

@endsection

@section ('imageuploadjs')
   
@endsection

@section ('section-js')
	
@endsection

@section ('section-content')
	@include('cp.layouts.error')
	<form id="form" action="{{ route($route.'.update', $data->id) }}" name="form" method="POST"  enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		
		<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="name">ឈ្មោះ</label>
				<div class="col-sm-10">
					<input 	id="name"
							name="name"
						   	value = "{{$data->name}}"
						   	type="text"
						   	placeholder = "សូមបញ្ជូលឈ្មោះ"
						   	class="form-control"
						   	data-validation="[L>=1, L<=200]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
		</div>
		<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="name">ចំនួនសិក្ខាកាម</label>
				<div class="col-sm-10">{{ count($data->majorTeachers) }}</div>
		</div>
	
		
		<div class="form-group row">
			<label class="col-sm-2 form-control-label"></label>
			<div class="col-sm-10">
				<button type="submit" class="btn btn-success"> <i class="fa fa-cog"></i> កែតម្រូវ</button>
				<button type="button" onclick="deleteConfirm('{{ route($route.'.trash', $data->id) }}', '{{ route($route.'.index') }}')" class="btn btn-danger"> <i class="fa fa-trash"></i> លុបចោល</button>
			</div>
		</div>
	</form>
@endsection