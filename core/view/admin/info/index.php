<style>


    .file_item {width: 100px;text-align: center;}
    .file_del {display: inline-block;margin-top: 5px;}
</style>

<div class="x-alert-quote">联系方式</div>


<form class="x-form">


    <input type="hidden" value="<?php echo $this->data[0]['id']; ?>" name='id'>



    <div class="x-form-item">
        <span class="x-form-key"><?php echo $this->data[0]['name'] ?></span>
        <div class="x-form-value">
            <script id="myEditor" name="content" type="text/plain" >
                <?php echo $this->data[0]['content'] ?>
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
                    alert('保存成功');
                }
            },
            url:'<?php echo adminU('info','save')?>'
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