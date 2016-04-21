<?php

namespace Plugin;

use Amostajo\WPPluginCore\Plugin;

/**
 * Main class.
 * Registers HOOKS used within the plugin.
 * Acts like a bridge or router of actions between Wordpress and the plugin.
 *
 * @link http://wordpress-dev.evopiru.com/documentation/main-class/
 * @version 1.0
 */
class Main extends Plugin
{
	/**
	 * Declares public HOOKS.
	 * - Can be removed if not used.
	 * @since 1.0
	 */
	public function init()
	{
		// i.e.
		// add_action( 'save_post', [ &$this, 'save_post' ] );
		// 
		// $this->add_action( 'save_post', 'PostController@save' );
		// 
		// $this->add_shortcode( 'hello_world', 'view@shout', [ 'message' => 'Hello World!' ] );
	}

	/**
	 * Declares admin dashboard HOOKS.
	 * - Can be removed if not used.
	 * @since 1.0
	 */
	public function on_admin()
	{
		// i.e.
		// add_action( 'admin_init', [ &$this, 'admin_init' ] );
		// 
		// $this->add_action( 'admin_init', 'AdminController@init' );
	}
}