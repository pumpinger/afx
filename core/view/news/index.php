
<style>



    .photograph {background: url('<?php echo PUBLIC_PATH ?>img/p5.png') no-repeat;}



</style>

<div class="photograph">


</div>


<div class="block_d">
    <div class="block_d_left">
        <div class="block_d_name"><?php echo L('company_dynamic') ?></div>
        <div class="block_d_lists">
            <?php foreach ($this->company as $v): ?>
                <a class="block_d_list" href="<?php echo U('news','detail',array('id'=>$v['id'])) ?>">
                    <p class="block_d_list_title"><?php echo $v['time'] ?></p>
                    <p class="block_d_list_p"><?php echo $v['title'] ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="block_d_right">
        <div class="block_d_name"><?php echo L('trade_news') ?></div>
        <div class="block_d_lists">
            <?php foreach ($this->industry as $v): ?>
                <a class="block_d_list" href="<?php echo U('news','detail',array('id'=>$v['id'])) ?>">
                <p class="block_d_list_title"><?php echo $v['time'] ?></p>
                    <p class="block_d_list_p"><?php echo $v['title'] ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </div>


</div>