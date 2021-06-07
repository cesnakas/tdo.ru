<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$ITEMS      = &$arResult['ITEMS'];
$sectionIds = [];

foreach ($ITEMS as &$ITEM) {
	$sectionIds[] = $ITEM['IBLOCK_SECTION_ID'];
}

$sectionIds = array_unique($sectionIds);

$arFilter = array(
	'IBLOCK_ID' => $arParams['IBLOCK_ID'],
	'ID'        => $sectionIds,
	'ACTIVE'    => "Y",
);

$arOrder    = array("SORT" => "ASC");
$rsSections = CIBlockSection::GetList(
	$arOrder,
	$arFilter,
	false,
	array("ID", "IBLOCK_ID", "IBLOCK_SECTION_ID", "NAME", 'SECTION_PAGE_URL')
);
$arSection  = [];

while ($arSection = $rsSections->Fetch()) {
//	$arSection['SECTION_PAGE_URL']  = \CIBlock::ReplaceDetailUrl($section['SECTION_PAGE_URL'], $section, true, 'S');

	// FIX: SECTION_CODE_PATH
	$nav = CIBlockSection::GetNavChain($arSection['IBLOCK_ID'], $arSection['~IBLOCK_SECTION_ID']);
	$arNavi=array();
	while($arNavItem = $nav->Fetch()) {
		$arNavi[]=$arNavItem['CODE'];
	}
	$arNavi[]=$arSection['CODE'];
	$arSection['DETAIL_PAGE_URL']="/".implode("/", $arNavi)."/";

	$arSections[ $arSection['ID'] ] = $arSection;
}

foreach ($ITEMS as &$ITEM) {
	$ITEM['SECTION']['DATA'] = $arSections[ $ITEM['IBLOCK_SECTION_ID'] ];

	$ITEM['SECTION_CODE'] = $ITEM['SECTION']['DATA']['CODE'];
	$ITEM['ELEMENT_CODE'] = $ITEM['CODE'];

	$ITEM['DETAIL_PAGE_URL'] = \CIBlock::ReplaceDetailUrl($arParams['DETAIL_URL'], $ITEM);
}



