<?php

/**
 * Plugin Name: WP Adminify Pro
 * Description: WP Adminify is a powerful plugin that modernizes and customizes your WordPress admin dashboard. It offers a clean, branded interface and advanced menu management features to enhance your admin user experience.
 * Plugin URI: https://wpadminify.com
 * Author: Jewel Theme
 * Version: 4.0.3.3
 * Update URI: https://api.freemius.com
 * Author URI: https://wpadminify.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: adminify
 * Domain Path: /languages
 *
 * @fs_premium_only /Pro/, /Inc/Modules/AdminPages/, /assets/vendors/circle-menu/, class-wp-adminify-pro.php, classmaps-pro.php, autoloader-pro.php
 * @fs_free_only class-wp-adminify.php, /vendor/, /assets/, /Inc/, /Libs/adminify-framework/, /Libs/freemius-pricing/, /Libs/Addons.php, /Libs/Featured.php
 */
// No, Direct access Sir !!!
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
$jltwp_adminify_plugin_data = get_file_data( __FILE__, array(
    'Version'     => 'Version',
    'Plugin Name' => 'Plugin Name',
    'Author'      => 'Author',
    'Description' => 'Description',
    'Plugin URI'  => 'Plugin URI',
), false );
if ( ! function_exists( 'jltwp_adminify' ) ) {
    function jltwp_adminify() {
        global $jltwp_adminify;
        if ( ! isset( $jltwp_adminify ) ) {
            // Activate multisite network integration.
            if ( ! defined( 'WP_FS__PRODUCT_7829_MULTISITE' ) ) {
                define( 'WP_FS__PRODUCT_7829_MULTISITE', true );
            }
            class GetLicense {
                public function is_valid() {
                    return true;
                }
                public function is_active() {
                    return true;
                }
            }
            class adminifyFsNull {
                public function can_use_premium_code__premium_only() {
                    return true;
                }
                public function can_use_premium_code() {
                    return true;
                }                
                public function is_plan__premium_only() {
                    return 'agency';
                }
                public function is_premium() {
                    return true;
                }
                public function is__premium_only() {
                    return true;
                }
                public function is_plan() {
                    return 'agency';
                }
                public function set_basename() {
                    return wp_basename( true, __FILE__ );
                }
                public function _get_license($is_active = null, $is_valid = null) {
                    return new GetLicense();
                }
                public function add_filter( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ) {
                    add_filter( $tag, $function_to_add, $priority, $accepted_args );
                }
                public function add_action( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ) {
                    add_action( $tag, $function_to_add, $priority, $accepted_args );
                }
            }

            // Include Freemius SDK.
            require_once __DIR__ . '/Libs/freemius/start.php';
            $jltwp_adminify = new adminifyFsNull();
        }
        return $jltwp_adminify;
    }
}
// Define Constants
if ( !jltwp_adminify()->is__premium_only() ) {
    if ( !defined( 'WP_ADMINIFY' ) ) {
        define( 'WP_ADMINIFY', $jltwp_adminify_plugin_data['Plugin Name'] );
    }
    if ( !defined( 'WP_ADMINIFY_VER' ) ) {
        define( 'WP_ADMINIFY_VER', $jltwp_adminify_plugin_data['Version'] );
    }
    if ( !defined( 'WP_ADMINIFY_FILE' ) ) {
        define( 'WP_ADMINIFY_FILE', __FILE__ );
    }
    if ( !defined( 'WP_ADMINIFY_SLUG' ) ) {
        define( 'WP_ADMINIFY_SLUG', dirname( plugin_basename( __FILE__ ) ) );
    }
    if ( !defined( 'WP_ADMINIFY_BASE' ) ) {
        define( 'WP_ADMINIFY_BASE', plugin_basename( __FILE__ ) );
    }
    if ( !defined( 'WP_ADMINIFY_PATH' ) ) {
        define( 'WP_ADMINIFY_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
    }
    if ( !defined( 'WP_ADMINIFY_URL' ) ) {
        define( 'WP_ADMINIFY_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );
    }
    if ( !defined( 'WP_ADMINIFY_ASSETS' ) ) {
        define( 'WP_ADMINIFY_ASSETS', WP_ADMINIFY_URL . 'assets/' );
    }
    if ( !defined( 'WP_ADMINIFY_ASSETS_IMAGE' ) ) {
        define( 'WP_ADMINIFY_ASSETS_IMAGE', WP_ADMINIFY_ASSETS . 'images/' );
    }
    if ( !defined( 'WP_ADMINIFY_ASSET_PATH' ) ) {
        define( 'WP_ADMINIFY_ASSET_PATH', wp_upload_dir()['basedir'] . '/wp-adminify' );
    }
    if ( !defined( 'WP_ADMINIFY_ASSET_URL' ) ) {
        define( 'WP_ADMINIFY_ASSET_URL', wp_upload_dir()['baseurl'] . '/wp-adminify' );
    }
    if ( !defined( 'WP_ADMINIFY_DESC' ) ) {
        define( 'WP_ADMINIFY_DESC', $jltwp_adminify_plugin_data['Description'] );
    }
    if ( !defined( 'WP_ADMINIFY_AUTHOR' ) ) {
        define( 'WP_ADMINIFY_AUTHOR', $jltwp_adminify_plugin_data['Author'] );
    }
    if ( !defined( 'WP_ADMINIFY_URI' ) ) {
        define( 'WP_ADMINIFY_URI', $jltwp_adminify_plugin_data['Plugin URI'] );
    }
}
if ( jltwp_adminify()->is__premium_only() ) {
    if ( !defined( 'WP_ADMINIFY_DIR' ) ) {
        define( 'WP_ADMINIFY_DIR', plugin_dir_path( __FILE__ ) );
    }
    if ( !defined( 'WP_ADMINIFY_PRO_URL' ) ) {
        define( 'WP_ADMINIFY_PRO_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) . 'Pro/assets' );
    }
}
if ( !jltwp_adminify()->is__premium_only() ) {
    if ( !class_exists( '\\WPAdminify\\WP_Adminify' ) ) {
        // Autoload
        require_once __DIR__ . '/vendor/autoload.php';
        // Instantiate WP Adminify Class
        require_once __DIR__ . '/class-wp-adminify.php';
    }
    // Activation and Deactivation hooks
    if ( class_exists( '\\WPAdminify\\WP_Adminify' ) ) {
        register_activation_hook( WP_ADMINIFY_FILE, array('\\WPAdminify\\WP_Adminify', 'jltwp_adminify_activation_hook') );
        register_deactivation_hook( WP_ADMINIFY_FILE, array('\\WPAdminify\\WP_Adminify', 'jltwp_adminify_deactivation_hook') );
    }
    if ( class_exists( '\\WPAdminify\\Inc\\Modules\\ActivityLogs\\Inc\\DB_Table' ) ) {
        register_activation_hook( WP_ADMINIFY_FILE, ['\\WPAdminify\\Inc\\Modules\\ActivityLogs\\Inc\\DB_Table', 'activation_hook'] );
        register_uninstall_hook( WP_ADMINIFY_FILE, ['\\WPAdminify\\Inc\\Modules\\ActivityLogs\\Inc\\DB_Table', 'deactivation_hook'] );
    }
}
if ( jltwp_adminify()->is__premium_only() ) {
    if ( jltwp_adminify()->can_use_premium_code() ) {
        require_once __DIR__ . '/autoloader-pro.php';
        // Instantiate WP Adminify Pro Class
        if ( !class_exists( '\\WPAdminify\\Pro\\Adminify_Pro' ) ) {
            require_once __DIR__ . '/class-wp-adminify-pro.php';
        }
    }
}