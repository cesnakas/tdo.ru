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
			<a href="javascript:;" class="our-work-card our-work-fancy" data-fancybox="our-work" data-src="#modal_f<?=$k?>">
				<img class="our-work-card__img" src="<?=$arItem['IMAGES'][0]['SMALL']['src']?>" alt="<?=$arItem['NAME']?>"/>
				<span class="our-work-card__name">Для компании "<?=$arItem['NAME']?>"</span>
			</a>
			<figcaption>
				<div class="our-work-card__text"><?=$arItem['IMAGES'][0]['DESCR']?></div>
				<div class="our-work-buttons">
					<a href="#" class="red-butt want-same-btn" data-title="Заказать индивидуальное решение" data-fancybox data-src="#call-me">Хочу так же</a>
					<a href="javascript:;" data-src="#modal_f<?=$k?>" class="our-work-fancy white-butt" data-fancybox="our-work1">Подробнее</a>
				</div>
		   </figcaption>

		   <div id="modal_f<?=$k?>" class="modal-our-work">
		   		<div class="modal-our-work__title">Для компании "<?=$arItem['NAME']?>"</div>
		   		<div class="modal-our-work__inner">
		   			<div class="modal-our-work__content"><?=$arItem['IMAGES'][0]['DESCR']?>
		   			<div class="our-work-buttons">
		   				<a href="#" class="red-butt want-same-btn" data-title="Заказать индивидуальное решение" data-fancybox data-src="#call-me">Хочу так же</a>
		   			</div>
		   			</div>
		   			<div class="modal-our-work__gallery">
		   				<div class="swiper-container sliderworkMain sliderworkMain-js">
			      			<?foreach($arItem['IMAGES'] as $key => $img){?>
								<div class="slide">
									<div class="swiper-slide__img"><img src="<?=$img['SMALL']['src']?>" alt=""/></div>
								</div>
							<?}?>
						</div>
						<div class="swiper-container sliderworkThumbs sliderworkThumbs-js">
							<?foreach($arItem['IMAGES'] as $key => $img){?>
								<div class="slide">
									<div class="swiper-slide__img"><img src="<?=$img['SMALL']['src']?>" alt=""/></div>
								</div>
							<?}?>
						</div>
		   			</div>
		   		</div>
			   	
			</div>

			<?
			unset($arItem['IMAGES'][0]);
		}?>
		

		

		<!--div class="our-work-detail-photo">
			<?=$arItem['IMAGES'][0]['BIG']?><?=$k?>data-id="1"
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
		</div-->


	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
