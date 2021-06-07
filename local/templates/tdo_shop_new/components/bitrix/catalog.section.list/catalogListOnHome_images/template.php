<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
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

$strSectionEdit        = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete      = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
	<div class="cat-wrap"><?
		$i = 0;
		foreach ($arResult['SECTIONS'] as &$arSection)
		{
			if(!$arSection["UF_VYGRUZHAT_NA_SAYT"])
			{
				continue;
			}

			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete,
			                       $arSectionDeleteParams);

			if(false === $arSection['PICTURE'])
			{
				$arSection['PICTURE'] = array(
					'SRC'   => $imageSrc = $this->GetFolder() . '/images/line-empty.png',
					'ALT'   => (
					'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
						? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
						: $arSection["NAME"]
					),
					'TITLE' => (
					'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
						? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
						: $arSection["NAME"]
					),
				);
			}
			?>
			<a href="<?=$arSection['SECTION_PAGE_URL']?>"
			   class="cat-item"
			   title="<? echo $arSection['PICTURE']['TITLE']; ?>"
			   style="background-image:url('<? echo $arSection['PICTURE']['SRC']; ?>');"
			   id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
			>
				<span class="cat-item_head"><?=$arSection['NAME']?></span>
				<div class="cat-item_arrow"></div>
			</a>
			<?
			$i++;
			if($i > 6)
			{
				break;
			}
		} ?>


		<a href="/catalog/" class="cat-item cat-item__more">
			<span class="cat-item__more_head">еще 140 категорий</span>
			<span class="cat-item__more_descrip">и 28 000 товаров</span>
			<span class="cat-item__more-link">Посмотреть все</span>
		</a>

	</div>
<?
