<?php
namespace app\api\service;

use app\lib\exception\WeChatException;
use think\Exception;

class UserToken
{
	protected $code;
	protected $wxAppID;
	protected $wxAppSecret;
	protected $wxLoginUrl;

	function  __construct($code)
	{
		$this->code = $code;
		$this->wxAppID = config('wx.app_id');
		$this->wxAppSecret =  config('wx.secret');
		$this->wxLoginUrl =  sprintf(config('wx.login_url'),$this->code,$this->wxAppID,$this->wxAppSecret);
	}

	public function get()
		{
			$res = curl_get($this->wxLoginUrl);
			$wxRes = json_encode($res,true);
			if(empty($wxRes)){
				throw new Exception('获取openid异常,微信内部错误');
			}else{
				/*throw new WeChatException([
					$this->msg = '';
				]);*/
				$loginFail = array_key_exists('errcode',$wxRes);
				if($loginFail)
				{
					throw new WeChatException([
						'msg'=>$res['errmsg'],
						'errorCode'=> $res['errcode']
					]);
				}else{
					//获得令牌
					return $this->grantToken($wxRes);
				}
			}

		}

	/*
	 * 获得令牌
	 * */

	private function  grantToken($wxRes){

		$openid = $wxRes['openid'];
	}
}