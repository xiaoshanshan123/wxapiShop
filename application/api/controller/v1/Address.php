<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/13
 * Time: 9:41
 */

namespace app\api\controller\v1;


use app\api\validate\newAddress;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;

class Address
{
    public function createOrUpdate(){

       $validate =  new newAddress();

        $validate->goCheck();
        /*
         * 根据token来获取uid，根据uid来查找用户，判断用户是否存在，不存在抛出异常
         *
         * */
        //获取当前用户id
        $uid = TokenService::getCUid();
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        $data = $validate->getDataByRule(input('post.'));
        $userAddress = $user->address();

        if(!$userAddress){
            $user->address()->save($data);
        }else{
            $user->address->save($data);
        }

        return new SuccessMessage();




    }
}