$(document).ready(function() {
    $("head").append("<link rel='stylesheet' type='text/css' href='/bitrix/templates/mkws/css/fonts/gilroy.css' />");
    $("head").append("<link rel='stylesheet' type='text/css' href='/bitrix/templates/mkws/css/fonts/circe.css' />");

    window.addEventListener('scroll', function() {
        if(pageYOffset > $(window).height()/3) {
            $('header').addClass('fix');
        } else {
            $('header').removeClass('fix');
        }
    });
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

    function getPosition(element) {
        var yPosition = 0;

        while(element) {
            yPosition += (element.offsetTop - element.scrollTop + element.clientTop);
            element = element.offsetParent;
        }

        return  yPosition ;
    }
    var array = document.location.href.split('/');
    var array2 = array.filter(function (el) {
        return el != '';
    });
    $(window).scroll(function(){


        if((array2[2] == 'proekty' && array2[3]) || (array2[2] == 'zapolnite-brif')){} else {



        if($(window).height() * 2 < $(document).height() && $(window).height() <= 1500) {
        var portfolio = getPosition(document.getElementsByTagName('footer')[0]) - $(window).height() + $('footer').height();



        if($(this).scrollTop()+ $(window).height() > portfolio + $(window).height()*0.5) {
            if($(this).scrollTop() < portfolio ){
                var k = ($(this).scrollTop() + $(window).height()*0.5 - portfolio)/$(window).height();
                if(k > 0){
                    var k2 = (1 -($(this).scrollTop() + $(window).height() - portfolio - $(window).height()*0.5)/( $(window).height()))*($(window).height()*0.01 - 1);

                    $('main').css('background-color',ColorLuminance("151515", k2));
                    $('main').addClass('active');
                    if(k2 < 5) {
                        $('main').addClass('white');

                    } else {
                        $('main').removeClass('white');
                    }
                }
            } else {
                $('main').css('background-color',"#151515");
                $('main').addClass('white');
            }

        } else {
            $('main').css('background-color',"#fff");
            $('main').removeClass('white');
            $('main').removeClass('active');
        }}
        }
    });
    if((array2[2] == 'proekty' && array2[3]) || (array2[2] == 'zapolnite-brif')){} else {
        if ($(window).height() * 2 < $(document).height() && $(window).height() <= 1500) {
            setTimeout(function () {
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                if (scrollTop + $(window).height() > getPosition(document.getElementsByTagName('footer')[0])) {
                    $('main').css('background-color', "#151515");
                    $('main').addClass('white');
                    $('main').addClass('active');
                }
            }, 100);

        }
    }
    $('.toTop').click(
        function(e){
            e.preventDefault();
            $('body,html').animate({scrollTop:0},800);
        });


    if($(window).width() < 768) {
    $('.headerBlock__menuBtn').click(function(e){
        $('body').toggleClass('Menu_visible_true');
        return false;
    });

        $('.BurgerMenu__item > a').click(function(){
            var parent = $(this).parent().find('ul');
            parent.toggleClass('BurgerMenu_xs_hidden');
            $('.BurgerMenu__item ul').removeClass('active');
            parent.addClass('active');
            $('.BurgerMenu__item ul:not(.active)').addClass('BurgerMenu_xs_hidden');
            return false;
        });
    }
    $(window).scroll(function() {

        if(window.scrollY > 700) {

            $('.toTop').removeClass('toHidden');
            $('.toBack').removeClass('toHidden');

        } else {

            $('.toTop').addClass('toHidden');
            $('.toBack').addClass('toHidden');

        }

    });
    $('.InputItem_focus_off input').focusin(function(){
        $(this).parent().addClass('InputItem_focus_on');
    });

    $('.InputItem_focus_off input').focusout(function(){
        if($(this).val() == ''){
            $(this).parent().removeClass('InputItem_focus_on');
        }
    });

    $('.InputItem_focus_off textarea').focusin(function(){
        $(this).parent().addClass('InputItem_focus_on');
    });

    $('.InputItem_focus_off textarea').focusout(function(){
        if($(this).val() == ''){
            $(this).parent().removeClass('InputItem_focus_on');
        }
    });

    $('form input[type="file"]').change(function (e) {
        $('.FileList').html('<li>'+$(this)[0].files[0].name+'</li>');
        $('.InputFile').text($('.InputFile').attr('data-full'));
        // document.getElementById('files').value = "";
    });

    $('body').on('click','.FileList li',function(){
        document.getElementById('files').value = "";
        $('.FileList').html('');
        $('.InputFile').text($('.InputFile').attr('data-empty'));
    });

    $('form input[type="submit"]').click(function (e) {

        var form = $(this).parents('form');
        var bool = true;

        if(!form.find('#check')[0].checked) {
            bool = false;
        }

        if(form.find('#g-recaptcha-response').val() == '' || form.find('#g-recaptcha-response').val() == ' '){
            bool = false;
        }


        if(bool) {

            var $input = $("#files");
            var formData = new FormData();
            formData.append('form_file_23', $input.prop('files')[0]);
            $('form input[type="text"]').each(function () {
                formData.append($(this).attr('name'), $(this).val());
            });
            $('form input[type="hidden"]').each(function () {
                formData.append($(this).attr('name'), $(this).val());
            });
            $('form textarea').each(function () {
                formData.append($(this).attr('name'), $(this).val());
            });

            $('form input[type="checkbox"]:checked').each(function () {
                formData.append($(this).attr('name'), $(this).val());
            });
            formData.append('web_form_apply', 'Y');
            // const queryString = new URLSearchParams(formData).toString();

            $.ajax({
                url: form.attr("action"),
                data: formData,
                type: 'post',
                processData: false,
                contentType: false,
                success: function () {

                        $('.PopupSuccess').css('display','block');

                },
                error: function (data) {
                    console.log(data);
                    if(data.status == 200) {

                        $('.PopupSuccess').css('display','block');
                    } else {
                        $('.PopupError').css('display','block');
                    }
                }
            });

        }
        return false;
    });
    $('.PopupSuccess .close').click(
        function(){
            $(this).parent().parent().css('display','none');
            return false;
        }
    );

    $('.PopupError .close').click(
        function(){
            $(this).parent().parent().css('display','none');
            return false;
        }
    );

    window.onload = function() {
        $("head").append("<script src='/bitrix/templates/mkws/js/async.js' async></script>");
    };
    var myCookie = getCookie("knowAboutCookie");
    if (myCookie == null) {
        $('.cookie-popup').css({
            "display": "block"
        });
    }
    $('.cookie-close').on('click', function () {
        $('.cookie-popup').fadeOut('slow');
        setCookie("knowAboutCookie","yes",{'max-age':36000000000,'path':'/'});
    });
});

function setCookie(name, value, options) {
    options = options || {};

    var expires = options.expires;

    if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString) {
        options.expires = expires.toUTCString();
    }

    value = encodeURIComponent(value);

    var updatedCookie = name + "=" + value;

    for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true) {
            updatedCookie += "=" + propValue;
        }
    }

    document.cookie = updatedCookie;
}

function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
            end = dc.length;
        }
    }
    // because unescape has been deprecated, replaced with decodeURI
    //return unescape(dc.substring(begin + prefix.length, end));
    return decodeURI(dc.substring(begin + prefix.length, end));
}