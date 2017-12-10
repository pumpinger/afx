<?php
use EZPHP\core\model;
use EZPHP\model\ISaveModel;

/**
 * Created by PhpStorm.
 * User: @van
 * Date: 2015/7/2
 * Time: 16:39
 */


class businessModel extends model {



    public function getFour()
    {
        $res=$this->db()->setLimit(0,4)->setField(array('pic','id'))->query(false);

        return $res;
    }




}