# WORDPRESS PLUGIN (Template)
--------------------------------

[![Latest Stable Version](https://poser.pugx.org/amostajo/wordpress-plugin/v/stable)](https://packagist.org/packages/amostajo/wordpress-plugin)
[![Total Downloads](https://poser.pugx.org/amostajo/wordpress-plugin/downloads)](https://packagist.org/packages/amostajo/wordpress-plugin)
[![License](https://poser.pugx.org/amostajo/wordpress-plugin/license)](https://packagist.org/packages/amostajo/wordpress-plugin)

The power of **Composer** and **MVC** in your **Wordpress** plugins.

**Wordpress Plugin** (WPP) is a development template that can be used to create modern and elegant plugins. WPP comes with [Composer](https://getcomposer.org/) and [Lightweight MVC](https://github.com/amostajo/lightweight-mvc) framework.

- [Requirements](#requirements)
- [Installation](#installation)
- [Updating](#updating)
- [Usage](#usage)
    - [Main Class](#main-class)
        - [Hooks and Filters](#hooks-and-filters)
    - [MVC](#mvc)
- [Coding Guidelines](#coding-guidelines)
- [License](#license)

## Requirements

* PHP >= 5.5.9

## Installation

WPP utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using WPP, make sure you have Composer installed on your machine.

### Step 1

Download the [latest release](https://github.com/amostajo/wordpress-plugin/releases) of the software;

### Step 2

Create the folder location where you plugin will reside, usually inside the plugins folder of your wordpress installation:

```bash
[WORDPRESS ROOT]
 |---> [wp-content]
        |---> [plugins]
               |---> "your-plugin-name"
```

### Step 3

Copy the content of the release version downloaded into your plugin's folder, should look like this:

```bash
[WORDPRESS ROOT]
 |---> [wp-content]
        |---> [plugins]
               |---> "your-plugin-name"
               		 |---> [boot]
               		 |---> [config]
               		 |---> [controllers]
               		 |---> [css]
               		 |---> [js]
               		 |---> [plugin]
               		 |---> [views]
               		 |---> ayuco
               		 |---> composer.json
               		 |---> LICENSE
               		 |---> plugin.php
               		 |---> README
```

### Step 4

Open your `Command Prompt` application and change directory to point to your plugin's folder, where `composer.json` resides.

Type the following command:

```bash
composer install
```

This will install all the software dependencies of WPP.

### Step 5

In order to prevent conflicts with other plugins using this template, it is suggested to set a name and change its namespace.

To do this, type the following in the commando prompt:

```bash
php ayuco setup
```

This will ask you for a new name for yor plugin, you can always change it later with the following command:

```bash
php ayuco setname MyNewName
```

Finally open `plugin.php` and modify the information located in the first comment section:

```php
/*

Plugin Name: [MY PLUGIN]

Plugin URI: [MY URL]

Description: [MY DESCRIPTION]

Version: 1.0

Author: [MY NAME OR COMPANY]

Author URI: [MY IR COMPANY URL]

*/
```

**INSTALLATION COMPLETED!**

## Updating

To update the current version of the software, in the command prompt type:

```bash
composer update
```

## Usage

Anything you code file that needs to be created must be located inside the `plugin` folder.

### Main Class

WPP comes with a master class called `Main.php` and which is located in the `plugins` folder.

This class is the **bridge** between Wordpress and WPP. Any Hook or filter should be declared inside this class.

#### Hooks and Filters

`Main.php` has two methods:

```php
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
		// add_action( 'save_post', [ &$this, 'save_post' ] );
	}

	/**
	 * Declares HOOKS and FILTERS when on admin dashboard.
	 */
	public function on_admin()
	{
		// Call public Wordpress HOOKS and FILTERS here
		// --------------------------------------------
		// i.e.
		// add_action( 'admin_init', [ &$this, 'admin_init' ] );
	}
}
```

`init()` is where all public declarations. `on_admin()` will be called only when the plugin is on admin dashboard.

In this following example a hook to modify a post content will be added to the main class.

```php
class Main extends Plugin
{
	public function init()
	{
		add_filter( 'the_content', [ &$this, 'filter_content' ] );
	}

	public function on_admin()
	{
	}

	public function filter_content( $content )
	{
		// YOUR CODE HERE
		return $content;
	}
}
```

Notice how the `add_filter` is registering a call to the method `filter_content` within `Main.php`.

You can do the same with admin hooks and filters, like displaying a custom metabox in a post admin form:

```php
class Main extends Plugin
{
	public function init()
	{
	}

	public function on_admin()
	{
		add_action( 'add_meta_boxes', [ &$this, 'metaboxes' ] );
	}

	public function metaboxes( $post_type, $post )
	{
		// YOUR METABOX DECALARATION HERE
	}
}
```

## MVC

**Lightweight MVC** is a powerfull and small MVC framework that comes with WPP.

To read more about the usar of *Models*, *Views* and *Controllers* we recommed to visit the packages main page:

[Lightweight MVC](https://github.com/amostajo/lightweight-mvc)

### Main class and MVC

**Lightweight MVC** engine is already integrated with `Main.php`, call the engine with `$this->mvc`.

In the following example, `Main.php` is calling `PostController` to save a post modification:

```php
class Main extends Plugin
{
	public function init()
	{
	}

	public function on_admin()
	{
		add_action( 'save_post', [ &$this, 'save_post' ] );
	}

	public function save_post( $post_id )
	{
		$this->mvc->call( 'PostController@save', $post_id );
	}
}
```

Here is where the MVC files are located within your plugin:

```bash
[PLUGIN ROOT]
 |---> [controllers]
 |---> [plugin]
        |---> [models]
 |---> [views]
```

## Coding Guidelines

The coding is a mix between PSR-2 and Wordpress PHP guidelines.

## License

**Wordpress Plugin** is free software distributed under the terms of the MIT license.