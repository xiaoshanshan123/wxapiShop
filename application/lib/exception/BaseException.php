<?php
namespace app\lib\exception;
use think\Exception;

class BaseException extends Exception{
		
		//HTTP:状态码 404 200
		public $code = 400;
		//错误的具体信息
		public $msg = '错误参数';
		//自定义错误码
		public $errorCode = 10000;

}