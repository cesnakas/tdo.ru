<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Дизайн-проект");
$APPLICATION->SetPageProperty("description",
                              "Дизайн-проект");
$APPLICATION->SetTitle("Дизайн-проект");
?><?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadcrumb",
	Array(
		"3" =>"" ,
		"4" => fals,
		"PATH" => "",
		"SITE_ID" => "s2",
		"START_FROM" => "0",
	)
);?>
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
				<h1>Дизайн-проект</h1>
			</div>
			<div class="proektirovanie-top-block mb-mod">
				 <? $APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/serv_projects.php"),
							array(),
							array('MODE' => 'text')
						); ?>
				<div class="proektirovanie-banner-wrap banner-position" style="background-image: url('/local/templates/tdo_shop/img/serv_images/3d-design-min.jpg')">
				</div>
			</div>
			<div class="proektirovanie-description">
				<h2>Атмосфера Вашего ресторана или кафе – это гарантия полного зала гостей!</h2>
				<p>
					 Дизайн решения, предлагаемые специалистами компании «Торговый дом оборудования», это возможность найти правильную концепцию зала Вашего заведения.
				</p>
				<p>
					 Ведь именно та мелодия линий и цвета, которая звучит в каждой детали интерьера, будет тем элементом, который возвращает гостей, однажды побывавших в Вашем ресторане.
				</p>
				<p>
					 Внимательно подобранные ткани, элементы мебели, цветовые решения и распределение света – всё это составляет ту неуловимую прелесть и красоту пространства, в котором гость хочет проводить время, заказывая любимые блюда. Творческое видение и конструктивный контакт с заказчиком позволяют создавать поистине неповторимые и чарующие интерьеры.
				</p>
				<p>
					 Компания «Торговый дом оборудования» помогла многим рестораторам найти свой стиль и свою уникальность!
				</p>
			</div>
			<div class="proektirovanie-sample-block">
				<div class="proektirovanie-sample-title">
					<h4>БОЛЕЕ 2500 ОТКРЫТЫХ ЗАВЕДЕНИЙ НА ОБОРУДОВАНИИ ALTERNOVA</h4>
				</div>
				<hr>
				<div class="proektirovanie-sample-subtitle">
					<h5>Кафе-кондитерская «Бони-Мари»</h5>
				</div>
				<div class="proektirovanie-sample-slider-block">
					<div class="proektirovanie-sample-slider-inner-block">
						<div class="main-sample-slider bonmar">
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-2.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-2.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-1.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-1.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-3.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-3.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-4.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-4.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-5.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-5.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-6.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-6.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-7.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-7.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-8.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-8.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-9.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-9.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-10.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-10.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="images" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-11.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-11.jpg"> </a>
							</div>
						</div>
						 <!--./main-sample-slider-->
						<div class="proektirovanie-sample-description">
							<div class="proektirovanie-sample-description-item">
								<p>
									 Тип заведения -&nbsp;
								</p>
								<p>
									 Кафе
								</p>
							</div>
							<div class="proektirovanie-sample-description-item">
								<p>
									 Общая площадь -&nbsp;
								</p>
								<p>
									 150&nbsp;м2
								</p>
							</div>
							<div class="proektirovanie-sample-description-item">
								<p>
									 Площадь кухни -&nbsp;
								</p>
								<p>
									 50&nbsp;м2
								</p>
							</div>
							<div class="proektirovanie-sample-description-item">
								<p>
									 Посадочных мест -&nbsp;
								</p>
								<p>
									 108
								</p>
							</div>
							<div class="proektirovanie-sample-description-item">
								<p>
									 Город -&nbsp;
								</p>
								<p>
									 Москва
								</p>
							</div>
							<div class="proektirovanie-sample-description-item">
								<p>
									 Адрес - ул. Серпуховской вал 77 с. 4
								</p>
							</div>
						</div>
						 <!--./proektirovanie-sample-description-->
					</div>
					 <!--./proektirovanie-sample-slider-inner-block-->
					<div class="thumb-sample-slider-block">
						<div class="thumb-sample-slider bonmar">
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-2.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-1.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-3.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-4.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-5.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-6.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-7.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-8.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-9.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-10.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/img-11.jpg">
								</div>
							</div>
						</div>
						 <!--./thumb-sample-slider-->
						<div class="sample-slider-arrows-container bonmar">
						</div>
					</div>
					 <!--./thumb-sample-slider-block-->
				</div>
				 <!--./proektirovanie-sample-slider-block--> <!-- PROJECT CHICAGO -->
				<hr>
				<div class="proektirovanie-sample-subtitle">
					<h5>Кафе-бар «Чикаго»</h5>
				</div>
				<div class="proektirovanie-sample-slider-block">
					<div class="proektirovanie-sample-slider-inner-block">
						<div class="main-sample-slider chicago">
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="chicago" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-4.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-4.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="chicago" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-2.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-2.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="chicago" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-3.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-3.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="chicago" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-1.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-1.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="chicago" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-5.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-5.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="chicago" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-6.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-6.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="chicago" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-7.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-7.jpg"> </a>
							</div>
							<div class="main-sample-slide">
 <a class="main-sample-slide-img-wrap fancybox" rel="chicago" href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-8.jpg"> <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-8.jpg"> </a>
							</div>
						</div>
						 <!--./main-sample-slider-->
						<div class="proektirovanie-sample-description">
							<div class="proektirovanie-sample-description-item">
								<p>
									 Тип заведения -&nbsp;
								</p>
								<p>
									 Кафе-бар
								</p>
							</div>
							<div class="proektirovanie-sample-description-item">
								<p>
									 Общая площадь -&nbsp;
								</p>
								<p>
									 120&nbsp;м2
								</p>
							</div>
							<div class="proektirovanie-sample-description-item">
								<p>
									 Посадочных мест -&nbsp;
								</p>
								<p>
									 95
								</p>
							</div>
							<div class="proektirovanie-sample-description-item">
								<p>
									 Город -&nbsp;
								</p>
								<p>
									 Москва
								</p>
							</div>
							<div class="proektirovanie-sample-description-item">
								<p>
									 Адрес - ул.4-я Тверская-Ямская 23 с.2
								</p>
							</div>
						</div>
						 <!--./proektirovanie-sample-description-->
					</div>
					 <!--./proektirovanie-sample-slider-inner-block-->
					<div class="thumb-sample-slider-block">
						<div class="thumb-sample-slider chicago">
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-4.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-2.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-3.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-1.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-5.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-6.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-7.jpg">
								</div>
							</div>
							<div class="thumb-sample-slide">
								<div class="thumb-sample-slide-img-wrap">
 <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/project-Chicago/pr2-img-8.jpg">
								</div>
							</div>
						</div>
						 <!--./thumb-sample-slider-->
						<div class="sample-slider-arrows-container chicago">
						</div>
					</div>
					 <!--./thumb-sample-slider-block-->
				</div>
				 <!--./proektirovanie-sample-slider-block-->
			</div>
			 <!--./proektirovanie-sample-block--> <? $APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("/include/serv_modals.php"),
						array(),
						array('MODE' => 'text')
					); ?>
		</div>
	</div>
</div>
<br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>