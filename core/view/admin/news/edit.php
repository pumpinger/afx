<div class="x-alert-quote">新闻动态</div>


<div class="content_box">


<a class="x-button x-button-serious" href="<?php echo adminU('news', 'list') ?>">返回列表</a>

</div>

<form class="x-form">
    <input type="hidden" value="<?php echo $this->data['id']; ?>" name='id'>
    <div class="x-form-item">
        <span class="x-form-key">标题: </span>
        <div class="x-form-value"><input type="text" name="title" placeholder="" value="<?php echo $this->data['title'] ?>"></div>
    </div>
    <div class="x-form-item">
        <span class="x-form-key">时间: </span>
        <div class="x-form-value">
            <input type="text" class="x-time"  x-time-format="dd/MM/yyyy"  x-time-input=".time-value"  placeholder="例如:23/11/2017" value="<?php echo date('d/m/Y',$this->data['time']); ?>">
            <input type="hidden" name='time' class="time-value"  value="<?php echo $this->data['time'] ?>">
        </div>
    </div>
    <div class="x-form-item">
        <span class="x-form-key">来源: </span>
        <div class="x-form-value"><input type="text" name="source" placeholder="" value="<?php echo $this->data['source'] ?>"></div>
    </div>
    <div class="x-form-item">
        <span class="x-form-key">类型: </span>
        <div class="x-form-value">

            <?php foreach ($this->type as $type): ?>
                <label><input name="type" type="radio" value="<?php echo $type['id'] ?>" <?php echo ($this->data['type'] == $type['id'])?'checked':''; ?> ><span><?php echo $type['name'] ?></span></label>
            <?php endforeach; ?>
        </div>
    </div>


    <div  class="x-form-item">
        <span class="x-form-key">内容:</span>


        <div class="x-form-value">

            <script id="myEditor" name="content" type="text/plain" >
                <?php echo $this->data['content'] ?>
            </script>


        </div>
    </div>


    <div class="x-form-item">
        <span class="x-form-key"></span>
        <div class="x-form-value">
            <div class="x-button x-button-success submit">提交</div>
        </div>

    </div>
    <div class="x-form-item x-form-item-error">
        <span class="x-form-key"></span>
        <div class="x-form-value">
            <p>错误信息</p>
        </div>
    </div>
</form>




<script type="text/javascript">
    //    $(function(){
    $(function (){
        window.ue = UE.getEditor('myEditor', {
            /* 传入配置参数,可配参数列表看umeditor.config.js */
            initialFrameWidth:'1000'
        });
    });

</script>
<script>



    $('.submit').click(function (){
        xFormSubmit({
            form:$('.x-form'),
            success:function (data){
                var json  = data;

                if(json.ok){
                    window.location.href = '<?php echo adminU('news', 'list')?>';
                }
            },
            url:'<?php echo adminU('news','save')?>'
        });
    });

</script>
