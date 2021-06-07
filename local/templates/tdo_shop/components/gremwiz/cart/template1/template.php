<? if($arResult['SUMM'] < 1) { ?>
    Корзина пуста

	<? return true; ?>
<? } ?>
<?
$curCityName = $_COOKIE['location_city_name'];
$curCityId   = $_COOKIE['location_city_id'];
?>
<a name="order_form"></a>
<input type="hidden" id="region-id" value="" />
<input type="hidden" id="delivery-id" value="" />

<div id="order_form_div" class="order-checkout">
    <div class="bx_order_make">

        <form action="/cart/" method="POST" name="ORDER_FORM" id="ORDER_FORM" enctype="multipart/form-data" target="formTarget_0.7900616019709505">
            <div id="order_form_content">

                <div class="form-head">Заполните анкету</div>
                <div class="form-desc">Наш менеджер свяжется с вами, уточнит детали и проконсультирует</div>

                <div class="page_cart__order__item">
                    <div class="page_cart__order__item__value">
                        <input class="input form-query" type="text" maxlength="250" size="40" need="true"
                               value="<?=$USER->GetFullName()?>" id="FIO" prop_id="ORDER_PROP_39"
                               placeholder="Имя *">
                    </div>
                </div>

                <div class="page_cart__order__item">
                    <div class="page_cart__order__item__value">
                        <input type="text" maxlength="250" size="40" value="<?=$USER->GetEmail();?>" id="EMAIL"
                               prop_id="ORDER_PROP_40"
                               class="input form-query " placeholder="Эл. почта *">
                    </div>
                </div>

                <div class="page_cart__order__item">
                    <div class="page_cart__order__item__value">
                        <input class="input form-query" type="text" maxlength="250" size="40" need="true" value="" id="PHONE"
                               prop_id="ORDER_PROP_41" placeholder="Телефон *">
                    </div>
                </div>

                <div class="order_prop">
                    <div class="order_prop_value">
                        <div id="LOCATION_ORDER_PROP_44">
                            <select id="CITY_SELECT" name="CITY_SELECT" type="location" class="region-select js-region-select">
                                <option selected="selected">Регион доставки *</option>

                                <option value="<?=$curCityId?>"><?=$curCityName?></option>

								<?
								$curCityId = $_COOKIE['location_city_id'];

								$arrFilter = [
									'=TYPE.ID'                        => '5',
									'=CHILDREN.NAME.LANGUAGE_ID'      => 'ru',
									'=CHILDREN.TYPE.NAME.LANGUAGE_ID' => 'ru',
								];
								if($curCityId) {
									$arrFilter['=ID'] = $curCityId;
								}

								$res = \Bitrix\Sale\Location\LocationTable::getList(
									array(
										'filter' => $arrFilter,
										'select' => array(
											'CHILDREN.*',
											'NAME_RU'      => 'CHILDREN.NAME.NAME',
											'TYPE_CODE'    => 'CHILDREN.TYPE.CODE',
											'TYPE_NAME_RU' => 'CHILDREN.TYPE.NAME.NAME',
										),
									)
								);
								while ($item = $res->fetch()) {
									?>
                                    <option value="<?=$item['SALE_LOCATION_LOCATION_CHILDREN_CITY_ID']?>"><?=$item['NAME_RU']?></option>
									<?
								}
								?>
                            </select>

							<? /*$APPLICATION->IncludeComponent(
		                        "bitrix:sale.location.selector.search",
		                        "cart",
		                        array(
			                        "COMPONENT_TEMPLATE" => ".default",
			                        "ID" => $curCityId,//Питер - 269
			                        "CODE" => $_REQUEST["LOCATION"],
			                        "INPUT_NAME" => "LOCATION",
			                        "PROVIDE_LINK_BY" => "id",
			                        "JSCONTROL_GLOBAL_ID" => "",
			                        "JS_CALLBACK" => "",
			                        "FILTER_BY_SITE" => "Y",
			                        "SHOW_DEFAULT_LOCATIONS" => "Y",
			                        "CACHE_TYPE" => "N",
			                        "CACHE_TIME" => "36000000",
			                        "FILTER_SITE_ID" => "s2",
			                        "INITIALIZE_BY_GLOBAL_EVENT" => "",
			                        "SUPPRESS_ERRORS" => "N",
			                        "JS_CONTROL_GLOBAL_ID" => ""
		                        ),
		                        false
	                        );*/ ?>
                        </div>


                        <div id="spisok_okdel" class="spisok_okdel">

                        </div>
                        <div id="spisok_okdel2" class="spisok_okdel2">

                        </div>
                    </div>
                </div>


                <div class="page_cart__order__btn_container">
                    <button class="btn-white buy-button js-send-order ">Потвердить заказ</button>
                    <input type="hidden" name="send_from_btn" id="send_from_btn" value="N">
                </div>

                <viv class="clearfix"></viv>
            </div>

            <script type="text/javascript">
                //top.BX('confirmorder').value = 'Y';
                //top.BX('profile_change').value = 'N';
            </script>

            <input type="hidden" name="confirmorder" id="confirmorder" value="Y" data-lh_name="198966789_field_13">
            <input type="hidden" name="profile_change" id="profile_change" value="N" data-lh_name="198966789_field_14">
            <input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y" data-lh_name="198966789_field_15">
            <input type="hidden" name="json" value="Y" data-lh_name="198966789_field_16">


            <input type="submit" name="save" value="Y" style="display: none;">
        </form>

    </div>

</div>


<script>
    function AlertForm(text) {
        $("#js-alert-form .popup-window-content").html(text);
        addAnswer.show(); // появление окна
    }

    $(document).ready(function () {
        UpdateBigBasket();

        $(".form-query").on("change", function () {
            $(this).removeClass("error");
        });

        $(".js-send-order").on("click", function () {
            var region_id = $("#region-id").val();
            var delivery_id = $("#delivery-id").val();
            var error = "Ничего не выбрано!";
            if (region_id != "" && delivery_id != "") {
                error = "";
            } else {
                error = "Не указан регион или вариант доставки";
            }


            // тут надо обработать все поля формы

            if (error == "") {
                var name = $("#NAME").val();
                var email = $("#email").val();
                // var phone = $("#PHONE").val();
                var params = {};
                var i = 0;
                $(".form-query").each(function () {
                    var type = $(this).attr("type");
                    var code = $(this).attr("id");
                    if (type == "text" && $(this).val() != "") {
                        if (code == "PHONE") {
                            var tmp = $(this).val();
                            var tmp1 = "";
                            tmp1 = tmp.replace(/\D+/g, "");
                            if (tmp1.length < 11) {
                                error = "Неверно заполнен номер телефона";
                            } else {
                                params[code] = $(this).val();
                            }
                        } else {
                            params[code] = $(this).val();
                        }
                    } else {
                        if ($(this).attr("need") == "true") {
                            $(this).addClass("error");
                            error = "заполнены не все обязательные поля";
                        } //need = true
                    }
                    // end type=text;
                    if (type == "textarea" && $(this).val() != "") {
                        params[code] = $(this).val();
                    }
                })


                params["DELIVERY_REGION_ID"] = region_id;
                params["DELIVERY_ID"] = delivery_id;
                var selpay = $('#PAY_SYSTEM_ID option:selected').html();
                params["PAY_SYSTEM_ID"] = selpay;
                params["EMAIL"] = $("#EMAIL").val();

//                alert(params[0]);
                if (error == "") {
                    var par = "";
                    for (var key in params) {
                        par += "&" + key + "=" + params[key];
//                    alert(key+' '+params[key]);
                    }
                    $("#debug").html(par);
                }
//              alert("1");
            }

            if (error != "") {
                // тут показываем окно с ошибкой
                console.log(error);
                AlertForm(error);
            } else {
                // тут обрабатываем результаты формы
                // и отправляем запрос на создание заказа

                var request_url = "/cart/";
                var action = "make-order";
                var items = {};
                console.log(request_url, action, par);
                items = GetData(request_url, action, par);
                if (items.result == true) {
                    // alert("Ваш заказ оформлен!\r\nНомер заказа: "+items.order_id);
                    href = "/cart/order.php?order_id=" + items.order_id;
                    // window.location.href = href;
                } else {
                    AlertForm("Ошибка оформления заказа\r\nПроверьте пожалуйста правильность заполнения формы");
                }
            }
            return false;
        });
        // конец отправки заказа

        $(".minus").on("click", function () {
            var basket_id = $(this).parent().parent().attr("basket_id");
            var kratnost = $(this).parent().parent().attr("kratnost");
            var qty = $(this).parent().find("input").val();
            if (qty > 1) {
                qty = parseInt(qty) - parseInt(kratnost);
                $(this).parent().find("input").val(qty);

                var request_url = "/cart/";
                var action = "qty_basket";
                var params = "basket_id=" + basket_id + "&qty=" + qty;
                var items = {};
                items = GetData(request_url, action, params);
                UpdateSmallBasket();
                UpdateBigBasket();
            }
            return false;
        });

        //$("#my_select :selected")
        $("#CITY_SELECT").on("change", function () {
            // var location = $(this).attr("value");
            var location = $(this).val();
            $("#region-id").val(location);

            $(".order").each(function () {
                $(this).removeClass("active");
            })
            $(this).parent().addClass("active");
            $(".delivery-detail").slideUp(10);
            $(".order_detail").slideUp(40);
            var request_url = "/cart/";
            var action = "get-delivery";
            var params = "location=" + location;
            var items = {};
            items = GetData(request_url, action, params);
            var str = "";
            if (items.items.length > 0) {

                str += '<div class="page_cart__order__menu"><div class="order_prop_name">Служба доставки</div><div class="order_prop_value">';
                $.each(items.items, function (key, val) {
                    console.log(val);
                    //str +='<ul><li><a class="delivery-link" location="'+val.ID+'" price="'+val.PRICE+'">'+val.NAME+': - '+val.PRICE+' руб</a></li>';
                    str += '<label class="delivery-link page_cart__order__menu__item custom_radio" location="' + val.ID + '" price="' + val.PRICE + '" onclick="BX(ID_DELIVERY_ID_' + val.ID + ').checked=true;">';
                    str += '<input type="radio" id="ID_DELIVERY_ID_' + val.ID + '" name="DELIVERY_ID" value="' + val.ID + '"><i></i>';
                    str += '<span class="page_cart__order__menu__item__title">' + val.NAME + '';
                    str += '</span></label>';
                });

                str += '</ul>';
//        $(this).parent().after(str);

                if (items.about != "") {
                    str += '<div class="row" style="padding:20px;">' + items.about + '</div>';

                }


                if (items.links != undefined)
                    if (items.links.length > 0) {
                        str += '<ul>';
                        $.each(items.links, function (key, val) {
                            str += '<li><a class="delivery-link links" linkid="' + val.ID + '">' + val.NAME + '</a>';

                            str += '<div class="row padding20 linksBlock" id="link_' + val.ID + '">';
                            $.each(val.TOVARS, function (keyTovars, valTovars) {
                                str += '<p>' + valTovars + '</p>';
                            });
                            str += '</div>';
                            str += '</li>';


                        });
                        str += '</ul>';
                    }

                if (items.form != undefined)
                    if (items.form.length > 0) {
                        str += '<div class="row padding20"><br />';
                        $.each(items.form, function (key, val) {
                            str += '<input type="checkbox" id="form_' + val.ID + '" />&nbsp;' + val.NAME + '<br />';
                        });
                        str += '</div>';
                    }

                str += '</div></div>';

            }
            $("#spisok_okdel").html(str);

//        str +='<li><a href="" class="delivery-link">Курьерская доставка за МКАД (доставка в пределах 10 км за МКАД): - 250 руб.</a></li>';
//        str +='<li><a href="" class="delivery-link">Самовывоз (оплата на пункте самовывоза): - 80 руб.</a></li>';
            return false;
        })


        $(".delivery-punkts .row").on("click", function () {
            $(".delivery-punkts .row").each(function () {
                $(this).removeClass("active");
            })
            $(this).addClass("active");
            var id = $(this).attr("id");
            var punktprice = $(this).attr("price");
            $("#delivery-price").val(punktprice);
            UpdateBigBasket();

//            $(".allTimes").hide();
//            $("#"+type).show();
            $("#PUNKT_ID").val(id);
        });


        $(".list li").on("click", function () {
            $(".list li").each(function () {
                $(this).removeClass("active");
            })
            $(this).addClass("active");
            var pid = $(this).attr("id");
            $("#PUNKT_ID").val(pid);

        });


        $(".deliveryTime").on("click", function () {
            $(".deliveryTime").each(function () {
                $(this).removeClass("active");
            })
            $(this).addClass("active");
            var type = $(this).attr("current");
            var value = $(this).html();
            $(".allTimes").hide();
            $("#" + type).show();
            $("#DELIVERY_TIME_TYPE").val(value);

        });

        $(".timeBlock").on("click", function () {
            $(".timeBlock").each(function () {
                $(this).removeClass("active");
            })
            var value = $(this).html();
            $(this).addClass("active");
            $("#DELIVERY_TIME").val(value);
        });

        $(".links").on("click", function () {
            var link_id = $(this).attr("linkid");
            $(".linksBlock").hide();
            $("#link_" + link_id).show();
        });


        jQuery(document).on('click', '.delivery-link', function (e) {
            $(".delivery-detail").remove();

            $(".delivery-link").each(function () {
                $(this).removeClass("activeLink");

            });

            $(this).addClass("activeLink");


            var location = $(this).attr("location");
            var delivery_price = $(this).attr("price");
            delivery_price = delivery_price.replace(/от /g, "");
            $("#delivery-price").val(delivery_price);
            $("#delivery-id").val(location);
            UpdateBigBasket();
            var request_url = "/cart/";
            var action = "get-form";
            var params = "location=" + location;
            var items = {};
            items = GetData(request_url, action, params);

            if (items.list != undefined)
                if (items.list.length > 0) {
                    var str = '<div class="order delivery-detail">';
                    str += '<ul class="list">';
                    $.each(items.list, function (key, val) {
                        str += '<li id="' + val.ID + '">';
                        str += '<div class="col-sm-9"><b>' + val.NAME + '</b><br />Время работы:' + val.TIME + '<br />Телефон:' + val.PHONE + '</div>';
                        str += '<div class="col-sm-3">';
                        str += '</div></li>';
                    });
                    str += '</ul>';
                    str += '<input class="form-query" type="hidden"  value="" id="PUNKT_ID" prop_id="PUNKT_ID" />';
                    $(this).after(str);
                    //$("#spisok_okdel").val(str);
                }

            if (items.items.length > 0) {
                var str = '<div class="order delivery-detail">';
                var need = "";
                $.each(items.items, function (key, val) {
                    need = "";
                    need_str = "";
                    if (val.TYPE == "TEXT") {
                        if (val.NEED == true) {
                            need = 'need="true"';
                            need_str = '<font style="color:#b30605">*</font>';
                        } else {
                            need = 'need="false"';
                            need_str = '';
                        }
                        str += '<div class="row"><label>' + val.NAME + '' + need_str + ':</label><input class="form-query" type="text" ' + need + ' value="" id="' + val.CODE + '" prop_id="' + val.PROP_ID + '"/></div>';
                    }

                    if (val.TYPE == "DATE") {
                        if (val.NEED == true) {
                            need = 'need="true"';
                            need_str = '<font style="color:#b30605">*</font>';
                        } else {
                            need = 'need="false"';
                            need_str = '';
                        }
                        str += '<div class="row"><label>' + val.NAME + '' + need_str + ':</label><input class="form-query" type="text" ' + need + ' value="" id="' + val.CODE + '" prop_id="' + val.PROP_ID + '" onclick="sam_moskva(\'' + val.CODE + '\')" readonly="readonly" /></div>';
                    }


                    if (val.TYPE == "DESC") {
                        if (val.NEED == true) {
                            need = 'need="true"';
                            need_str = '<font style="color:#b30605">*</font>';
                        } else {
                            need = 'need="false"';
                            need_str = '';
                        }
                        str += '<div class="row"><label>' + val.NAME + '' + need_str + ':</label><b>' + val.TEXT + '</b></div>';

                    }

                    if (val.TYPE == "TEXTAREA") {
                        if (val.NEED == true) {
                            need = 'need="true"';
                            need_str = '<font style="color:#b30605">*</font>';
                        } else {
                            need = 'need="false"';
                            need_str = '';
                        }
                        str += '<div class="row"><label>' + val.NAME + '' + need_str + ':</label><textarea type="textarea" class="form-query" id="' + val.CODE + '" prop_id="' + val.PROP_ID + '"/></textarea></div>';

                    }
                    if (val.TYPE == "TIME") {
                        if (val.NEED == true) {
                            need = 'need="true"';
                            need_str = '<font style="color:#b30605">*</font>';
                        } else {
                            need = 'need="false"';
                            need_str = '';
                        }
                        str += '<label>Время доставки:' + need_str + '</label>';
                        str += '<div class="block">';
                        str += '<input type="hidden" id="DELIVERY_TIME_TYPE" value="" />';
                        str += '<input type="hidden" id="DELIVERY_TIME" value="" />';
                        $.each(val.TYPES, function (keyTypes, valTypes) {
                            str += '<div class="deliveryTime" current="' + keyTypes + '">' + valTypes.NAME + '</div>';
                        });

                        $.each(val.TYPES, function (keyTypes, valTypes) {
                            str += '<div class="row allTimes" id="' + keyTypes + '">';
                            $.each(valTypes.TIMES, function (keyTimes, valTimes) {
                                str += '<div class="col-sm-2 timeBlock">';
                                str += valTimes;
                                str += '</div>';
                            });
                            str += '</div>';
                        });
                        str += '</div>';
                    }
                    if (val.TYPE == "SELECT") {

                        $.each(val.TYPES, function (keyTypes, valTypes) {

                            str += '<div class=age_cart__order__item">';
                            str += '<div class="page_cart__order__item__title">Способ оплаты</div>';
                            str += '<div class="page_cart__order__item__value">';
                            str += '<div class="section">';
                            str += '<div id="paysystems">';
                            str += '<div class="paysystems_block">';
                            str += '<select id="PAY_SYSTEM_ID" name="PAY_SYSTEM_ID" class="selectbox">';
                            $.each(valTypes.TIMES, function (keyTimes, valTimes) {
                                str += valTimes;
                            });
                            str += '</select></div></div></div></div></div>';

                        });
                    }

                });

                str += '</div>';
                str += '<div class="delivery-punkts">';
                str += '</div>';
                $("#spisok_okdel2").html(str);

                if ($("#CITY_DELIVERY_REGION").val() != undefined) {
                    var insert_block = $(this);
                    $("#CITY_DELIVERY_REGION").click(function () {
                        var text = $(this).val();
                        if (text == "начните вводить текст")
                            $(this).val("");
                    });

                    $("#CITY_DELIVERY_REGION").focusout(function () {
                        var text = $(this).val();
                        if (text == "")
                            $(this).val("начните вводить текст");
                    });

                    $("#CITY_DELIVERY_REGION").autocomplete("/cart/", {
                        delay: 10,
                        minChars: 3,
                        matchSubset: 1,
                        maxItemsToShow: 30,
                        useCache: false,
                        autoFill: false,
                        selectFirst: false,
                        formatItem: liFormat,
                    });

                    $("#CITY_DELIVERY_REGION").result(function (event, data, formatted) {
                        $("#CITY_DELIVERY_REGION").val(data[1]);
                        $("#CITY_DELIVERY_REGION").attr({"city_id": data[0]});
                        GetPunkts(data[1]);
                    });

                }// если надо автокомлпит на город
            }
            return false;
        })

    });


    function liFormat(row, i, num) {
        var result = row[1];
        return result;
    }


    function selectItem(li) {
        if (li == null) var sValue = 'А ничего не выбрано!';
        if (!!li.extra) var sValue = li.extra[0];
        else
            var sValue = li.selectValue;
//	alert("Выбрана запись с ID: " + sValue);
    }

    function GetPunkts(city_name, insert_block) {
        var request_url = "/cart/";
        var action = "get-punkts";
        var params = "city=" + city_name;
        var items = {};
        items = GetData(request_url, action, params);
        if (items.items.length > 0) {
            var str = '<div class="order delivery-detail delivery-punkts">';
            str += '<b>Выберите пункт самовывоза в Вашем городе:</b>';
            $.each(items.items, function (key, val) {
                str += '<div class="row" id="' + val["ID"] + '" price="' + val["PROPERTY_TARIFFZONE_FULL_VALUE"] + '">';
                str += '<div class="col-sm-8"><b>' + val["DETAIL_TEXT"] + '</b><br />Время работы:' + val["PROPERTY_SCHEDULE_VALUE"] + '<br />' + val["PREVIEW_TEXT"] + '</div>';
                str += '<div class="col-sm-4">Стоимость:' + val["PROPERTY_TARIFFZONE_FULL_VALUE"] + ' руб.<br />Срок доставки: от ' + val["PROPERTY_DELIVERYPERIOD_VALUE"] + ' дней</div>';
                str += '</div>';

            });
            str += '</div>';
        }
        str += '<input class="form-query" type="hidden"  value="" id="PUNKT_ID" prop_id="PUNKT_ID" />';
//    $(".delivery-punkts").htmlroy();
        $(".delivery-punkts").html(str);

    }


    function GetData(request_url, action, params) {
        res = false;
        if (action != "") {
            var url = request_url + "?action=" + action;
            if (params != "")
                url += "&" + params;
            console.log(url);
            var res = false;
            $.ajax({
                type: 'GET',
                dataType: "json",
                async: false,
                url: url,
                success: function (data, status) {
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
                error: function (data, status) {
                    console.log(data);
                    res = false;
                }
            });
        } else {
            alert("Define action !");
        }
        return res;
    }


    function UpdateBigBasket() {
        var url = "/cart/?action=get-basket";
        $.ajax({
            type: 'POST',
            dataType: "json",
            url: url,
            success: function (data, status) {
                if (data.result == true) {
                    if (data.items.length > 0) {
                        var str = "";
                        var delivprice = parseInt($("#delivery-price").val());
                        $.each(data.items, function (key, val) {
                                str += '<div basket_id="' + val.ID + '" kratnost="' + val.KRATNOST + '"><div><a href="' + val.DETAIL_PAGE_URL + '" class="img"><img src="' + val.IMG + '" alt="" /></a><a href="' + val.DETAIL_PAGE_URL + '">' + val.NAME + '</a><br /><small>Продаётся кратно ' + val.KRATNOST + ' шт.</small></div>';
                                str += '<div><a href="#" class="cart-btn minus">-</a><input type="text" value="' + val.QUANTITY + '" size="2" readonly /><a href="#" class="cart-btn plus">+</a></div><div>' + val.PRICE + ' руб.</div><div><span class="summ">' + val.PRICE * val.QUANTITY + ' руб.</span></div><div><a href="#" class="cart-btn delete">x</a></div></div>';
                            }
                        );

                        var ordersum = data.summ;
                        data.summ = data.summ + delivprice;

                        str += '<tr><td colspan="2" align="right"></td><td colspan="3" align="right"><span>Общая стоимость:</span><b>' + data.summ + ' руб.</b></td></tr>';
                    }

                    $("#big-basket").html(str);
                    $("#all-summ").html(data.summ + " руб.");
                    $("#all-summ").attr({"summ": data.summ});

                    if (ordersum < 500) {
                        $(".js-send-order").hide();
                        $("#minorder").show();
                    } else {
                        if ($("#delivery-price").val() != 0 && $("#delivery-price").val() != "")
                            $(".js-send-order").show();
                        $("#minorder").hide();
                    }

                    if (data.summ == "0") {
                        $("#basket_free").show();
                        $("#basket_exist").hide();
                    }

                } else {
                    AlertForm('Ошибка обновления корзины')
                }
            },
            error: function (data, status) {
                res = false;
                AlertForm('Ошибка обновления корзины send')
            }
        });
    }
</script>

<script type="text/javascript">
    function formatDate(date) {

        var dd = date.getDate()
        if (dd < 10) dd = '' + dd;
        var mm = date.getMonth() + 1
        if (mm < 10) mm = '0' + mm;
        var yy = date.getFullYear();
        if (yy < 10) yy = '0' + yy;
        return dd + '-' + mm + '-' + yy;
    }

    function sam_piter(dp_id) {
        var p_del = document.getElementById('icon_to_delete');

        var shipday = new Date;
        var shipiday = new Date;
        //alert(shipiday.getDay());
        var name = "#" + dp_id;
        $(name).attr('readonly', 'readonly');
        if (shipiday.getDay() == 1) {
            shipday.setDate(shipday.getDate() + 10);
            shipiday.setDate(shipiday.getDate() + 3);

            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 2) {
            shipday.setDate(shipday.getDate() + 10);
            shipiday.setDate(shipiday.getDate() + 4);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }

        if (shipiday.getDay() == 3) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 3);
            if (shipday.getHours() > 15) {
                shipiday.setDate(shipiday.getDate() + 5);
            }
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 4) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 6);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 5) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 7);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 6) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 5);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 0) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 4);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }


        $("#icon_to_delete").remove();
        $(function () {
            $(name).datepicker("show");
        });
    }

    function sam_moskva(dp_id) {
        var p_del = document.getElementById('icon_to_delete');

        var shipday = new Date;
        var shipiday = new Date;
        var name = "#" + dp_id;
        $(name).attr('readonly', 'readonly');
        if (shipiday.getDay() == 1) {
            shipday.setDate(shipday.getDate() + 10);
            shipiday.setDate(shipiday.getDate() + 2);
            if (shipday.getHours() > 17) {
                shipiday.setDate(shipiday.getDate() + 2);
            }
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 2) {
            shipday.setDate(shipday.getDate() + 10);
            shipiday.setDate(shipiday.getDate() + 3);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }

        if (shipiday.getDay() == 3) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 2);
            if (shipday.getHours() > 17) {
                shipiday.setDate(shipiday.getDate() + 5);
            }
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 4) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 6);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 5) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 5);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 6) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 4);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }
        if (shipiday.getDay() == 0) {
            shipday.setDate(shipday.getDate() + 15);
            shipiday.setDate(shipiday.getDate() + 3);
            $(function () {
                $(name).datepicker({
                    format: "dd-mm-yyyy",
                    startDate: shipiday,
                    endDate: shipday,
                    language: "ru",
                    daysOfWeekDisabled: "0,6",
                    autoclose: true
                });
            });
        }


        $("#icon_to_delete").remove();
        $(function () {
            $(name).datepicker("show");
        });
    }

    function activate_datepicker(dp_id) {
        var p_del = document.getElementById('icon_to_delete');

        var shipday = new Date;
        var shipiday = new Date;
        // alert(shipiday.getDate());
        var next_day_shipment = false;
        if (shipday.getHours() > 15) {
            next_day_shipment = true;
            shipday.setDate(shipday.getDate() + 1);
            shipiday.setDate(shipiday.getDate() + 1);
        }
        shipday.setDate(shipiday.getDate() + 3);
        if (shipday.getDay() <= 3) shipday.setDate(shipday.getDate() + 3);
        else shipday.setDate(shipday.getDate() + 6);


        if (next_day_shipment) wait_days = wait_days + 1;
        var name = "#" + dp_id;
        $(function () {
            $(name).datepicker({
                format: "dd-mm-yyyy",
                startDate: shipiday,
                endDate: shipday,
                language: "ru",
                daysOfWeekDisabled: "0",
                autoclose: true
            });
            $(name).attr('readonly', 'readonly');
        });
        $("#icon_to_delete").remove();
        $(function () {
            $(name).datepicker("show");
        });
    }

    function activate_datepickermkad(dp_id) {
        var p_del = document.getElementById('icon_to_delete');

        var shipday = new Date;
        var shipiday = new Date;
        var next_day_shipment = false;
        if (shipday.getHours() > 15) {
            next_day_shipment = true;
            shipday.setDate(shipday.getDate() + 1);
            shipiday.setDate(shipiday.getDate() + 1);
        }
        shipday.setDate(shipiday.getDate() + 3);
        if (shipday.getDay() <= 3) shipday.setDate(shipday.getDate() + 3);
        else shipday.setDate(shipday.getDate() + 6);


        if (next_day_shipment) wait_days = wait_days + 1;
        var name = "#" + dp_id;
        $(function () {
            $(name).datepicker({
                format: "dd-mm-yyyy",
                startDate: shipiday,
                endDate: shipday,
                language: "ru",
                daysOfWeekDisabled: "0,6",
                autoclose: true
            });
            $(name).attr('readonly', 'readonly');
        });
        $("#icon_to_delete").remove();
        $(function () {
            $(name).datepicker("show");
        });
    }
</script>
