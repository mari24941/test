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
<div class="Services">

    <div class="Services__header">
        <h1><?=$arResult['NAME']?></h1>
    </div>
<div class="ServicesList">


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<a class="ServicesItem" id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
		<div class="ServicesItem__info">
            <div class="ServicesItem__type">
                Услуга
            </div>
            <div class="ServicesItem__name">
                <?=$arItem["NAME"]?>
            </div>
        </div>
        <div class="ServicesItem__text">
            <?=$arItem["PREVIEW_TEXT"];?>
        </div>
        <div class="ServicesItem__more">
            Подробнее
            <svg class="inline-svg-icon arrow">
                <use xlink:href="#arrow"></use>
            </svg>
        </div>
	</a>
<?endforeach;?>
</div>
</div>


