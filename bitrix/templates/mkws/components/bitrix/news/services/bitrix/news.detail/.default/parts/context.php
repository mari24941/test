<?
if(!empty($arResult['PROPERTIES']['RECOMMEND']['VALUE']) or $arResult['PROPERTIES']['RESULTS']['VALUE']){
    $this->addExternalJS($this->__component->__template->__folder.'/flexslider/jquery.flexslider-min.js');
    $this->addExternalCss($this->__component->__template->__folder.'/flexslider/flexslider.css');
}
?>
<script id="bx24_form_button" data-skip-moving="true">
    (function(w,d,u,b){w['Bitrix24FormObject']=b;w[b] = w[b] || function(){arguments[0].ref=u;
        (w[b].forms=w[b].forms||[]).push(arguments[0])};
        if(w[b]['forms']) return;
        var s=d.createElement('script');s.async=1;s.src=u+'?'+(1*new Date());
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://corp.mkws.ru/bitrix/js/crm/form_loader.js','b24form');

    b24form({"id":"26","lang":"ru","sec":"v6ygbr","type":"button","click":""});
    b24form({"id":"27","lang":"ru","sec":"hcs7ou","type":"button","click":""});
    b24form({"id":"25","lang":"ru","sec":"fhuco0","type":"button","click":""});
    b24form({"id":"28","lang":"ru","sec":"l9t7xn","type":"button","click":""});
    b24form({"id":"29","lang":"ru","sec":"krx0f9","type":"button","click":""});
</script>
<div class="Service">
    <div class="Service__header">

        <h1><?=$arResult["PROPERTIES"]['HEADER']['VALUE']?$arResult["PROPERTIES"]['HEADER']['VALUE']:$arResult["NAME"]?></h1>
    </div>

    <?if($arResult['DETAIL_TEXT']){?>
        <div class="Service__preview">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    <?} ?>

    <?if(!empty($arResult['PROPERTIES']['IN_TARIF']['VALUE'])){?>
    <div class="InTariffBlock">
        <div class="InTariffBlockHeader">
            <?=$arResult['PROPERTIES']['IN_TARIF_H1']['VALUE']['TEXT']?>
        </div>
        <div class="InTariffList">
            <?foreach ($arResult['PROPERTIES']['IN_TARIF']['VALUE'] as $key=>$intariff):?>
            <div class="InTariffItem">
                <div>
                    <div class="InTariffItemName">
                        <?=$arResult['PROPERTIES']['IN_TARIF']['DESCRIPTION'][$key]?>
                    </div>
                    <?=$intariff['TEXT']?>
                    <div class="InTariffItemCount">
                        <?=$key+1?>
                    </div>
                </div>

            </div>
            <?endforeach;?>
        </div>
    </div>
    <?}?>

    <?if($arResult['PROPERTIES']['RESULTS']['VALUE']):?>

</div>
</div>
<div class="Results">
    <div class="Results__header">
        <h2><?=$arResult['PROPERTIES']['RESULTS']['NAME']?></h2>
    </div>
    <div class="ResultControl"></div>
    <div class="ResultsSlider flexslider">
        <ul class="slides">
            <?foreach($arResult['PROPERTIES']['RESULTS']['VALUE'] as $key=>$arItem):?>
                <li class="ResultsSliderItem ResultsSliderItemCount">
                    <div class="ResultsSliderItem__info">
                        <div class="ResultsSliderItem__left">
                            <img src="<?=CFile::GetPath($arItem["PREVIEW_PICTURE"])?>" alt="<?=CUtil::translit($arItem['NAME'],'ru',array("replace_space"=>" ","replace_other"=>" "))?>" title="<?=$arItem['NAME']?>"/>
                        </div>
                        <div class="ResultsSliderItem__counts">
                            <?foreach ($arItem["PROPERTIES"]['COUNTS']['VALUE'] as $key2=>$count):?>
                            <div class="ResultsSliderItem__count">
                                <div><?=$count?></div>
                                <span><?=$arItem["PROPERTIES"]['COUNTS']['DESCRIPTION'][$key2]?></span>
                            </div>
                            <?endforeach;?>
                        </div>

                    </div>
                    <div class="ResultsTableBlock">
                        <div class="ResultsTableFlex">

                            <div class="ResultsTable"><div><?=$arItem['PROPERTIES']['TABLE_LEFT']['~VALUE']['TEXT']?></div></div>
                            <div class="ResultsTable"><div><?=$arItem['PROPERTIES']['TABLE_RIGHT']['~VALUE']['TEXT']?></div></div>
                        </div>
                    </div>
                    <div class="ResultsSliderItem__resultBlock">
                        <div class="ResultsSliderItem__result ">
                            <div class="ResultsSliderItem__resultItem PaddingL60">
                                <div class="ResultsSliderItem__resultName"><?=$arItem["PROPERTIES"]['GRAY_LEFT']['VALUE']?$arItem["PROPERTIES"]['GRAY_LEFT']['VALUE']:$arItem["PROPERTIES"]['START']['NAME']?></div>
                                <?=$arItem["PROPERTIES"]['START']['~VALUE']['TEXT']?>
                            </div>
                            <div class="ResultsSliderItem__resultItem PaddingL60">
                                <div class="ResultsSliderItem__resultName"><?=$arItem["PROPERTIES"]['GRAY_RIGHT']['VALUE']?$arItem["PROPERTIES"]['GRAY_RIGHT']['VALUE']:$arItem["PROPERTIES"]['FINISH']['NAME']?></div>
                                <?=$arItem["PROPERTIES"]['FINISH']['~VALUE']['TEXT']?>
                            </div>
                        </div>
                    </div>
                </li>
            <?endforeach;?>
        </ul>
    </div>
</div>
<script>

</script>
<div class="Blocks">
    <div class="Service">
        <?endif;?>

    <?if($arResult['PROPERTIES']['WORK']['VALUE']):?>
            <div class="Advantages">
                <div class="Advantages__header">
                    <?=$arResult["PROPERTIES"]['WORK_H1']['VALUE']?>
                </div>
                <div class="AdvantagesItems">
                    <?foreach($arResult['PROPERTIES']['WORK']['VALUE'] as $arItem):?>
                        <div class="AdvantagesItem">
                            <?echo file_get_contents('..'.CFile::GetPath($arItem['PROPERTIES']['SVG']['VALUE']));?>
                            <div class="Advantages__info">
                                <div class="Advantages__name">
                                    <?=$arItem['NAME']?>
                                </div>
                                <div><?=$arItem['PREVIEW_TEXT']?></div>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        <?endif;?>


    <?if($arResult['PROPERTIES']['PROGRESS']['VALUE']):?>

            <?if($arResult['PROPERTIES']['FON']['VALUE'] == 1) echo '</div></div><div class="Progress_color_black">'?>
            <div class="Progress">
                <div class="Progress__background"></div>
                <div class="Progress__header">
                    <h2><?=$arResult["PROPERTIES"]['PROGRESS']['NAME']?></h2>
                </div>
                <div class="Progress__specification">
                    <?=$arResult["PROPERTIES"]['PROGRESS_TXT']['~VALUE']['TEXT']?>
                </div>
                <div class="ProgressItems">
                    <?foreach($arResult['PROPERTIES']['PROGRESS']['VALUE'] as $arItem):?>
                        <div class="ProgressItem">
                            <img src="<?=CFile::GetPath($arItem["PREVIEW_PICTURE"])?>" alt="<?=CUtil::translit($arItem['NAME'],'ru',array("replace_space"=>" ","replace_other"=>" "))?>" title="<?=$arItem['NAME']?>"/>
                            <div class="ProgressItem__name">
                                <?=$arItem['NAME']?>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
            <?if($arResult['PROPERTIES']['FON']['VALUE'] == 1) echo '</div><div class="Blocks"><div class="Service">'?>
        <?endif;?>

    <?if($arResult['PROPERTIES']['STEPS']['VALUE']):?>
            <div class="Steps">
                <div class="Steps__header">
                    <?=$arResult['PROPERTIES']['STEPS']['NAME']?>
                </div>
                <div class="Steps__help b24-web-form-popup-btn-25">Рассчитать бюджет</div>
                <div class="StepsNumbers StepsNumbers<?=count($arResult['PROPERTIES']['STEPS']['VALUE'])?>">
                <?foreach($arResult['PROPERTIES']['STEPS']['VALUE'] as $key=>$arItem):?>
                    <div class="StepsNumber <?if($key == 0) echo 'StepsNumberCurrent';?>" data-id="step<?=$key?>">Этап <?=$key + 1?></div>

                <?endforeach;?>
                </div>
                <div class="StepsItems">
                    <?foreach($arResult['PROPERTIES']['STEPS']['VALUE'] as $key=>$arItem):?>
                        <div class="StepsItem <?if($key == 0) echo 'StepsItemCurrent';?>" data-id="step<?=$key?>">
                            <div class="Steps__info">
                                <div class="Steps__name">
                                    <?=$arItem['NAME']?>
                                </div>
                                <div class="Steps__text">
                                    <div class="Steps__img">
                                        <img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE'])?>">
                                    </div>
                                    <div class="Steps__description"><?=$arItem['PREVIEW_TEXT']?></div>
                                </div>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        <?endif;?>

    <?if(($arResult['PROPERTIES']['BANNER1_NAME']['VALUE'] && $arResult['PROPERTIES']['BANNER1_IMG']['VALUE']) ||($arResult['PROPERTIES']['BANNER2_NAME']['VALUE'] && $arResult['PROPERTIES']['BANNER2_IMG']['VALUE'])):?>
    <div class="MiniBanners">
        <?if($arResult['PROPERTIES']['BANNER1_NAME']['VALUE'] && $arResult['PROPERTIES']['BANNER1_IMG']['VALUE']):?>
            <div class="MiniBanner">
                <div>
                <img src="<?=CFile::GetPath($arResult['PROPERTIES']['BANNER1_IMG']['VALUE'])?>" alt="<?=$arResult['PROPERTIES']['BANNER1_NAME']['VALUE']?>" title="<?=$arResult['PROPERTIES']['BANNER1_NAME']['VALUE']?>">
                <div class="MiniBanner__name"><?=$arResult['PROPERTIES']['BANNER1_NAME']['VALUE']?></div>
                <div class="MiniBanner__btn">
                    <?if($arResult['PROPERTIES']['BANNER1_CLASS']['VALUE']){?>
                        <div class="<?=$arResult['PROPERTIES']['BANNER1_CLASS']['VALUE']?>" ><?=$arResult['PROPERTIES']['BANNER1_BTN']['VALUE']?></div>
                    <?} else {?>
                    <a class="<?=$arResult['PROPERTIES']['BANNER1_CLASS']['VALUE']?>" <?if($arResult['PROPERTIES']['BANNER1_LINK']['VALUE']):?>href="<?=$arResult['PROPERTIES']['BANNER1_LINK']['VALUE']?>"<?endif;?>><?=$arResult['PROPERTIES']['BANNER1_BTN']['VALUE']?></a>
                    <?}?>
                </div>

                </div>
            </div>
        <?endif;?>
        <?if($arResult['PROPERTIES']['BANNER2_NAME']['VALUE'] && $arResult['PROPERTIES']['BANNER2_IMG']['VALUE']):?>
            <div class="MiniBanner">
                <div>
                <img src="<?=CFile::GetPath($arResult['PROPERTIES']['BANNER2_IMG']['VALUE'])?>" alt="<?=$arResult['PROPERTIES']['BANNER2_NAME']['VALUE']?>" title="<?=$arResult['PROPERTIES']['BANNER2_NAME']['VALUE']?>">
                <div class="MiniBanner__name"><?=$arResult['PROPERTIES']['BANNER2_NAME']['VALUE']?></div>
                <div class="MiniBanner__btn">
                    <?if($arResult['PROPERTIES']['BANNER2_CLASS']['VALUE']){?>
                        <div class="<?=$arResult['PROPERTIES']['BANNER2_CLASS']['VALUE']?>" ><?=$arResult['PROPERTIES']['BANNER2_BTN']['VALUE']?></div>
                    <?} else {?>
                    <a class="<?=$arResult['PROPERTIES']['BANNER2_CLASS']['VALUE']?>" <?if($arResult['PROPERTIES']['BANNER2_LINK']['VALUE']):?>href="<?=$arResult['PROPERTIES']['BANNER2_LINK']['VALUE']?>"<?endif;?>><?=$arResult['PROPERTIES']['BANNER2_BTN']['VALUE']?></a>
                    <?}?>
                </div>
                </div>
            </div>


        <?endif;?>
    </div>
    <?endif;?>

    <?if($arResult['PROPERTIES']['BBANNER1_H1']['VALUE']['TEXT'] ):?>
        </div>
        </div>
        <div class="Banner PROCENT move">

            <div class="Banner__info">
                <div class="Banner__description">
                    <?=$arResult['PROPERTIES']['BBANNER1_DESCRIPTION']['VALUE']?>
                </div>
                <div class="Banner__name">
                    <?=$arResult['PROPERTIES']['BBANNER1_H1']['~VALUE']['TEXT']?>
                </div>
                <div class="BannerButtonBlock">
                    <div class="BannerButtonBlock__button b24-web-form-popup-btn-28"><?=$arResult['PROPERTIES']['BBANNER1_BUTTON']['VALUE']?></div>
                </div>

                    <div class="BannerBlur"></div>
                    <div class="move-container">
                        <div class="BannerBigProcent moveVertical"></div>
                        <div class="BannerLeftProcent moveVertical"></div>
                        <div class="BannerCenterProcent moveVertical"></div>
                        <div class="BannerBottomProcent moveVertical"></div>
                    </div>

                <div class="BannerScream">
                    <div class="BannerScreamHead"><?=$arResult['PROPERTIES']['BBANNER1_DESCRIPTION']['VALUE']?></div>
                    <div><?=$arResult['PROPERTIES']['BBANNER1_SCREAM']['~VALUE']['TEXT']?></div>
                </div>
                <img src="<?=CFile::GetPath($arResult['PROPERTIES']['BBANNER1_IMG']['VALUE'])?>" title="Баннер" alt="Баннер" />
            </div>
        </div>

        <div class="Blocks">
        <div class="Service">
    <?endif;?>

    <?if($arResult['PROPERTIES']['GUARANTY']['VALUE']):?>
            <div class="Guaranty">
                <div class="Guaranty__header">
                    <h2><?=$arResult["PROPERTIES"]['GUARANTY_H1']['VALUE']?></h2>
                </div>
                <div class="GuarantyItems">
                    <?foreach($arResult['PROPERTIES']['GUARANTY']['~VALUE'] as $key=>$arItem):?>
                        <div class="GuarantyItem">
                            <div class="Guaranty__info">
                                <div class="Guaranty__name">
                                    <?=$arResult['PROPERTIES']['GUARANTY']['DESCRIPTION'][$key]?>
                                </div>
                                <div class="Guaranty__description"><?=$arItem['TEXT']?></div>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        <?endif;?>



    <?if($arResult['PROPERTIES']['BBANNER2_H1']['VALUE']['TEXT'] ):?>
        </div>
        </div>
<div class="Banner VR move">

    <div class="Banner__info">
        <div class="Banner__text">
            <div class="Banner__name">
                <?=$arResult['PROPERTIES']['BBANNER2_H1']['~VALUE']['TEXT']?>
            </div>
            <div class="BannerButtonBlock">
                <div class="BannerButtonBlock__button b24-web-form-popup-btn-29"><?=$arResult['PROPERTIES']['BBANNER2_BUTTON']['VALUE']?></div>
            </div>
        </div>

        <div class="move-container">
            <div class="BannerWords1 moveHorizontalLeft">Купить слона</div>
            <div class="BannerWords2 movesHorizontalRight">монтаж кондиционеров</div>
            <div class="BannerWords3 moveHorizontalLeft">продам гараж в спб</div>
            <div class="BannerWords4 movesHorizontalRight">строительство домов</div>
            <div class="BannerWords5 moveHorizontalLeft">магазин игрушек</div>
            <div class="BannerWords6 movesHorizontalRight">зимняя резина</div>
        </div>
        <img src="<?=CFile::GetPath($arResult['PROPERTIES']['BBANNER2_IMG']['VALUE'])?>" title="Баннер" alt="Баннер" />
    </div>
</div>

<div class="Blocks">
    <div class="Service">
    <?endif;?>

    </div>
    <?if($arResult['PROPERTIES']['FAQ']['VALUE']):?>
        <div class="ServiceFaq">
            <div class="ServiceFaq__header">
                <?=$arResult['PROPERTIES']['FAQ']['NAME']?>
            </div>
            <div class="ServiceFaqItems">
                <?foreach($arResult['PROPERTIES']['FAQ']['~VALUE'] as $key=>$faq):?>
                    <div class="ServiceFaqItem">
                        <input type="checkbox" <?if($key != 0) echo 'checked'; ?>>
                        <div class="ServiceFaqItem__question"><?=$arResult['PROPERTIES']['FAQ']['DESCRIPTION'][$key]?></div>
                        <div class="ServiceFaqItem__answer"><?=$faq['TEXT']?></div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    <?endif;?>
    <?if(!empty($arResult['PROPERTIES']['RECOMMEND']['VALUE'])):?>
    </div>
</div>
<div class="ServiceRecommend">
    <div class="ServiceRecommend__header">
        <?=$arResult['PROPERTIES']['RECOMMEND']['NAME']?>
    </div>
    <div class="ServiceRecommend__control">
    </div>
    <div class="ServiceRecommendList">
        <div class="ServiceRecommendItems flexslider">
            <ul class="slides">

                <?foreach ($arResult['PROPERTIES']['RECOMMEND']['VALUE'] as $rec):?>
                    <li class="ServiceRecommendItem">
                        <a href="<?=$rec['PROPERTY_LINK_VALUE'] ? $rec['PROPERTY_LINK_VALUE'] : $rec['DETAIL_PAGE_URL']?>">
                            <?if($rec['PROPERTY_SALE_VALUE']==1):?><div class="ServiceRecommendItem__sale">Акция</div><?endif;?>
                            <div class="ServiceRecommendItem__info">
                                <div class="ServiceRecommendItem__type">
                                    Услуга
                                </div>
                                <div class="ServiceRecommendItem__name">
                                    <?=$rec['NAME']?>
                                </div>
                            </div>
                            <div class="ServiceRecommendItem__description">
                                <?=$rec['PREVIEW_TEXT']?>
                            </div>
                            <div class="ServiceRecommendItem__more">
                                Подробнее
                                <svg class="inline-svg-icon arrow">
                                    <use xlink:href="#arrow"></use>
                                </svg>
                            </div>
                        </a>
                    </li>
                <?endforeach;?>
            </ul>
        </div>
    </div>
</div>
<div class="Blocks">
    <div class="Service">
        <?endif;?>





