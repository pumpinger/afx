<?php
use EZPHP\core\controller;
use EZPHP\Exception\myException;

/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


class indexController extends baseController  {


    public function onStart()
    {
        parent::onStart();
    }

    public function onRender()
    {
        parent::onRender();
        $this->setTitle('AFX-HOME');
    }


    public  function onEnd()
    {

    }


    public function welcomeAction()
    {


        $this->render(
            array(
                'ver'=>C('EZPHP_ver'),
            )
        );
        
    }
    

    public function indexAction(){




        $banner = bannerModel::intance()->getAll();

        $this->render(array(
            'banner'=>$banner,
        ));


//        include_once 'e.php';
//        throw new e(1000);
    }





    public function langAction(){

        \EZPHP\EZPHP::app()->lang()->setLang($_REQUEST['lang']);

        $this->json();
    }



    public static function cc()
    {
        echo 123123123;
    }
}