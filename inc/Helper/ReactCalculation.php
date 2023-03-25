<?php
namespace Reaction\Inc\Helper;

class ReactCalculation{
	public static function reaction($user_id,$post_id,$user_meta_name,$post_meta_name,$reaction_message): void {
		if(is_user_logged_in()){

			$reacted_posts = get_user_meta($user_id, $user_meta_name, true);
			$reacted_posts = $reacted_posts ? $reacted_posts:[];

			$success = false;
			$massage = null;

			if (in_array($post_id , $reacted_posts)) {
				// duplicate clicked found
				$massage = $reaction_message;
				$previous_react = get_post_meta($post_id , $post_meta_name, true);
				$new_react = absint($previous_react) - 1;
				update_post_meta($post_id , $post_meta_name, $new_react);
				$reacted = array_diff( $reacted_posts, [$post_id ] );
				update_user_meta($user_id , $user_meta_name, $reacted);

			} else {
				// Like option
				$previous_react = get_post_meta($post_id , $post_meta_name, true);
				$new_react = absint($previous_react) + 1;
				update_post_meta($post_id , $post_meta_name, $new_react);

				if (empty($reacted_posts)) {
					update_user_meta($user_id , $user_meta_name, array($post_id ));
				} else {
					$author_arr = (is_array($reacted_posts)) ? $reacted_posts : array();

					$author_arr[] = $post_id ;
					update_user_meta($user_id , $user_meta_name, $author_arr);
				}

				$success = true;
				$massage = $reaction_message;
			}

			$final_count_update = get_post_meta($post_id , $post_meta_name, true);
		}else {
			// user not logged in
			$success = false;
			$massage = esc_html('User is not logged in', 'reaction-button');
			$final_count_update = '';
		}
		wp_send_json(array('success' => $success, 'msg' => $massage, 'finalcount' => $final_count_update));
	}
}