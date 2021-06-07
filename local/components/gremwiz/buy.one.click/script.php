<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require(dirname(__FILE__)."/lang/".LANGUAGE_ID."/script.php");
function GetIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
if(!CModule::IncludeModule("sale") || !CModule::IncludeModule("iblock") || !CModule::IncludeModule("catalog") || !CModule::IncludeModule("currency"))
	die();

if($_SERVER["HTTP_X_REQUESTED_WITH"] == "XMLHttpRequest" && $_POST["METHOD"] == "boc") {

    $error = "";

	$REQUIRED = array();
	$REQUIRED = explode("/", $_POST["REQUIRED"]);	

	if(empty($REQUIRED) || in_array("NAME", $REQUIRED)):
		if(!isset($_POST["NAME"]) || !strlen($_POST["NAME"])) {
			$error .= GetMessage("NAME_NOT_FILLED")."<br />";
			$return = true;
		}
	endif;

	if(empty($REQUIRED) || in_array("TEL", $REQUIRED)):
		if(!isset($_POST["TEL"]) || !strlen($_POST["TEL"])) {
			$error .= GetMessage("TEL_NOT_FILLED")."<br />";
			$return = true;
		}
	endif;

	if(empty($REQUIRED) || in_array("EMAIL", $REQUIRED)):
		if(!isset($_POST["EMAIL"]) || !strlen($_POST["EMAIL"])) {
			$error .= GetMessage("EMAIL_NOT_FILLED")."<br />";
			$return = true;
		}
	endif;

	if(empty($REQUIRED) || in_array("MESSAGE", $REQUIRED)):
		if(!isset($_POST["MESSAGE"]) || !strlen($_POST["MESSAGE"])) {
			$error .= GetMessage("MESSAGE_NOT_FILLED")."<br />";
			$return = true;
		}
	endif;


	if($return == true) {

		echo "<span class='alertMsg bad'  style='color:red;'><span class='text'>".$error."</span></span>";
        return;
    }

	$_POST["NAME"] = iconv("UTF-8", SITE_CHARSET, strip_tags(trim($_POST["NAME"])));
    $_POST["TEL"] = iconv("UTF-8", SITE_CHARSET, strip_tags(trim($_POST["TEL"])));
	$_POST["EMAIL"] = iconv("UTF-8", SITE_CHARSET, strip_tags(trim($_POST["EMAIL"])));
	$_POST["MESSAGE"] = iconv("UTF-8", SITE_CHARSET, strip_tags(trim($_POST["MESSAGE"])));
	
	
	/***USER_REGISTER***/
	global $USER, $APPLICATION;
	$register_new_user = $send_letter = false;
	
	/***USER_NOT_AUTHORIZED***/
	if(!$USER->IsAuthorized()) {		
		$new_login = "user_".time();
		$new_email = $new_login."@tdobucrm.com";
		
		$register_new_user = true;

		if(!empty($_POST["EMAIL"]))
			$send_letter = true;		
		
		if($register_new_user) {
			$use_captcha = COption::GetOptionString("main", "captcha_registration", "N");
			if($use_captcha == "Y")
				COption::SetOptionString("main", "captcha_registration", "N");
			
			$new_password = randString(10);

			$use_email_confirm = COption::GetOptionString("main", "new_user_registration_email_confirmation", "N");
			if($use_email_confirm == "Y")
				COption::SetOptionString("main", "new_user_registration_email_confirmation", "N");
			
			$newUser = $USER->Register($new_login, $_POST["NAME"], "", 'M2D88qyFXj2tudreg8k', 'M2D88qyFXj2tudreg8k', $new_email);
			
			if($use_captcha == "Y")
				COption::SetOptionString("main", "captcha_registration", "Y");

			if($use_email_confirm == "Y")
				COption::SetOptionString("main", "new_user_registration_email_confirmation", "Y");
			
			if($newUser["TYPE"] != "ERROR") {
				$registeredUserID = $USER->GetID();				
			} 
		}	
	/***USER_AUTHORIZED***/
	} else {		
		$send_letter = true;
		$registeredUserID = $USER->GetID();	
	}

	$basketUserID = CSaleBasket::GetBasketUserID();
		
	
	/***CREATE_ORDER***/
	if($_POST["buyMode"] == "ONE") {
		CSaleBasket::DeleteAll($basketUserID);
		
		$arProps = array();
		if(isset($_POST["element_props"]) && !empty($_POST["element_props"])):
			$arPropsBefore = unserialize(gzuncompress(stripslashes(base64_decode(strtr($_POST["element_props"], "-_,", "+/=")))));
			foreach($arPropsBefore as $arProp):
				$arProps[] = $arProp;
			endforeach;
		endif;
		if(isset($_POST["element_select_props"]) && !empty($_POST["element_select_props"])):
			$select_props = explode("||", $_POST["element_select_props"]);
			foreach($select_props as $arSelProp):
				$arProps[] = unserialize(gzuncompress(stripslashes(base64_decode(strtr($arSelProp, "-_,", "+/=")))));
			endforeach;
		endif;

		Add2BasketByProductID($_POST["ELEMENT_ID"], $_POST["quantity"], array(), $arProps);
	}

	$dbBasketItems = CSaleBasket::GetList(
		array("ID" => "ASC"),
		array(
			"FUSER_ID" => $basketUserID,
			"LID" => SITE_ID,
			"ORDER_ID" => "NULL",
			"DELAY" => "N"
		),
		false,
		false,
		array()
	);

	while($arItem = $dbBasketItems->GetNext()) {
		if($arItem["VAT_RATE"] > 0) {
			$arResult["bUsingVat"] = "Y";
		}
		$arResult["BASKET_ITEMS"][] = $arItem;
	}

	/***PERSON_TYPE***/
	$personTypeId = intval($_POST["personTypeId"]) > 0 ? $_POST["personTypeId"] : 0;
	if($personTypeId <= 0) {
		$obPersonType = CSalePersonType::GetList(
			array("SORT" => "ASC"),
			array("LID" => SITE_ID, "ACTIVE" => "Y"),
			false,
			array("nTopCount" => "1"),
			array("ID", "NAME")
		);
		if($arPersonType = $obPersonType->Fetch()) {
			$personTypeId = $arPersonType["ID"];
		}
	}
	
	/***DELIVERY***/
	$deliveryId = intval($_POST["deliveryId"]) > 0 ? $_POST["deliveryId"] : 0;
	if($deliveryId <= 0) {
		$obDelivery = CSaleDelivery::GetList(
			array("SORT" => "ASC"),
			array("LID" => SITE_ID, "ACTIVE" => "Y"),
			false,
			array("nTopCount" => "1"),
			array("ID", "NAME")
		);
		if($arDelivery = $obDelivery->Fetch()) {	
			$deliveryId = $arDelivery["ID"];
		}
	}	
	$deliveryId = intval($deliveryId) > 0 ? \Bitrix\Sale\Delivery\Services\Table::getCodeById($deliveryId) : "";
	
	/***PAYSYSTEM***/
	$paysystemId = intval($_POST["paysystemId"]) > 0 ? $_POST["paysystemId"] : 0;
	if($paysystemId <= 0) {
		$obPaySystem = CSalePaySystem::GetList(
			array("SORT" => "ASC"),
			array("LID" => SITE_ID, "ACTIVE" => "Y"),
			false,
			array("nTopCount" => "1"),
			array("ID", "NAME")
		);
		if($arPaySystem = $obPaySystem->Fetch()) {	
			$paysystemId = $arPaySystem["ID"];			
		}
	}
	
	/***ORDER_PROPS***/
	$orderProps = array(
		$_POST["propNameId"] => $_POST["NAME"],		
		$_POST["propTelId"] => $_POST["TEL"],
		$_POST["propEmailId"] => $_POST["EMAIL"]		
	);
	
	$obOrderProps = CSaleOrderProps::GetList(
		array("SORT" => "ASC"),
		array(),
		false,
		false,
		array()
	);
	while($arOrderProp = $obOrderProps->Fetch()) {		
		if($arOrderProp["TYPE"] == "LOCATION") {
			$orderProps[$arOrderProp["ID"]] = "";
		}
		if($arOrderProp["CODE"] == "CITY") {
			$orderProps[$arOrderProp["ID"]] = "";
		}
	}
	
	/***CALCULATE_ORDER***/
	$arOrderDat = CSaleOrder::DoCalculateOrder(
		SITE_ID,
		$registeredUserID,
		$arResult["BASKET_ITEMS"],
		$personTypeId,
		$orderProps,
		$deliveryId,
		$paysystemId,
		array(),
		$arErrors,
		$arWarnings
	);	
	
	$arResult["BASE_LANG_CURRENCY"] = CSaleLang::GetLangCurrency(SITE_ID);

	$arResult["ORDER_PRICE"] = $arOrderDat["ORDER_PRICE"];
	$arResult["ORDER_PRICE_FORMATED"] = SaleFormatCurrency($arResult["ORDER_PRICE"], $arResult["BASE_LANG_CURRENCY"]);

	$arResult["USE_VAT"] = $arOrderDat["USE_VAT"];
	$arResult["VAT_SUM"] = $arOrderDat["VAT_SUM"];
	$arResult["VAT_SUM_FORMATED"] = SaleFormatCurrency($arResult["VAT_SUM"], $arResult["BASE_LANG_CURRENCY"]);

	$arResult["TAX_PRICE"] = $arOrderDat["TAX_PRICE"];
	$arResult["TAX_LIST"] = $arOrderDat["TAX_LIST"];

	$arResult["DISCOUNT_PRICE"] = $arOrderDat["DISCOUNT_PRICE"];

	$arResult["DELIVERY_PRICE"] = $arOrderDat["PRICE_DELIVERY"];
	$arResult["DELIVERY_PRICE_FORMATED"] = SaleFormatCurrency($arOrderDat["DELIVERY_PRICE"], $arResult["BASE_LANG_CURRENCY"]);

	$arResult["BASKET_ITEMS"] = $arOrderDat["BASKET_ITEMS"];

	$orderTotalSum = $arResult["ORDER_PRICE"] + $arResult["DELIVERY_PRICE"] + $arResult["TAX_PRICE"] - $arResult["DISCOUNT_PRICE"];

	$arFields = array(
		"LID" => SITE_ID,
		"PERSON_TYPE_ID" => $personTypeId,
		"PAYED" => "N",
		"CANCELED" => "N",
		"STATUS_ID" => "N",
		"PRICE" => $orderTotalSum,
		"CURRENCY" => $arResult["BASE_LANG_CURRENCY"],
		"USER_ID" => $registeredUserID,
		"PAY_SYSTEM_ID" => $paysystemId,
		"PRICE_DELIVERY" => $arResult["DELIVERY_PRICE"],
		"DELIVERY_ID" => $deliveryId,
		"DISCOUNT_VALUE" => $arResult["DISCOUNT_PRICE"],
		"TAX_VALUE" => $arResult["bUsingVat"] == "Y" ? $arResult["VAT_SUM"] : $arResult["TAX_PRICE"],
		"USER_DESCRIPTION" => !empty($_POST["MESSAGE"]) ? $_POST["MESSAGE"] : "",
		"COMMENTS" => GetMessage("ORDER_COMMENT")
	);	
	
	/***STAT_GID***/
	if(CModule::IncludeModule("statistic"))
		$arFields["STAT_GID"] = CStatistic::GetEventParam();

	/***AFFILIATE_ID***/
	$affiliateID = CSaleAffiliate::GetAffiliate();
	if($affiliateID > 0) {
		$dbAffiliat = CSaleAffiliate::GetList(array(), array("SITE_ID" => SITE_ID, "ID" => $affiliateID));
		$arAffiliates = $dbAffiliat->Fetch();
		if(count($arAffiliates) > 1)
			$arFields["AFFILIATE_ID"] = $affiliateID;
	} else
		$arFields["AFFILIATE_ID"] = false;

	/***SAVE_ORDER***/
	$arResult["ORDER_ID"] = (int)CSaleOrder::DoSaveOrder($arOrderDat, $arFields, 0);
	
	$arOrder = array();
	if($arResult["ORDER_ID"] > 0) {
		$arOrder = CSaleOrder::GetByID($arResult["ORDER_ID"]);
		CSaleBasket::OrderBasket($arResult["ORDER_ID"], $basketUserID, SITE_ID, false);		
		 AddOrderProperty('NAME', $_POST["NAME"], $arResult["ORDER_ID"]);
		 AddOrderProperty('EMAIL', $email, $arResult["ORDER_ID"]);
	     AddOrderProperty('PHONE', $_POST["TEL"], $arResult["ORDER_ID"]);

		/***MESSAGE***/
		//href="/cart/order.php?order_id="+items.order_id;
         //window.location.href = href;
		echo $arResult["ORDER_ID"];	
		
		//echo "<script>$('#boc_".$_POST["ELEMENT_CODE"].$_POST["ELEMENT_ID"]." .btn_buy').prop('disabled', true);</script>";

		/***LOGOUT_NEW_USER***/
		if($register_new_user) {
			$USER->Logout();
		}

		/***MAIL_MESSAGE***/
		$strOrderList = "";
		$arBasketList = array();
		
		$dbBasketItems = CSaleBasket::GetList(
			array("ID" => "ASC"),
			array("ORDER_ID" => $arResult["ORDER_ID"]),
			false,
			false,
			array("ID", "PRODUCT_ID", "NAME", "QUANTITY", "PRICE", "CURRENCY", "TYPE", "SET_PARENT_ID")
		);
		
		while($arItem = $dbBasketItems->Fetch()) {
			$arBasketList[] = $arItem;
		}

		$arBasketList = getMeasures($arBasketList);

		foreach($arBasketList as $arItem) {
			$measureText = (isset($arItem["MEASURE_TEXT"]) && strlen($arItem["MEASURE_TEXT"])) ? $arItem["MEASURE_TEXT"] : GetMessage("SOA_SHT");

			$strOrderList .= $arItem["NAME"]." - ".$arItem["QUANTITY"]." ".$measureText.": ".SaleFormatCurrency($arItem["PRICE"], $arItem["CURRENCY"]);
			$strOrderList .= "\n";
		}

		$email = "";
		$bcc = array();
		$duplicate = "N";
		
		if(isset($_POST["dubLetter"]) && 0 < strlen($_POST["dubLetter"])) {
			$rsSites = CSite::GetList($by = "sort", $order = "desc", Array("ACTIVE" => "Y"));
			while($arSite = $rsSites->Fetch()) {
				if(strpos($_POST["dubLetter"], "default_".$arSite["LID"]) !== false) {					
					$default_email = $arSite["EMAIL"];
					if(!empty($default_email))
						$bcc[] = $default_email;
				}
			}

			if(strpos($_POST["dubLetter"], "admin") !== false) {
				$admin_email = COption::GetOptionString("main", "email_from", "");
				if(!empty($admin_email))
					$bcc[] = $admin_email;
			}

			if(strpos($_POST["dubLetter"], "sales") !== false) {
				$sales_email = COption::GetOptionString("sale", "order_email", "");
				if(!empty($sales_email))
					$bcc[] = $sales_email;
			}

			if(strpos($_POST["dubLetter"], "dub") !== false) {
				$dub_email = COption::GetOptionString("main", "all_bcc", "");
				if(!empty($dub_email))
					$duplicate = "Y";
			}
		}
		$bcc = array_unique($bcc);		

		if($send_letter) {
			$email = $_POST["EMAIL"];
		} else {
			if(empty($bcc)) {
				if($duplicate == "Y")
					$email = COption::GetOptionString("main", "all_bcc", "");
			} else
				$email = array_shift($bcc);
		}
$getip = GetIP();
   
		if(strlen($email) > 0)	{
			$arFields = Array(
				"ORDER_ID" => $arOrder["ACCOUNT_NUMBER"],
				"ORDER_DATE" => Date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT", SITE_ID))),
				"USER_NAME" => $_POST["NAME"],
				"USER_PHONE" => $_POST["TEL"],
				"PRICE" => $arOrder['PRICE'],
				"EMAIL" => $email,
				"IP" => $getip,
				//"IP" = > $getip,
				"TYPE" => 'Быстрый заказ',
				
				"ORDER_LIST" => $strOrderList,
				//"SALE_EMAIL" => COption::GetOptionString("sale", "order_email", "sales@".$SERVER_NAME),
				"DELIVERY_PRICE" => $arResult["DELIVERY_PRICE"],
			);

			$eventName = "ONECLICKBUY_ORDER";
			$event = new CEvent;			
			$event->Send($eventName, SITE_ID, $arFields, "N");
		}

		CSaleMobileOrderPush::send("ORDER_CREATED", array("ORDER_ID" => $arFields["ORDER_ID"]));


		/***STATISTIC***/
		if(CModule::IncludeModule("statistic")) {
			$event1 = "eStore";
			$event2 = "order_confirm";
			$event3 = $arResult["ORDER_ID"];

			$e = $event1."/".$event2."/".$event3;

			if(!is_array($_SESSION["ORDER_EVENTS"]) || (is_array($_SESSION["ORDER_EVENTS"]) && !in_array($e, $_SESSION["ORDER_EVENTS"]))) {
				CStatistic::Set_Event($event1, $event2, $event3);
				$_SESSION["ORDER_EVENTS"][] = $e;
			}
		}		
	} else {		
		/***MESSAGE***/
		echo "<span class='alertMsg bad'><i class='fa fa-times'></i><span class='text'>".GetMessage("ORDER_CREATE_ERROR")."</span></span>";
		
		/***LOGOUT_NEW_USER***/
		if($register_new_user) {
			$USER->Logout();
		}
	}	
}
function AddOrderProperty($code, $value, $order)    {
        if (!strlen($code)) {
            return false;
        }
        if (CModule::IncludeModule('sale')) {
            if ($arProp = CSaleOrderProps::GetList(array(), array('CODE' => $code))->Fetch()) {

                $db_vals = CSaleOrderPropsValue::GetList(
                    array(),
                    array(
                        "ORDER_ID" => $order,
                        "ORDER_PROPS_ID" => $arProp["ID"]
                    )
                );
                if ($arVals = $db_vals->Fetch()) {
                    CSaleOrderPropsValue::Update($arVals["ID"], array("VALUE"=>$value));
                } else {
                    CSaleOrderPropsValue::Add(array(
                        'NAME' => $arProp['NAME'],
                        'CODE' => $arProp['CODE'],
                        'ORDER_PROPS_ID' => $arProp['ID'],
                        'ORDER_ID' => $order,
                        'VALUE' => $value,
                    ));
                }
                //  тут можно увидеть ошибку, если что
                //global $APPLICATION;
                //var_dump($APPLICATION->GetException());
            }
        }
    }
?>