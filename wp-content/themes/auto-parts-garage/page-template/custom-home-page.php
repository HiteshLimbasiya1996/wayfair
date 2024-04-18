<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'auto_parts_garage_before_slider' ); ?>

  <?php if( get_theme_mod( 'auto_parts_garage_slider_hide_show', false) == 1 || get_theme_mod( 'auto_parts_garage_resp_slider_hide_show', true) == 1) { ?>
    <section id="slider">
      <?php if(get_theme_mod('auto_parts_garage_slider_type', 'Default slider') == 'Default slider' ){ ?>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'auto_parts_garage_slider_speed',4000)) ?>">
          <?php $auto_parts_garage_sliders_page = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'auto_parts_garage_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $auto_parts_garage_sliders_page[] = $mod;
              }
            }
            if( !empty($auto_parts_garage_sliders_page) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $auto_parts_garage_sliders_page,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h1 class="wow slideInRight delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <p class="wow slideInRight delay-1000" data-wow-duration="2s"><?php $auto_parts_garage_excerpt = get_the_excerpt(); echo esc_html( auto_parts_garage_string_limit_words( $auto_parts_garage_excerpt, esc_attr(get_theme_mod('auto_parts_garage_slider_excerpt_number','10')))); ?></p>
                    <?php
                    $auto_parts_garage_button_text = get_theme_mod('auto_parts_garage_slider_button_text','Shop Now');
                    $auto_parts_garage_button_link = get_theme_mod('auto_parts_garage_top_button_url', '');
                    if (empty($auto_parts_garage_button_link)) {
                      $auto_parts_garage_button_link = get_permalink();
                    }
                    if ($auto_parts_garage_button_text || !empty($auto_parts_garage_button_link)) { ?>

                      <div class="slider-btn wow slideInRight delay-1000" data-wow-duration="2s">
                        <?php if( get_theme_mod('auto_parts_garage_slider_button_text','Shop Now') != ''){ ?>
                          <a href="<?php echo esc_url($auto_parts_garage_button_link); ?>" class="button redmor">
                            <?php echo esc_html($auto_parts_garage_button_text); ?>
                            <span class="screen-reader-text"><?php echo esc_html($auto_parts_garage_button_text); ?></span>
                          </a>
                        <?php } ?>
                      </div>
                    <?php }?>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <?php if(get_theme_mod('auto_parts_garage_slider_arrow_hide_show', true)){?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
              <i class="<?php echo esc_attr(get_theme_mod('auto_parts_garage_slider_prev_icon','fas fa-angle-left')); ?>"></i>
              <span class="screen-reader-text"><?php echo esc_html('Previous','auto-parts-garage'); ?></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
              <i class="<?php echo esc_attr(get_theme_mod('auto_parts_garage_slider_next_icon','fas fa-angle-right')); ?>"></i>
              <span class="screen-reader-text"><?php echo esc_html('Next','auto-parts-garage'); ?></span>
            </button>
          <?php }?>
        </div>
        <div class="clearfix"></div>
      <?php } else if(get_theme_mod('auto_parts_garage_slider_type', 'Advance slider') == 'Advance slider'){?>
      <?php echo do_shortcode(get_theme_mod('auto_parts_garage_advance_slider_shortcode')); ?>
    <?php } ?>
    </section>
  <?php }?>

  <?php do_action( 'auto_parts_garage_after_slider' ); ?>

  <?php if( get_theme_mod('auto_parts_garage_bestseller_product_page') != '' && get_theme_mod('auto_parts_garage_to_rated_product_page') != ''){ ?>
    <section id="best-seller" class="pt-5 px-2 wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="seller-head">
              <?php if( get_theme_mod('auto_parts_garage_product_title') != ''){ ?>
                <h3><?php echo esc_html(get_theme_mod('auto_parts_garage_product_title')); ?></h3>
              <?php } ?>
            </div>
            <?php if(class_exists('woocommerce')){ ?>
              <div id="selling">
                <?php 
                  $args = array( 
                    'post_type' => 'product',
                    'product_cat' => get_theme_mod('auto_parts_garage_bestseller_product_page'),
                    'order' => 'ASC'
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-box">
                      <div class="row">
                        <div class="col-lg-4 col-md-4 align-self-center">
                          <div class="product-image my-5">
                            <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-8 align-self-center">
                          <h4><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h4>
                          <p><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?></p>
                          <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                          <div class="pro-button">
                            <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  <?php endwhile;
                  wp_reset_postdata();
                ?>
              </div>
            <?php }?>
          </div>
          <div class="col-lg-4 col-md-4 my-4 px-3">
            <div class="product-img">
              <img src="<?php echo esc_url(get_theme_mod('auto_parts_garage_discount_sale_img')); ?>" alt="" />
              <div class="product-content">
                <p class="discount-text m-0"><?php echo esc_html(get_theme_mod('auto_parts_garage_product_sale_discount_text')); ?></p>
                <div class="product-btn wow slideInRight delay-1000 mt-3" data-wow-duration="2s">
                  <?php if(get_theme_mod('auto_parts_garage_product_btn_text') != ''){ ?>
                    <a href="<?php echo esc_url(get_theme_mod('auto_parts_garage_product_btn_link')); ?>"><?php echo esc_html(get_theme_mod('auto_parts_garage_product_btn_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('auto_parts_garage_product_btn_text')); ?></span></a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="seller-head">
              <?php if( get_theme_mod('auto_parts_garage_top_rated_pro_title') != ''){ ?>
                <h3><?php echo esc_html(get_theme_mod('auto_parts_garage_top_rated_pro_title')); ?></h3>
              <?php } ?>
            </div>
            <?php if(class_exists('woocommerce')){ ?>
              <div id="selling">
                <?php 
                  $args = array( 
                    'post_type' => 'product',
                    'product_cat' => get_theme_mod('auto_parts_garage_to_rated_product_page'),
                    'order' => 'ASC'
                  );
                  $loop = new WP_Query( $args );
                  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-box">
                      <div class="row">
                        <div class="col-lg-4 col-md-4 align-self-center">
                          <div class="product-image my-5">
                            <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                          </div>
                        </div>
                        <div class="col-lg-8 col-md-8 align-self-center">
                          <h4><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h4>
                          <p><?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?></p>
                          <p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
                          <div class="pro-button">
                            <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  <?php endwhile;
                  wp_reset_postdata();
                ?>
              </div>
            <?php }?>
          </div>
        </div>
      </div>
    </section>
  <?php }?>
  <?php do_action( 'auto_parts_garage_after_best_seller_product_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>