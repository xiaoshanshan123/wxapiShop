<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

	//版本换成动态
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');
//Route::get('api/:version/theme','api/:version.Theme/getThemeList');
Route::get('api/:version/theme/:id','api/:version.Theme/getComplex');


Route::get('api/:version/Product/recent','api/:version.Product/getRecent');

//查询全部分类
Route::get('api/:version/Category/all','api/:version.Category/getCategorys');

//查询分类下的商品
Route::get('api/:version/Product/byCateId','api/:version.Product/getAllInCategory');
//获取TOken
Route::get('api/:version/Token/user','api/:version.Token/getToken');
	
Route::get('index','api/Index/index');