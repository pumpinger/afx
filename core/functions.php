<?php
/**
 * Created by PhpStorm.
 * User: wangzhongjiang
 * Date: 15/6/28
 * Time: 上午11:37
 */


/**
 * @param $text
 * @return string
 */
function nl2p($text) {
    return "<p>" . str_replace("\n", "</p><p>", $text) . "</p>";
}




function adminU($controller = 'index',$action = 'index',$param = array()){

    return  U($controller,$action,$param,'admin');

}
