<?php

/*
|--------------------------------------------------------------------------
| 首页路由
|--------------------------------------------------------------------------
|
| 根目录返回一个随机的首页
|
*/
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'IndexController@index');


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
Route::get('article', function(){
  return '所有文章';
});
// Route::get('{category}', function($category){
//   return '你正在访问' . $category . "目录";
// });

/*
|--------------------------------------------------------------------------
| 后端路由
|--------------------------------------------------------------------------
|
| 前段路由默认按照时间顺序列出所有文章
| 1. 可以使用category对目录进行筛选
|     有个问题：category是后台筛选的
|
*/
// Route::get('login', function(){
//   return view('login.html');
// });
Route::prefix('admin')->group(function(){
  Route::get('article', 'AdminArticleController@index');
  Route::get('category', 'AdminCategoryController@index');
});

// 错误路由
Route::get('404', function(){
  return view('404');
});

// auth自动生成的路由
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
