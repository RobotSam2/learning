@extends ($route.'.main')
@section ('section-title', 'ការបង្កើតថ្មីរ')

@section ('section-css')
	<link href="{{ asset ('public/cp/css/plugin/fileinput/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('public/cp/css/plugin/fileinput/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
	<!-- some CSS styling changes and overrides -->
	<style>
		.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
		    margin: 0;
		    padding: 0;
		    border: none;
		    box-shadow: none;
		    text-align: center;
		}
		.kv-avatar .file-input {
		    display: table-cell;
		    max-width: 220px;
		}
	</style>
@endsection
@section ('imageuploadjs')
    <script type="text/javascript" src="{{ asset ('public/cp/js/plugin/fileinput/fileinput.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset ('public/cp/js/plugin/fileinput/theme.js') }}" type="text/javascript"></script>
@endsection

@section ('section-js')
	<script type="text/JavaScript">
		$(document).ready(function(event){
		
			$('#form').validate({
				modules : 'file',
				submit: {
					settings: {
						inputContainer: '.form-group',
						errorListClass: 'form-tooltip-error'
					}
				}
			}); 
			
		}); 
		
	</script>

	

	<script>
		
		var btnCust = ''; 
		$("#feature").fileinput({
		    overwriteInitial: true,
		    maxFileSize: 1500,
		    showClose: false,
		    showCaption: false,
		    showBrowse: false,
		    browseOnZoneClick: true,
		    removeLabel: '',
		    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
		    removeTitle: 'Cancel or reset changes',
		    elErrorContainer: '#kv-avatar-errors-2',
		    msgErrorClass: 'alert alert-block alert-danger',
		    defaultPreviewContent: '<img src="{{ asset('public/cp/img/avatar.png') }}" alt="Missing Image" class="img img-responsive"><span class="text-muted">Click to select <br /><i style="font-size:12px">Image dimesion must be 200x165 with .jpg or .png type</i></span>',
		    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
		    allowedFileExtensions: ["jpg", "png", "gif"]
		});
	</script>
@endsection

@section ('section-content')
	<div class="container-fluid">
		@include('cp.layouts.error')
		@php ($cate_id = 0)
		@php ($title = "")
		@php ($price = "")
		@php ($description = "")
		@php ($pro_not = "")
		
       	@if (Session::has('invalidData'))
            @php ($invalidData = Session::get('invalidData'))
            @php ($title = $invalidData['title'])
			@php ($cate_id = $invalidData['cate_id'])
            
       	@endif
		<form id="form" action="{{ route($route.'.store') }}" name="form" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="title">Product Name</label>
				<div class="col-sm-10">
					<input 	id="title"
							name="title"
						   	value = "{{$title}}"
						   	type="text"
						   	placeholder = "សូមបញ្ជូលឈ្មោះ"
						   	class="form-control"
						   	data-validation="[L>=1, L<=200]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>

			<div class="form-group row">
				<label for="position_id" class="col-sm-2 form-control-label">Category</label>
				<div class="col-sm-10">
					
					<select name="cate_id" class="form-control">	
						@if($cate_id != 0)
							@php( $lable = DB::table('categories')->find($cate_id) )
							@if( sizeof($lable) == 1 )
								<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
							@endif
						@endif
						<option value="0" >ជ្រើសរើស</option>
						@foreach($category as $row)
							@if($row->id != $cate_id)
								<option value="{{ $row->id }}" >{{ $row->name }}</option>
							@endif
						@endforeach						
					</select>

				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="price">Price</label>
				<div class="col-sm-10">
					<input 	id="price"
							name="price"
						   	value = "{{$price}}"
						   	type="text"
						   	placeholder = "សូមបញ្ជូលឈ្មោះ"
						   	class="form-control"
						   	data-validation="[L>=1, L<=200]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="desc">Description</label>
				<div class="col-sm-10">
					<input 	id="desc"
							name="desc"
						   	value = "{{$description}}"
						   	type="text"
						   	placeholder = "សូមបញ្ជូលឈ្មោះ"
						   	class="form-control"
						   	data-validation="[L>=1, L<=200]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="not">Not</label>
				<div class="col-sm-10">
					<input 	id="not"
							name="not"
						   	value = "{{$pro_not}}"
						   	type="text"
						   	placeholder = "សូមបញ្ជូលឈ្មោះ"
						   	class="form-control"
						   	data-validation="[L>=1, L<=200]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="email">រូបថត</label>
				<div class="col-sm-10">
					<div class="kv-avatar center-block">
						<input id="feature" name="feature" type="file" class="file-loading">
					</div>
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