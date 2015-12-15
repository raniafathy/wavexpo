<?php namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;

use App\Tracklogin;
use DateTime;
use Auth;

//use Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

use Session;
//use Sessionclass;
//require("sessionclass.php");
trait AuthenticatesAndRegistersUsers {



    //thread 
  //protected  $threadedObj = new Sessionclass();

	/**
	 * The Guard implementation.
	 *
	 * @var \Illuminate\Contracts\Auth\Guard
	 */
	protected $auth;
    
	/**
	 * The registrar implementation.
	 *
	 * @var \Illuminate\Contracts\Auth\Registrar
	 */
	protected $registrar;

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{
		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$this->auth->login($this->registrar->create($request->all()));
        Session::put('sessionstart', date("Y-m-d H:i:s"));
        Session::put('sessiontimer', date("Y-m-d H:i:s"));

        //thread 
      //  $threadedObj  = new Sessionclass();
       // $threadedObj->start();

		//If regular user go to General Info page 
        if($request->get('type') == 'regular'){

        	return redirect('generalinfos/create');
        }else{
		
	        //If company go to home page 
			return redirect('companies/create');
	    }
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			Session::put('sessionstart', date("Y-m-d H:i:s"));
			Session::put('sessiontimer', date("Y-m-d H:i:s"));
            //thread
           // $threadedObj  = new Sessionclass();
           // $threadedObj->start();
			// redirect to home page
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
	}

	/**
	 * Get the failed login message.
	 *
	 * @return string
	 */
	protected function getFailedLoginMessage()
	{
		return 'These credentials do not match our records.';
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{

		// Checking event_id key exist in session.
		if (Session::has('event_id')) {

		   $eventId=Session::get('event_id'); 
		   $systemtrackId=Session::get('systemtrack_event_id');
		   $systemtrack = Systemtrack::find($systemtrackId);
		   $systemtrack->leave_at=date("Y-m-d H:i:s");
		   $systemtrack->save();
		   Session::forget('event_id');
		 //  Session::forget('systemtrack_id');

		}

		if (Session::has('booth_id')) {
		  
		   $boothId=Session::get('booth_id');
		   $systemtrackId=Session::get('systemtrack_booth_id');

		   $systemtrack = Systemtrack::find($systemtrackId);
		   $systemtrack->leave_at=date("Y-m-d H:i:s");
		   $systemtrack->save();
		   Session::forget('booth_id');
		  // Session::forget('systemtrack_id');


		}
		$userId=Auth::user()->id;

		$now = new DateTime();

        // Tracklogin::where('user_id', $userId)
        //   ->max('login_at')
        //   ->update(['logout_at' => $now]);

          $maxLogin=DB::table('tracklogins')
                        ->where('user_id', $userId)
          			    ->max('login_at');
          DB::table('tracklogins')
            ->where('user_id', $userId)
            ->where('login_at', $maxLogin) 
            ->update(['logout_at' => $now]);


		$this->auth->logout();

		return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
	}

	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		// add in tracl login table a record 
		$userId=Auth::user()->id;
		$tracklogin = new Tracklogin();
		$tracklogin->user_id=$userId;
		$now = new DateTime();
		$tracklogin->login_at=$now;
		$tracklogin->save();


		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
	}

	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
	}

}
