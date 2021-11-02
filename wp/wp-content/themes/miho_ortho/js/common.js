// header
$(function() {
  var $win = $(window),
      $header = $('header'),
      animationClass = 'is-animation';

  $win.on('load scroll', function() {
    var value = $(this).scrollTop();
    if ( value > 720 ) {
      $header.addClass(animationClass);
    } else {
      $header.removeClass(animationClass);
    }
  });
});

$(function() {
  var $win = $(window),
      $header = $('header'),
      headerHeight = $header.outerHeight(),
      startPos = 0;

  $win.on('load scroll', function() {
    var value = $(this).scrollTop();
    if ( value > startPos && value > headerHeight ) {
      $header.css('top', '-' + headerHeight + 'px');
    } else {
      $header.css('top', '0');
    }
    startPos = value;
  });
});

//matchHeight
$(function(){
  $('.matchHeight li a').matchHeight();
});

// pagetop
$(function() {
    var topBtn = $('#page-top');
    topBtn.hide();
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 800) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });
    //スクロールしてトップ
    // topBtn.click(function () {
    //     $('body,html').animate({
    //         scrollTop: 0
    //     }, 1500);
    //     return false;
    // });
});

// ページ内リンク
$(function(){
	$('a[href^=#]').click(function(){
		var speed = 500;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$("html, body").animate({scrollTop:position}, speed, "swing");
		return false;
	});
});

//spMenuBtn, gNavSP
$(function(){
	$('a[href^=#]').click(function() {
		var speed = 400;
		var href= $(this).attr("href");
		var target = $(href == "#" || href == "" ? 'html' : href);
		var position = target.offset().top;
		$('body,html').animate({scrollTop:position}, speed, 'swing');
		return false;
	});

	$("#spMenuBtn, #gNavSP a").click( function(){
		$("#gNavSP").slideToggle(300);
		$("#gNavSP").toggleClass("activeNav");
		$("#spMenuBtn").toggleClass("active");
	});

});

// slider
$(function(){
$('.bxslider').bxSlider({
	auto: true,
	mode: 'fade',
	pager: false,
	controls: false,
});
});
