Check environment
======================================

There are some helpers that aid in checking your environment. One is a script `webroot/check_environment.php` and one requires that you have CImage installed.

This is mainly used for troubleshooting.



Check using `check_environment.php`
---------------------------------------

There is a script `webroot/check_environment.php` that you can use to check details of your installed system. 

This is a sample output from the script.

```text
Current PHP version: 5.6.24-1+b1

Running on: Apache/2.4.23 (Debian)

Extension exif is loaded.
Extension curl is loaded.
Extension imagick is loaded.
Extension gd is loaded.

array (size=13)
  'GD Version' => string '2.2.3' (length=5)
  'FreeType Support' => boolean true
  'FreeType Linkage' => string 'with freetype' (length=13)
  'T1Lib Support' => boolean false
  'GIF Read Support' => boolean true
  'GIF Create Support' => boolean true
  'JPEG Support' => boolean true
  'PNG Support' => boolean true
  'WBMP Support' => boolean true
  'XPM Support' => boolean true
  'XBM Support' => boolean true
  'WebP Support' => boolean true
  'JIS-mapped Japanese Font Support' => boolean false

Checking path for postprocessing tools
pngquant: /usr/bin/pngquant
optipng: /usr/bin/optipng
pngout: /usr/local/bin/pngout
jpegtran: /usr/bin/jpegtran
```



Check using `&status`
---------------------------------------

There is a option `&status` to make img.php check its environment. Use it like this.

```
img.php?src=dummy&status
```

You need to supply a valid source image, but the dummy image will be enough.

The output looks like this.

```
img.php version = v0.7.18 (2016-08-09)
PHP version = 5.6.24-1+b1
Running on: Apache/2.4.23 (Debian)
Allow remote images = 
Cache exists, writable
Cache remote does not exist
Cache dummy exists, writable
Cache srgb exists, not writable
Cache fasttrack exists, writable
Alias path writable = 
Extension exif is  loaded.
Extension curl is  loaded.
Extension imagick is  loaded.
Extension gd is  loaded.
Post processing PNG LOSSY is NOT enabled.
The command for PNG LOSSY is NOT an executable.
Post processing PNG FILTER is NOT enabled.
The command for PNG FILTER is NOT an executable.
Post processing PNG DEFLATE is NOT enabled.
The command for PNG DEFLATE is  an executable.
Post processing JPEG OPTIMIZE is NOT enabled.
The command for JPEG OPTIMIZE is NOT an executable.
Array
(
    [GD Version] => 2.2.3
    [FreeType Support] => 1
    [FreeType Linkage] => with freetype
    [T1Lib Support] => 
    [GIF Read Support] => 1
    [GIF Create Support] => 1
    [JPEG Support] => 1
    [PNG Support] => 1
    [WBMP Support] => 1
    [XPM Support] => 1
    [XBM Support] => 1
    [WebP Support] => 1
    [JIS-mapped Japanese Font Support] => 
)
```

This option is only available in [development mode](configure#mode).
