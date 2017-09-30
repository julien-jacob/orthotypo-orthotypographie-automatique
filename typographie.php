<?php

/**
 * @author	Julien JACOB <contact@wprock.fr>
 * @link	https://twitter.com/wpr0ck
 * @package	Typographie
 *
 * @wordpress-plugin
 * Plugin Name : Typographie
 * Plugin URI  : https://wprock.fr
 * Description : Correction d'orthotypographie française
 * Version     : 0.0.1
 * Author      : Julien JACOB
 * Author URI  : https://twitter.com/wpr0ck
 * License     : GPL-2.0+
 * License URI : http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain : typographie
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/typographie.class.php';

/**
 * Begins execution of the plugin.
 */
function run_typographie() {
	$typographie = new Typographie();
}
run_typographie();
