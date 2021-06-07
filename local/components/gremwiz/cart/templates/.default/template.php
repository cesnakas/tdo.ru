<?if($arResult['SUMM']  < 1){?>
Корзина пуста
<?}else{?>
<div class="page_cart">
    <div class="page_cart__left">
      <?
	  global $LOCATION_CITY_ID, $LOCATION_CITY_NAME;

	  $APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket",
	"basket",
	Array(
		"ACTION_VARIABLE" => "action1",
		"COLUMNS_LIST" => array(0=>"NAME",1=>"PROPS",2=>"DELETE",3=>"DELAY",4=>"PRICE",5=>"QUANTITY",6=>"SUM",),
		"COMPONENT_TEMPLATE" => "basket",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "Y",
		"HIDE_COUPON" => "N",
		"OFFERS_PROPS" => array(0=>"BRAND",1=>"SIZE",2=>"COLOR",),
		"PATH_TO_ORDER" => "/cart/",
		"PRICE_VAT_SHOW_VALUE" => "Y",
		"QUANTITY_FLOAT" => "Y",
		"SET_TITLE" => "Y",
		"USE_PREPAYMENT" => "Y"
	)
);?>
    </div>

    <div class="page_cart__right">
        <div class="page_cart__order tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
          <ul class="tabs__menu">
                <li class="tabs__menu__item"><a href="#page_cart__order-standart"><span>Оформить заказ</span></a></li>
                <li class="tabs__menu__item"><a href="#page_cart__order-quick"><span>Быстрый заказ</span></a></li>
            </ul>



             <div id="page_cart__order-standart" class="tabs__content">


<a name="order_form"></a>
<input type="hidden" id="region-id" value="" />
<input type="hidden" id="delivery-id" value="" />


<div id="order_form_div" class="order-checkout">
<noscript>
	&lt;div class="errortext"&gt;
Для оформления заказа необходимо включить JavaScript. По-видимому, JavaScript либо не поддерживается браузером, либо отключен. Измените настройки браузера и затем &lt;a href=""&gt;повторите попытку&lt;/a&gt;.&lt;/div&gt;
</noscript>


<div class="bx_order_make">

			      <form action="/cart/" method="POST" name="ORDER_FORM" id="ORDER_FORM" enctype="multipart/form-data" target="formTarget_0.7900616019709505">
             <div id="order_form_content">
             <div class="page_cart__order__form">

                <div class="section">


</div>


<div class="bx_section">

	<div id="sale_order_props">
						<div>
					                            <div class="page_cart__order__item">
                                <div class="page_cart__order__item__title">Имя									<span class="bx_sof_req">*</span>
								</div>
                                <div class="page_cart__order__item__value">
								<input class="inputbox form-query" type="text" maxlength="250" size="40" need="true" value="<?=$USER->GetFullName()?>" id="NAME" prop_id="ORDER_PROP_114" placeholder="как к Вам можно обращаться">
								                                </div>
                            </div>




							                            <div class="page_cart__order__item">
                                <div class="page_cart__order__item__title">Эл. почта</div>
                                <div class="page_cart__order__item__value">
								<input type="text" maxlength="250" size="40" value="<?=$USER->GetEmail();?>" id="EMAIL" prop_id="ORDER_PROP_115" class="inputbox form-query " placeholder="petrov@mail.ru">
								                                </div>
                            </div>




							                            <div class="page_cart__order__item">
                                <div class="page_cart__order__item__title">Телефон									<span class="bx_sof_req">*</span>
								</div>
                                <div class="page_cart__order__item__value">
								<input class="inputbox form-query" type="text" maxlength="250" size="40" need="true" value="" id="PHONE" prop_id="ORDER_PROP_116" placeholder="уточним детали заказа">
								                                </div>
                            </div>




							                            <div class="order_prop">
							<div class="order_prop_name">
								Регион доставки
																	<span class="bx_sof_req">*</span>
															</div>

							<div class="order_prop_value">


<div id="LOCATION_ORDER_PROP_19">


		<select id="CITY_SELECT" name="CITY_SELECT" type="location" class="">
		<option  selected="selected">(выберите город)</option>
					<option value="<?=$LOCATION_CITY_ID?>"><?=$LOCATION_CITY_NAME?></option>

	 <?
$res = \Bitrix\Sale\Location\LocationTable::getList(array(
    'filter' => array(
        '=ID' => $LOCATION_CITY_ID,
        '=CHILDREN.NAME.LANGUAGE_ID' => 'ru',
        '=CHILDREN.TYPE.NAME.LANGUAGE_ID' => 'ru',
    ),
    'select' => array(
        'CHILDREN.*',
        'NAME_RU' => 'CHILDREN.NAME.NAME',
        'TYPE_CODE' => 'CHILDREN.TYPE.CODE',
        'TYPE_NAME_RU' => 'CHILDREN.TYPE.NAME.NAME'
    )
));
while($item = $res->fetch())
{
?>
<option value="<?=$item['SALE_LOCATION_LOCATION_CHILDREN_CITY_ID']?>"><?=$item['NAME_RU']?></option>
<?
}
   ?>
						</select>


</div>



<div id="spisok_okdel" class="spisok_okdel">

</div><div id="spisok_okdel2" class="spisok_okdel2">

</div>
															</div>
							</div>
											</div>
							<div>
									</div>
				</div>
</div>






            </div>
            <div class="page_cart__order__btn_container">
            	<input type="hidden" name="send_from_btn" id="send_from_btn" value="N">
     <a href="#" class="buy-button send-order" style="background: #fff;
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
    transition: 0.8s;">Подтвердить заказ</a>
                            </div>

            <div class="order_summary hidden">Итого: <span>43 432 руб</span></div>
<div id="price_no_delivery" class="hidden"></div>
<div id="price_hidden_delivery" class="hidden">0</div>
<div id="price_hidden_order_price" class="hidden">43432</div>

             				<script type="text/javascript">
					//top.BX('confirmorder').value = 'Y';
					//top.BX('profile_change').value = 'N';
				</script>
				</div>
					<input type="hidden" name="confirmorder" id="confirmorder" value="Y" data-lh_name="198966789_field_13">
					<input type="hidden" name="profile_change" id="profile_change" value="N" data-lh_name="198966789_field_14">
					<input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y" data-lh_name="198966789_field_15">
					<input type="hidden" name="json" value="Y" data-lh_name="198966789_field_16">


				<input type="submit" name="save" value="Y" style="display: none;"></form>
									<div style="display:none;"><div id="delivery_info__"><a href="javascript:void(0)" onclick="deliveryCalcProceed({'STEP':'1','DELIVERY':'','PROFILE':'','WEIGHT':'0','PRICE':'0','LOCATION':'0','LOCATION_ZIP':'','CURRENCY':'','INPUT_NAME':'','TEMP':'','ITEMS':'','EXTRA_PARAMS_CALLBACK':''})">Рассчитать стоимость</a></div><div id="wait_container__" style="display: none;"></div></div>









	</div>
</div>

            </div>

           <div id="page_cart__order-quick" class="page_cart__order-quick tabs__content">





	<form action="/cart/" name="popup-form0" id="popup-form0" method="post">
	<div class="page_cart__order__form" id="popup-window0">


        <div id="popup-error0"></div>
			<div style="display:none;">




	</div>

	<div class="page_cart__order__form">
	<?$APPLICATION->IncludeComponent("gremwiz:buy.one.click", "cart",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => 1,
			"ELEMENT_ID" => "cart",
			"ELEMENT_CODE" => "",
			"ELEMENT_PROPS" => "",
			"REQUIRED_ORDER_FIELDS" => array(
				0 => "NAME",
				1 => "TEL"
			),
			"DEFAULT_PERSON_TYPE" => "1",
			"DEFAULT_ORDER_PROP_NAME" => "1",
			"DEFAULT_ORDER_PROP_TEL" => "3",
			"DEFAULT_ORDER_PROP_EMAIL" => "2",
			"DEFAULT_DELIVERY" => "0",
			"DEFAULT_PAYMENT" => "0",
			"BUY_MODE" => "ALL",
			"DUPLICATE_LETTER_TO_EMAILS" => array(
				0 => "sales"
			),
		),
		false
	);?>


				</div>






    </div>


	</form>




            </div>
        </div>
    </div>


</div>


<script>




$(document).ready(function(){
		$('.tabs').tabs();
		$('input[prop_id="ORDER_PROP_116"]').mask("+7 (999) 999-9999");
	})
function AlertForm(text)
    {
    $("#alert-form .row").html(text);
    $("#alert-form").show();
    $("#alert-form").animate({"opacity":"1"},300);
    }
$(document).ready(function(){
        UpdateBigBasket();

    $(".form-query").live("change",function(){
        $(this).removeClass("error");
        });




    $(".send-order").on("click",function(){
        $("#shadow").show();
        $("#shadow").animate({"opacity":"0.5"},300);
        var region_id=$("#region-id").val();
        var delivery_id=$("#delivery-id").val();
        var error = "Ничего не выбрано!";
        if(region_id!="" && delivery_id!="")
            {
            error = "";
            }
            else
            error = "Не указан регион или вариант доставки";


    	var summa = $("#all-summ").attr("summ");

//        alert(error);
        // тут надо обработать все поля формы

        if(error=="")
            {
            var name = $("#NAME").val();
            var email = $("#email").val();
			// var phone = $("#PHONE").val();
            var params = {};
            var i = 0;
            $(".form-query").each(function(){
                var type=$(this).attr("type");
                var code=$(this).attr("id");
//                alert(type+" "+code);
                if(type=="text" && $(this).val()!="")
                    {
                    if(code=="PHONE")
                        {
                        var tmp = $(this).val();
                        var tmp1 = "";
                        tmp1 = tmp.replace(/\D+/g,"");
                        if(tmp1.length<11)
                            {
                            error = "Неверно заполнен номер телефона";
                            }
                            else
                            {
                            params[code]=$(this).val();
                            }

                        }
                        else
                        params[code]=$(this).val();



                    }
                    else
                    {
                    if($(this).attr("need")=="true")
                        {
                        $(this).addClass("error");
                        error = "заполнены не все обязательные поля";
                        } //need = true
                    }
                    // end type=text;
                if(type=="textarea" && $(this).val()!="")
                    {
                    params[code]=$(this).val();
                    }
                })




            params["DELIVERY_REGION_ID"]=region_id;
            params["DELIVERY_ID"]=delivery_id;
			var selpay = $('#PAY_SYSTEM_ID option:selected').html();
			params["PAY_SYSTEM_ID"]=selpay;
			params["EMAIL"]=$("#EMAIL").val();

//                alert(params[0]);
            if(error=="")
                {
                var par = "";
                for (var key in params)
                    {
                    par +="&"+key+"="+params[key];
//                    alert(key+' '+params[key]);
                    }
               $("#debug").html(par);
                }
//              alert("1");
            }
            else
            {
//              alert("2");
            }

        if(error!="")
            {
            // тут показываем окно с ошибкой
                console.log(error);
            AlertForm(error);
            }
            else
            {
            // тут обрабатываем результаты формы
            // и отправляем запрос на создание заказа

            var request_url = "/cart/";
            var action = "make-order";
//            var params ="basket_id="+basket_id+"&qty="+qty;
            var items ={};
			console.log(request_url,action,par);
            items = GetData(request_url,action,par);
            if(items.result==true)
                {
//                $("#shadow").hide();
              // alert("Ваш заказ оформлен!\r\nНомер заказа: "+items.order_id);
                href="/cart/order.php?order_id="+items.order_id;
                window.location.href = href;
                }
                else
                {
//                $("#shadow").hide();
                AlertForm("Ошибка оформления заказа\r\nПроверьте пожалуйста правильность заполнения формы");

                }
            }
        return false;
        });
    // конец отправки заказа

    $(".minus").live("click",function(){
        var basket_id = $(this).parent().parent().attr("basket_id");
        var kratnost = $(this).parent().parent().attr("kratnost");
        var qty = $(this).parent().find("input").val();
        if(qty>1)
            {
            qty = parseInt(qty)-parseInt(kratnost);
            $(this).parent().find("input").val(qty);

            var request_url = "/cart/";
            var action = "qty_basket";
            var params ="basket_id="+basket_id+"&qty="+qty;
            var items ={};
            items = GetData(request_url,action,params);
            UpdateSmallBasket();
            UpdateBigBasket();
            }
        return false;
        });

	//$("#my_select :selected")
    $("#CITY_SELECT").live("change",function(){
    var location = $(this).attr("value");
    $("#region-id").val(location);

    $(".order").each(function(){
        $(this).removeClass("active");
        })
    $(this).parent().addClass("active");
    $(".delivery-detail").slideUp(10);
    $(".order_detail").slideUp(40);
    var request_url = "/cart/";
    var action = "get-delivery";
    var params ="location="+location;
    var items ={};
    items = GetData(request_url,action,params);
    var str = "";
    if(items.items.length>0)
        {

        str +=  '<div class="page_cart__order__menu"><div class="order_prop_name">Служба доставки</div><div class="order_prop_value">';
        $.each(items.items, function(key, val)
            {
				console.log(val);
			//str +='<ul><li><a class="delivery-link" location="'+val.ID+'" price="'+val.PRICE+'">'+val.NAME+': - '+val.PRICE+' руб</a></li>';
str +='<label class="delivery-link page_cart__order__menu__item custom_radio" location="'+val.ID+'" price="'+val.PRICE+'" onclick="BX(ID_DELIVERY_ID_'+val.ID+').checked=true;ajaxResult();">';
str +='<input type="radio" id="ID_DELIVERY_ID_'+val.ID+'" name="DELIVERY_ID" value="'+val.ID+'"><i></i>';
str +='<span class="page_cart__order__menu__item__title">'+val.NAME+'';
str +='</span></label>';
            });

        str +='</ul>';
//        $(this).parent().after(str);

        if(items.about!="")
            {
            str +='<div class="row" style="padding:20px;">'+items.about+'</div>';

            }


        if(items.links!=undefined)
        if(items.links.length>0)
            {
            str +='<ul>';
            $.each(items.links, function(key, val)
                {
                str +='<li><a class="delivery-link links" linkid="'+val.ID+'">'+val.NAME+'</a>';

                str +='<div class="row padding20 linksBlock" id="link_'+val.ID+'">';
                $.each(val.TOVARS, function(keyTovars, valTovars)
                    {
                    str +='<p>'+valTovars+'</p>';
                    });
                str +='</div>';
                str +='</li>';


                });
            str +='</ul>';
            }

        if(items.form!=undefined)
        if(items.form.length>0)
            {
            str +='<div class="row padding20"><br />';
            $.each(items.form, function(key, val)
                {
                str +='<input type="checkbox" id="form_'+val.ID+'" />&nbsp;'+val.NAME+'<br />';
                });
            str +='</div>';
            }

        str +='</div></div>';

        }
        $("#spisok_okdel").html(str);

//        str +='<li><a href="" class="delivery-link">Курьерская доставка за МКАД (доставка в пределах 10 км за МКАД): - 250 руб.</a></li>';
//        str +='<li><a href="" class="delivery-link">Самовывоз (оплата на пункте самовывоза): - 80 руб.</a></li>';
    return false;
    })



    $(".delivery-punkts .row").live("click",function(){
        $(".delivery-punkts .row").each(function(){
            $(this).removeClass("active");
        })
            $(this).addClass("active");
            var id=$(this).attr("id");
            var punktprice=$(this).attr("price");
            $("#delivery-price").val(punktprice);
            UpdateBigBasket();

//            $(".allTimes").hide();
//            $("#"+type).show();
            $("#PUNKT_ID").val(id);
      });


    $(".list li").live("click",function(){
        $(".list li").each(function(){
            $(this).removeClass("active");
        })
            $(this).addClass("active");
            var pid=$(this).attr("id");
            $("#PUNKT_ID").val(pid);

      });


    $(".deliveryTime").live("click",function(){
        $(".deliveryTime").each(function(){
            $(this).removeClass("active");
        })
            $(this).addClass("active");
            var type=$(this).attr("current");
            var value=$(this).html();
            $(".allTimes").hide();
            $("#"+type).show();
            $("#DELIVERY_TIME_TYPE").val(value);

      });

    $(".timeBlock").live("click",function(){
        $(".timeBlock").each(function(){
            $(this).removeClass("active");
        })
            var value=$(this).html();
            $(this).addClass("active");
            $("#DELIVERY_TIME").val(value);
      });

    $(".links").live("click",function(){
      var link_id=$(this).attr("linkid");
        $(".linksBlock").hide();
        $("#link_"+link_id).show();
      });





    $(".delivery-link").live("click",function(){
    $(".delivery-detail").remove();

    $(".delivery-link").each(function(){
        $(this).removeClass("activeLink");

    });

    $(this).addClass("activeLink");



    var location=$(this).attr("location");
    var delivery_price = $(this).attr("price");
    delivery_price=delivery_price.replace(/от /g,"");
//    alert(delivery_price);
    $("#delivery-price").val(delivery_price);
    $("#delivery-id").val(location);
    UpdateBigBasket();
    var request_url = "/cart/";
    var action = "get-form";
    var params ="location="+location;
    var items ={};
    items = GetData(request_url,action,params);
//    alert(items.items.length);


    if(items.list!=undefined)
    if(items.list.length>0)
        {
        var str =  '<div class="order delivery-detail">';
        str +='<ul class="list">';
        $.each(items.list, function(key, val)
            {
            str +='<li id="'+val.ID+'">';//<div class="col-sm-1"><input type="radio" name="list"/></div><div class="col-sm-8"><b>'+val.NAME+'</b><br />Время работы:'+val.TIME+'<br />Телефон:'+val.PHONE+'</div><div class="col-sm-3">';
            str +='<div class="col-sm-9"><b>'+val.NAME+'</b><br />Время работы:'+val.TIME+'<br />Телефон:'+val.PHONE+'</div>';
            str +='<div class="col-sm-3">';
//            str +='<a href="#">Как найти на словах</a><br />';
//            str +='<a href="#">Схема проезда</a><br />';
//            str +='<a href="#">На Яндекс.картах</a>';
            str +='</div></li>';
            });
        str +='</ul>';
        str +='<input class="form-query" type="hidden"  value="" id="PUNKT_ID" prop_id="PUNKT_ID" />';
        $(this).after(str);
		//$("#spisok_okdel").val(str);
        }

    if(items.items.length>0)
        {
        var str =  '<div class="order delivery-detail">';
        var need= "";
        $.each(items.items, function(key, val)
            {
            need= "";
            need_str= "";
            if(val.TYPE=="TEXT")
                {
                if(val.NEED==true)
                    {need = 'need="true"'; need_str='<font style="color:#b30605">*</font>'; }else{ need = 'need="false"'; need_str='';}
                str +='<div class="row"><label>'+val.NAME+''+need_str+':</label><input class="form-query" type="text" '+need+' value="" id="'+val.CODE+'" prop_id="'+val.PROP_ID+'"/></div>';
                }

            if(val.TYPE=="DATE")
                {
                if(val.NEED==true)
                    {need = 'need="true"'; need_str='<font style="color:#b30605">*</font>'; }else{ need = 'need="false"'; need_str='';}
                str +='<div class="row"><label>'+val.NAME+''+need_str+':</label><input class="form-query" type="text" '+need+' value="" id="'+val.CODE+'" prop_id="'+val.PROP_ID+'" onclick="sam_moskva(\''+val.CODE+'\')" readonly="readonly" /></div>';
                }




            if(val.TYPE=="DESC")
                {
                if(val.NEED==true)
                    {need = 'need="true"'; need_str='<font style="color:#b30605">*</font>'; }else{ need = 'need="false"'; need_str='';}
                str +='<div class="row"><label>'+val.NAME+''+need_str+':</label><b>'+val.TEXT+'</b></div>';

                }

            if(val.TYPE=="TEXTAREA")
                {
                if(val.NEED==true)
                    {need = 'need="true"'; need_str='<font style="color:#b30605">*</font>'; }else{ need = 'need="false"'; need_str='';}
                str +='<div class="row"><label>'+val.NAME+''+need_str+':</label><textarea type="textarea" class="form-query" id="'+val.CODE+'" prop_id="'+val.PROP_ID+'"/></textarea></div>';

                }
            if(val.TYPE=="TIME")
                {
                if(val.NEED==true)
                    {need = 'need="true"'; need_str='<font style="color:#b30605">*</font>'; }else{ need = 'need="false"'; need_str='';}
                    str +='<label>Время доставки:'+need_str+'</label>';
                    str +='<div class="block">';
                    str +='<input type="hidden" id="DELIVERY_TIME_TYPE" value="" />';
                    str +='<input type="hidden" id="DELIVERY_TIME" value="" />';
                    $.each(val.TYPES, function(keyTypes, valTypes)
                        {
                        str +='<div class="deliveryTime" current="'+keyTypes+'">'+valTypes.NAME+'</div>';
                        });

                    $.each(val.TYPES, function(keyTypes, valTypes)
                        {
                        str +='<div class="row allTimes" id="'+keyTypes+'">';
                        $.each(valTypes.TIMES, function(keyTimes, valTimes)
                            {
                            str +='<div class="col-sm-2 timeBlock">';
                            str +=valTimes;
                            str +='</div>';
                            });
                        str +='</div>';
                        });
                    str +='</div>';


//                str +='<div class="row"><label>'+val.NAME+''+need_str+':</label><textarea id="'+val.CODE+'" prop_id="'+val.PROP_ID+'"/></textarea></div>';

                }
				       if(val.TYPE=="SELECT")
                {

                    $.each(val.TYPES, function(keyTypes, valTypes)
                        {



                        str +='<div class=age_cart__order__item">';
                        str +='<div class="page_cart__order__item__title">Способ оплаты</div>';
                        str +='<div class="page_cart__order__item__value">';
                        str +='<div class="section">';
						str +='<div id="paysystems">';
                        str +='<div class="paysystems_block">';
						str +='<select id="PAY_SYSTEM_ID" name="PAY_SYSTEM_ID" class="selectbox">';
                        $.each(valTypes.TIMES, function(keyTimes, valTimes)
                            {
                            str +=valTimes;
                            });
                        str +='</select></div></div></div></div></div>';





                        });}



//                str +='<div class="row"><label>'+val.NAME+''+need_str+':</label><textarea id="'+val.CODE+'" prop_id="'+val.PROP_ID+'"/></textarea></div>';


           });


        str +='</div>';
        str +='<div class="delivery-punkts">';
        str +='</div>';
       // $(this).after(str);
	   $("#spisok_okdel2").html(str);

       // $("#TEL").inputmask("+7(999)999-99-99");

        /*$("#TEL").live("change",function(){
            var str = "";
            var str1 = "";
            str = $(this).val();
    //        str = str.replace(/D/g, '');
            str1 = str.replace(/\D+/g,"");
    //        alert(str1.length);
            if(str1.length<11)
                alert("Вы некорректно ввели номер телефона");
                else
                $("#TEL").val(str1);
    //        $(this).val(str);
        });*/




        if($("#CITY_DELIVERY_REGION").val()!=undefined)
            {
            var insert_block =  $(this);
            $("#CITY_DELIVERY_REGION").click(function(){
                var text = $(this).val();
                if(text=="начните вводить текст")
                    $(this).val("");
              });

            $("#CITY_DELIVERY_REGION").focusout(function(){
                var text = $(this).val();
                if(text=="")
                    $(this).val("начните вводить текст");
                });

            $("#CITY_DELIVERY_REGION").autocomplete("/cart/", {
            		delay: 10,
            		minChars: 3,
            		matchSubset: 1,
            		maxItemsToShow: 30,
                    useCache: false,
            		autoFill: false,
            	    selectFirst:false,
            	    formatItem:liFormat,
                });

             $("#CITY_DELIVERY_REGION").result(function(event, data, formatted)
                {
                $("#CITY_DELIVERY_REGION").val(data[1]);
                $("#CITY_DELIVERY_REGION").attr({"city_id":data[0]});
                GetPunkts(data[1]);
         	    });

            }// если надо автокомлпит на город





        }
    return false;
    })

});


function liFormat (row, i, num) {
	var result = row[1];
	return result;
}


function selectItem(li) {
	if( li == null ) var sValue = 'А ничего не выбрано!';
	if( !!li.extra ) var sValue = li.extra[0];
	else
        var sValue = li.selectValue;
//	alert("Выбрана запись с ID: " + sValue);
}

function GetPunkts(city_name,insert_block)
    {
    var request_url = "/cart/";
    var action = "get-punkts";
    var params ="city="+city_name;
    var items ={};
    items = GetData(request_url,action,params);
    if(items.items.length>0)
        {
        var str =  '<div class="order delivery-detail delivery-punkts">';
        str +=  '<b>Выберите пункт самовывоза в Вашем городе:</b>';
        $.each(items.items, function(key, val)
            {
            str +=  '<div class="row" id="'+val["ID"]+'" price="'+val["PROPERTY_TARIFFZONE_FULL_VALUE"]+'">';
            str +=  '<div class="col-sm-8"><b>'+val["DETAIL_TEXT"]+'</b><br />Время работы:'+val["PROPERTY_SCHEDULE_VALUE"]+'<br />'+val["PREVIEW_TEXT"]+'</div>';
            str +=  '<div class="col-sm-4">Стоимость:'+val["PROPERTY_TARIFFZONE_FULL_VALUE"]+' руб.<br />Срок доставки: от '+val["PROPERTY_DELIVERYPERIOD_VALUE"]+' дней</div>';
            str +=  '</div>';

            });
        str +=  '</div>';
        }
    str +='<input class="form-query" type="hidden"  value="" id="PUNKT_ID" prop_id="PUNKT_ID" />';
//    $(".delivery-punkts").htmlroy();
    $(".delivery-punkts").html(str);

    }



function GetData(request_url,action,params)
    {
		res = false;
      if(action!="")
        {
        var url=request_url+"?action="+action;
        if(params!="")
            url += "&"+params;
//        alert(url);
console.log(url);
        var res=false;
        $.ajax({
            type:'POST',
            dataType : "json",
            async : false,
            url: url,
            success: function(data,status)
                {
					console.log(data);
                res = data;
//                if(data.result==true)
                    {
//                    res = true;
//                    ShowAlertWindow("Товар добавлен в корзину!");
//                    setTimeout('CloseAlertWindow();',1000);
                    }
//                    else
                    {
                    }
                },
            error: function(data,status)
                {
					console.log(data);
                res = false;
                }
            });
        }
        else
        {
        alert("Define action !");
        }
    return res;
    }


function UpdateBigBasket()
    {
        var url="/cart/?action=get-basket";
        $.ajax({
            type:'POST',
            dataType : "json",
            url: url,
            success: function(data,status)
                {
                if(data.result==true)
                    {
//                    if(data.elements==0)
//                    var str = '<a class="cart-title" href="#">Ваша корзина пуста</a>';
//                    else
//                    var str = '<a class="cart-title" href="#"><span class="cart-cnt">'+data.ELEMENTS+'</span><span class="cart-txt">товаров</span> ('+data.SUMM+' руб.)</a>';
//                    $("#basket-link").html(str);

                    if(data.items.length>0)
                        {
                        var str = "";
                        var delivprice = parseInt($("#delivery-price").val());
                        $.each(data.items, function(key, val)
                            {
                            str +='<tr basket_id="'+val.ID+'" kratnost="'+val.KRATNOST+'"><td><a href="'+val.DETAIL_PAGE_URL+'" class="img"><img src="'+val.IMG+'" alt="" /></a><a href="'+val.DETAIL_PAGE_URL+'">'+val.NAME+'</a><br /><small>Продаётся кратно '+val.KRATNOST+' шт.</small></td>';
                            str +='<td><a href="#" class="cart-btn minus">-</a><input type="text" value="'+val.QUANTITY+'" size="2" readonly /><a href="#" class="cart-btn plus">+</a></td><td>'+val.PRICE+' руб.</td><td><span class="summ">'+val.PRICE*val.QUANTITY+' руб.</span></td><td><a href="#" class="cart-btn delete">x</a></td></tr>';
                            }
                            );

                        var ordersum = data.summ;
                        data.summ = data.summ + delivprice;

                        str +='<tr><td colspan="2" align="right"></td><td colspan="3" align="right"><span>Общая стоимость:</span><b>'+data.summ+' руб.</b></td></tr>';
                        }

//                    alert(delivprice);
                    $("#big-basket").html(str);
                    $("#all-summ").html(data.summ+" руб.");
                    $("#all-summ").attr({"summ":data.summ});

                    if(ordersum<500)
                        {

                        $(".send-order").hide();
                        $("#minorder").show();
                        }
                        else
                        {
                        if($("#delivery-price").val()!=0 && $("#delivery-price").val()!="")
                            $(".send-order").show();
                        $("#minorder").hide();
                        }

                    if(data.summ=="0")
                        {
                        $("#basket_free").show();
                        $("#basket_exist").hide();
                        }



                    }
//                    else
                    {
                    }
                },
            error: function(data,status)
                {
                res = false;
                }
            });
    }


</script>

<script type="text/javascript">
function formatDate(date) {

  var dd = date.getDate()
  if ( dd < 10 ) dd = '' + dd;
  var mm = date.getMonth()+1
  if ( mm < 10 ) mm = '0' + mm;
  var yy = date.getFullYear();
  if ( yy < 10 ) yy = '0' + yy;
  return dd+'-'+mm+'-'+yy;
}
function sam_piter(dp_id)
								{
								 var p_del = document.getElementById('icon_to_delete');

								 var shipday = new Date;
								 var shipiday = new Date;
								 //alert(shipiday.getDay());
								 var name = "#"+dp_id;
								 $(name).attr('readonly', 'readonly');
if (shipiday.getDay() == 1){
shipday.setDate(shipday.getDate() + 10);
shipiday.setDate(shipiday.getDate() + 3);

								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 2){
shipday.setDate(shipday.getDate() + 10);
shipiday.setDate(shipiday.getDate() + 4);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}

if (shipiday.getDay() == 3){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 3);
 if(shipday.getHours() > 15)
								  {
								   shipiday.setDate(shipiday.getDate() + 5);
								  }
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 4){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 6);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 5){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 7);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 6){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 5);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 0){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 4);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}


								 $( "#icon_to_delete").remove();
								 $(function() {
										$( name ).datepicker( "show"  );
									});
								}
function sam_moskva(dp_id)
								{
								 var p_del = document.getElementById('icon_to_delete');

								 var shipday = new Date;
								 var shipiday = new Date;
								 var name = "#"+dp_id;
								 $(name).attr('readonly', 'readonly');
if (shipiday.getDay() == 1){
shipday.setDate(shipday.getDate() + 10);
shipiday.setDate(shipiday.getDate() + 2);
 if(shipday.getHours() > 17)
								  {
								   shipiday.setDate(shipiday.getDate() + 2);
								  }
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 2){
shipday.setDate(shipday.getDate() + 10);
shipiday.setDate(shipiday.getDate() + 3);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}

if (shipiday.getDay() == 3){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 2);
 if(shipday.getHours() > 17)
								  {
								   shipiday.setDate(shipiday.getDate() + 5);
								  }
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 4){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 6);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 5){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 5);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 6){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 4);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}
if (shipiday.getDay() == 0){
shipday.setDate(shipday.getDate() + 15);
shipiday.setDate(shipiday.getDate() + 3);
								$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});
});
}


								 $( "#icon_to_delete").remove();
								 $(function() {
										$( name ).datepicker( "show"  );
									});
								}

                            	function activate_datepicker(dp_id)
								{
								 var p_del = document.getElementById('icon_to_delete');

								 var shipday = new Date;
								 var shipiday = new Date;
								// alert(shipiday.getDate());
								 var next_day_shipment = false;
								 if(shipday.getHours() > 15)
								  {
								   next_day_shipment = true;
								   shipday.setDate(shipday.getDate() + 1);
								   shipiday.setDate(shipiday.getDate() + 1);
								  }
								 shipday.setDate(shipiday.getDate() + 3);
								 if(shipday.getDay() <= 3) shipday.setDate(shipday.getDate() + 3);
								 else shipday.setDate(shipday.getDate() + 6);


								 if(next_day_shipment) wait_days = wait_days+1;
								 var name = "#"+dp_id;
									$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0",
    autoclose: true
});										$(name).attr('readonly', 'readonly');
								});
								 $( "#icon_to_delete").remove();
								 $(function() {
										$( name ).datepicker( "show"  );
									});
								}
								function activate_datepickermkad(dp_id)
								{
								 var p_del = document.getElementById('icon_to_delete');

								 var shipday = new Date;
								 var shipiday = new Date;
								 var next_day_shipment = false;
								 if(shipday.getHours() > 15)
								  {
								   next_day_shipment = true;
								   shipday.setDate(shipday.getDate() + 1);
								   shipiday.setDate(shipiday.getDate() + 1);
								  }
								 shipday.setDate(shipiday.getDate() + 3);
								 if(shipday.getDay() <= 3) shipday.setDate(shipday.getDate() + 3);
								 else shipday.setDate(shipday.getDate() + 6);


								 if(next_day_shipment) wait_days = wait_days+1;
								 var name = "#"+dp_id;
									$(function() {
									$( name ).datepicker({
	format: "dd-mm-yyyy",
	startDate: shipiday,
    endDate: shipday,
    language: "ru",
    daysOfWeekDisabled: "0,6",
    autoclose: true
});										$(name).attr('readonly', 'readonly');
									});
								 $( "#icon_to_delete").remove();
								 $(function() {
										$( name ).datepicker( "show"  );
									});
								}
                            </script>
<style>

</style>

	<script>
	$(document).ready(function(e) {
    $('.custom_radio').customRadio();
	});

</script>
<?}?>