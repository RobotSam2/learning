@extends ($route.'.main')
@section ('section-title', $data->title)
@section ('section-css')
	<link href="{{ asset ('public/cp/css/plugin/fileinput/fileinput.min.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset ('public/cp/css/plugin/fileinput/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
	<!-- some CSS styling changes and overrides -->
	<!-- style upload images -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- emd style upload images -->
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
	.preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 180px;
    /* display: flex; */
    padding: 5px 5px 0px 5px;
    position: relative;
    overflow:auto;
}
.preview-images-zone > .preview-image:first-child {
    height: 185px;
    width: 185px;
    position: relative;
    margin-right: 5px;
}
.preview-images-zone > .preview-image {
    height: 90px;
    width: 90px;
    position: relative;
    margin-right: 5px;
    float: left;
    margin-bottom: 5px;
}
.preview-images-zone > .preview-image > .image-zone {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .image-zone > img {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .tools-edit-image {
    position: absolute;
    z-index: 100;
    color: #fff;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    display: none;
}
.preview-images-zone > .preview-image > .image-cancel {
    font-size: 18px;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
    margin-right: 10px;
    cursor: pointer;
    display: none;
    z-index: 100;
}
.preview-image:hover > .image-zone {
    cursor: move;
    opacity: .5;
}
.preview-image:hover > .tools-edit-image,
.preview-image:hover > .image-cancel {
    display: block;
}
.ui-sortable-helper {
    width: 90px !important;
    height: 90px !important;
}

.container {
    padding-top: 50px;
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

			$('.summernote').summernote({
			airMode: true
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
		    defaultPreviewContent: '<img src="{{ asset($data->feature_img) }}" alt="Missing Image" class="img img-responsive"><span class="text-muted">Click to select <br /><i style="font-size:12px">Image dimesion must be 200x165 with .jpg or .png type</i></span>',
		    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
		    allowedFileExtensions: ["jpg", "png", "gif"]
		});

			$(document).ready(function() {
    document.getElementById('pro-image').addEventListener('change', readImage, false);
    
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
});



var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
            
            var picReader = new FileReader();
            
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '<div class="tools-edit-image"><a href="javascript:void(0)" data-no="' + num + '" class="btn btn-light btn-edit-image">edit</a></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
        $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}
	</script>
@endsection

@section ('section-content')
	@include('cp.layouts.error')
	<form id="form" action="{{ route($route.'.update', $data->id) }}" name="form" method="POST"  enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		@php ($cate_id = $data->cate_id)
		
		<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="title">Product Name</label>
				<div class="col-sm-10">
					<input 	id="title"
							name="title"
						   	value = "{{$data->title}}"
						   	type="text"
						   	placeholder = "សូមបញ្ជូល ប្រភេទ ផលិតផល"
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
					@foreach( $categotry as $row)
						@if($row->id != $cate_id)
							<option value="{{ $row->id }}" >{{ $row->name }}</option>
						@endif
					@endforeach
				</select>

			</div>
		</div>

		<div class="form-group row">
				<label class="col-sm-2 form-control-label" for="title">Price</label>
				<div class="col-sm-10">
					<input 	id="pice"
							name="price"
						   	value = "{{$data->price}}"
						   	type="text"
						   	placeholder = "សូមបញ្ជូល ប្រភេទ ផលិតផល"
						   	class="form-control"
						   	data-validation="[L>=1, L<=200]"
							data-validation-message="$ must be between 6 and 18 characters. No special characters allowed." />
							
				</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 form-control-label" for="desc">Description</label>
			<div class="col-sm-10">
				<textarea 
						name="desc" 
						id="desc" 
						cols="10" 
						rows="5" 
						class="form-control summernote" 
						data-validation="[L>=1, L<=200]">
							{{$data->description }}
				</textarea>												
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 form-control-label" for="not">Product Note</label>
			<div class="col-sm-10">
				<textarea 
						name="not" 
						id="not" 
						cols="10" 
						rows="2" 
						class="form-control summernote" 
						data-validation="[L>=1, L<=200]">
							{{$data->pro_not }}
				</textarea>												
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 form-control-label" for="email">Images</label>
			<div class="col-sm-10">
				<div class="kv-avatar center-block">
					<input id="feature" name="feature" type="file" class="file-loading">
				</div>
			</div>
		</div>

		<!-- Multi file -->
			<fieldset class="form-group">
				<a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
				<input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" multiple>
			</fieldset>
			<div class="preview-images-zone">
				<!-- <div class="preview-image preview-show-1">
					<div class="image-cancel" data-no="1">x</div>
					<div class="image-zone"><img id="pro-img-1" src="https://scontent.fbkk1-5.fna.fbcdn.net/v/t1.0-1/p240x240/19959271_1422340951164915_5064915005517635211_n.jpg?oh=d00714227f317f04f4733895087fca15&oe=5ACE9FFD"></div>
					<div class="tools-edit-image"><a href="javascript:void(0)" data-no="1" class="btn btn-light btn-edit-image">edit</a></div>
				</div>					 -->
			</div>

		<!-- End Multi File -->
		
		<div class="form-group row">
			<label class="col-sm-2 form-control-label"></label>
			<div class="col-sm-10">
				<button type="submit" class="btn btn-success"> <i class="fa fa-cog"></i> កែតម្រូវ</button>
				<button type="button" onclick="deleteConfirm('{{ route($route.'.trash', $data->id) }}', '{{ route($route.'.index') }}')" class="btn btn-danger"> <i class="fa fa-trash"></i> លុបចោល</button>
			</div>
		</div>
	</form>
@endsection