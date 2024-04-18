<?php
//about theme info
add_action( 'admin_menu', 'auto_parts_garage_gettingstarted' );
function auto_parts_garage_gettingstarted() {
	add_theme_page( esc_html__('About Auto Parts Garage', 'auto-parts-garage'), esc_html__('About Auto Parts Garage', 'auto-parts-garage'), 'edit_theme_options', 'auto_parts_garage_guide', 'auto_parts_garage_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function auto_parts_garage_admin_theme_style() {
	wp_enqueue_style('auto-parts-garage-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('auto-parts-garage-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'auto_parts_garage_admin_theme_style');

//guidline for about theme
function auto_parts_garage_mostrar_guide() { 
	//custom function about theme customizer
	$auto_parts_garage_return = add_query_arg( array()) ;
	$auto_parts_garage_theme = wp_get_theme( 'auto-parts-garage' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Auto Parts Garage', 'auto-parts-garage' ); ?> <span class="version"><?php esc_html_e( 'Version', 'auto-parts-garage' ); ?>: <?php echo esc_html($auto_parts_garage_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','auto-parts-garage'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Auto Parts Garage at 20% Discount','auto-parts-garage'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','auto-parts-garage'); ?> ( <span><?php esc_html_e('vwpro20','auto-parts-garage'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'auto-parts-garage' ); ?></a>
			</div>
		</div>
	</div>
    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="auto_parts_garage_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'auto-parts-garage' ); ?></button>
			<button class="tablinks" onclick="auto_parts_garage_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'auto-parts-garage' ); ?></button>
			<button class="tablinks" onclick="auto_parts_garage_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'auto-parts-garage' ); ?></button>
			<button class="tablinks" onclick="auto_parts_garage_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'auto-parts-garage' ); ?></button>
			<button class="tablinks" onclick="auto_parts_garage_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'auto-parts-garage' ); ?></button>
		  	<button class="tablinks" onclick="auto_parts_garage_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'auto-parts-garage' ); ?></button>
		</div>

		<?php
			$auto_parts_garage_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$auto_parts_garage_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Auto_Parts_Garage_Plugin_Activation_Settings::get_instance();
				$auto_parts_garage_actions = $plugin_ins->recommended_actions;
				?>
				<div class="auto-parts-garage-recommended-plugins">
				    <div class="auto-parts-garage-action-list">
				        <?php if ($auto_parts_garage_actions): foreach ($auto_parts_garage_actions as $key => $auto_parts_garage_actionValue): ?>
				                <div class="auto-parts-garage-action" id="<?php echo esc_attr($auto_parts_garage_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($auto_parts_garage_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($auto_parts_garage_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($auto_parts_garage_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','auto-parts-garage'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($auto_parts_garage_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'auto-parts-garage' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('The Auto Parts Garage is a remarkable option for automotive businesses that want to establish an online presence. This Autoparts Garage offers a sleek, modern, and professional design, making it ideal for auto parts stores, garages, car-repair, automotive shops, mechanic shop, automobile, and workshops. Its user-friendly interface makes customization simple, even for those with limited web design experience. The theme offers a full-width header with a background image that is perfect for displaying your products and services. The Autoparts Garage can be used for businesses that deal in Car Service Mot, Tires, Brakes Hire, Automotive, Auto Care, Maintenance, Vehicle Diagnostics, Auto Glass, Body Shops,Tyre, Auto Inspections, repair services, accessories, dealerships, workshops, and garages. The Auotparts theme for WordPress also has a catalog section allowing you to present your offerings neat and attractively. The services section lets you showcase your workshops specialties and the services you offer. The Auto Parts Garage has a responsive design, so your website will look great on any device, including desktops, laptops, tablets, and smartphones. This is especially important in the automotive industry, where customers often search for parts and services while theyre on the go. The theme is also search engine optimized, which helps increase your online visibility and attract more potential customers to your website. It has several customization options, including custom colors, fonts, and logo upload, so you can easily make your website unique and reflective of your brand. Plus, it integrates seamlessly with WooCommerce, Ibtana website builder, Contact Form 7, Classic Widget, YITH Woocommerce Wishlist, Curcy- Multi currency for Woocommerce, making it easy to sell your products and services directly from your website. The Auto Parts Garage is a versatile and professional choice for automotive businesses. Demo: https://www.vwthemes.net/auto-parts-garage/','auto-parts-garage'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'auto-parts-garage' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'auto-parts-garage' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'auto-parts-garage' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'auto-parts-garage'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'auto-parts-garage'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'auto-parts-garage'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'auto-parts-garage'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'auto-parts-garage'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'auto-parts-garage'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'auto-parts-garage'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'auto-parts-garage'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'auto-parts-garage'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'auto-parts-garage' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','auto-parts-garage'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','auto-parts-garage'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','auto-parts-garage'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_best_seller_products_section') ); ?>" target="_blank"><?php esc_html_e('Product Seller Section','auto-parts-garage'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','auto-parts-garage'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','auto-parts-garage'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','auto-parts-garage'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','auto-parts-garage'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','auto-parts-garage'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','auto-parts-garage'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','auto-parts-garage'); ?></span><?php esc_html_e(' Go to ','auto-parts-garage'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','auto-parts-garage'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','auto-parts-garage'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','auto-parts-garage'); ?></span><?php esc_html_e(' Go to ','auto-parts-garage'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','auto-parts-garage'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','auto-parts-garage'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','auto-parts-garage'); ?> <a class="doc-links" href="<?php echo esc_url( AUTO_PARTS_GARAGE_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','auto-parts-garage'); ?></a></p>
			  	</div>
			</div>
		</div>

			<div id="block_pattern" class="tabcontent">
				<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$plugin_ins = auto_parts_garage_Plugin_Activation_Settings::get_instance();
				$auto_parts_garage_actions = $plugin_ins->recommended_actions;
				?>
				<div class="auto-parts-garage-recommended-plugins">
				    <div class="auto-parts-garage-action-list">
				        <?php if ($auto_parts_garage_actions): foreach ($auto_parts_garage_actions as $key => $auto_parts_garage_actionValue): ?>
				                <div class="auto-parts-garage-action" id="<?php echo esc_attr($auto_parts_garage_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($auto_parts_garage_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($auto_parts_garage_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($auto_parts_garage_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','auto-parts-garage'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
				<?php } ?>
				<div class="gutenberg-editor-tab" style="<?php echo esc_attr($auto_parts_garage_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'auto-parts-garage' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','auto-parts-garage'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon ','auto-parts-garage'); ?></span></b></p>
	              	<div class="auto-parts-garage-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','auto-parts-garage'); ?></a>
				    </div>
				    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
				    <p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Section >> Publish.','auto-parts-garage'); ?></span></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'auto-parts-garage' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','auto-parts-garage'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','auto-parts-garage'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','auto-parts-garage'); ?></a>
							</div>

							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','auto-parts-garage'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','auto-parts-garage'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','auto-parts-garage'); ?></a>
							</div>
						</div>
					</div>
				</div>
	     	</div>
			</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Auto_Parts_Garage_Plugin_Activation_Settings::get_instance();
			$auto_parts_garage_actions = $plugin_ins->recommended_actions;
			?>
				<div class="auto-parts-garage-recommended-plugins">
				    <div class="auto-parts-garage-action-list">
				        <?php if ($auto_parts_garage_actions): foreach ($auto_parts_garage_actions as $key => $auto_parts_garage_actionValue): ?>
				                <div class="auto-parts-garage-action" id="<?php echo esc_attr($auto_parts_garage_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($auto_parts_garage_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($auto_parts_garage_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($auto_parts_garage_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'auto-parts-garage' ); ?></h3>
				<hr class="h3hr">
				<div class="auto-parts-garage-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','auto-parts-garage'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'auto-parts-garage' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','auto-parts-garage'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','auto-parts-garage'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','auto-parts-garage'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','auto-parts-garage'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=auto_parts_garage_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','auto-parts-garage'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','auto-parts-garage'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

					<div id="product_addons_editor" class="tabcontent">
				<?php if(!class_exists('IEPA_Loader')){
					$plugin_ins = Auto_Parts_Garage_Plugin_Activation_Woo_Products::get_instance();
					$auto_parts_garage_actions = $plugin_ins->recommended_actions;
					?>
					<div class="auto-parts-garage-recommended-plugins">
						    <div class="auto-parts-garage-action-list">
						        <?php if ($auto_parts_garage_actions): foreach ($auto_parts_garage_actions as $key => $auto_parts_garage_actionValue): ?>
						                <div class="auto-parts-garage-action" id="<?php echo esc_attr($auto_parts_garage_actionValue['id']);?>">
					                        <div class="action-inner plugin-activation-redirect">
					                            <h3 class="action-title"><?php echo esc_html($auto_parts_garage_actionValue['title']); ?></h3>
					                            <div class="action-desc"><?php echo esc_html($auto_parts_garage_actionValue['desc']); ?></div>
					                            <?php echo wp_kses_post($auto_parts_garage_actionValue['link']); ?>
					                        </div>
						                </div>
						            <?php endforeach;
						        endif; ?>
						    </div>
					</div>
				<?php }else{ ?>
					<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'auto-parts-garage' ); ?></h3>
					<hr class="h3hr">
					<div class="auto-parts-garage-pattern-page">
						<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','auto-parts-garage'); ?></p>
						<p><b><?php esc_html_e('1. First you need to activate these plugins','auto-parts-garage'); ?></b></p>
							<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','auto-parts-garage'); ?></p>
							<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','auto-parts-garage'); ?></p>
							<p><?php esc_html_e('3. Woocommerce','auto-parts-garage'); ?></p>

						<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','auto-parts-garage'); ?></span></b></p>
		              	<div class="auto-parts-garage-pattern-page">
				    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','auto-parts-garage'); ?></a>
				    	</div>
		              	<p><?php esc_html_e('You can create a template as you like.','auto-parts-garage'); ?></span></p>
				    </div>
				<?php } ?>
			</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'auto-parts-garage' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Garage WordPress Theme is a visually compelling and powerful theme for setting up websites for car repair or Garage store. It is a technically sound theme with a high-class and bold design for car accessories store, auto mechanic firm, or any business related to the auto industry. This WP Garage WordPress Theme is intuitively designed to fulfill the requirements of auto parts stores. The simple menu and pagination options make navigation experience a lot better. You can categorize your content as per the various sections included in the theme. Display the information about your store in the about us section. You can add the essential details such as contact number on the header itself. It bears an attractive slider that is full-width and displays images of different Garage and products you sell. The order of the theme sections can be altered to prioritize the content as per your demands.','auto-parts-garage'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'auto-parts-garage'); ?></a>
					<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'auto-parts-garage'); ?></a>
					<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'auto-parts-garage'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'auto-parts-garage' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'auto-parts-garage'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'auto-parts-garage'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'auto-parts-garage'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'auto-parts-garage'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'auto-parts-garage'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'auto-parts-garage'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'auto-parts-garage'); ?></td>
								<td class="table-img"><?php esc_html_e('11', 'auto-parts-garage'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'auto-parts-garage'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'auto-parts-garage'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'auto-parts-garage'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'auto-parts-garage'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'auto-parts-garage'); ?></td>
								<td class="table-img"><?php esc_html_e('13', 'auto-parts-garage'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'auto-parts-garage'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'auto-parts-garage'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'auto-parts-garage'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'auto-parts-garage'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'auto-parts-garage'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'auto-parts-garage'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('WordPress 6.4 or later', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'auto-parts-garage'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( AUTO_PARTS_GARAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'auto-parts-garage'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'auto-parts-garage'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'auto-parts-garage'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'auto-parts-garage'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'auto-parts-garage'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'auto-parts-garage'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'auto-parts-garage'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'auto-parts-garage'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'auto-parts-garage'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'auto-parts-garage'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'auto-parts-garage'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'auto-parts-garage'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','auto-parts-garage'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'auto-parts-garage'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'auto-parts-garage'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTO_PARTS_GARAGE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'auto-parts-garage'); ?></a>
				</div>
		  	</div>
		</div>

	</div>
</div>

<?php } ?>