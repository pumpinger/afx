<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/29
 * Time: 上午12:30
 */


class contactController extends baseController {





    public function indexAction(){


        $res = contactModel::intance()->getAll();


        $this->render(array(
            'data'=>$res
        ));
    }



}