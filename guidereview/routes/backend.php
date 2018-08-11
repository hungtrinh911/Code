<?php
/**
 * Created by PhpStorm.
 * User: seekill
 *
 * Cấu hình Routes dành riêng cho backend
 */

/* Trang chủ */

Route::get('/', 'Backend\BackendController@dashboard');
Route::get('dashboard', 'Backend\BackendController@dashboard');
/*TourGuide*/

/****/

Route::get('TourGuide','Backend\TourGuideController@index')->name('tourguideindex')->middleware(['permission:list-tourguide']);
Route::get('TourGuide/list','Backend\TourGuideController@index')->name('tourguideindex')->middleware(['permission:list-tourguide']);
Route::get('TourGuide/add','Backend\TourGuideController@create')->middleware(['permission:add-tourguide']);
Route::post('TourGuide/add','Backend\TourGuideController@store')->middleware(['permission:add-tourguide']);

Route::get('TourGuide/add/account','Backend\TourGuideController@createAccount')->middleware(['permission:add-tourguide']);
//Route::post('TourGuide/add/account','Backend\TourGuideController@storeAccount')->middleware(['permission:add-tourguide']);
Route::post('TourGuide/add/account','Backend\TourGuideController@storeAccount')->middleware(['permission:add-tourguide']);

Route::get('TourGuide/showprofile/{id}','Backend\TourGuideController@showprofile')->middleware(['permission:show-tourguide']);
//Route::post('TourGuide/showprofile/{id}','Backend\TourGuideController@showprofile');

Route::get('TourGuide/show/{id}','Backend\TourGuideController@show_skill')->middleware(['permission:show-tourguide']);
Route::post('TourGuide/show/{id}','Backend\TourGuideController@store_skill')->middleware(['permission:show-tourguide']);

Route::get('TourGuide/edit/{id}','Backend\TourGuideController@edit')->middleware(['permission:edit-tourguide']);
Route::post('TourGuide/edit/{id}','Backend\TourGuideController@update')->middleware(['permission:edit-tourguide']);

Route::get('TourGuide/{id}','Backend\TourGuideController@destroy')->middleware(['permission:delete-tourguide']);

/** free tour guide**/
Route::get('check','Backend\FreeTourGuideController@check');
Route::post('check','Backend\FreeTourGuideController@check');

Route::get('check/tourguide','Backend\FreeTourGuideController@check');
Route::post('check/tourguide','Backend\FreeTourGuideController@check');

/**Comment**/
Route::get('comment','Backend\CommentController@showAllComment')->middleware(['permission:list-comment']);
Route::get('comment/list','Backend\CommentController@showAllComment')->middleware(['permission:list-comment']);
Route::get('comment/edit/{id}','Backend\CommentController@showEditAllCommentForm')->middleware(['permission:edit-comment']);
Route::post('comment/edit/{id}','Backend\CommentController@updateAllComment')->middleware(['permission:edit-comment']);
Route::get('comment/delete/{id}','Backend\CommentController@destroy')->middleware(['permission:delete-comment']);



Route::get('TourGuide/comment/{id}','Backend\CommentController@showComment')->middleware(['permission:edit-comment']);
Route::post('TourGuide/edit/comment/{id}','Backend\CommentController@updateComment')->middleware(['permission:edit-comment']);
Route::get('TourGuide/edit/comment/{id}','Backend\CommentController@showEditCommentForm')->middleware(['permission:edit-comment']);
Route::get('TourGuide/comment/delete/{id}','Backend\CommentController@destroy')->middleware(['permission:delete-comment']);
//Route::post('TourGuide/show/{id}','Backend\TourGuideController@store_skill');
/**Faqs**/

Route::get('faqs','Backend\FaqsController@showFaqs')->middleware(['permission:list-faqs']);
Route::get('faqs/add','Backend\FaqsController@showAddForm')->middleware(['permission:list-faqs']);
Route::post('faqs/add','Backend\FaqsController@store')->middleware(['permission:list-faqs']);
Route::get('faqs/edit/{id}','Backend\FaqsController@showEditFaqsForm')->middleware(['permission:list-faqs']);
Route::post('faqs/edit/{id}','Backend\FaqsController@updateFaqs')->middleware(['permission:list-faqs']);
Route::get('faqs/delete/{id}','Backend\FaqsController@destroy')->middleware(['permission:list-faqs']);
/**About us**/

Route::get('aboutus','Backend\AboutUsController@show')->name('aboutus')->middleware(['permission:list-aboutus']);
Route::get('aboutus/add','Backend\AboutUsController@showAddForm')->middleware(['permission:list-aboutus']);
Route::post('aboutus/add','Backend\AboutUsController@store')->middleware(['permission:list-aboutus']);
Route::get('aboutus/edit/{key}','Backend\AboutUsController@showEditForm')->middleware(['permission:list-aboutus']);
Route::post('aboutus/edit/{key}','Backend\AboutUsController@update')->middleware(['permission:list-aboutus']);
Route::get('aboutus/delete/{key}','Backend\AboutUsController@destroy')->middleware(['permission:list-aboutus']);

/***Contact us***/
Route::get('contact','Backend\ContactUsController@index')->middleware(['permission:list-contact']);
Route::get('contact/{id}','Backend\ContactUsController@show')->middleware(['permission:list-contact']);
/*Skill*/
//Route::get('TourGuide/show/{id}','Backend\SkillController@create');
// Route::pót('TourGuide/show/{id}','Backend\SkillController@create');
/**====Training course==**/
Route::get('trainingcourse', 'Backend\TrainingCourseController@index')->middleware(['permission:trainingcourse']);
Route::get('trainingcourse/add', 'Backend\TrainingCourseController@showAddForm')->middleware(['permission:add-trainingcourse']);
Route::post('trainingcourse/add', 'Backend\TrainingCourseController@add')->middleware(['permission:add-trainingcourse']);
Route::get('trainingcourse/edit/{id}', 'Backend\TrainingCourseController@showEditForm')->middleware(['permission:edit-trainingcourse']);
Route::post('trainingcourse/edit/{id}', 'Backend\TrainingCourseController@edit')->middleware(['permission:edit-trainingcourse']);
Route::get('trainingcourse/{id}', 'Backend\TrainingCourseController@destroy')->middleware(['permission:delete-trainingcourse']);

Route::get('tc/category', 'Backend\TrainingCourseController@category')->middleware(['permission:list-trainingcourse_category']);
Route::post('tc/category', 'Backend\TrainingCourseController@addCategory')->middleware(['permission:add-trainingcourse_category']);;
Route::get('tc/category/edit/{id}', 'Backend\TrainingCourseController@showEditCategoryForm')->middleware(['permission:list-trainingcourse_category']);
Route::post('tc/category/edit/{id}', 'Backend\TrainingCourseController@editCategory')->middleware(['permission:edit-trainingcourse_category']);;
Route::post('tc/category/delete/{id}', 'Backend\TrainingCourseController@deleteCategory')->middleware(['permission:delete-trainingcourse_category']);

/**====Job Seach==**/
Route::get('jobsearch', 'Backend\JobSearchController@index')->middleware(['permission:add-jobsearch']);
Route::get('jobsearch/add', 'Backend\JobSearchController@showAddForm')->middleware(['permission:add-jobsearch']);
Route::post('jobsearch/add', 'Backend\JobSearchController@add')->middleware(['permission:add-jobsearch']);
Route::get('jobsearch/edit/{id}', 'Backend\JobSearchController@showEditForm')->middleware(['permission:edit-jobsearch']);
Route::post('jobsearch/edit/{id}', 'Backend\JobSearchController@edit')->middleware(['permission:edit-jobsearch']);
Route::get('jobsearch/{id}', 'Backend\JobSearchController@destroy')->middleware(['permission:delete-jobsearch']);

/* jobsearch Category */
Route::get('js/category', 'Backend\JobSearchController@category')->middleware(['permission:list-jobsearch_category']);
Route::post('js/category', 'Backend\JobSearchController@addCategory')->middleware(['permission:add-jobsearch_category']);;
Route::get('js/category/edit/{id}', 'Backend\JobSearchController@showEditCategoryForm')->middleware(['permission:list-jobsearch_category']);
Route::post('js/category/edit/{id}', 'Backend\JobSearchController@editCategory')->middleware(['permission:edit-jobsearch_category']);;
Route::post('js/category/delete/{id}', 'Backend\JobSearchController@deleteCategory')->middleware(['permission:delete-jobsearch_category']);

/* Dự án */

/**
 * Created by PhpStorm.
 * User: seekill
 *
 * Cấu hình Routes dành riêng cho backend
 */

/* Trang chủ */
// Route::get('/test', 'Backend\BackendController@test');
// Route::get('/', 'Backend\BackendController@dashboard');
// Route::get('dashboard', 'Backend\BackendController@dashboard');
// Route::get('landingpage/home', 'Backend\LandingPageController@showHome')->middleware(['permission:edit-home']);
// Route::post('landingpage/home', 'Backend\LandingPageController@home')->middleware(['permission:edit-home']);

// /* Dự án */
// Route::get('project', 'Backend\ProjectController@index')->middleware(['permission:list-project']);
// Route::get('project/add', 'Backend\ProjectController@showAddForm')->middleware(['permission:add-project']);
// Route::post('project/add', 'Backend\ProjectController@add')->middleware(['permission:add-project']);
// Route::get('project/edit/{id}', 'Backend\ProjectController@showEditForm')->middleware(['permission:edit-project']);
// Route::post('project/edit/{id}', 'Backend\ProjectController@edit')->middleware(['permission:edit-project']);

// Route::get('project/category', 'Backend\ProjectController@category')->middleware(['permission:list-project_category']);
// Route::post('project/category', 'Backend\ProjectController@addCategory')->middleware(['permission:add-project_category']);;
// Route::get('project/category/edit/{id}', 'Backend\ProjectController@showEditCategoryForm')->middleware(['permission:list-project_category']);
// Route::post('project/category/edit/{id}', 'Backend\ProjectController@editCategory')->middleware(['permission:edit-project_category']);;
// Route::post('project/category/delete/{id}', 'Backend\ProjectController@deleteCategory')->middleware(['permission:delete-project_category']);

/* Tin tức */
Route::get('news', 'Backend\NewsController@index')->middleware(['permission:list-news']);
Route::get('news/add', 'Backend\NewsController@showAddForm')->middleware(['permission:add-news']);
Route::post('news/add', 'Backend\NewsController@add')->middleware(['permission:add-news']);
Route::get('news/edit/{id}', 'Backend\NewsController@showEditForm')->middleware(['permission:edit-news']);
Route::post('news/edit/{id}', 'Backend\NewsController@edit')->middleware(['permission:edit-news']);

Route::get('news/category', 'Backend\NewsController@category')->middleware(['permission:list-news_category']);
Route::post('news/category', 'Backend\NewsController@addCategory')->middleware(['permission:add-news_category']);;
Route::get('news/category/edit/{id}', 'Backend\NewsController@showEditCategoryForm')->middleware(['permission:list-news_category']);
Route::post('news/category/edit/{id}', 'Backend\NewsController@editCategory')->middleware(['permission:edit-news_category']);;
Route::post('news/category/delete/{id}', 'Backend\NewsController@deleteCategory')->middleware(['permission:delete-news_category']);


/**
 * Role
 */
Route::get('role', 'Backend\RoleController@index')->middleware(['permission:list-role']);
Route::get('role/add', 'Backend\RoleController@showAddForm')->middleware(['permission:add-role']);
Route::post('role/add', 'Backend\RoleController@add')->middleware(['permission:add-role']);
Route::get('role/edit/{id}', 'Backend\RoleController@showEditForm')->middleware(['permission:edit-role']);
Route::post('role/edit/{id}', 'Backend\RoleController@edit')->middleware(['permission:edit-role']);
//Route::post('role/delete/{id}', 'Backend\RoleController@delete')->middleware(['permission:delete-role']);

/**
 * user
 */
Route::get('user', 'Backend\UserController@index')->middleware(['permission:list-user']);
Route::get('user/add', 'Backend\UserController@showAddForm')->middleware(['permission:add-user']);
Route::post('user/add', 'Backend\UserController@add')->middleware(['permission:add-user']);
Route::get('user/edit/{id}', 'Backend\UserController@showEditForm')->middleware(['permission:edit-user']);
Route::post('user/edit/{id}', 'Backend\UserController@edit')->middleware(['permission:edit-user']);

Route::get('user/changePassword', 'Backend\UserController@showChangePassword');//->middleware(['permission:edit-user']);
Route::post('user/changePassword', 'Backend\UserController@changePassword');//->middleware(['permission:edit-user']);

Route::get('user/updateprofile', 'Backend\UserController@showUpdateProfile');//->middleware(['permission:edit-user']);
Route::post('user/updateprofile', 'Backend\UserController@updateprofile');//->middleware(['permission:edit-user']);



/**
 * Auth // Password Reset Routes...
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/**
 * Permission
 */
Route::get('permission', 'Backend\PermissionController@index')->middleware(['permission:list-permission']);

/**
 * Menu
 */
Route::get('menu', 'Backend\MenuController@index')->middleware(['permission:list-menu']);
Route::get('menu/add', 'Backend\MenuController@showAddForm')->middleware(['permission:add-menu']);
Route::post('menu/add', 'Backend\MenuController@add')->middleware(['permission:add-menu']);
Route::get('menu/edit/{id}', 'Backend\MenuController@showEditForm')->middleware(['permission:edit-menu']);
Route::post('menu/edit/{id}', 'Backend\MenuController@edit')->middleware(['permission:edit-menu']);

/* Sự kiện */
Route::get('event', 'Backend\EventController@index')->middleware(['permission:list-event']);
Route::get('event/add', 'Backend\EventController@showAddForm')->middleware(['permission:add-event']);
Route::post('event/add', 'Backend\EventController@add')->middleware(['permission:add-event']);
Route::get('event/edit/{id}', 'Backend\EventController@showEditForm')->middleware(['permission:edit-event']);
Route::post('event/edit/{id}', 'Backend\EventController@edit')->middleware(['permission:edit-event']);

/* Blog */
Route::get('blog', 'Backend\BlogController@index')->middleware(['permission:list-blog']);
Route::get('blog/add', 'Backend\BlogController@showAddForm')->middleware(['permission:add-blog']);
Route::post('blog/add', 'Backend\BlogController@add')->middleware(['permission:add-blog']);
Route::get('blog/edit/{id}', 'Backend\BlogController@showEditForm')->middleware(['permission:edit-blog']);
Route::post('blog/edit/{id}', 'Backend\BlogController@edit')->middleware(['permission:edit-blog']);

/* Trang đơn */
Route::get('page', 'Backend\PageController@index')->middleware(['permission:list-page']);
Route::get('page/add', 'Backend\PageController@showAddForm')->middleware(['permission:add-page']);
Route::post('page/add', 'Backend\PageController@add')->middleware(['permission:add-page']);
Route::get('page/edit/{id}', 'Backend\PageController@showEditForm')->middleware(['permission:edit-page']);
Route::post('page/edit/{id}', 'Backend\PageController@edit')->middleware(['permission:edit-page']);

/**
 * Subscriber
 */
Route::get('subscriber', 'Backend\SubscriberController@index')->middleware(['permission:list-subscriber']);

/**
 * Option
 */
Route::get('option/edit', 'Backend\OptionController@showEditForm')->middleware(['permission:edit-option']);
Route::post('option/edit', 'Backend\OptionController@edit')->middleware(['permission:edit-option']);