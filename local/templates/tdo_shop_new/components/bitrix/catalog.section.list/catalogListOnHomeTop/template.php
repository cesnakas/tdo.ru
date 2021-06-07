<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>
<div class="container mb-1">
    <h4 class="index-h4-title">Оборудование по типам предприятий</h4>
    <div class="row">
        <?
        $i = 0;
        foreach ($arResult['SECTIONS'] as $key => &$arSection) {
            $a=$key+1;
            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete,
                $arSectionDeleteParams);


            $caticon1 = '/local/templates/tdo_shop_new/new_design/img/svg/sv' . $a . '-' . $a . '.svg';
            $caticon2= '/local/templates/tdo_shop_new/new_design/img/svg/sv' . $a . '.svg';

            ?>

            <div class="col-12 col-sm-6 col-md-3 mb-2 mb-md-4" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                <div class="index-types-item"
                     onmouseover="this.querySelector('img').src ='<?=$caticon1?>';"
                     onmouseout="this.querySelector('img').src ='<?=$caticon2?>';">
                    <a href=" <?=$arSection["SECTION_PAGE_URL"]?>?CATSHOW=Y">
                        <div class="index-types-item-content">
                            <div class="index-types-item-img">
                                <img width="50px" src="<?=$caticon2?>">
                            </div>
                            <div class="index-types-item-label">
                               <?=$arSection["NAME"]?>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <?
            $i++;
//			if($i > 6)
//			{
//				break;
//			}
        } ?>


            <div class="col-12 col-sm-6 col-md-3 mb-2 mb-md-4">
                <div class="index-types-item last-types-item" onmouseover="this.querySelector('img').src ='/local/templates/tdo_shop_new/new_design/img/flame.png';" onmouseout="this.querySelector('img').src ='/local/templates/tdo_shop_new/new_design/img/flame_red.png';">
                    <a href="/catalogsale/">
                        <div class="index-types-item-content">
                            <div class="index-types-item-img">
                                <img width="50px" src="/local/templates/tdo_shop_new/new_design/img/flame_red.png">
                            </div>
                            <div class="index-types-item-label">
                               Распродажа
                            </div>
                        </div>
                    </a>
                </div>
            </div>



    </div>
</div>
