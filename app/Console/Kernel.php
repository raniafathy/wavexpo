<?php namespace App\Console;
//use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\User;
use Session;
use DateTime;
use DB;
use Redirect;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers;
class Kernel extends ConsoleKernel {

//protected $auth;
		


	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		'App\Console\Commands\Inspire',
		'App\Console\Commands\CheckUser',

	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	 * @return voidreturn redirect()->action('HomeController@index');
	 */



	protected function schedule(Schedule $schedule)
	{
		$schedule->command('inspire')
				 ->hourly();

$schedule->call('App\Http\Controllers\HomeController@outFromSystem')->everyMinute();
	
	}

}
