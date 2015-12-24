

@extends('layouts.dashboard')


@section('section')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  


<div class="col-sm-12">
<div class="row">
	
</div>
<div class="row">

</div>
	
<div class="row">
	
</div>
<div class="row">
	<div class="col-sm-12">




<!-- select exhibition event -->	
<div class="form-group has-success">
              <label> Exhibition Event </label>
              <select id="event" class="form-control col-md-6" name="event">
              		<option value="0" >Please Select Exhibition Event</option>                  
              	@foreach($exhibitionevents as $exhibitionevent)
                    <option value="{{ $exhibitionevent->id }}" > {{$exhibitionevent->name}}</option>                  
                @endforeach
            
              </select>
</div>	

<br/>
<div id="booth" class="form-group has-success">
	

</div id="container">




	</div>
</div>
</div>

<?php $booths; ?>
<?php $systemtrack_users ;?>


<script type="text/javascript">

var booths= <?php echo json_encode($booths ); ?>;
var systemtrack_users= <?php echo json_encode($systemtrack_users); ?>;

	
$(document).ready(function(){
	window.onload = function() {
	    
	            $.ajaxSetup({
	                headers: {
	                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
	                }
	            });


	       
	 };

		 $("#event").change(function () {

		 	//alert(this.value);
		 	$("#booth").empty();
		 	var div = document.getElementById('booth');
		 	var sel = document.createElement('select');
			var newlabel = document.createElement("Label");
			newlabel.innerHTML = "Booth";
			div.appendChild(newlabel);

		 	sel.className='form-control col-md-6';
		 	sel.name='selectbooth';
		 	sel.id='selectbooth';
			var opt = null;
			opt = document.createElement('option');
			opt.value = 0;
		    opt.innerHTML = 'Select Booth';
		    sel.appendChild(opt);
			for(i = 0; i<booths.length; i++) { 

			    opt = document.createElement('option');

			    if(booths[i].exhibition_event_id == this.value){
				    opt.value = booths[i].id;
				    opt.innerHTML = booths[i].name;
				    opt.onclick="search()";
				    sel.appendChild(opt);
			    }
			}

		

			sel.onchange=function(){

				var select = document.getElementById("selectbooth");
				var optValue = select.options[select.selectedIndex].value;
			    //var optValue=$('opt').val();
			    
				alert(optValue);
				$.ajax({
			    url: '/systemtracks/ajaxSearchForBoothTrack',
			    type: 'POST',
			    data: {  	   		 
			            optValue: optValue

				   	    },
			    success: function(result) {

			    $("#container").append(result);

			    			 alert(result);
			                //convert refreshing pagination to ajax
			               // paginateWithAjax();


						  },
				error: function(jqXHR, textStatus, errorThrown) {
			                console.log(errorThrown);
			                alert(errorThrown);
			           }

				});
		
					

			};

			div.appendChild(sel);

		 });

		
});		 	

</script>
@stop