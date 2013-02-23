Drubox
======

Drubox is not a distribution anymore. Drubox is toolbox for profiles in Drupal which can be use for add new roles, create menus, create wysiwyg profiles and (I hope) much more in the future

##Usage
To use that utilities you have to do: 
* Copy the Drubox directory in your profile directory
* Write an include ("utils/Drubox.php") in your module.profile file

##Demo
In this repository cames a file called "demo.profile" with the use of this utilities.

##More utils
A very useful drush command for install the site is:
drush site-install -v -y profileName --account-name=admin --account-pass=admin2012 --account-mail=admin@admin.com --site-mail=site-mail@admin.com --site-name="SiteName" --db-url=mysql://root:root@localhost/databaseName
