<?php
namespace app\api\validate;

class TokenGet extends BaseValidate
{

	protected $rule =[
		'code' =>'require|isEnpty',
	];

	protected $msg = [
		'code.require' =>'code必须填写',
		'code.isEnpty' =>'code的值不能为空'
	];


}