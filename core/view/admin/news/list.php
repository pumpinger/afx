

<div class="x-alert-quote">新闻动态</div>



<div class="content_box">

    <a class="x-button x-button-serious" href="<?php echo adminU('news', 'edit') ?>">新增新闻</a>


    <table class="x-table">
        <thead align="center">
            <tr>
                <th>ID</th>
                <th>标题</th>
                <th>新闻时间</th>
                <th>类型</th>
                <th>来源</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody align="center">


        <?php $i = 0; ?>
        <?php foreach ($this->data as $v): ?>
            <?php $i++; ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $v['title'] ?></td>
                <td><?php echo $v['time'] ?></td>
                <td><?php echo $this->type[$v['type']] ?></td>
                <td><?php echo $v['source'] ?></td>
                <td><?php echo date('Y-m-d H:i:s',$v['update_time']) ?></td>
                <td>
                    <a class="x-button x-button-serious" href="<?php echo adminU('news', 'edit',array(
                        'id'=>$v['id']
                    )) ?>">编辑</a>
                    <a class="x-button x-button-warning ajax-del" data-url="<?php echo adminU('news', 'del',array(
                        'id'=>$v['id']
                    )) ?>"> 删除</a>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>



</div>


