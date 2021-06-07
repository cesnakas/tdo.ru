<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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


<div class="container index-sections mb-5">
    <div class="row row-main">
        <div class="col-12 col-md-7 col-main index-sections-item">
            <div class="row row-inner">
                <div class="col-12">
                    <div class="section-carousel owl-carousel owl-theme">
                        <?
                        foreach ($arResult["ITEMS"] as $ITEM) {
                            ?>
                            <div class="index-section-iitem">
                                <a href="<?=$ITEM["PROPERTIES"]['HREF']["VALUE"]?>">
                                    <img src="<?= $ITEM["DETAIL_PICTURE"]["SRC"] ?>">
                                </a>
                            </div>
                            <?
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 col-main">
            <div class="row row-inner">
                <div class="col-12">
                    <div class="index-sections-small-wrap">
                        <div class="index-sections-item-small">
                            <a class="index-sections-link" href="/serv/redemption-of-trading-equipment/">
                                <img src="/local/templates/tdo_shop_new/new_design/img/section2.png">
                                <div class="index-section-label">
                                    <div class="section-label-icon d-flex align-items-center"><img
                                                src="/local/templates/tdo_shop_new/new_design/img/sec-ico1.png">
                                    </div>
                                    <div class="section-label-text">Выкуп оборудования</div>
                                </div>
                            </a>
                        </div>
                        <div class="index-sections-item-small">
                            <a class="index-sections-link" href="/serv/rental-of-commercial-equipment/">
                                <img src="/local/templates/tdo_shop_new/new_design/img/section3.png">
                                <div class="index-section-label">
                                    <div class="section-label-icon d-flex align-items-center"><img
                                                src="/local/templates/tdo_shop_new/new_design/img/sec-ico2.png">
                                    </div>
                                    <div class="section-label-text">Аренда оборудования</div>
                                </div>
                            </a>
                        </div>
                        <div class="index-sections-item-small">
                            <a class="index-sections-link" href="/serv/">
                                <img src="/local/templates/tdo_shop_new/new_design/img/section4.png">
                                <div class="index-section-label">
                                    <div class="section-label-icon d-flex align-items-center"><img
                                                src="/local/templates/tdo_shop_new/new_design/img/sec-ico3.png">
                                    </div>
                                    <div class="section-label-text">Сервис и обслуживание</div>
                                </div>
                            </a>
                        </div>
                        <div class="index-sections-item-small">
                            <a class="index-sections-link" href="/serv/turnkey-design-of-shops-and-restaurants/">
                                <img src="/local/templates/tdo_shop_new/new_design/img/section5.png">
                                <div class="index-section-label">
                                    <div class="section-label-icon d-flex align-items-center"><img
                                                src="/local/templates/tdo_shop_new/new_design/img/sec-ico4.png">
                                    </div>
                                    <div class="section-label-text">Проектирование магазинов</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
