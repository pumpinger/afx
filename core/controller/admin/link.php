<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use linkModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;

class linkController extends adminController  {



    public function indexAction(){



        $res = linkModel::intance()->getAll();
//
//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());


        $this->render(array(
            'data'=>$res
        ));
    }

    public function saveAction()
    {
        linkModel::intance()->delAll();


        $res = true;
        foreach ($_REQUEST['name'] as  $k => $v) {


            if(!$v){
                continue;
            }


            $res=linkModel::intance()->addOne(
                array(
                    'name'=>$v,
                    'link'=>$_REQUEST['link'][$k]
                )
            );

            if( ! $res ){
                break;
            }
        }



        if($res){
            $this->json();
        }else{
            throw new ezException('保存失败');


        }



    }


}