<?php

use EZPHP\module\page\page;

/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


class newsController extends baseController {





    public function indexAction(){

        $pic = picModel::intance()->getOne(7)['pic'];

        $typeArr = typeModel::intance()->getModule(typeModel::MODULE_NEWS);



        $page  = $_GET['page']?:1;
        $type  = $_GET['type']?:$typeArr[0]['id'];



        $condition=newsModel::intance()->db()
            ->setEqual(array(
                'type'=>$type
            ))
            ->setOrder(array(
                'time'=>'desc'
            ));

        $pageObj = new page($condition,$page);





        $this->render(array(
            'page'=>$pageObj,
            'type'=>$type,
            'typeArr'=>$typeArr,
            'pic'=>$pic

        ));
//        $this::cc();



//        include_once 'e.php';
//        throw new e(1000);
    }


    public function detailAction()
    {
        $id = $_REQUEST['id'];

        $pic = picModel::intance()->getOne(7)['pic'];



        $res = newsModel::intance()->getOne($id);

        $this->render(array(
            'data'=>$res,
            'pic'=>$pic,
        ));

    }



}