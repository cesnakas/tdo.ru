<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */


$PRODUCT_PREVIEW = $item['PRODUCT_PREVIEW']['SRC'];
if (empty($PRODUCT_PREVIEW)) {
    $PRODUCT_PREVIEW = $this->GetFolder() . '/images/line-empty.png';
}

//not available section
$noAvailableText = '';
if (!$haveOffers) {
    if (!$actualItem['CAN_BUY']) {
        $noAvailableText = '<div class="goods_item-var_cat">Наличие уточняйте у менеджера</div>';
    }
}

$section = $actualItem['SECTION']['DATA'];
?>



<?
// Выведем цену типа $PRICE_TYPE_ID товара с кодом $item['ID']
$PRICE_TYPE_ID = '5';
$db_res = CPrice::GetList(
    array(),
    array(
            "PRODUCT_ID" => $item['ID'],
            "CATALOG_GROUP_ID" => $PRICE_TYPE_ID
        )
    );
if ($ar_res = $db_res->Fetch())
{
    $old_price = CurrencyFormat($ar_res["PRICE"], $ar_res["CURRENCY"]);
}
?>





<div class="catalog-center-iitem">
    <a style="text-decoration: none" href="<?=$item["DETAIL_PAGE_URL"]?>">
				<span class="catalog-center-header">
					<?if($item["PROPERTIES"]["CML2_TRAITS"]["VALUE"][2]):?>
                        <div class="article">Код товара: <?=$item["PROPERTIES"]["CML2_TRAITS"]["VALUE"][2]?></div>
                    <?endif;?>
					
                    <div class="like-icon"><img src="/local/templates/tdo_shop_new/new_design/img/like.png"></div>
					<div class="chart-icon"><img src="/local/templates/tdo_shop_new/new_design/img/chart.png"></div>
				</span>
    <div class="catalog-center-img-wrap">
        <img id="<?= $itemIds['PICT'] ?>" src="<?= $PRODUCT_PREVIEW ?>">
    </div>
    <div class="catalog-center-item-section"><?= $section['NAME'] ?></div>
    <div class="catalog-center-item-name" style="min-height: 65px;"><a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $productTitle ?></a></div>
    <?= $noAvailableText ?>

    <?
    if (!$haveOffers) {
        if ($actualItem['CAN_BUY']) {
            ?>


            <div class="catalog-center-item-price <?if($old_price){echo "item-price-flex";}?>" id="<?= $itemIds['PRICE'] ?>">
                <div class="<?if($old_price){echo "big-red-price";}?>"><?= $price['PRINT_RATIO_PRICE'] ?></div>
                <?if($old_price):?>
                    <div class="old_price_block"><?=$old_price;?></div>
                <?endif;?>
            </div>
            


            <a id="<?= $itemIds['BASKET_ACTIONS'] ?>" class="btn catalog-center-item-btn js-add-to-cart"
               href="javascript:void(0);"
               data-pid="<?= $item['ID'] ?>"
               data-img="<?= $item['PRODUCT_PREVIEW']['SRC'] ?>"
            >В корзину</a>
            <a class="link-kards" data-fancybox=""
               data-src="#pay-click_<?= $item['ID'] ?>"
               href="javascript:void(0);">Купить в один клик</a>
            <?
        }
    }
    ?>


        <div id="pay-click_<?= $item['ID'] ?>" class="pay-click modal js-pay-click" style="display: none;">
            <div class="call-me-inner">
                <div class="pay-me-left">
                    <div class="pay-me-left_title"><?=$item['NAME']?></div>
                    <div style="background-image: url('<?= $item['PRODUCT_PREVIEW']['SRC'] ?>')"
                         class="pay-me-left__image">
                    </div>
                    <div class="pay-me__price"><?=$price['PRINT_RATIO_PRICE']?></div>
                </div>
                <form class="call-me-content listForm" action="/ajax/ajax.php" method="post">
                    <input type="hidden" name="prod_name" value="<?=$item['NAME']?>">

                    <div class="modal-head">Купить в 1 клик</div>
                    <input class="input" type="text" name="username" placeholder="Ваше имя *" required>
                    <input class="input" type="text" name="phone" placeholder="Контактный телефон *"
                           required>
                    <textarea placeholder="Комментарий к заказу" name="comment"></textarea>
                    <button class="btn big-btn btn-gray">Отправить заказ</button>

                    <div class="polit-conf">
                        <input id="<?= $item['ID'] ?>" class="checkbox-custom-hidd" type="checkbox" name="agree" required>
                        <label class="checkbox-custom" for="<?= $item['ID'] ?>"></label>
                        <label for="<?= $item['ID'] ?>">Отправляя свои данные, вы соглашаетесь <br><a href="/about/politika-konfidencialnosti/">Политикой
                                конфиденциальности</a></label>
                    </div>
                </form>
            </div>
        </div>

</div>