<?php
/**
 * Set up the default theme options
 *
 * @since 1.0.0
 */
function bavotasan_default_theme_options() {
	//delete_option( 'theme_mods_arcade' );
	return array(
		'logo' => '',
		'arc' => 400,
		'arc_inner' => 400,
		'fittext' => '',
		'header_icon' => 'fa-heart',
		'width' => '1170',
		'layout' => 'right',
		'primary' => 'col-md-8',
		'secondary' => 'col-md-2',
		'display_author' => 'on',
		'display_date' => 'on',
		'display_comment_count' => 'on',
		'display_categories' => 'on',
		'link_color' => '#5cbde0',
		'link_hover_color' => '#39b3d7',
		'main_text_color' => '#282828',
		'headers_color' => '#282828',
		'extended_footer_columns' => 'col-md-4',
		'site_title_font' => 'Megrim, cursive',
		'site_title_font_size' => '120',
		'main_text_font' => '"Open Sans", sans-serif',
		'main_text_font_size' => '16',
		'headers_font' => 'Raleway, sans-serif',
		'post_title_font' => 'Raleway, sans-serif',
		'post_title_font_size' => '32',
		'post_meta_font' => '"Open Sans", sans-serif',
		'post_meta_font_size' => '13',
	);
}

function bavotasan_theme_options() {
	$bavotasan_default_theme_options = bavotasan_default_theme_options();

	$return = array();
	foreach( $bavotasan_default_theme_options as $option => $value ) {
		$return[$option] = get_theme_mod( $option, $value );
	}

	return $return;
}

if ( class_exists( 'WP_Customize_Control' ) ) {
	class Bavotasan_Textarea_Control extends WP_Customize_Control {
	    public $type = 'textarea';

	    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" class="custom-textarea" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}

    class Bavotasan_Text_Description_Control extends WP_Customize_Control {
        public $description;

	    public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <input type="text" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
            </label>
            <p class="description more-top"><?php echo wp_kses_post( $this->description ); ?></p>
			<?php
        }
    }

	class Bavotasan_Font_Control extends WP_Customize_Control {
	    public $type = 'select';
	    public $size = true;

	    public function render_content() {
			if ( empty( $this->choices ) )
				return;

			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select <?php $this->link(); ?>>
					<?php
					foreach ( $this->choices as $label => $choices ) {
						echo '<optgroup label="' . esc_attr( $label ) . '">';
						foreach ( $choices as $css_font => $font_name ) {
							echo '<option value="' . esc_attr( $css_font ) . '"' . selected( $this->value(), $css_font, false ) . '>' . $font_name . '</option>';
						}
						echo '</optgroup>';
					}
					?>
				</select>
			</label>
	        <?php if ( $this->size ) { ?>
			<label>
				<input type="text" data-customize-setting-link="<?php echo $this->id . '_size'; ?>" style="text-align: center; width: 40px; margin-left: 5px;" /> px
			</label>
	        <?php
	        }
		}
	}

	class Bavotasan_Category_Dropdown_Control extends WP_Customize_Control {
		public function render_content() {
			$dropdown = wp_dropdown_categories( array(
				'name' => $this->id,
				'echo' => 0,
				'show_option_all' => __( 'All', 'arcade' ),
				'selected' => $this->value(),
				'class' => 'customize-dropdown-cats',
			) );

			// hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		}
	}

	class Bavotasan_Icon_Select_Control extends WP_Customize_Control {
		public function render_content() {
			?>
			<div id="widgets-right" class="widget-content">
			<label class="customize-control-select"><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="custom-icon-container"><i class="fa <?php echo esc_attr( $this->value() ); ?>"></i></span>
				<input type="hidden" class="image-widget-custom-icon" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
				<a href="#" class="view-icons"><?php _e( 'View Icons', 'arcade' ); ?></a> | <a href="#" class="delete-icon"><?php _e( 'Remove Icon', 'arcade' ); ?></a>
				<?php bavotasan_font_awesome_icons( false ); ?>
			</label>
			</div>
			<?php
		}
	}

	class Bavotasan_Post_Layout_Control extends WP_Customize_Control {
	    public function render_content() {
			if ( empty( $this->choices ) )
				return;

			$name = '_customize-radio-' . $this->id;

			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
			foreach ( $this->choices as $value => $label ) :
				?>
				<label>
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
					<?php
					$value = ( is_active_sidebar( 'second-sidebar' ) ) ? $value . ' second-sidebar' : $value;
					echo '<div class="' . esc_attr( $value ) . '"></div>'; ?>
				</label>
				<?php
			endforeach;
			echo '<p class="description">' . sprintf( __( 'For layout options with two sidebars, add at least one widget to the Second Sidebar area on the %sWidgets admin page%s.', 'arcade' ), '<a href="' . esc_url( admin_url( 'widgets.php' ) ) . '">', '</a>' ) . '</p>';
	    }
	}
}

class Bavotasan_Customizer {
	public function __construct() {
		add_action( 'admin_bar_menu', array( $this, 'admin_bar_menu' ), 2 );

		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'customize_preview_init' ) );
		add_action( 'customize_controls_print_styles', array( $this, 'customize_controls_print_styles' ) );
	}

	public function customize_preview_init() {
		wp_enqueue_script( 'bavotasan_customizer', BAVOTASAN_THEME_URL . '/library/js/admin/customizer.js', array( 'jquery', 'customize-preview' ), '', true );
	}

	public function customize_controls_print_styles() {
		wp_enqueue_script( 'bavotasan_image_widget', BAVOTASAN_THEME_URL . '/library/js/admin/image-widget.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'bavotasan_image_widget_css', BAVOTASAN_THEME_URL . '/library/css/admin/image-widget.css' );
		wp_enqueue_style( 'font_awesome', BAVOTASAN_THEME_URL .'/library/css/font-awesome.css', false, '4.3.0', 'all' );
	}

	/**
	 * Add a 'customize' menu item to the admin bar
	 *
	 * This function is attached to the 'admin_bar_menu' action hook.
	 *
	 * @since 1.0.0
	 */
	public function admin_bar_menu( $wp_admin_bar ) {
	    if ( current_user_can( 'edit_theme_options' ) && is_admin_bar_showing() )
	    	$wp_admin_bar->add_node( array( 'parent' => 'bavotasan_toolbar', 'id' => 'customize_theme', 'title' => __( 'Customize', 'arcade' ), 'href' => admin_url( 'customize.php' ) ) );
	}

	/**
	 * Adds theme options to the Customizer screen
	 *
	 * This function is attached to the 'customize_register' action hook.
	 *
	 * @param	class $wp_customize
	 *
	 * @since 1.0.0
	 */
	public function customize_register( $wp_customize ) {
		$bavotasan_default_theme_options = bavotasan_default_theme_options();

		$wp_customize->add_setting( 'logo', array(
			'default' => $bavotasan_default_theme_options['logo'],
            'sanitize_callback' => 'esc_url',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
			'label' => __( 'Site Logo', 'arcade' ),
			'section' => 'title_tagline',
			'priority' => 10,
		) ) );

		$wp_customize->add_setting( 'arc', array(
			'default' => $bavotasan_default_theme_options['arc'],
            'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'arc', array(
			'label' => __( 'Arc Radius (Home Page)', 'arcade' ),
			'section' => 'title_tagline',
			'priority' => 15,
		) );

		$wp_customize->add_setting( 'arc_inner', array(
			'default' => $bavotasan_default_theme_options['arc_inner'],
            'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( new Bavotasan_Text_Description_Control( $wp_customize, 'arc_inner', array(
			'label' => __( 'Arc Radius (Inner Pages)', 'arcade' ),
			'section' => 'title_tagline',
			'description' => __( 'The space and rotation for each letter will be calculated using the arc radius and the width of the site title. Leave blank for no arc.', 'arcade' ),
			'priority' => 20,
		) ) );

		$wp_customize->add_setting( 'fittext', array(
			'default' => $bavotasan_default_theme_options['fittext'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'fittext', array(
			'label' => __( 'Use Fittext for long site title', 'arcade' ),
			'section' => 'title_tagline',
			'type' => 'checkbox',
			'priority' => 25,
		) );

		$wp_customize->add_setting( 'header_icon', array(
			'default' => $bavotasan_default_theme_options['header_icon'],
            'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_control( new Bavotasan_Icon_Select_Control( $wp_customize, 'header_icon', array(
			'label' => __( 'Header Icon', 'arcade' ),
			'section' => 'title_tagline',
			'priority' => 30,
		) ) );

		// Layout section panel
		$wp_customize->add_section( 'bavotasan_layout', array(
			'title' => __( 'Layout', 'arcade' ),
			'priority' => 35,
		) );

		$wp_customize->add_setting( 'width', array(
			'default' => $bavotasan_default_theme_options['width'],
            'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( 'width', array(
			'label' => __( 'Site Width', 'arcade' ),
			'section' => 'bavotasan_layout',
			'priority' => 10,
			'type' => 'select',
			'choices' => array(
				'1170' => __( '1200px', 'arcade' ),
				'992' => __( '992px', 'arcade' ),
			),
		) );

		$choices =  array(
			'col-md-2' => '17%',
			'col-md-3' => '25%',
			'col-md-4' => '34%',
			'col-md-5' => '42%',
			'col-md-6' => '50%',
			'col-md-7' => '58%',
			'col-md-8' => '66%',
			'col-md-9' => '75%',
			'col-md-10' => '83%',
		);

		$wp_customize->add_setting( 'primary', array(
			'default' => $bavotasan_default_theme_options['primary'],
            'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_control( 'primary', array(
			'label' => __( 'Main Content Width', 'arcade' ),
			'section' => 'bavotasan_layout',
			'priority' => 15,
			'type' => 'select',
			'choices' => $choices,
		) );

		if ( is_active_sidebar( 'second-sidebar' ) ) {
			$wp_customize->add_setting( 'secondary', array(
				'default' => isset( $bavotasan_default_theme_options['secondary'] ) ? $bavotasan_default_theme_options['secondary'] : 'col-md-2',
		                'sanitize_callback' => 'esc_attr',
			) );

			$wp_customize->add_control( 'secondary', array(
				'label' => __( 'First Sidebar Width', 'arcade' ),
				'section' => 'bavotasan_layout',
				'priority' => 20,
				'type' => 'select',
				'choices' => $choices,
			) );
		}

		$wp_customize->add_setting( 'layout', array(
			'default' => $bavotasan_default_theme_options['layout'],
            'sanitize_callback' => 'esc_attr',
		) );

		$layout_choices = array(
			'left' => __( 'Left', 'arcade' ),
			'right' => __( 'Right', 'arcade' ),
		);

		if ( is_active_sidebar( 'second-sidebar' ) )
			$layout_choices['separate'] = __( 'Separate', 'arcade' );

		$wp_customize->add_control( new Bavotasan_Post_Layout_Control( $wp_customize, 'layout', array(
			'label' => __( 'Sidebar Layout', 'arcade' ),
			'section' => 'bavotasan_layout',
			'size' => false,
			'priority' => 25,
			'choices' => $layout_choices,
		) ) );

		$colors = array(
			'default' => __( 'Default', 'arcade' ),
			'info' => __( 'Light Blue', 'arcade' ),
			'primary' => __( 'Blue', 'arcade' ),
			'danger' => __( 'Red', 'arcade' ),
			'warning' => __( 'Yellow', 'arcade' ),
			'success' => __( 'Green', 'arcade' ),
		);

		// Fonts panel
		$mixed_fonts = array(
			'Websafe Fonts' => array(
				'Arial, Helvetica, sans-serif' => 'Arial',
				'"Copperplate Light", "Copperplate Gothic Light", serif' => 'Copperplate Light',
				'"Courier New", Courier, monospace' => 'Courier New',
				'Futura, "Century Gothic", AppleGothic, sans-serif' => 'Futura',
				'Georgia, Times, "Times New Roman", serif' => 'Georgia',
				'"Gill Sans", Calibri, "Trebuchet MS", sans-serif' => 'Gill Sans',
				'"Helvetica Neue", Helvetica, Arial, sans-serif' => 'Helvetica Neue',
				'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif' => 'Impact',
				'"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif' => 'Lucida',
				'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif' => 'Palatino',
				'Tahoma, Geneva, Verdana, sans-serif' => 'Tahoma',
				'"Times New Roman", Times, Georgia, serif' => 'Times New Roman',
				'"Trebuchet MS", Tahoma, Arial, sans-serif' => 'Trebuchet',
				'Verdana, Geneva, Tahoma, sans-serif' => 'Verdana',
			),
			'Google Fonts' => bavotasan_google_fonts(),
		);

		$wp_customize->add_section( 'bavotasan_fonts', array(
			'title' => __( 'Fonts', 'arcade' ),
			'priority' => 40,
		) );

		$wp_customize->add_setting( 'site_title_font', array(
			'default' => $bavotasan_default_theme_options['site_title_font'],
            'sanitize_callback' => 'esc_html',
		) );

		$wp_customize->add_setting( 'site_title_font_size', array(
			'default' => $bavotasan_default_theme_options['site_title_font_size'],
            'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( new Bavotasan_Font_Control( $wp_customize, 'site_title_font', array(
			'label' => __( 'Site Title', 'arcade' ),
			'section' => 'bavotasan_fonts',
			'priority' => 5,
			'choices' => $mixed_fonts,
		) ) );


		$wp_customize->add_setting( 'main_text_font', array(
			'default' => $bavotasan_default_theme_options['main_text_font'],
            'sanitize_callback' => 'esc_html',
		) );

		$wp_customize->add_setting( 'main_text_font_size', array(
			'default' => $bavotasan_default_theme_options['main_text_font_size'],
            'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( new Bavotasan_Font_Control( $wp_customize, 'main_text_font', array(
			'label' => __( 'Main Text', 'arcade' ),
			'section' => 'bavotasan_fonts',
			'priority' => 10,
			'choices' => $mixed_fonts,
		) ) );

		$wp_customize->add_setting( 'headers_font', array(
			'default' => $bavotasan_default_theme_options['headers_font'],
            'sanitize_callback' => 'esc_html',
		) );

		$wp_customize->add_control( new Bavotasan_Font_Control( $wp_customize, 'headers_font', array(
			'label' => __( 'Headers (h1, h2, h3, etc...)', 'arcade' ),
			'section' => 'bavotasan_fonts',
			'size' => false,
			'priority' => 15,
			'choices' => $mixed_fonts,
		) ) );

		$wp_customize->add_setting( 'post_title_font', array(
			'default' => $bavotasan_default_theme_options['post_title_font'],
            'sanitize_callback' => 'esc_html',
		) );

		$wp_customize->add_setting( 'post_title_font_size', array(
			'default' => $bavotasan_default_theme_options['post_title_font_size'],
            'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( new Bavotasan_Font_Control( $wp_customize, 'post_title_font', array(
			'label' => __( 'Post Title', 'arcade' ),
			'section' => 'bavotasan_fonts',
			'priority' => 30,
			'choices' => $mixed_fonts,
		) ) );

		$wp_customize->add_setting( 'post_meta_font', array(
			'default' => $bavotasan_default_theme_options['post_meta_font'],
            'sanitize_callback' => 'esc_html',
		) );

		$wp_customize->add_setting( 'post_meta_font_size', array(
			'default' => $bavotasan_default_theme_options['post_meta_font_size'],
            'sanitize_callback' => 'absint',
		) );

		$wp_customize->add_control( new Bavotasan_Font_Control( $wp_customize, 'post_meta_font', array(
			'label' => __( 'Post Meta', 'arcade' ),
			'section' => 'bavotasan_fonts',
			'priority' => 35,
			'choices' => $mixed_fonts,
		) ) );

		// Color panel
		$wp_customize->add_setting( 'headers_color', array(
			'default' => $bavotasan_default_theme_options['headers_color'],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'headers_color', array(
			'label' => __( 'Headers (h1, h2, h3, etc...)', 'arcade' ),
			'section'  => 'colors',
			'priority' => 20,
		) ) );

		$wp_customize->add_setting( 'main_text_color', array(
			'default' => $bavotasan_default_theme_options['main_text_color'],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_text_color', array(
			'label' => __( 'Main Text Color', 'arcade' ),
			'section'  => 'colors',
			'priority' => 25,
		) ) );

		$wp_customize->add_setting( 'link_color', array(
			'default' => $bavotasan_default_theme_options['link_color'],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
			'label' => __( 'Link Color', 'arcade' ),
			'section'  => 'colors',
			'priority' => 50,
		) ) );

		$wp_customize->add_setting( 'link_hover_color', array(
			'default' => $bavotasan_default_theme_options['link_hover_color'],
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hover_color', array(
			'label' => __( 'Link Hover Color', 'arcade' ),
			'section'  => 'colors',
			'priority' => 55,
		) ) );

		// Posts panel
		$wp_customize->add_section( 'bavotasan_posts', array(
			'title' => __( 'Posts', 'arcade' ),
			'priority' => 45,
			'description' => __( 'These options do not affect the home page post section.', 'arcade' ),
		) );

		$wp_customize->add_setting( 'display_categories', array(
			'default' => $bavotasan_default_theme_options['display_categories'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'display_categories', array(
			'label' => __( 'Display Categories', 'arcade' ),
			'section' => 'bavotasan_posts',
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'display_author', array(
			'default' => $bavotasan_default_theme_options['display_author'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'display_author', array(
			'label' => __( 'Display Author', 'arcade' ),
			'section' => 'bavotasan_posts',
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'display_date', array(
			'default' => $bavotasan_default_theme_options['display_date'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'display_date', array(
			'label' => __( 'Display Date', 'arcade' ),
			'section' => 'bavotasan_posts',
			'type' => 'checkbox',
		) );

		$wp_customize->add_setting( 'display_comment_count', array(
			'default' => $bavotasan_default_theme_options['display_comment_count'],
            'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
		) );

		$wp_customize->add_control( 'display_comment_count', array(
			'label' => __( 'Display Comment Count', 'arcade' ),
			'section' => 'bavotasan_posts',
			'type' => 'checkbox',
		) );

		// Footer panel
		$wp_customize->add_section( 'bavotasan_footer', array(
			'title' => __( 'Footer', 'arcade' ),
			'priority' => 50,
		) );

		$wp_customize->add_setting( 'extended_footer_columns', array(
			'default' => $bavotasan_default_theme_options['extended_footer_columns'],
			'transport' => 'postMessage',
            'sanitize_callback' => 'esc_attr',
		) );

		$wp_customize->add_control( 'extended_footer_columns', array(
			'label' => __( 'Extended Footer Columns', 'arcade' ),
			'section' => 'bavotasan_footer',
			'priority' => 10,
			'type' => 'select',
			'choices' => array(
				'col-md-12' => __( '1 Column', 'arcade' ),
				'col-md-6' => __( '2 Columns', 'arcade' ),
				'col-md-4' => __( '3 Columns', 'arcade' ),
				'col-md-3' => __( '4 Columns', 'arcade' ),
				'col-md-2' => __( '6 Columns', 'arcade' ),
			),
		) );
	}

	/**
	 * Sanitize checkbox options
	 *
	 * @since 1.0.2
	 */
    public function sanitize_checkbox( $value ) {
        if ( 'on' != $value )
            $value = false;

        return $value;
    }
}
$bavotasan_customizer = new Bavotasan_Customizer;

/**
 * Prepare font CSS
 *
 * @param	string $font  The select font
 *
 * @since 1.0.0
 */
function bavotasan_prepare_font( $font ) {
	$font_family = ( 'Lato Light, sans-serif' == $font ) ? 'Lato' : $font;
	$font_family = ( 'Arvo Bold, serif' == $font ) ? 'Arvo' : $font_family;
	$font_weight = ( 'Lato Light, sans-serif' == $font ) ? ' font-weight: 300' : 'font-weight: normal';
	$font_weight = ( 'Lato, sans-serif' == $font ) ? ' font-weight: 400' : $font_weight;
	$font_weight = ( 'Lato Bold, sans-serif' == $font || 'Arvo Bold, serif' == $font ) ? ' font-weight: 900' : $font_weight;

	return 'font-family: ' . html_entity_decode( $font_family ) . '; ' . $font_weight;
}

function bavotasan_google_fonts() {
	return apply_filters( 'bavotasan_default_google_fonts', array(
        'Arvo, serif' => 'Arvo',
        'Arvo Bold, serif' => 'Arvo Bold',
        'Cabin, sans-serif' => 'Cabin',
        'Copse, sans-serif' => 'Copse',
        '"Droid Sans", sans-serif' => 'Droid Sans',
        '"Droid Serif", serif' => 'Droid Serif',
        'Exo, sans-serif' => 'Exo',
        'Lato Light, sans-serif' => 'Lato Light',
        'Lato, sans-serif' => 'Lato',
        'Lato Bold, sans-serif' => 'Lato Bold',
        'Lobster, cursive' => 'Lobster',
        'Megrim, cursive' => 'Megrim',
        'Nobile, sans-serif' => 'Nobile',
        '"Open Sans", sans-serif' => 'Open Sans',
        'Oswald, sans-serif' => 'Oswald',
        'Pacifico, cursive' => 'Pacifico',
        'Raleway, sans-serif' => 'Raleway',
        'Rokkitt, serif' => 'Rokkit',
        '"Russo One", sans-serif' => 'Russo One',
        '"PT Sans", sans-serif' => 'PT Sans',
        'Quicksand, sans-serif' => 'Quicksand',
        'Quattrocento, serif' => 'Quattrocento',
        'Ubuntu, sans-serif' => 'Ubuntu',
        '"Yanone Kaffeesatz", sans-serif' => 'Yanone Kaffeesatz',
    ) );
}
