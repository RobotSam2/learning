@extends($route.'.main')
@section ('section-title', 'ទាំងអស់')
@section ('display-btn-add-new', 'display:none')
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

			cate_id 	= $('#cate_id').val();
			if(cate_id!=0){
				url+='&cate_id='+cate_id;
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

@if(sizeof($data) > 0)

<div class="row">
	<div class="col-md-6">
		<input id="key" type='text' class="form-control" value="{{ isset($appends['key'])?$appends['key']:'' }}" placeholder="ចំណងជើងផលិតផល, តម្លៃ...." />
	</div>
	<div class="col-md-3">
		<select id="cate_id" class="form-control">
			@php( $cate_id = isset($appends['cate_id'])?$appends['cate_id']:0 )
			@if($cate_id != 0)
				@php( $lable = DB::table('categories')->find($cate_id) )
				@if( sizeof($lable) == 1 )
					<option value="{{ $lable->id }}" >{{ $lable->name }}</option>
				@endif
			@endif
			<option value="0" >ប្រភេទផលិតផល</option>
			@foreach( $category as $key => $row)
				@if($row->id != $cate_id)
					<option value="{{ $row->id }}" >{{ $row->name }}</option>
				@endif
			@endforeach
			
			
		</select>
	</div>
	

	

	
	<div class="col-md-3">
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
				<th>ផលិតផល</th>
				<th>តម្លៃ</th>
				<th>ប្រភេទ</th>
				<th>រូពភាព</th>
				<th>ចំណាំ</th>
				<th>ថ្ងៃកែតម្រូវ ចុងក្រោយ</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@php ($i = 1)
			@foreach ($data as $row)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $row->title }}</td>
					<td>{{ $row->price }} ដុល្លា</td>							
					<td>@if(isset($row->cate_id)) {{ $row->name }} @endif  sss
					
					</td>
					<td><img src="{{ asset($row->feature_img) }}" alt="Missing Image" class="img img-responsive" style="width:40px;"></td>
					<td>{{ $row->pro_not }}</td>
					<td>{{ date ("j M, Y g:i A", strtotime($row->updated_at)) }}</td>
					<td style="white-space: nowrap; width: 1%;">
						<div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                           	<div class="btn-group btn-group-sm" style="float: none;">
                           		<a href="{{ route($route.'.edit', $row->id) }}" class="tabledit-edit-button btn btn-sm btn-success" style="float: none;"><span class="fa fa-eye"></span></a>
                           		<a href="#" onclick="deleteConfirm('{{ route($route.'.trash', $row->id) }}', '{{ route($route.'.index') }}')" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none;"><span class="glyphicon glyphicon-trash"></span></a>
                           	</div>
                       </div>
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div >
@else
	<span>No Data</span>
@endif


@endsection