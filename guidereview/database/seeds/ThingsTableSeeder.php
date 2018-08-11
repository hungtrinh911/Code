<?php

use App\Base\Term;
use App\Base\Thing;
use Illuminate\Database\Seeder;

class ThingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        /*=== Tùy chỉnh - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Tùy chỉnh';
        $thing->slug = '/option';
        $thing->featured_img = 'ti-settings';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 6;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Faqs ';
        $thing->slug = '/faqs';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/option'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();


        $thing = new Thing();
        $thing->title = 'Liên Hệ ';
        $thing->slug = '/contact';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/option'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 2;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();


        $thing = new Thing();
        $thing->title = 'About Us ';
        $thing->slug = '/aboutus';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/option'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 3;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();



/*   Tour guide    */


        $thing = new Thing();
        $thing->title = 'Tour Guide';
        $thing->slug = '/TourGuide';
        $thing->featured_img = 'ti-user';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Danh sách ';
        $thing->slug = '/TourGuide/list';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/TourGuide'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa Ký Năng ';
        $thing->slug = '/TourGuide/show';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/TourGuide'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();
        
        $thing = new Thing();
        $thing->title = 'Thêm mới';
        $thing->slug = '/TourGuide/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/TourGuide'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa ';
        $thing->slug = '/TourGuide/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/TourGuide'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa';
        $thing->slug = '/TourGuide/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/TourGuide'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();


/**    Comment   **/

        $thing = new Thing();
        $thing->title = 'Comment ';
        $thing->slug = '/comment';
        $thing->featured_img = 'ti-comments';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 2;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());


        $thing = new Thing();
        $thing->title = 'Danh Sách ';
        $thing->slug = '/comment/list';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/comment'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();



        $thing = new Thing();
        $thing->title = 'Sửa';
        $thing->slug = '/comment/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/comment'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();


        $thing = new Thing();
        $thing->title = 'Xóa ';
        $thing->slug = '/comment/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/comment'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

 


/*   Trainning Course    */
        $thing = new Thing();
        $thing->title = 'Training Course';
        $thing->slug = '/trainingcourse';
        $thing->featured_img = 'ti-clipboard';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 3;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm mới';
        $thing->slug = '/trainingcourse/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/trainingcourse'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa Training Course';
        $thing->slug = '/trainingcourse/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/trainingcourse'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();


        $thing = new Thing();
        $thing->title = 'Xóa Training Course';
        $thing->slug = '/trainingcourse/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/trainingcourse'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Chuyên Mục';
        $thing->slug = '/tc/category';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/trainingcourse'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 2;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Cập nhật chuyên mục';
        $thing->slug = '/tc/category/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/tc/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa chuyên mục';
        $thing->slug = '/tc/category/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/tc/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();



/**     job seach      **/

      
        $thing = new Thing();
        $thing->title = 'Job Search';
        $thing->slug = '/jobsearch';
        $thing->featured_img = 'ti-search';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 4;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm mới';
        $thing->slug = '/jobsearch/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/jobsearch'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa';
        $thing->slug = '/jobsearch/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/jobsearch'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();


        $thing = new Thing();
        $thing->title = 'Xóa ';
        $thing->slug = '/jobsearch/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/jobsearch'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Chuyên Mục';
        $thing->slug = '/js/category';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/jobsearch'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 2;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();


        $thing = new Thing();
        $thing->title = 'Cập nhật chuyên mục';
        $thing->slug = '/js/category/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/js/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa chuyên mục';
        $thing->slug = '/js/category/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/js/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();



/*=== Tin tức - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Tin tức';
        $thing->slug = '/news';
        $thing->featured_img = 'ti-direction-alt';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 5;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm mới';
        $thing->slug = '/news/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Cập nhật';
        $thing->slug = '/news/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa';
        $thing->slug = '/news/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Chuyên mục';
        $thing->slug = '/news/category';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 2;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Thêm chuyên mục';
        $thing->slug = '/news/category/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Cập nhật chuyên mục';
        $thing->slug = '/news/category/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa chuyên mục';
        $thing->slug = '/news/category/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();


/**== Tìm kiếm tourguide không bận==**/

        $thing = new Thing();
        $thing->title = 'Tìm kiếm';
        $thing->slug = '/check';
        $thing->featured_img = 'ti-search';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 7;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Tourguide rảnh';
        $thing->slug = '/check/tourguide';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/check'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

/*=== Người dùng - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Người dùng';
        $thing->slug = '/user';
        $thing->featured_img = 'ti-user';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 8;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm';
        $thing->slug = '/user/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa';
        $thing->slug = '/user/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa';
        $thing->slug = '/user/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        /*=== Nhóm vai trò - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Nhóm vai trò';
        $thing->slug = '/role';
        $thing->featured_img = 'ti-cup';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 2;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm';
        $thing->slug = '/role/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/role'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa';
        $thing->slug = '/role/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/role'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa';
        $thing->slug = '/role/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/role'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        /*=== Quyền - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Danh sách Quyền';
        $thing->slug = '/permission';
        $thing->featured_img = 'ti-shield';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 3;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm';
        $thing->slug = '/permission/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/permission'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa';
        $thing->slug = '/permission/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/permission'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa';
        $thing->slug = '/permission/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/permission'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        /*=== Danh mục Frontend-PrimaryMenu - Tiếng Việt ===*/
        // $thing = new Thing();
        // $thing->title = 'Giới thiệu';
        // $thing->slug = '/primary-menu/gioi-thieu';
        // $thing->featured_img = '';
        // $thing->type = 'menu_item';
        // $thing->status = 'publish';
        // $thing->locale = env('LOCALE_DEFAULT');
        // $thing->parent_id = 0;
        // $thing->order_index = 0;
        // $thing->metadata = '{"hasChild":false,"urlType":"page"}';
        // $thing->save();
        // $thing->terms()->attach(Term::where([['slug', 'primary-menu'], ['locale', $thing->locale]])->first());

        // $thing = new Thing();
        // $thing->title = 'Dịch vụ';
        // $thing->slug = '/primary-menu/dich-vu';
        // $thing->featured_img = '';
        // $thing->type = 'menu_item';
        // $thing->status = 'publish';
        // $thing->locale = env('LOCALE_DEFAULT');
        // $thing->parent_id = 0;
        // $thing->order_index = 0;
        // $thing->metadata = '{"hasChild":false,"urlType":"page"}';
        // $thing->save();
        // $thing->terms()->attach(Term::where([['slug', 'primary-menu'], ['locale', $thing->locale]])->first());

        // $thing = new Thing();
        // $thing->title = 'Dự án';
        // $thing->slug = '/primary-menu/du-an';
        // $thing->featured_img = '';
        // $thing->type = 'menu_item';
        // $thing->status = 'publish';
        // $thing->locale = env('LOCALE_DEFAULT');
        // $thing->parent_id = 0;
        // $thing->order_index = 0;
        // $thing->metadata = '{"hasChild":true,"urlType":"project_category_root"}';
        // $thing->save();
        // $thing->terms()->attach(Term::where([['slug', 'primary-menu'], ['locale', $thing->locale]])->first());

        // $thing = new Thing();
        // $thing->title = 'Biệt thự';
        // $thing->slug = '/primary-menu/du-an/biet-thu';
        // $thing->featured_img = '';
        // $thing->type = 'menu_item';
        // $thing->status = 'publish';
        // $thing->locale = env('LOCALE_DEFAULT');
        // $thing->parent_id = Thing::where([['slug', '/primary-menu/du-an'], ['locale', $thing->locale]])->first()['id'];
        // $thing->order_index = 0;
        // $thing->metadata = '{"hasChild":false,"urlType":"project_category"}';
        // $thing->save();
        // $thing->terms()->attach(Term::where([['slug', 'primary-menu'], ['locale', $thing->locale]])->first());


        // /*=== Menu - Tiếng Việt ===*/
        // $thing = new Thing();
        // $thing->title = 'Quản trị menu';
        // $thing->slug = '/menu';
        // $thing->featured_img = 'ti-menu';
        // $thing->type = 'menu_item';
        // $thing->status = 'publish';
        // $thing->locale = env('LOCALE_DEFAULT');
        // $thing->parent_id = 0;
        // $thing->order_index = 10;
        // $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        // $thing->save();
        // $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        // $thing = new Thing();
        // $thing->title = 'Thêm';
        // $thing->slug = '/menu/add';
        // $thing->featured_img = '';
        // $thing->type = 'menu_item';
        // $thing->status = 'publish';
        // $thing->locale = env('LOCALE_DEFAULT');
        // $thing->parent_id = Thing::where([['slug', '/menu'], ['locale', $thing->locale]])->first()['id'];
        // $thing->order_index = 1;
        // $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        // $thing->save();

        // $thing = new Thing();
        // $thing->title = 'Sửa';
        // $thing->slug = '/menu/edit';
        // $thing->featured_img = '';
        // $thing->type = 'menu_item';
        // $thing->status = 'publish';
        // $thing->locale = env('LOCALE_DEFAULT');
        // $thing->parent_id = Thing::where([['slug', '/menu'], ['locale', $thing->locale]])->first()['id'];
        // $thing->order_index = 0;
        // $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        // $thing->save();

        // $thing = new Thing();
        // $thing->title = 'Xóa';
        // $thing->slug = '/menu/delete';
        // $thing->featured_img = '';
        // $thing->type = 'menu_item';
        // $thing->status = 'publish';
        // $thing->locale = env('LOCALE_DEFAULT');
        // $thing->parent_id = Thing::where([['slug', '/menu'], ['locale', $thing->locale]])->first()['id'];
        // $thing->order_index = 0;
        // $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        // $thing->save();

        // /*=== KH - Tiếng Việt ===*/
        // $thing = new Thing();
        // $thing->title = 'Khách hàng nhận tin';
        // $thing->slug = '/subscriber';
        // $thing->featured_img = 'ti-id-badge';
        // $thing->type = 'menu_item';
        // $thing->status = 'publish';
        // $thing->locale = env('LOCALE_DEFAULT');
        // $thing->parent_id = 0;
        // $thing->order_index = 9;
        // $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        // $thing->save();
        // $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());


 
        //=== tourguide 

    }
}
