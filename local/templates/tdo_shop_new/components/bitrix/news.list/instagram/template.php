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
<div class="video-slider">
    <div class="container">
        <div class="section-head">
            <div class="section-head_item-opacity">Видео с производства</div>
        </div>
        <div class="wrap-all_movie">
            <a href="https://www.instagram.com/tdo.bu/" target="_blank" class="all_movie-link">Смотреть все</a>
        </div>

    </div>
    <div class="container">
        <div class="video-slider-wrap">
			<?
			$i = 0;
			foreach ($arResult["ITEMS"] as $arItem) {
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
				                       array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

				$i ++;

				?>
            <div class="video-slider-item-wrap" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

                    <div href="#" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);" class="video-slider-item">
                        <span class="video-slider-item_text"><?=$arItem["NAME"]?></span>
                        <div class="video-slider-item_mask">
                            <div class="video-slider-item_mask-content">
                                <div style="background-image: url(/local/templates/tdo_shop/img/icons/aroundLogo.svg);" class="video-slider-item_mask-logo"></div>
                                <a target="_blank" href="<?=$arItem["DISPLAY_PROPERTIES"]['link']['VALUE']?>" class="inst-wrap">@alternova_msk</a>
                                <a target="_blank" href="<?=$arItem["DISPLAY_PROPERTIES"]['link']['VALUE']?>" class="video-btn">Продолжить просмотр</a>
                            </div>
                        </div>
                    </div>
                </div><?
				if($i == 3) {
					?>
                    <div class="video-slider-item-wrap">
                        <div href="#" style="background-image: url(/local/templates/tdo_shop/img/icons/redstar.svg);" class="video-slider-item video-slider-item--red">
                            <div class="video-slider-item_mask">
                                <div class="video-slider-item_mask-content">
                                    <div style="background-image: url(/local/templates/tdo_shop/img/icons/aroundLogo.svg);" class="video-slider-item_mask-logo"></div>
                                    <div class="video-logo-comp"></div>
                                    <div class="video-slider-item_text video-slider-item_text-center">Все истории <br> в Инстаграме</div>
                                    <a href="https://www.instagram.com/tdo.bu/" target="_blank" class="video-btn opacity-btn">Смотреть</a>
                                </div>
                            </div>
                        </div>
                    </div><?
				}
			}
			?>
        </div>
    </div>
</div>

