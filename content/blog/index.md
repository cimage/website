---
views:
    main:
        template: default/article
        data:
            class: blog

    block-about: false
    article-toc: false

    blog-list:
        region: main
        template: default/blog-list
        sort: 2
        data:
            dateFormat: F j, Y
            meta: 
                type: toc

    blog-toc:
        region: sidebar-right
        template: default/blog-toc
        sort: 2
        data:
            meta: 
                type: copy
                view: blog-list

...
Development blog
===========================

Posts about development, documentation, articles on how to use CImage and info on image processing in general.
