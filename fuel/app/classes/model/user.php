<?php

class Model_User extends Orm\Model
{

//        protected static $_table_name ='uesrs';
        protected static $_properties = array(
                'id',
                'name',
                'email',
                'password'
                );

        /*
          protected static $_conditions = array(
          'oreder_by' => array('id' => 'desc')
          );
        */         

        /*
          public static function get_results() {

          return \DB::select('id', 'name', 'email')->from('users')->execute()->as_array();
          }
        */
}