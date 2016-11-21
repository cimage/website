Implications and considerations
====================================

Here are some general thoughts when applying CImage on a live system.



Select the proper mode {#mode}
-------------------------------------

Select the proper mode by setting it to "strict" or "production" to prevent outsiders from getting information about your system. Use only "development" for internal use since its quite verbose in its nature of error reporting. 



Put the installation directory outside web root {#outside}
-------------------------------------

Edit the config file to put the installation directory -- and the cache directory -- outside of the web root. This is best practice. The only thing needed in the web root is `img.php` and `img_config.php` (if used). These can be placed, for example, in `/img/img.php`, `/img.php` or in a directory `/cimage/img.php`.

Use [friendly urls](friendly-urls) to point out your script.



Monitor cache size {#moncache}
-------------------------------------

There is a utility `bin/cache.bash` included to monitor the size of the cache-directory. It generates an output like this.

```bash
$ ./cache.bash
Usage: ./cache.bash [cache-dir]   

$ ./cache.bash cache                         
# Size
Total size:       316M
Number of files:  6437
Number of dirs:   2

# Top-5 largest files/dirs:
11136   cimage//fasttrack
4440    cimage//oopython-bok_python3-object-oriented-programming.png_2000_2588_q85_co-1
4280    cimage//oopython-bok_python3-object-oriented-programming.png_2000_2588_q85_co-1.png
4004    cimage//vimmel_pt91-skolfoto.jpg_3880_2801_q85_co-1
3888    cimage//vimmel_pi92-skolfoto.jpg_3855_2704_q85_co-1

# Last-5 created files:
2016-11-21 06:00 cimage/oophp-kmom01_image16.png_695_562_q85_co-1.png
2016-11-21 06:00 cimage/oophp-kmom01_image16.png_695_562_q85_co-1
2016-11-21 06:00 cimage/fasttrack/4430da4c8fe3c38cc472dc6ad017415a
2016-11-20 02:34 cimage/tiles-floor_grass_e.png_32_32_q85_co-1.png
2016-11-20 02:34 cimage/tiles-floor_grass_e.png_32_32_q85_co-1

# Last-5 accessed files:
2016-11-21 09:30 snapht15_webgl-sandbox2-point.png_958_821_q85_co-1
2016-11-21 09:30 htmlphp-kmom04_image10.png_630_375_q85_co-1
2016-11-21 09:30 htmlphp-kmom04_image09.png_630_539_q85_co-1
2016-11-21 09:30 htmlphp-kmom04_image08.png_630_539_q85_co-1
2016-11-21 09:30 htmlphp-kmom04_image07.png_630_550_q85_co-1

# 5 Oldest files:
2016-08-08 11:52 snapvt16_kutv-vt16.png_134_108_q85_co-1.png
2016-08-08 11:52 tema-trad_blad_40x38.png_40_38_q85_co-1.png
2016-08-08 11:53 snapht15_google-chrome-postman.png_630_453_q85_co-1.png
2016-08-08 12:36 snapht14_python-mos-me-page.png_630_569_q85_co-1.png
2016-08-08 13:01 snapht15_js-boulder-dash.png_190_107_o553-411-231-164_q85_co-1.png

# Files not accessed within the last 30 days
Number of files: 2191
Total file size: 134276
```

Use it as a base if you feel the need to monitor the size of the cache-directory. Perhaps modify the script to your needs and execute it regularly using crontab.



Read-only cache {#readonlycache}
-------------------------------------

The cache directory need to be writable for `img.php` to create new files. But its possible to first create all cache-files and then set the directory to be read-only. This will give you a way of preventing `img.php` from creating new cache files. It will continue to work for all images having a cached version, but will fail if someone tries to create a new, not previously cached, version of the image.



Allowing remote download of images {#remote}
-------------------------------------

You can allow `img.php` to download remote images. That can be enabled in the config-file. However, before doing so, consider the implications on allowing anyone to download a file, hopefully an image, to your server and then the possibility to access it through your web server.

That sounds scary. It should.

For my own sake I will use it like this.

* Create a special version of `img.php` that has remote download allowed, hide it from public usage.
* Always use a password.
* Download and process the image and save it as an `alias`.
* Integrate the image into my web page and use the image in the alias directory.

This is an easy way to quickly download a remote image, process and share it.

So, its a scary feature and I might regret I did put it in. Still, its disabled by default and you enable it on your own risk. I have tried to make it as secure as I can, but I might have missed something. I will run it on my own system so I guess I'll find out how secure it is.
