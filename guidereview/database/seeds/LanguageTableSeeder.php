<?php

use Illuminate\Database\Seeder;
use App\Language;
class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Language = new Language();
        $Language->language ='Tiếng Việt ';
        $Language->save();
        $Language = new Language();
        $Language->language ='Tiếng Nga';
        $Language->save();
        $Language = new Language();
        $Language->language ='Tiếng Trung';
        $Language->save();
        $Language = new Language();
        $Language->language ='Tiếng Hàn ';
        $Language->save();
        $Language = new Language();
        $Language->language ='Tiếng Bồ Đào Nha';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Lào';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Balan';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Rumani';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Anh';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Pháp';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Nhật';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Tây Ban Nha';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Thái';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Campuchia';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Hungary';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Ả Rập';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Hà Lan';
        $Language->save();$Language = new Language();
        $Language->language =' Tiếng Myanmar';
        $Language->save();$Language = new Language();
        $Language->language ='Tiếng Đan Mạch';
        $Language->save();
       

       

    }
}
