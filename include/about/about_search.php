<div>
	<? $APPLICATION->IncludeComponent(
		"bitrix:catalog.filter",
		"jobs",
		array(
			"CACHE_GROUPS"       => "Y",
			"CACHE_TIME"         => "36000000",
			"CACHE_TYPE"         => "A",
			"FIELD_CODE"         => array(
				0 => "NAME",
				1 => "",
			),
			"FILTER_NAME"        => "arrFilter",
			"IBLOCK_ID"          => "7",
			"IBLOCK_TYPE"        => "services",
			"LIST_HEIGHT"        => "5",
			"NUMBER_WIDTH"       => "5",
			"PAGER_PARAMS_NAME"  => "arrPager",
			"PREFILTER_NAME"     => "preFilter",
			"PRICE_CODE"         => array(),
			"PROPERTY_CODE"      => array(
				0 => "",
				1 => "",
			),
			"SAVE_IN_SESSION"    => "N",
			"TEXT_WIDTH"         => "20",
			"COMPONENT_TEMPLATE" => "jobs",
		),
		false
	); ?>
</div>

<? $APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath("/include/about/open_popup_btn.php"),
	array(),
	array('MODE' => 'html')
);?>

<? $APPLICATION->IncludeFile(
	$APPLICATION->GetTemplatePath("/include/about/about_job_popup_form.php"),
	array(),
	array('MODE' => 'html')
);?>

