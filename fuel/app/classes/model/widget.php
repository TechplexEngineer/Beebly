<?php

class Model_Widget extends \Orm\Model
{

    protected static $_belongs_to = array('page');
    protected static $_properties = array(
	'id',
	'name',
	'description',
	'code',
//	'page_id',
	'created_at',
	'updated_at',
    );
    protected static $_observers = array(
	'Orm\Observer_CreatedAt' => array(
	    'events' => array('before_insert'),
	    'mysql_timestamp' => false,
	),
	'Orm\Observer_UpdatedAt' => array(
	    'events' => array('before_save'),
	    'mysql_timestamp' => false,
	),
    );

    public static function validate($factory)
    {
	$val = Validation::forge($factory);
	$val->add_field('name', 'Name', 'required|max_length[255]');
	$val->add_field('description', 'Description', 'required|max_length[255]');
	$val->add_field('code', 'Code', 'required');
//	$val->add_field('page_id','Page ID', 'required');
	return $val;
    }

}
