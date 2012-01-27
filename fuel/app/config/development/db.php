<?php
/**
 * The development database settings.
 */

$settings = array(
    'host' => 'localhost',
    'dbname' => 'beebly',
    'username' => 'beebly',
    'password' => 'beebly'
);


return array(
    'default' => array(
	'connection' => array(
	    'dsn' => 'mysql:host=' . $settings['host'] . ';dbname=' . $settings['dbname'],
	    'username' => $settings['username'],
	    'password' => $settings['password'],
	),
    ),
);