<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home/{id?}', 'HomeController@index')->name('home.index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);

    Route::get('user/setup/{id}', 'Admin\UsersController@setup_file')->name('users.setup');
    Route::post('user/insertGraph', 'Admin\UsersController@totalInsertGraph')->name('users.totalInsertGraph');

    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

//    file upload controller
    Route::get('file_upload', 'FileUploadController@index')->name('file.index');
   // Route::get('players', 'FileUploadController@selectPlayers');
    Route::any('players', 'FileUploadController@selectPlayers')->name('players');
    Route::any('trands', 'FileUploadController@trands')->name('trands');



    Route::post('upload', 'FileUploadController@import')->name('file.upload');
    Route::post('deletefile', 'FileUploadController@delete')->name('file.delete');




});


// for chart
Route::get('bar-chart', 'ChartController@index')->name('bar-chart.index');
