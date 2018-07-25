<?php
if ( class_exists( 'WP_Customize_Control' ) ) {
	class Bavotasan_Export extends WP_Customize_Control {
	    public function render_content() {
	        ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

			<p class="description customize-control-description">
			    <?php _e( 'Click the button below to export all of your saved theme options.', 'arcade' ); ?>
			</p>

			<p><button class="button" id="export-theme-options"><?php esc_attr_e( 'Export options', 'arcade' ); ?></button></p>
			<hr />

			<form enctype="multipart/form-data" id="import-upload-form" method="post" class="wp-upload-form" action="<?php echo esc_url( wp_nonce_url( esc_url( admin_url( 'customize.php' ) ), 'import-upload' ) ); ?>">
				<p class="description customize-control-description">
					<label for="upload"><?php _e( 'Choose a theme options file from your computer to import:', 'arcade' ); ?></label>
					<input type="file" id="upload" name="bavotasan-import" size="25" />
				</p>
				<p><button type="submit" name="bavotasan-import" class="button" id="submit"><?php esc_attr_e( 'Import options', 'arcade' ); ?></button></p>
			</form>
			<?php
	    }
	}
}

class Bavotasan_Import_Export {
	public function __construct() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'customize_controls_print_scripts', array( $this, 'customize_controls_print_scripts' ) );
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'customize_controls_enqueue_scripts' ) );
	}

	/**
	 * Adds the functionality for exporting and importing theme options
	 *
	 * This function is attached to the 'init' action hook.
	 *
	 * @since 1.0.0
	 */
	static public function init() {
    	if ( current_user_can( 'edit_theme_options' ) ) {
	        if ( isset( $_REQUEST['bavotasan-export'] ) )
                self::_export();

            if ( isset( $_REQUEST['bavotasan-import'] ) ) {
            	if ( empty( $_FILES['bavotasan-import']['tmp_name'] ) ) {
					global $bavotasan_error;
		            $bavotasan_error = __( 'Please choose a file to import.', 'arcade' );
	            } else {
	                self::_import();
	            }
	        }
    	}
    }

	/**
	 * Enqueues the needed script and localizes the variables
	 *
	 * This function is attached to the 'customize_controls_enqueue_scripts' action hook.
	 *
	 * @since 1.0.0
	 */
	static public function customize_controls_enqueue_scripts() {
		wp_enqueue_script( 'bavotasan_customizer_export', BAVOTASAN_THEME_URL . '/library/js/admin/export-import.js', array( 'jquery' ), '', true );

        wp_localize_script( 'bavotasan_customizer_export', 'BavotasanCustomizer', array(
            'customizerURL'   => admin_url( 'customize.php' ),
            'exportNonce'     => wp_create_nonce( 'bavotasan-exporting' )
        ));
	}

	/**
	 * Checks if the $bavotasan_error variable has been set and displays an alert
	 *
	 * This function is attached to the 'customize_controls_print_scripts' action hook.
	 *
	 * @since 1.0.0
	 */
	static public function customize_controls_print_scripts() {
        global $bavotasan_error;

        if ( $bavotasan_error )
            echo '<script> alert("' . $bavotasan_error . '"); </script>';
	}

	/**
	 * Exporting functionality
	 *
	 * @since 1.0.0
	 */
	static private function _export() {
    	if ( ! wp_verify_nonce( $_REQUEST['bavotasan-export'], 'bavotasan-exporting' ) )
        	return;

    	// Prepare the theme options data
    	$theme = get_option( 'stylesheet' );
    	$template = get_option( 'template' );
    	$charset = get_option( 'blog_charset' );
    	$data = array(
	    	'template' => $template,
	    	'options' => array(
				'theme_mods_arcade' => get_theme_mods(),
				'arcade_custom_css' => get_option( 'arcade_custom_css' ),
				'arcade_google_fonts' => get_option( 'arcade_google_fonts' ),
			),
		);

    	// Set the download headers
    	header( 'Content-disposition: attachment; filename=' . $theme . '-export.json' );
		header( 'Content-Type: application/octet-stream; charset=' . $charset );

    	// Serialize the export data
    	echo json_encode( $data );

    	// Start the download
    	die();
    }

	/**
	 * Importing functionality
	 *
	 * @since 1.0.0
	 */
	static private function _import() {
    	global $bavotasan_error;

    	if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'import-upload' ) ) {
        	$bavotasan_error = __( 'There was a security issue. Please try again.', 'arcade' );
        	return;
		}

    	// Get the imported theme options file
    	$bavotasan_error = false;
    	$template = get_option( 'template' );
    	$raw = file_get_contents( $_FILES['bavotasan-import']['tmp_name'] );
    	$data = @json_decode( $raw, true );

    	// Data checks
    	if ( 'array' != gettype( $data ) ) {
        	$bavotasan_error = __( 'Error importing options! Please check that you uploaded a theme options export file.', 'arcade' );
        	return;
    	}

    	if ( $data['template'] != $template ) {
        	$bavotasan_error = __( 'Error importing options! The options you uploaded are not for the current theme.', 'arcade' );
        	return;
    	}

    	// Save the theme options
		foreach( $data['options'] as $option_name => $option_value ) {
			update_option( $option_name, $option_value );
		}

		wp_redirect( esc_url( admin_url( 'customize.php' ) ) );
    }

	/**
	 * Adds 'Export/Import Theme Options' section to the Customizer screen
	 *
	 * This function is attached to the 'customize_register' action hook.
	 *
	 * @param	class $wp_customize
	 *
	 * @since 1.0.0
	 */
	public function customize_register( $wp_customize ) {
        // Add the export/import section
        $wp_customize->add_section( 'bavotasan_export', array(
            'title' => __( 'Export/Import Theme Options', 'arcade' ),
            'priority' => 999
        ) );

        $wp_customize->add_setting( 'export', array(
            'default' => '',
            'type' => 'none',
            'sanitize_callback' => 'esc_attr'
        ) );

        $wp_customize->add_control( new Bavotasan_Export( $wp_customize, 'export', array(
            'section' => 'bavotasan_export',
            'priority' => 1
        ) ) );
	}
}
$bavotasan_import_export = new Bavotasan_Import_Export;