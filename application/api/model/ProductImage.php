<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28
 * Time: 16:35
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ['id', 'img_id', 'delete_time'];

    public function imgUrl(){
        return  $this->belongsTo('Image','img_id','id');
    }

}

