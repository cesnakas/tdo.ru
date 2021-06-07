<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>


<footer>
    <div class="container mb-0 mb-md-4">
        <div class="row">
            <div class="col-12 col-sm-4 order-4 order-md-0 col-md-3 footer-logo-wrap">
                <img src="/local/templates/tdo_shop_new/new_design/img/new_2_tdo_logo_png.png">
                <div class="copyright mt-4">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/catlist_footer.php",
                    array(),
                    array()
                ); ?>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3">

                <div class="footer-menu">
                    <div class="footer-menu-header"><a href="/catalog/"><strong>Каталог</strong></a></div>




                    <? $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "catalogListOnHome_bottom",
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
                            "SECTION_ID" => "#SECTION_CODE_PATH#/",
                            "SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
                            "SECTION_USER_FIELDS" => array(
                                0 => "UF_PICTURE_LITTLE",
                            ),
                            "SHOW_PARENT_NAME" => "Y",
                            "TOP_DEPTH" => "1",
                            "VIEW_MODE" => "LIST",
                            "COMPONENT_TEMPLATE" => "catalogListOnHome",
                            "HIDE_SECTION_NAME" => "N"
                        ),
                        false
                    ); ?>





                  
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-3">
                <div class="footer-menu">

                    <? $APPLICATION->IncludeFile(
                        SITE_TEMPLATE_PATH . "/include/bottom_menu.php",
                        array(),
                        array()
                    ); ?>

                </div>
            </div>
            <div class="col-12 col-md-3  order-5 order-md-4 footer-contacts-wrap">
                <div class="footer-phone">
                    <a href="">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M9.37343 9.99999C4.04117 10.0076 -0.00569851 5.91218 6.02339e-06 0.626569C6.02339e-06 0.281391 0.279828 0 0.625006 0H2.2746C2.58434 0 2.84746 0.227581 2.89294 0.533956C3.00194 1.26825 3.21573 1.9831 3.5278 2.65669L3.59203 2.79532C3.68133 2.98807 3.6208 3.21709 3.44792 3.34055C2.93706 3.70537 2.74183 4.43972 3.13981 5.01272C3.63924 5.73177 4.26878 6.36119 4.98767 6.86039C5.56064 7.25826 6.29488 7.06305 6.65969 6.55228C6.78323 6.37931 7.01238 6.31875 7.20525 6.40809L7.34324 6.47201C8.01687 6.78406 8.73178 6.99786 9.46614 7.10685C9.77253 7.15232 10 7.41542 10 7.72516V9.37499C10 9.72017 9.7195 9.99999 9.37432 9.99999L9.37343 9.99999Z"
                                    fill="#CC0000"></path>
                        </svg>

                        <? $APPLICATION->IncludeFile(
                            SITE_TEMPLATE_PATH . "/include/catlist_footer_1.php",
                            array(),
                            array()
                        ); ?>
                    </a>
                </div>
                <div class="footer-email">
                    <a href="">
                        <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                    d="M12.3333 11.3332H1.66659C0.930205 11.3332 0.333252 10.7362 0.333252 9.99984V1.94184C0.364325 1.2282 0.952272 0.665831 1.66659 0.666505H12.3333C13.0697 0.666505 13.6666 1.26346 13.6666 1.99984V9.99984C13.6666 10.7362 13.0697 11.3332 12.3333 11.3332ZM1.66659 3.24517V9.99984H12.3333V3.24517L6.99992 6.79984L1.66659 3.24517ZM2.19992 1.99984L6.99992 5.19984L11.7999 1.99984H2.19992Z"
                                    fill="#CC0000"/>
                        </svg>
                        <? $APPLICATION->IncludeFile(
                            SITE_TEMPLATE_PATH . "/include/catlist_footer_2.php",
                            array(),
                            array()
                        ); ?>

                    </a>
                </div>
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/catlist_footer_3.php",
                    array(),
                    array()
                ); ?>

                <div class="footer-social d-flex">
                    <div class="footer-icon vk" >
                        <a href="https://vk.com/tdobu" target="_blank">
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.62771 7.93804C7.62771 7.93804 7.85872 7.91285 7.97704 7.7881C8.08535 7.6738 8.08159 7.4581 8.08159 7.4581C8.08159 7.4581 8.06719 6.45089 8.54362 6.30217C9.01315 6.15591 9.61604 7.2762 10.2559 7.70698C10.7392 8.03268 11.106 7.9614 11.106 7.9614L12.8158 7.93804C12.8158 7.93804 13.7098 7.88396 13.2859 7.19385C13.2509 7.13731 13.0386 6.68318 12.0151 5.75033C10.9426 4.77384 11.0866 4.93178 12.3775 3.24244C13.1639 2.21372 13.4781 1.58568 13.3798 1.31713C13.2866 1.06026 12.7081 1.12847 12.7081 1.12847L10.7836 1.14015C10.7836 1.14015 10.6409 1.12109 10.5351 1.18316C10.4318 1.244 10.3648 1.38596 10.3648 1.38596C10.3648 1.38596 10.0605 2.18177 9.65423 2.85898C8.79717 4.28714 8.45472 4.36272 8.31448 4.27423C7.98831 4.06714 8.0697 3.44339 8.0697 3.00032C8.0697 1.61579 8.28381 1.03875 7.65337 0.889418C7.44427 0.839641 7.29027 0.807071 6.755 0.801541C6.06822 0.794781 5.48725 0.803999 5.15795 0.961932C4.93883 1.06702 4.7698 1.30177 4.87309 1.31529C5.00018 1.33188 5.28816 1.39149 5.44092 1.59551C5.63812 1.85914 5.63124 2.45032 5.63124 2.45032C5.63124 2.45032 5.74455 4.08004 5.36642 4.28222C5.10724 4.4211 4.75164 4.13781 3.98723 2.84177C3.59595 2.17808 3.30046 1.44434 3.30046 1.44434C3.30046 1.44434 3.24349 1.3073 3.14144 1.23355C3.01811 1.14445 2.84595 1.11679 2.84595 1.11679L1.01726 1.12847C1.01726 1.12847 0.742426 1.13584 0.641632 1.25322C0.552107 1.35707 0.634745 1.57277 0.634745 1.57277C0.634745 1.57277 2.06652 4.86111 3.68798 6.51849C5.17485 8.0376 6.86268 7.93804 6.86268 7.93804H7.62771Z"
                                      fill="white"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="footer-icon fb">
                        <a href="https://facebook.com/tdobu/" target="_blank">
                            <svg width="7" height="14" viewBox="0 0 7 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M4.25073 13.0557V6.5271H6.05292L6.29175 4.2773H4.25073L4.25379 3.15125C4.25379 2.56447 4.30954 2.25006 5.15233 2.25006H6.27899V0H4.47654C2.31152 0 1.54949 1.0914 1.54949 2.92678V4.27756H0.199951V6.52736H1.54949V13.0557H4.25073Z"
                                      fill="white"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="footer-icon ok">
                        <a href="https://ok.ru/profile/576561324236" target="_blank">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="8" height="14" viewBox="0 0 8 14">
  <image id="Слой_0" data-name="Слой 0" width="8" height="14" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAOCAYAAAASVl2WAAABX0lEQVQYlV1OTStEYRR+znuvcX00RYmFjZK1YiExCiUbC2XhJ9jwE9goxRIrFlI2rHyUBTGUkmRj5WPFTEYhM5d777zve47mGpJnd87zCRGBsIaYaFpEMiKcE1ucFVsEmwhgHUDY7sl/MKdLHFiHg2Xqw4SFMRPmR0T4Lf6wHVXkVvYghqwTYROQbQiW4xeplAsg+y2gLlKOS3AYRKmy6RHMkizFx4lsc8I2W65kEWlAcLMD/XxVLSJHf2aemdfbevNwCjLZ8wm4CcXwdskGdSrhseWKPPHHkGJdRSV5qY0jPxT/cYPcCo2qpnGVqEl+z8jfdYsN9oVN+FvA1rIJDuzb9QD5F0vQL89I9k2dKK+uNzYV/cv88XynU+1BfWau4bX0r5XJCIBPidoOr214S0eaYAqZhZ/kQnqu7f1wpvnnNv7TqkuO8yTav/XvjydfjxZvWGtQY3uqtjW1ooizX5mGFLNV9cgHAAAAAElFTkSuQmCC"/>
</svg>
                        </a>
                    </div>
                    <div class="footer-icon inst">
                        <a href="https://www.instagram.com/tdo.bu/" target="_blank">
                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.00058 0.599998C5.26242 0.599998 5.04429 0.607599 4.36161 0.638666C3.68027 0.669866 3.2152 0.777734 2.80827 0.936002C2.38733 1.09947 2.03026 1.31814 1.67452 1.67401C1.31852 2.02975 1.09985 2.38682 0.935846 2.80762C0.777177 3.21469 0.669176 3.6799 0.638509 4.36097C0.607976 5.04364 0.599976 5.26191 0.599976 7.00006C0.599976 8.73822 0.607709 8.95569 0.638643 9.63836C0.669976 10.3197 0.777844 10.7848 0.935979 11.1917C1.09958 11.6126 1.31825 11.9697 1.67412 12.3255C2.02972 12.6815 2.38679 12.9007 2.80747 13.0641C3.21467 13.2224 3.67987 13.3303 4.36108 13.3615C5.04376 13.3925 5.26176 13.4001 6.99978 13.4001C8.73806 13.4001 8.95553 13.3925 9.6382 13.3615C10.3195 13.3303 10.7851 13.2224 11.1924 13.0641C11.6132 12.9007 11.9697 12.6815 12.3253 12.3255C12.6813 11.9697 12.9 11.6126 13.064 11.1918C13.2213 10.7848 13.3293 10.3196 13.3613 9.63849C13.392 8.95582 13.4 8.73822 13.4 7.00006C13.4 5.26191 13.392 5.04378 13.3613 4.3611C13.3293 3.67976 13.2213 3.21469 13.064 2.80775C12.9 2.38682 12.6813 2.02975 12.3253 1.67401C11.9693 1.31801 11.6133 1.09934 11.192 0.936002C10.7839 0.777734 10.3186 0.669866 9.63727 0.638666C8.9546 0.607599 8.73726 0.599998 6.99858 0.599998H7.00058ZM6.42644 1.75334C6.59684 1.75307 6.78698 1.75334 7.00058 1.75334C8.7094 1.75334 8.91193 1.75947 9.58674 1.79014C10.2107 1.81867 10.5494 1.92294 10.775 2.01054C11.0737 2.12654 11.2866 2.26521 11.5105 2.48921C11.7345 2.71321 11.8732 2.92655 11.9894 3.22522C12.077 3.45056 12.1814 3.78923 12.2098 4.41323C12.2405 5.08791 12.2472 5.29058 12.2472 6.99859C12.2472 8.70661 12.2405 8.90928 12.2098 9.58395C12.1813 10.208 12.077 10.5466 11.9894 10.772C11.8734 11.0706 11.7345 11.2833 11.5105 11.5072C11.2865 11.7312 11.0738 11.8698 10.775 11.9858C10.5497 12.0738 10.2107 12.1778 9.58674 12.2064C8.91207 12.237 8.7094 12.2437 7.00058 12.2437C5.29163 12.2437 5.08909 12.237 4.41442 12.2064C3.79041 12.1776 3.45174 12.0733 3.22601 11.9857C2.92734 11.8697 2.714 11.731 2.49 11.507C2.266 11.283 2.12733 11.0702 2.01106 10.7714C1.92346 10.5461 1.81906 10.2074 1.79066 9.58342C1.75999 8.90875 1.75386 8.70608 1.75386 6.99699C1.75386 5.28791 1.75999 5.08631 1.79066 4.41163C1.81919 3.78763 1.92346 3.44896 2.01106 3.22335C2.12706 2.92468 2.266 2.71135 2.49 2.48735C2.714 2.26334 2.92734 2.12468 3.22601 2.00841C3.45161 1.92041 3.79041 1.81641 4.41442 1.78774C5.00482 1.76107 5.23363 1.75307 6.42644 1.75174V1.75334ZM10.4169 2.81602C9.99288 2.81602 9.64888 3.15962 9.64888 3.58376C9.64888 4.00776 9.99288 4.35177 10.4169 4.35177C10.8409 4.35177 11.1849 4.00776 11.1849 3.58376C11.1849 3.15976 10.8409 2.81575 10.4169 2.81575V2.81602ZM7.00062 3.71336C5.18553 3.71336 3.71392 5.18497 3.71392 7.00006C3.71392 8.81515 5.18553 10.2861 7.00062 10.2861C8.8157 10.2861 10.2868 8.81515 10.2868 7.00006C10.2868 5.18497 8.81557 3.71336 7.00048 3.71336H7.00062ZM7.00059 4.8667C8.17874 4.8667 9.13395 5.82178 9.13395 7.00006C9.13395 8.17821 8.17874 9.13342 7.00059 9.13342C5.82231 9.13342 4.86724 8.17821 4.86724 7.00006C4.86724 5.82178 5.82231 4.8667 7.00059 4.8667Z"
                                      fill="white"></path>
                            </svg>
                        </a>
                    </div>
					
					<div class="footer-icon utub">
                        <a href="https://www.youtube.com/channel/UCqDwhPD6PluwJN6p5PmDK2g" target="_blank">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" viewBox="0 0 14 14">
  <image id="Слой_1" data-name="Слой 1" x="3" width="11" height="14" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAsAAAAOCAYAAAD5YeaVAAABEklEQVQokYWSP0oDQRTG33sz7KaYIYulJ/AGgiAeQQTrgIWNrYcQxBNY6Q20srVQ9CIWIVgkZHdjeH9kR0l2kxh/MM2b7/tmmG9Qma+1ql51Pn9EIoBmmUECERaoAiHRnovxwYVwk+bM8BcEAFWzR3l+6fv9D8zzfRBZprdoxMsp0a4L4d3FeLvpFDKRtQjMsnNfFJ+Y50fJoJru303uOHDHhfDsYrwHRDSRJN4KZtnAF4VSrzf4V9zGr01WMOYnmU5PQORrq1iq6szq+i6V4z34Te9pzG9SlsfGPEqtNmIzIHCuo9bZ7EImkwMQGaFzncp9cv6kvWhZnprqMP2P37Q2ZMyl1vWVjMeHJjJcTVsAAN/VnXSm8uFD9wAAAABJRU5ErkJggg=="/>
</svg>
                        </a>
                    </div>
					
					
                </div>
                
            </div>
        </div>
    </div>
    <div class="container-fluid hr1"></div>
    <div class="container personal-data pb-3 pt-3">
        <? $APPLICATION->IncludeFile(
            SITE_TEMPLATE_PATH . "/include/catlist_footer_4.php",
            array(),
            array()
        ); ?>

    </div>
</footer>

<div id="rent-me" class="modal rent-me js-rent-me">
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
                    "AJAX_MODE" => "Y",
                    "SEF_MODE" => "N",
                    "WEB_FORM_ID" => "14",
                    "START_PAGE" => "new",
                    "SHOW_LIST_PAGE" => "N",
                    "SHOW_EDIT_PAGE" => "N",
                    "SHOW_VIEW_PAGE" => "N",
                    "SUCCESS_URL" => "",
                    "SHOW_ANSWER_VALUE" => "N",
                    "SHOW_ADDITIONAL" => "N",
                    "SHOW_STATUS" => "N",
                    "EDIT_ADDITIONAL" => "N",
                    "EDIT_STATUS" => "Y",
                    "NOT_SHOW_FILTER" => array(
                        0 => "",
                        1 => "",
                    ),
                    "NOT_SHOW_TABLE" => array(
                        0 => "",
                        1 => "",
                    ),
                    "CHAIN_ITEM_TEXT" => "",
                    "CHAIN_ITEM_LINK" => "",
                    "IGNORE_CUSTOM_TEMPLATE" => "N",
                    "USE_EXTENDED_ERRORS" => "Y",
                    "CACHE_GROUPS" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600000",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "AJAX_OPTION_HISTORY" => "N",
                    "SHOW_LICENCE" => "",
                    "HIDDEN_CAPTCHA" => "",
                    "COMPONENT_TEMPLATE" => ".default",
                    "RESULT_ID" => $_REQUEST[RESULT_ID],
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "VARIABLE_ALIASES" => array(
                        "action" => "action",
                    ),
                ),
                false
            ); ?>
        </div>

    </div>
</div>

<div id="addCart-popup" class="addCart-popup">
    <div class="addCart-popup_good">
        <div class="addCart-popup_good-top">
            <div class="good-popup_head">Товар добавлен в корзину</div>
            <div class="addCart-popup_item">
                <div class="addCart-popup_item-left">
                    <div class="addCart-popup_item-img js-img"></div>
                    <div class="addCart-popup_item-text"><span class="js-name"></span></div>
                </div>

                <div class="addCart-popup_item-right">
                    <div class="cart-content-count-wrap">
                        <form class="cart-content-count">
                            <button class="cart-content-count_min js-add-to-cart-popup" data-quantity="-1">-</button>
                            <input value="1" class="cart-content-count-input js-quantity" type="text" value="1">
                            <button class="cart-content-count_plus js-add-to-cart-popup" data-quantity="1">+</button>
                        </form>
                    </div>
                    <div class="cart-content_price"><span class="js-totalItem"></span></div>
                </div>

            </div>
        </div>

        <div class="addCart-popup_good-bottom">
            <div class="addCart-popup_good-bottom-text">
                <a href="/personal/order/make/">В корзине <span class="js-totalQuantity"></span> товара</a> на сумму
                <span class="js-totalBasket"></span>

            </div>
            <div class="addCart-popup_good-bottom-btn-wrap">
                <a class="add-cart_btn add-cart_btn--blue" onclick="$.fancybox.close();" href="javascript:void(0);">Добавить
                    другие товары</a>
                <a class="add-cart_btn add-cart_btn--red" href="/personal/order/make/">Оформить заказ</a>
            </div>
        </div>

    </div>

    <div class="addCart-popup_slider">
        <div class="addCart-popup_slider-head">С этим товаром дополнительно покупают</div>
        <? $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "popular_slider_popup",
            array(
                "IBLOCK_TYPE" => "CRM_PRODUCT_CATALOG",
                "IBLOCK_ID" => "26",
                "SECTION_ID" => "",
                "SECTION_CODE" => "",
                "ELEMENT_SORT_FIELD" => "shows",
                "ELEMENT_SORT_ORDER" => "desc",
                "ELEMENT_SORT_FIELD2" => "sort",
                "ELEMENT_SORT_ORDER2" => "asc",
                "PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
                "PROPERTY_CODE_MOBILE" => array(),
                "INCLUDE_SUBSECTIONS" => "Y",
                "BASKET_URL" => "/personal/order/make/",
                "ACTION_VARIABLE" => "",
                "PRODUCT_ID_VARIABLE" => "",
                "SECTION_ID_VARIABLE" => "",
                "PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
                "PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "N",
                "DISPLAY_COMPARE" => "N",
                "PRICE_CODE" => array(
                    0 => "Розница распродажа",
                    1 => "Розница",
                ),
                "USE_PRICE_COUNT" => "N",
                "SHOW_PRICE_COUNT" => "1",
                "PAGE_ELEMENT_COUNT" => "4",
                "FILTER_IDS" => array(),
                "SET_TITLE" => "N",
                "SET_BROWSER_TITLE" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_LAST_MODIFIED" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "PRICE_VAT_INCLUDE" => "N",
                "USE_PRODUCT_QUANTITY" => "N",
                "ADD_PROPERTIES_TO_BASKET" => "N",
                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                "PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),
                "OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
                "OFFERS_FIELD_CODE" => array(
                    0 => "",
                    1 => "",
                ),
                "OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
                "OFFERS_SORT_FIELD" => "",
                "OFFERS_SORT_ORDER" => "",
                "OFFERS_SORT_FIELD2" => "",
                "OFFERS_SORT_ORDER2" => "",
                "OFFERS_LIMIT" => "10",
                "SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
                "DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
                "USE_MAIN_ELEMENT_SECTION" => "N",
                "CONVERT_CURRENCY" => "N",
                "CURRENCY_ID" => $arParams["CURRENCY_ID"],
                "HIDE_NOT_AVAILABLE" => "Y",
                "HIDE_NOT_AVAILABLE_OFFERS" => "Y",
                "LABEL_PROP" => array(),
                "LABEL_PROP_MOBILE" => "",
                "LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
                "ADD_PICT_PROP" => "-",
                "PRODUCT_DISPLAY_MODE" => "N",
                "PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
                "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false}]",
                "ENLARGE_PRODUCT" => "STRICT",
                "ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"]) ? $arParams["LIST_ENLARGE_PROP"] : "",
                "SHOW_SLIDER" => "N",
                "SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"]) ? $arParams["LIST_SLIDER_INTERVAL"] : "",
                "SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"]) ? $arParams["LIST_SLIDER_PROGRESS"] : "",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "HIDE_SECTION_DESCRIPTION" => "Y",
                "RCM_TYPE" => "personal",
                "RCM_PROD_ID" => "",
                "SHOW_FROM_SECTION" => "N",
                "OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
                "OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"]) ? $arParams["OFFER_TREE_PROPS"] : []),
                "PRODUCT_SUBSCRIPTION" => "N",
                "SHOW_DISCOUNT_PERCENT" => "N",
                "DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
                "SHOW_OLD_PRICE" => "N",
                "SHOW_MAX_QUANTITY" => "N",
                "MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"]) ? $arParams["~MESS_SHOW_MAX_QUANTITY"] : ""),
                "RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"]) ? $arParams["RELATIVE_QUANTITY_FACTOR"] : ""),
                "MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"]) ? $arParams["~MESS_RELATIVE_QUANTITY_MANY"] : ""),
                "MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"]) ? $arParams["~MESS_RELATIVE_QUANTITY_FEW"] : ""),
                "MESS_BTN_BUY" => "Купить",
                "MESS_BTN_ADD_TO_BASKET" => "Купить",
                "MESS_BTN_SUBSCRIBE" => "Уведомить о поступлении",
                "MESS_BTN_DETAIL" => "Подробнее",
                "MESS_NOT_AVAILABLE" => "товар отсутствует",
                "MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"]) ? $arParams["~MESS_BTN_COMPARE"] : ""),
                "USE_ENHANCED_ECOMMERCE" => "N",
                "DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"]) ? $arParams["DATA_LAYER_NAME"] : ""),
                "BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"]) ? $arParams["BRAND_PROPERTY"] : ""),
                "TEMPLATE_THEME" => "blue",
                "ADD_TO_BASKET_ACTION" => "ADD",
                "SHOW_CLOSE_POPUP" => "N",
                "COMPARE_PATH" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["compare"],
                "COMPARE_NAME" => $arParams["COMPARE_NAME"],
                "BACKGROUND_IMAGE" => "",
                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                "COMPONENT_TEMPLATE" => "popular_slider_popup",
                "SECTION_USER_FIELDS" => array(
                    0 => "",
                    1 => "",
                ),
                "FILTER_NAME" => "arrFilter",
                "SHOW_ALL_WO_SECTION" => "Y",
                "CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
                "LINE_ELEMENT_COUNT" => "3",
                "SEF_MODE" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "BROWSER_TITLE" => "-",
                "META_KEYWORDS" => "-",
                "META_DESCRIPTION" => "-",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Товары",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "LAZY_LOAD" => "N",
                "LOAD_ON_SCROLL" => "N",
                "SET_STATUS_404" => "N",
                "SHOW_404" => "N",
                "MESSAGE_404" => "",
                "COMPATIBLE_MODE" => "Y",
                "SEF_RULE" => "",
                "SECTION_CODE_PATH" => ""
            ),
            false
        ); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(30605352, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true,
            ecommerce:"dataLayer"
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/30605352" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-87153023-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-87153023-1');
    </script>
    <!-- /Google Analytics -->

    <script>
        jQuery(document).ready(function() {
            $('[name="form_text_104"], [name="form_text_84"], [name="form_text_88"], [name="form_text_80"], [name="phone"], [name="ORDER_PROP_41"], [name="form_text_76"]').mask('+7 (999) 999-99-99');
            $('[name="CALLBACK_JOBS"] [name="form_text_93"]').mask("99/99/9999");
        });
    </script>

    <script>
        (function(w, d, s, h, id) {
            w.roistatProjectId = id; w.roistatHost = h;
            var p = d.location.protocol == "https:" ? "https://" : "http://";
            var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
            var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
        })(window, document, 'script', 'cloud.roistat.com', '2f47f9b1ba0ed74e83dcfd6a1ad954da');
    </script>
    <!-- Begin Bitrix 24 Widget -->
    <script>
        window.roistatVisitCallback = function (visitId) {
            (function (w, d, u) {
                var s = d.createElement('script');
                s.async = true;
                s.src = u + '?' + (Date.now() / 60000 | 0);
                var h = d.getElementsByTagName('script')[0];
                h.parentNode.insertBefore(s, h);
            })(window, document, 'https://portal.tdobu.ru/upload/crm/site_button/loader_1_7bez0m.js');
            window.Bitrix24WidgetObject = window.Bitrix24WidgetObject || {};
            window.Bitrix24WidgetObject.handlers = {
                'form-init': function (form) {
                    form.presets = {
                        'roistatID': visitId
                    };
                }
            };
        }
    </script>

    <!-- End of Bitrix 24 Widget -->
    <!-- BEGIN BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->
    <script>
        (function (w, d, s, h) {
            w.roistatLanguage = '';
            var p = d.location.protocol == "https:" ? "https://" : "http://";
            var u = "/static/marketplace/Bitrix24Widget/script.js";
            var js = d.createElement(s);
            js.async = 1;
            js.src = p + h + u;
            var js2 = d.getElementsByTagName(s)[0];
            js2.parentNode.insertBefore(js, js2);
        })(window, document, 'script', 'cloud.roistat.com');
    </script>
    <!-- END BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->



    <script> 
        window.addEventListener('onBitrixLiveChat', function(event)
        {
            var widget = event.detail.widget;

            // Цель bitrixchatsend при отправке сообщения чата
            widget.subscribe({
                type: BX.LiveChatWidget.SubscriptionType.userMessage,
                callback: function(data) {
                    ym(30605352,'reachGoal','bitrixchatsend');
                    console.log('bitrixchatsend');
                }
            });
        });
    </script>


</body>
</html>