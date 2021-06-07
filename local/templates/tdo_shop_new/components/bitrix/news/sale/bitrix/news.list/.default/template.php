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


?>

<div class="sale-wrap"><?
	foreach ($arResult["ITEMS"] as $arItem) {
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
		                       array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
        <div class="sale-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')" class="sale-item_img"></div>
            <div class="sale-item_content">
                <div class="sale-item_head"><?=$arItem["NAME"]?></div>
                <p class="sale-item_text"><?=$arItem["PREVIEW_TEXT"]?></p>
                <a class="sale-item_link" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать</a>
            </div>
        </div>
		<?
	}
	?>
</div>

<? if($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br /><?=$arResult["NAV_STRING"]?>
<? endif; ?>



