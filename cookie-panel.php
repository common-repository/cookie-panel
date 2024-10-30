<?php

/*
Plugin Name: Cookie Panel
Plugin URI: https://www.lamp-solutions.de
Description: DSGVO-konforme Verwaltung Deiner Cookies
Version: 1.1.7
Author: LAMP solutions GmbH
Author URI: https://www.lamp-solutions.de
License: GPL3
Text Domain: cookie-panel
Domain Path: /languages
*/


defined( 'ABSPATH' ) or die();
define('LSCOLP_WPDIR', ABSPATH);
define('LSCOLP_DIR', plugin_dir_path(__FILE__));
define('LSCOLP_URL', plugin_dir_url(__FILE__));
define('LSCOLP_SLUG', plugin_basename(__FILE__));
define('LSCOLP_TEXTDOMAIN_PATH', dirname( plugin_basename( __FILE__ ) ) . '/languages/');
define('LSCOLP_PLUG_FILE', __FILE__);

include 'inc/settings.php';
include 'inc/template-loader.php';
include 'inc/cookie-bar.php';

if(is_admin()) { new lsolcp_settings_page(); }

new lsolcp_cookie_bar();