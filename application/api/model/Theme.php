<?php

namespace app\api\model;

use think\Model;

class Theme extends BaseModel
{

	protected $hidden = ['delete_time','topic_img_id','delete_time','update_time','head_img_id'];
    //一对一的关系 
	public function topicImg(){

		return $this->belongsTo('Image','topic_img_id','id');

	}    
	public function headImg(){

		return $this->belongsTo('Image','head_img_id','id');
	}

	public function products(){	

		return $this->belongsToMany('Product','theme_product','product_id','theme_id');
	}

	public static function getDatabyId($id){

	return 	self::with('products,topicImg,headImg')->find($id);
	}


}
