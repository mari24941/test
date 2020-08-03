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
?>
</div>
<div class="Team" style="background-image: url(<?=CFile::GetPath($arResult['PICTURE'])?>);">
    <div class="Blocks">
        <div class="Team__header">
            <h2><?=$arResult['NAME']?></h2>
        </div>
        <div class="TeamBlock">
            <div class="Team__specification">
                <?=$arResult['DESCRIPTION']?>
            </div>
            <div class="TeamItems">
                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="TeamItem" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

                        <div class="TeamItem__name">
                            <?=$arItem['NAME']?>
                        </div>
                        <div>
                            <?=$arItem['PREVIEW_TEXT']?>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
            <div class="TeamButton">
                <div><h3><?=$arParams['PRIZIV']?></h3></div>
                <a class="TeamButtonLink" href="<?=$arParams['LINK']?>">Посмотреть вакансии <svg class="inline-svg-icon arrow"><use xlink:href="#arrow"></use></svg></a>
            </div>
        </div>

    </div>
</div>
<div class="Blocks">
