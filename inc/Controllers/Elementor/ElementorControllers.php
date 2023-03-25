<?php
namespace Reaction\Inc\Controllers\Elementor;

class ElementorControllers{
	public function register(){
		if (  did_action( 'elementor/loaded' ) ) {
			add_action('plugins_loaded',array($this,'elementor_custom_widgets'));
		}
	}

	public function elementor_custom_widgets(){
		new CustomWidgetInit();
	}
}
