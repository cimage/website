The configuration file
===================================

The configuration file contain options to configure CImage and img.php to meet your specific needs.

Consult the source code of [`webroot/img_config.php`](https://github.com/mosbth/cimage/blob/master/webroot/img_config.php) for a complete list together with the default values for each configuration setting. There are comments explaining each section together with examples.

This document provides you with additional information to navigate through the configuration options.



Basic configuration {#basic}
-----------------------------------

You need to do some [basic configuration](configure) to get going with CImage.

This will enable you to move around the files and store them where you want to match your specific system.



More settings in the configuration file {#more}
-----------------------------------

The following sections have their own pages.

* [Post processing](post-processing).
* [Convert to sRGB color space](convert-to-srgb).



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









<!-- need to be revised below -->


Size constants {#size}
-----------------------------------

```
/**
 * Predefined size constants.
 *
 * These can be used together with &width or &height to create a constant value
 * for a width or height where can be changed in one place.
 * Useful when your site changes its layout or if you have a grid to fit images into.
 *
 * Example:
 *  &width=w1  // results in width=613
 *  &width=c2  // results in spanning two columns with a gutter, 30*2+10=70
 *  &width=c24 // results in spanning whole grid 24*30+((24-1)*10)=950
 *
 * Default values.
 *  size_constant: As specified by the function below.
 */
/*
'size_constant' => function () {
    // Set sizes to map constant to value, easier to use with width or height
    $sizes = array(
      'w1' => 613,
      'w2' => 630,
    );
    // Add grid column width, useful for use as predefined size for width (or height).
    $gridColumnWidth = 30;
    $gridGutterWidth = 10;
    $gridColumns     = 24;
    for ($i = 1; $i <= $gridColumns; $i++) {
        $sizes['c' . $i] = ($gridColumnWidth + $gridGutterWidth) * $i - $gridGutterWidth;
    }
    return $sizes;
},*/
```



Aspect ratio constants {#aspect-ratio}
-----------------------------------

```
/**
 * Predefined aspect ratios.
 *
 * Default values.
 *  aspect_ratio_constant: As the function below.
 */
/*'aspect_ratio_constant' => function () {
    return array(
        '3:1'   => 3/1,
        '3:2'   => 3/2,
        '4:3'   => 4/3,
        '8:5'   => 8/5,
        '16:10' => 16/10,
        '16:9'  => 16/9,
        'golden' => 1.618,
    );
},*/
```


Convolution expressions {#convolution}
-----------------------------------

```php
/**
 * Custom convolution expressions, matrix 3x3, divisor and offset. 
 */
private $convolves = array(
    'lighten'       => '0,0,0, 0,12,0, 0,0,0, 9, 0',
    'darken'        => '0,0,0, 0,6,0, 0,0,0, 9, 0',
    'sharpen'       => '-1,-1,-1, -1,16,-1, -1,-1,-1, 8, 0',
    'sharpen-alt'   => '0,-1,0, -1,5,-1, 0,-1,0, 1, 0',
    'emboss'        => '1,1,-1, 1,3,-1, 1,-1,-1, 3, 0',
    'emboss-alt'    => '-2,-1,0, -1,1,1, 0,1,2, 1, 0',
    'blur'          => '1,1,1, 1,15,1, 1,1,1, 23, 0',
    'gblur'         => '1,2,1, 2,4,2, 1,2,1, 16, 0',
    'edge'          => '-1,-1,-1, -1,8,-1, -1,-1,-1, 9, 0',
    'edge-alt'      => '0,1,0, 1,-4,1, 0,1,0, 1, 0',
    'draw'          => '0,-1,0, -1,5,-1, 0,-1,0, 0, 0',
    'mean'          => '1,1,1, 1,1,1, 1,1,1, 9, 0',
    'motion'        => '1,0,0, 0,1,0, 0,0,1, 3, 0',
);
``` 

Each expression is an eleven float value string, separated by commas. The string is converted like this.

```php
    // As defined
    'sharpen'  => '-1,-1,-1, -1,16,-1, -1,-1,-1, 8, 0',

    // Converted to ([] is short syntax for array())
    $matrix = [
        [-1, -1, -1],
        [-1, 16, -1],
        [-1, -1, -1],
    ];

    $divisor = 8;
    $offset  = 0;

    // Called by this
    $img = imageconvolution($img, $matrix, $divisor, $offset)
```

So, above expressions are defined in `CImage`. But you can define your own in `img_config.php` and the default config-file contains an example like this. They are outcommented by default since they are only there as an example.

```php
/**
 * Create custom convolution expressions, matrix 3x3, divisor and 
 * offset.
 */
'convolution_constant' => array(
    //'sharpen'       => '-1,-1,-1, -1,16,-1, -1,-1,-1, 8, 0',
    //'sharpen-alt'   => '0,-1,0, -1,5,-1, 0,-1,0, 1, 0',
),
```

The convolution expressions defined in `img_config.php` will add to, or overwrite, those defined in `CImage`. Any convolution constant can then be used, no matter where its defined.




/**
 * Path to aliases, useful when downloading external images and you
 * want to create a local copy of the file, a alias file.
 * End all paths with a slash.
 *
 * Default values:
 *  alias_path: null
 */
//'alias_path'   =>  __DIR__ . '/img/alias/',


    /**
     * A regexp for validating characters in the image or alias filename.
     *
     * Default value:
     *  valid_filename:  '#^[a-z0-9A-Z-/_ \.:]+$#'
     *  valid_aliasname: '#^[a-z0-9A-Z-_]+$#'
     */
     //'valid_filename'  => '#^[a-z0-9A-Z-/_ \.:]+$#',
     //'valid_aliasname' => '#^[a-z0-9A-Z-_]+$#',



     /**
      * Change the default values for CImage quality and compression used
      * when saving images.
      *
      * Default value:
      *  jpg_quality:     null, integer between 0-100
      *  png_compression: null, integer between 0-9
      */
      //'jpg_quality'  => 75,
      //'png_compression' => 1,



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



       /**
        * Add header for cache control when outputting images.
        *
        * Default value:
        *  cache_control: null, or set to string
        */
        //'cache_control' => "max-age=86400",



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



     /**
     * Set default timezone.
     *
     * Default values.
     *  default_timezone: ini_get('default_timezone') or 'UTC'
     */
    //'default_timezone' => 'UTC',



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



    /**
     * Create custom convolution expressions, matrix 3x3, divisor and
     * offset.
     *
     * Default values.
     *  convolution_constant: array()
     */
    /*
    'convolution_constant' => array(
        //'sharpen'       => '-1,-1,-1, -1,16,-1, -1,-1,-1, 8, 0',
        //'sharpen-alt'   => '0,-1,0, -1,5,-1, 0,-1,0, 1, 0',
    ),
    */



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


    /**
     * Create custom shortcuts for more advanced expressions.
     *
     * Default values.
     *  shortcut: array(
     *      'sepia' => "&f=grayscale&f0=brightness,-10&f1=contrast,-20&f2=colorize,120,60,0,0&sharpen",
     *  )
     */
     /*
    'shortcut' => array(
        'sepia' => "&f=grayscale&f0=brightness,-10&f1=contrast,-20&f2=colorize,120,60,0,0&sharpen",
    ),*/



    /**
     * Predefined size constants.
     *
     * These can be used together with &width or &height to create a constant value
     * for a width or height where can be changed in one place.
     * Useful when your site changes its layout or if you have a grid to fit images into.
     *
     * Example:
     *  &width=w1  // results in width=613
     *  &width=c2  // results in spanning two columns with a gutter, 30*2+10=70
     *  &width=c24 // results in spanning whole grid 24*30+((24-1)*10)=950
     *
     * Default values.
     *  size_constant: As specified by the function below.
     */
    /*
    'size_constant' => function () {

        // Set sizes to map constant to value, easier to use with width or height
        $sizes = array(
          'w1' => 613,
          'w2' => 630,
        );

        // Add grid column width, useful for use as predefined size for width (or height).
        $gridColumnWidth = 30;
        $gridGutterWidth = 10;
        $gridColumns     = 24;

        for ($i = 1; $i <= $gridColumns; $i++) {
            $sizes['c' . $i] = ($gridColumnWidth + $gridGutterWidth) * $i - $gridGutterWidth;
        }

        return $sizes;
    },*/



    /**
     * Predefined aspect ratios.
     *
     * Default values.
     *  aspect_ratio_constant: As the function below.
     */
    /*'aspect_ratio_constant' => function () {
        return array(
            '3:1'   => 3/1,
            '3:2'   => 3/2,
            '4:3'   => 4/3,
            '8:5'   => 8/5,
            '16:10' => 16/10,
            '16:9'  => 16/9,
            'golden' => 1.618,
        );
    },*/



    /**
     * default options for ascii image.
     *
     * Default values as specified below in the array.
     *  ascii-options:
     *   characterSet:       Choose any character set available in CAsciiArt.
     *   scale:              How many pixels should each character
     *                       translate to.
     *   luminanceStrategy:  Choose any strategy available in CAsciiArt.
     *   customCharacterSet: Define your own character set.
     */
    /*'ascii-options' => array(
            "characterSet" => 'two',
            "scale" => 14,
            "luminanceStrategy" => 3,
            "customCharacterSet" => null,
        );
    },*/
);
