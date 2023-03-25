<?php

namespace Reaction\Inc\Ajax;

use Reaction\Inc\Helper\ReactCalculation;

class ReactLike{
	public static function reactLike_callback(  ): void {
		
		$action_name = sanitize_text_field( $_POST['action'] );
		$post_id     = sanitize_text_field( absint( $_POST['postId'] ) );
		$user_id     = sanitize_text_field( absint( $_POST['userId'] ) );

		ReactCalculation::reaction($user_id,$post_id,'_liked_post','_react_like_num','like');

	}
}