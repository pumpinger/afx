
<style>


    .photograph {background: url('<?php echo $this->pic?>') no-repeat;background-size: cover;}

    .block_c_title {text-align: center;}

</style>

<div class="photograph">


</div>


<div class="crumbs">
    <a href="<?php echo U('news') ?>">新闻动态</a>>
    <a href="<?php echo '' ?>"><?php echo $this->data['title'] ?></a>
</div>


<div class="block_c">

            <h2 class="block_c_title"><?php echo $this->data['title'] ?></h2>
            <p class="block_c_time">
                <?php if($this->data['source']):?>
                    <?php echo L('source') ?>:<?php echo $this->data['source'] ?>
                    &nbsp;&nbsp;&nbsp;
                <?php endif;?>
                <?php echo L('time') ?>:<?php echo $this->data['time'] ?></p>
            <div class="block_c_content"><?php echo $this->data['content'] ?></div>

</div>