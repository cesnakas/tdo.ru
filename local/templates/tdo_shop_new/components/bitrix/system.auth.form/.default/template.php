<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

CJSCore::Init();
?>


<div class="modal-head">Вход или регистрация</div>
<?
if($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
{
	ShowMessage($arResult['ERROR_MESSAGE']);
}

?>

<div class="bx-system-auth-form">

	<? if($arResult["FORM_TYPE"] == "login"): ?>

		<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" class="getPhone"
		      action="<?=$arResult["AUTH_URL"]?>">

			<?
			/*
			<input type="text" class="input" placeholder="Ваш телефон">
			 */
			?>

			<? if($arResult["BACKURL"] <> ''): ?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<? endif ?>
			<? foreach ($arResult["POST"] as $key => $value): ?>
				<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
			<? endforeach ?>
			<input type="hidden" name="AUTH_FORM" value="Y" />
			<input type="hidden" name="TYPE" value="AUTH" />

			<input type="text" class="input" name="USER_LOGIN" maxlength="50" value="" size="17"
			       placeholder="<?=GetMessage("AUTH_LOGIN")?>" />
			<script>
                BX.ready(function () {
                    var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
                    if (loginCookie) {
                        var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
                        var loginInput = form.elements["USER_LOGIN"];
                        loginInput.value = loginCookie;
                    }
                });
			</script>

			<br />
			<br />
			<input type="password" name="USER_PASSWORD" class="input" maxlength="255" size="17" autocomplete="off"
			       placeholder="<?=GetMessage("AUTH_PASSWORD")?>" />

			<br /><br />
			<input type="submit" name="Login" class="btn big-btn btn-red"
			       value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
			<?
			/*
			?>
			<div class="wrap-big-btn">
				<a href="#" class="btn big-btn btn-red">Получить код</a>
			</div>
//*/ ?>
			<br />

			<div class="wrap-link-center">
				<a class="login-mail" href="/personal/">Войти по почте</a>
			</div>
		</form>

		<? if($arResult["AUTH_SERVICES"]): ?>
			<?
			$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
			                               array(
				                               "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
				                               "AUTH_URL"      => $arResult["AUTH_URL"],
				                               "POST"          => $arResult["POST"],
				                               "POPUP"         => "Y",
				                               "SUFFIX"        => "form",
			                               ),
			                               $component,
			                               array("HIDE_ICONS" => "Y")
			);
			?>
		<? endif ?>

	<?
	elseif($arResult["FORM_TYPE"] == "otp"):
		?>

		<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top"
		      action="<?=$arResult["AUTH_URL"]?>">
			<? if($arResult["BACKURL"] <> ''): ?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<? endif ?>
			<input type="hidden" name="AUTH_FORM" value="Y" />
			<input type="hidden" name="TYPE" value="OTP" />
			<table width="95%">
				<tr>
					<td colspan="2">
						<? echo GetMessage("auth_form_comp_otp") ?><br />
						<input type="text" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off" /></td>
				</tr>
				<? if($arResult["CAPTCHA_CODE"]): ?>
					<tr>
						<td colspan="2">
							<? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br />
							<input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>" />
							<img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
							     width="180" height="40" alt="CAPTCHA" /><br /><br />
							<input type="text" name="captcha_word" maxlength="50" value="" /></td>
					</tr>
				<? endif ?>
				<? if($arResult["REMEMBER_OTP"] == "Y"): ?>
					<tr>
						<td valign="top"><input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y" />
						</td>
						<td width="100%"><label for="OTP_REMEMBER_frm"
						                        title="<? echo GetMessage("auth_form_comp_otp_remember_title") ?>"><? echo GetMessage("auth_form_comp_otp_remember") ?></label>
						</td>
					</tr>
				<? endif ?>
				<tr>
					<td colspan="2"><input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<noindex><a href="<?=$arResult["AUTH_LOGIN_URL"]?>"
						            rel="nofollow"><? echo GetMessage("auth_form_comp_auth") ?></a></noindex>
						<br /></td>
				</tr>
			</table>
		</form>

	<?
	else:

/*
		?>

		<form action="<?=$arResult["AUTH_URL"]?>">
			<div class="widget widget-personal-auth js-widget-personal-auth">

				<div class="head">
					<div class="image">
						<img src="#" alt="personal photo">
					</div>
					<div class="right-wrap">
						<div class="name"><?=$arResult['USER_NAME']?></div>
						<div class="email"><?=$arResult['USER_LOGIN']?></div>
					</div>
				</div>
				<dibv class="body">
					<ul>
						<li>
							<a href="<?=$arResult["PROFILE_URL"]?>" class="link-red">
								<i class="icon-box"></i>
								<span class="text">Мои заказы</span>
							</a>
						</li>
						<li>
							<label class="text">
							<i class="icon-exit"></i>

							<? foreach ($arResult["GET"] as $key => $value): ?>
								<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
							<? endforeach ?>
							<input type="hidden" name="logout" value="yes" />
								<input type="submit" name="logout_butt" value="" />
								Выход</label>
						</li>
					</ul>
				</dibv>

			</div>

		</form>
	<?

	*/
	endif ?>
</div>
