<?php

use Amostajo\WPPluginCore\Config;

/**
 * This file will load configuration file and init Main class.
 */

$config = include( plugin_dir_path( __FILE__ ) . '../config/plugin.php' );

$plugin_namespace = $config['namespace'];

$plugin_name = strtolower( explode( '\\' , $plugin_namespace )[0] );

$plugin_class = $plugin_namespace . '\Main';

$$plugin_name = new $plugin_class( new Amostajo\WPPluginCore\Config( $config ) );

//--- INIT
$$plugin_name->init();

//--- ON ADMIN
if ( is_admin() ) {

	$$plugin_name->on_admin();

}

// Unset
unset($config);
unset($plugin_namespace);
unset($plugin_name);
unset($plugin_class);