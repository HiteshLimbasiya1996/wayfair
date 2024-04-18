<?php
/**
 * Auto Parts Garage Theme Customizer
 *
 * @package Auto Parts Garage
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function auto_parts_garage_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'auto_parts_garage_custom_controls' );

function Auto_Parts_Garage_Customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'Auto_Parts_Garage_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'Auto_Parts_Garage_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'auto_parts_garage_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'auto-parts-garage' ),
		'priority' => 10,
	));

	//Menus Settings
	$wp_customize->add_section( 'auto_parts_garage_menu_section' , array(
  	'title' => __( 'Menus Settings', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_panel_id'
	) );

	$wp_customize->add_setting('auto_parts_garage_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','auto-parts-garage'),
		'description'	=> __('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_navigation_menu_font_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','auto-parts-garage'),
        'section' => 'auto_parts_garage_menu_section',
        'choices' => array(
        	'100' => __('100','auto-parts-garage'),
            '200' => __('200','auto-parts-garage'),
            '300' => __('300','auto-parts-garage'),
            '400' => __('400','auto-parts-garage'),
            '500' => __('500','auto-parts-garage'),
            '600' => __('600','auto-parts-garage'),
            '700' => __('700','auto-parts-garage'),
            '800' => __('800','auto-parts-garage'),
            '900' => __('900','auto-parts-garage'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('auto_parts_garage_menu_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menu Text Transform','auto-parts-garage'),
		'choices' => array(
      'Uppercase' => __('Uppercase','auto-parts-garage'),
      'Capitalize' => __('Capitalize','auto-parts-garage'),
      'Lowercase' => __('Lowercase','auto-parts-garage'),
      ),
		'section'=> 'auto_parts_garage_menu_section',
	));

	$wp_customize->add_setting('auto_parts_garage_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_menus_item_style',array(
    'type' => 'select',
    'section' => 'auto_parts_garage_menu_section',
		'label' => __('Menu Item Hover Style','auto-parts-garage'),
		'choices' => array(
      'None' => __('None','auto-parts-garage'),
      'Zoom In' => __('Zoom In','auto-parts-garage'),
      ),
	) );

	$wp_customize->add_setting('auto_parts_garage_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_header_menus_color', array(
		'label'    => __('Menus Color', 'auto-parts-garage'),
		'section'  => 'auto_parts_garage_menu_section',
	)));

	$wp_customize->add_setting('auto_parts_garage_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'auto-parts-garage'),
		'section'  => 'auto_parts_garage_menu_section',
	)));

	$wp_customize->add_setting('auto_parts_garage_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'auto-parts-garage'),
		'section'  => 'auto_parts_garage_menu_section',
	)));

	$wp_customize->add_setting('auto_parts_garage_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'auto-parts-garage'),
		'section'  => 'auto_parts_garage_menu_section',
	)));

	//Topbar
	$wp_customize->add_section( 'auto_parts_garage_topbar_section' , array(
  	'title' => __( 'Topbar Section', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_panel_id'
	) );

	$wp_customize->add_setting( 'auto_parts_garage_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ));
    $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','auto-parts-garage' ),
      'section' => 'auto_parts_garage_topbar_section'
    )));

	//Header
	$wp_customize->add_section( 'auto_parts_garage_header_settings' , array(
    	'title'      => __( 'Header', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_panel_id'
	) );

 	// Header Background color
	$wp_customize->add_setting('auto_parts_garage_header_background_color', array(
		'default'           => '#282828',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_header_background_color', array(
		'label'    => __('Header Background Color', 'auto-parts-garage'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('auto_parts_garage_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','auto-parts-garage'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'auto-parts-garage' ),
			'center top'   => esc_html__( 'Top', 'auto-parts-garage' ),
			'right top'   => esc_html__( 'Top Right', 'auto-parts-garage' ),
			'left center'   => esc_html__( 'Left', 'auto-parts-garage' ),
			'center center'   => esc_html__( 'Center', 'auto-parts-garage' ),
			'right center'   => esc_html__( 'Right', 'auto-parts-garage' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'auto-parts-garage' ),
			'center bottom'   => esc_html__( 'Bottom', 'auto-parts-garage' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'auto-parts-garage' ),
		),
	));

	$wp_customize->add_setting('auto_parts_garage_phone_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_phone_text',array(
		'label'	=> esc_html__('Add Phone Text','auto-parts-garage'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Phone', 'auto-parts-garage' ),
    ),
		'section'=> 'auto_parts_garage_header_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'auto_parts_garage_sanitize_number_absint'
	));
	$wp_customize->add_control('auto_parts_garage_phone_number',array(
		'label'	=> esc_html__('Phone Number','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '+12 123 456 7890', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_header_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_cart_icon',array(
		'default'	=> 'fas fa-shopping-cart',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new auto_parts_garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_cart_icon',array(
		'label'	=> __('Add Phone Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_header_settings',
		'setting'	=> 'auto_parts_garage_cart_icon',
		'type'		=> 'icon'
	)));

  //Menus Settings
  $wp_customize->add_section( 'auto_parts_garage_menu_section' , array(
      'title' => __( 'Menus Settings', 'auto-parts-garage' ),
    'panel' => 'auto_parts_garage_panel_id'
  ) );

  $wp_customize->add_setting('auto_parts_garage_navigation_menu_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_navigation_menu_font_size',array(
    'label' => __('Menus Font Size','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
            'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
    'section'=> 'auto_parts_garage_menu_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('auto_parts_garage_navigation_menu_font_weight',array(
    'default' => 600,
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control('auto_parts_garage_navigation_menu_font_weight',array(
    'type' => 'select',
    'label' => __('Menus Font Weight','auto-parts-garage'),
    'section' => 'auto_parts_garage_menu_section',
    'choices' => array(
      '100' => __('100','auto-parts-garage'),
        '200' => __('200','auto-parts-garage'),
        '300' => __('300','auto-parts-garage'),
        '400' => __('400','auto-parts-garage'),
        '500' => __('500','auto-parts-garage'),
        '600' => __('600','auto-parts-garage'),
        '700' => __('700','auto-parts-garage'),
        '800' => __('800','auto-parts-garage'),
        '900' => __('900','auto-parts-garage'),
        ),
  ) );

  // text trasform
  $wp_customize->add_setting('auto_parts_garage_menu_text_transform',array(
    'default'=> 'Uppercase',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control('auto_parts_garage_menu_text_transform',array(
    'type' => 'radio',
    'label' => __('Menus Text Transform','auto-parts-garage'),
    'choices' => array(
            'Uppercase' => __('Uppercase','auto-parts-garage'),
            'Capitalize' => __('Capitalize','auto-parts-garage'),
            'Lowercase' => __('Lowercase','auto-parts-garage'),
        ),
    'section'=> 'auto_parts_garage_menu_section',
  ));

  $wp_customize->add_setting('auto_parts_garage_menus_item_style',array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control('auto_parts_garage_menus_item_style',array(
    'type' => 'select',
    'section' => 'auto_parts_garage_menu_section',
    'label' => __('Menu Item Hover Style','auto-parts-garage'),
    'choices' => array(
        'None' => __('None','auto-parts-garage'),
        'Zoom In' => __('Zoom In','auto-parts-garage'),
        ),
  ) );

  $wp_customize->add_setting('auto_parts_garage_header_menus_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_header_menus_color', array(
    'label'    => __('Menus Color', 'auto-parts-garage'),
    'section'  => 'auto_parts_garage_menu_section',
  )));

  $wp_customize->add_setting('auto_parts_garage_header_menus_hover_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_header_menus_hover_color', array(
    'label'    => __('Menus Hover Color', 'auto-parts-garage'),
    'section'  => 'auto_parts_garage_menu_section',
  )));

  $wp_customize->add_setting('auto_parts_garage_header_submenus_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_header_submenus_color', array(
    'label'    => __('Sub Menus Color', 'auto-parts-garage'),
    'section'  => 'auto_parts_garage_menu_section',
  )));

  $wp_customize->add_setting('auto_parts_garage_header_submenus_hover_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_header_submenus_hover_color', array(
    'label'    => __('Sub Menus Hover Color', 'auto-parts-garage'),
    'section'  => 'auto_parts_garage_menu_section',
  )));

	//Slider
	$wp_customize->add_section( 'auto_parts_garage_slidersettings' , array(
  	'title'      => __( 'Slider Settings', 'auto-parts-garage' ),
  	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/garage-wordpress-theme/">GET PRO</a>','auto-parts-garage'),
		'panel' => 'auto_parts_garage_panel_id'
	) );

	$wp_customize->add_setting( 'auto_parts_garage_slider_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ));
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_slider_hide_show',array(
    'label' => esc_html__( 'Show / Hide Slider','auto-parts-garage' ),
    'section' => 'auto_parts_garage_slidersettings'
  )));

 	//Selective Refresh
  $wp_customize->selective_refresh->add_partial('auto_parts_garage_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'Auto_Parts_Garage_Customize_partial_auto_parts_garage_slider_hide_show',
	));

  $wp_customize->add_setting('auto_parts_garage_slider_type',array(
    'default' => 'Default slider',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	) );
	$wp_customize->add_control('auto_parts_garage_slider_type', array(
    'type' => 'select',
    'label' => __('Slider Type','auto-parts-garage'),
    'section' => 'auto_parts_garage_slidersettings',
    'choices' => array(
        'Default slider' => __('Default slider','auto-parts-garage'),
        'Advance slider' => __('Advance slider','auto-parts-garage'),
        ),
	));

	$wp_customize->add_setting('auto_parts_garage_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','auto-parts-garage'),
		'section'=> 'auto_parts_garage_slidersettings',
		'type'=> 'text',
		'active_callback' => 'auto_parts_garage_advance_slider'
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'auto_parts_garage_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'auto_parts_garage_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'auto_parts_garage_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'auto-parts-garage' ),
			'description' => __('Slider image size (1400 x 550)','auto-parts-garage'),
			'section'  => 'auto_parts_garage_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'auto_parts_garage_default_slider'
		) );
	}

	$wp_customize->add_setting('auto_parts_garage_slider_button_text',array(
		'default'=> 'Shop Now',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','auto-parts-garage'),
		'input_attrs' => array(
    'placeholder' => __( 'Start Exploring', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_slidersettings',
		'type'=> 'text',
		'active_callback' => 'auto_parts_garage_default_slider'
	));

	$wp_customize->add_setting('auto_parts_garage_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('auto_parts_garage_top_button_url',array(
		'label'	=> __('Add Button URL','auto-parts-garage'),
		'section'	=> 'auto_parts_garage_slidersettings',
		'setting'	=> 'auto_parts_garage_top_button_url',
		'type'	=> 'url',
		'active_callback' => 'auto_parts_garage_default_slider'
	));

	//content layout
	$wp_customize->add_setting('auto_parts_garage_slider_content_option',array(
    'default' => 'Right',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control(new auto_parts_garage_Image_Radio_Control($wp_customize, 'auto_parts_garage_slider_content_option', array(
    'type' => 'select',
    'label' => esc_html__('Slider Content Layouts','auto-parts-garage'),
    'section' => 'auto_parts_garage_slidersettings',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),'active_callback' => 'auto_parts_garage_default_slider'
    )));

  //Slider content padding
  $wp_customize->add_setting('auto_parts_garage_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','auto-parts-garage'),
		'description'	=> __('Enter a value in %. Example:20%','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_slidersettings',
		'type'=> 'text',
		'active_callback' => 'auto_parts_garage_default_slider'
	));

	$wp_customize->add_setting('auto_parts_garage_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','auto-parts-garage'),
		'description'	=> __('Enter a value in %. Example:20%','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_slidersettings',
		'type'=> 'text',
		'active_callback' => 'auto_parts_garage_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'auto_parts_garage_slider_excerpt_number', array(
		'default'              => 25,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'auto_parts_garage_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_slidersettings',
		'type'        => 'range',
		'settings'    => 'auto_parts_garage_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'auto_parts_garage_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('auto_parts_garage_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_slider_height',array(
		'label'	=> __('Slider Height','auto-parts-garage'),
		'description'	=> __('Specify the slider height (px).','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_slidersettings',
		'type'=> 'text',
		'active_callback' => 'auto_parts_garage_default_slider'
	));

	$wp_customize->add_setting( 'auto_parts_garage_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'auto_parts_garage_sanitize_float'
	) );
	$wp_customize->add_control( 'auto_parts_garage_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','auto-parts-garage'),
		'section' => 'auto_parts_garage_slidersettings',
		'type'  => 'number',
		'active_callback' => 'auto_parts_garage_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('auto_parts_garage_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));

	$wp_customize->add_control( 'auto_parts_garage_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_slidersettings',
		'type'        => 'select',
		'settings'    => 'auto_parts_garage_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','auto-parts-garage'),
	      '0.1' =>  esc_attr('0.1','auto-parts-garage'),
	      '0.2' =>  esc_attr('0.2','auto-parts-garage'),
	      '0.3' =>  esc_attr('0.3','auto-parts-garage'),
	      '0.4' =>  esc_attr('0.4','auto-parts-garage'),
	      '0.5' =>  esc_attr('0.5','auto-parts-garage'),
	      '0.6' =>  esc_attr('0.6','auto-parts-garage'),
	      '0.7' =>  esc_attr('0.7','auto-parts-garage'),
	      '0.8' =>  esc_attr('0.8','auto-parts-garage'),
	      '0.9' =>  esc_attr('0.9','auto-parts-garage')
	),'active_callback' => 'auto_parts_garage_default_slider'
	));

	$wp_customize->add_setting( 'auto_parts_garage_slider_image_overlay',array(
    	'default' => '',
    	'transport' => 'refresh',
    	'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
   ));
   $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','auto-parts-garage' ),
      	'section' => 'auto_parts_garage_slidersettings',
      	'active_callback' => 'auto_parts_garage_default_slider'
   )));

   $wp_customize->add_setting('auto_parts_garage_slider_image_overlay_color', array(
		'default'           => 1,
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'auto-parts-garage'),
		'section'  => 'auto_parts_garage_slidersettings',
		'active_callback' => 'auto_parts_garage_default_slider'
	)));

	$wp_customize->add_setting( 'auto_parts_garage_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'auto_parts_garage_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','auto-parts-garage'),
		'section' => 'auto_parts_garage_slidersettings',
		'type'  => 'text',
		'active_callback' => 'auto_parts_garage_default_slider'
	) );

	$wp_customize->add_setting( 'auto_parts_garage_slider_arrow_hide_show',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
	));
	$wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','auto-parts-garage' ),
		'section' => 'auto_parts_garage_slidersettings',
		'active_callback' => 'auto_parts_garage_default_slider'
	)));

	$wp_customize->add_setting('auto_parts_garage_slider_prev_icon',array(
		'default'	=> 'fas fa-angle-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_slider_prev_icon',array(
		'label'	=> __('Add Slider Prev Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_slidersettings',
		'setting'	=> 'auto_parts_garage_slider_prev_icon',
		'type'		=> 'icon',
		'active_callback' => 'auto_parts_garage_default_slider'
	)));

	$wp_customize->add_setting('auto_parts_garage_slider_next_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_slidersettings',
		'setting'	=> 'auto_parts_garage_slider_next_icon',
		'type'		=> 'icon',
		'active_callback' => 'auto_parts_garage_default_slider'
	)));

	//Features Section
	$wp_customize->add_section('auto_parts_garage_features_section', array(
		'title'       => __('Features Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_features_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_features_text',array(
		'description' => __('<p>1. More options for features section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for features section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_features_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_features_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_features_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_features_section',
		'type'=> 'hidden'
	));

	//banner Section
	$wp_customize->add_section('auto_parts_garage_banner_section', array(
		'title'       => __('Banner Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_banner_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_banner_text',array(
		'description' => __('<p>1. More options for banner section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for banner section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_banner_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_banner_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_banner_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_banner_section',
		'type'=> 'hidden'
	));

	//popular parts Section
	$wp_customize->add_section('auto_parts_garage_popular_parts_section', array(
		'title'       => __('Popular Parts Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_popular_parts_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_popular_parts_text',array(
		'description' => __('<p>1. More options for popular parts section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for popular parts section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_popular_parts_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_popular_parts_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_popular_parts_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_popular_parts_section',
		'type'=> 'hidden'
	));

	//auto parts Section
	$wp_customize->add_section('auto_parts_garage_auto_parts_section', array(
		'title'       => __('Auto Parts Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_auto_parts_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_auto_parts_text',array(
		'description' => __('<p>1. More options for auto parts section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for auto parts section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_auto_parts_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_auto_parts_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_auto_parts_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_auto_parts_section',
		'type'=> 'hidden'
	));

	//Discover Now Section
	$wp_customize->add_section('auto_parts_garage_discovernow_section', array(
		'title'       => __('Discover Now Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_discovernow_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_discovernow_text',array(
		'description' => __('<p>1. More options for discover now section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for discover now section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_discovernow_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_discovernow_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_discovernow_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_discovernow_section',
		'type'=> 'hidden'
	));

	//new-arrivals Section
	$wp_customize->add_section('auto_parts_garage_new_arrivals_section', array(
		'title'       => __('New Arrivals Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_new_arrivals_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_new_arrivals_text',array(
		'description' => __('<p>1. More options for new arrivals section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for new arrivals section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_new_arrivals_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_new_arrivals_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_new_arrivals_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_new_arrivals_section',
		'type'=> 'hidden'
	));

	//Deal of Week Section
	$wp_customize->add_section('auto_parts_garage_dealof_week_section', array(
		'title'       => __('Deal of Week Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_dealof_week_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_dealof_week_text',array(
		'description' => __('<p>1. More options for deal of week section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for deal of week section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_dealof_week_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_dealof_week_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_dealof_week_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_dealof_week_section',
		'type'=> 'hidden'
	));

	//Seller Products Section
	$wp_customize->add_section('auto_parts_garage_best_seller_products_section',array(
		'title'	=> __('Products Seller Section','auto-parts-garage'),
		'description' => __('For more options of product section</br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/garage-wordpress-theme/">GET PRO</a>','auto-parts-garage'),
		'panel' => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_product_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_product_title',array(
		'label'	=> __('Add Sale Products Title','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( 'Sale Products', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_best_seller_products_section',
		'type'=> 'text'
	));

	$args = array(
       'type'             => 'product',
        'child_of'        => 0,
        'parent'          => '',
        'orderby'         => 'term_group',
        'order'           => 'ASC',
        'hide_empty'      => false,
        'hierarchical'    => 1,
        'number'          => '',
        'taxonomy'        => 'product_cat',
        'pad_counts'      => false
    );
	$categories = get_categories($args);
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('auto_parts_garage_bestseller_product_page',array(
		'default'	=> 'select',
		'sanitize_callback' => 'auto_parts_garage_sanitize_choices',
	));
	$wp_customize->add_control('auto_parts_garage_bestseller_product_page',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Products','auto-parts-garage'),
		'section' => 'auto_parts_garage_best_seller_products_section',
	));

	$wp_customize->add_setting('auto_parts_garage_discount_sale_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'auto_parts_garage_discount_sale_img',array(
	    'label' => __('Select Product Image','auto-parts-garage'),
			'description' => __('Select Product Sale Image (320 x 300)','auto-parts-garage'),
	     'section' => 'auto_parts_garage_best_seller_products_section'
	)));

	$wp_customize->add_setting('auto_parts_garage_product_sale_discount_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_product_sale_discount_text',array(
		'label'	=> __('Add Sale Products Discount Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '30% OFF', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_best_seller_products_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_product_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_product_btn_text',array(
		'label'	=> esc_html__('Add Product Button Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'VIEW DETAILS', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_best_seller_products_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_product_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('auto_parts_garage_product_btn_link',array(
		'label'	=> esc_html__('Add Product Button Link','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example.com', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_best_seller_products_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('auto_parts_garage_top_rated_pro_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_top_rated_pro_title',array(
		'label'	=> __('Add Top Rated Products Title','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( 'Top Rated Products', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_best_seller_products_section',
		'type'=> 'text'
	));

	$args = array(
       'type'             => 'product',
        'child_of'        => 0,
        'parent'          => '',
        'orderby'         => 'term_group',
        'order'           => 'ASC',
        'hide_empty'      => false,
        'hierarchical'    => 1,
        'number'          => '',
        'taxonomy'        => 'product_cat',
        'pad_counts'      => false
    );
	$categories = get_categories($args);
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('auto_parts_garage_to_rated_product_page',array(
		'default'	=> 'select',
		'sanitize_callback' => 'auto_parts_garage_sanitize_choices',
	));
	$wp_customize->add_control('auto_parts_garage_to_rated_product_page',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to Top Rated Products','auto-parts-garage'),
		'section' => 'auto_parts_garage_best_seller_products_section',
	));

	//Testimonials Section
	$wp_customize->add_section('auto_parts_garage_testimonials_section', array(
		'title'       => __('Testimonials Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_testimonials_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_testimonials_text',array(
		'description' => __('<p>1. More options for testimonials section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonials section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_testimonials_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_testimonials_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_testimonials_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_testimonials_section',
		'type'=> 'hidden'
	));

	//Featured Products Section
	$wp_customize->add_section('auto_parts_garage_featured_products_section', array(
		'title'       => __('Featured Products Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_featured_products_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_featured_products_text',array(
		'description' => __('<p>1. More options for featured products section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for featured products section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_featured_products_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_featured_products_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_featured_products_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_featured_products_section',
		'type'=> 'hidden'
	));

	//Ready To Help Section
	$wp_customize->add_section('auto_parts_garage_ready_to_help_section', array(
		'title'       => __('Ready To Help Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_ready_to_help_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_ready_to_help_text',array(
		'description' => __('<p>1. More options for ready to help section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for ready to help section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_ready_to_help_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_ready_to_help_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_ready_to_help_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_ready_to_help_section',
		'type'=> 'hidden'
	));

	//Latest Blogs Section
	$wp_customize->add_section('auto_parts_garage_our_blogs_section', array(
		'title'       => __('Latest Blogs Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_our_blogs_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_our_blogs_text',array(
		'description' => __('<p>1. More options for latest blogs section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for latest blogs section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_our_blogs_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_our_blogs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_our_blogs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_our_blogs_section',
		'type'=> 'hidden'
	));

	//Newsletter Section
	$wp_customize->add_section('auto_parts_garage_newsletter_section', array(
		'title'       => __('Newsletter Section', 'auto-parts-garage'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','auto-parts-garage'),
		'priority'    => null,
		'panel'       => 'auto_parts_garage_panel_id',
	));

	$wp_customize->add_setting('auto_parts_garage_newsletter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_newsletter_text',array(
		'description' => __('<p>1. More options for newsletter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletter section.</p>','auto-parts-garage'),
		'section'=> 'auto_parts_garage_newsletter_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('auto_parts_garage_newsletter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_newsletter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=auto_parts_garage_guide') ." '>More Info</a>",
		'section'=> 'auto_parts_garage_newsletter_section',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('auto_parts_garage_footer',array(
		'title'	=> esc_html__('Footer Settings','auto-parts-garage'),
		'description' => __('For more options of Footer section</br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/garage-wordpress-theme/">GET PRO</a>','auto-parts-garage'),
		'panel' => 'auto_parts_garage_panel_id',
	));

  $wp_customize->add_setting( 'auto_parts_garage_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ));
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_footer_hide_show',array(
    'label' => esc_html__( 'Show / Hide Footer','auto-parts-garage' ),
    'section' => 'auto_parts_garage_footer'
  )));

 	// font size
	$wp_customize->add_setting('auto_parts_garage_button_footer_font_size',array(
		'default'=> 30,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','auto-parts-garage'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'auto_parts_garage_footer',
	));

	$wp_customize->add_setting('auto_parts_garage_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','auto-parts-garage'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'auto_parts_garage_footer',
	));

	// text trasform
	$wp_customize->add_setting('auto_parts_garage_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','auto-parts-garage'),
		'choices' => array(
      'Uppercase' => __('Uppercase','auto-parts-garage'),
      'Capitalize' => __('Capitalize','auto-parts-garage'),
      'Lowercase' => __('Lowercase','auto-parts-garage'),
    ),
		'section'=> 'auto_parts_garage_footer',
	));

	$wp_customize->add_setting('auto_parts_garage_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','auto-parts-garage'),
        'section' => 'auto_parts_garage_footer',
        'choices' => array(
        	'100' => __('100','auto-parts-garage'),
            '200' => __('200','auto-parts-garage'),
            '300' => __('300','auto-parts-garage'),
            '400' => __('400','auto-parts-garage'),
            '500' => __('500','auto-parts-garage'),
            '600' => __('600','auto-parts-garage'),
            '700' => __('700','auto-parts-garage'),
            '800' => __('800','auto-parts-garage'),
            '900' => __('900','auto-parts-garage'),
        ),
	) );

	$wp_customize->add_setting('auto_parts_garage_footer_template',array(
		'default'	=> esc_html('auto_parts_garage-footer-one'),
		'sanitize_callback'	=> 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_footer_template',array(
	  'label'	=> esc_html__('Footer style','auto-parts-garage'),
	  'section'	=> 'auto_parts_garage_footer',
	  'setting'	=> 'auto_parts_garage_footer_template',
	  'type' => 'select',
	  'choices' => array(
	      'auto_parts_garage-footer-one' => esc_html__('Style 1', 'auto-parts-garage'),
	      'auto_parts_garage-footer-two' => esc_html__('Style 2', 'auto-parts-garage'),
	      'auto_parts_garage-footer-three' => esc_html__('Style 3', 'auto-parts-garage'),
	      'auto_parts_garage-footer-four' => esc_html__('Style 4', 'auto-parts-garage'),
	      'auto_parts_garage-footer-five' => esc_html__('Style 5', 'auto-parts-garage'),
	      )
	));

  $wp_customize->add_setting('auto_parts_garage_footer_background_color', array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_footer_background_color', array(
    'label'    => __('Footer Background Color', 'auto-parts-garage'),
    'section'  => 'auto_parts_garage_footer',
  )));

  $wp_customize->add_setting('auto_parts_garage_footer_background_image',array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'auto_parts_garage_footer_background_image',array(
        'label' => __('Footer Background Image','auto-parts-garage'),
        'section' => 'auto_parts_garage_footer'
  )));

	$wp_customize->add_setting('auto_parts_garage_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','auto-parts-garage'),
		'section' => 'auto_parts_garage_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'auto-parts-garage' ),
			'center top'   => esc_html__( 'Top', 'auto-parts-garage' ),
			'right top'   => esc_html__( 'Top Right', 'auto-parts-garage' ),
			'left center'   => esc_html__( 'Left', 'auto-parts-garage' ),
			'center center'   => esc_html__( 'Center', 'auto-parts-garage' ),
			'right center'   => esc_html__( 'Right', 'auto-parts-garage' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'auto-parts-garage' ),
			'center bottom'   => esc_html__( 'Bottom', 'auto-parts-garage' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'auto-parts-garage' ),
		),
	));

  // Footer
  $wp_customize->add_setting('auto_parts_garage_img_footer',array(
    'default'=> 'scroll',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control('auto_parts_garage_img_footer',array(
    'type' => 'select',
    'label' => __('Footer Background Attatchment','auto-parts-garage'),
    'choices' => array(
      'fixed' => __('fixed','auto-parts-garage'),
      'scroll' => __('scroll','auto-parts-garage'),
    ),
    'section'=> 'auto_parts_garage_footer',
  ));

  // footer padding
  $wp_customize->add_setting('auto_parts_garage_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'auto-parts-garage' ),
    ),
    'section'=> 'auto_parts_garage_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('auto_parts_garage_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control('auto_parts_garage_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','auto-parts-garage'),
    'section' => 'auto_parts_garage_footer',
    'choices' => array(
      'Left' => __('Left','auto-parts-garage'),
      'Center' => __('Center','auto-parts-garage'),
      'Right' => __('Right','auto-parts-garage')
    ),
  ) );

  $wp_customize->add_setting('auto_parts_garage_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control('auto_parts_garage_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','auto-parts-garage'),
    'section' => 'auto_parts_garage_footer',
    'choices' => array(
      'Left' => __('Left','auto-parts-garage'),
      'Center' => __('Center','auto-parts-garage'),
      'Right' => __('Right','auto-parts-garage')
    ),
  ) );

  // footer social icon
  $wp_customize->add_setting( 'auto_parts_garage_footer_icon',array(
  'default' => false,
  'transport' => 'refresh',
  'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_footer_icon',array(
  'label' => esc_html__( 'Show / Hide Footer Social Icon','auto-parts-garage' ),
  'section' => 'auto_parts_garage_footer'
  )));


	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('auto_parts_garage_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'Auto_Parts_Garage_Customize_partial_auto_parts_garage_footer_text',
	));

  $wp_customize->add_setting( 'auto_parts_garage_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ));
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_copyright_hide_show',array(
    'label' => esc_html__( 'Show / Hide Copyright','auto-parts-garage' ),
    'section' => 'auto_parts_garage_footer'
  )));

	$wp_customize->add_setting('auto_parts_garage_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_footer_text',array(
		'label'	=> esc_html__('Copyright Text','auto-parts-garage'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Copyright 2023, .....', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_footer',
		'type'=> 'text'
	));

  $wp_customize->add_setting('auto_parts_garage_copyright_background_color', array(
    'default'           => '#fdb819',
    'sanitize_callback' => 'sanitize_hex_color',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_copyright_background_color', array(
    'label'    => __('Copyright Background Color', 'auto-parts-garage'),
    'section'  => 'auto_parts_garage_footer',
  )));

	$wp_customize->add_setting('auto_parts_garage_copyright_text_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_copyright_text_color', array(
		'label'    => __('Copyright Text Color', 'auto-parts-garage'),
		'section'  => 'auto_parts_garage_footer',
	)));

  $wp_customize->add_setting('auto_parts_garage_copyright_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_copyright_font_size',array(
    'label' => __('Copyright Font Size','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
    'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
    'section'=> 'auto_parts_garage_footer',
    'type'=> 'text'
  ));

 	$wp_customize->add_setting('auto_parts_garage_copyright_font_weight',array(
	  'default' => 400,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_copyright_font_weight',array(
	    'type' => 'select',
	    'label' => __('Copyright Font Weight','auto-parts-garage'),
	    'section' => 'auto_parts_garage_footer',
	    'choices' => array(
	    	'100' => __('100','auto-parts-garage'),
	        '200' => __('200','auto-parts-garage'),
	        '300' => __('300','auto-parts-garage'),
	        '400' => __('400','auto-parts-garage'),
	        '500' => __('500','auto-parts-garage'),
	        '600' => __('600','auto-parts-garage'),
	        '700' => __('700','auto-parts-garage'),
	        '800' => __('800','auto-parts-garage'),
	        '900' => __('900','auto-parts-garage'),
    ),
	));

	$wp_customize->add_setting('auto_parts_garage_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Image_Radio_Control($wp_customize, 'auto_parts_garage_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','auto-parts-garage'),
        'section' => 'auto_parts_garage_footer',
        'settings' => 'auto_parts_garage_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'auto_parts_garage_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ));
    $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','auto-parts-garage' ),
      	'section' => 'auto_parts_garage_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('auto_parts_garage_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'Auto_Parts_Garage_Customize_partial_auto_parts_garage_scroll_to_top_icon',
	));

  $wp_customize->add_setting('auto_parts_garage_scroll_top_icon',array(
    'default' => 'fas fa-long-arrow-alt-up',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser($wp_customize,'auto_parts_garage_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','auto-parts-garage'),
    'transport' => 'refresh',
    'section' => 'auto_parts_garage_footer',
    'setting' => 'auto_parts_garage_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('auto_parts_garage_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'auto-parts-garage' ),
    ),
    'section'=> 'auto_parts_garage_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('auto_parts_garage_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'auto-parts-garage' ),
    ),
    'section'=> 'auto_parts_garage_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('auto_parts_garage_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_scroll_to_top_width',array(
    'label' => __('Icon Width','auto-parts-garage'),
    'description' => __('Enter a value in pixels Example:20px','auto-parts-garage'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'auto-parts-garage' ),
    ),
    'section'=> 'auto_parts_garage_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('auto_parts_garage_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_scroll_to_top_height',array(
    'label' => __('Icon Height','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'auto-parts-garage' ),
    ),
    'section'=> 'auto_parts_garage_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'auto_parts_garage_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'auto_parts_garage_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','auto-parts-garage' ),
    'section'     => 'auto_parts_garage_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  $wp_customize->add_setting('auto_parts_garage_scroll_top_alignment',array(
    'default' => 'Right',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Image_Radio_Control($wp_customize, 'auto_parts_garage_scroll_top_alignment', array(
    'type' => 'select',
    'label' => esc_html__('Scroll To Top','auto-parts-garage'),
    'section' => 'auto_parts_garage_footer',
    'settings' => 'auto_parts_garage_scroll_top_alignment',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( 'auto_parts_garage_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'auto_parts_garage_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_blog_post_parent_panel',
	));

	//Blog layout
  $wp_customize->add_setting('auto_parts_garage_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control(new auto_parts_garage_Image_Radio_Control($wp_customize, 'auto_parts_garage_blog_layout_option', array(
    'type' => 'select',
    'label' => esc_html__('Blog Post Layouts','auto-parts-garage'),
    'section' => 'auto_parts_garage_post_settings',
    'choices' => array(
        'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('auto_parts_garage_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','auto-parts-garage'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','auto-parts-garage'),
    'section' => 'auto_parts_garage_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','auto-parts-garage'),
        'Right Sidebar' => esc_html__('Right Sidebar','auto-parts-garage'),
        'One Column' => esc_html__('One Column','auto-parts-garage'),
        'Three Columns' => __('Three Columns','auto-parts-garage'),
        'Four Columns' => __('Four Columns','auto-parts-garage'),
        'Grid Layout' => esc_html__('Grid Layout','auto-parts-garage')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('auto_parts_garage_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'Auto_Parts_Garage_Customize_partial_auto_parts_garage_toggle_postdate',
	));

  	$wp_customize->add_setting('auto_parts_garage_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_post_settings',
		'setting'	=> 'auto_parts_garage_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'auto_parts_garage_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ) );
    $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_toggle_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','auto-parts-garage' ),
        'section' => 'auto_parts_garage_post_settings'
    )));

	$wp_customize->add_setting('auto_parts_garage_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_post_settings',
		'setting'	=> 'auto_parts_garage_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'auto_parts_garage_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','auto-parts-garage' ),
		'section' => 'auto_parts_garage_post_settings'
  )));

  $wp_customize->add_setting('auto_parts_garage_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_post_settings',
		'setting'	=> 'auto_parts_garage_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'auto_parts_garage_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','auto-parts-garage' ),
		'section' => 'auto_parts_garage_post_settings'
    )));

  $wp_customize->add_setting('auto_parts_garage_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_post_settings',
		'setting'	=> 'auto_parts_garage_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'auto_parts_garage_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','auto-parts-garage' ),
		'section' => 'auto_parts_garage_post_settings'
  )));

  $wp_customize->add_setting( 'auto_parts_garage_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
	));
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','auto-parts-garage' ),
		'section' => 'auto_parts_garage_post_settings'
  )));

    //Featured Image
	$wp_customize->add_setting( 'auto_parts_garage_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
	) );
	$wp_customize->add_control( 'auto_parts_garage_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'auto_parts_garage_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
	) );
	$wp_customize->add_control( 'auto_parts_garage_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('auto_parts_garage_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'auto_parts_garage_sanitize_choices'
	));
  	$wp_customize->add_control('auto_parts_garage_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','auto-parts-garage'),
		'section'	=> 'auto_parts_garage_post_settings',
		'choices' => array(
		'default' => __('Default','auto-parts-garage'),
		'custom' => __('Custom Image Size','auto-parts-garage'),
      ),
  	));

	$wp_customize->add_setting('auto_parts_garage_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('auto_parts_garage_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','auto-parts-garage'),
		'description'	=> __('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'auto-parts-garage' ),),
		'section'=> 'auto_parts_garage_post_settings',
		'type'=> 'text',
		'active_callback' => 'auto_parts_garage_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('auto_parts_garage_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','auto-parts-garage'),
		'description'	=> __('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'auto-parts-garage' ),),
		'section'=> 'auto_parts_garage_post_settings',
		'type'=> 'text',
		'active_callback' => 'auto_parts_garage_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'auto_parts_garage_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
	));
    $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','auto-parts-garage' ),
		'section' => 'auto_parts_garage_post_settings'
    )));

    $wp_customize->add_setting( 'auto_parts_garage_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'auto_parts_garage_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_post_settings',
		'type'        => 'range',
		'settings'    => 'auto_parts_garage_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('auto_parts_garage_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','auto-parts-garage'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','auto-parts-garage'),
		'section'=> 'auto_parts_garage_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('auto_parts_garage_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_excerpt_settings',array(
	  'type' => 'select',
	  'label' => esc_html__('Post Content','auto-parts-garage'),
	  'section' => 'auto_parts_garage_post_settings',
	  'choices' => array(
	  		'Content' => esc_html__('Content','auto-parts-garage'),
	      'Excerpt' => esc_html__('Excerpt','auto-parts-garage'),
	      'No Content' => esc_html__('No Content','auto-parts-garage')
        ),
	) );

  $wp_customize->add_setting('auto_parts_garage_blog_page_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_blog_page_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Blog Posts','auto-parts-garage'),
    'section' => 'auto_parts_garage_post_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','auto-parts-garage'),
        'Without Blocks' => __('Without Blocks','auto-parts-garage')
        ),
	) );

	$wp_customize->add_setting('auto_parts_garage_excerpt_suffix',array(
		'default'=> '[...]',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'auto_parts_garage_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ));
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','auto-parts-garage' ),
		'section' => 'auto_parts_garage_post_settings'
  )));

	$wp_customize->add_setting( 'auto_parts_garage_blog_pagination_type', array(
    'default'			=> 'blog-page-numbers',
    'sanitize_callback'	=> 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control( 'auto_parts_garage_blog_pagination_type', array(
    'section' => 'auto_parts_garage_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'auto-parts-garage' ),
    'choices'		=> array(
        'blog-page-numbers'  => __( 'Numeric', 'auto-parts-garage' ),
        'next-prev' => __( 'Older Posts/Newer Posts', 'auto-parts-garage' ),
  )));

  // Button Settings
	$wp_customize->add_section( 'auto_parts_garage_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('auto_parts_garage_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'Auto_Parts_Garage_Customize_partial_auto_parts_garage_button_text',
	));

    $wp_customize->add_setting('auto_parts_garage_button_text',array(
		'default'=> esc_html__('Read More','auto-parts-garage'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_button_text',array(
		'label'	=> esc_html__('Add Button Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('auto_parts_garage_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_button_font_size',array(
		'label'	=> __('Button Font Size','auto-parts-garage'),
		'description'	=> __('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'auto-parts-garage' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'auto_parts_garage_button_settings',
	));

	$wp_customize->add_setting( 'auto_parts_garage_button_border_radius', array(
		'default'              => 20,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'auto_parts_garage_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('auto_parts_garage_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_button_padding_top_bottom',array(
		'label'	=> esc_html__('Padding Top Bottom','auto-parts-garage'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'auto-parts-garage' ),
        ),
		'section' => 'auto_parts_garage_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_button_padding_left_right',array(
		'label'	=> esc_html__('Padding Left Right','auto-parts-garage'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'auto-parts-garage' ),
        ),
		'section' => 'auto_parts_garage_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','auto-parts-garage'),
		'description'	=> __('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'auto-parts-garage' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'auto_parts_garage_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('auto_parts_garage_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','auto-parts-garage'),
		'choices' => array(
            'Uppercase' => __('Uppercase','auto-parts-garage'),
            'Capitalize' => __('Capitalize','auto-parts-garage'),
            'Lowercase' => __('Lowercase','auto-parts-garage'),
        ),
		'section'=> 'auto_parts_garage_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'auto_parts_garage_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('auto_parts_garage_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'Auto_Parts_Garage_Customize_partial_auto_parts_garage_related_post_title',
	));

  $wp_customize->add_setting( 'auto_parts_garage_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','auto-parts-garage' ),
		'section' => 'auto_parts_garage_related_posts_settings'
  )));

  $wp_customize->add_setting('auto_parts_garage_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('auto_parts_garage_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'auto_parts_garage_sanitize_number_absint'
	));
	$wp_customize->add_control('auto_parts_garage_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'auto_parts_garage_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
	) );
	$wp_customize->add_control( 'auto_parts_garage_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'auto_parts_garage_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'auto_parts_garage_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_blog_post_parent_panel',
	));

	$wp_customize->add_setting('auto_parts_garage_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_single_blog_settings',
		'setting'	=> 'auto_parts_garage_single_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'auto_parts_garage_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_single_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','auto-parts-garage' ),
    'section' => 'auto_parts_garage_single_blog_settings'
  )));

	$wp_customize->add_setting('auto_parts_garage_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_single_author_icon',array(
		'label'	=> __('Add Author Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_single_blog_settings',
		'setting'	=> 'auto_parts_garage_single_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'auto_parts_garage_single_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_single_author',array(
		'label' => esc_html__( 'Show / Hide Author','auto-parts-garage' ),
		'section' => 'auto_parts_garage_single_blog_settings'
  )));

 	$wp_customize->add_setting('auto_parts_garage_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_single_blog_settings',
		'setting'	=> 'auto_parts_garage_single_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'auto_parts_garage_single_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_single_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','auto-parts-garage' ),
		'section' => 'auto_parts_garage_single_blog_settings'
  )));

	$wp_customize->add_setting('auto_parts_garage_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_single_time_icon',array(
		'label'	=> __('Add Time Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_single_blog_settings',
		'setting'	=> 'auto_parts_garage_single_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'auto_parts_garage_single_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_single_time',array(
		'label' => esc_html__( 'Show / Hide Time','auto-parts-garage' ),
		'section' => 'auto_parts_garage_single_blog_settings'
  )));

	$wp_customize->add_setting( 'auto_parts_garage_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ) );
	$wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','auto-parts-garage' ),
		'section' => 'auto_parts_garage_single_blog_settings'
	)));

  // Single Posts Category
 	$wp_customize->add_setting( 'auto_parts_garage_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ) );
	$wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','auto-parts-garage' ),
		'section' => 'auto_parts_garage_single_blog_settings'
 	)));

	$wp_customize->add_setting( 'auto_parts_garage_single_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
	));
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_single_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','auto-parts-garage' ),
		'section' => 'auto_parts_garage_single_blog_settings'
  )));

	$wp_customize->add_setting( 'auto_parts_garage_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
	));
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_single_blog_post_navigation_show_hide', array(
	'label' => esc_html__( 'Show / Hide Post Navigation','auto-parts-garage' ),
	'section' => 'auto_parts_garage_single_blog_settings'
  )));

	$wp_customize->add_setting('auto_parts_garage_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','auto-parts-garage'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','auto-parts-garage'),
		'section'=> 'auto_parts_garage_single_blog_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('auto_parts_garage_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','auto-parts-garage'),
		'description'	=> __('Enter a value in %. Example:50%','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_single_blog_settings',
		'type'=> 'text'
	));

	//navigation text
	$wp_customize->add_setting('auto_parts_garage_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('auto_parts_garage_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','auto-parts-garage'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'auto-parts-garage' ),
    	),
		'section'=> 'auto_parts_garage_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('auto_parts_garage_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_single_blog_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'auto_parts_garage_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_blog_post_parent_panel',
	));

	$wp_customize->add_setting('auto_parts_garage_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_grid_layout_settings',
		'setting'	=> 'auto_parts_garage_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'auto_parts_garage_grid_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_grid_postdate',array(
      'label' => esc_html__( 'Show / Hide Post Date','auto-parts-garage' ),
      'section' => 'auto_parts_garage_grid_layout_settings'
  )));

	$wp_customize->add_setting('auto_parts_garage_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_grid_author_icon',array(
		'label'	=> __('Add Author Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_grid_layout_settings',
		'setting'	=> 'auto_parts_garage_grid_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'auto_parts_garage_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','auto-parts-garage' ),
		'section' => 'auto_parts_garage_grid_layout_settings'
	)));

 	$wp_customize->add_setting('auto_parts_garage_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_grid_layout_settings',
		'setting'	=> 'auto_parts_garage_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'auto_parts_garage_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','auto-parts-garage' ),
		'section' => 'auto_parts_garage_grid_layout_settings'
  )));

 	$wp_customize->add_setting('auto_parts_garage_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','auto-parts-garage'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','auto-parts-garage'),
		'section'=> 'auto_parts_garage_grid_layout_settings',
		'type'=> 'text'
	));

	 $wp_customize->add_setting( 'auto_parts_garage_grid_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'auto_parts_garage_grid_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_grid_layout_settings',
		'type'        => 'range',
		'settings'    => 'auto_parts_garage_grid_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

  $wp_customize->add_setting('auto_parts_garage_display_grid_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_display_grid_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Grid Posts','auto-parts-garage'),
        'section' => 'auto_parts_garage_grid_layout_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','auto-parts-garage'),
            'Without Blocks' => __('Without Blocks','auto-parts-garage')
        ),
	) );

  	$wp_customize->add_setting('auto_parts_garage_grid_button_text',array(
		'default'=> esc_html__('Read More','auto-parts-garage'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('auto_parts_garage_grid_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_grid_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Grid Post Content','auto-parts-garage'),
    'section' => 'auto_parts_garage_grid_layout_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','auto-parts-garage'),
        'Excerpt' => esc_html__('Excerpt','auto-parts-garage'),
        'No Content' => esc_html__('No Content','auto-parts-garage')
    ),
	) );

  $wp_customize->add_setting( 'auto_parts_garage_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
	) );
	$wp_customize->add_control( 'auto_parts_garage_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'auto_parts_garage_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
	) );
	$wp_customize->add_control( 'auto_parts_garage_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','auto-parts-garage' ),
		'section'     => 'auto_parts_garage_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Other
	$wp_customize->add_panel( 'auto_parts_garage_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'auto-parts-garage' ),
		'panel' => 'auto_parts_garage_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'auto_parts_garage_left_right', array(
    	'title' => esc_html__('General Settings', 'auto-parts-garage'),
		'panel' => 'auto_parts_garage_other_parent_panel'
	) );

	$wp_customize->add_setting('auto_parts_garage_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Image_Radio_Control($wp_customize, 'auto_parts_garage_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','auto-parts-garage'),
        'description' => esc_html__('Here you can change the width layout of Website.','auto-parts-garage'),
        'section' => 'auto_parts_garage_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('auto_parts_garage_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
	));
	$wp_customize->add_control('auto_parts_garage_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','auto-parts-garage'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','auto-parts-garage'),
        'section' => 'auto_parts_garage_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','auto-parts-garage'),
            'Right_Sidebar' => esc_html__('Right Sidebar','auto-parts-garage'),
            'One_Column' => esc_html__('One Column','auto-parts-garage')
        ),
	) );

  $wp_customize->add_setting( 'auto_parts_garage_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','auto-parts-garage' ),
		'section' => 'auto_parts_garage_left_right'
  )));

	 //Wow Animation
	$wp_customize->add_setting( 'auto_parts_garage_animation',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ));
  $wp_customize->add_control( new auto_parts_garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_animation',array(
    'label' => esc_html__( 'Show / Hide Animation ','auto-parts-garage' ),
    'description' => __('Here you can disable overall site animation effect','auto-parts-garage'),
    'section' => 'auto_parts_garage_left_right'
  )));

    // Pre-Loader
	$wp_customize->add_setting( 'auto_parts_garage_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ) );
    $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','auto-parts-garage' ),
        'section' => 'auto_parts_garage_left_right'
    )));

	$wp_customize->add_setting('auto_parts_garage_preloader_bg_color', array(
		'default'           => '#282828',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'auto-parts-garage'),
		'section'  => 'auto_parts_garage_left_right',
	)));

	$wp_customize->add_setting('auto_parts_garage_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'auto-parts-garage'),
		'section'  => 'auto_parts_garage_left_right',
	)));

    //404 Page Setting
	$wp_customize->add_section('auto_parts_garage_404_page',array(
		'title'	=> __('404 Page Settings','auto-parts-garage'),
		'panel' => 'auto_parts_garage_other_parent_panel',
	));

	$wp_customize->add_setting('auto_parts_garage_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('auto_parts_garage_404_page_title',array(
		'label'	=> __('Add Title','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('auto_parts_garage_404_page_content',array(
		'label'	=> __('Add Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_404_page_button_text',array(
		'label'	=> __('Add Button Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( 'GO BACK', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('auto_parts_garage_no_results_page',array(
		'title'	=> __('No Results Page Settings','auto-parts-garage'),
		'panel' => 'auto_parts_garage_other_parent_panel',
	));

	$wp_customize->add_setting('auto_parts_garage_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('auto_parts_garage_no_results_page_title',array(
		'label'	=> __('Add Title','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('auto_parts_garage_no_results_page_content',array(
		'label'	=> __('Add Text','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('auto_parts_garage_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','auto-parts-garage'),
		'panel' => 'auto_parts_garage_other_parent_panel',
	));

	$wp_customize->add_setting('auto_parts_garage_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','auto-parts-garage'),
		'description'	=> __('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_social_icon_padding',array(
		'label'	=> __('Icon Padding','auto-parts-garage'),
		'description'	=> __('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_social_icon_width',array(
		'label'	=> __('Icon Width','auto-parts-garage'),
		'description'	=> __('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('auto_parts_garage_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('auto_parts_garage_social_icon_height',array(
		'label'	=> __('Icon Height','auto-parts-garage'),
		'description'	=> __('Enter a value in pixels. Example:20px','auto-parts-garage'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
		'section'=> 'auto_parts_garage_social_icon_settings',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('auto_parts_garage_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','auto-parts-garage'),
		'panel' => 'auto_parts_garage_other_parent_panel',
	));

    $wp_customize->add_setting( 'auto_parts_garage_resp_slider_hide_show',array(
      	'default' => 1,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ));
    $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','auto-parts-garage' ),
      	'section' => 'auto_parts_garage_responsive_media'
    )));

    $wp_customize->add_setting( 'auto_parts_garage_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ));
    $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','auto-parts-garage' ),
      	'section' => 'auto_parts_garage_responsive_media'
    )));

    $wp_customize->add_setting( 'auto_parts_garage_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
    ));
    $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','auto-parts-garage' ),
      	'section' => 'auto_parts_garage_responsive_media'
    )));

    $wp_customize->add_setting('auto_parts_garage_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#fdb819',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_parts_garage_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'auto-parts-garage'),
		'section'  => 'auto_parts_garage_responsive_media',
	)));

    $wp_customize->add_setting('auto_parts_garage_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_responsive_media',
		'setting'	=> 'auto_parts_garage_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('auto_parts_garage_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Auto_Parts_Garage_Fontawesome_Icon_Chooser(
        $wp_customize,'auto_parts_garage_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','auto-parts-garage'),
		'transport' => 'refresh',
		'section'	=> 'auto_parts_garage_responsive_media',
		'setting'	=> 'auto_parts_garage_res_close_menu_icon',
		'type'		=> 'icon'
	)));

  //Woocommerce settings
  $wp_customize->add_section('auto_parts_garage_woocommerce_section', array(
    'title'    => __('WooCommerce Layout', 'auto-parts-garage'),
    'priority' => null,
    'panel'    => 'woocommerce',
  ));

  //Shop Page Featured Image
  $wp_customize->add_setting( 'auto_parts_garage_shop_featured_image_border_radius', array(
    'default'              => '0',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'auto_parts_garage_shop_featured_image_border_radius', array(
    'label'       => esc_html__( 'Shop Page Featured Image Border Radius','auto-parts-garage' ),
    'section'     => 'auto_parts_garage_woocommerce_section',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  $wp_customize->add_setting( 'auto_parts_garage_shop_featured_image_box_shadow', array(
    'default'              => '0',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'auto_parts_garage_shop_featured_image_box_shadow', array(
    'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','auto-parts-garage' ),
    'section'     => 'auto_parts_garage_woocommerce_section',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'auto_parts_garage_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'Auto_Parts_Garage_Customize_partial_auto_parts_garage_woocommerce_shop_page_sidebar', ) );

   // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'auto_parts_garage_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','auto-parts-garage' ),
		'section' => 'auto_parts_garage_woocommerce_section'
  )));

  $wp_customize->add_setting('auto_parts_garage_shop_page_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control('auto_parts_garage_shop_page_layout',array(
    'type' => 'select',
    'label' => __('Shop Page Sidebar Layout','auto-parts-garage'),
    'section' => 'auto_parts_garage_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','auto-parts-garage'),
        'Right Sidebar' => __('Right Sidebar','auto-parts-garage'),
        ),
  ) );

  // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'auto_parts_garage_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'Auto_Parts_Garage_Customize_partial_auto_parts_garage_woocommerce_single_product_page_sidebar', ) );

  //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'auto_parts_garage_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','auto-parts-garage' ),
		'section' => 'auto_parts_garage_woocommerce_section'
  )));

  $wp_customize->add_setting('auto_parts_garage_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control('auto_parts_garage_single_product_layout',array(
    'type' => 'select',
    'label' => __('Single Product Sidebar Layout','auto-parts-garage'),
    'section' => 'auto_parts_garage_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','auto-parts-garage'),
        'Right Sidebar' => __('Right Sidebar','auto-parts-garage'),
        ),
  ) );

  //Products padding
  $wp_customize->add_setting('auto_parts_garage_products_padding_top_bottom',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_products_padding_top_bottom',array(
    'label' => __('Products Padding Top Bottom','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'auto-parts-garage' ),
    ),
    'section'=> 'auto_parts_garage_woocommerce_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('auto_parts_garage_products_padding_left_right',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_products_padding_left_right',array(
    'label' => __('Products Padding Left Right','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'auto-parts-garage' ),
      ),
    'section'=> 'auto_parts_garage_woocommerce_section',
    'type'=> 'text'
  ));

  //Products box shadow
  $wp_customize->add_setting( 'auto_parts_garage_products_box_shadow', array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'auto_parts_garage_products_box_shadow', array(
    'label' => esc_html__( 'Products Box Shadow','auto-parts-garage' ),
    'section' => 'auto_parts_garage_woocommerce_section',
    'type'  => 'range',
    'input_attrs' => array(
      'step' => 1,
      'min'  => 1,
      'max'  => 50,
    ),
  ) );

  //Products border radius
    $wp_customize->add_setting( 'auto_parts_garage_products_border_radius', array(
    'default' => '0',
    'transport' => 'refresh',
    'sanitize_callback' => 'auto_parts_garage_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'auto_parts_garage_products_border_radius', array(
    'label' => esc_html__( 'Products Border Radius','auto-parts-garage' ),
    'section' => 'auto_parts_garage_woocommerce_section',
    'type' => 'range',
    'input_attrs' => array(
      'step' => 1,
      'min'  => 1,
      'max'  => 50,
    ),
  ) );

  $wp_customize->add_setting('auto_parts_garage_products_btn_padding_top_bottom',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_products_btn_padding_top_bottom',array(
    'label' => __('Products Button Padding Top Bottom','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
    'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
    'section'=> 'auto_parts_garage_woocommerce_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('auto_parts_garage_products_btn_padding_left_right',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_products_btn_padding_left_right',array(
    'label' => __('Products Button Padding Left Right','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
    'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
    'section'=> 'auto_parts_garage_woocommerce_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'auto_parts_garage_products_button_border_radius', array(
    'default'              => '0',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'auto_parts_garage_products_button_border_radius', array(
    'label'       => esc_html__( 'Products Button Border Radius','auto-parts-garage' ),
    'section'     => 'auto_parts_garage_woocommerce_section',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  //Products Sale Badge
  $wp_customize->add_setting('auto_parts_garage_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'auto_parts_garage_sanitize_choices'
  ));
  $wp_customize->add_control('auto_parts_garage_woocommerce_sale_position',array(
      'type' => 'select',
      'label' => __('Sale Badge Position','auto-parts-garage'),
      'section' => 'auto_parts_garage_woocommerce_section',
      'choices' => array(
          'left' => __('Left','auto-parts-garage'),
          'right' => __('Right','auto-parts-garage'),
      ),
  ) );

  $wp_customize->add_setting('auto_parts_garage_woocommerce_sale_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('auto_parts_garage_woocommerce_sale_font_size',array(
    'label' => __('Sale Font Size','auto-parts-garage'),
    'description' => __('Enter a value in pixels. Example:20px','auto-parts-garage'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'auto-parts-garage' ),
        ),
    'section'=> 'auto_parts_garage_woocommerce_section',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'auto_parts_garage_woocommerce_sale_border_radius', array(
    'default'              => '100',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'auto_parts_garage_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'auto_parts_garage_woocommerce_sale_border_radius', array(
    'label'       => esc_html__( 'Sale Border Radius','auto-parts-garage' ),
    'section'     => 'auto_parts_garage_woocommerce_section',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

  // Related Product
  $wp_customize->add_setting( 'auto_parts_garage_related_product_show_hide',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'auto_parts_garage_switch_sanitization'
  ) );
  $wp_customize->add_control( new Auto_Parts_Garage_Toggle_Switch_Custom_Control( $wp_customize, 'auto_parts_garage_related_product_show_hide',array(
      'label' => esc_html__( 'Show / Hide Related product','auto-parts-garage' ),
      'section' => 'auto_parts_garage_woocommerce_section'
  )));
}

add_action( 'customize_register', 'Auto_Parts_Garage_Customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Auto_Parts_Garage_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Auto_Parts_Garage_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Auto_Parts_Garage_Customize_Section_Pro( $manager,'auto_parts_garage_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'AUTO PARTS PRO', 'auto-parts-garage' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'auto-parts-garage' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/garage-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Auto_Parts_Garage_Customize_Section_Pro($manager,'auto_parts_garage_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'auto-parts-garage' ),
			'pro_text' => esc_html__( 'DOCS', 'auto-parts-garage' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-auto-parts-garage/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'auto-parts-garage-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'auto-parts-garage-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Auto_Parts_Garage_Customize::get_instance();
