<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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
<div class="container-fluid index-brands-container text-center mb-4">
    <div class="container">
        <div class="heading-line heading-line--brands">
            <h4>Производители оборудования</h4>
            <a href="/brands/" class="link-prod">Все производители</a>
        </div>
        <div class="brands-parent" style="position: relative;">
            <div class="brands-carousel owl-carousel">

                <? foreach ($arResult["ITEMS"] as $arItem) { ?>
                    <?
                    $image = CIntranetUtils::InitImage($arItem["PREVIEW_PICTURE"]["ID"], 75, 75);
                    $imageSrc = $image['CACHE']['src'];
                    ?>
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" >
                        <div class="brands-iitem"><img style="max-height: 125px" alt="<?= $arItem["NAME"] ?>" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"></div>
                    </a>
                <? } ?>

            </div>
        </div>
    </div>
</div>




