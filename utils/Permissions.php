<?php
/**
 * @file
 * Static class with utilities
 */
namespace Drubox\Permissions;

function create_roles($roles = array()){
    //Administrador
  $admin_role = new \stdClass();
  $admin_role->name = t('Administrator');
  $admin_role->weight = 2;
  user_role_save($admin_role); 
  user_role_grant_permissions($admin_role->rid, array_keys(module_invoke_all('permission'))); 
  variable_set('user_admin_role', $admin_role->rid); //
  
  //Tell to Drupal that user/1 is the admin user and has that role.
  db_insert('users_roles')
    ->fields(array('uid' => 1, 'rid' => $admin_role->rid))
    ->execute();
    
  foreach($roles as $key => $rol){
    $role = new \stdClass();
    $role->name = t($rol);
    //Weight 0, 1 and 2 are reserved for Drupal. It has to begin in 3.
    $role->weight = $key + 3;
    user_role_save($role);
  }
}