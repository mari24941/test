<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<?$curPage = $APPLICATION->GetCurPage(true);?>
<?$is404 = defined("ERROR_404") && ERROR_404 === "Y"?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <title><?$APPLICATION->ShowTitle()?></title>
    <? $APPLICATION->ShowMeta("description", false, $bXhtmlStyle);?>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.js"></script>
    <?echo '<meta http-equiv="Content-Type" content="text/html; charset='.LANG_CHARSET.'"'.($bXhtmlStyle? ' /':'').'>'."\n";
    $APPLICATION->ShowMeta("robots", false, $bXhtmlStyle);
    $APPLICATION->ShowLink("canonical", null, $bXhtmlStyle);
    $APPLICATION->ShowCSS(true, $bXhtmlStyle);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();

    ?>

    <script src="<?=SITE_TEMPLATE_PATH?>/js/script.js" ></script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5FPL84X');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FPL84X"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?$is404 = defined("ERROR_404") && ERROR_404 === "Y"?>
<header <?if (isset($GLOBALS["USER"]) && is_object($USER) && $USER->IsAuthorized() && !isset($_REQUEST["bx_hit_hash"]) && !$isFrameAjax && $USER->IsAdmin())
{echo 'style="top: 40px;"';}?>>
    <div class="headerBlock">

        <div class="headerBlock__leftLink">
            <a href="#" class="headerBlock__menuBtn">

            </a>
            <a href="/" class="headerBlock__logo"><svg xmlns="http://www.w3.org/2000/svg" width="185" height="28" viewBox="0 0 185 28" fill="none">
                    <path d="M35.6708 11.7455L30.7171 15.1357C28.3812 16.7518 26.0453 18.349 23.7209 19.9613C23.6181 20.058 23.4817 20.1119 23.3398 20.1119C23.1979 20.1119 23.0615 20.058 22.9587 19.9613C19.1482 17.3369 15.3376 14.7189 11.527 12.1071C11.3898 12.0129 11.245 11.9263 11.0202 11.7831V12.3971C11.0202 16.9175 11.0202 21.4379 11.0202 25.9583C11.0311 26.0952 11.0068 26.2327 10.9495 26.3578C10.8922 26.483 10.8038 26.5918 10.6925 26.674C10.1895 27.0733 9.71317 27.5028 9.13015 27.9962V27.435C9.13015 21.9452 9.13015 16.4554 9.13015 10.9657C9.14353 10.8075 9.11168 10.6487 9.03825 10.5075C8.96482 10.3664 8.85274 10.2484 8.7148 10.1671C5.95975 8.2836 3.21994 6.40011 0.472512 4.51662C0.346763 4.42998 0.224824 4.33957 0 4.17005C1.14317 4.17005 2.14917 4.17005 3.16278 4.17005C3.31548 4.20481 3.45615 4.27889 3.57051 4.38477L8.66526 7.87677C8.79101 7.96341 8.92057 8.03875 9.12253 8.16306V0C9.71698 0.425669 10.2276 0.802368 10.7496 1.164C14.5679 3.79335 18.3708 6.4202 22.1585 9.04453C22.5396 9.30069 22.9206 9.72636 23.3017 9.72259C23.6828 9.71882 24.0638 9.28939 24.4449 9.02946L35.9986 1.05099C36.4749 0.723261 36.9626 0.406835 37.5228 0.0414371V8.17059C37.7209 8.05381 37.8429 7.99354 37.9534 7.9182C39.6643 6.74667 41.3829 5.56384 43.09 4.40361C43.3182 4.25891 43.5813 4.17699 43.8522 4.16629C44.7438 4.13615 45.6355 4.16629 46.6529 4.16629C46.4319 4.33203 46.3138 4.42621 46.1919 4.50908C43.4482 6.39257 40.7046 8.27607 37.9496 10.1596C37.8051 10.2453 37.6881 10.3697 37.6119 10.5183C37.5357 10.6669 37.5035 10.8337 37.519 10.9996C37.519 16.4592 37.519 21.9176 37.519 27.3747V28C36.8636 27.4237 36.2805 26.9377 35.7318 26.4141C35.6366 26.3237 35.6442 26.0977 35.6442 25.9357C35.6442 21.4279 35.6442 16.92 35.6442 12.4122L35.6708 11.7455ZM11.0431 3.86116C11.0431 5.74465 11.0431 7.5189 11.0431 9.29315C11.0808 9.44954 11.1793 9.58491 11.3174 9.66985C15.2423 12.372 19.1558 15.0667 23.0578 17.7538C23.1373 17.8261 23.2413 17.8662 23.3493 17.8662C23.4573 17.8662 23.5614 17.8261 23.6408 17.7538C27.548 15.0592 31.4563 12.367 35.366 9.67739C35.4501 9.60799 35.5191 9.52248 35.5689 9.42602C35.6186 9.32956 35.6481 9.22414 35.6556 9.11611C35.6823 8.00861 35.6556 6.90112 35.6556 5.79362V3.79712L23.3017 12.318L11.0431 3.86116Z" fill="#6600CC"/>
                    <path d="M56.1641 20.9908V7.44243H57.6672L62.9544 15.7389L68.2717 7.44243H69.7523V20.9908H68.1402V10.413L62.9544 18.4252L57.7649 10.413V20.9908H56.1641Z" fill="#6600CC"/>
                    <path d="M71.1094 20.9908L76.2489 10.1521H77.2445L82.4329 20.9908H80.7385L79.4236 18.2348H74.0811L72.7775 20.9908H71.1094ZM74.7687 16.8004H78.7248L76.7599 12.6543L74.7687 16.8004Z" fill="#6600CC"/>
                    <path d="M85.9196 20.9908V11.662H81.5273V10.1521H91.945V11.662H87.5411V20.9908H85.9196Z" fill="#6600CC"/>
                    <path d="M93.7578 10.1521H95.3424V16.8994C95.3424 17.9112 95.5709 18.5931 96.028 18.9451C96.485 19.2972 97.3891 19.4745 98.7402 19.4771C100.101 19.4771 101.01 19.2998 101.467 18.9451C101.924 18.5905 102.153 17.9086 102.153 16.8994V10.1521H103.723V17.3297C103.723 18.6205 103.332 19.5527 102.55 20.1264C101.768 20.7001 100.491 20.9882 98.7177 20.9908C96.952 20.9908 95.6846 20.7079 94.9154 20.142C94.1462 19.5762 93.7603 18.6387 93.7578 17.3297V10.1521Z" fill="#6600CC"/>
                    <path d="M105.988 19.3622L106.765 18.0204C107.49 18.4947 108.281 18.8658 109.113 19.1228C109.9 19.3715 110.721 19.4997 111.547 19.5029C112.337 19.5394 113.12 19.3463 113.798 18.9479C114.057 18.8032 114.272 18.5947 114.422 18.3433C114.573 18.0919 114.654 17.8062 114.656 17.5148C114.668 17.248 114.601 16.9835 114.463 16.753C114.326 16.5224 114.123 16.3356 113.88 16.2147C113.106 15.8838 112.267 15.7267 111.423 15.7547C109.521 15.7294 108.215 15.514 107.506 15.1085C107.154 14.9011 106.868 14.6016 106.68 14.2437C106.492 13.8857 106.41 13.4836 106.442 13.0824C106.436 12.661 106.54 12.2451 106.744 11.874C106.948 11.5028 107.245 11.1887 107.607 10.9612C108.544 10.3834 109.641 10.1033 110.747 10.1591C111.632 10.1602 112.513 10.2882 113.36 10.5392C114.222 10.7948 115.043 11.1658 115.801 11.6416L114.982 12.9721C114.333 12.5432 113.625 12.2066 112.878 11.9724C112.183 11.7457 111.457 11.6264 110.724 11.6188C110.062 11.5892 109.404 11.7294 108.814 12.0256C108.604 12.1195 108.425 12.2695 108.297 12.4583C108.169 12.6472 108.098 12.8674 108.092 13.0938C108.089 13.3107 108.158 13.5228 108.289 13.6978C108.42 13.8728 108.606 14.001 108.818 14.0631C109.638 14.2993 110.492 14.397 111.345 14.352C113.009 14.352 114.266 14.627 115.114 15.1769C115.528 15.4378 115.865 15.8004 116.091 16.2287C116.318 16.6569 116.425 17.1358 116.403 17.6174C116.404 18.0918 116.287 18.5593 116.062 18.9793C115.836 19.3992 115.51 19.7591 115.111 20.0275C114.134 20.7014 112.957 21.0384 111.764 20.9854C110.744 20.9837 109.728 20.8404 108.748 20.5597C107.774 20.2919 106.845 19.8887 105.988 19.3622Z" fill="#6600CC"/>
                    <path d="M131.613 16.371C131.422 16.6343 131.216 16.8871 130.997 17.1283C130.769 17.3729 130.527 17.6043 130.271 17.8213L132.709 20.5249H130.544L129.031 18.8664C128.242 19.5272 127.358 20.0719 126.406 20.4832C125.561 20.8256 124.653 20.9982 123.738 20.9906C122.206 20.9906 120.979 20.6006 120.056 19.8206C119.599 19.4349 119.238 18.9547 118.998 18.4153C118.759 17.8759 118.647 17.2912 118.671 16.7043C118.66 15.6984 119.012 14.7205 119.666 13.9401C120.518 12.9943 121.57 12.2387 122.751 11.725L119.057 7.44244H127.974L128.91 8.88511H122.525L129.156 16.4884C129.509 16.1451 129.784 15.8687 129.979 15.6592C130.174 15.4509 130.369 15.2351 130.521 15.0193L131.613 16.371ZM128.029 17.6585L123.828 12.8988C122.876 13.2507 122.018 13.8074 121.32 14.527C120.781 15.1034 120.483 15.8541 120.485 16.6323C120.471 17.0144 120.545 17.3947 120.7 17.7462C120.855 18.0976 121.088 18.4116 121.382 18.6657C122.032 19.2047 122.868 19.4848 123.722 19.4495C124.469 19.4461 125.207 19.294 125.891 19.0027C126.675 18.6717 127.397 18.2176 128.029 17.6585Z" fill="#6600CC"/>
                    <path d="M134.977 20.9908V7.44244H136.562V14.1914L143.883 7.44244H145.968L140.808 12.2565L146.753 20.9908H144.834L139.663 13.4221L136.562 16.1768V20.9908H134.977Z" fill="#6600CC"/>
                    <path d="M153.29 20.9908H152.448L147.203 10.1521H148.937L152.863 18.261L156.727 10.1521H158.527L153.29 20.9908Z" fill="#6600CC"/>
                    <path d="M161.699 10.1521H160.34V20.9908H161.699V10.1521Z" fill="#6600CC"/>
                    <path d="M167.904 20.9908V11.662H163.512V10.1521H173.929V11.662H169.525V20.9908H167.904Z" fill="#6600CC"/>
                    <path d="M174.836 19.3623L175.58 18.0204C176.276 18.4946 177.034 18.8657 177.831 19.1228C178.585 19.3714 179.372 19.4996 180.164 19.5029C180.922 19.5391 181.673 19.3461 182.323 18.9479C182.57 18.8032 182.777 18.5948 182.921 18.3433C183.065 18.0919 183.142 17.8062 183.145 17.5148C183.156 17.248 183.092 16.9835 182.96 16.753C182.828 16.5225 182.634 16.3356 182.401 16.2148C181.659 15.8837 180.854 15.7266 180.045 15.7548C178.225 15.7294 176.973 15.514 176.291 15.1086C175.953 14.9015 175.678 14.6021 175.498 14.2441C175.318 13.886 175.239 13.4837 175.271 13.0825C175.266 12.6611 175.365 12.2452 175.56 11.8741C175.756 11.5029 176.04 11.1888 176.388 10.9613C177.286 10.3831 178.338 10.1029 179.398 10.1592C180.246 10.1602 181.09 10.2883 181.902 10.5394C182.728 10.7947 183.516 11.1657 184.243 11.6417L183.458 12.9722C182.835 12.5432 182.156 12.2066 181.441 11.9725C180.775 11.7458 180.078 11.6266 179.376 11.6189C178.741 11.5895 178.11 11.7297 177.545 12.0257C177.343 12.1196 177.171 12.2696 177.049 12.4584C176.927 12.6473 176.859 12.8674 176.853 13.0939C176.85 13.3113 176.917 13.5237 177.043 13.6988C177.169 13.8738 177.348 14.0018 177.552 14.0632C178.338 14.2994 179.157 14.3971 179.975 14.3521C181.57 14.3521 182.774 14.6271 183.588 15.177C183.98 15.4411 184.298 15.8051 184.51 16.2331C184.722 16.6612 184.821 17.1383 184.797 17.6174C184.798 18.0919 184.686 18.5595 184.47 18.9795C184.254 19.3995 183.941 19.7593 183.558 20.0275C182.622 20.7014 181.494 21.0384 180.351 20.9854C179.372 20.9837 178.399 20.8403 177.459 20.5597C176.534 20.2899 175.65 19.8867 174.836 19.3623Z" fill="#6600CC"/>
                </svg>
            </a>
        </div>


        <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "top_mkws",
            Array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "left",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(0=>"",),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "Y",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "top",
                "USE_EXT" => "N"
            )
        );?>
        <div class="headerBlock__rightLink">
            <div class="header"></div>
<!--            <a class="headerBlock__brifBtn" href="/zapolnite-brif/" style="display: none">-->
<!--                Заполнить бриф-->
<!--            </a>-->
        </div>
    </div>
</header>
<main>
    <div class="BurgerMenu" <?if (isset($GLOBALS["USER"]) && is_object($USER) && $USER->IsAuthorized() && !isset($_REQUEST["bx_hit_hash"]) && !$isFrameAjax)
    {echo 'style="top: 110px;"';}?>>
        <div class="Blocks">
            <div class="BurgerMenu__topBlock">
                <div class="BurgerMenu__menu">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "burger",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "Y",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "burger",
                            "USE_EXT" => "Y",
                            "COMPONENT_TEMPLATE" => "burger"
                        ),
                        false
                    );?>
                </div>
                <div class="BurgerMenuContacts">
                    <div class="BurgerMenuContacts__header">
                        Контакты
                    </div>
                    <div class="BurgerMenuContacts__email">
                        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/email.php"), false);?>
                    </div>
                    <div class="BurgerMenuContacts__phone">
                        <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/phone.php"), false);?>
                    </div>
                    <div class="BurgerMenuContacts__projects">
                        <a class="BurgerMenuContacts__projectsBtn" href="/proekty/">Посмотреть проекты</a>
                    </div>
<!--                    <div class="BurgerMenuContacts__submit">-->
<!--                        <a class="BurgerMenuContacts__brifBtn" href="/zapolnite-brif/">Заполнить бриф</a>-->
<!--                    </div>-->
                </div>
            </div>

        <div class="BurgerMenu_footer">
            <div class="BurgerMenuSubmit">
                <div class="BurgerMenuSubmit__label">
                    оставьте заявку
                </div>
                <div class="BurgerMenuSubmit__email">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/email.php"), false);?>
                </div>
            </div>
            <div class="BurgerMenuSocnet">
                <div class="BurgerMenuSocnet__vk">
                    <svg class="inline-svg-icon vk">
                        <use xlink:href="#vk"></use>
                    </svg>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/vk.php"), false);?>
                </div>
                <div class="BurgerMenuSocnet__fb">
                    <svg class="inline-svg-icon fb">
                        <use xlink:href="#fb"></use>
                    </svg>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/fb.php"), false);?>
                </div>
                <div class="BurgerMenuSocnet__insta">
                    <svg class="inline-svg-icon insta">
                        <use xlink:href="#insta"></use>
                    </svg>
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/insta.php"), false);?>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="Blocks">
        <?if (!$is404 and $curPage != SITE_DIR."index.php") {
            ?><div class="Navigation" id="navigation">
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "mkws", array(
                            "START_FROM" => "0",
                            "PATH" => "",
                            "SITE_ID" => "-"
                        ),
                            false,
                            Array('HIDE_ICONS' => 'Y')
                        );?>
            </div>
        <?}?>

