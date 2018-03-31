@extends($route.'.main')
@section ('section-title', 'Create New User')
@section ('section-css')
	<link href="{{ asset ('public/user/css/plugin/fileinput/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('public/user/css/plugin/fileinput/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
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
    <script type="text/javascript" src="{{ asset ('public/user/js/plugin/fileinput/fileinput.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset ('public/user/js/plugin/fileinput/theme.js') }}" type="text/javascript"></script>
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
		$("#picture").fileinput({
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
		    defaultPreviewContent: '<img src="{{ asset('public/user/img/avatar.png') }}" alt="Missing Image" class="img img-responsive"><span class="text-muted">Click to select <br /><i style="font-size:12px">Image dimesion must be 200x165 with .jpg or .png type</i></span>',
		    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
		    allowedFileExtensions: ["jpg", "png", "gif"]
		});
	</script>
@endsection

@section ('section-content')
	<div class="container-fluid">
		@include('user.layouts.error')
		@php ($statff_id = "")
		@php ($kh_name = "")
		@php ($en_name = "")
		@php ($cn_name = "")
		@php ($email = "")
		@php ($personal_email = "")
		@php ($phone = "")
        @php ($personal_phone = "")
        @php ($kh_position = "")
        @php ($en_position = "")
        @php ($cn_position = "")
        @php ($status = "")
        @php ($is_ip_validated = "")
       	@if (Session::has('invalidData'))
            @php ($invalidData = Session::get('invalidData'))
            @php ($statff_id = $invalidData['statff_id'])
            @php ($kh_name = $invalidData['kh_name'])
            @php ($en_name = $invalidData['en_name'])
            @php ($cn_name = $invalidData['cn_name'])
            @php ($email = $invalidData['email'])
            @php ($personal_email = $invalidData['personal_email'])
            @php ($phone = $invalidData['phone'])
            @php ($personal_phone = $invalidData['personal_phone'])
            @php ($kh_position = $invalidData['kh_position'])
            @php ($en_position = $invalidData['en_position'])
            @php ($cn_position = $invalidData['cn_position'])
            @php ($status = $invalidData['status'])
            @php ($is_ip_validated = $invalidData['is_ip_validated'])
       	@endif
		<form id="form" action="{{ route($route.'.store') }}" name="form" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="statff_id">Statff ID</label>
				<div class="col-sm-10">
					<input 	id="statff_id"
							name="statff_id"
						   	value = "{{ $statff_id }}"
						   	type="text"
						   	placeholder = "Eg. Jhon Son"
						   	class="form-control"
						   	data-validation="[L>=2, L<=18, MIXED]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="kh_content">Language</label>
				<div class="col-sm-1">
					<div class="radio  margin-top-10">
						<input type="radio" name="language_id" id="radio-1" value="1" >
						<label for="radio-1">Khmer</label>
					</div>
				</div>
				<div class="col-sm-1">
					<div class="radio  margin-top-10">
						<input type="radio" name="language_id" id="radio-2" value="2" >
						<label for="radio-2">English</label>
					</div>
				</div>
				<div class="col-sm-1">
					<div class="radio  margin-top-10">
						<input type="radio" name="language_id" id="radio-3" value="3" >
						<label for="radio-3">Chinese</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="kh_name">Name (KH)</label>
				<div class="col-sm-10">
					<input 	id="kh_name"
							name="kh_name"
						   	value = "{{ $kh_name }}"
						   	type="text"
						   	placeholder = "Eg. Jhon Son"
						   	class="form-control"
						   	data-validation="[L>=2, L<=18, MIXED]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="en_name">Name (EN)</label>
				<div class="col-sm-10">
					<input 	id="en_name"
							name="en_name"
						   	value = "{{ $en_name }}"
						   	type="text"
						   	placeholder = "Eg. Jhon Son"
						   	class="form-control"
						   	data-validation="[L>=2, L<=18, MIXED]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="cn_name">Name (CN)</label>
				<div class="col-sm-10">
					<input 	id="cn_name"
							name="cn_name"
						   	value = "{{ $cn_name }}"
						   	type="text"
						   	placeholder = "Eg. Jhon Son"
						   	class="form-control"
						   	data-validation="[L>=2, L<=18, MIXED]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="email">Email</label>
				<div class="col-sm-10">
					<input 	id="email"
							name="email"
							value = "{{ $email }}"
							type="text"
							placeholder = "Eg. you@example.com"
						   	class="form-control"
						   	data-validation="[EMAIL]">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="personal_email">personal Email</label>
				<div class="col-sm-10">
					<input 	id="personal_email"
							name="personal_email"
							value = "{{ $personal_email }}"
							type="text"
							placeholder = "Eg. you@example.com"
						   	class="form-control"
						   	data-validation="[EMAIL]">
				</div>
			</div>

			<div class="form-group row">
			<label class="col-sm-2 form-control-label" for="phone">Phone</label>
			<div class="col-sm-10">
				<input 	id="phone"
						name="phone"
					   	value = "{{ $phone }}"
					   	type="text" 
					   	placeholder = "Eg. 093123457"
					   	class="form-control"
					   	data-validation="[L>=9, L<=10, numeric]"
						data-validation-message="$ is not correct." 
						data-validation-regex="/(^[00-9].{8}$)|(^[00-9].{9}$)/"
						data-validation-regex-message="$ must start with 0 and has 10 or 11 digits" />
						
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label" for="personal_phone">Personal Phone</label>
			<div class="col-sm-10">
				<input 	id="personal_phone"
						name="personal_phone"
					   	value = "{{ $personal_phone }}"
					   	type="text" 
					   	placeholder = "Eg. 093123457"
					   	class="form-control"
					   	data-validation="[L>=9, L<=10, numeric]"
						data-validation-message="$ is not correct." 
						data-validation-regex="/(^[00-9].{8}$)|(^[00-9].{9}$)/"
						data-validation-regex-message="$ must start with 0 and has 10 or 11 digits" />
						
			</div>
		</div>


		<div class="form-group row">
			<label class="col-sm-2 form-control-label" for="kh_position">Position (KH)</label>
			<div class="col-sm-10">
				<input 	id="kh_position"
						name="kh_position"
					   	value = "{{ $kh_position }}"
					   	type="text"
					   	placeholder = "Eg. Jhon Son"
					   	class="form-control"
					   	data-validation="[L>=2, L<=18, MIXED]"
						data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
						
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label" for="en_position">Position (EN)</label>
			<div class="col-sm-10">
				<input 	id="en_position"
						name="en_position"
					   	value = "{{ $en_position }}"
					   	type="text"
					   	placeholder = "Eg. Jhon Son"
					   	class="form-control"
					   	data-validation="[L>=2, L<=18, MIXED]"
						data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
						
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 form-control-label" for="cn_position">Position (CN)</label>
			<div class="col-sm-10">
				<input 	id="cn_position"
						name="cn_position"
					   	value = "{{ $cn_position}}"
					   	type="text"
					   	placeholder = "Eg. Jhon Son"
					   	class="form-control"
					   	data-validation="[L>=2, L<=18, MIXED]"
						data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
						
			</div>
		</div>

			<div class="form-group row">
				<label for="position_id" class="col-sm-2 form-control-label">Position</label>
				<div class="col-sm-10">
					<select id="position_id" name="position_id" class="form-control">
						
						@foreach( $positions as $position)
							
								<option value="{{ $position->id }}" >{{ $position->name }}</option>
							
						@endforeach
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="password">Password</label>
				<div class="col-sm-10">
					<input 	id="password"
							name="password"
						   	value = ""
						   	type="password"
						   	placeholder = ""
						   	class="form-control"
						   	data-validation="[L>=6, L<=18]"
							data-validation-message="$ must be between 6 and 18 characters." />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="confirm_password">Confirm Password</label>
				<div class="col-sm-10">
					<input 	id="confirm_password"
							name="confirm_password"
						   	value = ""
						   	type="password"
						   	placeholder = ""
						   	class="form-control"
						   	data-validation="[L>=6, L<=18]"
							data-validation-message="$ must be between 6 and 18 characters." />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="email">Image</label>
				<div class="col-sm-10">
					<div class="kv-avatar center-block">
				        <input id="picture" name="picture" type="file" class="file-loading">
				    </div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="kh_content">Status</label>
				<div class="col-sm-10">
					<div class="checkbox-toggle">
						<input id="status-status" type="checkbox"  >
						<label onclick="booleanForm('status')" for="status-status"></label>
					</div>
					<input type="hidden" name="status" id="status" value="{{ $status }}">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="kh_content">Validate IP</label>
				<div class="col-sm-10">
					<div class="checkbox-toggle">
						<input id="validate"  type="checkbox"  >
						<label onclick="booleanForm('is_ip_validated')" for="validate"></label>
					</div>
					<input type="hidden" name="is_ip_validated" id="is_ip_validated" value="{{ $is_ip_validated }}">
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="description">Description</label>
				<div class="col-sm-10">
					<div class="summernote-theme-1">
						<textarea id="description" name="description" class="form-control"></textarea>
					</div>	
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 form-control-label"></label>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-success"> <fa class="fa fa-plus"></i> Create</button>
				</div>
			</div>
		</form>
	</div>

@endsection