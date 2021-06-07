<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {

}
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/" . SITE_TEMPLATE_ID . "/header.php");
CJSCore::Init(array("fx"));

include_once $_SERVER["DOCUMENT_ROOT"] . "/catalog/qr.php"; // Просмотр товара по штрихкоду

//\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

if(isset($_GET["theme"]) && in_array($_GET["theme"], array("blue", "green", "yellow", "red"))) {
	COption::SetOptionString("main", "wizard_eshop_bootstrap_theme_id", $_GET["theme"], false, SITE_ID);
}
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "green", SITE_ID);

$curPage = $APPLICATION->GetCurPage(true);

use Bitrix\Main\Page\Asset;
// CSS
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/libs/slick/slick.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/libs/formstyler/jquery.formstyler.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/fonts.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/styles.css");
//JS
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/libs/jquery/jquery-3.3.1.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/libs/fancybox/jquery.fancybox.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/libs/slick/slick.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/libs/formstyler/jquery.formstyler.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.validate.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.form.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/scripts.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/goals.js");

CJSCore::Init(array('ls'));


$isMainPage = $APPLICATION->GetCurPage(false) == SITE_DIR;
$headerClass = 'header-bottom-inner';
if($isMainPage) {
	$headerClass = 'header-bottom-inner header-bottom-main-screen';
}

global $current_currency, $curCityId, $curCityName;

$curCityName = $_COOKIE['location_city_name'];
$curCityId = $_COOKIE['location_city_id'];

if(empty($curCityName)) {
	$curCityName = 'Ваш город...';
}

?><!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">

<head>
    <meta charset="utf-8">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <?// $APPLICATION->ShowHead(); ?>
    <?// NEW ShowHead() ?>
    <meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET?>" />
    <?
        $APPLICATION->ShowMeta("robots", false, $bXhtmlStyle);
        $APPLICATION->ShowMeta("description", false, $bXhtmlStyle);
        $APPLICATION->ShowLink("canonical", null, $bXhtmlStyle);
        $APPLICATION->ShowCSS(true, $bXhtmlStyle);
        $APPLICATION->ShowHeadStrings();
        $APPLICATION->ShowHeadScripts();
    ?>
    <?// /NEW ShowHead() ?>


    <meta name="viewport" content="width=device-width">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#a72b2a">
    <meta name="msapplication-TileColor" content="#a72b2a">
    <meta name="theme-color" content="#ffffff">
    <link rel='canonical' href='https://tdo.ru<?=$APPLICATION->GetCurPage()?>' />

	<?
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/new_design/css/bootstrap.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/new_design/css/owl.carousel.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/new_design/css/owl.theme.default.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/libs/fancybox/jquery.fancybox.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/new_design/css/style.css");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/new_design/js/bootstrap.bundle.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/new_design/js/owl.carousel.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/new_design/js/script.js");

	?>

</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <? $APPLICATION->ShowProperty("backgroundImage"); ?>>
<? $APPLICATION->ShowPanel(); ?>
<? $APPLICATION->IncludeComponent(
	"bitrix:eshop.banner",
	"",
	array()
); ?>

<!--popUps-->
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
    <div class="container">
        <div class="modal-head">
            <div onclick="$('#modal-login').fadeToggle();$('body').toggleClass(`overflowhidden`)" class="modal-close">X
            </div>
        </div>

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
</div>

<div id="mobal-city" class="mobal-city modal">
    <div class="container">
        <div class="modal-head">Выберите ваш город
            <div onclick="$('#mobal-city').fadeToggle();$('body').toggleClass(`overflowhidden`)" class="modal-close">X
            </div>
        </div>

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
</div>
<!--popUps-->

<!--HEADER-->

<header>
    <div class="container-fluid topHead">
        <nav class="navbar navbar-expand-md navbar-light bg-light-tdo menu">
            <div class="container">
                <!--button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPanel"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button-->
                <button class="navbar-btn">
                    <span class="navbar-btn__name">Каталог</span>
                    <span class="navbar-btn__icon"></span>
                </button>
                <div class="col-12 col-md-12 col-lg-7 offset-lg-auto">
                    <div class="collapse navbar-collapse" id="navbarText">
						<? $APPLICATION->IncludeComponent(
							"bitrix:menu",
							"top",
							array(
								"ALLOW_MULTI_SELECT"    => "N",
								"CHILD_MENU_TYPE"       => "",
								"DELAY"                 => "N",
								"MAX_LEVEL"             => "1",
								"MENU_CACHE_GET_VARS"   => array(),
								"MENU_CACHE_TIME"       => "0",
								"MENU_CACHE_TYPE"       => "N",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE"        => "top",
								"USE_EXT"               => "N",
								"COMPONENT_TEMPLATE"    => "top",
							),
							false
						); ?>
                    </div>
                </div>
                <div class="col-4 col-md-2 col-lg-3 header-city">
                    <!-- <span>Ваш город: </span> -->
                    <a href="#" data-modal="mobal-city"
                       onclick="$('#mobal-city').fadeToggle();$('body').toggleClass(`overflowhidden`)"
                       class="head-city">
                        <svg class="svg-icon city-icon" viewBox="0 0 10 13" fill="white"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M5.09513 12.2882C4.25309 11.5699 3.47259 10.7825 2.7618 9.93418C1.69513 8.66018 0.428467 6.76285 0.428467 4.95485C0.427522 3.06654 1.56463 1.36377 3.30918 0.641112C5.05373 -0.0815499 7.06184 0.318341 8.39647 1.65418C9.27411 2.52792 9.76574 3.71644 9.76183 4.95485C9.76183 6.76285 8.49514 8.66018 7.42847 9.93418C6.71768 10.7825 5.93718 11.5699 5.09513 12.2882ZM5.09513 2.95485C4.3806 2.95485 3.72035 3.33605 3.36308 3.95485C3.00582 4.57365 3.00582 5.33605 3.36308 5.95485C3.72035 6.57365 4.3806 6.95485 5.09513 6.95485C6.1997 6.95485 7.09513 6.05942 7.09513 4.95485C7.09513 3.85028 6.1997 2.95485 5.09513 2.95485Z" />
                        </svg>
						<?=$curCityName?>
                    </a>
                </div>

                <div class="col-5 col-md-4 col-lg-2 but-hd">
					<?
					global $USER;
					if(!$USER->IsAuthorized()) { ?>
                        <button class="main-enter"
                                onclick="$('#modal-login').fadeToggle();$('body').toggleClass(`overflowhidden`)">
                            Вход
                        </button>
                        <a style="text-decoration: none" href="/personal/?register=yes">
                            <button class="main-reg">Регистрация</button>
                        </a>
					<? } else { ?>
                        <div class="header-bottom_right__box header-bottom_right__box-login">
                            <a style="text-decoration: none" href="javascript:void(0);"
                               class="header-bottom_right__box__link">
                                <img style="    filter: invert(1);"
                                     src="/local/templates/tdo_shop_new/img/icons/header/person.svg" alt="">
                                <span class="header-bottom_right__box-span"><?=$USER->GetFullName()?></span>
                            </a>


							<? $user_img = CFile::GetPath(CUser::GetByID($USER->GetID())->fetch()["PERSONAL_PHOTO"]); ?>

                            <div class="header-bottom_right__box-wrap">
                                <div class="widget widget-personal-auth js-widget-personal-auth">
                                    <div class="w-wrap">
                                        <div class="head">
                                            <div class="user-block-img"
                                                 style="background-image: url(<? if($user_img) {
												     echo $user_img;
											     } else {
												     echo "/images/icons/icon-user.png";
											     } ?>);"></div>
                                            <div class="right-wrap">
                                                <div class="name"><?=$USER->GetFullName()?></div>
                                                <div class="email"><?=$USER->GetLogin()?></div>
                                            </div>
                                        </div>
                                        <div class="body">
                                            <ul>
                                                <li>
                                                    <a href="/personal/orders/" class="link-red">
                                                        <i class="icon-box"></i>
                                                        <span class="text">Мои заказы</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/personal/private/" class="link-red">
                                                        <i class="icon-settings"></i>
                                                        <span class="text">Настройки</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/?logout=yes">
                                                        <i class="icon-exit"></i>
                                                        <span class="text">Выход</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a style="text-decoration: none" href="?logout=yes">
                            <button class="main-reg"
                            >
                                Выход
                            </button>
                        </a>
					<? } ?>
                </div>
            </div>
        </nav>
    </div>
    <nav class="navbar">
        <div class="container">
            <div class="col-auto col-sm-6 col-md-3 logo-img-wrap">
                <a style="text-decoration: none" href="/">
                    <img src="/local/templates/tdo_shop_new/new_design/img/new_2_tdo_logo_png.png" class="logo-big">
                    <img src="/local/templates/tdo_shop_new/new_design/img/new_2_tdo_logo_mini_png.png" class="logo-sm" alt="">
                </a>
            </div>

			<?
			//search by word part if cant find full word
			\Bitrix\Main\Loader::includeModule('search');
			$obSearch = new CSearch;
			$obSearch->Search(
				array(
					"QUERY" => $_REQUEST['q'],
				)
			);
			if($obSearch->errorno == 0):
				if(!($arResult = $obSearch->GetNext())) {

					if(empty($arResult)) {
						$_REQUEST['q'] = '"' . $_GET['q'] . '"';
					}
				}
			endif;

			?>

			<? $APPLICATION->IncludeComponent(
				"bitrix:search.title",
				"header_search",
				array(
					"NUM_CATEGORIES"                        => "1",
					"TOP_COUNT"                             => "5",
					"ORDER"                                 => "rank",
					"USE_LANGUAGE_GUESS"                    => "N",
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
            <div class="col-12 col-lg-5">
                <div class="card-img">
                    <button class="navbar-btn">
                        <span class="navbar-btn__name">Каталог</span>
                        <span class="navbar-btn__icon"></span>
                    </button>
                    <div class="search-tel">
						<? $APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH . "/include/header_phone.php",
							array(),
							array()
						); ?>
                        <button class="hed-tel-but" data-title="Закажите звонок" data-fancybox="" data-src="#call-me">заказать звонок</button>
                    </div>

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
                <!-- <a class="auth-label header-bar" href="#">
                    <img src="img/chart.png">
                    Сравнение
                </a>
                <a class="auth-label header-bar" href="#">
                    <img src="img/like.png">
                    Избранное
                </a>
                <a class="auth-label header-bar" href="#">
                    <svg class="svg-icon auth-icon" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.59111 9.31799C8.44739 9.31799 9.28444 9.06874 9.99641 8.60175C10.7084 8.13477 11.2633 7.47102 11.591 6.69445C11.9187 5.91788 12.0044 5.06337 11.8373 4.23897C11.6703 3.41457 11.258 2.65731 10.6525 2.06295C10.047 1.46859 9.27556 1.06382 8.43574 0.899839C7.59591 0.735855 6.72541 0.820018 5.93431 1.14168C5.14321 1.46335 4.46705 2.00807 3.99133 2.70696C3.5156 3.40586 3.26169 4.22753 3.26169 5.06808C3.26417 6.19448 3.7211 7.27405 4.53249 8.07053C5.34387 8.86702 6.44364 9.31556 7.59111 9.31799ZM7.59111 2.33008C8.14834 2.33008 8.69306 2.49228 9.15638 2.79617C9.6197 3.10007 9.98081 3.53201 10.1941 4.03737C10.4073 4.54273 10.4631 5.09881 10.3544 5.6353C10.2457 6.17178 9.97734 6.66458 9.58332 7.05136C9.1893 7.43815 8.68728 7.70155 8.14076 7.80826C7.59424 7.91498 7.02775 7.86021 6.51293 7.65088C5.99812 7.44156 5.5581 7.08707 5.24852 6.63226C4.93894 6.17745 4.7737 5.64274 4.7737 5.09574C4.7737 4.36224 5.07053 3.65878 5.5989 3.14012C6.12727 2.62146 6.84389 2.33008 7.59111 2.33008Z"
                            fill="#212529" />
                        <path
                            d="M12.5403 12.434C11.8905 11.7956 11.119 11.2893 10.2698 10.9438C9.42053 10.5983 8.51028 10.4205 7.59102 10.4205C6.67176 10.4205 5.76151 10.5983 4.91229 10.9438C4.06307 11.2893 3.29153 11.7956 2.64177 12.434C1.54094 13.5163 0.837344 14.9269 0.641405 16.4442C0.630026 16.5336 0.638397 16.6243 0.665947 16.7102C0.693497 16.7961 0.73958 16.8752 0.801059 16.942C0.872107 17.0191 0.959156 17.0804 1.05635 17.1218C1.15354 17.1631 1.25863 17.1835 1.36454 17.1817C1.57323 17.1637 1.76978 17.0776 1.92294 16.9373C2.07609 16.797 2.17705 16.6104 2.20976 16.4073C2.42321 15.1578 3.08098 14.023 4.06621 13.2045C5.05144 12.386 6.30034 11.9369 7.59102 11.9369C8.8817 11.9369 10.1306 12.386 11.1158 13.2045C12.1011 14.023 12.7588 15.1578 12.9723 16.4073C13.005 16.6104 13.1059 16.797 13.2591 16.9373C13.4123 17.0776 13.6088 17.1637 13.8175 17.1817C13.9234 17.1835 14.0285 17.1631 14.1257 17.1218C14.2229 17.0804 14.3099 17.0191 14.381 16.942C14.4425 16.8752 14.4885 16.7961 14.5161 16.7102C14.5436 16.6243 14.552 16.5336 14.5406 16.4442C14.3447 14.9269 13.6411 13.5163 12.5403 12.434Z"
                            fill="#212529" />
                    </svg>
                    Войти
                </a> -->
                <!-- <a class="backet-label" href="#">
                    <svg class="svg-icon backet-icon" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.95"
                            d="M17.2775 2.81H4.21829V0.7C4.21829 0.514348 4.14465 0.336301 4.01359 0.205025C3.88252 0.0737498 3.70476 0 3.5194 0H0.70388C0.517199 0 0.338165 0.0742766 0.206162 0.20649C0.0741586 0.338703 0 0.518022 0 0.705C0 0.891978 0.0741586 1.0713 0.206162 1.20351C0.338165 1.33572 0.517199 1.41 0.70388 1.41H2.81053V11.67C2.81053 11.8557 2.88416 12.0337 3.01523 12.165C3.14629 12.2963 3.32406 12.37 3.50942 12.37H15.1908C15.3468 12.3702 15.4984 12.3182 15.6214 12.2221C15.7444 12.1261 15.8319 11.9916 15.8697 11.84L17.9764 3.69C18.0045 3.58439 18.0076 3.47365 17.9853 3.36666C17.963 3.25966 17.916 3.15937 17.8481 3.07383C17.7801 2.98829 17.6931 2.91988 17.5941 2.87406C17.495 2.82825 17.3866 2.80631 17.2775 2.81ZM14.6417 11H4.21829V4.22H16.3689L14.6417 11ZM4.91718 13.78C4.4993 13.774 4.08909 13.8927 3.73874 14.1209C3.38838 14.3491 3.11371 14.6765 2.94966 15.0615C2.78561 15.4465 2.7396 15.8717 2.81747 16.2829C2.89534 16.6942 3.09358 17.073 3.38697 17.3711C3.68036 17.6692 4.05565 17.8731 4.4651 17.957C4.87454 18.0409 5.29964 18.0009 5.68633 17.8421C6.07302 17.6833 6.40382 17.4129 6.63665 17.0653C6.86948 16.7177 6.99383 16.3086 6.99387 15.89C6.99393 15.3356 6.77609 14.8034 6.38747 14.4085C5.99886 14.0137 5.47069 13.7879 4.91718 13.78ZM4.91718 16.59C4.77895 16.59 4.64383 16.5489 4.52889 16.472C4.41396 16.3951 4.32438 16.2858 4.27149 16.1579C4.21859 16.03 4.20475 15.8892 4.23172 15.7534C4.25868 15.6177 4.32525 15.4929 4.42299 15.395C4.52073 15.2971 4.64526 15.2305 4.78083 15.2035C4.9164 15.1764 5.05692 15.1903 5.18463 15.2433C5.31233 15.2963 5.42148 15.386 5.49828 15.5011C5.57507 15.6162 5.61606 15.7516 5.61606 15.89C5.61606 16.0757 5.54243 16.2537 5.41136 16.385C5.2803 16.5163 5.10253 16.59 4.91718 16.59ZM12.3953 13.78C11.9786 13.78 11.5713 13.9037 11.2249 14.1356C10.8784 14.3674 10.6084 14.697 10.449 15.0825C10.2895 15.4681 10.2478 15.8923 10.3291 16.3016C10.4104 16.7109 10.611 17.0869 10.9057 17.382C11.2003 17.6771 11.5756 17.878 11.9843 17.9595C12.3929 18.0409 12.8165 17.9991 13.2015 17.8394C13.5864 17.6797 13.9154 17.4092 14.1469 17.0623C14.3784 16.7153 14.5019 16.3073 14.5019 15.89C14.5019 15.3304 14.28 14.7937 13.8849 14.398C13.4898 14.0023 12.954 13.78 12.3953 13.78ZM12.3953 16.59C12.257 16.59 12.1219 16.5489 12.007 16.472C11.8921 16.3951 11.8025 16.2858 11.7496 16.1579C11.6967 16.03 11.6828 15.8892 11.7098 15.7534C11.7368 15.6177 11.8033 15.4929 11.9011 15.395C11.9988 15.2971 12.1234 15.2305 12.2589 15.2035C12.3945 15.1764 12.535 15.1903 12.6627 15.2433C12.7904 15.2963 12.8996 15.386 12.9764 15.5011C13.0532 15.6162 13.0942 15.7516 13.0942 15.89C13.0942 16.0757 13.0205 16.2537 12.8895 16.385C12.7584 16.5163 12.5806 16.59 12.3953 16.59Z"
                            fill="#CC0000" />
                    </svg>
                    <div class="backet-quantity">2</div>
                    Корзина
                </a> -->
            </div>
        </div>
    </nav>
</header>
<!--HEADER-->


<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"catalogListOnHome",
	array(
		"ADD_SECTIONS_CHAIN"    => "Y",
		"CACHE_FILTER"          => "N",
		"CACHE_GROUPS"          => "Y",
		"CACHE_TIME"            => "36000000",
		"CACHE_TYPE"            => "A",
		"COUNT_ELEMENTS"        => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME"           => "sectionsMenuFilter",
		"IBLOCK_ID"             => "26",
		"IBLOCK_TYPE"           => "CRM_PRODUCT_CATALOG",
		"SECTION_CODE"          => "",
		"SECTION_FIELDS"        => array(
			0 => "NAME",
			1 => "",
		),
		"SECTION_ID"            => "#SECTION_CODE_PATH#/",
		"SECTION_URL"           => "/catalog/#SECTION_CODE_PATH#/",
		"SECTION_USER_FIELDS"   => array(
			0 => "UF_PICTURE_LITTLE",
		),
		"SHOW_PARENT_NAME"      => "Y",
		"TOP_DEPTH"             => "2",
		"VIEW_MODE"             => "LIST",
		"COMPONENT_TEMPLATE"    => "catalogListOnHome",
		"HIDE_SECTION_NAME"     => "N",
	),
	false
); ?>
