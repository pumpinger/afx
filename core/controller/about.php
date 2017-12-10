<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


class aboutController extends baseController {




    public function indexAction(){



//        $res = aboutModel::intance()->getAll();
//
//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());
        $res = aboutModel::intance()->getAll();


        $this->render(array(
            'data'=>$res
        ));
//        $this::cc();



//        include_once 'e.php';
//        throw new e(1000);
    }



}