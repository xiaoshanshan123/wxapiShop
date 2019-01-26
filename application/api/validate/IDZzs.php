<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/20
 * Time: 15:45
 */

namespace app\api\validate;


use think\Validate;

class IDZzs extends BaseValidate
{
    protected $rule = [

        'id' =>'require|ZzsInt'
    ];

    protected $message = [

        'id' =>'id为正整数'
    ];

   
}