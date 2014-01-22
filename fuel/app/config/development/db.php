<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(

	'default' => array(
/*
  'connection'  => array(
  'dsn'        => 'mysql:host=localhost;dbname=fuel_dev',
  'username'   => 'root',
  'password'   => 'root',
  ),
*/
                'type'           => 'mysqli',
//                'type' => 'pdo',
                'connection'     => array(
                        'hostname'       => 'localhost',
                        'port'           => '3306',
                        'database'       => 'fuel_db',
//                        'dsn' => 'mysql:host=localhost;dbname=fuel_db',
                        'username'       => 'aki',
                        'password'       => 'ilikektm',
                        'persistent'     => false,
                        'compress'       => false,
                        ),
                'identifier'     => '`',
                'table_prefix'   => '',
                'charset'        => 'utf8',
                'enable_cache'   => true,
                'profiling'      => false,
                'readonly'       => false,
                ),
             
        );
