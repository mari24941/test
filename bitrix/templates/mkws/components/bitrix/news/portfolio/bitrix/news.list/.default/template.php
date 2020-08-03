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

$sections = array();
foreach($arResult["ITEMS"] as $arItem):
    foreach ($arItem['PROPERTIES']['TAGS']['VALUE'] as $tag):

        $sections[] = $tag;

    endforeach;
endforeach;
$sections = array_unique($sections);
?>

    <div class="Portfolio">
        <h1>
            <?=$arResult['NAME']?>
        </h1>
        <div class="Portfolio__sections">
            <div class="Portfolio__section Portfolio__section_active_true" data-id="all">
                Все
            </div>
            <?foreach ($sections as $section):?>
                <div class="Portfolio__section" data-id="<?=Cutil::translit($section,"ru")?>">
                    <?=$section?>
                </div>
            <?endforeach;?>
        </div>
        <div class="PortfolioList">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <a class="PortfolioItem PortfolioItem_code_<?=$arItem['PROPERTIES']['CODE']['VALUE']?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem['DETAIL_PAGE_URL']?>" <?foreach ($arItem['PROPERTIES']['TAGS']['VALUE'] as $tag): echo ' data-'.Cutil::translit($tag,"ru").'="true" '; endforeach;?>>
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
                            <h2>
                                <?echo $arItem["NAME"]?>
                            </h2>

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
        <div class="PortfolioShowMore">
            <a><svg class="inline-svg-icon arrow arrow-bottom">
                    <use xlink:href="#arrow"></use>
                </svg>Показать еще</a>
        </div>
        <div class="Pagination">
            <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
                <br /><?=$arResult["NAV_STRING"]?>
            <?endif;?>
        </div>

    </div>

