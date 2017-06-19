<?php

/**
 * @link              https://wprock/auteurs/julien-jacob
 * @since             1.0.0
 * @package           Typographie
 *
 * @wordpress-plugin
 * Plugin Name:       Typographie
 * Plugin URI:        https://wprock.fr
 * Description:       Extension de correction typographique
 * Version:           0.0.1
 * Author:            Julien JACOB
 * Author URI:        https://wprock/auteurs/julien-jacob
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       typographie
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-typographie-activator.php
 */
// function activate_typographie() {
// 	require_once plugin_dir_path( __FILE__ ) . 'includes/class-typographie-activator.php';
// 	Typographie_Activator::activate();
// }

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-typographie-deactivator.php
 */
// function deactivate_typographie() {
// 	require_once plugin_dir_path( __FILE__ ) . 'includes/class-typographie-deactivator.php';
// 	Typographie_Deactivator::deactivate();
// }
//
// register_activation_hook( __FILE__, 'activate_typographie' );
// register_deactivation_hook( __FILE__, 'deactivate_typographie' );

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
// var_dump(is_admin());
