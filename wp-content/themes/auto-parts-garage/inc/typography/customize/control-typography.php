<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class Auto_Parts_Garage_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'auto-parts-garage-typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'auto-parts-garage' ),
				'family'      => esc_html__( 'Font Family', 'auto-parts-garage' ),
				'size'        => esc_html__( 'Font Size',   'auto-parts-garage' ),
				'weight'      => esc_html__( 'Font Weight', 'auto-parts-garage' ),
				'style'       => esc_html__( 'Font Style',  'auto-parts-garage' ),
				'line_height' => esc_html__( 'Line Height', 'auto-parts-garage' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'auto-parts-garage' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'auto-parts-garage-ctypo-customize-controls' );
		wp_enqueue_style(  'auto-parts-garage-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'auto-parts-garage' ),
        'Abril Fatface' => __( 'Abril Fatface', 'auto-parts-garage' ),
        'Acme' => __( 'Acme', 'auto-parts-garage' ),
        'Anton' => __( 'Anton', 'auto-parts-garage' ),
        'Architects Daughter' => __( 'Architects Daughter', 'auto-parts-garage' ),
        'Arimo' => __( 'Arimo', 'auto-parts-garage' ),
        'Arsenal' => __( 'Arsenal', 'auto-parts-garage' ),
        'Arvo' => __( 'Arvo', 'auto-parts-garage' ),
        'Alegreya' => __( 'Alegreya', 'auto-parts-garage' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'auto-parts-garage' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'auto-parts-garage' ),
        'Bangers' => __( 'Bangers', 'auto-parts-garage' ),
        'Boogaloo' => __( 'Boogaloo', 'auto-parts-garage' ),
        'Bad Script' => __( 'Bad Script', 'auto-parts-garage' ),
        'Bitter' => __( 'Bitter', 'auto-parts-garage' ),
        'Bree Serif' => __( 'Bree Serif', 'auto-parts-garage' ),
        'BenchNine' => __( 'BenchNine', 'auto-parts-garage' ),
        'Cabin' => __( 'Cabin', 'auto-parts-garage' ),
        'Cardo' => __( 'Cardo', 'auto-parts-garage' ),
        'Courgette' => __( 'Courgette', 'auto-parts-garage' ),
        'Cherry Swash' => __( 'Cherry Swash', 'auto-parts-garage' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'auto-parts-garage' ),
        'Crimson Text' => __( 'Crimson Text', 'auto-parts-garage' ),
        'Cuprum' => __( 'Cuprum', 'auto-parts-garage' ),
        'Cookie' => __( 'Cookie', 'auto-parts-garage' ),
        'Chewy' => __( 'Chewy', 'auto-parts-garage' ),
        'Days One' => __( 'Days One', 'auto-parts-garage' ),
        'Dosis' => __( 'Dosis', 'auto-parts-garage' ),
        'Droid Sans' => __( 'Droid Sans', 'auto-parts-garage' ),
        'Economica' => __( 'Economica', 'auto-parts-garage' ),
        'Fredoka One' => __( 'Fredoka One', 'auto-parts-garage' ),
        'Fjalla One' => __( 'Fjalla One', 'auto-parts-garage' ),
        'Francois One' => __( 'Francois One', 'auto-parts-garage' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'auto-parts-garage' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'auto-parts-garage' ),
        'Great Vibes' => __( 'Great Vibes', 'auto-parts-garage' ),
        'Handlee' => __( 'Handlee', 'auto-parts-garage' ),
        'Hammersmith One' => __( 'Hammersmith One', 'auto-parts-garage' ),
        'Inconsolata' => __( 'Inconsolata', 'auto-parts-garage' ),
        'Indie Flower' => __( 'Indie Flower', 'auto-parts-garage' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'auto-parts-garage' ),
        'Julius Sans One' => __( 'Julius Sans One', 'auto-parts-garage' ),
        'Josefin Slab' => __( 'Josefin Slab', 'auto-parts-garage' ),
        'Josefin Sans' => __( 'Josefin Sans', 'auto-parts-garage' ),
        'Kanit' => __( 'Kanit', 'auto-parts-garage' ),
        'Lobster' => __( 'Lobster', 'auto-parts-garage' ),
        'Lato' => __( 'Lato', 'auto-parts-garage' ),
        'Lora' => __( 'Lora', 'auto-parts-garage' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'auto-parts-garage' ),
        'Lobster Two' => __( 'Lobster Two', 'auto-parts-garage' ),
        'Merriweather' => __( 'Merriweather', 'auto-parts-garage' ),
        'Monda' => __( 'Monda', 'auto-parts-garage' ),
        'Montserrat' => __( 'Montserrat', 'auto-parts-garage' ),
        'Muli' => __( 'Muli', 'auto-parts-garage' ),
        'Marck Script' => __( 'Marck Script', 'auto-parts-garage' ),
        'Noto Serif' => __( 'Noto Serif', 'auto-parts-garage' ),
        'Open Sans' => __( 'Open Sans', 'auto-parts-garage' ),
        'Overpass' => __( 'Overpass', 'auto-parts-garage' ),
        'Overpass Mono' => __( 'Overpass Mono', 'auto-parts-garage' ),
        'Oxygen' => __( 'Oxygen', 'auto-parts-garage' ),
        'Orbitron' => __( 'Orbitron', 'auto-parts-garage' ),
        'Patua One' => __( 'Patua One', 'auto-parts-garage' ),
        'Pacifico' => __( 'Pacifico', 'auto-parts-garage' ),
        'Padauk' => __( 'Padauk', 'auto-parts-garage' ),
        'Playball' => __( 'Playball', 'auto-parts-garage' ),
        'Playfair Display' => __( 'Playfair Display', 'auto-parts-garage' ),
        'PT Sans' => __( 'PT Sans', 'auto-parts-garage' ),
        'Philosopher' => __( 'Philosopher', 'auto-parts-garage' ),
        'Permanent Marker' => __( 'Permanent Marker', 'auto-parts-garage' ),
        'Poiret One' => __( 'Poiret One', 'auto-parts-garage' ),
        'Quicksand' => __( 'Quicksand', 'auto-parts-garage' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'auto-parts-garage' ),
        'Raleway' => __( 'Raleway', 'auto-parts-garage' ),
        'Rubik' => __( 'Rubik', 'auto-parts-garage' ),
        'Rokkitt' => __( 'Rokkitt', 'auto-parts-garage' ),
        'Russo One' => __( 'Russo One', 'auto-parts-garage' ),
        'Righteous' => __( 'Righteous', 'auto-parts-garage' ),
        'Slabo' => __( 'Slabo', 'auto-parts-garage' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'auto-parts-garage' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'auto-parts-garage'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'auto-parts-garage' ),
        'Sacramento' => __( 'Sacramento', 'auto-parts-garage' ),
        'Shrikhand' => __( 'Shrikhand', 'auto-parts-garage' ),
        'Tangerine' => __( 'Tangerine', 'auto-parts-garage' ),
        'Ubuntu' => __( 'Ubuntu', 'auto-parts-garage' ),
        'VT323' => __( 'VT323', 'auto-parts-garage' ),
        'Varela Round' => __( 'Varela Round', 'auto-parts-garage' ),
        'Vampiro One' => __( 'Vampiro One', 'auto-parts-garage' ),
        'Vollkorn' => __( 'Vollkorn', 'auto-parts-garage' ),
        'Volkhov' => __( 'Volkhov', 'auto-parts-garage' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'auto-parts-garage' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'auto-parts-garage' ),
			'100' => esc_html__( 'Thin',       'auto-parts-garage' ),
			'300' => esc_html__( 'Light',      'auto-parts-garage' ),
			'400' => esc_html__( 'Normal',     'auto-parts-garage' ),
			'500' => esc_html__( 'Medium',     'auto-parts-garage' ),
			'700' => esc_html__( 'Bold',       'auto-parts-garage' ),
			'900' => esc_html__( 'Ultra Bold', 'auto-parts-garage' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'auto-parts-garage' ),
			'normal'  => esc_html__( 'Normal', 'auto-parts-garage' ),
			'italic'  => esc_html__( 'Italic', 'auto-parts-garage' ),
			'oblique' => esc_html__( 'Oblique', 'auto-parts-garage' )
		);
	}
}
