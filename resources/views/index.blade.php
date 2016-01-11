<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Multi Step Registration Form Template</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/stylesheets/font-awesome.min.css">
		<link rel="stylesheet" href="assets/stylesheets/form-elements.css">
        <link rel="stylesheet" href="assets/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        

    </head>

    <body>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Bootstrap Multi Step Registration Form Template</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<span class="li-text">
								Put some text or
							</span> 
							<a href="#"><strong>links</strong></a> 
							<span class="li-text">
								here, or some icons: 
							</span> 
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>
							</span>
						</li>
					</ul>
				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Bootstrap</strong> Multi Step Registration Form</h1>
                            <div class="description">
                            	<p>
	                            	This is a free responsive multi-step registration form made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">

                        	
               {{ Form::open(array('url'=>'/signin','class'=>'registration-form','role'=>'form','method'=>'post','files' => true)) }}

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
                        		
                        		<fieldset style="display: block;">
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 1 / 3</h3>
		                            		<p>Enter Your Basic Info:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-user"></i>
		                        		</div>
		                            </div>

         		                        <div class="form-bottom">

								            <div class="form-group has-success">
								              <label>Name</label>
								                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
								            </div>

								            <div class="form-group has-success">
								              <label>E-Mail Address</label>
								                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
								            </div>

								            <div class="form-group has-success">
								              <label>Password</label>
								                 <input type="password" class="form-control" name="password">
								             </div>

								            <div class="form-group has-success">
								              <label>Confirm Password</label>
								                 <input type="password" class="form-control" name="password_confirmation">
								             </div>


								             <div class="form-group has-success">
								                    <label class="col-md-4">Register as </label>
								                    @if(old('type')!='admin')
								                    <label class="radio-inline">
								                        <input type="radio" name="type" id="optionsRadiosInline1" value="regular" checked> Visitor
								                    </label>
								                    <label class="radio-inline">
								                        <input type="radio" name="type" id="optionsRadiosInline2" value="company" >Exhibitor
								                    </label>
								                    @else
								                     <label class="radio-inline">
								                        <input type="radio" name="type" id="optionsRadiosInline1" value="regular" > Visitor
								                    </label>
								                    <label class="radio-inline">
								                        <input type="radio" name="type" id="optionsRadiosInline2" value="company" checked>Exhibitor
								                    </label>
								                    @endif
								                   
								               
								        </div>  

         <input type="hidden" name="_method" value="post">

				                    	
				                        <button type="button" class="btn btn-next">Next</button>
				                    </div>
			                    </fieldset>


							

			                    
			                    <fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 2 / 3</h3>
		                            		<p>Enter Your General Data:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-key"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
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

							             <div class="form-group has-success">
							                <!-- <label class="control-label" for="inputError">Input with error</label> -->
							                <label> address </label>
							                <input name="address" class="form-control" value="{{old('address')}}">
							            </div>

							            <!-- <div class ="form-group has-success">
							              <label>Upload Image</label>
							              <input type="file" name="image">
							            </div> -->

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> phone</label>
							                <input type="number" name="phone" class="form-control" id="inputSuccess" value="{{old('phone')}}">
							             </div>

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Another Phone</label>
							                <input type="number" name="anotherphone" class="form-control" id="inputSuccess" value="{{old('phone')}}">
							             </div>

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> skypename</label>
							                <input type="text" name="skypename" class="form-control" id="inputSuccess" value="{{old('skypename')}}">
							             </div>

							              <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> DOB</label>
							                <input type="date" name="dob" class="form-control" id="inputSuccess" value="{{old('dob')}}">
							             </div>
				                    	<div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Current Company</label>
							                <input type="text" name="currentjob" class="form-control" id="inputSuccess" value="{{old('currentlyjob')}}">
							            </div>

							             <div class="form-group has-error">
							                <!-- <label class="control-label" for="inputError">Input with error</label> -->
							                <label> Current Position </label>
							                <input name="title" class="form-control" value="{{old('dob')}}" >
							            </div>
										<div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Facebook Account </label>
							                <input type="text" name="facebook" class="form-control" id="inputSuccess" value="{{old('facebook')}}">
							             </div>
							                <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> How Hear about us !?</label>
							                <input type="text" name="howhearaboutus" class="form-control" id="inputSuccess" value="{{old('howhearaboutus')}}">
							             </div>
							             <div class="form-group has-success">
							               <label> Interests</label>
							           		   @foreach ($interests as $interest)
							                          @if(old('interest') === $interest->id)

													 &nbsp;  
												{{ Form::checkbox( 'interest[]' , $interest->id) }}

							     			    {{ Form::label('interest'.$interest->interest_in, $interest->interest_in) }} &nbsp;  
							                           @else

							 						&nbsp;  
												{{ Form::checkbox( 'interest[]' , $interest->id ) }}

							     			   {{ Form::label('interest'.$interest->interest_in, $interest->interest_in) }} &nbsp;  
							                           @endif 
							             	     
							             		 @endforeach
							          		 </div>


				                        <button type="button" class="btn btn-previous">Previous</button>
				                        <button type="button" class="btn btn-next">Next</button>
				                    </div>
			                    </fieldset>
			                    
			                    <fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 3 / 3</h3>
		                            		<p>Enter Proficinal data:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-twitter"></i>
		                        		</div>
		                            </div>
		                            	 <div class="form-bottom">


							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> StartWork_At </label>
							                <input type="date" name="startwork_at" class="form-control" id="inputSuccess" value="{{old('startwork_at')}}">
							             </div>

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Company Website</label>
							                <input type="text" name="companywebsite" class="form-control" id="inputSuccess" value="{{old('companywebsite')}}">
							             </div>

							              <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> D_maker </label>
							               <select class="form-control col-md-6" name="d_maker" id="inputSuccess">
							                            <option value="yes">Yes</option>
							                            <option value="no">No</option>   
							                  							            
							            </select>
							             </div>

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Colleage </label>
							                <input type="text" name="colleage" class="form-control" id="inputSuccess" value="{{old('colleage')}}">
							             </div>

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Degree </label>
							                <input type="text" name="degree" class="form-control" id="inputSuccess" value="{{old('degree')}}">
							             </div>


							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Graduated At </label>
							                <input type="date" name="graduated_at" class="form-control" id="inputSuccess" value="{{old('graduated_at')}}">
							             </div>

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Fax Account </label>
							                <input type="text" name="fax" class="form-control" id="inputSuccess" value="{{old('d_maker')}}">
							             </div>
							             

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Twitter Account </label>
							                <input type="text" name="twitter" class="form-control" id="inputSuccess" value="{{old('twitter')}}">
							             </div>

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> LinkedIn Account  </label>
							                <input type="text" name="linkedIn " class="form-control" id="inputSuccess" value="{{old('linkedIn')}}">
							             </div>

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> OwnWebsite </label>
							                <input type="text" name="ownwebsite" class="form-control" id="inputSuccess" value="{{old('ownwebsite')}}">
							             </div>

							             <div class="form-group has-success">
							               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
							               <label> Language </label>
							                <input type="text" name="language" class="form-control" id="inputSuccess" value="{{old('language')}}">
							             </div>
							 
							           
				                        <button type="button" class="btn btn-previous">Previous</button>
				                       
				                       <button type="submit" class="btn">Sign me up!</button>
				                  

				                    </div>
			                    </fieldset>

         {{ Form::close() }}
		                    
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/scripts/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts/jquery.backstretch.min.js"></script>
        <script src="assets/scripts/retina-1.1.0.min.js"></script>
        <script src="assets/scripts/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
