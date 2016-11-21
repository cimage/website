Basic configuration
======================================

The script img.php reads its configuration from the configuration file `img_config.php` found in the same directory.

Most settings have working default values and does not need to be changed.

For now, lets review the most basic settings to get going with CImage, which aids in getting to know CImage a bit better.



Using a bundle with a configuration file {#bundle}
--------------------------------------

If you are using a bundle like `img{d,p,s}.php`, then the configuration is done directly in the bundle file, or by creating a separate configuration file.

The bundle will look for a configuration file and use it if it is found. The bundle `imgd.php` will look for `imgd_config.php` and `imgp.php` will look for `imgp_config.php`.



Autoloading {#autoloading}
--------------------------------------

A bundle does not need the autoloader since it has all code in one script. But, when using img.php you need to point to the file containing the autoloader.

The default setting looks like this.

```php
/**
 * Where are the sources for the class files.
 *
 * Default values:
 *  autoloader:  null
 */
'autoloader'   =>  __DIR__ . '/../autoload.php',
```



Development mode {#mode}
--------------------------------------

The development mode is more verbose of its error situations. This is good for first time users.

You can update your configuration file to use development mode. This will provide you with debug options and verbose error messages.

```php
/**
 * Set mode as 'strict', 'production' or 'development'.
 *
 * development: Development mode with verbose error reporting. Option
 *              &verbose and &status enabled.
 * production:  Production mode logs all errors to file, giving server
 *              error 500 for bad usage. Option &verbose and &status
 *              disabled.
 * strict:      Strict mode logs few errors to file, giving server error
 *              500 for bad usage. Stripped from comments and spaces.
 *              Option &verbose and &status disabled.
 *
 * Default values:
 *  mode: 'production'
 */
 //'mode' => 'production',
 'mode' => 'development',
 //'mode' => 'strict',
```

Do not forget to change this back when you go into production.



Cache and image directory {#dirs}
--------------------------------------

You need a cache directory where all the images are stored. This directory needs to be writable for the web server.

You also need to point out the directory holding your images.

These are the default settings.

```php
/**
 * Paths, where are the images stored and where is the cache.
 * End all paths with a slash.
 *
 * Default values:
 *  image_path: __DIR__ . '/img/'
 *  cache_path: __DIR__ . '/../cache/'
 */
'image_path'   =>  __DIR__ . '/img/',
'cache_path'   =>  __DIR__ . '/../cache/',
```

Update them to match your paths on your system and ensure that the cache directory is writable by the web server.
