<?php

use Illuminate\Database\Seeder;
use App\CertificateGuide;
class CertificateGuideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //chung chi
        $certificate = new CertificateGuide();
        $certificate->name='Chứng chỉ sơ cấp cứu ';
        $certificate->save();
        $certificate = new CertificateGuide();
        $certificate->name='Chứng chỉ ngoại ngữ';
        $certificate->save();
        $certificate = new CertificateGuide();
        $certificate->name='Chứng chỉ nghiệp vụ hướng dẫn	 ';
        $certificate->save();
        $certificate = new CertificateGuide();
        $certificate->name='Chứng chỉ du lịch trách nhiệm';
        $certificate->save();
      
    }
}
