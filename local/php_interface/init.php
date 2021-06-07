<?

// Убираем описания из поиска
AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
function BeforeIndexHandler($arFields) {
    $arrIblock = array(26);
    $arDelFields = array("DETAIL_TEXT", "PREVIEW_TEXT") ;
    if (CModule::IncludeModule('iblock') && $arFields["MODULE_ID"] == 'iblock' && in_array($arFields["PARAM2"], $arrIblock) && intval($arFields["ITEM_ID"]) > 0){
        $dbElement = CIblockElement::GetByID($arFields["ITEM_ID"]) ;
        if ($arElement = $dbElement->Fetch()){
            foreach ($arDelFields as $value){
                if (isset ($arElement[$value]) && strlen($arElement[$value]) > 0){
                    $arFields["BODY"] = str_replace (CSearch::KillTags($arElement[$value]) , "", CSearch::KillTags($arFields["BODY"]) );
                }
            }
        }
        return $arFields;
    }
}





AddEventHandler("iblock", "OnAfterIBlockElementUpdate",  "OnAfterIBlockElementUpdateHandler");


// создаем обработчик события "OnAfterIBlockElementUpdate"
function OnAfterIBlockElementUpdateHandler(&$arFields)
{

    if($arFields["IBLOCK_ID"]=="26"){
        $arSelect = Array("ID", "NAME", "PROPERTY_CONDITION");
        $arFilter = Array("IBLOCK_ID"=>IntVal($arFields["IBLOCK_ID"]), "ID"=>$arFields["ID"],"ACTIVE"=>"Y");
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nTopCount"=>1), $arSelect);
        while($ob = $res->GetNextElement())
        {
            $arFields2 = $ob->GetFields();
        }

        if(!empty($arFields2["PROPERTY_CONDITION_ENUM_ID"])){

            if($arFields2["PROPERTY_CONDITION_ENUM_ID"] != "70" && $arFields2["PROPERTY_CONDITION_ENUM_ID"] != "71" && $arFields2["PROPERTY_CONDITION_ENUM_ID"] != "207731" ){

                $el = new CIBlockElement;
                $arLoadProductArray = Array(
                    "ACTIVE"    => "N" // элемент изменен текущим пользователем
                );
                $res = $el->Update($arFields["ID"], $arLoadProductArray);

            }

        }
    }
}




AddEventHandler("sale", "OnOrderNewSendEmail", "bxModifySaleMails");

function bxModifySaleMails($orderID, &$eventName, &$arFields)
{
    $arOrder = CSaleOrder::GetByID($orderID);

    //-- получаем телефоны и адрес
    $order_props = CSaleOrderPropsValue::GetOrderProps($orderID);
    $phone="";
    $index = "";
    $country_name = "";
    $city_name = "";
    $address = "";
    while ($arProps = $order_props->Fetch())
    {
        if ($arProps["CODE"] == "PHONE")
        {
            $phone = htmlspecialchars($arProps["VALUE"]);
        }
        if ($arProps["CODE"] == "LOCATION")
        {
            $arLocs = CSaleLocation::GetByID($arProps["VALUE"]);
            $country_name =  $arLocs["COUNTRY_NAME_ORIG"];
            $city_name = $arLocs["CITY_NAME_ORIG"];
        }

        if ($arProps["CODE"] == "INDEX")
        {
            $index = $arProps["VALUE"];
        }

        if ($arProps["CODE"] == "ADDRESS")
        {
            $address = $arProps["VALUE"];
        }
    }

    //$full_address = $index.", ".$country_name." ".$city_name.", ".$address;
    $full_address = $country_name." - ".$city_name;

    //-- получаем название службы доставки
    $arDeliv = CSaleDelivery::GetByID($arOrder["DELIVERY_ID"]);
    $delivery_name = "";
    $delivery_desc = "";
    if ($arDeliv)
    {
        $delivery_name = $arDeliv["NAME"];
        $delivery_desc = $arDeliv["DESCRIPTION"];
    }

    //-- генерируем срок достаки
    $delivery_period_type = "";

    switch ($arDeliv["PERIOD_TYPE"]) {
        case "D":
            $delivery_period_type = "дней";
            break;
        case "H":
            $delivery_period_type = "часов";
            break;
        case "M":
            $delivery_period_type = "месяцев";
            break;
    }

    //-- получаем название платежной системы
    $arPaySystem = CSalePaySystem::GetByID($arOrder["PAY_SYSTEM_ID"]);
    $pay_system_name = "";
    if ($arPaySystem)
    {
        $pay_system_name = $arPaySystem["NAME"];
    }


    // изменяем список товаров в заказе
    if(CModule::IncludeModule("sale") && CModule::IncludeModule("iblock"))
    {
      $strOrderList = "";
      $dbBasketItems = CSaleBasket::GetList(
                 array("NAME" => "ASC"),
                 array("ORDER_ID" => $orderID),
                 false,
                 false,
                 array("PRODUCT_ID", "ID", "NAME", "QUANTITY", "PRICE", "CURRENCY")
               );
      while ($arBasketItems = $dbBasketItems->Fetch())
      {

        //$strOrderList .= $arBasketItems["ID"]." - ".$arBasketItems["NAME"]." - ".$arBasketItems["QUANTITY"]." ".GetMessage("SOA_SHT").": ".SaleFormatCurrency($arBasketItems["PRICE"], $arBasketItems["CURRENCY"]);

        $strOrderList .= "<b>" .$arBasketItems["NAME"]."</b>, количество: <b>".$arBasketItems["QUANTITY"]." шт</b>, цена: <b>" .SaleFormatCurrency($arBasketItems["PRICE"], $arBasketItems["CURRENCY"]). "</b>";

        $strOrderList .= "\n";
      }
      $arFields["ORDER_LIST"] = $strOrderList;
    }



    //-- добавляем новые поля в массив результатов
    $arFields["ORDER_DESCRIPTION"] = $arOrder["USER_DESCRIPTION"];
    $arFields["PHONE"] =  $phone;

    $arFields["DELIVERY_NAME"] =  $delivery_name;
    $arFields["DELIVERY_DESC"] =  $delivery_desc;

    $arFields["DELIVERY_PRICE"] =  $arOrder["PRICE_DELIVERY"];
    $arFields["DELIVERY_PERIOD_TYPE"] =  $delivery_period_type;
    $arFields["DELIVERY_PERIOD_FROM"] =  $arDeliv["PERIOD_FROM"];
    $arFields["DELIVERY_PERIOD_TO"] =  $arDeliv["PERIOD_TO"];

    $arFields["ADDRESS"] = $address;
    $arFields["FULL_ADDRESS"] = $full_address;
    $arFields["PAY_SYSTEM_NAME"] =  $pay_system_name;
}



// 404
AddEventHandler('main', 'OnEpilog', '_Check404Error', 1);
function _Check404Error(){
    if (defined('ERROR_404') && ERROR_404 == 'Y') {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();

        
        if(stripos($APPLICATION->GetCurDir(),"/catalog/") !== false && $APPLICATION->GetPageProperty("ISELEMENT_INCATALG")=="Y"){
            $arr=explode("/",$APPLICATION->GetCurDir());
            unset($arr[count($arr)-1]);
            unset($arr[count($arr)-1]);
            $str=implode (  $arr ,  '/' )."/";
            LocalRedirect($str);
        }




        include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/header.php';
        include $_SERVER['DOCUMENT_ROOT'] . '/404.php';
        include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/footer.php';
    }
}


