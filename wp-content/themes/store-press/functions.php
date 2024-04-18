<?php
/**
 * Describe child theme functions
 *
 * @package SparkleStore
 * @subpackage Store Press
 * 
 */

/*-------------------------------------------------------------------------------------------------------------------------------*/
if ( ! function_exists( 'store_press_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function store_press_setup() {
        $store_press_theme_info = wp_get_theme();
        $GLOBALS['store_press_version'] = $store_press_theme_info->get( 'Version' );

        add_theme_support( "title-tag" );
        add_theme_support( 'automatic-feed-links' );
    }
endif;

add_action( 'after_setup_theme', 'store_press_setup' );

/**
 * Enqueue child theme styles and scripts
*/
add_action( 'wp_enqueue_scripts', 'store_press_scripts', 20 );

function store_press_scripts() {
    
    global $store_press_version;

    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false ); 

    wp_dequeue_style( 'sparklestore-style' );
    
    wp_enqueue_script( 'store-press', get_stylesheet_directory_uri()."/assets/store-press.js", array('jquery') );
    wp_enqueue_script( 'jquery.countdown', get_stylesheet_directory_uri()."/assets/jquery.countdown.js", array('jquery') );
	wp_enqueue_style( 'sparklestore-parent-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/style.css', array(), esc_attr( $store_press_version ) );
	wp_enqueue_style( 'sparklestore-parent-responsive-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/responsive.css', array(), esc_attr( $store_press_version ) );

    wp_enqueue_style( 'store-press-style', get_stylesheet_uri(), array(), esc_attr( $store_press_version ) );
    wp_enqueue_style( 'store-responsive-style', get_stylesheet_uri(), array(), esc_attr( $store_press_version ) );
    
}

if ( ! function_exists( 'store_press_child_options' ) ) {
    function store_press_child_options( $wp_customize ) {
        $wp_customize->get_control('sparklestore_banner_promo_style')->choices = array(
            'right' => esc_html__('Right', 'store-press'),
            'left' => esc_html__('Left', 'store-press'),
            'bottom' => esc_html__('Bottom', 'store-press'),
        );
    }
}
add_action( 'customize_register' , 'store_press_child_options', 11 );

/**
 * Dynamic css
*/
if ( ! function_exists( 'store_press_dynamic_css' ) ) {

    function store_press_dynamic_css() {
        
        $primary_color = get_theme_mod('sparklestore_primary_theme_color_options', '#003772');
        $rgba = sparklestore_hex2rgba($primary_color, 0.8);
        $sparklestore_colors = '';

        $sparklestore_colors ="
        .site-cart-items-wrap .count{
            background-color: {$primary_color};
        }
        .sub-footer-inner .coppyright a{
            color: {$primary_color};
        }
        ";


        $second_color = get_theme_mod('sparklestore_secondary_theme_color_options', '#f33c3c');
        $sparklestore_colors .="
        .chosen-container-single .chosen-single,
        .chosen-container-active.chosen-with-drop .chosen-single{
            background-color: {$second_color};
        }
        ";

        wp_add_inline_style( 'store-responsive-style', $sparklestore_colors );
    }
}
add_action( 'wp_enqueue_scripts', 'store_press_dynamic_css', 99 );


/**
 * Main Header Area
*/
if ( ! function_exists( 'store_press_main_header' ) ) {
	
	function store_press_main_header() { ?>

		<div class="mainheader mobile-only">
			<div class="container">
				<div class="header-middle-inner">
					<?php 
						/**
						 * Menu Toggle
						*/
						do_action('sparklestore_menu_toggle'); 
					?>

			        <div class="sparklelogo">
		              	<?php 
		              		if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							} 
						?>
		              	<div class="site-branding">				              		
		              		<h1 class="site-title">
		              			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		              				<?php bloginfo( 'name' ); ?>
		              			</a>
		              		</h1>
		              		<?php
		              		$description = get_bloginfo( 'description', 'display' );
		              		if ( $description || is_customize_preview() ) { ?>
		              			<p class="site-description"><?php echo $description; ?></p>
		              		<?php } ?>
		              	</div>
			        </div><!-- End Header Logo --> 

			        <div class="rightheaderwrapend">
	    	          	<?php if ( sparklestore_is_woocommerce_activated() ) {  ?>
	    	          		<div id="site-header-cart" class="site-header-cart block-minicart sparkle-column">
								<?php echo wp_kses_post( sparklestore_shopping_cart() ); ?>
					            <div class="shopcart-description">
									<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					            </div>
					        </div>
	    		        <?php } ?> 
			        </div>
			    </div>

			    <div class="rightheaderwrap">
		        	<div class="category-search-form">
		        	  	<?php 
		        	  		/**
		        	  		 * Normal & Advance Search
		        	  		*/
		        	  		if ( sparklestore_is_woocommerce_activated() ) {

		        	  			sparklestore_advance_product_search_form();
		        	  		}
		        	  	?>
		        	</div>
		        </div>
		        
			</div>
		</div>


		<div class="mainheader">
			<div class="container">
				<div class="header-middle-inner">
			        <div class="sparklelogo">
		              	<?php 
		              		if ( function_exists( 'the_custom_logo' ) ) {
								the_custom_logo();
							} 
						?>
		              	<div class="site-branding">				              		
		              		<h1 class="site-title">
		              			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		              				<?php bloginfo( 'name' ); ?>
		              			</a>
		              		</h1>
		              		<?php
		              		$description = get_bloginfo( 'description', 'display' );
		              		if ( $description || is_customize_preview() ) { ?>
		              			<p class="site-description"><?php echo $description; ?></p>
		              		<?php } ?>
		              	</div>
			        </div><!-- End Header Logo --> 

			        <div class="rightheaderwrap">
			        	<div class="category-search-form">
			        	  	<?php 
			        	  		/**
			        	  		 * Normal & Advance Search
			        	  		*/
			        	  		if ( sparklestore_is_woocommerce_activated() ) {

			        	  			sparklestore_advance_product_search_form();
			        	  		}else{ 
									$searchplaceholder = get_theme_mod('sparklestore_search_placeholder_text','I&#39;m searching for...' ); 
									?>
									<div class='block-search'>
									  	<form role="custom-search" method="get" action="/" class="form-search block-search advancesearch">
											<input type="hidden" name="post_type" value="post"/>
											<div class="form-content search-box results-search">
												<div class="inner">
													<input autocomplete="off" type="text" class="input searchfield txt-livesearch" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php echo esc_attr( $searchplaceholder ); ?>">
												</div>
											</div>
											<button type="submit" class="btn-submit">
												<span class="fa fa-search" aria-hidden="true"></span>
											</button>
									   	</form>
									</div>
									<?php
								  }
			        	  	?>
			        	</div>
			        </div>
                    <?php if( $phone_number = get_theme_mod('sparklestore_phone_number') ): ?>
                    <div class="rightheaderwrapend">
                        <div class="contact-info ">
                            <div class="site-cart-items-wrap">
                                <span class="cart-icon icofont-phone"></span>
                            </div>
                            <div class="contact-title-content">
                                  <h5><?php echo esc_html__('Phone Number', 'store-press');?> </h5>
                                  <span><?php echo esc_html( $phone_number );?></span>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
			        <div class="rightheaderwrapend">
                        <?php if ( sparklestore_is_woocommerce_activated() ) {  ?>
	    	          		<div id="site-header-cart" class="site-header-cart block-minicart sparkle-column">
								<?php echo wp_kses_post( sparklestore_shopping_cart() ); ?>
					            <div class="shopcart-description">
									<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
					            </div>
					        </div>
	    		        <?php } ?> 
			        </div>
			    </div>
			</div>
		</div>		    
		<?php
	}
}

add_action( 'wp_head', 'store_press_remove_action' );
function store_press_remove_action() {
    remove_action( 'sparklestore_header', 'sparklestore_main_header', 20 );
}
add_action( 'sparklestore_header', 'store_press_main_header', 20 );