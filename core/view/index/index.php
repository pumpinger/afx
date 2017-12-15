
<div class="banner">
    <div class="banner_left">
        <img src="<?php echo PUBLIC_PATH ;?>img/left.png">
    </div>
    <div class="banner_right">
        <img src="<?php echo PUBLIC_PATH ;?>img/right.png">
    </div>
    <div class="banner_center">
        <div class="banner_pic">


            <?php $isFirst = true; ?>
            <?php foreach ($this->banner as $v): ?>

                <img  class="<?php echo $isFirst ? 'first' : ''; ?>" src="<?php echo $v['pic'] ?>" />
                <?php $isFirst = false;?>

            <?php endforeach; ?>
        </div>

        <?php $isFirst = true; ?>
        <div class="banner_pic_point">
            <?php foreach ($this->banner as $v): ?>
                <b class="<?php echo $isFirst ? 'active' : ''; ?>" >·</b>
                <?php $isFirst = false;?>
            <?php endforeach; ?>
        </div>
    </div>
</div>





<script>
    var pageWidth=1920;
    var picNum=$('.banner_pic img').length;
    var curPicIndex=999*picNum; //懒得判断负数
    var isAnimate=true;

    function AutoAnimate(is_prev){


        var direction = 1;
        if(is_prev){
            direction = -1;
        }

        if(isAnimate){
            isAnimate=false;

            $('.banner_pic img:nth-child('+(curPicIndex%picNum+1)+')').animate({
                left:-pageWidth*direction/2
            },700,function(){
                $(this).css({
                    left:pageWidth
                });
            });


            if(is_prev){
                curPicIndex--;
            }else{
                curPicIndex++;
            }

            $('.banner_pic_point .active').removeClass('active');
            $('.banner_pic_point b:nth-child('+(curPicIndex%picNum+1)+')').addClass('active');

            $('.banner_pic img:nth-child('+(curPicIndex%picNum+1)+')').css({
                left:pageWidth*direction,
                zIndex:'1'
            }).animate({
                left:'0'
            },700,function(){
                $(this).css({
                    zIndex:0
                });
                isAnimate=true;
            })
        }
    }

    $('.banner_pic img').click(function (){
        AutoAnimate();
    });



    $('.banner_right').mousedown(function () {
        AutoAnimate();

    });

    $('.banner_left').mousedown(function () {
        AutoAnimate(true);
    });






</script>