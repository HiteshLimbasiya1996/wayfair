<?php
/**
 * The template part for Middle Header
 *
 * @package Auto Parts Garage
 * @subpackage auto-parts-garage
 * @since auto-parts-garage 1.0
 */
?>

<?php if( get_theme_mod( 'auto_parts_garage_topbar_hide_show', false) == 1) { ?>
  <div class="top-bar p-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-4 text-lg-start text-md-start text-center align-self-center">
          <div class="social-icons">
            <?php esc_html_e('FOLLOW US:','auto-parts-garage');?> <strong><?php dynamic_sidebar('topbar-social-icons'); ?></strong>
          </div>
        </div>
        <div class="col-lg-5 col-md-8 text-lg-center text-md-start text-center align-self-center">
          <?php if( class_exists( 'GTranslate' ) ) { ?>
            <div class="translate-lang position-relative d-md-inline-block me-3">
              <?php echo do_shortcode( '[gtranslate]' );?>
            </div>
          <?php }?>
          <?php if(class_exists('woocommerce')){ ?>
            <div class="currency-box d-md-inline-block me-3">
              <?php echo do_shortcode( '[woocommerce_currency_switcher_drop_down_box]' );?>
            </div>
          <?php } ?>
          <span class="account text-md-end text-center">
            <?php if ( is_user_logged_in() ) { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><?php esc_html_e('Login','auto-parts-garage'); ?><span class="screen-reader-text"><?php esc_html_e( 'Login','auto-parts-garage' );?></span></a>
            <?php } ?>
          </span>
        </div>
      </div>
    </div>
  </div>
<?php } ?>