<div class="x-alert-quote">分类</div>


<div class="content_box">


<a class="x-button x-button-serious" href="<?php echo adminU('type',$this->module_name) ?>">返回列表</a>

</div>

<form class="x-form">
    <input type="hidden" value="<?php echo $this->data['id']; ?>" name='id'>
    <input type="hidden" value="<?php echo $this->module; ?>" name='module'>
    <div class="x-form-item">
        <span class="x-form-key">分类名: </span>
        <div class="x-form-value"><input type="text" name="name" placeholder="" value="<?php echo $this->data['name'] ?>"></div>
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
                    window.location.href = '<?php echo adminU('type', $this->module_name)?>';
                }
            },
            url:'<?php echo adminU('type','save')?>'
        });
    });

</script>
