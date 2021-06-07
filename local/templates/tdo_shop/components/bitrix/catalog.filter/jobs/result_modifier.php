<?php


$request = \Bitrix\Main\Context::getCurrent()->getRequest();
$filterSection = $request->get('SECTION_ID');

$arrFilter  = array("IBLOCK_ID" => 7, "ACTIVE" => "Y");
$arOrder    = array("SORT" => "ASC");
$rsSections = CIBlockSection::GetList(
	$arOrder,
	$arrFilter,
	false,
	array("ID", "IBLOCK_ID", "IBLOCK_SECTION_ID", "NAME", "DESCRIPTION", "UF_*")
);


$arSections = [];
while ($arSection = $rsSections->Fetch()) {
	$arSection['select'] = false;
	if (in_array($arSection['ID'], $filterSection)) {
		$arSection['select'] = true;
	}
	$arSections[] = $arSection;
}

$arResult['arrSection'] = $arSections;




