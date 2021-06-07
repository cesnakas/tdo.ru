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

<form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="/about/jobs/" method="get">
    <div class="big-search-wrap">

        <label for="">Найти вакансию</label>

		<? foreach ($arResult["ITEMS"] as $arItem):
			if(array_key_exists("HIDDEN", $arItem)):
				echo $arItem["INPUT"];
			endif;
		endforeach; ?>
		<? foreach ($arResult["ITEMS"] as $arItem): ?>
			<? if(!array_key_exists("HIDDEN", $arItem)): ?>
                <input type="text" class="big-input" placeholder="Например, Специалист" name="<?=$arItem['INPUT_NAME']?>" value="<?=$arItem['INPUT_VALUE']?>">
			<? endif ?>
		<? endforeach; ?>


		<?
		/*
		<input type="submit" name="set_filter" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" />
		<input type="submit" name="del_filter" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" />
		 */ ?>
        <input type="hidden" name="set_filter" value="Y" />

        <button class="big-search_btn"></button>

    </div>

    <div class="wrap-work-trig">
		<?
		global $arrFilter, $preFilter;

		foreach ($arResult['arrSection'] as $section) {
			$checked = '';
		    if ($section['select']) {
		        $checked = "checked='checked'";
		    }
			?><label class="work-trig_item__wrap">
                <input type="checkbox" value="<?=$section['ID']?>" <?=$checked?> name="SECTION_ID[]">
                <span class="work-trig_item"><?=$section['NAME']?></span>
            </label><?
		}
		?>

    </div>
</form>
