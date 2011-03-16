<?php
     print "testing!";
     
     
$host = <<<TEXT

1. open c:\windows\system32\drivers\etc\hosts and add:

127.0.0.1 flow.pyramidlocal.com.au

2. open c:\xampp\apache\conf\extra\http-vhosts.conf and add (change the document root, directory and error log path!!):

<VirtualHost *:80>
    DocumentRoot "C:/Users/carsten/eclipseworkspace/flow"
    ServerName flow.pyramidlocal.com.au
    ServerAlias flow.pyramidlocal.com.au
    ErrorLog "C:/xampplite/apache/logs/flow_error.log"
    <Directory "C:/Users/carsten/eclipseworkspace/flow">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>   
</VirtualHost>

3. restart apache.

(reset the flow base url in the index.php)

TEXT;
print "<h2>setup email</h2><pre>".$host."</pre>";

$from_real_host = <<<HOST
::1             localhost
127.0.0.1 flow.pyramidlocal.com.au
127.0.0.1 flow_asset.pyramidlocal.com.au
127.0.0.1 test01.com
HOST;

print "<h2>Windows host file</h2><pre>".$from_real_host."</pre>";

$xampp_conf = <<< CONF
<VirtualHost *:80>
    DocumentRoot "C:/Users/serg/workspace/flow"
    ServerName flow.pyramidlocal.com.au
    ServerAlias flow.pyramidlocal.com.au
    ErrorLog "C:/xampp/xampp/apache/logs/flow_error.log"
    <Directory "C:/Users/serg/workspace/flow">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>    

</VirtualHost>
#
<VirtualHost *:80>
    DocumentRoot "C:/Users/serg/workspace/flow_asset"
    ServerName flow_asset.pyramidlocal.com.au
    ServerAlias flow_asset.pyramidlocal.com.au
    ErrorLog "C:/xampp/xampp/apache/logs/flow_error.log"
    <Directory "C:/Users/serg/workspace/flow_asset">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>    

</VirtualHost>
######################## new for testing
<VirtualHost *:80>
    DocumentRoot "C:/Users/serg/workspace/test01"
    ServerName test01.com
    ServerAlias test01.com
    ErrorLog "C:/xampp/xampp/apache/logs/flow_error.log"
    <Directory "C:/Users/serg/workspace/test01">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>    

</VirtualHost>
########################## end new ####
CONF;
print "<h2>XAMPP config</h2><pre>".$xampp_conf."</pre>";

##########################################################

#		Access to other files

##########################################################
#in Apache/conf/extra/httpd-xampp.conf

#set:
    Alias /phpmyadmin "C:/xampp/xampp/phpMyAdmin/"
    <Directory "C:/xampp/xampp/phpMyAdmin">
        AllowOverride AuthConfig
    </Directory>
    
    Alias /phpdocumentor "C:/xampp/xampp/phpDocumentor/PhpDocumentor"
    <Directory "C:/xampp/xampp/phpDocumentor/PhpDocumentor">
        AllowOverride AuthConfig
    </Directory>
    
# and

<LocationMatch "^/(?i:(?:xampp|security|licenses|phpmyadmin|webalizer|server-status|server-info|phpdocumentor))">

##############################################################





