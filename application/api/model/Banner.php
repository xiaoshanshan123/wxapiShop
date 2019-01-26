<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/20
 * Time: 17:17
 */
namespace app\api\model;
use think\Db;
use think\Model;

class Banner extends BaseModel
{
    public function  items(){

       return  $this->hasMany('BannerItem','banner_id','id');
    }

    public function getBannerId($id){

      return  self::with(['items','items.img'])->find($id);
    }


}