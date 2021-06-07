<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle("Наши работы");
?>

<div class="container">

<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumb", array(
	"PATH"       => "",
	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID"    => "s2",
	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
	"START_FROM" => "0",
	// Номер пункта, начиная с которого будет построена навигационная цепочка
),
false
); ?>



<h1 class="header_grey">Наши работы</h1>

<ul>
	<li>
		<a href="/catalog/our-work/vynosnoy_kholod/">Индивидуальные решения выносной холод</a>
	</li>
</ul>

</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>