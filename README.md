# HealthOne Sports Center

# Configure the vhosts
You can configure your XAMP to host multiple PHP apps on your local PC. The
You can then run apps on, for example: http://healthone.localhost/, http://app2.localhost/
To configure this you need to edit a number of configuration items.

## Windows
Make sure the Virtual host config file is loaded:
* Open Xammp
* Click Apache config -> Apache(httpd.conf)
* Search for `Include conf/extra/httpd-vhosts.conf` and remove the `#` if it is in front of this line.
* Add the code below to the virtual host config: `C:\xampp\apache\conf\extra\httpd-vhosts.conf`
```
<VirtualHost *:80>
DocumentRoot "C:/xampp/htdocs"
ServerName localhost
</VirtualHost>

Listen 4001    
NameVirtualHost *:4001
<VirtualHost *:80 *:4001>
    DocumentRoot "C:/xampp/apps/healthone/htdocs"
    ServerName healthone.localhost
    <Directory "C:/xampp/apps/healthone/htdocs">
        Options Indexes FollowSymLinks ExecCGI Includes

        # AllowOverride controls what directives may be placed in .htaccess files.
        # It can be "All", "None", or any combination of the keywords:
        #   Options FileInfo AuthConfig Limit
        #
        #AllowOverride None
        # since XAMPP 1.4:
        AllowOverride All

        #
        # Controls who can get stuff from this server.
        #
        Require all granted
    </Directory>
</VirtualHost>
```
* Restart Apache in the XAMP instance.
* Move all the contents of the repository you cloned to: `C:/xampp/apps/healthone/htdocs`
* Now open the `C:/xampp/apps/healthone/htdocs` in PHPStorm or VScode.

## MacOS
Make sure the Virtual host config file is loaded:
* Open `/Applications/XAMPP/etc/httpd.conf`
* Search for `Include etc/extra/httpd-vhosts.conf` and remove the `#` if it is in front of this line.
* Add the code below to the virtual host config: `/Applications/XAMPP/etc/extra/httpd-vhosts.conf`
```
<VirtualHost *:80>
DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/"
ServerName localhost
</VirtualHost>

Listen 4001    
NameVirtualHost *:4001
<VirtualHost *:80 *:4001>
    DocumentRoot "/Applications/XAMPP/xamppfiles/apps/healthone/htdocs"
    ServerName healthone.localhost
    <Directory "/Applications/XAMPP/xamppfiles/apps/healthone/htdocs">
        Options Indexes FollowSymLinks ExecCGI Includes

        # AllowOverride controls what directives may be placed in .htaccess files.
        # It can be "All", "None", or any combination of the keywords:
        #   Options FileInfo AuthConfig Limit
        #
        #AllowOverride None
        # since XAMPP 1.4:
        AllowOverride All

        #
        # Controls who can get stuff from this server.
        #
        Require all granted
    </Directory>
</VirtualHost>
```
* Restart Apache in the XAMP instance.
* Move all contents of the repository you cloned to: `/Applications/XAMPP/xamppfiles/apps/healthone/htdocs`
* Now open the `/Applications/XAMPP/xamppfiles/apps/healthone/htdocs` in PHPStorm or VScode.

### Edit host file
With the host file you can convert the `localhost` or an ip to a specific url for the browser.
* Open the host file `/etc/hosts` with `sudo`
* Add the following line at the bottom of the host file
```
127.0.0.1           healthone.localhost
```
* Save and now you can go to http://healthone.localhost/ in the browser and you should now see the website.

