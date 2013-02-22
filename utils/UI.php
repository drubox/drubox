<?php

namespace Drubox\UI;

function enable_admin_theme($theme_name, $node_admin_theme = TRUE){

  // Enable the admin theme
  db_update('system')
    ->fields(array('status' => 1))
    ->condition('type', 'theme')
    ->condition('name', $theme_name)
    ->execute();
  variable_set('admin_theme', $theme_name);

  //Enable editing nodes with front theme if necessary
  if ($node_admin_theme === TRUE){
    variable_set('node_admin_theme', '1');
  } else  {
    variable_set('node_admin_theme', '0');
  }
}

function enable_default_theme($theme_name){

  // Enable the default theme Rubik.
  variable_set('theme_default', $theme_name);
}