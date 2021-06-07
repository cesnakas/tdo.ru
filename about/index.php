<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Высокое мнение о нашем коллективе – главный результат, которого мы добились за годы нашей деятельности.");
$APPLICATION->SetPageProperty("title", "О компании");
$APPLICATION->SetTitle("О нас");
?>

    <div class="work-screen">

		<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
			"PATH"       => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
			"SITE_ID"    => "s2",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
			"START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
		),
		                                  false
		); ?>

        <div class="work-container container">
            <div class="work-tabs">
                <a class="work-tabs_link work-tabs_link--active" href="/about/">О нас</a>
                <a class="work-tabs_link" href="/about/jobs/">Вакансии</a>
            </div>

            <h1 class="section-head-center"><? $APPLICATION->IncludeFile(
		            $APPLICATION->GetTemplatePath("/include/about/about_h1.php"),
		            array(),
		            array('MODE' => 'text')
	            );?></h1>


			<? $APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("/include/about/about_search.php"),
				array(),
				array('MODE' => 'html')
			); ?>


        </div>
    </div>
    <? $APPLICATION->IncludeFile(
        $APPLICATION->GetTemplatePath("/include/about/about_us.php"),
        array(),
        array('MODE' => 'html')
    ); ?>


    <?/*
    <div class="work_workers">
        <div class="container">
			<? $APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("/include/about/our_employees.php"),
				array(),
				array('MODE' => 'html')
			); ?>

			<?
			$APPLICATION->IncludeComponent("bitrix:news.list", "about", array(
				"ACTIVE_DATE_FORMAT"              => "d.m.Y",    // Формат показа даты
				"ADD_SECTIONS_CHAIN"              => "Y",    // Включать раздел в цепочку навигации
				"AJAX_MODE"                       => "N",    // Включить режим AJAX
				"AJAX_OPTION_ADDITIONAL"          => "",    // Дополнительный идентификатор
				"AJAX_OPTION_HISTORY"             => "N",    // Включить эмуляцию навигации браузера
				"AJAX_OPTION_JUMP"                => "N",    // Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE"               => "Y",    // Включить подгрузку стилей
				"CACHE_FILTER"                    => "N",    // Кешировать при установленном фильтре
				"CACHE_GROUPS"                    => "Y",    // Учитывать права доступа
				"CACHE_TIME"                      => "36000000",    // Время кеширования (сек.)
				"CACHE_TYPE"                      => "A",    // Тип кеширования
				"CHECK_DATES"                     => "Y",    // Показывать только активные на данный момент элементы
				"DETAIL_URL"                      => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
				"DISPLAY_BOTTOM_PAGER"            => "Y",    // Выводить под списком
				"DISPLAY_DATE"                    => "Y",    // Выводить дату элемента
				"DISPLAY_NAME"                    => "Y",    // Выводить название элемента
				"DISPLAY_PICTURE"                 => "Y",    // Выводить изображение для анонса
				"DISPLAY_PREVIEW_TEXT"            => "Y",    // Выводить текст анонса
				"DISPLAY_TOP_PAGER"               => "N",    // Выводить над списком
				"FIELD_CODE"                      => array(    // Поля
					0 => "PREVIEW_PICTURE",
					1 => "DETAIL_PICTURE",
					2 => "",
				),
				"FILTER_NAME"                     => "",    // Фильтр
				"HIDE_LINK_WHEN_NO_DETAIL"        => "N",    // Скрывать ссылку, если нет детального описания
				"IBLOCK_ID"                       => "15",    // Код информационного блока
				"IBLOCK_TYPE"                     => "photos",    // Тип информационного блока (используется только для проверки)
				"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",    // Включать инфоблок в цепочку навигации
				"INCLUDE_SUBSECTIONS"             => "Y",    // Показывать элементы подразделов раздела
				"MESSAGE_404"                     => "",    // Сообщение для показа (по умолчанию из компонента)
				"NEWS_COUNT"                      => "23",    // Количество новостей на странице
				"PAGER_BASE_LINK_ENABLE"          => "N",    // Включить обработку ссылок
				"PAGER_DESC_NUMBERING"            => "N",    // Использовать обратную навигацию
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
				"PAGER_SHOW_ALL"                  => "N",    // Показывать ссылку "Все"
				"PAGER_SHOW_ALWAYS"               => "N",    // Выводить всегда
				"PAGER_TEMPLATE"                  => ".default",    // Шаблон постраничной навигации
				"PAGER_TITLE"                     => "Новости",    // Название категорий
				"PARENT_SECTION"                  => "",    // ID раздела
				"PARENT_SECTION_CODE"             => "",    // Код раздела
				"PREVIEW_TRUNCATE_LEN"            => "",    // Максимальная длина анонса для вывода (только для типа текст)
				"PROPERTY_CODE"                   => array(    // Свойства
					0 => "",
					1 => "",
				),
				"SET_BROWSER_TITLE"               => "N",    // Устанавливать заголовок окна браузера
				"SET_LAST_MODIFIED"               => "N",    // Устанавливать в заголовках ответа время модификации страницы
				"SET_META_DESCRIPTION"            => "N",    // Устанавливать описание страницы
				"SET_META_KEYWORDS"               => "N",    // Устанавливать ключевые слова страницы
				"SET_STATUS_404"                  => "N",    // Устанавливать статус 404
				"SET_TITLE"                       => "N",    // Устанавливать заголовок страницы
				"SHOW_404"                        => "N",    // Показ специальной страницы
				"SORT_BY1"                        => "ACTIVE_FROM",    // Поле для первой сортировки новостей
				"SORT_BY2"                        => "SORT",    // Поле для второй сортировки новостей
				"SORT_ORDER1"                     => "DESC",    // Направление для первой сортировки новостей
				"SORT_ORDER2"                     => "ASC",    // Направление для второй сортировки новостей
				"STRICT_SECTION_CHECK"            => "N",    // Строгая проверка раздела для показа списка
				"COMPONENT_TEMPLATE"              => ".default",
			),
			                               false
			);
			?>

			<? $APPLICATION->IncludeFile(
				$APPLICATION->GetTemplatePath("/include/about/open_popup_btn.php"),
				array(),
				array('MODE' => 'html')
			);?>


	        <? $APPLICATION->IncludeFile(
		        $APPLICATION->GetTemplatePath("/include/about/footer_info.php"),
		        array(),
		        array('MODE' => 'html')
	        ); ?>

        </div>
    </div>
    */?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>