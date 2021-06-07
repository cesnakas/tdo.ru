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

<div class="call-us-slider"><?
	foreach($arResult["ITEMS"] as $arItem){
	    ?><div style="background-image: url('<?=$arItem["DETAIL_PICTURE"]["SRC"]?>');" class="call-us-slider_item"></div><?
    }
    ?>
</div>


