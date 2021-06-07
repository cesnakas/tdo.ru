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
                                <a class="navbar-catalog__all" href="#">Все товары</a>
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
                                    <a class="navbar-catalog__card" href="#">
                                        <span class="navbar-catalog__img">
                                            <img src="<?=CFile::GetPath($arSection["UF_PICTURE_LITTLE"])?>" alt=""/>
                                        </span>
                                        <span class="navbar-catalog__name"><?=$arSection["NAME"]?></span>
                                    </a>
                                </li>
                                <?if ($count == 5) break;$count++;?>
                            <?}?>
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
                                <a href="#" class="catalog-nav__link">
                                    <span class="catalog-nav__img">
                                        <img src="<?=CFile::GetPath($arSection["UF_PICTURE_LITTLE"])?>" alt=""/>
                                    </span>
                                    <span class="catalog-nav__name"><?=$arSection["NAME"]?></span>
                                </a>
                                <button class="catalog-nav__link-mobile">
                                    <span class="catalog-nav__img">
                                        <img src="<?=CFile::GetPath($arSection["UF_PICTURE_LITTLE"])?>" alt=""/>
                                    </span>
                                    <span class="catalog-nav__name"><?=$arSection["NAME"]?></span>
                                    <span class="catalog-nav__back-ico-main">→</span>
                                </button>
                                <div class="catalog-nav__content">
                                    <div class="catalog-nav__holder">
                                        <div class="catalog-nav__title">
                                            <span class="catalog-nav__back-ico">→</span>
                                            <?=$arSection["NAME"]?>
                                            <button class="catalog-nav__btn-back"></button>
                                        </div>
                                        <div class="catalog-nav__link-group"> 
                                            <?foreach ($childCats[$mainCatId] as $subCats) {?>
                                            <div class="catalog-nav__link-item">
                                                <a href="<?= $subCats["SECTION_PAGE_URL"] ?>" class="catalog-nav__link-category">
                                                    <?= $subCats["NAME"] ?>
                                                </a>
                                            </div>
                                            <?}?>    
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?}?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div style="display:none;" class="container-fluid index-catalog-top align-middle mb-5 navbar-collapse collapse navbar-expand-md"
        id="navbarPanel">
        <div class="container">
            <div class="row">
                <?
                $intCurrentDepth = 1;
                foreach ($mainCats as &$arSection) {
                    $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                    $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete,
                        $arSectionDeleteParams);

                    $mainCatId = $arSection['ID'];
                    

                    ?>
                    <div class="col-12 col-sm-4 col-md-3 col-lg-2 col-xl-1 product__id">

                            <div class="catalog-top-iitem">
                                <div class="dropdown">
                                    <a class="d-flex flex-column catalog-top-label dropdown-toggle" href="" role="button"
                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                        <div class="block">
                                            <div class="fungre_friend"></div>
                                            <img src="<?=CFile::GetPath($arSection["UF_PICTURE_LITTLE"])?>">
                                            <div class="fungre_friend"></div>
                                        </div>
                                        <div class="catalog-top-label"><?=$arSection["NAME"]?></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                        <?
                                        foreach ($childCats[$mainCatId] as $subCats) {
                                            ?>
                                            <a class="dropdown-item" href="<?= $subCats["SECTION_PAGE_URL"] ?>"><?= $subCats["NAME"] ?></a>

                                            <?
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <?
                }
                ?>

        </div>
    </div>
</div>
<script>
    $(".catalog-nav__item:eq(0)").addClass('current');

    $(".catalog-nav__item").mouseenter(function() {
        $(".catalog-nav__item").removeClass('current');
        $(this).addClass('current');
    });

    $('.catalog-nav__link-mobile').on('click', function() {
        $('.catalog-nav').scrollTop(0);
        $(this).parent().addClass('open-level-t');
        $('.catalog-nav').addClass('nav-over');
    });

    $('.catalog-nav__btn-back').on('click', function() {
        $('.catalog-nav__item').removeClass('open-level-t');
        $('.catalog-nav').removeClass('nav-over');
    });

    const menuBtn = $('.navbar-btn'),
        menu    = $('.catalog-nav');
        
        menuBtn.on('click', function() {
            if ( $(this).hasClass('active') ) {
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
            if ( !menuBtn.is(e.target) && menuBtn.has(e.target).length === 0 && !menu.is(e.target) && menu.has(e.target).length === 0) {
                menu.removeClass('open');
                menuBtn.removeClass('active');
            };
        });

</script>
