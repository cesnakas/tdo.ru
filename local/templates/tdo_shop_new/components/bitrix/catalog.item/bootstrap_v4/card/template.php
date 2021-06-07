<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain                $APPLICATION
 * @var array                   $arParams
 * @var array                   $item
 * @var array                   $actualItem
 * @var array                   $minOffer
 * @var array                   $itemIds
 * @var array                   $price
 * @var array                   $measureRatio
 * @var bool                    $haveOffers
 * @var bool                    $showSubscribe
 * @var array                   $morePhoto
 * @var bool                    $showSlider
 * @var bool                    $itemHasDetailUrl
 * @var string                  $imgTitle
 * @var string                  $productTitle
 * @var string                  $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>

<div class="product-item">
    <a class="product-item-image-wrapper" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$imgTitle?>"
       data-entity="image-wrapper">
		<span class="product-item-image-slider-slide-container slide" id="<?=$itemIds['PICT_SLIDER']?>"
			<?=($showSlider ? '' : 'style="display: none;"')?>
			data-slider-interval="<?=$arParams['SLIDER_INTERVAL']?>" data-slider-wrap="true">
			<?
			?>
		</span>
		<span class="product-item-image-original" id="<?=$itemIds['PICT']?>"
              style="background-image: url('<?=$item['PREVIEW_PICTURE']['SRC']?>'); <?=($showSlider ? 'display: none;' : '')?>"></span>
		<?
		if($item['SECOND_PICT']) {
			$bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC'];
			?>
            <span class="product-item-image-alternative" id="<?=$itemIds['SECOND_PICT']?>"
                  style="background-image: url('<?=$bgImage?>'); <?=($showSlider ? 'display: none;' : '')?>"></span>
			<?
		}


		?>
    </a>
	<?
	if(!empty($arParams['PRODUCT_BLOCKS_ORDER'])) {
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName) {
			switch ($blockName) {
				case 'price': ?>
                    <div class="product-item-info-container product-item-price-container" data-entity="price-block">
						<?
						if($arParams['SHOW_OLD_PRICE'] === 'Y') {
							?>
                            <span class="product-item-price-old" id="<?=$itemIds['PRICE_OLD']?>"
								<?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
								<?=$price['PRINT_RATIO_BASE_PRICE']?>
							</span>&nbsp;
							<?
						}
						?>
                        <span class="product-item-price-current" id="<?=$itemIds['PRICE']?>">
							<?
							if(!empty($price)) {
								if($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers) {
									echo Loc::getMessage(
										'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
										array(
											'#PRICE#' => $price['PRINT_RATIO_PRICE'],
											'#VALUE#' => $measureRatio,
											'#UNIT#'  => $minOffer['ITEM_MEASURE']['TITLE'],
										)
									);
								} else {
									echo $price['PRINT_RATIO_PRICE'];
								}
							}
							?>
						</span>
                    </div>
					<?
					break;

				case 'buttons':
					?>
                    <div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
						<?
						if(!$haveOffers) {
							if($actualItem['CAN_BUY']) {
								?>
                                <div class="product-item-button-container" id="<?=$itemIds['BASKET_ACTIONS']?>">
                                    <button class="btn btn-primary <?=$buttonSizeClass?>" id="<?=$itemIds['BUY_LINK']?>"
                                            href="javascript:void(0)" rel="nofollow">
										<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
                                    </button>
                                </div>
								<?
							} else {
								?>
                                <div class="product-item-button-container">
									<?
									if($showSubscribe) {
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID'         => $actualItem['ID'],
												'BUTTON_ID'          => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS'       => 'btn btn-primary ' . $buttonSizeClass,
												'DEFAULT_DISPLAY'    => true,
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
                                    <button class="btn btn-link <?=$buttonSizeClass?>"
                                            id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow">
										<?=$arParams['MESS_NOT_AVAILABLE']?>
                                    </button>
                                </div>
								<?
							}
						} else {
							if($arParams['PRODUCT_DISPLAY_MODE'] === 'Y') {
								?>
                                <div class="product-item-button-container">
									<?
									if($showSubscribe) {
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID'         => $item['ID'],
												'BUTTON_ID'          => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS'       => 'btn btn-primary ' . $buttonSizeClass,
												'DEFAULT_DISPLAY'    => !$actualItem['CAN_BUY'],
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
                                    <button class="btn btn-link <?=$buttonSizeClass?>"
                                            id="<?=$itemIds['NOT_AVAILABLE_MESS']?>" href="javascript:void(0)" rel="nofollow"
										<?=($actualItem['CAN_BUY'] ? 'style="display: none;"' : '')?>>
										<?=$arParams['MESS_NOT_AVAILABLE']?>
                                    </button>
                                    <div id="<?=$itemIds['BASKET_ACTIONS']?>" <?=($actualItem['CAN_BUY'] ? '' : 'style="display: none;"')?>>
                                        <button class="btn btn-primary <?=$buttonSizeClass?>" id="<?=$itemIds['BUY_LINK']?>"
                                                href="javascript:void(0)" rel="nofollow">
											<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
                                        </button>
                                    </div>
                                </div>
								<?
							} else {
								?>
                                <div class="product-item-button-container">
                                    <button class="btn btn-primary <?=$buttonSizeClass?>" href="<?=$item['DETAIL_PAGE_URL']?>">
										<?=$arParams['MESS_BTN_DETAIL']?>
                                    </button>
                                </div>
								<?
							}
						}
						?>
                    </div>
					<?
					break;

			}
		}
	}

	?>
</div>