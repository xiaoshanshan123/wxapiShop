<?php
/**
 * Created by 七月.
 * Author: 七月
 * Date: 2017/4/17
 * Time: 2:05
 */

namespace app\api\controller\v1;
use app\api\validate;
use app\lib\exception\BannerMissException;
use think\Exception;


class Banner
{
    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     *
     */
    public function getBanner($id)
    {

        //开闭原则
        (new validate\IDZzs())->goCheck();

       $res = model('Banner')->getBannerId($id);
        //$res = '';

        if(!$res){
            throw new BannerMissException();
        }else{
            return json_encode($res);
        }

    }


}