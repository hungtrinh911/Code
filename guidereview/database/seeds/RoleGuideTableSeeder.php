<?php

use Illuminate\Database\Seeder;
use App\RoleGuide;
class RoleGuideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //vao tro
        $roleguide = new RoleGuide();
        $roleguide->name='Hướng dẫn viên nội địa ';
        $roleguide->save();
        $roleguide = new RoleGuide();
        $roleguide->name='Hướng dẫn viên Inbound ';
        $roleguide->save();
        $roleguide = new RoleGuide();
        $roleguide->name='Hướng dẫn viên Outbound ';
        $roleguide->save();
        $roleguide = new RoleGuide();
        $roleguide->name='MC chương trình gala, event ';
        $roleguide->save();
        $roleguide = new RoleGuide();
        $roleguide->name='MC teambuilding ';
        $roleguide->save();


    }
}
