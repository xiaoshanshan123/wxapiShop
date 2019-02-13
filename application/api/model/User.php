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
		//在没有定义外键一方，定义一对一关联使用hasOne。
		public function address(){

			return $this->hasOne('UserAddress','user_id','id');
		}


}
