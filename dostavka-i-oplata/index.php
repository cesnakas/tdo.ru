<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Условия доставки и оплаты в компании tdobu.ru");
$APPLICATION->SetPageProperty("title", "Условия доставки и оплаты в компании tdobu.ru");
$APPLICATION->SetTitle("Доставка и оплата");
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
            <a class="pagination-mob_link" href="/dostavka-i-oplata/">Доставка и оплата</a>
        </div>
    </div>

    <div class="serv-content">
        <div class="text-block">
            <div class="container">
                <div class="text-small-h text-small-h-mob-hid">Доставка и оплата</div>
                <p class="text-p">Компания Торговый дом оборудования представляет услуги</p>

                <div class="wrapper-serv-trig">
                    <div class="serv-trig_item">
                        <div style="background-image: url('/local/templates/tdo_shop/img/icons/d1.svg')" class="serv-trig_item-img">

                        </div>
                        <div class="serv-trig_item-content">
                            <div class="serv-trig_item-content-h">Доставка</div>
                            <div class="text-block_p">Благодаря слаженной работе транспортных компаний, мы имеем возможность обеспечить качественную перевозку грузов по всей
                                России
                            </div>
                            <a class="small-red-link" href="/dostavka-i-oplata/dostavka/">Подробнее</a>
                        </div>

                    </div>
                    <div class="serv-trig_item">
                        <div style="background-image: url('/local/templates/tdo_shop/img/icons/d2.svg')" class="serv-trig_item-img">

                        </div>
                        <div class="serv-trig_item-content">
                            <div class="serv-trig_item-content-h">Возврат</div>
                            <div class="text-block_p">Возврат и обмен товара происходит в соответствии с действующим законодательством РФ</div>
                            <a class="small-red-link" href="/dostavka-i-oplata/vozvrat/">Подробнее</a>
                        </div>

                    </div>
                    <div class="serv-trig_item">
                        <div style="background-image: url('/local/templates/tdo_shop/img/icons/d3.svg')" class="serv-trig_item-img">

                        </div>
                        <div class="serv-trig_item-content">
                            <div class="serv-trig_item-content-h">Оплата</div>
                            <div class="text-block_p">У нас действует оплата для юридических и физических лиц</div>
                            <a class="small-red-link" href="/dostavka-i-oplata/oplata/">Подробнее</a>
                        </div>

                    </div>
                    <div class="serv-trig_item">
                        <div style="background-image: url('/local/templates/tdo_shop/img/icons/d4.svg')" class="serv-trig_item-img">

                        </div>
                        <div class="serv-trig_item-content">
                            <div class="serv-trig_item-content-h">Гарантия</div>
                            <div class="text-block_p">Гарантия на <span style="color: #EB5757; font-weight: 700;">оборудование б/у составляет от 1 месяц</span><br>
                                Гарантия на<span style="color: #EB5757; font-weight: 700;"> новое оборудование – 6 месяцев</span></div>
                            <a class="small-red-link" href="/dostavka-i-oplata/garantiya/">Подробнее</a>
                        </div>

                    </div>

                    <div class="serv-trig_item">
                        <div style="background-image: url('/local/templates/tdo_shop/img/icons/d5.png')" class="serv-trig_item-img">

                        </div>
                        <div class="serv-trig_item-content">
                            <div class="serv-trig_item-content-h">Рассрочка и кредит</div>
                            <div class="text-block_p">Покупка оборудования в рассрочку: удобно, выгодно, быстро</div>
                            <a class="small-red-link" href="/dostavka-i-oplata/credit/">Подробнее</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>