<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Технологическое проектирование под ключ любой сложности для кафе, ресторанов и других предприятий общепита от компании ТДО.");
$APPLICATION->SetPageProperty("title", "Разработка технологического проекта для общепита");
$APPLICATION->SetPageProperty("description",
                              "Технологическое проектирование под ключ любой сложности для кафе, ресторанов и других предприятий общепита от компании ТДО.");
$APPLICATION->SetTitle("Технологический проект");
?>

<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",
	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s2",
	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",
	// Номер пункта, начиная с которого будет построена навигационная цепочка
),
                                  false
); ?>

	<div class="pagination-mob">
		<div class="container">
			<a class="pagination-mob_link" href="/serv/">Читать о других услугах</a>
		</div>
	</div>

	<div class="container">
		<div class="wrap-link-back">
			<a class="link-back" href="/serv/">Читать о других услугах</a>
		</div>
	</div>

		<div class="serv-content-wrap">
			<div class="text-block">
				<div class="container">
					<div class="proektirovanie-title-block">
						<h1>Технологический проект</h1>
					</div>
					<div class="proektirovanie-top-block mb-mod">
						<? $APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/serv_projects.php"),
							array(),
							array('MODE' => 'text')
						); ?>
						<div class="proektirovanie-banner-wrap banner-position" style="background-image: url('/local/templates/tdo_shop/img/3d-kitchen-min.jpg')">
						</div>
					</div>


					<div class="proektirovanie-description">
						<h2>Как обустроить производственное помещение? Как учесть все нормы и правила проектирования?<br> А главное – где найти нужное оборудование?</h2>
						<p>
							Компания ТДО предоставляет услугу «Технологический проект»! Мы подготовим для Вас проект
							эффективной
							кухни с правильной организацией рабочих мест в соответствии с Вашим технологическим
							процессом.
						</p>
						<h2>Технологический проект “под ключ”</h2>
						<p>
							Наши опытные проектировщики грамотно разместят оборудование на кухне любой сложности,
							основываясь на
							требованиях СанПиНа, РОСПОТРЕБНАДЗОРа и ГОСТов.
						</p>
						<p>
							На этом этапе составляется перечень необходимого оборудования, план его размещения, в
							зависимости от
							концепции и внутренней логистики заведения.
						</p>
						<p>
							При подборе оборудования учитывается его стоимость, стоимость сервисного обслуживания и
							ремонта, а
							также энергозатрат.
						</p>
						<h2>Что входит в технологический проект? </h2>
						<ul>
							<li>Обмерный план;</li>
							<li>План размещения технологического оборудования;</li>
							<li>План возводимых/сносимых перегородок ;</li>
							<li>Монтажные привязки и оборудованию водоснабжения и канализации;</li>
							<li>Монтажные привязки к оборудованию электроснабжения;</li>
							<li>Схема вентиляционных зонтов;</li>
							<li>Графическая визуализация.</li>
						</ul>
						<h2>Какой сегмент бизнеса охватывает ?</h2>
						<ul>
							<li>Кафе,</li>
							<li>Пекарни,</li>
							<li>Рестораны,</li>
							<li>Пиццерии,</li>
							<li>Закусочные,</li>
							<li>Кофейни,</li>
							<li>Кухни на вынос,</li>
							<li>Кафетерии,</li>
							<li>Производственные цеха,</li>
							<li>Фудмоллы,</li>
							<li>Булочные.</li>
						</ul>
						<p>
							Компания «Торговый дом Оборудования» возьмет на себя технологическое проектирование Вашей
							кухни,
							исходя из потребностей Вашего бизнеса.
						</p>
					</div>
					<div class="proektirovanie-sample-block">
						<div class="project-sample__header">
							<p class="h3-mod">
								1. Технологический проект «Кухня при кафе»
							</p>
						</div>
						<hr>
						<br>
						<div class="proektirovanie-sample-slider-block">
							<div class="proektirovanie-sample-slider-inner-block">
								<div class="main-sample-slider tp01">
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_01"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_01_01.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_01.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_01"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_01_02.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_02.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_01"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_01_03.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_03.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_01"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_01_04.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_04.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_01"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_01_05.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_05.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_01"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_01_06.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_06.png">
										</a>
									</div>
								</div>
								<!--./main-sample-slider-->
								<div class="proektirovanie-sample-description">
									<div class="proektirovanie-sample-description-item">
										<p>
											Тип заведения -&nbsp;
										</p>
										<p>
											«Кафе-столовая»
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Площадь кухни -&nbsp;
										</p>
										<p>
											35&nbsp;м2
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за проект -&nbsp;
										</p>
										<p>
											10 000 р
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за оборудование -&nbsp;
										</p>
										<p>
											500 000 р
										</p>
									</div>
								</div>
								<!--./proektirovanie-sample-description-->
							</div>
							<!--./proektirovanie-sample-slider-inner-block-->
							<div class="thumb-sample-slider-block">
								<div class="thumb-sample-slider tp01">
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_01.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_02.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_03.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_04.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_05.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_01_06.png">
										</div>
									</div>
								</div>
								<!--./thumb-sample-slider-->
								<div class="sample-slider-arrows-container tp01">
								</div>
							</div>
							<!--./thumb-sample-slider-block-->
						</div>
						<!--./proektirovanie-sample-slider-block-->
						<div class="background-image-wrap">
							<img src="/local/templates/tdo_shop/img/serv_images/kitchen-in-rest.jpg">
							<div class="background-image-mask">
							</div>
						</div>
					</div>
					<!--./proektirovanie-sample-block--> <br>
					<div class="proektirovanie-sample-block" style="display:none;">
						<div class="project-sample__header">
							<p class="h3-mod">
								2. Технологический проект «Кухня при ресторане»
							</p>
						</div>
						<hr>
						<br>
						<div class="proektirovanie-sample-slider-block">
							<div class="proektirovanie-sample-slider-inner-block">
								<div class="main-sample-slider tp02">
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_02"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_02_01.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_01.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_02"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_02_02.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_02.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_02"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_02_03.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_03.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_02"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_02_04.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_04.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_02"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_02_05.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_05.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_02"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_02_06.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_06.png">
										</a>
									</div>
								</div>
								<!--./main-sample-slider-->
								<div class="proektirovanie-sample-description">
									<div class="proektirovanie-sample-description-item">
										<p>
											Тип заведения -&nbsp;
										</p>
										<p>
											«Итальянский ресторан на 60 посадочных мест»
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Площадь кухни -&nbsp;
										</p>
										<p>
											25&nbsp;м2
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за проект -&nbsp;
										</p>
										<p>
											10 000 р
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за оборудование -&nbsp;
										</p>
										<p>
											750 000 р
										</p>
									</div>
								</div>
								<!--./proektirovanie-sample-description-->
							</div>
							<!--./proektirovanie-sample-slider-inner-block-->
							<div class="thumb-sample-slider-block">
								<div class="thumb-sample-slider tp02">
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_01.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_02.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_03.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_04.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_05.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_02_06.png">
										</div>
									</div>
								</div>
								<!--./thumb-sample-slider-->
								<div class="sample-slider-arrows-container tp02">
								</div>
							</div>
							<!--./thumb-sample-slider-block-->
						</div>
						<!--./proektirovanie-sample-slider-block-->
						<div class="background-image-wrap">
							<img src="/local/templates/tdo_shop/img/serv_images/kitchen-in-rest.jpg">
							<div class="background-image-mask">
							</div>
						</div>
					</div>
					<!--./proektirovanie-sample-block--> <br>
					<div class="proektirovanie-sample-block">
						<div class="project-sample__header">
							<p class="h3-mod">
								2. Технологический проект «Кухня при кафе-чебуречной»
							</p>
						</div>
						<hr>
						<br>
						<div class="proektirovanie-sample-slider-block">
							<div class="proektirovanie-sample-slider-inner-block">
								<div class="main-sample-slider tp03">
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_03"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_03_01.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_01.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_03"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_03_02.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_02.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_03"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_03_03.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_03.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_03"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_03_04.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_04.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_03"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_03_05.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_05.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_03"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_03_06.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_06.png">
										</a>
									</div>
								</div>
								<!--./main-sample-slider-->
								<div class="proektirovanie-sample-description">
									<div class="proektirovanie-sample-description-item">
										<p>
											Тип заведения -&nbsp;
										</p>
										<p>
											«Кафе-чебуречная»
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Площадь кухни -&nbsp;
										</p>
										<p>
											8,5&nbsp;м2
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за проект -&nbsp;
										</p>
										<p>
											10 000 р
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за оборудование -&nbsp;
										</p>
										<p>
											700 000 р
										</p>
									</div>
								</div>
								<!--./proektirovanie-sample-description-->
							</div>
							<!--./proektirovanie-sample-slider-inner-block-->
							<div class="thumb-sample-slider-block">
								<div class="thumb-sample-slider tp03">
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_01.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_02.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_03.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_04.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_05.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_03_06.png">
										</div>
									</div>
								</div>
								<!--./thumb-sample-slider-->
								<div class="sample-slider-arrows-container tp03">
								</div>
							</div>
							<!--./thumb-sample-slider-block-->
						</div>
						<!--./proektirovanie-sample-slider-block-->
						<div class="background-image-wrap">
							<img src="/local/templates/tdo_shop/img/serv_images/kitchen-in-rest.jpg">
							<div class="background-image-mask">
							</div>
						</div>
					</div>
					<!--./proektirovanie-sample-block--> <br>
					<div class="proektirovanie-sample-block">
						<div class="project-sample__header">
							<p class="h3-mod">
								3. Технологический проект «Кухня при Миграционном центре»
							</p>
						</div>
						<hr>
						<br>
						<div class="proektirovanie-sample-slider-block">
							<div class="proektirovanie-sample-slider-inner-block">
								<div class="main-sample-slider tp04">
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_04"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_04_01.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_01.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_04"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_04_02.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_02.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_04"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_04_03.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_03.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_04"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_04_04.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_04.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_04"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_04_05.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_05.png">
										</a>
									</div>
								</div>
								<!--./main-sample-slider-->
								<div class="proektirovanie-sample-description">
									<div class="proektirovanie-sample-description-item">
										<p>
											Тип заведения -&nbsp;
										</p>
										<p>
											«Кафе-столовая при Миграционном центре»
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Площадь кухни -&nbsp;
										</p>
										<p>
											310&nbsp;м2
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за проект -&nbsp;
										</p>
										<p>
											20 000 р
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за оборудование -&nbsp;
										</p>
										<p>
											6 000 000 р
										</p>
									</div>
								</div>
								<!--./proektirovanie-sample-description-->
							</div>
							<!--./proektirovanie-sample-slider-inner-block-->
							<div class="thumb-sample-slider-block">
								<div class="thumb-sample-slider tp04">
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_01.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_02.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_03.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_04.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_04_05.png">
										</div>
									</div>
								</div>
								<!--./thumb-sample-slider-->
								<div class="sample-slider-arrows-container tp04">
								</div>
							</div>
							<!--./thumb-sample-slider-block-->
						</div>
						<!--./proektirovanie-sample-slider-block-->
						<div class="background-image-wrap">
							<img src="/local/templates/tdo_shop/img/serv_images/kitchen-in-rest.jpg">
							<div class="background-image-mask">
							</div>
						</div>
					</div>
					<!--./proektirovanie-sample-block--> <br>
					<div class="proektirovanie-sample-block" style="display:none;">
						<div class="project-sample__header">
							<p class="h3-mod">
								5. Технологический проект «Производственная кухня»
							</p>
						</div>
						<hr>
						<br>
						<div class="proektirovanie-sample-slider-block">
							<div class="proektirovanie-sample-slider-inner-block">
								<div class="main-sample-slider tp05">
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_05_01.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_01.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_05_02.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_02.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_05_03.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_03.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_05_04.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_04.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_05_05.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_05.png">
										</a>
									</div>
									<div class="main-sample-slide">
										<a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
										   href="/local/templates/tdo_shop/img/serv_images/tp/tp_05_06.png"> <img
													src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_06.png">
										</a>
									</div>
								</div>
								<!--./main-sample-slider-->
								<div class="proektirovanie-sample-description">
									<div class="proektirovanie-sample-description-item">
										<p>
											Тип заведения -&nbsp;
										</p>
										<p>
											«Еда на вынос»
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Площадь кухни -&nbsp;
										</p>
										<p>
											113&nbsp;м2
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за проект -&nbsp;
										</p>
										<p>
											20 000 р
										</p>
									</div>
									<div class="proektirovanie-sample-description-item">
										<p>
											Цена за оборудование -&nbsp;
										</p>
										<p>
											950 000 р
										</p>
									</div>
								</div>
								<!--./proektirovanie-sample-description-->
							</div>
							<!--./proektirovanie-sample-slider-inner-block-->
							<div class="thumb-sample-slider-block">
								<div class="thumb-sample-slider tp05">
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_01.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_02.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_03.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_04.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_05.png">
										</div>
									</div>
									<div class="thumb-sample-slide">
										<div class="thumb-sample-slide-img-wrap">
											<img src="/local/templates/tdo_shop/img/serv_images/tp/tp_05_06.png">
										</div>
									</div>
								</div>
								<!--./thumb-sample-slider-->
								<div class="sample-slider-arrows-container tp05">
								</div>
							</div>
							<!--./thumb-sample-slider-block-->
						</div>
						<!--./proektirovanie-sample-slider-block-->
						<div class="background-image-wrap">
							<img src="/local/templates/tdo_shop/img/serv_images/kitchen-in-rest.jpg">
							<div class="background-image-mask">
							</div>
						</div>
					</div>
					<!--./proektirovanie-sample-block-->

					<? $APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("/include/serv_modals.php"),
						array(),
						array('MODE' => 'text')
					); ?>


				</div>


			</div>
		</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>