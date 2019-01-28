<?php
namespace app\api\service;

use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;
use app\api\model\User as UserModel;

class UserToken extends Token
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
		$this->wxLoginUrl =  sprintf(config('wx.login_url'),$this->wxAppID,$this->wxAppSecret,$this->code);

	}

	public function get()
		{
			$res = curl_get($this->wxLoginUrl);

			$wxRes = json_decode($res,true);//var_dump($wxRes);

			if(empty($wxRes)){
				throw new Exception('获取openid异常,微信内部错误');
			}else{
				$loginFail = array_key_exists('errcode',$wxRes);//var_dump($loginFail);
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
		/*
		 * 1.判断此openid是否存在。
		 * 不存在就写入，都返回一个uid
		 * 生成令牌，准备缓存，写入缓存
		 * 把令牌个返回客户端
		 * value,wxRes,uid,scope
		 * */
		$openid = $wxRes['openid'];
		$user = UserModel::getByOpenId($openid);
		if($user){
			$uid = $user->id;
		}else{
			//不存在的情况
			$uid = $this->newUser($openid);
		}
		$cacheData = $this->prepareCacheValue($wxRes,$uid);
		//print_r($cacheData);
		$data = $this->saveToCache($cacheData);
		return $data;
	}

	//获得令牌
	private function saveToCache($cacheData){
		$key = $this ->generateToken();
		$value = $cacheData;
		$CacheTime = config('setting.cache_time');
		$request = cache($key,$value,$CacheTime);
		if(!$request){
			throw new TokenException([
				'msg' => '服务器缓存异常',
				'errorCode' => 10005
			]);
		}else{
			return 'true';
		}
	}

	/*
	 * 准备缓存数据
	 * */
	private function prepareCacheValue($wxRes,$uid){

		$cacheValue = $wxRes;
		$cacheValue['uid'] =$uid;
		$cacheValue['scope'] = 16;
		return $cacheValue;

	}

	/*
	 * 新用户
	 * */
	private function newUser($openid){

		$user =UserModel::create([
			'openid'=>$openid
		]);
		return $user->id;
	}
}
























