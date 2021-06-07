<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

$this->IncludeLangFile('template.php');

$cartId = $arParams['cartId'];

require(realpath(dirname(__FILE__)) . '/top_template.php');

?>
	<div class="header-bottom_right__box header-bottom_right__box-cart">
		<a href="<?=$arParams['PATH_TO_BASKET']?>" class="header-bottom_right__box__link">
			<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/header/cart.svg" alt="">
			<span class="header-bottom_right__box-span" style="position: relative;bottom: -2px;">Корзина</span>
			<div class="header-bottom_right__box-cart-num"><?=$arResult['NUM_PRODUCTS']?></div>
		</a>
		<?

		if($arParams["SHOW_PRODUCTS"] == "Y" && ($arResult['NUM_PRODUCTS'] > 0 || !empty($arResult['CATEGORIES']['DELAY'])))
		{
			?>
			<div data-role="basket-item-list" class="bx-basket-item-list header__box-dropdown-mask">
				<div class="header__box-dropdown">
					<div id="<?=$cartId?>products" class="bx-basket-item-list-container"><?
						foreach ($arResult["CATEGORIES"] as $category => $items)
						{

							foreach ($items as $v)
							{
								?>
								<div class="header__box-dropdown__item">
									<div style="background-image: url('<?=$v["PICTURE_SRC"]?>')"
									     class="header__box-dropdown__item-img">

									</div>
									<div class="header__box-dropdown__item-content">
										<a href="/catalog/<?=$v["DETAIL_PAGE_URL"]?>" class="header__box-dropdown__item-head"><?=$v["NAME"]?></a>
										<div class="header__box-dropdown__item__bottom">
											<div class="header__box-dropdown__item-price"><?=$v["FULL_PRICE"]?></div>
											<a href="javascript:void(0)" class="header__box-dropdown__item-del" onclick="<?=$cartId?>.removeItemFromCart(<?=$v['ID']?>)" ></a>
										</div>
									</div>
								</div>
								<?
							}
						}
						?>
					</div>
					<div class="header__box-dropdown__bottom">
						<div class="header__box-dropdown-result">
							<div class="header__box-dropdown-result-top">Итого</div>
							<div class="header__box-dropdown-result-price"><?=$v["SUM"]?></div>
						</div>

						<a class="header__box-dropdown-btn" href="<?=$arParams["PATH_TO_ORDER"]?>">В корзину</a>
					</div>
				</div>
			</div>

			<script>
                BX.ready(function () {
					<?=$cartId?>.fixCart();
                });
			</script>
			<?
		}
		?>

	</div>

<?
