<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/20
 * Time: 16:47
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Validate;

class BaseValidate extends Validate
{

    /**
     * @return bool
     * @throws Exception
     */
    public function goCheck()
    {
        //拿到所有的参数
        $data = request()->param();
        $res = $this->check($data);
        if(!$res) {
           /* $error = $this->getError();
            throw new Exception($error);*/
            $e  = new ParameterException([
                'msg'=>$this->error,
            ]);
           /* $e->msg = $this->error;
            $e->errorCode=10002;*/
            throw $e;
        } else {
            return true;
        }

    }


     /**
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * 判断是否为正整数
     */
    protected function ZzsInt($value,$rule='',$data ='',$field = '')
    {

        if(is_numeric($value) && is_int($value + 0) && ($value + 0)>0){
            //echo 'zzs';
            return true;  
        }else{
           /* return $field.'必须是正整数';*/
             return false;
        }



    }

}
