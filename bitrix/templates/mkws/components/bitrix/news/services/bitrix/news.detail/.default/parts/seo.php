<div class="Service">
    <div class="Service__header">

        <h1><?=$arResult["PROPERTIES"]['HEADER']['VALUE']?$arResult["PROPERTIES"]['HEADER']['VALUE']:$arResult["NAME"]?></h1>
    </div>

    <?if($arResult['DETAIL_TEXT']){?>
        <div class="Service__preview">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    <?}?>
    <?if($arResult['PROPERTIES']['WHY_TXT']['VALUE']):?>
        <div class="ServiceWhy">
            <?if($arResult['PROPERTIES']['WHY_H1']['VALUE']):?>
                <div class="ServiceWhy__header"><h2><?=$arResult['PROPERTIES']['WHY_H1']['VALUE']?></h2></div>
            <?endif;?>

            <?foreach ($arResult['PROPERTIES']['WHY_TXT']['~VALUE'] as $key=>$why):?>
                <div class="ServiceWhy__item">
                    <div class="ServiceWhy__name"><?=$arResult['PROPERTIES']['WHY_TXT']['DESCRIPTION'][$key]?></div>
                    <div class="ServiceWhy__description" ><?=$why['TEXT']?></div>
                </div>
            <?endforeach;?>
        </div>
    <?endif;?>
    <?if($arResult['PROPERTIES']['TARIFS']['VALUE']):?>
        <div class="ServiceTariffs">
            <?if($arResult['PROPERTIES']['TARIFS_H1']['VALUE']):?>
                <div class="ServiceTariffs__header"><h2><?=$arResult['PROPERTIES']['TARIFS_H1']['VALUE']?></h2></div>
                <a class="ServiceTariffs__help">Сравнить</a>
            <?endif;?>

            <div class="ServiceTariffsFlip">
                <div class="ServiceTariffsFlipFront">
                    <?foreach ($arResult['PROPERTIES']['TARIFS']['VALUE'] as $tariff):?>
                        <div class="ServiceTariffs__item <?if($tariff['PROPERTY_VIP_VALUE'] == 1) echo 'ServiceTariffs_type_vip';?>">
                            <div>
                                <div class="ServiceTariffs__number"><?=$tariff['PROPERTY_NUMBER_VALUE']?></div>
                                <div class="ServiceTariffs__name"><?if($tariff['PROPERTY_IMG_VALUE']):?><img src="<?=CFile::GetPath($tariff['PROPERTY_IMG_VALUE'])?>" alt="Иконка для тарифа <?=$tariff['NAME']?>" title="<?=$tariff['NAME']?>"><?endif;?><?=$tariff['NAME']?></div>
                                <?if($tariff['PROPERTY_HASHTAG_VALUE']):?><div class="ServiceTariffs__tag"><?=$tariff['PROPERTY_HASHTAG_VALUE']?></div>
                                <?endif;?>
                                <div class="ServiceTariffs__bottom">
                                    <div class="ServiceTariffs__description" ><?=$tariff['~PROPERTY_DESCRIPTION_VALUE']['TEXT']?></div>
                                    <div class="ServiceTariffs__right">
                                        <div>
                                            <div class="ServiceTariffs__price">
                                                <p>Стоимость</p>
                                                <?=$tariff['PROPERTY_PRICE_VALUE']?> р/мес
                                            </div>
                                            <a class="ServiceTariffs__more" href="<?=$tariff['PROPERTY_LINK_VALUE']?>">О тарифе</a>
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
                            <div class="ServiceTariffsCompareHeader"><?if($tariff['PROPERTY_IMG_VALUE']):?><img src="<?=CFile::GetPath($tariff['PROPERTY_IMG_VALUE'])?>" alt="Иконка для тарифа <?=$tariff['NAME']?>" title="<?=$tariff['NAME']?>"><?endif;?>Тариф <?=$tariff['PROPERTY_NUMBER_VALUE']?></div>
                            <?$compares = array_merge($compares, $tariff['PROPERTY_COMPARE']);?>
                        <?endforeach;?>
                        <?$compares = array_unique($compares);?>
                        <?foreach ($compares as $item):?>
                            <div class="ServiceTariffsCompareLeft"><?=$item?></div>

                            <?foreach ($arResult['PROPERTIES']['TARIFS']['VALUE'] as $tariff):?>
                                <div class="ServiceTariffsCompareItem">
                                    <?$p = 0;?>
                                    <?foreach ($tariff['PROPERTY_COMPARE'] as $t):?>
                                        <?$p++;?>
                                        <?if($item == $t){?>
                                            <div class="ServiceTariffsCompareItemYes"></div>
                                            <?
                                            break;
                                        } if($p == count($tariff['PROPERTY_COMPARE'])) {?>
                                            <div class="ServiceTariffsCompareItemNo"></div>
                                        <?}?>
                                    <?endforeach;?>

                                </div>

                            <?endforeach;?>
                        <?endforeach;?>
                        <div class="ServiceTariffsComparePriceLeft ">Стоимость</div>
                        <?foreach ($arResult['PROPERTIES']['TARIFS']['VALUE'] as $tariff):?>
                            <div class="ServiceTariffsComparePriceItem ">
                                <?=$tariff['PROPERTY_PRICE_VALUE']?>
                                <span>в месяц</span>
                            </div>
                        <?endforeach;?>
                        <div class="ServiceTariffsCompareHeader"></div>
                        <?foreach ($arResult['PROPERTIES']['TARIFS']['VALUE'] as $tariff):?>
                            <div class="ServiceTariffsCompareHeader">
                                <a href="<?=$tariff['PROPERTY_LINK_VALUE']?>" class="ServiceTariffsCompareMore">Подробнее
                                    <svg class="inline-svg-icon arrow">
                                        <use xlink:href="#arrow"></use>
                                    </svg></a>
                            </div>
                        <?endforeach;?>
                    </div>
                </div>
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

        <?if($arResult['PROPERTIES']['WORK']['VALUE']):?>


            <div class="Works">
                <div class="Works__header">
                    <h2><?=$arResult["PROPERTIES"]['WORK_H1']['VALUE']?></h2>
                </div>
                <div class="WorksItems">
                    <?foreach($arResult['PROPERTIES']['WORK']['VALUE'] as $arItem):?>
                        <div class="WorksItem">
                            <?echo file_get_contents('..'.CFile::GetPath($arItem['PROPERTIES']['SVG']['VALUE']));?>
                            <div class="Works__info">
                                <div class="Works__name">
                                    <?=$arItem['NAME']?>
                                </div>
                                <div><?=$arItem['PREVIEW_TEXT']?></div>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        <?endif;?>

        <?if($arResult['PROPERTIES']['RESULTS']['VALUE']):?>
        <?$this->addExternalJS($this->__component->__template->__folder.'/flexslider/jquery.flexslider-min.js');
        $this->addExternalCss($this->__component->__template->__folder.'/flexslider/flexslider.css');
        ?>
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
                            <img src="<?=CFile::GetPath($arItem["PREVIEW_PICTURE"])?>" alt="<?=CUtil::translit($arItem['NAME'],'ru',array("replace_space"=>" ","replace_other"=>" "))?>" title="<?=$arItem['NAME']?>"/>
                            <div class="ResultsSliderItem__leftItem">
                                <div><?=$arItem["PROPERTIES"]['SITE']['NAME']?></div>
                                <?=$arItem["PROPERTIES"]['SITE']['VALUE']?>
                            </div>
                            <div class="ResultsSliderItem__leftItem">
                                <div><?=$arItem["PROPERTIES"]['SYSTEM']['NAME']?></div>
                                <?=$arItem["PROPERTIES"]['SYSTEM']['VALUE']?>
                            </div>
                        </div>
                        <div class="ResultsSliderItem__graph">
                            <div class="ResultsSliderItem__graphName">Посетители</div>
                            <div class="maps ResultsSliderItem__graphId<?=$arItem['ID']?>" id="ResultsSliderItem__graphId<?=$arItem['ID']?>" data-id="<?=$arItem['ID']?>"></div>
                            <script>
                                google.charts.load('current', {packages:['corechart']});
                                google.charts.setOnLoadCallback(drawExample2);

                                function drawExample2() {
                                    // Some raw data (not necessarily accurate)
                                    <?=$arItem["PROPERTIES"]['CODE']['VALUE']['TEXT']?>

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
                                            backgroundColor: 'none'
                                        };
                                    }

                                    var current<?=$arItem['ID']?> = 0;
                                    // Create and draw the visualization.
                                    var chart = new google.visualization.ComboChart(document.getElementById('ResultsSliderItem__graphId<?=$arItem['ID']?>'));
                                    function drawChart<?=$arItem['ID']?>() {
                                        // Disabling the button while the chart is drawing.

                                        chart.draw(data[current<?=$arItem['ID']?>], options);
                                    }
                                    drawChart<?=$arItem['ID']?>();
                                    var el = document.getElementById('ResultsSliderItem__graphId<?=$arItem['ID']?>');
                                    var Visible<?=$arItem['ID']?> = function (target){

                                        if(current<?=$arItem['ID']?> == 0){
                                            var targetPosition = {
                                                    top: window.pageYOffset + target.getBoundingClientRect().top,
                                                    left: window.pageXOffset + target.getBoundingClientRect().left,
                                                    right: window.pageXOffset + target.getBoundingClientRect().right,
                                                    bottom: window.pageYOffset + target.getBoundingClientRect().bottom
                                                },
                                                windowPosition = {
                                                    top: window.pageYOffset,
                                                    left: window.pageXOffset,
                                                    right: window.pageXOffset + document.documentElement.clientWidth,
                                                    bottom: window.pageYOffset + document.documentElement.clientHeight
                                                };
                                            if (targetPosition.bottom > windowPosition.top && // Если позиция нижней части элемента больше позиции верхней чайти окна, то элемент виден сверху
                                                targetPosition.top < windowPosition.bottom && // Если позиция верхней части элемента меньше позиции нижней чайти окна, то элемент виден снизу
                                                targetPosition.right > windowPosition.left && // Если позиция правой стороны элемента больше позиции левой части окна, то элемент виден слева
                                                targetPosition.left < windowPosition.right) {
                                                current<?=$arItem['ID']?> = 1 - current<?=$arItem['ID']?>;
                                                drawChart<?=$arItem['ID']?>();
                                            };
                                        }


                                    };

                                    if (el) {
                                        Visible<?=$arItem['ID']?>(el);
                                    }
                                    $('.flex-next').click(function(){
                                        setTimeout(Visible<?=$arItem['ID']?>, 1000,el);
                                    });

                                    $('body').on('click', '.flex-next', function(){
                                        setTimeout(Visible<?=$arItem['ID']?>, 1000,el);
                                    });

                                    $('body').on('touchstart', '.flex-next', function(){
                                        setTimeout(Visible<?=$arItem['ID']?>, 1000,el);
                                    });

                                    $('body').on('mousedown', '.flex-next', function(){
                                        setTimeout(Visible<?=$arItem['ID']?>, 1000,el);
                                    });

                                    if($(window).width() < 767) {
                                        current<?=$arItem['ID']?> = 1 - current<?=$arItem['ID']?>;
                                        drawChart<?=$arItem['ID']?>();
                                    }

                                    window.addEventListener('scroll', function() {
                                        setTimeout(Visible<?=$arItem['ID']?>, 1000,el);
                                    });
                                    <?if($key!=0){?>
                                    current<?=$arItem['ID']?> = 1 - current<?=$arItem['ID']?>;
                                    drawChart<?=$arItem['ID']?>();
                                    <?}?>
                                }
                            </script>
                        </div>
                        <div class="ResultsSliderItem__right">
                            <div class="ResultsSliderItem__rightNameL">Фраза</div>
                            <div class="ResultsSliderItem__rightNameR">Позиция</div>
                            <?foreach ($arItem["PROPERTIES"]['PHRASE']['VALUE'] as $key=>$ph):?>
                                <div class="ResultsSliderItem__rightValueL"><?=$ph?></div>
                                <div class="ResultsSliderItem__rightValueR"><?=$arItem["PROPERTIES"]['PHRASE']['DESCRIPTION'][$key]?></div>
                            <?endforeach;?>
                        </div>

                    </div>
                    <div class="ResultsSliderItem__resultBlock">
                        <div class="ResultsSliderItem__result">
                            <div class="ResultsSliderItem__resultItem">
                                <div class="ResultsSliderItem__resultName"><?=$arItem["PROPERTIES"]['START']['NAME']?></div>
                                <?=$arItem["PROPERTIES"]['START']['~VALUE']['TEXT']?>
                            </div>
                            <div class="ResultsSliderItem__resultItem">
                                <div class="ResultsSliderItem__resultName"><?=$arItem["PROPERTIES"]['FINISH']['NAME']?></div>
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

    </div>
    <?if($arResult['PROPERTIES']['PROFESSIONAL']['VALUE']):?>

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
                        <?=$arItem['NAME']?>
                    </div>

                    <div class="ProfessionalsItem__text">
                        <?=$arItem['PREVIEW_TEXT']?>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</div>
<div class="Blocks">
    <?endif;?>

    <script id="bx24_form_button" data-skip-moving="true">
        (function(w,d,u,b){w['Bitrix24FormObject']=b;w[b] = w[b] || function(){arguments[0].ref=u;
            (w[b].forms=w[b].forms||[]).push(arguments[0])};
            if(w[b]['forms']) return;
            var s=d.createElement('script');s.async=1;s.src=u+'?'+(1*new Date());
            var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://8iv.bitrix24.ru/bitrix/js/crm/form_loader.js','b24form');

        b24form({"id":"10","lang":"ru","sec":"895p1l","type":"button","click":""});
    </script>