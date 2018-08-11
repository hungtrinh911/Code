<?php

namespace App\Http\Controllers\Backend;

use Input; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Handler;
use App\TourGuide;
use App\FieldGuide;
use App\RoleGuide;
use App\CertificateGuide;
use App\City;
use App\Language;
use App\FormSubmission;
use App\TourGuideLang;
use App\TourGuideRole;
use App\TourGuideCertificate;
use App\TourGuideField;
use Illuminate\Http\Request;
use Redirect;
use App\Permission;
use App\UserPermission;
use Illuminate\Support\Facades\Auth;
use App\RolesPermission;
use App\User;
use App\UserRole;
use Illuminate\Support\Facades\Hash;
use Validator;

class FreeTourGuideController extends Controller
{
    //
    public function index()
    {
    	return view('backend.tourguide.free');

    }
    public function check(Request $request)
    {

    	$start1 = strtotime($request->input('start'));
    	//$languages = $request->input('start') ;
    	
    	//dd(strtotime($start));
    	$end1 = strtotime($request->input('end'));
    	//dd($end);
    	$tourguides = DB::table('tour_guides')->get();
    	//dd($tourguides["1"]->start);
    	$arr_tourguides_busy = null;
    	$arr_tourguides_free = null;
    	//$cities = DB::table('cities')->orderBy('name')->get(['name']);
    	for ($i=0; $i <count($tourguides) ; $i++) { 
    		# code...
  			//dd($tourguides[$i]->start);
    		$date_start = strtotime($tourguides[$i]->start);
    		//dd($date_start);
    		$date_end = strtotime($tourguides[$i]->end);
    		//dd ($date_start <= $start);
    		if ( ($date_start <= $start1 && $date_end >= $start1 ) || ($date_end <=$end1 && $date_start >= $start1) ) {
    			$arr_tourguides_busy[$i] = $tourguides[$i];
    			continue ;
    		} 
    		else{
    				$arr_tourguides_free[$i] =$tourguides[$i];
    		}
    	}
    	//dd($arr_tourguides_free);
    
    		return view('backend.tourguide.free')->with(['free'=>$arr_tourguides_free,
    						 'busy'=>$arr_tourguides_busy]);
    
    }
}
