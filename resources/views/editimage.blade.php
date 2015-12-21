@extends ('layouts.test')
@section('page_heading','Update Profile Picture')
@section('section')

        {{ Form::open(array('url' =>"/generalinfos/".Auth::User()->id."/image",'method'=>'post','files' => true))}}
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

            <div class ="form-group">
              <label class="navtxt col-md-4 control-label">Upload Photo</label>
              <div class="col-md-6">
              <input type="file" name="image">
              </div>
            </div>
            <br/>
            <br/>
      
            
            
<button type="submit" class="btn btn-primary btn-block">Add</button>
         {{ Form::close() }}
        
       
@stop