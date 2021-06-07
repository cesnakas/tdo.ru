<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
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
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
$this->addExternalCss($this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css');
?>

<? foreach ($arResult["ITEMS"] as $arItem) { ?>
	<?
	$image           = CIntranetUtils::InitImage($arItem["PREVIEW_PICTURE"]["ID"], 75, 75);
	$imageSrc        = $image['CACHE']['src'];
	?>

    <a style="background-image: url('<?=$imageSrc?>');" class="brands-item" href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a>
<? } ?>


