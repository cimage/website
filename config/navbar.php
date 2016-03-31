<?php
/**
 * Config-file for navigation bar.
 *
 */
return [

    // Use for styling the menu
    "wrapper" => null,
    "class" => "rm-default rm-desktop",
 
    // Here comes the menu strcture
    "items" => [

        "docs" => [
            "text"  =>"Docs",
            "url"   => $this->di->get("url")->create("doc"),
            "title" => "Documentation on CImage and img.php",
            "mark-if-parent" => true,
        ],
/*
        "article" => [
            "text"  =>"Article & Guide",
            "url"   => $this->di->get("url")->create("article/"),
            "title" => "Articles and Guides on using CImage and img.php"
        ],
*/
        "blog" => [
            "text"  =>"Blog",
            "url"   => $this->di->get("url")->create("blog"),
            "title" => "Developer blog",
            "mark-if-parent" => true,
        ],
/*
        "tools" => [
            "text"  =>"Tools",
            "url"   => $this->di->get("url")->create("article/"),
            "title" => "Try some tools to use CImage and img.php"
        ],

        "about" => [
            "text"  =>"About",
            "url"   => $this->di->get("url")->create("about"),
            "title" => "About this website"
        ],
        */

        "github" => [
            "text"  =>"GitHub",
            "url"   => "https://github.com/mosbth/cimage",
            "title" => "GitHub repo for CImage"
        ],
    ],
 


    /**
     * Callback tracing the current selected menu item base on scriptname
     *
     */
    "callback" => function ($url) {
        return !strcmp($url, $this->di->get("request")->getCurrentUrl(false));
    },



    /**
     * Callback to check if current page is a decendant of the menuitem,
     * this check applies for those menuitems that has the setting
     * "mark-if-parent" set to true.
     *
     */
    "is_parent" => function ($parent) {
        $url = $this->di->get("request")->getCurrentUrl(false);
        return !substr_compare($parent, $url, 0, strlen($parent));
    },



   /**
     * Callback to create the url, if needed, else comment out.
     *
     */
   /*
    "create_url" => function ($url) {
        return $this->di->get("url")->create($url);
    },
    */
];
