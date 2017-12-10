<?php
use EZPHP\core\model;
use EZPHP\model\ISaveModel;

/**
 * Created by PhpStorm.
 * User: @van
 * Date: 2015/7/2
 * Time: 16:39
 */


class aboutModel extends model  implements ISaveModel  {


    public function checkParam()
    {
        //应该是有 保存方法的时候 都会调用这里
    }


    function save()
    {
        // TODO: Implement save() method.
    }




    public function addOne($data)
    {
        $res=$this->db()->add($data);

        return $res;
    }

    public function chgOne($data,$id)
    {


        $res=$this->db()->setEqual(array('id'=>$id))->chg($data);


        return $res;
    }


    public function getOne($id)
    {
        $res=$this->db()->setEqual(array('id'=>$id))->query(true);

        return $res;
    }



    public function getHot()
    {
        $res=$this->db()->setEqual(array('status'=>'1'))->setOrder(array('like'=>'DESC'))->query();

        return $res;
    }
///0



}