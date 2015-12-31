<?php namespace App\Console;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Http\Requests;

use Auth;
use App\User;
use Session;
//use Request;
use DateTime;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return void
	 */






	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')
				 ->hourly();

		$schedule->call(function(Request $request) {

			echo "hi";
				$now = new DateTime(date("Y-m-d H:i:s"));

				      //  $request = new Request();


				if (Session::has('clientTime')) {
    //
			echo "hi";


		        $time=Session::get('clientTime');


				$diff1 = $time->diff($now);
				$test=$diff1->s;

				//echo json_encode( $test);


				  if($diff1->s > 2 ){


					//Checking event_id key exist in session.
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

				$maxLogin=DB::table('tracklogins')
		                        ->where('user_id', $userId)
		          			    ->max('login_at');

			    DB::table('tracklogins')
			        ->where('user_id', $userId)
			        ->where('login_at', $maxLogin) 
			        ->update(['logout_at' => $now]);

			 
			   Auth::logout();

}

}

					})->everyMinute();
	}

}
