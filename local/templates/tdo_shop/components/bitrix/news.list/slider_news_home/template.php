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
<div class="main-news">
	<div class="container">
		<div class="section-head">
			<div class="section-head_item-opacity">Новости</div>
			<div class="wrap-all_movie">
				<a href="/news/" class="all_movie-link">Смотреть все</a>
			</div>
		</div>
		<div class="main-news-slider">
			<? foreach ($arResult["ITEMS"] as $arItem)
			{
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
				                     CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
				                       CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
				                       array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));


				$ACTIVE_FROM = $arItem["ACTIVE_FROM"];
				$now         = new DateTime($ACTIVE_FROM);
				$ACTIVE_FROM = $now->format('d.m.Y');

				?>

				<div class="main-news-slider__item">
					<div class="main-news-slider-inner">
						<div style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>')"
						     class="main-news-slider__image">
						</div>
						<div class="main-news-slider__content">
							<div class="main-news-slider__date">
								<?=$ACTIVE_FROM?>
							</div>
							<div class="main-news-slider__head"><?=$arItem["NAME"]?></div>
							<div class="main-news-slider__text"><?=$arItem["PREVIEW_TEXT"]?></div>
							<a class="blog-link__more" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать</a>
						</div>
					</div>
				</div>
			<? } ?>
		</div>
	</div>
</div>




