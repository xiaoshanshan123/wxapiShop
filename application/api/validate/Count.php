<?php
namespace app\api\validate;

class Count extends BaseValidate{


	protected $rule = [
		'count' => 'ZzsInt|between:1,10'
	];

	protected $message = [
		'count.ZzsInt' => '传入显示商品数量不为正整数或数量大于10',
		'count.between' => '数量在1-15之间'
	];

}