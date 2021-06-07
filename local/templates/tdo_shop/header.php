<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/" . SITE_TEMPLATE_ID . "/header.php");
CJSCore::Init(array("fx"));

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

if(isset($_GET["theme"]) && in_array($_GET["theme"], array("blue", "green", "yellow", "red")))
{
	COption::SetOptionString("main", "wizard_eshop_bootstrap_theme_id", $_GET["theme"], false, SITE_ID);
}
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "green", SITE_ID);

$curPage = $APPLICATION->GetCurPage(true);

use Bitrix\Main\Page\Asset;


Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/libs/slick/slick.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/libs/fancybox/jquery.fancybox.min.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/libs/formstyler/jquery.formstyler.css");

Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/fonts.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/styles.css");



Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/libs/jquery/jquery-3.3.1.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/libs/fancybox/jquery.fancybox.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/libs/slick/slick.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/libs/formstyler/jquery.formstyler.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.validate.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.form.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/scripts.min.js");

CJSCore::Init(array('ls'));

$isMainPage = $APPLICATION->GetCurPage(false) == SITE_DIR;
$headerClass = 'header-bottom-inner';
if($isMainPage)
{
	$headerClass = 'header-bottom-inner header-bottom-main-screen';
}

global $current_currency, $curCityId, $curCityName;

$curCityName = $_COOKIE['location_city_name'];
$curCityId = $_COOKIE['location_city_id'];

if(empty($curCityName))
{
	$curCityName = 'Ваш город...';
}

?><!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<meta charset="utf-8">
	<title><? $APPLICATION->ShowTitle() ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<? $APPLICATION->ShowHead(); ?>

	<meta name="viewport" content="width=device-width">

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/site.webmanifest">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#a72b2a">
<meta name="msapplication-TileColor" content="#a72b2a">
<meta name="theme-color" content="#ffffff">

	<link rel='canonical' href='https://tdo.ru<?=$APPLICATION->GetCurPage()?>' />
</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <? $APPLICATION->ShowProperty("backgroundImage"); ?>>
<? $APPLICATION->ShowPanel(); ?>
<? $APPLICATION->IncludeComponent(
	"bitrix:eshop.banner",
	"",
	array()
); ?>

<div id="call-me" class="modal call-me">
	<div class="call-me-inner">
		<div class="call-me-left">
			<div class="name-call-man"><? $APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath("/include/feedback_popup.php"),
					array(),
					array('MODE' => 'html')
				); ?>
			</div>

		</div>

		<div class="call-me-content">
			<?
			$APPLICATION->IncludeComponent(
				"bitrix:form",
				"leave_request",
				array(
					"AJAX_MODE"              => "Y",
					"SEF_MODE"               => "N",
					"WEB_FORM_ID"            => "15",
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


<div id="modal-login" class="modal modal-login">
	<? $APPLICATION->IncludeComponent(
		"bitrix:system.auth.form",
		".default",
		array(
			"FORGOT_PASSWORD_URL" => "/personal/?forgot_password=yes",
			"PROFILE_URL"         => "personal/",
			"REGISTER_URL"        => "",
			"SHOW_ERRORS"         => "Y",
			"COMPONENT_TEMPLATE"  => ".default",
		),
		false
	); ?>
</div>


<div id="mobal-city" class="mobal-city modal">
	<div class="modal-head">Выберите ваш город</div>
	<? $APPLICATION->IncludeComponent(
		"bitrix:sale.location.selector.search",
		"topLocSelect",
		array(
			"COMPONENT_TEMPLATE"         => ".default",
			"ID"                         => $curCityId,//Питер - 269
			"CODE"                       => $_REQUEST["LOCATION"],
			"INPUT_NAME"                 => "LOCATION",
			"PROVIDE_LINK_BY"            => "id",
			"JSCONTROL_GLOBAL_ID"        => "",
			"JS_CALLBACK"                => "",
			"FILTER_BY_SITE"             => "Y",
			"SHOW_DEFAULT_LOCATIONS"     => "Y",
			"CACHE_TYPE"                 => "N",
			"CACHE_TIME"                 => "36000000",
			"FILTER_SITE_ID"             => "s2",
			"INITIALIZE_BY_GLOBAL_EVENT" => "",
			"SUPPRESS_ERRORS"            => "N",
			"JS_CONTROL_GLOBAL_ID"       => "",
		),
		false
	); ?>
</div>

<div class="menu-mask">
	<div class="close close-menu-mask"></div>
	<a href="/" class="logo">
		<div class="logo-top">
			<div class="logo-image"></div>
			
		</div>
		<span class="logo-bottom">
				<span>Дилер завода</span>
				<div class="logo-bottom_image"></div>
			</span>
	</a>
	<div class="container">
		<nav class="mobile-menu">
			<div class="mobile-menu_item-wrap">
				<a class="mobile-menu_item" href="/catalog/">Каталог</a>
			</div>
			<div class="mobile-menu_item-wrap">
				<a class="mobile-menu_item" href="/brands/">Все бренды</a>
			</div>
			<div class="mobile-menu_item-wrap">
				<a class="mobile-menu_item" href="/personal/">Мой аккаунт</a>
			</div>
			<div class="mobile-menu_item-wrap">
				<a class="mobile-menu_item" href="/personal/order/make/">Корзина</a>
			</div>
		</nav>
		<nav class="mobile-menu mobile-menu-2">
			<div class="mobile-menu_item-wrap">
				<a class="mobile-menu_item" href="/dostavka-i-oplata/">Условия доставки</a>
			</div>
			<div class="mobile-menu_item-wrap">
				<a class="mobile-menu_item" href="/sale/">Акции</a>
			</div>
			<div class="mobile-menu_item-wrap">
				<a class="mobile-menu_item" href="/contacts/">Контакты</a>
			</div>
			<div class="mobile-menu_item-wrap">
				<a class="mobile-menu_item" href="/serv/redemption-of-trading-equipment/">Купим ваше оборудование</a>
			</div>
		</nav>

		<div class="menu-mask-bottom">
			<div class="menu-mask-bottom-tel-wrap">
				<? $APPLICATION->IncludeFile(
					$APPLICATION->GetTemplatePath("/include/phone_header_link.php"),
					array(),
					array('MODE' => 'html')
				); ?>
			</div>
			<div class="wrap-big-btn">
				<a data-fancybox data-src="#call-me" href="javascript:;" class="btn big-btn btn-red">Заказать звонок</a>
			</div>
		</div>
		<div class="mask_wrap-time">
			<div class="footer-time-work footer-time-work-with-clock">
				<span>Пн-Пт с 9:00 до 18:00</span>
				<span>Сб с 9:00 до 17:00</span>
				<span>Вс выходной</span>
			</div>
			<form class="your-city" action="">
				<span class="current-city"><?=$curCityName?></span>
			</form>
		</div>
	</div>

</div>

<div class="wrapper">
	<header class="header-fixed">
		<div class="header-top">
			<div class="container">

				<div class="header-top_left">
					<?
					/*
					?>
						<form data-fancybox data-src="#mobal-city" class="your-city" action="">
							<span class="current-city js-current-city"><?=$curCityName?></span>
						</form>
					<?
					 //*/
					?>

						<? $APPLICATION->IncludeComponent(
							"bitrix:menu",
							"top",
							array(
								"ALLOW_MULTI_SELECT"    => "N",
								"CHILD_MENU_TYPE"       => "",
								"DELAY"                 => "N",
								"MAX_LEVEL"             => "1",
								"MENU_CACHE_GET_VARS"   => array(),
								"MENU_CACHE_TIME"       => "3600",
								"MENU_CACHE_TYPE"       => "N",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE"        => "top",
								"USE_EXT"               => "N",
								"COMPONENT_TEMPLATE"    => "top",
							),
							false
						); ?>

					</div>
				<div class="header-top_right">
					<a data-fancybox="" data-src="#call-me" class="header-top__btn" href="javascript:;">Заказать звонок</a>
					<? $APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath("/include/phone_header_link.php"),
						array(),
						array('MODE' => 'html')
					); ?>
					<div class="hours-works">

						<? $APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("/include/schedule_now.php"),
							array(),
							array('MODE' => 'html')
						); ?>

						<div class="hours-works_modal">
							<div class="hours-works_modal-content">
								<div class="footer-time-work footer-time-work-with-clock"><? $APPLICATION->IncludeFile(
										$APPLICATION->GetTemplatePath("/include/schedule.php"),
										array(),
										array('MODE' => 'html')
									); ?>
								</div>
								<a data-fancybox data-src="#call-me" href="javascript:;"
								   class="hours-works_modal-content-btn" href="#">Заказать звонок</a>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
		<div class="header-bottom <?=$headerClass?>">
			<div class="container">


				<div class="header-bottom-container">
					<div class="header-bottom_left">
						<a href="/" class="logo">
							<div class="logo-top">
								<div class="logo-image"></div>
								<!--span class="logo-text">торговый дом оборудования</span-->
							</div>
							<span class="logo-bottom">
								<span>Дилер завода</span>
								<div class="logo-bottom_image"></div>
							</span>
						</a>

						<div href="javascript:;" class="cat-btn">Каталог</div>
					</div>

					<div class="header-bottom_right">


						<? $APPLICATION->IncludeComponent(
							"bitrix:search.title",
							"header_search",
							array(
								"NUM_CATEGORIES"                        => "1",
								"TOP_COUNT"                             => "5",
								"ORDER"                                 => "rank",
								"USE_LANGUAGE_GUESS"                    => "Y",
								"CHECK_DATES"                           => "N",
								"SHOW_OTHERS"                           => "N",
								"PAGE"                                  => SITE_DIR . "catalog/",
								"CATEGORY_0_TITLE"                      => GetMessage("SEARCH_GOODS"),
								"CATEGORY_0"                            => array(
									0 => "iblock_CRM_PRODUCT_CATALOG",
								),
								"CATEGORY_0_iblock_catalog"             => array(
									0 => "all",
								),
								"SHOW_INPUT"                            => "Y",
								"INPUT_ID"                              => "title-search-input",
								"CONTAINER_ID"                          => "search",
								"PRICE_CODE"                            => array(
									0 => "BASE",
								),
								"PRICE_VAT_INCLUDE"                     => "Y",
								"PREVIEW_TRUNCATE_LEN"                  => "",
								"SHOW_PREVIEW"                          => "Y",
								"PREVIEW_WIDTH"                         => "300",
								"PREVIEW_HEIGHT"                        => "300",
								"CONVERT_CURRENCY"                      => "Y",
								"CURRENCY_ID"                           => "RUB",
								"COMPONENT_TEMPLATE"                    => "header_search",
								"CATEGORY_0_iblock_CRM_PRODUCT_CATALOG" => array(
									0 => "26",
								),
							),
							false
						); ?>


						<? $APPLICATION->IncludeComponent(
							"bitrix:sale.basket.basket.line",
							"basket",
							array(
								"PATH_TO_BASKET"       => SITE_DIR . "personal/order/make",
								"PATH_TO_PERSONAL"     => SITE_DIR . "personal/",
								"SHOW_PERSONAL_LINK"   => "N",
								"SHOW_NUM_PRODUCTS"    => "N",
								"SHOW_TOTAL_PRICE"     => "N",
								"SHOW_PRODUCTS"        => "Y",
								"POSITION_FIXED"       => "N",
								"SHOW_AUTHOR"          => "Y",
								"PATH_TO_REGISTER"     => SITE_DIR . "login/",
								"PATH_TO_PROFILE"      => SITE_DIR . "personal/",
								"COMPONENT_TEMPLATE"   => "basket",
								"PATH_TO_ORDER"        => SITE_DIR . "personal/order/make/",
								"SHOW_EMPTY_VALUES"    => "N",
								"PATH_TO_AUTHORIZE"    => "",
								"SHOW_REGISTRATION"    => "N",
								"HIDE_ON_BASKET_PAGES" => "Y",
								"SHOW_DELAY"           => "N",
								"SHOW_NOTAVAIL"        => "N",
								"SHOW_IMAGE"           => "Y",
								"SHOW_PRICE"           => "Y",
								"SHOW_SUMMARY"         => "Y",
								"MAX_IMAGE_SIZE"       => "70",
							),
							false
						); ?>


					</div>

				</div>
			</div>


			<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"catalogListOnHome", 
	array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsMenuFilter",
		"IBLOCK_ID" => "26",
		"IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(
			0 => "NAME",
			1 => "",
		),
		"SECTION_ID" => "#SECTION_CODE#/",
		"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
		"SECTION_USER_FIELDS" => array(
			0 => "",
		),
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "2",
		"VIEW_MODE" => "LIST",
		"COMPONENT_TEMPLATE" => "catalogListOnHome",
		"HIDE_SECTION_NAME" => "N"
	),
	false
); ?>
		</div>

	</header>
