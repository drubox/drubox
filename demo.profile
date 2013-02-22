<?php
/**
 * @file
 * Install, update and uninstall functions for the demo install profile.
 * This file is only a demo with demos of functions ready to work
 */
require_once 'Drubox/Drubox.php';

function demo_install(){
  // Disable user register.
  variable_set('user_register', USER_REGISTER_ADMINISTRATORS_ONLY);

  // Show master view by default
  variable_set('views_ui_show_master_display', 1);

  // Enable the admin theme.
  \Drubox\UI\enable_default_theme('bartik');
  \Drubox\UI\enable_admin_theme('rubik');

  //Enable new roles
  $roles = array(
    'Editor',
  );
  \Drubox\Permissions\create_roles($roles);

  //Configure text formats. It's still a mess!
  //There are three text formats:
  // * public_html_format
  // * editor_html_format
  // * full_html_format
  \Drubox\TextFormats\create_text_formats();
  \Drubox\TextFormats\configure_wysiwyg();
  $text_format_roles  =array(
    'authenticated user' => array('public_html_format'),
    'Editor'             => array('editor_html_format'),
    'Administrator'      => array('public_html_format', 'editor_html_format', 'full_html_format'),
    );
  \Drubox\TextFormats\assign_roles($text_format_roles);


  //Configure date formats
  $date_formats = array(
    'url' => array('URL', 'Y/m'),
    'hour' => array('Hour', 'H:i'),
    'year' => array('Year', 'Y'),
    'text_short' => array('Text short', 'F j'),
    'text_medium' => array('Text medium', 'F j, Y'),
    'text_long' => array('Text long', 'l, F j, Y'),
    'digit_medium' => array('Digit medium', 'm/d/Y'),
    'digit_long' => array('Digit long', 'm/d/Y - H:i'),
    'unix_timestamp' => array('Unix timestamp', 'U'),
  );
  \Drubox\DateFormats\create_date_formats($date_formats);

  //Add items to a existing menu
  $main_menu = array(
    'machine-name' => 'main-menu',
    'items' => array(
      -45 => array('user', 'Inicio'),
      -35 => array('<front>', 'Federación'),
      -20 => array('<front>', 'Servicios'),
      -10 => array('<front>', 'Campos'),
        0 => array('<front>', 'Circulares'),
       10 => array('<front>', 'Competiciones'),
       20 => array('<front>', 'Centros de Tecnificación'),
       30 => array('<front>', 'Comités'),
       40 => array('<front>', 'Multimedia'),
    )
  );
  \Drubox\Navigation\create_menu($main_menu);
  
}
