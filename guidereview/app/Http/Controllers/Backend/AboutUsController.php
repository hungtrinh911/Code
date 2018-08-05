<?php

namespace App\Http\Controllers\Backend;
use App\TourGuide;
use App\Option;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    //
    public function show()
    {
    	// dd('1');
        $aboutus = DB::table('options')->where('description','aboutus')->get();
        return view('backend.aboutus.index',compact('aboutus'));   
    }

    public function showAddForm(){

         return view('backend.aboutus.add');
    }

    public function store(Request $request)
    {
        $aboutus = new Option();
        $value = $request->input('value');
          //dd($question);

        $description = 'aboutus';
        $aboutus->value =$value;
        $aboutus->key ='AboutUs';
        $aboutus->description =$description;
        if (  $aboutus->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
      // return \Redirect::route('aboutus')->with('success', trans('backend/common.success'));
    }


    public function showEditForm($k)
    {
        // $aboutus =DB::table('options')->where('description','aboutus')->get();
         $aboutus =Option::findOrFail($k);
         
         return view('backend.aboutus.edit',compact('aboutus'));
    }

    public function update(Request $request , $id)
    {
        $aboutus =Option::findOrFail($id);
        $value = $request->input('value');
        $aboutus->value =$value;
        $aboutus->update();
        return back()->with('success', trans('backend/common.success'))->withInput();
    }
    public function destroy($id)
    {
        Option::destroy($id);
        return back();
    }
}

