<div class="x-alert-quote">业务领域</div>


<div class="content_box">


<a class="x-button x-button-serious" href="<?php echo adminU('business', 'list') ?>">返回列表</a>

</div>

<form class="x-form">
    <input type="hidden" value="<?php echo $this->data['id']; ?>" name='id'>
    <div class="x-form-item">
        <span class="x-form-key">板块名: </span>
        <div class="x-form-value"><input type="text" name="title" placeholder="" value="<?php echo $this->data['title'] ?>"></div>
    </div>


    <div class="x-form-item">
        <span class="x-form-key">类型: </span>
        <div class="x-form-value">

            <?php foreach ($this->type as $type): ?>
                <label><input name="type" type="radio" value="<?php echo $type['id'] ?>"  <?php echo ($this->data['type'] == $type['id'])?'checked':''; ?>><span><?php echo $type['name'] ?></span></label>
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


    $(function (){
        // 初始化Web Uploader
        var uploader = WebUploader.create({
            // 选完文件后，是否自动上传。
            auto: true,
            // swf文件路径
            swf: '/js/Uploader.swf',
            // 文件接收服务端。
            server: './index.php?c=upload',
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: {
                id:'#filePicker',
                multiple:false
            },
            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });
        uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                    '<div id="' + file.id + '" class="file_item">' +
                    '<img>' +
                    '</div>'
                ),
                $img = $li.find('img');

            // $list为容器jQuery实例
            $('.file_list').html( $li );


            uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }

                $img.attr( 'src', src );
            }, 100, 100 );
        });
        // 文件上传过程中创建进度条实时显示。
        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                $percent = $li.find('.file_progress span');

            // 避免重复创建
            if ( !$percent.length ) {
                $percent = $('<p class="file_progress"><span></span></p>')
                    .appendTo( $li )
                    .find('span');
            }

            $percent.css( 'width', percentage * 100 + '%' );
        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on( 'uploadSuccess', function( file,response  ) {
//                $( '#'+file.id ).addClass('file_done');



            if(!response.url){

                var $li = $( '#'+file.id ),
                    $error = $li.find('div.file_error');
                if ( !$error.length ) {
                    $error = $('<div class="file_error"></div>').appendTo( $li );
                }
                $error.text('上传失败');
            }else{
                $('[name="pic"]').val(response.url);
            }

        });

        // 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file ) {
            var $li = $( '#'+file.id ),
                $error = $li.find('div.file_error');

            // 避免重复创建
            if ( !$error.length ) {
                $error = $('<div class="file_error"></div>').appendTo( $li );
            }

            $error.text('上传失败');
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            var $li = $( '#'+file.id );
            $( '#'+file.id ).find('.file_progress').remove();
            $('<div class="file_info">'+file.name+'</div>')
                .appendTo( $li );
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
                    window.location.href = '<?php echo adminU('business', 'list')?>';

                }
            },
            url:'<?php echo adminU('business','save')?>'
        });
    });

</script>