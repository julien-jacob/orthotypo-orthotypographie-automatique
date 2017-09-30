<?php
require 'typographie-settings.class.php';
require 'typographie-admin.class.php';

/**
 * Main class of Typographie plugin
 */
class typographie
{
	protected $plugin_name;
	protected $plugin_version;

	public $settings;
	public $admin;

	/**
	 * Constructor
	 */
	function __construct()
	{
		$this->plugin_name	= 'typographie';
		$this->plugin_version = '0.0.1';


		$this->settings = new Typographie_Settings( $this );

		if ( is_admin() ) {
			$this->admin	= new Typographie_Admin( $this );
		} else {
			$this->add_filters();

			add_action( 'plugins_loaded', array($this, 'enqueue_debug_style') );
		}


	}

	public function enqueue_debug_style() {

		if (
			('on' === get_option( 'debug_options-use_red_color' ))
			&& in_array( 'administrator', wp_get_current_user()->roles )
		) {
			/**
			 * Enqueue style file for admin page
			 */
			wp_enqueue_style(
				$this->plugin_name,
				plugin_dir_url( __FILE__ ) . 'css/debug.css',
				array(),
				$this->plugin_version,
				'all'
			);
		}

	}

	/**
	 * Read filter who's user write in WordPress admin
	 */
	public function add_filters() {

		if ( '' != $this->settings->get( 'global-filters' ) ) {

			$setting_customs_filters = explode( "\n", $this->settings->get( 'global-filters' ));
			$customs_filters = [];

			foreach ($setting_customs_filters as $key => $setting_custom_filter) {
				$setting_custom_filter = trim($setting_custom_filter);
				if ( ( '' != $setting_custom_filter ) && ( '#' != str_split($setting_custom_filter)[0] ) ) {
					array_push($customs_filters, $setting_custom_filter);
				}
			}

			foreach ($customs_filters as $key => $custom_filter) {
				add_filter( $custom_filter, array( $this, 'clear' ), 10, 2 );
			}
		}


	}

	/**
	 * Apply orthotypographie's and debug rules on a text
	 * @param  string	$text Text to clear
	 * @return [type]	Clean text
	 */
	public function clear( $text='' ) {

		// don't clear text on WordPress dashboard admin pages
		if ( is_admin() ) {
			return $text;
		}

		$clean_text = '';
		$nbsp = '&nbsp;';

		// Use for user status
		// global $current_user;
		// get_currentuserinfo();

		if (
			('on' === get_option( 'debug_options-replace_space_by_underscore' ))
			&& in_array( 'administrator', wp_get_current_user()->roles )
		) {
			$nbsp = '_';
		}

		$pattern		= array();
		$replacement	= array();

		if (get_option( 'rules-nbsp_before') == 'on' ) {
			array_push($pattern, '/[" "](\:|\!|\?|\;|»|&raquo)/');
			array_push($replacement, $nbsp . '$1');
		}

		if (get_option( 'rules-nbsp_after') == 'on' ) {
			array_push($pattern, '/(«|&laquo;)[" "]/');
			array_push($replacement, '$1' . $nbsp);
		}

		$clean_text = preg_replace($pattern, $replacement, $text);
		if (
			('on' === get_option( 'debug_options-use_red_color' ))
			&& in_array( 'administrator', wp_get_current_user()->roles )
		) {
			$clean_text = '<ins>' . $clean_text . '</ins>';
		}

		return $clean_text;
	}

	/**
	 * Getter for $typographie->plugin_name
	 * @return str $typographie->plugin_name
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Getter for $typographie->plugin_version
	 * @return str $typographie->plugin_version
	 */
	public function get_plugin_version() {
		return $this->plugin_version;
	}

}
