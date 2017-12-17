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
        <a href="<?php echo U();?>" class="nav_logo">
            <img src="<?php echo PUBLIC_PATH ;?>img/logo.png" />
        </a>
        <div class="nav_lang">
            <a class="nav_lang_zh">中文</a>|<a class="nav_lang_en">English</a>
        </div>
        <div class="nav_links">
            <a class="nav_link <?php echo $this->mController->controller == 'index' ? 'active' : '' ?>" href="<?php echo U('index') ?>"><?php echo L('home') ?></a>
            <a class="nav_link <?php echo $this->mController->controller == 'about' ? 'active' : '' ?>" href="<?php echo U('about') ?>"><?php echo L('about_us') ?></a>
            <a class="nav_link <?php echo $this->mController->controller == 'business' ? 'active' : '' ?>" href="<?php echo U('business') ?>"><?php echo L('business') ?></a>
            <a class="nav_link <?php echo $this->mController->controller == 'news' ? 'active' : '' ?>" href="<?php echo U('news') ?>"><?php echo L('news') ?></a>
            <a class="nav_link <?php echo $this->mController->controller == 'join' ? 'active' : '' ?>" href="<?php echo U('join') ?>"><?php echo L('join_us') ?></a>
            <a class="nav_link <?php echo $this->mController->controller == 'contact' ? 'active' : '' ?>" href="<?php echo U('contact') ?>"><?php echo L('contact_us') ?></a>
        </div>
    </div>
</div>


<?php include_once $this->mController->view;?>



<div class="foot">
    <div class="foot_center">
        <div class="foot_left">
            <p class="foot_left_title"><?php echo L('blogroll') ?></p>
            <div class="foot_links">

                <?php foreach ($this->mController->link as $v): ?>
                    <a class="foot_link" target="_blank" href="<?php echo $v['link'] ?>"><?php echo $v['name'] ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="foot_right">
            <p class="foot_right_title"><?php echo L('follow_us') ?></p>
            <div class="foot_wx">
                <img src="<?php echo $this->mController->qr['pic'] ?>" />
            </div>
        </div>
    </div>
</div>


<div class="bottom">
    <div class="bottom_center">
        <p>© 2017 www.afx-eth.com All rights reserved. </p>
    </div>

</div>


<script>

    $('.nav_lang_en').click(function (){
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'<?php echo U('index','lang',array('lang'=>'en'))?>',
            success:function (){
                window.location.reload();
            },
            error:function (){

            }
        });
    });

    $('.nav_lang_zh').click(function (){
        $.ajax({
            type:'GET',
            dataType:'json',
            url:'<?php echo U('index','lang',array('lang'=>'zh'))?>',
            success:function (){
                window.location.reload();
            },
            error:function (){

            }
        });
    });

</script>


<script>


    $('.block_a_left_nav').click(function(){
    $('.block_a_left_nav.active').removeClass('active');
    $(this).addClass('active');

    var i = $(this).index();

    $('.block_a_right_content.active').removeClass('active');
    $('.block_a_right_content').eq(i).addClass('active');

    });
</script>

</body>
</html>



