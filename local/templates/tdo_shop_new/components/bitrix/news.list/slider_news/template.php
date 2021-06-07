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
<div class="blog-slider-wrap">
    <div class="blog-slider-768-shadow"></div>
    <div class="container">
        <div class="blog-slider">
			<? foreach ($arResult["ITEMS"] as $arItem) {
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
				                       array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="blog-slider_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="blog-slider_item_img" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);"></div>
                    <div class="blog-slider_item_text">
                        <span><?=$arItem["NAME"]?></span>
                        <div class="blog-slider_item-btn">Читать</div>
                    </div>
                </a>
			<? } ?>
        </div>

        <div class="wrap-big-btn">
            <a href="/news/" class="btn big-btn btn-red">Другие статьи в блоге Alternova</a>
        </div>

    </div>
</div>


