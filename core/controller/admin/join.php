<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use joinModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;

class joinController extends adminController  {



    public function listAction(){



        $res = joinModel::intance()->getAll();

        $type = \typeModel::intance()->getModuleEnum(\typeModel::MODULE_JOIN);

//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());


        $this->render(array(
            'data'=>$res,
            'type'=>$type,
        ));
    }

    public function saveAction()
    {
        $id = $_REQUEST['id'];

        $data = array(
            'content'=>$_REQUEST['content'],
            'title'=>$_REQUEST['title'],
            'type'=>$_REQUEST['type'],
            'update_time'=>time(),
        );


        if($id){
            $res=joinModel::intance()->chgOne($data,$id);
        }else{

            $res =joinModel::intance()->addOne($data);
        }




        if( $res ){
            $this->json();
        }else{
            //todo 这里 这么做 json  的 exception  现在是 html
            throw new ezException('保存失败');

        }
    }

    public function delAction()
    {
        $id = $_REQUEST['id'];

        $res = false;
        if($id){
            $res=joinModel::intance()->delOne($id);
        }



        if( $res ){
            $this->json();
        }else{
            //todo 这里 这么做 json  的 exception  现在是 html
            throw new ezException('保存失败');

        }
    }


    public function editAction()
    {
        $id = $_REQUEST['id'];

        $res = \joinModel::intance()->getOne($id);
        $type = \typeModel::intance()->getModule(\typeModel::MODULE_JOIN);



        $this->render(array(
            'data'=>$res,
            'type'=>$type,
        ));


    }


}