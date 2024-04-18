<?php
/**
 * The template part for Middle Header
 *
 * @package Auto Parts Garage
 * @subpackage auto-parts-garage
 * @since auto-parts-garage 1.0
 */
?>

<div class="middle-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-12 text-lg-start text-md-start text-center align-self-center">
        <div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('auto_parts_garage_logo_title_hide_show',true) == 1){ ?>
                  <h1 class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('auto_parts_garage_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('auto_parts_garage_tagline_hide_show',false) == 1){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-9 col-12 align-self-center">
        <?php if(class_exists('woocommerce')){ ?>
        <div class="search-cat-box">
          <div class="row m-0">
            <div class="col-lg-4 col-md-4 border-cat py-3 px-4 position-relative">
                <button role="tab" class="product-btn"><i class="<?php echo esc_attr(get_theme_mod('auto_parts_garage_category_icon','fas fa-bars')); ?> me-2"></i><?php echo esc_html_e('CATEGORIES','auto-parts-garage'); ?></button>
                <div class="product-cat py-2 px-3">
                  <?php
                    $args = array(
                      'orderby'    => 'title',
                      'order'      => 'ASC',
                      'hide_empty' => 0,
                      'parent'  => 0
                    );
                    $product_categories = get_terms( 'product_cat', $args );
                    $count = count($product_categories);
                    if ( $count > 0 ){
                        foreach ( $product_categories as $product_category ) {
                          $product_cat_id   = $product_category->term_id;
                          $cat_link = get_category_link( $product_cat_id );
                          if ($product_category->category_parent == 0) { ?>
                        <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                        <?php
                      }
                      echo esc_html( $product_category->name ); ?></a><i class="<?php echo esc_attr(get_theme_mod('auto_parts_garage_category_list_icon','fas fa-chevron-right')); ?>"></i></li>
                      <?php }
                    }
                  ?>                
              </div>
            </div>
            <div class="col-lg-8 col-md-8 main-pro-search">              
              <?php get_product_search_form()?>
            </div>
          </div>
        </div>
        <?php }?>
      </div>
      <div class="col-lg-2 col-md-2 col-12 align-self-center phonebox">
        <span class="align-self-center phone">
          <?php if(get_theme_mod('auto_parts_garage_phone_text') != '') {?>
            <p class="mb-0"><?php echo esc_html(get_theme_mod('auto_parts_garage_phone_text')); ?></p>
          <?php }?>
          <?php if(get_theme_mod('auto_parts_garage_phone_number') != '') {?>
            <a href="tel:<?php echo esc_attr(get_theme_mod('auto_parts_garage_phone_number')) ?>"><?php echo esc_html(get_theme_mod('auto_parts_garage_phone_number')) ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('auto_parts_garage_phone_number')) ?></span></a>
          <?php }?>
        </span>
      </div>
      <div class="col-lg-1 col-md-1 col-12 align-self-center cartbox">
        <?php if(class_exists('woocommerce')){ ?>
          <span class="cart_no">
            <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','auto-parts-garage' ); ?>"><i class="<?php echo esc_attr(get_theme_mod('auto_parts_garage_cart_icon','fas fa-shopping-cart')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','auto-parts-garage' );?></span></a>
              <span class="cart-value"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></span>
          </span>
        <?php }?>
      </div>
    </div>
  </div>
</div>