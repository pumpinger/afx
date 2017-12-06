<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/28
 * Time: 下午1:23
 */


/**
 * @param $var
 * @param bool $echo
 * @param null $label
 * @param bool $strict
 * @return mixed|null|string
 */
function P($var, $echo=true,$label=null, $strict=true)
{
    $label = ($label===null) ? '' : rtrim($label).' ';
    if(!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = "<pre>".$label.htmlspecialchars($output,ENT_QUOTES)."</pre>";
        } else
        {
            $output = $label . " : " . print_r($var, true);
        }
    }else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if(!extension_loaded('xdebug')) {
            $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
            $output = '<pre>'. $label. htmlspecialchars($output, ENT_QUOTES). '</pre>';
        }
    }
    if ($echo) {
        echo($output);
        return null;
    }else
        return $output;
}


//读取设置
function C($k,$v=null){
    global $config;
    if($v === null){
        return $config[$k];
    }else{
        $config[$k]=$v;
    }
}



//language
function L($k)
{


    $lang = \EZPHP\EZPHP::app()->lang()->getLang();


    if(file_exists('./core/lang/'.$lang.'.php')){
        $langArr = include_once './core/lang/'.$lang.'.php';
        return $langArr[$k];


    }else{
        throw new \Exception('找不到lang文件');

    }

}


//url
function U($c='index',$a='index',$param=array()){


    $paramString='';
    foreach ($param as $k=>$v) {
        $paramString.='&'.$k.'='.$v;
    }


    return  HTTP_PATH.'index.php?c='.$c.'&a='.$a.$paramString;

}



//跳转
function R($status_code,$url="./")
{
    switch ($status_code) {
        case 301:
        case 302:
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: ".$url);
            break;
        case 404:
            header("HTTP/1.1 404 Not Found");
            header("Status: 404 Not Found");
            break;
        case 401:
            header("HTTP/1.1 401 Unauthorized");
            header("Status: 401 Unauthorized");
            break;
        case 403:
            header("HTTP/1.1 403 Forbidden");
            header("Status: 403 Forbidden");
            break;
        case 400:
            header("HTTP/1.1 400 Bad Request");
            header("Status: 400 Bad Request");
            break;
        case 500:
            header("HTTP/1.1 500 Internal Server Error");
            header("Status: 500 Internal Server Error");
            break;
        case 503:
            header("HTTP/1.1 503 Service Unavailable");
            header("Status: 503 Service Unavailable");
            break;
        default:
            break;
    }
}
