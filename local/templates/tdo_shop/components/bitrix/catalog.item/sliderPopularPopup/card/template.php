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


$PRODUCT_PREVIEW = $item['PRODUCT_PREVIEW']['SRC'];
if(empty($PRODUCT_PREVIEW))
{
	$PRODUCT_PREVIEW = $this->GetFolder() . '/images/line-empty.png';
}

//not available section
$noAvailableText = '<div class="goods_item-var_cat"></div>';
if(!$haveOffers)
{
	if(!$actualItem['CAN_BUY'])
	{
		$noAvailableText = '<div class="goods_item-var_cat">Наличие уточняйте у менеджера</div>';
	}
}

$section = $actualItem['SECTION']['DATA'];


?>


<div
		id="<?=$itemIds['PICT']?>"
		style="background-image: url('<?=$PRODUCT_PREVIEW?>');" class="goods_item_image"></div>

<div class="goods_item-content">
	<div class="goods_item-var_name-wrap">
		<a class="goods_item-var_name" href="<?=$item['DETAIL_PAGE_URL']?>"
		   title="<?=$productTitle?>"><?=$productTitle?></a>
	</div>
	<div class="goods_item-var_cat"><?=$section['NAME']?></div>
	<?=$noAvailableText?>

	<div data-entity="price-block">
		<div class="goods_item_price" id="<?=$itemIds['PRICE']?>"><?=$price['PRINT_RATIO_PRICE']?></div>
	</div>

	<?
	if(!$haveOffers)
	{
		if($actualItem['CAN_BUY'])
		{
			?>
			<?
			/*
				<a
					   id="<?=$itemIds['BUY_LINK']?>"
					   class="goods_item-buy"
					   href="javascript:void(0)"
					   rel="nofollow"
			   >
				   <?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
			   </a>
			 */
			?>


			<a class="goods_item-buy js-add-to-cart"
			   href="javascript:void(0);"
			   data-pid="<?=$item['ID']?>"
			   data-img="<?=$item['PRODUCT_PREVIEW']['SRC']?>"
			>В корзину</a>
			<?
		}
	}
	?>

</div>






