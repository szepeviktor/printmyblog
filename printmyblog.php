<?php
/**
 * @package PrintMyBlog
 * @version 1.0
 */
/*
Plugin Name: Print My Blog
Plugin URI: https://github.com/mnelson4/printmyblog
Description: Simplifies printing your entire blog. Just go to tools -> Print My Blog,
Author: Michael Nelson
Version: 1.0
Requires at least: 4.4
Requires PHP: 5.4
Author URI: https://cmljnelson.wordpress.com
*/

use PrintMyBlog\controllers\PmbInit;

if (!defined('PMB_VERSION')) {
    define('PMB_VERSION', '1.0.0.rc.001');
    define('PMB_DIR', wp_normalize_path(__DIR__) . '/');
    define('PMB_MAIN_FILE', __FILE__);
    define('PMB_TEMPLATES_DIR', PMB_DIR . 'templates/');
    define('PMB_INCLUDES_DIR', PMB_DIR . 'includes/');
    define('PMB_TWINE_DIR', PMB_DIR . 'twine_framework/');
    define('PMB_TWINE_INCLUDES_DIR', PMB_TWINE_DIR . 'includes/');
    define('PMB_ADMIN_CAP', 'export');

    /**
     * adds a wp-option to indicate that PMB has been activated via the WP admin plugins page.
     * This can be used to do initial plugin installation or redirect the user to the setup page.
     */
    function pmb_plugin_activation()
    {
        update_option('pmb_activation', true);
    }

    register_activation_hook(PMB_MAIN_FILE, 'pmb_plugin_activation');
    require_once(PMB_INCLUDES_DIR . 'constants.php');
    require_once(PMB_TWINE_INCLUDES_DIR . 'controllers/BaseController.php');
    require_once(PMB_INCLUDES_DIR . 'controllers/PmbInit.php');
    $init_controller = new PmbInit();
    $init_controller->setHooks();
}