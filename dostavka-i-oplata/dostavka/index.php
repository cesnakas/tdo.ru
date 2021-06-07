<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Условия доставки и оплаты в компании tdobu.ru");
$APPLICATION->SetPageProperty("title", "Условия доставки и оплаты в компании tdobu.ru");
$APPLICATION->SetTitle("Условия доставки");
$APPLICATION->AddChainItem('Условия доставки');
?>
<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",
	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s1",
	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",
	// Номер пункта, начиная с которого будет построена навигационная цепочка
),
                                  false
); ?>
	<div class="pagination-mob">
		<div class="container">
			<a class="pagination-mob_link" href="/dostavka-i-oplata/">Условия доставки</a>
		</div>
	</div>
	<div class="container">
		<div class="wrap-link-back">
			<a class="link-back" href="/dostavka-i-oplata/">Читать о других услугах</a>
		</div>
	</div>

	<div class="serv-content">
	<div class="text-block">
		<div class="container">
			<div class="text-small-h text-small-h-mob-hid">Условия доставки</div>
			<?
			/*
			<div style="font-weight: 600;" class="text-small-h text-small-h-16">Москва и Московская область</div>
			?>
			<form class="big-search-wrap" action="#">
				<input type="text" class="big-input" placeholder="Введите адрес доставки">
				<button class="big-search_btn"></button>
			</form>
<?
			//*/
			?>

			<div class="dev-inf">
				<div class="dev-inf_map">
					<div class="map" style="width:100%;height:100%;">
						<script type="text/javascript" charset="utf-8" async
						        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A186f0f969a0412480b5dca2f595a0551c91622cce2914afd190df6aa67777eb1&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=false"></script>
					</div>

				</div>
				<div class="dev-inf_content">
					<div class="dev-inf_content-head dev-inf_content-head-with-icon">Доставка по Москве</div>
					<div class="dev-inf_content-descp">В пределах МКАД</div>
					<div>
						Доставка осуществляется <b>в течение трех дней</b>, но отдел логистики может оправить заказ
						на следующий же день при наличии свободных машин.
					</div>


					<div class="tariffs">
						<div class="tariffs-row">
							<div class="tariffs-col first-line">
								Зона доставки
							</div>
							<div class="tariffs-col first-line">
								Газель
							</div>
						</div>
						<div class="tariffs-row">
							<div class="tariffs-col">
								Зона 1
							</div>
							<div class="tariffs-col">
								1500
							</div>
						</div>
						<div class="tariffs-row">
							<div class="tariffs-col">
								Зона 2, 4
							</div>
							<div class="tariffs-col">
								1700
							</div>
						</div>
						<div class="tariffs-row">
							<div class="tariffs-col">
								Зона 3
							</div>
							<div class="tariffs-col">
								2500
							</div>
						</div>
						<div class="tariffs-row">
							<div class="tariffs-col">
								Зона 5
							</div>
							<div class="tariffs-col">
								1900
							</div>
						</div>
						<div class="tariffs-row">
							<div class="tariffs-col">
								ОТ МКАД
							</div>
							<div class="tariffs-col">
								ЗОНА + 40 руб. за км.
							</div>
						</div>
					</div>

					<div>
						Доставка по регионам <b>рассчитывается отдельно.</b>
					</div>
					<br><br>
					<div class="text-small-h text-small-h-mob-hid">СРОЧНАЯ ДОСТАВКА</div>

					<div>
						На случай, если вам необходима гарантированная доставка <b>на следующий день</b>, мы
						предусмотрели услугу <b>"Срочная доставка"</b>.
					</div>
					<div>
						Стоимость срочной доставки уточняйте у менеджера.
					</div>

					<br>
					<br>
					<div class="text-small-h text-small-h-mob-hid">ДОСТАВКА ТРАНСПОРТНОЙ КОМПАНИЕЙ</div>

					<div>
						Также мы отправляем грузы транспортной компанией по всей России.
					</div>

				</div>
			</div>

			<div class="delivery-means__type">
				<h2>Самовывоз</h2>
				<p>
					<b>Внимание!</b> Перед тем, как осуществить самовывоз, обязательно согласуйте наличие товара на
					выбранном складе у наших менеджеров!
				</p>
				<p>
					После оформления заказа, вы сможете самостоятельно забрать его по адресам:
				</p>
				<p>
					Москва, Алтуфьевское ш., д.37, стр.2
				</p>
				<p>
					Режим работы:
				</p>
				<p>
					Будни: с 9:00 до 18:00<br>
					Суббота: с 9:00 до 17:00<br>
					Воскресенье: выходной
				</p>
				<div class="map">
					<script type="text/javascript">
                        function BX_SetPlacemarks_yam_1(map) {
                            if (typeof window["BX_YMapAddPlacemark"] != 'function') {
                                /* If component's result was cached as html,
								 * script.js will not been loaded next time.
								 * let's do it manualy.
								*/

                                (function (d, s, id) {
                                    var js, bx_ym = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "/bitrix/templates/unimagazin_s1/components/bitrix/map.yandex.view/.default/script.js";
                                    bx_ym.parentNode.insertBefore(js, bx_ym);
                                }(document, 'script', 'bx-ya-map-js'));

                                var ymWaitIntervalId = setInterval(function () {
                                        if (typeof window["BX_YMapAddPlacemark"] == 'function') {
                                            BX_SetPlacemarks_yam_1(map);
                                            clearInterval(ymWaitIntervalId);
                                        }
                                    }, 300
                                );

                                return;
                            }

                            var arObjects = {PLACEMARKS: [], POLYLINES: []};
                            arObjects.PLACEMARKS[arObjects.PLACEMARKS.length] = BX_YMapAddPlacemark(map, {
                                'LON': '37.579229013947',
                                'LAT': '55.8666900449',
                                'TEXT': 'Торговый дом оборудования'
                            });
                        }
					</script>
					<div class="bx-yandex-view-layout">
						<div class="bx-yandex-view-map">
							<script>
                                var script = document.createElement('script');
                                script.src = 'https://api-maps.yandex.ru/2.0/?load=package.full&mode=release&lang=ru-RU&wizard=bitrix';
                                (document.head || document.documentElement).appendChild(script);
                                script.onload = function () {
                                    this.parentNode.removeChild(script);
                                };
							</script>
							<script type="text/javascript">

                                if (!window.GLOBAL_arMapObjects)
                                    window.GLOBAL_arMapObjects = {};

                                function init_yam_1() {
                                    if (!window.ymaps)
                                        return;

                                    if (typeof window.GLOBAL_arMapObjects['yam_1'] !== "undefined")
                                        return;

                                    var node = BX("BX_YMAP_yam_1");
                                    node.innerHTML = '';

                                    var map = window.GLOBAL_arMapObjects['yam_1'] = new ymaps.Map(node, {
                                        center: [55.866690044893, 37.579229013947],
                                        zoom: 17,
                                        type: 'yandex#map'
                                    });

                                    map.behaviors.enable("scrollZoom");
                                    map.behaviors.enable("dblClickZoom");
                                    map.behaviors.enable("drag");
                                    if (map.behaviors.isEnabled("rightMouseButtonMagnifier"))
                                        map.behaviors.disable("rightMouseButtonMagnifier");
                                    map.controls.add('zoomControl');
                                    map.controls.add('smallZoomControl');
                                    map.controls.add('miniMap');
                                    map.controls.add('typeSelector');
                                    map.controls.add('scaleLine');
                                    if (window.BX_SetPlacemarks_yam_1) {
                                        window.BX_SetPlacemarks_yam_1(map);
                                    }
                                }

                                (function bx_ymaps_waiter() {
                                    if (typeof ymaps !== 'undefined')
                                        ymaps.ready(init_yam_1);
                                    else
                                        setTimeout(bx_ymaps_waiter, 100);
                                })();


                                /* if map inits in hidden block (display:none)
								*  after the block showed
								*  for properly showing map this function must be called
								*/
                                function BXMapYandexAfterShow(mapId) {
                                    if (window.GLOBAL_arMapObjects[mapId] !== undefined)
                                        window.GLOBAL_arMapObjects[mapId].container.fitToViewport();
                                }

							</script>
							<div id="BX_YMAP_yam_1" class="bx-yandex-map" style="height: 300px; width: 100%;">загрузка
								карты...
							</div>
						</div>
					</div>
				</div>
				<p>
					г. Москва, ул. Михневская, дом 21, строение 3
				</p>
				<p>
					Режим работы:
				</p>
				<p>
					Будни: с 9:00 до 18:00<br>
					Суббота: с 9:00 до 17:00<br>
					Воскресенье: выходной
				</p>
				<div class="map">
					<script type="text/javascript">
                        function BX_SetPlacemarks_yam_2(map) {
                            if (typeof window["BX_YMapAddPlacemark"] != 'function') {
                                /* If component's result was cached as html,
								 * script.js will not been loaded next time.
								 * let's do it manualy.
								*/

                                (function (d, s, id) {
                                    var js, bx_ym = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "/bitrix/templates/unimagazin_s1/components/bitrix/map.yandex.view/.default/script.js";
                                    bx_ym.parentNode.insertBefore(js, bx_ym);
                                }(document, 'script', 'bx-ya-map-js'));

                                var ymWaitIntervalId = setInterval(function () {
                                        if (typeof window["BX_YMapAddPlacemark"] == 'function') {
                                            BX_SetPlacemarks_yam_2(map);
                                            clearInterval(ymWaitIntervalId);
                                        }
                                    }, 300
                                );

                                return;
                            }

                            var arObjects = {PLACEMARKS: [], POLYLINES: []};
                            arObjects.PLACEMARKS[arObjects.PLACEMARKS.length] = BX_YMapAddPlacemark(map, {
                                'LON': '37.667068934264',
                                'LAT': '55.581059266679',
                                'TEXT': 'Торговый дом оборудования'
                            });
                        }
					</script>
					<div class="bx-yandex-view-layout">
						<div class="bx-yandex-view-map">
							<script type="text/javascript">

                                if (!window.GLOBAL_arMapObjects)
                                    window.GLOBAL_arMapObjects = {};

                                function init_yam_2() {
                                    if (!window.ymaps)
                                        return;

                                    if (typeof window.GLOBAL_arMapObjects['yam_2'] !== "undefined")
                                        return;

                                    var node = BX("BX_YMAP_yam_2");
                                    node.innerHTML = '';

                                    var map = window.GLOBAL_arMapObjects['yam_2'] = new ymaps.Map(node, {
                                        center: [55.581059266679, 37.667068934264],
                                        zoom: 17,
                                        type: 'yandex#map'
                                    });

                                    map.behaviors.enable("scrollZoom");
                                    map.behaviors.enable("dblClickZoom");
                                    map.behaviors.enable("drag");
                                    if (map.behaviors.isEnabled("rightMouseButtonMagnifier"))
                                        map.behaviors.disable("rightMouseButtonMagnifier");
                                    map.controls.add('zoomControl');
                                    map.controls.add('smallZoomControl');
                                    map.controls.add('miniMap');
                                    map.controls.add('typeSelector');
                                    map.controls.add('scaleLine');
                                    if (window.BX_SetPlacemarks_yam_2) {
                                        window.BX_SetPlacemarks_yam_2(map);
                                    }
                                }

                                (function bx_ymaps_waiter() {
                                    if (typeof ymaps !== 'undefined')
                                        ymaps.ready(init_yam_2);
                                    else
                                        setTimeout(bx_ymaps_waiter, 100);
                                })();


                                /* if map inits in hidden block (display:none)
								*  after the block showed
								*  for properly showing map this function must be called
								*/
                                function BXMapYandexAfterShow(mapId) {
                                    if (window.GLOBAL_arMapObjects[mapId] !== undefined)
                                        window.GLOBAL_arMapObjects[mapId].container.fitToViewport();
                                }

							</script>
							<div id="BX_YMAP_yam_2" class="bx-yandex-map" style="height: 300px; width: 100%;">загрузка
								карты...
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<br>
			<div class="delivery-payments">
				<h2>СПОСОБЫ ОПЛАТЫ</h2>
				<p>
					Свой заказ Вы можете оплатить следующими удобными для Вас способами:
				</p>
				<h3>Для физических лиц:</h3>
				<ul>
					<li>Наличными в офисе компании.</li>
					<li>Оплата картой через платежный терминал PayPal.</li>
				</ul>
				<h3>Для юридических лиц:</h3>
				<ul>
					<li>Для оплаты по безналичному расчету необходимо сделать заказ, после чего менеджер выставит
						счет.
					</li>
					<li>Наличными в офисе при оформлении заказа.</li>
				</ul>
				<p>
					Также Вы можете оформить покупки в рассрочку или кредит.
				</p>

				<style>
                    .tariffs {
                        margin-bottom: 20px;
                        display: flex;
                        flex-wrap: wrap;
                        width: 100%;
                        box-sizing: border-box;
                    }

                    .tariffs-row {
                        width: 100%;
                        display: flex;
                        flex-wrap: wrap;
                        box-sizing: border-box;
                    }

                    .tariffs-col {
                        border: 1px solid #000;
                        border-right-color: rgb(0, 0, 0);
                        border-right-style: solid;
                        border-right-width: 1px;
                        border-bottom-color: rgb(0, 0, 0);
                        border-bottom-style: solid;
                        border-bottom-width: 1px;
                        width: 50%;
                        text-align: center;
                        box-sizing: border-box;
                        line-height: 1.2;
                        padding: 0 5px;
                    }
				</style>

				<?
				/*
				?>

								<div class="dev-inf">
									<div class="dev-inf_map">
										<iframe src="https://yandex.ru/map-widget/v1/-/CKuaVF8Z" width="100%" height="100%"
												frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
									</div>
									<div class="dev-inf_content">
										<div class="dev-inf_content-head dev-inf_content-head-with-icon">Доставка по Москве</div>
										<div class="dev-inf_content-descp">В пределах МКАД</div>
										<div class="text-small-h text-small-h-16">Курьерская доставка</div>

										<div class="wrap-inf_dev">
											<div class="dev-inf_content-text">При заказе до 149 999 ₽</div>
											<div class="dev-inf_content-text-bg">от 2 500 ₽ до 3 600 ₽</div>
										</div>

										<div class="dev-inf_content-text-red">
											<span>* Чтобы уточнить цену, введите адрес доставки у карты</span>
											<span>** Цены приведены из расчёта на автомобиль класса Газель</span>
										</div>
										<div class="wrap-inf_dev">
											<div class="dev-inf_content-text">При заказе от 150 000 ₽</div>
											<div class="dev-inf_content-text-bg">Бесплатно</div>
										</div>

										<div class="wrap-inf_time-head">Ежедневно *</div>
										<div class="wrap-inf_time-wrap">
											<div class="wrap-inf_time-col">
												<span>с 10:00 до 22:00</span>
												<span>с 10:00 до 18:00</span>
												<span>с 10:00 до 15:00</span>
												<span>с 15:00 до 18:00</span>
												<span>с 18:00 до 22:00</span>
											</div>
										</div>

										<div class="wrap-inf_gray-text">* Желаемую дату и время доставки вы можете выбрать на финальной
											странице оформления заказа
										</div>
										<div class="dev-inf_content-head">Самовывоз</div>
										<a class="btn big-btn btn-red dev-inf-btn" href="#">Найти ближайший пункт</a>

									</div>
								</div>



								<div class="descript-cart">Выберите на карте область доставки</div>

								<div class="text-small-h">Способы доставки по Москве в пределах МКАД</div>


								<div class="dev-way">

									<div class="dev-way-row">
										<div class="dev-way-item">
											<div class="dev-way_item-name">
												<div class="dev-way_item-num">1</div>
												<span>Курьерская доставка</span>
											</div>
											<div class="dev-way_descrip">
												<span>При заказе до 149 999 ₽</span>
												<span class="span-red">от 2 500 ₽</span>
											</div>
											<div class="dev-way_descrip">
												<span>При заказе от 150 000 ₽</span>
												<span class="span-red">Бесплатно</span>
											</div>
										</div>

										<div class="dev-way-item dev-way-item--time">
											<div class="dev-way_item-name-gray">Время</div>
											<div class="wrap-inf_time-col">
												<span>с 10:00 до 22:00</span>
												<span>с 10:00 до 18:00</span>
												<span>с 10:00 до 15:00</span>
												<span>с 15:00 до 18:00</span>
												<span>с 18:00 до 22:00</span>
											</div>
										</div>

										<div class="dev-way-item">
											<div class="dev-way_item-name-gray">Условия</div>
											<p class="text-p">Окончательнаястоимость доставки зависит от выбора зоны доставки и объёма
												автомобиля.</p>
											<p class="text-p">Желаемую дату и время доставки вы можете выбрать на финальной странице
												оформления заказа</p>
											<p class="text-p"><span style="font-weight: 600; color: #EB5757;">Загрузка:</span>
												оборудования производится грузчиками нашей компании</p>
											<p class="text-p"><span style="font-weight: 600; color: #EB5757;">Выгрузка:</span>
												осуществляется силами покупателя</p>
										</div>
									</div>

									<div class="dev-way-row">
										<div class="dev-way-item">
											<div class="dev-way_item-name">
												<div class="dev-way_item-num">2</div>
												<span>Самовывоз</span>
											</div>

											<a class="btn big-btn btn-red btn-short" href="#">Найти ближайший пункт</a>

										</div>
										<div class="dev-way-item">
											<div class="dev-way_item-name-gray">Условия</div>
											<p class="text-p">Самовывоз оплачивается после просчета.</p>
										</div>
									</div>

									<div class="text-small-h">Доставка по России</div>
									<div class="dev-way-row">
										<div class="dev-way-item">
											<div class="dev-way_item-name">
												<div class="dev-way_item-num">1</div>
												<span>Самовывоз</span>
											</div>

											<a class="btn big-btn btn-red btn-short" href="#">Найти ближайший пункт</a>

										</div>
										<div class="dev-way-item">
											<div class="dev-way_item-name-gray">Условия</div>
											<p class="text-p">Доставка по России осуществляется транспортной компанией Boxberry. Чтобы
												определить наличие ближайшего к Вам ПВЗ, воспользуйтесь виджетом</p>
										</div>
									</div>

								</div>

				<?
//				 */
				?>
			</div>
		</div>
	</div>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>