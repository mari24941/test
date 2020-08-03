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
<?$this->addExternalJS($this->__component->__template->__folder.'/flexslider/jquery.flexslider-min.js');
$this->addExternalCss($this->__component->__template->__folder.'/flexslider/flexslider.css');
?>
<?require 'parts/'.$arResult['PROPERTIES']['TEMPLATES']['VALUE_XML_ID'].'.php'?>


