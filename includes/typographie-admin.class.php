<?php

class Typographie_Admin
{
	protected $typographie;

	/**
	 * Constructor
	 * @param object $typographieIn Include main plugin class
	 */
	function __construct( $typographieIn ) {
		$this->typographie = $typographieIn;

		/**
		 * Enqueue style file for admin page
		 */
		wp_enqueue_style(
			$this->typographie->get_plugin_name(),
			plugin_dir_url( __FILE__ ) . 'admin/css/admin.css',
			array(),
			$this->typographie->get_plugin_version(),
			'all'
		);

		/**
		 * Enqueue JS script file for admin page
		 */
		wp_enqueue_script(
			$this->typographie->get_plugin_name(),
			plugin_dir_url( __FILE__ ) . 'admin/js/admin.js',
			array( 'jquery' ),
			$this->typographie->get_plugin_version(),
			false
		);

		/**
		 * Add plugin admin in WordPress admin menu and link this to plugin admin page
		 */
		add_action('admin_menu', array( $this, 'addPage' ));
	}

	/**
	 * Add options page link in WordPress admin menu -> settings width $this->addPage()
	 * and link this with $this->displayPage()
	 */
	public function addPage() {
		add_options_page(
			'Typographie - Options du plugin',
			'Typographie',
			'manage_options',
			'typographie',
			array($this, 'displayPage')
		);

	}

	/**
	 * Display or restrict admin page plugin section
	 */
	public function displayPage() {
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'Vous ne pouvez pas administrer ce plugin. Autorisations utilisateur insuffisantes.' ) );
		}
		require 'admin/main.php';
	}

}
