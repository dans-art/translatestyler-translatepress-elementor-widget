<?php

/**
 * Plugin Name: Translatestyler - Elementor Widget for TranslatePress
 * Description: Helps you style the TranslatePress menu. You can add it as a regular Elementor widget and change the way it is displayed.
 * Plugin URI: https://dev.dans-art.ch/
 * Contributors: dansart
 * Contributors URL: http://dev.dans-art.ch
 * Tags: translatepress, elementor, widget, addon, style, tools, helper
 * Version: 1.0
 * Stable tag: 1.0
 * 
 * Requires at least: 5.4.0
 * Tested up to: 6.3.1
 * 
 * Requires Elementor
 * 
 * Requires PHP: 7.4
 * 
 * Domain Path: /languages
 * Text Domain: transtyle
 * 
 * Author: Dan's Art
 * Author URI: https://dev.dans-art.ch
 * Donate link: https://paypal.me/dansart13

 * License: GPLv3 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * 
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

define('TRANSSTYLE_ROOT_PATH', __DIR__);
define('TRANSSTYLE_ROOT_URL', plugin_dir_url( __FILE__ ));

add_action(
	'elementor/widgets/register',
	function ($widgets_manager) {

		require_once(TRANSSTYLE_ROOT_PATH . '/includes/widget-class.php');

		$widgets_manager->register(new \Transstyle_Widget());
	}
);


add_action('wp_enqueue_scripts', function () {

	/* Styles */
	wp_register_style('style-transtyle', TRANSSTYLE_ROOT_URL.'style/main.css');
});
