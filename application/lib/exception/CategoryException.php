<?php
namespace app\lib\exception;

class CategoryException extends BaseException{

	public $code = '404';
	public $msg = '查询分类失败';
	public $errorCode = 30000;

}