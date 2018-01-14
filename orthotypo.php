<?php

/**
 * @author Julien MA JACOB <julien@cerf-de-pixel.fr>
 * @link https://twitter.com/wpr0ck
 * @package Orthotypo
 *
 * @wordpress-plugin
 * Plugin Name: Orthotypo - Orthotypographie automatisées
 * Plugin URI: https://wprock.fr/plugin/orthotypo
 * Description: L'extension qui corrige les contenus de vos site en y appliquant automatiquement les règles de l'orthotypographie de l'édition française.
 * Version: 0.1.0
 * Author: Julien MA JACOB
 * Author URI: https://twitter.com/wpr0ck
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: orthotypo
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/orthotypo.class.php';

/**
 * Begins execution of the plugin.
 */
function run_orthotypo() {
	$orthotypo = new Orthotypo();
}
run_orthotypo();
