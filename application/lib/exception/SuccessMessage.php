<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/13
 * Time: 10:34
 */

namespace app\lib\exception;


class SuccessMessage extends BaseException
{
        public $code = '201';
        public $msg = 'ok';
        public $errorCode = 30000;

}