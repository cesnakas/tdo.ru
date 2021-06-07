<?php require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';

$title = 'Аренда выставочного оборудования';

$APPLICATION->SetTitle($title);
$APPLICATION->SetPageProperty("description", "Аренда выставочного оборудования с доставкой по Москве и всей России. Аренда выставочного оборудования под ключ для выставок и мероприятий");
$APPLICATION->SetPageProperty("title", "Аренда выставочного оборудования - взять выставочное оборудование в аренду по выгодной цене");
$APPLICATION->SetTitle("Аренда выставочного оборудования");
$APPLICATION->SetPageProperty('title', $title);
$APPLICATION->SetPageProperty('description', $title);
$APPLICATION->AddChainItem($title);

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
            <a class="pagination-mob_link" href="/serv/rental-of-commercial-equipment/">Аренда торгового оборудования</a>
        </div>
    </div>

    <div class="container">
        <div class="wrap-link-back">
            <a class="link-back" href="/serv/">Читать о других услугах</a>
        </div>
    </div>

    <div class="serv-content">
        <div class="text-block">

            <div class="serv-to-col">
                <div class="container">
                    <div class="serv-to-col-item">
                        <div class="text-small-h text-small-h-mob-hid">Аренда выставочного оборудования</div>
                        <p class="text-p">Другие варианты аренды</p>

						<?
						$currPage = 'expo';
						?>

						<? $APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/rent/menu.php"),
							array(
								'currPage' => $currPage,
							),
							array('MODE' => 'text')
						); ?>


                        <p class="text-p">Аренда выставочного оборудования – востребованная услуга в сегменте HoReCa, ведь, как известно, для проектирования стендов необходимы прилавки, витрины, торговые стеллажи, остекленные шкафы, пристенные и островные стойки.</p>
                        <p class="text-p">Аренда выставочного оборудования может быть актуальна как для участников, так и для организаторов мероприятий.</p>
                        <p class="text-p">Многолетний опыт работы с организаторами выставок и крупными застройщиками стендов позволяет нам самостоятельно осуществлять завоз и вывоз оборудования на экспозиционные площадки. </p>
                        <p class="text-p">В нашем демонстрационном зале всегда найдется подходящее для Вашего случая оборудование на выгодных условиях, а широкий ассортимент моделей и размеров позволяют выполнить любую задачу!</p>

                        <div class="text-small-h text-small-h-16">Аренда оборудования для выставки</div>
                        <p class="text-p">Компания ТДО предлагает выгодные условия аренды и широкий ассортимент торгово-выставочного оборудования.</p>

                        <div class="text-small-h text-small-h-14">Как мы работаем:</div>

                        <ul class="custom-ul_red-dot">
                            <li>заключаем договор аренды,</li>
                            <li>работаем без залоговой стоимости.</li>
                            <li>самостоятельно доставляем оборудование и забираем его по окончании.</li>
                        </ul>
                        <p class="text-p">Стоимость доставки, монтажа, демонтажа и обслуживания зависит от количества единиц и рассчитывается отдельно.</p>
                    </div>

                    <div class="serv-to-col-item form-wrap form-wrap-serv">
                        <div class="text-small-h" style="color: #7C7C7C; font-size: 20px; line-height: 22px">Если вас интересует аренда оборудования для выставки:</div>

						<? $APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/rent/formTitle.php"),
							array(),
							array('MODE' => 'text')
						); ?>

                        <div class="default-form rent-page">
							<?
							$APPLICATION->IncludeComponent(
								"bitrix:form",
								"leave_request",
								array(
									"AJAX_MODE"              => "Y",
									"SEF_MODE"               => "N",
									"WEB_FORM_ID"            => "14",
									"START_PAGE"             => "new",
									"SHOW_LIST_PAGE"         => "N",
									"SHOW_EDIT_PAGE"         => "N",
									"SHOW_VIEW_PAGE"         => "N",
									"SUCCESS_URL"            => "",
									"SHOW_ANSWER_VALUE"      => "N",
									"SHOW_ADDITIONAL"        => "N",
									"SHOW_STATUS"            => "N",
									"EDIT_ADDITIONAL"        => "N",
									"EDIT_STATUS"            => "Y",
									"NOT_SHOW_FILTER"        => array(
										0 => "",
										1 => "",
									),
									"NOT_SHOW_TABLE"         => array(
										0 => "",
										1 => "",
									),
									"CHAIN_ITEM_TEXT"        => "",
									"CHAIN_ITEM_LINK"        => "",
									"IGNORE_CUSTOM_TEMPLATE" => "N",
									"USE_EXTENDED_ERRORS"    => "Y",
									"CACHE_GROUPS"           => "N",
									"CACHE_TYPE"             => "A",
									"CACHE_TIME"             => "3600000",
									"AJAX_OPTION_JUMP"       => "N",
									"AJAX_OPTION_STYLE"      => "Y",
									"AJAX_OPTION_HISTORY"    => "N",
									"SHOW_LICENCE"           => "",
									"HIDDEN_CAPTCHA"         => "",
									"COMPONENT_TEMPLATE"     => ".default",
									"RESULT_ID"              => $_REQUEST[ RESULT_ID ],
									"AJAX_OPTION_ADDITIONAL" => "",
									"VARIABLE_ALIASES"       => array(
										"action" => "action",
									),
								),
								false
							); ?>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>





<? require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php' ?>