<?php

	$auto_parts_garage_custom_css= "";

	/*-------------------- Global Color -------------------*/

	/*-------------------- First Highlight Color -------------------*/

	$auto_parts_garage_first_color = get_theme_mod('auto_parts_garage_first_color');

	if($auto_parts_garage_first_color != false){
		$auto_parts_garage_custom_css .='.principle-box:hover .principle-box-inner-img, .more-btn a, #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i:hover, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, .pagination span, .pagination a, .woocommerce span.onsale, nav.woocommerce-MyAccount-navigation ul li, .scrollup i, .pagination a:hover, .pagination .current, #sidebar .tagcloud a:hover, .page-template-custom-home-page .middle-header, #main-product button.tablinks.active, .main-product-section .pro-button, .main-product-section:hover .the_timer, nav.woocommerce-MyAccount-navigation ul li:hover, #preloader, .event-btn-1 a, .event-btn-2 a:hover, .border-cat, span.cart-value, #slider .slider-btn a, #sidebar label.wp-block-search__label, #sidebar .wp-block-heading, .wp-block-tag-cloud a:hover,nav.navigation.posts-navigation .nav-previous a, .wp-block-button__link{';
			$auto_parts_garage_custom_css .='background: '.esc_attr($auto_parts_garage_first_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	if($auto_parts_garage_first_color != false){
		$auto_parts_garage_custom_css .='a, .main-header span.donate a:hover, .main-header span.volunteer a:hover, .main-header span.donate i:hover, .main-header span.volunteer i:hover, .box-content h3, .box-content h3 a, .woocommerce-message::before,.woocommerce-info::before,.post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .main-navigation ul li.current_page_item, .main-navigation li a:hover,.countdowntimer .count{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_first_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	if($auto_parts_garage_first_color != false){
		$auto_parts_garage_custom_css .='.woocommerce-message,.woocommerce-info{';
			$auto_parts_garage_custom_css .='border-top-color: '.esc_attr($auto_parts_garage_first_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	if($auto_parts_garage_first_color != false){
		$auto_parts_garage_custom_css .='li.current-menu-item a{';
			$auto_parts_garage_custom_css .='border-bottom-color: '.esc_attr($auto_parts_garage_first_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_custom_css .='@media screen and (max-width:1000px) {';
		if($auto_parts_garage_first_color != false){
			$auto_parts_garage_custom_css .='.main-header{
				background:'.esc_attr($auto_parts_garage_first_color).' !important;
			}';
		}
	$auto_parts_garage_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_width_option','Full Width');
    if($auto_parts_garage_theme_lay == 'Boxed'){
		$auto_parts_garage_custom_css .='body{';
			$auto_parts_garage_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='right: 100px;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_theme_lay == 'Wide Width'){
		$auto_parts_garage_custom_css .='body{';
			$auto_parts_garage_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='right: 30px;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_theme_lay == 'Full Width'){
		$auto_parts_garage_custom_css .='body{';
			$auto_parts_garage_custom_css .='max-width: 100%;';
		$auto_parts_garage_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$auto_parts_garage_resp_slider = get_theme_mod( 'auto_parts_garage_resp_slider_hide_show',true);
	if($auto_parts_garage_resp_slider == true && get_theme_mod( 'auto_parts_garage_slider_hide_show', false) == false){
    	$auto_parts_garage_custom_css .='#slider{';
			$auto_parts_garage_custom_css .='display:none;';
		$auto_parts_garage_custom_css .='} ';
	}
    if($auto_parts_garage_resp_slider == true){
    	$auto_parts_garage_custom_css .='@media screen and (max-width:575px) {';
		$auto_parts_garage_custom_css .='#slider{';
			$auto_parts_garage_custom_css .='display:block;';
		$auto_parts_garage_custom_css .='} }';
	}else if($auto_parts_garage_resp_slider == false){
		$auto_parts_garage_custom_css .='@media screen and (max-width:575px) {';
		$auto_parts_garage_custom_css .='#slider{';
			$auto_parts_garage_custom_css .='display:none;';
		$auto_parts_garage_custom_css .='} }';
		$auto_parts_garage_custom_css .='@media screen and (max-width:575px){';
		$auto_parts_garage_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$auto_parts_garage_custom_css .='margin-top: 45px;';
		$auto_parts_garage_custom_css .='} }';
	}

	$auto_parts_garage_resp_sidebar = get_theme_mod( 'auto_parts_garage_sidebar_hide_show',true);
    if($auto_parts_garage_resp_sidebar == true){
    	$auto_parts_garage_custom_css .='@media screen and (max-width:575px) {';
		$auto_parts_garage_custom_css .='#sidebar{';
			$auto_parts_garage_custom_css .='display:block;';
		$auto_parts_garage_custom_css .='} }';
	}else if($auto_parts_garage_resp_sidebar == false){
		$auto_parts_garage_custom_css .='@media screen and (max-width:575px) {';
		$auto_parts_garage_custom_css .='#sidebar{';
			$auto_parts_garage_custom_css .='display:none;';
		$auto_parts_garage_custom_css .='} }';
	}

	$auto_parts_garage_resp_scroll_top = get_theme_mod( 'auto_parts_garage_resp_scroll_top_hide_show',true);
	if($auto_parts_garage_resp_scroll_top == true && get_theme_mod( 'auto_parts_garage_hide_show_scroll',true) == false){
    	$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='visibility:hidden !important;';
		$auto_parts_garage_custom_css .='} ';
	}
    if($auto_parts_garage_resp_scroll_top == true){
    	$auto_parts_garage_custom_css .='@media screen and (max-width:575px) {';
		$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='visibility:visible !important;';
		$auto_parts_garage_custom_css .='} }';
	}else if($auto_parts_garage_resp_scroll_top == false){
		$auto_parts_garage_custom_css .='@media screen and (max-width:575px){';
		$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='visibility:hidden !important;';
		$auto_parts_garage_custom_css .='} }';
	}

	/*---------------- Single Post Settings ------------------*/

	$auto_parts_garage_comment_width = get_theme_mod('auto_parts_garage_single_blog_comment_width');
	if($auto_parts_garage_comment_width != false){
		$auto_parts_garage_custom_css .='#comments textarea{';
			$auto_parts_garage_custom_css .='width: '.esc_attr($auto_parts_garage_comment_width).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_single_blog_post_navigation_show_hide = get_theme_mod('auto_parts_garage_single_blog_post_navigation_show_hide',true);
	if($auto_parts_garage_single_blog_post_navigation_show_hide != true){
		$auto_parts_garage_custom_css .='.post-navigation{';
			$auto_parts_garage_custom_css .='display: none;';
		$auto_parts_garage_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$auto_parts_garage_copyright_alingment = get_theme_mod('auto_parts_garage_copyright_alingment');
	if($auto_parts_garage_copyright_alingment != false){
		$auto_parts_garage_custom_css .='.copyright p{';
			$auto_parts_garage_custom_css .='text-align: '.esc_attr($auto_parts_garage_copyright_alingment).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_copyright_background_color = get_theme_mod('auto_parts_garage_copyright_background_color');
	if($auto_parts_garage_copyright_background_color != false){
		$auto_parts_garage_custom_css .='#footer-2{';
			$auto_parts_garage_custom_css .='background-color: '.esc_attr($auto_parts_garage_copyright_background_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_footer_background_color = get_theme_mod('auto_parts_garage_footer_background_color');
	if($auto_parts_garage_footer_background_color != false){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='background-color: '.esc_attr($auto_parts_garage_footer_background_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_footer_widgets_heading = get_theme_mod( 'auto_parts_garage_footer_widgets_heading','Left');
    if($auto_parts_garage_footer_widgets_heading == 'Left'){
		$auto_parts_garage_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$auto_parts_garage_custom_css .='text-align: left;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_footer_widgets_heading == 'Center'){
		$auto_parts_garage_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$auto_parts_garage_custom_css .='text-align: center;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_footer_widgets_heading == 'Right'){
		$auto_parts_garage_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$auto_parts_garage_custom_css .='text-align: right;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_footer_widgets_content = get_theme_mod( 'auto_parts_garage_footer_widgets_content','Left');
    if($auto_parts_garage_footer_widgets_content == 'Left'){
		$auto_parts_garage_custom_css .='#footer .widget{';
		$auto_parts_garage_custom_css .='text-align: left;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_footer_widgets_content == 'Center'){
		$auto_parts_garage_custom_css .='#footer .widget{';
			$auto_parts_garage_custom_css .='text-align: center;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_footer_widgets_content == 'Right'){
		$auto_parts_garage_custom_css .='#footer .widget{';
			$auto_parts_garage_custom_css .='text-align: right;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_copyright_font_size = get_theme_mod('auto_parts_garage_copyright_font_size');
	if($auto_parts_garage_copyright_font_size != false){
		$auto_parts_garage_custom_css .='#footer-2 a, #footer-2 p{';
			$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_copyright_font_size).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_copyright_alingment = get_theme_mod('auto_parts_garage_copyright_alingment');
	if($auto_parts_garage_copyright_alingment != false){
		$auto_parts_garage_custom_css .='#footer-2 p{';
			$auto_parts_garage_custom_css .='text-align: '.esc_attr($auto_parts_garage_copyright_alingment).';';
		$auto_parts_garage_custom_css .='}';
	}
	$auto_parts_garage_copyright_padding_top_bottom = get_theme_mod('auto_parts_garage_copyright_padding_top_bottom');
	if($auto_parts_garage_copyright_padding_top_bottom != false){
		$auto_parts_garage_custom_css .='#footer-2{';
			$auto_parts_garage_custom_css .='padding-top: '.esc_attr($auto_parts_garage_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($auto_parts_garage_copyright_padding_top_bottom).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_footer_padding = get_theme_mod('auto_parts_garage_footer_padding');
	if($auto_parts_garage_footer_padding != false){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='padding: '.esc_attr($auto_parts_garage_footer_padding).' 0;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_footer_icon = get_theme_mod('auto_parts_garage_footer_icon');
	if($auto_parts_garage_footer_icon == false){
		$auto_parts_garage_custom_css .='#footer-2 p{';
			$auto_parts_garage_custom_css .='width:100%; text-align:center; float:none;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_footer_background_image = get_theme_mod('auto_parts_garage_footer_background_image');
	if($auto_parts_garage_footer_background_image != false){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='background: url('.esc_attr($auto_parts_garage_footer_background_image).');';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_img_footer','scroll');
	if($auto_parts_garage_theme_lay == 'fixed'){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$auto_parts_garage_custom_css .='}';
	}elseif ($auto_parts_garage_theme_lay == 'scroll'){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_footer_img_position = get_theme_mod('auto_parts_garage_footer_img_position','center center');
	if($auto_parts_garage_footer_img_position != false){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='background-position: '.esc_attr($auto_parts_garage_footer_img_position).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_copyright_font_weight = get_theme_mod('auto_parts_garage_copyright_font_weight');
	if($auto_parts_garage_copyright_font_weight != false){
		$auto_parts_garage_custom_css .='.copyright p, .copyright a{';
			$auto_parts_garage_custom_css .='font-weight: '.esc_attr($auto_parts_garage_copyright_font_weight).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_copyright_text_color = get_theme_mod('auto_parts_garage_copyright_text_color');
	if($auto_parts_garage_copyright_text_color != false){
		$auto_parts_garage_custom_css .='.copyright p, .copyright a{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_copyright_text_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$auto_parts_garage_site_title_font_size = get_theme_mod('auto_parts_garage_site_title_font_size');
	if($auto_parts_garage_site_title_font_size != false){
		$auto_parts_garage_custom_css .='.logo h1, .logo p.site-title{';
			$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_site_title_font_size).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_site_tagline_font_size = get_theme_mod('auto_parts_garage_site_tagline_font_size');
	if($auto_parts_garage_site_tagline_font_size != false){
		$auto_parts_garage_custom_css .='.logo p.site-description{';
			$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_site_tagline_font_size).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_logo_padding = get_theme_mod('auto_parts_garage_logo_padding');
	if($auto_parts_garage_logo_padding != false){
		$auto_parts_garage_custom_css .='.logo{';
			$auto_parts_garage_custom_css .='padding: '.esc_attr($auto_parts_garage_logo_padding).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_logo_margin = get_theme_mod('auto_parts_garage_logo_margin');
	if($auto_parts_garage_logo_margin != false){
		$auto_parts_garage_custom_css .='.logo{';
			$auto_parts_garage_custom_css .='margin: '.esc_attr($auto_parts_garage_logo_margin).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_site_title_color = get_theme_mod('auto_parts_garage_site_title_color');
	if($auto_parts_garage_site_title_color != false){
		$auto_parts_garage_custom_css .='.logo h1 a{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_site_title_color).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_site_tagline_color = get_theme_mod('auto_parts_garage_site_tagline_color');
	if($auto_parts_garage_site_tagline_color != false){
		$auto_parts_garage_custom_css .='.logo p.site-description{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_site_tagline_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_logo_width = get_theme_mod('auto_parts_garage_logo_width');
	if($auto_parts_garage_logo_width != false){
		$auto_parts_garage_custom_css .='.logo img{';
			$auto_parts_garage_custom_css .='width: '.esc_attr($auto_parts_garage_logo_width).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_logo_height = get_theme_mod('auto_parts_garage_logo_height');
	if($auto_parts_garage_logo_height != false){
		$auto_parts_garage_custom_css .='.logo img{';
			$auto_parts_garage_custom_css .='height: '.esc_attr($auto_parts_garage_logo_height).';';
		$auto_parts_garage_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$auto_parts_garage_preloader_bg_color = get_theme_mod('auto_parts_garage_preloader_bg_color');
	if($auto_parts_garage_preloader_bg_color != false){
		$auto_parts_garage_custom_css .='#preloader{';
			$auto_parts_garage_custom_css .='background-color: '.esc_attr($auto_parts_garage_preloader_bg_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_preloader_border_color = get_theme_mod('auto_parts_garage_preloader_border_color');
	if($auto_parts_garage_preloader_border_color != false){
		$auto_parts_garage_custom_css .='.loader-line{';
			$auto_parts_garage_custom_css .='border-color: '.esc_attr($auto_parts_garage_preloader_border_color).'!important;';
		$auto_parts_garage_custom_css .='}';
	}


	// css
	$auto_parts_garage_show_product = get_theme_mod( 'auto_parts_garage_discount_sale_img');
	if($auto_parts_garage_show_product == false){
		$auto_parts_garage_custom_css .='.product-content{';
			$auto_parts_garage_custom_css .='padding:0; position:static;';
		$auto_parts_garage_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$auto_parts_garage_button_border_radius = get_theme_mod('auto_parts_garage_button_border_radius');
	if($auto_parts_garage_button_border_radius != false){
		$auto_parts_garage_custom_css .='.post-main-box .more-btn a{';
			$auto_parts_garage_custom_css .='border-radius: '.esc_attr($auto_parts_garage_button_border_radius).'px !important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_button_padding_top_bottom = get_theme_mod('auto_parts_garage_button_padding_top_bottom');
	$auto_parts_garage_button_padding_left_right = get_theme_mod('auto_parts_garage_button_padding_left_right');
	if($auto_parts_garage_button_padding_top_bottom != false || $auto_parts_garage_button_padding_left_right != false){
		$auto_parts_garage_custom_css .='.post-main-box .more-btn a{';
			$auto_parts_garage_custom_css .='padding-top: '.esc_attr($auto_parts_garage_button_padding_top_bottom).'!important;
			padding-bottom: '.esc_attr($auto_parts_garage_button_padding_top_bottom).'!important;
			padding-left: '.esc_attr($auto_parts_garage_button_padding_left_right).'!important;
			padding-right: '.esc_attr($auto_parts_garage_button_padding_left_right).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_button_font_size = get_theme_mod('auto_parts_garage_button_font_size',14);
	$auto_parts_garage_custom_css .='.post-main-box .more-btn a{';
		$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_button_font_size).';';
	$auto_parts_garage_custom_css .='}';

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_button_text_transform','Uppercase');
	if($auto_parts_garage_theme_lay == 'Capitalize'){
		$auto_parts_garage_custom_css .='.post-main-box .more-btn a{';
			$auto_parts_garage_custom_css .='text-transform:Capitalize;';
		$auto_parts_garage_custom_css .='}';
	}
	if($auto_parts_garage_theme_lay == 'Lowercase'){
		$auto_parts_garage_custom_css .='.post-main-box .more-btn a{';
			$auto_parts_garage_custom_css .='text-transform:Lowercase;';
		$auto_parts_garage_custom_css .='}';
	}
	if($auto_parts_garage_theme_lay == 'Uppercase'){
		$auto_parts_garage_custom_css .='.post-main-box .more-btn a{';
			$auto_parts_garage_custom_css .='text-transform:Uppercase;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_button_letter_spacing = get_theme_mod('auto_parts_garage_button_letter_spacing',14);
	$auto_parts_garage_custom_css .='.post-main-box .more-btn a{';
		$auto_parts_garage_custom_css .='letter-spacing: '.esc_attr($auto_parts_garage_button_letter_spacing).';';
	$auto_parts_garage_custom_css .='}';

	/*---------------------------Blog Layout -------------------*/

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_blog_layout_option','Default');
    if($auto_parts_garage_theme_lay == 'Default'){
		$auto_parts_garage_custom_css .='.post-main-box{';
			$auto_parts_garage_custom_css .='';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_theme_lay == 'Center'){
		$auto_parts_garage_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$auto_parts_garage_custom_css .='text-align:center;';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='.post-info{';
			$auto_parts_garage_custom_css .='margin-top:10px;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_theme_lay == 'Left'){
		$auto_parts_garage_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$auto_parts_garage_custom_css .='text-align:Left;';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='.post-main-box h2{';
			$auto_parts_garage_custom_css .='margin-top:10px;';
		$auto_parts_garage_custom_css .='}';
	}

	/*---------------- Post Settings ------------------*/

	$auto_parts_garage_featured_image_border_radius = get_theme_mod('auto_parts_garage_featured_image_border_radius', 0);
	if($auto_parts_garage_featured_image_border_radius != false){
		$auto_parts_garage_custom_css .='.box-image img, .feature-box img{';
			$auto_parts_garage_custom_css .='border-radius: '.esc_attr($auto_parts_garage_featured_image_border_radius).'px;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_featured_image_box_shadow = get_theme_mod('auto_parts_garage_featured_image_box_shadow',0);
	if($auto_parts_garage_featured_image_box_shadow != false){
		$auto_parts_garage_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$auto_parts_garage_custom_css .='box-shadow: '.esc_attr($auto_parts_garage_featured_image_box_shadow).'px '.esc_attr($auto_parts_garage_featured_image_box_shadow).'px '.esc_attr($auto_parts_garage_featured_image_box_shadow).'px #cccccc;';
		$auto_parts_garage_custom_css .='}';
	}

	// featured image dimention
	$auto_parts_garage_blog_post_featured_image_dimension = get_theme_mod('auto_parts_garage_blog_post_featured_image_dimension', 'default');
	$auto_parts_garage_blog_post_featured_image_custom_width = get_theme_mod('auto_parts_garage_blog_post_featured_image_custom_width',250);
	$auto_parts_garage_blog_post_featured_image_custom_height = get_theme_mod('auto_parts_garage_blog_post_featured_image_custom_height',250);
	if($auto_parts_garage_blog_post_featured_image_dimension == 'custom'){
		$auto_parts_garage_custom_css .='.post-main-box img{';
			$auto_parts_garage_custom_css .='width: '.esc_attr($auto_parts_garage_blog_post_featured_image_custom_width).'; height: '.esc_attr($auto_parts_garage_blog_post_featured_image_custom_height).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_blog_page_posts_settings = get_theme_mod( 'auto_parts_garage_blog_page_posts_settings','Into Blocks');
    if($auto_parts_garage_blog_page_posts_settings == 'Without Blocks'){
		$auto_parts_garage_custom_css .='.post-main-box{';
			$auto_parts_garage_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$auto_parts_garage_custom_css .='}';
	}

	/*----------------- Slider Content Layout -------------------*/

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_slider_content_option','Right');
    if($auto_parts_garage_theme_lay == 'Left'){
		$auto_parts_garage_custom_css .='#slider .carousel-caption{';
			$auto_parts_garage_custom_css .='text-align:left; left: 15%;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_theme_lay == 'Center'){
		$auto_parts_garage_custom_css .='#slider .carousel-caption{';
			$auto_parts_garage_custom_css .='text-align:center; right: 25%; left: 25%;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_theme_lay == 'Right'){
		$auto_parts_garage_custom_css .='#slider .carousel-caption{';
			$auto_parts_garage_custom_css .='text-align:center; right: 10%; left: 50%;';
		$auto_parts_garage_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$auto_parts_garage_slider_content_padding_top_bottom = get_theme_mod('auto_parts_garage_slider_content_padding_top_bottom');
	$auto_parts_garage_slider_content_padding_left_right = get_theme_mod('auto_parts_garage_slider_content_padding_left_right');
	if($auto_parts_garage_slider_content_padding_top_bottom != false || $auto_parts_garage_slider_content_padding_left_right != false){
		$auto_parts_garage_custom_css .='#slider .carousel-caption{';
			$auto_parts_garage_custom_css .='top: '.esc_attr($auto_parts_garage_slider_content_padding_top_bottom).'; bottom: '.esc_attr($auto_parts_garage_slider_content_padding_top_bottom).';left: '.esc_attr($auto_parts_garage_slider_content_padding_left_right).';right: '.esc_attr($auto_parts_garage_slider_content_padding_left_right).';';
		$auto_parts_garage_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$auto_parts_garage_slider_height = get_theme_mod('auto_parts_garage_slider_height');
	if($auto_parts_garage_slider_height != false){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='height: '.esc_attr($auto_parts_garage_slider_height).';';
		$auto_parts_garage_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_slider_opacity_color','0.5');
	if($auto_parts_garage_theme_lay == '0'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0';
		$auto_parts_garage_custom_css .='}';
		}else if($auto_parts_garage_theme_lay == '0.1'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0.1';
		$auto_parts_garage_custom_css .='}';
		}else if($auto_parts_garage_theme_lay == '0.2'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0.2';
		$auto_parts_garage_custom_css .='}';
		}else if($auto_parts_garage_theme_lay == '0.3'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0.3';
		$auto_parts_garage_custom_css .='}';
		}else if($auto_parts_garage_theme_lay == '0.4'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0.4';
		$auto_parts_garage_custom_css .='}';
		}else if($auto_parts_garage_theme_lay == '0.5'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0.5';
		$auto_parts_garage_custom_css .='}';
		}else if($auto_parts_garage_theme_lay == '0.6'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0.6';
		$auto_parts_garage_custom_css .='}';
		}else if($auto_parts_garage_theme_lay == '0.7'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0.7';
		$auto_parts_garage_custom_css .='}';
		}else if($auto_parts_garage_theme_lay == '0.8'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0.8';
		$auto_parts_garage_custom_css .='}';
		}else if($auto_parts_garage_theme_lay == '0.9'){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:0.9';
		$auto_parts_garage_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$auto_parts_garage_slider_image_overlay = get_theme_mod('auto_parts_garage_slider_image_overlay', true);
	if($auto_parts_garage_slider_image_overlay == false){
		$auto_parts_garage_custom_css .='#slider img{';
			$auto_parts_garage_custom_css .='opacity:1;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_slider_image_overlay_color = get_theme_mod('auto_parts_garage_slider_image_overlay_color', true);
	if($auto_parts_garage_slider_image_overlay_color != false){
		$auto_parts_garage_custom_css .='#slider{';
			$auto_parts_garage_custom_css .='background-color: '.esc_attr($auto_parts_garage_slider_image_overlay_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$auto_parts_garage_scroll_to_top_font_size = get_theme_mod('auto_parts_garage_scroll_to_top_font_size');
	if($auto_parts_garage_scroll_to_top_font_size != false){
		$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_scroll_to_top_font_size).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_scroll_to_top_padding = get_theme_mod('auto_parts_garage_scroll_to_top_padding');
	$auto_parts_garage_scroll_to_top_padding = get_theme_mod('auto_parts_garage_scroll_to_top_padding');
	if($auto_parts_garage_scroll_to_top_padding != false){
		$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='padding-top: '.esc_attr($auto_parts_garage_scroll_to_top_padding).';padding-bottom: '.esc_attr($auto_parts_garage_scroll_to_top_padding).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_scroll_to_top_width = get_theme_mod('auto_parts_garage_scroll_to_top_width');
	if($auto_parts_garage_scroll_to_top_width != false){
		$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='width: '.esc_attr($auto_parts_garage_scroll_to_top_width).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_scroll_to_top_height = get_theme_mod('auto_parts_garage_scroll_to_top_height');
	if($auto_parts_garage_scroll_to_top_height != false){
		$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='height: '.esc_attr($auto_parts_garage_scroll_to_top_height).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_scroll_to_top_border_radius = get_theme_mod('auto_parts_garage_scroll_to_top_border_radius');
	if($auto_parts_garage_scroll_to_top_border_radius != false){
		$auto_parts_garage_custom_css .='.scrollup i{';
			$auto_parts_garage_custom_css .='border-radius: '.esc_attr($auto_parts_garage_scroll_to_top_border_radius).'px;';
		$auto_parts_garage_custom_css .='}';
	}

// menus settings

		$auto_parts_garage_navigation_menu_font_size = get_theme_mod('auto_parts_garage_navigation_menu_font_size');
	if($auto_parts_garage_navigation_menu_font_size != false){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_navigation_menu_font_size).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_navigation_menu_font_weight = get_theme_mod('auto_parts_garage_navigation_menu_font_weight','600');
	if($auto_parts_garage_navigation_menu_font_weight != false){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='font-weight: '.esc_attr($auto_parts_garage_navigation_menu_font_weight).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_menu_text_transform','Uppercase');
	if($auto_parts_garage_theme_lay == 'Capitalize'){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='text-transform:Capitalize;';
		$auto_parts_garage_custom_css .='}';
	}
	if($auto_parts_garage_theme_lay == 'Lowercase'){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='text-transform:Lowercase;';
		$auto_parts_garage_custom_css .='}';
	}
	if($auto_parts_garage_theme_lay == 'Uppercase'){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='text-transform:Uppercase;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_header_menus_color = get_theme_mod('auto_parts_garage_header_menus_color');
	if($auto_parts_garage_header_menus_color != false){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_header_menus_color).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_header_menus_hover_color = get_theme_mod('auto_parts_garage_header_menus_hover_color');
	if($auto_parts_garage_header_menus_hover_color != false){
		$auto_parts_garage_custom_css .='.main-navigation a:hover{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_header_menus_hover_color).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_header_submenus_color = get_theme_mod('auto_parts_garage_header_submenus_color');
	if($auto_parts_garage_header_submenus_color != false){
		$auto_parts_garage_custom_css .='.main-navigation ul ul a{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_header_submenus_color).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_header_submenus_hover_color = get_theme_mod('auto_parts_garage_header_submenus_hover_color');
	if($auto_parts_garage_header_submenus_hover_color != false){
		$auto_parts_garage_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_header_submenus_hover_color).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_menus_item = get_theme_mod( 'auto_parts_garage_menus_item_style','None');
    if($auto_parts_garage_menus_item == 'None'){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_menus_item == 'Zoom In'){
		$auto_parts_garage_custom_css .='.main-navigation a:hover{';
			$auto_parts_garage_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #ffea54;';
		$auto_parts_garage_custom_css .='}';
	}

	// Woocommerce img
	$auto_parts_garage_shop_featured_image_border_radius = get_theme_mod('auto_parts_garage_shop_featured_image_border_radius', 0);
	if($auto_parts_garage_shop_featured_image_border_radius != false){
		$auto_parts_garage_custom_css .='.woocommerce ul.products li.product a img{';
			$auto_parts_garage_custom_css .='border-radius: '.esc_attr($auto_parts_garage_shop_featured_image_border_radius).'px;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_shop_featured_image_box_shadow = get_theme_mod('auto_parts_garage_shop_featured_image_box_shadow');
	if($auto_parts_garage_shop_featured_image_box_shadow != false){
		$auto_parts_garage_custom_css .='.woocommerce ul.products li.product a img{';
				$auto_parts_garage_custom_css .='box-shadow: '.esc_attr($auto_parts_garage_shop_featured_image_box_shadow).'px '.esc_attr($auto_parts_garage_shop_featured_image_box_shadow).'px '.esc_attr($auto_parts_garage_shop_featured_image_box_shadow).'px #ddd;';
		$auto_parts_garage_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$auto_parts_garage_display_grid_posts_settings = get_theme_mod( 'auto_parts_garage_display_grid_posts_settings','Into Blocks');
    if($auto_parts_garage_display_grid_posts_settings == 'Without Blocks'){
		$auto_parts_garage_custom_css .='.grid-post-main-box{';
			$auto_parts_garage_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$auto_parts_garage_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$auto_parts_garage_related_product_show_hide = get_theme_mod('auto_parts_garage_related_product_show_hide',true);
	if($auto_parts_garage_related_product_show_hide != true){
		$auto_parts_garage_custom_css .='.related.products{';
			$auto_parts_garage_custom_css .='display: none;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_products_padding_top_bottom = get_theme_mod('auto_parts_garage_products_padding_top_bottom');
	if($auto_parts_garage_products_padding_top_bottom != false){
		$auto_parts_garage_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$auto_parts_garage_custom_css .='padding-top: '.esc_attr($auto_parts_garage_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($auto_parts_garage_products_padding_top_bottom).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_products_padding_left_right = get_theme_mod('auto_parts_garage_products_padding_left_right');
	if($auto_parts_garage_products_padding_left_right != false){
		$auto_parts_garage_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$auto_parts_garage_custom_css .='padding-left: '.esc_attr($auto_parts_garage_products_padding_left_right).'!important; padding-right: '.esc_attr($auto_parts_garage_products_padding_left_right).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_products_box_shadow = get_theme_mod('auto_parts_garage_products_box_shadow');
	if($auto_parts_garage_products_box_shadow != false){
		$auto_parts_garage_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$auto_parts_garage_custom_css .='box-shadow: '.esc_attr($auto_parts_garage_products_box_shadow).'px '.esc_attr($auto_parts_garage_products_box_shadow).'px '.esc_attr($auto_parts_garage_products_box_shadow).'px #ddd;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_products_border_radius = get_theme_mod('auto_parts_garage_products_border_radius', 0);
	if($auto_parts_garage_products_border_radius != false){
		$auto_parts_garage_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$auto_parts_garage_custom_css .='border-radius: '.esc_attr($auto_parts_garage_products_border_radius).'px;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_products_btn_padding_top_bottom = get_theme_mod('auto_parts_garage_products_btn_padding_top_bottom');
	if($auto_parts_garage_products_btn_padding_top_bottom != false){
		$auto_parts_garage_custom_css .='.woocommerce a.button{';
			$auto_parts_garage_custom_css .='padding-top: '.esc_attr($auto_parts_garage_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($auto_parts_garage_products_btn_padding_top_bottom).' !important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_products_btn_padding_left_right = get_theme_mod('auto_parts_garage_products_btn_padding_left_right');
	if($auto_parts_garage_products_btn_padding_left_right != false){
		$auto_parts_garage_custom_css .='.woocommerce a.button{';
			$auto_parts_garage_custom_css .='padding-left: '.esc_attr($auto_parts_garage_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($auto_parts_garage_products_btn_padding_left_right).' !important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_products_button_border_radius = get_theme_mod('auto_parts_garage_products_button_border_radius', 0);
	if($auto_parts_garage_products_button_border_radius != false){
		$auto_parts_garage_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$auto_parts_garage_custom_css .='border-radius: '.esc_attr($auto_parts_garage_products_button_border_radius).'px;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_woocommerce_sale_position = get_theme_mod( 'auto_parts_garage_woocommerce_sale_position','right');
    if($auto_parts_garage_woocommerce_sale_position == 'left'){
		$auto_parts_garage_custom_css .='.woocommerce ul.products li.product .onsale{';
			$auto_parts_garage_custom_css .='left:0px !important; right: auto !important;';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_woocommerce_sale_position == 'right'){
		$auto_parts_garage_custom_css .='.woocommerce ul.products li.product .onsale{';
			$auto_parts_garage_custom_css .='left: auto !important; right: 0 !important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_woocommerce_sale_font_size = get_theme_mod('auto_parts_garage_woocommerce_sale_font_size');
	if($auto_parts_garage_woocommerce_sale_font_size != false){
		$auto_parts_garage_custom_css .='.woocommerce span.onsale{';
			$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_woocommerce_sale_font_size).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_woocommerce_sale_border_radius = get_theme_mod('auto_parts_garage_woocommerce_sale_border_radius', 100);
	if($auto_parts_garage_woocommerce_sale_border_radius != false){
		$auto_parts_garage_custom_css .='.woocommerce span.onsale{';
			$auto_parts_garage_custom_css .='border-radius: '.esc_attr($auto_parts_garage_woocommerce_sale_border_radius).'px;';
		$auto_parts_garage_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$auto_parts_garage_social_icon_font_size = get_theme_mod('auto_parts_garage_social_icon_font_size');
	if($auto_parts_garage_social_icon_font_size != false){
		$auto_parts_garage_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_social_icon_font_size).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_social_icon_padding = get_theme_mod('auto_parts_garage_social_icon_padding');
	if($auto_parts_garage_social_icon_padding != false){
		$auto_parts_garage_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$auto_parts_garage_custom_css .='padding: '.esc_attr($auto_parts_garage_social_icon_padding).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_social_icon_width = get_theme_mod('auto_parts_garage_social_icon_width');
	if($auto_parts_garage_social_icon_width != false){
		$auto_parts_garage_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$auto_parts_garage_custom_css .='width: '.esc_attr($auto_parts_garage_social_icon_width).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_social_icon_height = get_theme_mod('auto_parts_garage_social_icon_height');
	if($auto_parts_garage_social_icon_height != false){
		$auto_parts_garage_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$auto_parts_garage_custom_css .='height: '.esc_attr($auto_parts_garage_social_icon_height).';';
		$auto_parts_garage_custom_css .='}';
	}

	// Header Background Color
	$auto_parts_garage_header_background_color = get_theme_mod('auto_parts_garage_header_background_color');
	if($auto_parts_garage_header_background_color != false){
		$auto_parts_garage_custom_css .='.middle-header, #header{';
			$auto_parts_garage_custom_css .='background-color: '.esc_attr($auto_parts_garage_header_background_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_header_img_position = get_theme_mod('auto_parts_garage_header_img_position','center top');
	if($auto_parts_garage_header_img_position != false){
		$auto_parts_garage_custom_css .='.middle-header, #header{';
			$auto_parts_garage_custom_css .='background-position: '.esc_attr($auto_parts_garage_header_img_position).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_resp_menu_toggle_btn_bg_color = get_theme_mod('auto_parts_garage_resp_menu_toggle_btn_bg_color');
	if($auto_parts_garage_resp_menu_toggle_btn_bg_color != false){
		$auto_parts_garage_custom_css .='.toggle-nav i{';
			$auto_parts_garage_custom_css .='background-color: '.esc_attr($auto_parts_garage_resp_menu_toggle_btn_bg_color).'!important;';
		$auto_parts_garage_custom_css .='}';
	}

	/*---------------- Grid Posts Settings ------------------*/

	$auto_parts_garage_grid_featured_image_border_radius = get_theme_mod('auto_parts_garage_grid_featured_image_border_radius', 0);
	if($auto_parts_garage_grid_featured_image_border_radius != false){
		$auto_parts_garage_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img{';
			$auto_parts_garage_custom_css .='border-radius: '.esc_attr($auto_parts_garage_grid_featured_image_border_radius).'px;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_grid_featured_image_box_shadow = get_theme_mod('auto_parts_garage_grid_featured_image_box_shadow',0);
	if($auto_parts_garage_grid_featured_image_box_shadow != false){
		$auto_parts_garage_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$auto_parts_garage_custom_css .='box-shadow: '.esc_attr($auto_parts_garage_grid_featured_image_box_shadow).'px '.esc_attr($auto_parts_garage_grid_featured_image_box_shadow).'px '.esc_attr($auto_parts_garage_grid_featured_image_box_shadow).'px #cccccc;';
		$auto_parts_garage_custom_css .='}';
	}

	// menus
	$auto_parts_garage_navigation_menu_font_size = get_theme_mod('auto_parts_garage_navigation_menu_font_size');
	if($auto_parts_garage_navigation_menu_font_size != false){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_navigation_menu_font_size).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_navigation_menu_font_weight = get_theme_mod('auto_parts_garage_navigation_menu_font_weight','600');
	if($auto_parts_garage_navigation_menu_font_weight != false){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='font-weight: '.esc_attr($auto_parts_garage_navigation_menu_font_weight).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_menu_text_transform','Uppercase');
	if($auto_parts_garage_theme_lay == 'Capitalize'){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='text-transform:Capitalize;';
		$auto_parts_garage_custom_css .='}';
	}
	if($auto_parts_garage_theme_lay == 'Lowercase'){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='text-transform:Lowercase;';
		$auto_parts_garage_custom_css .='}';
	}
	if($auto_parts_garage_theme_lay == 'Uppercase'){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='text-transform:Uppercase;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_header_menus_color = get_theme_mod('auto_parts_garage_header_menus_color');
	if($auto_parts_garage_header_menus_color != false){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_header_menus_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_header_menus_hover_color = get_theme_mod('auto_parts_garage_header_menus_hover_color');
	if($auto_parts_garage_header_menus_hover_color != false){
		$auto_parts_garage_custom_css .='.main-navigation a:hover{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_header_menus_hover_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_header_submenus_color = get_theme_mod('auto_parts_garage_header_submenus_color');
	if($auto_parts_garage_header_submenus_color != false){
		$auto_parts_garage_custom_css .='.main-navigation ul ul a{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_header_submenus_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_header_submenus_hover_color = get_theme_mod('auto_parts_garage_header_submenus_hover_color');
	if($auto_parts_garage_header_submenus_hover_color != false){
		$auto_parts_garage_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$auto_parts_garage_custom_css .='color: '.esc_attr($auto_parts_garage_header_submenus_hover_color).';';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_menus_item = get_theme_mod( 'auto_parts_garage_menus_item_style','None');
    if($auto_parts_garage_menus_item == 'None'){
		$auto_parts_garage_custom_css .='.main-navigation a{';
			$auto_parts_garage_custom_css .='';
		$auto_parts_garage_custom_css .='}';
	}else if($auto_parts_garage_menus_item == 'Zoom In'){
		$auto_parts_garage_custom_css .='.main-navigation a:hover{';
			$auto_parts_garage_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important;';
		$auto_parts_garage_custom_css .='}';
	}

 	/*---------------- Footer Settings ------------------*/

	$auto_parts_garage_button_footer_heading_letter_spacing = get_theme_mod('auto_parts_garage_button_footer_heading_letter_spacing',1);
	$auto_parts_garage_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$auto_parts_garage_custom_css .='letter-spacing: '.esc_attr($auto_parts_garage_button_footer_heading_letter_spacing).'px;';
	$auto_parts_garage_custom_css .='}';

	$auto_parts_garage_button_footer_font_size = get_theme_mod('auto_parts_garage_button_footer_font_size','30');
	$auto_parts_garage_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$auto_parts_garage_custom_css .='font-size: '.esc_attr($auto_parts_garage_button_footer_font_size).'px;';
	$auto_parts_garage_custom_css .='}';

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_button_footer_text_transform','Capitalize');
	if($auto_parts_garage_theme_lay == 'Capitalize'){
		$auto_parts_garage_custom_css .='#footer h3{';
			$auto_parts_garage_custom_css .='text-transform:Capitalize;';
		$auto_parts_garage_custom_css .='}';
	}
	if($auto_parts_garage_theme_lay == 'Lowercase'){
		$auto_parts_garage_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$auto_parts_garage_custom_css .='text-transform:Lowercase;';
		$auto_parts_garage_custom_css .='}';
	}
	if($auto_parts_garage_theme_lay == 'Uppercase'){
		$auto_parts_garage_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$auto_parts_garage_custom_css .='text-transform:Uppercase;';
		$auto_parts_garage_custom_css .='}';
	}

	$auto_parts_garage_footer_heading_weight = get_theme_mod('auto_parts_garage_footer_heading_weight','600');
	if($auto_parts_garage_footer_heading_weight != false){
		$auto_parts_garage_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$auto_parts_garage_custom_css .='font-weight: '.esc_attr($auto_parts_garage_footer_heading_weight).';';
		$auto_parts_garage_custom_css .='}';
	}

	/*---------------------------Footer Style -------------------*/

	$auto_parts_garage_theme_lay = get_theme_mod( 'auto_parts_garage_footer_template','auto_parts_garage-footer-one');
    if($auto_parts_garage_theme_lay == 'auto_parts_garage-footer-one'){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='';
		$auto_parts_garage_custom_css .='}';

	}else if($auto_parts_garage_theme_lay == 'auto_parts_garage-footer-two'){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$auto_parts_garage_custom_css .='color:#000;';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='#footer ul li::before{';
			$auto_parts_garage_custom_css .='background:#000;';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$auto_parts_garage_custom_css .='border: 1px solid #000;';
		$auto_parts_garage_custom_css .='}';

	}else if($auto_parts_garage_theme_lay == 'auto_parts_garage-footer-three'){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='background: #232524;';
		$auto_parts_garage_custom_css .='}';
	}
	else if($auto_parts_garage_theme_lay == 'auto_parts_garage-footer-four'){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='background: #f7f7f7;';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field{';
			$auto_parts_garage_custom_css .='color:#000;';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='#footer ul li::before{';
			$auto_parts_garage_custom_css .='background:#000;';
		$auto_parts_garage_custom_css .='}';
		$auto_parts_garage_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$auto_parts_garage_custom_css .='border: 1px solid #000;';
		$auto_parts_garage_custom_css .='}';
	}
	else if($auto_parts_garage_theme_lay == 'auto_parts_garage-footer-five'){
		$auto_parts_garage_custom_css .='#footer{';
			$auto_parts_garage_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$auto_parts_garage_custom_css .='}';
	}
