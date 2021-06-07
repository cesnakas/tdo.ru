<style>
.bonus-list__image{-webkit-box-flex:0;-ms-flex:0 0 82px;flex:0 0 82px;margin-right:20px}
.bordered-link{padding:12px 30px;border:1px solid #f1f1f1;color:#3d3d3d;text-align:center;display:inline-block;vertical-align:middle;-webkit-transition:all .3s;transition:all .3s}
.bordered-link:hover{color:#d7202a;border:1px solid #d7202a}
.brands-slider .swiper-container{padding:0 35px}
.brands-slider__item{display:block;height:50px;font-size:0;text-align:center}
.brands-slider__item:after{content:"";width:0;height:100%}
.brands-slider__item:after,.brands-slider__item img{display:inline-block;vertical-align:middle}
.brands-detail .page-heading{padding-right:115px}
.brands-detail .ph-service-block__icon{margin-right:0;margin-left:7px;border:1px solid #e8e8e8;font-size:30px;padding:6px;color:#5c5757}
.brands-detail .ph-service-block__content{color:#aeaeae}
.brands-detail .brands-logo{float:right;margin-left:40px;margin-bottom:40px;min-width:200px}
@media (max-width:480px){
.brands-detail .brands-logo{float:none;margin-left:0;margin-bottom:20px}
}
.brands-detail .ph-service-block{cursor:pointer}
.brands-detail__list{margin:20px 0!important}
.brands-detail__include-product{margin-bottom:15px}
.brands-logo{display:block;height:110px;padding:10px;border:2px solid #f1f1f1;font-size:0;text-align:center}
.brands-logo:after{content:"";width:0;height:100%}
.brands-logo:after,.brands-logo img{display:inline-block;vertical-align:middle}
.brands__pointer{margin-bottom:35px;font-size:22px;font-weight:700}
.brands__items-container{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-left:-25px}
@media (max-width:320px){
.brands__items-container{margin-left:0}
}
.brands__item{width:calc(20% - 25px);margin-left:25px;margin-bottom:40px}
@media (max-width:768px){.brands__item{width:calc(33.333% - 25px)}}
@media (max-width:480px){.brands__item{width:calc(50% - 25px)}}
@media (max-width:320px){.brands__item{width:100%;margin-left:0}}
.brands__item-title{margin-top:15px;text-align:center}


</style>
<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
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

<? if ($arResult['ITEMS']): ?>
    <div class="brands">
        <? foreach ($arResult['ALPHABET'] as $letter => $brandXmlIds) : ?>
            <? if (!$brandXmlIds) {
                continue;
            } ?>

            <div class="brands__section">
                <div class="brands__pointer">
                    <?= $letter ?>
                </div>
                <div class="brands__items-container">
                    <? foreach ($brandXmlIds as $brandXmlId): ?>
                        <? $brand = $arResult['ITEMS'][$brandXmlId]; ?>
                        <? if (!$brand) {
                            continue;
                        }
                        ?>
                        <a class="brands__item hover-scale" href="/brands/<?= $brand['CODE'] ?>/">
                            <? if ($brand['PICTURE']): ?>
                                <div class="brands-logo">
                                    <img src="<?= $brand['PICTURE'] ?>" alt="<?= $brand['NAME'] ?>">
                                </div>
                            <? endif; ?>
                            <div class="brands__item-title">
                                <?= $brand['NAME'] ?>
                            </div>
                        </a>
                    <? endforeach; ?>
                </div>
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>
