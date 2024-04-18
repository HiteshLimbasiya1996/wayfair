function auto_parts_garage_menu_open_nav() {
	window.auto_parts_garage_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function auto_parts_garage_menu_close_nav() {
	window.auto_parts_garage_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});
});

jQuery(document).ready(function () {
	window.auto_parts_garage_currentfocus=null;
  	auto_parts_garage_checkfocusdElement();
	var auto_parts_garage_body = document.querySelector('body');
	auto_parts_garage_body.addEventListener('keyup', auto_parts_garage_check_tab_press);
	var auto_parts_garage_gotoHome = false;
	var auto_parts_garage_gotoClose = false;
	window.auto_parts_garage_responsiveMenu=false;
 	function auto_parts_garage_checkfocusdElement(){
	 	if(window.auto_parts_garage_currentfocus=document.activeElement.className){
		 	window.auto_parts_garage_currentfocus=document.activeElement.className;
	 	}
 	}
 	function auto_parts_garage_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.auto_parts_garage_responsiveMenu){
			if (!e.shiftKey) {
				if(auto_parts_garage_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				auto_parts_garage_gotoHome = true;
			} else {
				auto_parts_garage_gotoHome = false;
			}

		}else{

			if(window.auto_parts_garage_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.auto_parts_garage_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.auto_parts_garage_responsiveMenu){
				if(auto_parts_garage_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					auto_parts_garage_gotoClose = true;
				} else {
					auto_parts_garage_gotoClose = false;
				}
			
			}else{

			if(window.auto_parts_garage_responsiveMenu){
			}}}}
		}
	 	auto_parts_garage_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

// product category
jQuery(function( $ ) {
    $(document).ready(function(){
        $(".border-cat button.product-btn").click(function(){
            $(".product-cat").toggle();
        });
    });
});

