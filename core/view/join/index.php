
<style>



    .block_d_list {cursor: text;}
    .block_d_list_title {font-size: 18px;}

    .photograph {background: url('<?php echo PUBLIC_PATH ?>img/p4.png') no-repeat;}



</style>

<div class="photograph">


</div>




<div class="block_d">
    <div class="block_d_left">
        <div class="block_d_name"><?php echo L('campus_recruitment') ?></div>
        <div class="block_d_lists">
            <?php foreach ($this->school as $v): ?>
                <div class="block_d_list">
                    <p class="block_d_list_title"><?php echo $v['title'] ?></p>
                    <div class="block_d_list_content"><?php echo $v['content'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="block_d_right">
        <div class="block_d_name"><?php echo L('social_recruitment') ?></div>
        <div class="block_d_lists">
            <?php foreach ($this->society as $v): ?>
                <div class="block_d_list">
                    <p class="block_d_list_title"><?php echo $v['title'] ?></p>
                    <div class="block_d_list_content"><?php echo $v['content'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>