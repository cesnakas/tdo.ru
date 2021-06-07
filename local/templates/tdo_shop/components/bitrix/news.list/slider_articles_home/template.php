<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
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
<div class="blog-slider-wrap blog-slider-wrap-main">
	<div class="container">
		<div class="section-head">
			<div class="section-head_item-opacity">Статьи</div>
			<div class="wrap-all_movie">
				<a href="/articles/" class="all_movie-link">Смотреть все</a>
			</div>
		</div>
		<div class="inner-blog-slider">
			<? foreach ($arResult["ITEMS"] as $arItem)
			{
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
				                     CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
				                       CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
				                       array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div class="inner-blog-slider_item">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="inner-blog-slider_item-img"
					     style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>');">

					</a>
					<div class="inner-blog-slider_item-content">
						<div class="inner-blog-slider_item-head"><?=$arItem["NAME"]?></div>
						<div class="inner-blog-slider_item-text"><?=$arItem["PREVIEW_TEXT"]?></div>
						<a class="blog-link__more" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать</a>
					</div>
				</div>
			<? } ?>
		</div>
	</div>
</div>




