
<style>



        .photograph {background: url('<?php echo $this->pic?>') no-repeat;background-size: cover;}

</style>

<div class="photograph">


</div>



<div class="block_a">
        <div class="block_a_center">
                <div class="block_a_left">
                        <div class="block_a_left_title">
                                <div><?php echo L('about_us') ?></div>
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
                                                                <div class="block_a_list">
                                                                        <p class="block_a_list_title"><?php echo $v['title'] ?></p>
                                                                        <div class="block_a_list_content"><?php echo $v['content'] ?></div>
                                                                </div>
                                                        <?php endif;?>
                                                <?php endforeach; ?>

                                        </div>

                                        <?php $isFirst = false; ?>
                                <?php endforeach; ?>




                        </div>
                </div>
        </div>
</div>