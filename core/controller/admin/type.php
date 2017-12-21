<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


namespace admin;
use linkModel;
use adminController;
use EZPHP\exception\ezException;
use EZPHP\model\ISaveModel;
use typeModel;

class typeController extends adminController  {




    public function aboutAction(){

        $this->action(typeModel::MODULE_ABOUT);
    }


    public function newsAction(){

        $this->action(typeModel::MODULE_NEWS);
    }

    public function joinAction(){

        $this->action(typeModel::MODULE_JOIN);
    }


    public function businessAction(){

        $this->action(typeModel::MODULE_BUSINESS);
    }




    public function action($module)
    {
        $this->view = 'index';


        $res = typeModel::intance()->getModule($module);


        $module_name = '';
        switch ($module){
            case typeModel::MODULE_ABOUT:
                $module_name ='关于我们';
                break;
            case typeModel::MODULE_BUSINESS:
                $module_name ='业务领域';
                break;
            case typeModel::MODULE_JOIN:
                $module_name ='加入我们';
                break;
            case typeModel::MODULE_NEWS:
                $module_name ='新闻动态';
                break;
        }




        $this->render(array(
            'data'=>$res,
            'module_name'=>$module_name,
            'module'=>$module,
        ));
    }

    public function saveAction()
    {

        $id = $_REQUEST['id'];

        $data = array(
            'name'=>$_REQUEST['name'],
            'module'=>$_REQUEST['module'],
        );


        if($id){
            $res=typeModel::intance()->chgOne($data,$id);
        }else{
            $data['sort'] = 0;
            $res =typeModel::intance()->addOne($data);
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
            $res=typeModel::intance()->delOne($id);
        }



        if( $res ){
            $this->json();
        }else{
            //todo 这里 这么做 json  的 exception  现在是 html
            throw new ezException('保存失败');

        }
    }


    public function topAction()
    {
        $id = $_REQUEST['id'];

        $res = false;
        if($id){
            $res=typeModel::intance()->top($id);
        }



        if( $res ){
            $this->json();
        }else{
            //todo 这里 这么做 json  的 exception  现在是 html
            throw new ezException('操作失败');

        }
    }


    public function editAction()
    {
        $id = $_REQUEST['id'];


        $res = \typeModel::intance()->getOne($id);


        if($res){
            $module = $res['module'];

        }else{
            $module = $_REQUEST['module'];

        }


        $module_name = '';
        switch ($module){
            case typeModel::MODULE_ABOUT:
                $module_name ='about';
                break;
            case typeModel::MODULE_BUSINESS:
                $module_name ='business';
                break;
            case typeModel::MODULE_JOIN:
                $module_name ='join';
                break;
            case typeModel::MODULE_NEWS:
                $module_name ='news';
                break;
        }


        if( ! $module_name){
            throw  new ezException('没有这个模块');
        }



        $this->render(array(
            'data'=>$res,
            'module'=>$module,
            'module_name'=>$module_name,
        ));


    }

}