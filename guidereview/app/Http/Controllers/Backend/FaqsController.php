<?php

namespace App\Http\Controllers\Backend;
use App\TourGuide;
use App\FormSubmission;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{
    //
    public function showFaqs()
    {
    	// dd('1');
        $faqs = DB::table('form_submissions')->where('type','faqs')->get();
      	//dd($faqs);
        $faqs_id = DB::table('form_submissions')->where('type','faqs')->get();
        for ($i=0; $i < count($faqs); $i++) {
            $faqs[$i] = json_decode($faqs[$i]->metadata);
            $faqs[$i] = ["question" => $faqs[$i]->question,"status"=>$faqs[$i]->status ,"answer"=>$faqs[$i]->answer ,"id"=>$faqs_id[$i]->id]; 
        }
        $faqs =json_decode($faqs);
       	//dd($faqs);
        return view('backend.faqs.index',compact('faqs'));   
    }

    public function showAddForm(){
         return view('backend.faqs.add');
    }


    public function store(Request $request)
    {
        $faqs = new FormSubmission();
        $question = $request->input('question');
          //dd($question);
        $answer = $request->input('answer');
        $status = $request->input('status');
        $metadata = ["question"=>$question ,'answer'=>$answer ,'status'=>$status];
        $faqs->metadata = json_encode($metadata);
        $faqs->name=$question;
        $faqs->email=$question;
        $faqs->type='faqs';
        $faqs->save();
        //dd($faqs->id);
        $metadata = ["question"=>$question ,'answer'=>$answer ,'status'=>$status,'id'=>$faqs->id];
        $faqs->metadata = json_encode($metadata);
        $faqs->update();
        return back();
    }


    public function showEditFaqsForm($id){
         $faqs =FormSubmission::findOrFail($id);
         $faqs = json_decode($faqs->metadata);
         return view('backend.faqs.edit',compact('faqs'));
    }

    public function updateFaqs(Request $request , $id)
    {
        $faqs =FormSubmission::findOrFail($id);
        
        $question = $request->input('question');
        $answer = $request->input('answer');
        $status = $request->input('status');
        $faqs->name=$question;
        $faqs->email=$question;
        $faqs->type='faqs';
        $metadata = ["question"=>$question ,'answer'=>$answer ,'status'=>$status,'id'=>$faqs->id];
        $faqs->metadata = json_encode($metadata);
        //dd($faqs);
        $faqs->update();
        return back();
    }
    public function destroy($id)
    {
        FormSubmission::destroy($id);
        return back();
    }
}
