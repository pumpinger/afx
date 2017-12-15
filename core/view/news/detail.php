
<style>


    .block_c_title {text-align: center;}
    .photograph {background: url('<?php echo $this->pic?>') no-repeat;}



</style>

<div class="photograph">


</div>


<div class="block_c">

    <div class="block_c">

            <h2 class="block_c_title"><?php echo $this->data['title'] ?></h2>
            <p class="block_c_time"><?php echo L('time') ?>:<?php echo $this->data['time'] ?></p>
            <div class="block_c_content"><?php echo $this->data['content'] ?></div>

    </div>

</div>