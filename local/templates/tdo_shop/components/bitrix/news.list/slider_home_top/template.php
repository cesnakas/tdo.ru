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
<div class="main-screen-content__thumbnails">
	<?
	foreach ($arResult["ITEMS"] as $ITEM)
	{
		?>
		<div class="slide">
			<div class="slide__thumbs" style="background-image: url(<?=$ITEM["DETAIL_PICTURE"]['SRC']?>);">
			</div>
		</div>
		<?
	}
	?>
</div>

