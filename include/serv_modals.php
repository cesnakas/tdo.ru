<div class="modal-calc-content" id="modal-calc">
	<img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/cross.png"
	     class="close-modal-screen-img-btn">
	<div class="modal-calc-content__header">
		<p>
			Расчет стоимости
		</p>
	</div>
	<div class="modal-calc-form-wrap">
		<form action="" method="post" class="modal-calc-form" id="calcForm">
			<div class="calc-form-group type-one">
				<input type="number" id="suqare-meters-input" class="suqare-meters-input"> <label
					for="suqare-meters-input">Общая площадь, м²</label>
			</div>
			<div class="checkbox-calc-block">
				<div class="calc-form-group type-two">
					<div class="calc-form-group-inner">
						<input type="checkbox" id="equipment-placing" class="calc-checkbox-input"> <label
							for="equipment-placing">Расстановка торгового оборудования</label>
					</div>
					<div class="calc-price" id="equipPrice" data-price="0">
						0 рублей
					</div>
				</div>
				<div class="calc-form-group type-two">
					<div class="calc-form-group-inner">
						<input type="checkbox" id="engineering-design" class="calc-checkbox-input"> <label
							for="engineering-design">Технологический проект</label>
					</div>
					<div class="calc-price" id="techPrice" data-price="0">
						0 рублей
					</div>
				</div>
				<div class="calc-form-group type-two">
					<div class="calc-form-group-inner">
						<input type="checkbox" id="design-project" class="calc-checkbox-input"> <label
							for="design-project">Дизайн-проект</label>
					</div>
					<div class="calc-price" id="designPrice" data-price="0">
						0 рублей
					</div>
				</div>
			</div>
			<!--./checkbox-calc-block-->
			<div class="calc-form-total-block">
				<p>
					Итого:
				</p>
				<p id="calcTotal" data-price="0">
					0 рублей
				</p>
			</div>
			<input type="submit" class="calc-form-submit" value="Заказать проект"> <span
				class="success-form"></span> <span class="error-form"></span>
		</form>
	</div>
	<!--./modal-calc-form-wrap-->
</div>
<!--./modal-calc-content-->
<div class="modal-calc-content" id="modal-request">
	<img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/cross.png"
	     class="close-modal-screen-img-btn">
	<div class="modal-calc-content__header">
		<h3>Заказать проект / задать вопрос</h3>
	</div>
	<div class="modal-calc-form-wrap">
		<form action="" method="post" class="modal-calc-form" id="formOrderProject">
			<input type="hidden" name="square" value="0"> <input type="hidden" name="placing" value="0">
			<input type="hidden" name="tech" value="0"> <input type="hidden" name="design" value="0"> <input
				type="hidden" name="total" value="0">
			<div class="calc-form-group type-three">
				<div class="calc-form-group-inner">
					<input type="checkbox" id="request-projector" name="vyezd" class="calc-checkbox-input">
					<label for="request-projector">Заказать выезд проектировщика</label>
				</div>
				<div class="calc-price">
					<img src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/van.png">
				</div>
			</div>
			<div class="input-fields-block">
				<div class="input-fields-group">
					<div class="input-field-wrap">
						<label for="request-input-name"> <img
								src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/user.svg">
						</label> <input class="input-field" type="text" name="name" placeholder="Имя"
						                id="request-input-name">
					</div>
					<div class="input-field-wrap">
						<label for="request-input-city"> <img
								src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/marker.svg">
						</label> <input class="input-field" type="text" name="city" placeholder="Город"
						                id="request-input-city">
					</div>
				</div>
				<div class="input-fields-group">
					<div class="input-field-wrap">
						<label for="request-input-tel"> <img
								src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/telephone.svg">
						</label> <input class="input-field" type="tel" name="phone" placeholder="Телефон"
						                id="request-input-tel">
					</div>
					<div class="input-field-wrap">
						<label for="request-input-email"> <img
								src="/local/templates/tdo_shop/img/serv_images/engineering_and_design/mail.svg">
						</label> <input class="input-field" type="email" name="email" placeholder="E-mail"
						                id="request-input-email">
					</div>
				</div>
				<div class="textarea-field-wrap">
								<textarea class="textarea-field" name="comment"
								          placeholder="Комментарий - размер помещения, задача, бюджет"></textarea>
				</div>
			</div>
			<input type="submit" class="calc-form-submit" value="Отправить"> <span
				class="success-form"></span> <span class="error-form"></span>
		</form>
	</div>
	<!--./modal-calc-form-wrap-->
</div>
<!--./modal-calc-content-->