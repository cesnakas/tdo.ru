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
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
$this->addExternalCss($this->GetFolder() . '/themes/' . $arParams['TEMPLATE_THEME'] . '/style.css');
?>

			<? foreach ($arResult["ITEMS"] as $arItem)
			{
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
				                     CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
				                       CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
				                       array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

                $ACTIVE_FROM = $arItem["ACTIVE_FROM"];
                $now         = new DateTime($ACTIVE_FROM);
                $ACTIVE_FROM = $now->format('d.m.Y');

				?>
                <div class="col-12 col-md-6">
                    <div class="index-blog-col">
                        <div class="blog-col-img">
                            <img class="img-fluid" src="<?=$arItem["PREVIEW_PICTURE"]['SRC']?>">
                        </div>
                        <div class="blog-col-img-mask"></div>
                        <div class="blog-col-text">
                            <div class="blog-col-title">
                                Блог
                            </div>
                            <div class="blog-col-date">
                                <?=$ACTIVE_FROM?>
                            </div>
                            <div class="blog-col-name">
                                <?=$arItem["NAME"]?>
                            </div>
                            <a class="blog-col-btn" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                                Читать статью
                            </a>
                        </div>
                    </div>
                </div>
			<? } ?>





