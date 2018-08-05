<?php

use App\Base\Term;
use Illuminate\Database\Seeder;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*=== Danh mục quản trị ===*/
        $term = new Term();
        $term->name = 'Danh mục quản trị';
        $term->slug = 'backend-menu';
        $term->type = 'backend_menu';
        $term->status = 'publish';
        $term->locale = env('LOCALE_DEFAULT');
        $term->save();

        $term = new Term();
        $term->name = 'Backend Menu';
        $term->slug = 'backend-menu';
        $term->type = 'backend_menu';
        $term->status = 'publish';
        $term->locale = 'en';
        $term->locale_source_id = Term::where([['slug', 'backend-menu'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $term->save();

        // $term = new Term();
        // $term->name = 'TourGuide';
        // $term->slug = 'tour-guide';
        // $term->type = 'backend_menu';
        // $term->status = 'publish';
        // $term->locale = env('LOCALE_DEFAULT');
        // $term->save();

        // $term = new Term();
        // $term->name ='TourGuide';
        // $term->slug ='tour-guide';
        // $term->type='backend_menu';
        // $term->status='publish';
        // $term->locale='en';
        // $term->locale_source_id = Term::where([['slug', 'tour-guide'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        // $term->save();
        
        /*=== Danh mục Frontend ===*/
        $term = new Term();
        $term->name = 'Danh mục Frontend';
        $term->slug = 'frontend-menu';
        $term->type = 'frontend_menu';
        $term->status = 'publish';
        $term->locale = env('LOCALE_DEFAULT');
        $term->save();

        $term = new Term();
        $term->name = 'Frontend Menu';
        $term->slug = 'frontend-menu';
        $term->type = 'frontend_menu';
        $term->status = 'publish';
        $term->locale = 'en';
        $term->locale_source_id = Term::where([['slug', 'frontend-menu'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $term->save();

        $term = new Term();
        $term->name = 'Thực đơn chính';
        $term->slug = 'primary-menu';
        $term->type = 'frontend_menu';
        $term->status = 'publish';
        $term->locale = env('LOCALE_DEFAULT');
        $term->parent_id = Term::where([['slug', 'frontend-menu'], ['locale', $term->locale]])->first()['id'];
        $term->save();

        $term = new Term();
        $term->name = 'Primary Menu';
        $term->slug = 'primary-menu';
        $term->type = 'frontend_menu';
        $term->status = 'publish';
        $term->locale = 'en';
        $term->parent_id = Term::where([['slug', 'frontend-menu'], ['locale', $term->locale]])->first()['id'];
        $term->locale_source_id = Term::where([['slug', 'primary-menu'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $term->save();

        $term = new Term();
        $term->name = 'Thực đơn phụ';
        $term->slug = 'secondary-menu';
        $term->type = 'frontend_menu';
        $term->status = 'publish';
        $term->locale = env('LOCALE_DEFAULT');
        $term->parent_id = Term::where([['slug', 'frontend-menu'], ['locale', $term->locale]])->first()['id'];
        $term->save();

        $term = new Term();
        $term->name = 'Main Menu';
        $term->slug = 'secondary-menu';
        $term->type = 'frontend_menu';
        $term->status = 'publish';
        $term->locale = 'en';
        $term->parent_id = Term::where([['slug', 'frontend-menu'], ['locale', $term->locale]])->first()['id'];
        $term->locale_source_id = Term::where([['slug', 'secondary-menu'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $term->save();
    }
}
