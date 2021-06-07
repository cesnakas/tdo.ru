<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>


<div class="workers_gal"><?
	$i = 0;
	//		$rowOld     = $row = 0;
	//		$rowItemOld = $rowItem = 0;

	$newRow       = [1, 11];
	$bigImg       = [1, 8, 17];
	$newRowItem   = [1, 4, 8, 11, 17];
	$newCollItem  = [2, 4, 6, 9, 11, 13, 15, 18, 20, 22];
	$collWrapOpen = 0;

	foreach ($arResult["ITEMS"] as $arItem) {
		$i ++;
		$imageCssClass = '';

		//new row
		if(in_array($i, $newRow)) {
			?>
            <div class="workers_gal_row"><?
		}

		//big image
		if(in_array($i, $bigImg)) {
			$imageCssClass = 'workers_gal-item-768-h';
		}

		//new row item
	if(in_array($i, $newRowItem)) {
		?>
        <div class="workers_gal_row-item"><?
	}

		//add coll wrap
	if(in_array($i, $newCollItem)) {
		?>
        <div class="workers_gal-row-col"><?
		$collWrapOpen = 1;
	}
		$image = [
			'DETAIL_PICTURE' => $arItem["DETAIL_PICTURE"]["SRC"],
			'DETAIL_PICTURE' => $arItem["DETAIL_PICTURE"]["SRC"],
		];


		?>
    <div href="<?=$image['DETAIL_PICTURE']?>" data-fancybox style="background-image: url('<?=$image['DETAIL_PICTURE']?>')"
         class="workers_gal-item <?=$imageCssClass?>"
         id="<?=$this->GetEditAreaId($arItem['ID']);?>"
    >
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
		                       array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>

        </div><?


		//need close
		$iNext = $i + 1;
	if($collWrapOpen && in_array($iNext, $newCollItem)) {
		?></div><?
		$collWrapOpen = 0;
	}
	if(in_array($iNext, $newRowItem)) {
		?></div><?
	}
		if(in_array($iNext, $newRow)) {
			?></div><?
		}

	}


	?>


</div>
</div>
</div>
</div>


