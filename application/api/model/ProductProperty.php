<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28
 * Time: 16:35
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden = ['id','img_id','delete_time','update_time','product_id'];
}