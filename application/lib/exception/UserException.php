<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/13
 * Time: 10:21
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = '404';
    public $msg = '用户不存在！';
    public $errorCode = 30000;
}