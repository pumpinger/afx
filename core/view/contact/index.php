
<style>

        .photograph {background: url('<?php echo $this->pic?>') no-repeat;}


</style>

<div class="photograph">


</div>


<div class="block_c">
    <?php foreach ($this->data as $v): ?>
        <h2 class="block_c_title"><?php echo $v['title'] ?></h2>
        <div class="block_c_content"><?php echo $v['content'] ?></div>
    <?php endforeach; ?>

</div>