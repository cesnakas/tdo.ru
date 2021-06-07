<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
?>

<?=$arResult["FORM_NOTE"]?>

<? if($arResult["isFormNote"] != "Y") {
	?>
	<?=$arResult["FORM_HEADER"]?>


	<?=$arResult["FORM_DESCRIPTION"]?>

	<?
	/***********************************************************************************
	 * form questions
	 ***********************************************************************************/

	$agree = '';
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) {
		if($FIELD_SID == 'agree') {
			$agree   = $arQuestion["HTML_CODE"];
			$agreeId = $arQuestion['STRUCTURE'][0]['ID'];

			$agree = str_replace('<label for=', '<label class="checkbox-custom" for="' . $agreeId . '"></label><label for=', $agree);

			continue;
		}

		if($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden') {
			echo $arQuestion["HTML_CODE"];
		} else {
			?>
			<? if(is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])): ?>
                <span class="error-fld" title=" <?=htmlspecialcharsbx($arResult["FORM_ERRORS"][ $FIELD_SID ])?>"></span>
			<? endif; ?>
			<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />" . $arQuestion["IMAGE"]["HTML_CODE"] : ""?>
			<?=$arQuestion["HTML_CODE"]?>
			<?
		}
	} //endwhile
	?>

    <input class="btn big-btn btn-white"
		<?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?>
           type="submit" name="web_form_submit"
           value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />

    <div class="polit-conf">
		<?=$agree?>
    </div>

	<?=$arResult["FORM_FOOTER"]?>
	<?
} //endif (isFormNote)
?>