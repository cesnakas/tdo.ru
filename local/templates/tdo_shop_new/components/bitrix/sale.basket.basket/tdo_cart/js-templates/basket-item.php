<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Localization\Loc;

/**
 * @var array  $mobileColumns
 * @var array  $arParams
 * @var string $templateFolder
 */

$usePriceInAdditionalColumn = in_array('PRICE', $arParams['COLUMNS_LIST']) && $arParams['PRICE_DISPLAY_MODE'] === 'Y';
$useSumColumn               = in_array('SUM', $arParams['COLUMNS_LIST']);
$useActionColumn            = in_array('DELETE', $arParams['COLUMNS_LIST']);

$restoreColSpan = 2 + $usePriceInAdditionalColumn + $useSumColumn + $useActionColumn;

$positionClassMap = array(
	'left'   => 'basket-item-label-left',
	'center' => 'basket-item-label-center',
	'right'  => 'basket-item-label-right',
	'bottom' => 'basket-item-label-bottom',
	'middle' => 'basket-item-label-middle',
	'top'    => 'basket-item-label-top',
);

$discountPositionClass = '';
if($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
		$discountPositionClass .= isset($positionClassMap[ $pos ]) ? ' ' . $positionClassMap[ $pos ] : '';
	}
}

$labelPositionClass = '';
if(!empty($arParams['LABEL_PROP_POSITION'])) {
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
		$labelPositionClass .= isset($positionClassMap[ $pos ]) ? ' ' . $positionClassMap[ $pos ] : '';
	}
}
?>
<script id="basket-item-template" type="text/html">

    <div
            class="cart-content_item basket-items-list-item-container{{#SHOW_RESTORE}} basket-items-list-item-container-expend{{/SHOW_RESTORE}}"
            id="basket-item-{{ID}}" data-entity="basket-item" data-id="{{ID}}"
    >

            <div style="background-image: url('{{{IMAGE_URL}}}{{^IMAGE_URL}}<?=$templateFolder?>/images/no_photo.png{{/IMAGE_URL}}')" class="cart-content_item-img">

            </div>
            <div class="cart-content_item_left">
                <div class="cart-content_head">
                    <a class="cart-content_head-link" href="/catalog/{{DETAIL_PAGE_URL}}">{{NAME}}</a>
                    <div class="cart-content_head-status">В наличии на складе</div>

					<?
					if(!empty($arParams['PRODUCT_BLOCKS_ORDER'])) {
						foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName) {
							switch (trim((string)$blockName)) {
								case 'props':
									if(in_array('PROPS', $arParams['COLUMNS_LIST'])) {
										?>
                                        {{#PROPS}}
                                        <div class="basket-item-property<?=(!isset($mobileColumns['PROPS']) ? ' d-none d-sm-block' : '')?>">
                                            <div class="basket-item-property-name">
                                                {{{NAME}}}
                                            </div>
                                            <div class="basket-item-property-value"
                                                 data-entity="basket-item-property-value" data-property-code="{{CODE}}">
                                                {{{VALUE}}}
                                            </div>
                                        </div>
                                        {{/PROPS}}
										<?
									}

									break;
								case 'sku':
									?>
                                    {{#SKU_BLOCK_LIST}}
                                    {{#IS_IMAGE}}
                                    <div class="basket-item-property basket-item-property-scu-image"
                                         data-entity="basket-item-sku-block">
                                        <div class="basket-item-property-name">{{NAME}}</div>
                                        <div class="basket-item-property-value">
                                            <ul class="basket-item-scu-list">
                                                {{#SKU_VALUES_LIST}}
                                                <li class="basket-item-scu-item{{#SELECTED}} selected{{/SELECTED}}
																		{{#NOT_AVAILABLE_OFFER}} not-available{{/NOT_AVAILABLE_OFFER}}"
                                                    title="{{NAME}}"
                                                    data-entity="basket-item-sku-field"
                                                    data-initial="{{#SELECTED}}true{{/SELECTED}}{{^SELECTED}}false{{/SELECTED}}"
                                                    data-value-id="{{VALUE_ID}}"
                                                    data-sku-name="{{NAME}}"
                                                    data-property="{{PROP_CODE}}">
																				<span class="basket-item-scu-item-inner"
                                                                                      style="background-image: url({{PICT}});"></span>
                                                </li>
                                                {{/SKU_VALUES_LIST}}
                                            </ul>
                                        </div>
                                    </div>
                                    {{/IS_IMAGE}}

                                    {{^IS_IMAGE}}
                                    <div class="basket-item-property basket-item-property-scu-text"
                                         data-entity="basket-item-sku-block">
                                        <div class="basket-item-property-name">{{NAME}}</div>
                                        <div class="basket-item-property-value">
                                            <ul class="basket-item-scu-list">
                                                {{#SKU_VALUES_LIST}}
                                                <li class="basket-item-scu-item{{#SELECTED}} selected{{/SELECTED}}
																		{{#NOT_AVAILABLE_OFFER}} not-available{{/NOT_AVAILABLE_OFFER}}"
                                                    title="{{NAME}}"
                                                    data-entity="basket-item-sku-field"
                                                    data-initial="{{#SELECTED}}true{{/SELECTED}}{{^SELECTED}}false{{/SELECTED}}"
                                                    data-value-id="{{VALUE_ID}}"
                                                    data-sku-name="{{NAME}}"
                                                    data-property="{{PROP_CODE}}">
                                                    <span class="basket-item-scu-item-inner">{{NAME}}</span>
                                                </li>
                                                {{/SKU_VALUES_LIST}}
                                            </ul>
                                        </div>
                                    </div>
                                    {{/IS_IMAGE}}
                                    {{/SKU_BLOCK_LIST}}

                                    {{#HAS_SIMILAR_ITEMS}}
                                    <div class="basket-items-list-item-double" data-entity="basket-item-sku-notification">
                                        <div class="alert alert-info alert-dismissable text-center">
                                            {{#USE_FILTER}}
                                            <a href="javascript:void(0)"
                                               class="basket-items-list-item-double-anchor"
                                               data-entity="basket-item-show-similar-link">
                                                {{/USE_FILTER}}
												<?=Loc::getMessage('SBB_BASKET_ITEM_SIMILAR_P1')?>{{#USE_FILTER}}</a>{{/USE_FILTER}}
											<?=Loc::getMessage('SBB_BASKET_ITEM_SIMILAR_P2')?>
                                            {{SIMILAR_ITEMS_QUANTITY}} {{MEASURE_TEXT}}
                                            <br>
                                            <a href="javascript:void(0)" class="basket-items-list-item-double-anchor"
                                               data-entity="basket-item-merge-sku-link">
												<?=Loc::getMessage('SBB_BASKET_ITEM_SIMILAR_P3')?>
                                                {{TOTAL_SIMILAR_ITEMS_QUANTITY}} {{MEASURE_TEXT}}?
                                            </a>
                                        </div>
                                    </div>
                                    {{/HAS_SIMILAR_ITEMS}}
									<?
									break;
								case 'columns':
									?>
                                    {{#COLUMN_LIST}}
                                    {{#IS_IMAGE}}
                                    <div class="basket-item-property-custom basket-item-property-custom-photo
														{{#HIDE_MOBILE}}d-none d-sm-block{{/HIDE_MOBILE}}"
                                         data-entity="basket-item-property">
                                        <div class="basket-item-property-custom-name">{{NAME}}</div>
                                        <div class="basket-item-property-custom-value">
                                            {{#VALUE}}
                                            <span>
																	<img class="basket-item-custom-block-photo-item"
                                                                         src="{{{IMAGE_SRC}}}" data-image-index="{{INDEX}}"
                                                                         data-column-property-code="{{CODE}}">
																</span>
                                            {{/VALUE}}
                                        </div>
                                    </div>
                                    {{/IS_IMAGE}}

                                    {{#IS_TEXT}}
                                    <div class="basket-item-property-custom basket-item-property-custom-text
														{{#HIDE_MOBILE}}d-none d-sm-block{{/HIDE_MOBILE}}"
                                         data-entity="basket-item-property">
                                        <div class="basket-item-property-custom-name">{{NAME}}</div>
                                        <div class="basket-item-property-custom-value"
                                             data-column-property-code="{{CODE}}"
                                             data-entity="basket-item-property-column-value">
                                            {{VALUE}}
                                        </div>
                                    </div>
                                    {{/IS_TEXT}}

                                    {{#IS_LINK}}
                                    <div class="basket-item-property-custom basket-item-property-custom-text
														{{#HIDE_MOBILE}}d-none d-sm-block{{/HIDE_MOBILE}}"
                                         data-entity="basket-item-property">
                                        <div class="basket-item-property-custom-name">{{NAME}}</div>
                                        <div class="basket-item-property-custom-value"
                                             data-column-property-code="{{CODE}}"
                                             data-entity="basket-item-property-column-value">
                                            {{#VALUE}}
                                            {{{LINK}}}{{^IS_LAST}}<br>{{/IS_LAST}}
                                            {{/VALUE}}
                                        </div>
                                    </div>
                                    {{/IS_LINK}}
                                    {{/COLUMN_LIST}}
									<?
									break;
							}
						}
					}
					?>

                </div>


                <div class="cart-content-count-wrap">
                    <div class="cart-content-count {{#NOT_AVAILABLE}} disabled{{/NOT_AVAILABLE}}"
                         data-entity="basket-item-quantity-block"
                    >
                        <button class="cart-content-count_min" data-entity="basket-item-quantity-minus">-</button>
                        <input type="text" class="cart-content-count-input basket-item-amount-filed" value="{{QUANTITY}}"
                               {{#NOT_AVAILABLE}} disabled="disabled" {{/NOT_AVAILABLE}}
                        data-value="{{QUANTITY}}" data-entity="basket-item-quantity-field"
                        id="basket-item-quantity-{{ID}}">

                        <button class="cart-content-count_plus" data-entity="basket-item-quantity-plus">+</button>
                    </div>
                </div>
            </div>


            <div class="cart-content_price-wrap cart-content_price-factory">
                <div class="cart-content_price-head">Цена</div>
                <div class="cart-content_price cart-content_price-gray">{{{PRICE_FORMATED}}}</div>
            </div>

            <div class="cart-content_price-wrap cart-content_price-factory">
                <div class="cart-content_price-head">Стоимость</div>
                <div class="cart-content_price cart-content_price-red">{{{SUM_PRICE_FORMATED}}}</div>
                {{#PRICE_SAVE}}
                <div class="cart-content_price cart-content_price-old">{{{PRICE_FORMATED_OLD}}}</div>
                {{/PRICE_SAVE}}
            </div>

            <div class="cart-content_del">
                <a class="cart-content_del-item" href="javascript:void(0);" data-entity="basket-item-delete"></a>
            </div>
        </div>


</script>