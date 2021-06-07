<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">

    <div class="cart-bottom_right-content">

        <div class="sale-kod form">
            <input placeholder="У меня есть промокод" type="text" class="sale-kod_input" data-entity="basket-coupon-input">
            <button class="basket-coupon-block-coupon-btn sale-kod_btn">Применить</button>
        </div>
        <div class="basket-coupon-alert-section">
            <div class="basket-coupon-alert-inner">
                {{#COUPON_LIST}}
                <div class="basket-coupon-alert text-{{CLASS}}">
						<span class="basket-coupon-text">
							<strong>{{COUPON}}</strong> - <?=Loc::getMessage('SBB_COUPON')?> {{JS_CHECK_CODE}}
							{{#DISCOUNT_NAME}}({{DISCOUNT_NAME}}){{/DISCOUNT_NAME}}
						</span>
                    <span class="close-link" data-entity="basket-coupon-delete" data-coupon="{{COUPON}}">
							<?=Loc::getMessage('SBB_DELETE')?>
						</span>
                </div>
                {{/COUPON_LIST}}
            </div>
        </div>

        {{#WEIGHT_FORMATED}}
        <div class="cart-bottom_right-content_item">
            <span>Вес заказа</span>
            <span>{{{WEIGHT_FORMATED}}}</span>
        </div>
        {{/WEIGHT_FORMATED}}
<!--        <div class="cart-bottom_right-content_item">
            <span>Товары (2)</span>
            <span>185 000 ₽</span>
        </div>-->
        {{#DISCOUNT_PRICE_FORMATED}}
        <div class="cart-bottom_right-content_item">
            <span>Скидка на товары</span>
            <span class="text-red">−{{{DISCOUNT_PRICE_FORMATED}}}</span>
        </div>
        {{/DISCOUNT_PRICE_FORMATED}}
        <div class="cart-bottom_right-content_item cart-bottom_right-content_item-bold">
            <span>Итог:</span>
            <span data-entity="basket-total-price">{{{PRICE_FORMATED}}}</span>
        </div>


        <?
   /*
        ?>
        <div class="basket-checkout-block basket-checkout-block-btn">
            <button class="btn btn-lg btn-primary basket-btn-checkout{{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}"
                    data-entity="basket-checkout-button">
			    <?=Loc::getMessage('SBB_ORDER')?>
            </button>
        </div>
<?
//*/
?>

    </div>


</script>