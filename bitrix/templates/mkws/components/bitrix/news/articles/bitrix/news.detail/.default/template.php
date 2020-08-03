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


<?$date = $arResult["DISPLAY_ACTIVE_FROM"]?$arResult["DISPLAY_ACTIVE_FROM"]:$arResult["TIMESTAMP_X"];?>
<?
$arr = [
    'января',
    'февраля',
    'марта',
    'апреля',
    'мая',
    'июня',
    'июля',
    'августа',
    'сентября',
    'октября',
    'ноября',
    'декабря'
];
$month = date('n',strtotime($date))-1;

?>
<div class="Article">

    <h1><?=$arResult["NAME"]?></h1>
    <div class="ArticleTop">
        <div>
    <div class="ArticleDate"><?=date('d',strtotime($date)).' '.$arr[$month].' '.date(' Y',strtotime($date));?></div>
    <?if($arResult['PROPERTIES']['AUTHOR']['VALUE']):?><div class="ArticleAuthor"><?=$arResult['PROPERTIES']['AUTHOR']['NAME']?>:<?=$arResult['PROPERTIES']['AUTHOR']['VALUE']?></div><?endif;?></div>
    <?
    if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
    {
        ?>
        <div class="ArticleShare">
            <noindex>
                <?
                $APPLICATION->IncludeComponent("bitrix:main.share", "mkws", array(
                    "HANDLERS" => $arParams["SHARE_HANDLERS"],
                    "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                    "PAGE_TITLE" => $arResult["~NAME"],
                    "SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                    "SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                    "HIDE" => $arParams["SHARE_HIDE"],
                ),
                    $component,
                    array("HIDE_ICONS" => "Y")
                );
                ?>
            </noindex>
        </div>
        <?
    }
    ?>
    </div>

    <div class="ArticleText">
        <?echo $arResult["DETAIL_TEXT"];?>
    </div>


    <div class="ArticleTags">
        <?foreach ($arResult['PROPERTIES']['TAGS']['VALUE'] as $tag): ?>
        <div  class="ArticleTag"># <?=$tag?></div>
        <?endforeach;?>
    </div>

    <div class="ArticleBottom"><?
        $like = '';

        if($arResult['PROPERTIES']['LIKE']['VALUE']){
            $like = count($arResult['PROPERTIES']['LIKE']['VALUE']);
        } else {
            $like = GetMessage('LIKE');
        }

        ?>
        <div class="ArticleLike" data-ip="<?=$_SERVER['REMOTE_ADDR']?>" data-id="<?=$arResult['ID']?>" data-empty="<?=GetMessage('LIKE');?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M19.9668 6.24806C19.6749 3.0348 17.4005 0.70351 14.5542 0.70351C12.6579 0.70351 10.9217 1.72395 9.94471 3.35943C8.97658 1.7028 7.31148 0.703125 5.44561 0.703125C2.59967 0.703125 0.324928 3.03441 0.0333724 6.24768C0.0102942 6.38961 -0.0843267 7.13657 0.203382 8.35472C0.618021 10.1117 1.57577 11.7099 2.97239 12.9754L9.9401 19.2984L17.0274 12.9758C18.424 11.7099 19.3818 10.1121 19.7964 8.35472C20.0841 7.13696 19.9895 6.38999 19.9668 6.24806Z" fill="#E0E0E0"/>
            </svg><div class="ArticleLikeCount">
                <?=$like?></div>
        </div>
<?
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="ArticleShare">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "mkws", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>

    </div>
</div>
<?$Articles = array();
$arSelect = Array("ID");
$arFilter = Array("IBLOCK_ID"=>IntVal($arResult['IBLOCK_ID']), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>200), $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $Articles[] = $arFields['ID'];
}if(count($Articles) > 4) {
    ?>
<div class="ArticleInteres">
    <div class="ArticleInteres__header"><?=GetMessage('INTERES')?></div>
    <div class="ArticlesList">
<?


    $k0 = rand(0, count($Articles) - 1);
    while ($Articles[$k0] == $arResult['ID']) {
        $k0 = rand(0, count($Articles) - 1);
    }
    $randomArticles[0] = $Articles[$k0];
    $k = rand(0, count($Articles) - 1);
    while ($Articles[$k] == $randomArticles[0] || $Articles[$k] == $arResult['ID']) {
        $k = rand(0, count($Articles) - 1);
    }

    $randomArticles[1] = $Articles[$k];

    $k2 = rand(0, count($Articles) - 1);
    while ($Articles[$k2] == $randomArticles[0] || $Articles[$k2] == $randomArticles[1] || $Articles[$k2] == $arResult['ID']) {
        $k2 = rand(0, count($Articles) - 1);
    }

    $randomArticles[2] = $Articles[$k2];


    $arSelect2 = Array("ID", "NAME", "DATE_ACTIVE_FROM", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", 'PROPERTY_SECTION');
    $arFilter2 = Array("IBLOCK_ID" => IntVal($arResult['IBLOCK_ID']), 'ID' => $randomArticles, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $res2 = CIBlockElement::GetList(Array(), $arFilter2, false, Array("nPageSize" => 200), $arSelect2);

    while ($ob2 = $res2->GetNextElement()) {

        $arFields2 = $ob2->GetFields();
        ?>
        <a class="ArticlesItem" href="<?= $arFields2["DETAIL_PAGE_URL"] ?>">
            <div class="ArticlesItem__info">
                <img src="<?= CFile::GetPath($arFields2["PREVIEW_PICTURE"]) ?>"
                     alt="<?= $arFields2["NAME"] ?>"
                     title="<?= $arFields2["NAME"] ?>"/>
                <?
                if ($arFields2["PROPERTY_SECTION_VALUE"]):?>
                    <div class="ArticlesItem__section"><?= $arFields2['PROPERTY_SECTION_VALUE'] ?></div><?endif; ?>

                <div class="ArticlesItem__type"><?= GetMessage("TYPE"); ?></div>
                <div class="ArticlesItem__name"><?= $arFields2["NAME"] ?></div>
                <div class="ArticlesItem__more"><?= GetMessage("MORE"); ?>
                    <svg class="inline-svg-icon arrow">
                        <use xlink:href="#arrow"></use>
                    </svg>
                </div>

            </div>
        </a>
        <?
    }

?>
    </div>
</div>
<?}?>