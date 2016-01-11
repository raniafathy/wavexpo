@extends('layouts.exhibitor')
@section('page_heading','Tables')

@section('section')
<div class="col-sm-12">
<div class="row">
	
</div>
<div class="row">

</div>
	
<div class="row">
	
</div>
<div class="row">
	<div class="col-sm-12">
		@section ('cotable_panel_title','Coloured Table')
		@section ('cotable_panel_body')
		<table class="table table-bordered">
			<thead>
				<tr>
					
					<th>Exhibitor Name</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				

					@foreach ($exhibitors as $exhibitor)
				        <tr  class="success" id="{{ $exhibitor->id }}">
				            <td class="text-center"><a title="Show exhibitor Info" href="/companies/showprofile/{{ Auth::User()->id }}" class="do">{{ $exhibitor->name}}</a></td>
				            <td class="text-center">{{ $exhibitor->desc }}</td>
				            <td class="text-center">
				            	<a title="Edit exhibitor Info" href="/exhibitors/editcompanyexhibitor/{{$exhibitor->id}}" class="do"><img src="/images/edit.png" width="30px" height="30px">	</a>
	{{ Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'url' => "/exhibitors/deletecompanyexhibitor/$exhibitor->id")) }}
						            <input type="hidden" name="_token" value="{{ csrf_token() }}">
	         						<input type="hidden" name="id" value="{{ $exhibitor->id }}">
						          	<button type="submit" title="Delete exhibitor"  ><img src="/images/delete.png" width="30px" height="30px"></button>
        {{ Form::close() }}
				            </td>
				        </tr>
		     		@endforeach
	
			</tbody>
		</table>	
		@endsection
		@include('widgets.panel', array('header'=>true, 'as'=>'cotable'))
	</div>
</div>
</div>
@stop