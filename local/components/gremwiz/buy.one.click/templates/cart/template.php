<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
$sComponentFolder = $this->__component->__path;?>

<script type="text/javascript">
	//<![CDATA[
	$(function() {
		$("#boc_anch_cart").click(function(e){
			e.preventDefault();
			$(window).resize(function () {
				modalHeight = ($(window).height() - $("#boc_cart").height()) / 2;
				$("#boc_cart").css({
					'top': modalHeight + 'px'
				});
			});
			$(window).resize();
			$("#boc_body_cart").fadeIn(300);
			$("#boc_cart").fadeIn(300);
		});
		$("#boc_close_cart, #boc_body_cart").click(function(e){
			e.preventDefault();
			$("#boc_body_cart").fadeOut(300);
			$("#boc_cart").fadeOut(300);
		});
	});
	//]]>
	$(document).ready(function(){
		$('input[id="boc_tel_cart"]').mask("+7 (999) 999-9999");
	})
</script>


	<form action="<?=$APPLICATION->GetCurPage()?>" class="new_boc_form_cart">
		<span id="echo_boc_form_cart"></span>

		    <div class="page_cart__order__item">
                <div class="page_cart__order__item__title"><?=GetMessage("MFT_NAME")?><?if(empty($arParams["REQUIRED_ORDER_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_ORDER_FIELDS"])):?><span class="mf-req">*</span><?endif?></div>
                <div class="page_cart__order__item__value">
                
			<input type="text" maxlength="250" size="40" id="boc_name_cart" name="boc_name_cart" class="inputbox form-query " placeholder="как к Вам можно обращаться" value="<?=$arResult['NAME']?>">
									   </div>
            </div>
			
			             <div class="page_cart__order__item">
                <div class="page_cart__order__item__title"><?=GetMessage("MFT_TEL")?><?if(empty($arParams["REQUIRED_ORDER_FIELDS"]) || in_array("TEL", $arParams["REQUIRED_ORDER_FIELDS"])):?><span class="mf-req">*</span><?endif?></div>
                <div class="page_cart__order__item__value">
       

	<input class="inputbox form-query" type="text" maxlength="250" size="40" value=""  id="boc_tel_cart" name="boc_tel_cart" placeholder="уточним детали заказа">
									   </div>
            </div>
		

		<input type="hidden" id="boc_method_cart" name="boc_method_cart" value="boc"/>
		<input type="hidden" class="input-text" id="boc_email_cart" name="boc_email_cart" value="guest@tdobu.ru" />
		<input type="hidden" id="boc_personTypeId_cart" name="boc_personTypeId_cart" value="<?=$arParams['DEFAULT_PERSON_TYPE']?>" />
		<input type="hidden" id="boc_propNameId_cart" name="boc_propNameId_cart" value="<?=$arParams['DEFAULT_ORDER_PROP_NAME']?>" />
		<input type="hidden" id="boc_propTelId_cart" name="boc_propTelId_cart" value="<?=$arParams['DEFAULT_ORDER_PROP_TEL']?>" />
		<input type="hidden" id="boc_propEmailId_cart" name="boc_propEmailId_cart" value="<?=$arParams['DEFAULT_ORDER_PROP_EMAIL']?>" />
		<input type="hidden" id="boc_deliveryId_cart" name="boc_deliveryId_cart" value="<?=$arParams['DEFAULT_DELIVERY']?>" />
		<input type="hidden" id="boc_paysystemId_cart" name="boc_paysystemId_cart" value="<?=$arParams['DEFAULT_PAYMENT']?>" />
		<input type="hidden" id="boc_buyMode_cart" name="boc_buyMode_cart" value="<?=$arParams['BUY_MODE']?>" />		
		<input type="hidden" id="boc_dubLetter_cart" name="boc_dubLetter_cart" value="<?=$arParams['DUB']?>" />		
		<div class="submit">
			<button onclick="button_boc('<?=$sComponentFolder?>', '<?=$arResult["REQUIRED"]?>', 'cart');" type="button" name="send_button" class="btn_buy popdef" style="background: #fff;
    padding-top: 12px;
    padding-bottom: 12px;
    border: 1px solid #d2d2d2;
    color: #707070;
    font-size: 14px;
    line-height: 14px;
    padding: 13px 50px;
    position: relative;
    display: inline-block;
    vertical-align: middle;
    text-decoration: none;
    font-size: 17px;
    line-height: 18px;
    text-align: center;
    padding: 10px 16px 8px 17px;
    cursor: pointer;
    border-radius: 3px;
    /* border: none; */
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    transition-property: background-color, border-color;
    transition: 0.8s;">Купить в 1 клик</button>			
		</div>
	</form>
