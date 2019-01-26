<?php

namespace app\api\model;

use think\Model;

class Product extends BaseModel
{
    //
    public $hidden = ['delete_time','from','create_time','update_time','category_id','pivot'];

    //获取器
	//main_img_url
	public function getMainImgUrlAttr($value,$data){
		return	$this->preImgUrl($value, $data);
	}


	public static function getMorePro($count){	

		return  self::limit($count)->order('create_time desc')->select();
	}
}
