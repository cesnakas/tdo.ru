<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/bootstrap_v4/script.js");
Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/bootstrap_v4/style.css");
CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);

if(!empty($arResult['ERRORS']['FATAL'])) {
	foreach ($arResult['ERRORS']['FATAL'] as $code => $error) {
		if($code !== $component::E_NOT_AUTHORIZED) {
			ShowError($error);
		}
	}
	$component = $this->__component;
	if($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][ $component::E_NOT_AUTHORIZED ])) {
		?>
        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <div class="alert alert-danger"><?=$arResult['ERRORS']['FATAL'][ $component::E_NOT_AUTHORIZED ]?></div>
            </div>
			<? $authListGetParams = array(); ?>
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
				<? $APPLICATION->AuthForm('', false, false, 'N', false); ?>
            </div>
        </div>
		<?
	}

} else {
	if(!empty($arResult['ERRORS']['NONFATAL'])) {
		foreach ($arResult['ERRORS']['NONFATAL'] as $error) {
			ShowError($error);
		}
	}
	if(!count($arResult['ORDERS'])) {
		if($_REQUEST["filter_history"] == 'Y') {
			if($_REQUEST["show_canceled"] == 'Y') {
				?>
                <h3><?=Loc::getMessage('SPOL_TPL_EMPTY_CANCELED_ORDER')?></h3>
				<?
			} else {
				?>
                <h3><?=Loc::getMessage('SPOL_TPL_EMPTY_HISTORY_ORDER_LIST')?></h3>
				<?
			}
		} else {
			?>
            <h3><?=Loc::getMessage('SPOL_TPL_EMPTY_ORDER_LIST')?></h3>
			<?
		}
	}


	?>

    <div class="pagination-mob">
        <div class="container">
            <a class="pagination-mob_link" href="#">Мои заказы</a>
        </div>
    </div>
    <div class="text-small-h text-small-h-mob-hid">Мои заказы</div>
    <div class="lk-wrap">
        <div class="lk-order-wrap">
			<?

			$paymentChangeData = array();
			$orderHeaderStatus = null;

			$arPreviewPicture = $arResult['PREVIEW_PICTURES'];

			foreach ($arResult['ORDERS'] as $key => $order) {
				if($orderHeaderStatus !== $order['ORDER']['STATUS_ID'] && $arResult['SORT_TYPE'] == 'STATUS') {
					$orderHeaderStatus = $order['ORDER']['STATUS_ID'];
				}

				$basketItems      = $order['BASKET_ITEMS'];
				$basketItemsCount = count($basketItems);

				?>
                <div class="lk-order_item">
                    <div class="lk-order_item-top">
                        <div class="lk-order_item-top-text">
                            <div class="lk-order_item-top_num">Заказ <?=Loc::getMessage('SPOL_TPL_NUMBER_SIGN') . $order['ORDER']['ACCOUNT_NUMBER']?></div>
                            <div class="lk-order_item-top_status yellow-status"><?=htmlspecialcharsbx($arResult['INFO']['STATUS'][ $orderHeaderStatus ]['NAME'])?></div>
                        </div>

						<?
						//                        <a class="btn big-btn btn-red" href="#">Отследить</a>

						?>
                    </div>
                    <div class="lk-order-list">
                        <div class="lk-order-list_item">
                            <div class="lk-order-list_item-left-wrap">

								<?
								foreach ($basketItems as $basket_item) {
									$PRODUCT_PREVIEW = '';
									if(!empty($arPreviewPicture[ $basket_item['PRODUCT_ID'] ])) {
										$image           = CIntranetUtils::InitImage($arPreviewPicture[ $basket_item['PRODUCT_ID'] ], 70);
										$PRODUCT_PREVIEW = $image['CACHE']['src'];
									}

									if(empty($PRODUCT_PREVIEW)) {
										$PRODUCT_PREVIEW = $this->GetFolder() . '/images/line-empty.png';
									}
                                    

									?>
                                    <div class="lk-order-list_item-left">
                                        <div style="background-image: url('<?=$PRODUCT_PREVIEW?>');"
                                             class="lk-order-list_item-left_img">

                                        </div>
                                        <div class="lk-order-list_item-left_text">
                                            <div class="order-list_name">
												<?=$basket_item['NAME']?>
                                            </div>
                                            <div class="order-list_price"><?=$basket_item['PRICE']?></div>
                                        </div>
                                    </div>
									<?
								}
								?>

                            </div>
                            <div class="lk-order-list_item-right">
								<? /*Дата оформления*/ ?>
                                <div class="lk-order-list_item-right-row">
                                    <div class="lk-order-list_item-right-row-left gray-text">
                                        <span>Дата оформления</span>
                                    </div>
                                    <div class="lk-order-list_item-right-row-right">
										<?
										$DATE_INSERT_FORMATED = $order['ORDER']['DATE_INSERT']->format('j F Y H:i');
										?>
                                        <span><?=$order['ORDER']['DATE_INSERT_FORMATED']?>,</span>
                                    </div>
                                </div>
                                <div class="lk-order-list_item-right-row">
                                    <span>При получении потребуется паспорт</span>
                                </div>

								<? /*оплата*/ ?>
                                <div class="lk-order-list_item-right-row">
                                    <span class="order-head lk-order-list_item-right-row-left">Способ оплаты</span>
                                </div>
								<?
								$showDelimeter = false;
								foreach ($order['PAYMENT'] as $payment) {
									if($order['ORDER']['LOCK_CHANGE_PAYSYSTEM'] !== 'Y') {
										$paymentChangeData[ $payment['ACCOUNT_NUMBER'] ] = array(
											"order"           => htmlspecialcharsbx($order['ORDER']['ACCOUNT_NUMBER']),
											"payment"         => htmlspecialcharsbx($payment['ACCOUNT_NUMBER']),
											"allow_inner"     => $arParams['ALLOW_INNER'],
											"refresh_prices"  => $arParams['REFRESH_PRICES'],
											"path_to_payment" => $arParams['PATH_TO_PAYMENT'],
											"only_inner_full" => $arParams['ONLY_INNER_FULL'],
											"return_url"      => $arResult['RETURN_URL'],
										);
									}
									?>
                                    <div class="lk-order-list_item-right-row-wrap sale-order-list-inner-row">
                                        <div class="lk-order-list_item-right-row">
                                            <div class="lk-order-list_item-right-row-left gray-text">
                                                <span class="sale-order-list-payment-title-element"><?=$payment['PAY_SYSTEM_NAME']?></span>
                                            </div>
                                            <div class="lk-order-list_item-right-row-right">
                                            <span><span style="font-weight: 600;"><?=$payment['FORMATED_SUM']?></span> за <?=$basketItemsCount?> <?=SCGetDeclNum('товар',
                                                                                                                                                                 $basketItemsCount)?></span>
                                            </div>
                                        </div>

                                        <div class="lk-order-list_item-right-row">
                                            <div class="lk-order-list_item-right-row-left gray-text">
												<? if(!empty($payment['CHECK_DATA'])) {
													$listCheckLinks = "";
													foreach ($payment['CHECK_DATA'] as $checkInfo) {
														$title = Loc::getMessage('SPOL_CHECK_NUM',
														                         array('#CHECK_NUMBER#' => $checkInfo['ID'])) . " - " . htmlspecialcharsbx($checkInfo['TYPE_NAME']);
														if($checkInfo['LINK'] <> '') {
															$link           = $checkInfo['LINK'];
															$listCheckLinks .= "<div><a href='$link' target='_blank'>$title</a></div>";
														}
													}
													if($listCheckLinks <> '') {
														?>
                                                        <div class="sale-order-list-payment-check">
                                                            <div class="sale-order-list-payment-check-left"><?=Loc::getMessage('SPOL_CHECK_TITLE')?>:</div>
                                                            <div class="sale-order-list-payment-check-left"><?=$listCheckLinks?></div>
                                                        </div>
														<?
													}
												}
												if($payment['PAID'] !== 'Y' && $order['ORDER']['LOCK_CHANGE_PAYSYSTEM'] !== 'Y') {
													?>
                                                    <a href="#" class="sale-order-list-change-payment"
                                                       id="<?=htmlspecialcharsbx($payment['ACCOUNT_NUMBER'])?>"><?=Loc::getMessage('SPOL_TPL_CHANGE_PAY_TYPE')?></a>
													<?
												}
												if($order['ORDER']['IS_ALLOW_PAY'] == 'N' && $payment['PAID'] !== 'Y') {
													?>
                                                    <div class="sale-order-list-status-restricted-message-block">
                                                        <span class="sale-order-list-status-restricted-message"><?=Loc::getMessage('SOPL_TPL_RESTRICTED_PAID_MESSAGE')?></span>
                                                    </div>
													<?
												}
												?>
                                            </div>
                                            <div class="lk-order-list_item-right-row-right">

												<?
												if($payment['PAID'] === 'N' && $payment['IS_CASH'] !== 'Y' && $payment['ACTION_FILE'] !== 'cash') {
													if($order['ORDER']['IS_ALLOW_PAY'] == 'N') {
														?>
                                                        <div class="col-sm-auto sale-order-list-button-container">
                                                            <a class="btn btn-primary disabled"><?=Loc::getMessage('SPOL_TPL_PAY')?></a>
                                                        </div>
														<?
													} elseif($payment['NEW_WINDOW'] === 'Y') {
														?>
                                                        <div class="col-sm-auto  sale-order-list-button-container">
                                                            <a class="btn btn-primary" target="_blank"
                                                               href="<?=htmlspecialcharsbx($payment['PSA_ACTION_FILE'])?>"><?=Loc::getMessage('SPOL_TPL_PAY')?></a>
                                                        </div>
														<?
													} else {
														?>
                                                        <div class="col-sm-auto  sale-order-list-button-container">
                                                            <a class="btn btn-red ajax_reload"
                                                               href="<?=htmlspecialcharsbx($payment['PSA_ACTION_FILE'])?>"><?=Loc::getMessage('SPOL_TPL_PAY')?></a>
                                                        </div>
														<?
													}
												}
												?>
                                            </div>
                                        </div>
                                        <div class="sale-order-list-inner-row-body">
                                        </div>

                                        <div class="lk-order-list_item-right-row">
                                            <div class="col sale-order-list-inner-row-template">
                                            </div>
                                        </div>
                                    </div>
								<? } ?>

								<? /*доставка*/ ?>
								<?
								if(!empty($order['SHIPMENT'])) {
									?>
                                    <div class="lk-order-list_item-right-row">
                                        <span class="order-head lk-order-list_item-right-row-left">Способ получения</span>
                                    </div><?
									$showDelimeter = false;
									foreach ($order['SHIPMENT'] as $shipment) {
										if(empty($shipment)) {
											continue;
										}
										?>


                                        <div class="lk-order-list_item-right-row">
                                            <div class="lk-order-list_item-right-row-left gray-text">
                                                <span><?=Loc::getMessage('SPOL_TPL_DELIVERY_SERVICE')?>:</span>
                                            </div>
                                            <div class="lk-order-list_item-right-row-right">
                                                <div><?=$arResult['INFO']['DELIVERY'][ $shipment['DELIVERY_ID'] ]['NAME']?></div>
                                            </div>
                                        </div>

										<?
										if($shipment['FORMATED_DELIVERY_PRICE']) { ?>
                                            <div class="lk-order-list_item-right-row">
                                                <div class="lk-order-list_item-right-row-left gray-text">
                                                    <span>Стоимость доставки:</span>
                                                </div>
                                                <div class="lk-order-list_item-right-row-right">
                                                    <div><?=$shipment['FORMATED_DELIVERY_PRICE']?></div>
                                                </div>
                                            </div>
										<? } ?>

										<?
										if(!empty($shipment['TRACKING_NUMBER'])) {
											?>
                                            <div class="lk-order-list_item-right-row sale-order-list-shipment-item">
                                                <span class="sale-order-list-shipment-id-name"><?=Loc::getMessage('SPOL_TPL_POSTID')?>:</span>
                                                <span class="sale-order-list-shipment-id"><?=htmlspecialcharsbx($shipment['TRACKING_NUMBER'])?></span>
                                                <span class="sale-order-list-shipment-id-icon"></span>
                                            </div>
											<?
										}

										if($shipment['TRACKING_URL'] <> '') {
											?>
                                            <div class="lk-order-list_item-right-row sale-order-list-shipment-button-container">
                                                <a class="sale-order-list-shipment-button" target="_blank" href="<?=$shipment['TRACKING_URL']?>">
													<?=Loc::getMessage('SPOL_TPL_CHECK_POSTID')?>
                                                </a>
                                            </div>
											<?
										}
										?>
                                        <div class="lk-order-list_item-right-row">
                                            <div class="lk-order-list_item-right-row-left gray-text">
                                                <a class="order-list_link" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"])?>">Подробнее</a>
                                            </div>
                                            <div class="lk-order-list_item-right-row-right">
                                                <a class="order-list_link"
                                                   href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_COPY"])?>"><?=Loc::getMessage('SPOL_TPL_REPEAT_ORDER')?></a>
                                                <br>
                                                <a class="order-list_link"
                                                   href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_CANCEL"])?>"><?=Loc::getMessage('SPOL_TPL_CANCEL_ORDER')?></a>
                                            </div>
                                        </div>
									<? } ?>
								<? } ?>

								<?
								/* ?>
								<div class="lk-order-list_item-right-row">
									<div class="lk-order-list_item-right-row-left">
										<a class="order-list_link" href="#">Документы по заказу</a>

									</div>
								</div>
								<div class="lk-order-list_item-right-row">
									<div class="lk-order-list_item-right-row-left">
										<a class="order-list_link" href="#">Информация о товарах и продавцах</a>

									</div>
								</div>
								<? //*/ ?>
                            </div>
                        </div>

                    </div>
                </div>
				<?
			} ?>
        </div>

        <?/*
        <div class="lk-help">
            <div class="lk-order_item-top_num">Помощь</div>

			<? $APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("/include/lk/help_top.php"),
				array(),
				array('MODE' => 'text')
			); ?>
            <div class="lk-help_bottom">
                <div class="lk-help_bottom-text">Не нашли ответа? Напишите нам</div>
                <a class="btn big-btn btn-red" href="/contacts/">Задать вопрос</a>
            </div>
        </div>
        */?>

    </div>


	<?

	echo $arResult["NAV_STRING"];

	if($_REQUEST["filter_history"] !== 'Y') {
		$javascriptParams = array(
			"url"            => CUtil::JSEscape($this->__component->GetPath() . '/ajax.php'),
			"templateFolder" => CUtil::JSEscape($templateFolder),
			"templateName"   => $this->__component->GetTemplateName(),
			"paymentList"    => $paymentChangeData,
			"returnUrl"      => CUtil::JSEscape($arResult["RETURN_URL"]),
		);
		$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
		?>
        <script>
            BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?=$javascriptParams?>);
        </script>
		<?
	}
}
?>
