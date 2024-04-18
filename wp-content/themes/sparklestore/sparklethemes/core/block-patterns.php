<?php
/**
 * Sparkle Store: Block Patterns
 *
  * @package Sparkle_Store 1.5.9
 */

/**
 * Registers block patterns and categories.
 *
  * @package Sparkle_Store 1.5.9
 *
 * @return void
 */
function sparklestore_register_block_patterns() {

	$patterns = array();

	$block_pattern_categories = array(
		'sparklestore' => array( 'label' => __( 'Sparkle Store', 'sparklestore' ) )
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	  * @package Sparkle_Store 1.5.9
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'sparklestore_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}
add_action( 'init', 'sparklestore_register_block_patterns', 9 );
