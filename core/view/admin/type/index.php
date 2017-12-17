

<div class="x-alert-quote"><?php echo $this->module_name ?>分类</div>



<div class="content_box">

    <a class="x-button x-button-serious" href="<?php echo adminU('type', 'edit',array(
        'module'=> $this->module
    )) ?>">新增分类</a>


    <table class="x-table">
        <thead align="center">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody align="center">


        <?php $i = 0; ?>
        <?php foreach ($this->data as $v): ?>
            <?php $i++; ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $v['name'] ?></td>
                <td>
                    <a class="x-button x-button-serious" href="<?php echo adminU('type', 'edit',array(
                        'id'=>$v['id']
                    )) ?>">编辑</a>
                    <a class="x-button x-button-success ajax-op" data-url="<?php echo adminU('type', 'top',array(
                        'id'=>$v['id']
                    )) ?>"> 置顶</a>
                    <a class="x-button x-button-warning ajax-del" data-url="<?php echo adminU('type', 'del',array(
                        'id'=>$v['id']
                    )) ?>"> 删除</a>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>



</div>


