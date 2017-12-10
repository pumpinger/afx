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

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title><?php echo $this->title?></title>
    <link rel="shortcut icon" href="<?php echo WEB_PATH ;?>favicon.ico" />

    <link href="<?php echo PUBLIC_PATH ;?>lib/webuploader/webuploader.css" type="text/css" rel="stylesheet">

    <link href="<?php echo PUBLIC_PATH ;?>lib/app.css" type="text/css" rel="stylesheet">


    <script type="text/javascript" src="<?php echo PUBLIC_PATH ;?>lib/jquery-2.1.4.js"></script>


    <style>

        body, dl, dd, h1, h2, h3, h4, h5, h6, p, form,a,button{margin:0;padding:0;}
        ol,li,ul{margin:0; padding:0;list-style: outside none none;}
        p,div {word-wrap:break-word;}
        a{text-decoration:none;color: inherit;}
        img{border: 0;}
        table{border-collapse:collapse;border-spacing:0;}
        label {cursor:pointer;}
        input, button, textarea, select {font-size: inherit;width: auto;padding:0;}
        ol, ul { list-style: none; }



        body {font-family: "Microsoft YaHei", 'Open Sans', sans-serif;background: #eee9c9;}
        body {background: #f5f5f5;}


        .main {margin-left: 200px;margin-top: 60px;}


        .top {position: fixed;width: 100%;top:0;}
        .top {background-color: #2e313b;color: #fff;height: 50px;border-bottom: 10px solid #79889a;}

        .top_log {display: inline-block;vertical-align:top;margin-top: 8px;margin-left: 10px;font-size: 30px;}
        .top_nav {display : inline-block;vertical-align:top;margin: 22px 0 0 40px;font-size: 16px;}
        .top_fun {display: inline-block;vertical-align:top;float: right;margin-right: 20px;margin-top: 20px;font-size: 14px;}
        .top_nav a {float: left;margin-right: 20px;cursor: pointer;}
        .top_nav .active {color: #f7f2ab;}


        .nav {background:#2e313b;position: fixed;top:60px;bottom: 0;left: 0;}

        .content {overflow: auto;}




        .file_picker {display: inline-block;vertical-align: top;margin-top:30px;margin-right: 15px;}
        .file_list {display: inline-block;vertical-align: top;}

        .file_item {margin-left: 10px;display: inline-block;vertical-align: top;}

        .file_info {white-space: nowrap;text-overflow: ellipsis;width: 100px;overflow: hidden;}
        .file_progress {width: 100px;height: 16px;border: 1px solid #00b7ee;}
        .file_progress span {height: 100%;background-color: #00a2d4;display: inline-block;}



    </style>



    <style>

        .content_box {padding: 10px;}
        .x-table {background: #ffffff;}

        input {color: inherit;}

    </style>


</head>
<body>


<div class="top">
    <div class="top_log x-font-30">
        <a href="<?php echo U('index','index')?>" >AFX</a>
    </div>
    <div class="top_nav x-font-16">

        <a   class="nav_lang_zh <?php echo (\EZPHP\EZPHP::app()->lang()->getLang()=='zh')?'active':'';?>">中文</a>
        <a   class="nav_lang_en <?php echo (\EZPHP\EZPHP::app()->lang()->getLang()=='en')?'active':'';?>">English</a>
    </div>

    <div class="top_fun x-font-14">
        <?php if( $_SESSION):?>
            <a><?php echo $_SESSION['name']?></a>
            <a href="<?php echo U('login','logout')?>">退出</a>
        <?php else:?>
            <a>登陆</a>
        <?php endif;?>

    </div>
</div>


<div class="main">

    <div class="nav">
        <ul class="x-nav x-nav-sidebar">
            <li class="x-nav-item">
                <a class="x-nav-head">内容设置<i class="iconfont icon-xiangxia1"></i></a>
                <ul class="x-nav-child" style="display:none">
                    <li><a href="<?php echo adminU('news', 'list') ?>">新闻动态</a></li>
                    <li><a href="<?php echo adminU('join', 'list') ?>">加入我们</a></li>
                    <li><a href="<?php echo adminU('about', 'list') ?>">关于我们</a></li>
                    <li><a href="<?php echo adminU('business', 'list') ?>">业务领域</a></li>
                    <li><a href="<?php echo adminU('contact', 'list') ?>">联系我们</a></li>
                </ul>
            </li>
            <li class="x-nav-item">
                <a class="x-nav-head">信息设置<i class="iconfont icon-xiangxia1"></i></a>
                <ul class="x-nav-child" style="display:none">
                    <li><a href="<?php echo adminU('link', 'index') ?>">友情链接</a></li>
                    <li><a href="<?php echo adminU('banner', 'index') ?>">首页大图</a></li>
                    <li><a href="<?php echo adminU('qr', 'index') ?>">二维码设置</a></li>
                    <li><a href="<?php echo adminU('info', 'index') ?>">联系方式设置</a></li>
                </ul>
            </li>
            <li class="x-nav-item">
                <a class="x-nav-head">系统设置<i class="iconfont icon-xiangxia1"></i></a>
                <ul class="x-nav-child" style="display:none">
                    <li><a href="<?php echo adminU('user', 'index') ?>">密码设置</a></li>
                </ul>
            </li>
        </ul>


    </div>

    <div class="content">
        <?php include_once $this->mController->view;?>

    </div>

</div>


</body>


<script>



//    $('.x-nav a').click(function (){
//
//        if($(this).data('href')){
//            window.location.href = $(this).data('href');
//
//        }
//
//
//        $.ajax({
//            type:'GET',
//            dataType:'html',
//            url:$(this).data('href'),
//            success:function (html){
//                $('.content').html($(html).find('.content'));
//            },
//            error:function (){
//
//            }
//        });
//
//
//    })


    $('body').on('click','.ajax-del',function(){
        $(".ajax-del").attr("disabled","disabled");
        var url = $(this).data('url');
        if(    confirm('确认删除？')  ){
            $.ajax({
                url: url,
                dataType: 'json',
                success: function(res){
                    $(".ajax-del").removeAttr("disabled");
                    if(res.ok){//操作成功
                        var refreshDomStr ='.x-table';
                        var refreshUrl = location.href;
                        $.get(refreshUrl,function(data){
                            $(refreshDomStr).html($(data).find(refreshDomStr).html());
                        });
                    }else{

                    }
                },
                error: function (data){
                    $(".x-ajax-del").removeAttr("disabled");
                }
            });
        }

    });


</script>
<script>

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
</script>


<script type="text/javascript" src="<?php echo PUBLIC_PATH ;?>lib/app.js"></script>

<script type="text/javascript" src="<?php echo PUBLIC_PATH ;?>lib/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo PUBLIC_PATH ;?>lib/ueditor/ueditor.all.min.js"></script>


<script type="text/javascript" src="<?php echo PUBLIC_PATH ;?>lib/webuploader/webuploader.html5only.min.js"></script>



</html>

