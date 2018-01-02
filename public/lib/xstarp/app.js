webpackJsonp([0],[
/* 0 */,
/* 1 */,
/* 2 */,
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * 测试入口
 * Created by Administrator on 2017/6/12.
 */




//   \$\((.*)\)\.click\(
//   \$('body').on('click',$1,


//css
__webpack_require__(4);
__webpack_require__(6);
__webpack_require__(5);
__webpack_require__(17);

__webpack_require__(10);
__webpack_require__(11);
__webpack_require__(8);


//style
__webpack_require__(27);
__webpack_require__(24);
__webpack_require__(20);
__webpack_require__(30);
__webpack_require__(28);


//plug
__webpack_require__(23);
__webpack_require__(25);
__webpack_require__(26);
__webpack_require__(31);


//fun
__webpack_require__(33);
__webpack_require__(19);
__webpack_require__(21);
__webpack_require__(22);



//wraps
__webpack_require__(29);
__webpack_require__(32);















// require('./components/test/test.js');





// require('./components/test/ilovesass.scss');
// require('./components/test/ilovesass2.scss');



// var color=['red','blue','yellow','green','grey','orange','purple','black','white','green','purple'];
// setInterval(function (){
//     var i=Math.floor(Math.random()*10);
//     $('body').css({
//         'background-color':color[i]
//     });
// },2000);


/***/ }),
/* 4 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 5 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 6 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 7 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 8 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 9 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 10 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 11 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 12 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 13 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 14 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 15 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 16 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 17 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 18 */
/***/ (function(module, exports) {

/**
 * Created by Administrator on 2017/1/6.
 */


// require('../format/format.js');



;(function () {

    window.getDomId = function (dom) {

        var id = $(dom).prop('id');

        if(  ! id ){

            id =  (new Date()).valueOf();
            id += '_'+$(dom).index();

            $(dom).prop('id',id);
        }

        return id;

    };



    window.xCommon = {
        getDomId: getDomId
    };

})();










/***/ }),
/* 19 */
/***/ (function(module, exports) {

/**
 * Created by Administrator on 2017/1/6.
 */


// require('../format/format.js');




;(function () {



    //todo  应该去  加载等待插件  require('../loading/loading.js');  还有弹窗



    $('body').on('click','.x-ajax-del',function(){
        $(".x-ajax-del").attr("disabled","disabled");
        var url = $(this).data('url');
        $.ajax({
            url: url,
            dataType: 'json',
            success: function(data){
                $(".x-ajax-del").removeAttr("disabled");
                if(data.ok ){//操作成功
                    // xPopUp('prompt',{content:'操作成功'},2000);

                    var refreshDomStr;
                    if($(this).data('refresh')){
                        refreshDomStr =$(this).data('refresh');
                    }else{
                        refreshDomStr ='.x-table';
                    }

                    var refreshUrl = location.href;
                    $.get(refreshUrl,function(data){
                        $(refreshDomStr).html($(data).find(refreshDomStr).html());
                    });

                }else{
                    // xPopUp('prompt',{content:'操作失败'},2000);
                }
            },
            error: function (data){
                $(".x-ajax-del").removeAttr("disabled");
                // xPopUp('prompt',{content:'操作失败'},2000);
            }
        });
    });
    $('body').on('click','.x-ajax-op',function(){
        $(".x-ajax-del").attr("disabled","disabled");
        var url = $(this).data('url');
        $.ajax({
            url: url,
            dataType: 'json',
            success: function(data){
                $(".x-ajax-del").removeAttr("disabled");

                if(data.ok === 'ok'){
                    // xPopUp('prompt',{content:'操作成功'},2000);
                }else{
                    $(".x-ajax-del").removeAttr("disabled");
                    // xPopUp('prompt',{content:'操作失败'},2000);
                }
            },
            error: function (){
                $(".x-ajax-del").removeAttr("disabled");
                xPopUp('prompt',{content:'操作失败'},2000);
            }
        });
    });

})();

/***/ }),
/* 20 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by Administrator on 2017/2/17.
 */

__webpack_require__(7);



$('body').on('click','.x-form-radio',function(){
    $(this).addClass('x-checked').siblings().removeClass('x-checked');
});

$('body').on('click','.x-form-checkbox',function(){
    console.log($(this).find("input").is(':checked'));
    if($(this).find("input").is(':checked')){
        $(this).addClass('x-checked');
    }else{
        $(this).removeClass('x-checked')
    }
});



$('body').on('click','.x-form-switch',function(){
    if($(this).find("input").is(':checked')){
        $(this).addClass('x-form-onswitch');
        $(this).find('span').text('开启');
    }else{
        $(this).removeClass('x-form-onswitch');
        $(this).find('span').text('关闭');
    }
});




//plug的表单




window.xFormSubmit = function (option) {


    var form = option.form;
    var success = option.success;
    var url = option.url?option.url:form.attr('action');

    var data = form.serializeArray();

    $.ajax({
        url: url,
        data:data,
        dataType:'json',
        type:'POST',
        success: function(data){
            success(data);
        },
        error: function (status,msg){
            xFormError(msg,status);
        }
    });
};

window.xFormError = function (msg) {
    if(msg){
        $('.x-form-item-error').show();
        $('.x-form-item-error p').html(msg);
    }else{
        $('.x-form-item-error').hide();

    }

};

/***/ }),
/* 21 */
/***/ (function(module, exports) {

/**
 * Created by Administrator on 2016/12/20.
 */

//格式化
window.xFormat={
    /**
     *     2016/06/06
     *     2016-06-06
     *     2016/06/06
     *     11:11:11
     *     11:11
     *     20160606
     *     2016 06 06
     */
    str2time:function(str){

        var res=str.replace(/-/g, "/");

        if(  res.indexOf("/")    == -1 ){
            if(  res.indexOf(":")    == -1 ){
                //纯年

                if(res.length == 8){
                    res=res.substr(0,4)+'/'+res.substr(4,2)+'/'+res.substr(6,2);
                }else{


                    var temp =res.substr(0,2);
                    if(  temp<100  &&  temp>30 ){
                        temp  = '19'+temp
                    }

                    if(  temp<30  &&  temp>0 ){
                        temp  = '20'+temp
                    }

                    res=temp+'/'+res.substr(2,2)+'/'+res.substr(4,2);

                }

            }else{
                //纯时间
                res='2016/06/06 '+res;

            }

        }else{
            //处理年
            var temp =res.split('/');
            if(  temp[0]<100  &&  temp[0]>30 ){
                temp[0]  = '19'+temp[0]
            }

            if(  temp[0]<30  &&  temp[0]>0 ){
                temp[0]  = '20'+temp[0]
            }
            res=temp[0]+'/'+temp[1]+'/'+temp[2];

        }


        res=new Date(Date.parse(res));


        if(res.getTime()){
            return  res.getTime()/1000;
        }else{
            return false;
        }



    },
    time2str:function(time){
        var   now=new   Date(time*1000);
        var   year=now.getFullYear();
        var   month=now.getMonth()+1;
        var   date=now.getDate();
        var   hour=now.getHours();
        var   minute=now.getMinutes();
        var   second=now.getSeconds();

        if(month  < 10){
            month=  '0' + month;
        }

        if(date  < 10){
            date=  '0' + date;
        }

        return   year+"-"+month+"-"+date+" "+hour+":"+minute+":"+second;
    },
    number2money:function (number,n) {
        n = n > 0 && n <= 20 ? n : 2;
        number = parseFloat((number + "").replace(/[^\d\.-]/g, "")).toFixed(n) + "";
        var l = number.split(".")[0].split("").reverse(),
            r = number.split(".")[1];
        var t = "";
        for(i = 0; i < l.length; i ++ )
        {
            t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "," : "");
        }
        return t.split("").reverse().join("") + "." + r;

    },
    number2word:function (number) {


    }
};




/***/ }),
/* 22 */
/***/ (function(module, exports) {

/**
 * Created by Administrator on 2017/1/6.
 */

// require('../format/format.js');


;(function () {

    var psecond = 1000,
        pminute = 60*psecond,
        phour = 60*pminute,
        pday = 24*phour,
        pweek = 7*pday;



    //每次运行为了一个值,这里把每个值都算了一遍

    function gettime(date) {
        var nowDate = date ? date : new Date();

        var time = nowDate.getTime(),
            msecond = nowDate.getMilliseconds(),
            second = nowDate.getSeconds(),
            minute = nowDate.getMinutes(),
            hour = nowDate.getHours(),
            dayWeek = nowDate.getDay(),
            dayMonth = nowDate.getDate(),
            month = nowDate.getMonth(),
            year = nowDate.getFullYear();

        var dayPass = hour*phour + minute*pminute + second*psecond + msecond,
            dayStart = time - dayPass,
            dayEnd = dayStart + pday,
            yesterdayStart = dayStart - pday,
            pastDayStart = time - pday;

        var weekPass = dayWeek * pday + dayPass,
            weekStart = time - weekPass,
            weekEnd = weekStart + pweek,
            lastWeekStart = weekStart - pweek,
            pastWeekStart = time - pweek;

        var monthStart = (new Date(year, month, 1)).getTime(),
            monthEnd = (new Date(year, month+1, 1)).getTime(),
            lastMonthStart = (new Date(year, month-1, 1)).getTime(),
            pastMonthStart = time - monthStart + lastMonthStart;

        var yearStart = (new Date(year, 0, 1)).getTime(),
            yearEnd = (new Date(year+1, 0, 1)).getTime(),
            lastYearStart = (new Date(year-1, 0, 1)).getTime(),
            pastYearStart = (new Date(time)).setFullYear(year-1);


        return {
            time: time,

            day: {
                start: dayStart,
                end: dayEnd
            },
            yesterday: {
                start: yesterdayStart,
                end: dayStart
            },
            pastDay: {
                start: pastDayStart,
                end: time
            },

            week: {
                start: weekStart,
                end: weekEnd
            },
            lastWeek: {
                start: lastWeekStart,
                end: weekStart
            },
            pastWeek: {
                start: pastWeekStart,
                end: time
            },

            month: {
                start: monthStart,
                end: monthEnd
            },
            lastMonth: {
                start: lastMonthStart,
                end: monthStart
            },
            pastMonth: {
                start: pastMonthStart,
                end: time
            },

            year: {
                start: yearStart,
                end: yearEnd
            },
            lastYear: {
                start: lastYearStart,
                end: yearStart
            },
            pastYear: {
                start: pastYearStart,
                end: time
            }
        }
    }

    window.xGetTime = gettime;

})();

/***/ }),
/* 23 */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/**
 * Created by Administrator on 2016/11/4.
 */


;(function (factory) {
    if (true) {
        // AMD. Register as an anonymous module.
        !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(0)], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
    } else {
        // Browser globals
        factory(jQuery);
    }
})(function ($) {
    var global, dialog, view, view_ctrl, ctrl_right, ctrl_left, ctrl_close, detail;
    var ctrl_magnify, ctrl_shrink, ctrl_rotate, ctrl_recover;   //放大缩小旋转回复 按钮

    var loading;   //等待图片
    var imgDom;   //imgDom
    var showWidth, showHeight;   //图像在view 中显示的宽高
    var imgs = [];   //要显示的图像们
    var infoDom;  //要显示的信息
    var imageObj = new Image(); //用来加载图片的对象
    var index = 1;   //展示第几个图片
    var maxWeight; //图片最大放大系数  //由于图片可能一show 就被缩小了  而我们的放大系数是针对原图大小
    var weight = 1;  //图片放大缩小系数
    var rotate = 0;  //图片旋转度数
    var isNotMove = true;   //拖拽图片时 不响应点击事件 的开关
    var dragTime;   //拖拽图片时 定时器
    var startX, startY;  //拖拽图片

    var zIndex;  //还未投入使用
    var onSwitch = function () {
    };  //切换图片的函数


    function calcuImgTop() {
        var offset = view.height() - imgDom.height();
        return offset / 2;
    }

    function calcuImgWH() {
//            //计算在view中的  图像的宽高  （可能是原图大小  可能是被max-height max-width 处理过的）
//            if(image.width>view.width()){
//                showWidth=view.width();
//                showHeight=image.height*view.width()/image.width;
//            }else if(image.height>view.height()){
//                showHeight=view.height();
//                showWidth=image.width*view.height()/image.height;
//            }else{
//                showHeight=image.height;
//                showWidth=image.width;
//            }
        showHeight = imgDom.height();
        showWidth = imgDom.width();
    }

    function dragImg(e) {
        var offsetY = startY - e.pageY;
        var offsetX = startX - e.pageX;

        imgDom.css('margin-top', -offsetY);
        imgDom.css('margin-left', -offsetX);
    }

    function bindEVent() {
        //图片读取
        imageObj.onload = function () {
            imgDom.show();
            loading.hide();
            imgDom.prop('src', imageObj.src);
            imgDom.css({
                'margin-top': calcuImgTop()
            });
            maxWeight = (imageObj.width / imgDom.width()) * 1.5;
            calcuImgWH();
        };

        //隐藏imgview
        global.click(function (e) {
            if (isNotMove) {
                if (this === e.target) {
                    $(this).hide();
                    imageObj.src = "";

                }
            }
        });
        ctrl_close.click(function (e) {
            if (isNotMove) {
                if (this === e.target) {
                    global.hide();
                    imageObj.src = "";

                }
            }
        });

        //拖拽
        imgDom.bind('mousedown', function (e) {
            e.preventDefault();
            startX = e.pageX - parseInt(imgDom.css('margin-left'));
            startY = e.pageY - parseInt(imgDom.css('margin-top'));
            $(document).bind('mousemove', function (e) {
                e.preventDefault();
                $('body').css('cursor', 'move');
                isNotMove = false;
                dragImg(e);
            });
            $(document).bind('mouseup', function (e) {
                $(document).unbind('mousemove');
                $('body').css('cursor', 'initial');
                clearTimeout(dragTime);
                dragTime = setTimeout(function () {
                    isNotMove = true;
                }, 100);
            });
        });


        //切换
        imgDom.click(function (e) {
            if (isNotMove) {
                if (!showImg(++index)) {
                    index--;
                }
            }
        });


        ctrl_right.click(function (e) {
            if (!showImg(++index)) {
                index--;
            }
            e.stopPropagation();

        });


        ctrl_left.click(function (e) {
            if (!showImg(--index)) {
                index++;
            }
            e.stopPropagation();
        });


        imgDom.bind('mousewheel', function (event) {
            event.preventDefault();
            var direction = event.originalEvent.wheelDelta;

            if (direction == 120) {
                if (weight < maxWeight) {
                    weight += 0.1;
                }
            } else if (direction == -120) {
                if (weight > 0.5) {
                    weight -= 0.1;
                }
            }

            handlerImgScale();


//                console.log(event.deltaY, event.deltaFactor, event.originalEvent.deltaMode, event.originalEvent.wheelDelta);
        });


        ctrl_recover.click(function () {
            handerImgRecover();
        });

        ctrl_magnify.click(function () {
            if (weight < maxWeight) {
                weight += 0.1;
            }
            handlerImgScale();
        });

        ctrl_shrink.click(function () {
            if (weight > 0.5) {
                weight -= 0.1;
            }
            handlerImgScale();
        });

        ctrl_rotate.click(function () {
            fnRotateScale(imgDom[0], rotate += 90);
        });


    }

    function handlerImgScale() {
        imgDom.css('width', showWidth * weight);
        imgDom.css('height', showHeight * weight);
        imgDom.css('max-width', 'none');
        imgDom.css('max-height', 'none');
        imgDom.css('margin-top', calcuImgTop());
    }


    function buildHtml() {
        global = $('<div>').appendTo("body");
        global.css({
            'background': 'rgba(0,0,0,0.5)',
            'position': 'fixed',
            'top': '0',
            'bottom': '0',
            'left': '0',
            'right': '0',
            'z-index': '9999',
            'display': 'none'
        });

        dialog = $('<div>').appendTo(global);
        dialog.css({
            'width': '70%',
            'position': 'relative',
            'min-width': '500px',
            'margin': '0% auto',
            'padding': '10px 0',
            'height': '100%'
        });


        detail = $('<div>').appendTo(dialog);
        detail.css({
            'width': '30%',
            'background': '#ddd',
            'display': 'none',
//                'overflow':'hidden',
            'height': '100%',
            'float': 'left',
            'box-sizing': 'border-box',
            'padding': '1%'
        });

        view = $('<div>').appendTo(dialog);
        view.css({
            'background': '#000',
            'width': '100%',
            'padding': '1% 1% 50px 1%',
            'box-sizing': 'border-box',
            'overflow': 'hidden',
            'height': '100%',
            'user-select': 'none',
            'text-align': 'center',
            'position': 'relative',
            'line-height': '100%'
        });


        imgDom = $('<img>').appendTo(view);
        imgDom.css({
            'transition': 'transform 0.5s',
            'cursor': 'pointer'
        });

        view_ctrl = $('<div>').appendTo(view);
        view_ctrl.css({
            'position': 'absolute',
            'bottom': '5px',
            'background': '#000',
            'width': '98%'
        });


        ctrl_recover = $('<span class="iconfont icon-tupian2222">').appendTo(view_ctrl);
        ctrl_recover.css({
            'display': 'inline-block',
            'width': '20px',
            'height': '20px',
            'font-size': '20px',
            'color': '#FFF',
            'margin': '10px',
            'cursor': 'pointer'
        });

        ctrl_magnify = $('<span class="iconfont icon-fangda1">').appendTo(view_ctrl);
        ctrl_magnify.css({
            'display': 'inline-block',
            'width': '20px',
            'height': '20px',
            'font-size': '20px',
            'color': '#FFF',
            'margin': '10px',
            'cursor': 'pointer'
        });

        ctrl_shrink = $('<span class="iconfont icon-suoxiao1">').appendTo(view_ctrl);
        ctrl_shrink.css({
            'display': 'inline-block',
            'width': '20px',
            'height': '20px',
            'font-size': '20px',
            'color': '#FFF',
            'margin': '10px',
            'cursor': 'pointer'
        });

        ctrl_rotate = $('<span class="iconfont icon-shuaxin">').appendTo(view_ctrl);
        ctrl_rotate.css({
            'display': 'inline-block',
            'width': '20px',
            'height': '20px',
            'font-size': '20px',
            'color': '#FFF',
            'margin': '10px',
            'cursor': 'pointer'
        });


        ctrl_left = $('<span class="iconfont icon-xiangzuo1">').appendTo(view);
        ctrl_left.css({
            'display': 'inline-block',
            'position': 'absolute',
            'width': '40px',
            'height': '40px',
            'font-size': '40px',
            'color': '#FFF',
            'left': '1%',
            'top': '48%',
            'cursor': 'pointer'
        });

        ctrl_right = $('<span class="iconfont icon-xiangyou1">').appendTo(view);
        ctrl_right.css({
            'display': 'inline-block',
            'position': 'absolute',
            'width': '40px',
            'height': '40px',
            'font-size': '40px',
            'color': '#FFF',
            'cursor': 'pointer',
            'right': '1%',
            'top': '48%'
        });

        ctrl_close = $('<span class="iconfont icon-cuowu">').appendTo(dialog);
        ctrl_close.css({
            'display': 'inline-block',
            'position': 'absolute',
            'width': '30px',
            'height': '30px',
            'font-size': '30px',
            'color': '#FFF',
            'cursor': 'pointer',
            'right': '-14px',
            'top': '0'
        });


        loading = $('<span class="x-imgView-loading">').appendTo(view);
        loading.css({
            'position': 'absolute',
            'top': '48%',
            'left': '50%',
            'width': '40px',
            'height': '40px',
            'margin-left': '-30px',
            'display': 'none'
        });


    }

    function handerImgRecover() {
        //重新调整到初始位置
        imgDom.css({
            'max-height': '100%',
            'max-width': '100%',
            'margin-left': '0',
            'width': 'initial',
            'height': 'initial'
        });
        //改变宽高之后才能算出正确的 margin-top
        imgDom.css({
            'margin-top': calcuImgTop()
        });
        weight = 1;
        fnRotateScale(imgDom[0], rotate = 0);
    }

    var _is_init = false;

    function init() {
        if (!_is_init) {
            buildHtml();
            bindEVent();
            _is_init = true;
        }
    }


    //应该是load img   load完了应该才是 showimg
    function showImg(index) {
        if (!imgs[index]) {
            return false;
        }

        handerImgRecover();
        //判断左右两个按钮
        if (imgs.length == 0) {
            ctrl_right.hide();
            ctrl_left.hide();

        } else if (imgs.length == 1) {
            ctrl_right.hide();
            ctrl_left.hide();
        } else if (index == 0) {
            ctrl_left.hide();
            ctrl_right.show();
        } else if (index == imgs.length - 1) {
            ctrl_right.hide();
            ctrl_left.show();
        } else {
            ctrl_left.show();
            ctrl_right.show();
        }

        global.show();
        if (imgs.length) {
            loading.show();
        }
        imgDom.hide();
        onSwitch(index);
        imageObj.src = imgs[index];
        return true;

    }


    function fnRotateScale(dom, angle, scale) {
        if (dom && dom.nodeType === 1) {
            angle = parseFloat(angle) || 0;
            scale = parseFloat(scale) || 1;
            if (typeof(angle) === "number") {
                //IE
                var rad = angle * (Math.PI / 180);
                var m11 = Math.cos(rad) * scale, m12 = -1 * Math.sin(rad) * scale, m21 = Math.sin(rad) * scale;
                dom.style.filter = "progid:DXImageTransform.Microsoft.Matrix(M11=" + m11 + ",M12=" + m12 + ",M21=" + m21 + ",M22=" + m11 + ",SizingMethod='auto expand')";
                //Modern
                dom.style.MozTransform = "rotate(" + angle + "deg) scale(" + scale + ")";
                dom.style.WebkitTransform = "rotate(" + angle + "deg) scale(" + scale + ")";
                dom.style.OTransform = "rotate(" + angle + "deg) scale(" + scale + ")";
                dom.style.Transform = "rotate(" + angle + "deg) scale(" + scale + ")";
            }
        }
    }


    window.xImgView = function (option) {
        init();
        imgs = option.imgs;
        zIndex = option.zIndex || 2000;
        infoDom = option.infoDom;
        if (infoDom) {
            detail.show();
            detail.html(infoDom);
            $(infoDom).show();
            view.css('width', '70%');
        }
        onSwitch = option.onSwitch || function () {
            };
        showImg(index = 0);
    };


    $(document).ready(function () {
        //自动定义
        $('body').on('click', '.x-imgView .x-imgView-item', function () {
            init();
            imgs = [];
            $.each($(this).parent().children(), function (i) {

                if(  $(this).attr('x-imgView-src') ){
                    imgs[i] = $(this).attr('x-imgView-src');
                }else{
                    imgs[i] = $(this).attr('src');
                }
            });
            showImg(index = $(this).index());
        });


    });


});

/***/ }),
/* 24 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by Administrator on 2017/2/17.
 */

__webpack_require__(9);


//导航-侧边栏
$("body").on('click','.x-nav-head',function() {
    $(this).next('ul').slideToggle(300).parent().siblings('li').find('ul').slideUp();
    $(this).toggleClass('x-cur').parent().siblings('li').find('a.x-nav-head').removeClass('x-cur');

    if($(this).hasClass('x-cur')){
        $(this).find('i').removeClass('icon-xiangxia1').addClass('icon-xiangshang2');
        $(this).parent().siblings('li').find('i').addClass('icon-xiangxia1').removeClass('icon-xiangshang2');
    }else{
        $(this).find('i').addClass('icon-xiangxia1').removeClass('icon-xiangshang2');
    }
});

//导航-水平
$('body').on('click','.x-nav-item',function(){

    $(this).addClass('x-active').siblings('li').removeClass('x-active');
});

/***/ }),
/* 25 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by Administrator on 2016/12/27.
 */

__webpack_require__(12);

module.exports = window.xPopUp = function(type,option,time) {
    var layerDom; //底部遮罩层
    var mainDom; //主体内容
    var closeDom; //关闭按钮
    var contentDom; //内容



    //关闭弹窗
    function onClose(){
        mainDom.remove();
        layerDom.remove();
        $('body').css({overflow:'auto'});
    }

    //初始化操作
    function init(){

        option = {
            p_width:600,
            p_height:150,
            title:'提示',
            content:'',
            btn:'',
            isClose:true, //是否关闭
            confirmfn:function(){},
            closefn:function(){}
        };

        $('body').css({overflow:'hidden'});

        //遮罩层
        layerDom = $('<div class="x-pop-layer"></div>');
        layerDom.appendTo('body');


        //弹窗主体
        mainDom = $('<div class="x-pop-main"></div>');

        mainDom.appendTo('body');


        //关闭按钮
        closeDom = $('<div class="x-pop-close"><i class="iconfont icon-cuowu"></i></div>');

        closeDom.appendTo(mainDom);

        layerDom.click(function(){
            onClose();
        });
        closeDom.click(function(){
            onClose();
        });

        return mainDom;
    }

    //弹窗初始化位置
    function initPosition(mainDom){
        var cW = $(window).width();
        var cH = $(window).height();

        var popWidth = mainDom.width()+30;
        var popHeight = mainDom.height()+30;


        var pl = (cW-popWidth) / 2;
        var pt = $(document).scrollTop()-popHeight/2+cH/2;

        mainDom.css({
            left:pl,
            top:pt
        });

        window.onresize = function(){
            initPosition(mainDom);
        };
    }

    //提示
    function promptPop(option,time){

        mainDom = init();

        mainDom.css({
            width:option.p_width,
            height:option.p_height
        });

        if(option.btn){
            var btnHtml = '';
            $.each(option.btn,function(i,n){
                btnHtml+='<button class="x-button '+n.classStr+'">'+n.name+'</button>'
            });
        }


        contentDom = $('<div><div class="x-pop-title">提示</div>'+
            '<div class="x-pop-content"></div>'+
            '<div class="x-pop-button"></div></div>');
        contentDom.appendTo(mainDom);

        var pop_con = contentDom.find('.x-pop-content');
        var pop_btn = contentDom.find('.x-pop-button');

        pop_con.html(option.content);
        pop_btn.html(btnHtml);

        initPosition(mainDom);

        pop_btn.find('button').click(function(){
            onClose();
        });

        if(time){
            setTimeout(onClose,time)
        }
    }

    //确定
    function confirmPop(option){
        mainDom = init();

        mainDom.css({
            width:option.p_width,
            height:option.p_height
        });

        contentDom = $('<div><div class="x-pop-title">提示</div>'+
            '<div class="x-pop-content"></div>'+
            '<div class="x-pop-button"><button class="x-button x-confirm">确定</button><button class="x-button cancel">取消</button></div></div>');
        contentDom.appendTo(mainDom);


        var pop_con = contentDom.find('.x-pop-content');
        var pop_btn = contentDom.find('.x-pop-button');

        pop_con.html(option.content);


        initPosition(mainDom);

        pop_btn.find('.x-confirm').click(function(){
            if(!option.isClose){
                if(typeof option.confirmfn == 'function'){
                    option.confirmfn();
                    onClose();
                }else{
                    onClose();
                }
            }else{
                onClose();
            }

        });

        pop_btn.find('.cancel').click(function(){
            if(!option.isClose){
                if(typeof option.closefn == 'function'){

                    option.closefn();
                    onClose();
                }else{
                    onClose();
                }
            }else{
                onClose();
            }

        });



    }

    //自定义
    function userDefined(option){

        mainDom = init();

        mainDom.css({
            width:option.p_width,
            height:option.p_height
        });

        if(option.btn){
            var btnHtml = '';
            $.each(option.btn,function(i,n){
                btnHtml+='<button class="x-button '+n.classStr+'">'+n.name+'</button>'
            });
        }


        contentDom = $('<div><div class="x-pop-title"></div>'+
            '<div class="x-pop-content"></div>'+
            '<div class="x-pop-button" style="text-align:right;"></div></div>');
        contentDom.appendTo(mainDom);

        var pop_tit = contentDom.find('.x-pop-title');
        var pop_con = contentDom.find('.x-pop-content');
        var pop_btn = contentDom.find('.x-pop-button');



        pop_tit.html(option.title);
        pop_con.html(option.content);
        pop_btn.html(btnHtml);


        var pop_btn2 = contentDom.find('.x-pop-button button');
        initPosition(mainDom);

        $.each(option.btn,function(i,n){
            pop_btn2.eq(i).click(function() {
                if(!n.isClose){
                    if(n.opra){
                        n.opra();
                    }
                }else{
                    if(n.opra){
                        n.opra();
                        onClose();
                    }else{
                        onClose();
                    }

                }
            })

        })

    }

    if (type === 'prompt') {
        promptPop(option,time);
    } else if (type === 'confirm') {
        confirmPop(option);
    } else {
        userDefined(option);
    }
};

/***/ }),
/* 26 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by Administrator on 2016/12/29.
 */
__webpack_require__(13);

;(function (window, $) {

    window.xProgress2 = function (option) {
        return new xProgress(option);
    };

    var xProgress = function (option) {

        this._init(option);

        return this;
    };

    xProgress.prototype = {
        defaultOpt: {
            wrap: '.x-progress-wrap',
            pclass: 'x-progress-bar',
            tclass: 'x-progress-only',
            percentage: '0%',
            onchange: function () {console.log('onchange')}
        },
        _init: function (option) {
            this.option = $.extend(true, {}, this.defaultOpt, option);

            if(typeof this.option.wrap === "string"){
                this.wrap = $(this.option.wrap);
            }else{
                this.wrap = this.option.wrap;
            }

            if(typeof this.option.percentage === 'string'){
                this._makeprogress();
            }else{
                // var that = this;
                // $.each(this.percentage,function (index,item) {
                //     that._makeprogress();
                // });
            }
        },

        _makeprogress: function () {

            this.p = $('<div class="' + this.option.pclass + '" ></div>');
            this.t = $('<span class="' + this.option.tclass + '" ></span>');
            this.p.append(this.t);
            this.percentage = this.option.percentage;

            this.wrap.append(this.p);

            this._observer(this,'percentage');
            this._progress(this.percentage);
        },

        _observer: function (obj, k) {
            var that = this;
            var old = obj[k];
            Object.defineProperty(obj, k, {
                enumerable: true,
                configurable: true,
                get: function () {
                    return old;
                },
                set: function (next) {
                    if (next !== old) {
                        that._progress(next, old);
                    }
                    old = next;
                    this.option.onchange();
                }
            })
        },
        _progress: function (next, old) {
            this.p.stop(true,true);
            if(next==='0%'){
                this.p.css({width: next});
            }else{
                this.p.animate({width: next},1000);
            }
            // this.p.css({width: next});
            // this.p.width(next);
            this.t.text(next);
        },
        _p:function () {
        },
        _pp:function(obj, next, old){
            if(typeof obj.option.percentage === 'string'){
                obj._p(obj, next, old);
            }else{
                if(typeof obj.option.percentage === 'object'){
                    for (var i = 0, len = this.option.percentage; i < len; i++) {
                        obj._p(this.option, next, old);
                    }
                }
            }
        }
    };
})(window, jQuery);

/***/ }),
/* 27 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by Administrator on 2017/2/17.
 */

__webpack_require__(14);


$('body').on('click','.x-tab-nav li',function(){
    var i = $(this).index();
    $(this).addClass('x-active').siblings().removeClass('x-active');
    $(this).parents('.x-tab').find('.x-tab-content').eq(i).addClass('x-active').siblings().removeClass('x-active');

});




/***/ }),
/* 28 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by Administrator on 2017/2/28.
 */

__webpack_require__(15);

var count = 0;
$('.x-table th').click(function(){
    var iconDom = $(this).find('i');
    if(count % 3 == 0){
        iconDom.removeClass('x-table-arrow').addClass('x-table-arrowUp')
    }else if(count % 3 == 1){
        iconDom.removeClass('x-table-arrowUp').addClass('x-table-arrowDown');
    }else{
        iconDom.removeClass('x-table-arrowDown').addClass('x-table-arrow')
    }
    count++;
});




/***/ }),
/* 29 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by Administrator on 2017/1/9.
 */



// require('../../vendor/wdatepicker/WdatePicker.js');
__webpack_require__(18);



$('body').on('click','.x-time',function(){



    var format = $(this).attr('x-time-format')?  $(this).attr('x-time-format') : 'yyyy-MM-dd HH:mm:ss' ;
    var max = $(this).attr('x-time-max')?  $(this).attr('x-time-max') : '' ;
    var min = $(this).attr('x-time-max')?  $(this).attr('x-time-min') : '' ;
    var input = $(this).attr('x-time-input')?  $(this).attr('x-time-input') : '' ;
    var value = $(this).attr('x-time-value')?  $(this).attr('x-time-value') : '' ;



    WdatePicker({
        el: xCommon.getDomId(this),
        vel:$(input).get(0),
        dateFmt:format,
        maxDate:max,
        minDate:min,
        startDate:value,
        // doubleCalendar:true,

    });
});





window.xTime=function (dom,option){


    option.el = xCommon.getDomId(dom);


    WdatePicker(option);

};



/***/ }),
/* 30 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by Administrator on 2017/2/17.
 */


__webpack_require__(16);


$('body').on('mouseover','.x-tip',function(){
    var self = $(this);

    var content = self.attr("data-tip");


    var htmlDom = $("<div class='x-tip-content'>"+content+"</div>");



    $(this).after(htmlDom);


    htmlDom.css({
        top:$(this).position().top - htmlDom.outerHeight(),
        left:$(this).position().left +  ( $(this).outerWidth() - htmlDom.outerWidth() )/2,
    });


});

$('body').on('mouseout','.x-tip',function(){


    $('.x-tip-content').remove();
});







/***/ }),
/* 31 */
/***/ (function(module, exports) {

/**
 * 命名大意：
 * dom    用户定义承载树的dom
 * html   树的html
 * item   data的每一条,可以是node也可以是child
 * child  树的叶子;子元素;成员
 * node   树的节点;文件夹;部门
 * layer  树的层级,包含同一层的item(node,child);
 * _      带有下划线的是插件需要的方法属性，用户不需要使用
 *
 *
 *
 *
 * 思路:
 * 1.node的id和child的id可以重复,因为实际场景可能是两种数据比如,部门和人员.对于省份和城市可能本身就不会重复
 * 2.选择数据,用户需要的结果是:1.所有child.2.node+child
 * 3.is_trigger如果是true,是为input框设计的,会去读取input框的宽度作为自身的宽度
 * 4.这里html的input显示的时候根据data决定是否check，
 * 5.每次的点击input产生的变化是html变了，然后data也变。
 * 6.4，5导致容易出错,但我觉得应该是根据操作data数据发生变化，变化完毕，统一一个方法决定html结构的变化，不过效率不一定更高
 * 7.only_child为true必然不会node_merge
 * 8.代码中还有一些根据标签(div,span)来做的判断,都不太靠谱
 *
 *
 */

;(function ($) {

    window.xTree = function (opt) {
        return new tree(opt);
    };

    var defOpt = {
        dom: '',  //jqueryDom
        is_trigger: false,  //是否需要触发? 否则直接显示
        has_search: false,
        only_child: true,//是否结果只要 child
        node_merge: true,//结果只显示最上层  比如   中国被选中  四川,成都则不会显示  否则 每个被勾选的节点都显示
        zIndex: 1,
        choose: false,  //哪些是选中的？优先级高于data  {nodeId:[1,2,3],id:[1,2,3]}
        // node_first:false,//是否需要节点排在前面  否则按照data的顺序
        is_multi: true,//是否多选
        expand: false, //是否展开，false、true、num  //todo expand
        width: null,
        maxHeight: 300,
        data: [],//{id:1,name:'xx',nodeId:'0',is_node:true,is_check:false},
        sel_ids: '',
        onInit: function () {
        },
        onBeforeOpen: function () {
        },
        onOpen: function () {
        },
        onCheck: function () {
        },
        onCancel: function () {
        },
        onChange: function () {
        },
        onClose: function () {
        },
    };


    var tree = function (opt) {
        this._init(opt);
        return this;
        /**
         * return {
         *     'start':this.start,
         *     'end':this.end
         * };  //todo  这样会导致 this 没有 别的方法 到底 还是不能正常使用
         */
    };


    /**
     *
     * @var opt  用户传进来的option
     * @var dom 打开tree的载体jquery dom
     * @var data  做tree的data
     * @var html tree的html
     */


    tree.prototype = {
        _is_open: false,  //是否open
        _originId: {nodeId: [], id: []},   //上次打开时候选中了哪一些id
        _searchTimer: '',   //搜索框的定时器
        _is_first: true,  //是不是第一次打开
        _init: function (opt) {
            var res = checkData(opt.data);
            if (!res) {
                return false;
            }

            this.opt = $.extend(true, {}, defOpt, opt);
            this.data = _initData(this.opt.data);
            this.rootId = _getRootId(this.data);
            if (this.opt.sel_ids) {
                _selData(this.data, this.opt.sel_ids);
            }

            this._originId = this.getId();

            this.dom = this.opt.dom;
            this.dom.css({'position': 'relative'});
            this.html = this._makePanel();

            this.opt.onInit.apply(this);

            var that = this;

            if (this.opt.is_trigger) {
                this.dom.off('click.xTree');
                this.dom.on('click.xTree', function (e) {
                    $('.xTreePanel').hide();
                    that.start();
                    e.stopPropagation();
                });
                $(document).on('click.xTree', function () {
                    that.end();
                });
            } else {
                this.start();
            }
        },

        /**
         *      方法
         *
         */
        start: function () {
            this.opt.onBeforeOpen.apply(this);

            this._showPanel();
            this._showData();
            this._expand();
            this._is_open = true;

            this.html.find('.x-tree-search').focus();

            this.opt.onOpen.apply(this);
            return this;
        },
        end: function () {
            if (this._is_open) {
                this.html.hide();

                this.opt.onClose.apply(this);

                this._originId = this.getId();

                this._is_open = false;
            }
        },

        getName: function () {
            var text = [];
            var data = this.data;
            if (this.opt.only_child) {
                $.each(data, function (i, n) {
                    if (n.is_check && !n.is_node) {
                        text.push(n.name);
                    }
                });
            } else {
                if (this.opt.node_merge) {
                    var nodes = [];
                    $.each(data, function (i, n) {
                        if (n.is_check && n.is_node) {
                            nodes.push(n.id);
                        }
                    });

                    var clone = $.extend(true, [], data); //直接赋值传的是引用
                    $.each(clone, function (i, n) {
                        if ((n.is_check && $.inArray(n.nodeId, nodes) != -1) || !n.is_check) {
                            clone[i] = null;
                        }
                    });

                    $.each(clone, function (i, n) {
                        if (n) {
                            text.push(n.name);
                        }
                    });
                } else {
                    $.each(data, function (i, n) {
                        if (n.is_check) {
                            text.push(n.name);
                        }
                    });
                }
            }

            return text.join();
        },
        getId: function () {
            var id = [];
            var nodeId = [];
            var data = this.data;

            if (this.opt.only_child) {
                $.each(data, function (i, n) {
                    if (n.is_check && !n.is_node) {
                        id.push(n.id);
                    }
                });

            } else {

                if (this.opt.node_merge) {
                    var node = [];
                    $.each(data, function (i, n) {
                        if (n.is_check && n.is_node) {
                            node.push(n.id);
//                            text.push( n.name);  //nodefirst
                        }
                    });

                    var clone = $.extend(true, [], data);
                    $.each(clone, function (i, n) {
                        if ((n.is_check && $.inArray(n.nodeId, node) != -1) || !n.is_check) {
                            clone[i] = null;
                        }
                    });


                    $.each(clone, function (i, n) {
                        if (n) {
                            if (n.is_node) {
                                nodeId.push(n.id);
                            } else {
                                id.push(n.id);
                            }
                        }
                    });
                } else {
                    $.each(data, function (i, n) {
                        if (n.is_check) {
                            if (n.is_node) {
                                nodeId.push(n.id);
                            } else {
                                id.push(n.id);
                            }
                        }
                    });
                }


                id = {'id': id, 'nodeId': nodeId};
            }
            return id;
        },
        cancelItem: function (id, type) {
            var item = {};
            var dom = this.html.find('input[data-isNode="' + parseInt(type) + '"][data-id="' + id + '"]').prop('checked', false);
            $.each(this.data, function (i, n) {
                if (n.id == id && n.is_node == type) {
                    item = n;
                    item.is_check = false;
                }
            });

            this._chgItem(item, dom);

        },
        cancelAll: function () {
            $.each(this.data, function (index, item) {
                item.is_check = false;
            });
            this.html.find('input').prop("checked", false);
            this.opt.onCancel.apply(this);
        },
        checkItem: function (id, type) {
            var item = {};
            var dom = this.html.find('input[data-isNode="' + parseInt(type) + '"][data-i="' + id + '"]').prop('checked', true);
            $.each(this.data, function (i, n) {
                if (n.id == id && n.is_node == type) {
                    item = n;
                    item.is_check = true;
                }
            });

            this._chgItem(item, dom);

        },
        checkAll: function () {
            if (this.opt.is_multi) {
                $.each(this.data, function (index, item) {
                    item.is_check = true;
                });
                this.html.find('input').prop("checked", true);
                this.opt.onCheck.apply(this);
            }
        },
        getItem: function () {
            var arr = [];
            var data = this.data;
            if (this.opt.only_child) {
                $.each(data, function (i, n) {
                    if (n.is_check && !n.is_node) {
                        arr.push(n);
                    }
                });
            } else {

                if (this.opt.node_merge) {
                    var node = [];
                    $.each(data, function (i, n) {
                        if (n.is_check && n.is_node) {
                            node.push(n.id);
//                            text.push( n.name);  //nodefirst
                        }
                    });

                    var clone = $.extend(true, [], data);
                    $.each(clone, function (i, n) {
                        if ((n.is_check && $.inArray(n.nodeId, node) != -1) || !n.is_check) {
                            clone[i] = null;
                        }
                    });


                    $.each(clone, function (i, n) {
                        if (n) {
                            arr.push(n);
                        }
                    });
                } else {
                    $.each(data, function (i, n) {
                        if (n.is_check) {
                            arr.push(n);
                        }
                    });
                }


            }
            return arr;
        },
        search: function (val) {
            this._removeLayer(this.rootId);

            if (val === '') {
                this.html.find('div[node-id="' + this.rootId + '"]').remove();
                this._showLayer(this.rootId);
            } else {
                for (var i in this.data) {
                    if (!this.data[i].is_node && this.data[i].name.indexOf(val) != -1) {
                        this.html.find('div[node-id="' + this.rootId + '"]').append(this._makeItem(this.data[i]));
                    }
                }
            }
        },


        /**
         *      数据方法
         */
        _getLayerData: function (parent) {
            var res = [];
            for (var i in this.data) {
                if (this.data[i].nodeId == parent) {
//                if(data[i].is_node){
//                    res.unshift(data[i])
//                }else{
//                    res.push(data[i]);
//                }

                    res.push(this.data[i]);  //原序
                }
            }
            return res;
        },

        _chgItem: function (item, dom) {

            if (this.opt.is_multi) {
                if (item.is_node) {
                    dom.parent().parent().find('label > input').prop('checked', item.is_check);
                    this._chgAllChildren(item.id, item.is_check);
                }

                if (!item.is_check) {
                    this._cancelParentNode(item.nodeId);
                } else {
                    this._checkParentNode(item.nodeId);
                }
            } else {
//                    this.html.find('input').prop("checked",false);
//                    $(this).prop('checked',true);
            }


            var childItem = [];
            this._getChild(item, childItem);


            if (!item.is_check) {
                this.opt.onCancel.apply(this);
            } else {
                this.opt.onCheck.apply(this);
            }
            this.opt.onChange.apply(this);

        },
        _getChild: function (node, cont) {
            if (node.is_node && node.has_children) {
                var that = this;
                $.each(that.data, function (i, n) {
                    if (n.nodeId == node.id) {
                        cont.push(n);
                        if (n.is_node && node.has_children) {
                            that._getChild(n, cont);
                        }
                    }
                })
            }
        },
        _cancelParentNode: function (id) {
            var obj = this;
            $.each(obj.data, function (i, n) {
                if (n.id == id && n.is_node && n.is_check) {
                    n.is_check = false;
                    obj.html.find('input[data-isNode="1"][data-id="' + id + '"]').prop('checked', false);
                    obj._cancelParentNode(n.nodeId);
                }
            })
        },
        _checkParentNode: function (id) {
            var obj = this;
            var allChildrenChecked = true;
            $.each(obj.data, function (i, n) {
                if (n.nodeId == id && !n.is_check) {
                    allChildrenChecked = false;
                }
            });
            $.each(obj.data, function (i, n) {
                if (n.id == id && n.is_node && !n.is_check && allChildrenChecked) {
                    n.is_check = true;
                    obj.html.find('input[data-isNode="1"][data-id="' + id + '"]').prop('checked', true);
                    obj._checkParentNode(n.nodeId);
                }
            });
        },
        _chgAllChildren: function (nodeid, bol) {
            var obj = this;
            $.each($.extend(true, [], this.data), function (i, n) {   //这句话 看起来 好像 不用 extend
                if (n.nodeId == nodeid) {
                    obj.data[i].is_check = bol;
                    if (n.is_node && n.has_children) {
                        obj._chgAllChildren(n.id, bol);
                    }
                }
            });
        },


        /**
         * 构造html内部方法
         */
        _makePanel: function () {
            var html = '<div></div>';

            if (this.opt.has_search) {
                html = this._makeSearch(html);
            }

            var css;
            if (this.opt.is_trigger) {
                css = {
                    'font-family': 'Microsoft YaHei',
                    'z-index': this.opt.zIndex,
                    border: '1px solid #5d5d5d',
                    'background': '#fff',
                    position: 'absolute',
                    maxHeight: this.opt.maxHeight,
                    padding: '0 1%',
                    'white-space': 'nowrap',
                    'overflow': 'auto'
                };
            } else {
                css = {
                    'font-family': 'Microsoft YaHei',
                    'background': '#fff',
                    maxHeight: this.opt.maxHeight,
                    padding: '0 1%',
                    'white-space': 'nowrap',
                    'overflow': 'auto'
                };
            }


            return $(html).css(css);
        },
        _makeSearch: function (html) {
            var search = '<input class="x-tree-search" type="text" placeholder="搜索"/></div>';
            search = $(search).css({
                'border': 'none',
                'padding': '4px 0',
                'margin': '5px auto 0 auto',
                'width': '98%',
                'display': 'block'
            });

            var obj = this;
            $(search).on('keyup paste', function () {
                var dom = this;
                clearTimeout(obj._searchTimer);
                obj._searchTimer = setTimeout(function () {
                    obj.search(dom.value);
                }, 100);
            });

            return $(html).append(search);

        },
        _makeNode: function (item) {
            var $html;
            if (this.opt.is_multi) {
                $html = $('<div node-id="' + item.id + '">' + makeExpand() + '<label><input type="checkbox" data-isNode="1" data-id="' + item.id + '" ' + (item.is_check ? 'checked' : '') + ' data-name="' + item.name + '"/><span>' + item.name + '</span></label></div>');
            }
            else {
                if (this.opt.only_child) {
                    $html = $('<div node-id="' + item.id + '">' + makeExpand() + '<span>' + item.name + '</span></div>');
                }
                else {
                    $html = $('<div node-id="' + item.id + '">' + makeExpand() + '<label><input type="radio" name="' + this.dom.selector + '" data-isNode="1" data-id="' + item.id + '" ' + (item.is_check ? 'checked' : '') + ' data-name="' + item.name + '"/><span>' + item.name + '</span></label></div>');
                }
            }
            $html.find('span').css({
                'cursor': 'pointer',
                'user-select': 'none',
                '-webkit-user-select': 'none',
                '-moz-user-select': 'none',
                '-ms-user-select': 'none'
            });
            $html.find('input').css({
                'vertical-align': 'middle'
            });
            var obj = this;
            $html.find('i').on('click', function (e) {
                if ($(this).hasClass('icon-jia1')) {
                    obj._showLayer(item.id);
                } else {
                    obj._removeLayer(item.id);
                }
            });
            return $html;
        },
        _makeChild: function (item) {
            var $html;
            if (this.opt.is_multi) {
                $html = $('<div><span></span><label><input type="checkbox" data-id="' + item.id + '" data-isNode="0" data-name="' + item.name + '" ' + (item.is_check ? 'checked' : '') + '/>' + item.name + '</label></div>');
            }
            else {
                $html = $('<div>' + (this.opt.only_child ? '' : '<span></span>') + '<label><input type="radio" name="' + this.dom.selector + '" data-id="' + item.id + '" data-isNode="0" data-name="' + item.name + '" />' + item.name + '</label></div>');
            }
            $html.find('span').css({
                'width': '16px',
                'user-select': 'none',
                '-webkit-user-select': 'none',
                '-moz-user-select': 'none',
                '-ms-user-select': 'none',
                'display': 'inline-block'
            });
            $html.find('input').css({
                'vertical-align': 'middle'
            });
            return $html;
        },
        _makeItem: function (item) {
            var $html;
            if (item.is_node && item.has_children) {
                $html = this._makeNode(item);
            } else {
                $html = this._makeChild(item);
            }

            var obj = this;
            $html.find('input').on('click', function () {
                if (obj.opt.is_multi) {
                    item.is_check = !item.is_check;
                } else {
                    $.each(obj.data, function (index, item) {
                        item.is_check = false;
                    });
                    item.is_check = true;
                }


                obj._chgItem(item, $(this));

            });

            return $html;
        },
        /**
         *      视图方法
         */

        _showPanel: function () {
            if (this.opt.is_trigger) {
                this.html.css({
                    top: this.dom.outerHeight(),
                    left: 0,
                    minWidth: 200
                    // minWidth: this.opt.width ? this.opt.width : this.dom.outerWidth() * 0.98
                });

                this.html.addClass('xTreePanel');

                this.html.on('click', function (e) {
                    e.stopPropagation();
                });
            }
            this.dom.append(this.html);

        },
        _showData: function () {
            if (this._is_first) {
                this._showLayer(this.rootId);
                this._is_first = false;
            } else {
                this.html.show();
            }
        },
        _expand: function () {
            var obj = this;
            if (obj.opt.expand === true) {
                $.each(obj.data, function (index, item) {
                    if (item.is_node && item.has_children) {
                        obj.html.find('i').filter('.icon-jia1').click();
                    }
                });
            } else if (obj.opt.expand) {
                var expandId = [];
                expandId.push(obj.rootId);
                for (var i = 0; i < obj.opt.expand; i++) {
                    expandId = obj._expandLevel(expandId);
                }
            }
        },
        _expandLevel: function (id) {
            var obj = this;
            var expandId = [];
            $.each(id, function (index, item) {
                $.each(obj.data, function (index2, item2) {
                    if (item2.nodeId === item) {
                        expandId.push(item2.id);
                        obj.html.find('div[node-id="' + item2.nodeId + '"] > i').filter('.icon-jia1').click();
                    }
                });
            });
            return expandId;
        },
        _showLayer: function (layerId) {
            var showData = this._getLayerData(layerId);
            var itemDiv = makeLayer();


            //这里 0节点的结构 和 子节点的结构 没有处理好    以后尽量让node-id 和  itemdiv 分开
            if (layerId === this.rootId) {
                itemDiv = $(itemDiv).attr('node-id', this.rootId);
                this.html.append(itemDiv);
                //itemDiv.parent().attr('node-id',0);

            } else {
                toShrink(this.html.find('div[node-id="' + layerId + '"] i'));
                this.html.find('div[node-id="' + layerId + '"]').append(itemDiv);
            }

            for (var i in showData) {
                itemDiv.append(this._makeItem(showData[i]));
            }
        },
        _removeLayer: function (layerId) {
            this.html.find('div[node-id="' + layerId + '"]>div').remove();
            toExpand(this.html.find('div[node-id="' + layerId + '"] i'));
        },


    };


    function makeLayer() {
        var html = '<div></div>';

        return $(html).css({
            'margin-left': '13px'
        });
    }

    function makeExpand() {
        // var html='<span data-icon="expand">＋</span>';
        var html = '<i class="iconfont icon-jia1"></i>';

        return $(html).css({
            'font-size': '12px',
            'vertical-align': 'base-line',
            'padding-right': '0px',
            'cursor': 'pointer'
        })[0].outerHTML;
    }

    function toShrink(dom) {
        dom.removeClass('icon-jia1');
        dom.addClass('icon-jian1');
    }

    function toExpand(dom) {
        dom.removeClass('icon-jian1');
        dom.addClass('icon-jia1');
    }

    function checkData(data) {
        for (var i in data) {
            return typeof data[i] == 'object';
        }
        return false;
    }

    function _initData(data) {
        var clone = $.extend(true, [], data);
        var len = clone.length;

        for (var k = 0; k < len; k++) {
            clone[k].has_children = false;
        }

        for (var i = 0; i < len; i++) {
            for (var j = i; j < len; j++) {
                if (clone[i].is_node && clone[i].id === clone[j].nodeId) {
                    clone[i].has_children = true;
                }
                if (clone[i].nodeId === clone[j].id && clone[j].is_node) {
                    clone[j].has_children = true;
                }
            }
        }

        return clone;
    }

    function _selData(data, selected) {
        var sel_ids = selected.split(',');
        for (var i = 0; i < sel_ids.length; i++) {
            for (var j = 0; j < data.length; j++) {
                if (data[j].id === sel_ids[i]) {
                    data[j].is_check = true;
                    _selParent(data, data[j].nodeId);
                    if (data[j].is_node && data[i].has_children) {
                        _selChildren(data, data[j].id);
                    }
                }
            }
        }
        return data;
    }

    function _selParent(data, nid) {
        if (!nid) {
            return false;
        }
        var selParent = true;
        var sel_p = {};
        for (var i = 0; i < data.length; i++) {
            if (data[i].id == nid) {
                sel_p = data[i];
            }
            if (data[i].nodeId == nid && !data[i].is_check) {
                selParent = false;
                return false;
            }

        }

        if (selParent) {
            sel_p.is_check = true;
            if (sel_p.nodeId) {
                _selParent(data, sel_p.nodeId);
            }
        }
    }

    function _selChildren(data, id) {
        if (!id) {
            return false;
        }
        for (var i = 0; i < data.length; i++) {
            if (data[i].nodeId === id) {
                data[i].is_check = true;
                if (data[i].is_node && data[i].has_children) {
                    _selChildren(data, data[i].id);
                }
            }

        }
    }

    function _getRootId(_data) {
        var rootId = [];
        var clone = $.extend(true, [], _data);
        for (var i = 0, len = _data.length; i < len; i++) {
            for (var j = i; j < len; j++) {
                if (_data[i].id === _data[j].nodeId) {
                    clone[j] = null;
                }
                if (_data[i].nodeId === _data[j].id) {
                    clone[i] = null;
                }
            }
        }
        $.each(clone, function (i, t) {
            if (t) {
                rootId.push(t.nodeId);
            }
        });

        // //去除数组重复值
        // function unique(array){
        //     var n = [];
        //     for(var i = 0; i < array.length; i++){
        //         if (n.indexOf(array[i]) == -1) n.push(array[i]);
        //     }
        //     return n;
        // }
        //
        // function unique(array){
        //     var r = [];
        //     for(var i = 0, l = array.length; i < l; i++) {
        //         for(var j = i + 1; j < l; j++){
        //             if (array[i] === array[j]) {
        //                 j = ++i;
        //             }
        //         }
        //         r.push(array[i]);
        //     }
        //     return r;
        // }
        // rootId = unique(rootId);

        return rootId[0];
    }


})(jQuery);






/***/ }),
/* 32 */
/***/ (function(module, exports, __webpack_require__) {


var WebUploader = __webpack_require__(2);

// 当domReady的时候开始初始化
(function($) {
    var $wrap = $('.x-uploader'),

    // 图片容器   多文件的时候
        $queue = $( '<ul class="x-filelist"></ul>' )
            .appendTo( $wrap.find( '.x-queueList' ) ),
    // 状态栏，包括进度和控制按钮
        $statusBar = $wrap.find( '.x-statusBar' ),

    // 文件总体选择信息。
        $info = $statusBar.find( '.x-info' ),

    // 上传按钮
        $upload = $wrap.find( '.x-uploadBtn' ),

    // 没选择文件之前的内容。
        $placeHolder = $wrap.find( '.x-placeholder' ),

        $progress = $statusBar.find( '.progress' ).hide(),


    // 添加的文件数量
        fileCount = 0,

    // 添加的文件总大小
        fileSize = 0,

    // 优化retina, 在retina下这个值是2
        ratio = window.devicePixelRatio || 1,

    // 缩略图大小
        thumbnailWidth = 110 * ratio,
        thumbnailHeight = 110 * ratio,

    // 可能有pedding, ready, uploading, confirm, done.
        state = 'pedding',

    // 所有文件的进度信息，key为file id
        percentages = {},
    // 判断浏览器是否支持图片的base64

    // WebUploader实例
        uploader;

    //图片上传和文件上传区分 参数
    var opt_file = {
        dom:'',
        fileButton: {
            id: '.x-filePicker',
            label: '批量上传'
        },
        addButton:{
            id: '.x-filePicker-add',
            label: '继续添加'
        },
        dnd: '.x-dndArea',
        paste: '.x-uploader',
        swf: '../../dist/Uploader.swf',
        chunked: false,
        chunkSize: 512 * 1024,
        server: '?m=Admin&c=Upload&a=upload',
        compress:false,
        // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
        disableGlobalDnd: true,
        fileNumLimit: 300,
        fileSizeLimit: 200 * 1024 * 1024,    // 200 M
        fileSingleSizeLimit: 50 * 1024 * 1024    // 50 M
    };


    // 实例化
    window.xUpload = function (opt) {
        return new upload(opt);
    };

    var defaultOption = opt_file;
    var upload=function(opt,dom){
        this.opt = $.extend(true,{},defaultOption,opt);
        if(this.isFlash){
            this.init(this.opt);
        }
        return this;
    };

    upload.prototype ={
        isSupportBase64:( function() {
            var data = new Image();
            var support = true;
            data.onload = data.onerror = function() {
                if( this.width != 1 || this.height != 1 ) {
                    support = false;
                }
            };
            data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
            return support;
        } )(),
        //检测是否已经安装flash，检测flash的版本
        flashVersion : ( function() {
            var version;
            try {
                version = navigator.plugins[ 'Shockwave Flash' ];
                version = version.description;
            } catch ( ex ) {
                try {
                    version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                        .GetVariable('$version');
                } catch ( ex2 ) {
                    version = '0.0';
                }
            }
            version = version.match( /\d+/g );
            return parseFloat( version[ 0 ] + '.' + version[ 1 ], 10 );
        } )(),

        supportTransition : (function(){
            var s = document.createElement('p').style,
                r = 'transition' in s ||
                    'WebkitTransition' in s ||
                    'MozTransition' in s ||
                    'msTransition' in s ||
                    'OTransition' in s;
            s = null;
            return r;
        })(),
        isFlash:function(){
            if ( !WebUploader.Uploader.support('flash') && WebUploader.browser.ie ) {

                // flash 安装了但是版本过低。
                if (this.flashVersion) {
                    (function(container) {
                        window['expressinstallcallback'] = function( state ) {
                            switch(state) {
                                case 'Download.Cancelled':
                                    alert('您取消了更新！');
                                    break;

                                case 'Download.Failed':
                                    alert('安装失败');
                                    break;

                                default:
                                    alert('安装已成功，请刷新！');
                                    break;
                            }
                            delete window['expressinstallcallback'];
                        };

                        var swf = './expressInstall.swf';
                        // insert flash object
                        var html = '<object type="application/' +
                            'x-shockwave-flash" data="' +  swf + '" ';

                        if (WebUploader.browser.ie) {
                            html += 'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" ';
                        }

                        html += 'width="100%" height="100%" style="outline:0">'  +
                            '<param name="movie" value="' + swf + '" />' +
                            '<param name="wmode" value="transparent" />' +
                            '<param name="allowscriptaccess" value="always" />' +
                            '</object>';

                        container.html(html);

                    })($wrap);

                    // 压根就没有安转。
                } else {
                    $wrap.html('<a href="http://www.adobe.com/go/getflashplayer" target="_blank" border="0"><img alt="get flash player" src="http://www.adobe.com/macromedia/style_guide/images/160x41_Get_Flash_Player.jpg" /></a>');
                }

                return;
            } else if (!WebUploader.Uploader.support()) {
                alert( 'Web Uploader 不支持您的浏览器！');
                return;
            }
        },
        init:function(opt){

            var fileType = opt.fileType;
            var addButton = opt.addButton;

            opt.pick = opt.fileButton;
            var _that = this;
            if(fileType == 1){
                opt['accept'] = {
                    title: 'Images',
                    extensions: 'gif,jpg,jpeg,bmp,png',
                    mimeTypes:'image/gif,image/jpg,image/jpeg,image/bmp,image/png'
                };
                opt['fileButton']['multiple'] = false;
            }
            uploader = WebUploader.create(opt);
            // 添加“添加文件”的按钮，
            uploader.addButton(addButton);


            uploader.on('ready', function() {
                window.uploader = uploader;
            });

            uploader.onUploadProgress = function( file, percentage ) {
                //进度条回调
                if(fileType==2) {
                    var $li = $('#' + file.id),
                        $percent = $li.find('.progress span');

                    $percent.css('width', percentage * 100 + '%');
                    percentages[file.id][1] = percentage;
                    updateTotalProgress();
                }else if(fileType == 1){

                    $statusBar.show();
                    this.options.progress(Math.round( percentage * 100 ) + '%');
                }

            };

            uploader.onUploadSuccess = function(file){
                //上传成功后调用
                if(fileType ==1){
                    $wrap.find('.x-info').text('头像上传成功，总大小：'+getSize(file.size));
                }
            };

            uploader.onUploadAccept = function(object,ret){
                this.options.success(object,ret);
            };

            uploader.onFileQueued = function( file ) {
                //添加到队列
                if(fileType == 2){
                    fileCount++;
                    fileSize += file.size;

                    if ( fileCount === 1 ) {
                        $placeHolder.addClass( 'element-invisible' );
                        $statusBar.show();
                        //$statusBar.css({'display':'block'})
                    }
                    addFile( file );
                    setState( 'ready' );
                    updateTotalProgress();
                }else if(fileType ==1){
                    //单张图片

                    addFileImg(file);
                    if ( state === 'ready' ) {

                        uploader.upload(file);

                    } else if ( state === 'paused' ) {
                        uploader.upload(file);
                    } else if ( state === 'uploading' ) {
                        uploader.stop(file);
                    }
                }
            };
            uploader.onUploadError = function(file,reason){
                if(reason =='http'){
                    console.log("服务器错误");
                }
                return;
            };
            uploader.onFileDequeued = function( file ) {
                //文件从队列中移除
                if(fileType==2){
                    fileCount--;
                    fileSize -= file.size;

                    if ( !fileCount ) {
                        setState( 'pedding' );
                    }

                    removeFile( file );
                    updateTotalProgress();
                }


            };
            uploader.onUploadFinished = function(){
                if(fileType == 2){
                    setState( 'confirm' );
                }
            };
            uploader.onStartUpload = function(file){
                setState( 'uploading' );

            };
            uploader.onStopUpload = function(){
                console.log("暂停");
                setState( 'paused' );
            };

            uploader.onError = function( code ) {
                //错误信息
                switch (code) {
                    case 'Q_TYPE_DENIED' :
                        alert('不符合的文件类型');
                        break;
                    case 'Q_EXCEED_SIZE_LIMIT':
                        alert('文件总大小超出，请重新设置');
                        break;
                    case 'Q_EXCEED_NUM_LIMIT':
                        alert('文件数量过多，请分批上传');
                        break;
                }
            };



            $upload.on('click', function() {
                //点击上传按钮
                console.log("开始上传");
                if ( $(this).hasClass( 'disabled' ) ) {
                    return false;
                }

                if ( state === 'ready' ) {
                    uploader.upload();
                } else if ( state === 'paused' ) {
                    uploader.upload();
                } else if ( state === 'uploading' ) {
                    uploader.stop();
                }
            });

            $wrap.on( 'click', '.retry', function() {

                uploader.retry();
            } );



            $upload.addClass( 'state-' + state );
            function addFile( file ) {
                //html文件列表

                var $li = $( '<li id="' + file.id + '">' +
                        '<p class="title">' + file.name + '</p>' +
                        '<p class="imgWrap"></p>'+
                        '<p class="progress"><span></span></p>' +
                        '</li>' ),

                    $btns = $('<div class="file-panel">' +
                        '<span class="cancel">删除</span>' +
                        '<span class="rotateRight">向右旋转</span>' +
                        '<span class="rotateLeft">向左旋转</span></div>').appendTo( $li ),
                    $prgress = $li.find('p.progress span'),
                    $wrap = $li.find( 'p.imgWrap' ),
                    $info = $('<p class="error"></p>'),
                    text = '',
                    showError = function( code ) {
                        switch( code ) {
                            case 'exceed_size':
                                text = '文件大小超出';
                                break;

                            case 'interrupt':
                                text = '上传暂停';
                                break;

                            default:
                                text = '上传失败，请重试';
                                break;
                        }
                        console.log(text);
                        $info.text( text ).appendTo( $li );
                    };


                if ( file.getStatus() === 'invalid' ) {
                    showError( file.statusText );
                    console.log(file.getStatus());
                } else {
                    // @todo lazyload
                    $wrap.text( '预览中' );
                    uploader.makeThumb( file, function( error, src ) {
                        var img;
                        if ( error ) {
                            $wrap.text( '不能预览' );
                            return;
                        }
                        if( _that.isSupportBase64 ) {
                            img = $('<img src="'+src+'">');
                            $wrap.empty().append( img );
                        } else {
                            console.log("预览出错");
                        }
                    }, thumbnailWidth, thumbnailHeight );

                    percentages[ file.id ] = [ file.size, 0 ];
                    file.rotation = 0;
                }

                file.on('statuschange', function( cur, prev ) {
                    //状态改变
                    if ( prev === 'progress' ) {
                        $prgress.hide().width(0);
                    } else if ( prev === 'queued' ) {
                        $li.off( 'mouseenter mouseleave' );
                        $btns.remove();
                    }

                    // 成功
                    if ( cur === 'error' || cur === 'invalid' ) {
                        console.log( file.statusText );
                        showError( file.statusText );
                        percentages[ file.id ][ 1 ] = 1;
                    } else if ( cur === 'interrupt' ) {
                        showError( 'interrupt' );
                    } else if ( cur === 'queued' ) {
                        $info.remove();
                        $prgress.css('display', 'block');
                        percentages[ file.id ][ 1 ] = 0;
                    } else if ( cur === 'progress' ) {
                        $info.remove();
                        $prgress.css('display', 'block');
                    } else if ( cur === 'complete' ) {
                        $prgress.hide().width(0);
                        $li.append( '<span class="success"></span>' );
                    }

                    $li.removeClass( 'state-' + prev ).addClass( 'state-' + cur );
                });

                $li.on( 'mouseenter', function() {
                    $btns.stop().animate({height: 30});
                });

                $li.on( 'mouseleave', function() {
                    $btns.stop().animate({height: 0});
                });

                $btns.on( 'click', 'span', function() {
                    var index = $(this).index(),
                        deg;
                    switch ( index ) {
                        case 0:
                            uploader.removeFile( file );
                            return;

                        case 1:
                            file.rotation += 90;
                            break;

                        case 2:
                            file.rotation -= 90;
                            break;
                    }

                    if ( supportTransition ) {
                        deg = 'rotate(' + file.rotation + 'deg)';
                        $wrap.css({
                            '-webkit-transform': deg,
                            '-mos-transform': deg,
                            '-o-transform': deg,
                            'transform': deg
                        });
                    } else {
                        $wrap.css( 'filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ (~~((file.rotation/90)%4 + 4)%4) +')');
                    }


                });

                $li.appendTo($queue);




            }

            // 负责view的销毁
            function removeFile( file ) {
                var $li = $('#'+file.id);

                delete percentages[ file.id ];
                updateTotalProgress();
                $li.off().find('.file-panel').off().end().remove();
            }

            function updateTotalProgress() {
                var loaded = 0,
                    total = 0,
                    spans = $progress.children(),
                    percent;

                $.each( percentages, function( k, v ) {
                    total += v[ 0 ];
                    loaded += v[ 0 ] * v[ 1 ];
                } );

                percent = total ? loaded / total : 0;

                opt.progress(Math.round( percent * 100 ) + '%');
                spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
                spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );
                if(fileType == 2){
                    updateStatus();
                }

            }

            function updateStatus() {
                var text = '', stats;

                if ( state === 'ready' ) {
                    text = '选中' + fileCount + '个文件，共' +
                        WebUploader.formatSize( fileSize ) + '。';
                } else if ( state === 'confirm' ) {
                    stats = uploader.getStats();
                    if ( stats.uploadFailNum ) {
                        text = '已成功上传' + stats.successNum+ '个文件，'+
                            stats.uploadFailNum + '个文件上传失败，<a class="retry" href="#">重新上传</a>失败文件';
                    }

                } else {
                    stats = uploader.getStats();
                    text = '共' + fileCount + '张（' +
                        WebUploader.formatSize( fileSize )  +
                        '），已上传' + stats.successNum + '张';

                    if ( stats.uploadFailNum ) {
                        text += '，失败' + stats.uploadFailNum + '张';
                    }
                }

                $info.html( text );
            }

            function setState( val ) {
                var file, stats;

                if ( val === state ) {
                    return;
                }

                $upload.removeClass( 'state-' + state );
                $upload.addClass( 'state-' + val );
                state = val;

                switch ( state ) {
                    case 'pedding':
                        $placeHolder.removeClass( 'element-invisible' );
                        $queue.hide();
                        $statusBar.addClass( 'element-invisible' );
                        uploader.refresh();
                        break;

                    case 'ready':
                        $placeHolder.addClass( 'element-invisible' );
                        $( addButton.id ).removeClass( 'element-invisible');
                        $queue.show();
                        $statusBar.removeClass('element-invisible');
                        uploader.refresh();
                        break;

                    case 'uploading':
                        $( addButton.id ).addClass( 'element-invisible' );
                        $progress.show();
                        $upload.text( '暂停上传' );
                        break;

                    case 'paused':
                        $progress.show();
                        $upload.text( '继续上传' );
                        break;

                    case 'confirm':
                        $progress.hide();
                        $( addButton.id ).removeClass( 'element-invisible' );
                        $upload.text( '开始上传' );

                        stats = uploader.getStats();
                        if ( stats.successNum && !stats.uploadFailNum ) {
                            setState( 'finish' );
                            return;
                        }
                        break;
                    case 'finish':
                        stats = uploader.getStats();
                        if ( stats.successNum ) {
                            console.log( '上传成功' );
                        } else {
                            // 没有成功的图片，重设
                            state = 'done';
                            location.reload();
                        }
                        break;
                }
                if(fileType == 2){
                    updateStatus();
                }
            }
            function getSize(size){
                var str;
                if(size/1024>1){
                    size = size/1024;
                    str = 'KB';
                }

                if(size/1024>1){
                    size = size/1024;
                    str = 'MB';
                }
                if(size/1024 >1){
                    size = size/1024;
                    str = 'GB';
                }
                size =   size.toFixed(2);
                str = size + str;
                return str;
            }

            function addFileImg(file){
                var html = '<div class="imgFile">' +
                    '<img src="">' +
                    '</div>';
                var img;
                var   $info = $('<p class="error"></p>');
                var   text = '';
                var  showError = function( code ) {
                    switch( code ) {
                        case 'exceed_size':
                            text = '文件大小超出';
                            break;

                        case 'interrupt':
                            text = '上传暂停';
                            break;

                        default:

                            text = '上传失败，请重试 '+'<a class="retry" href="#">重新上传</a>';
                            break;
                    }



                    $info.html( text ).appendTo( $wrap );

                };

                if ( file.getStatus() === 'invalid' ) {
                    showError( file.statusText );
                } else {
                    uploader.makeThumb(file, function (error, src) {

                        if (error) {
                            //$wrap.text( '不能预览' );
                            //return;
                        }
                        if (_that.isSupportBase64) {
                            img = $('<img src="' + src + '"><span class="x-fileName">' + file.name + '</span>');
                            $wrap.find(".x-imgFile").append(img);
                        } else {
                            console.log("预览出错");
                        }
                    }, thumbnailWidth, thumbnailHeight);
                }



                file.on('statuschange', function( cur, prev ) {
                    //状态改变
                    // 成功
                    if ( cur === 'error' || cur === 'invalid' ) {
                        console.log( file.statusText );
                        showError( file.statusText );
                    } else if ( cur === 'interrupt' ) {
                        showError( 'interrupt' );
                    } else if ( cur === 'queued' ) {
                        $info.remove();
                    } else if ( cur === 'progress' ) {
                        $info.remove();
                    } else if ( cur === 'complete' ) {

                    }

                });



                setState( 'ready' );

                $(".x-statusBar .x-upload-btns").remove();
                //$wrap.append($progress);
                //$(".x-queueList").remove();
            }

            updateTotalProgress();
        }
    };
    //uploader = WebUploader.create(opt_img);


    // 当有文件添加进来时执行，负责view的创建



})( $ );


/***/ }),
/* 33 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by Administrator on 2017/1/9.
 */

__webpack_require__(1);
// require('../format/format.js');


//自定义validator --begin
$.validator.setDefaults({
    debug: true,
    submitHandler: function () {
        alert("验证通过，提交成功!");
    }
});
//自定义validator --end

//自定义messages --begin
$.extend($.validator.messages, {
    required: "这里不能为空",
    remote: "请修正此字段",
    email: "请提供有效的邮箱, 格式name@domain.com",
    url: "请输入有效的网址",
    date: "请输入有效的日期",
    dateISO: "请输入有效的日期 (YYYY-MM-DD)",
    number: "请输入有效的数字",
    digits: "只能输入整数数字",
    creditcard: "请输入有效的信用卡号码",
    equalTo: "你的输入不相同",
    extension: "请检查后缀",
    maxlength: $.validator.format("最多可以输入 {0} 个字符"),
    minlength: $.validator.format("最少要输入 {0} 个字符"),
    rangelength: $.validator.format("请输入长度在 {0} 到 {1} 之间的字符串"),
    range: $.validator.format("请输入范围在 {0} 到 {1} 之间的数值"),
    max: $.validator.format("请输入不大于 {0} 的数值"),
    min: $.validator.format("请输入不小于 {0} 的数值")
});
//自定义messages --end


//自定义校验规则 --begin
$.validator.addMethod( "xlower", function( value, element ) {
    return /[a-z]/.test( value );
}, "请包含小写字母" );

$.validator.addMethod( "xcapital", function( value, element ) {
    return /[A-Z]/.test( value );
}, "请包含大写字母" );

$.validator.addMethod( "xdigit", function( value, element ) {
    return /\d/.test( value );
}, "请包含数字" );

$.validator.addMethod( "xspecial", function( value, element ) {
    return /\W/.test( value );
}, "请包含特殊字符" );

$.validator.addMethod( "xchars2", function( value, element ) {
    var val=0;
    if(/[a-z]/.test( value )){
        val++;
    }
    if(/[A-Z]/.test( value )){
        val++;
    }
    if(/\d/.test( value )){
        val++;
    }
    if(/\W/.test( value )){
        val++;
    }
    return val>=2;
}, "请至少包含2种字符" );


$.validator.addMethod( "xname", function( value, element ) {
    return /^(\w+|[\u4e00-\u9fa5]+)$/.test( value );
}, "姓名可以包含字母、数字、下划线或汉字" );

$.validator.addMethod( "xuser", function( value, element ) {
    return /^(?![\d_])[\w\u4e00-\u9fa5]+$/.test( value );
}, "用户名可以包含字母、数字、'_'和汉字，不允许以数字或'_'开头" );

$.validator.addMethod( "xpwd", function( value, element ) {
    return /^\S+$/.test( value );
}, "密码最少6位，可以包含任何非空白字符" );

$.validator.addMethod( "xphone", function( value, element ) {
    return /^1(3[0-9]|4[57]|5[0-35-9]|7[0135678]|8[0-9])\d{8}$/.test(value);
}, "请输入正确的11位手机号码, 支持13[0-9], 14[5,7], 15[0, 1, 2, 3, 5, 6, 7, 8, 9], 17[0, 1, 6, 7, 8], 18[0-9]");//支持13[0-9], 14[5,7], 15[0, 1, 2, 3, 5, 6, 7, 8, 9], 17[0, 1, 6, 7, 8], 18[0-9]

$.validator.addMethod( "xemail", function( value, element ) {
    return /^[\w.]{1,64}@([a-z0-9-]{1,200}.){1,5}[a-z]{1,6}$/.test( value );
}, "请输入正确的Email地址，格式: name@domain" );

$.validator.addMethod( "xurl", function( value, element ) {
    return /^((http|ftp|https):\/\/)?[\w_.]+(\/[\w_]+)*\/?$/.test( value );
}, "请输入正确的url地址" );

$.validator.addMethod( "xip", function( value, element ) {
    return /^([01]?\d{1,2}|2[0-4]\d|25[0-5])\.([01]?\d{1,2}|2[0-4]\d|25[0-5])\.([01]?\d{1,2}|2[0-4]\d|25[0-5])\.([01]?\d{1,2}|2[0-4]\d|25[0-5])$/.test( value );
}, "请输入正确的ip地址" );

$.validator.addMethod( "xpostid", function( value, element ) {
    return /^[1-9]\d{5}(?!\d)$/.test( value );
}, "请输入正确的邮政编码" );

$.validator.addMethod( "xtel", function( value, element ) {
    return /^(([0+]\d{2,3}-)?(0\d{2,3})-)(\d{7,8})(-(\d{3,}))?$/.test( value );
}, "请输入正确的固定电话" );

$.validator.addMethod( "xidcn", function( value, element ) {
    return /^\d{17}([0-9]|X|x)$/.test( value );
}, "请输入正确的身份证" );
//自定义校验规则 --end





/***/ }),
/* 34 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(3);


/***/ })
],[34]);