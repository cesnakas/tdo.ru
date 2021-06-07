<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$strSectionEdit        = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete      = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

$mainCats  = [];
$childCats = [];
$mainCatId = 0;
foreach ($arResult['SECTIONS'] as &$arSection)
{
	switch ($arSection['RELATIVE_DEPTH_LEVEL'])
	{
		case 1:
			$mainCats[] = $arSection;
			$mainCatId  = $arSection['ID'];
			break;
		default:
			$childCats[ $mainCatId ][] = $arSection;
			break;
	}

}

?>
	<div class="catalog-mask_wrap">
		<div class="catalog-mask"
		     id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
		>
			<?
			$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete,
			                       $arSectionDeleteParams);
			?>
			<div class="catalog-mask-close close">
			</div>
			<div class="container">
				<div class="catalog-left">
					<?
					$intCurrentDepth = 1;
					foreach ($mainCats as &$arSection)
					{
						$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
						$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete,
						                       $arSectionDeleteParams);

						$mainCatId = $arSection['ID'];

						?>
						<div class="catalog-left-item">
							<a class="catalog-left-item_link" href="<?=$arSection["SECTION_PAGE_URL"]?>?CATSHOW=Y">
								<span><?=$arSection["NAME"]?></span>
								<span class="catalog-left-item_count"><?=$arSection["ELEMENT_CNT"]?></span>
							</a>
							<div class="catalog-left-item_dropdown">
								<?
								foreach ($childCats[ $mainCatId ] as $subCats)
								{
									?>
									<a class="catalog-left-item_dropdown-item" href="<?=$subCats["SECTION_PAGE_URL"]?>">
										<?=$subCats["NAME"]?>
									</a>
									<?
								}
								?>
							</div>
						</div>
						<?
					}
					?>
					<div class="catalog-left-item">
						<a class="catalog-left-item_link" href="/catalogsale">
							<span>Распродажа</span>
						</a>
					</div>
				</div>

				<div class="catalog-brands">
					<div class="catalog-brands__inner">
						<div class="catalog-brands_head">
							Бренды
						</div>
						<div class="brands-wrap">
							<? $APPLICATION->IncludeComponent(
								"bitrix:news.list",
								"brandListTopMenu",
								array(
									"ACTIVE_DATE_FORMAT"              => "d.m.Y",
									// Формат показа даты
									"ADD_SECTIONS_CHAIN"              => "N",
									// Включать раздел в цепочку навигации
									"AJAX_MODE"                       => "N",
									// Включить режим AJAX
									"AJAX_OPTION_ADDITIONAL"          => "",
									// Дополнительный идентификатор
									"AJAX_OPTION_HISTORY"             => "N",
									// Включить эмуляцию навигации браузера
									"AJAX_OPTION_JUMP"                => "N",
									// Включить прокрутку к началу компонента
									"AJAX_OPTION_STYLE"               => "Y",
									// Включить подгрузку стилей
									"CACHE_FILTER"                    => "N",
									// Кешировать при установленном фильтре
									"CACHE_GROUPS"                    => "Y",
									// Учитывать права доступа
									"CACHE_TIME"                      => "36000000",
									// Время кеширования (сек.)
									"CACHE_TYPE"                      => "A",
									// Тип кеширования
									"CHECK_DATES"                     => "Y",
									// Показывать только активные на данный момент элементы
									"DETAIL_URL"                      => "",
									// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
									"DISPLAY_BOTTOM_PAGER"            => "N",
									// Выводить под списком
									"DISPLAY_DATE"                    => "N",
									// Выводить дату элемента
									"DISPLAY_NAME"                    => "Y",
									// Выводить название элемента
									"DISPLAY_PICTURE"                 => "Y",
									// Выводить изображение для анонса
									"DISPLAY_PREVIEW_TEXT"            => "N",
									// Выводить текст анонса
									"DISPLAY_TOP_PAGER"               => "N",
									// Выводить над списком
									"FIELD_CODE"                      => array(    // Поля
										0 => "",
										1 => "",
									),
									"FILTER_NAME"                     => "",
									// Фильтр
									"HIDE_LINK_WHEN_NO_DETAIL"        => "N",
									// Скрывать ссылку, если нет детального описания
									"IBLOCK_ID"                       => "43",
									// Код информационного блока
									"IBLOCK_TYPE"                     => "lists",
									// Тип информационного блока (используется только для проверки)
									"INCLUDE_IBLOCK_INTO_CHAIN"       => "N",
									// Включать инфоблок в цепочку навигации
									"INCLUDE_SUBSECTIONS"             => "N",
									// Показывать элементы подразделов раздела
									"MEDIA_PROPERTY"                  => "",
									// Свойство для отображения медиа
									"MESSAGE_404"                     => "",
									// Сообщение для показа (по умолчанию из компонента)
									"NEWS_COUNT"                      => "10000",
									// Количество новостей на странице
									"PAGER_BASE_LINK_ENABLE"          => "N",
									// Включить обработку ссылок
									"PAGER_DESC_NUMBERING"            => "N",
									// Использовать обратную навигацию
									"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
									// Время кеширования страниц для обратной навигации
									"PAGER_SHOW_ALL"                  => "N",
									// Показывать ссылку "Все"
									"PAGER_SHOW_ALWAYS"               => "N",
									// Выводить всегда
									"PAGER_TEMPLATE"                  => ".default",
									// Шаблон постраничной навигации
									"PAGER_TITLE"                     => "Новости",
									// Название категорий
									"PARENT_SECTION"                  => "",
									// ID раздела
									"PARENT_SECTION_CODE"             => "",
									// Код раздела
									"PREVIEW_TRUNCATE_LEN"            => "",
									// Максимальная длина анонса для вывода (только для типа текст)
									"PROPERTY_CODE"                   => array(    // Свойства
										0 => "",
										1 => "",
									),
									"SEARCH_PAGE"                     => "/search/",
									// Путь к странице поиска
									"SET_BROWSER_TITLE"               => "N",
									// Устанавливать заголовок окна браузера
									"SET_LAST_MODIFIED"               => "N",
									// Устанавливать в заголовках ответа время модификации страницы
									"SET_META_DESCRIPTION"            => "N",
									// Устанавливать описание страницы
									"SET_META_KEYWORDS"               => "N",
									// Устанавливать ключевые слова страницы
									"SET_STATUS_404"                  => "N",
									// Устанавливать статус 404
									"SET_TITLE"                       => "N",
									// Устанавливать заголовок страницы
									"SHOW_404"                        => "N",
									// Показ специальной страницы
									"SLIDER_PROPERTY"                 => "",
									// Свойство с изображениями для слайдера
									"SORT_BY1"                        => "NAME",
									// Поле для первой сортировки новостей
									"SORT_BY2"                        => "SORT",
									// Поле для второй сортировки новостей
									"SORT_ORDER1"                     => "ASC",
									// Направление для первой сортировки новостей
									"SORT_ORDER2"                     => "ASC",
									// Направление для второй сортировки новостей
									"STRICT_SECTION_CHECK"            => "N",
									// Строгая проверка раздела для показа списка
									"TEMPLATE_THEME"                  => "blue",
									// Цветовая тема
									"USE_RATING"                      => "N",
									// Разрешить голосование
									"USE_SHARE"                       => "N",
									// Отображать панель соц. закладок
								),
								false
							); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?
