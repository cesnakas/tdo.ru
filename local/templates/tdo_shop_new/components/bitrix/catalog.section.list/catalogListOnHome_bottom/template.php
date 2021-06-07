<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

$mainCats = [];
$childCats = [];
$mainCatId = 0;
foreach ($arResult['SECTIONS'] as &$arSection) {
    switch ($arSection['RELATIVE_DEPTH_LEVEL']) {
        case 1:
            $mainCats[] = $arSection;
            $mainCatId = $arSection['ID'];
            break;
        default:
            $childCats[$mainCatId][] = $arSection;
            break;
    }

}

?>


<?
$intCurrentDepth = 1;
foreach ($mainCats as &$arSection) {
    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete,
        $arSectionDeleteParams);

    $mainCatId = $arSection['ID'];


    ?>
    <div class="footer-menu-item"><a href="<?= $arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?></a></div>

    <?
}
?>

