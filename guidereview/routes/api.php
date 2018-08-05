<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



/* Category */
//Route::get('category/tree', 'Api\NewsController@treeCategory');


/* Training Course*/
Route::get('trainingcourse/grid', 'Api\TrainingCourseController@grid');
Route::get('cate/tree', 'Api\TrainingCourseController@treeCategory');
Route::post('trainingcourse/delete', 'Api\TrainingCourseController@delete');
/*job seach*/

Route::get('jobsearch/grid', 'Api\JobSearchController@grid');
//Route::post('jobsearch/category/tree', 'Api\JobSearchController@treeCategory');

Route::post('jobsearch/delete', 'Api\JobSearchController@delete');

Route::get('js/category/tree', 'Api\JobSearchController@treeCategory');







/* Dự án */
Route::get('project/grid', 'Api\ProjectController@grid');
Route::post('project/delete', 'Api\ProjectController@delete');
Route::get('project/category/tree', 'Api\ProjectController@treeCategory');

/* Tin tức */
Route::get('news/grid', 'Api\NewsController@grid');
Route::post('news/delete', 'Api\NewsController@delete');
Route::get('news/category/tree', 'Api\NewsController@treeCategory');

/* Sự kiện */
Route::get('event/grid', 'Api\EventController@grid');
Route::post('event/delete', 'Api\EventController@delete');

/* Blog */
Route::get('blog/grid', 'Api\BlogController@grid');
Route::post('blog/delete', 'Api\BlogController@delete');

/* Trang đơn */
Route::get('page/grid', 'Api\PageController@grid');
Route::post('page/delete', 'Api\PageController@delete');

/* Phan quyen */
Route::get('permission/grid', 'Api\PermissionController@grid');
Route::get('role/grid', 'Api\RoleController@grid');
Route::post('role/delete', 'Api\RoleController@delete');//->middleware(['permission:delete-role']);
Route::get('user/grid', 'Api\UserController@grid');
Route::post('user/delete', 'Api\UserController@delete');

/* Menu */
Route::get('menu/grid', 'Api\MenuController@grid');
Route::post('menu/delete', 'Api\MenuController@delete');

/* Subscriber */
Route::get('subscriber/grid', 'Api\SubscriberController@grid');

/* Submission */
Route::get('submission/grid', 'Api\FormSubmissionController@grid');


/* Things */
Route::post('thing/updateMenuItem', 'Api\ThingController@updateMenuItem');
Route::post('thing/saveNestedMenu', 'Api\ThingController@saveNestedMenu');
Route::post('thing/deleteMenuItem', 'Api\ThingController@deleteMenuItem');