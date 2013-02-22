<?php

namespace Drubox\TextFormats;

function create_text_formats(){


  //Public HTML format
  $public_html_format = array(
    'format' => 'public_html_format',
    'name' => 'Public HTML format',
    'weight' => 5,
    'filters' => array(
      // URL filter.
      'filter_url' => array(
        'weight' => 0,
        'status' => 1,
      ),
      // HTML filter.
      'filter_html' => array(
        'weight' => 1,
        'status' => 1,
      ),
      // Line break filter.
      'filter_autop' => array(
        'weight' => 2,
        'status' => 1,
      ),
      // HTML corrector filter.
      'filter_htmlcorrector' => array(
        'weight' => 10,
        'status' => 1,
      ),
    ),
  );
  $public_html_format = (object) $public_html_format;
  filter_format_save($public_html_format);


  //Editor text format
  $editor_html_format = array(
    'format' => 'editor_html_format',
    'name' => 'Editor HTML Format',
    'weight' => 10,
    'filters' => array(
      // URL filter.
      'filter_url' => array(
        'weight' => 0,
        'status' => 1,
        'settings' => array(
          'filter_url_length' => '72'
        )
      ),
      // HTML filter.
      'filter_html' => array(
        'weight' => 1,
        'status' => 1,
        'settings' => array(
          'allowed_html' => '<a> <em> <strong> <cite> <blockquote> <code> <ul> <ol> <li> <img> <table> <td> <th> <tr>',
          'filter_html_help' => 1,
          'filter_html_nofollow' => 0
        )
      ),
      // Line break filter.
      'filter_autop' => array(
        'weight' => 2,
        'status' => 1,
      ),
      // HTML corrector filter.
      'filter_htmlcorrector' => array(
        'weight' => 10,
        'status' => 1,
      ),
    ),
  );
  $editor_html_format = (object) $editor_html_format;
  filter_format_save($editor_html_format);


  $full_html_format = array(
    'format' => 'full_html_format',
    'name' => 'Full HTML',
    'weight' => 15,
    'filters' => array(
      // URL filter.
      'filter_url' => array(
        'weight' => 0,
        'status' => 1,
      ),
      // Line break filter.
      'filter_autop' => array(
        'weight' => 2,
        'status' => 1,
      ),
      // HTML corrector filter.
      'filter_htmlcorrector' => array(
        'weight' => 10,
        'status' => 1,
      ),
    ),
  );
  $full_html_format = (object) $full_html_format;
  filter_format_save($full_html_format);
}


function configure_wysiwyg(){

  //Configure full_html_format
  db_insert('wysiwyg')
    ->fields(
      array(
        'format' => 'full_html_format',
        'editor' => 'tinymce',
        'settings' => serialize(get_wysiwyg_settings('full_html_format')),
      )
    )
    ->execute();

  //Configure editor_html_format
  db_insert('wysiwyg')
    ->fields(
      array(
        'format' => 'editor_html_format',
        'editor' => 'tinymce',
        'settings' => serialize(get_wysiwyg_settings('editor_html_format')),
      )
    )
    ->execute();

  //Configure public_html_format
    $public_html_format_data = get_wysiwyg_settings('public_html_format');
    $serialized_public_html_format_data = serialize(get_wysiwyg_settings('public_html_format'));
  db_insert('wysiwyg')
    ->fields(
      array(
        'format' => 'public_html_format',
        'editor' => 'tinymce',
        'settings' => serialize(get_wysiwyg_settings('public_html_format')),
      )
    )
    ->execute();
}


function get_wysiwyg_settings($role){
  //Full HTML Buttons
  $full_html_buttons = array(
    'default' => array(
      'bold' => 1,
      'italic' => 1,
      'underline' => 1,
      'justifyleft' => 1,
      'justifycenter' => 1,
      'justifyright' => 1,
      'justifyfull' => 1,
      'bullist' => 1,
      'numlist' => 1,
      'outdent' => 1,
      'indent' => 1,
      'link' => 1,
      'unlink' => 1,
      'anchor' => 1,
      'image' => 1,
      'cleanup' => 1,
      'forecolor' => 1,
      'backcolor' => 1,
      'blockquote' => 1,
      'cut' => 1,
      'copy' => 1,
      'paste' => 1,
      'removeformat' => 1,
    ),
    'directionality' => array(
      'ltr' => 1,
      'rtl' => 1,
    ),
    'font' => array(
      'fontselect' => 1,
      'fontsizeselect' => 1,
      'styleselect' => 1,
    ),
    'insertdatetime' => array(
      'insertdate' => 1,
      'inserttime' => 1,
    ),
    'paste' => array(
      'pastetext' => 1,
      'pasteword' => 1,
    ),
    'searchreplace' => array(
      'search' => 1,
    ),
    'table' => array(
      'tablecontrols' => 1,
    ),
    'drupal' => array(
      'break' => 1,
    ),
  );

  //Editor HTML Buttons
  $editor_html_buttons = array(
    'default' => array(
      'bold' => 1,
      'italic' => 1,
      'underline' => 1,
      'justifyleft' => 1,
      'justifycenter' => 1,
      'justifyright' => 1,
      'justifyfull' => 1,
      'bullist' => 1,
      'numlist' => 1,
      'outdent' => 1,
      'indent' => 1,
      'link' => 1,
      'unlink' => 1,
      'anchor' => 1,
      'image' => 1,
      'cleanup' => 1,
      'blockquote' => 1,
      'cut' => 1,
      'copy' => 1,
      'paste' => 1,
      'removeformat' => 1,
    ),
    'paste' => array(
      'pastetext' => 1,
      'pasteword' => 1,
    ),
    'drupal' => array(
      'break' => 1,
    ),
  );

  //Editor HTML Buttons
  $public_html_buttons = array(
    'default' => array(
      'bold' => 1,
      'italic' => 1,
      'underline' => 1,
      'bullist' => 1,
      'outdent' => 1,
      'indent' => 1,
      'numlist' => 1,
      'link' => 1,
      'unlink' => 1,
    ),
  );

  $settings = array(
    'default' => 1,
    'user_choose' => 0,
    'show_toggle' => 1,
    'theme' => 'advanced',
    'language' => 'en',
    'buttons' => null,
    'toolbar_loc' => 'top',
    'toolbar_align' => 'left',
    'path_loc' => 'bottom',
    'resizing' => 1,
    'verify_html' => 1,
    'preformatted' => 0,
    'convert_fonts_to_spans' => 1,
    'remove_linebreaks' => 1,
    'apply_source_formatting' => 0,
    'paste_auto_cleanup_on_paste' => 0,
    'block_formats' => 'p,address,pre,h2,h3,h4,h5,h6,div',
    'css_setting' => 'theme',
    'css_path' => '',
    'css_classes' => '',
  );

  switch ($role) {

    case 'full_html_format':
      $settings['buttons'] = $full_html_buttons;
      break;

    case 'editor_html_format':
      $settings['buttons'] = $editor_html_buttons;
      break;

    case 'public_html_format':
      $settings['buttons'] = $public_html_buttons;
      break;
    
    default:
      $settings['buttons'] = $public_html_buttons;
      break;
    } 
  return $settings;
}

function assign_roles($text_format_roles){
  
  foreach ($text_format_roles as $role => $text_formats){
    $rid = get_rid_from_rol_name($role);
    $permissions_format = array();

    foreach ($text_formats as $format){
      $permissions_format[] = 'use text format ' . $format;
    }

    own_user_role_grant_permissions($rid, $permissions_format);

  }
}

//Workaround for error in user_role_grant_permission with null module
function own_user_role_grant_permissions($rid, $permissions){
  foreach($permissions as $permission){
    db_insert('role_permission')->fields(array(
      'rid' => $rid, 
      'permission' => $permission,
      'module' => 'filter'
    ))->execute();
  }
}

function get_rid_from_rol_name($name){
  $result = db_select('role', 'r')
    ->fields('r',array('rid'))
    ->condition('name', $name,'=')
    ->execute()
    ->fetchAssoc();
  return $result['rid'];
}