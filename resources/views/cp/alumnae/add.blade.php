@extends('cp.alumnae.main')
@section ('section-title', 'បង្កើតថ្មី')
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
		$("#avatar").fileinput({
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
		
		@php ($name = "")
		@php ($sex_id = 1)
		@php ($dob = "")
		@php ($phone = "")
        @php ($school_id = 0)
        @php ($year_id = 0)
        @php ($workplace = "")
        @php ($province_id = 0)

       	@if (Session::has('invalidData'))
            
            @php ($invalidData = Session::get('invalidData'))
            @php ($name = $invalidData['name'])
            @php ($sex_id = $invalidData['sex_id'])
            @php ($dob = $invalidData['dob'])
            @php ($phone = $invalidData['phone'])
            @php ($school_id = $invalidData['school_id'])
            @php ($year_id = $invalidData['year_id'])
            @php ($workplace = $invalidData['workplace'])
            @php ($province_id = $invalidData['province_id'])

       	@endif
		<form id="form" action="{{ route('cp.alumnae.store') }}" name="form" method="POST"  enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<div class="form-group row">
									<label class="col-sm-2 form-control-label" for="statff_id">ឈ្មោះ</label>
									<div class="col-sm-10">
										<input 	id="name"
												name="name"
											   	value = "{{ $name }}"
											   	type="text"
											   	placeholder = "Eg. គឹម សុជាតា"
											   	class="form-control" />
												
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 form-control-label" for="sex_id">ភេទ</label>
									<div class="col-sm-1">
										<div class="radio  margin-top-10">
											<input type="radio" name="sex_id" id="radio-1" value="1" @if($sex_id == 1) checked @endif >
											<label for="radio-1">ប្រុស</label>
										</div>
									</div>
									<div class="col-sm-1">
										<div class="radio  margin-top-10">
											<input type="radio" name="sex_id" id="radio-2" value="2" @if($sex_id == 2) checked @endif >
											<label for="radio-2">ស្រី</label>
										</div>
									</div>

								</div>
								<div class="form-group row">
									<label class="col-sm-2 form-control-label" for="statff_id">ថ្ងៃ ខែ ឆ្នាំកំណើត</label>
									<div class="col-sm-10">
										<input 	id="dob"
												name="dob"
											   	value = "{{ $dob }}"
											   	type="text"
											   	placeholder = "Eg. 01-01-1990"
											   	class="form-control" />
												
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 form-control-label" for="">លេខទូរស័ព្ទ</label>
									<div class="col-sm-10">
										<input 	id="phone"
												name="phone"
											   	value = "{{ $phone }}"
											   	type="text"
											   	placeholder = "Eg. 0965416704"
											   	class="form-control" />
												
									</div>
								</div>
								
								<div class="form-group row">
									<label for="position_id" class="col-sm-2 form-control-label">សាលាគរុកោសល្យ</label>
									<div class="col-sm-10">
										
										<select name="school_id" class="form-control">	
										 	
											@if($school_id != 0)
												@php( $lable = DB::table('schools')->find($school_id) )
												@if( sizeof($lable) == 1 )
													<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
												@endif
											@endif
											<option value="0" >ជ្រើសរើស</option>
											@foreach( $schools as $row)
												@if($row->id != $school_id)
													<option value="{{ $row->id }}" >{{ $row->name }}</option>
												@endif
											@endforeach
										</select>

									</div>
								</div>
								<div class="form-group row">
									<label for="position_id" class="col-sm-2 form-control-label">ឆ្នាំបញ្ចប់</label>
									<div class="col-sm-10">
										
										<select name="year_id" class="form-control">	
										 	
											@if($year_id != 0)
												@php( $lable = DB::table('years')->find($year_id) )
												@if( sizeof($lable) == 1 )
													<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
												@endif
											@endif
											<option value="0" >ជ្រើសរើស</option>
											@foreach( $years as $row)
												@if($row->id != $year_id)
													<option value="{{ $row->id }}" >{{ $row->name }}</option>
												@endif
											@endforeach
										</select>

									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 form-control-label" for="">ទីកន្លែងបម្រើការងារ</label>
									<div class="col-sm-10">
										<input 	id="workplace"
												name="workplace"
											   	value = "{{ $workplace }}"
											   	type="text"
											   	placeholder = "សាលាបឋមសិក្សាសន្តិភាព"
											   	class="form-control" />
												
									</div>
								</div>
								<div class="form-group row">
									<label for="position_id" class="col-sm-2 form-control-label">ខេត្តបម្រើការងារ</label>
									<div class="col-sm-10">
										
										<select name="province_id" class="form-control">	
										 	
											@if($province_id != 0)
												@php( $lable = DB::table('provinces')->find($province_id) )
												@if( sizeof($lable) == 1 )
													<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
												@endif
											@endif
											<option value="0" >ជ្រើសរើស</option>
											@foreach( $provinces as $row)
												@if($row->id != $province_id)
													<option value="{{ $row->id }}" >{{ $row->name }}</option>
												@endif
											@endforeach
										</select>

									</div>
								</div>

							
								<div class="form-group row">
									<label class="col-sm-2 form-control-label" for="email">រូបថត</label>
									<div class="col-sm-10">
										<div class="kv-avatar center-block">
									        <input id="avatar" name="avatar" type="file" class="file-loading">
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