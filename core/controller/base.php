<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/6
 * Time: 16:25
 */

abstract class baseController extends \EZPHP\core\controller{


    public $link;
    public $qr;
//    public $info;

    public function onRender()
    {

        $this->setLayout(APP_VIEW_PATH.'layout/home.php');
        $this->setTitle('afx');

        $this->link = linkModel::intance()->getAll();
        $this->qr = picModel::intance()->getAll()[0];
//        $this->info = infoModel::intance()->getAll()[0];



    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }


    


}