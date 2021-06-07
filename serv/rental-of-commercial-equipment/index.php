<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Аренда торгового оборудования с доставкой по Москве и всей России. Аренда торгового оборудования под ключ для выставок и мероприятий");
$APPLICATION->SetPageProperty("title", "Аренда торгового оборудования для выставок и мероприятий");
$APPLICATION->SetTitle("Аренда торгового оборудования");
$APPLICATION->AddChainItem('Аренда торгового оборудования');
?>
<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s2",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
),
                                  false
); ?>
    <div class="pagination-mob">
        <div class="container">
            <a class="pagination-mob_link" href="/serv/">Аренда торгового оборудования</a>
        </div>
    </div>

    <div class="container">
        <div class="wrap-link-back">
            <a class="link-back" href="/serv/">Читать о других услугах</a>
        </div>
    </div>
    <div class="serv-content">
        <div class="text-block">

            <div class="serv-to-col serv-to-col-with-woman">
                <div class="container">
                    <div class="serv-to-col-item">
                        <div class="text-small-h text-small-h-mob-hid">Аренда торгового оборудования</div>
                        <p class="text-p">Компания ТДО предлагает:</p>

	                    <? $APPLICATION->IncludeFile(
		                    $APPLICATION->GetTemplatePath("/include/rent/menu.php"),
		                    array(
			                    'currPage' => $currPage,
		                    ),
		                    array('MODE' => 'text')
	                    ); ?>

                        <p class="text-p">Услуги аренды торгового оборудования востребованы для различных мероприятий, выставок, кулинарных мастер-классов, презентаций, ярмарок выходного дня, кейтерингов и загородных выездов.</p>
                        <p class="text-p">В последние годы аренда торгового оборудования стремительно набирает популярность. Нашими клиентами стали организаторы крупных выставок в Москве и Санкт-Петербурге: World Food, ПИР, Агродпромаш, Золотая Осень, Дни Дальнего Востока, Сокровища Севера, ПродЭкспо, МЕТРО ЭКСПО, Fishery Forum.</p>
                        <p class="text-p">Объемы поставок варьируются от 100 до 200 единиц холодильного оборудования, на каждую выставку!</p>
                        <p class="text-p">В нашем демонстрационном зале всегда найдется подходящее для Вашего случая оборудование на выгодных условиях, а широкий ассортимент моделей и размеров позволяют выполнить любую задачу!</p>

                        <div class="text-small-h text-small-h-16">Краткосрочная аренда оборудования в ТДО </div>
                        <p class="text-p">Краткосрочная аренда оборудования в Компании ТДО оформляется на срок до 30 дней (более длительные сроки оговариваются отдельно). Стоимость доставки, монтажа, демонтажа и обслуживания зависит от количества единиц и рассчитывается отдельно.</p>

                        <div class="text-small-h text-small-h-14">Наши преимущества:</div>

                        <ul class="custom-ul_red-dot">
                            <li>Ежедневный контроль работы арендованного оборудования специалистами службы сервиса на месте в дни проведения мероприятий;</li>
                            <li>Круглосуточная связь с ведущим менеджером по аренде;</li>
                            <li>Специальные условия для крупных заказов;</li>
                            <li>Гибкая система скидок для постоянных клиентов.</li>
                        </ul>
 <p class="text-p">Ждем Ваших обращений и заявок!</p>
                    </div>

                    <div class="serv-to-col-item woman-wrap">
                        <div class="woman">
                            <div class="woman-img"></div>
                            <div class="woman-content">
                                <div class="woman-small-head">Руководитель проекта</div>
                                <div class="woman-name">Косицына Марина</div>
                                <div class="woman-contact">
                                    <span>Тел :</span><span> 8 (495) 149-8578 </span><span style="color: #EF3A3B">доб. 421</span>

                                </div>
                                <div class="woman-contact">
									<span>Email:</span> <span>arenda@tdo.ru</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>



<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>