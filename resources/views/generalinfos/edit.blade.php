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
       

              <div class="form-group has-success">
              <label> Country </label>
              <select class="form-control" name="country">
                  @foreach ($countries as $country)
                    @if(!empty($user[0]->country->name))
                      @if($user[0]->country->id === $country->id)
                        <option value="{{ $country->id }}" selected="true"> {{ $country->name }}</option>
                      @else
                        <option value="{{ $country->id }}"> {{ $country->name }}</option>
                      @endif 
                    @else
                       <option value="{{ $country->id }}"> {{ $country->name }}</option>  
                    @endif  
                  @endforeach
              </select>
              </div>
              <br/>
             <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> City </label>
              <input type="text" name="city" value="<?php if (!empty($user[0]->city)) {
              echo $user[0]->city;
              } ?> " class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Date of Birth </label>
              <input type="text" name="dob" value="<?php if (!empty($user[0]->dob)) {
              echo $user[0]->dob;
              } ?> "  class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>
              
           

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> address </label>
              <input type="text" name="address" value="<?php if (!empty($user[0]->address)) {
              echo $user[0]->address;
              } ?> " class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Phone </label>
              <input type="text" name="phone" value="<?php if (!empty($user[0]->phone)) {
              echo $user[0]->phone;
              } ?> "  class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Another phone </label>
              <input type="text" name="anotherphone" value="<?php if (!empty($user[0]->anotherphone)) {
              echo $user[0]->anotherphone;
              } ?> "  class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>

            <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> Email </label>
              <input type="text" name="skypename" value="<?php if (!empty($user[0]->skypename)) {
              echo $user[0]->skypename;
              } ?> "  class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>
              
             <div class="form-group has-success">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
              <label> How Hear about us !?</label>
              <input type="text" name="howhearaboutus" value="<?php if (!empty($user[0]->howhearaboutus)) {
              echo $user[0]->howhearaboutus;
              } ?> "  class="form-control" id="inputSuccess">
            </div>
            <br/>
            <br/>


              <div class="form-group has-success">
              <label> Interest </label>
              @foreach ($interests as $interest)
              @if(!empty($user[0]->country->name))


                          @if(in_array($interest->id, $userinterest))
                                    {{ $interest->id }}
                           &nbsp;   {{ Form::checkbox( 'interest[]' , $interest->id , true ) }}

                              {{ Form::label('interest'.$interest->interest_in, $interest->interest_in) }} &nbsp;                     
                          @else

                               {{ Form::checkbox( 'interest[]' , $interest->id , false ) }}

                               {{ Form::label('interest'.$interest->interest_in, $interest->interest_in) }} &nbsp;
                          @endif   
                             
              @else
                          @if(in_array($interest->id, $userinterest))
                                    {{ $interest->id }}
                           &nbsp;   {{ Form::checkbox( 'interest[]' , $interest->id , true ) }}

                              {{ Form::label('interest'.$interest->interest_in, $interest->interest_in) }} &nbsp;                     
                          @else

                               {{ Form::checkbox( 'interest[]' , $interest->id , false ) }}

                               {{ Form::label('interest'.$interest->interest_in, $interest->interest_in) }} &nbsp;
                          @endif   


 
              @endif
          @endforeach
              </div>
            
         
           
            <input type="hidden" name="id" value="{{ $user[0]->user->id }}">
            <button> Edit </button>

            <a title="Edit Basic Info" href="/users/{{$user[0]->user->id}}/edit" class="do">Edit Basic Info</a>
            <a title="Edit Professional Info" href="/professionalinfos/{{$user[0]->user->id}}/edit" class="do">Edit Professional Info</a>
        {{ Form::close() }}
        <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>
   

@stop