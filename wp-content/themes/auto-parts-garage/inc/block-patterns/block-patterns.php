<?php
/**
 *  Auto Parts Garage: Block Patterns
 *
 * @package  Auto Parts Garage
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'auto-parts-garage',
		array( 'label' => __( 'Auto Parts Garage', 'auto-parts-garage' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'auto-parts-garage/banner-section',
		array(
			'title'      => __( 'Banner Section', 'auto-parts-garage' ),
			'categories' => array( 'auto-parts-garage' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":170,\"dimRatio\":0,\"isDark\":false,\"align\":\"full\",\"className\":\"auto-parts-garage-slider-section\"} -->\n<div class=\"wp-block-cover alignfull is-light auto-parts-garage-slider-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-170\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"className\":\"slider-left\"} -->\n<div class=\"wp-block-column slider-left\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"slider-content\"} -->\n<div class=\"wp-block-column slider-content\"><!-- wp:heading {\"level\":1,\"style\":{\"color\":{\"text\":\"#1b1b1b\"}},\"className\":\"slider-heading\"} -->\n<h1 class=\"slider-heading has-text-color\" style=\"color:#1b1b1b\">Custom Rims Best Performance</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"color\":{\"text\":\"#1b1b1b\"}},\"className\":\"slider-para\"} -->\n<p class=\"slider-para has-text-color\" style=\"color:#1b1b1b\">Credibly reintemediate backend ideas for cross platform models</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"className\":\"slider-btn\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons slider-btn\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#1b1b1b\",\"background\":\"#fdb819\"},\"border\":{\"radius\":\"20px\"}},\"className\":\"is-style-fill\"} -->\n<div class=\"wp-block-button is-style-fill\"><a class=\"wp-block-button__link has-text-color has-background wp-element-button\" style=\"border-radius:20px;color:#1b1b1b;background-color:#fdb819\">SHOP NOW</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'auto-parts-garage/products-seller-section',
		array(
			'title'      => __( 'Products Seller Section', 'auto-parts-garage' ),
			'categories' => array( 'auto-parts-garage' ),
			'content'    => "<!-- wp:columns {\"className\":\"auto-parts-garage-product-section\"} -->\n<div class=\"wp-block-columns auto-parts-garage-product-section\"><!-- wp:column {\"width\":\"33%\",\"className\":\"product-section\"} -->\n<div class=\"wp-block-column product-section\" style=\"flex-basis:33%\"><!-- wp:heading {\"level\":3,\"style\":{\"color\":{\"text\":\"#010146\"}},\"className\":\"product-heading\"} -->\n<h3 class=\"product-heading has-text-color\" style=\"color:#010146\">Sale Products</h3>\n<!-- /wp:heading -->\n\n<!-- wp:woocommerce/product-category {\"columns\":1,\"rows\":2,\"categories\":[16],\"stockStatus\":[\"\",\"instock\",\"outofstock\",\"onbackorder\"],\"className\":\"product-cat\"} /--></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33%\",\"className\":\"cover-section\"} -->\n<div class=\"wp-block-column cover-section\" style=\"flex-basis:33%\"><!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/offer.png\",\"id\":143,\"dimRatio\":50,\"focalPoint\":{\"x\":0.5,\"y\":0.5}} -->\n<div class=\"wp-block-cover\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-143\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/offer.png\" style=\"object-position:50% 50%\" data-object-fit=\"cover\" data-object-position=\"50% 50%\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"placeholder\":\"Write title…\",\"className\":\"cover-heading\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center cover-heading has-large-font-size\">30% OFF</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"className\":\"cover-btn\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons cover-btn\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#1b1b1b\",\"background\":\"#fdb819\"},\"border\":{\"radius\":\"20px\"}}} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-text-color has-background wp-element-button\" style=\"border-radius:20px;color:#1b1b1b;background-color:#fdb819\">VIEW DETAILS</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33%\",\"className\":\"product-section\"} -->\n<div class=\"wp-block-column product-section\" style=\"flex-basis:33%\"><!-- wp:heading {\"level\":3,\"style\":{\"color\":{\"text\":\"#010146\"}},\"className\":\"product-heading\"} -->\n<h3 class=\"product-heading has-text-color\" style=\"color:#010146\">Top Rated Product</h3>\n<!-- /wp:heading -->\n\n<!-- wp:woocommerce/product-category {\"columns\":1,\"rows\":2,\"categories\":[16],\"className\":\"product-cat\"} /--></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}