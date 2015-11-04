<?php

/**
 * Main Configuration File.
 * --------------------------
 */

return [

	'namespace'	=> 'Plugin',

	'paths' => [

		'controllers'	=> __DIR__ . '/../controllers/',
		'views'			=> __DIR__ . '/../views/',

	],

	'addons' => [],

	'cache' => [

		// Enables or disables cache
		'enabled' 		=> true,
		// files, sqlite, auto (files), apc, wincache, xcache, memcache, memcached
		'storage'		=> 'auto',
		// Default path for files
		'path'			=> __DIR__ . '/../cache/',
		// It will create a path by PATH/securityKey
		'securityKey'	=> '',
		// FallBack Driver
		'fallback'		=> [
							'memcache'	=>	'files',
							'apc'		=>	'sqlite',
						],
		// .htaccess protect
		'htaccess'		=> true,
		// Default Memcache Server
		'server'		=> [
							[ '127.0.0.1', 11211, 1 ],
						],

	],

	'log' => [

		'path'			=> __DIR__ . '/../logs/',

	],

];
