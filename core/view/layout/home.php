<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <title><?php echo $this->mController->title?></title>


    <link rel="stylesheet" href="<?php echo PUBLIC_PATH ;?>css/global.css"/>
    <script type="text/javascript" src="<?php echo PUBLIC_PATH ;?>lib/jquery-2.1.4.js"></script>


</head>

<body>


<div class="top"><div class="top_center"><div class="top_bar"></div></div></div>

<div class="nav">
    <div class="nav_center">
        <div class="nav_logo">
            <img src="<?php echo PUBLIC_PATH ;?>img/logo.png" />
        </div>
        <div class="nav_lang">
            <a class="nav_lang_zh">中文</a>|<a class="nav_lang_en">English</a>
        </div>
        <div class="nav_links">
            <a class="nav_link <?php echo $this->mController->controller == 'index' ? 'active' : '' ?>" href="<?php echo U('index') ?>">首页</a>
            <a class="nav_link <?php echo $this->mController->controller == 'about' ? 'active' : '' ?>" href="<?php echo U('about') ?>">关于我们</a>
            <a class="nav_link <?php echo $this->mController->controller == 'business' ? 'active' : '' ?>" href="<?php echo U('business') ?>">业务领域</a>
            <a class="nav_link <?php echo $this->mController->controller == 'news' ? 'active' : '' ?>" href="<?php echo U('news') ?>">新闻动态</a>
            <a class="nav_link <?php echo $this->mController->controller == 'join' ? 'active' : '' ?>" href="<?php echo U('join') ?>">加入我们</a>
            <a class="nav_link <?php echo $this->mController->controller == 'contact' ? 'active' : '' ?>" href="<?php echo U('contact') ?>">联系我们</a>
        </div>
    </div>
</div>


<?php include_once $this->mController->view;?>



<div class="foot">
    <div class="foot_center">
        <div class="foot_left">
            <p class="foot_left_title">友情链接</p>
            <div class="foot_links">

                <?php foreach ($this->mController->link as $v): ?>
                    <a class="foot_link" target="_blank" href="<?php echo $v['link'] ?>"><?php echo $v['name'] ?></a>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="foot_middle">
            <p class="foot_middle_title">联系方式</p>
            <div class="foot_contact">
                <?php echo  $this->mController->info['content']?>
            </div>
        </div>
        <div class="foot_right">
            <p class="foot_right_title">关注我们</p>
            <div class="foot_wx">
                <img src="<?php echo $this->mController->qr[0]['pic'] ?>" />
                <p>官方微信</p>
            </div>
            <div class="foot_sina">
                <img src="<?php echo $this->mController->qr[1]['pic'] ?>" />
                <p>技术支持</p>
            </div>
        </div>
    </div>
</div>


<div class="bottom">
    <div class="bottom_center">
        <p>© 2017 afx.com All rights reserved. Powered by Van.</p>
        <div class="bottom_pic">
            <img src="<?php echo PUBLIC_PATH ;?>img/bottom.png" />
        </div>
    </div>

</div>


</body>
</html>



