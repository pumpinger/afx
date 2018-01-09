
<style>



    .photograph {background: url('<?php echo $this->pic?>') no-repeat;background-size: cover;}




    .x-page {margin-top: 20px;}
    .x-page-total {display: inline-block;}
    .x-page-pages {display: inline-block;float: right;}
    .x-page-pages li{display: inline-block;}
    .x-page-pages .x-active{color:#00a2d4;}


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

                <?php foreach ($this->typeArr as $type): ?>
                    <a  href="<?php echo U('news','index',array('type'=>$type['id'])) ?>" class="block_a_left_nav <?php echo $type['id'] == $this->type?'active':''; ?>">
                        <span>></span><?php echo $type['name'] ?>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="block_a_right">
            <div class="block_a_right_contents">
                    <div class="block_a_right_content active">

                        <?php foreach ($this->page->data as $v): ?>


                            <?php
                                $v['time'] = date('d/m/Y',$v['time'])
                            ?>

                            <a class="block_a_right_item" href="<?php echo U('news','detail',array('id'=>$v['id'])) ?>">
                                <p class="block_a_right_item_title"><span><?php echo mb_substr($v['time'],0,2) ?></span><?php echo mb_substr($v['time'], 2) ?></p>
                                <p class="block_a_right_item_p"><?php echo $v['title'] ?></p>
                            </a>


                        <?php endforeach; ?>


                        <div class="x-page">
                            <div class="x-page-total">共有<?php echo $this->page->count;?>条信息</div>
                            <div class="x-page-pages">
                                <ul>
                                    <?php foreach ($this->page->page as $v): ?>

                                        <li class="<?php echo  ($v==$this->page->curPage)?'x-active':'';?>">
                                            <?php if(is_int($v)):?>
                                                <a href="<?php echo U('news','index',array('page'=>$v));?>"><?php echo $v;?></a>
                                            <?php else:?>
                                                <span><?php echo $v; ?></span>
                                            <?php endif;?>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                        </div>



                    </div>



            </div>
        </div>
    </div>
</div>


