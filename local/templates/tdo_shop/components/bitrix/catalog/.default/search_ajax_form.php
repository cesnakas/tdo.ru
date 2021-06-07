<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
if ($_POST["sessid"] == strtotime('today midnight')) {



    CModule::IncludeModule('iblock');

    $el = new CIBlockElement;

    $PROPS["PHONE"]=$_POST["phone"];
    $PROPS["TOVAR"]=$_POST["TOVAR"];
    $PROPS["EMAIL"]=$_POST["EMAIL"];
    // свойству с кодом 3 присваиваем значение 38

    $arLoadProductArray = array(
        "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
        "IBLOCK_ID" => 49,
        "PROPERTY_VALUES" => $PROPS,
        "NAME" => $_POST["NAME"],
    );

    if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
        $ANSWER["SUCSESS"] = "Y";
        $ANSWER["TEXT"] = "Спасибо, Ваша заявка получена";
    } else {
        $ANSWER["SUCSESS"] = "Y";
        $ANSWER["TEXT"] = "Ошибка: " . $el->LAST_ERROR;;

    }

    echo json_encode($ANSWER);
}
?>