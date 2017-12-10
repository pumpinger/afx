<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/28
 * Time: 下午1:23
 */

namespace EZPHP;


use EZPHP\core\controller;
use EZPHP\language\language;
use EZPHP\request\Request;

class app extends  base{


    private $mLang;



    private static function _config($config){



        //自己托管了   错误 的处理 之后..  这里就失效了
        if($config['show_error']){
            ini_set('display_errors', 1);
        }else{
            ini_set('display_errors', 0);
        }


        //读取设置判断 是不是要 language

        error_reporting(E_ALL ^ E_NOTICE);

//        date_default_timezone_set(C('time_zone'));
    }

    public function __construct($config)
    {

        self::_config($config);

        $this->mLang = new language();
    }


    public function run(){
//        Header("HTTP/1.1 303 See Other");
//        Header("Location: http://baidu.com");


        
        self::_router();
//        echo TEST;

    }


    /**
     * @return language
     */
    public function lang()
    {
        return $this->mLang;
    }

    public static function _router(){


        //todo  url uncode
        //todo  这里$_GET 就可以了 但是以后可能要改  就多取一些值

        //$app_url( $app_folder + $app_param($router_param + $get_param) )


        //文件夹，文件名，参数
        $app_url=$_SERVER['REQUEST_URI'];

        //文件夹
        $app_folder=dirname($_SERVER['SCRIPT_NAME']);

        //文件名，参数
        $app_param=str_replace($app_folder.'/',"",$app_url);
        $app_param_array=explode('?',$app_param);

        //参数
        $param=array_pop($app_param_array);

        $param_array = explode('&',$param);

        $param_map=array(
            'c'=>'index',
            'a'=>'index',
            'g'=>'',
        );
        foreach ($param_array as $v) {
            $temp=explode('=',$v);
            if(isset($temp[1])){
                $param_map[$temp[0]]= $temp[1];
            }
        }



//        var_dump(__DIR__);
//        var_dump(dirname($_SERVER['SCRIPT_FILENAME']));exit;


//        var_dump(($_SERVER['REQUEST_URI']));
//        var_dump($_SERVER['PHP_SELF']);exit;

//        $_temp  = explode('.php',$_SERVER['PHP_SELF']);
//        define('_PHP_FILE_',    rtrim(str_replace($_SERVER['HTTP_HOST'],'',$_temp[0].'.php'),'/'));

        $controller=$param_map['c'];
        $action=$param_map['a'];
        $group=$param_map['g'];



        self::_loadAPP($group,$controller,$action);

    }


    public static function _loadAPP($group,$controller,$action){


        if(file_exists('./core/controller/'.$group.'/'.$controller.'.php')){
            include_once('./core/controller/'.$group.'/'.$controller.'.php');
//            $controllerClass=$controller.'Controller';
            $controllerClass=$group.'\\'.$controller.'Controller';
        }else{
            throw new \Exception('找不到file');

        }




        /**
         * @var $newController controller
         */
        if( class_exists($controllerClass,false)){
            $newController=new $controllerClass;
            $newController->controller=$controller;
            $newController->group=$group;
        }else{
            throw new \Exception('找不到controller');

        }


        $actionMethod=$action.'Action';

        if( method_exists($newController,$actionMethod) ){
            $newController->action=$action;



            //todo  直接放到 ezphp 对象去

            $newController->mRequest=new Request($newController);


            try {


                //todo 这个爆出什么错 还没想好
                if(! $newController->mRequest->checkParam()){
                    throw new \Exception();
                }

                if( $newController->start()  == false){
                    throw new \ErrorException();
                }



            } catch (\ErrorException $e) {

            } catch (\Exception $e) {

            }





            $newController->$actionMethod();
            $newController->end();


        }else{
            throw new \Exception('找不到action');
        }

    }


}