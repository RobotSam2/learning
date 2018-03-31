@extends('cp.alumnae.main')
@section ('section-title', $data->name)
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
		
		});


		function selectMajor(major_id){
		$.ajax({
		        url: "{{ route('cp.alumnae.check-major') }}?teacher_id={{ $data->id }}&major_id="+major_id,
		        type: 'GET',
		        data: { },
		        success: function( response ) {
		            if ( response.status === 'success' ) {
		            	toastr.success(response.msg);
		            }else{
		            	swal("Error!", "Sorry there is an error happens. " ,"error");
		            }
		        },
		        error: function( response ) {
		           swal("Error!", "Sorry there is an error happens. " ,"error");
		        }
		});
	}
		
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
		    defaultPreviewContent: '<img src="{{ asset($data->avatar) }}" alt="Missing Image" class="img img-responsive"><span class="text-muted">Click to select <br /><i style="font-size:12px">Image dimesion must be 200x165 with .jpg or .png type</i></span>',
		    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
		    allowedFileExtensions: ["jpg", "png", "gif"]
		});
	</script>
@endsection

@section ('section-content')
	
	<section class="tabs-section">
				<div class="tabs-section-nav">
					<div class="tbl">
						<ul class="nav" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" href="#tabs-2-tab-1" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										ព័ត៌មានទូទៅ
									</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tabs-2-tab-2" role="tab" data-toggle="tab">
									<span class="nav-link-in">
										មុខវិជ្ជាឯកទេស
									</span>
								</a>
							</li>
							
						</ul>
					</div>
				</div><!--.tabs-section-nav-->

				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="tabs-2-tab-1">

						<div class="container-fluid">
							@include('cp.layouts.error')
							
							@php ($name = $data->name)
							@php ($sex_id = $data->sex_id)
							@php ($dob = $data->dob)
							@php ($phone = $data->user->phone)
					        @php ($school_id = $data->school_id)
					        @php ($year_id = $data->year_id)
					        @php ($workplace = $data->workplace)
					        @php ($province_id = $data->province_id)

					      
							<form id="form" action="{{ route('cp.alumnae.update', $data->id) }}" name="form" method="POST"  enctype="multipart/form-data">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								

								<input type="hidden" name="user_id" value="{{$data->user_id}}"	/>
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
										<button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> កែប្រែ</button>
									</div>
								</div>
							</form>
						</div>

					</div><!--.tab-pane-->
					<div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-2">
						<div class="table-responsive">
							<table id="table-edit" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>ឈ្មោះ</th>
										<th>ស្ថានភាព</th>
										
									</tr>
								</thead>
								<tbody>

									@php ($i = 1)
									@foreach ($majors as $row)
										<tr>
											<td>{{ $i++ }}</td>
											<td>{{ $row->name }}</td>
											<td>
												@php( $selected = $data->teacherMajors )
												@php($check ="")
												@foreach($selected as $x)
													@if($x->major_id == $row->id)
														@php($check = "checked")
													@endif
												@endforeach
												<div class="checkbox-bird">
													<input type="checkbox" major-id="{{ $row->id }}" id="major-{{ $row->id }}" {{$check}}>
													<label class="item-acc" onclick="selectMajor({{ $row->id }})"  for="major-{{ $row->id }}"></label>
												</div>
											</td>
										
										</tr>
									
									@endforeach
									
									
								</tbody>
							</table>
						</div >
					</div><!--.tab-pane-->
				</div><!--.tab-content-->
			</section><!--.tabs-section-->

				
	


	

@endsection