$(document).ready(function() {
    var ua = window.navigator.userAgent.toLowerCase(),
        is_ie = (/trident/gi).test(ua) || (/msie/gi).test(ua);

    if($(window).width() <= 880 && $(window).width() >= 767) {
        $('.ServiceComplex__name').click(function(){
            $('.ServiceComplex__text').css('display','none');
            $(this).parent().find('.ServiceComplex__text').css('display','block');
        });
    }

    if(is_ie) {
        $("head").append("<link rel='stylesheet' type='text/css' href='/bitrix/templates/mkws/components/bitrix/news/services/bitrix/news.detail/.default/ie.css' />");
    }

    function removeClass(element, cl) {
        $(element).removeClass(cl);
    }
    function ColorLuminance(hex, lum) {

        hex = String(hex).replace(/[^0-9a-f]/gi, '');
        if (hex.length < 6) {
            hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
        }
        lum = lum || 0;

        var rgb = "#", c, i;
        for (i = 0; i < 3; i++) {
            c = parseInt(hex.substr(i*2,2), 16);
            c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
            rgb += ("00"+c).substr(c.length);
        }

        return rgb;
    }

    setTimeout(function(){$('.ServiceTariffsFlip').css('height',$('.ServiceTariffsFlipFront').height())}, 500);

        var minItem = 1;
        var margin = 0;
        if($(window).width()> 767) {
            minItem= 1;
            margin = 0;
        }
        if($('.Results').length != 0){
            $('.Results .flexslider').flexslider({
                animation: "slide",
                animationLoop: true,
                itemWidth: 210,
                itemMargin: margin,
                minItems: minItem,
                maxItems: minItem,
                controlNav: true,
                directionNav: true,
                controlsContainer: ".ResultControl",
                slideshow: true,
                touch: false,
                pauseOnHover: true
            });
        }

    $('.ServiceRecommendItems ').flexslider({
        animation: "slide",
        controlsContainer: ".ServiceRecommend__control",
        startAt: 1

    });
    function getPosition(element) {
        var yPosition = 0;

        while(element) {
            yPosition += (element.offsetTop - element.scrollTop + element.clientTop);
            element = element.offsetParent;
        }

        return  yPosition ;
    }

    var element = document.getElementsByClassName('move');
    var Visible = function (targets){
        for(var i = 0; i < targets.length; i++){
            var target = targets[i];

                var targetPosition = {
                        top: window.pageYOffset + target.getBoundingClientRect().top,
                        bottom: window.pageYOffset + target.getBoundingClientRect().bottom
                    },
                    windowPosition = {
                        top: window.pageYOffset,
                        bottom: window.pageYOffset + document.documentElement.clientHeight
                    };
                if (targetPosition.bottom > windowPosition.top &&
                    targetPosition.top  < windowPosition.bottom ) {
                    var movesVertical = $(target).find('.moveVertical');
                    if(movesVertical ) {
                        movesVertical.each(function(){
                            $(this).css('transform','translateY(' + (windowPosition.top -getPosition(target) - target.offsetHeight)/30 +'px)')
                        });
                    }

                    var movesHorizontal = $(target).find('.moveHorizontal');
                    if(movesHorizontal ) {
                        movesHorizontal.each(function(){
                            $(this).css('transform','translateX(' + (getPosition(target) + target.offsetHeight - windowPosition.top - 250 )/15 +'px)')
                        });
                    }

                    var movesToTop = $(target).find('.bottom-top');
                    if(movesToTop ) {
                        movesToTop.each(function(key){
                            if($(this).hasClass('vis')){
                            setTimeout(removeClass, key*300,$(this),'bottom-top');
                                $(this).removeClass('vis');
                            }
                        });
                    }

                    var movesToTopOpacity = $(target).find('.bottom-top-opacity');
                    if(movesToTopOpacity ) {
                        movesToTopOpacity.each(function(key){
                            if($(this).hasClass('vis')){
                                setTimeout(removeClass, key*200,$(this),'bottom-top-opacity');
                                $(this).removeClass('vis');
                            }
                        });
                    }
                };

        }
    };



    if(element) {
        Visible(element);
    }

    var target = document.getElementsByTagName('h1')[0];

    var h1 = target.getBoundingClientRect().top+ pageYOffset - 80;

    var h1_head = false;

    $('.headerBlock__rightLink .header').text($('h1').html());

    $(window).scroll(function(){

            if($(this).scrollTop() >=  h1 && !h1_head) {
                $('.Service__header').prepend('<div>'+$('h1').html()+'</div>');
                $('.Service__header').addClass('abs');
                $('.topMenu').addClass('hidden');

                $('.Service__header').addClass('active');
                var names = document.querySelector('.headerBlock__rightLink .header');
                if($(window).width() > 1380){
                    var x = $('.Service').width() - target.offsetWidth/2.76 - 30;
                } else {
                    var x = $('.Service').width() - target.offsetWidth/2.76 - 30;
                }

                $('.Service__header div').css("transform","translate("+Math.abs(x)+"px, -44px)");
                setTimeout(function(){
                    $('.headerBlock__rightLink').addClass('h1_top');
                    $('.Service__header').addClass('hidden');
                }, 220);
                h1_head = true;

            }

            if($(this).scrollTop() <  h1 ) {
                $('.Service__header').removeClass('hidden');
                $('.Service__header div').css("transform","translate("+0+"px, 0px)");
                $('.Service__header').removeClass('abs');
                $('.topMenu').removeClass('hidden');
                $('.headerBlock__rightLink').removeClass('h1_top');
                $('.Service__header').removeClass('active');
                h1_head = false;
                setTimeout(function () {
                    $('.Service__header div').remove();
                },1500);
            }

            if(element) {
                Visible (element,$(this).scrollTop());
            }

            var portfolio = getPosition(document.getElementsByClassName('Portfolio')[0]);

            if($(this).scrollTop()+ $(window).height() > portfolio + $('.Portfolio').height()*0.5) {
                if($(this).scrollTop() + $(window).height() < portfolio + $('.Portfolio').height()){
                    var k = ($(this).scrollTop() + $(window).height() - portfolio-  $('.Portfolio').height()*0.5)/$('.Portfolio').height();
                    if(k > 0){
                        var k2 = (1 -($(this).scrollTop() + $(window).height() - portfolio - $('.Portfolio').height()*0.5)/($('.Portfolio').height()))*6.8;
                        $('main').css('background-color',ColorLuminance("212121", k2));
                        if(k2 < 5) {
                            $('.Portfolio').addClass('white');
                            $('.Arrows').addClass('white');
                        } else {
                            $('.Portfolio').removeClass('white');
                            $('.Arrows').removeClass('white');
                        }
                    }
                } else {
                    $('main').css('background-color',"#212121");
                }

            } else {
                $('main').css('background-color',"#fff");
                $('.Portfolio').removeClass('white');
                $('.Arrows').removeClass('white');
            }


        });


    $('.move-container').mouseover(function(){
        $('.move-container').mousemove(function(event){
            var img = $(this).find('.moveVertical');
            var ww = $(this).width();
            var hh = $(this).height();
            img.each(function () {
                $(this).css('transform', 'translate3d(' + ($(this)[0].getBoundingClientRect().width/(ww)) * event.originalEvent.movementX + 'px, ' + ($(this)[0].getBoundingClientRect().height/(hh)) * event.originalEvent.movementY + 'px, 0px)');
            });
        });
    });

    $('.move-container').mouseout(function(){
        var img = $('.moveVertical');
        img.each(function () {
            $(this).css('left','');
            $(this).css('top','');
        });
    });

    $('.ServiceTariffs__help').click(function(){

        $('.ServiceTariffsFlip').toggleClass('back');
        if($('.ServiceTariffsFlip').hasClass('back')){
            $('.ServiceTariffsFlip').css('height',$('.ServiceTariffsFlipBack').height());
        } else {
            $('.ServiceTariffsFlip').css('height',$('.ServiceTariffsFlipFront').height());
        }
    });


    var el = document.getElementsByClassName('Progress__background');
    $('.Progress__background').css('background-position-x',el[0].getBoundingClientRect().left+'px');

});