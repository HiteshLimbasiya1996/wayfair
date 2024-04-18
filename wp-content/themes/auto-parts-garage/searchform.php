<?php
/**
 * The template for displaying search forms in auto-parts-garage
 *
 * @package Auto Parts Garage
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'auto-parts-garage' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'SEARCH', 'placeholder','auto-parts-garage' ); ?>" value="<?php echo esc_attr( get_search_query()); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'SEARCH', 'submit button','auto-parts-garage' ); ?>">
</form>