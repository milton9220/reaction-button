<?php

namespace Reaction\Inc\Ajax;

use Reaction\Inc\Helper\ReactCalculation;

class ReactDislike{
	public static function reactDislike_callback(  ): void {

		$action_name = sanitize_text_field( $_POST['action'] );
		$post_id     = sanitize_text_field( absint( $_POST['postId'] ) );
		$user_id     = sanitize_text_field( absint( $_POST['userId'] ) );

		ReactCalculation::reaction($user_id,$post_id,'_react_dislike_post','_react_dislike_num','dislike');

	}
}