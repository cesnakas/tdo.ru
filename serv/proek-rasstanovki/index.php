<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Проект расстановки");
$APPLICATION->SetPageProperty("description",
    "Проект расстановки");
$APPLICATION->SetTitle("Проект расстановки");
?>

<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
    "PATH" => "",
    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
    "SITE_ID" => "s2",
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

    <div class="workarea_wrap">
    <div class="serv-content-wrap">
        <div class="text-block">
            <div class="container">
                <div class="proektirovanie-title-block">
                    <h1>Проектирование и дизайн магазинов, ресторанов, пекарен</h1>
                </div>
                <div class="proektirovanie-top-block mb-mod">
                    <? $APPLICATION->IncludeFile(
                        $APPLICATION->GetTemplatePath("/include/serv_projects.php"),
                        array(),
                        array('MODE' => 'text')
                    ); ?>
                    <div class="proektirovanie-banner-wrap banner-position"
                         style="background-image: url('/local/templates/tdo_shop/img/serv_images/3d-magazin-min.jpg')">
                    </div>
                </div>


                <div class="proektirovanie-description">
                    <h2>От правильной подачи вашего бизнеса зависит его будущее процветание!</h2>
                    <h3>
                        Компания ТДО предоставляет услугу по расстановке оборудования. Наши проектировщики
                        правильно
                        разместят оборудование в вашем помещении основываясь на концепции бизнеса и требованиях
                        РОСПОТРЕБНАДЗОРА. </h3>

                    <p>
                        В ходе работы мы поможем :
                    </p>
                    <ul>
                        <li>выполнить необходимые обмеры помещения</li>
                        <li>подобрать торговое оборудование</li>
                        <li>осуществить качественную, правильную расстановку торгового зала</li>
                        <li>услуга по расстановке торгового оборудования производится в максимально короткие
                            сроки
                        </li>
                    </ul>


                    <div class="proektirovanie-sample-block">
                        <div class="project-sample__header">
                            <p class="h3-mod">
                                1. Проект расстановки "рыбный магазин"
                            </p>
                        </div>
                        <hr>
                        <br>
                        <div class="proektirovanie-sample-slider-block">
                            <div class="proektirovanie-sample-slider-inner-block">
                                <div class="main-sample-slider tp01">
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_01"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-2.png">
                                            <img
                                                    src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-2.png">
                                        </a>
                                    </div>
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_01"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-2.png">
                                            <img
                                                    src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-2.png">
                                        </a>
                                    </div>
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_01"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/sample-bg-2.jpg">
                                            <img
                                                    src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/sample-bg-2.jpg">
                                        </a>
                                    </div>
                                </div>
                                <!--./main-sample-slider-->
                                <div class="proektirovanie-sample-description">
                                    <div class="proektirovanie-sample-description-item">

                                        <p>
                                            Площадь помещения: </p>
                                        <p>60&nbsp;кв.м
                                        </p>
                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Цена за проект: </p>
                                        <p>5&nbsp;000&nbsp;рублей
                                        </p>
                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Цена за оборудование: </p>
                                        <p>626&nbsp;600&nbsp;рублей
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
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/sample-bg-2.jpg">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/sample-bg-2.jpg">
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
                            <img src="https://tdo.ru/local/templates/tdo_shop/img/serv_images/engineering_and_design/sample-bg-2.jpg">
                            <div class="background-image-mask">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="proektirovanie-sample-block">
                        <div class="project-sample__header">
                            <p class="h3-mod">
                                2. Проект расстановки "фермерская лавка"
                            </p>
                        </div>
                        <hr>
                        <br>
                        <div class="proektirovanie-sample-slider-block">
                            <div class="proektirovanie-sample-slider-inner-block">
                                <div class="main-sample-slider tp02">
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_02"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-3.png">
                                            <img
                                                    src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-3.png">
                                        </a>
                                    </div>
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_02"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-3.png">
                                            <img
                                                    src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-3.png">
                                        </a>
                                    </div>

                                </div>
                                <!--./main-sample-slider-->
                                <div class="proektirovanie-sample-description">
                                    <div class="proektirovanie-sample-description-item">

                                        <p>
                                            Тип заведения: </p>
                                        <p>"Фермерская&nbsp;лавка"
                                        </p>
                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Цена за проект: </p>
                                        <p>10&nbsp;000&nbsp;рублей
                                        </p>
                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Цена за оборудование:</p>
                                        <p> 1&nbsp;976&nbsp;550&nbsp;рублей
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
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-3.png">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-3.png">
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
                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/sample-bg-3.jpg">
                            <div class="background-image-mask">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="proektirovanie-sample-block">
                        <div class="project-sample__header">
                            <p class="h3-mod">
                                3. Проект расстановки "производственная кухня"
                            </p>
                        </div>
                        <hr>
                        <br>
                        <div class="proektirovanie-sample-slider-block">
                            <div class="proektirovanie-sample-slider-inner-block">
                                <div class="main-sample-slider tp03">
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_03"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/stacks-img-4.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/stacks-img-4.png">
                                        </a>
                                    </div>

                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_03"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-4.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-4.png">
                                        </a>
                                    </div>
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_03"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-4.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-4.png">
                                        </a>
                                    </div>

                                </div>
                                <!--./main-sample-slider-->
                                <div class="proektirovanie-sample-description">
                                    <div class="proektirovanie-sample-description-item">

                                        <p>
                                            Тип заведения: </p>
                                        <p>"Производственная&nbsp;кухня"

                                        </p>

                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Площадь помещения: </p>
                                        <p>33&nbsp;кв.м
                                        </p>

                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p> Цена за оборудование:</p>
                                        <p> 1&nbsp;976&nbsp;550&nbsp;рублей
                                        </p>
                                    </div>

                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Цена за оборудование: </p>
                                        <p>715&nbsp;100&nbsp;рублей
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
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/stacks-img-4.png">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-4.png">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-4.png">
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
                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/sample-bg-4.jpg">
                            <div class="background-image-mask">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="proektirovanie-sample-block">
                        <div class="project-sample__header">
                            <p class="h3-mod">
                                4. Проект расстановки "продуктовый минимаркет"
                            </p>
                        </div>
                        <hr>
                        <br>
                        <div class="proektirovanie-sample-slider-block">
                            <div class="proektirovanie-sample-slider-inner-block">
                                <div class="main-sample-slider tp04">
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_04"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/stacks-img-5.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/stacks-img-5.png">
                                        </a>
                                    </div>
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_04"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-5.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-5.png">
                                        </a>
                                    </div>
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_04"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-5.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-5.png">
                                        </a>
                                    </div>


                                </div>
                                <!--./main-sample-slider-->
                                <div class="proektirovanie-sample-description">
                                    <div class="proektirovanie-sample-description-item">

                                        <p>
                                            Тип заведения: </p>
                                        <p> "Продуктовый&nbsp;минимаркет"

                                        </p>


                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Площадь помещения: </p>
                                        <p>138&nbsp;кв.м
                                        </p>


                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Цена за проект: </p>
                                        <p> 10&nbsp;000&nbsp;рублей
                                        </p>

                                    </div>

                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Цена за оборудование: </p>
                                        <p>529&nbsp;400&nbsp;рублей
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
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/stacks-img-5.png">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-5.png">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-5.png">
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
                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/sample-bg-5.jpg">
                            <div class="background-image-mask">
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    <div class="proektirovanie-sample-block">
                        <div class="project-sample__header">
                            <p class="h3-mod">
                                5. Проект расстановки "продуктовый супермаркет"
                            </p>
                        </div>
                        <hr>
                        <br>
                        <div class="proektirovanie-sample-slider-block">
                            <div class="proektirovanie-sample-slider-inner-block">
                                <div class="main-sample-slider tp05">
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-6.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-6.png">
                                        </a>
                                    </div>
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-2.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-2.png">
                                        </a>
                                    </div>
                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-3.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-3.png">
                                        </a>
                                    </div>

                                    <div class="main-sample-slide">
                                        <a class="main-sample-slide-img-wrap fancybox" rel="tp_05"
                                           href="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-4.png">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-4.png">
                                        </a>
                                    </div>


                                </div>
                                <!--./main-sample-slider-->
                                <div class="proektirovanie-sample-description">
                                    <div class="proektirovanie-sample-description-item">

                                        <p>
                                            Тип заведения: </p>
                                        <p> "Продуктовый&nbsp;супермаркет"
                                        </p>


                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Площадь помещения: </p>
                                        <p> 160&nbsp;кв.м
                                        </p>


                                    </div>
                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Цена за </p>
                                        <p> 10&nbsp;000&nbsp;рублей
                                        </p>


                                    </div>

                                    <div class="proektirovanie-sample-description-item">
                                        <p>
                                            Цена за оборудование: </p>
                                        <p> 1&nbsp;026&nbsp;500&nbsp;рублей
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
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/draft-img-6.png">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-1.png">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-2.png">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-3.png">
                                        </div>
                                    </div>
                                    <div class="thumb-sample-slide">
                                        <div class="thumb-sample-slide-img-wrap">
                                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/table-price-img-6-4.png">
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
                            <img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/sample-bg-5.jpg">
                            <div class="background-image-mask">
                            </div>
                        </div>
                    </div>


                    <!--./project-sample-->


                    <? $APPLICATION->IncludeFile(
                        $APPLICATION->GetTemplatePath("/include/serv_modals.php"),
                        array(),
                        array('MODE' => 'text')
                    ); ?>

                </div>

            </div>
        </div>
    </div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>