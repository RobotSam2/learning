@extends($route.'.main')
@section('title')
	Sending Email @yield('section-title')
@endsection

@section ('section-js')
	<script type="text/javascript">
		$(document).ready(function(){
			getStat();
			$("#btn").click(function(){
				start();
			})
		})

		@if(count($next) ==1 )
			var next = {'id':{{$next->id}}, 'name':'{{$next->name}}', 'email':'{{$next->email}}'};
		@else 
			var next = {};
		@endif

		
		var is_started = 0;

		function send(next){
			
			$.ajax({
		        url: "{{ route($route.'.send') }}",
		        type: 'GET',
		        data: {id:next.id, email:next.email},
		        success: function( response ) {
		            if ( response.status === 'success' ) {
		            	$("#caption").html('');
		            	
		            	stat = response.stat;
		            	$("#registered").html(stat.registered);
		            	$("#sent").html(stat.sent);
		            	$("#percent").val((stat.sent/stat.registered)*100);

		            	next = response.next;

		            	if(!isEmpty(next)){
			            	$("#caption").html('<b><i class="fa fa-circle-o-notch fa-spin  fa-fw"></i> Sending to '+next.name+' < '+next.email+' > </b>');
			            	
		            		if(is_started == 1 ){
		            			setTimeout(function() {
		            				send(next);
		            			}, 60000);

		            		}else{
		            			$("#caption").html('');
		            		}
						}else{
							swal("Error!", "All applicants received email.. " ,"success");
							stop();
						}
		            }
		        },
		        error: function( response ) {
		           swal("Error!", "Sorry there is an error happens. " ,"error");
		        }
		    });
						
		}

		function start(){
			$("#btn").html("Stop!");
			$("#btn").click(function(){
				stop();
			})

			is_started = 1;
			
			//console.log(count(next));
			if(!isEmpty(next)){
				$("#caption").html('<b><i class="fa fa-circle-o-notch fa-spin  fa-fw"></i> Sending to '+next.name+' < '+next.email+' > </b>');
				send(next)
			}else{
				swal("Error!", "All applicants received email.. " ,"success");
				stop();
			}
			
		}
		function stop(){
			$("#btn").html("Start");
			$("#btn").click(function(){
				start();
			})

			is_started = 0;
		}

		function getStat(){
			$.ajax({
		        url: "{{ route($route.'.stat') }}",
		        type: 'GET',
		        data: {},
		        success: function( response ) {
		           
	            	$("#registered").html(response.registered);
	            	$("#sent").html(response.sent);
	            	$("#percent").val((response.sent/response.registered)*100);
		            
		        },
		        error: function( response ) {
		           swal("Error!", "Sorry there is an error happens. " ,"error");
		        }
		    });
		}
		function isEmpty(obj) {
		    for(var key in obj) {
		        if(obj.hasOwnProperty(key))
		            return false;
		    }
		    return true;
		}


	</script>
@endsection

@section ('section-content')
	<div class="row">
		<div class="col-md-12">
				
				<div class="card-block">
					<h5 class=" m-t-0">Statistic</h5>
					<section class="proj-page-section proj-page-time-info">
						<div class="tbl">
							<div class="tbl-row">
								<div class="tbl-cell">Total Registered</div>
								<div id="registered" class="tbl-cell tbl-cell-time">...</div>
							</div>
							<div class="tbl-row">
								<div class="tbl-cell">Total Sent</div>
								<div id="sent" class="tbl-cell tbl-cell-time">...</div>
							</div>
						</div>
						<div class="progress-compact-style">
							<progress id="percent" class="progress progress-success" value="0" max="100"></progress>
						</div>
					</section><!--.proj-page-section-->
					<button id="btn" type="button" class="btn btn-rounded ">Start</button> <span id="caption"></span>
				</div>
		</div>
		<div class="col-md-4">
			
		</div>
		
@endsection