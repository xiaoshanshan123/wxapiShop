<?php
namespace app\lib\exception;

use think\Exception;
use think\exception\Handle;
use think\Request;

class ExceptionHandler extends Handle
{
	private $code;
	private $msg;
	private $errorCode;

	public function render(Exception $e){
		//var_dump($e);
		//向客户端返回具体返回信息 它如果是这类型就
		if($e instanceof BaseException){
			//如果是自定义的异常
			$this->code = $e->code;
			$this->msg= $e->msg;
			$this->errorCode = $e->errorCode;
		}else{
			$this->code = 500;
			$this->msg = '内部错误！@';
			$this->errorCode =999;

		}
		$request = Request::instance();
		$result = [
			'msg'=>$this->msg,
			'error_code' => $this->errorCode,
			'request_url' =>$request->url()
		];

		return json($result,$this->code);
	}


} 