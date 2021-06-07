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
<div class="job">
    <div class="container">
		<?
		foreach ($arResult["ITEMS"] as $arItem) {
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
			                       array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

			$PROPERTIES = $arItem["DISPLAY_PROPERTIES"];
			$salary     = $PROPERTIES['salary']["DISPLAY_VALUE"];

			$salary = str_replace('руб.', '₽', $salary);

			?>
            <div class="job-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="job-item-top">
                    <div class="job-item_head"><?=$arItem["NAME"]?></div>
                    <div class="job-item_price">от <?=$salary?></div>
                </div>
                <div><?=$arItem["PREVIEW_TEXT"]?></div>
                <a href="#" data-vacname="<?=$arItem["NAME"]?>" class="job-item_btn btn btn-red big-btn js-job-popup-open">Откликнуться</a>
            </div>
			<?
		}
		?>
    </div>
</div>


