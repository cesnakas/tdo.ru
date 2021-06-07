function button_boc(path, required, element_id) {
    $.ajax({
        type: "POST",
        url : path + "/script.php",
        data: ({
            NAME			: $("#boc_name_" + element_id).val(),
            TEL				: $("#boc_tel_" + element_id).val(),
			EMAIL			: $("#boc_email_" + element_id).val(),
			MESSAGE			: $("#boc_message_" + element_id).val(),
			captcha_word	: $("#boc_captcha_word_" + element_id).val(),
            captcha_sid		: $("#boc_captcha_sid_" + element_id).val(),
			METHOD			: $("#boc_method_" + element_id).val(),
			personTypeId	: $("#boc_personTypeId_" + element_id).val(),
			propNameId		: $("#boc_propNameId_" + element_id).val(),
			propTelId		: $("#boc_propTelId_" + element_id).val(),
			propEmailId		: $("#boc_propEmailId_" + element_id).val(),
			deliveryId		: $("#boc_deliveryId_" + element_id).val(),
			paysystemId		: $("#boc_paysystemId_" + element_id).val(),
			buyMode			: $("#boc_buyMode_" + element_id).val(),			
			dubLetter		: $("#boc_dubLetter_" + element_id).val(),			
			REQUIRED		: required,
			ELEMENT_ID		: element_id
        }),
        success: function (html) {
			if(intval(html) > 0 ){
				yaCounter30605352.reachGoal('order-in-click');
				href="/cart/order.php?orderclick_id="+html;	
				window.location.href = href;
			}else{
				$("#echo_boc_form_cart").html(html);	
			}
		//console.log(html);
           //href="/cart/order.php?orderclick_id="+html;
           //window.location.href = href;
        }
    });
}
function intval(num)
{
	//Author: Kagami Sorano 
	if (typeof num == 'number' || typeof num == 'string')
	{
		num = num.toString();
		var dotLocation = num.indexOf('.');
		if (dotLocation > 0)
		{//Ампутация дробной части
			num = num.substr(0, dotLocation);
		}
		if (isNaN(Number(num)))
		{
			num = parseInt(num);
		}
		if (isNaN(num))
		{
			return 0;
		}
		return Number(num);
	}
	else if (typeof num == 'object' && num.length != null && num.length > 0)
	{//Непустой массив/объект -> 1
		return 1;
	}
	else if (typeof num == 'boolean' && num === true)
	{//true -> 1
		return 1;
	}
	return 0;//Чуть что не так - сразу в ноль
}