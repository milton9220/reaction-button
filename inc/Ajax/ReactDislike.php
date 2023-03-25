<?php

namespace Reaction\Inc\Ajax;

use Reaction\Inc\Helper\ReactCalculation;

class ReactDislike{
	public static function reactDislike_callback(  ): void {

		$action_name = sanitize_text_field( $_POST['action'] );
		$post_id     = sanitize_text_field( absint( $_POST['postId'] ) );
		$user_id     = sanitize_text_field( absint( $_POST['userId'] ) );

		ReactCalculation::reaction($user_id,$post_id,'_react_dislike_post','_react_dislike_num','dislike');

//		if(is_user_logged_in()){
//
//			$react_dislike_posts = get_user_meta($user_id, '_react_dislike_post', true);
//			$react_dislike_posts = $react_dislike_posts ? $react_dislike_posts:[];
//
//			$success = false;
//			$massage = null;
//
//			if (in_array($post_id , $react_dislike_posts)) {
//				// duplicate clicked found
//				$massage = esc_html('liked', 'reaction-button');
//				$previous_dislike_react = get_post_meta($post_id , '_react_dislike_num', true);
//				$new_dislike_react = absint($previous_dislike_react) - 1;
//				update_post_meta($post_id , '_react_dislike_num', $new_dislike_react);
//				$dislike_react = array_diff( $react_dislike_posts, [$post_id ] );
//				update_user_meta($user_id , '_react_dislike_post', $dislike_react);
//
//			} else {
//				// Like option
//				$previous_dislike_react = get_post_meta($post_id , '_react_dislike_num', true);
//				$new_dislike_react = absint($previous_dislike_react) + 1;
//				update_post_meta($post_id , '_react_dislike_num', $new_dislike_react);
//
//				if (empty($react_dislike_posts)) {
//					update_user_meta($user_id , '_react_dislike_post', array($post_id ));
//				} else {
//					$author_arr = (is_array($react_dislike_posts)) ? $react_dislike_posts : array();
//
//					$author_arr[] = $post_id ;
//					update_user_meta($user_id , '_react_dislike_post', $author_arr);
//				}
//
//				$success = true;
//				$massage = esc_html('dislike', 'reaction-button');
//			}
//
//			$final_count_update = get_post_meta($post_id , '_react_dislike_num', true);
//		}else {
//			// user not logged in
//			$success = false;
//			$massage = esc_html('User is not logged in', 'reaction-button');
//			$final_count_update = '';
//		}
//
//		wp_send_json(array('success' => $success, 'msg' => $massage, 'finalcount' => $final_count_update));
	}
}