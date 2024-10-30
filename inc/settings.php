<?php

defined( 'ABSPATH' ) or die();

class lsolcp_settings_page {
    public function __construct() {
        add_action( 'admin_init', array($this, 'handleFormSubmit') );
        add_action( 'admin_init', array($this, 'register_setting') );
        add_action( 'admin_menu', array($this, 'add_options_page') );
        add_filter( 'plugin_action_links_'.LSCOLP_SLUG, array($this, 'add_settings_link') );
    }


    function add_settings_link( $links ) {
        $links[] = '<a href="' . admin_url( 'options-general.php?page=lsolcp' ) . '">' . __('Settings') . '</a>';
        return $links;
    }

    public function register_setting() {
        add_option( 'lsolcp_option_name', 'Cookie Panel');
        register_setting( 'lsolcp_options_group', 'lsolcp_option_name', 'lsolcp_callback' );
    }

    public function add_options_page() {
        add_options_page(__('Cookie Panel', 'cookie-panel'), __('Cookie Panel', 'cookie-panel'), 'manage_options', 'lsolcp', array($this, 'options_page'));
    }

    public function options_page() {


        include_once LSCOLP_DIR."/inc/settings-page.php";
    }

    public function handleFormSubmit() {
        if(!isset($_POST['lsolcp_settings_form'])) return;
        if(!check_admin_referer( 'lsolcp_settings_form' )) return;

        $form_fields_checkbox = array(
            'lsolcp_active',
            'lsolcp_stats_active',
            'lsolcp_marketing_active',
            'lsolcp_subsiteslaw_active',
        );

        $form_fields_text = array(
            'lsolcp_essential_name',
            'lsolcp_stats_name',
            'lsolcp_marketing_name',
            'lsolcp_marketing_facebook_id',
            'lsolcp_stats_facebook_id',
            'lsolcp_marketing_tag_manager_id',
            'lsolcp_stats_tag_manager_id',
            'lsolcp_title',
            'lsolcp_title_text',
            'lsolcp_css',
            'lsolcp_cookie_page_id',
            'lsolcp_about_page_id',
            'lsolcp_analytics_id',
            'lsolcp_matomo_id',
            'lsolcp_matomo_url',
            'lsolcp_button_save',
            'lsolcp_button_all'
        );

        foreach($form_fields_text as $form_name) {
            $form_value = sanitize_text_field($_POST[$form_name]);
            if($form_name == 'lsolcp_matomo_url') {
                $form_value = trailingslashit($form_value);
            }

            update_option($form_name, $form_value);
        }


        foreach($form_fields_checkbox as $form_name) {
            update_option($form_name, isset($_POST[$form_name]) && !empty($_POST[$form_name]));
        }

    }
}
