<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28
 * Time: 15:11
 */

namespace app\lib\exception;


use think\Exception;

class TokenException extends BaseException
{

    public $code = '401';
    public $msg = 'Token无效或过期';
    public $errorCode = 10001;
}