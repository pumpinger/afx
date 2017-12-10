<div class="x-alert-quote">关于我们</div>


<div class="content_box">


<a class="x-button x-button-serious" href="<?php echo adminU('about', 'list') ?>">返回列表</a>

</div>

<form class="x-form">
    <input type="hidden" value="<?php echo $this->data['id']; ?>" name='id'>
    <div class="x-form-item">
        <span class="x-form-key">板块名: </span>
        <div class="x-form-value"><input type="text" name="title" placeholder="" value="<?php echo $this->data['title'] ?>"></div>
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


<script>

    $('.submit').click(function (){
        xFormSubmit({
            form:$('.x-form'),
            success:function (data){
                var json  = $.parseJSON(data);

                if(json.ok){
                    window.location.href = '<?php echo adminU('about', 'list')?>';
                }
            },
            url:'<?php echo adminU('about','save')?>'
        });
    });

</script>

<script type="text/javascript">
    //    $(function(){
    $(function (){
        window.ue = UE.getEditor('myEditor', {
            /* 传入配置参数,可配参数列表看umeditor.config.js */
            initialFrameWidth:'1000'
        });
    });

</script>