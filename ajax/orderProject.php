<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
$iblockId = 48;

if($_POST)
{
	/*СОЗДАЕМ ФУНКЦИЮ КОТОРАЯ ДЕЛАЕТ ЗАПРОС НА GOOGLE СЕРВИС*/
	function getCaptcha($SecretKey)
	{
		$Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response={$SecretKey}");
		$Return   = json_decode($Response);

		return $Return;
	}

	if($_POST['g-recaptcha-response'])
	{
		/*ПРОИЗВОДИМ ЗАПРОС НА GOOGLE СЕРВИС И ЗАПИСЫВАЕМ ОТВЕТ*/
		$Return = getCaptcha($_POST['g-recaptcha-response']);
		/*ВЫВОДИМ НА ЭКРАН ПОЛУЧЕННЫЙ ОТВЕТ*/
	}

	/*ЕСЛИ ЗАПРОС УДАЧНО ОТПРАВЛЕН И ЗНАЧЕНИЕ score БОЛЬШЕ 0,5 ВЫПОЛНЯЕМ КОД*/
	if(!$_POST['g-recaptcha-response'] || ($Return->success == true && $Return->score > 0.5))
	{


		if(strpos($_POST['comment'], "http") === false)
		{
			$fields = [
				'name'    => 'Имя',
				'email'   => 'E-mail',
				'phone'   => 'Телефон',
				'city'    => 'Город',
				'comment' => 'Комментарий',
				'vyezd'   => 'Заказать выезд проектировщика',
				'square'  => 'Площадь',
				'placing' => 'Расстановка торгового оборудования',
				'tech'    => 'Технологический проект',
				'design'  => 'Дизайн проект',
				'total'   => 'Итого',
			];
			$list   = '';
			foreach ($_POST as $k => $val)
			{
				$value = htmlspecialchars($val);
				if($k == 'vyezd')
				{
					if($value == 'on')
					{
						$list .= $fields[ $k ] . ": Да\n";
					}
				}
				else
				{
					if($value != "0")
					{
						$list .= $fields[ $k ] . ": " . $value . "\n";
					}
				}
			}

			if(mb_strlen($_REQUEST['phone']) > 0 || mb_strlen($_REQUEST['email']) > 0)
			{
				$roistatData = array(
					'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : null,
					'key'     => 'ZDhjMDI3OGVhNDljOGVkMzJkZTc2ZDFkNGJiMDVlYjA6MTU2ODg5',
					'title'   => "Заявка с формы Заказать проект",
					'comment' => $list,
					'name'    => $_REQUEST['name'],
					'phone'   => $_REQUEST['phone'],
					'email'   => $_REQUEST['email'],
					'fields'  => array(),
				);
				file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));
			}
			$el = new CIBlockElement;

			$arLoadProductArray = array(
				"IBLOCK_SECTION_ID" => false,
				"IBLOCK_ID"         => $iblockId,
				"NAME"              => "Заказать проект " . date("d.m.Y H:i"),
				"ACTIVE"            => "Y",
				"PREVIEW_TEXT"      => $list,
				"PREVIEW_TEXT_TYPE" => 'html',
			);

			if($PRODUCT_ID = $el->Add($arLoadProductArray))
			{
				
				CEvent::Send("ORDER_PROJECT", 's2', ['LIST' => $list], 'N');
				echo 1;
			}
			else
			{
				echo $el->LAST_ERROR;
			}

		}

	}
	else
	{
		echo "You are Robot";
		die();
	}
}
?>