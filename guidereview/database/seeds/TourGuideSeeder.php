<?php

use Illuminate\Database\Seeder;
use App\TourGuide;
class TourGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tourguide = New TourGuide();
        $tourguide->name ='Trinh Viet Hung';
        $tourguide->dob ='9/11/1996';
        $tourguide->status ='Hoat Dong';
        $tourguide->sex ='nam';
        $tourguide->people_id ='1451062197';
        $tourguide->email ='1@gmail.com';
        $tourguide->save();


        $tourguide = New TourGuide();
        $tourguide->name ='Trinh Minh Tien';
        $tourguide->dob ='9/11/1996';
        $tourguide->status ='Tam Dung';
        $tourguide->sex ='nam';
        $tourguide->people_id ='1451062223';
        $tourguide->email ='minhtien@gmail.com';
        $tourguide->save();
    }
}
