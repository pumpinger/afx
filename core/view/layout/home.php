<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
<!--    <title>--><?php //echo $this->title?><!--</title>-->


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
            <a class="nav_link">首页</a>
            <a class="nav_link">关于我们</a>
            <a class="nav_link">业务领域</a>
            <a class="nav_link">新闻动态</a>
            <a class="nav_link">加入我们</a>
            <a class="nav_link">联系我们</a>
        </div>
    </div>
</div>


<?php include_once $this->mController->view;?>



<div class="foot">
    <div class="foot_center">
        <div class="foot_left">
            <p class="foot_left_title">友情链接</p>
            <div class="foot_links">
                <a class="foot_link" href="http://baidu.com">友情链接一</a>
                <a class="foot_link" href="http://baidu.com">友情链接二</a>
                <a class="foot_link" href="http://baidu.com">友情链接三</a>
                <a class="foot_link" href="http://baidu.com">友情链接四</a>
                <a class="foot_link" href="http://baidu.com">友情链接五</a>
            </div>
        </div>
        <div class="foot_middle">
            <p class="foot_middle_title">联系方式</p>
            <div class="foot_contact">
                <p>合作：13333333333</p>
                <p>招聘：13333333333</p>
                <p>公司地址：xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
            </div>
        </div>
        <div class="foot_right">
            <p class="foot_right_title">关注我们</p>
            <div class="foot_wx">
                <img src="<?php echo PUBLIC_PATH ;?>img/qr.png" />
                <p>官方微信</p>
            </div>
            <div class="foot_sina">
                <img src="<?php echo PUBLIC_PATH ;?>img/qr.png" />
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



