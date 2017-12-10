

<div class="x-alert-quote">加入我们</div>



<div class="content_box">

    <a class="x-button x-button-serious" href="<?php echo adminU('join', 'edit') ?>">新增招聘</a>


    <table class="x-table">
        <thead align="center">
            <tr>
                <th>ID</th>
                <th>工作岗位</th>
                <th>类型</th>
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
                <td><?php echo joinModel::intance()->type[$v['type']] ?></td>
                <td><?php echo date('Y-m-d H:i:s',$v['update_time']) ?></td>
                <td>
                    <a class="x-button x-button-serious" href="<?php echo adminU('join', 'edit',array(
                        'id'=>$v['id']
                    )) ?>">编辑</a>
                    <a class="x-button x-button-warning ajax-del" data-url="<?php echo adminU('join', 'del',array(
                        'id'=>$v['id']
                    )) ?>"> 删除</a>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>



</div>


