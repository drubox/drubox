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


function add_block_to_theme($module, $block_name, $region, $title = '<none>', $weight = 0){
  $theme = variable_get('theme_default', 'bartik');

  $block = array(
    'module' => $module,
    'delta' => $block_name,
    'theme' => $theme,
    'status' => 1,
    'weight' => $weight,
    'region' => $region,
    'pages' => '',
    'cache' => -1,
    'title' => $title,
  );

  $query = db_insert('block')->fields(array('module', 'delta', 'theme', 'status', 'weight', 'region', 'pages', 'cache', 'title'));
  $query->values($block);
  $query->execute();
}

