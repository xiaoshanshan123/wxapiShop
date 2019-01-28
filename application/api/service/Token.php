<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28
 * Time: 13:32
 */

namespace app\api\service;


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
}