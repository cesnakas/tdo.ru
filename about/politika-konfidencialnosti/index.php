<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Политика Конфиденциальности");
?>
<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s2",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
),
                                  false
); ?>
    <div class="serv-content">
        <div class="text-block">
            <div class="container">
                <div class="section-row">
                    <div class="text-small-h text-small-h-mob-hid">Политика Конфиденциальности</div>
                    </div>

                <div class="section-row">
                    <p class="text-p">Настоящим, я предоставляю согласие на обработку ООО «ТДО» (Адрес: 117042, Россия, г.Москва, Муниципальный округ Южное Бутово, ул. Адмирала Руднева, дом 4, офис 3, пом. 6. ИНН: 7727429081, КПП: 772701001, ОГРН: 1197746570340) моих персональных данных и подтверждаю, что, давая такое согласие, я действую по своей воле и в своих интересах.</p>
					<p class="text-p">В соответствии с Федеральным законом Российской Федерации от 27.07.2006 г. № 152-ФЗ «О персональных данных» настоящее соглашение Пользователя признается исполненным в простой письменной форме, на обработку следующих персональных данных: фамилии, имени, отчества; года рождения; места пребывания (город, область); номеров телефонов; адресов электронной почты (e-mail).</p>
					<p class="text-p">Указанное соглашение действует бессрочно с момента предоставления данных и может быть отозвано Пользователем путем подачи заявления администрации сайта с указанием данных, определенных ст. 14 Закона «О персональных данных».</p>
					<p class="text-p">Пользователь выражает свое согласие на осуществление со всеми указанными персональными данными следующих действий: сбор, систематизация, накопление, хранение, уточнение (обновление или изменение), использование, распространение (в том числе, передача), обезличивание, блокирование, уничтожение, передача, в том числе трансграничная передача, а также осуществление любых иных действий с персональными данными в соответствии с действующим законодательством. Обработка данных может осуществляться с использованием средств автоматизации, так и без их использования (при неавтоматической обработке).</p>
					<p class="text-p">При обработке персональных данных ООО "Компания ТДО" не ограничено в применении способов их обработки.</p>
</div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>