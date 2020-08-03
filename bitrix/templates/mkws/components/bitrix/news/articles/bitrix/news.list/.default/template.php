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
<div class="Articles">

    <div class="Articles__header">
        <h1><?=$arResult['NAME']?></h1>
    </div>

    <div class="ArticlesList">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a class="ArticlesItem" id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
            <div class="ArticlesItem__info">
                <?if($arItem["PREVIEW_PICTURE"]):?>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"/>
                <?endif;?>
            <?if($arItem["PROPERTIES"]['SECTION']['VALUE']):?><div class="ArticlesItem__section"><?=$arItem["PROPERTIES"]['SECTION']['VALUE']?></div><?endif;?>

                <div class="ArticlesItem__type"><?=GetMessage("TYPE");?></div>
                <div class="ArticlesItem__name"><?=$arItem["NAME"]?></div>
                <div class="ArticlesItem__more"><?=GetMessage("MORE");?> <svg class="inline-svg-icon arrow"><use xlink:href="#arrow"></use></svg></div>

            </div>
        </a>
    <?endforeach;?>
    </div>
    <?if(count($arResult["ITEMS"]) > 9):?>
    <div class="ArticlesShowMore">
        <a><svg class="inline-svg-icon arrow arrow-bottom">
                <use xlink:href="#arrow"></use>
            </svg><?=GetMessage("SHOW_MORE");?></a>
    </div>
    <?endif;?>
    <div class="Pagination">
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
            <br /><?=$arResult["NAV_STRING"]?>
        <?endif;?>
    </div>
</div>