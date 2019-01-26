<?php
namespace app\api\model;
use think\Model;
	
class Category extends Model{

	public function img(){

		return 	$this->belongsto('Image','topic_img_id','id');
	}

	protected $hidden= ['delete_time','update_time',''];

}