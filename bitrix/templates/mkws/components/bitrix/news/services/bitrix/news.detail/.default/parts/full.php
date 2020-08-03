<div class="Service">
    <div class="Service__header">
        <h1><?=$arResult["PROPERTIES"]['HEADER']['VALUE']?$arResult["PROPERTIES"]['HEADER']['VALUE']:$arResult["NAME"]?></h1>
    </div>

    <?if($arResult['DETAIL_TEXT']){?>
    <div class="Service__preview w-100">
        <?=$arResult['DETAIL_TEXT']?>
    </div>
<?} ?>
</div>
    