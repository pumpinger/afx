<?php
/**
 * Created by PhpStorm.
 * User: @van
 * Date: 2015/7/2
 * Time: 16:39
 */


class userModel extends \EZPHP\core\model{



    public function getUserByaccout($account)
    {

        $res=$this->db()->setEqual(array('account'=>$account))->query(true);
        return $res;
    }

}