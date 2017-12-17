<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


class joinController extends baseController {





    public function indexAction(){


        $res = joinModel::intance()->getAll();
        $pic = picModel::intance()->getOne(8)['pic'];

        $type = typeModel::intance()->getModule(typeModel::MODULE_JOIN);



//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());


        $this->render(array(
            'res'=>$res,
            'pic'=>$pic,
            'type'=>$type,

        ));



//        include_once 'e.php';
//        throw new e(1000);
    }



}