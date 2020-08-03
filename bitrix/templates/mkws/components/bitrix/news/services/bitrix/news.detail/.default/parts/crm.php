<div class="Service">
    <div class="Service__header">

        <h1><?=$arResult["PROPERTIES"]['HEADER']['VALUE']?$arResult["PROPERTIES"]['HEADER']['VALUE']:$arResult["NAME"]?></h1>
    </div>

    <?if($arResult['DETAIL_TEXT']){?>
        <div class="Service__preview">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
    <?}?>
    <?if($arResult['PROPERTIES']['TXT']['VALUE']['TEXT']):?>
        <div class="ServiceFull">

                <?=$arResult["PROPERTIES"]['TXT']['~VALUE']['TEXT']?>

        </div>
    <?endif;?>
    <?if($arResult['PROPERTIES']['WHY_TXT']['VALUE']):?>
        <div class="ServiceTextCrm">
            <?if($arResult['PROPERTIES']['WHY_H1']['VALUE']):?>
                <div class="ServiceTextCrm__header"><?=$arResult['PROPERTIES']['WHY_H1']['VALUE']?></div>
            <?endif;?>

            <?foreach ($arResult['PROPERTIES']['WHY_TXT']['~VALUE'] as $key=>$why):?>

                    <div class="ServiceTextCrm__text" ><?=$why['TEXT']?></div>

            <?endforeach;?>
        </div>
    <?endif;?>

</div>
    <?if($arResult['PROPERTIES']['PROFESSIONAL']['VALUE']):?>

</div>
<div class="ProfessionalsBlock <?if($arResult["PROPERTIES"]['FON_2']['VALUE'] == 1) echo 'ProfessionalsBlockWhite';?>">
    <div class="Professionals">
        <div class="Professionals__header">
            <?=$arResult["PROPERTIES"]['PROFESSIONAL']['NAME']?>
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