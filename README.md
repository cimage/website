# website

The public website with documentation, articles, tools and development blog.



## Production site

```
# Clone it into git/cimage.se
git clone git@github.com:cimage/website.git cimage.se
cd cimage.se

# Install and seup local production in htdocs/cimage.se
composer install
make site-build

# Enable as http
make virtual-host

# Get the certificates
make ssl-cert-create

# Enable as https
make virtual-host-https
```

Keep the certs up to date in the crontab.

```

```
