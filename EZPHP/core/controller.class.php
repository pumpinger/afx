<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/28
 * Time: 下午1:23
 */

namespace EZPHP\core;


use EZPHP\base;

abstract class controller extends base{

    public     $controller='';
    public     $action='';
    public     $group='';

    public     $assign='';

    public     $layout='';
    public     $view='';
    public     $title='';

    
    public  $mRequest;
    public  $mRender;
    public  $mLang;


    public $start=array();


    public function check()
    {
        return true;
    }

    public function onStart()
    {
        return true;
    }

    public function onEnd(){

    }

    public function onRender(){

    }

    public  final function start(){
        return $this->onStart();
    }

    public final function end(){
        $this->onEnd();

    }




    public function assign($data)
    {
        $this->assign=$data;
    }






    //慢慢废弃  走 U 方法
    public function makeUrl($c='index',$a='index',$param=array()){


        $paramString='';
        foreach ($param as $k=>$v) {
            $paramString.='&'.$k.'='.$v;
        }


        return  HTTP_PATH.'index.php?c='.$c.'&a='.$a.$paramString;

    }





//todo  这里放到  response
    public function json($data=array())
    {
        if(isset($data)){
            $this->assign=$data;
        }

        echo json_encode(array_merge(array(
            'ok'=>true,
            'servers_time'=>time(),
        ),$data));
    }


    public function getlang(){
        return $this->mLang?:'zh';
    }

    public function setlang($lang){
        $this->mLang = $lang;
        setcookie('ezphp_lang',$lang);
    }



    public function lang($k){
        if(file_exists('./core/lang/'.$this->getlang().'.php')){
            $lang = include_once './core/lang/'.$this->getlang().'.php';
            return $lang[$k];


        }else{
            throw new \Exception('找不到lang文件');

        }
    }



    public function render($data=array())
    {

        //todo  放到 专门的  response
        $this->onRender();






        $render = new render($this,$data);
        $this->mRender = $render;
        $this->mRender->init();




    }

}