<?php

namespace App\Http\Controllers\Backend;
use App\FormSubmission;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    //
    public function index()
    {
    	// dd('1');
        $contacts = DB::table('form_submissions')->where('type','contact')->get();
      	//dd($contacts);
        $contacts_id = DB::table('form_submissions')->where('type','contact')->get();
        for ($i=0; $i < count($contacts); $i++) {
            $contacts[$i] = json_decode($contacts[$i]->metadata);
            $contacts[$i] = ["name" => $contacts[$i]->name,"email"=>$contacts[$i]->email ,"phone"=>$contacts[$i]->phone ,"content"=>$contacts[$i]->content,"id"=>$contacts_id[$i]->id]; 
        }
        $contacts =json_decode($contacts);
        return view('backend.contactus.index',compact('contacts'));   
    }

    public function show($id){
    	 $contacts =FormSubmission::findOrFail($id);
         $contacts = json_decode($contacts->metadata);
         return view('backend.contactus.show',compact('contacts'));
    }

}
