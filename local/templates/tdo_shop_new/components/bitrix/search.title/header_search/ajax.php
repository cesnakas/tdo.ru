<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
sleep(1);
?>
<?
if(!empty($arResult["CATEGORIES"]) && $arResult['CATEGORIES_ITEMS_EXISTS']):?>
    <div class="title-search-result" style="border: 1px solid #CC0000;">
		<? foreach ($arResult["CATEGORIES"] as $category_id => $arCategory):
			?>

			<? foreach ($arCategory["ITEMS"] as $i => $arItem):

			if(strpos($arItem["URL"], '/catalog/') === false) {
				$arItem["URL"] = '/catalog/' . $arItem["URL"];
			}

			?>

			<? if($i == 0):?>

		<? else:?>

		<?endif ?>

			<? if($category_id === "all"):?>
            <div class="title-search-all" style="text-align: right"><a href="<? echo $arItem["URL"] ?>"><? echo $arItem["NAME"] ?></a></div>
		<? elseif(isset($arItem["ICON"])):?>
            <div class="title-search-item"><a href="<? echo $arItem["URL"] ?>"><img src="<? echo $arItem["ICON"] ?>"><? echo $arItem["NAME"] ?></a></div>
		<? else:?>
            <div class="title-search-more" style="text-align: right"><a href="<? echo $arItem["URL"] ?>">Остальные</a></div>
		<?endif; ?>
		<?endforeach; ?>
		<?endforeach; ?>

    </div>
    <div class="title-search-fader"></div>
<?endif;
?>