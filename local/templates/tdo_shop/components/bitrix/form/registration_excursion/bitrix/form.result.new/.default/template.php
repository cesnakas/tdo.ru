<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}
?>
<?
if ($arResult["FORM_NOTE"]) {
    ?>
	<div class="big-form_big-head">
		<?=$arResult["FORM_NOTE"]?>
	</div><?
}
?>

<? if($arResult["isFormNote"] != "Y")
{
	?>
	<?=$arResult["FORM_HEADER"]?>


	<?=$arResult["FORM_DESCRIPTION"]?>
	<div class="big-form-input-row">
		<?
		/***********************************************************************************
		 * form questions
		 ***********************************************************************************/

		$agree = '';
		foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
		{
			if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
			{
				echo $arQuestion["HTML_CODE"];
			}
			else
			{
				?>
				<?
				$errorMessage = '';
				$errorCss     = '';
				if(is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS']))
				{
//				$errorMessage = '<span class="error-mess">' . htmlspecialcharsbx($arResult["FORM_ERRORS"][ $FIELD_SID ]) . '</span>';
					$errorCss = 'error';
					?>
				<? } ?>
				<div class="wrap-input <?=$errorCss?>">
					<?=$errorMessage?>
					<span class="placeholder"><?=htmlspecialcharsbx($arQuestion["CAPTION"])?></span>
					<?=$arQuestion["HTML_CODE"]?>
				</div>
				<?
			}
		} //endwhile
		?>
	</div>

	<div class="big-form-checkbox js-reg-excursion-agree-wrap">
		<input class="big-form-checkbox-hidden" id="big-form-checkbox" type="checkbox">
		<label class="big-form__custom-checkbox" for="big-form-checkbox"></label>
		<label class="big-form-checkbox-label" for="big-form-checkbox">Нажимая на кнопку, вы даете согласие на обработку
			своих персональных данных</label>

	</div>

	<button class="btn-opacity"
		<?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?>
		    type="submit" name="web_form_submit"
		    value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>">
		Отправить
	</button>

	<?=$arResult["FORM_FOOTER"]?>
	<?
} //endif (isFormNote)
?>