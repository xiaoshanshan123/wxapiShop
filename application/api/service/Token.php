<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28
 * Time: 13:32
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token
{
    public static function  generateToken(){

        //生成令牌 三次后在md5
        $randChar = getRandChar(32);

        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //加盐
        $salt = config('salt_token.token');

        return md5($randChar.$timestamp.$salt);

    }

    public static function getCTokenVar($key){
        //获取token的方法，在header中获得
        $token = Request::instance()->header('token');
        $values = Cache::get($token);
        if(!$values){
            throw new TokenException();
        }else{
            if(!is_array($values)){
                $val = json_decode($values,true);
            }
            if(array_key_exists($key,$val)){
                return $val[$key];
            }else{
                new Exception('尝试错误');
            }
        }
    }

    /*
     * 获取当前的uid
     * */
    public static function getCUid(){

        return self::getCTokenVar('uid');
    }
}