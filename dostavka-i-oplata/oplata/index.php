<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Условия доставки и оплаты в компании tdobu.ru");
$APPLICATION->SetPageProperty("title", "Условия доставки и оплаты в компании tdobu.ru");
$APPLICATION->SetTitle("Условия оплаты");
$APPLICATION->AddChainItem('Условия оплаты');
?><?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"breadcrumb",
	Array(
		"PATH" => "",
		"SITE_ID" => "s2",
		"START_FROM" => "0"
	)
);?>
<div class="pagination-mob">
	<div class="container">
 <a class="pagination-mob_link" href="/dostavka-i-oplata/">Условия оплаты</a>
	</div>
</div>
<div class="container">
	<div class="wrap-link-back">
 <a class="link-back" href="/dostavka-i-oplata/">Читать о других услугах</a>
	</div>
</div>
<div class="serv-content">
	<div class="text-block">
		<div class="container">
			<div class="text-small-h text-small-h-mob-hid">
				 Условия оплаты
			</div>
			<div style="font-weight: 600;" class="text-small-h text-small-h-16">
				 Москва и Московская область
			</div>
			<div class="text-p text-p_50">
				 Уважаемые Клиенты, свой заказ Вы можете оплатить следующими удобными для вас способами!
			</div>
			<div class="wrap-dev_trig">
				<div class="dev_trig-item">
					<div class="text-small-h text-small-h-16">
						<div style="background-image: url('/local/templates/tdo_shop/img/icons/devi1.svg')" class="dev_trig-icon">
						</div>
						 Для физических лиц:
					</div>
					<ul class="custom-ul_red-dot">
						<li>Наличными в офисе компании по адресу: г. Москва, Алтуфьевское шоссе, д. 37, стр. 2.</li>
						<li>Оплата картой через платежный терминал Pay Pal.</li>
					</ul>
				</div>
				<div class="dev_trig-item">
					<div class="text-small-h text-small-h-16">
						<div style="background-image: url('/local/templates/tdo_shop/img/icons/devi2.svg')" class="dev_trig-icon">
						</div>
						 Для юридических лиц:
					</div>
					<ul class="custom-ul_red-dot">
						<li>Для оплаты по безналичному расчету необходимо сделать заказ, после чего менеджер выставит счет.</li>
						<li>Наличными в офисе при оформлении заказа.</li>
					</ul>
				</div>
			</div>
			<p class="text-p">
				 Вы можете оформить покупки в <a href="/dostavka-i-oplata/credit/">рассрочку или кредит</a>.
			</p>
		</div>
	</div>
</div><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>