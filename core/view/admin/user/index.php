<div class="x-alert-quote">修改密码</div>


<form class="x-form">
    <div class="x-form-item">
        <span class="x-form-key">原密码: </span>
        <div class="x-form-value"><input type="password" name="old_pwd" placeholder="" ></div>
    </div>

    <div class="x-form-item">
        <span class="x-form-key">新密码: </span>
        <div class="x-form-value"><input type="password" name="new_pwd" placeholder="" ></div>
    </div>


    <div class="x-form-item">
        <span class="x-form-key">确认新密码: </span>
        <div class="x-form-value"><input type="password" name="new_pwd2" placeholder="" ></div>
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
        var form = $('.x-form');
        var url = "<?php echo adminU('user','save')?>";

        var data = form.serializeArray();

        $.ajax({
            url: url,
            data:data,
            dataType:'json',
            success: function(data){
                if(data.ok){
                    alert('修改成功');
                    xFormError();
                }else{
                    xFormError(data.msg);
                }
            },
            error: function (status,msg){
                xFormError(msg,status);
            }
        });
    });

</script>
