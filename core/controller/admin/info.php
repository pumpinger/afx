<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use infoModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;

class infoController extends adminController  {



    public function indexAction(){



        $res = infoModel::intance()->getAll();
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
        $id = $_GET['id'];

        $data = array(
            'content'=>$_REQUEST['content'],
        );


        $res=infoModel::intance()->chgOne($data,$id);




        if( $res ){
            $this->json();
        }else{
            //todo 这里 这么做 json  的 exception  现在是 html
            throw new ezException('保存失败');

        }
    }




}