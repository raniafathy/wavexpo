<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use Validator;
use App\Generalinfo;
use Auth;
use App\UserInterest;
use App\Interest;
use App\Country;
use Session;
use App\Systemtrack;
use DB;


class GeneralinfosController extends Controller {

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


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	   $interests=Interest::all();
	   $countries=Country::all();
	   return view('generalinfos.create',compact('interests','countries'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$v = Validator::make(Request::all(), [
        'city' => 'required|max:30',
        'dob' => 'required',
        'phone' => 'required',

       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
			$gInfo = new Generalinfo;

			$userId=Auth::user()->id;
	        $gInfo->user_id=$userId;

		    $gInfo->country_id = Request::get('country');

		    $gInfo->city = Request::get('city');
		    $gInfo->dob = Request::get('dob');
		    //$gInfo->image = Request::get('image');
		    $gInfo->address = Request::get('address');
		    $gInfo->phone = Request::get('phone');
		    $gInfo->anotherphone = Request::get('anotherphone');
		    $gInfo->skypename = Request::get('skypename');
		    $gInfo->howhearaboutus = Request::get('howhearaboutus');
		    if (Request::hasFile('image')) { 
				$destination='uploads/';
				$imagename=str_random(6)."_".Request::file('image')->getClientOriginalName();
				Request::file('image')->move($destination,$imagename);
				$file->image=$imagename;
			}else{
				$file->image=Request::get('image');
			}
		    $gInfo->save();

		  //   if (Request::hasFile('image'))
				// {
				// 	$Image = Request::file('image');
				// 	$imagename = $Image->getClientOriginalExtension();

    //         		$path = public_path('uploads/' . $imagename);
 			// 		Image::make($image->getRealPath())->resize(200, 200)->save($path);
    //             	$gInfo->image = $imagename;
    //            		$gInfo->save();
				// }


		    $userInterest = new UserInterest();
            $userInterest->user_id=$userId;
            $userInterest->interest_id=Request::get('interest');
            $userInterest->save();

			$userInterest = new UserInterest();
            $userInterest->user_id=$userId;
		    $userInterest=Request::get('interest');
             foreach ($userInterest as $userInterest_id)
   				 {
          				  //echo $userInterest_id;
           				  DB::insert('INSERT INTO user_interests (interest_id, user_id) VALUES (?,?)', array($userInterest_id, $userId));

	   			 }
			return redirect('professionalinfos/create');
	    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		//authorization
		if (!$this->adminAuth() && !$this->userAuth($id)){
			return view('errors.404');
		}
		$interests=Interest::all();
		$user=Generalinfo::where('user_id',$id)->get();
		// $userInterests=UserInterest::where('user_id',$id)->get();
		// $userInterestsId=$userInterests[0]->interest_id;
		// $interestsuser=Interest::where('id',$userInterestsId)->get();
		$userinterest=UserInterest::where('user_id',$id)->get()->toArray();
		$userinterest = array_pluck($userinterest, 'interest_id');
		$this->data['userinterest'] = $userinterest;
		//var_dump($user[0]); exit();
		return view('generalinfos.show',compact('user','interests'),$this->data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//authorization
		if (!$this->adminAuth() && !$this->userAuth(Auth::User()->id)){
			return view('errors.404');
		}
		$interests=Interest::all();
	    $countries=Country::all();
		$user=Generalinfo::where('user_id',$id)->get();
		$userinterest=UserInterest::where('user_id',$id)->get()->toArray();
		$userinterest = array_pluck($userinterest, 'interest_id');
		$this->data['userinterest'] = $userinterest;
		// $data['userinterest']= $userinterest
		return view('generalinfos.edit',compact('user','interests','countries'),$this->data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$v = Validator::make(Request::all(), [
        'city' => 'required|max:30',
        'dob' => 'required',
        'phone' => 'required',
       
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{

            $userId=Request::get('id');
	    	$gInfo=Generalinfo::where('user_id',$userId)->get();

	    	$gInfoId=$gInfo[0]->id;


			
			$gInfo=Generalinfo::find($gInfoId);

		

		    $gInfo->country_id = Request::get('country');

		    $gInfo->city = Request::get('city');
		    $gInfo->dob = Request::get('dob');
		    $gInfo->image = Request::get('image');
		    $gInfo->address = Request::get('address');
		    $gInfo->phone = Request::get('phone');
		    $gInfo->anotherphone = Request::get('anotherphone');
		    $gInfo->skypename = Request::get('skypename');
		    $gInfo->howhearaboutus = Request::get('howhearaboutus');
		    if (Request::hasFile('image')) { 
				$destination= 'uploads/';
				$imagename=str_random(6)."_".Request::file('image')->getClientOriginalName();
				Request::file('image')->move($destination,$imagename);
				// $path = Request::file('image')->getRealPath();
				// echo $path;
				 //$path = public_path('upload/' . $imagename);
 		  		//Image::make(Request::file('image')->getRealPath())->resize(200, 200)->save($path);
				$gInfo->image=$imagename;
			}else{
				$gInfo->image=Request::get('image');
			}

		    $gInfo->save();
            
             DB::table('user_interests')
          						  ->where('user_id', $userId)
           						 ->delete();	

	    	$userInterest = new UserInterest();
            $userInterest->user_id=$userId;
		    $userInterest=Request::get('interest');
             foreach ($userInterest as $userInterest_id)
   				 {
            	// echo $userInterest_id;
             DB::insert('INSERT INTO user_interests (interest_id, user_id) VALUES (?,?)', array($userInterest_id, $userId));


	    }
				    			return redirect('generalinfos/'.$userId);

	}
}	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editProfileImage($id)
	{
		$v = Validator::make(Request::all(), [
        'image' => 'required|max:30',
        ]);
       
	    if ($v->fails())
	    {
	        return redirect()->back()->withErrors($v->errors())
	        						 ->withInput();
	    }else{
            $userId=Request::get('id');
	    	$gInfo=Generalinfo::where('user_id',$userId)->get();

	    	$gInfoId=$gInfo[0]->id;

		$gInfo=Generalinfo::find($gInfoId);
		if (Request::hasFile('image')) { 
				$destination= 'uploads/';
				$imagename=str_random(6)."_".Request::file('image')->getClientOriginalName();
				Request::file('image')->move($destination,$imagename);
				$gInfo->image=$imagename;
			}else{
				$gInfo->image=Request::get('image');
			}

		    $gInfo->save();
		  	return redirect('generalinfos/'.$userId);


	}
}

	public function destroy($id)
		{
			//
		}
}
