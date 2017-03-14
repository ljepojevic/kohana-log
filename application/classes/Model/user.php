<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Korisnik Model
 * Handles CRUD for user messages
 */
class Model_User extends Model_Auth_User {
   // Table name used by this model
   protected $_table = 'users';

  protected $_has_many = array(
              'user_tokens' => array('model' => 'user_token'),
              'roles' => array('model' => 'role', 'through' => 'roles_users')
            );
  protected $_ignored_columns = array('password_confirm');   

}