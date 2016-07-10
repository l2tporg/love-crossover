$(document).ready(function(){

	var wh = $(window).height();
	var ww = $(window).width();

	var tb = 768;
	var sp = 425;

	// スムーススクロール
	(function smooth_scroll() {
		$('a[href*="#"]').click(function(){
			var target = $(this.hash)
			var targetY = target.offset().top;
			$('html,body').stop().animate({scrollTop: targetY},200);
			return false;
		});
	})();

	// spナビゲーションボタン
	function sp_nav_btn() {
		$('#nav_btn').on('click',function(){
			$(this).next('ul').slideToggle(100);
			$(this).toggleClass('cmn-gl_head--btn_nav-open');
			return false;
		});
	}

	// メインビジュアルの文字を順にフェードさせる
	$(window).load(function(){
	});

	// スクロールトリガー、順に要素をフェードさせる
	(function scroll_fade() {
		$(window).scroll(function(){
			var ws = $(window).scrollTop();
			var offset_contact = $("#contact").offset().top - wh/1.5;
			var offset_faq = $("#faq").offset().top - wh/1.5;
			var offset_matter = $("#matter").offset().top - wh/1.5;
			var offset_place = $("#place").offset().top - wh/1.5;
			var offset_enjoy = $("#enjoy").offset().top - wh/1.5;
			var offset_recruit = $("#recruit").offset().top - wh/1.5;
			if(ws>offset_contact) {
				$("#contact h2").css({'top':'0','opacity':'1'});
				setTimeout(function(){
					$("#contact .cmn-fade_box").css({'top':'0','opacity':'1'});
				},250);
			} else if(ws>offset_faq) {
				$("#faq h2").css({'top':'0','opacity':'1'});
				setTimeout(function(){
					$("#faq .cmn-fade_box").css({'top':'0','opacity':'1'});
				},250);
			} else if(ws>offset_recruit) {
				$("#recruit h2").css({'top':'0','opacity':'1'});
				setTimeout(function(){
					$("#recruit .cmn-fade_box").css({'top':'0','opacity':'1'});
				},250);
			} else if(ws>offset_matter) {
				$("#matter h2").css({'top':'0','opacity':'1'});
				setTimeout(function(){
					$("#matter .cmn-fade_box").css({'top':'0','opacity':'1'});
				},250);
			} else if(ws>offset_place) {
				$("#place h2").css({'top':'0','opacity':'1'});
				setTimeout(function(){
					$("#place .cmn-fade_box").css({'top':'0','opacity':'1'});
				},250);
			} else if(ws>offset_enjoy) {
				$("#enjoy h2").css({'top':'0','opacity':'1'});
				setTimeout(function(){
					$("#enjoy .cmn-fade_box").css({'top':'0','opacity':'1'});
				},250);
			}
		});
	})();

	// google web font
  WebFontConfig = {
    google: { families: [ 'Roboto:400,700:latin', 'Josefin+Sans:400,700:latin' ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();

  // テストコード
  (function test(){
  	console.log( jQuery.data( $("body"),"foo") );
  })();

	// 条件分岐
	$(window).load(function(){
		if(ww<=sp) {
			sp_nav_btn();
		} else {
		}
	});

})
