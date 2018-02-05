<?php
 /*
 Plugin Name:  Orthotypo
 Plugin URI:   https://wprock.fr/plugin/orthotypo/
 Description:  L'extension qui corrige les contenus de vos site en y appliquant automatiquement les règles de l'orthotypographie de l'édition française.
 Version:      1.0.0
 Author:       Julien MA Jacob
 Author URI:   https://wprock.fr/
 License:      GPL2
 License URI:  https://www.gnu.org/licenses/gpl-2.0.html
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
