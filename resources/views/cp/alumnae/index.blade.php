@extends($route.'.main')
@section ('section-title', 'ទាំងអស់')
@section ('section-css')

@endsection
@section ('section-js')
	<script type="text/javascript">
		$(document).ready(function() {
			$("#btn-search").click(function(){
			search();
			})
			$("#limit").change(function(){
				search();
			})
		});

	   function search(){
			
			
			
			limit 		= $('#limit').val();
			url="?limit="+limit;

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
			
			$(location).attr('href', '{{ route($route.'.index') }}'+url);
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
@endsection

@section ('section-content')
<div class="row">
	<div class="col-md-2">
		<input id="key" type='text' class="form-control" value="{{ isset($appends['key'])?$appends['key']:'' }}" placeholder="ឈ្មោះឬទូរស័ព្ទ" />
	</div>
	<div class="col-md-2">
		<select id="sex_id" class="form-control">
			@php( $sex_id = isset($appends['sex_id'])?$appends['sex_id']:0 )
			@if($sex_id != 0)
				@php( $lable = DB::table('sexes')->find($sex_id) )
				@if( sizeof($lable) == 1 )
					<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
				@endif
			@endif
			<option value="0" >ភេទ</option>
			@foreach( $sexes as $row)
				@if($row->id != $sex_id)
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
		<button id="btn-search" class="tabledit-delete-button btn btn-sm btn-primary" style="float: none;"><span class="fa fa-search"></span></button>
		<a href="{{ route($route.'.create') }}"  class="tabledit-delete-button btn btn-sm btn-primary" style="float: none;"><span class="fa fa-plus"></span></a>
		<button id="btn-download" onclick="tableToExcel('table-edit', 'W3C Example Table')" class="tabledit-delete-button btn btn-sm btn-primary" style="float: none;"><span class="fa fa-download"></span></button>
		
		<a href="#" target="_blank" id="btn-print" class="tabledit-delete-button btn btn-sm btn-primary" style="float: none;"><span class="fa fa-print"></span></a>
	</div>

</div>

<br />

<div class="table-responsive">
	<table id="table-edit" class="table table-bordered table-hover">
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
				<th>ថ្ថៃបង្កើត</th>
				<th></th>
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
					<td>{{ $row->created_at }}</td>
					
					<td style="white-space: nowrap; width: 1%;">
						<div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                           	<div class="btn-group btn-group-sm" style="float: none;">
                           		<a href="{{ route($route.'.edit', $row->id) }}"  class="tabledit-delete-button btn btn-sm btn-success" style="float: none;"><span class="fa fa-eye"></span></a>
                           		<a href="#" onclick="deleteConfirm('{{ route($route.'.trash', $row->id) }}', '{{ route($route.'.index') }}')" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none;"><span class="glyphicon glyphicon-trash"></span></a>
                           	</div>
                       </div>
                    </td>
				</tr>
			
			@endforeach
			
			
		</tbody>
	</table>
</div >
<div class="row">
	<div class="col-xs-2">
		<select id="limit" onchange="search()" class="form-control" style="margin-top: 15px;width:50%">
			@if(isset($appends['limit']))
			<option>{{ $appends['limit'] }}</option>
			@endif
			<option>10</option>
			<option>20</option>
			<option>30</option>
			<option>40</option>
			<option>50</option>
			<option>60</option>
			<option>70</option>
			<option>80</option>
			<option>90</option>
			<option>100</option>
		</select>
	</div>
	<div class="col-xs-10">

		{{ $data->appends($appends)->links('vendor.pagination.custom-html') }}
	</div>
</div>
@endsection