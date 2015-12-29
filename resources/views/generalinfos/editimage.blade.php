 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>  





@extends ('layouts.dashboard')
@section('page_heading','Update Interest')

@section('section')
    {{ Form::open(array('class' => 'form-inline', 'method' => 'PATCH', 'route' => array('generalinfos.update'), 'files' => true)) }}         
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
       


<div class ="form-group has-success">
              <label>Upload Image</label>
              <input type="file" name="image">
            </div>
            </br>
            </br>

            <input type="hidden" name="id" value="{{ $user[0]->user->id }}">
            <div class ="form-group has-success">
            <button class=" btn btn-primary"> Edit </button>
            </div>

@stop
