<?php
use EZPHP\core\model;
use EZPHP\model\ISaveModel;

/**
 * Created by PhpStorm.
 * User: @van
 * Date: 2015/7/2
 * Time: 16:39
 */


class typeModel extends model  {




    const MODULE_ABOUT = 1;
    const MODULE_JOIN = 2;
    const MODULE_NEWS = 3;
    const MODULE_BUSINESS = 4;


    public function getModule($module)
    {
        $res=$this->db()->setOrder(array(
            'sort'=>'desc'
        ))->setEqual(array(
            'module'=>$module
        ))->query();

        return $res;
    }

    public function getModuleEnum($module)
    {

        $res = $this->getModule($module);


        $data =array();
        foreach ($res as $v) {
            $data[$v['id']] = $v['name'];
        }

        return $data;
    }


}