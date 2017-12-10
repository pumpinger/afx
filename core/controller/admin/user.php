<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use picModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;
use userModel;

class userController extends adminController  {



    public function indexAction(){


        $this->render(array(
        ));
    }

    public function saveAction()
    {

        $res = true;
//        foreach ($_REQUEST['qr'] as  $k => $v) {
//
//
//            if(!$v){
//                continue;
//            }
//
//
//            $res=UserModel::intance()->chgOne(array(
//                    'pic'=>$v,
//            ),$k);
//
//            if( ! $res ){
//                break;
//            }
//        }



        if($_REQUEST['new_pwd']  !== $_REQUEST['new_pwd2']){
            $this->json(array(
                'ok'=>false,
                'msg'=>'新密码不一致',
            ));
            exit;

        }


        $res=userModel::intance()->getUserByaccout('admin');

        if( md5($_REQUEST['old_pwd'])  !== $res['password']){
            $this->json(array(
                'ok'=>false,
                'msg'=>'旧密码不正确',
            ));
            exit;

        }

        $res = userModel::intance()->chgOne(array(
            'password'=>md5($_REQUEST['new_pwd'])
        ),$res['id']);


        if($res){
            $this->json();
        }else{
            throw new ezException('保存失败');


        }



    }


}