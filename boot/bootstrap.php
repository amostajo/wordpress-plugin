<?php

use Amostajo\WPPluginCore\Config;

/**
 * This file will load configuration file and init Main class.
 *
 * @author Alejandro Mostajo
 * @license MIT
 * @package Amostajo\WPDevTemplates
 * @version 1.0.2
 */

/**
 * Moved from plugin.php
 * @since 1.0.2
 */
require_once( plugin_dir_path( __FILE__ ) . '/../vendor/autoload.php' );

// --

$config = include( plugin_dir_path( __FILE__ ) . '../config/plugin.php' );

$plugin_namespace = $config['namespace'];

$plugin_name = strtolower( explode( '\\' , $plugin_namespace )[0] );

$plugin_class = $plugin_namespace . '\Main';

$plugin_reflection = new ReflectionClass( get_parent_class( $plugin_class ) );

/**
 * Core version check.
 * @since 1.0.2
 */
if ( $plugin_reflection->hasMethod( 'add_hooks' ) ) {

    $$plugin_name = new $plugin_class( new Amostajo\WPPluginCore\Config( $config ) );

    //--- INIT
    /**
     * Autoload init to support addons.
     * @since 1.0.1
     */
    $$plugin_name->autoload_init();

    //--- ON ADMIN
    if ( is_admin() ) {
        /**
         * Autoload on admin to support addons.
         * @since 1.0.1
         */
        $$plugin_name->autoload_on_admin();
    }

    /**
     * WPPluginCore hooks support.
     * @since 1.0.2
     */
    $$plugin_name->add_hooks();

} else {
    $plugin_error = $plugin_reflection;
    add_action( 'admin_notices', 'wdt_hooks_error' );
}

/**
 * Version notice.
 * @since 1.0.2
 */
if ( ! function_exists( 'wdt_hooks_error' )  ) { 
    /**
     * Displayes wordpress admin notice for missing hooks function.
     * @since 1.0.2
     */
    function wdt_hooks_error()
    {
        global $plugin_error;
        ?>
        <div class="notice notice-error">
            <?php printf(
                'One or more plugins/themes using %s is not updated to the latest version, this will affect those who are update.<br/><strong>%s</strong> can not be used.<br/>File that needs update <strong>%s</strong>.</br>Please notify the developer of this package.',
                '<a href="http://wordpress-dev.evopiru.com/">WP Dev Templates</a>',
                'add_hooks()',
                $plugin_error->getFileName()
            ) ?>
        </div>
        <?php
        unset($plugin_error);
        unset($reflection);
    }
}

// Unset
unset($plugin_reflection);
unset($config);
unset($plugin_namespace);
unset($plugin_name);
unset($plugin_class);