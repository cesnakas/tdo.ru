<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty('title', 'Контакты компании tdobu.ru');
$APPLICATION->SetPageProperty('description', 'Контакты компании tdobu.ru');
$APPLICATION->AddChainItem('Контакты');

?><?/*
<div id="contact-form_mobile-mask" class="contact-form_mobile-mask">
	<div class="default-form default-form-contact">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"contacts",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "contacts",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "Y",
		"HIDDEN_CAPTCHA" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"NOT_SHOW_FILTER" => array(0=>"",1=>"",),
		"NOT_SHOW_TABLE" => array(0=>"",1=>"",),
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LICENCE" => "",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "Y",
		"VARIABLE_ALIASES" => array("action"=>"action",),
		"WEB_FORM_ID" => "13"
	)
);?>
	</div>
</div>
*/?> <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadcrumb",
	Array(
		"PATH" => "",
		"SITE_ID" => "s2",
		"START_FROM" => "0"
	)
);?>
<div class="pagination-mob">
	<div class="container">
 <a class="pagination-mob_link" href="#">Схема проезда</a>
	</div>
</div>
<div class="contact-content">
	<div class="container">
		<div class="contact-content-item">
			<div class="section-row">
				<div class="text-small-h text-small-h-mob-hid">
					 Схема проезда
				</div>
				 <!-- HCard -->
				<div class="vcard" style="display:none !important">
					<div>
 <span class="category">Торговый дом</span> <span class="fn org">Торговый Дом Оборудования</span>
					</div>
					<div class="adr">
 <span class="locality">г. Москва</span>, <span class="street-address">Алтуфьевское ш., д.37, стр.2</span>
					</div>
					<div>
						 Телефон: <span class="tel">+7 (499) 521-15-08</span>
					</div>
					<div>
						 Мы работаем <span class="workhours">Пн-Пт с 9:00 до 18:00; Сб с 9:00 до 17:00; Вс выходной</span> <a href="https://tdo.ru/" class="url">https://tdo.ru/</a>
					</div>
				</div>
				 <!-- HCard -->
				<div class="contact-info">
					<div class="contact-info_item contact-info_item-phone">
 <a class="contact-info_item-link" href="#">8 (499) 521-1508</a>
					</div>
					<div class="contact-info_item contact-info_item-adres-wrap">
 <span class="contact-info_item-adres"><span class="text-p--red">Офис и главный зал:</span> г. Москва, Алтуфьевское ш., д.37, стр.2</span>
					</div>
					<div class="contact-info_item contact-info_item-adres-wrap">
 <span class="contact-info_item-adres"><span class="text-p--red">Малый зал:</span> г. Москва, ул. Михневская, д. 21, стр. 3</span>
					</div>
					<div class="contact-info_item contact-info_item-time-wrap">
 <span class="contact-info_item-time">Пн-Пт с 9:00 до 18:00</span> <span class="contact-info_item-time">Сб с 9:00 до 17:00</span> <span class="contact-info_item-time">Вс выходной</span>
					</div>
				</div>
				<div class="important-block--red">
					<div class="important-block--red_head">
						 Необходим паспорт
					</div>
					<div class="important-block--red_text">
						 Для прохода на территорию Логистического центра «Аврора» действует пропускная система
					</div>
					<div class="important-block--red_head">
						 На территорию центра не пропускают машины
					</div>
					<div class="important-block--red_text">
						 Каршеринга, как грузовые, так и легковые.
					</div>
				</div>
				<div class="text-small-h text-small-h-16">
					 Описание проезда в ТДО
				</div>
				<div class="link-dashed-wrap">
 <a class="link-dashed" href="#" data-fancybox="" data-src="#mobal-city-bus">Городским транспортом до остановки «Алтуфьевское шоссе, дом 30»</a>
					<div id="mobal-city-bus" class="modal-base">
						<ul>
							<li>от ст. м. Алтуфьево авт. 98, 259 тролл 73 ост. "Алтуфьевское шоссе, дом 30"</li>
							<li>от ст. м. ВДНХ тролл 73 ост. "Алтуфьевское шоссе, дом 30". Перейти ч/з дорогу&nbsp;</li>
							<li>
							от ст. м. Владыкино авт. 259 ост. "Алтуфьевское шоссе, дом 30". Перейти ч/з дорогу </li>
							<li>
							от ст. м. Войковская мини-автобус&nbsp;282&nbsp;ост. "Алтуфьевское шоссе, дом 30". Перейти ч/з дорогу </li>
							<li>
							от ст. м. Медведково маршрутка 353м ост. "Алтуфьевское шоссе, дом 30" </li>
							<li>
							от ст. м. Отрадное&nbsp;мини-автобус&nbsp;380, автобус 62 ост. "Алтуфьевское шоссе, дом 30" </li>
							<li>
							от ст. м. Петровско-Разумовская авт. 282 ост. "Алтуфьевское шоссе, дом 30". Перейти ч/з дорогу </li>
							<li>
							от ст. м. Свиблово мини-автобус 380,&nbsp;&nbsp;"Алтуфьевское шоссе, дом 30" </li>
							<li>
							от ст. м. Тимирязевская авт. 23 ост. "Алтуфьевское шоссе, дом 30". Перейти ч/з дорогу </li>
							<li>
							от ж/д ст. Дегунино пешком </li>
						</ul>
						<p>
						</p>
						<p>
							 Если ехать из области, то 1-й вагон электрички. Перейти через ж/д пути на противоположную сторону, повернуть налево, через 50 м повернуть направо в сторону розовых ворот, идти по дорожке прямо, потом налево до ворот Логистического центра «Аврора».<br>
						</p>
						<p>
 <b>На автомобиле</b><br>
						</p>
						<div>
 <u>Алтуфьевское шоссе, д. 37 стр. 2 </u> <br>
 <b>Со стороны МКАД:</b> <br>
							 Двигаясь по Алтуфьевскому шоссе в сторону центра, Вы проезжаете мост над улицей Декабристов.<br>
							 Далее — съезжаете на дублер и, проехав 150 м прямо, сворачиваете направо (ориентир: напротив (слева от Вас)<br>
							 надземный пешеходный переход через Алтуфьевское шоссе), далее проезжаете 50 метров вглубь, паркуетесь, где сможете.<br>
 <b>Из центра:</b> <br>
							 Въезжаете на Алтуфьевское шоссе, минуете перекресток с улицей Хачатуряна (круговое движение) и поворачиваете налево на следующем перекрестке (под стрелку), <br>
							 съезжаете на дублер (Автосалон «Рольф» остается слева от Вас). Едете по дублеру прямо в сторону области 400 м, напротив надземного пешеходного перехода <br>
							 через Алтуфьевское шоссе поворачиваете налево. далее проезжаете 50 метров вглубь, паркуетесь, где сможете.
						</div>
						<div>
 <br>
 <br>
 <span style="font-size: 14pt;"><b>Реквизиты</b></span> <br>
 <br>
 <b>ИНН</b> 7727429081<br>
 <b>Юридический адрес</b> 127410, г.Москва, Муниципальный округ Южное Бутово, ул. Адмирала Руднева, дом 4, офис 3, пом. 6.<br>
 <b>КПП</b> 772701001<br>
 <b>ОГРН</b> 1197746570340<br>
						</div>
						<hr>
						<p>
 <span style="color: #ee1d24;"><b><span style="font-size: 18pt;">Не забудьте взять с собой паспорт – на территории Логистического центра «Аврора» действует пропускная система</span></b></span>
						</p>
						<p>
 <span style="color: #ee1d24;"><b><span style="font-size: 18pt;">Обращаем Ваше внимание, что машины каршеринга, как грузовые, так и легковые, на территорию центра не пропускают.</span></b></span>
						</p>
					</div>
				</div>
				<div class="link-dashed-wrap">
 <a class="link-dashed" href="#" data-fancybox="" data-src="#mobal-city-car">На автомобиле</a>
					<div id="mobal-city-car" class="modal-base">
						<div>
 <u>Алтуфьевское шоссе, д. 37 стр. 2 </u> <br>
 <b>Со стороны МКАД:</b> <br>
							 Двигаясь по Алтуфьевскому шоссе в сторону центра, Вы проезжаете мост над улицей Декабристов.<br>
							 Далее — съезжаете на дублер и, проехав 150 м прямо, сворачиваете направо (ориентир: напротив (слева от Вас)<br>
							 надземный пешеходный переход через Алтуфьевское шоссе), далее проезжаете 50 метров вглубь, паркуетесь, где сможете.<br>
 <b>Из центра:</b> <br>
							 Въезжаете на Алтуфьевское шоссе, минуете перекресток с улицей Хачатуряна (круговое движение) и поворачиваете налево на следующем перекрестке (под стрелку), <br>
							 съезжаете на дублер (Автосалон «Рольф» остается слева от Вас). Едете по дублеру прямо в сторону области 400 м, напротив надземного пешеходного перехода <br>
							 через Алтуфьевское шоссе поворачиваете налево. далее проезжаете 50 метров вглубь, паркуетесь, где сможете.
						</div>
					</div>
				</div>
			</div>
			<div class="section-row">
				<div class="text-small-h text-small-h-14">
					 Реквизиты
				</div>
				<div class="rekv-item">
 <span class="rekv-bold">ИНН</span>
					7715962150
				</div>
				<div class="rekv-item">
 <span class="rekv-bold">Юридический адрес</span>
					127410, г.Москва, Алтуфьевское ш., д.37, стр.2
				</div>
				<div class="rekv-item">
 <span class="rekv-bold">КПП </span>
					771501001
				</div>
				<div class="rekv-item">
 <span class="rekv-bold">ОГРН </span>
					1137746374875
				</div>
			</div>
		</div>
		<div class="contact-content-item form-wrap">
			<div class="default-form default-form-contact">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:form",
	"contacts",
	Array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600000",
		"CACHE_TYPE" => "A",
		"CHAIN_ITEM_LINK" => "",
		"CHAIN_ITEM_TEXT" => "",
		"COMPONENT_TEMPLATE" => "contacts",
		"EDIT_ADDITIONAL" => "N",
		"EDIT_STATUS" => "Y",
		"HIDDEN_CAPTCHA" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"NOT_SHOW_FILTER" => array(0=>"",1=>"",),
		"NOT_SHOW_TABLE" => array(0=>"",1=>"",),
		"RESULT_ID" => $_REQUEST[RESULT_ID],
		"SEF_MODE" => "N",
		"SHOW_ADDITIONAL" => "N",
		"SHOW_ANSWER_VALUE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_LICENCE" => "",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_STATUS" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"START_PAGE" => "new",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "Y",
		"VARIABLE_ALIASES" => array("action"=>"action",),
		"WEB_FORM_ID" => "13"
	)
);?>
			</div>
		</div>
		<div class="contact-form_mobile-btn">
			<div class="text-small-h">
				 Ответим на любые вопросы
			</div>
 <a data-fancybox="" data-src="#contact-form_mobile-mask" class="btn big-btn btn-red" href="#">Написать нам</a>
		</div>
	</div>
</div>
 <a name="contact-map"></a>
<div class="contact-map">
	 <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Af63d7d0cde151882e1e840238922434bcc52896147574a17c8c0e9b7f7427b4c&amp" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
</div>
 <br><? require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php' ?>