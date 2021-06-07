<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Предлагаем комплексные решения по оборудованию магазинов и супермаркетов под ключ, а также пекарен, кафе, столовых, ресторанов. Работаем по Москве и всей России.");
$APPLICATION->SetPageProperty("title", "Оборудование магазинов под ключ - оборудование ресторанов, кафе и других заведений");
$APPLICATION->SetTitle("Услуги");
?>

<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s2",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
),
                                  false
);?>
<div class="pagination-mob">
	<div class="container">
 <a class="pagination-mob_link" href="#">Услуги</a>
	</div>
</div>
<div class="serv-content">
	<div class="text-block">
		<div class="container">
			<div class="text-small-h text-small-h-mob-hid">
				 Услуги
			</div>
			<p class="text-p">
				 Компания Торговый дом оборудования представляет услуги
			</p>
			<div class="wrapper-serv-trig serv-page_trig">
				<div class="serv-trig_item">
					<div style="background-image: url('/local/templates/tdo_shop/img/icons/serv1.svg')" class="serv-trig_item-img">
					</div>
					<div class="serv-trig_item-content">
						<div class="serv-trig_item-content-h">
							 Проектирование магазинов и ресторанов под ключ
						</div>
						<div class="text-block_p">
							 Компания Торговый дом оборудования представляет новую услугу для предприятий сегмента HoReCa – проектирование «под ключ» для: супермаркетов, ресторанов, кафе, баров, пиццерий, магазинов, столовых, кулинарии, пекарни, отелей, санаториев.
						</div>
 <a class="small-red-link" href="/serv/turnkey-design-of-shops-and-restaurants/">Подробнее</a>
					</div>
				</div>
				<div class="serv-trig_item">
					<div style="background-image: url('/local/templates/tdo_shop/img/icons/serv3.svg')" class="serv-trig_item-img">
					</div>
					<div class="serv-trig_item-content">
						<div class="serv-trig_item-content-h">
							 Аренда торгового оборудования
						</div>
						<div class="text-block_p">
							 Услуги аренды торгового оборудования востребованы для различных мероприятий, выставок, кулинарных мастер-классов, презентаций, ярмарок выходного дня, кейтерингов и загородных выездов.
						</div>
 <a class="small-red-link" href="/serv/rental-of-commercial-equipment/">Подробнее</a>
					</div>
				</div>
				<?
				/*
				?>
				<div class="serv-trig_item">
					<div style="background-image: url('/local/templates/tdo_shop/img/icons/serv2.svg')" class="serv-trig_item-img">
					</div>
					<div class="serv-trig_item-content">
						<div class="serv-trig_item-content-h">
							 Оборудование магазинов и ресторанов под ключ
						</div>
						<div class="text-block_p">
							 Компания Торговый дом оборудования представляет новую услугу «Комплексное оснащение под ключ». Наши специалисты разработают дизайн проект и помогут подобрать оборудование с учетом особенностей заведения, а также минимизировать затраты и увеличить прибыль
						</div>
 <a class="small-red-link" href="/serv/equipment-for-shops-and-turnkey-restaurants/">Подробнее</a>
					</div>
				</div>
				<?
				*/
				?>

				<div class="serv-trig_item">
					<div style="background-image: url('/local/templates/tdo_shop/img/icons/serv4.svg')" class="serv-trig_item-img serv-trig_item-img-dollar">
					</div>
					<div class="serv-trig_item-content">
						<div class="serv-trig_item-content-h">
							 Скупка торгового оборудования б/у
						</div>
						<div class="text-block_p">
							 Ваше предприятие закрывается или же требует обновления, а старое оснащение нужно продать как можно скорее? Тогда Вы обратились по адресу!
						</div>
 <a class="small-red-link" href="/serv/redemption-of-trading-equipment/">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	".default", 
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"COMPONENT_TEMPLATE" => ".default",
		"PATH" => "/include/useful_information.php"
	),
	false
);?-->

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>