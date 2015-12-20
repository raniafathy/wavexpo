<div class="container">
	<div class="row">
		<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <h3>Step 1</h3>
                        <p>This is step 1</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Step 2</h3>
                        <p>This is step 2</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Step 3</h3>
                        <p>This is step 3</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </section>
   </div>
</div>
///////////////////////////////////////////////////////////////////////////////////////////////
.wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

up vote
7
down vote
favorite
2
I'm noob in Laravel and working with Laravel 5. For user registration and and login, I want to use default system of laravel. But, need to extend it with two following features:

User will get an email just after registration.
Upon saving of user registration, I need to make an entry in another role table (I've used Entrust package for role management)
How to do these things?

php laravel sendmail laravel-5
shareimprove this question
asked Mar 20 at 18:03

Sovon
6026
  	 	
Look at services/registrar.php – Digitlimit Mar 20 at 19:10
add a comment
2 Answers
activeoldestvotes
up vote
14
down vote
accepted
You can modify Laravel 5 default registrar located in app/services

<?php namespace App\Services;

    use App\User;
    use Validator;
    use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
    use Mail;

    class Registrar implements RegistrarContract {

        /**
         * Get a validator for an incoming registration request.
         *
         * @param  array  $data
         * @return \Illuminate\Contracts\Validation\Validator
         */
        public function validator(array $data)
        {
            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
            ]);
        }

        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return User
         */
        public function create(array $data)
        {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);

//do your role stuffs here

            //send verification mail to user
            //--------------------------------------------------------------------------------------------------------------
            $data['verification_code']  = $user->verification_code;

            Mail::send('emails.welcome', $data, function($message) use ($data)
            {
                $message->from('no-reply@site.com', "Site name");
                $message->subject("Welcome to site name");
                $message->to($data['email']);
            });


            return $user;
        }

    }
Inside resources/emails/welcome.blade.php

Hey {{$name}}, Welcome to our website. <br>
Please click <a href="{!! url('/verify', ['code'=>$verification_code]) !!}"> Here</a> to confirm email
NB: You need to create route/controller for verify

shareimprove this answer
edited Nov 25 at 7:06
answered Mar 20 at 19:46

Digitlimit
3,168829
  	 	
Is modifying this file a bad idea? If composer updates Laravel would this file be overwritten? – Josh Mountain May 8 at 22:55
2	 	
@Josh Mountain Not at all. Composer only updates Laravel Framework located in vendor directory – Digitlimit May 10 at 8:54 
  	 	
Your 'verification_code' generated randomly from your model? Or just filled the default method on migration file? – Cengkaruk Jul 16 at 7:40
  	 	
@Cengkaruk my verification_code is generated when user signs up for an account. Its a unique random string. Doing it at model like so: public function setVerificationCodeAttribute($value) { $this->attributes['verification_code'] = md5(str_random(64) . time()*64); } – Digitlimit Jul 29 at 7:24 
add a comment

up vote
1
down vote
Do you know how to custom registrar to allow user confirm email before log in.

I think about add confirmed & confirmed_code in users table and send them after the registration.

But is there any other solution that build-in laravel 5 authentication???

shareimprove this answer
answered Apr 4 at 5:25

Tinh Dang
212
  	 	
As far as I know, there is no built-in option. So, you have to add two columns like you did and update that confirmed column when user confirm their email. You should also tweak the authentication process to check if the user is confirmed. If you have a new question, create a new question. Don't put it as answer in another post. – Sovon Apr 4 at 6:09 
1	 	
@user4599310 Since you are asking a question create a new question. stackoverflow.com/questions/ask . Its against the rules to ask question when answer is expected. – Digitlimit Apr 5 at 11:47 
  	 	
Okay, thanks I'll keep in mind about that – Tinh Dang Jun 7 at 10:27
add a comment
Your Answer






///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

<!-- @extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="/auth/register">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
				        
				        <div class="form-group">
              <label class="col-md-4 control-label">Name</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" placeholder="Enter Your Name Here" value="{{ old('name') }}">
              </div>
            </div>
            

            <div class="form-group">
              <label class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email Here" value="{{ old('email') }}">
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-4 control-label">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control"  placeholder="Enter Your Password Here" name="password">
              </div>
            </div>
           
            <div class="form-group">
              <label class="col-md-4 control-label">Confirm Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control"  placeholder="ReEnter Your Password Here" name="password_confirmation">
              </div>
            </div>
             <div class="form-group">
                    <label class="col-md-4 control-label">Register as </label>
                    @if(old('type')!='admin')
                                   <div class="col-md-2">

                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline1" value="regular" checked> Visitor
                    </label>
                    </div>

                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline2" value="admin" >Exipitor
                    </label>
                    @else
                                   <div class="col-md-2">

                     <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline1" value="regular" > Visitor
                    </label>
                    </div>

                    <label class="radio-inline">
                        <input type="radio" name="type" id="optionsRadiosInline2" value="admin" checked>Exipitor
                    </label>
                    @endif
                   
               
            </div>  

         <div class="form-group">
               <label class="col-md-4 control-label"> Country </label>
                              <div class="col-md-6">

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
           </div>
            <div class="form-group ">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> city</label>
               <div class="col-md-6">
                <input type="text" name="city" class="form-control" id="inputSuccess" value="{{old('city')}}">
            </div>
</div>
             <div class="form-group">
                <!-- <label class="control-label" for="inputError">Input with error</label> -->
                <label class="col-md-4 control-label"> address </label>
                <div class="col-md-6">
                <textarea name="address" class="form-control" rows="3">{{old('address')}}</textarea>
            </div>
            </div>
            <div class ="form-group">
              <label class="col-md-4 control-label">Upload Image</label>
              <div class="col-md-6">
              <input type="file" name="image">
            </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> phone</label>
               <div class="col-md-6">
                <input type="number" name="phone" class="form-control" id="inputSuccess" value="{{old('phone')}}">
             </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> skypename</label>
               <div class="col-md-6">
                <input type="text" name="skypename" class="form-control" id="inputSuccess" value="{{old('skypename')}}">
             </div>
</div>
              <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> DOB</label>
               <div class="col-md-6">
                <input type="date" name="dob" class="form-control" id="inputSuccess" value="{{old('dob')}}">
             </div>
</div>
                <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> How Hear about us !?</label>
               <div class="col-md-6">
                <input type="text" name="howhearaboutus" class="form-control" id="inputSuccess" value="{{old('howhearaboutus')}}">
             </div>
</div>
 <div class="form-group">
               <label class="col-md-4 control-label"> Interests</label>
                              <div class="col-md-6">

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
           </div>

			<div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> Current Job</label>
               <div class="col-md-6">
                <input type="text" name="currentjob" class="form-control" id="inputSuccess" value="{{old('currentlyjob')}}">
            </div>
</div>
             <div class="form-group">
                <!-- <label class="control-label" for="inputError">Input with error</label> -->
                <label class="col-md-4 control-label"> title </label>
                <div class="col-md-6">
                <textarea name="title" class="form-control" rows="3">{{old('dob')}}</textarea>
            </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> startwork_at </label>
               <div class="col-md-6">
                <input type="number" name="startwork_at" class="form-control" id="inputSuccess" value="{{old('startwork_at')}}">
             </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> companywebsite</label>
               <div class="col-md-6">
                <input type="text" name="companywebsite" class="form-control" id="inputSuccess" value="{{old('companywebsite')}}">
             </div>
</div>
              <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> d_maker </label>
               <div class="col-md-6">
                <input type="text" name="d_maker" class="form-control" id="inputSuccess" value="{{old('d_maker')}}">
             </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> colleage </label>
               <div class="col-md-6">
                <input type="text" name="colleage" class="form-control" id="inputSuccess" value="{{old('colleage')}}">
             </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> degree </label>
               <div class="col-md-6">
                <input type="text" name="degree" class="form-control" id="inputSuccess" value="{{old('degree')}}">
             </div>
</div>

             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> graduated at </label>
               <div class="col-md-6">
                <input type="text" name="graduated_at" class="form-control" id="inputSuccess" value="{{old('graduated_at')}}">
             </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> fax </label>
               <div class="col-md-6">
                <input type="text" name="fax" class="form-control" id="inputSuccess" value="{{old('d_maker')}}">
             </div>

</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> facebook </label>
               <div class="col-md-6">
                <input type="text" name="facebook" class="form-control" id="inputSuccess" value="{{old('facebook')}}">
             </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> twitter </label>
               <div class="col-md-6">
                <input type="text" name="twitter" class="form-control" id="inputSuccess" value="{{old('twitter')}}">
             </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> linkedIn  </label>
               <div class="col-md-6">
                <input type="text" name="linkedIn " class="form-control" id="inputSuccess" value="{{old('linkedIn')}}">
             </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> ownwebsite </label>
               <div class="col-md-6">
                <input type="text" name="ownwebsite" class="form-control" id="inputSuccess" value="{{old('ownwebsite')}}">
             </div>
</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> language </label>
               <div class="col-md-6">
                <input type="text" name="language" class="form-control" id="inputSuccess" value="{{old('language')}}">
             </div>
 			</div>
             <div class="form-group">
               <!--  <label class="control-label" for="inputSuccess">Input with success</label> -->
               <label class="col-md-4 control-label"> level </label>
               <div class="col-md-6">
                <input type="text" name="level" class="form-control" id="inputSuccess" value="{{old('level')}}">
             </div>
             </div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
 -->