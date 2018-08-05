<?php

use Illuminate\Database\Seeder;
use App\FormSubmission;
class FormSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$comment = new FormSubmission();
    	$comment->name ='Trinh Viet Hung';
    	$comment->email ='hungtrinh@gmail.com';
    	$comment->phone ='01242972979';
    	$comment->type ='comment';
    	$comment->metadata ='{"comment":"tour guide nhu cut vote 1*","status":"pending" ,"tourguide_id":1,"name":"Trinh Viet Hung","email":"hungtrinh@gmail.com","phone":"01242972979","id":1}';
    	$comment->save();

    	$comment = new FormSubmission();
    	$comment->name ='Trinh Viet Hoang';
    	$comment->email ='hoang987@gmail.com';
    	$comment->phone ='01242972979';
    	$comment->type ='comment';
    	$comment->metadata ='{"comment":"tour guide nhu cut vote 1*","status":"pending" ,"tourguide_id":1,"name":"Trinh Viet Hoang","email":"hungtrinh@gmail.com","phone":"01242972979","id":2}';
    	$comment->save();


    	$comment = new FormSubmission();
    	$comment->name ='Trinh Viet Tuan';
    	$comment->email ='tuan@gmail.com';
    	$comment->phone ='01242972979';
    	$comment->type ='comment';
    	$comment->metadata ='{"comment":"tour guide nhu cut vote 1*","status":"pending" ,"tourguide_id":2,"name":"Trinh Viet Tuan","email":"hungtrinh@gmail.com","phone":"01242972979","id":3}';
    	$comment->save();

    	$comment = new FormSubmission();
    	$comment->name ='Trinh Viet Tan';
    	$comment->email ='tan@gmail.com';
    	$comment->phone ='01242972979';
    	$comment->type ='comment';
    	$comment->metadata ='{"comment":"tour guide nhu cut vote 1*","status":"pending" ,"tourguide_id":2,"name":"Trinh Viet Tan","email":"hungtrinh@gmail.com","phone":"01242972979","id":4}';
    	$comment->save();
        

        $faqs = new FormSubmission();
        $faqs->name ='Trinh Viet a';
        $faqs->email ='a@gmail.com';
        $faqs->phone ='01242972979';
        $faqs->type ='faqs';
        $faqs->metadata ='{"question":"1+1=","status":"pending" ,"answer":"","name":"Trinh Viet a","email":"a@gmail.com","phone":"01242972979"}';
        $faqs->save();

        $faqs = new FormSubmission();
        $faqs->name ='Trinh Viet b';
        $faqs->email ='b@gmail.com';
        $faqs->phone ='01242972979';
        $faqs->type ='faqs';
        $faqs->metadata ='{"question":"2x2=","status":"pending" ,"answer":"","name":"Trinh Viet b","email":"b@gmail.com","phone":"01242972979"}';
        $faqs->save();



        $faqs = new FormSubmission();
        $faqs->name ='Trinh Viet c';
        $faqs->email ='c@gmail.com';
        $faqs->phone ='01242972979';
        $faqs->type ='faqs';
        $faqs->metadata ='{"question":"2x2=","status":"pending" ,"answer":"","name":"Trinh Viet c","email":"c@gmail.com","phone":"01242972979"}';
        $faqs->save();
    }
}
