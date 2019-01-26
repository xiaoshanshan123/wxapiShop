<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/4/17
 * Time: 2:05
 */

namespace app\api\controller\v1;
use app\api\validate;
use app\api\model\Category as CategoryModel;
use think\Exception;
use think\Controller;

class Category extends Controller{

	//查询所有的分类
	public function getCategorys(){

		$data = CategoryModel::all([],'img');

		if(!$data){
			throw new CategoryException();
		}else{
			return json($data);
		}


	}
}