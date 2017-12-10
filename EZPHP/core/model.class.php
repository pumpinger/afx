<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/28
 * Time: 下午1:23
 */

namespace EZPHP\core;


use EZPHP\base;

class model extends base{

    public static $model;


    /**
     * @var \PDO
     */
    protected $mDb;

    public $mController;


    public function __construct()
    {
        $this->mDb = new db(get_called_class());
    }

    //todo  记录所有sql
    
    /**
     * @return $this
     */
    public static function intance(){
        $class = get_called_class();

        if( self::$model[$class] ){
            return self::$model[$class];
        }
        self::$model[$class] = new $class;
        return self::$model[$class];
    }

    public function db()
    {
        return $this->mDb;
    }









    public function delAll($where = array())
    {
        $res=$this->db()->setEqual($where)->del();

        return $res;
    }


    public function getAll(Array $field=array('*'))
    {
        $res=$this->db()->setField($field)->query();

        return $res;
    }



    public function delOne($id)
    {


        $res=$this->db()->setEqual(array('id'=>$id))->del();

        return $res;
    }

    public function addOne($data)
    {
        $res=$this->db()->add($data);

        return $res;
    }

    public function chgOne($data,$id)
    {


        $res=$this->db()->setEqual(array('id'=>$id))->chg($data);


        return $res;
    }


    public function getOne($id)
    {
        $res=$this->db()->setEqual(array('id'=>$id))->query(true);

        return $res;
    }


}