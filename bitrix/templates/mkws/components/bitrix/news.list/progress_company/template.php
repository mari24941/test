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
<div class="Progress">
    <div class="Blocks">
        <div class="Progress__flex">
            <div class="Progress__left">
                <div class="Progress__header">
                    <h2><?=$arResult['NAME']?></h2><img src="<?=CFile::GetPath($arResult['PICTURE'])?>" alt="<?=$arResult['NAME']?>" title="<?=$arResult['NAME']?>">
                </div>
                <div class="Progress__specification">
                    <?=$arResult['DESCRIPTION']?>
                </div>
            </div>
            <div class="Progress__right">
                <div class="ProgressItems">
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="ProgressItem" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="background-image: url(<?=CFile::GetPath($arItem['PROPERTIES']['SVG']['VALUE'])?>);">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"/>
                            <div class="ProgressItem__name">
                                <?=$arItem['NAME']?>
                            </div>
                        </div>
                    <?endforeach;?>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="Blocks">
