<style>


    .file_item {width: 100px;text-align: center;}
    .file_del {display: inline-block;margin-top: 5px;}
</style>

<div class="x-alert-quote">首页大图</div>


<form class="x-form">


    <div class="x-form-item">
        <div class="x-form-value">
                <!--用来存放item-->
                <div class="file_picker" id="filePicker">添加图片</div>
                <div class="file_list">

                    <?php foreach ($this->data as $v): ?>
                        <div class="file_item">

                            <img src="<?php echo $v['pic'] ?>" alt="" width="100" height="100">
                            <input class="fileInput" type="hidden" name="pic[]" value="<?php echo $v['pic'] ?>">
                            <div class="file_del x-button x-button-warning">删除</div>
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
            $('.file_list').append( $li );


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
            var $li = $( '#'+file.id ),
                $error = $li.find('div.file_error');
            if(!response.url){


                if ( !$error.length ) {
                    $error = $('<div class="file_error"></div>').appendTo( $li );
                }
                $error.text('上传失败');
            }else{
                $li.append('<input class="fileInput" type="hidden" name="pic[]" value="'+response.url+'">');
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
            $('<div class="file_del x-button x-button-warning">删除</div>')
                .appendTo( $li );
        });
    });

    $('body').on('click','.file_del',function(){
        $(this).parent('.file_item').remove();
    })



</script>
<script>



    $('.submit').click(function (){
        xFormSubmit({
            form:$('.x-form'),
            success:function (data){
                var json  = data;

                if(json.ok){
                    alert('保存成功');
                }
            },
            url:'<?php echo adminU('banner','save')?>'
        });
    });

</script>
