<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/29
 * Time: 17:01
 */

namespace EZPHP\language;


use EZPHP\base;
use EZPHP\core\component;
use EZPHP\core\db;

class language extends component
{
    function init()
    {
        // TODO: Implement init() method.
    }


    private $lang;


    public function __construct()
    {


        if(isset($_COOKIE['ezphp_lang']) && $_COOKIE['ezphp_lang']){
            $this->lang = $_COOKIE['ezphp_lang'];
        }else{
            $this->lang = 'zh';
        }

    }



    public function setLang($lang){

        setcookie('ezphp_lang',$lang);
        $this->lang = $lang;
    }


    public function getDb()
    {

        if($this->lang != 'zh'){
            return '_'.$this->lang;
        }else{
            return '';
        }


    }


    public function getLang()
    {
        return $this->lang;
    }



}



//todo   是否用  di  把 langDB 注入进去

class langDB extends db {

    private $lang;

    public function __construct($model,$lang)
    {
        parent::__construct($model);

        $this->lang = $lang;
    }


    public function getTableName()
    {
        $class= $this->model;

        $class=substr($class,0,-5);




        return 't_'.$class.'_'. $this->lang;
    }
}