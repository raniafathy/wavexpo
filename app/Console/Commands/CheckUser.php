<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Auth;
use App\User;
use Session;
use Carbon;
use DateTime;
use DB;

class CheckUser extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'check:user';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'command to repeate certain function';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{

		 //\Log::info($this->checkUser());
		$this->checkUser();
		//$this->info(checkUser());
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			// ['example', InputArgument::REQUIRED, 'An example argument.'],
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
			// ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
		];
	}


	private function checkUser()

	{


				$value='hi';
				//echo "hi";
				$now = new DateTime(date("Y-m-d H:i:s"));

				      //  $request = new Request();


				//if (Session::has('clientTime')) {
    //
			//echo "hi";


		        $time=Session::get('clientTime');

		        DB::table('types')->insert(
			 	    ['name' => 'hi', 'price' => $now]
			 	);


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
				return redirect('/auth/logout');

			 
			  // Auth::logout();
    }
//}

//return $value;

	}

}
