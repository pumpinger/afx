<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


class businessController extends baseController {





    public function indexAction(){


        $pic = picModel::intance()->getOne(6)['pic'];

        $res = businessModel::intance()->getAll();


        $type = typeModel::intance()->getModule(typeModel::MODULE_BUSINESS);



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
//        $this::cc();



//        include_once 'e.php';
//        throw new e(1000);
    }



}