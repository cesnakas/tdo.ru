<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
use Bitrix\Highloadblock\HighloadBlockTable;
use Tstn\Core\Core;
use Tstn\Core\Region\Filter;

Loc::loadMessages(__FILE__);

class BrandListComponent extends \CBitrixComponent
{
    /**
     * {@inheritdoc}
     */
    public function executeComponent()
    {
        $brandIblockInfo = $this->getBrandIblockInfo();
        if ($this->startResultCache()) {
            $brandHighLoadInfo = $this->getBrandHighLoadInfo();
            $this->arResult['ALPHABET'] = $this->getAlphabet();
            $this->arResult['ITEMS'] = $this->getBrandItems($brandIblockInfo, $brandHighLoadInfo);
            Application::getInstance()->getTaggedCache()->registerTag('iblock_id_' . IBLOCK_ID_TSTN_CATALOG);
            $this->IncludeComponentTemplate();
        }
    }

    /**
     * @param $brandIblockInfo
     * @param $brandHighLoadInfo
     * @return array
     */
    protected function getBrandItems($brandIblockInfo, $brandHighLoadInfo)
    {
        $items = array();
        $cElement = new \CIBlockElement();

        //$cCore = Core::getInstance();
       // $regionFilter = $cCore->Region->getFilterArray();

        $filter = array(
            'IBLOCK_ID' => 1,
            'ACTIVE' => 'Y',
            '!IBLOCK_SECTION_ID' => false,
        );
        //$filter = array_merge($filter, $regionFilter);
        $select = array(
            'ID',
            'PROPERTY_PROIZVODITEL',
        );
        $res = $cElement->GetList(array(), $filter, array('PROPERTY_PROIZVODITEL'), false, $select);
        while ($item = $res->Fetch()) {
		//	print_r($item);
            if (!$item['PROPERTY_PROIZVODITEL_VALUE']) {
                continue;
            }
            if ($brandIblockInfo[$item['PROPERTY_PROIZVODITEL_VALUE']]) {
                $item = $brandIblockInfo[$item['PROPERTY_PROIZVODITEL_VALUE']];
            }
			//print_r($brandIblockInfo[$item['PROPERTY_PROIZVODITEL_VALUE']]);
			//print_r($brandHighLoadInfo);
			$item['NAME'] = $brandHighLoadInfo[$item['PROPERTY_PROIZVODITEL_VALUE']]['UF_NAME'];
            $item['CODE'] = $brandHighLoadInfo[$item['PROPERTY_PROIZVODITEL_VALUE']]['UF_CODE'];

            if (!$item['NAME'] || $item['NAME']=='-') {
                continue;
            }
        
            if (!$item['PICTURE']) {
                $item['PICTURE'] = '/local/templates/tstn/images/no_photo_215_86.png';
            }
			//print_r($item);
            $items[$item['PROPERTY_PROIZVODITEL_VALUE']] = $item;
            $letter = strtoupper(substr($item['NAME'], 0, 1));
            $this->arResult['ALPHABET'][$letter][] = $item['PROPERTY_PROIZVODITEL_VALUE'];
        }

        return $items;
    }

    protected function getBrandHighLoadInfo()
    {
        $filter = array('NAME' => 'BrandReference');
        $hlBlock = HighloadBlockTable::getList(array('filter' => $filter))->fetch();
        $obEntity = HighloadBlockTable::compileEntity($hlBlock);
        $cBrandsHighLoad = $obEntity->getDataClass();

        $items = array();
        $res = $cBrandsHighLoad::getList(array(
            'select' => array(
                'UF_XML_ID',
                'UF_NAME',
                'UF_CODE',
            )
        ));
        while ($item = $res->Fetch()) {
            $items[$item['UF_XML_ID']] = $item;
        }

        return $items;
    }

    protected function getBrandIblockInfo()
    {
        $brandInfo = array();
        $cElement = new \CIBlockElement();
        $cFile = new \CFile();
        $filter = array(
            'IBLOCK_ID' => 11,
            'ACTIVE' => 'Y',
            '!PROPERTY_PROIZVODITEL' => false,
        );
        $select = array(
            'ID',
            'NAME',
            'CODE',
            'PREVIEW_PICTURE',
            'PROPERTY_PROIZVODITEL',
            //'PROPERTY_OWN_BRAND',
            //'PROPERTY_CITY',
        );
        $res = $cElement->GetList(array(), $filter, false, false, $select);
        while ($item = $res->Fetch()) {
            if ($item['PREVIEW_PICTURE']) {
                $resize = $cFile->ResizeImageGet($item['PREVIEW_PICTURE'], array('width' => 215, 'height' => 86),
                    BX_RESIZE_IMAGE_PROPORTIONAL, true);
                $item['PICTURE'] = $resize['src'];
            }
            $brandInfo[$item['PROPERTY_PROIZVODITEL_VALUE']] = $item;
        }
		//print_r($brandInfo);
        return $brandInfo;
    }

    protected function getAlphabet()
    {
        return array(
            'A' => array(), 'B' => array(), 'C' => array(), 'D' => array(),
            'E' => array(), 'F' => array(), 'G' => array(), 'H' => array(),
            'I' => array(), 'J' => array(), 'K' => array(), 'L' => array(),
            'M' => array(), 'N' => array(), 'O' => array(), 'P' => array(),
            'Q' => array(), 'R' => array(), 'S' => array(), 'T' => array(),
            'U' => array(), 'V' => array(), 'W' => array(), 'X' => array(),
            'Y' => array(), 'Z' => array(),

            'А' => array(), 'Б' => array(), 'В' => array(), 'Г' => array(),
            'Д' => array(), 'Е' => array(), 'Ж' => array(), 'З' => array(),
            'И' => array(), 'К' => array(), 'Л' => array(), 'М' => array(),
            'Н' => array(), 'О' => array(), 'П' => array(), 'Р' => array(),
            'С' => array(), 'Т' => array(), 'У' => array(), 'Ф' => array(),
            'Х' => array(), 'Ц' => array(), 'Ч' => array(), 'Ш' => array(),
            'Щ' => array(), 'Ъ' => array(), 'Ы' => array(), 'Ь' => array(),
            'Э' => array(), 'Ю' => array(), 'Я' => array(),
        );
    }

    /**
     * @param  array $arParams
     * @return array
     */
    public function onPrepareComponentParams($arParams)
    {
        $result = array_merge($arParams, array(
            'CACHE_TYPE' => isset($arParams['CACHE_TYPE']) ? $arParams['CACHE_TYPE'] : 'A',
            'CACHE_TIME' => isset($arParams['CACHE_TIME']) ? $arParams['CACHE_TIME'] : 36000000,
        ));

        return $result;
    }
}

