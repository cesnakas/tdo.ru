<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult)) {
	return "";
}

$strReturn = '<div class="pagination" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <div class="container">';


	
$itemSize = count($arResult);
for ($index = 0; $index < $itemSize; $index ++) {
	$title = htmlspecialcharsex($arResult[ $index ]["TITLE"]);
	$arrow = ($index > 0 ? '<i class="fa fa-angle-right"></i>' : '');
	
	if($arResult[ $index ]["LINK"] <> "" && $index != $itemSize - 1) {

	
//		$strReturn .= '
//			<a class="bx-breadcrumb-item" id="bx_breadcrumb_' . $index . '" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
//				' . $arrow . '
//				<a href="' . $arResult[ $index ]["LINK"] . '" title="' . $title . '" itemprop="item">
//					<span itemprop="name">' . $title . '</span>
//				</a>
//				<meta itemprop="position" content="' . ($index + 1) . '" />
//			</a>';
if($arResult[1]["LINK"] == '/catalog/' && $index == 2){
$strReturn .= '<a href="' . $arResult[ $index ]["LINK"] . '?CATSHOW=Y" title="' . $title . '" itemprop="item" class="pagination_item" data-index="'.$index.'">
		<span>' . $title . '</span>
		</a>';
} else {
		$strReturn .= '<a href="' . $arResult[ $index ]["LINK"] . '" title="' . $title . '" itemprop="item" class="pagination_item" data-index="'.$index.'">
		<span>' . $title . '</span>
		</a>';
}

	} else {
		$strReturn .= '<span class="pagination_item">' . $title . '</span>';
	}

}

$strReturn .= '</div></div>';


return $strReturn;
