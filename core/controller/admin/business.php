<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use businessModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;
use EZPHP\module\page\page;

class businessController extends adminController  {



    public function listAction(){



        $type = \typeModel::intance()->getModuleEnum(\typeModel::MODULE_BUSINESS);

//
//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());


        $page  = $_GET['page']?:1;
        $condition=businessModel::intance()->db()->setOrder(array(
            'id'=>'desc'
        ));

        $pageObj = new page($condition,$page);

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
            'pic'=>'',
            'type'=>$_REQUEST['type'],

            'update_time'=>time(),
        );


        if($id){
            $res=businessModel::intance()->chgOne($data,$id);
        }else{

            $res =businessModel::intance()->addOne($data);
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
            $res=businessModel::intance()->delOne($id);
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

        $res = \businessModel::intance()->getOne($id);
        $type = \typeModel::intance()->getModule(\typeModel::MODULE_BUSINESS);


        $this->render(array(
            'data'=>$res,
            'type'=>$type,
        ));


    }


}