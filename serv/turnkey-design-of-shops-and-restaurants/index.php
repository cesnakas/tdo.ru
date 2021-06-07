<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Предлагаем комплексные решения по оборудованию магазинов и супермаркетов под ключ, а также пекарен, кафе, столовых, ресторанов. Работаем по Москве и всей России.");
$APPLICATION->SetPageProperty("title", "Оборудование магазинов под ключ - оборудование ресторанов, кафе и других заведений");
$APPLICATION->SetTitle("Проектирование магазинов и ресторанов под ключ");
$APPLICATION->AddChainItem('Проектирование магазинов и ресторанов под ключ');
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
			<a class="pagination-mob_link" href="/serv/">Проектирование магазинов и ресторанов под ключ</a>
		</div>
	</div>

	<div class="container">
		<div class="wrap-link-back">
			<a class="link-back" href="/serv/">Назад</a>
		</div>
	</div>


	<div class="serv-content-wrap">
		<div class="text-block">

			<div class="container">
				<div class="proektirovanie-title-block"><h1>Проектирование магазинов и ресторанов под ключ</h1></div>
				<div class="proektirovanie-top-block mb-mod">
					<? $APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("/include/serv_projects.php"),
						array(),
						array('MODE' => 'text')
					); ?>
					<div class="proektirovanie-banner-wrap">

						<div class="nav-services">
							<ul>
								<li class="uni_col uni-33">
									<a href="/serv/technological-project/" class="image">
										<div class="wrapper">
											<div class="wrapper-shadow">
												<div class="category-image"
												     style="background-image: url('/local/templates/tdo_shop/img/3d-kitchen-min.jpg');"></div>
												<span class="name solid_element">Профессиональная кухня</span>
											</div>
										</div>
									</a>

								</li>
								<li class="uni_col uni-33">
									<a href="/serv/proek-rasstanovki/" class="image">
										<div class="wrapper">
											<div class="wrapper-shadow">
												<div class="category-image"
												     style="background-image: url('/local/templates/tdo_shop/img/3d-magazin-min.jpg');"></div>
												<span class="name solid_element">Магазин</span>
											</div>
										</div>
									</a>

								</li>
								<li class="uni_col uni-33">
									<a href="/serv/dizayn-proekt/" class="image">
										<div class="wrapper">
											<div class="wrapper-shadow">
												<div class="category-image"
												     style="background-image: url('/local/templates/tdo_shop/img/3d-design-min.jpg');"></div>
												<span class="name solid_element">Дизайн ресторана, кафе, бара</span>
											</div>
										</div>
									</a>

								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>

			<div class="serv-to-col serv-to-col-with-woman">
				<div class="container">
					<div class="serv-content">
						<div class="text-small-h">Начните с ПРОЕКТА своего будущего бизнеса. Когда есть идея, решение
							придёт само!
						</div>
						<p class="text-p">Компания Торговый дом оборудования представляет новую услугу для предприятий
							сегмента HoReCa – проектирование «под ключ»</p>
						<h2 class="text-small-h text-small-h-14">Варианты мест для которых мы предоставляем
							оборудование:
						</h2>
						<div class="custom-ul_red-dot-wrap">
							<ul class="custom-ul_red-dot">
								<li>супермаркетов</li>
								<li>ресторанов</li>
								<li>кафе</li>
								<li>баров</li>
								<li>пиццерий</li>
								<li>магазинов</li>
							</ul>
							<ul class="custom-ul_red-dot">
								<li>столовых</li>
								<li>кулинарии</li>
								<li>пекарни</li>
								<li>отелей</li>
								<li>санаториев</li>
							</ul>
						</div>


						<h2 class="text-small-h text-small-h-16">Что такое проект?</h2>
						<p class="text-p">Компания ТДО предоставляет комплексную услугу по проектированию и дизайну
							торговых помещений и профессиональной кухни. Мы подготовим для Вас правильное решение по
							организации рабочих мест в соответствии с Вашим технологическим процессом. Проект так же
							помогает заранее продумать дизайн интерьера помещения. Правильно разработанный дизайн
							повышает лояльность клиента и создаёт репутацию заведения.</p>
						<h3 class="text-small-h text-small-h-14">Какие задачи решает проект?</h3>
						<p class="text-p">Применительно к магазиностроению:</p>
						<ul class="custom-ul_red-dot">
							<li>разделение пространства на торговые зоны</li>
							<li>правильное направление потоков покупателей</li>
							<li>правильное направление потоков покупателей</li>
							<li>количество и вид оборудования, необходимого для оснащения магазина</li>
							<li>правильный расчёт стоимости выбранного оборудования</li>
							<li>качественный монтаж оборудования</li>
						</ul>
						<p class="text-p">Применительно к профессиональной кухне:</p>
						<ul class="custom-ul_red-dot">
							<li>соблюдение требований нормативных документов противопожарных, архитектурных, санитарных,
								экологических и иных
							</li>
							<li>разрабатывается карта производственных процессов</li>
							<li>от грамотно подобранного ресторанного оборудования будет зависеть эффективность работы
								технологической зоны. А это значит, - уменьшение времени обслуживания гостя и увеличение
								прибыли
							</li>
							<li>выстроенная логистическая цепочка в складском помещении позволит избежать пересечения
								сырых продуктов и готовой продукции, потерь от порчи в результате истечения срока
								годности
							</li>
							<li>просчитать энергопотребление оборудования</li>
							<li>спроектировать правильно вентиляцию, электроснабжение и водоотведение</li>
						</ul>
						<h2 class="text-small-h text-small-h-14">ТОП-3 преимуществ для Вас в работе с нами:</h2>
						<ul class="custom-ul_red-dot">
							<li>Вы работаете с компанией, у которой большой опыт в области проектирования кафе, баров,
								ресторанов, магазинов и других заведений.
							</li>
							<li>экономически выгодное решение – проектирование и дизайн будущего бизнеса в рамках Вашего
								бюджета.
							</li>
							<li>Соответствие проекта нормам СаНПин, РОСПОТРЕБНАДЗОРА.</li>
						</ul>
						<p class="text-p">Ещё одним нашим преимуществом является 100% гарантия от завода-производителя
							на всё оборудование.</p>
						<h2 class="text-small-h text-small-h-14">Этапы сотрудничества:</h2>
						<ul class="custom-ul_red-dot">
							<li>консультация и обсуждение деталей (размер заведения, количество рабочих мест, расчёт
								производственных мощностей, сроки выполнения)
							</li>
							<li>разработка дизайн-проекта по индивидуальным параметрам</li>
							<li>подбор необходимого оборудования с учётом пожеланий клиента</li>
							<li>заключение договора</li>
							<li>поставка оборудования, расстановка, проведение пуско-наладочных работ</li>
							<li>подписание акта о выполненных работах</li>
						</ul>
						<div class="text-small-h text-small-h-14">Компания «Торговый дом Оборудования» поможет найти
							верное решение в организации Вашего бизнеса.
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

<? $APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath("/include/serv_modals.php"),
	array(),
	array('MODE' => 'text')
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>