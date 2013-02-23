Drubox
======

Drubox is not a distribution anymore. Drubox is toolbox for profiles in Drupal which can be use for add new roles, create menus, create wysiwyg profiles and (I hope) much more in the future

##Usage
To use that utilities you have to do: 
* Clone the drubox repository in your profile directory with <code>git clone https://github.com/drubox/drubox</code>
* Write a <code>require_once("drubox/Drubox.php")</code> in your myprofile.install file to load it.

##Demo
In this repository cames a file called "demo.profile" with the use of this utilities.

##More utils
A very useful drush command for install the site is:
<pre>drush site-install -v -y profileName --account-name=admin --account-pass=admin2012 --account-mail=admin@admin.com --site-mail=site-mail@admin.com --site-name="SiteName" --db-url=mysql://root:root@localhost/databaseName</pre>
