<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/20
 * Time: 15:45
 */

namespace app\api\validate;


use think\Validate;

class IdsCheck extends BaseValidate
{
    protected $rule = [

        'ids' =>'require|CheckIDs'
    ];

    protected $message = [
        'ids' =>'ids参数必须是以逗号隔开的正整数'
    ];

    /**
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * 判断是否是ids= ids1,ids2,ids3
     */
    protected function CheckIDs($value)
    {

        $values = explode(',',$value);
        if(empty($values)){
            return false;
        }
        //循环提出每个进行正整数校验
        foreach ($values as $id) {

            if(!$this->ZzsInt($id)){
                return false;
  
            }
               
        }
            return true;
    }
}