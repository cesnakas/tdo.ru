<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
/**
 * @global string                $componentPath
 * @global string                $templateName
 * @var CBitrixComponentTemplate $this
 */
$cartStyle          = 'bx-basket';
$cartId             = "bx_basket" . $this->randString();
$arParams['cartId'] = $cartId;

if($arParams['POSITION_FIXED'] == 'Y')
{
	$cartStyle .= "-fixed {$arParams['POSITION_HORIZONTAL']} {$arParams['POSITION_VERTICAL']}";
	if($arParams['SHOW_PRODUCTS'] == 'Y')
	{
		$cartStyle .= ' bx-closed';
	}
}
else
{
	$cartStyle .= ' bx-opener';
}
?>
<script>
    var <?=$cartId?> = new BitrixSmallCart;
</script>


<div class="card-item">
    <!--svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
                d="M20.4001 20.7998H18.0001V10.7998H20.4001V20.7998ZM15.6001 20.7998H13.2001V7.7998H15.6001V20.7998ZM10.8001 20.7998H8.40014V4.7998H10.8001V20.7998ZM6.00014 20.7998H3.6001V12.7998H6.00014V20.7998Z"
                fill="#555555"/>
    </svg>
    <svg style="margin-left: 10px;" width="24" height="24" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
              d="M12 5.77778C11.6944 5.43008 11.3381 5.12648 10.945 4.87325C10.0764 4.31363 9.02813 4 7.95 4C5.178 4 3 6.11008 3 8.79564C3 9.74987 3.23017 10.656 3.62445 11.5181C4.84734 14.1943 7.64918 16.4527 10.0609 18.3967C10.7553 18.9564 11.4173 19.49 12 20C12.5827 19.49 13.2447 18.9564 13.9391 18.3967C16.3508 16.4527 19.1526 14.1944 20.3755 11.5182C20.7698 10.6561 21 9.74992 21 8.79564C21 6.11008 18.822 4 16.05 4C14.9719 4 13.9236 4.31363 13.055 4.87325C12.6619 5.12648 12.3056 5.43008 12 5.77778ZM12 17.6622C12.2905 17.4244 12.5875 17.1846 12.884 16.9451C13.1351 16.7423 13.3859 16.5398 13.6322 16.339C14.6181 15.535 15.5832 14.7182 16.4378 13.8623C17.4954 12.803 18.2814 11.7834 18.7391 10.7771C19.0409 10.1126 19.2 9.45451 19.2 8.79564C19.2 7.12404 17.8607 5.77778 16.05 5.77778C14.9804 5.77778 13.9823 6.23443 13.3593 6.94321L12 8.48963L10.6407 6.94321C10.0177 6.23443 9.01959 5.77778 7.95 5.77778C6.13928 5.77778 4.8 7.12404 4.8 8.79564C4.8 9.45451 4.95907 10.1126 5.26092 10.7771C5.71862 11.7834 6.50462 12.803 7.56219 13.8623C8.41677 14.7182 9.38185 15.535 10.3678 16.339C10.6141 16.5398 10.8649 16.7423 11.116 16.9451C11.4125 17.1846 11.7095 17.4244 12 17.6622Z"
              fill="#555555"/>
    </svg-->
    <div class="card-se" id="<?=$cartId?>">
        <a style="text-decoration: none" href="/personal/order/make/">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.95"
                  d="M19.1972 3.12222H4.68699V0.777778C4.68699 0.571498 4.60517 0.373667 4.45954 0.227806C4.31391 0.0819442 4.1164 0 3.91044 0H0.782089C0.574666 0 0.375739 0.0825295 0.229068 0.229433C0.0823984 0.376336 0 0.57558 0 0.783333C0 0.991086 0.0823984 1.19033 0.229068 1.33723C0.375739 1.48414 0.574666 1.56667 0.782089 1.56667H3.12281V12.9667C3.12281 13.1729 3.20462 13.3708 3.35025 13.5166C3.49588 13.6625 3.6934 13.7444 3.89935 13.7444H16.8787C17.052 13.7447 17.2204 13.6868 17.3571 13.5801C17.4938 13.4734 17.591 13.324 17.6331 13.1556L19.9738 4.1C20.005 3.98266 20.0084 3.85961 19.9836 3.74073C19.9589 3.62184 19.9067 3.51041 19.8312 3.41537C19.7557 3.32033 19.659 3.24431 19.549 3.1934C19.4389 3.1425 19.3184 3.11812 19.1972 3.12222ZM16.2686 12.2222H4.68699V4.68889H18.1877L16.2686 12.2222ZM5.46353 15.3111C4.99922 15.3045 4.54343 15.4364 4.15415 15.6899C3.76487 15.9435 3.45968 16.3073 3.2774 16.735C3.09513 17.1628 3.044 17.6352 3.13052 18.0922C3.21704 18.5491 3.43731 18.97 3.7633 19.3012C4.08929 19.6324 4.50628 19.859 4.96122 19.9522C5.41616 20.0454 5.88849 20.001 6.31815 19.8245C6.7478 19.6481 7.11535 19.3477 7.37405 18.9615C7.63276 18.5752 7.77092 18.1207 7.77097 17.6556C7.77103 17.0395 7.52899 16.4482 7.09719 16.0095C6.6654 15.5707 6.07854 15.3199 5.46353 15.3111ZM5.46353 18.4333C5.30994 18.4333 5.15981 18.3877 5.0321 18.3023C4.9044 18.2168 4.80487 18.0953 4.7461 17.9532C4.68732 17.8111 4.67194 17.6547 4.70191 17.5038C4.73187 17.3529 4.80583 17.2144 4.91443 17.1056C5.02303 16.9968 5.1614 16.9227 5.31203 16.8927C5.46267 16.8627 5.6188 16.8781 5.7607 16.937C5.90259 16.9958 6.02387 17.0955 6.1092 17.2234C6.19453 17.3513 6.24007 17.5017 6.24007 17.6556C6.24007 17.8618 6.15826 18.0597 6.01263 18.2055C5.867 18.3514 5.66948 18.4333 5.46353 18.4333ZM13.7725 15.3111C13.3096 15.3111 12.857 15.4486 12.4721 15.7062C12.0872 15.9638 11.7871 16.33 11.61 16.7584C11.4328 17.1868 11.3865 17.6582 11.4768 18.1129C11.5671 18.5677 11.79 18.9855 12.1174 19.3133C12.4447 19.6412 12.8618 19.8645 13.3159 19.955C13.7699 20.0454 14.2406 19.999 14.6683 19.8215C15.096 19.6441 15.4616 19.3436 15.7188 18.9581C15.976 18.5725 16.1132 18.1192 16.1132 17.6556C16.1132 17.0338 15.8666 16.4375 15.4277 15.9978C14.9887 15.5581 14.3933 15.3111 13.7725 15.3111ZM13.7725 18.4333C13.6189 18.4333 13.4688 18.3877 13.3411 18.3023C13.2134 18.2168 13.1139 18.0953 13.0551 17.9532C12.9963 17.8111 12.9809 17.6547 13.0109 17.5038C13.0409 17.3529 13.1148 17.2144 13.2234 17.1056C13.332 16.9968 13.4704 16.9227 13.621 16.8927C13.7717 16.8627 13.9278 16.8781 14.0697 16.937C14.2116 16.9958 14.3329 17.0955 14.4182 17.2234C14.5035 17.3513 14.5491 17.5017 14.5491 17.6556C14.5491 17.8618 14.4673 18.0597 14.3216 18.2055C14.176 18.3514 13.9785 18.4333 13.7725 18.4333Z"
                  fill="#a9001c"/>
        </svg>
           
        <span><?=$arResult["NUM_PRODUCTS"]?></span>
        </a>
    </div>
</div>

<script type="text/javascript">
	<?=$cartId?>.siteId = '<?=SITE_ID?>';
	<?=$cartId?>.cartId = '<?=$cartId?>';
	<?=$cartId?>.ajaxPath = '<?=$componentPath?>/ajax.php';
	<?=$cartId?>.templateName = '<?=$templateName?>';
	<?=$cartId?>.arParams = <?=CUtil::PhpToJSObject($arParams)?>; // TODO \Bitrix\Main\Web\Json::encode
	<?=$cartId?>.closeMessage = '<?=GetMessage('TSB1_COLLAPSE')?>';
	<?=$cartId?>.openMessage = '<?=GetMessage('TSB1_EXPAND')?>';
	<?=$cartId?>.activate();
</script>



