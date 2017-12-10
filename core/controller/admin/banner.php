<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use bannerModel;
use linkModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;

class bannerController extends adminController  {



    public function indexAction(){



        $res = bannerModel::intance()->getAll();

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
        bannerModel::intance()->delAll();


        $res = true;
        foreach ($_REQUEST['pic'] as  $k => $v) {


            if(!$v){
                continue;
            }


            $res=bannerModel::intance()->addOne(
                array(
                    'pic'=>$v,
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