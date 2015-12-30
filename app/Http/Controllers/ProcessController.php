<?php namespace App\Http\Controllers;

class ProcessController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function startprocess()
	{
			while(true)
			{
			   // session_start();
			   // $_SESSION["test"] = rand();
			   // checkclose();
			   // session_write_close();

				$now=new DateTime();

			   echo $now;
			   sleep(5);
			}	
		}

			 public function checkclose()
		{
		   global $_SESSION;
		   if ($_SESSION["closesession"])
		   {
		       unset($_SESSION["closesession"]);
		       die();
		   }
		}

}
