<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/27
 * Time: 13:05
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = '404';
    public $msg = '微信参数错误';
    public $errorCode = 30000;

}