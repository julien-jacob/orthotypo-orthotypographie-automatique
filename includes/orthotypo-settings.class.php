<?php
class Orthotypo_Settings
{
	protected $orthotypo;

	protected $settings_names = [
		'global' => [
			'filters',
			'is_init',
		],
		'rules' => [
			'punctuation',
			'quotation_marks',
			'percentage',
			'pleasantries_m',
			'pleasantries_mme',
			'pleasantries_mlle',
			'pleasantries_dr',
			'pleasantries_pr',
			'number_er',
			'number_nd',
			'number_e',
		],
		'debug_options' => [
			'replace_space_by_underscore',
			'use_red_color',
		]
	];

	protected $default_settings = [
		'global' => [
			'filters' => "the_title\nget_the_title\nthe_content\nget_the_content\nthe_excerpt\nget_the_excerpt\ncomment_text\ngettext",
			'is_init'=> true,
		],
		'rules' => [
			'punctuation'		=> 'on',
			'quotation_marks'	=> 'on',
			'percentage'		=> 'on',
			'pleasantries_m'	=> '',
			'pleasantries_mme'	=> '',
			'pleasantries_mlle'	=> '',
			'pleasantries_dr'	=> '',
			'pleasantries_pr'	=> '',
			'number_er'	=> '',
			'number_nd'	=> '',
			'number_e'	=> '',
		],
		'debug_options' => [
			'replace_space_by_underscore' => '',
			'use_red_color' => '',
		]
	];


	/**
	 * Constructor
	 * @param object $orthotypoIn Include main plugin class
	 */
	function __construct( $orthotypoIn ) {
		$this->orthotypo = $orthotypoIn;

		/**
		 * Add register_settings() to WodPress action
		 */
		add_action( 'admin_init', array ($this, 'register_settings') );

		if ($this->get('global-is_init') === false) {
			foreach ($this->default_settings as $section_name => $section) {
				foreach ($section as $option_sub_name => $value) {
					update_option($section_name . '-' . $option_sub_name, $value);
				}
			}
		}
	}


	/**
	 * Register all settings in WordPress
	 */
	public function register_settings() {
		foreach ($this->settings_names as $section_name => $section) {
			foreach ($section as $key => $settingsName) {
				register_setting( 'orthotypo-settings-group', $section_name . '-' . $settingsName );
			}
		}
	}


	/**
	 * Getter for plugins settings
	 * @param  String	$setting Setting name
	 * @return Sring	Value of setting
	 */
	public function get( $setting ) {

		if ( is_string( $setting ) && $this->is_setting( $setting )) {
			return get_option($setting);

		} elseif (
			is_array( $setting )
			&& (2 == count( $setting ))
			&& is_string( $setting[1] )
			&& is_string( $setting[2] )
		) {
			$setting_name = $setting[1] . $setting[2];
			if ( $this->is_setting($setting_name) ) {
				return get_option( $setting_name );
			} else {
				return null;
			}
		}
		return null;
	}


	/**
	 * Return a array of all plugin setting's names and values
	 * @return array [description]
	 */
	public function get_sections_names() {
		$sections_names = [];
		array_push($sections_names, $this->settings_names);
		return $sections_names;
	}


	/**
	 * Return true if $name is a plugin section name
	 * @param  string	$name A string
	 * @return boolean	$name is a setting name
	 */
	public function is_section_name( $name ) {
		foreach ($this->settings_names as $section_name => $section) {
			if ( $section_name == $name ) {
				return true;
			}
		}
		return false;
	}


	/**
	 * Getter for sections
	 * @param  string	$name A section name
	 * @return String	$this->settings_names[$name]
	 */
	public function get_section( $name ) {
		return ($this->is_section_name( $name )) ? $this->settings_names[ $name ] : null;
	}


	/**
	 * Return true if $is_setting_name is a setting
	 * @param  string	  $is_setting_name A string
	 * @return boolean	  $is_setting_name is a setting
	 */
	public function is_setting( $is_setting_name ) {
		foreach ($this->get_settings_names() as $key => $setting_name) {
			if ($is_setting_name == $setting_name) {
				return true;
			}
		}
		return false;
	}


	/**
	 * Get a array of all settings names
	 * @return array All settings names
	 */
	public function get_settings_names() {
		$settings_names = [];
		foreach ($this->settings_names as $section_name => $section) {
			foreach ($section as $key => $settingsName) {
				array_push($settings_names, $section_name . '-' . $settingsName);
			}
		}
		return $settings_names;
	}


	/**
	 * Getter for setting
	 * @return array $this->settings_names;
	 */
	public function get_settings() {
		$settings = array();
		$settings_names = $this->get_settings_names();

		foreach ($settings_names as $key => $setting_name) {
			array_push($settings, array('name' => $setting_name, 'value' => $this->get($setting_name)));
		}

		return $settings;
	}

}
