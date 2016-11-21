ASCII art
==============================

For fun and understanding on how images are setup, you can play around with generating ASCII images CImage.



An example {#example}
-----------------------------

Here is a car.

[FIGURE src=/image/example/car.png]

This car can be converted to a ASCII image using the option `&ascii`. It could look like this.

<pre>
@@@@@@@@%%%%##%%%@@@@@@@@@%#@@@@@@@@@%#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
#%%%@@@@@@@@%%@%%*==%@%##%%=*@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@%%%@@@@@
.:-+%###%%%@@@@@#+-:-%%*=#%%-#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@%%%+#%@%#*#
#+=*+..:-=+*#@%#*+=-:+%%%%@%=+%%%@@@@@@@@@@@@@@@@@@@@@%%%%%%%%%###%###
%%%%@%#*+-:.=+=+=*+=--%@@@@%=+%@%%%@@@@@@%%@@@@@%@%%@@@%%%#%%#%%###%%#
%%%%@@@@@@%###***=%%#+*###%%:#@@@%%@%*@@@@%%%#%%%#%%%%%%%####%%%%%%%@@
@%%%%@@@@@%%####**#%@@@#:-**:+##%@@@@@@@@@%##%%%%%%%%%%%%%%%%@@@@@@@@@
%%%%%%%%%@%%%%%%#****%@@@%%:-+++*+=+#%%%@@@##%%%%%@@@@@@@@@@%@@%@%%%%%
@%@@@@@@@@%%#%%@%#****%@@@*:*####*+=-+=+%@@@##%@@@@@@%%%%%%%%%%#%%###%
@@@@@@@@@@%%%%#--*****+==*-=###**###%@%#%@@@@%###%%%%%%%%%%%%%%%%%%%%%
@@@@@@@@@@*##%#++*#*+**+--:=+++++***%%%@@@@@%@#+=*%+*#%%%%%%%%%%%%%%%%
@@@@@@@%#**++*#%@@##%%#*##*=::...:-=+*+++*##%@@@%%@#%*+*=+##%%%%%%%%%%
@@@@@%#+***+++*#@@@@@#%@@@@%+=---:::-=*%%**+::-=+*#%@@@@@%###*#+#%%@%@
@%@@@%%****+--+@@@@@#%@@@@@@%+=====-----=+##%*-...::-=+*%@@%%%%%%#%%%@
@@@@@@@%##*+-:*@@@@%#@@@@@@@@+++==========--::-:.....::::-=*%@@@@@@@@@
@@@@@@@@@@@#+++*#####@@%%@@@@++++===========++=---::::...::::-=*%%@@@@
**##%@@%@@%%%#+-----#@@@@@@@@+============+*%%%%%#**++=---::::::-+%@@@
-:::=##%@@#++***++==#@@@@@%@@=----=*##****%@@@@@@@@%%%%#%%*======*%@@%
::::...::--==+*####%%%@%@%%@@%%%%%%@@@@@@@%@@@@@@@@@@@@@@@%@@@@@%%@%@%
::::::..........:-=+*#%%%%@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@%%%%%@%#%%%
-:::::::..............:-=++**#%%@@@@@@@@@@@@@@@@@@@@@@@%%#+==-=====:--
----::::::......................::--==+**##%%%@@@@@@@@@%%%%%%#**+-:...
------::::::::::...............................:::::----::............
</pre>



Options for ASCII {#options}
--------------------------------

You can send options through the `&ascii=option1,option2,option3,optional-string`. This is currently undocumented. Check `img_config.php` or `CAsciiArt.php` for details of the options.



Configuration of ASCII art {#configure}
--------------------------------

The default section from the config file looks like this.

```php
/**
 * Default options for ascii image.
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
```
