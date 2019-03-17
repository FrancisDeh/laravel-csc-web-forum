<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('landingpage');


// user routes
Route::resource('user', 'UserController');

// chatroom routes
Route::get('profile/{id}', 'UserController@getProfilePage')->name('profile');
Route::get('profile/edit/user', 'UserController@editProfile')->name('editprofile');
Route::post('personalprofile/update/{id}', 'UserController@updatePersonalInfo')->name('updatepersonalinfo');
Route::post('authprofile/update/{id}', 'UserController@updateAuthInfo')->name('updateauthinfo');
Route::post('pictureprofile/update/{id}', 'UserController@updateProfilePictureInfo')->name('updateprofilepictureinfo');

Route::resource('post', 'PostController');
/*Route to find post id using only reply id*/
Route::get('post/showid/{id}', 'PostController@getPostId')->name('getpostid');

//get posts by categories
Route::get('get-posts/{description}', 'PagesController@getCategorizedPosts')->name('get-posts');
Route::get('posts', 'PagesController@getPosts')->name('posts');
Route::get('repository', 'PagesController@getRepository')->name('repository');

// Route::get('repository', 'PagesController@uploadIntoRepository')->name('uploadintorepository');
Route::resource('file', 'RepositoryController');


//comments routes
Route::resource('comments', 'CommentController');
Route::post('comment/create/{post}', 'CommentController@addPostComment')->name('postcomment.store');

Route::post('reply/create/{comment}', 'CommentController@addCommentReply')->name('commentreply.store');

//Like routes
/*Post like*/
Route::post('post/like', 'LikeController@togglePostLike')->name('postlike');

/*Comment Like*/
Route::post('comment/like', 'LikeController@toggleCommentLike')->name('commentlike');


//get courses
Route::get('get-course-materials/{programme_id}/{level}', 'RepositoryController@getCourseMaterials')->name('getcoursematerials');
//getting images
Route::get('user/image/{filename}', 'ImageController@getUserImage')->name('userimage');
Route::get('developer/image/{filename}', 'ImageController@getDevImage')->name('devimage');
Route::get('repository/filedownload/{filename}', 'ImageController@getDownload')->name('filedownload');
Route::get('repository/fileread/{filename}', 'ImageController@getRead')->name('fileread');

// events route
//event route
Route::resource('event', 'EventsController');
Route::get('event/image/{filename}', 'ImageController@getEventImage')->name('eventimage');



//**************************************************************************//


//route for user registration and login
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Route to display all users page
Route::get('all-users', 'AllUsersController@getAllUsersPage')->name('alluserspage');
Route::get('get-users-by-programme/{name}/{id}', 'AllUsersController@getUsersByProgramme')->name('get-users-by-programme');
Route::get('get-users-by-gender/{gender}', 'AllUsersController@getUsersByGender')->name('get-users-by-gender');
Route::get('get-users-by-level/{level}', 'AllUsersController@getUsersByLevel')->name('get-users-by-level');
Route::get('get-users-by-language/{name}/{id}', 'AllUsersController@getUsersByLanguage')->name('get-users-by-language');

//searhing users
Route::get('searchuser', 'AllUsersController@searchUser')->name('searchuser');
/*Route to display search results after autocomplete match*/
	Route::post('searchuserrequest', 'AllUsersController@searchUserHits')->name('searchuserrequest');


//searhing posts
Route::get('searchpost', 'PostController@searchPost')->name('searchpost');
/*Route to display search results after autocomplete match*/
Route::post('searchpostrequest', 'PostController@searchPostHits')->name('searchpostrequest');

//online/offline status routes
Route::get('sendonline', 'OnlineStatusController@sendOnline')->name('sendonline');
Route::get('sendoffline', 'OnlineStatusController@sendOffline')->name('sendoffline');

//Admin Routes

Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin/manage-administators', 'AdminController@adminIndex')->name('admins.index');
Route::post('admin/create', 'AdminController@createAdmin')->name('admins.store');
Route::put('admin/update/{admin}', 'AdminController@updateAdmin')->name('admins.update');
Route::delete('admin/destroy/{admin}', 'AdminController@destroyAdmin')->name('admins.destroy');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin');
Route::post('admin', 'Admin\LoginController@login');
Route::post('admin-logout', 'Admin\LoginController@logout')->name('admin.logout');
Route::post('admin/pasword/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

//AdminController Routes


//Route to display all users in admin page
Route::get('admin-display-platform-users', 'AdminController@getPlatformUsers')->name('platform.users');
Route::resource('languages', 'ProgrammingLanguageController');

Route::get('platform-users-by-programme/{name}/{id}', 'AdminController@getPlatformUsersByProgramme')->name('platform-users-by-programme');
Route::get('platform-users-by-gender/{gender}', 'AdminController@getPlatformUsersByGender')->name('platform-users-by-gender');
Route::get('platform-users-by-level/{level}', 'AdminController@getPlatformUsersByLevel')->name('platform-users-by-level');
Route::get('platform-users-by-language/{name}/{id}', 'AdminController@getPlatformUsersByLanguage')->name('platform-users-by-language');

Route::get('plartformuserprofile/{id}', 'AdminController@getPlatformUserProfilePage')->name('plartformuserprofile');


//courses, course codes, course names, programmes and semester routes
Route::resource('courses', 'CourseController');
Route::resource('coursecodes', 'CoursecodeController');
Route::resource('coursenames', 'CoursenameController');
Route::resource('programmes', 'ProgrammeController');
Route::resource('semesters', 'SemesterController');
Route::resource('developers', 'DevelopersProfileController');

//error redirect 
Route::get('errorredirect', function() {
    return redirect()->route('login');
})->name('errorredirect');

//Admin-- Posts by users
Route::get('admin/posts/all', 'AdminPostsController@index')->name('adminposts.index');
Route::get('admin/posts/{description}', 'AdminPostsController@getCategorizedPosts')->name('adminposts.get');
Route::get('admin/post/{id}', 'AdminPostsController@getSinglePost')->name('adminposts.single');

//approve and disapprove posts
Route::get('admin/post/approve/{id}', 'AdminPostsController@approvePost')->name('adminposts.approve');
Route::get('admin/post/disapprove/{id}', 'AdminPostsController@disApprovePost')->name('adminposts.disapprove');

Route::get('admin/post/pending/all', 'AdminPostsController@getPendingPosts')->name('adminposts.pending');

//comments approval
Route::get('admin/comment/approve/{id}', 'AdminPostsController@approveComment')->name('admincomments.approve');
Route::get('admin/comment/disapprove/{id}', 'AdminPostsController@disApproveComment')->name('admincomments.disapprove');

//searhing users on admin page
Route::get('searchplatformuser', 'AdminPostsController@searchUser')->name('searchplatformuser');
/*Route to display search results after autocomplete match*/
Route::post('searchplatformuserrequest', 'AdminPostsController@searchUserHits')->name('searchplatformuserrequest');


//searhing posts
Route::get('searchplatformpost', 'AdminPostsController@searchPost')->name('searchplatformpost');
/*Route to display search results after autocomplete match*/
Route::post('searchplatformpostrequest', 'AdminPostsController@searchPostHits')->name('searchplatformpostrequest');

//searching course codes
Route::get('searchcoursecode', 'AdminPostsController@searchCourseCode')->name('searchcoursecode');

Route::get('searchcoursecoderequest', 'AdminPostsController@searchCourseCodeHits')->name('searchcoursecoderequest');

//searching course names
Route::get('searchcoursename', 'AdminPostsController@searchCourseName')->name('searchcoursename');

Route::get('searchcoursenamerequest','AdminPostsController@searchCourseNameHits')->name('searchcoursenamerequest');

