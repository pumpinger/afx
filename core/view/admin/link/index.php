<div class="x-alert-quote">友情链接</div>

<div class="content_box">

    <span class="x-button x-button-serious  link_add">新增</span>

</div>

<form class="x-form">


    <div class="x-form-item">
        <div class="x-form-value">
            <div class="links">
                <?php foreach ($this->data as $value): ?>

                    <div class="link">
                        网站名：<input type="text" name="name[]" placeholder="" value="<?php echo $value['name'] ?>"/>
                        地址：<input type="text" name="link[]" placeholder="http://xxx.xx" value="<?php echo $value['link'] ?>"/>
                        <span  class="x-button x-button-warning link_del">删除</span>
                    </div>

                <?php endforeach; ?>
            </div>
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

    $('.link_add').click(function (){

        var tmp ='<div class="link">'+
            '网站名：<input type="text" name="name[]" placeholder=""/> '+
            '地址：<input type="text" name="link[]" placeholder="http://xxx.xx" /> '+
            '<span  class="x-button x-button-warning link_del">删除</span> '+
            '</div>';

        $('.links').append(tmp);
    });


    $('body').on('click','.link_del',function (){
        $(this).parent('.link').remove();

    });


    $('.submit').click(function (){
        xFormSubmit({
            form:$('.x-form'),
            success:function (data){
                var json  = $.parseJSON(data);

                if(json.ok){
                    alert('保存成功');
                }
            },
            url:'<?php echo adminU('link','save')?>'
        });
    });

</script>
