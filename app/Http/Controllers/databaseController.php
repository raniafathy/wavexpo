<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use App\OrmProject;
use Auth;
use App\UserInterest;
use App\Interest;
use App\Country;
use Session;
use App\Systemtrack;
use DB;


class databaseController extends Controller {
//check user login or not
	public function __construct()
	{
		$this->middleware('auth');


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
	}


	/**
	 * Authorize admin
	 * @param  integer $user_id
	 * @return Response
	 */
	private function adminAuth()
	{		
		if (Auth::User()->type !="admin"){
			return false;
		}
		return true;
	}

	/**
	 * Authorize user can view the page
	 * @param  integer $user_id
	 * @return Response
	 */
	private function userAuth($id)
	{		
		if (Auth::User()->id !=$id ){
			return false;
		}
		return true;
	}

	public function insertTrackingSystemData($spot_id , $activity_id , $type_id)
	{
		//$connection=ORM::getInstance();
		//$connection->setTable('systemtracks');

		$userID = Auth::User()->id;
		$systemtracks=DB::table('systemtracks')->insert( ['user_id' => $userID, 'spot_id' => $spot_id , 'activity_id' => $activity_id, 							'type_id' => $type_id ]
			);
			if($systemtracks){
				echo "inserted successfuly";
			}else{
				echo " data doesnot inserted";
			}



	}

}
