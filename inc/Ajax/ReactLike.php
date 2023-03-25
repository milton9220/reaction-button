<?php

namespace Reaction\Inc\Ajax;

use Reaction\Inc\Helper\ReactCalculation;

class ReactLike{
	public static function reactLike_callback(  ): void {
		
		$action_name = sanitize_text_field( $_POST['action'] );
		$post_id     = sanitize_text_field( absint( $_POST['postId'] ) );
		$user_id     = sanitize_text_field( absint( $_POST['userId'] ) );

		ReactCalculation::reaction($user_id,$post_id,'_liked_post','_react_like_num','like');

//		if(is_user_logged_in()){
//
//			$liked_posts = get_user_meta($user_id, '_liked_post', true);
//			$liked_posts = $liked_posts ? $liked_posts:[];
//
//			//$liked_posts = get_user_meta($user_id , '_liked_post', true);
//
//			$success = false;
//			$massage = null;
//
//			if (in_array($post_id , $liked_posts)) {
//				// duplicate clicked found
//				$massage = esc_html('liked', 'reaction-button');
//				$previous_like = get_post_meta($post_id , '_react_like_num', true);
//				$new_like = absint($previous_like) - 1;
//				update_post_meta($post_id , '_react_like_num', $new_like);
//				$liked = array_diff( $liked_posts, [$post_id ] );
//				update_user_meta($user_id , '_liked_post', $liked);
//
//			} else {
//				// Like option
//				$previous_like = get_post_meta($post_id , '_react_like_num', true);
//				$new_like = absint($previous_like) + 1;
//				update_post_meta($post_id , '_react_like_num', $new_like);
//
//				if (empty($liked_posts)) {
//					update_user_meta($user_id , '_liked_post', array($post_id ));
//				} else {
//					$author_arr = (is_array($liked_posts)) ? $liked_posts : array();
//
//					$author_arr[] = $post_id ;
//					update_user_meta($user_id , '_liked_post', $author_arr);
//				}
//
//				$success = true;
//				$massage = esc_html('like', 'reaction-button');
//			}
//
//			$final_count_update = get_post_meta($post_id , '_react_like_num', true);
//		}else {
//			// user not logged in
//			$success = false;
//			$massage = esc_html('User is not logged in', 'reaction-button');
//			$final_count_update = '';
//		}
//		wp_send_json(array('success' => $success, 'msg' => $massage, 'finalcount' => $final_count_update));

	}
}