<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E.C.S. Alumni List</title>
    <link rel="shortcut icon" href="http://www.esc-kizuna.com/wp-content/themes/esc/images/favicon/esc_favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  	<link href="https://fonts.googleapis.com/css?family=Hanuman" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('public/cp/css/kh_laugauges.css') }}">  
    <script type="text/javascript" src="{{ asset ('public/cp/js/lib/jquery/jquery.min.js') }}"></script>
</head>
  <body>
  	<br />
  	
  	<div class="container">
  		<div class="row">
  			<img src="{{ asset('public/frontend/cover.jpg') }}" class="img-fluid" />
  		</div>
  		<br />

  		<div class="row">
			<div class="col-md-3">
				<input id="key" type='text' class="form-control" value="{{ isset($appends['key'])?$appends['key']:'' }}" placeholder="ឈ្មោះ ឬ លេខទូរស័ព្ទ" />
			</div>
			
			<div class="col-md-3">
				<select id="school_id" class="form-control">	
				 	@php( $school_id = isset($appends['school_id'])?$appends['school_id']:0 )
					@if($school_id != 0)
						@php( $lable = DB::table('schools')->find($school_id) )
						@if( sizeof($lable) == 1 )
							<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
						@endif
					@endif
					<option value="0" >មជ្ឈមណ្ឌលគរុកោសល្យ</option>
					@foreach( $schools as $row)
						@if($row->id != $school_id)
							<option value="{{ $row->id }}" >{{ $row->name }}</option>
						@endif
					@endforeach
				</select>
			</div>

			<div class="col-md-2">
				<select id="province_id" class="form-control">	
				 	@php( $province_id = isset($appends['province_id'])?$appends['province_id']:0 )
					@if($province_id != 0)
						@php( $lable = DB::table('provinces')->find($province_id) )
						@if( sizeof($lable) == 1 )
							<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
						@endif
					@endif
					<option value="0" >ខេត្ត</option>
					@foreach( $provinces as $row)
						@if($row->id != $province_id)
							<option value="{{ $row->id }}" >{{ $row->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			
			
			<div class="col-md-2">
				<select id="year_id" class="form-control">	
				 	@php( $year_id = isset($appends['year_id'])?$appends['year_id']:0 )
					@if($year_id != 0)
						@php( $lable = DB::table('years')->find($year_id) )
						@if( sizeof($lable) == 1 )
							<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
						@endif
					@endif
					<option value="0" >ឆ្នាំបញ្ចប់</option>
					@foreach( $years as $row)
						@if($row->id != $year_id)
							<option value="{{ $row->id }}" >{{ $row->name }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="col-md-2">
				<button id="btn-search" class="btn btn-primary" >ស្វែងរក</button>
			</div>

		</div>
		<br />

  		<div class="row">
  			@if(count($data)>0)
	  			<div class="table-responsive">
		  			<table id="table-cnt" class="table  table-striped table-sm">
						<thead>
							<tr>
								<th>#</th>
								<th>ឈ្មោះ</th>
								<th>ភេទ</th>
								<th>ថ្ងៃ ខែ ឆ្នាំកំណើត</th>
								<th>លេខទូរស័ព</th>
								<th>សាលាគរុកោសល្យ </th>
								<th>មុខវិជ្ជាឯកទេស</th>
								<th>ឆ្នាំបញ្ចប់</th>
								<th>ទីកន្លែងបម្រើការង</th>
								<th>ខេត្តបម្រើការងារ</th>
							</tr>
						</thead>
						<tbody>

							@php ($i = 1)
							@foreach ($data as $row)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $row->name }}</td>
									<td>@if(isset($row->sex)) {{ $row->sex->name }} @endif</td>
									<td>{{ $row->dob }}</td>
									<td>@if(isset($row->user)) {{ $row->user->phone }} @endif</td>
									<td>@if(isset($row->school)) {{ $row->school->name }} @endif</td>
									<td>
										@php($majors = $row->teacherMajors)
										@foreach ($majors as $major)
											@if(isset($major->major))
											<span>{{ $major->major->name }} - </span>
											@endif
										@endforeach
									</td>
									<td>{{ $row->year->name }}</td>
									<td>{{ $row->workplace }}</td>
									<td>@if(isset($row->province)) {{ $row->province->name }} @endif</td>
									
									
								</tr>
							
							@endforeach
							
							
						</tbody>
					</table>
				</div>
			@else
				<div class="alert alert-warning" role="alert">
				  គ្មាន​ទិន្នន័យ
				</div>
			@endif
  		</div>

  		<div class="row">
			<div class="col-xs-10">
				 <nav aria-label="...">
            		  {{ $data->appends($appends)->links('vendor.pagination.frontend-html') }}
            	</nav>
			</div>
		</div>
		<div class="row">
			<div class="alert alert-warning" role="alert">
			  ប្រសិនបើអ្នករកមិនឃើញឈ្មោះ ឬ កែពត៏មានរបស់លោកអ្នកចុច <a href="https://www.messenger.com/t/1413223682291696"  target="_blank">ត្រងនេះ</a>​ ដើម្បីទាក់ទងបុគ្គលិករបស់យើង
			</div>
		</div>
		<div class="row footer">
			<div class="col-xs-12 col-sm-4">រក្សាសិទ្ធិ © {{date('Y')}} <a href="http://www.esc-kizuna.com/"​ target="_blank">KIZUNA </a></div>
			<div class="col-xs-12 col-sm-4">ឧបត្ថម្ភដោយ <a href="https://www.nippon-foundation.or.jp/en/"  target="_blank">THE NIPPON FOUNDATION </a></div>
			<div class="col-xs-12 col-sm-4">អភិវឌ្ឍន៍ដោយ <a href="http://camcyber.com/"  target="_blank">CamCyber. </a></div>
		</div>
  		
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#btn-search").click(function(){
			search();
			})
			
		});

	   function search(){
			
			
			url="?limit=100";

			key 	= $('#key').val();
			if(key!=""){
				url+='&key='+key;
			}

			sex_id 	= $('#sex_id').val();
			if(sex_id!=0){
				url+='&sex_id='+sex_id;
			}

			province_id 	= $('#province_id').val();
			if(province_id!=""){
				url+='&province_id='+province_id;
			}

			school_id 	= $('#school_id').val();
			if(school_id!=""){
				url+='&school_id='+school_id;
			}

			year_id 	= $('#year_id').val();
			if(year_id!=""){
				url+='&year_id='+year_id;
			}
			
			$(location).attr('href', ''+url);
		}
	  	
	  	var tableToExcel = (function() {
		var uri = 'data:application/vnd.ms-excel;base64,'
		    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
		    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
		    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
		  return function(table, name) {
		    if (!table.nodeType) table = document.getElementById(table)
		    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
		    window.location.href = uri + base64(format(template, ctx))
		  }
		})()
	</script>

	<style type="text/css">
		#table-cnt{

		}

		#table-cnt thead tr {
			font-size:12px;
		}
		#table-cnt tbody tr {
			font-size:12px;
		}
		.footer{
			margin-top:30px;
		}
		.footer{
			text-align: center;
		}
	</style>

    
  </body>
</html>