<?php

namespace Drubox\DateFormats;

function create_date_formats($date_formats){
  foreach ($date_formats as $machine_name => $format){
    add_date_format($machine_name, $format[0], $format[1]);
  }

}

function add_date_format($machine, $title, $format){
  db_insert('date_format_type')
    ->fields(array(
      'type' => $machine,  // Machine Name
      'title' => $title, // Display Name
      'locked' => 1,        // 1 = can't change through UI, 0 = can change
    ))
    ->execute();

  db_insert('date_formats')
    ->fields(array(
      'format' => $format,  // Machine Name
      'type' => $machine, // Display Name
      'locked' => 1,        // 1 = can't change through UI, 0 = can change
    ))
    ->execute();

  // Variable name is date_format_MACHINENAME from previous insert
  variable_set('date_format_'.$machine, $format);
}