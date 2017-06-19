<?php

class Typographie_Settings
{
    protected $typographie;

    protected $settings_names = [
        'global' => [
            'filters',
        ],
        'rules' => [
            'nbsp_before',
            'nbsp_after',
        ],
        'debug_options' => [
            'replace_space_by_underscore',
            'use_red_color',
        ]
    ];

    function __construct($typographieIn) {
        $this->typographie = $typographieIn;
        $this->init();
    }

    public function get($setting) {

        if ( is_string($setting) && $this->is_setting($setting)) {
            return esc_attr( get_option($setting) );

        } elseif (
            is_array($setting)
            && count($setting == 2)
            && is_string($setting[1])
            && is_string($setting[2])
        ) {
            $setting_name = $setting[1] . $setting[2];
            if ($this->is_setting($setting_name)) {
                return esc_attr( get_option( $setting_name ) );
            } else {
                return null;
            }
        }
        return null;
    }

    public function get_sections_names() {
        $sections_names = [];

        foreach ($this->settings_names as $section_name => $section) {
            $sections_names[count($sections_names)] = $section_name;
        }

        return $sections_names;
    }

    public function is_section_name($name) {
        foreach ($this->settings_names as $section_name => $section) {
            if ( $section_name == $name ) {
                return true;
            }
        }
        return false;
    }

    public function get_section($name) {
        if ($this->is_section_name($name)) {
            return $this->settings_names[$name];
        }
        return null;
    }

    public function is_setting($is_setting_name) {
        foreach ($this->get_settings_names() as $key => $setting_name) {
            if ($is_setting_name == $setting_name) {
                return true;
            }
        }
        return false;
    }

    public function get_settings_names() {
        $settings_names = [];
        foreach ($this->settings_names as $section_name => $section) {
            foreach ($section as $key => $settingsName) {
                $settings_names[count($settings_names)] = $section_name . '-' . $settingsName;
            }
        }
        return $settings_names;
    }

    public function get_settings() {
        return $this->settings_names;
    }

    public function init() {

        add_action(
            'admin_init',
            array (
                $this,
                'register_settings'
            )
        );

    }

    public function register_settings() {

        foreach ($this->settings_names as $section_name => $section) {
            foreach ($section as $key => $settingsName) {
                register_setting( 'typographie-settings-group', $section_name . '-' . $settingsName );
            }
        }

    }

}
