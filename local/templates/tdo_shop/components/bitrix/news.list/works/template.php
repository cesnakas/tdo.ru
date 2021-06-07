<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<div class="our-work-catalog">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $k => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="our-work-catalog-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		
		<?if($arItem['IMAGES'][0]){?>
			<a data-id="1" href="<?=$arItem['IMAGES'][0]['BIG']?>" class="our-work-card our-work-fancy" rel="our-work<?=$k?>">
				<img class="our-work-card__img" src="<?=$arItem['IMAGES'][0]['SMALL']['src']?>" alt="<?=$arItem['NAME']?>"/>
				<span class="our-work-card__name">Для компании "<?=$arItem['NAME']?>"</span>
			</a>
			<figcaption>
				<?=$arItem['IMAGES'][0]['DESCR']?>

				<div class="our-work-buttons">
					<a href="#" class="red-butt" data-fancybox data-src="#call-me">Хочу так же</a>
					<a data-id="1" href="<?=$arItem['IMAGES'][0]['BIG']?>" class="our-work-fancy white-butt" rel="our-work<?=$k?>">Подробнее</a>
				</div>
		   </figcaption>
			<?
			unset($arItem['IMAGES'][0]);
		}?>
		

		<div class="our-work-detail-photo">
			<?foreach($arItem['IMAGES'] as $key => $img){?>
				<div class="our-work-detail-photo__item">
					<a data-id="<?=$key+1?>" href="<?=$img['BIG']?>" class="our-work-fancy" rel="our-work<?=$k?>">
						<img class="our-work-card__img" src="<?=$img['SMALL']['src']?>" alt=""/>
					</a>
					<figcaption>
						<?=$img['DESCR']?>
				   </figcaption>
				</div>
			<?}?>
		</div>


	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
