<style>


    .file_item {width: 100px;text-align: center;}
    .file_del {display: inline-block;margin-top: 5px;}
</style>

<div class="x-alert-quote">二维码</div>


<form class="x-form">

    <?php foreach ($this->data as $value): ?>
        <div class="x-form-item">
            <span class="x-form-key"><?php echo $value['name'] ?></span>
            <div class="x-form-value">
                <!--用来存放item-->
                <div class="file_picker" id="filePicker_<?php echo $value['id']?>">选择图片</div>
                <div class="file_list file_list_<?php echo $value['id']?>">
                    <div class="file_item">
                        <img src="<?php echo $value['pic'] ?>" alt="" width="100" height="100">
                    </div>
                </div>
                <input class="fileInput" type="hidden" name="qr[<?php echo $value['id']?>]" value="<?php echo $value['value'] ?>">

                <script>


                    $(function (){
                        // 初始化Web Uploader
                        var uploader<?php echo $value['id']?> = WebUploader.create({
                            // 选完文件后，是否自动上传。
                            auto: true,
                            // swf文件路径
                            swf: '/js/Uploader.swf',
                            // 文件接收服务端。
                            server: './index.php?c=upload',
                            // 选择文件的按钮。可选。
                            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                            pick: {
                                id:'#filePicker_<?php echo $value['id']?>',
                                multiple:false
                            },
                            // 只允许选择图片文件。
                            accept: {
                                title: 'Images',
                                extensions: 'gif,jpg,jpeg,bmp,png',
                                mimeTypes: 'image/*'
                            }
                        });
                        uploader<?php echo $value['id']?>.on( 'fileQueued', function( file ) {
                            var $li = $(
                                    '<div id="' + file.id + '" class="file_item">' +
                                    '<img>' +
                                    '</div>'
                                ),
                                $img = $li.find('img');

                            // $list为容器jQuery实例
                            $('.file_list_<?php echo $value['id']?>').html( $li );


                            uploader<?php echo $value['id']?>.makeThumb( file, function( error, src ) {
                                if ( error ) {
                                    $img.replaceWith('<span>不能预览</span>');
                                    return;
                                }

                                $img.attr( 'src', src );
                            }, 100, 100 );
                        });
                        // 文件上传过程中创建进度条实时显示。
                        uploader<?php echo $value['id']?>.on( 'uploadProgress', function( file, percentage ) {
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
                        uploader<?php echo $value['id']?>.on( 'uploadSuccess', function( file,response  ) {
//                $( '#'+file.id ).addClass('file_done');



                            if(!response.url){

                                var $li = $( '#'+file.id ),
                                    $error = $li.find('div.file_error');
                                if ( !$error.length ) {
                                    $error = $('<div class="file_error"></div>').appendTo( $li );
                                }
                                $error.text('上传失败');
                            }else{
                                $('[name="qr[<?php echo $value['id']?>]"]').val(response.url);
                            }

                        });

                        // 文件上传失败，显示上传出错。
                        uploader<?php echo $value['id']?>.on( 'uploadError', function( file ) {
                            var $li = $( '#'+file.id ),
                                $error = $li.find('div.file_error');

                            // 避免重复创建
                            if ( !$error.length ) {
                                $error = $('<div class="file_error"></div>').appendTo( $li );
                            }

                            $error.text('上传失败');
                        });

                        // 完成上传完了，成功或者失败，先删除进度条。
                        uploader<?php echo $value['id']?>.on( 'uploadComplete', function( file ) {
                            var $li = $( '#'+file.id );
                            $( '#'+file.id ).find('.file_progress').remove();
                            $('<div class="file_info">'+file.name+'</div>')
                                .appendTo( $li );
                        });
                    });


                </script>

            </div>

        </div>
    <?php endforeach; ?>




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
                var json  = data;

                if(json.ok){
                    alert('保存成功');
                }
            },
            url:'<?php echo adminU('qr','save')?>'
        });
    });

</script>
