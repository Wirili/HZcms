<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('phpinfo',function(Request $request){
    dd(phpinfo());
});
Route::get('/',['uses'=>'Home\IndexController@index','as'=>'index']);
Route::post('login', 'Home\LoginController@login');
Route::get('login', 'Home\LoginController@showLoginForm')->name('login');
Route::get('logout', 'Home\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Home\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Home\RegisterController@register');

Route::get('message/{act}', 'Home\MessageController@message')->name('message');


Route::get('index',['uses'=>'Home\IndexController@index','as'=>'index']);
Route::get('pass_fail', 'Home\IndexController@pass_fail')->name('pass_fail');
Route::get('lock_fail', 'Home\IndexController@lock_fail')->name('lock_fail');

Route::get('new_list', 'Home\NewController@list')->name('new_list');
Route::get('new_show/{id}', 'Home\NewController@show')->name('new_show');

Route::get('farm','Home\FarmController@farm')->name('farm');
Route::get('farm_detail','Home\FarmController@farm_detail')->name('farm_detail');
Route::get('farm_shop','Home\FarmController@farm_shop')->name('farm_shop');
Route::post('cart_quick','Home\FarmController@cart_quick')->name('cart_quick');

Route::get('child_list','Home\UserController@child_list')->name('child_list');
Route::any('act_user','Home\UserController@act_user')->name('act_user');
Route::post('get_user','Home\UserController@get_user')->name('get_user');
Route::get('act_user_log','Home\UserController@act_user_log')->name('act_user_log');
Route::any('user_child','Home\UserController@user_child')->name('user_child');
Route::get('point2_log_in','Home\UserController@point2_log_in')->name('point2_log_in');
Route::get('point2_log_out','Home\UserController@point2_log_out')->name('point2_log_out');
Route::get('log_login','Home\UserController@log_login')->name('log_login');
Route::any('user_info','Home\UserController@user_info')->name('user_info');
Route::any('point2_transfer','Home\UserController@point2_transfer')->name('point2_transfer');
Route::any('point1_transfer','Home\UserController@point1_transfer')->name('point1_transfer');

Route::get('point2_sell_list','Home\Point2Controller@sell_list')->name('point2_sell_list');
Route::get('point2_buy_log','Home\Point2Controller@buy_log')->name('point2_buy_log');
Route::get('point2_sell_log','Home\Point2Controller@sell_log')->name('point2_sell_log');
Route::post('point2_buy','Home\Point2Controller@buy')->name('point2_buy');
Route::post('point2_buy_quit','Home\Point2Controller@buy_quit')->name('point2_buy_quit');
Route::post('point2_sell_quit','Home\Point2Controller@sell_quit')->name('point2_sell_quit');
Route::post('point2_sell','Home\Point2Controller@sell')->name('point2_sell');


Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('welcome', ['uses'=>'Admin\IndexController@welcome','as'=>'welcome']);
    Route::get('/', ['uses'=>'Admin\IndexController@index','as'=>'/']);
    Route::get('index', ['uses'=>'Admin\IndexController@index','as'=>'index']);
    Route::get('login', ['uses'=>'Admin\LoginController@showLogin','as'=>'login']);
    Route::post('login', ['uses'=>'Admin\LoginController@login','as'=>'postLogin']);
    Route::get('logout', ['uses'=>'Admin\LoginController@logout','as'=>'logout']);

    Route::get('config/edit', ['uses'=>'Admin\ConfigController@edit','as'=>'config.edit']);
    Route::post('config/save', ['uses'=>'Admin\ConfigController@save','as'=>'config.save']);


    Route::get('good/index', ['uses'=>'Admin\GoodController@index','as'=>'good.index']);
    Route::get('good/edit/{id}', ['uses'=>'Admin\GoodController@edit','as'=>'good.edit']);
    Route::get('good/create', ['uses'=>'Admin\GoodController@create','as'=>'good.create']);
    Route::post('good/save', ['uses'=>'Admin\GoodController@save','as'=>'good.save']);
    Route::post('good/ajax', ['uses'=>'Admin\GoodController@ajax','as'=>'good.ajax']);

    //宠物管理路由
    Route::get('farm/index', ['uses'=>'Admin\FarmController@index','as'=>'farm.index']);
    Route::get('farm/edit/{id}', ['uses'=>'Admin\FarmController@edit','as'=>'farm.edit']);
    Route::get('farm/create', ['uses'=>'Admin\FarmController@create','as'=>'farm.create']);
    Route::get('farm/del/{id}', ['uses'=>'Admin\FarmController@del','as'=>'farm.del']);
    Route::post('farm/save', ['uses'=>'Admin\FarmController@save','as'=>'farm.save']);
    Route::post('farm/ajax', ['uses'=>'Admin\FarmController@ajax','as'=>'farm.ajax']);

    //文章管理路由
    Route::get('article/index', ['uses'=>'Admin\ArticleController@index','as'=>'article.index']);
    Route::get('article/edit/{id}', ['uses'=>'Admin\ArticleController@edit','as'=>'article.edit']);
    Route::get('article/create', ['uses'=>'Admin\ArticleController@create','as'=>'article.create']);
    Route::get('article/del/{id}', ['uses'=>'Admin\ArticleController@del','as'=>'article.del']);
    Route::post('article/save', ['uses'=>'Admin\ArticleController@save','as'=>'article.save']);
    Route::post('article/ajax', ['uses'=>'Admin\ArticleController@ajax','as'=>'article.ajax']);

    //文章类别路由
    Route::get('article_cat/index', ['uses'=>'Admin\ArticleCatController@index','as'=>'article_cat.index']);
    Route::get('article_cat/edit/{id}', ['uses'=>'Admin\ArticleCatController@edit','as'=>'article_cat.edit']);
    Route::get('article_cat/create', ['uses'=>'Admin\ArticleCatController@create','as'=>'article_cat.create']);
    Route::get('article_cat/del/{id}', ['uses'=>'Admin\ArticleCatController@del','as'=>'article_cat.del']);
    Route::post('article_cat/save', ['uses'=>'Admin\ArticleCatController@save','as'=>'article_cat.save']);
    Route::post('article_cat/ajax', ['uses'=>'Admin\ArticleCatController@ajax','as'=>'article_cat.ajax']);

    //文章管理路由
    Route::get('user/index', ['uses'=>'Admin\UserController@index','as'=>'user.index']);
    Route::get('user/edit/{id}', ['uses'=>'Admin\UserController@edit','as'=>'user.edit']);
    Route::get('user/create', ['uses'=>'Admin\UserController@create','as'=>'user.create']);
    Route::get('user/del/{id}', ['uses'=>'Admin\UserController@del','as'=>'user.del']);
    Route::post('user/save', ['uses'=>'Admin\UserController@save','as'=>'user.save']);
    Route::post('user/ajax', ['uses'=>'Admin\UserController@ajax','as'=>'user.ajax']);

    //权限控制路由
    Route::get('role/index',['uses'=>'Admin\RoleController@index','as'=>'role.index']);
    Route::get('role/edit/{id}',['uses'=>'Admin\RoleController@edit','as'=>'role.edit']);
    Route::get('role/create',['uses'=>'Admin\RoleController@create','as'=>'role.create']);
    Route::post('role/save',['uses'=>'Admin\RoleController@save','as'=>'role.save']);
    Route::post('role/ajax', ['uses'=>'Admin\RoleController@ajax','as'=>'role.ajax']);
    Route::get('role/del/{id}', ['uses'=>'Admin\RoleController@del','as'=>'role.del']);

    //管理员路由
    Route::get('admin/index', ['uses'=>'Admin\AdminController@index','as'=>'admin.index']);
    Route::get('admin/edit/{id}',['uses'=>'Admin\AdminController@edit','as'=>'admin.edit']);
    Route::get('admin/create',['uses'=>'Admin\AdminController@create','as'=>'admin.create']);
    Route::post('admin/save',['uses'=>'Admin\AdminController@save','as'=>'admin.save']);
    Route::post('admin/ajax', ['uses'=>'Admin\AdminController@ajax','as'=>'admin.ajax']);

});
