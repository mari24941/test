<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

//echo $arResult['PROPERTIES']['MAIN']['VALUE'];
$frame = $this->createFrame()->begin();
$frame->beginStub();
$main_serv = array();

$res = CIBlockElement::GetByID($arResult['PROPERTIES']['MAIN']['VALUE']);
if($ar_res = $res->GetNext())
    $main_serv = $ar_res;

$APPLICATION->AddChainItem($main_serv['IBLOCK_NAME'], $main_serv['LIST_PAGE_URL']);
$APPLICATION->AddChainItem($main_serv['NAME'], $main_serv['DETAIL_PAGE_URL']);
$APPLICATION->AddChainItem($arResult['NAME'], explode("?", $_SERVER['REQUEST_URI']));
$frame->end();
?>
<script id="bx24_form_button" data-skip-moving="true">
    (function(w,d,u,b){w['Bitrix24FormObject']=b;w[b] = w[b] || function(){arguments[0].ref=u;
        (w[b].forms=w[b].forms||[]).push(arguments[0])};
        if(w[b]['forms']) return;
        var s=d.createElement('script');s.async=1;s.src=u+'?'+(1*new Date());
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://corp.mkws.ru/bitrix/js/crm/form_loader.js','b24form');

    b24form({"id":"12","lang":"ru","sec":"tmey3x","type":"button","click":""});
    b24form({"id":"31","lang":"ru","sec":"7959nj","type":"button","click":""});
    b24form({"id":"30","lang":"ru","sec":"vf1nxt","type":"button","click":""});
    b24form({"id":"10","lang":"ru","sec":"895p1l","type":"button","click":""});
    b24form({"id":"28","lang":"ru","sec":"l9t7xn","type":"button","click":""});
</script>
<div class="Service">
    <div class="Service__header">

        <h1><?=$arResult["PROPERTIES"]['HEADER']['VALUE']?$arResult["PROPERTIES"]['HEADER']['VALUE']:$arResult["NAME"]?></h1>
    </div>

    <?if($arResult['DETAIL_TEXT']){?>
    <div class="Service__preview">
        <?=$arResult['DETAIL_TEXT']?>
    </div>
    <?}?>

    <?if($arResult['PROPERTIES']['WORK']['VALUE']):?>
        <?$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE','PROPERTIES_SVG','PROPERTIES_DOC');
        $arFilter = Array( "IBLOCK_ID"=>14,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['WORK']['VALUE']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
        $work=array();

        while($ob = $res->GetNextElement())
        {
            $work[$ob->GetFields()['ID']] = $ob->GetFields();
            $work[$ob->GetFields()['ID']]['PROPERTIES'] = $ob->GetProperties();
        }?>

        <div class="Works">
            <div class="Works__header">
                <h2><?=$arResult["PROPERTIES"]['WORK_H1']['VALUE']?></h2>
            </div>
            <div class="WorksItems move">
                <?foreach($arResult['PROPERTIES']['WORK']['VALUE'] as $arItem):?>
                    <div class="WorksItem bottom-top vis">
                        <?echo file_get_contents('..'.CFile::GetPath($work[$arItem]['PROPERTIES']['SVG']['VALUE']));?>
                        <div class="Works__info">
                            <div class="Works__name">
                                <?=$work[$arItem]['NAME']?>
                            </div>
                            <div><?=$work[$arItem]['PREVIEW_TEXT']?></div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    <?endif;?>

    <?if($arResult['PROPERTIES']['RESULTAT']['VALUE']):?>
        <div class="Resultaty">
            <div class="ResultatyItems">
                <?foreach($arResult['PROPERTIES']['RESULTAT']['~VALUE'] as $key=>$arItem):?>
                    <div class="ResultatyItem">
                        <div class="Resultaty__name">
                            <?=$arResult['PROPERTIES']['RESULTAT']['DESCRIPTION'][$key]?>
                        </div>
                        <div><?=$arItem['TEXT']?></div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    <?endif;?>

    <?if($arResult['PROPERTIES']['RESULTS']['VALUE']):?>
    <?$this->addExternalJS($this->__component->__template->__folder.'/flexslider/jquery.flexslider-min.js');
    $this->addExternalCss($this->__component->__template->__folder.'/flexslider/flexslider.css');
    ?>
    <?$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE','DETAIL_PICTURE');
    $arFilter = Array( "IBLOCK_ID"=>15,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['RESULTS']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $results=array();

    while($ob = $res->GetNextElement())
    {
        $results[$ob->GetFields()['ID']] = $ob->GetFields();
        $results[$ob->GetFields()['ID']]["PROPERTIES"] = $ob->GetProperties();
    }?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                <li class="ResultsSliderItem">
                    <div class="ResultsSliderItem__info" style="background-image: url('<?=CFile::GetPath($results[$arItem]["DETAIL_PICTURE"])?>')">
                        <div class="ResultsSliderItem__left">
                            <img src="<?=CFile::GetPath($results[$arItem]["PREVIEW_PICTURE"])?>" alt="<?=CUtil::translit($results[$arItem]['NAME'],'ru',array("replace_space"=>" ","replace_other"=>" "))?>" title="<?=$results[$arItem]['NAME']?>"/>
                            <div class="ResultsSliderItem__leftItem">
                                <div><?=$results[$arItem]["PROPERTIES"]['SITE']['NAME']?></div>
                                <?=$results[$arItem]["PROPERTIES"]['SITE']['VALUE']?>
                            </div>
                            <div class="ResultsSliderItem__leftItem">
                                <div><?=$results[$arItem]["PROPERTIES"]['SYSTEM']['NAME']?></div>
                                <?=$results[$arItem]["PROPERTIES"]['SYSTEM']['VALUE']?>
                            </div>
                        </div>
                        <div class="ResultsSliderItem__graph">
                            <div class="ResultsSliderItem__graphName">Посетители</div>
                            <div class="maps ResultsSliderItem__graphId<?=$arItem?>" id="ResultsSliderItem__graphId<?=$arItem?>" data-id="<?=$arItem?>"></div>
                            <script>
                                google.charts.load('current', {packages:['corechart']});
                                google.charts.setOnLoadCallback(drawExample2);

                                function drawExample2() {
                                    // Some raw data (not necessarily accurate)
                                    <?=$results[$arItem]["PROPERTIES"]['CODE']['VALUE']['TEXT']?>

                                    // Create and populate the data tables.
                                    var data = [];
                                    data[0] = google.visualization.arrayToDataTable(rowData1);
                                    data[1] = google.visualization.arrayToDataTable(rowData2);


                                    var options = {
                                        width: 500,
                                        height: 320,
                                        seriesType: "bars",
                                        legend: { position: 'none' },
                                        series: {5: {type: "line"}},
                                        animation:{
                                            duration: 1000,
                                            easing: 'out'
                                        },
                                        colors: ['#6600cc'],
                                        backgroundColor: 'none'
                                    };

                                    if($(window).width() < 767) {
                                        options = {
                                            width: 450,
                                            height: 270,
                                            legend: { position: 'none' },
                                            seriesType: "bars",
                                            series: {5: {type: "line"}},
                                            animation:{
                                                duration: 1000,
                                                easing: 'out'
                                            },
                                            colors: ['#6600cc'],
                                            backgroundColor: 'none'
                                        };
                                    }

                                    if($(window).width() < 480) {
                                        options = {
                                            width: $(window).width() - 30,
                                            height: 250,
                                            legend: { position: 'none' },
                                            seriesType: "bars",
                                            series: {5: {type: "line"}},
                                            animation:{
                                                duration: 1000,
                                                easing: 'out'
                                            },
                                            colors: ['#6600cc'],
                                            backgroundColor: 'none',
                                            isStacked: true
                                        };
                                    }

                                    var current<?=$arItem?> = 0;
                                    // Create and draw the visualization.
                                    var chart = new google.visualization.ComboChart(document.getElementById('ResultsSliderItem__graphId<?=$arItem?>'));
                                    function drawChart<?=$arItem?>() {
                                        // Disabling the button while the chart is drawing.

                                        chart.draw(data[current<?=$arItem?>], options);
                                    }
                                    drawChart<?=$arItem?>();

                                    current<?=$arItem?> = 1 - current<?=$arItem?>;
                                    drawChart<?=$arItem?>();

                                }
                            </script>
                        </div>
                        <div class="ResultsSliderItem__right">
                            <div class="ResultsSliderItem__rightNameL">Фраза</div>
                            <div class="ResultsSliderItem__rightNameR">Позиция</div>
                            <?foreach ($results[$arItem]["PROPERTIES"]['PHRASE']['VALUE'] as $key=>$ph):?>
                                <div class="ResultsSliderItem__rightValueL"><?=$ph?></div>
                                <div class="ResultsSliderItem__rightValueR"><?=$results[$arItem]["PROPERTIES"]['PHRASE']['DESCRIPTION'][$key]?></div>
                            <?endforeach;?>
                        </div>

                    </div>
                    <div class="ResultsSliderItem__resultBlock">
                        <div class="ResultsSliderItem__result">
                            <div class="ResultsSliderItem__resultItem">
                                <div class="ResultsSliderItem__resultName"><?=$results[$arItem]["PROPERTIES"]['START']['NAME']?></div>
                                <?=$results[$arItem]["PROPERTIES"]['START']['~VALUE']['TEXT']?>
                            </div>
                            <div class="ResultsSliderItem__resultItem">
                                <div class="ResultsSliderItem__resultName"><?=$results[$arItem]["PROPERTIES"]['FINISH']['NAME']?></div>
                                <?=$results[$arItem]["PROPERTIES"]['FINISH']['~VALUE']['TEXT']?>
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

    <?if($arResult['PROPERTIES']['ADVANTAGES']['VALUE']):?>
            <?$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE','PROPERTIES_SVG');
            $arFilter = Array( "IBLOCK_ID"=>14,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['ADVANTAGES']['VALUE']);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
            $adv=array();

            while($ob = $res->GetNextElement())
            {
                $adv[$ob->GetFields()['ID']] = $ob->GetFields();
                $adv[$ob->GetFields()['ID']]['PROPERTIES'] = $ob->GetProperties();
            }?>

            <div class="Advantages">
                <div class="Advantages__header">
                    <h2><?=$arResult["PROPERTIES"]['ADVANTAGES_H1']['VALUE']?></h2>
                </div>
                <div class="AdvantagesItems">
                    <?foreach($arResult['PROPERTIES']['ADVANTAGES']['VALUE'] as $arItem):?>
                        <div class="AdvantagesItem">
                            <?echo file_get_contents('..'.CFile::GetPath($adv[$arItem]['PROPERTIES']['SVG']['VALUE']));?>
                            <div class="Advantages__info">
                                <div class="Advantages__name">
                                    <?=$adv[$arItem]['NAME']?>
                                </div>
                                <div><?=$adv[$arItem]['PREVIEW_TEXT']?></div>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        <?endif;?>

    <?if($arResult['PROPERTIES']['GUARANTY']['VALUE']):?>
            <div class="Guaranty">
                <div class="Guaranty__header">
                    <h2><?=$arResult["PROPERTIES"]['GUARANTY_H1']['VALUE']?></h2>
                </div>
                <div class="GuarantyItems move">
                    <?foreach($arResult['PROPERTIES']['GUARANTY']['~VALUE'] as $key=>$arItem):?>
                        <div class="GuarantyItem bottom-top-opacity vis">
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

    <?if($arResult['PROPERTIES']['BANNER1_TYPE']['VALUE']&& $arResult['PROPERTIES']['BANNER1_H1']['VALUE']['TEXT'] ):?>
    </div>
</div>
<div class="Banner <?=$arResult['PROPERTIES']['BANNER1_TYPE']['VALUE_XML_ID']?> move">

    <div class="Banner__info">
        <div class="Banner__description">
            <?=$arResult['PROPERTIES']['BANNER1_DESCRIPTION']['VALUE']?>
        </div>
        <div class="Banner__name">
            <?=$arResult['PROPERTIES']['BANNER1_H1']['~VALUE']['TEXT']?>
        </div>
        <div class="BannerButtonBlock">
            <div class="BannerButtonBlock__button b24-web-form-popup-btn-28"><?=$arResult['PROPERTIES']['BANNER1_BUTTON']['VALUE']?></div>
        </div>
        <?if($arResult['PROPERTIES']['BANNER1_TYPE']['VALUE_XML_ID'] == 'PROCENT'):?>
        <div class="BannerBlur"></div>
        <div class="move-container">
            <div class="BannerBigProcent moveVertical"></div>
            <div class="BannerLeftProcent moveVertical"></div>
            <div class="BannerCenterProcent moveVertical"></div>
            <div class="BannerBottomProcent moveVertical"></div>
        </div>
        <?endif;?>
        <?if($arResult['PROPERTIES']['BANNER1_TYPE']['VALUE_XML_ID'] == 'LEAF'):?>
            <div class="BannerLeftTopLeaf moveVertical"></div>
            <div class="BannerLeftBottomLeaf moveVertical"></div>
            <div class="BannerRightBottomLeaf moveVertical"></div>
            <div class="BannerCenterBottomLeaf moveVertical"></div>
            <div class="BannerCenterTopLeaf moveVertical"></div>
            <div class="BannerCenterCenterLeaf moveVertical"></div>
            <div class="BannerCenterRightLeaf moveVertical"></div>
        <?endif;?>
        <?if($arResult['PROPERTIES']['BANNER1_TYPE']['VALUE_XML_ID'] == 'ARROW'):?>
            <div class="BannerRightTopArrow moveHorizontal"></div>
            <div class="BannerCenterTopArrow moveHorizontal"></div>
            <div class="BannerRightCenterArrow moveHorizontal"></div>
            <div class="BannerCenterBottomArrow moveHorizontal"></div>
        <?endif;?>
        <div class="BannerScream">
            <div class="BannerScreamHead"><?=$arResult['PROPERTIES']['BANNER1_DESCRIPTION']['VALUE']?></div>
            <div><?=$arResult['PROPERTIES']['BANNER1_SCREAM']['~VALUE']['TEXT']?></div>
        </div>
        <img src="<?=CFile::GetPath($arResult['PROPERTIES']['BANNER1_IMG']['VALUE'])?>" title="Баннер" alt="Баннер" />
    </div>
</div>

<div class="Blocks">
    <div class="Service">
    <?endif;?>

    <?if($arResult['PROPERTIES']['TARIFS']['VALUE']):?>

        <div class="ServiceTariffs">
            <?if($arResult['PROPERTIES']['TARIFS_H1']['VALUE']):?>
                <div class="ServiceTariffs__header"><h2><?=$arResult['PROPERTIES']['TARIFS_H1']['VALUE']?></h2></div>
                <a class="ServiceTariffs__help">Сравнить</a>
            <?endif;?>
            <?$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE','PROPERTY_NUMBER', 'PROPERTY_VIP', 'PROPERTY_HASHTAG','PROPERTY_IMG','PROPERTY_DESCRIPTION', 'PROPERTY_PRICE', 'PROPERTY_LINK', 'PROPERTY_COMPARE');
            $arFilter = Array( "IBLOCK_ID"=>16,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['TARIFS']['VALUE']);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
            $tariffs=array();

            while($ob = $res->GetNext())
            {

                $tariffs[$ob['ID']] = $ob;
                $VALUES = array();
                $res2 = CIBlockElement::GetProperty($ob['IBLOCK_ID'],$ob['ID'], array(), array("CODE" => "COMPARE"));
                while ($ob2 = $res2->GetNext())
                {$VALUES[] = $ob2['VALUE_ENUM'];}
                $tariffs[$ob['ID']]['PROPERTY_COMPARE'] = $VALUES;

            }?>
            <div class="ServiceTariffsFlip">
                <div class="ServiceTariffsFlipFront">
                    <?foreach ($arResult['PROPERTIES']['TARIFS']['VALUE'] as $tariff):?>
                        <div class="ServiceTariffs__item <?if($tariffs[$tariff]['PROPERTIES']['VIP']['VALUE'] == 1) echo 'ServiceTariffs_type_vip';?> <?if($tariff == $arResult['ID']) echo 'ServiceTariffs_type_current';?>">
                            <div>
                                <div class="ServiceTariffs__number"><?=$tariffs[$tariff]['PROPERTY_NUMBER_VALUE']?></div>
                                <div class="ServiceTariffs__name"><?if($tariffs[$tariff]['PROPERTY_IMG_VALUE']):?><img src="<?=CFile::GetPath($tariffs[$tariff]['PROPERTY_IMG_VALUE'])?>" alt="Иконка для тарифа <?=$tariffs[$tariff]['NAME']?>" title="<?=$tariffs[$tariff]['NAME']?>"><?endif;?><?=$tariffs[$tariff]['NAME']?></div>
                                <?if($tariffs[$tariff]['PROPERTY_HASHTAG_VALUE']):?><div class="ServiceTariffs__tag"><?=$tariffs[$tariff]['PROPERTY_HASHTAG_VALUE']?></div>
                                <?endif;?>
                                <div class="ServiceTariffs__bottom">
                                    <div class="ServiceTariffs__description" ><?=$tariffs[$tariff]['~PROPERTY_DESCRIPTION_VALUE']['TEXT']?></div>
                                    <div class="ServiceTariffs__right">
                                        <div>
                                            <div class="ServiceTariffs__price">
                                                <p>Стоимость</p>
                                                <?=$tariffs[$tariff]['PROPERTY_PRICE_VALUE']?> р/мес
                                            </div>
                                            <?if($tariff == $arResult['ID']){?>
                                                <a class="ServiceTariffs__more b24-web-form-popup-btn-10">Заявка</a>
                                            <?} else {?>
                                            <a class="ServiceTariffs__more" href="<?=$tariffs[$tariff]['PROPERTY_LINK_VALUE']?>">О тарифе</a><?}?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?endforeach;?>
                </div>
                <div class="ServiceTariffsFlipBack">
                    <div class="ServiceTariffsCompareTable">

                        <div class="ServiceTariffsCompareHeader"></div>
                        <?$compares = array();?>
                        <?foreach ($arResult['PROPERTIES']['TARIFS']['VALUE'] as $tariff):?>

                            <div class="ServiceTariffsCompareHeader"><?if($tariffs[$tariff]['PROPERTY_IMG_VALUE']):?><img src="<?=CFile::GetPath($tariffs[$tariff]['PROPERTY_IMG_VALUE'])?>" alt="Иконка для тарифа <?=$tariffs[$tariff]['NAME']?>" title="<?=$tariffs[$tariff]['NAME']?>"><?endif;?>Тариф <?=$tariffs[$tariff]['PROPERTY_NUMBER_VALUE']?></div>
                            <?$compares = array_merge($compares, $tariffs[$tariff]['PROPERTY_COMPARE']);?>
                        <?endforeach;?>
                        <div class="ServiceTariffsCompareCurrent ServiceTariffsCompareCurrent<?=$arResult['ID']?>"></div>
                        <?$compares = array_unique($compares);?>
                        <?foreach ($compares as $item):?>
                            <div class="ServiceTariffsCompareLeft"><?=$item?></div>

                            <?foreach ($arResult['PROPERTIES']['TARIFS']['VALUE'] as $tariff):?>
                                <div class="ServiceTariffsCompareItem">
                                    <?$p = 0;?>
                                    <?foreach ($tariffs[$tariff]['PROPERTY_COMPARE'] as $t):?>
                                        <?$p++;?>
                                        <?if($item == $t){?>
                                            <div class="ServiceTariffsCompareItemYes"></div>
                                            <?
                                            break;
                                        } if($p == count($tariffs[$tariff]['PROPERTY_COMPARE'])) {?>
                                            <div class="ServiceTariffsCompareItemNo"></div>
                                        <?}?>
                                    <?endforeach;?>

                                </div>

                            <?endforeach;?>
                        <?endforeach;?>
                        <div class="ServiceTariffsComparePriceLeft ">Стоимость</div>
                        <?foreach ($arResult['PROPERTIES']['TARIFS']['VALUE'] as $tariff):?>
                            <div class="ServiceTariffsComparePriceItem <?if($tariff == $arResult['ID']) echo 'ServiceTariffsComparePriceItem_type_current';?>">
                                <?=$tariffs[$tariff]['PROPERTY_PRICE_VALUE']?>
                                <span>в месяц</span>
                            </div>
                        <?endforeach;?>
                        <div class="ServiceTariffsCompareHeader"></div>
                        <?foreach ($arResult['PROPERTIES']['TARIFS']['VALUE'] as $tariff):?>
                            <div class="ServiceTariffsCompareHeader">
                                <?if($tariff == $arResult['ID']){?>
                                    <a class="ServiceTariffsCompareMore b24-web-form-popup-btn-10">Заявка<svg class="inline-svg-icon arrow">
                                            <use xlink:href="#arrow"></use>
                                        </svg></a>
                                <?} else {?>
                                <a href="<?=$tariffs[$tariff]['PROPERTY_LINK_VALUE']?>" class="ServiceTariffsCompareMore">Подробнее
                                    <svg class="inline-svg-icon arrow">
                                        <use xlink:href="#arrow"></use>
                                    </svg></a>
                                <?}?>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    <?endif;?>

    <?if($arResult['PROPERTIES']['BANNER2_TYPE']['VALUE']&& $arResult['PROPERTIES']['BANNER2_H1']['VALUE']['TEXT'] ):?>
    </div>
</div>
<div class="Banner <?=$arResult['PROPERTIES']['BANNER2_TYPE']['VALUE_XML_ID']?> move">

    <div class="Banner__info">
        <div class="Banner__description">
            <?=$arResult['PROPERTIES']['BANNER2_DESCRIPTION']['VALUE']?>
        </div>
        <div class="Banner__name">
            <?=$arResult['PROPERTIES']['BANNER2_H1']['~VALUE']['TEXT']?>
        </div>
        <div class="BannerButtonBlock">
            <div class="BannerButtonBlock__button b24-web-form-popup-btn-30"><?=$arResult['PROPERTIES']['BANNER2_BUTTON']['VALUE']?></div>
        </div>
        <?if($arResult['PROPERTIES']['BANNER2_TYPE']['VALUE_XML_ID'] == 'PROCENT'):?>
            <div class="BannerBlur"></div>
            <div class="BannerBigProcent moveVertical"></div>
            <div class="BannerLeftProcent moveVertical"></div>
            <div class="BannerCenterProcent moveVertical"></div>
            <div class="BannerBottomProcent moveVertical"></div>
        <?endif;?>
        <?if($arResult['PROPERTIES']['BANNER2_TYPE']['VALUE_XML_ID'] == 'LEAF'):?>
            <div class="BannerLeftTopLeaf moveVertical"></div>
            <div class="BannerLeftBottomLeaf moveVertical"></div>
            <div class="BannerRightBottomLeaf moveVertical"></div>
            <div class="BannerCenterBottomLeaf moveVertical"></div>
            <div class="BannerCenterTopLeaf moveVertical"></div>
            <div class="BannerCenterCenterLeaf moveVertical"></div>
            <div class="BannerCenterRightLeaf moveVertical"></div>
        <?endif;?>
        <?if($arResult['PROPERTIES']['BANNER2_TYPE']['VALUE_XML_ID'] == 'ARROW'):?>
            <div class="BannerRightTopArrow moveHorizontal"></div>
            <div class="BannerCenterTopArrow moveHorizontal"></div>
            <div class="BannerRightCenterArrow moveHorizontal"></div>
            <div class="BannerCenterBottomArrow moveHorizontal"></div>
        <?endif;?>
        <img src="<?=CFile::GetPath($arResult['PROPERTIES']['BANNER2_IMG']['VALUE'])?>" title="Баннер" alt="Баннер" />
    </div>
</div>

<div class="Blocks">
    <div class="Service">
        <?endif;?>

    <?if($arResult['PROPERTIES']['PROGRESS']['VALUE']):?>
    <?$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE');
    $arFilter = Array( "IBLOCK_ID"=>12,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['PROGRESS']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $progress=array();

    while($ob = $res->GetNextElement())
    {
        $progress[$ob->GetFields()['ID']] = $ob->GetFields();
    }?>
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
                        <img src="<?=CFile::GetPath($progress[$arItem]["PREVIEW_PICTURE"])?>" alt="<?=CUtil::translit($progress[$arItem]['NAME'],'ru',array("replace_space"=>" ","replace_other"=>" "))?>" title="<?=$progress[$arItem]['NAME']?>"/>
                        <div class="ProgressItem__name">
                            <?=$progress[$arItem]['NAME']?>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
    <?if($arResult['PROPERTIES']['FON']['VALUE'] == 1) echo '</div><div class="Blocks"><div class="Service">'?>
    <?endif;?>

    <?if($arResult['PROPERTIES']['TXT']['VALUE']['TEXT']):?>
        <div class="ServiceBlock">
            <div class="ServiceBlock__header">
                <?=$arResult["PROPERTIES"]['TXT_H1']['VALUE']?>
            </div>
            <div class="ServiceBlock__specification">
                <?=$arResult["PROPERTIES"]['TXT']['~VALUE']['TEXT']?>
            </div>
            <ul class="ServiceBlockItems">
                <?foreach($arResult['PROPERTIES']['SERVICES']['VALUE'] as $arItem):?>
                    <li class="ServiceBlockItem">
                            <?=$arItem?>
                    </li>
                <?endforeach;?>
            </ul>
        </div>
<?endif;?>

    <?if($arResult['PROPERTIES']['PROFESSIONAL']['VALUE']):?>
        <?$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT');
        $arFilter = Array( "IBLOCK_ID"=>9,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['PROFESSIONAL']['VALUE']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
        $profi=array();

        while($ob = $res->GetNextElement())
        {

            $profi[$ob->GetFields()['ID']] = $ob->GetFields();
        }?>
    </div>
    </div>
        <div class="ProfessionalsBlock <?if($arResult["PROPERTIES"]['FON_2']['VALUE'] == 1) echo 'ProfessionalsBlockWhite';?>">
            <div class="Professionals">
                <div class="Professionals__header">
                    <h2><?=$arResult["PROPERTIES"]['PROFESSIONAL']['NAME']?></h2>
                </div>

                <div class="ProfessionalsItems">
                    <?foreach($arResult['PROPERTIES']['PROFESSIONAL']['VALUE'] as $arItem):?>
                        <div class="ProfessionalsItem">
                            <div class="ProfessionalsItem__name">
                                <?=$profi[$arItem]['NAME']?>
                            </div>

                            <div class="ProfessionalsItem__text">
                                <?=$profi[$arItem]['PREVIEW_TEXT']?>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>
        <div class="Blocks">
            <div class="Service">
            <?endif;?>

    <?if($arResult['PROPERTIES']['BANNER3_TYPE']['VALUE']&& $arResult['PROPERTIES']['BANNER3_H1']['VALUE']['TEXT'] ):?>
            </div>
        </div>
<div class="Banner <?=$arResult['PROPERTIES']['BANNER3_TYPE']['VALUE_XML_ID']?> move">

    <div class="Banner__info">
        <div class="Banner__description">
            <?=$arResult['PROPERTIES']['BANNER3_DESCRIPTION']['VALUE']?>
        </div>
        <div class="Banner__name">
            <?=$arResult['PROPERTIES']['BANNER3_H1']['~VALUE']['TEXT']?>
        </div>
        <div class="BannerButtonBlock">
            <div class="BannerButtonBlock__button b24-web-form-popup-btn-31"><?=$arResult['PROPERTIES']['BANNER3_BUTTON']['VALUE']?></div>
        </div>
        <?if($arResult['PROPERTIES']['BANNER3_TYPE']['VALUE_XML_ID'] == 'PROCENT'):?>
            <div class="BannerBlur"></div>
            <div class="BannerBigProcent moveVertical"></div>
            <div class="BannerLeftProcent moveVertical"></div>
            <div class="BannerCenterProcent moveVertical"></div>
            <div class="BannerBottomProcent moveVertical"></div>
        <?endif;?>
        <?if($arResult['PROPERTIES']['BANNER3_TYPE']['VALUE_XML_ID'] == 'LEAF'):?>
            <div class="BannerLeftTopLeaf moveVertical"></div>
            <div class="BannerLeftBottomLeaf moveVertical"></div>
            <div class="BannerRightBottomLeaf moveVertical"></div>
            <div class="BannerCenterBottomLeaf moveVertical"></div>
            <div class="BannerCenterTopLeaf moveVertical"></div>
            <div class="BannerCenterCenterLeaf moveVertical"></div>
            <div class="BannerCenterRightLeaf moveVertical"></div>
        <?endif;?>
        <?if($arResult['PROPERTIES']['BANNER3_TYPE']['VALUE_XML_ID'] == 'ARROW'):?>
            <div class="BannerRightTopArrow moveHorizontal"></div>
            <div class="BannerCenterTopArrow moveHorizontal"></div>
            <div class="BannerRightCenterArrow moveHorizontal"></div>
            <div class="BannerCenterBottomArrow moveHorizontal"></div>
        <?endif;?>
        <img src="<?=CFile::GetPath($arResult['PROPERTIES']['BANNER3_IMG']['VALUE'])?>" title="Баннер" alt="Баннер" />
    </div>
</div>

<div class="Blocks">
    <div class="Service">
        <?endif;?>

    <?if(!empty($arResult['PROPERTIES']['RECOMMEND']['VALUE'])):?>
    </div>
</div>
            <div class="ServiceRecommend">
                <div class="ServiceRecommend__header">
                    <h2><?=$arResult['PROPERTIES']['RECOMMEND']['NAME']?></h2>
                </div>
                <div class="ServiceRecommend__control">
                </div>
                <div class="ServiceRecommendList">
                        <div class="ServiceRecommendItems flexslider">
                            <ul class="slides">
                                <?$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PROPERTY_LINK','PROPERTY_SALE');
                                $arFilter = Array( "IBLOCK_ID"=>16,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['RECOMMEND']['VALUE']);
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
                                $recommend=array();

                                while($ob = $res->GetNextElement())
                                {
                                    $recommend[$ob->GetFields()['ID']] = $ob->GetFields();
                                }?>
                                <?foreach ($recommend as $rec):?>
                                    <li class="ServiceRecommendItem">

                                        <a href="<?=$rec['PROPERTY_LINK_VALUE']?>">
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

    <?if($arResult['PROPERTIES']['FAQ']['VALUE']):?>
        <div class="ServiceFaq">
            <div class="ServiceFaq__header">
                <h2><?=$arResult['PROPERTIES']['FAQ']['NAME']?></h2>
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

    <?if($arResult["PROPERTIES"]['PROJECTS']['VALUE']):?>
        <?if($arResult["PROPERTIES"]['FON_PROJECTS']['VALUE'] != 1 ):?>
            </div>
        </div>
        <div class="PortfolioBackground">
    <?endif;?>
        <div class="Portfolio">
        <div class="Portfolio__header">
            <h2><?=$arResult["PROPERTIES"]['PROJECTS']['NAME']?></h2>

        </div>
        <?foreach($arResult["PROPERTIES"]['PROJECTS']['VALUE'] as $arItem):?>
            <?
            $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE", "DETAIL_PAGE_PROPERTY","PROPERTY_*","PREVIEW_PICTURE",'PREVIEW_TEXT');
            $arFilter = Array( "IBLOCK_ID"=>3,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arItem);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
            while($ob = $res->GetNextElement())
            {
                $arItem = $ob->GetFields();
                $arItem['PROPERTIES'] = $ob->GetProperties();
            }
            ?>
            <a class="PortfolioItem PortfolioItem_code_<?=$arItem['PROPERTIES']['CODE']['VALUE']?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem['DETAIL_PAGE_URL']?>">
                <div class="PortfolioItem__img <?if($arItem['PROPERTIES']['IMG2_ZINDEX']['VALUE'] == 1):?> PortfolioItem__imgRightZindex<?endif;?> <?if($arItem['PROPERTIES']['IMG1']['VALUE'] && $arItem['PROPERTIES']['IMG2']['VALUE']):?>PortfolioItem__twooImg<?endif;?> PortfolioItem__imgAnimation<?=$arItem['PROPERTIES']['ANIMATION']['VALUE_XML_ID']?>" style="background-color: #<?=$arItem['PROPERTIES']['COLOR']['VALUE']?>">
                    <?if($arItem['PROPERTIES']['IMG1']['VALUE']):?>
                        <img class="PortfolioItem__imgLeft" src="<?=CFile::GetPath($arItem['PROPERTIES']['IMG1']['VALUE'])?>"  alt="<?=$arItem["NAME"]?> - изображение 1" title="<?=$arItem["NAME"]?> - изображение 1" style="left: <?=$arItem['PROPERTIES']['IMG1_LEFT']['VALUE']?>"/>
                    <?endif;?>
                    <?if($arItem['PROPERTIES']['IMG2']['VALUE']):?>
                        <img class=" PortfolioItem__imgRight" src="<?=CFile::GetPath($arItem['PROPERTIES']['IMG2']['VALUE'])?>"  alt="<?=$arItem["NAME"]?> - изображение 2" title="<?=$arItem["NAME"]?> - изображение 2" style="left: <?=$arItem['PROPERTIES']['IMG2_LEFT']['VALUE']?>"/>
                    <?endif;?>
                    <img class=" PortfolioItem__imgLogo" src="<?=CFile::GetPath($arItem['PROPERTIES']['LOGO']['VALUE'])?>"  alt="<?=$arItem["NAME"]?> - лого" title="<?=$arItem["NAME"]?> - лого"/>

                </div>
                <div class="PortfolioItem__info">
                    <div class="PortfolioItem__text">
                        <div class="PortfolioItem__type">
                            Кейс
                        </div>
                        <div class="PortfolioItem__name">
                            <?echo $arItem["NAME"]?>
                        </div>
                        <div class="PortfolioItem__tags">
                            <ul>
                                <?foreach ($arItem['PROPERTIES']['TAGS']['VALUE'] as $tag):?>
                                    <li>
                                        #<?=$tag?>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        </div>
                        <div class="PortfolioItem__description">
                            <?echo $arItem["PREVIEW_TEXT"];?>
                        </div>
                    </div>

                    <div class="PortfolioItem__more">
                        Подробнее <svg class="inline-svg-icon arrow">
                            <use xlink:href="#arrow"></use>
                        </svg>
                    </div>
                </div>
            </a>
        <?endforeach;?>
    </div>
    <?if($arResult["PROPERTIES"]['FON_PROJECTS']['VALUE'] != 1 ):?>
</div>
        <div class="Blocks">
            <div class="Service">
        <?endif;?>
    <?endif;?>

</div>

