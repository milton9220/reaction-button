<?php
namespace Reaction\Inc\Controllers;

class AdminControllers{
	public function register(): void {
		add_action('admin_menu',array($this,'add_admin_menu'));
	}
	public function add_admin_menu(): void {
		add_menu_page(
                'Reaction Plugin Settings',
                'Reaction Button',
                'manage_options',
                'reaction_plugin',
                array($this, 'admin_menu_callback'), 'dashicons-admin-generic',
            50
		);
	}
	public function admin_menu_callback(): void {
		$page_title = __("Reaction Button Shortcode","reaction-plugin");
		?>
			<h1><?php echo esc_html($page_title); ?></h1>
			<h4><?php echo esc_html("[reaction-button]"); ?></h4>

			<?php
	}
}