<?php
/**
 * Created by PhpStorm.
 * User: van
 * Date: 17/12/4
 * Time: 下午2:04
 */

namespace EZPHP\core;


use EZPHP\base;

class render extends base
{

    public $mController;


    //todo 页面上  比如 导航栏 那些变量 怎么传递




    public function __construct(controller $controller,$data)
    {

        $this->mController = $controller;


        foreach ($data as $k=>$v) {
            $this->$k=$v;
        }


    }


    public function init()
    {


        //todo   new  controller 的时候 view 就写进去

        if($this->mController->view){
            $this->mController->view='./core/view/'. $this->mController->group .'/'.$this->mController->controller.'/'. $this->mController->view.'.php';

        }else{
            $this->mController->view='./core/view/'. $this->mController->group .'/'.$this->mController->controller.'/'. $this->mController->action.'.php';


        }




        if($this->mController->layout){

            if(   file_exists($this->mController->layout)  ){
                include_once($this->mController->layout);

            }else{
                throw new \Exception('找不到布局文件');
            }


        }else{

            if(  file_exists(  $this->mController->view  )  ){
                include_once($this->mController->view);
            }else{
                throw new \Exception('找不到视图文件');
            }

        }


    }






}