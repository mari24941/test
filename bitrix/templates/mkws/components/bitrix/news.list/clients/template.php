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
<?//$this->addExternalJS($this->__component->__template->__folder.'/flexslider/jquery.flexslider-min.js');
//$this->addExternalCss($this->__component->__template->__folder.'/flexslider/flexslider.css');
//?>
<?$this->addExternalJS($this->__component->__template->__folder.'/js/slick.js');
$this->addExternalCss($this->__component->__template->__folder.'/css/slick-theme.css');
$this->addExternalCss($this->__component->__template->__folder.'/css/slick.css');
?>
</div>
<div class="Clients">
    <div class="ClientsBlocks">

        <div class="Clients__header">
            <h2><?=$arResult['NAME']?></h2>
        </div>

    </div>
    <div class="ClientsBlock ">

        <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));?>
            <div class="ClientsBlock__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"/>
            </div>
        <?endforeach;?>

    </div>

</div>
<div class="Blocks">
