<?php
namespace Reaction\Inc\Base;


use Reaction\Inc\Base\BaseController;
use Reaction\Inc\Controllers\AdminControllers;
use Reaction\Inc\Controllers\Shortcode;
use Reaction\Inc\Traits\FileLocations;

class InitialControllers extends BaseController{
	use FileLocations;
	function register(){
		$this->load_hooks();

	}
	private function load_hooks() {
		add_action('plugins_loaded',array($this,'reaction_button_loaded_text_domain'));
		add_action('init',[$this,'init_short_code']);
	}
	public function init_short_code( ) {
		new Shortcode();

	}
	public function reaction_button_loaded_text_domain(){
		load_plugin_textdomain( 'reaction-button', false, FileLocations::get_file_locations("plugin_path")."languages" );
	}

}