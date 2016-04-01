Select the source
==============================

Open an image through `img.php` by using its `src` attribute.

> `img.php?src=kodim13.png`

It looks like this.

[FIGURE src=/image/example/kodim13.png&w=w1&save-as=jpg caption="A river, kodimg13.png, from The Kodak Colorset."]



Images in directory structure {#dir}
-----------------------------

All images are stored in a directory structure and you access them as this.

> `?src=image.png`  
> `?src=dir1/image.png`  
> `?src=dir1/dir2/image.png`

You decide on the [base directory](configure#dirs) for the images in your basic configuration.



Download remote image
-----------------------------

You can configure to [enable download of remote images](config-file#remote-download), and then download and process them as an ordinary local image.

> `img.php?src=http://dbwebb.se/img/vimmel/jul-dbwebb-2013.jpg`



Dummy image as placeholder
-----------------------------

You can use a dummy source image as a placeholder and you can set its color.

> `img.php?src=dummy&width=300&bgc=61B329`

It looks like this.

[FIGURE src=/image/dummy?width=300&bgc=61B329 caption="Placeholder."]

The default size of the dummy image is 100x100 and the default color is black.

There are options in the [configuration file for the dummy image](config-file#dummy).



Alternate source as a backup image
-----------------------------

You can use the option `src-alt=image.jpg` to supply a backup image if the first image is missing on disk.

> `img.php?src=not-exists.png&src-alt=car.png`  
> `img.php?src=not-exists.png&src-alt=dummy`

You can configure to [always supply a backup image](config-file#src-alt) if the source is missing.
