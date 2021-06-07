<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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

if(empty($arResult)) {
	return;
}
?>
<div class="footer-top-col">
	<? foreach ($arResult as $itemIdex => $arItem) { ?>
		<? if($arItem["DEPTH_LEVEL"] == "1") { ?>


            <div class="footer-top-col_link-wrap">
                <a class="footer-top-col_link" href="<?=htmlspecialcharsbx($arItem["LINK"])?>"><?=htmlspecialcharsbx($arItem["TEXT"])?></a>
            </div>

		<? } ?>
	<? } ?>






</div>