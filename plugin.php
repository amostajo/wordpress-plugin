<?php

/*

Plugin Name: [MY PLUGIN]

Plugin URI: [MY URL]

Description: [MY DESCRIPTION]

Version: 1.0

Author: [MY NAME OR COMPANY]

Author URI: [MY IR COMPANY URL]

*/

//------------------------------------------------------------
//
// NOTE:
//
// Do NOT add any code line in this file.
//
// Use "plugin\Main.php" to add your hooks and filters.
//
//------------------------------------------------------------

require_once( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' );

//------------------------------------------------------------
//
// Loads and inits plugin.
//
//------------------------------------------------------------

require_once( plugin_dir_path( __FILE__ ) . 'boot/autoload.php' );