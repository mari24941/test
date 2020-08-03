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
<div class="Principles">
    <div class="Principles__header">
        <h2><?=$arResult['NAME']?></h2>
    </div>
    <div class="Principles__specification">
        <?=$arResult['DESCRIPTION']?>
    </div>
<?foreach($arResult["ITEMS"] as $key=>$arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="Principles__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="Principles__number"><img src="<?=CFile::GetPath($arItem['PROPERTIES']['SVG']['VALUE'])?>" alt="<?=$arItem['NAME']?>" title="<?=$arItem['NAME']?>"></div>
        <div class="Principles__description">
            <div class="Principles__name"><?=$arItem['NAME']?></div>
            <?echo $arItem["PREVIEW_TEXT"];?>
        </div>
	</div>
<?endforeach;?>
</div>
