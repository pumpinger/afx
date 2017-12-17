<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


class newsController extends baseController {





    public function indexAction(){

        $pic = picModel::intance()->getOne(7)['pic'];


        $res = newsModel::intance()->getAll();
        $type = typeModel::intance()->getModule(typeModel::MODULE_NEWS);



        $this->render(array(
            'res'=>$res,
            'type'=>$type,
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