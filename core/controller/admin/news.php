<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use EZPHP\base;
use EZPHP\core\db;
use EZPHP\core\model;
use EZPHP\module\page\page;
use newsModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;

class newsController extends adminController  {



    public function listAction(){



        $page  = $_GET['page']?:1;


        $type = \typeModel::intance()->getModuleEnum(\typeModel::MODULE_NEWS);



        $condition=newsModel::intance()->db()
            ->setOrder(array(
                'time'=>'desc'
            ));

        $pageObj = new page($condition,$page);


//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());





        $this->render(array(
            'page'=>$pageObj,
            'type'=>$type,
        ));
    }

    public function saveAction()
    {
        $id = $_REQUEST['id'];


        $data = array(
            'content'=>$_REQUEST['content'],
            'title'=>$_REQUEST['title'],
            'time'=>strtotime($_REQUEST['time']),
            'source'=>$_REQUEST['source'],
            'type'=>$_REQUEST['type'],
            'update_time'=>time(),
        );


        if($id){
            $res=newsModel::intance()->chgOne($data,$id);
        }else{

            $res =newsModel::intance()->addOne($data);
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
            $res=newsModel::intance()->delOne($id);
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

        $res = \newsModel::intance()->getOne($id);
        $type = \typeModel::intance()->getModule(\typeModel::MODULE_NEWS);


        $this->render(array(
            'data'=>$res,
            'type'=>$type,
        ));


    }


}



