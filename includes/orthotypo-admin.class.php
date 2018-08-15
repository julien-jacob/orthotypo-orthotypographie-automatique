<?php

class Orthotypo_Admin
{
	protected $orthotypo;

	/**
	 * Constructor
	 * @param object $orthotypoIn Include main plugin class
	 */
	function __construct( $orthotypoIn ) {

		$this->orthotypo = $orthotypoIn;

		/**
		 * Enqueue style file for admin page
		 */
		wp_enqueue_style(
			$this->orthotypo->get_plugin_name(),
			plugin_dir_url( __FILE__ ) . 'admin/css/admin.css',
			array(),
			$this->orthotypo->get_plugin_version(),
			'all'
		);

		/**
		 * Enqueue JS script file for admin page
		 */
		wp_enqueue_script(
			$this->orthotypo->get_plugin_name(),
			plugin_dir_url( __FILE__ ) . 'admin/js/admin.js',
			array( 'jquery' ),
			$this->orthotypo->get_plugin_version(),
			false
		);

		/**
		 * Add plugin admin in WordPress admin menu and link this to plugin admin page
		 */
		add_action( 'admin_menu', array( $this, 'addPage' ) );

		// Add a link to plugin's options page on plugin exerpt
		add_filter( "plugin_action_links_orthotypo-orthotypographie-automatique/orthotypo.php", array( $this, 'plugin_add_settings_link' ) );
	}


	/**
	 * Add options page link in WordPress admin menu -> settings width $this->addPage()
	 * and link this with $this->displayPage()
	 */
	public function addPage() {
		add_options_page(
			'Orthotypo - Options du plugin',
			'Orthotypo',
			'manage_options',
			'orthotypo',
			array( $this, 'displayPage' )
		);
	}


	/**
	 * Add a link to plugin's options page on plugin exerpt
	 * @param array $links
	 */
	public function plugin_add_settings_link ( $links ) {
		//var_dump($links); die;
		return array_merge( $links, array( '<a href="' . admin_url( 'options-general.php?page=orthotypo' ) . '">Options</a>' ) );
	}


	/**
	 * Display or restrict admin page plugin section
	 */
	public function displayPage() {
		if ( ! current_user_can( 'manage_options' ) )  {
			wp_die( 'Vous ne pouvez pas administrer ce plugin. Autorisations utilisateur insuffisantes.' );
		}
		require 'admin/main.php';
	}

}
