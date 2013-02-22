<?php

namespace Drubox\Navigation;

function create_menu($menu){
  $machine_name = $menu['machine-name'];

  foreach($menu['items'] as $key => $item){
    $menu_item = array(
      'link_path' => $item[0],
      'link_title' => $item[1],
      'menu_name' => $machine_name,
      'weight' => $key,
      'expanded' => 0
    );
    
    menu_link_save($menu_item);
  }
}
