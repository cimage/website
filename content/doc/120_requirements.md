Requirements
======================================

CImage depends upon PHP GD which is commonly installed as part of a PHP installation.

CImage supports PHP 5.3 up to version v0.7 and PHP 5.4 for v0.8.

CImage can load any type of image supported by your PHP installation through [`imagecreatefromstring()`](http://php.net/manual/en/function.imagecreatefromstring.php). This includes the formats JPEG, PNG, GIF, WBMP, and GD2.

CImage can save the image as JPEG, PNG or GIF.



Optional requirements
---------------------------------------

You need the [EXIF extension](http://php.net/manual/en/book.exif.php) to support [auto-rotation of JPEG-images](features-and-options#option-rotate). 

You need the [CURL extension](http://php.net/manual/en/book.curl.php) to support [downloading of remote image](features-and-options#option-src).

The [extension imagick](http://php.net/manual/en/book.imagick.php) needs to be installed to support [conversion of any color space to sRGB color space](features-and-options#option-srgb). 

You need to install command line tools like `optipng`, `pngout`, `jpegtran` and/or `pngquant` to support [lossless and lossy post processing](post-processing) of the created image.
