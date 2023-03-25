<?php
namespace Reaction\Inc\Controllers\Elementor;

use Reaction\Inc\Traits\FileLocations;
use Elementor\Plugin;

class CustomWidgetInit{
	use FileLocations;
	public function __construct(){

		add_action( 'elementor/widgets/register', array( $this, 'init' ) );

		add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_style' ) );

	}
	public function editor_style(): void {

		$img = FileLocations::get_file_locations('plugin_url')."/assets/images/react-average.png";

		wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .reaction-button-custom-logo{content: url( '.$img.');width: 28px;}' );
	}
	public function init(){
		require_once __DIR__ . '/CustomWidgetBase.php';

		$widgets = array(
			'reaction-button'				=>'ReactionButton',
		);

		foreach ( $widgets as $dirname => $class ) {

			$template_name = '/elementor-custom/' . $dirname . '/class.php';
			if (file_exists(STYLESHEETPATH . $template_name)) {
				$file = STYLESHEETPATH . $template_name;
			} elseif (file_exists(TEMPLATEPATH . $template_name)) {
				$file = TEMPLATEPATH . $template_name;
			} else {
				$file = __DIR__ . '/' . $dirname . '/class.php';
			}
			require_once $file;
			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register( new $classname );
		}
	}

}