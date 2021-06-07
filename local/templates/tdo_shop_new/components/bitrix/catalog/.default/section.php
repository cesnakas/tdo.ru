<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$APPLICATION->SetPageProperty("ISELEMENT_INCATALG","Y");




$this->setFrameMode(true);
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");

if(!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '') {
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
}
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar        = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter         = ($arParams['USE_FILTER'] == 'Y');

if($isFilter) {
	$arFilter = array(
		"IBLOCK_ID"     => $arParams["IBLOCK_ID"],
		"ACTIVE"        => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if(0 < intval($arResult["VARIABLES"]["SECTION_ID"])) {
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	} elseif('' != $arResult["VARIABLES"]["SECTION_CODE"]) {
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];
	}

	$obCache = new CPHPCache();
	if($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog")) {
		$arCurSection = $obCache->GetVars();
	} elseif($obCache->StartDataCache()) {
		$arCurSection = array();
		if(Loader::includeModule("iblock")) {
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE")) {
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if($arCurSection = $dbRes->Fetch()) {
					$CACHE_MANAGER->RegisterTag("iblock_id_" . $arParams["IBLOCK_ID"]);
				}

				$CACHE_MANAGER->EndTagCache();
			} else {
				if(!$arCurSection = $dbRes->Fetch()) {
					$arCurSection = array();
				}
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if(!isset($arCurSection)) {
		$arCurSection = array();
	}
}


$SECTION_ID  = $arCurSection['ID'];
$hasSections = false;
//дерево подразделов для раздела

$rsParentSection = CIBlockSection::GetByID($SECTION_ID);
if($arParentSection = $rsParentSection->GetNext()) {
	$arFilter = array(
		'IBLOCK_ID'     => $arParentSection['IBLOCK_ID'],
		'>LEFT_MARGIN'  => $arParentSection['LEFT_MARGIN'],
		'<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'],
		'>DEPTH_LEVEL'  => $arParentSection['DEPTH_LEVEL'],
	); // выберет потомков без учета активности

	$rsSect   = CIBlockSection::GetList(
		array(
			'left_margin' => 'asc',
		),
		$arFilter,
		false,
		["nTopCount" => 1]
	);
	while ($arSect = $rsSect->GetNext()) {
		// получаем подразделы
		$hasSections = true;
		break;
	}
}

if($hasSections && isset($_GET['CATSHOW']) && !empty($_GET['CATSHOW'])) {
	include($_SERVER["DOCUMENT_ROOT"] . "/" . $this->GetFolder() . "/section_cats.php");
} else {
	include($_SERVER["DOCUMENT_ROOT"] . "/" . $this->GetFolder() . "/section_vertical.php");
}





