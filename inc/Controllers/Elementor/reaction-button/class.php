<?php
namespace Reaction\Inc\Controllers\Elementor;


use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Image_Size;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit;

class ReactionButton extends CustomWidgetBase {
	public function __construct( $data = [], $args = null ){
		$this->reaction_widget_name = esc_html__( 'Reaction Button', 'reaction-button' );
		$this->reaction_widget_base = 'reaction-button';
		parent::__construct( $data, $args );
	}
	public function reaction_button_fields(){
		$fields=array(
			array(
				'mode'    => 'section_start',
				'id'      => 'sec_general',
				'label'   => esc_html__( 'Reaction Button', 'reaction-button' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'react_like',
				'label'       => esc_html__( 'React Like Visibility', 'reaction-button' ),
				'label_on'    => esc_html__( 'On', 'reaction-button' ),
				'label_off'   => esc_html__( 'Off', 'reaction-button' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable react like icon. Default: On', 'reaction-button' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'react_average',
				'label'       => esc_html__( 'React Average Visibility', 'reaction-button' ),
				'label_on'    => esc_html__( 'On', 'reaction-button' ),
				'label_off'   => esc_html__( 'Off', 'reaction-button' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable react average icon. Default: On', 'reaction-button' ),
			),
			array(
				'type'        => Controls_Manager::SWITCHER,
				'id'          => 'react_dislike',
				'label'       => esc_html__( 'React Dislike Visibility', 'reaction-button' ),
				'label_on'    => esc_html__( 'On', 'reaction-button' ),
				'label_off'   => esc_html__( 'Off', 'reaction-button' ),
				'default'     => 'yes',
				'description' => esc_html__( 'Enable or disable react dislike icon. Default: On', 'reaction-button' ),
			),
			array(
				'mode' => 'section_end',
			),
		);
		return $fields;
	}

	protected function render() {
		$data = $this->get_settings();

		$template='view';

		return $this->reaction_button_template( $template, $data );
	}
}