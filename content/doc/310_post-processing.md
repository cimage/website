Post-processing with external tools
==================================

You can use external tools to post-process the images to optimize the file size. This option is available for JPEG and for PNG images.



Concerns on post processing {#concerns}
---------------------------------------

Post-processing is disabled by default, edit `img_config.php` to enable it.

It takes additional time to do post processing, it can take up to a couple of seconds. This is processing to create the cached image, thereafter the cached version will be used and no more post processing needs to be done.

These tools for post processing is not a part of CImage and img.php, you need to download and install them separately. I use them myself on my system to get an optimal file size.



Configuration of post processing {#config}
---------------------------------------

These are the default settings in the config file.

```php
/**
 * Post processing of images using external tools, set to true or false
 * and set command to be executed.
 *
 * The png_lossy can alos have a value of null which means that its
 * enabled but not used as default. Each image having the option
 * &lossy will be processed. This means one can individually choose
 * when to use the lossy processing.
 *
 * Default values.
 *
 *  png_lossy:        false
 *  png_lossy_cmd:    '/usr/local/bin/pngquant --force --output'
 *
 *  png_filter:        false
 *  png_filter_cmd:    '/usr/local/bin/optipng -q'
 *
 *  png_deflate:       false
 *  png_deflate_cmd:   '/usr/local/bin/pngout -q'
 *
 *  jpeg_optimize:     false
 *  jpeg_optimize_cmd: '/usr/local/bin/jpegtran -copy none -optimize'
 */
/*
'postprocessing' => array(
    'png_lossy'       => null,
    'png_lossy_cmd'   => '/usr/local/bin/pngquant --force --output',

    'png_filter'        => false,
    'png_filter_cmd'    => '/usr/local/bin/optipng -q',

    'png_deflate'       => false,
    'png_deflate_cmd'   => '/usr/local/bin/pngout -q',

    'jpeg_optimize'     => false,
    'jpeg_optimize_cmd' => '/usr/local/bin/jpegtran -copy none -optimize',
),
*/
```

The post processing tools are really efficient in creating a proper file size and they should be used whenever possible.
