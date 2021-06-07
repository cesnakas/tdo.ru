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
	<div class="main-screen__cat">
		<?
		$i = 0;
		foreach ($arResult['SECTIONS'] as &$arSection)
		{
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete,
			                       $arSectionDeleteParams);


			$caticon1 = $this->GetFolder() . '/images/caticon/' . $arSection['CODE'] . '.png';
			$caticon2 = $this->GetFolder() . '/images/caticon/' . $arSection['CODE'] . 'h.png';

			?>
			<a class="main-screen__cat-item"
			   href="<?=$arSection['SECTION_PAGE_URL']?>?CATSHOW=Y"
			   id="<? echo $this->GetEditAreaId($arSection['ID']); ?>"
			   title="<? echo $arSection['PICTURE']['TITLE']; ?>"
			>
				<div class="main-screen__cat-item__left">
					<div style="background-image: url('<?=$caticon1?>')"
					     class="main-screen__cat-item-img"></div>
					<div style="background-image: url('<?=$caticon2?>')"
					     class="main-screen__cat-item-img-h"></div>
				</div>
				<div class="main-screen__cat-item-text"><?=$arSection['NAME']?></div>
			</a>

			<?
			$i++;
//			if($i > 6)
//			{
//				break;
//			}
		} ?>

		<a class="main-screen__cat-item" href="/catalogsale/" title="">
			<div class="main-screen__cat-item__left">
				<div style="background-image: url('/local/templates/tdo_shop/components/bitrix/catalog.section.list/catalogListOnHomeTop/images/caticon/vynosnoy_kholod.png')" class="main-screen__cat-item-img"></div>
				<div style="background-image: url('/local/templates/tdo_shop/components/bitrix/catalog.section.list/catalogListOnHomeTop/images/caticon/vynosnoy_kholodh.png')" class="main-screen__cat-item-img-h"></div>
			</div>
			<div class="main-screen__cat-item-text">Распродажа</div>
		</a>
	</div>
<?
