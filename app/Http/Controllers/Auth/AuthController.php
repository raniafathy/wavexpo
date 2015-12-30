<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;
use Validator;
use App\Generalinfo;
use Auth;
use App\UserInterest;
use App\Interest;
use App\UserFile;
use App\User;
use App\Professionalinfo;
use Mail;
use App\Company;
use App\Country;
use Session;
use App\Systemtrack;
use DB;
use DateTime;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	//protected $redirectPath = '/company';

	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

	
		
	$this->middleware('guest', ['except' => ['getLogout','createuser','createRegister','confirm']]);
	


}		
	
	public function createRegister(){

		$countries= Country::all();
		$interests= Interest::all();
		return view('index', compact('countries','interests'));
	}

	public function createuser()
	{
		
		$confirmation_code = str_random(30);

		$v = Validator::make(Request::all(), [
        'name' => 'required|max:255',
		'email' => 'required|email|max:255|unique:users',
		'password' => 'required|confirmed|min:6',

        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$user= new User;
			$user->name = Request::get('name');
		    $user->email = Request::get('email');
		    $user->type = Request::get('type');
		    $user->password =  bcrypt(Request::get('password'));
		    $user->confirmation_code = $confirmation_code;
			$user->save();
			$gInfo = new Generalinfo;
			$gInfo->user_id=$user->id;
		    $gInfo->country_id = Request::get('country');
			$gInfo->city=Request::get('city');
			$gInfo->address=Request::get('address');
			$gInfo->phone=Request::get('phone');
			$gInfo->anotherphone=Request::get('anotherphone');
			$gInfo->skypename=Request::get('skypename');
			$gInfo->howhearaboutus=Request::get('howhearaboutus');
			$gInfo->dob=Request::get('dob');
			if (Request::hasFile('image')) { 
				$destination= 'uploads/';
				$imagename=str_random(6)."_".Request::file('image')->getClientOriginalName();
				Request::file('image')->move($destination,$imagename);
				$gInfo->image=$imagename;
			}
			$gInfo->save();

			$userInterest = new UserInterest();
            $userInterest->user_id=$user->id;
		    $userInterest=Request::get('interest');
             foreach ($userInterest as $userInterest_id)
   				 {
          				  //echo $userInterest_id;
           				  DB::insert('INSERT INTO user_interests (interest_id, user_id) VALUES (?,?)', array($userInterest_id, $user->id));

	   			 }
			$pInfo = new Professionalinfo;
	        $pInfo->user_id=$user->id;
	        $pInfo->currentjob=Request::get('currentjob');
	        $pInfo->title=Request::get('title');
	        $pInfo->startwork_at=Request::get('startwork_at');
	        $pInfo->companywebsite=Request::get('companywebsite');
	        $pInfo->d_maker=Request::get('d_maker');
	        $pInfo->colleage=Request::get('colleage');
	        $pInfo->degree=Request::get('degree');
	        $pInfo->graduated_at=Request::get('graduated_at');
	        $pInfo->fax=Request::get('fax');
	        $pInfo->facebook=Request::get('facebook');
	        $pInfo->twitter=Request::get('twitter');
	        $pInfo->linkedIn=Request::get('linkedIn');
			$pInfo->ownwebsite=Request::get('ownwebsite');
	        $pInfo->language=Request::get('language');
	        $pInfo->save();
	        if($user->type == "company"){

			        $companyInfo = new Company;
			        $companyInfo->user_id=$user->id;
			        $companyInfo->save();
			       // return redirect('companies');

			    }


	        $data['email']=Request::get('email');
	        $data['name']=Request::get('name');
	        $data['confirmation_code']= $confirmation_code;


		 Mail::send('emails.welcome', $data, function($message) use ($data)
          {
                $message->from('raniafathyhowig@gmail.com', "Wavexpo");
                $message->subject("Welcome to Wavexpo Please visit our website to continu you information");
               $message->to($data['email']);
         });

				
			return redirect('users');
	    }
	}

public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
           // throw new InvalidConfirmationCodeException;
        }

        DB::table('users')
            ->where('confirmation_code', $confirmation_code)
            ->update(['confirmed' => 1,'confirmation_code' =>null]);

        return redirect('/auth/login');
    }


}
