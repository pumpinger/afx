<?php
use EZPHP\core\model;
use EZPHP\model\ISaveModel;

/**
 * Created by PhpStorm.
 * User: @van
 * Date: 2015/7/2
 * Time: 16:39
 */


class joinModel extends model   {



    const TYPE_SCHOOL = 1;
    const TYPE_SOCIETY= 2;

    public $type = array(
        self::TYPE_SCHOOL=>'校园招聘',
        self::TYPE_SOCIETY=>'社会招聘',
    );




}