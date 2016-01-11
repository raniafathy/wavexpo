<?php namespace App\Http\Controllers;

use App\ExhibitionEvent;
use App\Tracklogin;
use Auth;
use App\Systemtrack;
use App\User;
use App\Company;
use App\Exhibitor;
use App\Booth;
use Session;
use Request;

use Illuminate\Routing\Route;

use DateTime;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;



class HomeController extends Controller {

protected $auth;
    
	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	 //check user login or not
	public function __construct()
	{
       
		$this->middleware('auth');

	}
	

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Route $route)
	{



		$upcomingexhibitionevents=ExhibitionEvent::where('start_time','>',date("Y-m-d H:i:s"))->take(4)->get();
		$currentlyexhibitionevents=ExhibitionEvent::where('start_time','<',date("Y-m-d H:i:s"))->where('end_time','>',date("Y-m-d H:i:s"))->take(4)->get();
		$tracklogins=Tracklogin::where('user_id','=',Auth::User()->id)->orderBy('created_at','desc')->take(2)->get();
		
		$systemtracks=Systemtrack::where('user_id','=',Auth::User()->id)->orderBy('created_at','desc')->take(5)->get();

		if(Auth::User()->type=='company'){
			$user=User::find(Auth::User()->id);
		    $company=Company::where('user_id',$user->id)->get();
		    $company=$company[0];
		    $companyId = $company->id;       
            $exhibitors=Exhibitor::where('company_id',$companyId)->get();
            //$booths=array();
            $events=array();
            $i=0;
            foreach ($exhibitors as $exhibitor) {

            	$booths=Booth::where('exhibitor_id',$exhibitor->id)->get();
            	foreach ($booths as $booth) {
            		$events[$i]=$booth->exhibition_event_id;
            		$i++;
            	}
            }
            $events = array_unique($events);
            //var_dump($events); exit();
            $i=0;
            $exhibitionevents=array();
            foreach ($events as $event) {
            	$exhibitionevents[$i]=ExhibitionEvent::find($event);
            	$i++;
            }

           // var_dump($exhibitionevents[0]); exit();
            $upcomingcompanyevents=array();
            $currentlycompanyevents=array();
            $finishedcompanyevents=array();
            $i=0;
            foreach ($exhibitionevents as $exhibitionevent) {

            	if ($exhibitionevent->start_time > date("Y-m-d H:i:s")) {
            		 $upcomingcompanyevents[$i]=$exhibitionevent;
            		 $i++;
            	}elseif ($exhibitionevent->start_time < date("Y-m-d H:i:s") && $exhibitionevent->end_time > date("Y-m-d H:i:s") ) {
            		 $currentlycompanyevents[$i]=$exhibitionevent;
            		 $i++;
            	}else{
            		$finishedcompanyevents[$i]=$exhibitionevent;
            		$i++;

            	}

            }

	    }

	   

		return view('home',compact('upcomingexhibitionevents','currentlyexhibitionevents','tracklogins','systemtracks','upcomingcompanyevents','currentlycompanyevents','finishedcompanyevents'));
	}



	/**
	 * check on user active or not in my project 
	 */

	public function sessionTime(){


		$userId=Auth::User()->id;
		$maxLogin=DB::table('tracklogins')
		                        ->where('user_id', $userId)
		          			    ->max('login_at');

		$logout= DB::table('tracklogins')
			        ->where('user_id', $userId)
			        ->where('login_at', $maxLogin)->pluck('logout_at'); 
			       

 		if($logout!="0000-00-00 00:00:00"){
 		 	return redirect('/auth/logout');
  		 }

        $now = new DateTime(date("Y-m-d H:i:s"));

		
		DB::table('tracklogins')
			        ->update(['sessiontime' => $now ,'userid'=>$userId]);

		$sessiontime =Tracklogin::select('sessiontime')->get()->first();

		$userid =Tracklogin::select('userid')->first();
		
		echo json_encode( $sessiontime->sessiontime);



	}

	/**
	 * function run by server every certain time for logout
	 */

	public function outFromSystem(){



      		  	$now = new DateTime(date("Y-m-d H:i:s"));
			    
			    $userid =Tracklogin::select('userid')->first();
				
				$userId=$userid->userid;
				
			    $sessiontime =Tracklogin::select('sessiontime')->get()->first();

				$date2 = $sessiontime->sessiontime;
		        
				$date3 = new DateTime($date2);
				
				$diff1 = $date3->diff($now);
				
				$test=$diff1->s;
				

				if($diff1->s > 2 ){


					//Checking event_id key exist in session.
					$maxID=DB::table('systemtracks')
			          			    ->max('id');

					$eventid =Systemtrack::where('id', $maxID)->pluck('eventid');
					$leave_at =Systemtrack::where('id', $maxID)->pluck('leave_at');
					if($eventid !=0 && $leave_at == NULL){
							$systemeventid =Systemtrack::where('id', $maxID)->pluck('systemeventid');
							$systemtrack = Systemtrack::find($systemeventid);
							$systemtrack->leave_at=date("Y-m-d H:i:s");
							$systemtrack->save();
				
					}
					//Checking booth_id key exist in session.
					$maxID=DB::table('systemtracks')
			          			    ->max('id');

					$boothid =Systemtrack::where('id', $maxID)->pluck('boothid');
					$leave_at =Systemtrack::where('id', $maxID)->pluck('leave_at');
					if($boothid !=0 && $leave_at ==Null){
							$systemboothid =Systemtrack::where('id', $maxID)->pluck('systemboothid');
							$systemtrack = Systemtrack::find($systemboothid);
							$systemtrack->leave_at=date("Y-m-d H:i:s");
							$systemtrack->save();
					
					}

					$maxLogin=DB::table('tracklogins')
		                        ->where('user_id', $userId)
		          			    ->max('login_at');

				    DB::table('tracklogins')
				        ->where('user_id', $userId)
				        ->where('login_at', $maxLogin) 
				        ->update(['logout_at' => $now]);
					//Auth::logout();
			

				}



	}

}
