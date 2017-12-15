
<style>



    .photograph {background: url('<?php echo $this->pic?>') no-repeat;}



</style>

<div class="photograph">


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

                    <?php foreach ($this->company as $v): ?>
                        <a class="block_a_right_item" href="<?php echo U('news','detail',array('id'=>$v['id'])) ?>">
                            <p class="block_a_right_item_title"><span><?php echo mb_substr($v['time'],0,2) ?></span><?php echo mb_substr($v['time'], 2) ?></p>
                            <p class="block_a_right_item_p"><?php echo $v['title'] ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="block_a_right_content">
                    <?php foreach ($this->industry as $v): ?>
                        <a class="block_a_right_item" href="<?php echo U('news','detail',array('id'=>$v['id'])) ?>">
                            <p class="block_a_right_item_title"><span><?php echo mb_substr($v['time'],0,2) ?></span><?php echo mb_substr($v['time'], 2) ?></p>
                            <p class="block_a_right_item_p"><?php echo $v['title'] ?></p>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $('.block_a_left_nav').click(function(){
        $('.block_a_left_nav.active').removeClass('active');
        $(this).addClass('active');

        var i = $(this).index();

        $('.block_a_right_content.active').removeClass('active');
        $('.block_a_right_content').eq(i).addClass('active');

    });
</script>