<?php

namespace App\Http\Controllers\Backend;

use App\FormSubmission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Base\Thing;
use App\TourGuide;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function dashboard()
    {   
         if (Auth::check()) {
             $user = Auth::user();
        }
        
        $tourguides = DB::table('tour_guides')->where('email','=',$user->email)->first();
        $comments = DB::table('form_submissions')->where('type','comment')->get();
        if($tourguides != null)
        {
            for ($i=0; $i < count($comments); $i++) { 
                $comments[$i] = json_decode($comments[$i]->metadata);
            }
            $comments = $comments->where('tourguide_id',$tourguides->id);
            return view ('backend.tourguide.show',compact('tourguides','comments'));
        }
        else 
        {
        $projects = Thing::where('type', 'project')->count();
        $events = FormSubmission::where('type', 'event')->count();
        $upcomming = Thing::where('type', 'upcomming')->count();
        $register_project = FormSubmission::where('type', 'project')->count();

        return view('backend.dashboard')->with([
            'projects' => $projects,
            'events' => $events,
            'upcomming' => $upcomming,
            'register_project' => $register_project,
        ]);
        }
    }

    public function test()
    {
        dd('test');
    }
}
