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
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
$this->addExternalCss($this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css');
?>

<?
$letters = [];
foreach ($arResult["ITEMS"] as $arItem) {
	$fLetter               = mb_substr(trim($arItem["NAME"]), 0, 1, 'UTF-8');
	$fLetter               = mb_strtoupper($fLetter);
	$letters[ $fLetter ][] = $arItem;
}

ksort($letters);

?>

    <div class="brands">
        <div class="container">
            <div class="text-small-h brands-text-small-h text-small-h-mob-hid">
                Наши бренды
                <span class="count_brands"><?=count($arResult["ITEMS"])?></span>
            </div>

            <div class="brands_list">
                <div class="brands_list-left">
                    Бренды на букву
                </div>
                <div class="brands_list-right">
					<?
					foreach ($letters as $fLetter => $brands) {
						?>
                        <div class="brands_list-item-wrap">
                            <a href="#<?=$fLetter?>" class="brands_list-item"><?=$fLetter?></a>
                            <div class="brands_list-item_dropdown">
                                <div class="brands_list-item_dropdown-inner">
                                    <div class="brands-dropdown_head">Страницы брендов</div>
                                    <div class="brands-dropdown-content">
										<?
										foreach ($brands as $brand) {
											?><a class="brands-dropdown_link" href="<?=$brand["DETAIL_PAGE_URL"]?>"><?=$brand['NAME']?></a><?
										}
										?>

                                    </div>
                                </div>
                            </div>
                        </div>
						<?
					}
					?>
                </div>
            </div>

			<?
			foreach ($letters as $fLetter => $brands) {
				?>
                <a name="<?=$fLetter?>" class="anchor_top"></a>
                <div class="brands-section">
                    <div class="brands-section-top">
                        <div class="brands-section_big-letter"><?=$fLetter?></div>
                        <a class="brands-section_top-link" href="#<?=$fLetter?>">Все бренды на <?=$fLetter?></a>
                    </div>

                    <div class="brands-section_content">
						<?
						foreach ($brands as $brand) {
							?>
                            <div class="brands-section_item">
                                <a class="brands-section_link" href="<?=$brand["DETAIL_PAGE_URL"]?>"><?=$brand['NAME']?></a>
                            </div>
							<?
						}
						?>
                    </div>
                </div>
				<?
			}
			?>
        </div>
    </div>
    <style>
        .anchor_top {
            position: relative;
            top: -150px;
        }
    </style>