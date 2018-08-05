<?php

use App\MenuItem;
use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*=== Tùy chỉnh - Tiếng Việt ===*/


        $permission = new Permission();
        $permission->slug = 'edit-option';
        $permission->name = 'Cập nhật Tùy chỉnh';
        $permission->thing_id = MenuItem::where([['slug', '/option'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'list-faqs';
        $permission->name = 'Faqs';
        $permission->thing_id = MenuItem::where([['slug', '/faqs'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'list-contact';
        $permission->name = 'Liên Hệ';
        $permission->thing_id = MenuItem::where([['slug', '/contact'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'list-aboutus';
        $permission->name = 'About Us';
        $permission->thing_id = MenuItem::where([['slug', '/aboutus'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

/*Tour guide*/

        $permission = new Permission();
        $permission->slug = 'TourGuide';
        $permission->name ='Danh sách TourGuide';
        $permission->thing_id = MenuItem::where([['slug', '/TourGuide'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'list-tourguide';
        $permission->name ='Danh sách TourGuide';
        $permission->thing_id = MenuItem::where([['slug', '/TourGuide/list'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'show-tourguide';
        $permission->name ='Sửa Kỹ Năng';
        $permission->thing_id = MenuItem::where([['slug', '/TourGuide/show'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'add-tourguide';
        $permission->name ='Thêm mới tourguide';
        $permission->thing_id = MenuItem::where([['slug', '/TourGuide/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-tourguide';
        $permission->name ='Sửa tourguide';
        $permission->thing_id = MenuItem::where([['slug', '/TourGuide/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'delete-tourguide';
        $permission->name ='Xóa tourguide';
        $permission->thing_id = MenuItem::where([['slug', '/TourGuide/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());






/**   Comment  **/


        $permission = new Permission();
        $permission->slug = 'comment';
        $permission->name ='Danh Sách Comment ';
        $permission->thing_id = MenuItem::where([['slug', '/comment'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'list-comment';
        $permission->name ='Danh Sách Comment ';
        $permission->thing_id = MenuItem::where([['slug', '/comment/list'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-comment';
        $permission->name ='Sửa comment ';
        $permission->thing_id = MenuItem::where([['slug', '/comment/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'delete-comment';
        $permission->name ='Xóa comment ';
        $permission->thing_id = MenuItem::where([['slug', '/comment/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());





/*Training Course*/

        $permission = new Permission();
        $permission->slug = 'trainingcourse';
        $permission->name ='Danh sách trainingcourse';
        $permission->thing_id = MenuItem::where([['slug', '/trainingcourse'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-trainingcourse';
        $permission->name ='Thêm Training Course';
        $permission->thing_id = MenuItem::where([['slug', '/trainingcourse/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-trainingcourse';
        $permission->name ='Sửa Training Course';
        $permission->thing_id = MenuItem::where([['slug', '/trainingcourse/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'delete-trainingcourse';
        $permission->name ='Xóa Training Course';
        $permission->thing_id = MenuItem::where([['slug', '/trainingcourse/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'list-trainingcourse_category';
        $permission->name ='Chuyên mục';
        $permission->thing_id = MenuItem::where([['slug', '/tc/category'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'edit-trainingcourse_category';
        $permission->name ='Sửa Chuyên mục';
        $permission->thing_id = MenuItem::where([['slug', '/tc/category/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-trainingcourse_category';
        $permission->name ='Xóa Chuyên mục';
        $permission->thing_id = MenuItem::where([['slug', '/tc/category/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


    /*Job Search*/

        $permission = new Permission();
        $permission->slug = 'jobearch';
        $permission->name ='Danh Sách Job search';
        $permission->thing_id = MenuItem::where([['slug', '/jobsearch'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-jobsearch';
        $permission->name ='Thêm Job Search';
        $permission->thing_id = MenuItem::where([['slug', '/jobsearch/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-jobsearch';
        $permission->name ='Sửa Job Search';
        $permission->thing_id = MenuItem::where([['slug', '/jobsearch/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'delete-jobsearch';
        $permission->name ='Xóa Job Search';
        $permission->thing_id = MenuItem::where([['slug', '/jobsearch/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'list-jobsearch_category';
        $permission->name ='Chuyên Mục';
        $permission->thing_id = MenuItem::where([['slug', '/js/category'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-jobsearch_category';
        $permission->name ='Sửa Chuyên mục jobsearch';
        $permission->thing_id = MenuItem::where([['slug', '/js/category/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-jobsearch_category';
        $permission->name ='Xóa Chuyên mục jobsearch';
        $permission->thing_id = MenuItem::where([['slug', '/js/category/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());



/*=== Tin tức - Tiếng Việt ===*/
        $permission = new Permission();
        $permission->slug = 'list-news';
        $permission->name = 'Danh sách Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-news';
        $permission->name = 'Thêm Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-news';
        $permission->name = 'Cập nhật Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-news';
        $permission->name = 'Xóa Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'list-news_category';
        $permission->name = 'Chuyên mục Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/category'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-news_category';
        $permission->name = 'Thêm chuyên mục Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/category/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-news_category';
        $permission->name = 'Cập nhật chuyên mục Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/category/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-news_category';
        $permission->name = 'Xóa chuyên mục Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/category/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());



/*=== Người dùng - Tiếng Việt ===*/
        $permission = new Permission();
        $permission->slug = 'list-user';
        $permission->name = 'Danh sách Người dùng';
        $permission->thing_id = MenuItem::where([['slug', '/user'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-user';
        $permission->name = 'Thêm Người dùng';
        $permission->thing_id = MenuItem::where([['slug', '/user/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-user';
        $permission->name = 'Cập nhật Người dùng';
        $permission->thing_id = MenuItem::where([['slug', '/user/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-user';
        $permission->name = 'Xóa Người dùng';
        $permission->thing_id = MenuItem::where([['slug', '/user/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

/*=== Nhóm vai trò - Tiếng Việt ===*/
        $permission = new Permission();
        $permission->slug = 'list-role';
        $permission->name = 'Danh sách Nhóm vai trò';
        $permission->thing_id = MenuItem::where([['slug', '/role'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-role';
        $permission->name = 'Thêm Nhóm vai trò';
        $permission->thing_id = MenuItem::where([['slug', '/role/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-role';
        $permission->name = 'Cập nhật Nhóm vai trò';
        $permission->thing_id = MenuItem::where([['slug', '/role/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-role';
        $permission->name = 'Xóa Nhóm vai trò';
        $permission->thing_id = MenuItem::where([['slug', '/role/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

/*=== Quyền - Tiếng Việt ===*/
        $permission = new Permission();
        $permission->slug = 'list-permission';
        $permission->name = 'Danh sách Quyền';
        $permission->thing_id = MenuItem::where([['slug', '/permission'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-permission';
        $permission->name = 'Thêm Quyền';
        $permission->thing_id = MenuItem::where([['slug', '/permission/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-permission';
        $permission->name = 'Cập nhật Quyền';
        $permission->thing_id = MenuItem::where([['slug', '/permission/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-permission';
        $permission->name = 'Xóa Quyền';
        $permission->thing_id = MenuItem::where([['slug', '/permission/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());



    }
}
