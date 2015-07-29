<?php

namespace Plugin;

use Amostajo\WPPluginCore\Plugin as Plugin;

/**
 * Configuration class.
 * Registers HOOKS and FILTERS used within the plugin.
 * Acts like a bridge or router of actions between Wordpress and the plugin.
 */
class Main extends Plugin
{
	/**
	 * Constructor.
	 * Declares HOOKS and FILTERS.
	 */
	public function init()
	{
		// Call public Wordpress HOOKS and FILTERS here
		// --------------------------------------------
		// i.e.
		// add_action( 'save_post', array( &$this, 'save_post' ) );
	}

	/**
	 * Declares HOOKS and FILTERS when on admin dashboard.
	 */
	public function on_admin()
	{
		// Call public Wordpress HOOKS and FILTERS here
		// --------------------------------------------
		// i.e.
		// add_action( 'admin_init', array( &$this, 'admin_init' ) );
	}
}