<?php
/**
 * Created by PhpStorm.
 * User: van
 * Date: 17/12/4
 * Time: 下午2:04
 */

namespace EZPHP\core;


class render
{

    public $layout;
    public $controller;
    public $action;


    //todo 页面上  比如 导航栏 那些变量 怎么传递


    public function __construct(controller $controller,$data)
    {

        $this->controller = $controller->controller;
        $this->layout = $controller->layout;
        $this->action = $controller->action;

var_dump($data);

        $this->init();
    }


    private function init()
    {


        $this->view='./core/view/'.$this->controller.'/'. $this->action.'.php';


        if($this->layout){

            if(   file_exists($this->layout)  ){
                include_once($this->layout);

            }else{
                throw new \Exception('找不到布局文件');
            }


        }else{

            if(  file_exists(  $this->view  )  ){
                include_once($this->view);
            }else{
                throw new \Exception('找不到视图文件');
            }

        }


    }


}