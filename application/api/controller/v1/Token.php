<?php
namespace app\api\controller\v1;

use api\validate\TokenGet;
class Token 
{

	public function getToken($code = '')
	{

		(new TokenGet())->goCheck();
		$usertoken = new \api\service\UserToken();

		return $usertoken->get();

	}

}