<? if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}
/**
 * @global array  $arParams
 * @global CUser  $USER
 * @global CMain  $APPLICATION
 * @global string $cartId
 */
$compositeStub = (isset($arResult['COMPOSITE_STUB']) && $arResult['COMPOSITE_STUB'] == 'Y');
?>
	<div class="header-bottom_right__box-wrap">
		<? if(!$compositeStub && $arParams['SHOW_AUTHOR'] == 'Y'): ?>
			<? if($USER->IsAuthorized())
		{

			$name = trim($USER->GetFullName());
			if(!$name)
			{
				$name = trim($USER->GetLogin());
			}
			if(strlen($name) > 15)
			{
				$name = substr($name, 0, 12) . '...';
			}

			$pathToAuthorize = $arParams['PATH_TO_PROFILE'];
			$loginBtnTitle   = htmlspecialcharsbx($name);

		}
		else
		{
			$arParamsToDelete = array(
				"login",
				"login_form",
				"logout",
				"register",
				"forgot_password",
				"change_password",
				"confirm_registration",
				"confirm_code",
				"confirm_user_id",
				"logout_butt",
				"auth_service_id",
				"clear_cache",
				"backurl",
			);

			$currentUrl = urlencode($APPLICATION->GetCurPageParam("", $arParamsToDelete));
		if($arParams['AJAX'] == 'N')
		{
			?>
			<script type="text/javascript"><?=$cartId?>.currentUrl = '<?=$currentUrl?>';</script><?
		}
		else
		{
			$currentUrl = '#CURRENT_URL#';
		}

		$pathToAuthorize = $arParams['PATH_TO_AUTHORIZE'];
		$pathToAuthorize .= (stripos($pathToAuthorize, '?') === false ? '?' : '&');
		$pathToAuthorize .= 'login=yes&backurl=' . $currentUrl;

		$loginBtnTitle = 'Войти';

		if($arParams['SHOW_REGISTRATION'] === 'Y')
		{
		$pathToRegister = $arParams['PATH_TO_REGISTER'];
		$pathToRegister .= (stripos($pathToRegister, '?') === false ? '?' : '&');
		$pathToRegister .= 'register=yes&backurl=' . $currentUrl;
		?>
			<a href="<?=$pathToRegister?>">
				<?=GetMessage('TSB1_REGISTER')?>
			</a>
		<?
		}
		?>
		<? } ?>


		<?
		if($USER->IsAuthorized())
		{
		$rsUsers = CUser::GetByID($_SESSION['SESS_AUTH']['USER_ID']);
		$arUser  = $rsUsers->Fetch();


		$imageSrc = $this->GetFolder() . '/images/line-empty.png';

		if(!empty($arUser["PERSONAL_PHOTO"]))
		{
			$PERSONAL_PHOTO = $arUser["PERSONAL_PHOTO"];
			$image          = CIntranetUtils::InitImage($PERSONAL_PHOTO, 65);
			$imageSrc       = $image['CACHE']['src'];
		}


		?>
			<div class="header-bottom_right__box header-bottom_right__box-login">
				<a href="javascript:void(0);"
				   class="header-bottom_right__box__link">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/header/person.svg" alt="">
					<span class="header-bottom_right__box-span"><?=$loginBtnTitle?></span>
				</a>
			</div>

			<div class="widget widget-personal-auth js-widget-personal-auth">
				<div class="w-wrap">
					<div class="head">
						<div class="user-block-img" style="background-image: url(<?=$imageSrc?>);"></div>
						<div class="right-wrap">
							<div class="name"><?=$arUser['NAME']?></div>
							<div class="email"><?=$arUser['LOGIN']?></div>
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
			<?
		}
		else
		{
			?>
			<div class="header-bottom_right__box header-bottom_right__box-login">
				<a href="<?=$pathToAuthorize?>" data-fancybox data-src="#modal-login"
				   class="header-bottom_right__box__link">
					<img src="<?=SITE_TEMPLATE_PATH?>/img/icons/header/person.svg" alt="">
					<span class="header-bottom_right__box-span"><?=$loginBtnTitle?></span>
				</a>
			</div>
			<?
		}
			?>


		<? endif ?>

		<div class="burger burger-white"></div>
	</div>
<?
