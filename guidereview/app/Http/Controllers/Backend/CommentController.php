<?php

namespace App\Http\Controllers\Backend;
use App\TourGuide;
use App\FormSubmission;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;
use App\UserPermission;
use Illuminate\Support\Facades\Auth;
use App\RolesPermission;
use App\User;
use App\UserRole;
use Illuminate\Support\Facades\Hash;
use Validator;
class CommentController extends Controller
{
    //
    public function showComment($id)
    {
        if (Auth::check()) {
             $user = Auth::user();
        }
        $userpermission =DB::table('users_permissions')->where('user_id' ,'=',$user->id)->pluck('permission_id');
        $permission = json_decode($userpermission);

        $tourguides =TourGuide::findOrFail($id);
        $comments = DB::table('form_submissions')->where('type','comment')->get();
        for ($i=0; $i < count($comments); $i++) { 
            $comments[$i] = json_decode($comments[$i]->metadata);
        }
        $comments = $comments->where('tourguide_id',$tourguides->id);
          if ($user->email == $tourguides->email || in_array(12 ,$permission ,true)) {
             return view('backend.comment.index',compact('tourguides','comments'));  
        }
        else 
            return view('errors.403');
    }

    public function showEditCommentForm($id){

        if (Auth::check()) {
             $user = Auth::user();
        }
        $userpermission =DB::table('users_permissions')->where('user_id' ,'=',$user->id)->pluck('permission_id');
        $permission = json_decode($userpermission);
        $comment =FormSubmission::findOrFail($id);
        $comments =FormSubmission::findOrFail($id);
        $comments = json_decode($comments->metadata);
        $tourguides =DB::table('tour_guides')->where('id',$comments->tourguide_id)->first();
           if ($user->email == $tourguides->email || in_array(12 ,$permission ,true)) {
              return view('backend.comment.edit',compact('comments','tourguides','comment'));
        }
        else 
            return view('errors.403');
        
    }
    public function updateComment(Request $request , $id)
    {
        $comment =FormSubmission::findOrFail($id);
        $comments =FormSubmission::findOrFail($id);
        $comments = json_decode($comments->metadata);
        $tourguides =DB::table('tour_guides')->where('id',$comments->tourguide_id)->first();
        $content = $comments->comment;
        $status = $request->input('status');
        $tourguide_id = $tourguides->id;
        $metadata = ["comment" => $content ,"status"=>$status ,"tourguide_id"=>$tourguide_id,"name" =>$comments->name,"email"=>$comments->email,"phone"=>$comments->phone,"id"=>$comments->id];
        $comment->metadata =json_encode($metadata);
        $comment->update();
        return back();
    }
/**All Comment**/
    public function showAllComment()
    {
        $comments = DB::table('form_submissions')->where('type','comment')->orderBy('name' ,'DESC')->get();
        for ($i=0; $i < count($comments); $i++) { 
            $comments[$i] = json_decode($comments[$i]->metadata);
        }
        //dd($comments);
        return view('backend.comment.Allindex',compact('comments'));   
    }

    public function showEditAllCommentForm($id){
         $comment =FormSubmission::findOrFail($id);
         $comments =FormSubmission::findOrFail($id);
         $comments = json_decode($comments->metadata);
    
         $tourguides =DB::table('tour_guides')->where('id',$comments->tourguide_id)->first();
       //  dd($tourguides);
         return view('backend.comment.Alledit',compact('comments','tourguides','comment'));
    }
    public function updateAllComment(Request $request , $id)
    {
        $comment =FormSubmission::findOrFail($id);
        $comments =FormSubmission::findOrFail($id);
        $comments = json_decode($comments->metadata);
        //dd($comments);
        $tourguides =DB::table('tour_guides')->where('id',$comments->tourguide_id)->first();
       // dd($tourguides);
        //$content = $request->input('comment');
        $status = $request->input('status');
        $tourguide_id = $tourguides->id;
        $content = $comments->comment;
        $metadata = ["comment" => $content ,"status"=>$status ,"tourguide_id"=>$tourguide_id,"name" =>$comments->name,"email"=>$comments->email,"phone"=>$comments->phone,"id"=>$comments->id];
        $comment->metadata =json_encode($metadata);
      
       // dd($comment);
        $comment->update();
        return back();
    }
    public function destroy($id)
    {
             FormSubmission::destroy($id);
             return back();
    }
}
