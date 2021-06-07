<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

//Change location
\Bitrix\Main\Loader::includeModule('sale');
CModule::IncludeModule('iblock');
use Bitrix\Main\Mail\Event;


class ScApi
{

	var $request;

	var $requestSuccess = false;
	var $message = '';
	var $requestData = [];
	var $requestHtml = '';
	var $requestMime = 'application/json';

	function __construct()
	{
		$request = &\Bitrix\Main\Context::getCurrent()->getRequest();
		$act     = $request->get('act');

		$this->request = $request;
		$action_name   = $act . 'Action';

		if(method_exists(__CLASS__, $action_name))
		{
			self::$action_name();
		}
		else
		{
			echo 'Метод не найден';
			die();
		}
	}

	/**
	 * Set request data
	 *
	 * @param        $data
	 * @param array  $message
	 * @param string $mime
	 * @param bool   $success
	 *
	 *
	 * @created by: CaSPeR
	 * @since   version 1.0.0
	 */
	private function setRequest()
	{
		$requestSuccess = 'N';
		if($this->requestSuccess)
		{
			$requestSuccess = 'Y';
		}

		switch ($this->requestMime)
		{
			case 'application/json':
				$ret = array(
					'SUCCESS' => $requestSuccess,
					'MESS'    => $this->requestMessage,
					'DATA'    => $this->requestData,
					'HTML'    => $this->requestHtml,
				);
				$ret = \Bitrix\Main\Web\Json::encode($ret);
				break;
			case 'text/html':
			default:
				$ret = $this->requestHtml;
				break;
		}

		header("Content-type: application/json; charset=utf-8");
		echo $ret;

	}

	private function getVar($name, $default = null)
	{
		$value = $this->request[ $name ];
		if(empty($value))
		{
			$value = $default;
		}

		return $value;
	}

	/**
	 * Set location from request
	 *
	 * @created by: CaSPeR
	 * @since   version 1.0.0
	 */
	private function setLocationAction()
	{
		$locationID = $this->request->get('locationID');
		$rsLocation = \Bitrix\Sale\Location\LocationTable::getList(
			array(
				'filter' => array("ID" => $locationID, "=NAME.LANGUAGE_ID" => LANGUAGE_ID),
				'select' => array("ID", "NAME.NAME", "COUNTRY_ID", 'CODE'),
			)
		);


		if($arLocation = $rsLocation->fetch())
		{
			$curCityId   = $arLocation["CODE"];
			$curCityName = $arLocation["SALE_LOCATION_LOCATION_NAME_NAME"];
		}

		setcookie("location_city_id", $curCityId, time() + 60 * 60 * 24 * 30 * 12 * 2, "/");
		setcookie("location_city_name", $curCityName, time() + 60 * 60 * 24 * 30 * 12 * 2, "/");


		$this->requestSuccess = true;
		echo $this->setRequest();

		exit;
	}




	public function buyOneClickAction()
	{
		$send = false;
		if($this->request->isPost())
		{
			$arFields = array(
				"USERNAME"  => $this->getVar('username'),
				"PHONE"     => $this->getVar('phone'),
				"PROD_NAME" => $this->getVar('prod_name'),
				"COMMENT"   => $this->getVar('comment'),
			);

			$this->requestData = $arFields;

			$send = Event::send(
				array(
					"EVENT_NAME" => "BUY1CKICK",
					"LID"        => "s1",
					"C_FIELDS"   => $arFields,
				)
			);
		}

		$fields = [
			'username'=> 'Имя',
			'email'   => 'E-mail',
			'phone'   => 'Телефон',
			'prod_name'    => 'Товар',
			'comment' => 'Комментарий',
			'agree'   => 'Согласие',
			'act'  => 'Метод',
		];

		$list = '';
		foreach ($_POST as $k => $val)
		{
			if($k == 'agree' || $k == 'act') continue;

			$value = htmlspecialchars($val);
			$list .= $fields[ $k ] . ": " . $value . "\n\n";
		}

		$el = new CIBlockElement;
		$arLoadProductArray = array(
			"IBLOCK_SECTION_ID" => false,
			"IBLOCK_ID"         => 51,
			"NAME"              => "Купить в 1 клик " . date("d.m.Y H:i"),
			"ACTIVE"            => "Y",
			"PREVIEW_TEXT"      => $list,
			"PREVIEW_TEXT_TYPE" => 'html',
		);

		if($send && $PRODUCT_ID = $el->Add($arLoadProductArray))
		{
			$this->requestMessage = 'Заказ принят';
		}
		else
		{
			$this->requestMessage = 'Ошибка отправки данных';
		}

		$this->requestSuccess = $send;
		echo $this->setRequest();

		exit;
	}




	public function buyСreditAction()
	{
		$send = false;
		if($this->request->isPost())
		{
			$arFields = array(
				"USERNAME"  => $this->getVar('username'),
				"PHONE"     => $this->getVar('phone'),
				"PROD_NAME" => $this->getVar('prod_name'),
				"COMMENT"   => $this->getVar('comment'),
			);

			$this->requestData = $arFields;

			$send = Event::send(
				array(
					"EVENT_NAME" => "BUYCREDIT",
					"LID"        => "s1",
					"C_FIELDS"   => $arFields,
				)
			);
		}

		$fields = [
			'username'=> 'Имя',
			'email'   => 'E-mail',
			'phone'   => 'Телефон',
			'prod_name'    => 'Товар',
			'comment' => 'Комментарий',
			'agree'   => 'Согласие',
			'act'  => 'Метод',
		];

		$list = '';
		foreach ($_POST as $k => $val)
		{
			if($k == 'agree' || $k == 'act') continue;

			$value = htmlspecialchars($val);
			$list .= $fields[ $k ] . ": " . $value . "\n\n";
		}

		$el = new CIBlockElement;
		$arLoadProductArray = array(
			"IBLOCK_SECTION_ID" => false,
			"IBLOCK_ID"         => 52,
			"NAME"              => "Купить в кредит " . date("d.m.Y H:i"),
			"ACTIVE"            => "Y",
			"PREVIEW_TEXT"      => $list,
			"PREVIEW_TEXT_TYPE" => 'html',
		);

		if($send && $PRODUCT_ID = $el->Add($arLoadProductArray))
		{
			$this->requestMessage = 'Заказ принят';
		}
		else
		{
			$this->requestMessage = 'Ошибка отправки данных';
		}

		$this->requestSuccess = $send;
		echo $this->setRequest();

		exit;
	}




	public function buyUnderOrderAction()
	{
		$send = false;
		if($this->request->isPost())
		{
			$arFields = array(
				"USERNAME"  => $this->getVar('username'),
				"PHONE"     => $this->getVar('phone'),
				"PROD_NAME" => $this->getVar('prod_name'),
				"COMMENT"   => $this->getVar('comment'),
			);

			$this->requestData = $arFields;

			$send = Event::send(
				array(
					"EVENT_NAME" => "BUY_UNDER_ORDER",
					"LID"        => "s1",
					"C_FIELDS"   => $arFields,
				)
			);
		}

		$fields = [
			'username'=> 'Имя',
			'email'   => 'E-mail',
			'phone'   => 'Телефон',
			'prod_name'    => 'Товар',
			'comment' => 'Комментарий',
			'agree'   => 'Согласие',
			'act'  => 'Метод',
		];

		$list = '';
		foreach ($_POST as $k => $val)
		{
			if($k == 'agree' || $k == 'act') continue;

			$value = htmlspecialchars($val);
			$list .= $fields[ $k ] . ": " . $value . "\n\n";
		}

		$el = new CIBlockElement;
		$arLoadProductArray = array(
			"IBLOCK_SECTION_ID" => false,
			"IBLOCK_ID"         => 53,
			"NAME"              => "Под заказ " . date("d.m.Y H:i"),
			"ACTIVE"            => "Y",
			"PREVIEW_TEXT"      => $list,
			"PREVIEW_TEXT_TYPE" => 'html',
		);

		if($send && $PRODUCT_ID = $el->Add($arLoadProductArray))
		{
			$this->requestMessage = 'Заказ принят';
		}
		else
		{
			$this->requestMessage = 'Ошибка отправки данных';
		}

		$this->requestSuccess = $send;
		echo $this->setRequest();

		exit;
	}

	public function addToBasketAction()
	{
		$id       = $this->getVar('id');
		$quantity = $this->getVar('quantity', 0);
		$quantity = intval($quantity);

		if($quantity)
		{
			$this->_addToBasket($id, $quantity);
		}


		// Получение корзины для текущего пользователя
		$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
			\Bitrix\Sale\Fuser::getId(),
			\Bitrix\Main\Context::getCurrent()->getSite()
		);

		$totalQuantity = 0;
		foreach ($basket as $basketItem)
		{
			$totalQuantity += $basketItem->getQuantity();

			if($basketItem->getProductId() != $id)
			{
				continue;
			}

			$this->requestData = [
				'quantity'    => $basketItem->getQuantity(),
				'price'       => $basketItem->getPrice(),
				'name'        => $basketItem->getField('NAME'),
				'totalItem'   => $basketItem->getQuantity() * $basketItem->getPrice(),
				'totalBasket' => $basket->getBasePrice(),
			];

			$this->requestData['price']       = CCurrencyLang::CurrencyFormat($this->requestData['price'],
			                                                                  \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
			                                                                  true);
			$this->requestData['totalItem']   = CCurrencyLang::CurrencyFormat($this->requestData['totalItem'],
			                                                                  \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
			                                                                  true);
			$this->requestData['totalBasket'] = CCurrencyLang::CurrencyFormat($this->requestData['totalBasket'],
			                                                                  \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
			                                                                  true);
		}

		$this->requestData['totalQuantity'] = $totalQuantity;

		$this->requestSuccess = true;
		echo $this->setRequest();

		exit;

	}

	public function _addToBasket($pid, $quantity)
	{
		// Получение корзины для текущего пользователя
		$basket = \Bitrix\Sale\Basket::loadItemsForFUser(
			\Bitrix\Sale\Fuser::getId(),
			\Bitrix\Main\Context::getCurrent()->getSite()
		);

		$item = null;
		foreach ($basket as $basketItem)
		{
			if($basketItem->getProductId() != $pid)
			{
				continue;
			}
			$item = $basketItem;
		}

		if(is_object($item))
		{
			//Обновление товара в корзине
			$item->setField("QUANTITY", $quantity);
		}
		else
		{
			//Добавление товара
			$rsElement = CIBlockElement::GetByID(intval($id));

			if($arNextElement = $rsElement->GetNext())
			{
				$item = $basket->createItem("catalog", intval($pid));
				$item->setFields([
					                 "QUANTITY"               => $quantity,
					                 "CURRENCY"               => \Bitrix\Currency\CurrencyManager::getBaseCurrency(),
					                 "LID"                    => $site_id,
					                 "PRODUCT_PROVIDER_CLASS" => "CCatalogProductProvider",
					                 "CATALOG_XML_ID"         => $arNextElement["IBLOCK_EXTERNAL_ID"],
					                 "PRODUCT_XML_ID"         => $arNextElement["EXTERNAL_ID"],
				                 ]);
			}

		}

		//Сохранение изменений
		$basket->save();
	}

}

$scApi = new ScApi();
