<?php
namespace Reaction\Inc\Controllers\Elementor;

use \ReflectionClass;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


abstract class CustomWidgetBase extends Widget_Base {
	public $reaction_widget_name;
	public $reaction_widget_base;

	public $reaction_widget_icon;
	public $reaction_widget_dir;

	public function __construct( $data = [], $args = null ) {
		$this->reaction_widget_icon     = 'reaction-button-custom-logo';
		$this->reaction_widget_dir      = dirname( ( new ReflectionClass( $this ) )->getFileName() );
		parent::__construct( $data, $args );
	}

	abstract public function reaction_button_fields();

	public function get_name() {
		return $this->reaction_widget_base;
	}

	public function get_title() {
		return $this->reaction_widget_name;
	}

	public function get_icon() {
		return $this->reaction_widget_icon;
	}

	protected function register_controls() {
		$fields = $this->reaction_button_fields();
		foreach ( $fields as $field ) {
			if ( isset( $field['mode'] ) && $field['mode'] == 'section_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_section( $id, $field );
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'section_end' ) {
				$this->end_controls_section();
			}
			elseif ( isset( $field['mode'] ) && 'tabs_start' === $field['mode'] ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_tabs( $id );
			}
			elseif ( isset( $field['mode'] ) && 'tabs_end' === $field['mode'] ) {
				$this->end_controls_tabs();
			}
			elseif ( isset( $field['mode'] ) && 'tab_start' === $field['mode'] ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_tab( $id, $field );
			}
			elseif ( isset( $field['mode'] ) && 'tab_end' === $field['mode'] ) {
				$this->end_controls_tab();
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'group' ) {
				$type = $field['type'];
				unset( $field['mode'] );
				unset( $field['type'] );
				$this->add_group_control( $type, $field );
			}
			elseif ( isset( $field['mode'] ) && $field['mode'] == 'responsive' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->add_responsive_control( $id, $field );
			}
			else {
				$id = $field['id'];
				unset( $field['id'] );
				$this->add_control( $id, $field );
			}
		}
	}


	public function reaction_button_template( $template, $data ) {
		$template_name = '/elementor-custom/' . basename( $this->reaction_widget_dir ) . '/' . $template . '.php';
		if ( file_exists( STYLESHEETPATH . $template_name ) ) {
			$file = STYLESHEETPATH . $template_name;
		}
		elseif ( file_exists( TEMPLATEPATH . $template_name ) ) {
			$file = TEMPLATEPATH . $template_name;
		}
		else {
			$file = $this->reaction_widget_dir . '/' . $template . '.php';
		}

		ob_start();
		include $file;
		echo ob_get_clean();
	}
}