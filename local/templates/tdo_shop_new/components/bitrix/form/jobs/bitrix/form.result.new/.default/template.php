<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
?>

    <div class="job-popup_head-20 js-form-job-title"></div>

<?
/*
 <div class="job-popup_head-18">Москва</div>
 */
?>


<?=$arResult["FORM_NOTE"]?>

<? if($arResult["isFormNote"] != "Y") {
	?>
	<?=$arResult["FORM_HEADER"]?>


	<?=$arResult["FORM_DESCRIPTION"]?>

	<?
	/***********************************************************************************
	 * form qjQuery(document).on('mousemove', '.fancybox-can-pan', function (e) {
	e.preventDefault();
	// положение элемента
	var pos = jQuery(this).offset();
	var elem_left = pos.left;
	var elem_top = pos.top;
	// положение курсора внутри элемента
	var Xinner = e.pageX - elem_left;
	var Yinner = e.pageY - elem_top;
	console.log("X: " + Xinner + " Y: " + Yinner); // вывод результата в консоль
	});uestions
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
		} elseif($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'radio') {
//			echo $arQuestion["HTML_CODE"];
//			/*
			?>
            <div class="job-input_wrap"><?
			?>
            <div class="job-input_radio-head"><?=$arQuestion['CAPTION']?>:</div>
            <div class="job-input_radio-wrap"><?
			foreach ($arQuestion['STRUCTURE'] as $item) {
				?>

                <label for="<?=$item['ID']?>" class="job-input_radio-input">
                    <input type="radio" <?=$item['FIELD_PARAM']?> id="<?=$item['ID']?>" name="form_radio_<?=$FIELD_SID?>" value="<?=$item['ID']?>">
                    <label for="<?=$item['ID']?>" class="job_contry-radio">
                        <div class="job_contry-radio-inner"></div>
                    </label>
                    <label for="<?=$item['ID']?>" class="radio_contry-text"><?=$item['MESSAGE']?></label>
                </label>
				<?
			}
			?></div><?
			?></div><?
            //*/
		} else {
			?>
            <div class="job-input_wrap"><?
			?>
			<? if(is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])): ?>
                <span class="error-fld" title=" <?=htmlspecialcharsbx($arResult["FORM_ERRORS"][ $FIELD_SID ])?>"></span>
			<? endif; ?>
			<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />" . $arQuestion["IMAGE"]["HTML_CODE"] : ""?>
			<?=$arQuestion["HTML_CODE"]?>
			<?
			?></div><?
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