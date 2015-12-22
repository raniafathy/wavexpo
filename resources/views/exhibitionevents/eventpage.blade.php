

@extends('layouts.dashboard')
@section('page_heading','Exhibition Event Page')
@section('section')

            <!-- /.row -->

            <div class="col-sm-12">
            <div class="row"> <h1> Virtual Tour </h1>
                <div class="col-lg-7 col-md-6">
               
                    Play Virtual Tour
                </div>
               
                <div class="col-lg-5 col-md-9">
               <h1> Lists Of Boothes </h1>

	                    @foreach ($booths as $booth)

						<p><a class="btn btn-success" href="/booths/{{$booth->id}}"> {{$booth->name}}</a></p>
			     		
			     		@endforeach

                   <a class="btn btn-info" href="/booths">See All Boothes </a>


                </div>
                </div>
                           <div class="col-sm-12">
 
            <div class="row"> <h1> Exhibition Event Details </h1>
                <div class="col-lg-7 col-md-6">
               
                    @section ('alert1_panel_title','Exhibition Event Info ')
	@section ('alert1_panel_body')
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->name, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->desc, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->start_time, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->end_time, 'icon'=> 'user'))
    @include('widgets.alert', array('class'=>'success', 'message'=> $exhibitionevent->exhibition->name, 'icon'=> 'user'))


	@endsection

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))
                </div>
               
                
                
            </div>
		</div>


                

<script type="text/javascript">

$('#Uevent').hide();

$('#Fevent').hide();
    
$( document ).ready(function() {
    $('#finished').click(function(){

           $('#Fevent').show();
           $('#Uevent').hide();
           $('#Cevent').hide();
    });
    $('#currently').click(function(){

           $('#Fevent').hide();
           $('#Uevent').hide();
           $('#Cevent').show();
    });
    $('#upcoming').click(function(){

           $('#Fevent').hide();
           $('#Uevent').show();
           $('#Cevent').hide();
    });
});
</script>
            
@stop

