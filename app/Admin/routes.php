<?php

use App\Admin\Controllers\StudentController;
use App\Admin\Controllers\TeacherController;
use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
});

// 去掉了 命名空间 直接指定 class 更方便
Route::group([
    'prefix'        => config('admin.route.prefix'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->resource('teachers', TeacherController::class);
    $router->resource('students', StudentController::class);
});
