<?php
namespace Reaction\Inc\Traits;

trait FileLocations{
	private static $plugin_path;
	private static $plugin_url;

	private static $plugin;

	public static function get_file_locations($location_type) {

		if ( 'plugin_path' == $location_type ) {
			return self::$plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		} else if ( 'plugin_url' == $location_type ) {
			return self::$plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		} elseif ( 'plugin' == $location_type ) {
			return self::$plugin = plugin_basename( dirname( __FILE__, 3 ) ) . '/reaction-button.php';
		} else {
			return self::$plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		}
	}
}