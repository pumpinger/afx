
<style>



    .photograph {background: url('<?php echo $this->pic?>') no-repeat;background-size: cover;}



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

                <?php $isFirst = true; ?>
                <?php foreach ($this->type as $type): ?>
                    <div class="block_a_left_nav <?php echo $isFirst?'active':''; ?>">
                        <span>></span><?php echo $type['name'] ?>
                    </div>
                    <?php $isFirst = false; ?>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="block_a_right">
            <div class="block_a_right_contents">

                <?php $isFirst = true; ?>
                <?php foreach ($this->type as $type): ?>


                    <div class="block_a_right_content <?php echo $isFirst?'active':''; ?>">

                        <?php foreach ($this->res as $v): ?>
                            <?php if($v['type'] == $type['id']):?>
                                <a class="block_a_right_item" href="<?php echo U('news','detail',array('id'=>$v['id'])) ?>">
                                    <p class="block_a_right_item_title"><span><?php echo mb_substr($v['time'],0,2) ?></span><?php echo mb_substr($v['time'], 2) ?></p>
                                    <p class="block_a_right_item_p"><?php echo $v['title'] ?></p>
                                </a>
                            <?php endif;?>
                        <?php endforeach; ?>

                    </div>

                    <?php $isFirst = false; ?>
                <?php endforeach; ?>


            </div>
        </div>
    </div>
</div>


