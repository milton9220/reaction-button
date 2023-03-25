<?php
namespace Reaction\Inc\Ajax;

use Reaction\Inc\Helper\ReactCalculation;

class ReactAverage{
	public static function reactAverage_callback(  ): void {
		$action_name = sanitize_text_field( $_POST['action'] );
		$post_id     = sanitize_text_field( absint( $_POST['postId'] ) );
		$user_id     = sanitize_text_field( absint( $_POST['userId'] ) );

		ReactCalculation::reaction($user_id,$post_id,'_react_average_post','_react_average_num','average');
//		if(is_user_logged_in()){
//
//			$average_react_posts = get_user_meta($user_id, '_react_average_post', true);
//			$average_react_posts = $average_react_posts ? $average_react_posts:[];
//			//$average_react_posts = get_user_meta($user_id , '_react_average_post', true);
//
//			$success = false;
//			$massage = null;
//
//			if (in_array($post_id , $average_react_posts)) {
//				// duplicate clicked found
//				$massage = esc_html('liked', 'reaction-button');
//				$previous_average_react = get_post_meta($post_id , '_react_average_num', true);
//				$new_average_react = absint($previous_average_react) - 1;
//				update_post_meta($post_id , '_react_average_num', $new_average_react);
//				$average_react = array_diff( $average_react_posts, [$post_id ] );
//				update_user_meta($user_id , '_react_average_post', $average_react);
//
//			} else {
//				// Like option
//				$previous_average_react = get_post_meta($post_id , '_react_average_num', true);
//				$new_average_react = absint($previous_average_react) + 1;
//				update_post_meta($post_id , '_react_average_num', $new_average_react);
//
//				if (empty($average_react_posts)) {
//					update_user_meta($user_id , '_react_average_post', array($post_id ));
//				} else {
//					$author_arr = (is_array($average_react_posts)) ? $average_react_posts : array();
//
//					$author_arr[] = $post_id ;
//					update_user_meta($user_id , '_react_average_post', $author_arr);
//				}
//
//				$success = true;
//				$massage = esc_html('Average', 'reaction-button');
//			}
//
//			$final_count_update = get_post_meta($post_id , '_react_average_num', true);
//		}else {
//			// user not logged in
//			$success = false;
//			$massage = esc_html('User is not logged in', 'reaction-button');
//			$final_count_update = '';
//		}

		//wp_send_json(array('success' => $success, 'msg' => $massage, 'finalcount' => $final_count_update));
	}
}