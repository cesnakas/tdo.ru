<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Производство");
$APPLICATION->SetTitle("Завод Alternova");
$APPLICATION->AddChainItem('Завод Alternova');
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
            <a class="pagination-mob_link" href="/dostavka-i-oplata/">Завод Alternova</a>
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
                <div class="section-row">
                    <div class="text-small-h text-small-h-mob-hid">Завод Alternova</div>
<img width="922" alt="nashe_proizvodstvo.jpg" src="/images/nashe_proizvodstvo.jpg" height="230" title="nashe_proizvodstvo.jpg" class="responsive"><br>
					<p class="text-p">За 20 лет от команды энтузиастов до крупного завода по восстановлению торгового и технологического оборудования. </p>
<div class="text-small-h">Завод Alternova – это:</div>
<ul class="custom-ul_red-dot">
	<li>8 технологических зон общей площадью более 15 тысяч м2, а также современный складской комплекс площадью 20 тысяч м2 и более 200 квалифицированных профильных специалистов ремонтников. </li>
	<li>15 000 единиц оборудования восстанавливается ежегодно </li>
	<li>Сертифицированная уникальная программа восстановления технологического оборудования для точек общественного питания, мясоперерабатывающей, хлебопекарной промышленности, а также торгового и холодильного оборудования </li>
	<li>Развитая региональная дилерская сеть по всей России </li>
</ul>
 <br>
 <p class="text-p"><a href="https://alternovamsk.ru/">Официальный сайт завода Альтернова</a></p>
					<div class="text-small-h">Контроль качества</div>
<p class="text-p">
	 По своим техническим и эксплуатационным характеристикам наше восстановленное оборудование мало чем отличается от нового. Во время сборки происходит замена всех быстроизнашивающихся частей, капитально реставрируются или меняются на новые двигатели, компрессоры и многие другие технологически важные детали, при этом нами используются только оригинальные запасные части. Качество произведённых работ настолько высоко, что мы предоставляем собственную гарантию от одного месяца до полугода на всё восстановленное оборудование!
</p>
<div class="text-small-h">Основные производственные процессы: </div>
<ul class="custom-ul_red-dot">
	<li><strong>Подготовка.</strong> Комплексная мойка с применением абразивных средств. </li>
	<li><strong>Диагностика.</strong> Проверка оборудования на стенде, разбор изделий, выявление недостающих и изношенных компонентов. </li>
	<li><strong>Создание технологических карт </strong>и заказ запасных частей в собственной сервисной службе. </li>
	<li><strong>Техническое восстановление:</strong> основной производственный этап.</li>
	<li><strong>Финальная подготовка оборудования:</strong> приведение товара в порядок, малярные работы, проведение тестов. </li>
	<li><strong>Передача товара в ОТК </strong>для оценки внешнего вида изделий и тестирование работоспособности. Если в нашем каталоге не нашлось нужное Вам оборудование, обратитесь в отдел продаж или отправьте запрос, и мы найдем его для Вас, восстановим и, при необходимости, доставим до производства</li>
</ul>
 <br>
 <iframe style="width:100%" height="315" src="https://www.youtube.com/embed/0GvEyQw9SLo" frameborder="0" allowfullscreen></iframe>
                </div>









            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>