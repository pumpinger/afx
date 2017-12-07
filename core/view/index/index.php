
<div class="banner">
    <div class="banner_left">
        <img src="<?php echo PUBLIC_PATH ;?>img/left.png">
    </div>
    <div class="banner_right">
        <img src="<?php echo PUBLIC_PATH ;?>img/right.png">
    </div>
    <div class="banner_center">
        <div class="banner_pic">
            <img class="first"  src="<?php echo PUBLIC_PATH ;?>img/1.jpg" />
            <img  src="<?php echo PUBLIC_PATH ;?>img/2.jpeg" />
        </div>
    </div>
</div>

<div class="block_a">
    <div class="block_a_center">
        <div class="block_a_left">
            <div class="block_a_left_title">
                <div>新闻中心</div>
            </div>
            <div class="block_a_left_navs">
                <div class="block_a_left_nav active">
                    <span>></span>公司动态
                </div>
                <div class="block_a_left_nav">
                    <span>></span>行业新闻
                </div>
            </div>
        </div>
        <div class="block_a_right">
            <div class="block_a_right_contents">
                <div class="block_a_right_content active">
                    <div class="block_a_right_item">
                        <p class="block_a_right_item_title"><span>23</span>/11/2016</p>
                        <p class="block_a_right_item_p">大数据尚处于早期发展阶段，如何判断大数据公司的变现能力？</p>
                    </div>
                    <div class="block_a_right_item">
                        <p class="block_a_right_item_title"><span>03</span>/11/2016</p>
                        <p class="block_a_right_item_p">硅谷一周融资速报：15 家公司获总计超 11.3 亿美元融资</p>
                    </div>
                    <div class="block_a_right_item">
                        <p class="block_a_right_item_title"><span>23</span>/11/2016</p>
                        <p class="block_a_right_item_p">大数据尚处于早期发展阶段，如何判断大数据公司的变现能力？</p>
                    </div>
                    <div class="block_a_right_item">
                        <p class="block_a_right_item_title"><span>11</span>/11/2016</p>
                        <p class="block_a_right_item_p">硅谷一周融资速报：15 家公司获总计超 11.3 亿美元融资</p>
                    </div>
                    <div class="block_a_right_more">查看更多>></div>
                </div>
                <div class="block_a_right_content">
                    <div class="block_a_right_item">
                        <p class="block_a_right_item_title"><span>21</span>/11/2016</p>
                        <p class="block_a_right_item_p">大数据尚处于早期发展阶段，如何判断大数据公司的变现能力？</p>
                    </div>
                    <div class="block_a_right_item">
                        <p class="block_a_right_item_title"><span>01</span>/11/2016</p>
                        <p class="block_a_right_item_p">硅谷一周融资速报：15 家公司获总计超 11.3 亿美元融资</p>
                    </div>
                    <div class="block_a_right_item">
                        <p class="block_a_right_item_title"><span>21</span>/11/2016</p>
                        <p class="block_a_right_item_p">大数据尚处于早期发展阶段，如何判断大数据公司的变现能力？</p>
                    </div>
                    <div class="block_a_right_item">
                        <p class="block_a_right_item_title"><span>14</span>/11/2016</p>
                        <p class="block_a_right_item_p">硅谷一周融资速报：15 家公司获总计超 11.3 亿美元融资</p>
                    </div>
                    <div class="block_a_right_more">查看更多>></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block_b">
    <div class="block_b_center">
        <div class="block_b_title">业务领域</div>
        <div class="block_b_content">
            <a><img src="<?php echo PUBLIC_PATH ;?>img/b1.png" /></a>
            <a><img src="<?php echo PUBLIC_PATH ;?>img/b2.png" /></a>
            <a><img src="<?php echo PUBLIC_PATH ;?>img/b1.png" /></a>
            <a><img src="<?php echo PUBLIC_PATH ;?>img/b2.png" /></a>
        </div>
    </div>
    <div class="block_b_more">更多案例>></div>
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
            curPicIndex++;
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


    setInterval(function (){
        AutoAnimate();
    },5000);


    $('.banner_right').mousedown(function () {
        AutoAnimate();

    });

    $('.banner_left').mousedown(function () {
        AutoAnimate(true);
    });





    $('.block_a_left_nav').click(function(){
        $('.block_a_left_nav.active').removeClass('active');
        $(this).addClass('active');

        var i = $(this).index();

        $('.block_a_right_content.active').removeClass('active');
        $('.block_a_right_content').eq(i).addClass('active');

    });

</script>