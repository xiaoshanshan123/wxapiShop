<?php

namespace app\api\controller\v1;

use app\api\validate\IDZzs;
use app\lib\exception\ThemeException;
use app\api\model\Theme as ThemeModel;

class Theme 
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function getThemeList($ids='')
    {
         (new validate\IdsCheck())->goCheck($ids);
        
         $ids = explode(',', $ids);//var_dump($ids);

         $data =ThemeModel::with('topicImg,headImg')
         ->select($ids);

         if(!$data){
            throw new Exception("Error Processing Request", 1);
         }
         return json_encode($data);  


    }

    /**
     * 
     * @php 获取专题的详情资料
     */
    public function getComplex($id){

      $res =  (new IDZzs())->goCheck($id);
       if(!$res){
            throw new ThemeException();
       }
       //echo $id;exit;

       $data = ThemeModel::getDatabyId($id);

         return  json($data);
    
  }
}
