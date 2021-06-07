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
                            <div class="brands__item-title"><?= $brand['NAME'] ?></div>
                        </a>
                    <? endforeach; ?>
                </div>
            </div>
        <? endforeach; ?>
    </div>
<? endif; ?>
