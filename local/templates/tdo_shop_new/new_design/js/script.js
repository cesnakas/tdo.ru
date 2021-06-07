$(document).ready(function(){
	owl = $('.section-carousel').owlCarousel({
		loop:true,
		margin:0,
		autoplay:true,
		autoplayTimeout: 7000,
		responsive:{
			0:{
				items:1
			}
		}
	});
	owl = $('.catalog-carousel').owlCarousel({
		loop:true,
		margin:10,
		dots:false,
		nav:false,
		responsive:{
			0:{
				items:1
			},
			576:{
				items:2
			},
			768:{
				items:3
			},
			992:{
				items:4
			}
		}
	});
	$('.brands-carousel').owlCarousel({
		loop:true,
		margin:10,
		dots:false,
		margin:60,
		autoplay:true,
		autoplayTimeout: 5000,
		responsive:{
			0:{
				items:1
			},
			425:{
				items:3
			},
			768:{
				items:5
			},
			992:{
				items:6
			}
		}
	});
	$('.catalog-center-prev').click(function() {
		owl.trigger('next.owl.carousel');
	})
	// Go to the previous item
	$('.catalog-center-next').click(function() {
		// With optional speed parameter
		// Parameters has to be in square bracket '[]'
		owl.trigger('prev.owl.carousel', [300]);
	})

	$( window ).resize(function() {
        if(outerWidth>767){
			$('.index-catalog-top').addClass('show');
			$('.collapseIndexText').addClass('show');
		}
		else{
			$('.index-catalog-top').removeClass('show');
			$('.collapseIndexText').removeClass('show');
		}
    });
	if(outerWidth>767){
		$('.index-catalog-top').addClass('show');
		$('.collapseIndexText').addClass('show');
	}
	else{
		$('.index-catalog-top').removeClass('show');
		$('.collapseIndexText').removeClass('show');
	}
});



jQuery(function () {
	$('.listForm').each(function(){$(this).validate({
		rules: {
			username: {
				required: true,
				minlength: 3
			},
			phone: {
				required: true,
			},
			agree: {
				required: true,
			},
		},
		messages: {
			username: {
				required: "Укажите имя",
				minlength: "Имя должно быть более 3-х символов"
			},
			phone: {
				required: "Укажите телефон",
			},
			agree: {
				required: "Согласитесь с условиями",
			},
		},
		submitHandler: function (form) {
			//if ($('.checkbox-custom-hidd').is(':checked')){
				jQuery(form).ajaxSubmit({
					data: {'act': 'buyOneClick'},
					dataType: 'json',
					resetForm: false,
					success: function (mess) {
						var title = '';
						var html = '';

						if (mess['SUCCESS'] == 'Y') {
							$.fancybox.close();
							jQuery('.listForm').resetForm();
						}

						alert(mess['MESS']);
					}
				});
			
			//}else{
			//	alert("Не указано согласие с политикой персональных данных");
			//}

		}
	});

})
	




});