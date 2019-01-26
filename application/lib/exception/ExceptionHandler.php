<?php
namespace app\lib\exception;

use think\Exception;
use think\exception\Handle;
use think\Request;
use think\Log;

class ExceptionHandler extends Handle
{
	private $code;
	private $msg;
	private $errorCode;

	public function render(Exception $e){
		//向客户端返回具体返回信息 它如果是这类型就
		if($e instanceof BaseException){
			//如果是自定义的异常
			$this->code = $e->code;
			$this->msg= $e->msg;
			$this->errorCode = $e->errorCode;
		}else{
			//服务端和客户端开启日志开关和调式
			//$switch = true;
			if(config('app_debug'))
			{
				return parent::render($e);
			}
				else
			{
				$this->code = 500;
				$this->msg = '内部错误！@';
				$this->errorCode =999;
				$this->recordErrorLog($e);
				//记录日志，查询日志，解决问题
			}
			
		}
		$request = Request::instance();
		$result = [
			'msg'=>$this->msg,
			'error_code' => $this->errorCode,
			'request_url' =>$request->url()
		];

		return json($result,$this->code);
	}

	private function recordErrorLog(Exception $e){

		Log::init([
			'type' =>'File',
			'path' => LOG_PATH,
			'level' => ['error']
		]);
		Log::record($e->getMessage(),'error');

	} 
} 