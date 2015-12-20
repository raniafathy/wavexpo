@extends ('layouts.dashboard')

@section ('page_heading',$user[0]->user->name.' '.'Profile' )

@section('section')
</div>
<a title="Edit General Info " href="/generalinfos/{{$user[0]->user->id}}/edit" class="do"> Edit General Info </a>

	@section ('alert1_panel_title','General Info ')
	@section ('alert1_panel_body')
  
<img src="{{url()}}/uploads/{{ $user[0]->image}}" alt="" width="200" height="200" />
</br>
<a href="/generalinfos/editimage">Update Profile Picture</a>
	</br>
		</br>

	

	@if(!empty($user[0]->country->name))
	@include('widgets.alert', array('class'=>'success', 'message'=> $user[0]->country->name, 'icon'=> 'user'))
	@endif
	@include('widgets.alert', array('class'=>'info', 'message'=> $user[0]->city ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $user[0]->dob,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $user[0]->address ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $user[0]->phone,'icon'=> 'glyphicon glyphicon-cog'))
	@include('widgets.alert', array('class'=>'success', 'message'=> $user[0]->anotherphone, 'icon'=> 'user'))
	@include('widgets.alert', array('class'=>'info', 'message'=> $user[0]->skypename ,'icon'=> 'glyphicon glyphicon-search'))
	@include('widgets.alert', array('class'=>'warning', 'message'=> $user[0]->howhearaboutus,'icon'=> 'glyphicon glyphicon-cog'))
	              
	   @foreach ($interests as $interest)


 				              @if(in_array($interest->id, $userinterest))

			@include('widgets.alert', array('class'=>'info', 'message'=> 'interested in "'.$interest->interest_in . '"' ,'icon'=> 'glyphicon glyphicon-search'))
	

 					@endif
 			@endforeach
	@endsection

<a title="Basic Info " href="/users/{{$user[0]->user->id}}" class="do"> Basic Info </a>
<a title="Professional Info " href="/professionalinfos/{{$user[0]->user->id}}" class="do"> Professional Info </a>

@include('widgets.panel', array('header'=>true, 'as'=>'alert1'))

@stop
