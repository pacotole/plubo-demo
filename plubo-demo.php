<?php

/**
 * @wordpress-plugin
 * Plugin Name:       PluboDemo
 * Plugin URI:        https://sirvelia.com/
 * Description:       A WordPress plugin made with PLUBO.
 * Version:           1.0.0
 * Author:            Sirvelia
 * Author URI:        https://sirvelia.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       plubo-demo
 * Domain Path:       /languages
 * Update URI:        false
 * Requires Plugins:
 */

if (!defined('WPINC')) {
    die('YOU SHALL NOT PASS!');
}

// PLUGIN CONSTANTS
define('PLUBODEMO_NAME', 'plubo-demo');
define('PLUBODEMO_VERSION', '1.0.0');
define('PLUBODEMO_PATH', plugin_dir_path(__FILE__));
define('PLUBODEMO_BASENAME', plugin_basename(__FILE__));
define('PLUBODEMO_URL', plugin_dir_url(__FILE__));
define('PLUBODEMO_ASSETS_PATH', PLUBODEMO_PATH . 'dist/' );
define('PLUBODEMO_ASSETS_URL', PLUBODEMO_URL . 'dist/' );

// AUTOLOAD
if (file_exists(PLUBODEMO_PATH . 'vendor/autoload.php')) {
    require_once PLUBODEMO_PATH . 'vendor/autoload.php';
}

// LYFECYCLE
register_activation_hook(__FILE__, [PluboDemo\Includes\Lyfecycle::class, 'activate']);
register_deactivation_hook(__FILE__, [PluboDemo\Includes\Lyfecycle::class, 'deactivate']);
register_uninstall_hook(__FILE__, [PluboDemo\Includes\Lyfecycle::class, 'uninstall']);

// LOAD ALL FILES
$loader = new PluboDemo\Includes\Loader();
