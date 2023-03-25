<?php
namespace Reaction\Inc\Base;


use Reaction\Inc\Base\BaseController;
use Reaction\Inc\Traits\FileLocations;


class Enqueue extends BaseController{

	use FileLocations;
	public function register(){
		add_action('wp_enqueue_scripts',array($this,'frontend_enqueue_scripts'));
	}

	public function frontend_enqueue_scripts(){

		wp_register_style('reaction-button-style', FileLocations::get_file_locations('plugin_url'). 'assets/css/reaction-button.css',array(),$this->plugin_version);

		wp_enqueue_style( 'reaction-button-style');

		wp_register_script('reaction-button', FileLocations::get_file_locations('plugin_url'). 'assets/js/app.js',array('jquery',),$this->plugin_version,true);

		wp_enqueue_script('reaction-button');

		$reaction_button_localize_data=array(
			'ajaxURL' => admin_url('admin-ajax.php')
		);
		wp_localize_script('reaction-button','reactionButtonObj',$reaction_button_localize_data);
	}
}