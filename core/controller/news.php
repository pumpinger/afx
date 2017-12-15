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

        $res1 =array();
        $res2 =array();
        foreach ($res as $v) {
            if($v['type'] == newsModel::TYPE_COMPANY){
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
            'company'=>$res1,
            'industry'=>$res2,
            'pic'=>$pic

        ));
//        $this::cc();



//        include_once 'e.php';
//        throw new e(1000);
    }


    public function detailAction()
    {
        $id = $_GET['id'];

        $res = newsModel::intance()->getOne($id);

        $this->render(array(
            'data'=>$res
        ));

    }



}