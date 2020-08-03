</div>
</main>
<footer>
    <div class="footerBlock">
        <div class="footerSubmit">
            <div class="footerLeftSubmit">
                <div class="footerSubmit__label">
                    отдел продаж
                </div>
                <div class="footerSubmit__email">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/email2.php"), false);?>
                </div>
            </div>
            <div class="footerCenterSubmit">
                <div class="footerSubmit__label">
                    поддержка
                </div>
                <div class="footerSubmit__email">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/email.php"), false);?>
                </div>
            </div>
            <div class="footerRightSubmit">
<!--                <a class="footerBlock__brifBtn" href="/zapolnite-brif/">-->
<!--                    Заполнить бриф-->
<!--                </a>-->
            </div>
        </div>
        <div class="footerInfo">
            <div class="footerLeftInfo">

                <div class="footerLeftInfo__city">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/city.php"), false);?>
                </div>

                <div class="footerLeftInfo__address">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/address.php"), false);?>
                </div>
                <div class="footerCenterInfo__phone">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/phone.php"), false);?>
                </div>
                <div class="footerCenterInfo__shedule">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/shedule.php"), false);?>
                </div>
            </div>
            <div class="footerCenterInfo">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "bottom_mkws",
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "Y",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "bottom",
                        "USE_EXT" => "N",
                        "COMPONENT_TEMPLATE" => "bottom_mkws"
                    ),
                    false
                );?>

            </div>
            <div class="footerSocnet">
                <div class="footerSocnet__vk">
                    <svg class="inline-svg-icon vk">
                        <use xlink:href="#vk"></use>
                    </svg>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/vk.php"), false);?>
                </div>
                <div class="footerSocnet__fb">
                    <svg class="inline-svg-icon fb">
                        <use xlink:href="#fb"></use>
                    </svg>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/fb.php"), false);?>
                </div>
                <div class="footerSocnet__insta">
                    <svg class="inline-svg-icon insta">
                        <use xlink:href="#insta"></use>
                    </svg>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/insta.php"), false);?>
                </div>
                <div class="footerSocnet__insta">
                    <svg class="inline-svg-icon insta">
                        <use xlink:href="#yandex"></use>
                    </svg>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/yandex.php"), false);?>
                </div>
                <div class="footerSocnet__insta">
                    <svg class="inline-svg-icon insta">
                        <use xlink:href="#google"></use>
                    </svg>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/google.php"), false);?>
                </div>
            </div>
        </div>
        <div class="footerInfoBottom">
            <div class="footerInfoBottom__warning">
                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/info_footer.php"), false);?>
            </div>
            <div class="footerInfoBottom__copy">
                <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/copy.php"), false);?>
            </div>
        </div>
    </div>
</footer>
<svg style="display: none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <symbol id="vk" viewBox="0 0 22 14">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.9341 8.90184C19.6639 9.70303 20.4342 10.4568 21.0887 11.3388C21.3778 11.7308 21.6515 12.1352 21.8609 12.5901C22.1577 13.2367 21.8889 13.9482 21.3733 13.9868L18.1683 13.9852C17.3417 14.0623 16.6822 13.6881 16.1278 13.0526C15.684 12.5443 15.2731 12.0034 14.8464 11.478C14.6715 11.2632 14.4884 11.0612 14.2697 10.9015C13.8321 10.5821 13.4524 10.6799 13.2023 11.193C12.9477 11.7149 12.8899 12.2928 12.8649 12.8745C12.8306 13.7232 12.6024 13.9463 11.8443 13.9851C10.2242 14.071 8.6866 13.7954 7.25822 12.8764C5.99891 12.0661 5.02236 10.9223 4.17239 9.62744C2.51748 7.10599 1.25014 4.33534 0.111107 1.48705C-0.14528 0.845332 0.0422219 0.500859 0.671878 0.488667C1.71745 0.465827 2.76288 0.467453 3.80968 0.487042C4.23463 0.494032 4.51595 0.768114 4.68003 1.21955C5.24572 2.78366 5.9379 4.27177 6.80674 5.65113C7.03812 6.01836 7.27405 6.38559 7.61002 6.64407C7.9817 6.93026 8.26468 6.83541 8.43954 6.36982C8.55049 6.07461 8.59906 5.75663 8.62407 5.44045C8.70691 4.35265 8.71782 3.26672 8.57254 2.18275C8.48334 1.50624 8.14448 1.06829 7.54417 0.94027C7.23783 0.875 7.28344 0.746819 7.43177 0.550198C7.68938 0.21109 7.93168 0 8.41467 0H12.0368C12.6071 0.126556 12.7337 0.414619 12.8118 1.05984L12.8149 5.58423C12.8087 5.83401 12.9258 6.57522 13.3259 6.74055C13.6461 6.85825 13.8572 6.57018 14.0493 6.34186C14.9166 5.30682 15.5355 4.08361 16.0885 2.81699C16.3339 2.26004 16.5449 1.68164 16.7494 1.10373C16.9009 0.674884 17.1386 0.463876 17.5682 0.473223L21.0543 0.476719C21.1577 0.476719 21.2623 0.478426 21.3624 0.49769C21.9498 0.610265 22.1108 0.894427 21.9294 1.53948C21.6435 2.55152 21.0873 3.3949 20.5434 4.24219C19.9621 5.14677 19.3403 6.02039 18.7638 6.93034C18.2341 7.76129 18.2761 8.18014 18.9341 8.90184Z"/>
    </symbol>

    <symbol id="fb" viewBox="0 0 17 17">
        <path d="M12.7511 0.0035371L10.5466 0C8.06995 0 6.46941 1.6421 6.46941 4.18368V6.11263H4.25289C4.06135 6.11263 3.90625 6.26791 3.90625 6.45945V9.25428C3.90625 9.44582 4.06153 9.60092 4.25289 9.60092H6.46941V16.6532C6.46941 16.8447 6.62451 16.9998 6.81604 16.9998H9.70798C9.89951 16.9998 10.0546 16.8445 10.0546 16.6532V9.60092H12.6462C12.8378 9.60092 12.9929 9.44582 12.9929 9.25428L12.9939 6.45945C12.9939 6.36748 12.9573 6.27941 12.8924 6.21433C12.8275 6.14924 12.7391 6.11263 12.6471 6.11263H10.0546V4.47743C10.0546 3.69149 10.2419 3.29251 11.2657 3.29251L12.7508 3.29198C12.9421 3.29198 13.0972 3.1367 13.0972 2.94534V0.350173C13.0972 0.158993 12.9423 0.00389081 12.7511 0.0035371Z"/>
    </symbol>
    <symbol id="insta" viewBox="0 0 17 17">
        <path d="M11.6875 0H5.3125C2.37894 0 0 2.37894 0 5.3125V11.6875C0 14.6211 2.37894 17 5.3125 17H11.6875C14.6211 17 17 14.6211 17 11.6875V5.3125C17 2.37894 14.6211 0 11.6875 0ZM15.4062 11.6875C15.4062 13.7381 13.7381 15.4062 11.6875 15.4062H5.3125C3.26188 15.4062 1.59375 13.7381 1.59375 11.6875V5.3125C1.59375 3.26188 3.26188 1.59375 5.3125 1.59375H11.6875C13.7381 1.59375 15.4062 3.26188 15.4062 5.3125V11.6875Z"/>
        <path d="M8.5 4.25C6.15294 4.25 4.25 6.15294 4.25 8.5C4.25 10.8471 6.15294 12.75 8.5 12.75C10.8471 12.75 12.75 10.8471 12.75 8.5C12.75 6.15294 10.8471 4.25 8.5 4.25ZM8.5 11.1562C7.03588 11.1562 5.84375 9.96413 5.84375 8.5C5.84375 7.03481 7.03588 5.84375 8.5 5.84375C9.96413 5.84375 11.1563 7.03481 11.1563 8.5C11.1563 9.96413 9.96413 11.1562 8.5 11.1562Z"/>
        <path d="M13.0702 4.49737C13.383 4.49737 13.6365 4.24382 13.6365 3.93106C13.6365 3.61829 13.383 3.36475 13.0702 3.36475C12.7575 3.36475 12.5039 3.61829 12.5039 3.93106C12.5039 4.24382 12.7575 4.49737 13.0702 4.49737Z"/>
    </symbol>
    <symbol id="google" viewBox="0 0 17 17">
        <path d="M9.32397 10.2536H13.4757C12.747 12.3136 10.7732 13.7906 8.46247 13.7735C5.65869 13.7528 3.34036 11.5103 3.23151 8.70906C3.11483 5.70637 5.52427 3.22636 8.50207 3.22636C9.86363 3.22636 11.1061 3.74504 12.0428 4.59496C12.2647 4.79632 12.6024 4.7976 12.8207 4.59224L14.3456 3.1573C14.584 2.93287 14.5849 2.55385 14.3471 2.32866C12.8616 0.92156 10.8688 0.0445056 8.67129 0.00160084C3.98417 -0.0898906 0.0333483 3.75235 0.000699768 8.4394C-0.0322387 13.1616 3.78659 17 8.50207 17C13.0369 17 16.7414 13.45 16.9895 8.97809C16.9961 8.92202 17.0005 7.0272 17.0005 7.0272H9.32397C9.00931 7.0272 8.75427 7.28219 8.75427 7.59679V9.68399C8.75427 9.99858 9.00937 10.2536 9.32397 10.2536Z"/>
    </symbol>
    <symbol id="yandex" viewBox="0 0 17 17">
        <path d="M8.98416 0H6.2893C3.55906 0 0.804116 1.80698 0.804116 5.84395C0.804116 7.93502 1.7929 9.5636 3.60548 10.4898L0.287957 15.8717C0.13066 16.1263 0.126548 16.4147 0.276917 16.6434C0.423729 16.8667 0.6922 17 0.99479 17H2.673C3.05424 17 3.3515 16.8348 3.49405 16.5455L6.6046 11.0925H6.83161V16.3204C6.83161 16.6888 7.17848 17 7.58905 17H9.0551C9.51555 17 9.83699 16.7119 9.83699 16.2993V0.74385C9.83707 0.3059 9.48639 0 8.98416 0ZM6.83161 8.6702H6.43115C4.87838 8.6702 3.95138 7.53419 3.95138 5.63135C3.95138 3.26533 5.1224 2.42233 6.21836 2.42233H6.83161V8.6702Z"/>
    </symbol>
    <symbol id="arrow" viewBox="0 0 44 10">
        <path d="M0 5L37 5" stroke-width="2"/>
        <path d="M37 1.5359L43 5L37 8.4641L37 1.5359Z"/>
    </symbol>
</svg>
<?$curPage = $APPLICATION->GetCurPage(true);?>
<a class="toTop toHidden" href="#"><div>Наверх</div></a>
<div class="cookie-popup">
    <div class="Text">
        Этот сайт использует cookie (файлы с данными о прошлых посещениях сайта) для персонализации сервисов и удобства пользователей. ООО "Матус энд Квитс" серьезно относится к защите персональных данных — ознакомьтесь с <a href="/poryadok-obrabotki-personalnykh-dannykh/">условиями и принципами их обработки</a>.
        <br>
        <span style="color: #B9B5B5">Вы можете запретить сохранение cookie в настройках своего браузера</span>
        <div class="cookie-close">Понятно!</div>
    </div>
</div>
<script>
    (function(w,d,u){
        var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://cdn.bitrix24.ru/b28547/crm/tag/call.tracker.js');
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163236877-1" ></script>
<script >
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-163236877-1');
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(20617288, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/61783390" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>