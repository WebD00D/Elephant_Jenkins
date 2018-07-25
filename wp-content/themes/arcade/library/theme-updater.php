<?php
/**
 * Modifed version of https://github.com/jeremyclark13/automatic-theme-plugin-update
 *
 * @todo	Look into why multisite is not working
 */
//set_site_transient( 'update_themes', null );
class Bavotasan_Theme_Updater {
	public function __construct() {
		add_filter( 'pre_set_site_transient_update_themes', array( $this, 'check_for_update' ) );
	}

	/**
	 * Functionality to hook in the WordPress theme updater.
	 *
	 * This function is attached to the 'pre_set_site_transient_update_themes' filter hook.
	 *
	 * @since 1.0.0
	 */
	public function check_for_update( $checked_data ) {
		if ( isset( $checked_data->response ) ) {
			$get_theme_info = wp_remote_fopen( 'https://dl.dropboxusercontent.com/u/5917529/updater.inc' );

			$theme_check = json_decode( $get_theme_info );

			if ( $theme_check ) {
				$latest_version = $theme_check->{BAVOTASAN_THEME_CODE}->version;
				if ( version_compare( BAVOTASAN_THEME_VERSION, $latest_version, '<' ) ) {
				    $update_data['new_version'] = $latest_version;
				    $update_data['url'] = $theme_check->{BAVOTASAN_THEME_CODE}->url;
				    $update_data['package'] = 'https://dl.dropboxusercontent.com/u/5917529/' . md5( 'wpt-' . BAVOTASAN_THEME_CODE ) . '/wpt-' . BAVOTASAN_THEME_CODE . '.zip';

					$checked_data->response[BAVOTASAN_THEME_FILE] = $update_data;
				} else {
					unset( $checked_data->response[BAVOTASAN_THEME_FILE] );
				}
			}
		}

		return $checked_data;
	}
}
$bavotasan_theme_updater = new Bavotasan_Theme_Updater;

if ( is_admin() )
	$current = get_site_transient( 'update_themes' );