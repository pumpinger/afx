
<div class="banner">
    <div class="banner_left">
        <img src="<?php echo PUBLIC_PATH ;?>img/left.png">
    </div>
    <div class="banner_right">
        <img src="<?php echo PUBLIC_PATH ;?>img/right.png">
    </div>
    <div class="banner_center">
        <div class="banner_pic">


            <?php $isFirst = true; ?>
            <?php foreach ($this->banner as $v): ?>

                <img  class="<?php echo $isFirst ? 'first' : ''; ?>" src="<?php echo $v['pic'] ?>" />
                <?php $isFirst = false;?>

            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="block_a">
    <div class="block_a_center">
        <div class="block_a_left">
            <div class="block_a_left_title">
                <div><?php echo L('news_center') ?></div>
            </div>
            <div class="block_a_left_navs">
                <div class="block_a_left_nav active">
                    <span>></span><?php echo L('company_dynamic') ?>
                </div>
                <div class="block_a_left_nav">
                    <span>></span><?php echo L('trade_news') ?>
                </div>
            </div>
        </div>
        <div class="block_a_right">
            <div class="block_a_right_contents">
                <div class="block_a_right_content active">

                    <?php foreach ($this->news['company'] as $v): ?>
                        <a class="block_a_right_item" href="<?php echo U('news','detail',array('id'=>$v['id'])) ?>">
                            <p class="block_a_right_item_title"><span><?php echo mb_substr($v['time'],0,2) ?></span><?php echo mb_substr($v['time'], 2) ?></p>
                            <p class="block_a_right_item_p"><?php echo $v['title'] ?></p>
                        </a>
                    <?php endforeach; ?>
                    <a class="block_a_right_more" href="<?php echo U('news','index',array(
                        'type'=>1
                    )); ?>"><?php echo L('more') ?>>></a>
                </div>
                <div class="block_a_right_content">
                    <?php foreach ($this->news['industry'] as $v): ?>
                        <a class="block_a_right_item" href="<?php echo U('news','detail',array('id'=>$v['id'])) ?>">
                            <p class="block_a_right_item_title"><span><?php echo mb_substr($v['time'],0,2) ?></span><?php echo mb_substr($v['time'], 2) ?></p>
                            <p class="block_a_right_item_p"><?php echo $v['title'] ?></p>
                        </a>
                    <?php endforeach; ?>
                    <a class="block_a_right_more" href="<?php echo U('news','index',array(
                        'type'=>2
                    )); ?>"><?php echo L('more') ?>>></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block_b">
    <div class="block_b_center">
        <div class="block_b_title"><?php echo L('<?php echo L(\'about_us\') ?>') ?></div>
        <div class="block_b_content">
            <?php foreach ($this->pic as $v): ?>
                <a href="<?php echo U('business') ?>#business_<?php echo $v['id']?>"><img src="<?php echo $v['pic'] ;?>" /></a>
            <?php endforeach; ?>
        </div>
    </div>
    <a class="block_b_more" href="<?php echo U('business') ?>"><?php echo L('more_examples') ?>>></a>
</div>



<script>
    var pageWidth=1920;
    var picNum=$('.banner_pic img').length;
    var curPicIndex=999*picNum; //懒得判断负数
    var isAnimate=true;

    function AutoAnimate(is_prev){


        var direction = 1;
        if(is_prev){
            direction = -1;
        }

        if(isAnimate){
            isAnimate=false;

            $('.banner_pic img:nth-child('+(curPicIndex%picNum+1)+')').animate({
                left:-pageWidth*direction/2
            },700,function(){
                $(this).css({
                    left:pageWidth
                });
            });
            curPicIndex++;
            $('.banner_pic img:nth-child('+(curPicIndex%picNum+1)+')').css({
                left:pageWidth*direction,
                zIndex:'1'
            }).animate({
                left:'0'
            },700,function(){
                $(this).css({
                    zIndex:0
                });
                isAnimate=true;
            })
        }
    }


    setInterval(function (){
        AutoAnimate();
    },5000);


    $('.banner_right').mousedown(function () {
        AutoAnimate();

    });

    $('.banner_left').mousedown(function () {
        AutoAnimate(true);
    });





    $('.block_a_left_nav').click(function(){
        $('.block_a_left_nav.active').removeClass('active');
        $(this).addClass('active');

        var i = $(this).index();

        $('.block_a_right_content.active').removeClass('active');
        $('.block_a_right_content').eq(i).addClass('active');

    });

</script>