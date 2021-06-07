<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Спасибо!");
global $APPLICATION;

if($_REQUEST["order_id"] > 0) {
	$orderid = $_REQUEST["order_id"];
} elseif($_REQUEST["orderclick_id"] > 0) {
	$type    = 'быстрого ';
	$orderid = $_REQUEST["orderclick_id"];
}


$order_show = CSaleOrder::GetByID($orderid);

$basketIterator = \CSaleBasket::GetList(
	array(
		'NAME' => 'ASC',
	),
	array(
		'ORDER_ID' => $orderid,
	),
	false,
	false,
	array(
		'PRODUCT_ID',
		'NAME',
		'PRICE',
		'QUANTITY',
	)
);

$basketItems = array();
$productsIds = array();
$productsData = array();

while ($basketItem = $basketIterator->fetch()) {
	$basketItems[] = $basketItem;

	$productsIds[] = $basketItem['PRODUCT_ID'];
}


?>
    <script>
        window.addEventListener('load', function () {
			<?if(!empty($_GET['orderclick_id'])){ ?>
            /* if (localStorage.getItem("SB") != 1){ */
            ingEvents.Event({category: 'forms', action: 'submit', label: 'oneclick_na', ya_label: 'oneclick_na', goalParams: {}});
            localStorage.setItem("SB", 1);
            /* } */
			<?} elseif(!empty($_GET['order_id'])){?>
            /* if (localStorage.getItem("SB") != 1){ */
            ingEvents.Event({category: 'forms', action: 'submit', label: 'zakaz_na', ya_label: 'zakaz_na', goalParams: {}});
            localStorage.setItem("SB", 1);
            /* } */
			<? }?>
        });
    </script>
    <div style="margin: 40px auto 60px auto;line-height: 35px;">
        <div style="text-align: center; "><span class="Apple-style-span" style="color: rgb(74, 73, 68); font-family: Arial, Helvetica, sans-serif; "><b><font
                            class="Apple-style-span" size="5">Спасибо за сделанный заказ!</font></b></span></div>

        <div style="text-align: center; "><span class="Apple-style-span" style="color: rgb(74, 73, 68); font-family: Arial, Helvetica, sans-serif; "><b><font
                            class="Apple-style-span" size="5">Номер Вашего <?=$type?>заказа : <?=intval($orderid)?></font></b></span></div>

        <div style="text-align: center; "><span class="Apple-style-span" style="color: rgb(74, 73, 68); font-family: Arial, Helvetica, sans-serif; ">В ближайшее время наш менеджер свяжется с Вами!</span>
        </div>
    </div>
<?

/*

$order              = Bitrix\Sale\Order::load($orderid);
$propertyCollection = $order->getPropertyCollection();
$nameProp           = $propertyCollection->getPayerName();
$phoneProp          = $propertyCollection->getPhone();
if($nameProp) {
	$namePropValue = $nameProp->getValue();
}
if($phoneProp) {
	$phonePropValue = $phoneProp->getValue();
}
$phonePropValue = str_replace([' ', '(', ')', '-'], "", substr($phonePropValue, 4));

?>
    <div id="pos-credit-container"></div>
    <script src="https://my.pochtabank.ru/sdk/v1/pos-credit.js"></script>
    <script>
        var items = [];
		<?foreach ($basketItems as $basketItem) {?>
        items.push({
            model: "<?=$basketItem['NAME']?>",
            quantity: parseInt(<?=$basketItem['QUANTITY']?>),
            price: parseFloat(<?=$basketItem['PRICE']?>)
        });
		<?}?>
        console.log(items);
        var options = {
            ttCode: '1014001002912',
            ttName: 'г. Москва, Алтуфьевское ш.,37с2',
            fullName: '<?=$namePropValue?>',
            phone: '<?=$phonePropValue?>',
            extAppId: '<?=$orderid?>',
            order: items
        };
        window.PBSDK.posCredit.mount('#pos-credit-container', options);
        // подписка на событие завершения заполнения заявки
        window.PBSDK.posCredit.on('done', function (id) {
            console.log('Id заявки: ' + id)
        });

        // При необходимости можно убрать виджет вызвать unmount
        // window.PBSDK.posCredit.unmount('#pos-credit-container');
    </script>

<? /*
<form action="https://loans.tinkoff.ru/api/partners/v1/lightweight/create " method="post" style="text-align: center;
    margin-top: 10px;">
<input name="shopId" value="a9b4ae6f-ff88-46b3-bdfe-b17d2e0d65e0" type="hidden"/> 
<input name="showcaseId" value="f349b9e7-e3de-40f1-b82a-296e254ff043" type="hidden"/> 
<input name="promoCode" value="default" type="hidden"/>
<input name="sum" value="<?=$order_show['PRICE']?>" type="hidden">
<?$i = -1;foreach ($basketItems as $basketItem) {$i++;?>
<?//print_r($basketItem);?>
<input name="itemName_<?=$i?>" value="<?=$basketItem['NAME']?>" type="hidden"/>
<input name="itemQuantity_<?=$i?>" value="<?=$basketItem['QUANTITY']?>"" type="hidden"/>
<input name="itemPrice_<?=$i?>" value="<?=$basketItem['PRICE']?>"" type="hidden"/> 
 
<?}?>
<input name="orderNumber" value="<?=$orderid?>" type="hidden"/>   
<input name="customerEmail" value="<?=$order_show['USER_EMAIL']?>" type="hidden"/>
<input type="submit" class="button7" value="Оформить заявку на кредит"/>
</form>
*/ ?>
    <style>

        .button7 {
            text-align: center;
            font-weight: 700;
            color: white;
            text-decoration: none;
            padding: .8em 1em calc(.8em + 3px);
            border-radius: 3px;
            background: rgb(64, 199, 129);
            box-shadow: 0 -3px rgb(53, 167, 110) inset;
            transition: 0.2s;
        }

        .button7:hover {
            background: rgb(53, 167, 110);
        }

        .button7:active {
            background: rgb(33, 147, 90);
            box-shadow: 0 3px rgb(33, 147, 90) inset;
        }
    </style>

<?

///*

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>