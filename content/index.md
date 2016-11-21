---
views:
    flash:
        region: flash
        template: default/image
        data:
            src: "/image/example/kodim23.png?sc=banner1&a=0,0,15,0"

    block-about:
        region: sidebar-right
        template: default/block
        sort: 0
        data:
            meta: 
                type: single
                route: block/sidebar

    columns1:
        region: columns-above
        template: default/columns
        sort: 1
        data:
            class: col3
            meta:
                type: columns
                columns:
                    column-1:
                        template: default/image
                        data:
                            src:        "/image/example/kodim23.png?sc=triptych1"

                    column-2:
                        template: default/image
                        data:
                            src:        "/image/example/kodim23.png?sc=triptych1&scale=5"

                    column-3:
                        template: default/image
                        data:
                            src:        "/image/example/kodim23.png?sc=triptych1&f=grayscale"

...
CImage and img.php
===============================

CImage and `img.php` enables server-side image processing utilizing caching and optimization of the images.



About {#about}
-------------------------------

CImage is a collection of PHP classes enabling resizing, scaling and cropping of images. You can process the image and apply effects through filters and post processing utilities.

The script `img.php` is the front-end that takes URL-parameters from the querystring, load a default configuration and then uses CImage to carry out the actual image processing.



Example {#example}
-------------------------------

This is how it could work.

`img.php?src=kodim23.png&width=600&height=200&crop-to-fit`

or with pretty urls.

`images/kodim23.png?width=600&height=200&crop-to-fit`

[FIGURE src=/image/example/kodim23.png?width=600&height=200&crop-to-fit]



Get going quick and dirty {#doti}
-------------------------------

This is a quick and dirty way to get going.

We want a structure like this.

```text
../cache 

.
├── img
│   └── kodim23.png
└── imgd.php
```

Get the `img.php` in an all-included-bundle together with a test image and create the cache directory.

```text
wget https://raw.githubusercontent.com/mosbth/cimage/master/webroot/imgd.php
wget https://raw.githubusercontent.com/mosbth/cimage/master/webroot/img/kodim23.png
mkdir ../cache && chmod 777 ../cache
```

You can now open up your browser and reach the `imgd.php` and add the querystring `?src=kodim23.png&width=200`. You should get a image like this.

[FIGURE src=/image/example/kodim23.png?width=200]

And now you should really start to read the documentation, really.



Learn more {#more}
-------------------------------

Move on to [read the documentation](doc).
