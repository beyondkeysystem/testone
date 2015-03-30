// JavaScript Document


$('.selectpicker').selectpicker({
		size: false
});
	
$("#change1").click(function(){
		$("#change1-open").slideDown()
	// $("#close1").toggleClass("icon-change-two");
});

$("#close1").click(function(){
		//$("#change1-open").slideDown()
	 $("#change1-open").slideUp();  
});

$("#change2").click(function(){
		$("#change2-open").slideDown()
	// $("#close1").toggleClass("icon-change-two");
});

$("#close2").click(function(){
		//$("#change1-open").slideDown()
	 $("#change2-open").slideUp();  
});

$("#change3").click(function(){
		$("#change3-open").slideDown()
	// $("#close1").toggleClass("icon-change-two");
});

$("#close3").click(function(){
		//$("#change1-open").slideDown()
	 $("#change3-open").slideUp();  
});

$("#check-uncheck").click(function(){
	 $("#check-uncheck").addClass("check-bg");  
});

$("#check-uncheck1").click(function(){
	 $("#check-uncheck1").addClass("check-bg");  
});

$("#check-uncheck2").click(function(){
	 $(".display-main").addClass("display-show-top");
		$(".section").addClass("show-over");
                $("#blockdiv").show();
		$(".trans-fifty").show();  
});

$(".btn-close").click(function(){
	 $(".display-show-top").removeClass("display-show-top");
		$(".trans-fifty").hide();  
});


	
$(document).ready(function() {
	var $nav = $('#nav');
	var $nav2 = $('#nav-2');
	$nav.onePageNav().offset().top;
	$nav2.on('click', 'a', function(e) {
		var currentPos = $(this).parent().prevAll().length;
		$nav.find('li').eq(currentPos).children('a').trigger('click');
		e.preventDefault();
	});
});


jQuery(window).bind('load', function () {
	parallaxInit();						  
});
function parallaxInit() {
    jQuery('.parallax').each(function(){
        jQuery(this).parallax("30%", 0.1);
    });
}


var sticky_navigation_offset_top = $('#fixed-header').offset().top;
	// our function that decides weather the navigation bar should have "fixed" css position or not.
	var sticky_navigation = function(){
		var scroll_top = $(window).scrollTop(); // our current vertical position from the top
		
		// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
		if (scroll_top > sticky_navigation_offset_top) { 
			$('#fixed-header').addClass("fixed_header");
			$('#fixed-header').addClass("inner-menu");
			$('#fixed-header').addClass("animated fadeInDown");	
		} else {
			$('#fixed-header').removeClass("fixed_header");
			$('#fixed-header').removeClass("animated fadeInDown");
			$('#fixed-header').removeClass("inner-menu");
		}   
	};

	var sticky_navigation_offset_top = $('#fixed-header').offset().top;
	// run our function on load
	sticky_navigation();
	
	// and run it again every time you scroll
	$(window).scroll(function() {
		 sticky_navigation();
});


// WOW JS
wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
};





