<?php
namespace Reaction\Inc\Controllers;

use Reaction\Inc\Ajax\ReactAverage;
use Reaction\Inc\Ajax\ReactDislike;
use Reaction\Inc\Ajax\ReactLike;
use Reaction\Inc\Base\BaseController;
use Reaction\Inc\Traits\FileLocations;

class Shortcode{
	public function __construct() {

		add_shortcode( 'reaction-button', array( __CLASS__, 'reactionShortCode' ) );

		add_action( 'wp_ajax_react_like', array( ReactLike::class, 'reactLike_callback' ) );
		add_action( 'wp_ajax_nopriv_react_like', array( ReactLike::class, 'reactLike_callback' ) );

		add_action( 'wp_ajax_react_average', array( ReactAverage::class, 'reactAverage_callback' ) );
		add_action( 'wp_ajax_nopriv_react_average', array( ReactAverage::class, 'reactAverage_callback' ) );

		add_action( 'wp_ajax_react_dislike', array( ReactDislike::class, 'reactDislike_callback' ) );
		add_action( 'wp_ajax_nopriv_react_dislike', array( ReactDislike::class, 'reactDislike_callback' ) );

	}

	public static function reactionShortCode() {
		ob_start();
		$post_id           = get_the_ID();
		$user_registration = "unregister-user";
		if ( $user_id = get_current_user_id() ) {
			$user_registration = "register-user";
		}

		$like = get_post_meta($post_id, '_react_like_num', true);
		$like = $like ? $like :0;

		$average_react = get_post_meta($post_id, '_react_average_num', true);
		$average_react = $average_react ? $average_react :0;

		$dislike_react = get_post_meta($post_id, '_react_dislike_num', true);
		$dislike_react = $dislike_react ? $dislike_react :0;

		?>
        <div class="reaction-buttons-wrapper">
            <div class="reaction-like <?php echo esc_attr( $user_registration ); ?>" data-user="<?php echo esc_attr( $user_id ); ?>" data-id="<?php echo esc_attr( $post_id ); ?>">

                <div class="react-like-loader">
                    <img width="32" height="32" src="<?php echo esc_url(FileLocations::get_file_locations('plugin_url')."/assets/images/spinner.gif");?>" alt="<?php esc_html_e("gif","reaction-button"); ?>">
                </div>

                <img class="icon" src="<?php echo esc_url(FileLocations::get_file_locations('plugin_url')."/assets/images/smile-emoji.png");?>" alt="<?php esc_html_e("icon","reaction-button"); ?>"> <span class="count"><?php  echo esc_html($like); ?></span>
            </div>
            <div class="reaction-average <?php echo esc_attr( $user_registration ); ?>" data-user="<?php echo esc_attr( $user_id ); ?>" data-id="<?php echo esc_attr( $post_id ); ?>">

                <div class="react-average-loader">
                    <img width="32" height="32" src="<?php echo esc_url(FileLocations::get_file_locations('plugin_url')."/assets/images/spinner.gif");?>" alt="<?php esc_html_e("gif","reaction-button"); ?>">
                </div>

                <img class="icon" src="<?php echo esc_url(FileLocations::get_file_locations('plugin_url')."/assets/images/react-average.png");?>" alt="<?php esc_html_e("icon","reaction-button"); ?>"> <span class="count"><?php  echo esc_html($average_react); ?></span>
            </div>
            <div class="reaction-dislike <?php echo esc_attr( $user_registration ); ?>" data-user="<?php echo esc_attr( $user_id ); ?>" data-id="<?php echo esc_attr( $post_id ); ?>">

                <div class="react-dislike-loader">
                    <img width="32" height="32" src="<?php echo esc_url(FileLocations::get_file_locations('plugin_url')."/assets/images/spinner.gif");?>" alt="<?php esc_html_e("gif","reaction-button"); ?>">
                </div>
                <img class="icon" src="<?php echo esc_url(FileLocations::get_file_locations('plugin_url')."/assets/images/react-dislike.png");?>" alt="<?php esc_html_e("icon","reaction-button"); ?>"> <span class="count"><?php  echo esc_html($dislike_react); ?></span>
            </div>
        </div>
		<?php return ob_get_clean();
	}

}