<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use contactModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;
use EZPHP\module\page\page;

class contactController extends adminController  {



    public function listAction(){



//
//        $data = [];
//
//        foreach ($res as $v) {
//            $data[$v['field']] = $v['content'];
//        }


//        var_dump(postModel::intance()->getSql());

        $page  = $_GET['page']?:1;
        $condition=contactModel::intance()->db()->setOrder(array(
            'id'=>'desc'
        ));

        $pageObj = new page($condition,$page);

        $this->render(array(
            'page'=>$pageObj
        ));
    }


    public function saveAction()
    {
        $id = $_REQUEST['id'];

        $data = array(
            'content'=>$_REQUEST['content'],
            'title'=>$_REQUEST['title'],
            'update_time'=>time(),
        );


        if($id){
            $res=contactModel::intance()->chgOne($data,$id);
        }else{

            $res =contactModel::intance()->addOne($data);
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
            $res=contactModel::intance()->delOne($id);
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

        $res = \contactModel::intance()->getOne($id);


        $this->render(array(
            'data'=>$res
        ));


    }





}