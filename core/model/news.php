<?php
use EZPHP\core\db;
use EZPHP\core\model;
use EZPHP\model\ISaveModel;

/**
 * Created by PhpStorm.
 * User: @van
 * Date: 2015/7/2
 * Time: 16:39
 */


class newsModel extends model   {



    const TYPE_COMPANY = 1;
    const TYPE_INDUSTRY = 2;

    public static $type = array(
        self::TYPE_COMPANY=>'公司动态',
        self::TYPE_INDUSTRY=>'行业新闻',
    );






    public function getFour()
    {

        //
        $res1=$this->db()->setLimit(0,4)->setEqual(array(
            'type'=> self::TYPE_COMPANY,
        ))->query(false);


        $res2=$this->db()->setLimit(0,4)->setEqual(array(
            'type'=> self::TYPE_INDUSTRY,
        ))->query(false);


        return array($res1,$res2);
    }


}