<?php

/*
|--------------------------------------------------------------------------
| 前端路由
|--------------------------------------------------------------------------
|
| 前段路由默认按照时间顺序列出所有文章
| 1. 可以使用category对目录进行筛选
|     有个问题：category是后台筛选的
|
*/
// Route::get('article', function(){
//   return '所有文章';
// });
Route::get('/', 'IndexController@index');
Route::get('category/{category}', 'IndexController@category');
Route::get('article/{id}', 'IndexController@article');

/*
|--------------------------------------------------------------------------
| 后端路由
|--------------------------------------------------------------------------
|
| 前段路由默认按照时间顺序列出所有文章
| 1. 可以使用category对目录进行筛选
|     有个问题：category是后台筛选的
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // 这部分需要经过验证
    Route::get('/', 'Admin\WelcomeController@index');
    Route::group(['prefix' => 'article'], function(){
        Route::get('/', 'Admin\ArticleController@index');
        Route::get('new', 'Admin\ArticleController@create');
        Route::post('new', 'Admin\ArticleController@new_article');
        Route::post('del', 'Admin\ArticleController@del_article');
        Route::post('update', 'Admin\ArticleController@update_article');
    });
    Route::group(['prefix' => 'category'], function(){
        Route::get('/', 'Admin\CategoryController@index');
        Route::post('new', 'Admin\CategoryController@new_category');
        Route::post('del', 'Admin\CategoryController@del_category');
        Route::get('get', 'Admin\CategoryController@get_item');
        Route::post('update', 'Admin\CategoryController@update_category');
    });
    Route::get('logout', 'Auth\LoginController@logout');
});

// 错误路由
Route::get('404', function(){
  return view('404');
});

// auth自动生成的路由
//Auth::routes();
Route::group( [] ,function () {
    // 登入登出路由
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    //$this->post('logout', 'Auth\LoginController@logout')->name('logout');
    // 注册路由...
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');
    // 密码重置路由...
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');
});
// Route::get('/home', 'HomeController@index')->name('home');
