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


        var minItem = 1;
        var margin = 0;
        if($(window).width()> 767) {
            minItem= 1;
            margin = 0;
        }

        var h_front = $('.ServiceTariffsFlipFront').height(),
            h_back = $('.ServiceTariffsFlipBack').height();



        setTimeout(function(){$('.ServiceTariffsFlip').css('height',$('.ServiceTariffsFlipFront').height() - 5 );},1000);

         // $('.ServiceTariffsFlipBack').css('height',hhh);
         // $('.ServiceTariffsFlipFront').css('height',hhh);

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
                touch: true,
                pauseOnHover: true
            });
        }

    $('.ServiceRecommendItems ').flexslider({
        animation: "slide",
        controlsContainer: ".ServiceRecommend__control",
        startAt: 1

    });

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
        });

    $('.ServiceTariffs__help').click(function(){

        $('.ServiceTariffsFlip').toggleClass('back');
        if($('.ServiceTariffsFlip').hasClass('back')){
            $('.ServiceTariffsFlip').css('height',$('.ServiceTariffsFlipBack').height());
        } else {
            $('.ServiceTariffsFlip').css('height',$('.ServiceTariffsFlipFront').height());
        }
    });

    $('.StepsNumber').click( function(){
        $('.StepsNumber').removeClass('StepsNumberCurrent');
        $('.StepsItem').removeClass('StepsItemCurrent');
        var id = $(this).attr('data-id');
        $(this).addClass('StepsNumberCurrent');
        $('.StepsItem[data-id="'+id+'"]').addClass('StepsItemCurrent');
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
    var Visible = function (targets, scrollTop){
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

                var moveHorizontalLeft = $(target).find('.moveHorizontalLeft');
                if(moveHorizontalLeft ) {
                    moveHorizontalLeft.each(function(){
                        $(this).css('transform','translateX(' + (getPosition(target) + target.offsetHeight - windowPosition.top - 250 )/40 +'px)')
                    });
                }


                var movesHorizontalRight = $(target).find('.movesHorizontalRight');
                if(movesHorizontalRight ) {
                    movesHorizontalRight.each(function(){
                        $(this).css('transform','translateX(' + -(getPosition(target) + target.offsetHeight - windowPosition.top - 250 )/40 +'px)')
                    });
                }

            };

        }
    };

    $(window).scroll(function(){

        if(element) {
            Visible (element,$(this).scrollTop());
        }


    });

    var el = document.getElementsByClassName('Progress__background');
    $('.Progress__background').css('background-position-x',el[0].getBoundingClientRect().left+'px');
});