<?php

class Model_User extends Orm\Model
{

        protected static $_properties = array(
                'user_id',
                'user_name',
                'password'
                );

        protected static $_primary_key = array('user_id');
                
        public static function login ($user_id, $password)
        {

                if (empty($user_id) or empty($password))
                {
                        return false;
                }

                $user = self::find('first', array('where' => array(
                                                          'user_id' => $user_id,
                                                          'password' => $password
                                                          )));
                if ($user)
                {
                        return $user;
                }

                return false;
        }
        
}