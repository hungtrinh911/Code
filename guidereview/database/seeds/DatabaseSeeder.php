<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OptionsTableSeeder::class);
        $this->call(TermsTableSeeder::class);
        $this->call(ThingsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CertificateGuideTableSeeder::class);
        $this->call(FieldGuideTableSeeder::class);
        $this->call(RoleGuideTableSeeder::class);
        $this->call(FormSubmissionSeeder::class);
        $this->call(TourGuideSeeder::class);
    }
}



