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

<div class="navbar-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="navbar-wrap__content">
                    <button class="navbar-btn">
                        <span class="navbar-btn__name">Каталог</span>
                        <span class="navbar-btn__icon"></span>
                    </button>
                    <div class="navbar-wrap__catalog">
                        <ul class="navbar-catalog">
                            <li class="navbar-catalog__item navbar-catalog__item--all">
                                <a class="navbar-catalog__all      <? if ($GLOBALS["APPLICATION"]->GetCurDir() == "/catalog/") { ?>
                                    selected
                            <? } ?>" href="/catalog/">Все товары</a>
                            </li>
                            <?
                            $intCurrentDepth = 1;
                            $count = 1;
                            foreach ($mainCats as &$arSection) {
                                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete,
                                    $arSectionDeleteParams);

                                $mainCatId = $arSection['ID'];

                                ?>
                                <li class="navbar-catalog__item">
                                    <a class="navbar-catalog__card
                                        <? if ($arSection["SECTION_PAGE_URL"] == $GLOBALS["APPLICATION"]->GetCurDir()) { ?>
                                        selected
                                        <? } ?>
                                         " href="<?= $arSection["SECTION_PAGE_URL"] ?>?CATSHOW=Y">
                                        <span class="navbar-catalog__img">
                                            <img src="<?= CFile::GetPath($arSection["UF_PICTURE_LITTLE"]) ?>" alt=""/>
                                        </span>
                                        <span class="navbar-catalog__name"><?= $arSection["NAME"] ?></span>
                                    </a>
                                </li>
                                <? if ($count == 5) break;
                                $count++; ?>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="catalog-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="catalog-nav__list">
                        <?
                        $intCurrentDepth = 1;
                        foreach ($mainCats as &$arSection) {
                            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete,
                                $arSectionDeleteParams);

                            $mainCatId = $arSection['ID'];
                            ?>
                            <li class="catalog-nav__item">
                                <a href="<?= $arSection["SECTION_PAGE_URL"] ?>?CATSHOW=Y" class="catalog-nav__link">
                                    <span class="catalog-nav__img">
                                        <img src="<?= CFile::GetPath($arSection["UF_PICTURE_LITTLE"]) ?>" alt=""/>
                                    </span>
                                    <span class="catalog-nav__name"><?= $arSection["NAME"] ?></span>
                                </a>
                                <button class="catalog-nav__link-mobile">
                                    <span class="catalog-nav__img">
                                        <img src="<?= CFile::GetPath($arSection["UF_PICTURE_LITTLE"]) ?>" alt=""/>
                                    </span>
                                    <span class="catalog-nav__name"><?= $arSection["NAME"] ?></span>
                                    <span class="catalog-nav__back-ico-main">→</span>
                                </button>
                                <div class="catalog-nav__content">
                                    <div class="catalog-nav__holder">
                                        <div class="catalog-nav__title">
                                            <span class="catalog-nav__back-ico">→</span>
                                            <?= $arSection["NAME"] ?>
                                            <button class="catalog-nav__btn-back"></button>
                                        </div>
                                        <div class="catalog-nav__link-group">
                                            <? foreach ($childCats[$mainCatId] as $subCats) { ?>
                                                <div class="catalog-nav__link-item">
                                                    <a href="<?= $subCats["SECTION_PAGE_URL"] ?>"
                                                       class="catalog-nav__link-category">
                                                        <?= $subCats["NAME"] ?>
                                                    </a>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <? } ?>
                        <li class="catalog-nav__item">
                            <a href="/catalogsale/" class="catalog-nav__link">
                                    <span class="catalog-nav__img">
                                        <img src="/local/templates/tdo_shop_new/new_design/img/hot-sale(1)1.svg" alt=""/>
                                    </span>
                                <span class="catalog-nav__name">Распродажа</span>
                            </a>

                                <a class="catalog-nav__link-mobile"
                                        onclick="document.location.href='/catalogsale/'; return false;">
                                    <span class="catalog-nav__img">
                                        <img src="/local/templates/tdo_shop_new/new_design/img/hot-sale(1)1.svg" alt=""/>
                                    </span>
                                    <span class="catalog-nav__name">Распродажа</span>

                                </a>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(".catalog-nav__item:eq(0)").addClass('current');

    $(".catalog-nav__item").mouseenter(function () {
        $(".catalog-nav__item").removeClass('current');
        $(this).addClass('current');
    });

    $('button.catalog-nav__link-mobile').on('click', function () {
        $('.catalog-nav').scrollTop(0);
        $(this).parent().addClass('open-level-t');
        $('.catalog-nav').addClass('nav-over');
    });

    $('.catalog-nav__btn-back').on('click', function () {
        $('.catalog-nav__item').removeClass('open-level-t');
        $('.catalog-nav').removeClass('nav-over');
    });

    const menuBtn = $('.navbar-btn'),
        menu = $('.catalog-nav');

    menuBtn.on('click', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            menu.removeClass('open');
            $('body').removeClass('fixed-body');
        } else {
            $(this).addClass('active');
            menu.addClass('open');
            $('body').addClass('fixed-body');
        }
    });

    $(document).click(function (e) {
        if (!menuBtn.is(e.target) && menuBtn.has(e.target).length === 0 && !menu.is(e.target) && menu.has(e.target).length === 0) {
            menu.removeClass('open');
            menuBtn.removeClass('active');
        }
        ;
    });

</script>
