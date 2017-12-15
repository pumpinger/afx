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


        $res1 =array();
        $res2 =array();
        foreach ($res as $v) {
            if($v['type'] == joinModel::TYPE_SCHOOL){
                $res1[]=$v;
            }  else{
                $res2[]=$v;

            }
        }


//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());


        $this->render(array(
            'school'=>$res1,
            'society'=>$res2,
            'pic'=>$pic

        ));



//        include_once 'e.php';
//        throw new e(1000);
    }



}