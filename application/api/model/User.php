<?php

namespace app\api\model;

use think\Model;

class User extends BaseModel
{

	protected $hidden = [];

	protected $autoWriteTimestamp = true;
    //一对一的关系 
	
		public static function  getByOpenId($openid){

			return self::where('openid','=',$openid)->find();
		}


}
