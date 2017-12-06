<?php
/**
 * Created by PhpStorm.
 * User: @van
 * Date: 2015/7/13
 * Time: 10:27
 */

/**
 * @var $this \EZPHP\core\render
 */
?>


    <style>
        .box {text-align: center;margin-top: 200px;}
    </style>


    <div class="box">
        <h1>欢迎使用EZPHP。</h1>
        版本号: <b> <?php echo $this->ver?></b>。
        <br><br>
        <a href="<?php echo $this->mController->makeUrl('login','logout')?>">退出</a>
        <a href="<?php echo $this->mController->makeUrl('user','index')?>">用户</a>。

    </div>



