<?php

defined( 'ABSPATH' ) or die();

class lsolcp_cookie_bar {
    public function __construct() {
        add_action('wp', array($this, 'cookie_panel'));
        add_shortcode( 'cookie_panel_link', array( $this, 'cookie_panel_link_shortcode' ));

        $this->check_migrate_1_1();
    }

    public function cookie_panel_link_shortcode($attributes) {
        $link_text = @$attributes['link_text'];

        return sprintf('<a href="javascript:lampCookieReInit();">%s</a>', esc_attr($link_text));
    }


    public function check_migrate_1_1() {
        if(empty(get_option('lsolcp_label_group_1', false))) return;

        $mappings = array(
            'lsolcp_label_group_1' => 'lsolcp_essential_name',
            'lsolcp_label_group_2' => 'lsolcp_stats_name',
            'lsolcp_label_group_3' => 'lsolcp_marketing_name',
        );

        foreach($mappings as $from => $to) {
            if(get_option($from)) {
                update_option($to, get_option($from));
                delete_option($from);
            }
        }

        update_option('lsolcp_marketing_tag_manager_id', get_option('lsolcp_tag_manager_id'));
        update_option('lsolcp_marketing_facebook_id', get_option('lsolcp_facebook_id'));

        update_option('lsolcp_stats_active', 1);
        update_option('lsolcp_marketing_active', 1);
    }

    public function cookie_panel() {
        if(!get_option('lsolcp_active')) return;

        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('wp_footer', array($this, 'html_markup'));

        global $wp_query;
        $post_id = $wp_query->post->ID;

        $privacy_policy_page_id     = (int) get_option( 'wp_page_for_privacy_policy' );
        $lsolcp_cookie_page_id     = (int) get_option( 'lsolcp_cookie_page_id' );
        $lsolcp_about_page_id     = (int) get_option( 'lsolcp_about_page_id' );
        $law_sites = array($privacy_policy_page_id, $lsolcp_cookie_page_id, $lsolcp_about_page_id);
        if(empty(get_option('lsolcp_subsiteslaw_active')) && !empty($post_id) && in_array($post_id, $law_sites)) {
            return;
        }

        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_start_script'));
    }

    public function enqueue_start_script() {
        wp_enqueue_script('lsolcp-cookie-bar-init-js', LSCOLP_URL.'js/cookie-bar-init.js', array('jquery', 'lsolcp-cookie-bar-js'));
    }

    public function enqueue_scripts() {
        wp_enqueue_style('lsolcp-cookie-bar-theme', LSCOLP_URL.'css/cookie-bar.css');
        wp_enqueue_script('lsolcp-cookie-bar-js', LSCOLP_URL.'js/cookie-bar.js', array('jquery'));
    }

    public function html_markup() {
        $lscolp_template_loader = new lscolp_template_loader();
        $cookiebar=$lscolp_template_loader->get_template_part('cookie-bar');

        if(!empty($cookiebar)) include_once $cookiebar;


    }

}
