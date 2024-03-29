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

if (empty($arResult)) {
    return;
}
?>
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <? foreach ($arResult as $itemIdex => $arItem):
     ?>
        <? if ($arItem["DEPTH_LEVEL"] == "1"): ?>
            <li class="nav-item">
                <a class="nav-link
        <? if ($arItem["SELECTED"] == "1") { ?>
        active
    <? } ?>
        " aria-current="page"
                   href="<?= htmlspecialcharsbx($arItem["LINK"]) ?>"><?= htmlspecialcharsbx($arItem["TEXT"]) ?></a>
            </li>
        <? endif ?>
    <? endforeach; ?>
</ul>
