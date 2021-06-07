<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

use Bitrix\Main\Localization\Loc;

?>
<div class="pagination-mob">
    <div class="container">
        <a class="pagination-mob_link" href="#">Настройки</a>
    </div>
</div>

<div class="text-small-h text-small-h-mob-hid">Настройки</div>
<div class="lk-setting">

    <div class="user-inf">
        <form method="post" name="form1" action="<?=POST_FORM_ACTION_URI?>" enctype="multipart/form-data" role="form" class="user-inf-form">
			<?
			$imageSrc = $this->GetFolder() . '/images/line-empty.png';

			if(!empty($arResult["arUser"]["PERSONAL_PHOTO"])) {
				$PERSONAL_PHOTO = $arResult["arUser"]["PERSONAL_PHOTO"];
				$image          = CIntranetUtils::InitImage($PERSONAL_PHOTO, 65);
				$imageSrc       = $image['CACHE']['src'];
			}
			?>


<style type="text/css">
    .user-block_text [name="PERSONAL_PHOTO"]{
        display: block !important;
    }
    .change-photo{
        font-size: 12px;
        margin: 20px 0;
    }
</style>

            <div class="user-block">
                <div class="user-block-img" style="background-image: url(<?if(isset($imageSrc)){echo $imageSrc;}else{echo "/images/icons/icon-user.png";}?>);"></div>
                <div class="user-block_text">
                    <label class="user-block_link">
						Изменить фотографию                        
                    </label>
                    
                    <div class="change-photo">
                        <?=$arResult["arUser"]["PERSONAL_PHOTO_INPUT"]?>
                    </div>

                    <a class="logout_link" href="/?logout=yes">Выйти</a>
                </div>
            </div>


			<?
			ShowError($arResult["strProfileError"]);

			if($arResult['DATA_SAVED'] == 'Y') {
				ShowNote(Loc::getMessage('PROFILE_DATA_SAVED'));
			}
			//					print_r('<pre>');
			//					print_r('$arResult: ');
			//					print_r($arResult);
			//					print_r('</pre>');


			?>


			<?=$arResult["BX_SESSION_CHECK"]?>
            <input type="hidden" name="lang" value="<?=LANG?>" />
            <input type="hidden" name="ID" value="<?=$arResult["ID"]?>" />
            <input type="hidden" name="LOGIN" value="<?=$arResult["arUser"]["LOGIN"]?>" />
            <div class="main-profile-block-shown" id="user_div_reg">

                <div class="row">
                    <div class="col-12">
						<?
						if(!in_array(LANGUAGE_ID, array('ru', 'ua'))) {
							?>
                            <div class="row">
                                <div class="col align-items-center">
                                    <div class="form-group">
                                        <label class="main-profile-form-label" for="main-profile-title"><?=Loc::getMessage('main_profile_title')?></label>
                                        <input class="form-control" type="text" name="TITLE" maxlength="50" id="main-profile-title"
                                               value="<?=$arResult["arUser"]["TITLE"]?>" />
                                    </div>
                                </div>
                            </div>
							<?
						}
						?>
                        <div class="input-wrap">
                            <label for=""><?=Loc::getMessage('NAME')?></label>
                            <div class="clear-input"></div>

                            <input value="<?=$arResult["arUser"]["NAME"]?>" type="text" class="input" name="NAME" id="main-profile-name">
                        </div>

                        <div class="input-wrap">
                            <label for=""><?=Loc::getMessage('LAST_NAME')?></label>
                            <div class="clear-input"></div>

                            <input value="<?=$arResult["arUser"]["LAST_NAME"]?>" type="text" class="input" name="LAST_NAME" id="main-profile-last-name">
                        </div>

                        <div class="input-wrap">
                            <label for=""><?=Loc::getMessage('SECOND_NAME')?></label>
                            <div class="clear-input"></div>

                            <input value="<?=$arResult["arUser"]["SECOND_NAME"]?>" type="text" class="input" name="SECOND_NAME" id="main-profile-second-name">
                        </div>

                        <div class="input-wrap">
                            <label for=""><?=Loc::getMessage('EMAIL')?></label>
                            <div class="clear-input"></div>

                            <input value="<?=$arResult["arUser"]["EMAIL"]?>" type="text" class="input" name="EMAIL" id="main-profile-email">
                        </div>


						<?

						if($arResult['CAN_EDIT_PASSWORD']) {
							?>
                            <div class="form-group row">
                                <label class="col-sm-4 col-md-3 col-form-label main-profile-form-label"
                                       for="main-profile-password"><?=Loc::getMessage('NEW_PASSWORD_REQ')?></label>
                                <div class="col-sm-8 col-md-9">
                                    <input class=" form-control bx-auth-input main-profile-password" type="password" name="NEW_PASSWORD" maxlength="50"
                                           id="main-profile-password" value="" autocomplete="off" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-md-3 col-form-label main-profile-form-label main-profile-password" for="main-profile-password-confirm">
									<?=Loc::getMessage('NEW_PASSWORD_CONFIRM')?>
                                </label>
                                <div class="col-sm-8 col-md-9">
                                    <input class="form-control" type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" id="main-profile-password-confirm"
                                           autocomplete="off" />
                                    <small id="emailHelp" class="form-text text-muted"><? echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></small>
                                </div>
                            </div>
							<?
						}

						?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <input type="submit" class="btn btn-themes btn-primary btn-md main-profile-submit" name="save"
                           value="<?=(($arResult["ID"] > 0) ? Loc::getMessage("MAIN_SAVE") : Loc::getMessage("MAIN_ADD"))?>">
                    <input type="submit" class="btn btn-themes btn-link btn-md" name="reset" value="<? echo GetMessage("MAIN_RESET") ?>">
                </div>
            </div>

        </form>
        <script>
            BX.Sale.PrivateProfileComponent.init();
        </script>

    </div>
</div>
