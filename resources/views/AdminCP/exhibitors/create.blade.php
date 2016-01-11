@extends ('layouts.exhibitor')
@section('page_heading','Add New Exhibitor')

@section('section')
         {{ Form::open(['action' => 'ExhibitorsController@storeexhibitorbyadmin','method'=>'post','files' => true]) }}

<!--         <form class="form-horizontal" role="form" method="POST" action="{{ url('/exhibitors/storeexhibitorbyadmin') }}">
 -->         @if (count($errors) > 0)
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

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Exhibitor Name</label>
                <input type="text" name="name" class="form-control" id="inputSuccess" value="{{old('name')}}">
            </div>

              <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Description</label>
                <input type="text" name="desc" class="form-control" id="inputSuccess" value="{{old('desc')}}">
            </div>

             <div class="form-group has-success">
               <label> Company </label>
              <select class="form-control col-md-6" name="company">
              @foreach ($companies as $company)
                          @if(old('company') === $company->id)
                            <option value="{{ $company->id }}" selected="true"> {{ $company->user->name }}</option>
                          @else
                            <option value="{{ $company->id }}"> {{ $company->user->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>



            <div class="form-group has-success">
               <label> Country </label>
              <select class="form-control col-md-6" name="country">
              @foreach ($countries as $country)
                          @if(old('country') === $country->id)
                            <option value="{{ $country->id }}" selected="true"> {{ $country->name }}</option>
                          @else
                            <option value="{{ $country->id }}"> {{ $country->name }}</option>   
                          @endif 
                  
              @endforeach
            
            </select>
           </div>

         
            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> city</label>
                <input type="text" name="city" class="form-control" id="inputSuccess" value="{{old('city')}}">
            </div>

             <div class="form-group has-error">
                <!-- <label class="control-label" for="inputError">Input with error</label> -->
                <label> address </label>
                <textarea name="address" class="form-control" rows="3">{{old('address')}}</textarea>
            </div>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> phone</label>
                <input type="number" name="phone" class="form-control" id="inputSuccess" value="{{old('phone')}}">
             </div>

             
             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> Another phone</label>
                <input type="number" name="anotherphone" class="form-control" id="inputSuccess" value="{{old('anotherphone')}}">
             </div>



             

           <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label> fax </label>
                <input type="text" name="fax" class="form-control" id="inputSuccess" value="{{old('fax')}}">
             </div>


           
<!-- File Upload -->

            <!-- <h1>File Upload</h1>

            <div class="form-group has-success"> -->
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <!-- <label> File Name</label>
                <input type="text" name="filename" class="form-control" id="inputSuccess">
            </div>

            <div class="form-group has-success"> -->
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <!-- <label> Description</label>
                <textarea name="filedesc" class="form-control" id="inputSuccess"></textarea>
            </div>

            <div class="form-group has-success"> -->
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <!-- <label> Type </label>
                <input type="text" name="filetype" class="form-control" id="inputSuccess">
            </div>


            <div class="row col-md-offset-1">
            <div class ="form-group">
              <label class="navtxt">Attach File</label>
              <input type="file" name="file">
            </div>
          </div>
            -->
      
            
            
         <button> Add </button>
         {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
    

@stop