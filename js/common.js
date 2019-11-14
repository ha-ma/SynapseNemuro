jQuery(document).ready(function($) {

	$('.slider').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		dots: false,
		asNavFor: '.messageSlider'
	});

	$('.messageSlider').slick({
		autoplay: false,
		autoplaySpeed: 5000,
		fade: true,
		asNavFor: '.slider'
	})

	// スムーススクロール
	$(function(){
		$('header a[href^="#"],#toTop a[href^="#"]').click(function(){
			var speed = 500; //移動完了までの時間(sec)を指定
			var href= $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			var position = target.offset().top;
			$("html, body").animate({scrollTop:position}, speed, "swing");
			return false;
		});
	});


	//　iPad対策
	$(function(){
		var agent = navigator.userAgent;
		if(agent.search(/iPad/) != -1){
			$("body").addClass("ipad");
		}
	});


	$(function() {
	$('.slick-next').click(function() {
		for (i = 0; i < 2; i++) {
		if ($('.tab-nav li').eq(i).hasClass('active')) {
			break;
		}
		}
		if (i < 2) {
		var nextIndex = i + 1;
		} else {
		var nextIndex = 0;
		}
		$('.tab-nav li').removeClass('active');
		$('.tab-nav li').eq(nextIndex).addClass('active');
		$('.tab-box').removeClass('show').eq(nextIndex).addClass('show');
	});

	$('.slick-prev').click(function() {
		for (i = 0; i < 2; i++) {
		if ($('.tab-nav li').eq(i).hasClass('active')) {
			break;
		}
		}
		if (i < 0) {
		var nextIndex = 2;
		} else {
		var nextIndex = i - 1;
		}
		$('.tab-nav li').removeClass('active');
		$('.tab-nav li').eq(nextIndex).addClass('active');
		$('.tab-box').removeClass('show').eq(nextIndex).addClass('show');
	});
	});

	// tab高さ
	$(function(){
		$(window).on('load scroll resize',function(){
		var tbHeight = $('.tab-box').height();
			$('.tab-body').css("height",tbHeight + "px");
		});
	});
	//スライドショー
	$(document).on('ready', function(){
		//var w = $(window).width();
		//var h = $(window).height();
		//var hCustom = h*0.7;
		//$('#mv li').css('height', hCustom);
		$(".keyvisual ul").slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			//asNavFor: ".thumb-item-nav",
			//prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
			//nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
			autoplay: true,
			autoplaySpeed: 3000,
			dots: true,
		});
		/*if(w <= 768){
			$('#mv ul').slick({
				speed: 300,
				slidesToShow: 1,
				slidesToScroll: 1,
				centerMode: false,
				infinite: true,
				dots : false,
				auto : true,
			});
		} else {

		}*/
	});
	$(document).on('ready', function(){
		$(".thumb-item").slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: false,
			asNavFor: ".thumb-item-nav",
			prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
			nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
			autoplay: false,
			autoplaySpeed: 3000,
		});
		$(".thumb-item-nav").slick({
			accessibility: true,
			autoplay: true,
			autoplaySpeed: 4000,
			speed: 400,
			arrows: true,
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			asNavFor: ".thumb-item",
			focusOnSelect: true,
		});
	});


	/*スクロールイベント*/
	//SP時ナビのアニメ外し
	$(function() {
		var w = $(window).width();
		if(w <= 768){
			$('.nav').removeClass("list-mv07_mv_01");
		}
	});


	$(function() {
		$('.list-mv02').on('inview', function(event, isInView, visiblePartX, visiblePartY) {
			console.log(isInView);
			if(isInView){
				$(this).stop().addClass('mv02');
			}
			else{
				$(this).stop().removeClass('mv02');
			}
		});
		$('.list-mv07').on('inview', function(event, isInView, visiblePartX, visiblePartY) {
			console.log(isInView);
			if(isInView){
				$(this).stop().addClass('mv07');
			}
			/*else{
				$(this).stop().removeClass('mv07');
			}*/
		});
		$('.list-mv07_mv_02').on('inview', function(event, isInView, visiblePartX, visiblePartY) {
			console.log(isInView);
			if(isInView){
				var w = $(window).width();
				if(w <= 768){
					setTimeout(function(){
						$(".list-mv07_mv_01").addClass('mv07');
					},-700);
					setTimeout(function(){
						$(".list-mv07_mv_02").addClass('mv07');
					},0);
					setTimeout(function(){
						$(".list-mv07_mv_03").addClass('mv07');
					},700);
				} else{
					setTimeout(function(){
						$(".list-mv07_mv_01").addClass('mv07');
					},0);
					setTimeout(function(){
						$(".list-mv07_mv_02").addClass('mv07');
					},700);
					setTimeout(function(){
						$(".list-mv07_mv_03").addClass('mv07');
					},1400);
				}
			}

			/*else{
				$(this).stop().removeClass('mv07');
			}*/
		});
	});

	$('.mailBtn').on('click', function() {
		$('.mailArea').toggleClass('active');
		$(".accordion .mailBtn").toggleClass("active");
		$('.mail_btn.open').toggleClass('active')
		$('.mail_btn.close').toggleClass('active')
	})

	$('.menu_icon').on('click', function() {
		$('aside').toggleClass('active');
		$('.logo.sp').toggleClass('active');
		$('.mailArea').removeClass('active');
		$(".accordion .mailBtn").removeClass("active");
		$('.menu_icon.open').toggleClass('active');
		$('.menu_icon.close').toggleClass('active');
	})

});