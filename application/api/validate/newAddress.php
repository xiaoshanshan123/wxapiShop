<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/13
 * Time: 9:43
 */

namespace app\api\validate;


class newAddress extends BaseValidate
{

    protected $rule = [
        'name'=>'require|isEmpty',
        'mobile' =>'require|isMobile',
        'province' =>'require|isEmpty',
        'city' => 'require|isEmpty',
        'country' => 'require|isEmpty',
        'detail' =>'require|isEmpty'
    ];
}