<?php
/**
 * @package Auto Parts Garage
 * Setup the WordPress core custom header feature.
 *
 * @uses auto_parts_garage_header_style()
*/
function auto_parts_garage_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'auto_parts_garage_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 80,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'auto_parts_garage_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'auto_parts_garage_custom_header_setup' );

if ( ! function_exists( 'auto_parts_garage_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see auto_parts_garage_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'auto_parts_garage_header_style' );

function auto_parts_garage_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .middle-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: cover;
		}";
	   	wp_add_inline_style( 'auto-parts-garage-basic-style', $custom_css );
	endif;
}
endif;