<?php
namespace app\api\model;
use think\Model;
class BaseModel extends Model{

	public function getUrlAttr($value,$data){

		return	$this->preImgUrl($value,$data);

    }

       public function preImgUrl($value,$data){
		$fiImg = $value;
    	if($data['from'] == 1){
    		return config('setting.img_pre').$value;
    	}else{
    	    return $fiImg;
      }

    }
}