<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php"); ?>
<?
if(!CModule::IncludeModule("iblock")) {
	ShowError(GetMessage("CC_BCF_MODULE_NOT_INSTALLED"));

	return;
}
if(!CModule::IncludeModule("catalog")) {
	ShowError(GetMessage("CC_BCF_MODULE_NOT_INSTALLED"));

	return;
}
if(!CModule::IncludeModule("sale")) {
	ShowError(GetMessage("CC_BCF_MODULE_NOT_INSTALLED"));

	return;
}
define("NOT_CHECK_PERMISSIONS", true);
function autoConvert($text) {
	$cp = get_codepage($text);
	if($cp == "UTF-8") {
		$return = $text;
	}
	if($cp == "CP1251") {
		$return = iconv("CP1251", "UTF-8", $text);
	}
	if($cp == "KOI8-R") {
		$return = iconv("KOI8-R", "UTF-8", $text);
	}
	if($cp == "IBM866") {
		$return = iconv("IBM866", "UTF-8", $text);
	}
	if($cp == "ISO-8859-5") {
		$return = iconv("ISO-8859-5", "UTF-8", $text);
	}
//    if($cp=="MAC") $return = iconv("MAC","UTF-8",$text);
	if($cp == "MAC") {
		$return = iconv("CP1251", "UTF-8", $text);
	}

	return $return;
}

function get_codepage($text = '') {
	if(!empty($text)) {
		$utflower  = 7;
		$utfupper  = 5;
		$lowercase = 3;
		$uppercase = 1;
		$last_simb = 0;
		$charsets  = array(
			'UTF-8'      => 0,
			'CP1251'     => 0,
			'KOI8-R'     => 0,
			'IBM866'     => 0,
			'ISO-8859-5' => 0,
			'MAC'        => 0,
		);
		for ($a = 0; $a < strlen($text); $a ++) {
			$char = ord($text[ $a ]);

			// non-russian characters
			if($char < 128 || $char > 256) {
				continue;
			}

			// UTF-8
			if(($last_simb == 208) && (($char > 143 && $char < 176) || $char == 129)) {
				$charsets['UTF-8'] += ($utfupper * 2);
			}
			if((($last_simb == 208) && (($char > 175 && $char < 192) || $char == 145))
			   || ($last_simb == 209 && $char > 127 && $char < 144)) {
				$charsets['UTF-8'] += ($utflower * 2);
			}

			// CP1251
			if(($char > 223 && $char < 256) || $char == 184) {
				$charsets['CP1251'] += $lowercase;
			}
			if(($char > 191 && $char < 224) || $char == 168) {
				$charsets['CP1251'] += $uppercase;
			}

			// KOI8-R
			if(($char > 191 && $char < 224) || $char == 163) {
				$charsets['KOI8-R'] += $lowercase;
			}
			if(($char > 222 && $char < 256) || $char == 179) {
				$charsets['KOI8-R'] += $uppercase;
			}

			// IBM866
			if(($char > 159 && $char < 176) || ($char > 223 && $char < 241)) {
				$charsets['IBM866'] += $lowercase;
			}
			if(($char > 127 && $char < 160) || $char == 241) {
				$charsets['IBM866'] += $uppercase;
			}

			// ISO-8859-5
			if(($char > 207 && $char < 240) || $char == 161) {
				$charsets['ISO-8859-5'] += $lowercase;
			}
			if(($char > 175 && $char < 208) || $char == 241) {
				$charsets['ISO-8859-5'] += $uppercase;
			}

			// MAC
			if($char > 221 && $char < 255) {
				$charsets['MAC'] += $lowercase;
			}
			if($char > 127 && $char < 160) {
				$charsets['MAC'] += $uppercase;
			}

			$last_simb = $char;
		}
		arsort($charsets);

		return key($charsets);
	}
}

$action = $_REQUEST["action"];
$q      = $_REQUEST["q"];
if($q != "") {
	$action = "get-cities";
}

if($action == "") {
	$menu          = $APPLICATION->MENU;
	$arBasketItems = array();

	$dbBasketItems = CSaleBasket::GetList(
		array(
			"NAME" => "ASC",
			"ID"   => "ASC",
		),
		array(
			"FUSER_ID" => CSaleBasket::GetBasketUserID(),
			"LID"      => SITE_ID,
			"ORDER_ID" => "NULL",
		),
		false,
		false,
		array(
			"ID",
			"CALLBACK_FUNC",
			"MODULE",
			"NAME",
			"DETAIL_PAGE_URL",
			"PRODUCT_ID",
			"QUANTITY",
			"DELAY",
			"CAN_BUY",
			"PRICE",
			"WEIGHT",
		)
	);

	while ($arItems = $dbBasketItems->Fetch()) {
//            if (strlen($arItems["CALLBACK_FUNC"]) > 0)
//            {
//                CSaleBasket::UpdatePrice($arItems["ID"],
//                                         $arItems["CALLBACK_FUNC"],
//                                         $arItems["MODULE"],
//                                         $arItems["PRODUCT_ID"],
//                                         $arItems["QUANTITY"]);
//                $arItems = CSaleBasket::GetByID($arItems["ID"]);
//            }

		$arItems["QUANTITY"] = intval($arItems["QUANTITY"]);
		$arBasketItems[]     = $arItems;
	}
//        debug($arBasketItems);
	$summ = 0;
	$cnt  = 0;
	foreach ($arBasketItems as $i => $item) {
		$res = CIBlockElement::GetByID($item["PRODUCT_ID"]);
		if($ar_res = $res->GetNext()) {
			$img = CFile::GetPath($ar_res["DETAIL_PICTURE"]);
		}
		$arBasketItems[ $i ]["IMG"] = $img;
		$summ                       = $summ + $item["PRICE"] * $item["QUANTITY"];
	}
	$arResult["ITEMS"]    = $arBasketItems;
	$arResult["SUMM"]     = $summ;
	$arResult["ELEMENTS"] = sizeof($arBasketItems);

	$this->IncludeComponentTemplate("template");
} else {
	$APPLICATION->RestartBuffer();
	$result           = array();
	$result["result"] = false;

	header("Content-Type: text/html; charset=utf-8");

	if($action == "get-basket") {
		$result = array();
		$menu   = $APPLICATION->MENU;

		$arBasketItems = array();
		$dbBasketItems = CSaleBasket::GetList(
			array(
				"NAME" => "ASC",
				"ID"   => "ASC",
			),
			array(
				"FUSER_ID" => CSaleBasket::GetBasketUserID(),
				"LID"      => SITE_ID,
				"ORDER_ID" => "NULL",
			),
			false,
			false,
			array(
				"ID",
				"CALLBACK_FUNC",
				"MODULE",
				"NAME",
				"DETAIL_PAGE_URL",
				"PRODUCT_ID",
				"QUANTITY",
				"DELAY",
				"CAN_BUY",
				"PRICE",
				"WEIGHT",
			)
		);

		while ($arItems = $dbBasketItems->Fetch()) {
//            if (strlen($arItems["CALLBACK_FUNC"]) > 0)
//            {
//                CSaleBasket::UpdatePrice($arItems["ID"],
//                                         $arItems["CALLBACK_FUNC"],
//                                         $arItems["MODULE"],
//                                         $arItems["PRODUCT_ID"],
//                                         $arItems["QUANTITY"]);
//                $arItems = CSaleBasket::GetByID($arItems["ID"]);
//            }

			$arItems["QUANTITY"] = intval($arItems["QUANTITY"]);
			$arBasketItems[]     = $arItems;
		}
//        debug($arBasketItems);
		$summ = 0;
		foreach ($arBasketItems as $i => $item) {
			$res = CIBlockElement::GetByID($item["PRODUCT_ID"]);
			if($ar_res = $res->GetNext()) {
				$img = CFile::GetPath($ar_res["DETAIL_PICTURE"]);
			}
			$arBasketItems[ $i ]["IMG"] = $img;

//            debug($item);
			//Надо взять кратность товара
//            $db_props = CIBlockElement::GetProperty("4", $item["PRODUCT_ID"] , "sort", "asc", Array("CODE"=>"PROPERTY_QUANTITY"));
//            debug($db_props);
//            if($ar_props = $db_props->Fetch())
//                {
//                debug($ar_props);
//                }
			$kratnost    = "1";
			$arFilter    = array("IBLOCK_ID" => "4", "ACTIVE" => "Y", "ID" => $item["PRODUCT_ID"]);
			$arSelect    = array(
				"ID",
				"IBLOCK_SECTION_ID",
				"DETAIL_PAGE_URL",
				"CODE",
				"NAME",
				"DETAIL_PICTURE",
				"PREVIEW_PICTURE",
				"PREVIEW_TEXT",
				"DETAIL_TEXT",
				"PROPERTY_GLAV",
				"PROPERTY_SPECIALOFFER",
				"PROPERTY_quantity",
				"PROPERTY_WESTPOWER_YOUTUBE",
				"PROPERTY_CML2_ARTICLE",
				"PROPERTY_CML2_MANUFACTURER",
			);
			$arNavParams = array(
				"nPageSize" => '1',
			);
			$res         = CIBlockElement::GetList($sort_array, $arFilter, false, $arNavParams, $arSelect);
			$count       = $res->SelectedRowsCount();
			if($count != 0) {
				while ($ar_fields = $res->GetNext()) {
					if($ar_fields["PROPERTY_QUANTITY_VALUE"] != "") {
						$kratnost = $ar_fields["PROPERTY_QUANTITY_VALUE"];
					}
				}
			}
			$arBasketItems[ $i ]["KRATNOST"] = $kratnost;
//              echo $item["DETAIL_PAGE_URL"][sizeof($item["DETAIL_PAGE_URL"])-1];
//            $item["DETAIL_PAGE_URL"][sizeof($item["DETAIL_PAGE_URL"])-1]="+";
			$summ = $summ + $item["PRICE"] * $item["QUANTITY"];
		}
		$result["items"]    = $arBasketItems;
		$result["summ"]     = $summ;
		$result["elements"] = sizeof($arBasketItems);


		$result["result"] = true;
	}

	if($action == "qty_basket") {
		$result["action"] = "qty_basket";
		$basket_id        = intval($_REQUEST["basket_id"]);
		$qty              = intval($_REQUEST["qty"]);
		if($basket_id != 0) {
			$result   = false;
			$arFields = array(
				"QUANTITY" => $qty,
			);
			if(CSaleBasket::Update($basket_id, $arFields)) {
				$result["result"] = true;
			} else {
				$result["result"] = false;
			}
		}
	}

	if($action == "delete_from_basket") {
		$result["action"] = "delete_from_basket";
		$basket_id        = intval($_REQUEST["basket_id"]);
		$result           = false;
		if(CSaleBasket::Delete($basket_id)) {
			$result["result"] = true;
		} else {
			$result["result"] = false;
		}
	}

	// Возвращшает основные типы доставок
	if($action == "get-types") {
		$result["action"] = "get-types";
		$items            = array();
		$items[]          = array("ID" => "0", "NAME" => "Москва / Московская область", "BITRIX_ID" => "35");
		$items[]          = array("ID" => "1", "NAME" => "Санкт-Петербург / Ленинградская область", "BITRIX_ID" => "3289");
		$items[]          = array("ID" => "2", "NAME" => "Отправка почтой в любой населенный пункт России (до ближайшего к Вам отделения почты)", "BITRIX_ID" => "2692");
		$items[]          = array("ID" => "3", "NAME" => "Более 250 пунктов самовывоза по России \"BoxBerry\"", "BITRIX_ID" => "2692");
		$result["items"]  = $items;
	} // end get-types

	// Возвращшает основные типы доставок для указанного региона
	if($action == "get-delivery") {
		$location         = intval($_REQUEST["location"]);
		$result["action"] = "get-delivery";
		$result["about"]  = "";
		$items            = array();
		$saleFilter       = array(
			"LID"      => SITE_ID,
			"ACTIVE"   => "Y",
			"LOCATION" => $location,
		);
//		if($location == 0) {
//			$saleFilter["ID"] = 216;

//			unset($saleFilter["LOCATION"]);
//		}
//       s debug($saleFilter);
		$db_dtype = CSaleDelivery::GetList(
			array(
				"SORT" => "ASC",
				"NAME" => "ASC",
			),
			$saleFilter,
			false,
			false,
			array()
		);
		if($ar_dtype = $db_dtype->Fetch()) {
			do {
//				if($ar_dtype["ID"] == 216) {
//					$ar_dtype["PRICE"] = "от " . $ar_dtype["PRICE"];
//				}
				$items[] = array("ID" => $ar_dtype["ID"], "NAME" => $ar_dtype["NAME"], "PRICE" => $ar_dtype["PRICE"]);
			} while ($ar_dtype = $db_dtype->Fetch());
		} else {
//            echo "Доступных способов доставки не найдено<br>";
		}
		$result["items"] = $items;

		if($location == "2692") {
			$result["about"] = "<b>Внимание! </b>После оформления заказа в течение рабочего дня Вам позвонит менеджер для подтверждения заказа и уточнения деталей заказа. Без подтверждения по телефону заказы не отправляются. Наложенным платежом отправляются только мелкогабаритные товары, а также исключение составляют конструктивно сходные с гражданским и служебным оружием (пневматика, арбалеты и т.д.).
            <br /><br /><b>Рекомендации</b><br />
            1)Уточняйте номер почтового отправления для отслеживания местонахождения посылки<br />
            2)Участились случаи не доноса почтальонами уведомлений получателям о том, что на почтовое отделение для Вас пришла посылка, поэтому просим приходить периодически на почту с паспортом для проверки поступления посылки. Отслеживание местонахождения посылки не всегда является достоверной информацией (ошибки).";
			/*$result["links"]=array(
				"0"=>array("ID"=>"0","NAME"=>"Список товаров, отправляемых наложенным платежом.","TOVARS"=>array(
					"Cпециальные ножи",
					"Туристические ножи",
					)),
				"1"=>array("ID"=>"1","NAME"=>"Список товаров, не отправляемых наложенным платежом.","TOVARS"=>array(
					"Лодки ПВХ",
					"Туристические палатки",
					"Арбалеты",
					"Пневматика",
					"Другие товары"
					)),
				);*/
			$result["form"] = array(
				"0" => array("ID" => "0", "NAME" => "Я согласен оплатить наложенный платеж при получении", "TYPE" => "CHECK"),
				"1" => array(
					"ID"   => "1",
					"NAME" => "Я принимаю тот факт, что при отказе от оплаты мои идентификационные данные попадают в черный список интернет магазинов",
					"TYPE" => "CHECK",
				),
				"2" => array(
					"ID"   => "2",
					"NAME" => "Я согласен, что в случае, если длинна посылки превысит 420 мм, - сумма заказа увеличится на 120 рублей (стоимость дополнительной упаковки)",
					"TYPE" => "CHECK",
				),
			);
		}

		if($location == "0") {
			$boxes           = array();
			$result["boxes"] = $boxes;
		}
		//      debug($result);
	} // end get-types

	// выбор пунктов самовывоза
	if($action == "get-punkts") {
		$city             = $_REQUEST["city"];
		$arFilter         = array("IBLOCK_ID" => "38", "ACTIVE" => "Y", "NAME" => $city, "SECTION_ID" => $arParams["RUSSIA_VYVOZ"]);
		$arSelect         = array("ID", "CODE", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "PROPERTY_deliveryperiod", "PROPERTY_schedule", "PROPERTY_tariffzone_full");
		$res              = CIBlockElement::GetList($sort_array, $arFilter, false, $arNavParams, $arSelect);
		$count            = $res->SelectedRowsCount();
		$result["action"] = "get-punkts";
		$items            = array();

		if($count != 0) {
			$names = array();
			while ($ar_fields = $res->GetNext()) {
//                    $names[$ar_fields["NAME"]]=$ar_fields["ID"];
				$items [] = $ar_fields;
			}
		}
		$result["items"] = $items;
	}

	// выбор города для доставки
	if($action == "get-cities") {
		$str      = "";
		$arFilter = array("IBLOCK_ID" => "38", "ACTIVE" => "Y", "?NAME" => $q);
		$arSelect = array("ID", "CODE", "NAME", "PREVIEW_TEXT");
		$res      = CIBlockElement::GetList($sort_array, $arFilter, false, $arNavParams, $arSelect);
		$count    = $res->SelectedRowsCount();
		if($count != 0) {
			$names = array();
			while ($ar_fields = $res->GetNext()) {
				$names[ $ar_fields["NAME"] ] = $ar_fields["ID"];
			}
			foreach ($names as $i => $items) {
				echo $items . "|" . $i . "|" . $items . "\r\n";
			}
		}
	}

	if($action == "get-form") {
		$location         = intval($_REQUEST["location"]);
		$result["action"] = "get-form";
		$items            = array();
		/*
        if($location==3 || $location==16 || $location==17 || $location==18 || $location==19|| $location==22|| $location==23|| $location==20|| $location==21)
            {

            if($location==3 || $location==16 || $location==17 || $location==18 || $location==19|| $location==22|| $location==23)
                $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Контактное лицо","CODE"=>"USERNAME","PROP_ID"=>"ORDER_PROP_45","NEED"=>true);

            if( $location==20|| $location==21)
                {
                $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Фамилия","CODE"=>"USERNAME","PROP_ID"=>"ORDER_PROP_45","NEED"=>true);
                $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Имя","CODE"=>"NAMEFIO","PROP_ID"=>"ORDER_PROP_78","NEED"=>true);
                $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Отчество","CODE"=>"FIOOTCHESTVO","PROP_ID"=>"ORDER_PROP_79","NEED"=>true);
                }


            $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Телефон","CODE"=>"TEL","PROP_ID"=>"ORDER_PROP_46","NEED"=>true);
            $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"E-mail","CODE"=>"EMAIL","PROP_ID"=>"ORDER_PROP_48","NEED"=>true);
            if($location==17)
                {
//                $items[]=array("ID"=>"0","TYPE"=>"DATE","NAME"=>"Дата самовывоза","CODE"=>"DATETIME_DELIVERY","PROP_ID"=>"ORDER_PROP_43","NEED"=>true);
                $items[]=array("ID"=>"0","TYPE"=>"DATE","NAME"=>"Дата самовывоза","CODE"=>"SAMOVIVOZ_DATA","PROP_ID"=>"ORDER_PROP_43","NEED"=>true);
                }
            if($location==22)
                {
                $items[]=array("ID"=>"0","TYPE"=>"DATE","NAME"=>"Дата самовывоза","CODE"=>"SAMOVIVOZ_DATA","PROP_ID"=>"ORDER_PROP_43","NEED"=>true);
                }

            if($location==23)
                {
                $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Город самовывоза","CODE"=>"CITY_DELIVERY_REGION","PROP_ID"=>"ORDER_PROP_43","NEED"=>true);
                }

            if( $location==20|| $location==21)
                {
                $items[]=array("ID"=>"80","TYPE"=>"TEXT","NAME"=>"Область/край","CODE"=>"REGION","PROP_ID"=>"ORDER_PROP_80","NEED"=>true);
                $items[]=array("ID"=>"81","TYPE"=>"TEXT","NAME"=>"Почтовый индекс","CODE"=>"POSTCOD","PROP_ID"=>"ORDER_PROP_81","NEED"=>true);
                }


            if($location==3 || $location==16 || $location==18|| $location==19|| $location==20|| $location==21)
                {
                $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Город","CODE"=>"CITY","PROP_ID"=>"ORDER_PROP_39","NEED"=>true);
                $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Улица","CODE"=>"STREET","PROP_ID"=>"ORDER_PROP_40","NEED"=>true);
                $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Дом, корпус, строение","CODE"=>"HOUSE","PROP_ID"=>"ORDER_PROP_41","NEED"=>true);
                $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Квартира","CODE"=>"APART","PROP_ID"=>"ORDER_PROP_42","NEED"=>true);
                }

            if($location==3 || $location==16 || $location==18|| $location==19)
                    $items[]=array("ID"=>"0","TYPE"=>"DATE","NAME"=>"Дата доставки","CODE"=>"DATETIME_DELIVERY","PROP_ID"=>"ORDER_PROP_25","NEED"=>true);


            if($location==16|| $location==19)
                $items[]=array("ID"=>"0","TYPE"=>"DESC","NAME"=>"Время доставки","CODE"=>"DATETIME_DELIVERY","PROP_ID"=>"ORDER_PROP_25","TEXT"=>"Доставка производится с 11:00 до 18:00 часов","NEED"=>false);
            if($location==3|| $location==18)
                {
                $items[]=array("ID"=>"0","TYPE"=>"TIME","NAME"=>"Время доставки","CODE"=>"CITY","PROP_ID"=>"ORDER_PROP_39","NEED"=>true,
                        "TYPES"=>array(
                            "DAY"=>array(
                                "ID"=>"0","CODE"=>"DAY","NAME"=>"Доставка днем","DESCR"=>"Доставка днем производится с 11:00 до 18:00 часов, с интервалом 3 часа.",
                                "TIMES"=>array(
                                    "11:00-14:00",
                                    "12:00-15:00",
                                    "13:00-16:00",
                                    "14:00-17:00",
                                    "15:00-18:00"
                                    )
                            ),
                            "NIGHT"=>array(
                                "ID"=>"1","CODE"=>"NIGHT","NAME"=>"Доставка вечером","DESCR"=>"Доставка после 18:00 производится с 18:00 до 23:00 часов, с интервалом 3 часа.",
                                "TIMES"=>array(
                                    "18:00-21:00",
                                    "19:00-22:00",
                                    "20:00-23:00",
                                    )
                                )
                            )
                    );
                }
//            $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Ближайшая станция метро","CODE"=>"NEAREST_METRO_STATION","PROP_ID"=>"ORDER_PROP_30","NEED"=>true);
         $items[]=array("ID"=>"0","TYPE"=>"SELECT","NAME"=>"Время доставки","CODE"=>"CITY","PROP_ID"=>"ORDER_PROP_39","NEED"=>true,
                        "TYPES"=>array(
                            "DAY"=>array(
                                "ID"=>"0","CODE"=>"DAY","NAME"=>"Доставка днем","DESCR"=>"Доставка днем производится с 11:00 до 18:00 часов, с интервалом 3 часа.",
                                "TIMES"=>array(
                                    "<option value='2' selected='selected'>Наличные</option>",
                                    "<option value='17'>Банковский перевод</option>"
                                    )
                            ),
               
                            )
                    );
            $items[]=array("ID"=>"0","TYPE"=>"TEXT","NAME"=>"Дополнительный телефон","CODE"=>"DOP_TEL","PROP_ID"=>"ORDER_PROP_47","NEED"=>false);
            $items[]=array("ID"=>"0","TYPE"=>"TEXTAREA","NAME"=>"Ваш комментарий к заказу","CODE"=>"COMMENT","PROP_ID"=>"","NEED"=>false);
			//$items[]=array("ID"=>"0","TYPE"=>"SELECT","NAME"=>"Способ оплаты","CODE"=>"SELECT_SPOSOB_OPLATY","PROP_ID"=>"","NEED"=>false);
            }
			*/


		/*
		 * 3 - В пределах МКАД
		 * 21 - Самовывоз (Москва, Алтуфьевское ш.,37с2)
		 * 22 - Московская обл (вкл. Москва за МКАД)
		 *
		 */

		if($location == 5 || $location == 3 || $location == 2) {
			$items[] = array(
				"ID"      => "0",
				"TYPE"    => "SELECT",
				"NAME"    => "Время доставки",
				"CODE"    => "CITY",
				"PROP_ID" => "ORDER_PROP_39",
				"NEED"    => true,
				"TYPES"   => array(
					"DAY" => array(
						"ID"    => "0",
						"CODE"  => "DAY",
						"NAME"  => "Доставка днем",
						"DESCR" => "Доставка днем производится с 11:00 до 18:00 часов, с интервалом 3 часа.",
						"TIMES" => array(
							"<option value='7' selected='selected'>Наличные</option>",
							"<option value='14'>Банковский перевод</option>",
							"<option value='9'>Яндекс.Деньги</option>",
						),
					),

				),
			);
//			if($location !== 21) {
//				$items[] = array("ID" => "0", "TYPE" => "TEXT", "NAME" => "Адрес доставки", "CODE" => "ADRESS", "PROP_ID" => "ORDER_PROP_117", "NEED" => true);
//			}
		} else {
			$items[] = array(
				"ID"      => "0",
				"TYPE"    => "SELECT",
				"NAME"    => "Время доставки",
				"CODE"    => "CITY",
				"PROP_ID" => "ORDER_PROP_39",
				"NEED"    => true,
				"TYPES"   => array(
					"DAY" => array(
						"ID"    => "0",
						"CODE"  => "DAY",
						"NAME"  => "Доставка днем",
						"DESCR" => "Доставка днем производится с 11:00 до 18:00 часов, с интервалом 3 часа.",
						"TIMES" => array(
							"<option value='14' selected='selected'>Банковский перевод</option>",
							"<option value='9'>Яндекс.Деньги</option>",
						),
					),

				),
			);
			$items[] = array("ID" => "0", "TYPE" => "TEXT", "NAME" => "Адрес доставки", "CODE" => "ADRESS", "PROP_ID" => "ORDER_PROP_117", "NEED" => true);
		}

		$result["items"] = $items;

		// Для пунктов самовывоза Москвы
		if($location == 17) {
			$arFilter         = array("IBLOCK_ID" => "38", "ACTIVE" => "Y", "SECTION_ID" => $arParams["MSK_VYVOZ"]);
			$arSelect         = array(
				"ID",
				"CODE",
				"NAME",
				"PREVIEW_TEXT",
				"DETAIL_TEXT",
				"PROPERTY_deliveryperiod",
				"PROPERTY_schedule",
				"PROPERTY_tariffzone_full",
				"PROPERTY_PHONE",
				"PROPERTY_YAMAP",
			);
			$res              = CIBlockElement::GetList($sort_array, $arFilter, false, $arNavParams, $arSelect);
			$count            = $res->SelectedRowsCount();
			$result["action"] = "get-punkts";
			$items            = array();

			if($count != 0) {
				$list = array();
				while ($ar_fields = $res->GetNext()) {
//                    $names[$ar_fields["NAME"]]=$ar_fields["ID"];
					$list[] = array(
						"ID"    => $ar_fields["ID"],
						"CITY"  => $ar_fields["NAME"],
						"TIME"  => $ar_fields["PROPERTY_SCHEDULE_VALUE"],
						"PHONE" => $ar_fields["PROPERTY_PHONE_VALUE"],
						"HOW"   => $ar_fields["PREVIEW_TEXT"],
						"NAME"  => $ar_fields["DETAIL_TEXT"],
						"IMAGE" => "/images/sl1.png",
						"COORD" => "12,21",
					);
				}
			}

			$result["list"] = $list;
		}

		// Для пунктов самовывоза Питер
		if($location == 22) {
			$arFilter         = array("IBLOCK_ID" => "38", "ACTIVE" => "Y", "SECTION_ID" => $arParams["PITER_VYVOZ"]);
			$arSelect         = array(
				"ID",
				"CODE",
				"NAME",
				"PREVIEW_TEXT",
				"DETAIL_TEXT",
				"PROPERTY_deliveryperiod",
				"PROPERTY_schedule",
				"PROPERTY_tariffzone_full",
				"PROPERTY_PHONE",
				"PROPERTY_YAMAP",
			);
			$res              = CIBlockElement::GetList($sort_array, $arFilter, false, $arNavParams, $arSelect);
			$count            = $res->SelectedRowsCount();
			$result["action"] = "get-punkts";
			$items            = array();

			if($count != 0) {
				$list = array();
				while ($ar_fields = $res->GetNext()) {
//                    $names[$ar_fields["NAME"]]=$ar_fields["ID"];
					$list[] = array(
						"ID"    => $ar_fields["ID"],
						"CITY"  => $ar_fields["NAME"],
						"TIME"  => $ar_fields["PROPERTY_SCHEDULE_VALUE"],
						"PHONE" => $ar_fields["PROPERTY_PHONE_VALUE"],
						"HOW"   => $ar_fields["PREVIEW_TEXT"],
						"NAME"  => $ar_fields["DETAIL_TEXT"],
						"IMAGE" => "/images/sl1.png",
						"COORD" => "12,21",
					);
				}
			}

//            $list[]=array("ID"=>"0","NAME"=>"г.Санкт-Петербург, Пункт самовывоза 1","TIME"=>"с 11.00 до 20.00, ежедневно","PHONE"=>"8 (495) 663-71-48 доб. 614","HOW"=>"Как найти на словах","IMAGE"=>"/images/sl1.png","COORD"=>"12,21");
//            $list[]=array("ID"=>"1","NAME"=>"г.Санкт-Петербург, Пункт самовывоза 2","TIME"=>"с 11.00 до 20.00, ежедневно","PHONE"=>"8 (495) 663-71-48 доб. 614","HOW"=>"Как найти на словах","IMAGE"=>"/images/sl1.png","COORD"=>"12,21");
//            $list[]=array("ID"=>"2","NAME"=>"г.Санкт-Петербург, Пункт самовывоза 3","TIME"=>"с 11.00 до 20.00, ежедневно","PHONE"=>"8 (495) 663-71-48 доб. 614","HOW"=>"Как найти на словах","IMAGE"=>"/images/sl1.png","COORD"=>"12,21");
			$result["list"] = $list;
		}

	}

	// выбор пунктов самовывоза
	if($action == "make-order") {
		$params = $_REQUEST;

		$order_summ = GetBasketSumm();
		if($order_summ == 0) {

			$result["result"] = false;

			return true;
		}

		if(isset($params["EMAIL"])) {
			$EMAIL = $params["EMAIL"];
		} else {
			$new_login = "user_" . time();
			$new_email = $new_login . "@crmtdobu.ru";
			$EMAIL     = $new_email;
		}

		list($user_name, $domain_name) = explode("@", $EMAIL);
		//print_r($user_name);

		// Вначале, ищем пользователя среди существующих
		$filter      = array
		(
			"LOGIN" => $user_name,
			"EMAIL" => $EMAIL,
		);
		$rsUsers     = CUser::GetList(($by = "personal_country"), ($order = "desc"), $filter); // выбираем пользователей
		$is_filtered = $rsUsers->is_filtered; // отфильтрована ли выборка ?
		$count       = $rsUsers->SelectedRowsCount();
		if($count > 0) {
			if($arUser = $rsUsers->NavNext()) {
				// debug($arUser);
				$user_id = $arUser["ID"];
//                echo "[".$f_ID."] (".$f_LOGIN.") ".$f_NAME." ".$f_LAST_NAME."<br>";
			}
		} else {
//            echo "Add user!";

			$user     = new CUser;
			$arFields = array(
				"NAME"             => $params["NAME"],
//              "LAST_NAME"         => "Иванов",
				"EMAIL"            => $EMAIL,
				"LOGIN"            => $user_name,
				"LID"              => "s2",
				"ACTIVE"           => "Y",
				"GROUP_ID"         => array(9),
				"PASSWORD"         => "M2D88qyFXomen59",
				"CONFIRM_PASSWORD" => "M2D88qyFXomen59",
//              "PERSONAL_PHOTO"    => $arIMAGE
			);

			$user_id = $user->Add($arFields);

			if(intval($user_id) > 0) {
//                echo "Пользователь успешно добавлен.";
			} else {
			}
//            else
			// echo $user->LAST_ERROR;
		}// end add user
//            echo "USER_ID".$user_id;


//print_r($user_id);
		// тут создание заказа

		// Берем сумму заказа
		$order_summ = GetBasketSumm();


		// тут в текст, для письма вставляем список товаров, которые заказал пользователь
		$arSelect = array();
		$tovars   = "";
		//    debug($_REQUEST);
		$dbBasketItems = CSaleBasket::GetList(array("NAME" => "ASC", "ID" => "ASC"),
		                                      array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"), false, false, $arSelect);
		while ($arItems = $dbBasketItems->Fetch()) {
			$arProps = array();
			$db_res  = CSaleBasket::GetPropsList(array("SORT" => "ASC", "NAME" => "ASC"), array("BASKET_ID" => $arItems["ID"]));
			while ($ar_res = $db_res->Fetch()) {
				$arProps[] = array($ar_res["CODE"] => $ar_res["VALUE"]);
			}

			$tovar[] = array(
				"ID"         => $arItems["ID"],
				"PRODUCT_ID" => $arItems["PRODUCT_ID"],
				"NAME"       => $arItems["NAME"],
				"QUANTITY"   => $arItems["QUANTITY"],
				"PRICE"      => $arItems["PRICE"],
				"WEIGHT"     => $arItems["WEIGHT"],
				"PROPS"      => $arProps,
			);
			$tovars1 .= "<b>" . $arItems["NAME"] . "</b> количество:<b>" . $arItems["QUANTITY"] . " шт.</b>  цена:<b>" . $arItems["PRICE"] . " руб.</b> <br />\r\n";
		}
//echo($tovars);

//debug($params);

		$db_vars = CSaleLocation::GetList(array("SORT" => "ASC", "COUNTRY_NAME_LANG" => "ASC", "CITY_NAME_LANG" => "ASC"),
		                                  array("LID" => LANGUAGE_ID, "CITY_ID" => $params["DELIVERY_REGION_ID"]), false, false, array());
		while ($vars = $db_vars->Fetch()):
			//        debug($vars);
			$deliv = $vars;
		endwhile;
		if(sizeof($deliv) > 0) {
			$deliv_text = "";
			if($deliv["COUNTRY_NAME"] != "") {
				$deliv_text .= $deliv["COUNTRY_NAME"];
			}
			if($deliv["REGION_NAME"] != "") {
				$deliv_text .= "-" . $deliv["REGION_NAME"];
			}
			if($deliv["CITY_NAME"] != "") {
				$deliv_text .= "-" . $deliv["CITY_NAME"];
			}
//               echo $deliv_text;
		}


		$arDeliv = CSaleDelivery::GetByID($params["DELIVERY_ID"]);
		//  print_r($arDeliv);
		if($arDeliv) {
			//    debug($arDeliv);
			$delivery_price = $arDeliv["PRICE"];
			$delivery_name  = $arDeliv["NAME"];
		}

		//    debug($delivery_price);


		if($params["PAY_SYSTEM_ID"] == 'Наличные') {
			$paypaysystems = 1;
		} elseif($params["PAY_SYSTEM_ID"] == 'Банковский перевод') {
			$paypaysystems = 2;
		} elseif($params["PAY_SYSTEM_ID"] == 19) {
			$paypaysystems = 13;
		} else {
			$paypaysystems = 1;
		}

		$arFields = array(
			"LID"              => "s2",
			"PERSON_TYPE_ID"   => 3,
			"PAYED"            => "N",
			"CANCELED"         => "N",
			"STATUS_ID"        => "N",
			"PRICE"            => $order_summ + $delivery_price,
			"CURRENCY"         => "RUB",
			"USER_ID"          => $user_id,
			"PAY_SYSTEM_ID"    => $paypaysystems,
			"PRICE_DELIVERY"   => $delivery_price,
			"DELIVERY_ID"      => $params["DELIVERY_ID"],
			"USER_DESCRIPTION" => $params["COMMENT"],
			"TAX_VALUE"        => 0.0,
		);
		if(strlen($params['NAME']) > 0) {
			$props_user .= "Имя:  " . $params['NAME'] . "<br>";
		}
		if(!empty($params["EMAIL"])) {
			$props_user .= "E-mail: " . $EMAIL . "<br>";
		}
		if(strlen($params['PHONE']) > 0) {
			$props_user .= "Телефон: " . $params['PHONE'] . "<br>";
		}
		if(strlen($deliv_text) > 0) {
			$props_user .= "Регион доставки: " . $deliv_text . "<br>";
		}
		if(strlen($params['PAY_SYSTEM_ID']) > 0) {
			$props_user .= "Способ оплаты: " . $params['PAY_SYSTEM_ID'] . "<br>";
		}
		if(strlen($params['ADRESS']) > 0) {
			$props_user .= "Адрес доставки : " . $params['ADRESS'] . "<br>";
		}
		if(strlen($delivery_name) > 0) {
			$props_user .= "Способ доставки : " . $delivery_name . " Стоимость : " . $delivery_price . "<br>";
		}
		if(strlen($_SERVER['REMOTE_ADDR']) > 0) {
			$props_ip = "IP : " . $_SERVER['REMOTE_ADDR'] . " <br>";
		}


		if($ORDER_ID = \CSaleOrder::Add($arFields)) {
//                echo "ORDER_ID:".$ORDER_ID;

			$ORDER_ID = IntVal($ORDER_ID);
			CSaleBasket::OrderBasket($ORDER_ID, CSaleBasket::GetBasketUserID(), "s2");

			AddOrderProperty('NAME', $params['NAME'], $ORDER_ID);
			AddOrderProperty('EMAIL', $EMAIL, $ORDER_ID);
			AddOrderProperty('PHONE', $params['PHONE'], $ORDER_ID);
			AddOrderProperty('ADRESS', $params['ADRESS'], $ORDER_ID);
			AddOrderProperty('CITY', $deliv["ID"], $ORDER_ID);
			/* CSaleOrderPropsValue::Add(array('ORDER_ID' => $ORDER_ID,'ORDER_PROPS_ID' => 114,	'NAME' => 'Имя','CODE' => 'NAME','VALUE' => $params['NAME']));
			CSaleOrderPropsValue::Add(array('ORDER_ID' => $ORDER_ID,'ORDER_PROPS_ID' => 115,	'NAME' => 'Эл.Почта','CODE' => 'EMAIL','VALUE' => $EMAIL));
			CSaleOrderPropsValue::Add(array('ORDER_ID' => $ORDER_ID,'ORDER_PROPS_ID' => 116,	'NAME' => 'Телефон','CODE' => 'PHONE','VALUE' => $params['PHONE']));
			CSaleOrderPropsValue::Add(array('ORDER_ID' => $ORDER_ID,'ORDER_PROPS_ID' => 117,	'NAME' => 'Адрес доставки','CODE' => 'ADRESS','VALUE' => $params['ADRESS']));
			CSaleOrderPropsValue::Add(array('ORDER_ID' => $ORDER_ID,'ORDER_PROPS_ID' => 118,	'NAME' => 'Местоположение','CODE' => 'CITY','VALUE' => $deliv["ID"]));

			 */
//73 Я согласен оплатить наложенный платеж при получении	NALOZH_PL   check
//30 Ближайшая станция метро	NEAREST_METRO_STATION
//74 Я принимаю тот факт, что при отказе от оплаты мои идентификационные данные попадают в черный список интернет магазинов	OTKAZ   check

/*
			//письма пользователю и админу
			$fields1 = array(
				'ORDER_ID'       => $ORDER_ID,
				'ORDER_DATE'     => date("d.m.Y"),
				'ORDER_USER'     => $params["NAME"],
				//'EMAIL' => $params["EMAIL"],
				'CLIENT_EMAIL1'  => $EMAIL,
				'SALE_EMAIL'     => 'info@tdo.tw1.ru',
				'TELEPHONE'      => $params["TEL"],
				'ORDER_LIST1'    => $tovars1,
				'USER_PROPS'     => $props_user,
				'PRODUCT_PRICE'  => $order_summ,
				'DELIVERY_PRICE' => $delivery_price,
				'DELIVERY'       => $delivery_name,

				'PRICE' => intval($delivery_price + $order_summ),
			);
			$fields2 = array(
				'ORDER_ID'       => $ORDER_ID,
				'ORDER_DATE'     => date("d.m.Y"),
				'ORDER_USER'     => $params["NAME"],
				//'EMAIL' => $params["EMAIL"],
				'CLIENT_EMAIL1'  => $EMAIL,
				'SALE_EMAIL'     => 'info@tdo.tw1.ru',
				'TELEPHONE'      => $params["TEL"],
				'ORDER_LIST1'    => $tovars1,
				'USER_PROPS'     => $props_user . $props_ip,
				'PRODUCT_PRICE'  => $order_summ,
				'DELIVERY_PRICE' => $delivery_price,
				'DELIVERY'       => $delivery_name,

				'PRICE' => intval($delivery_price + $order_summ),
			);

			$obEvent = new CEvent();
			$obEvent->SendImmediate('SALE_ORDER_USER', LANG, $fields1);
			$obEvent2 = new CEvent();
			$obEvent2->SendImmediate('SALE_ORDER_ADMIN', LANG, $fields2);
*/


			$result["order_id"] = $ORDER_ID;
			$result["result"]   = true;
		} else {
			$result["result"] = false;
			//echo "ERROR:";//.$user->LAST_ERROR;
		}


	}// end add order

//    debug($result["items"]["7"]);
	if($action != "get-cities") {
		echo json_encode($result);
	}
	die();
}//end if action!=""


function GetBasketSumm() {
	$summ          = 0;
	$arSelect      = array();
	$dbBasketItems = CSaleBasket::GetList(array("NAME" => "ASC", "ID" => "ASC"), array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "ORDER_ID" => "NULL"), false, false,
	                                      $arSelect);
	while ($arItems = $dbBasketItems->Fetch()) {
		$arProps = array();
		$db_res  = CSaleBasket::GetPropsList(array("SORT" => "ASC", "NAME" => "ASC"), array("BASKET_ID" => $arItems["ID"]));
		while ($ar_res = $db_res->Fetch()) {
			$arProps[] = array($ar_res["CODE"] => $ar_res["VALUE"]);
		}
		$arResult["items"][] = array(
			"ID"         => $arItems["ID"],
			"PRODUCT_ID" => $arItems["PRODUCT_ID"],
			"NAME"       => $arItems["NAME"],
			"QUANTITY"   => $arItems["QUANTITY"],
			"PRICE"      => $arItems["PRICE"],
			"WEIGHT"     => $arItems["WEIGHT"],
			"PROPS"      => $arProps,
		);
		$summ                = $summ + ($arItems["PRICE"] * $arItems["QUANTITY"]);
	}

	return $summ;
}

function AddOrderProperty($code, $value, $order) {
	if(!strlen($code)) {
		return false;
	}
	if(CModule::IncludeModule('sale')) {
		if($arProp = CSaleOrderProps::GetList(array(), array('CODE' => $code))->Fetch()) {

			$db_vals = CSaleOrderPropsValue::GetList(
				array(),
				array(
					"ORDER_ID"       => $order,
					"ORDER_PROPS_ID" => $arProp["ID"],
				)
			);
			if($arVals = $db_vals->Fetch()) {
				CSaleOrderPropsValue::Update($arVals["ID"], array("VALUE" => $value));
			} else {
				CSaleOrderPropsValue::Add(array(
					                          'NAME'           => $arProp['NAME'],
					                          'CODE'           => $arProp['CODE'],
					                          'ORDER_PROPS_ID' => $arProp['ID'],
					                          'ORDER_ID'       => $order,
					                          'VALUE'          => $value,
				                          ));
			}
			//  тут можно увидеть ошибку, если что
			//global $APPLICATION;
			//var_dump($APPLICATION->GetException());
		}
	}
}

?>