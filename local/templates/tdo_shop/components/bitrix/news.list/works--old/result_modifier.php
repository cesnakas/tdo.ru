<?
foreach($arResult["ITEMS"] as &$arItem){
	$arItem['IMAGES'] = [];
	//var_dump($arItem['PROPERTIES']['MORE_PHOTO']['VALUE']);
	if(is_array($arItem['PROPERTIES']['MORE_PHOTO']['VALUE'])){
		foreach($arItem['PROPERTIES']['MORE_PHOTO']['VALUE'] as $key => $img){
			$arItem['IMAGES'][] = [
				'BIG' => CFile::GetPath($img),
				'SMALL' => CFile::ResizeImageGet($img, array('width'=>380, 'height'=>380), BX_RESIZE_IMAGE_PROPORTIONAL, true),
				'DESCR' => $arItem['PROPERTIES']['MORE_PHOTO']['DESCRIPTION'][$key]
			];
		}
	}
	//var_dump($arItem['IMAGES']);
}