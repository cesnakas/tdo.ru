<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
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

if($haveOffers)
{
	$showDisplayProps = !empty($item['DISPLAY_PROPERTIES']);
	$showProductProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];
	$showPropsBlock   = $showDisplayProps || $showProductProps;
	$showSkuBlock     = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && !empty($item['OFFERS_PROP']);
} else
{
	$showDisplayProps = !empty($item['DISPLAY_PROPERTIES']);
	$showProductProps = $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']);
	$showPropsBlock   = $showDisplayProps || $showProductProps;
	$showSkuBlock     = false;
}
?>

<?
//not available section
$noAvailableText = '<div class="goods_item-var_cat"></div>';
if(!$haveOffers)
{
	if(!$actualItem['CAN_BUY'])
	{
		$noAvailableText = '<div class="goods_item_green-text">Наличие уточняйте у менеджера</div>';
	}
}

?>

<div class="sort-goods-v2_item-left" data-entity="image-wrapper" id="<?=$itemIds['PICT_SLIDER']?>">

	<a href="<?=$item['DETAIL_PAGE_URL']?>" style="background-image: url('<?=$item['PRODUCT_PREVIEW']['SRC']?>')" class="sort-goods-v2-img"
	     id="<?=$itemIds['SECOND_PICT']?>">
	</a>
	<a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>" class="sort-goods-v2_head"><?=$productTitle?></a>
	<? /*<div class="sort-goods-v2_desc">(в комплекте 56339)</div>*/ ?>

	<?=$noAvailableText?>

</div>

<div class="sort-goods-v2_item-right">
	<div class="sort-goods-v2_price" data-entity="price-block">
		<?
		if(!empty($price))
		{
			//if sale
			if($price['RATIO_PRICE'] <> $price['RATIO_BASE_PRICE'])
			{
				?>
				<div class="cart-content_price cart-content_price-red" id="<?=$itemIds['PRICE']?>">
					<?
					if($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
					{
						echo Loc::getMessage(
							'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
							array(
								'#PRICE#' => $price['PRINT_RATIO_PRICE'],
								'#VALUE#' => $measureRatio,
								'#UNIT#'  => $minOffer['ITEM_MEASURE']['TITLE'],
							)
						);
					} else
					{
						echo $price['PRINT_RATIO_PRICE'];
					}
					?>
				</div>

				<div class="cart-content_price cart-content_price-old" id="<?=$itemIds['PRICE_OLD']?>"
					<?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
					<?=$price['PRINT_RATIO_BASE_PRICE']?>
				</div>&nbsp;

			<? } else { ?>
				<div class="cart-content_price" id="<?=$itemIds['PRICE']?>"><?
					if($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
					{
						echo Loc::getMessage(
							'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
							array(
								'#PRICE#' => $price['PRINT_RATIO_PRICE'],
								'#VALUE#' => $measureRatio,
								'#UNIT#'  => $minOffer['ITEM_MEASURE']['TITLE'],
							)
						);
					} else
					{
						echo $price['PRINT_RATIO_PRICE'];
					}
					?></div>
			<? } ?>
		<? } ?>

	</div>

	<a class="goods_item_name" href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>"><?=$productTitle?></a>

	<?=$noAvailableText?>

	<?
	/*
	 ?>
	<div class="sort-goods-v2_stick">
		<a href="#" class="sort-goods-v2_stick-item sort-goods-v2_heart"></a>
		<a href="#" class="sort-goods-v2_stick-item sort-goods-v2_rait"></a>
	</div>
	<?
	//*/
	?>
	<div class="product-item-info-container" data-entity="buttons-block">
		<?
		if(!$haveOffers)
		{
			if($actualItem['CAN_BUY'])
			{
				?>

				<div
						class="product-item-button-container"
						id="<?=$itemIds['BASKET_ACTIONS']?>"
				>
					<?
					/*
					 ?>
					 <a
							id="<?=$itemIds['BUY_LINK']?>"
							class="sort-goods-v2_btn"
							href="javascript:void(0)"
							rel="nofollow"
					>
						<?=$arParams['MESS_BTN_BUY']?>
					</a>
					<?
//					 */
					?>

					<a class="sort-goods-v2_btn js-add-to-cart"
					   href="javascript:void(0);"
					   data-pid="<?=$item['ID']?>"
					   data-img="<?=$item['PRODUCT_PREVIEW']['SRC']?>"
					>В корзину</a>

				</div>
				<?
			}else{
				?>
				<a data-fancybox=""
				   data-src="#pay-under-order-<?=$item['ID']?>"
				   href="javascript:void(0);"
				   class="sort-goods-v2_btn"
				   rel="nofollow"
				>Под заказ</a>
				<div id="pay-under-order-<?=$item['ID']?>" class="pay-click modal js-pay-under-order" style="display: none;">
					<div class="call-me-inner">
						<div class="pay-me-left">
							<div class="pay-me-left_title"><?=$productTitle?></div>
							<div style="background-image: url('<?=$item['PRODUCT_PREVIEW']['SRC']?>')"
							     class="pay-me-left__image">

							</div>
							<div class="pay-me__price"><?=$price['PRINT_RATIO_PRICE']?></div>
						</div>
						<form class="call-me-content js-pay-under-order-form" action="/ajax/ajax.php" method="post">
							<input type="hidden" name="prod_name" value="<?=$productTitle?>">

							<div class="modal-head">Под заказ</div>
							<input class="input" type="text" name="username" placeholder="Ваше имя *" required>
							<input class="input" type="text" name="phone" placeholder="Контактный телефон *"
							       required>
							<textarea placeholder="Комментарий к заказу" name="comment"></textarea>
							<button class="btn big-btn btn-gray">Отправить заказ</button>

							<div class="polit-conf">
								<input id="polit44-<?=$item['ID']?>" class="checkbox-custom-hidd" type="checkbox" name="agree"
								       value="Y" required>
								<label class="checkbox-custom" for="polit44-<?=$item['ID']?>"></label>
								<label for="polit44-<?=$item['ID']?>">Отправляя свои данные, вы соглашаетесь <br><a href="#">Политикой
										конфиденциальности</a></label>
							</div>
						</form>
					</div>
				</div>
				<?
			}
		}
		?>
	</div>
</div>




