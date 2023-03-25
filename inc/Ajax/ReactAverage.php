<?php
namespace Reaction\Inc\Ajax;

use Reaction\Inc\Helper\ReactCalculation;

class ReactAverage{
	public static function reactAverage_callback(  ): void {
		$action_name = sanitize_text_field( $_POST['action'] );
		$post_id     = sanitize_text_field( absint( $_POST['postId'] ) );
		$user_id     = sanitize_text_field( absint( $_POST['userId'] ) );

		ReactCalculation::reaction($user_id,$post_id,'_react_average_post','_react_average_num','average');

	}
}