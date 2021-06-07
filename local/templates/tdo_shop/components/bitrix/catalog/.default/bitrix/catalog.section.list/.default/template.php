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

$mainCats  = [];
$childCats = [];
$mainCatId = 0;
foreach ($arResult['SECTIONS'] as &$arSection)
{
	switch ($arSection['RELATIVE_DEPTH_LEVEL'])
	{
		case 1:
			$mainCats[] = $arSection;
			$mainCatId  = $arSection['ID'];
			break;
		default:
			$childCats[ $mainCatId ][] = $arSection;
			break;
	}
}

$request   = \Bitrix\Main\Context::getCurrent()->getRequest();
$arrFilter = $request->get('filter');


$intCurrentDepth = 1;
foreach ($mainCats as &$arSection)
{
	if($arrFilter == 'forshop')
	{
		$arInclude = [333, 318, 347];//Для магазинов: Торговое, нейтральное и холодильное оборудование
		if(!in_array($arSection['ID'], $arInclude))
		{
			continue;
		}
	}

	if($arrFilter == 'forkafe')
	{
		$arExclude = [333];//Для кафе - все, кроме торгового
		if(in_array($arSection['ID'], $arExclude))
		{
			continue;
		}
	}


	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

	$mainCatId = $arSection['ID'];

	$imageSrc = $this->GetFolder() . '/images/line-empty.png';
	if(!empty($arSection["PICTURE"]["SRC"]))
	{
		$image    = CIntranetUtils::InitImage($arSection["PICTURE"]["ID"], 190, 176);
		$imageSrc = $image['CACHE']['src'];
	}

	?>

	<div class="catalog-item" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
		<div style="background-image: url(<?=$imageSrc?>)" class="catalog-item_image"></div>
		<div class="catalog-item_content">
			<div class="catalog-item_top">

				<h3 class="catalog-item_head"><?=$arSection["NAME"]?></h3>
				<div class="catalog-item_stikers"><?
					global $sectionHaveSale;
					if($sectionHaveSale[ $arSection['ID'] ])
					{
						?><a class="catalog-item_stiker sale-stick"
						     href="<?=$arSection["SECTION_PAGE_URL"]?>?action=sale"></a><?
					}
					?>

					<a class="catalog-item_stiker new-stick"
					   href="<?=$arSection["SECTION_PAGE_URL"]?>?method=desc&sort=DATE_CREATE"></a>
				</div>
			</div>
			<div class="catalog-item_link-wrap">
				<?
				foreach ($childCats[ $mainCatId ] as $subCats)
				{
					?>
					<div class="catalog-item_link-container">
					<a class="catalog-item_link" href="<?=$subCats["SECTION_PAGE_URL"]?>"><?=$subCats["NAME"]?></a>
					</div><?
				}
				?>
			</div>
			<div class="catalog-item_show-more">
				<a class="catalog-item_show-more_link"
				   href="<?=$arSection["SECTION_PAGE_URL"]?>?CATSHOW=Y">Подробнее</a>
			</div>
		</div>
	</div>
	<?
} ?>

