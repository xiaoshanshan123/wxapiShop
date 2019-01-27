<?php
namespace app\api\controller\v1;

use app\api\validate\TokenGet;
use app\api\service\UserToken;
class Token 
{

	public function getToken($code = '')
	{
		(new TokenGet())->goCheck();
		$usertoken = new UserToken($code);
		$token = $usertoken->get();
		return $token;

	}


}