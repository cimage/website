The configuration file
===================================

The configuration file contain options to configure CImage and img.php to meet your specific needs.

Consult the source code of [`webroot/img_config.php`](https://github.com/mosbth/cimage/blob/master/webroot/img_config.php) for a complete list together with the default values for each configuration setting. There are comments explaining each section together with examples.

This document provides you with additional information to navigate through the configuration options.



Basic configuration {#basic}
-----------------------------------

You need to do some [basic configuration](configure) to get going with CImage. It concerns configuration of autoloading, (development/production/strict) mode and paths to the image and cache directory.

This will enable you to move around the files and store them where you want to match your specific system.



More settings in the configuration file {#more}
-----------------------------------

The following sections have their own pages.

* [Constants for size and aspect ratio](working-with-size)
* [Filters and Convolution](filters)
* [JPEG/PNG quality](quality-filesize)
* [Create and use shortcuts](shortcut)
* [Post processing](post-processing)
* [Convert to sRGB color space](convert-to-srgb)
* [Skip the original image](troubleshoot#skip-original)
* [ASCII art](ascii-art)



Password {#password}
-----------------------------------

You can use a password to protect sensitive options like `alias` and remote download of images.

```php
/**
 * Use password to protect from missusage, send &pwd=... or &password=..
 * with the request to match the password or set to false to disable.
 * Passwords are only used together with options for remote download
 * and aliasing.
 *
 * Create a passwords like this, depending on the type used:
 *  text: 'my_password'
 *  md5:  md5('my_password')
 *  hash: password_hash('my_password', PASSWORD_DEFAULT)
 *
 * Default values.
 *  password_always: false  // do not always require password,
 *  password:        false  // as in do not use password
 *  password_type:   'text' // use plain password, not encoded,
 */
//'password_always' => false, // always require password,
//'password'        => false, // "secret-password",
//'password_type'   => 'text', // supports 'text', 'md5', 'hash',
```

This is a shallow layer of protection. But it can to some extent prevent unwanted usage.



Remote download {#remote-download}
-----------------------------------

This part relates to allow download of remote images.

```php
/**
 * Allow or disallow downloading of remote images available on
 * remote servers. Default is to disallow remote download.
 *
 * When enabling remote download, the default is to allow download any
 * link starting with http or https. This can be changed using
 * remote_pattern.
 *
 * When enabling remote_whitelist a check is made that the hostname of the
 * source to download matches the whitelist. By default the check is
 * disabled and thereby allowing download from any hosts.
 *
 * Default values.
 *  remote_allow:     false
 *  remote_pattern:   null  // use default values from CImage which is to
 *                          // allow download from any http- and
 *                          // https-source.
 *  remote_whitelist: null  // use default values from CImage which is to
 *                          // allow download from any hosts.
 */
//'remote_allow'     => true,
//'remote_pattern'   => '#^https?://#',
//'remote_whitelist' => array(
//    '\.facebook\.com$',
//    '^(?:images|photos-[a-z])\.ak\.instagram\.com$',
//    '\.google\.com$'
//),
```



Path to alias directory {#alias}
-----------------------------------

You can download an external image, or another image you are processing, and save a copy of it locally in the alias directory.

```php
/**
 * Path to aliases, useful when downloading external images and you
 * want to create a local copy of the file, a alias file.
 * End all paths with a slash.
 *
 * Default values:
 *  alias_path: null
 */
//'alias_path'   =>  __DIR__ . '/img/alias/',
```

Using alias requires one to use a password, other alias will fail.



Alternative source as backup image {#src-alt}
-----------------------------------

You can configure to always supply a backup image if the source image is missing from disk.

```php
/**
 * Use backup image if src-image is not found on disk. The backup image
 * is only available for local images and based on wether the original
 * image is found on disk or not. The backup image must be a local image
 * or the dummy image.
 *
 * Default value:
 *  src_alt:  null //disabled by default
 */
 //'src_alt' => 'car.png',
 //'src_alt' => 'dummy',
```



Dummy image {#dummy}
-----------------------------------

You can change the settings for the dummy image.

```php
/**
 * The name representing a dummy image which is automatically created
 * and stored as a image in the dir CACHE_PATH/dummy. The dummy image
 * can then be used as a placeholder image.
 * The dir CACHE_PATH/dummy is automatically created when needed.
 * Write protect the CACHE_PATH/dummy to prevent creation of new
 * dummy images, but continue to use the existing ones.
 *
 * Default value:
 *  dummy_enabled:  true as default, disable dummy feature by setting
 *                  to false.
 *  dummy_filename: 'dummy' use this as ?src=dummy to create a dummy image.
 */
 //'dummy_enabled' => true,
 //'dummy_filename' => 'dummy',
```



Background color {#bgc}
-----------------------------------

You can define your own default background-color on those images using it.

```php
/**
 * Set default background color for all images. Override it using
 * option bgColor.
 * Colorvalue is 6 digit hex string between 000000-FFFFFF
 * or 8 digit hex string if using the alpha channel where
 * the alpha value is between 00 (opaqe) and 7F (transparent),
 * that is between 00000000-FFFFFF7F.
 *
 * Default values.
 *  background_color: As specified by CImage
 */
//'background_color' => "FFFFFF",
//'background_color' => "FFFFFF7F",
```



Cache control {#cache}
-----------------------------------

There are several ways to work with caching to improve performance.



###HTTP headers for cache control {#cachecontrol}

Set the headers you want to deliver with each image.

```php
/**
 * Add header for cache control when outputting images.
 *
 * Default value:
 *  cache_control: null, or set to string
 */
 //'cache_control' => "max-age=86400",
```



###Fast track cache {#fasttrack}

This is a cache of the cache, improving time to deliver a cached image.

```php
/**
 * Fast track cache. Save a json representation of the image as a
 * fast track to the cached version of the image. This avoids some
 * processing and allows for quicker load times of cached images.
 *
 * Default values:
 *  fast_track_allow: false
 */
//'fast_track_allow' => true,
```



Enhancing security through constraints {#security}
-----------------------------------

The settings below are related to security and constraints you choose to set.



###Validate characters in filename {#valchars}

Decide what characters you allow in the image source filename.

```php
/**
 * A regexp for validating characters in the image or alias filename.
 *
 * Default value:
 *  valid_filename:  '#^[a-z0-9A-Z-/_ \.:]+$#'
 *  valid_aliasname: '#^[a-z0-9A-Z-_]+$#'
 */
 //'valid_filename'  => '#^[a-z0-9A-Z-/_ \.:]+$#',
 //'valid_aliasname' => '#^[a-z0-9A-Z-_]+$#',
```



###Manage where the image directory is {#realpath}

Ensure that the images accessed are below a certain directory.

```php
/**
* Check that the imagefile is a file below 'image_path' using realpath().
* Security constraint to avoid reaching images outside image_path.
* This means that symbolic links to images outside the image_path will
* fail.
*
* Default value:
*  image_path_constraint: true
*/
//'image_path_constraint' => false,
```



###Maxe dimensions {#maxdimension}

Limit how large the images can be to decrease load on your system.

```php
/**
 * Max image dimensions, larger dimensions results in 404.
 * This is basically a security constraint to avoid using resources on creating
 * large (unwanted) images.
 *
 * Default values.
 *  max_width:  2000
 *  max_height: 2000
 */
//'max_width'     => 2000,
//'max_height'    => 2000,
```



###Prevent leeching {#leeching}

Avoid for others to leech you images.

```php
/**
 * Prevent leeching of images by controlling the hostname of those who
 * can access the images. Default is to allow hotlinking.
 *
 * Password apply when hotlinking is disallowed, use password to allow
 * hotlinking.
 *
 * The whitelist is an array of regexpes for allowed hostnames that can
 * hotlink images.
 *
 * Default values.
 *  allow_hotlinking:     true
 *  hotlinking_whitelist: array()
 */
 /*
'allow_hotlinking' => false,
'hotlinking_whitelist' => array(
    '^dbwebb\.se$',
),
*/
```



Hook before CImage {#hook}
-------------------------------------

You can define and call a function after all options are compiled together with the settings from the configuration file, and before CImage is used to process the image.

```php
/**
* A function (hook) can be called after img.php has processed all
* configuration options and before processing the image using CImage.
* The function receives the $img variabel and an array with the
* majority of current settings.
*
* Default value:
*  hook_before_CImage:     null
*/
/*'hook_before_CImage' => function (CImage $img, Array $allConfig) {
   if ($allConfig['newWidth'] > 10) {
       $allConfig['newWidth'] *= 2;
   }
   return $allConfig;
},*/
```



Default timezone {#timezone}
-------------------------------------

Set the default timezone to use.

```php
 /**
 * Set default timezone.
 *
 * Default values.
 *  default_timezone: ini_get('default_timezone') or 'UTC'
 */
//'default_timezone' => 'UTC',
```



Dependency injection {#di}
-------------------------------------

You can change the behaviour of CImage by deciding what classes to operate on. This is done by injecting classes to work on.

```php
/**
 * Class names to use, to ease dependency injection. You can change Class
 * name if you want to use your own class instead. This is a way to extend
 * the codebase.
 *
 * Default values:
 *  CImage: CImage
 *  CCache: CCache
 *  CFastTrackCache: CFastTrackCache
 */
 //'CImage' => 'CImage',
 //'CCache' => 'CCache',
 //'CFastTrackCache' => 'CFastTrackCache',
```
