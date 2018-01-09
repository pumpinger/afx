

<div class="x-alert-quote">联系我们</div>



<div class="content_box">

    <a class="x-button x-button-serious" href="<?php echo adminU('contact', 'edit') ?>">新增板块</a>


    <table class="x-table">
        <thead align="center">
            <tr>
                <th>ID</th>
                <th>标题</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody align="center">


        <?php $i = 0; ?>
        <?php foreach ($this->page->data as $v): ?>
            <?php $i++; ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $v['title'] ?></td>
                <td><?php echo date('Y-m-d H:i:s',$v['update_time']) ?></td>
                <td>
                    <a class="x-button x-button-serious" href="<?php echo adminU('contact', 'edit',array(
                        'id'=>$v['id']
                    )) ?>">编辑</a>
                    <a class="x-button x-button-warning ajax-del" data-url="<?php echo adminU('contact', 'del',array(
                        'id'=>$v['id']
                    )) ?>"> 删除</a>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="x-page">
        <div class="x-page-total">共有<?php echo $this->page->count;?>条信息</div>
        <div class="x-page-pages">
            <ul>
                <?php foreach ($this->page->page as $v): ?>

                    <li class="<?php echo  ($v==$this->page->curPage)?'x-active':'';?>">
                        <?php if(is_int($v)):?>
                            <a href="<?php echo adminU('contact','list',array('page'=>$v));?>"><?php echo $v;?></a>
                        <?php else:?>
                            <span><?php echo $v; ?></span>
                        <?php endif;?>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>

</div>


