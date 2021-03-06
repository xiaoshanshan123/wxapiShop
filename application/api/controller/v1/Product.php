<?php
namespace app\api\controller\v1;
use app\api\validate\Count;
use app\api\validate\IDZzs;
use app\api\model\Product as ProductModel;
use app\lib\exception\BannerMissException;
use think\Exception;

class Product{

	public function getRecent($count = 5){

		(new Count())->goCheck();

		//return json_encode($data);
			$data = ProductModel::getMorePro($count);

		if(!$data){
			throw new Exception();
		}
		$product = collection($data);

		$data  = $product->hidden(['summary']);

		return json_encode($data);

	}

	//通过分类查询分类下的商品
	public function getAllInCategory($id){

		(new IDZzs())->goCheck();

		$data = ProductModel::getAllbyCateId($id);

		if(!$data){
			throw new Exception();
		}else{
			return json($data);
		}


	}

	//通过商品id查询商品的详情

	public function getOne($id){

		(new IDZzs())->goCheck();

		return self::with([
			'imgs'=>function($query){
				$query->with(['imgUrl'])
					->order('order','asc');
			}

		])
		->with(['prope'])->find($id);

	}


}
