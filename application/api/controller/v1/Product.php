<?php
namespace app\api\controller\v1;
use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\lib\exception\BannerMissException;
use think\Exception;

class Product{

	public function getRecent($count = 5){

		(new Count())->goCheck();

		//return json_encode($data);
			$data = ProductModel::getMorePro($count);

		if(!$data){
			throw new BannerMissException();
		}

		return json_encode($data);

	}
}
