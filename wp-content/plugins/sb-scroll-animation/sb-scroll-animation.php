<?php
/*
	Plugin Name: SB Content Animation on Scroll  - WordPress Plugin
	Description: Animate your WordPress content on page scroll. Make your WordPress theme animataed. CSS3 transition available. Lots of Animation style available. Unlimited jQuery selector.
	Plugin URI: http://www.sbthemes.com/plugins/scroll-animation-wordpress-plugin/
	Version: 1.0.1
	Author: SB Themes
	Author URI: http://codecanyon.net/user/sbthemes/portfolio?ref=sbthemes
*/

/**
 * Initializing Plugin
 */

function init_sb_scroll_animation() {
	ob_start();
}
add_action('init', 'init_sb_scroll_animation');

/**
 * Defines Constant Variables
 */
@define(SBSA_PLUGIN_VERSION, '1.0');															//Plugin Version
@define(SBSA_DB_VERSION, '1.0');																//Database Version
@define(SBSA_DIR_URL, plugins_url('/sb-scroll-animation'));										//Return plugin uri
@define(SBSA_DIR_PATH, plugin_dir_path(__FILE__));												//Return plugin path

/**
 * Plugin Activation Hook
 */
function sbsa_active_plugin() {
	global $wpdb;
	$sbsa_global_settings = array( 'plugin_status' => 1 );
	update_option('sbsa_global_settings', $sbsa_global_settings);
	update_option('sbsa_db_version', SBSA_DB_VERSION);
}
register_activation_hook( __FILE__, 'sbsa_active_plugin' );

/**
 * Set-up Action and Filter Hooks To Add Menu Items (Admin Screen)
 */
function  sbsa_add_menu_page() {
	add_submenu_page('options-general.php', 'SB Scroll Animation', 'SB Scroll Animation', 'manage_options', 'sb-scroll-animation', 'sbsa_render_form');
}
add_action('admin_menu', 'sbsa_add_menu_page');


/**
 * Add settings link in plugins page
 */
function sbsa_plugin_action_links($links, $file) {
    if ($file == plugin_basename( __FILE__ )) {
        $sbsa_links = '<a href="'.get_admin_url().'options-general.php?page=sb-scroll-animation">'.__('Settings').'</a>';
        // Make the 'Settings' link appear first
        array_unshift( $links, $sbsa_links );
    }
    return $links;
}
add_filter('plugin_action_links', 'sbsa_plugin_action_links', 10, 2);

/**
 * Adding plugin scripts and styles
 */
function sbsa_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_style( 'sbsa-style', SBSA_DIR_URL.'/assets/css/sbsa.css', array(), SBSA_PLUGIN_VERSION );
	wp_enqueue_style( 'sbsa-animate-style', SBSA_DIR_URL.'/assets/css/animate.css', array(), SBSA_PLUGIN_VERSION );
	wp_enqueue_script( 'sbsa-appear', SBSA_DIR_URL.'/assets/js/wow.js', array(), SBSA_PLUGIN_VERSION, true );
}
add_action('wp_enqueue_scripts', 'sbsa_scripts');

function animation_script() {
	$sbsa_global_settings = get_option('sbsa_global_settings');
	if($sbsa_global_settings['plugin_status'] == 1) {
		$sbsa_settings = get_option('sbsa_settings'); ?>
		<script type="text/javascript">
			(function($){
				//Adding animation to dom
				function add_animation($this, animation, animation_time, animation_delay) {
					$this.css({
						'-webkit-animation-duration':animation_time+'s',
								'animation-duration':animation_time+'s',
						'-webkit-animation-delay':animation_delay+'s',
								'animation-delay':animation_delay+'s'
					});
					$this.removeClass('wow animated '+animation).addClass('wow animated '+animation).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function (e) {
						$this.css({
							'-webkit-animation':'none',
					   '-webkit-animation-name':'none',
							   'animation-name':'none',
									'animation':'none'
						});
						$this.removeClass('wow animated '+animation).removeAttr('sbsa-animation');
					});
				}
				$(document).ready(function(){
					$('[sbsa-animation]').each(function () {
						var animation_style = $(this).attr('sbsa-animation');
						var animation_time = $(this).attr('sbsa-time');
						var animation_delay = $(this).attr('sbsa-delay');
						if(typeof animation_time === 'undefined') {
							animation_time = 1;
						}
						if(typeof animation_delay === 'undefined') {
							animation_delay = 0;
						}
						add_animation($(this), animation_style, animation_time, animation_delay);
					});
					
					<?php if($sbsa_settings) {
						foreach($sbsa_settings as $sbsa_setting) {
							if(!isset($sbsa_setting['animation_delay'])) {
								$sbsa_setting['animation_delay'] = 0;
							}
							if(strtolower($sbsa_setting['animation']) == 'none')
								continue; ?>
							$('<?php echo $sbsa_setting['selector']; ?>').each(function () {
								add_animation($(this), '<?php echo $sbsa_setting['animation']; ?>', '<?php echo $sbsa_setting['animation_time']; ?>', '<?php echo $sbsa_setting['animation_delay']; ?>');
							});
					<?php }
					} ?>
					
					new WOW().init();
				});
			})(jQuery);
		</script><?php
	}
}
add_action('wp_footer', 'animation_script');

/**
 * Including admin settings page
 */
require('admin/sbsa-admin-panel.php');


/**
 * Display DB Field
 */
function sbsa_display_field($string) {
	return htmlentities(stripslashes($string));
}
